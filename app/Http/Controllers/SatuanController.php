<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Satuan;  
use App\Barang;  
use Session;

class SatuanController extends Controller
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
            $master_satuan = Satuan::select(['id','nama_satuan']);
            return Datatables::of($master_satuan)->addColumn('action', function($satuan){
                    return view('datatable._action', [
                        'model'     => $satuan,
                        'form_url'  => route('master_satuan.destroy', $satuan->id),
                        'edit_url'  => route('master_satuan.edit', $satuan->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Satuan ' . $satuan->nama_satuan . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_satuan', 'name' => 'nama_satuan', 'title' => 'Nama Satuan']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_satuan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_satuan.create');
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
            'nama_satuan'     => 'required|unique:satuans,nama_satuan,'
            ]);

         $satuan = Satuan::create([
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
        $master_satuan = Satuan::find($id);
        return view('master_satuan.edit')->with(compact('master_satuan')); 
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
            'nama_satuan'     => 'required|unique:satuans,nama_satuan,'. $id,
            ]);

        Satuan::where('id', $id)->update([
            'nama_satuan' =>$request->nama_satuan
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Satuan $request->nama_satuan"
            ]);

        return redirect()->route('master_satuan.index');
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
        $produk = Barang::where('satuans_id',$id); 
 
        if ($produk->count() > 0) {
        // menyiapkan pesan error
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Satuan Tidak Bisa Di Hapus Karena Masih Memiliki Produk"
            ]);

        return redirect()->route('master_satuan.index');      
        } 
        else{
        Satuan::destroy($id);
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Satuan Berhasil Di Hapus"
            ]);
        return redirect()->route('master_satuan.index');
        }
    }
}
