<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Suplier;  
use Session;

class SuplierController extends Controller
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
            $master_suplier = Suplier::select(['id','nama_suplier','alamat','no_telpon']);
            return Datatables::of($master_suplier)->addColumn('action', function($suplier){
                    return view('datatable._action', [
                        'model'     => $suplier,
                        'form_url'  => route('master_suplier.destroy', $suplier->id),
                        'edit_url'  => route('master_suplier.edit', $suplier->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Suplier ' . $suplier->nama_suplier . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_suplier', 'name' => 'nama_suplier', 'title' => 'Nama Suplier'])
        ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat Suplier']) 
        ->addColumn(['data' => 'no_telpon', 'name' => 'no_telpon', 'title' => 'Nomor Telpon'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_suplier.index')->with(compact('html'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_suplier.create');
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
            'nama_suplier'     => 'required', 
            'alamat'   => 'max:225',
            'no_telpon'=> 'max:225'
            ]);

         $suplier = Suplier::create([
            'nama_suplier' =>$request->nama_suplier,
            'alamat'=>$request->alamat,
            'no_telpon'=>$request->no_telpon]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Suplier $request->nama_suplier"
            ]);
        return redirect()->route('master_suplier.index');
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
        $master_suplier = Suplier::find($id);
        return view('master_suplier.edit')->with(compact('master_suplier')); 
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
            'nama_suplier'     => 'required', 
            'alamat'   => 'max:225',
            'no_telpon'=> 'max:225'
            ]);

        Suplier::where('id', $id)->update([
            'nama_suplier' =>$request->nama_suplier,
            'alamat'=>$request->alamat,
            'no_telpon'=>$request->no_telpon]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Suplier $request->nama_suplier"
            ]);

        return redirect()->route('master_suplier.index');
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
       
        if(!Suplier::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Suplier Berhasil Di Hapus"
            ]);
        return redirect()->route('master_suplier.index');
        }
    }
}
