<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([ 
        	'time' => '10',
        	'name' => 'Work Behavior Assessment 1',
        	'instruction' => 'Anda akan diberi soal sebanyak 60 (enam puluh) nomor. Masing-masing nomor memiliki dua pernyataan yang bertolak belakang. Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda. Anda HARUS memilih salah satu yang dominan serta mengisi semua nomor. Selesaikan pilihan ini dalam waktu <b>SEPULUH MENIT</b>.'
        ]);

        DB::table('tests')->insert([ 
        	'time' => '7',
        	'name' => 'Work Behavior Assessment 2',
        	'instruction' => 'Mulailah dengan membayangkan kondisi yang anda pilih untuk diresponi, contoh di "rumah", "kantor", atau "sosial". Setiap kotak terdapat empat pertanyaan. Kemudian klik pilihan di kolom M pada pernyataan yang MIRIP dengan anda dan klik di kolom T pada pernyataan yang TIDAK MIRIP dengan diri anda. Pada setiap kotak, pilih hanya satu yang M (MIRIP) dan satu yang TM (TIDAK MIRIP). Selesaikan pilihan ini dalam waktu <b>TUJUH MENIT</b>.'
        ]);

        DB::table('tests')->insert([ 
            'time' => '15',
            'name' => 'Work Behavior Assessment 3',
            'instruction' => 'Ada sembilan puluh ( 90 ) pasang, pilihlah satu dari setiap pasangan tersebut yang Anda anggap paling dekat menggambarkan diri Anda. Selesaikan pilihan ini dalam waktu <b>LIMA BELAS MENIT</b>'
        ]);
    }
}
