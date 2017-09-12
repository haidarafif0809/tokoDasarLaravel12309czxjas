<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\KategoriBarang;  
use App\Barang;  
use Session;
use Laratrust;

class KategoriBarangController extends Controller
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
            $master_kategori_barang = KategoriBarang::select(['id','nama_kategori_barang']);
            return Datatables::of($master_kategori_barang)->addColumn('action', function($kategori_barang){
                    return view('datatable._action', [
                        'model'     => $kategori_barang,
                        'form_url'  => route('master_kategori_barang.destroy', $kategori_barang->id),
                        'edit_url'  => route('master_kategori_barang.edit', $kategori_barang->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Kategori Produk ' . $kategori_barang->nama_kategori_barang . '?',
                        'permission_ubah' => Laratrust::can('edit_kategori_produk'),
                        'permission_hapus' => Laratrust::can('hapus_kategori_produk'),
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_kategori_barang', 'name' => 'nama_kategori_barang', 'title' => 'Nama Kategori Produk']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_kategori_barang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_kategori_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'nama_kategori_barang'     => 'required|unique:kategori_barangs,nama_kategori_barang,'
            ]);

         $satuan = KategoriBarang::create([
            'nama_kategori_barang' =>$request->nama_kategori_barang
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Kategori Produk $request->nama_kategori_barang"
            ]);
        return redirect()->route('master_kategori_barang.index');
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
        $master_kategori_barang = KategoriBarang::find($id);
        return view('master_kategori_barang.edit')->with(compact('master_kategori_barang')); 
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
         $this->validate($request, [
            'nama_kategori_barang'     => 'required|unique:kategori_barangs,nama_kategori_barang,'. $id,
            ]);

        KategoriBarang::where('id', $id)->update([
            'nama_kategori_barang' =>$request->nama_kategori_barang
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Kategori Produk $request->nama_kategori_barang"
            ]);

        return redirect()->route('master_kategori_barang.index');
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
       
        //menghapus data dengan pengecekan alert /peringatan
        $produk = Barang::where('kategori_barangs_id',$id); 
 
        if ($produk->count() > 0) {
        // menyiapkan pesan error
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Kategori Produk Tidak Bisa Di Hapus Karena Masih Memiliki Produk"
            ]);

        return redirect()->route('master_kategori_barang.index');      
        }  
        else{

        KategoriBarang::destroy($id);
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Kategori Produk Berhasil Di Hapus"
            ]);
        return redirect()->route('master_kategori_barang.index');
        }
    }
}
