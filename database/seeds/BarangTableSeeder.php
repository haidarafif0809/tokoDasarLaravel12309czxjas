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
            $barang->kode_barang = "B001";
            $barang->kode_barcode = "5700011001";
            $barang->nama_barang = "KECAP ASIN ABC";
            $barang->harga_beli = "55000";
            $barang->harga_jual = "6500";
            $barang->harga_jual2 = "7500";
            $barang->harga_jual3 = "0";
            $barang->harga_jual4 = "0";
            $barang->harga_jual5 = "0";
            $barang->harga_jual6 = "0";
            $barang->harga_jual7 = "0";
            $barang->satuans_id = "8";
            $barang->kategori_barangs_id = "1";
            $barang->status = "Aktif"; 
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->golongan_barang = "1";
            $barang->save();

        // sample barang 2
            $barang = new Barang();
            $barang->kode_barang = "B002";
            $barang->kode_barcode = "5700021002";
            $barang->nama_barang = "MINYAK BIMOLI 1 L";
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
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->golongan_barang = "1";
            $barang->save();

        // sample barang 3
            $barang = new Barang();
            $barang->kode_barang = "B003";
            $barang->kode_barcode = "5700031003";
            $barang->nama_barang = "SAMBAL TERASI ABC";
            $barang->harga_beli = "10500";
            $barang->harga_jual = "11000";
            $barang->harga_jual2 = "12000";
            $barang->harga_jual3 = "0";
            $barang->harga_jual4 = "0";
            $barang->harga_jual5 = "0";
            $barang->harga_jual6 = "0";
            $barang->harga_jual7 = "0";
            $barang->satuans_id = "1";
            $barang->kategori_barangs_id = "1";
            $barang->status = "Aktif"; 
            $barang->limit_stok = "0";
            $barang->over_stok = "10";
            $barang->golongan_barang = "1";
            $barang->save();

    }
}
