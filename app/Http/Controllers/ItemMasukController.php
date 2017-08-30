<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\ItemMasuk;  
use App\TbsItemMasuk;  
use Session;

class ItemMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            # code...
            $item_masuk = ItemMasuk::select(['id','nomor_faktur','keterangan','total','user_buat','user_edit','created_at','updated_at']);
            return Datatables::of($item_masuk)->addColumn('action', function($itemmasuk){
                    return view('datatable._action', [
                        'model'     => $itemmasuk,
                        'form_url'  => route('item-masuk.destroy', $itemmasuk->id),
                        'edit_url'  => route('item-masuk.edit', $itemmasuk->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Item Masuk dengan nomor faktur ' . $itemmasuk->nomor_faktur . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nomor_faktur', 'name' => 'nomor_faktur', 'title' => 'Nomor Faktur'])  
        ->addColumn(['data' => 'total', 'name' => 'total', 'title' => 'Total']) 
        ->addColumn(['data' => 'keterangan', 'name' => 'keterangan', 'title' => 'Keterangan']) 
        ->addColumn(['data' => 'user_buat', 'name' => 'user_buat', 'title' => 'User Buat']) 
        ->addColumn(['data' => 'user_edit', 'name' => 'user_edit', 'title' => 'User Edit']) 
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu Buat']) 
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('item_masuk.index')->with(compact('html'));
    }


    public function create(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            # code...
            $tbs_item_masuk = TbsItemMasuk::with(['produk']);
            return Datatables::of($tbs_item_masuk)->addColumn('action', function($tbsitemmasuk){
                    return view('item_masuk._hapus_produk', [
                        'model'     => $tbsitemmasuk,
                        'form_url'  => route('item-masuk.proses_hapus_tbs_item_masuk', $tbsitemmasuk->id),  
                        'confirm_message'   => 'Yakin Mau Menghapus Produk ?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
        ->addColumn(['data' => 'produk.kode_barang', 'name' => 'produk.kode_barang', 'title' => 'Kode Produk'])  
        ->addColumn(['data' => 'produk.nama_barang', 'name' => 'produk.nama_barang', 'title' => 'Nama Produk']) 
        ->addColumn(['data' => 'jumlah_produk', 'name' => 'jumlah_produk', 'title' => 'Jumlah'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Hapus', 'orderable' => false, 'searchable'=>false]);

        return view('item_masuk.create')->with(compact('html'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function proses_tambah_tbs_item_masuk(Request $request)
    {
        //
         $this->validate($request, [
            'id_produk'     => 'required',
            'jumlah_produk'     => 'required',
            ]);

         $tbsitemmasuk = TbsItemMasuk::create([
            'id_produk' =>$request->id_produk,
            'jumlah_produk' =>$request->jumlah_produk,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Produk"
            ]);
        return back();
    }

    public function store(Request $request)
    {
        //
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

    public function proses_hapus_tbs_item_masuk($id)
    {
        //
        if (!TbsItemMasuk::destroy($id)) {
            return redirect()->back();
        }
        else{
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Produk Berhasil Di Hapus"
            ]);
        return back();
        }
    }

    public function proses_hapus_semua_tbs_item_masuk()
    { 
        $data_tbs_item_masuk = TbsItemMasuk::all();
        foreach ($data_tbs_item_masuk as $data_tbs_item_masuks) {
            $data_tbs_item_masuks->delete();
        }
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Produk Berhasil Di Hapus"
            ]);
       return redirect()->route('item-masuk.index');
    }
}
