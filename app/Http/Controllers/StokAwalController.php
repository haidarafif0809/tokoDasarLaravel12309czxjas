<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\StokAwal; 
use App\Barang;    
use Auth;
use Session;
use Laratrust;

class StokAwalController extends Controller
{
    //
    public function index(Request $request, Builder $htmlBuilder)
    {
    if ($request->ajax()) {
            $stok_awal = StokAwal::with(['produk','user_edit','user_buat'])->get();
            return Datatables::of($stok_awal)->addColumn('action', function($stokawal){
                return view('stok_awal._action', [
                    'model'             => $stokawal,
                    'form_url'          => route('stok-awal.destroy', $stokawal->id),
                    'edit_url'          => route('stok-awal.edit', $stokawal->id),
                    'confirm_message'   => 'Anda Yakin Ingin Menghapus Stok Awal '.$stokawal->nomor_faktur.'?',
                    'permission_ubah' => Laratrust::can('edit_stok_awal'),
                    'permission_hapus' => Laratrust::can('hapus_stok_awal'), 
                ]);
            })->addColumn('data_barang', function($data_stok_awal){
 
                    $barang = Barang::find($data_stok_awal->id_produk);
                    $data_barang = $barang->kode_barang ." - ". $barang->nama_barang;                    

                    return $data_barang ;  
               
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'nomor_faktur', 'name' => 'nomor_faktur', 'title' => 'No. Faktur'])
            ->addColumn(['data' => 'data_barang', 'name' => 'data_barang', 'title' => 'Produk'])
            ->addColumn(['data' => 'jumlah_produk', 'name' => 'jumlah_produk', 'title' => 'Jumlah Produk'])
            ->addColumn(['data' => 'keterangan', 'name' => 'keterangan', 'title' => 'Keterangan'])
            ->addColumn(['data' => 'user_buat.name', 'name' => 'user_buat.name', 'title' => 'Petugas'])
            ->addColumn(['data' => 'user_edit.name', 'name' => 'user_edit.name', 'title' => 'Petugas Edit'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit'])
            ->addColumn(['data'=>'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('stok_awal.index')->with(compact('html'));

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
      
      //ambil bulan dan no_faktur dari tanggal stok_awal terakhir
         $stok_awal = StokAwal::select([DB::raw('MONTH(created_at) bulan'), 'nomor_faktur'])->orderBy('id','DESC')->first();

         if ($stok_awal != NULL) {
          $pisah_nomor = explode("/", $stok_awal->nomor_faktur);
          $ambil_nomor = $pisah_nomor[0];
          $bulan_akhir = $stok_awal->bulan;
         }
         else{
          $ambil_nomor = 1;
          $bulan_akhir = 13;
         }
         
      /*jika bulan terakhir dari stok_awal tidak sama dengan bulan sekarang, 
      maka nomor nya kembali mulai dari 1, jika tidak maka nomor terakhir ditambah dengan 1
      */
        if ($bulan_akhir != $bulan_sekarang) {
          $no_faktur = "1/SA/".$data_bulan_terakhir."/".$tahun_terakhir;
        }
        else {
          $nomor = 1 + $ambil_nomor ;
          $no_faktur = $nomor."/SA/".$data_bulan_terakhir."/".$tahun_terakhir;
        }

        return $no_faktur;
      //PROSES MEMBUAT NO. FAKTUR STOK AWAL
    }


//PROSES TAMBAH STOK AWAL
    public function proses_tambah_stok_awal(Request $request){
        $this->validate($request, [
            'id_produk'     => 'required',
            'jumlah_produk' => 'required',
        ]);

        $no_faktur = $this->no_faktur();
        $user = Auth::user()->id;

		
        $data_tbs = StokAwal::select('id_produk')
        ->where('id_produk', $request->id_produk)
        ->count();
        
        $data_barang = Barang::select('nama_barang')->where('id', $request->id_produk)->first();
      
        $pesan_alert = "Produk '".$data_barang->nama_barang."' Sudah Ada, Silakan Pilih Produk Lain !";

//JIKA PRODUK YG DIPILIH SUDAH ADA 
        if ($data_tbs > 0) {
       
            Session::flash("flash_notification", [
              "level"=>"warning",
              "message"=> $pesan_alert
            ]); 

        return redirect()->route('stok-awal.index');
        }
        else{

            $stokawal = StokAwal::create([
                'id_produk' =>$request->id_produk,              
                'nomor_faktur' => $no_faktur,
                'jumlah_produk' =>$request->jumlah_produk,
                'keterangan' =>$request->keterangan,
                'user_buat' => $user,
            	'user_edit' => $user,
            ]);

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menambah Produk Stok Awal"
                ]);
        return redirect()->route('stok-awal.index');

        }
    }

//hapus data STOK AWAL 
        public function destroy($id){
        //menghapus data dengan pengecekan alert /peringatan
        $stokawal = StokAwal::where('id',$id); 
 
        if (!StokAwal::destroy($id)) {
          return redirect()->back();
        }

        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Stok Awal Berhasil Di Hapus"
            ]);
        return redirect()->route('stok-awal.index');
        
    }
//hapus data STOK AWAL 


    public function edit($id)
    {//
        $stokawal = StokAwal::find($id);

        return view('stok_awal.edit')->with(compact('stokawal')); 
    }

    public function update(Request $request, $id)
    {
       //
        $this->validate($request, [
            
            'jumlah_produk' => 'required',
        ]);

         $user = Auth::user()->id;

        StokAwal::where('id', $id)->update([
                'jumlah_produk' =>$request->jumlah_produk,
                'keterangan' =>$request->keterangan,
                'user_edit' =>$user,
            ]);


        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Stok Awal"
            ]);

        return redirect()->route('stok-awal.index');
    }



}
