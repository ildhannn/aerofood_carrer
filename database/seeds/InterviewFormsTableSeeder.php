<?php

use Illuminate\Database\Seeder;

class InterviewFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('interview_forms')->insert([
			'competence' => 'INTEGRITAS  (INTEGRITY)',
			'definition' => 'Menjunjung tinggi integritas dan berperilaku konsisten sesuai nilai-nilai perusahaan. Seperti: bertindak jujur, menepati janji, tidak KKN, menolak suap/gratifikasi, tidak mengambil keuntungan dari vendor, dll.']);
		DB::table('interview_forms')->insert([
			'competence' => 'DORONGAN BERPRESTASI (ACHIEVEMENT ORIENTATION)',
			'definition' => 'Kemampuan yang menggambarkan motivasi yang tinggi, ketekunan,keuletan dan konsistensi dalam menghadapi segala hambatan dan perubahan untuk perbaikan dan peningkatan hasil kerja dari hasil kerja sebelumnya serta upaya melebihi target yang ditetapkan.']);
		DB::table('interview_forms')->insert([
			'competence' => 'PEMBELAJARAN DAN PERBAIKAN BERKELANJUTAN (CONTINUOUS LEARNING AND IMPROVEMENT)',
			'definition' => 'Kemampuan mencari peluang atau usaha-usaha berkelanjutan untuk belajar dan berkembang serta mengembangkan dan memperbaiki produk, pelayanan, ataupun proses yang mengarah kepada kemajuan yang lebih baik atau unggul. ']);
		DB::table('interview_forms')->insert([
			'competence' => 'ORIENTASI PELAYANAN PELANGGAN (CUSTOMER SERVICE ORIENTATION)',
			'definition' => 'Keinginan untuk memahami, memenuhi, mengantisipasi dan memberikan jasa / produk melebihi kebutuhan serta harapan pelanggan saat ini maupun di masa yang akan datang, baik internal maupun eksternal, melalui kerjasama tim maupun secara individual untuk membangun kepuasan pelanggan.']);
		DB::table('interview_forms')->insert([
			'competence' => 'ORIENTASI PADA KUALITAS (QUALITY ORIENTATION)',
			'definition' => 'Kepedulian terhadap kualitas kerja (yang mencakup mutu, biaya, on time delivery, keamanan pangan, safety dan produktifitas) dan upaya untuk mencapai akurasi dan standar kualitas kerja yang ditetapkan dengan memperhatikan setiap detail dari proses dan produk hasil kerja, serta mengacu pada instruksi kerja, panduan kerja, standard operating procedure (SOP) dan peraturan perusahaan yang terkait.']);
		DB::table('interview_forms')->insert([
			'competence' => 'KERJASAMA TIM (TEAM WORK)',
			'definition' => 'Kemampuan untuk beradaptasi dan menyelesaikan pekerjaan secara bersama-sama dengan menjadi bagian dalam suatu kelompok untuk mencapai tujuan organisasi, dikaitkan dengan tingkat partisipasi dan kontribusi terhadap kinerja tim.']);
		DB::table('interview_forms')->insert([
			'competence' => 'KEPEMIMPINAN (LEADERSHIP)',
			'definition' => 'Kemampuan untuk memimpin, memberi inspirasi, mengajak, mempengaruhi dan mengarahkan bawahan atau anggota tim kerja kearah pencapaian sasaran unit kerja atau kelompok yang mendukung sasaran perusahaan, tanpa terlalu mengandalkan faktor jabatan formal.']);
		DB::table('interview_forms')->insert([
			'competence' => 'MENGEMBANGKAN ORANG LAIN (DEVELOPING OTHERS)',
			'definition' => 'Kemauan yang kuat untuk meningkatkan pengetahuan, keterampilan, dan pengembangan diri bawahan / orang lain, melalui berbagai cara dan metode yang memungkinkan secara konsisten.']);
		DB::table('interview_forms')->insert([
			'competence' => 'PERENCANAAN DAN PENGORGANISASIAN (PLANNING AND ORGANIZING)',
			'definition' => 'Kemampuan menetapkan sasaran dan prioritas, alokasi sumber daya dan waktu serta menentukan sistem pemantauan dalam melaksanakan program untuk mencapai tujuan organisasi.']);
		DB::table('interview_forms')->insert([
			'competence' => 'BERPIKIR ANALISA DAN MEMECAHKAN MASALAH (ANALITICAL THINKING AND PROBLEM SOLVING)',
			'definition' => 'Kemampuan mengidentifikasi informasi atau situasi secara logis dan sistematis serta menciptakan solusi yang tepat atas permasalahan yang terjadi melalui pengorganisiran semua sumber daya yang terkait dan dibutuhkan untuk proses penyelesaian pekerjaan.']);
		DB::table('interview_forms')->insert([
			'competence' => 'MENGELOLA PERUBAHAN (CHANGE MANAGEMENT)',
			'definition' => 'Kemampuan untuk mengarahkan dan menyiapkan tindakan untuk kebutuhan perubahan baik berupa perubahan struktur organisasi, cara kerja (Job description) atau sistem kerja (SOP / WI) yang berdampak terhadap organisasi melalui training dll']);
		DB::table('interview_forms')->insert([
			'competence' => 'KETAJAMAN BISNIS (BUSINESS ACCUMEN)',
			'definition' => 'Kemampuan untuk memahami situasi dan peluang bisnis diluar perusahaan atau mengidentifikasi potensi di dalam perusahaan untuk kemudian dijadikan suatu usulan konsep perencanaan bisnis (Business Plan)']);
    }
}
