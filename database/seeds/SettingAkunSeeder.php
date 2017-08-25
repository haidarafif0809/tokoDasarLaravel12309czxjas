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
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pendapatan_Jual"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "item_masuk"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "item_keluar"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "stok_opname"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "stok_awal"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_tunai_dp"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_retur_pembelian"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_tunai_dp"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_kredit"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_tunai_dp"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_Kredit"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "komisi_sales"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pajak_Retur_penjualan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_tunai_dp"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "pembayaran_retur_kredit"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "komisi_sales_retur"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_hutang"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "potongan_piutang"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "prive"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "laba_ditahan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "laba_tahun_berjalan"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "penyeimbang_historical_balancing"; 
    $setting_akun->save();
    // Membuat sample satuan
    $setting_akun = new SettingAkun();
    $setting_akun->nama_setting_akun = "biaya_lain_diambil_dari"; 
    $setting_akun->save(); 
    }
}
