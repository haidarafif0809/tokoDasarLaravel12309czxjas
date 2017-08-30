<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB; 
use App\Gudang;  
use Session;

class GudangController extends Controller
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
            $master_gudang = Gudang::select(['id','kode_gudang','nama_gudang']);
            return Datatables::of($master_gudang)->addColumn('action', function($gudang){
                    return view('datatable._action', [
                        'model'     => $gudang,
                        'form_url'  => route('master_gudang.destroy', $gudang->id),
                        'edit_url'  => route('master_gudang.edit', $gudang->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Gudang ' . $gudang->nama_gudang . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_gudang', 'name' => 'kode_gudang', 'title' => 'Kode Gudang']) 
        ->addColumn(['data' => 'nama_gudang', 'name' => 'nama_gudang', 'title' => 'Nama Gudang']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_gudang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('master_gudang.create');
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
            'kode_gudang'     => 'required|unique:gudangs,kode_gudang,',
            'nama_gudang'     => 'required',
            ]);

         $gudang = Gudang::create([
            'kode_gudang' =>$request->kode_gudang,
            'nama_gudang' =>$request->nama_gudang,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Gudang $request->nama_gudang"
            ]);
        return redirect()->route('master_gudang.index');
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
        $master_gudang = Gudang::find($id);
        return view('master_gudang.edit')->with(compact('master_gudang')); 
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
            'kode_gudang'     => 'required|unique:gudangs,kode_gudang,'. $id,
            'nama_gudang'     => 'required',
            ]);

        Gudang::where('id', $id)->update([
            'kode_gudang' =>$request->kode_gudang,
            'nama_gudang' =>$request->nama_gudang,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Gudang $request->nama_gudang"
            ]);

        return redirect()->route('master_gudang.index');
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
        if (!Gudang::destroy($id)) {
            return redirect()->back();
        }
        else{
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Gudang Berhasil Di Hapus"
            ]);
        return redirect()->route('master_gudang.index');
        }
    }
}
