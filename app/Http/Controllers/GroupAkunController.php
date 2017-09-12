<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\GroupAkun;  
use Session;
use Auth;
use Laratrust;

class GroupAkunController extends Controller
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
            $master_group_akun = GroupAkun::select(['id','kode_group_akun','nama_group_akun','parent','kategori_akun','tipe_akun','user_buat','user_edit','created_at','updated_at']);
            return Datatables::of($master_group_akun)->addColumn('action', function($group_akun){
                    return view('datatable._action', [
                        'model'     => $group_akun,
                        'form_url'  => route('master_group_akun.destroy', $group_akun->id),
                        'edit_url'  => route('master_group_akun.edit', $group_akun->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Group Akun ' . $group_akun->nama_group_akun . '?',
                        'permission_ubah' => Laratrust::can('edit_group_akun'),
                        'permission_hapus' => Laratrust::can('hapus_group_akun'),
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_group_akun', 'name' => 'kode_group_akun', 'title' => 'Kode Group Akun']) 
        ->addColumn(['data' => 'nama_group_akun', 'name' => 'nama_group_akun', 'title' => 'Nama Group Akun']) 
        ->addColumn(['data' => 'parent', 'name' => 'parent', 'title' => 'Dari Sub']) 
        ->addColumn(['data' => 'kategori_akun', 'name' => 'kategori_akun', 'title' => 'Kategori Akun']) 
        ->addColumn(['data' => 'tipe_akun', 'name' => 'tipe_akun', 'title' => 'Tipe Akun']) 
        ->addColumn(['data' => 'user_buat', 'name' => 'user_buat', 'title' => 'User Buat']) 
        ->addColumn(['data' => 'user_edit', 'name' => 'user_edit', 'title' => 'User Edit']) 
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu Buat']) 
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu Edit']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_group_akun.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_group_akun.create');
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
            'kode_group_akun'     => 'required|unique:group_akuns,kode_group_akun,',
            'nama_group_akun'     => 'required|unique:group_akuns,nama_group_akun,',
            'parent'     => 'required',
            'kategori_akun'     => 'required',
            'tipe_akun'     => 'required'
            ]);
         $user = Auth::user()->name;
         $group_akun = GroupAkun::create([
            'kode_group_akun' =>$request->kode_group_akun,
            'nama_group_akun' =>$request->nama_group_akun,
            'parent' =>$request->parent,
            'kategori_akun' =>$request->kategori_akun,
            'tipe_akun' =>$request->tipe_akun,
            'user_buat' =>$user,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Group Akun $request->nama_group_akun"
            ]);
        return redirect()->route('master_group_akun.index');
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
        $master_group_akun = GroupAkun::find($id);
        return view('master_group_akun.edit')->with(compact('master_group_akun')); 
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
            'kode_group_akun'     => 'required|unique:group_akuns,kode_group_akun,' .$id,
            'nama_group_akun'     => 'required|unique:group_akuns,nama_group_akun,' .$id,
            'parent'     => 'required',
            'kategori_akun'     => 'required',
            'tipe_akun'     => 'required'
            ]);
         $user = Auth::user()->name;

        GroupAkun::where('id', $id)->update([
            'kode_group_akun' =>$request->kode_group_akun,
            'nama_group_akun' =>$request->nama_group_akun,
            'parent' =>$request->parent,
            'kategori_akun' =>$request->kategori_akun,
            'tipe_akun' =>$request->tipe_akun,
            'user_edit' =>$user,
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Group Akun $request->nama_group_akun"
            ]);

        return redirect()->route('master_group_akun.index');
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
        if(!GroupAkun::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Group Akun Berhasil Di Hapus"
            ]);
        return redirect()->route('master_group_akun.index');
        }
    }
}
