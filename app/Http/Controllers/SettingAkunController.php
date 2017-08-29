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
    public function index(Request $request){
        return view('master_setting_akun.index');
    }

    public function table_data_item(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','data_item');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                    

                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 

    public function table_akun_pembelian(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','akun_pembelian');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                    

                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 

    public function table_akun_retur_pembelian(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','akun_retur_pembelian');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                 
                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 

    public function table_akun_penjualan(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','akun_penjualan');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                     
                    return $data_daftar_akun ;  
                }
               
            })->make(true);
 
    } 

    public function table_akun_retur_penjualan(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','akun_retur_penjualan');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                     
                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 
    
    public function table_akun_hutang_piutang(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','akun_hutang_piutang');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                     
                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 

    public function table_modal_dan_laba(Request $request){
        $master_setting_akun = SettingAkun::with(['daftar_akun'])->where('group_setting_akun','modal_dan_laba');
        return Datatables::of($master_setting_akun)->addColumn('action', function($setting_akun){ 
                    return view('master_setting_akun._action', [ 
                        'model'     => $setting_akun,
                        'form_url'  => route('master_setting_akun.destroy', $setting_akun->id),
                        'edit_url'  => route('master_setting_akun.edit', $setting_akun->id),
                        ]);                
                })->addColumn('akun', function($data_setting_akun){

                if ($data_setting_akun->id_akun == NULL) {
                    return "Akun Belum di kaitkan";
                }
                else {
                    $daftar_akun = DaftarAkun::find($data_setting_akun->id_akun);
                    $data_daftar_akun = $daftar_akun->kode_daftar_akun ." - ". $daftar_akun->nama_daftar_akun;                     
                    return $data_daftar_akun ; 
                }
               
            })->make(true);
 
    } 

    public function edit($id)
    {
        //
        $master_setting_akun = SettingAkun::find($id);
        return view('master_setting_akun.edit')->with(compact('master_setting_akun')); 
    }

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
            "message"=>"Berhasil Mengubah Setting Akun $request->display_nama_setting_akun"
            ]);

        return view('master_setting_akun.index');
    }
 
}
