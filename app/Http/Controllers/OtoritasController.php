<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Role; //Modal
use App\Otoritas; //Modal 
use Auth;
use App\Permission;
use Session;
use App\PermissionRole;
use Laratrust;

class OtoritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $master_otoritas = Role::select(['id','name','display_name','description']);
            return Datatables::of($master_otoritas)->addColumn('action', function($master_otoritas){
                return view('master_otoritas._action', [
                    'model'             => $master_otoritas,
                    'form_url'          => route('master_otoritas.destroy', $master_otoritas->id),
                    'edit_url'          => route('master_otoritas.edit', $master_otoritas->id),
                    'permission_url'          => route('otoritas.permission', $master_otoritas->id),
                    'confirm_message'   => 'Apakah Anda Yakin Ingin Menghapus Block' .$master_otoritas->nama_block. '?',
                    'permission_ubah' => Laratrust::can('edit_otoritas'),
                    'permission_hapus' => Laratrust::can('hapus_otoritas'),
                    'permission_otoritas' => Laratrust::can('permission_otoritas'),
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
        ->addColumn(['data' => 'display_name', 'name' => 'display_name', 'title' => 'Display Nama'])
        ->addColumn(['data' => 'description', 'name' => 'description', 'title' => 'Deskripsi'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('master_otoritas.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master_otoritas.create');
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
            'name' => 'required|unique:roles,name,',
            'display_name' => 'required|unique:roles,display_name',
            'description' => ' '
        ]);
    
        $master_otoritas = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil Menambah Otoritas $master_otoritas->display_name"
        ]);

        return redirect()->route('master_otoritas.index');
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
        $master_otoritas = Role::find($id);
        return view('master_otoritas.edit')->with(compact('master_otoritas'));
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
            'name'   => 'required|unique:roles,name,' .$id,
            'display_name'     => 'required|unique:roles,display_name,' .$id,
            'description'    => ' ',
            ]);

        Role::where('id', $id) ->update([ 
            'name' =>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Otoritas $request->display_name"
            ]);

        return redirect()->route('master_otoritas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        //menghapus data dengan pengecekan alert /peringatan
        $user = User_otoritas::where('role_id',$id); 
 
    if ($user->count() > 0) {
        // menyiapkan pesan error
        $html = 'Otoritas tidak bisa dihapus karena masih memiliki User'; 
        
        Session::flash("flash_notification", [
          "level"=>"danger",
          "message"=>$html
        ]); 

        return redirect()->route('master_otoritas.index');      
        }
    else{

        Role::destroy($id);

        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Otoritas Berhasil Di Hapus"
            ]);
        return redirect()->route('master_otoritas.index');
        }
    }


    public function setting_permission($id){

        $master_otoritas = Role::find($id);
        $permission_satuan = Permission::where('grup','satuan')->get();
        $permission_user = Permission::where('grup','user')->get();
        $permission_otoritas = Permission::where('grup','otoritas')->get();
        $permission_suplier = Permission::where('grup','suplier')->get();
        $permission_kategori_produk = Permission::where('grup','kategori_produk')->get();

        return view('master_otoritas.permission',['master_otoritas' => $master_otoritas,'permission_satuan' => $permission_satuan,'permission_user' => $permission_user,'permission_otoritas' => $permission_otoritas,'permission_suplier' => $permission_suplier,'permission_kategori_produk' => $permission_kategori_produk,]);
    }


    public function proses_setting_permission(Request $request,$id){
         $permission = Permission::all();
         $role = Role::find($id);

         foreach ($permission as $permissions ) {

            $permission_name = $permissions->name;
            //jika checkbox nya di centang
             if (isset($request->$permission_name)) {
                //jika permission role nya belum ada maka di kaitkan role dengen pemissionya
                if(PermissionRole::where('role_id',$id)->where('permission_id',$permissions->id)->count() == 0) {
                     $role->attachPermission($permissions);
                } 
              
             }
             //jika checkbox nya tidak di centang
             else {
                //jika permission role nya ada maka di hilangkan permissionnya 
                if(PermissionRole::where('role_id',$id)->where('permission_id',$permissions->id)->count() == 1) {
                     $role->detachPermission($permissions);
                } 
             }
         }

          Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Setting Permission <b> $role->display_name </b> Berhasil Dirubah"
            ]);
        return redirect()->route('master_otoritas.index');

    }
}
