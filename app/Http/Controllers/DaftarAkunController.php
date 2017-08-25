<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\DaftarAkun;  
use Session;
use Auth;

class DaftarAkunController extends Controller
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
            $master_daftar_akun = DaftarAkun::select(['id','kode_daftar_akun','nama_daftar_akun','group_akun','kategori_akun','tipe_akun']);
            return Datatables::of($master_daftar_akun)->addColumn('action', function($daftar_akun){
                    return view('datatable._action', [
                        'model'     => $daftar_akun,
                        'form_url'  => route('master_daftar_akun.destroy', $daftar_akun->id),
                        'edit_url'  => route('master_daftar_akun.edit', $daftar_akun->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Daftar Akun ' . $daftar_akun->nama_daftar_akun . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_daftar_akun', 'name' => 'kode_daftar_akun', 'title' => 'Kode Akun']) 
        ->addColumn(['data' => 'nama_daftar_akun', 'name' => 'nama_daftar_akun', 'title' => 'Nama Akun'])  
        ->addColumn(['data' => 'kategori_akun', 'name' => 'kategori_akun', 'title' => 'Kategori Akun']) 
        ->addColumn(['data' => 'group_akun', 'name' => 'group_akun', 'title' => 'Sub Akun']) 
        ->addColumn(['data' => 'tipe_akun', 'name' => 'tipe_akun', 'title' => 'Tipe Akun'])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_daftar_akun.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_daftar_akun.create');
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
            'kode_daftar_akun'     => 'required',
            'nama_daftar_akun'     => 'required',
            'group_akun'     => '',
            'kategori_akun'     => 'required',
            'tipe_akun'     => 'required'
            ]);
         $user = Auth::user()->name;
         $daftar_akun = DaftarAkun::create([
            'kode_daftar_akun' =>$request->kode_daftar_akun,
            'nama_daftar_akun' =>$request->nama_daftar_akun,
            'group_akun' =>$request->group_akun,
            'kategori_akun' =>$request->kategori_akun,
            'tipe_akun' =>$request->tipe_akun,
            'user_buat' =>$user,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Daftar Akun $request->nama_daftar_akun"
            ]);
        return redirect()->route('master_daftar_akun.index');
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
        $master_daftar_akun = DaftarAkun::find($id);
        return view('master_daftar_akun.edit')->with(compact('master_daftar_akun')); 
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
            'kode_daftar_akun'     => 'required',
            'nama_daftar_akun'     => 'required',
            'group_akun'     => '',
            'kategori_akun'     => 'required',
            'tipe_akun'     => 'required'
            ]);

         $user = Auth::user()->name; 
        DaftarAkun::where('id', $id)->update([
            'kode_daftar_akun' =>$request->kode_daftar_akun,
            'nama_daftar_akun' =>$request->nama_daftar_akun,
            'group_akun' =>$request->group_akun,
            'kategori_akun' =>$request->kategori_akun,
            'tipe_akun' =>$request->tipe_akun,
            'user_edit' =>$user,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Group Daftar $request->nama_daftar_akun"
            ]);

        return redirect()->route('master_daftar_akun.index');
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
        if(!DaftarAkun::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Daftar Akun Berhasil Di Hapus"
            ]);
        return redirect()->route('master_daftar_akun.index');
        }
    }
}
