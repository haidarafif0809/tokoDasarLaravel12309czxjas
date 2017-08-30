<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Satuan;
use App\Suplier;
use App\KategoriBarang;
use App\Barang;
use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        // datatable
        if ($request->ajax()) {
            # code...
            $data_barang = Barang::with(['satuan','kategoribarang']);
            return Datatables::of($data_barang)
            ->addColumn('semua_data_harga', function($produk){ 
                    return view('master_barang._action', [ 
                        'model'     => $produk, 
                        'id_produk'     => $produk->id, 
                        ]);
                })
            ->addColumn('harga_beli_baru',function($data_harga_beli){
                $harga_beli = number_format($data_harga_beli->harga_beli,0,',','.'); 
                return $harga_beli;
                })            
            ->addColumn('harga_jual_baru',function($data_harga_jual){
                $harga_jual = number_format($data_harga_jual->harga_jual,0,',','.'); 
                return $harga_jual;
                })
            ->addColumn('action', function($barang){ 
                return view('datatable._action',[

                        'model'             => $barang,
                        'form_url'          => route('master_barang.destroy',$barang->id),
                        'edit_url'          => route('master_barang.edit',$barang->id),
                        'confirm_message'   => 'Anda Yakin Mau Menghapus ' .$barang->nama_barang .' ?' 

                    ]); 
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_barcode', 'name' => 'kode_barcode', 'title' => 'Barcode'])
        ->addColumn(['data' => 'kode_barang', 'name' => 'kode_barang', 'title' => 'Kode'])
        ->addColumn(['data' => 'nama_barang', 'name' => 'nama_barang', 'title' => 'Nama'])
        ->addColumn(['data' => 'harga_beli_baru', 'name' => 'harga_beli_baru', 'title' => 'Harga Beli'])
        ->addColumn(['data' => 'harga_jual_baru', 'name' => 'harga_jual_baru', 'title' => 'Harga Jual 1']) 
        ->addColumn(['data' => 'semua_data_harga', 'name' => 'semua_data_harga', 'title' => 'Harga Jual 2 - 7']) 
        ->addColumn(['data' => 'satuan.nama_satuan', 'name' => 'satuan.nama_satuan', 'title' => 'Satuan'])        
        ->addColumn(['data' => 'kategoribarang.nama_kategori_barang', 'name' => 'kategoribarang.nama_kategori_barang', 'title' => 'Kategori'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);

        return view('master_barang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
          'kode_barcode'        => 'unique:barangs,kode_barcode',
          'kode_barcode'         => 'unique:barangs,kode_barang',
          'kode_barang'        => 'required|unique:barangs,kode_barang',
          'kode_barang'         => 'required|unique:barangs,kode_barcode',
          'nama_barang'         => 'required',
          'golongan_barang'     => 'required',
          'kategori_barangs_id' => 'required|exists:kategori_barangs,id',
          'harga_beli'          => 'required|numeric',
          'harga_jual'          => 'numeric',
          'harga_jual1'         => 'numeric',
          'harga_jual2'         => 'numeric',
          'harga_jual3'         => 'numeric',
          'harga_jual4'         => 'numeric',
          'harga_jual5'         => 'numeric',
          'harga_jual6'         => 'numeric',
          'harga_jual7'         => 'numeric',
          'satuans_id'          => 'required|exists:satuans,id',
          'status'              => 'required', 
          'limit_stok'          => 'numeric',
          'over_stok'           => 'numeric'
        ]);

        if ($request->harga_jual2 == '') {
                
            $request->harga_jual2 = 0;

        }
        if ($request->harga_jual3 == '') {
                
            $request->harga_jual3 = 0;

        }
        if ($request->harga_jual4 == '') {
                
            $request->harga_jual4 = 0;

        }
        if ($request->harga_jual5 == '') {
                
            $request->harga_jual5 = 0;

        }
        if ($request->harga_jual6 == '') {
                
            $request->harga_jual6 = 0;

        }
        if ($request->harga_jual7 == '') {
                
            $request->harga_jual7 = 0;

        }
        if ($request->limit_stok == '') {
                
            $request->limit_stok = 0;

        }
        if ($request->over_stok == '') {
                
            $request->over_stok = 0;

        }

        //insert
        $barang = Barang::create([
            'kode_barcode'          =>$request->kode_barcode,
            'kode_barang'           =>$request->kode_barang,
            'nama_barang'           =>$request->nama_barang,
            'golongan_barang'       =>$request->golongan_barang,
            'kategori_barangs_id'   =>$request->kategori_barangs_id,
            'harga_beli'            =>$request->harga_beli,
            'harga_jual'            =>$request->harga_jual,
            'harga_jual2'           =>$request->harga_jual2,
            'harga_jual3'           =>$request->harga_jual3,
            'harga_jual4'           =>$request->harga_jual4,
            'harga_jual5'           =>$request->harga_jual5,
            'harga_jual6'           =>$request->harga_jual6,
            'harga_jual7'           =>$request->harga_jual7,
            'satuans_id'            =>$request->satuans_id,
            'status'                =>$request->status, 
            'limit_stok'            =>$request->limit_stok,
            'over_stok'             =>$request->over_stok
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambahkan Barang"
            ]);
        return redirect()->route('master_barang.index');
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
        //edit
        $barang = Barang::find($id);

        return view('master_barang.edit')->with(compact('barang'));
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
        // proses update

                //validate
        $this->validate($request, [
          'kode_barcode'        => 'unique:barangs,kode_barcode,' . $id,
          'kode_barcode'         => 'unique:barangs,kode_barang,' . $id,
          'kode_barang'        => 'required|unique:barangs,kode_barang,'. $id,
          'kode_barang'         => 'required|unique:barangs,kode_barcode,'. $id,
          'nama_barang'         => 'required',
          'golongan_barang'     => 'required',
          'kategori_barangs_id' => 'required|exists:kategori_barangs,id',
          'harga_beli'          => 'required|numeric',
          'harga_jual'          => 'numeric',
          'harga_jual1'         => 'numeric',
          'harga_jual2'         => 'numeric',
          'harga_jual3'         => 'numeric',
          'harga_jual4'         => 'numeric',
          'harga_jual5'         => 'numeric',
          'harga_jual6'         => 'numeric',
          'harga_jual7'         => 'numeric',
          'satuans_id'          => 'required|exists:satuans,id',
          'status'              => 'required', 
          'limit_stok'          => 'numeric',
          'over_stok'           => 'numeric'
        ]);

        if ($request->harga_jual2 == '') {
                
            $request->harga_jual2 = 0;

        }
        if ($request->harga_jual3 == '') {
                
            $request->harga_jual3 = 0;

        }
        if ($request->harga_jual4 == '') {
                
            $request->harga_jual4 = 0;

        }
        if ($request->harga_jual5 == '') {
                
            $request->harga_jual5 = 0;

        }
        if ($request->harga_jual6 == '') {
                
            $request->harga_jual6 = 0;

        }
        if ($request->harga_jual7 == '') {
                
            $request->harga_jual7 = 0;

        }
        if ($request->limit_stok == '') {
                
            $request->limit_stok = 0;

        }
        if ($request->over_stok == '') {
                
            $request->over_stok = 0;

        }

        //insert
        $barang = Barang::where('id',$id)->update([
            'kode_barcode'          =>$request->kode_barcode,
            'kode_barang'           =>$request->kode_barang,
            'nama_barang'           =>$request->nama_barang,
            'golongan_barang'       =>$request->golongan_barang,
            'kategori_barangs_id'   =>$request->kategori_barangs_id,
            'harga_beli'            =>$request->harga_beli,
            'harga_jual'            =>$request->harga_jual,
            'harga_jual2'           =>$request->harga_jual2,
            'harga_jual3'           =>$request->harga_jual3,
            'harga_jual4'           =>$request->harga_jual4,
            'harga_jual5'           =>$request->harga_jual5,
            'harga_jual6'           =>$request->harga_jual6,
            'harga_jual7'           =>$request->harga_jual7,
            'satuans_id'            =>$request->satuans_id,
            'status'                =>$request->status, 
            'limit_stok'            =>$request->limit_stok,
            'over_stok'             =>$request->over_stok
        ]);


        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah $request->nama_barang"
            ]);

        return redirect()->route('master_barang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        else{
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "Barang Berhasil Di Hapus"
            ]);
        return redirect()->route('master_barang.index');
        }
    }
}
