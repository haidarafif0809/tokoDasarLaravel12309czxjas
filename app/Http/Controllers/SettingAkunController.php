<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\SettingAkun;  
use App\DaftarAkun;  
use Session;
use Auth;

class SettingAkunController extends Controller
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
            $master_setting_akun = SettingAkun::with(['daftar_akun']);
            return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){
                    return view('master_setting_akun._action', [
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        'confirm_message'   => 'Yakin Mau Menghapus Group Akun ' . $setting_akun->nama_group_akun . '?'
                        ]);
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);

                    return $daftar_akun->nama_daftar_akun; 
                }
               
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_setting_akun', 'name' => 'nama_setting_akun', 'title' => 'Nama Setting Akun']) 
        ->addColumn(['data' => 'akun', 'name' => 'akun', 'title' => 'Akun', 'orderable' => false, 'searchable'=>false])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_setting_akun.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $master_setting_akun = SettingAkun::find($id);
        return view('master_setting_akun.edit')->with(compact('master_setting_akun')); 
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
            'id_akun'     => ' '
            ]);
 
        SettingAkun::where('id', $id)->update([ 
            'id_akun' =>$request->id_akun
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Setting Akun $request->nama_setting_akun"
            ]);

        return redirect()->route('master_setting_akun.index');
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
}
