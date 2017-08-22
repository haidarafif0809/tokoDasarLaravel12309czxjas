<?php
 
use Illuminate\Database\Seeder;
use App\Barang;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample barang 1
       		$barang = new Barang();
       	    $barang->kode_barang = "0018";
            $barang->kode_barcode = "1234567";
            $barang->nama_barang = "Beras 10kg";
            $barang->harga_beli = "85000";
            $barang->harga_jual = "90000";
            $barang->harga_jual2 = "100000";
            $barang->harga_jual3 = "0";
            $barang->harga_jual4 = "0";
            $barang->harga_jual5 = "0";
            $barang->harga_jual6 = "0";
            $barang->harga_jual7 = "0";
            $barang->satuans_id = "1";
            $barang->kategori_barangs_id = "1";
            $barang->status = "Aktif";
            $barang->supliers_id = "1";
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->berkaitan_dgn_stok = "1000";
            $barang->jenis_barang = "Barang";
            $barang->tipe_barang = "Barang";
            $barang->golongan = "Barang";
            $barang->golongan_barang = "Barang";
            $barang->save();


             // sample barang 2
       		$barang = new Barang();
       	    $barang->kode_barang = "TBG";
            $barang->nama_barang = "TABUNG GAS";
            $barang->harga_beli = "11200";
            $barang->harga_jual = "115000";
            $barang->harga_jual2 = "150000";
            $barang->harga_jual3 = "0";
            $barang->harga_jual4 = "0";
            $barang->harga_jual5 = "0";
            $barang->harga_jual6 = "0";
            $barang->harga_jual7 = "0";
            $barang->satuans_id = "5";
            $barang->kategori_barangs_id = "1";
            $barang->status = "Aktif";
            $barang->supliers_id = "2";
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->berkaitan_dgn_stok = "1000";
            $barang->jenis_barang = "Barang";
            $barang->tipe_barang = "Barang";
            $barang->golongan = "Barang";
            $barang->golongan_barang = "Barang";
            $barang->save();

              // sample barang 3
       		$barang = new Barang();
       	    $barang->kode_barang = "020";
            $barang->nama_barang = "DETERGEN BOOM 450 G";
            $barang->harga_beli = "4167";
            $barang->harga_jual = "417700";
            $barang->harga_jual2 = "500000";
            $barang->harga_jual3 = "0";
            $barang->harga_jual4 = "0";
            $barang->harga_jual5 = "0";
            $barang->harga_jual6 = "0";
            $barang->harga_jual7 = "0";
            $barang->satuans_id = "8";
            $barang->kategori_barangs_id = "1";
            $barang->status = "Aktif";
            $barang->supliers_id = "3";
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->berkaitan_dgn_stok = "1000";
            $barang->jenis_barang = "Barang";
            $barang->tipe_barang = "Barang";
            $barang->golongan = "Barang";
            $barang->golongan_barang = "Barang";
            $barang->save();

    }
}
