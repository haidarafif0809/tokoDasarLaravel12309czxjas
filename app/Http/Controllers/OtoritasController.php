<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Role; //Modal
use App\Otoritas; //Modal 
use Auth;
use Session;

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
                return view('datatable._action', [
                    'model'             => $master_otoritas,
                    'form_url'          => route('master_otoritas.destroy', $master_otoritas->id),
                    'edit_url'          => route('master_otoritas.edit', $master_otoritas->id),
                    'confirm_message'   => 'Apakah Anda Yakin Ingin Menghapus Block' .$master_otoritas->nama_block. '?'
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
}
