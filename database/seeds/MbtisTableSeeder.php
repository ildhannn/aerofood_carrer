<?php

use Illuminate\Database\Seeder;

class MbtisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mbtis')->insert([
        	'type'=>'ISTJ',
        	'tagline'=> 'Doing what should be done',
        	'character'=>'Responsiible, sincere, analytical, reserved, realistic, systematic, Hardworking and trustworthy with sound practical judgement',
        	'trait'=>'Bertanggung Jawab',
        	'position'=>'Manajemen, Audit, Industrial Relation, Legal, Keuangan, Programmer, System Analyst.',
        	'partner'=>'ESFP/ESTP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ISFJ',
        	'tagline'=> 'A high sense of duty',
        	'character'=>'Warm, considerate, gentle, responsible, pragmatic, through. Devoted caretakers who enjoy being helpful to others.',
        	'trait'=>'Setia',
        	'position'=>'Design Interior, Administratif, Konselor, Back Office, Hospitality.',
        	'partner'=>'ESFP/ESTP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ISTP',
        	'tagline'=> 'Ready to try anything once',
        	'character'=>'Action-oriented, logical, analytical, spontaneous, reserved, independent. Enjoy adventure, skilled at understanding how mechanical things work.',
        	'trait'=>'Pragmatis',
        	'position'=>'Programmer, IT, System Analyst, Teknisi, Mekanik, Enterpreneur',
        	'partner'=>'ESTJ/ENTJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ISFP',
        	'tagline'=> 'Sees much but shares little',
        	'character'=>'Gentle, sensitive, nurturing, helful, flexible, realistic. Seek to create a personal environment that is both beautiful and practical.',
        	'trait'=>'Artistik',
        	'position'=>'Designer, Guru, Konselor, Psikolog',
        	'partner'=>'ESFJ/ENFJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'INFJ',
        	'tagline'=> 'An Inspiration to Others',
        	'character'=>'Idealistic, organized, insighful, dependable, compassionate, gentle. Seek harmony and cooperation, enjoy intellectual stimulation.',
        	'trait'=>'Reflektif',
        	'position'=>'Training, Dokter, Konselor, Pekerja Sosial, Fotografer, Designer.',
        	'partner'=>'ESFP/ESTP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'INTJ',
        	'tagline'=> 'Everything has room for improvement',
        	'character'=>'Innovative, independent, strategic, logical, reserved, insightful. Driven by their own original ideas to achieve improvements.',
        	'trait'=>'Independen',
        	'position'=>'Research & Development, Insinyur, Teknis, Pengajar, Business Analyst, System Analyst, Progtammer dan Board of Management.',
        	'partner'=>'ENFP/ENTP'
        ]); 
        DB::table('mbtis')->insert([
        	'type'=>'INFP',
        	'tagline'=> 'Performing noble service to aid society',
        	'character'=>'Sensitive, creative, idealistic, perceptive, caring, loyal. Value inner harmony and personal growth, focus on dreams and posiibilities.',
        	'trait'=>'Idealis',
        	'position'=>'Sastrawan, Konselor, Trainer, Hospitality.',
        	'partner'=>'ENFJ/ESFJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'INTP',
        	'tagline'=> 'A love of problem solving',
        	'character'=>'Intellectual, lodical, precise, reserved, flexible, imaginative. Original thinkers who enjoy speculation and creative problem solving.',
        	'trait'=>'Konseptual',
        	'position'=>'Pengacara, Teknisi, Fotografer, Programmer, IT, Internal Audit.',
        	'partner'=>'ENTJ/ESTJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ESTP',
        	'tagline'=> 'The ultimate realists',
        	'character'=>'Outgoing, realistic, action-oriented, curious, versatile, spontaneous. Pragmatic problem solvers and skillful negotiators.',
        	'trait'=>'Spontan',
        	'position'=>'Marketing, Sales, Enterpreneur, Techinal Support.',
        	'partner'=>'ISFJ/ISTJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ESFP',
        	'tagline'=> 'You only go around once in life',
        	'character'=>'Playful, enthusiatic, friendly, spontaneous, tactful, flexible. Have strong common sense, enjoy helping people in tangible ways.',
        	'trait'=>'Murah Hati',
        	'position'=>'Marketing, Konselor, Designer.',
        	'partner'=>'ISTJ/ISFJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ENFP',
        	'tagline'=> 'Giving life an extra squeeze',
        	'character'=>'Enthusiastic, creative, spontaneous, optimistic, supportive, playful. Value inspiration, enjoy starting new projects, see potential in others.',
        	'trait'=>'Optimis',
        	'position'=>'Konselor, Trainer, Motivator, MC, Reporter.',
        	'partner'=>'INTJ/INFJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ENTP',
        	'tagline'=> 'One exciting challenge after another',
        	'character'=>'Inventive, enthusiatic, strategic, enterprising, inquisitive, versatile. Enjoy new ideas and challenges, value inspiration.',
        	'trait'=>'Inovatif - Kreatif',
        	'position'=>'Pengacara, Psikolog, Konsultan, Marketing.',
        	'partner'=>'INFJ/INTJ'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ESTJ',
        	'tagline'=> "Life's admininstrators",
        	'character'=>'Efficient, outgoing, analtycal, systematic, dependable, realistic. Like to run the show and get things done in an orderly fashion.',
        	'trait'=>'Konservatif - Disiplin',
        	'position'=>'Legal, Sales, Auditor, Akuntan.',
        	'partner'=>'ISTP/INTP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ESFJ',
        	'tagline'=> 'Hosts and hostesses of the world',
        	'character'=>'Friendly, outgoing, reliable, conscientious, organized, practical. Seek to be helful and please others, enjoy being active and productive.',
        	'trait'=>'Harmonis',
        	'position'=>'Administratif, Financial Konsultant, Konselor.',
        	'partner'=>'ISFP/INFP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ENFJ',
        	'tagline'=> 'Smooth talking persuader',
        	'character'=>'Caring, enthusiastic, idealistic, organized, diplomatic, responsible. Skilled communicators who value connection with people.',
        	'trait'=>'Meyakinkan',
        	'position'=>'Marketing, Human Capital Konselor, Konsultan.',
        	'partner'=>'INFP/ISFP'
        ]);
        DB::table('mbtis')->insert([
        	'type'=>'ENTJ',
        	'tagline'=> "Life's natural leaders",
        	'character'=>'Strategic, logical, efficient, outgoing, ambitious, independent. Effective organizers of people and long-range planners.',
        	'trait'=>'Pemimpin Alami',
        	'position'=>'Konsultan, Pemimpin Organisasi, Business Analyst, Financial Analyst.',
        	'partner'=>'INTP/ISTP'
        ]);

		DB::table('mbti_explanations')->insert(['mbti_id'=> 1, 'explanation'=> "Serius, tenang, stabil dan damai."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 1, 'explanation'=> "Senang pada fakta, logis, obyektif, praktis dan realistis."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 1, 'explanation'=> "Orientasi tugas, tekun, teratur, menepati janji, dapat diandalkan dan bertanggung jawab."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 1, 'explanation'=> "Pendengar yang baik, setia dan hanya mau berbagi dengan orang dekat."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 1, 'explanation'=> "Memegang aturan, standar dan prosedur dengan teguh."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>1, 'development'=>"Belajarlah memahami perasaan dan kebutuhan orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>1, 'development'=>"Kurangi keinginan untuk mengontrol orang lain atau memerintah mereka untuk menegakkan aturan."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>1, 'development'=>"Lihatlah lebih banyak sisi positif pada orang lain atau hal lainnya."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>1, 'development'=>"Terbuka terhadap perubahan."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=> 2, 'explanation'=> "Penuh pertimbangan, hati-hati, teliti dan akurat."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 2, 'explanation'=> "Serius, tenang, stabil namun sensitif."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 2, 'explanation'=> "Ramah, perhatian pada perasaan dan kebutuhan orang lain, setia, kooperatif dan pendengar yang baik."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=> 2, 'explanation'=> "Punya kemampuan mengorganisasi, detail, teliti, sangat bertanggung jawab dan bisa diandalkan."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>2, 'development'=> 'Lihat lebih dalam, lebih antusias dan lebih semangat.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>2, 'development'=> 'Belajar untuk mengatakan "Tidak". Jangan menyenangkan semua orang atau Anda dianggap plin plan.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>2, 'development'=> 'Jangan terjebak zona nyaman dan rutinitas. Cobalah hal baru. Ada banyak hal menyenangkan yang mungkin belum pernah anda coba.']);

		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Tenang, pendiam, cenderung kaku, dingin, hati-hati dan penuh pertimbangan.']);
		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Logis, rasional, kritis, obyektif dan mampu mengesampingkan perasaan.']);
		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Mampu menghadapi perubahan mendadak dengan cepat dan tenang.']);
		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Percaya diri, tegas dan mampu menghadapi perbedaan maupun kritik.']);
		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Mampu menganalisa, mengorganisir dan mendelegasikan.']);
		DB::table('mbti_explanations')->insert(['mbti_id'=>3, 'explanation'=>'Problem solver yang baik terutama untuk masalah teknis dan keadaan mendadak.']);

		DB::table('mbti_developments')->insert(['mbti_id'=>3, 'development'=>'Observasi kehidupan sosial, apa yang membuat orang marah, cinta, senang, termotivasi dan terapkan pada hubungan Anda.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>3, 'development'=>'Belajarlah untuk mengenali perasaan Anda dan mengekspresikannya.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>3, 'development'=>'Jadilah orang yang lebih terbuka, keluar dari zona nyaman, eksplorasi ide baru dan berdiskusi dengan orang lain.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>3, 'development'=>'Jangan mencari-cari kesalahan orang hanya untuk menyelesaikan masalahnya.']);
		DB::table('mbti_developments')->insert(['mbti_id'=>3, 'development'=>'Jangan menyimpan informasi yang harusnya dibagi dan belajarlah mempercayakan tanggung jawab pada orang lain.']);

		DB::table('mbti_explanations')->insert(['mbti_id'=>4, 'explanation'=> "Berpikiran simpel dan praktis, fleksibel, sensitif, ramah, tidak menonjolkan diri, dan rendah hati pada kemampuannya."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>4, 'explanation'=> "Menghindari konflik, tidak memaksakan pendapat atau nilai-nilainya pada orang lain."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>4, 'explanation'=> "Biasanya tidak mau memimpin tetapi menjadi pengikut dan pelaksana yang setia."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>4, 'explanation'=> "Seringkali santai menyelesaikan sesuatu karena sangat menikmati apa yang terjadi saat ini."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>4, 'explanation'=> "Menunjukkan perhatian lebih banyak melalui tindakan dibandingkan kata-kata."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>5, 'explanation'=> "Perhatian, empati, sensitif dan berkomitmen terhadap sebuah hubungan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>5, 'explanation'=> "Sukses karena ketekunan, originalistas dan keinginan kuat untuk melakukan apa saja yang diperlukan termasuk memberikan yang terbaik dalam pekerjaan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>5, 'explanation'=> "Idealis, perfeksionis dan memegang teguh prinsip."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>5, 'explanation'=> "Visioner, penuh ide, kreatif, suka merenung dan inspiring."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>5, 'explanation'=> "Biasanya diikuti dan dihormati karena kejelasan visi serta dedikasi pada hal-hal bai"]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Visioner, punya perencanaan praktis dan biasanya memiliki ide-ide original serta dorongan kuat untuk mencapainya."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Mandiri dan percaya diri."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Punya kemampuan analisa yang bagus serta menyederhanakan sesuatu yang rumit dan abstrak menjadi sesuatu yang praktis, mudah dipahami dan dipraktekkan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Skeptis, kritis, logis, menentukan (determinatif) dan kadang keras kepala."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Punya keinginan untuk berkembang serta selalu ingin lebih maju dari orang lain."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>6, 'explanation'=> "Kritik dan konflik tidak menjadi masalah besar."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>7, 'explanation'=> "Sangat perhatian dan peka dengan perasaan orang lain."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>7, 'explanation'=> "Penuh dengan antusiasme dan kesetiaan tapi biasanya hanya untuk orang dekat."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>7, 'explanation'=> "Peduli pada banyak hal. Cenderung mengambil terlalu banyak pekerjaan dan menyelesaikan sebagian."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>7, 'explanation'=> "Cenderung idealis dan perfeksionis."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>7, 'explanation'=> "Berpikir untuk win - win solution, mempercayai dan mengoptimalkan orang lain."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>8, 'explanation'=> "Sangat menghargai intelektualitas dan pengetahuan. Menikmati hal-hal teoritis dan ilmiah. Senang memecahkan masalah dengan logika dan analisa."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>8, 'explanation'=> "Diam dan menahan diri. Lebih suka bekerja sendiri."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>8, 'explanation'=> "Cenderung kritis, skeptis, mudah curiga dan pesimis."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>8, 'explanation'=> "Tidak suka memimpin dan bisa menjadi pengikut yang tidak banyak menuntut."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>8, 'explanation'=> "Cenderung memiliki minat yang jelas. Membutuhkan karir dimana minatnya bisa berkembang dan bermanfaat. Jika menemukan sesuatu yang menarik minatnya, ia akan sangat serius dan antusias menekuninya."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>9, 'explanation'=> "Spontan, aktif, enerjik, cekatan, cepat, sigap, antusias, fun dan penuh variasi."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>9, 'explanation'=> "Komunikator, asertif, to the point, ceplas - ceplos, berkarisma, punya interpersonal skill yang baik."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>9, 'explanation'=> "Baik dalam pemecahan masalah langsung di tempat. Mampu menghadapi masalah, konflik dan kritik. Tidak khawatir dan menikmati apapun yang terjadi."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>9, 'explanation'=> "Cenderung untuk menyukai sesuatu yang mekanistis, kegiatan bersama dan olahraga."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>9, 'explanation'=> "Mudah beradaptasi, toleran dan pada umumnya konservatif tentang nilai-nilai. Tidak suka penjelasan terlalu panjang. Paling baik dalam hal-hal nyata yang dapat dilakukan."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>10, 'explanation'=> "Outgoing, easygoing, mudah berteman, bersahabat, sangat sosial, ramah, hangat dan menyenangkan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>10, 'explanation'=> "Oprimis, ceria, antusias, fun, menghibur dan suka menjadi perhatian."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>10, 'explanation'=> "Punya interpersonal skill yang baik, murah hati, mudah simpatik dan mengenali perasaan orang lain. Orang yang menghindari konflik dan menjaga keharmonisan suatu hubungan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>10, 'explanation'=> "Mengetahui apa yang terjadi di sekelilingnya dan ikut serta dalam kegiatan tersebut."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>10, 'explanation'=> "Sangat baik dalam keadaan yang membutuhkan common sense, tindakan cepat dan keterampilan praktis."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>11, 'explanation'=> "Ramah, hangat, enerjik, optimis, antusias, memiliki semangat tinggi."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>11, 'explanation'=> "Imaginatif, penuh ide, kreatif dan inovatif."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>11, 'explanation'=> "Mampu beradaptasi dengan beragam situasi dan perubahan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>11, 'explanation'=> "Pandai berkomunikasi, senang bersosialisasi dan membawa suasana positif."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>11, 'explanation'=> "Mudah membaca perasaan dan kebutuhan orang lain."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>12, 'explanation'=> "Gesit, kreatif, inovatif, cerdik, logis dan baik dalam banyak hal."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>12, 'explanation'=> "Banyak bicara dan punya kemampuan debat yang baik. Bisa berargumentasi untuk senang-senang saja tanpa merasa bersalah."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>12, 'explanation'=> "Fleksibel dan punya banyak cara untuk memecahkan masalah dan tantangan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>12, 'explanation'=> "Kurang konsisten dan cenderung untuk melakukan hal baru yang menarik hati setelah melakukan sesuatu yang lain."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>12, 'explanation'=> "Punya keinginan kuat untuk mengembangkan diri."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>13, 'explanation'=> "Praktis, realistis, berpegang pada fakta dengan dorongan untuk bisnis."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>13, 'explanation'=> "Sangat sistematis, prosedural dan terencana."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>13, 'explanation'=> "Disiplin, tepat waktu dan pekerja keras."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>13, 'explanation'=> "Konservatif dan cenderung kaku."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>13, 'explanation'=> "Tidak tertarik pada subjek yang tidak berguna baginya tetapi dapat menyesuaikan diri jika diperlukan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Senang mengorganisir sesuatu. Bisa menjadi administrator yang baik jika mereka ingat untuk memperhatikan perasaan dan perspektif orang lain."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Hangat, banyak bicara, populer, dilahirkan untuk bekerjasama, supportif dan anggota kelompok yang aktif."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Membutuhkan keseimbangan dan baik dalam menciptakan harmoni."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Selalu melakukan sesuatu yang manis bagi orang lain. Kerja dengan baik dalam situasi yang mendukung dan memujinya."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Santai, easy going, sederhana dan tidak berfikir panjang."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>14, 'explanation'=> "Teliti dan rajin merawat apa yang ia miliki."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>15, 'explanation'=> "Kreatif, imajinatif, peka, sensitif dan loyal"]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>15, 'explanation'=> "Pada umumnya peduli pada apa kata orang atau apa yang orang lain inginkan dan cenderung melakukan sesuatu dengan memperhatikan perasaan orang lain."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>15, 'explanation'=> "Pandai bergaul, meyakinkan, ramah, menyenangkan, populer, simpatik. Responsif pada kiritik dan pujian."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>15, 'explanation'=> "Menyukai variasi dan tantangan baru."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>15, 'explanation'=> "Membutuhkan apresiasi dan penerimaan."]);

		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Tegas, asertif, to the point, jujur terus terang, obyektif, kritis dan punya standard tinggi"]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Dominan, kuat kemauannya, perfeksionis, kompetitif."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Tangguh, disiplin dan sangat menghargai komitmen."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Cenderung menutupi perasaan dan menyembunyikan kelemahan."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Berkharisma, komunikasi baik dan mampu menggerakkan orang."]);
		DB::table('mbti_explanations')->insert(['mbti_id'=>16, 'explanation'=> "Berbakat pemimpin."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>4, 'development'=>"Jangan takut pada penolakan dan konflik. Anda tidak perlu menyenangkan semua orang."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>4, 'development'=>"Cobalah untuk mulai memikirkan dampak jangka panjang dari keputusan-keputusan kecil di hari ini."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>4, 'development'=>"Asah dan kembangkan sisi kreatifitas dan seni dalam diri Anda sebagai modal bagus dalam diri Anda."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>4, 'development'=>"Cobalah untuk lebih terbuka dan mengekspresikan perasaan Anda"]);

		DB::table('mbti_developments')->insert(['mbti_id'=>5, 'development'=>"Seimbangkan cara pandang dan jangan hanya melihat sisi nnegatif dan resiko. Namun lihatlah sisi positif dan peluangnya."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>5, 'development'=>"Bersabarlah, jangan mudah marah dan menyalahkan orang lain atau situasi."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>5, 'development'=>"Rileks dan jangan terus menerus berfikir atau menyelesaikan tanggung jawab."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>6, 'development'=>"Belajarlah mengungkapkan emosi dan perasaan Anda."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>6, 'development'=>"Cobalah untuk lebih terbuka pada dunia luar, banyak berteman / bergaul, banyak belajar, banyak membaca, mengunjungi banyak tempat, eksplorasi hal baru dan memperluas wawasan."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>6, 'development'=>"Hindari perdebatan tidak penting."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>6, 'development'=>"Belajarlah untuk berempati, memberi perhatian dan lebih peka terhadap orang lain."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>7, 'development'=>"Belajarlah menghadapi kritik. Jika baik maka kritik itu bisa membangun Anda namun jika tidak abaikan saja. Jangan ragu pula untuk bertanya dan minta saran."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>7, 'development'=>"Belajarlah untuk bersikap tegas. Jangan selalu berperasaan dan menyenangkan orang dengan tindakan baik. Bertindak baik itu berbeda dengan bertindak benar."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>7, 'development'=>"Jangan terlalu menyalahkan diri dan bersikap terlalu keras pada diri sendiri. Kegagalan adalah hal biasa dan semua orang pernah mengalaminya."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>7, 'development'=>"Jangan terlalu baik pada orang lain tapi melupakan diri sendiri. Anda juga punya tanggung jawab untuk berbuat baik pada diri sendiri."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>8, 'development'=>"Belajarlah membangun hubungan dengan orang lain. Belajar berempati, mendengar aktif, memberi perhatian dan bertukar pendapat."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>8, 'development'=>"Bersikap relax dan jangan terlalu banyak berfikir. Nikmati hidup Anda tanpa harus bertanya mengapa dan bagaimana."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>8, 'development'=>"Cobalah menemukan satu ide, merencanakan dan mewujudkannya. Jangan terlalu sering berganti-ganti ide tetapi tidak satupun yang terwujud."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>9, 'development'=>"Belajarlah memahami perasaan dan pemikiran orang lain terutama saat bicara dengan mereka."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>9, 'development'=>"Belajarlah untuk sabar, menikmati proses dan tidak semua hal bisa dicapai dengan cepat."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>9, 'development'=>"Sesekali luangkan waktu untuk merenung dan merencanakan masa depan Anda."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>9, 'development'=>"Cobalah untuk mencatat pengamatan-pengamatan Anda termasuk detailnya."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>10, 'development'=>"Belajarlah untuk fokus dan tidak mudah berubah-ubah terutama untuk hal yang penting. Anda jangan terburu-buru dalam mengambil keputusan."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>10, 'development'=>"Jangan menyenangkan semua orang. Begitu pula sebaliknya tidak semua orang bisa menyenangkan Anda."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>10, 'development'=>"Belajarlah menghadapi kritik dan konflik. "]);
		DB::table('mbti_developments')->insert(['mbti_id'=>10, 'development'=>"Anda punya kecenderungan materialistis. Hati-hati dan tidak semua bisa diukur dengan materi ataupun uang."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>11, 'development'=>"Belajarlah untuk fokus, disiplin, tegas dan konsisten."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>11, 'development'=>"Belajarlah untuk menghadapi konflik dan kritik."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>11, 'development'=>"Pikirkan kebutuhan diri sendiri. Jangan melupkannya karena terlalu peduli pada kebutuhan orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>11, 'development'=>"Belajarlah untuk mengelola keuangan sedikit demi sedikit."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>12, 'development'=>"Jangan ingin menang sendiri dan mencoba untuk mencari win - win solution."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>12, 'development'=>"Belajarlah untuk disiplin dan konsisten."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>12, 'development'=>"Hindari perdebatan tidak penting."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>12, 'development'=>"Belajarlah untuk sedikit waspada dan seimbangkan cara pandang Anda agar tidak terlalu optimis dan mengambil resiko yang tidak realistis."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>12, 'development'=>"Belajarlah untuk memberi perhatian pada perasaan orang lain."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>13, 'development'=>"Kurangi keinginan untuk mengontrol dan memaksa orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>13, 'development'=>"Belajarlah untuk mengontrol emosi dan amarah Anda."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>13, 'development'=>"Cobalah untuk introspeksi diri dan meluangkan waktu sejenak untuk merenung."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>13, 'development'=>"Belajarlah untuk lebih sabar dan rendah hati."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>13, 'development'=>"Belajarlah untuk memahami orang lain."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>14, 'development'=>"Jangan mengorbankan diri hanya untuk menyenangkan orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>14, 'development'=>"Jangan mengukur harga diri Anda dari perlakuan, penghargaan dan pujian orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>14, 'development'=>"Mintalah pertimbangan orang lain dalam mengambil keputusan. Belajarlah untuk lebih tegas."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>14, 'development'=>"Terima tanggung jawab dan belajarlah untuk lebih dewasa. Jangan mengasihani diri sendiri."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>14, 'development'=>"Hadapi kritik dan konflik."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>15, 'development'=>"Jangan mengorbankan diri hanya untuk menyenangkan orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>15, 'development'=>"Jangan mengukur harga diri Anda dari perlakuan orang lain. Jangan mudah kecewa jika mereka tidak seperti yang Anda inginkan."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>15, 'development'=>"Belajarlah untuk tegas dan mengambil keputusan. Berani menghadapi kritik dan konflik."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>15, 'development'=>"Jangan terlalu bersikap keras terhadap diri sendiri."]);

		DB::table('mbti_developments')->insert(['mbti_id'=>16, 'development'=>"Belajarlah untuk relaks. Tidak perlu perfeksionis dan selalu kompetitif dengan semua orang. "]);
		DB::table('mbti_developments')->insert(['mbti_id'=>16, 'development'=>"Belajar mengungkapkan perasaan Anda. Menyatakan perasaan bukanlah kelemahan."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>16, 'development'=>"Belajarlah mengelola emosi Anda. Jangan mudah marah."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>16, 'development'=>"Belajarlah untuk menghargai dan mengapresiasi orang lain."]);
		DB::table('mbti_developments')->insert(['mbti_id'=>16, 'development'=>"Jangan terlalu arogan dan menganggap remeh orang lain. Jangan hanya melihat benar dan salah saja."]);

    }
}
