<?php

use Illuminate\Database\Seeder;
use App\GroupAkun;

class GroupAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1"; 
    $group_akun->nama_group_akun = "ASET"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "10"; 
    $group_akun->nama_group_akun = "Aset lancar"; 
    $group_akun->parent = "1";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "101"; 
    $group_akun->nama_group_akun = "Kas"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Kas & Bank";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "102"; 
    $group_akun->nama_group_akun = "Bank"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Kas & Bank";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "103"; 
    $group_akun->nama_group_akun = "Surat Berhaga"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Investasi Portofolio";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "104"; 
    $group_akun->nama_group_akun = "Piutang Dagang"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Piutang Dagang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "105"; 
    $group_akun->nama_group_akun = "Piutang Lain Lain"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Piutang Non Dagang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "106"; 
    $group_akun->nama_group_akun = "Uang Muka"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Piutang Non Dagang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "107"; 
    $group_akun->nama_group_akun = "Persediaan"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Persediaan";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "108"; 
    $group_akun->nama_group_akun = "Pajak Dibayar Dimuka"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Pajak Dibayar Dimuka";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "109"; 
    $group_akun->nama_group_akun = "Beban Dibayar Dimuka"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "11"; 
    $group_akun->nama_group_akun = "Aset Tidak Lancar"; 
    $group_akun->parent = "1";  
    $group_akun->kategori_akun = "Akun Header"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "111"; 
    $group_akun->nama_group_akun = "Tanah"; 
    $group_akun->parent = "11";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "113"; 
    $group_akun->nama_group_akun = "Peralatan Kantor"; 
    $group_akun->parent = "11";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "112"; 
    $group_akun->nama_group_akun = "Gedung"; 
    $group_akun->parent = "11";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "114"; 
    $group_akun->nama_group_akun = "Kendaraan"; 
    $group_akun->parent = "11";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "115"; 
    $group_akun->nama_group_akun = "Beban Ditangguhkan"; 
    $group_akun->parent = "11";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "116"; 
    $group_akun->nama_group_akun = "Goodwill"; 
    $group_akun->parent = "1";  
    $group_akun->kategori_akun = "Aset"; 
    $group_akun->tipe_akun = "Aktiva Tetap";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2"; 
    $group_akun->nama_group_akun = "LAIBILITAS"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "20"; 
    $group_akun->nama_group_akun = "Hutang Lancar"; 
    $group_akun->parent = "2";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Hutang Dagang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "21"; 
    $group_akun->nama_group_akun = "Beban Yang Harus Dibayar"; 
    $group_akun->parent = "2";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Beban YMH Dibayar";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "22"; 
    $group_akun->nama_group_akun = "Hutang Pajak"; 
    $group_akun->parent = "2";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Hutang Pajak";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "23"; 
    $group_akun->nama_group_akun = "Hutang Bank"; 
    $group_akun->parent = "2";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Hutang Bank Jangka Panjang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "24"; 
    $group_akun->nama_group_akun = "Hutang Bank Jangka Panjang"; 
    $group_akun->parent = "2";  
    $group_akun->kategori_akun = "Laibilitas"; 
    $group_akun->tipe_akun = "Hutang Bukan Bank Jangka Panjang";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "3"; 
    $group_akun->nama_group_akun = "EKUITAS"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Ekuitas"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "300"; 
    $group_akun->nama_group_akun = "Modal Saham"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Ekuitas"; 
    $group_akun->tipe_akun = "Ekuitas";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "301"; 
    $group_akun->nama_group_akun = "Laba Ditahan"; 
    $group_akun->parent = "3";  
    $group_akun->kategori_akun = "Ekuitas"; 
    $group_akun->tipe_akun = "Ekuitas";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "302"; 
    $group_akun->nama_group_akun = "Revaluasi Aset Tetap"; 
    $group_akun->parent = "3";  
    $group_akun->kategori_akun = "Ekuitas"; 
    $group_akun->tipe_akun = "Ekuitas";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "303"; 
    $group_akun->nama_group_akun = "Deviden"; 
    $group_akun->parent = "3";  
    $group_akun->kategori_akun = "Ekuitas"; 
    $group_akun->tipe_akun = "Ekuitas";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "40"; 
    $group_akun->nama_group_akun = "Pendapatan Bersih"; 
    $group_akun->parent = "4";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "401"; 
    $group_akun->nama_group_akun = "Penjualan Kelompok A"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Pendapatan Penjualan";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "402"; 
    $group_akun->nama_group_akun = "Penjualan Kelompok B"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Pendapatan Penjualan";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "403"; 
    $group_akun->nama_group_akun = "Penjualan Kelompol C"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Pendapatan Penjualan";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "408"; 
    $group_akun->nama_group_akun = "Potongan Tunai Penjualan"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Pendapatan Penjualan";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "409"; 
    $group_akun->nama_group_akun = "Diskon Penjualan Pelanggan"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "410"; 
    $group_akun->nama_group_akun = "Pendapatan Jasa"; 
    $group_akun->parent = "40";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "501"; 
    $group_akun->nama_group_akun = "Hpp Kelompok Pruduk"; 
    $group_akun->parent = "5";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header"; 
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "502"; 
    $group_akun->nama_group_akun = "Diskon Pembelian Pemasukan"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header"; 
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "503"; 
    $group_akun->nama_group_akun = "Biaya Biaya Pembelian"; 
    $group_akun->parent = "10";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header"; 
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "504"; 
    $group_akun->nama_group_akun = "Hadiah dan Bonus Pembelian"; 
    $group_akun->parent = "5";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6"; 
    $group_akun->nama_group_akun = "Beban Operasi"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "601"; 
    $group_akun->nama_group_akun = "Beban Penjualan"; 
    $group_akun->parent = "6";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "602"; 
    $group_akun->nama_group_akun = "Beban Pemasaran"; 
    $group_akun->parent = "6";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "603"; 
    $group_akun->nama_group_akun = "Beban Administrasi dan Umum"; 
    $group_akun->parent = "6";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "604"; 
    $group_akun->nama_group_akun = "Biaya Tenaga Kerja"; 
    $group_akun->parent = "6";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "605"; 
    $group_akun->nama_group_akun = "Beban Penyusutan"; 
    $group_akun->parent = "6";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "8"; 
    $group_akun->nama_group_akun = "Beban Diluar Usaha"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "801"; 
    $group_akun->nama_group_akun = "Beban Bunga  Bank"; 
    $group_akun->parent = "8";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "9"; 
    $group_akun->nama_group_akun = "Pajak Penghasilan"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "901"; 
    $group_akun->nama_group_akun = "Beban Pajak Penghasilan"; 
    $group_akun->parent = "9";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-0000"; 
    $group_akun->nama_group_akun = "PENDAPATAN"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-1000"; 
    $group_akun->nama_group_akun = "PENDAPATAN PENJUALAN"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "5-0000"; 
    $group_akun->nama_group_akun = "HPP"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "HPP"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-0000"; 
    $group_akun->nama_group_akun = "BEBAN"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "5-1000"; 
    $group_akun->nama_group_akun = "HPP"; 
    $group_akun->parent = "5-0000";  
    $group_akun->kategori_akun = "HPP"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-1000"; 
    $group_akun->nama_group_akun = "BEBAN BAGI HASIL PENDAPATAN USAHA"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "5-2000"; 
    $group_akun->nama_group_akun = "BIAYA LAIN"; 
    $group_akun->parent = "5-0000";  
    $group_akun->kategori_akun = "HPP"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-0000"; 
    $group_akun->nama_group_akun = "ASSET"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1000"; 
    $group_akun->nama_group_akun = "ASSET LANCAR"; 
    $group_akun->parent = "1-0000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1100"; 
    $group_akun->nama_group_akun = "KAS DAN BANK"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1200"; 
    $group_akun->nama_group_akun = "PIUTANG"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1400"; 
    $group_akun->nama_group_akun = "PAJAK PEMBELIAN"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1300"; 
    $group_akun->nama_group_akun = "PERSEDIAAN DAGANG"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-2000"; 
    $group_akun->nama_group_akun = "ASSET TETAP"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-0000"; 
    $group_akun->nama_group_akun = "KEWAJIBAN"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1000"; 
    $group_akun->nama_group_akun = "KEWAJIBAN SEGERA"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1100"; 
    $group_akun->nama_group_akun = "HUTANG OPERASIONAL"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-2000"; 
    $group_akun->nama_group_akun = "HUTANG NON OPERASIONAL"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-3000"; 
    $group_akun->nama_group_akun = "PENDAPATAN DITERIMA DIMUKA"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-4000"; 
    $group_akun->nama_group_akun = "HUTANG PAJAK"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "3-0000"; 
    $group_akun->nama_group_akun = "MODAL"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Modal"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-5000"; 
    $group_akun->nama_group_akun = "RAK PASSIVA"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1200"; 
    $group_akun->nama_group_akun = "KEWAJIBAN PAJAK"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-2000"; 
    $group_akun->nama_group_akun = "BAGI HASIL KEPADA PIHAK LAIN"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3000"; 
    $group_akun->nama_group_akun = "BEBAN USAHA"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "6-0000"; 
    $group_akun->tipe_akun = "Biaya";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-2000"; 
    $group_akun->nama_group_akun = "PENDAPATAN PENJUALAN KONSINYASI"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-10000"; 
    $group_akun->nama_group_akun = "PAJAK-PAJAK"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-15000"; 
    $group_akun->nama_group_akun = "KERUGIAN TERKAIT RISIKO OPERASIONAL"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-3000"; 
    $group_akun->nama_group_akun = "PENDAPATAN USAHA UTAMA LAIN"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-4000"; 
    $group_akun->nama_group_akun = "PENDAPATAN USAHA LAIN"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-16000"; 
    $group_akun->nama_group_akun = "PENYUSUTAN/AMORTISASI"; 
    $group_akun->parent = "6-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-5000"; 
    $group_akun->nama_group_akun = "HARGA POKOK PENJUALAN"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "HPP"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-3100"; 
    $group_akun->nama_group_akun = "KEUNTUNGAN PENJUALAN & PENDAPATAN LAINNYA"; 
    $group_akun->parent = "4-0000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1300"; 
    $group_akun->nama_group_akun = "TITIPAN BARANG KONSINYASI"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1500"; 
    $group_akun->nama_group_akun = "PENEMPATAN PADA BANK"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1400"; 
    $group_akun->nama_group_akun = "KEWAJIBAN UNTUK PAYMENT POINT"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1600"; 
    $group_akun->nama_group_akun = "PENYERTAAN/INVESTMENT"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1500"; 
    $group_akun->nama_group_akun = "DIVIDEN YANG BELUM DIBAYAR"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1700"; 
    $group_akun->nama_group_akun = "REKENING ANTAR KANTOR"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1800"; 
    $group_akun->nama_group_akun = "BIAYA DIBAYAR DIMUKA"; 
    $group_akun->parent = "1-1000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-2400"; 
    $group_akun->nama_group_akun = "ASET TETAP & INVENTARIS"; 
    $group_akun->parent = "1-2000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-2500"; 
    $group_akun->nama_group_akun = "ASET TIDAK BERWUJUD"; 
    $group_akun->parent = "1-2000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-2600"; 
    $group_akun->nama_group_akun = "PENYISIHAN PENGHAPUSAN ASET PRODUKTIF -/-"; 
    $group_akun->parent = "1-2000";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-1600"; 
    $group_akun->nama_group_akun = "KEWAJIBAN SEGERA LAIN"; 
    $group_akun->parent = "2-1000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-4100"; 
    $group_akun->nama_group_akun = "FEE LAYANAN"; 
    $group_akun->parent = "4-4000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-2520"; 
    $group_akun->nama_group_akun = "AYDA-GEDUNG/BANGUNAN"; 
    $group_akun->parent = "1-2500";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-6000"; 
    $group_akun->nama_group_akun = "BONUS & BAGI HASIL YANG BELUM DIBAGIKAN"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-7000"; 
    $group_akun->nama_group_akun = "KEWAJIBAN PADA BANK"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "4-4200"; 
    $group_akun->nama_group_akun = "PENDAPATAN LAIN"; 
    $group_akun->parent = "4-4000";  
    $group_akun->kategori_akun = "Pendapatan"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "1-1820"; 
    $group_akun->nama_group_akun = "BDD SEWA"; 
    $group_akun->parent = "1-1800";  
    $group_akun->kategori_akun = "Aktiva"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8000"; 
    $group_akun->nama_group_akun = "PEMBIAYAN YANG DITERIMA"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8500"; 
    $group_akun->nama_group_akun = "TAKSIRAN PAJAK PENGHASILAN"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8600"; 
    $group_akun->nama_group_akun = "KEWAJIBAN PAJAK TANGGUHAN"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8700"; 
    $group_akun->nama_group_akun = "KEWAJIBAN LAIN"; 
    $group_akun->parent = "2-0000";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8710"; 
    $group_akun->nama_group_akun = "Uang Muka"; 
    $group_akun->parent = "2-8700";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "2-8750"; 
    $group_akun->nama_group_akun = "CADANGAN LAIN-LAIN"; 
    $group_akun->parent = "2-8700";  
    $group_akun->kategori_akun = "Kewajiban"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "7-0000"; 
    $group_akun->nama_group_akun = "PENDAPATAN DAN BEBAN NON USAHA"; 
    $group_akun->parent = "-";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "7-1000"; 
    $group_akun->nama_group_akun = "KEUNTUNGAN PENJUALAN ASET TETAP DAN INVENTARIS"; 
    $group_akun->parent = "7-0000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3100"; 
    $group_akun->nama_group_akun = "BEBAN TENAGA KERJA"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "3-4000"; 
    $group_akun->nama_group_akun = "MODAL DISETOR"; 
    $group_akun->parent = "3-0000";  
    $group_akun->kategori_akun = "Modal"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3200"; 
    $group_akun->nama_group_akun = "BEBAN PENDIDIKAN DAN PELATIHAN"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3300"; 
    $group_akun->nama_group_akun = "BEBAN PENELITIAN DAN PENGEMBANGAN"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3400"; 
    $group_akun->nama_group_akun = "BEBAN KOMISI/ADMINISTRASI"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3500"; 
    $group_akun->nama_group_akun = "BEBAN PREMI ASURANSI"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3600"; 
    $group_akun->nama_group_akun = "BEBAN SEWA"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3700"; 
    $group_akun->nama_group_akun = "BEBAN PROMOSI"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "3-5000"; 
    $group_akun->nama_group_akun = "TAMBAHAN MODAL DISETOR"; 
    $group_akun->parent = "3-0000";  
    $group_akun->kategori_akun = "Modal"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3800"; 
    $group_akun->nama_group_akun = "PAJAK-PAJAK"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-3900"; 
    $group_akun->nama_group_akun = "BEBAN PEMELIHARAAN/PERBAIKAN ASET TETAP DAN INVENTARIS"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4100"; 
    $group_akun->nama_group_akun = "BEBAN UMUM DAN ADMINISTRASI"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4200"; 
    $group_akun->nama_group_akun = "BEBAN BARANG DAN JASA"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4210"; 
    $group_akun->nama_group_akun = "JASA PENGOLAHAN TEKNOLOGI DAN SISTEM INFORMASI"; 
    $group_akun->parent = "6-4200";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4300"; 
    $group_akun->nama_group_akun = "BEBAN TERKAIT PIUTANG DAN PEMBIAYAAN"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4400"; 
    $group_akun->nama_group_akun = "KERUGIAN TERKAIT RISIKO OPERASIONAL"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4220"; 
    $group_akun->nama_group_akun = "JASA PIHAK KETIGA"; 
    $group_akun->parent = "6-4200";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4230"; 
    $group_akun->nama_group_akun = "JASA OUTSOURCING"; 
    $group_akun->parent = "6-4200";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4500"; 
    $group_akun->nama_group_akun = "BEBAN PENYUSUTAN/AMORTISASI"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4600"; 
    $group_akun->nama_group_akun = "BEBAN USAHA LAIN"; 
    $group_akun->parent = "6-3000";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4510"; 
    $group_akun->nama_group_akun = "PENYUSUTAN ASET TETAP/INVESTASI"; 
    $group_akun->parent = "6-4500";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Beban Administrasi dan Umum";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
    // Membuat sample group akun
    $group_akun = new GroupAkun();
    $group_akun->kode_group_akun = "6-4520"; 
    $group_akun->nama_group_akun = "AMORTISASI BEBAN DITANGGUHKAN"; 
    $group_akun->parent = "6-4500";  
    $group_akun->kategori_akun = "Biaya"; 
    $group_akun->tipe_akun = "Akun Header";  
    $group_akun->user_buat = "Admin";  
    $group_akun->save();
 
    }
}
