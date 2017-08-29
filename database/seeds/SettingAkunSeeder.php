<?php

use Illuminate\Database\Seeder;
use App\SettingAkun;

class SettingAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "harga_pokok_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Harga Pokok Penjualan";  
    $setting_akun->group_setting_akun = "data_item";  
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pendapatan_Jual"; 
    $setting_akun->display_nama_setting_akun = "Pendapatan Jual"; 
    $setting_akun->group_setting_akun = "data_item";  
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "persedian"; 
    $setting_akun->display_nama_setting_akun = "Persedian"; 
    $setting_akun->group_setting_akun = "data_item";  
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "item_masuk"; 
    $setting_akun->display_nama_setting_akun = "Item Masuk"; 
    $setting_akun->group_setting_akun = "data_item"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "item_keluar"; 
    $setting_akun->display_nama_setting_akun = "Item Keluar"; 
    $setting_akun->group_setting_akun = "data_item"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "stok_opname"; 
    $setting_akun->display_nama_setting_akun = "Stok Opname"; 
    $setting_akun->group_setting_akun = "data_item"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "stok_awal"; 
    $setting_akun->display_nama_setting_akun = "Stok Awal"; 
    $setting_akun->group_setting_akun = "data_item"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_pembelian"; 
    $setting_akun->display_nama_setting_akun = "Potongan Pembelian"; 
    $setting_akun->group_setting_akun = "akun_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_pembelian";
    $setting_akun->display_nama_setting_akun = "Pajak Pembelian"; 
    $setting_akun->group_setting_akun = "akun_pembelian";  
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_tunai_dp";
    $setting_akun->display_nama_setting_akun = "Pembayaran Tunai / DP";  
    $setting_akun->group_setting_akun = "akun_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_Kredit"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Kredit"; 
    $setting_akun->group_setting_akun = "akun_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_retur_pembelian"; 
    $setting_akun->display_nama_setting_akun = "Potongan Retur Pembelian"; 
    $setting_akun->group_setting_akun = "akun_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_retur_pembelian"; 
    $setting_akun->display_nama_setting_akun = "Pajak Retur Pembelian"; 
    $setting_akun->group_setting_akun = "akun_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_tunai_dp"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Retur Tunai / DP"; 
    $setting_akun->group_setting_akun = "akun_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_kredit"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Retur Kredit"; 
    $setting_akun->group_setting_akun = "akun_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Potongan Penjualan"; 
    $setting_akun->group_setting_akun = "akun_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_penjualan";
    $setting_akun->display_nama_setting_akun = "Pajak Penjualan";  
    $setting_akun->group_setting_akun = "akun_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_tunai_dp_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Tunai / DP"; 
    $setting_akun->group_setting_akun = "akun_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_Kredit_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Kredit"; 
    $setting_akun->group_setting_akun = "akun_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "komisi_sales_penjualan";
    $setting_akun->display_nama_setting_akun = "Komisi Sales";  
    $setting_akun->group_setting_akun = "akun_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_retur_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Potongan Retur Penjualan"; 
    $setting_akun->group_setting_akun = "akun_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_Retur_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Pajak Retur Penjualan"; 
    $setting_akun->group_setting_akun = "akun_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_tunai_dp_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Retur Tunai / DP"; 
    $setting_akun->group_setting_akun = "akun_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_kredit_penjualan"; 
    $setting_akun->display_nama_setting_akun = "Pembayaran Retur Kredit"; 
    $setting_akun->group_setting_akun = "akun_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "komisi_sales_retur_penjualan";
    $setting_akun->display_nama_setting_akun = "Komisi Sales Retur";  
    $setting_akun->group_setting_akun = "akun_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_hutang"; 
    $setting_akun->display_nama_setting_akun = "Potongan Hutang"; 
    $setting_akun->group_setting_akun = "akun_hutang_piutang"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_piutang"; 
    $setting_akun->display_nama_setting_akun = "Potongan Piutang"; 
    $setting_akun->group_setting_akun = "akun_hutang_piutang"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "prive"; 
    $setting_akun->display_nama_setting_akun = "Prive"; 
    $setting_akun->group_setting_akun = "modal_dan_laba"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "laba_ditahan"; 
    $setting_akun->display_nama_setting_akun = "Laba Ditahan"; 
    $setting_akun->group_setting_akun = "modal_dan_laba"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "laba_tahun_berjalan"; 
    $setting_akun->display_nama_setting_akun = "Laba Tahun Berjalan"; 
    $setting_akun->group_setting_akun = "modal_dan_laba"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "penyeimbang_historical_balancing"; 
    $setting_akun->display_nama_setting_akun = "Biaya Lain diambil dari"; 
    $setting_akun->group_setting_akun = "modal_dan_laba"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "biaya_lain_diambil_dari"; 
    $setting_akun->display_nama_setting_akun = "Biaya Lain diambil dari"; 
    $setting_akun->group_setting_akun = "modal_dan_laba"; 
    $setting_akun->save(); 
    }
}
