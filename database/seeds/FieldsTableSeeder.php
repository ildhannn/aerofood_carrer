<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([ 'field' => 'Akuntansi/Keuangan']);
        DB::table('field_specializations')->insert([ 'field_id' => 1, 'specialization' => 'Audit & Pajak']);
        DB::table('field_specializations')->insert([ 'field_id' => 1, 'specialization' => 'Perbankan/Keuangan']);
        DB::table('field_specializations')->insert([ 'field_id' => 1, 'specialization' => 'Keuangan/Investasi']);
        DB::table('field_specializations')->insert([ 'field_id' => 1, 'specialization' => 'Akuntansi Umum/Pembiayaan']);


        DB::table('fields')->insert([ 'field' => 'Adminstrasi/Personalia']);
        DB::table('field_specializations')->insert([ 'field_id' => 2, 'specialization' => 'Staf/Administrasi umum']);
        DB::table('field_specializations')->insert([ 'field_id' => 2, 'specialization' => 'Personalia']);
        DB::table('field_specializations')->insert([ 'field_id' => 2, 'specialization' => 'Sekretaris']);
        DB::table('field_specializations')->insert([ 'field_id' => 2, 'specialization' => 'Manajemen Atas']);


        DB::table('fields')->insert([ 'field' => 'Seni/Media/Komunikasi']);
        DB::table('field_specializations')->insert([ 'field_id' => 3, 'specialization' => 'Periklanan']);
        DB::table('field_specializations')->insert([ 'field_id' => 3, 'specialization' => 'Seni/Desain Kreatif']);
        DB::table('field_specializations')->insert([ 'field_id' => 3, 'specialization' => 'Hiburan/Seni Panggung']);
        DB::table('field_specializations')->insert([ 'field_id' => 3, 'specialization' => 'Hubungan Masyarakat']);


        DB::table('fields')->insert([ 'field' => 'Bangunan/Konstruksi']);
        DB::table('field_specializations')->insert([ 'field_id' => 4, 'specialization' => 'Arsitek/Desain Interior']);
        DB::table('field_specializations')->insert([ 'field_id' => 4, 'specialization' => 'Sipil/Konstruksi Bangunan']);
        DB::table('field_specializations')->insert([ 'field_id' => 4, 'specialization' => 'Properti/Real Estate']);
        DB::table('field_specializations')->insert([ 'field_id' => 4, 'specialization' => 'Survei Kuantitas']);


        DB::table('fields')->insert([ 'field' => 'Komputer/IT']);
        DB::table('field_specializations')->insert([ 'field_id' => 5, 'specialization' => 'IT-Perangkat Keras']);
        DB::table('field_specializations')->insert([ 'field_id' => 5, 'specialization' => 'IT-Jaringan/Sistem/Sistem Database']);
        DB::table('field_specializations')->insert([ 'field_id' => 5, 'specialization' => 'IT-Perangkat Lunak']);


        DB::table('fields')->insert([ 'field' => 'Pendidikan/Pelatihan']);
        DB::table('field_specializations')->insert([ 'field_id' => 6, 'specialization' => 'Pendidikan']);
        DB::table('field_specializations')->insert([ 'field_id' => 6, 'specialization' => 'Penelitian & Pengembangan']);


        DB::table('fields')->insert([ 'field' => 'Teknik']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Kimia']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Elektrikal']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Elektro']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Lingkungan']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Mekanik/Otomotif']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Perminyakan']);
        DB::table('field_specializations')->insert([ 'field_id' => 7, 'specialization' => 'Teknik Lainnya']);


        DB::table('fields')->insert([ 'field' => 'Kesehatan']);
        DB::table('field_specializations')->insert([ 'field_id' => 8, 'specialization' => 'Dokter/Diagnosa']);
        DB::table('field_specializations')->insert([ 'field_id' => 8, 'specialization' => 'Farmasi']);
        DB::table('field_specializations')->insert([ 'field_id' => 8, 'specialization' => 'Praktisi/Asisten Medis']);


        DB::table('fields')->insert([ 'field' => 'Hotel/Restoran']);
        DB::table('field_specializations')->insert([ 'field_id' => 9, 'specialization' => 'Makanan/Minuman/Pelayanan Restoran']);
        DB::table('field_specializations')->insert([ 'field_id' => 9, 'specialization' => 'Hotel/Pariwisata']);


        DB::table('fields')->insert([ 'field' => 'Manufaktur']);
        DB::table('field_specializations')->insert([ 'field_id' => 10, 'specialization' => 'Pemeliharaan']);
        DB::table('field_specializations')->insert([ 'field_id' => 10, 'specialization' => 'Manufaktur']);
        DB::table('field_specializations')->insert([ 'field_id' => 10, 'specialization' => 'Kontrol Proses']);
        DB::table('field_specializations')->insert([ 'field_id' => 10, 'specialization' => 'Pembelian/Manajemen Material']);
        DB::table('field_specializations')->insert([ 'field_id' => 10, 'specialization' => 'Penjaminan Kualitas / QA']);


        DB::table('fields')->insert([ 'field' => 'Penjualan/Marketing']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Penjualan - Korporasi']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Pemasaran/Pengembangan Bisnis']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Merchandising']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Penjualan Ritel']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Penjualan - Teknik/Teknikal/IT']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Proses desain dan kontrol']);
        DB::table('field_specializations')->insert([ 'field_id' => 11, 'specialization' => 'Tele-sales/Telemarketing']);


        DB::table('fields')->insert([ 'field' => 'Ilmu Pengetahuan']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Aktuaria/Statistik']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Pertanian']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Penerbangan']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Bioteknologi']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Kimia']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Teknologi Makanan/Ahli Gizi']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Geologi/Geofisika']);
        DB::table('field_specializations')->insert([ 'field_id' => 12, 'specialization' => 'Ilmu Pengetahuan & Teknologi/Lab']);


        DB::table('fields')->insert([ 'field' => 'Pelayanan']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Keamanan / Angkatan Bersenjata']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Pelayanan Pelanggan']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Logistik/Jaringan distribusi']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Hukum / Legal']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Perawatan Kesehatan / Kecantikan']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Pelayanan kemasyarakatan']);
        DB::table('field_specializations')->insert([ 'field_id' => 13, 'specialization' => 'Teknikal & Bantuan Pelanggan']);


        DB::table('fields')->insert([ 'field' => 'Lainnya']);
        DB::table('field_specializations')->insert([ 'field_id' => 14, 'specialization' => 'Pekerjaan Umum']);
        DB::table('field_specializations')->insert([ 'field_id' => 14, 'specialization' => 'Jurnalis/Editor']);
        DB::table('field_specializations')->insert([ 'field_id' => 14, 'specialization' => 'Penerbitan']);
        DB::table('field_specializations')->insert([ 'field_id' => 14, 'specialization' => 'Lainnya/Kategori tidak tersedia']);
    }
}
