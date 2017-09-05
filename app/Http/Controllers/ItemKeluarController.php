<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\ItemKeluar; 
use App\TbsItemKeluar;
use App\DetailItemKeluar;  
use App\Barang;  
use Session;
use Auth;

class ItemKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $item_keluar = ItemKeluar::with(['user_buat', 'user_edit']);
            return Datatables::of($item_keluar)->addColumn('action', function($itemkeluar){
                return view('datatable._action', [
                    'model'             => $itemkeluar,
                    'form_url'          => route('item-keluar.destroy', $itemkeluar->id),
                    'edit_url'          => route('item-keluar.edit', $itemkeluar->id),
                    'confirm_message'   => 'Anda Yakin Ingin Menghapus Item Keluar '.$itemkeluar->nomor_faktur.'?'
                ]);
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'nomor_faktur', 'name' => 'nomor_faktur', 'title' => 'No. Faktur'])
            ->addColumn(['data' => 'total', 'name' => 'total', 'title' => 'Total'])
            ->addColumn(['data' => 'keterangan', 'name' => 'keterangan', 'title' => 'Keterangan'])
            ->addColumn(['data' => 'user_buat.name', 'name' => 'user_buat.name', 'title' => 'Petugas'])
            ->addColumn(['data' => 'user_edit.name', 'name' => 'user_edit.name', 'title' => 'Petugas Edit'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('item_keluar.index')->with(compact('html'));

    }

    public function no_faktur(){
      //PROSES MEMBUAT NO. FAKTUR ITEM KELUAR
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
      
      //ambil bulan dan no_faktur dari tanggal item_keluar terakhir
         $item_keluar = ItemKeluar::select([DB::raw('MONTH(created_at) bulan'), 'nomor_faktur'])->first();

         if ($item_keluar != NULL) {
          $ambil_nomor = substr($item_keluar->nomor_faktur, 0, -8);
          $bulan_akhir = $item_keluar->bulan;
         }
         else{
          $ambil_nomor = 1;
          $bulan_akhir = 13;
         }
         
      /*jika bulan terakhir dari item_keluar tidak sama dengan bulan sekarang, 
      maka nomor nya kembali mulai dari 1, jika tidak maka nomor terakhir ditambah dengan 1
      */
        if ($bulan_akhir != $bulan_sekarang) {
          $no_faktur = "1/IK/".$data_bulan_terakhir."/".$tahun_terakhir;
        }
        else {
          $nomor = 1 + $ambil_nomor ;
          $no_faktur = $nomor."/IK/".$data_bulan_terakhir."/".$tahun_terakhir;
        }

        return $no_faktur;
      //PROSES MEMBUAT NO. FAKTUR ITEM KELUAR
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Builder $htmlBuilder){
        if ($request->ajax()) {
            $session_id = session()->getId();
            $tbs_item_keluar = TbsItemKeluar::with(['produk'])->where('session_id', $session_id)->get();
                return Datatables::of($tbs_item_keluar)->addColumn('action', function($tbsitemkeluar){
                return view('item_keluar._hapus_produk', [
                        'model'             => $tbsitemkeluar,
                        'form_url'          => route('item-keluar.proses_hapus_tbs_item_keluar', $tbsitemkeluar->id_tbs_item_keluar),  
                        'confirm_message'   => 'Anda Yakin Ingin Menghapus Produk ?'
                        ]);
                })->make(true);
        }
        
        $html = $htmlBuilder
            ->addColumn(['data' => 'produk.kode_barang', 'name' => 'produk.kode_barang', 'title' => 'Kode Produk'])  
            ->addColumn(['data' => 'produk.nama_barang', 'name' => 'produk.nama_barang', 'title' => 'Nama Produk']) 
            ->addColumn(['data' => 'jumlah_produk', 'name' => 'jumlah_produk', 'title' => 'Jumlah'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Hapus', 'orderable' => false, 'searchable'=>false]);

        return view('item_keluar.create')->with(compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  //PROSES SELESAI TRANSAKSI ITEM KELUAR
    public function store(Request $request) {

        $session_id = session()->getId();
        $user = Auth::user()->id;
        $no_faktur = $this->no_faktur();

      //INSERT DETAIL ITEM KELUAR
        $data_produk_item_keluar = TbsItemKeluar::where('session_id', $session_id);
        foreach ($data_produk_item_keluar->get() as $data_tbs) {
            $detail_item_keluar = DetailItemKeluar::create([
                'id_produk' =>$data_tbs->id_produk,              
                'no_faktur' => $no_faktur,
                'jumlah_produk' =>$data_tbs->jumlah_produk,
            ]);
        }

      //INSERT ITEM KELUAR
        if ($request->keterangan == "") {
          $keterangan = "-";
        }
        else{
          $keterangan = $request->keterangan;
        }

        $itemkeluar = ItemKeluar::create([
            'nomor_faktur' => $no_faktur,
            'keterangan' =>$keterangan,
            'total' => '85000',
            'user_buat' => $user,
            'user_edit' => $user,
        ]);
        
      //HAPUS TBS ITEM KELUAR
        $data_produk_item_keluar->delete();

        $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Berhasil Melakukan Transaksi Item Keluar Faktur "'.$no_faktur.'"</b>
                </div>';

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => $pesan_alert
        ]);

        return redirect()->route('item-keluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Item Keluar Berhasil Dihapus</b>
                </div>';

        ItemKeluar::destroy($id);  

        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=> $pesan_alert
            ]);
        return redirect()->route('item-keluar.index');

    }

//PROSES TAMBAH TBS ITEM KELUAR
    public function proses_tambah_tbs_item_keluar(Request $request){
        $this->validate($request, [
            'id_produk'     => 'required',
            'jumlah_produk' => 'required',
        ]);

        $session_id = session()->getId();

        $data_tbs = TbsItemKeluar::select('id_produk')
        ->where('id_produk', $request->id_produk)
        ->where('session_id', $session_id)
        ->count();
        
        $data_barang = Barang::select('nama_barang')->where('id', $request->id_produk)->first();
      
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

            $tbsitemkeluar = TbsItemKeluar::create([
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
    public function proses_barcode_item_keluar(Request $request){    
        $this->validate($request, [
            'barcode'     => 'required',
        ]);

        $data_produk = Barang::select(['id', 'kode_barcode', 'nama_barang'])->where('kode_barcode', $request->barcode)->first();

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

            return back();
        }
        else{

          $tbsitemkeluar = TbsItemKeluar::create([
              'id_produk' =>$data_produk->id,
              'session_id' => session()->getId(),
              'jumlah_produk' => '1',
          ]);

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
          return back();

        }
    }

//PROSES HAPUS TBS ITEM KELUAR
    public function proses_hapus_tbs_item_keluar($id){

        if (!TbsItemKeluar::destroy($id)) {
            return redirect()->back();
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

//PROSES BATAL TBS ITEM KELUAR
    public function proses_hapus_semua_tbs_item_keluar(){
      $session_id = session()->getId();
      
        $data_tbs_item_keluar = TbsItemKeluar::where('session_id', $session_id);
        foreach ($data_tbs_item_keluar as $data_tbs_item_keluars) {
            $data_tbs_item_keluars->delete();
        }

        $pesan_alert = 
               '<div class="container-fluid">
                    <div class="alert-icon">
                    <i class="material-icons">check</i>
                    </div>
                    <b>Sukses : Berhasil Membatalkan Item Keluar</b>
                </div>';

            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => $pesan_alert
            ]);
       return back();
    }


}