<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\ItemMasuk;  
use App\TbsItemMasuk;  
use App\DetailItemMasuk;  
use App\Barang;  
use Session;
use Auth;

class ItemMasukController extends Controller
{ 
    //MENAMPILKAN DATA ITEM MASUK
    public function index(Request $request, Builder $htmlBuilder)
    { 
        if ($request->ajax()) { 
            $item_masuk = ItemMasuk::with(['user_buat','user_edit']);
            return Datatables::of($item_masuk)->addColumn('action', function($itemmasuk){
              $detail_item_masuk = DetailItemMasuk::with(['produk'])->where('no_faktur',$itemmasuk->no_faktur)->get();
                    return view('item_masuk._action', [
                        'model'     => $itemmasuk,
                        'id_item_masuk'     => $itemmasuk->id,
                        'data_detail_item_masuk'     => $detail_item_masuk,
                        'form_url'  => route('item-masuk.destroy', $itemmasuk->id),
                        'edit_url'  => route('item-masuk.edit', $itemmasuk->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Item Masuk dengan nomor faktur ' . $itemmasuk->no_faktur . '?'
                        ]);
                }) ->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'no_faktur', 'name' => 'no_faktur', 'title' => 'No. Faktur'])  
        ->addColumn(['data' => 'total', 'name' => 'total', 'title' => 'Total']) 
        ->addColumn(['data' => 'keterangan', 'name' => 'keterangan', 'title' => 'Keterangan']) 
        ->addColumn(['data' => 'user_buat.name', 'name' => 'user_buat.name', 'title' => 'Petugas']) 
        ->addColumn(['data' => 'user_edit.name', 'name' => 'user_edit.name', 'title' => 'Petugas Edit']) 
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu']) 
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit'])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]); 
        return view('item_masuk.index')->with(compact('html'));
    }


    //MENAMPILKAN DATA DI TBS ITEM MASUK
    public function create(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) { 
            $session_id = session()->getId();
            $tbs_item_masuk = TbsItemMasuk::with(['produk'])->where('session_id', $session_id)->get();
            return Datatables::of($tbs_item_masuk)->addColumn('action', function($tbsitemmasuk){
                    return view('item_masuk._hapus_produk', [
                        'model'     => $tbsitemmasuk,
                        'form_url'  => route('item-masuk.proses_hapus_tbs_item_masuk', $tbsitemmasuk->id_tbs_item_masuk),  
                        'confirm_message'   => 'Yakin Mau Menghapus Produk ?'
                        ]);
                })->addColumn('data_produk_tbs', function($data_produk_tbs){ 
                    $barang = Barang::find($data_produk_tbs->id_produk);
                    $data_barang = $barang->kode_barang ." - ". $barang->nama_barang;          
                    return $data_barang;   
            })->make(true);
        }

        $html = $htmlBuilder 
        ->addColumn(['data' => 'data_produk_tbs', 'name' => 'data_produk_tbs', 'title' => 'Produk', 'orderable' => false, 'searchable'=>false ]) 
        ->addColumn(['data' => 'jumlah_produk', 'name' => 'jumlah_produk', 'title' => 'Jumlah'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Hapus', 'orderable' => false, 'searchable'=>false]);

        return view('item_masuk.create')->with(compact('html'));
    }
 
    //PROSES TAMBAH TBS ITEM MASUK
    public function proses_tambah_tbs_item_masuk(Request $request)
    { 
        $this->validate($request, [
            'id_produk'     => 'required|numeric',
            'jumlah_produk' => 'required|numeric',
            ]);

        $session_id = session()->getId();

        $data_tbs = TbsItemMasuk::select('id_produk')
        ->where('id_produk', $request->id_produk)
        ->where('session_id', $session_id)
        ->count();

        $data_barang = Barang::select('nama_barang')->where('id', $request->id_produk)->first();
        $pesan_alert = "Produk '".$data_barang->nama_barang."' Sudah Ada, Silakan Pilih Produk Lain !";


      //JIKA PRODUK YG DIPILIH SUDAH ADA DI TBS
        if ($data_tbs > 0) {
            
            $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">warning</i>
                    </div>
                    <b>Warning : Produk "'.$data_barang->nama_barang.'" Sudah Ada, Silakan Pilih Produk Lain !</b>
                </div>';

            Session::flash("flash_notification", [
              "level"=>"warning",
              "message"=> $pesan_alert
            ]); 

            return back();
        }
        else{

           $pesan_alert = 
             '<div class="container-fluid">
                  <div class="alert-icon">
                  <i class="material-icons">check</i>
                  </div>
                  <b>Sukses : Berhasil Menambah Produk "'.$data_barang->nama_barang.'"</b>
              </div>';

            $tbsitemmasuk = TbsItemMasuk::create([
                'id_produk' =>$request->id_produk,            
                'session_id' => $session_id,
                'jumlah_produk' =>$request->jumlah_produk,
            ]);

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=> $pesan_alert
            ]);
            return back();

        }
    }


