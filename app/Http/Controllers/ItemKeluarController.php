<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\ItemKeluar; 
use App\TbsItemKeluar;  
use App\Barang;  
use Session;

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
            $item_keluar = ItemKeluar::select(['id', 'nomor_faktur', 'keterangan', 'total', 'user_buat', 'user_edit','created_at', 'updated_at']);
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
            ->addColumn(['data' => 'user_buat', 'name' => 'user_buat', 'title' => 'Petugas'])
            ->addColumn(['data' => 'user_edit', 'name' => 'user_edit', 'title' => 'Petugas Edit'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit'])
            ->addColumn(['action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('item_keluar.index')->with(compact('html'));

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
    public function store(Request $request)
    {
         $this->validate($request, [
            'nama_satuan'     => 'required|unique:satuans,nama_satuan,'
            ]);

         $satuan = ItemKeluar::create([
            'nama_satuan' =>$request->nama_satuan
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Satuan $request->nama_satuan"
            ]);
        return redirect()->route('master_satuan.index');
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
    public function destroy($id)
    {
        //
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
      
        $pesan_alert = "Produk '".$data_barang->nama_barang."' Sudah Ada, Silakan Pilih Produk Lain !";

//JIKA PRODUK YG DIPILIH SUDAH ADA DI TBS
        if ($data_tbs > 0) {
       
            Session::flash("flash_notification", [
              "level"=>"warning",
              "message"=> $pesan_alert
            ]); 

            return back();
        }
        else{

            $tbsitemkeluar = TbsItemKeluar::create([
                'id_produk' =>$request->id_produk,              
                'session_id' => $session_id,
                'jumlah_produk' =>$request->jumlah_produk,
            ]);

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menambah Produk"
                ]);
            return back();

        }
    }

//PROSES BARCODE TBS ITEM KELUAR
    public function proses_barcode_item_keluar(Request $request){    
        $this->validate($request, [
            'barcode'     => 'required',
        ]);

        $data_produk = Barang::select(['id', 'kode_barcode'])->where('kode_barcode', $request->barcode)->first();

        $tbsitemkeluar = TbsItemKeluar::create([
            'id_produk' =>$data_produk->id,
            'session_id' => session()->getId(),
            'jumlah_produk' => '1',
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Produk"
            ]);
        return back();
    }

//PROSES HAPUS TBS ITEM KELUAR
    public function proses_hapus_tbs_item_keluar($id){

        if (!TbsItemKeluar::destroy($id)) {
            return redirect()->back();
        }
        else{
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Berhasil Menghapus Produk"
            ]);
        return back();
        }
    }

//PROSES BATAL TBS ITEM KELUAR
    public function proses_hapus_semua_tbs_item_keluar(){
        $data_tbs_item_keluar = TbsItemKeluar::all();
        foreach ($data_tbs_item_keluar as $data_tbs_item_keluars) {
            $data_tbs_item_keluars->delete();
        }
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Berhasil Membatalkan Item Keluar"
            ]);
       return back();
    }

}