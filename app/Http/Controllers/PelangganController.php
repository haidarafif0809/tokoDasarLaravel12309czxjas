<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;  
use Session;

class PelangganController extends Controller
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
            $master_pelanggan = Pelanggan::select(['id','kode_pelanggan','nama_pelanggan','no_telpon','tanggal_lahir','alamat','level_harga','default_pelanggan','flafon','flafon_usia']);
            return Datatables::of($master_pelanggan)->addColumn('action', function($pelanggan){
                    return view('datatable._action', [
                        'model'     => $pelanggan,
                        'form_url'  => route('master_pelanggan.destroy', $pelanggan->id),
                        'edit_url'  => route('master_pelanggan.edit', $pelanggan->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Pelanggan ' . $pelanggan->nama_pelanggan . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_pelanggan', 'name' => 'kode_pelanggan', 'title' => 'Kode Pelanggan']) 
        ->addColumn(['data' => 'nama_pelanggan', 'name' => 'nama_pelanggan', 'title' => 'Nama Pelanggan'])  
        ->addColumn(['data' => 'level_harga', 'name' => 'level_harga', 'title' => 'Level Harga']) 
        ->addColumn(['data' => 'tanggal_lahir', 'name' => 'tanggal_lahir', 'title' => 'Tanggal Lahir']) 
        ->addColumn(['data' => 'no_telpon', 'name' => 'no_telpon', 'title' => 'Nomor Telpon']) 
        ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_pelanggan.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_pelanggan.create');
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
            'kode_pelanggan'     => 'required|unique:pelanggans,kode_pelanggan,',
            'nama_pelanggan'     => 'required|unique:pelanggans,nama_pelanggan,',
            'level_harga'     => 'required',
            'tanggal_lahir'     => 'required',
            'no_telpon'     => 'required',
            'alamat'     => 'required'
            ]);

         $pelanggan = Pelanggan::create([
            'kode_pelanggan' =>$request->kode_pelanggan,
            'nama_pelanggan' =>$request->nama_pelanggan,
            'level_harga' =>$request->level_harga,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'no_telpon' =>$request->no_telpon,
            'alamat' =>$request->alamat,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Pelanggan $request->nama_pelanggan"
            ]);
        return redirect()->route('master_pelanggan.index');
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
        $master_pelanggan = Pelanggan::find($id);
        return view('master_pelanggan.edit')->with(compact('master_pelanggan')); 
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
            'kode_pelanggan'     => 'required|unique:pelanggans,kode_pelanggan,' .$id,
            'nama_pelanggan'     => 'required|unique:pelanggans,nama_pelanggan,' .$id,
            'level_harga'     => 'required',
            'tanggal_lahir'     => 'required',
            'no_telpon'     => 'required',
            'alamat'     => 'required'
            ]);

        Pelanggan::where('id', $id)->update([
            'kode_pelanggan' =>$request->kode_pelanggan,
            'nama_pelanggan' =>$request->nama_pelanggan,
            'level_harga' =>$request->level_harga,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'no_telpon' =>$request->no_telpon,
            'alamat' =>$request->alamat,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Pelanggan $request->nama_pelanggan"
            ]);

        return redirect()->route('master_pelanggan.index');
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
        if(!Pelanggan::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Pelanggan Berhasil Di Hapus"
            ]);
        return redirect()->route('master_pelanggan.index');
        }
    }
}