//PROSES BARCODE TBS ITEM KELUAR
    public function proses_barcode_item_masuk(Request $request){
        $session_id = session()->getId();

        $this->validate($request, [
            'barcode'     => 'required',
        ]);

        $data_produk = Barang::select(['id', 'kode_barcode', 'nama_barang'])->where('kode_barcode', $request->barcode)->first();


//LOGIKA JIKA BARCODE YG DIINPUT TIDAK ADA
        if ($data_produk == NULL) {

          $pesan_alert = 
             '<div class="container-fluid">
                  <div class="alert-icon">
                  <i class="material-icons">warning</i>
                  </div>
                  <b>Warning : Produk Dengan Barcode "'.$request->barcode.'" Tidak Ada!</b>
              </div>';

            Session::flash("flash_notification", [
              "level"=>"warning",
              "message"=> $pesan_alert
            ]); 

            return redirect()->route('item-keluar.create');
        }
        else{

          $data_tbs = TbsItemMasuk::select('jumlah_produk')->where('id_produk', $data_produk->id)->where('session_id', $session_id);

//JIKA BARCODE PRODUK YG SAMA, MAKA JUMLAH PRODUKNYA BERTAMBAH

            if ($data_tbs->count() > 0) {
          //UPDATE TBS
              $data_tbs->update([
                'jumlah_produk' => $data_tbs->first()->jumlah_produk + 1
              ]);
            }
            else{
          //INSERT TBS
              $tbsitemkeluar = TbsItemMasuk::create([
                  'id_produk' =>$data_produk->id,
                  'session_id' => $session_id,
                  'jumlah_produk' => 1,
              ]);

            }

          $pesan_alert = 
             '<div class="container-fluid">
                  <div class="alert-icon">
                  <i class="material-icons">check</i>
                  </div>
                  <b>Sukses : Berhasil Menambah Produk "'.$data_produk->nama_barang.'"</b>
              </div>';

          Session::flash("flash_notification", [
              "level"=>"success",
              "message"=> $pesan_alert
              ]);
          
          return redirect()->route('item-masuk.create');

        }
    }

    public function no_faktur(){
      //PROSES MEMBUAT NO. FAKTUR ITEM MASUK
        $tahun_sekarang = date('Y');
        $bulan_sekarang = date('m');
        $tahun_terakhir = substr($tahun_sekarang, 2);
      
      //mengecek jumlah karakter dari bulan sekarang
        $cek_jumlah_bulan = strlen($bulan_sekarang);

      //jika jumlah karakter dari bulannya sama dengan 1 maka di tambah 0 di depannya
        if ($cek_jumlah_bulan == 1) {
          $data_bulan_terakhir = "0".$bulan_sekarang;
         }
        else{
          $data_bulan_terakhir = $bulan_sekarang;
         }
      
      //ambil bulan dan no_faktur dari tanggal item_masuk terakhir
         $item_masuk = ItemMasuk::select([DB::raw('MONTH(created_at) bulan'), 'no_faktur'])->orderBy('id','DESC')->first();

         if ($item_masuk != NULL) {
          $ambil_nomor = substr($item_masuk->no_faktur, 0, -8);
          $bulan_akhir = $item_masuk->bulan;
         }
         else{
          $ambil_nomor = 1;
          $bulan_akhir = 13;
         }
         
      /*jika bulan terakhir dari item_masuk tidak sama dengan bulan sekarang, 
      maka nomor nya kembali mulai dari 1, jika tidak maka nomor terakhir ditambah dengan 1
      */
        if ($bulan_akhir != $bulan_sekarang) {
          $no_faktur = "1/IM/".$data_bulan_terakhir."/".$tahun_terakhir;
        }
        else {
          $nomor = 1 + $ambil_nomor ;
          $no_faktur = $nomor."/IM/".$data_bulan_terakhir."/".$tahun_terakhir;
        }

        return $no_faktur;
      //PROSES MEMBUAT NO. FAKTUR ITEM MASUK
    }

    //PROSES SELESAI TRANSAKSI ITEM MASUK
    public function store(Request $request) {

        $session_id = session()->getId();
        $user = Auth::user()->id;
        $no_faktur = $this->no_faktur();

      //INSERT DETAIL ITEM MASUK
        $data_produk_item_masuk = TbsItemMasuk::where('session_id', $session_id);

        if ($data_produk_item_masuk->count() == 0) {

           $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">error</i>
                    </div>
                    <b>Gagal : Belum ada Produk Yang Di inputkan</b>
                </div>';

        Session::flash("flash_notification", [
            "level"     => "danger",
            "message"   => $pesan_alert
        ]);

          
          return redirect()->back();
        }

        foreach ($data_produk_item_masuk->get() as $data_tbs) {
            $detail_item_masuk = DetailItemMasuk::create([
                'id_produk' =>$data_tbs->id_produk,              
                'no_faktur' => $no_faktur,
                'jumlah_produk' =>$data_tbs->jumlah_produk,
            ]);
        }

      //INSERT ITEM MASUK
        if ($request->keterangan == "") {
          $keterangan = "-";
        }
        else{
          $keterangan = $request->keterangan;
        }

        $itemmasuk = ItemMasuk::create([
            'no_faktur' => $no_faktur,
            'keterangan' =>$keterangan,
            'user_buat' => $user,
            'user_edit' => $user,
        ]);

        if (!$itemmasuk) {
          return back();
        }
        
        //HAPUS TBS ITEM MASUK
        $data_produk_item_masuk->delete();

        $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Berhasil Melakukan Transaksi Item Masuk Faktur "'.$no_faktur.'"</b>
                </div>';

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => $pesan_alert
        ]);

        return redirect()->route('item-masuk.index');
    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    //PROSES HAPUS ITEM MASUK
    public function destroy($id)
    { 
      $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Item Masuk Berhasil Dihapus</b>
                </div>';

        if (!ItemMasuk::destroy($id)) {
          return redirect()->back();
        }

        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=> $pesan_alert
            ]);
        return redirect()->route('item-masuk.index');
    }

    //PROSES HAPUS TBS ITEM MASUK
    public function proses_hapus_tbs_item_masuk($id)
    { 
        if (!TbsItemMasuk::destroy($id)) {
          $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Tidak Berhasil Menghapus Produk</b>
                </div>';

            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => $pesan_alert
            ]);
        return back();
        }
        else{
          $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Berhasil Menghapus Produk</b>
                </div>';

            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => $pesan_alert
            ]);
        return back();
        }
    }

    //PROSES BATAL ITEM MASUK
    public function proses_hapus_semua_tbs_item_masuk()
    { 
        $session_id = session()->getId();
        $data_tbs_item_keluar = TbsItemMasuk::where('session_id', $session_id)->delete();; 
        $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Berhasil Membatalkan Item Masuk</b>
                </div>';

            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => $pesan_alert
            ]);
       return redirect()->route('item-masuk.index');
    }
}
