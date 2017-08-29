<?php

use Illuminate\Database\Seeder;
use App\DaftarAkun;

class DaftarAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "4-1500"; 
    $daftar_akun->nama_daftar_akun = "Potongan Jual"; 
    $daftar_akun->group_akun = "52";  
    $daftar_akun->kategori_akun = "Pendapatan"; 
    $daftar_akun->tipe_akun = "Pendapatan Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-1100"; 
    $daftar_akun->nama_daftar_akun = "Harga Pokok Penjualan Toko"; 
    $daftar_akun->group_akun = "55";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-1300"; 
    $daftar_akun->nama_daftar_akun = "Komisi Penjualan"; 
    $daftar_akun->group_akun = "55";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-2100"; 
    $daftar_akun->nama_daftar_akun = "Kerugian Piutang"; 
    $daftar_akun->group_akun = "57";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-2200"; 
    $daftar_akun->nama_daftar_akun = "Pengaturan Stok"; 
    $daftar_akun->group_akun = "57";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-2201"; 
    $daftar_akun->nama_daftar_akun = "Item Masuk"; 
    $daftar_akun->group_akun = "57";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-2202"; 
    $daftar_akun->nama_daftar_akun = "Item Keluar"; 
    $daftar_akun->group_akun = "57";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "6-1100"; 
    $daftar_akun->nama_daftar_akun = "Biaya Listrik / Telepon"; 
    $daftar_akun->group_akun = "56";  
    $daftar_akun->kategori_akun = "Biaya"; 
    $daftar_akun->tipe_akun = "Beban Operasional";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1119"; 
    $daftar_akun->nama_daftar_akun = "KAS KECIL"; 
    $daftar_akun->group_akun = "60";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Kas & Bank";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1121"; 
    $daftar_akun->nama_daftar_akun = "BANK MANDIRI"; 
    $daftar_akun->group_akun = "60";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Kas & Bank";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1210"; 
    $daftar_akun->nama_daftar_akun = "PIUTANG"; 
    $daftar_akun->group_akun = "61";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Piutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1220"; 
    $daftar_akun->nama_daftar_akun = "PIUTANG KARTU KREDIT"; 
    $daftar_akun->group_akun = "61";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Piutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1410"; 
    $daftar_akun->nama_daftar_akun = "PPN MASUKAN"; 
    $daftar_akun->group_akun = "62";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Pajak Dibayar Dimuka";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1421"; 
    $daftar_akun->nama_daftar_akun = "PAJAK DIBAYAR DIMUKA"; 
    $daftar_akun->group_akun = "62";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Pajak Dibayar Dimuka";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-1200"; 
    $daftar_akun->nama_daftar_akun = "Potongan Hutang"; 
    $daftar_akun->group_akun = "55";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1301"; 
    $daftar_akun->nama_daftar_akun = "PERSEDIAAN BARANG"; 
    $daftar_akun->group_akun = "63";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Persediaan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-1390"; 
    $daftar_akun->nama_daftar_akun = "POTONGAN BELI & BIAYA LAIN"; 
    $daftar_akun->group_akun = "63";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Persediaan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-2100"; 
    $daftar_akun->nama_daftar_akun = "TANAH"; 
    $daftar_akun->group_akun = "64";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Aktiva Tetap";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-2200"; 
    $daftar_akun->nama_daftar_akun = "BANGUNAN"; 
    $daftar_akun->group_akun = "64";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Aktiva Tetap";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-2201"; 
    $daftar_akun->nama_daftar_akun = "AKUMULASI PENYUSUTAN BANGUNAN"; 
    $daftar_akun->group_akun = "64";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Aktiva Tetap";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "1-2300"; 
    $daftar_akun->nama_daftar_akun = "KENDARAAN"; 
    $daftar_akun->group_akun = "64";  
    $daftar_akun->kategori_akun = "Aktiva"; 
    $daftar_akun->tipe_akun = "Aktiva Tetap";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-1101"; 
    $daftar_akun->nama_daftar_akun = "HUTANG DAGANG"; 
    $daftar_akun->group_akun = "67";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-1130"; 
    $daftar_akun->nama_daftar_akun = "HUTANG KARTU KREDIT"; 
    $daftar_akun->group_akun = "67";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-1140"; 
    $daftar_akun->nama_daftar_akun = "HUTANG KONSINYASI"; 
    $daftar_akun->group_akun = "67";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-1200"; 
    $daftar_akun->nama_daftar_akun = "HUTANG GAJI"; 
    $daftar_akun->group_akun = "66";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();   

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-3100"; 
    $daftar_akun->nama_daftar_akun = "UANG MUKA PESANAN PENJUALAN"; 
    $daftar_akun->group_akun = "69";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Pendapatan Diterima Dimuka";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-4110"; 
    $daftar_akun->nama_daftar_akun = "PPN KELUARAN"; 
    $daftar_akun->group_akun = "70";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Pajak";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-4120"; 
    $daftar_akun->nama_daftar_akun = "HUTANG PAJAK"; 
    $daftar_akun->group_akun = "70";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Pajak";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-1300"; 
    $daftar_akun->nama_daftar_akun = "HUTANG USAHA"; 
    $daftar_akun->group_akun = "66";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Dagang";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "3-1000"; 
    $daftar_akun->nama_daftar_akun = "MODAL"; 
    $daftar_akun->group_akun = "71";  
    $daftar_akun->kategori_akun = "Modal"; 
    $daftar_akun->tipe_akun = "Ekuitas";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "3-2000"; 
    $daftar_akun->nama_daftar_akun = "LABA DITAHAN"; 
    $daftar_akun->group_akun = "71";  
    $daftar_akun->kategori_akun = "Modal"; 
    $daftar_akun->tipe_akun = "Ekuitas";   
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "3-3000"; 
    $daftar_akun->nama_daftar_akun = "LABA TAHUN BERJALAN"; 
    $daftar_akun->group_akun = "27";  
    $daftar_akun->kategori_akun = "Modal"; 
    $daftar_akun->tipe_akun = "Ekuitas";   
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "3-8000"; 
    $daftar_akun->nama_daftar_akun = "PRIVE"; 
    $daftar_akun->group_akun = "71";  
    $daftar_akun->kategori_akun = "Modal"; 
    $daftar_akun->tipe_akun = "Ekuitas";    
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "3-9000"; 
    $daftar_akun->nama_daftar_akun = "HISTORICAL BALANCING"; 
    $daftar_akun->group_akun = "71";  
    $daftar_akun->kategori_akun = "Modal"; 
    $daftar_akun->tipe_akun = "Ekuitas";    
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "5-2203"; 
    $daftar_akun->nama_daftar_akun = "DISKON PEMBELIAN SUPLIER"; 
    $daftar_akun->group_akun = "55";  
    $daftar_akun->kategori_akun = "HPP"; 
    $daftar_akun->tipe_akun = "Harga Pokok Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "2-4130"; 
    $daftar_akun->nama_daftar_akun = "PAJAK PERTAMBAHAN NILA"; 
    $daftar_akun->group_akun = "70";  
    $daftar_akun->kategori_akun = "Kewajiban"; 
    $daftar_akun->tipe_akun = "Hutang Pajak";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "701-004"; 
    $daftar_akun->nama_daftar_akun = "Laba / Rugi Penghapusan Hutan"; 
    $daftar_akun->group_akun = "51";  
    $daftar_akun->kategori_akun = "Pendapatan"; 
    $daftar_akun->tipe_akun = "Pendapatan Diluar Usaha";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "4-1100"; 
    $daftar_akun->nama_daftar_akun = "Pendapatan Penjualan"; 
    $daftar_akun->group_akun = "52";  
    $daftar_akun->kategori_akun = "Pendapatan"; 
    $daftar_akun->tipe_akun = "Pendapatan Penjualan";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "603-001"; 
    $daftar_akun->nama_daftar_akun = "Biaya Listrik"; 
    $daftar_akun->group_akun = "54";  
    $daftar_akun->kategori_akun = "Biaya"; 
    $daftar_akun->tipe_akun = "Beban Operasional";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();  

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "603-002"; 
    $daftar_akun->nama_daftar_akun = "HUTANG USAHA"; 
    $daftar_akun->group_akun = "54";  
    $daftar_akun->kategori_akun = "Biaya"; 
    $daftar_akun->tipe_akun = "Beban Operasional";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save();    

    // Membuat sample group akun
    $daftar_akun = new DaftarAkun();
    $daftar_akun->kode_daftar_akun = "603-003"; 
    $daftar_akun->nama_daftar_akun = "Biaya Konsumsi"; 
    $daftar_akun->group_akun = "116";  
    $daftar_akun->kategori_akun = "Biaya"; 
    $daftar_akun->tipe_akun = "Beban Pemansara";  
    $daftar_akun->user_buat = "Admin";  
    $daftar_akun->save(); 
    }
}
