<?php

use Illuminate\Database\Seeder;

class PapisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$max_score = [2,4,7,9];

    	$norm = ['Orang yang terlalu santai dan kerja adalah sesuatu yang menyenangkan dan tidak menjadikan beban yang membutuhkan usaha besar. Termotivasi untuk mencari cara atau sistem yang dapat mempermudah dirinya dalam pekerjaan dan berusaha untuk menghindari kerja keras sehingga dapat terkesan sebagai pekerja yang malas.', 'bekerja keras sesuai tuntutan dan untuk kesenangan saja. Menyalurkan usahanya untuk hal-hal yang bermanfaat dan menguntungkan dirinya.', 'Memiliki kemauan bekerja keras yang tinggi dan jelas tujuan yang ingin dicapainya', 'Orang yang ingin terlihat sebagai pekerja keras dan sangat suka bila orang lain memandangnya sebagai pekerja keras. Cenderung menciptakan pekerjaan yang tidak perlu agar terlihat tetap sibuk dan terkadang tidak memiliki tujuan yang jelas.'];

    	for($i = 0 ; $i < 4; $i++) {
    		DB::table('papis')->insert([
	    		'type'=> 'G',
	    		'max_score'=> $max_score[$i],
	    		'norm'=> $norm[$i],
	    		'role'=> 'PEKERJA KERAS (Hard Intense Worked)'
	    	]);
    	}

    	$max_score = [1,3,4,5,7,9];
    	$norm = ['Puas dengan peran sebagai bawahan dan memberikan kesempatan pada orang lain untuk memimpin. Tidak memiliki minat sama sekali untuk berperan sebagai pemimpin dan di dalam kelompok lebih banyak untuk diam atau pasif.', 'Tidak percaya diri dan tidak ingin memimpin atau mengawasi orang lain.', 'Kurang percaya diri dan kurang berminat untuk memimpin atau mengawasi orang lain.', 'Cukup percaya diri dan tidak secara aktif mencari posisi kepemimpinan akan tetapi juga tidak akan menghindarinya.', 'Percaya diri dan ingin berperan sebagai pemimpin.', 'Sangat percaya diri untuk berperan sebagai atasan dan sangat mengharapkan posisi tersebut. Lebih mementingkan citra dan status kepemimpinannya dari pada efektifitas kelompok. Ia akan terlihat angkuh dan terlalu percaya diri.'];
	
		for($i = 0; $i < sizeof($norm); $i++){
				DB::table('papis')->insert([
					'type' => 'L',
					'norm' => $norm[$i],
					'max_score'=> $max_score[$i],
					'role' => 'PEMIMPIN (Leadership Role)'
				]);
			} 

		$max_score = [1,3,5,7,9];
		$norm = ['Orang yang berhati-hati dan sangat memikirkan langkah-langkahnya secara bersungguh-sungguh. Ia lamban dalam mengambil keputusan, terlalu lama merenung dan cenderung menghindar mengambil keputusan. ', 'Tidak mau mengambil keputusan. ', 'Berhati-hati dalam membuat keputusan.', 'Cukup percaya diri dalam pengambilan keputusan dan mau mengambil resiko. Ia dapat memutuskan dengan cepat dan mengikuti alur logika.', 'Sangat yakin dalam mengambil keputusan, cepat tanggap terhadap situasi, berani mengambil resiko dan mau memanfaatkan kesempatan. Terkadang ia dapat membuat keputusan cepat dan tidak praktis. Ia cenderung mementingkan kecepatan daripada akurasi, tidak sabar dan langsung meloncat kepada keputusan. '];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'I',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MEMBUAT KEPUTUSAN (Decision Making)'
			]);
		} 

		$max_score = [3,6,9];
		$norm = ['Terlalu santai dan kurang peduli akan waktu. Ia kurang memiliki rasa urgensi, banyak membuang-membuang waktu dan bukan pekerja yang tepat waktu. ', 'Cukup aktif secara internal, segi mental dan dapat menyesuaikan tempo kerjanya dengan tuntutan pekerjaan atau lingkungan.', 'Cekatan, selalu siaga, bekerja cepat dan ingin segera menyelesaikan tugas. Akan tetapi ia orang yang mudah cemas, impulsif, ceroboh dan impulsif.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'T',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'KECEPATAN KERJA (Pace)'
			]);
		}


		$max_score = [2,6,9];
		$norm = ['Cocok untuk pekerjaan "di belakang meja". Cenderung lamban, tidak tanggap, mudah lelah dan daya tahan lemah. ', 'Dapat bekerja di belakang meja dan senang jika sesekali harus terjun ke lapangan atau melaksanakan tugas-tugas yang bersifat mobile. ', 'Menyukai aktifitas atau tugas yang membutuhkan fisik, enerjik, memiliki stamina untuk menangani tugas-tugas berat dan tidak mudah lelah. Tidak betah untuk duduk lama dan kurang dapat maksimal bekerja "di belakang meja".'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'V',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'PENUH SEMANGAT (Vigorous Type)'
			]);
		} 

		$max_score = [2,4,9];
		$norm = ['Orang yang lebih senang untuk bekerja secara sendiri dan tidak membutuhkan bantuan orang lain. Kaku dalam bersosialisasi, cenderung menarik diri dan canggung jika berada dalam lingkungan sosial. Ia lebih memperhatikan hal-hal lain daripada manusia.', 'Orang yang kurang percaya diri dan kurang aktif dalam menjalin hubungan sosial.', 'Orang yang memiliki percaya diri yang tinggi, sangat senang bergaul dan menyukai interaksi sosial. Ia bisa menciotakan suasana yang menyenangkan, mempunyai cukup inisiatif, mampu menjalin hubungan, komunikasi dan memperhatikan kebutuhan orang lain. Terkadang ia terlihat membuang-buang waktu untuk aktifitas sosial dan kurang peduli akan penyelesaian tugas.'];


		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'S',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'HUBUNGAN SOSIAL (Social Extension)'
			]);
		} 


		$max_score = [3,5,7,9];
		$norm = ['Merupakan tipe pelaksana, praktis dan pragmatis. Ia banyak mengandalkan pengalaman masa lalu dan intuisi. Ia bekerja dengan tanpa perencanaan dan mengandalkan perasaan. ', 'Merupakan tipe orang yang mengambil pertimbangan dari aspek teoritis (konsep atau pemikiran baru) dan aspek praktis (pengalaman) secara berimbang.', 'Suka memikirkan suatu problem secara mendalam dengan merujuk pada teori dan konsep.', 'Merupakan tipe pemikir. Ia sangat berminat pada gagasan, konsep, teori, perencanaan detail dan mencari alternatif baru. Terkadang gagasan yang diberikan akan sulit dimengerti oleh orang lain karena terlalu teoritis, tidak praktis, mengawang-awang dan berbelit-belit.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'R',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'ORANG YANG TEORITIS (Theoretical Type)'
			]);
		} 

		$max_score = [1,3,6,9];
		$norm = ['Ia melihat pekerjaan secara makro, membedakan hal penting dari yang kurang penting, generalis dan lebih mendelegasikan detil pada orang lain. Ia akan lebih menghindari pekerjaan yang membutuhkan hal detail sehingga konsekuensinya ia banyak bertindak tanpa data yang akurat dan bertindak ceroboh pada hal yang butuh kecermatan. Ia dapat mengabaikan proses yang vital dalam mengevaluasi data-data.  ', 'Cukup peduli akan akurasi dan kelengkapan data.', 'Tertarik untuk menangani sendiri detail.', 'Sangat menyukai detail, peduli akan akurasi dan kelengkapan data. Cenderung terlalu terlibat dengan detail sehingga melupakan tujuan utama.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'D',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'BEKERJA DENGAN HAL – HAL RINCI (Interest in Working With Details)'
			]);
		} 


		$max_score = [2,4,6,9];
		$norm = ['Ia lebih mementingkan fleksibilitas daripada struktur dengan pendekatan kerja lebih ditentukan oleh situasi daripada perencanaan yang telah dilakukannya. Ia mudah beradaptasi dengan situasi yang sering berubah. Ia tidak mempedulikan keteraturan, kerapihan dan cenderung ceroboh. ', 'Orang yang fleksibel tapi masih cukup memperhatikan keteraturan atau sistematika kerja.', 'Ia memperhatikan keteraturan dan sistematika kerja tapi cukup dapat fleksibel.', 'Orang yang sistematis, bermetoda, terstruktur, rapi atau teratur dan dapat menata tugas dengan bail. Cenderung kaku dan tidak fleksibel.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'C',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MENGATUR (Organized Type)'
			]);
		} 

		$max_score = [1,3,6,9];
		$norm = ['Sangat terbuka, terus terang dan mudah terbaca (tindakan, perkataan dan sikap). Ia tidak dapat mengendalikan emosi, cepat bereaksi dan kurang mengindahkan nilai-nilai yang mengharuskannya menahan emosi. ', 'Terbuka dan mudah mengungkap pendapat atau perasaannya mengenai suatu hal kepada orang lain.', 'Mampu mengungkap atau menyimpan perasaan dan dapat mengendalikan emosi.', 'Mampu menyimpan pendapat atau perasaannya, tenang, dapat mengendalikan emosi dan menjaga jarak. Ia terlihat pasif dan tidak acuh serta sulit mengungkapkan emosi/perasaan/pandangan.', ];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'E',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'PENGENDALIAN EMOSI (Emotional Resistant)'
			]);
		} 

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'E',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'PENGENDALIAN EMOSI (Emotional Resistant)'
			]);
		}



		$max_score = [2,5,7,9];
		$norm = ['Memiliki komitmen rendah, konsentrasi mudah teralihkan dan sering berpindah pekerjaan tanpa menyelesaikan pekerjaan terlebih dahulu. Ia tidak terlalu merasa perlu untuk menuntaskan sendiri tugas-tugas yang diberikan. Ia senang menangani beberapa pekerjaan sekaligus dan terkadang mudah mendelegasikan tugas ke orang lain. ', 'Cukup memiliki komitmen untuk menuntaskan tugas akan tetapi jika memungkinkan akan mendelegasikan sebagian dari pekerjaannya kepada orang lain.', 'Memiliki komitmen tinggi dan lebih suka menangani pekerjaan satu demi satu. Akan tetapi ia masih dapat mengubah prioritas jika terpaksa.', 'Memilikki komitmen yang sangat tinggi terhadap tugas dan sangat ingin menyelesaikan tugas. Ia tekun dan tuntas dalam menangani pekerjaan satu demi satu hingga tuntas. Perhatian terpaku pada satu tugas sehingga sulit untuk menangani beberapa pekerjaan sekaligus dan sulit diinterupsi.'];

 		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'N',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MENYELESAIKAN TUGAS SECARA MANDIRI (Need to Finish Task)'
			]);
		}

		$max_score = [4,7,9];
		$norm = ['Tidak kompetitif dan sudah puas dengan kondisi yang ada. Ia tidak terdorong untuk menghasilkan prestasi dan berusaha untuk mencapai sukses. Ia membutuhkan dorongan dari luar diri sehingga tidak memiliki inisiatif dan tidak memanfaatkan kemampuan diri secara optimal.', 'Tahu akan tujuan yang ingin dicapainya dan dapat merumuskannya. Ia realistis akan kemampuan diri dan berusaha untuk mencapai target.', 'Orang yang sangat berambisi untuk berprestasi menjadi yang terbaik. Ia menyukai tantangan cenderung mengejar kesempurnaan dan menetapkan target yang tinggi. Ia mampu merumuskan kerja dengan baik. Sikap berambisi yang dimiliki membuat ia tidak realistis dengan kemampuan yang dimiliki. Ia akan mudah kecewa dan harapan yang tinggi dapat mengganggu orang lain.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'A',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'BERPRESTASI (Need to Achieve)'
			]);
		}

		$max_score = [1,3,4,5,7,9];
		$norm = ['Tidak memiliki keinginan untuk bertanggung jawab pada pekerjaan dan tindakan orang lain. Ia akan memberikan kesempatan pada orang lain untuk memimpin. Ia tidak mau mengontrol orang lain.', 'Enggan mengontrol orang lain dan tidak mau mempertanggung jawabkan hasil kerja bawahannya. Ia lebih memberi kebebasan kepada bawahan untuk memilih cara sendiri dalam penyelesaian tugas dan meminta bawahan untuk mempertanggung jawabkan hasilnya masing-masing.', 'Cenderung enggan melakukan fungsi pengarahan, pengendalian dan pengawasan. Ia kurang aktif memanfaarkan kapasitas bawahan secara optimal, cenderung bekerja sendiri dalam mencapai tujuan kelompok.', 'Bertanggung jawab dan akan melakukan pengarahan, pengendalian dan pengawasan dengan cara tidak terlalu mendominasi.', 'Melakukan fungsi tanggung jawab melalui pengarahan, pengendalian dan pengawasan dengan cara mendominasi situasi di kelompok.', 'Bersikap sangat dominan, sangat mempengaruhi, mengawasi orang lain, bertanggung jawab atas tindakan dan hasil kerja bawahan. Ia tidak ingin berada di bawah pimpinan orang lain dan cemas bila tidak berada di posisi pemimpin. Kemungkinan ia akan sulit untuk bekerja sama dengan rekan yang sejajar kedudukannya.'];

  		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'P',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MENGATUR ORANG LAIN (Need to Control Others)'
			]);
		}

		$max_score = [1,3,5,9];
		$norm = ['Sederhana, rendah hati, tulus, tidak sombong dan tidak suka menampilkan diri. Ia cenderung merendahkan dengan kapasitas diri yang dimiliki, tidak percaya diri, cenderung menarik diri dan pemalu. ', 'Rendah hati, tulus, tidak suka menonjolkan diri dan cenderung diam.', 'Memiliki pola perilaku yang unik dengan mengharapkan pengakuan lingkungan dan tidak mau diabaikan tetapi tidak mencari-cari perhatian.', 'Membutuhkan perhatian nyata dan bangga akan diri dan gayanya sendiri. Ia senang menjadi pusat perhatian dan mengharapkan penghargaan dari lingkungan. Mencari-cari perhatian dan suka menyombongkan diri.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'X',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'KEBUTUHAN - UNTUK DIPERHATIKAN (Need to be Noticed)'
			]);
		}

 		$max_score = [2,5,9];
 		$norm = ['Orang yang sangat selektif. Ia mandiri dari segi emosi dan tidak mudah dipengaruhi oleh tekanan kelompok. Ia lebih suka menyendiri, kurang peka akan sikap dan kebutuhan kelompok. Ia akan sulit menyesuaikan diri. ', 'Butuh diterima tetapi masih cukup selektif dalam bergabung dengan kelompok. Ia hanya mau berhubungan dengan kelompok di lingkungan kerja apabila bernilai dan sesuai minat. Ia tidak mudah dipengaruhi kelompok.', 'Ia suka bergabung dalam kelompok, sadar akan sikap dan kebutuhan kelompok, suka bekerjasama, ingin menjadi bagian dari kelompok dan ingin disukai dan diakui oleh lingkungan. Ia sangat tergantung pada kelompok dan lebih memperhatikan kebutuhan kelompok daripada pekerjaan.'];
		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'B',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'DITERIMA DALAM KELOMPOK (Need to Belong to Groups)'
			]);
		}

 		$max_score = [2,5,9];
 		$norm = ['Tidak suka dengan hubungan perorangan. Ia akan menjaga jarak, lebih memperhatikan hal-hal kedinasan atau tugas. Ia orang yang tidak mudah dipengaruhi oleh individu tertentu, objektif dan analitis. Dalam hubungan interpersonal, ia akan bersikap tidak acuh, tidak ramah, terlihat "dingin", suka berahasia, tidak peduli akan perasaan orang lain dan kemungkinan sulit untuk menyesuaikan diri. ', 'Sadar akan hubungan perorangan, tapi tidak terlalu tergantung. Ia tidak mencari atau menghindari hubungan antar pribadi di lingkungan kerja. Ia masih mampu menjaga jarak.', 'sangat tergantung dan butuh akan penerimaan diri dari lingkungan sekitarnya. Ia peka akan kebutuhan orang dan sangat memikirkan hal-hal yang dibutuhkan orang lain. Ia suka menjalin hubungan persahabatan yang hangat dan tulus. Ia orang yang sangat perasa. mudah tersinggung, cenderung subjektif, dapat terlibat terlalu dekat dengan individu tertentu dalam pekerjaan dan sangat tergantung pada individu tertentu.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'O',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'KEDEKATAN DAN KASIH SAYANG (Need for Closeness and Affection)'
			]);
		}

		$max_score = [1,3,5,7,9];
		$norm = ['Ia orang yang tidak suka berubah dengan perubahan baru. Ia merupakan tipe orang yang cenderung konservatif, menyukai lingkungan yang stabil, menolak dengan adanya perubahan dan sulit menerima hal-hal baru. Ia tidak dapat beradaptasi dengan situasi yang berbeda-beda. ', 'Ia tipe orang yang enggan berubah dan tidak siap untuk beradaptasi. Ia tidak suka perubahan jika dipaksakan dan hanya mau menerima perubahan jika alasannya jelas dan meyakinkan.', 'Ia mudah menyesuaikan diri dan beradaptasi dengan perubahan yang baru.', 'Ia antusias terhadap perubahan dan akan mencari hal-hal baru meskipun membuat perubahan dengan selektif. Ia cukup mampu untuk berfikir jauh kedepan.', 'Ia orang yang sangat menyukai perubahan, gagasan baru dan aktif mencari perubahan. Ia memiliki fleksibelitas dalam berpikir dan mudah beradaptasi pada situasi yang berbeda-beda. Jika segala sesuatu tidak berjalan dengan baik, ia akan gelisah, frustasi dan tidak menyukai tugas atau situasi yang rutin atau monoton.'];

 		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'Z',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'KEBUTUHAN - UNTUK BERUBAH (Need for Change)'
			]);
		}

		$max_score = [1,3,5,7,9];
		$norm = ['Ia orang yang sabar dan tidak menyukai konflik dengan orang lain. Jika ada suatu masalah, ia akan bersikap pasif dan berusaha menghindari masalah atau konfrontasi yang ada. Ia tidak mau mengakui adanya konflik. ', 'Ia lebih suka lingkungan tenang dan berusaha untuk menghindari konflik. Jika ada konflik, ia akan mencari rasionalisasi untuk dapat menerima situasi dan melihat permasalahan dari sudut pandang orang lain.', 'Ia tidak mencari atau menghindari konflik. Ia mau mendengarkan pandangan orang lain tetapi dapat menjadi keras kepala saat mempertahankan pandangannya.', 'Terkadang ia akan bersikap agresif jika berhubungan dengan kerja dan memberikan dorongan semangat untuk bersaing. Ia akan menghadapi konflik yang muncul dan mengungkapkan serta memaksakan pandangan dengan cara positif.', 'Ia orang yang terbuka, jujur, agresif, langsung berterus terang, reaktif, mudah tersinggung dan mudah untuk berkonfrontasi langsung. Ia cenderung defensif dan berpikir negatif ke orang lain.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'K',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'UNTUK AGRESIF (Need to be Forceful)'
			]);
		}

		$max_score = [3,6,7,9];
		$norm = ['Orang yang dapat bekerja sendiri tanpa bantuan orang lain. Ia akan bersikap setia dan membantu dengan kemungkinan bantuannya bersifat politis dan loyalitas lebih didasari kepentingan pribadi. Terkadang ia tidak puas terhadap atasan dan cenderung mempertanyakan otoritas yang diberikan. Ia cenderung egois dan memiliki kemungkinan untuk memberontak. Motivasi timbul karena pekerjaan itu sendiri dan bukan karena pujian dari atasan. ', 'Orang yang loyal dan setia terhadap perusahaan.', 'Orang yang loyal dan setia terhadap pribadi atasan.', 'Orang loyal dan berusaha dekat dengan prinadi atasan. Ia akan selalu menyenangkan atasan dan sadar akan harapan atasan akan dirinya. Ia terlalu memperhatikan cara menyenangkan atasan, tidak berani untuk berpendirian lain dan berbeda serta sangat tidak mandiri dan sangat bergantung pada atasan. '];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => 'F',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MEMBANTU ATASAN (Need to Support Authority)'
			]);
		}

		$max_score = [3,5,7,9];
		$norm = ['Ia hanya butuh gambaran tentang kerangka tugas secara garis besar, berpatokan pada tujuan. Ia bekerja secara mandiri, inisiatif dan dapat bekerja dalam suasana yang kurang berstruktur. Terkadang ia bersikap tidak patuh, suka membuat peraturan sendiri dan cenderung mengabaikan peraturan atau prosedur yang ada. ', 'Ia perlu pengarahan di awal dan diberikan tolak ukur keberhasilan. ', 'Ia membutuhkan uraian rinci mengenai tugas, batasan tanggung jawab dan wewenang yang jelas.', 'Ia patuh pada kebijaksanaan, peraturan dan struktur organisasi yang ada. Ia ingin segala sesuatunya diuraikan secara rinci, kurang memiliki inisiatif, tidak fleksibel dan terlalu tergantung pada organisasi.'];

		for($i = 0; $i < sizeof($norm); $i++ ){
			DB::table('papis')->insert([
				'type' => '@',
				'norm' => $norm[$i],
				'max_score'=> $max_score[$i],
				'role' => 'MENGIKUTI ATURAN DAN PENGAWASAN (Need for Rules and Supervision)'
			]);
		}
    }
}
