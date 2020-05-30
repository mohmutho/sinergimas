-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2020 pada 04.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `author` char(20) NOT NULL,
  `publish` char(7) NOT NULL,
  `userfile` text NOT NULL,
  `userfile_type` char(10) NOT NULL,
  `userfile_size` int(11) NOT NULL,
  `uploader` char(20) NOT NULL,
  `time_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` char(20) NOT NULL,
  `time_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `judul_seo`, `isi_berita`, `kategori`, `author`, `publish`, `userfile`, `userfile_type`, `userfile_size`, `uploader`, `time_upload`, `updater`, `time_update`) VALUES
(13, 'Penyerahan Sertifikat Akreditasi Jurnal Ilmiah Elektronik', 'penyerahan-sertifikat-akreditasi-jurnal-ilmiah-elektronik', '<p xss=removed>Pada hari senin 25 Nopember 2019 Kementerian Riset dan Teknologi/Badan Riset dan Inovasi Nasional menyelenggarakan kegiatan Koordinasi Pengembangan Jurnal dan Penyerahan Sertifikat Akreditasi Jurnal Ilmiah Elektronik di Hotel Grand Sahid Jakarta. Agenda ini merupakan Follow up dari hasil verifikasi Akreditasi Jurnal PETIR STT-PLN yang telah ditetapkan sebagai jurnal terakreditasi SINTA 4. LPPM STT-PLN kemudian merespon agenda tersebut dengan mendelegasikan Kasie Jurnal dan Publikasi STT-PLN pada kegiatan tersebut. Perolehan Sertifikat Akreditasi Jurnal PETIR yang telah terakreditasi SINTA 4 tersebut kemudian memperoleh apresiasi dari Ketua STT-PLN, Prof. Dr. Ir.Iwa Garniwa Mulyana k, MT. Ketua STT-PLN secara konsisten memberikan dukungan penuh terhadap pengembangan kualitas dan kuantitas jurnal ilmiah STT-PLN. Dengan capaian ini, tantangan-tantangan dalam meningkatkan kualitas publikasi akan selalu ada. Dan setiap stakeholder yang terlibat harus selalu siap dengan tantangan dan perubahan yang ada.</p>', 'Penelitian', 'Mutho', 'Ya', 'penyerahan-sertifikat-akreditasi-jurnal-ilmiah-elektronik', '.jpeg', 194, 'Mutho', '2020-03-10 10:40:27', '', '2020-03-10 10:40:27'),
(14, 'Desk dan Evaluasi Proposal Penelitian dan PkM STT-PLN', 'desk-dan-evaluasi-proposal-penelitian-dan-pkm-sttpln', '<p xss=removed>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STT-PLN menggelar kegiatan Desk Evaluasi proposal penelitian dan PKM internal yang dimulai tanggal 6 November sampai dengan 13 November 2019. Kepala LPPM STT-PLN Indrianto, S.Kom, MT mengungkapkan, kegiatan ini bertujuan untuk meningkatkan kualitas dan efektifitas kinerja penelitian rekan rekan Dosen STT-PLN baik Dosen junior maupun Dosen senior terutama luaran luaran penelitian yang akan dihasilkan diharapkan dapat bereputasi/terakreditasi baik di tingkat nasional maupun internasional</p>\r\n<p xss=removed>Antusiasme peserta desk evaluasi cukup besar, dari 3 skema penelitian dan 1 skema PKM yang disusun oleh tim LPPM ada 98 kelompok yang mengajukan proposal yang terdiri dari 11 penelitian Unggulan Institusi, 27 Penelitian Unggulan Departemen , 24 Penelitian Dosen Pemula dan 35 Kegiatan Pengabdian kepada Masyarakat. Setiap ketua peneliti dari kegiatan tersebut hadir mempresentasikan penelitian yang akan dilakukan bersama dengan tim. Dalam wawancara singkat yang dilakukan  tim LPPM kepada salah satu peserta yaitu Ibu Prita Palupiningsih, mengungkapkan bahwa kegiatan desk evaluasi ini sangat bermanfaat untuk menambah wawasan keilmuan pada bidang keahlian masing-masing dosen, selain itu dapat mengetahui penyusunan sistematika penelitian yang baik dari para reviewer. Para peserta berharap selalu ada program-program yang inovatif dan konstruktif dari LPPM STT-PLN untuk mendukung kegiatan Tridarma Perguruan Tinggi</p>\r\n<p xss=removed>Kegiatan desk evaluasi ini melibatkan reviewer reviewer yang kompeten dan berpengalaman diantaranya adalah Prof. Dr.Ir. Iwa Garniwa M.K. MT, Prof.Dr.Ir Yusuf Latief. MT, Prof.Dr.H Aminullah Assagaf. SE.MS.MM.M.Ak, Prof.Ir. Rinaldi Dalimi M.Sc. Ph.d, Prof.Dr.Ir Riri Sari M.Sc dan Dr Rakhmat Arianto, S.ST. M.Kom. Sebagian besar reviewer mengapresiasi pelaksanaan kegiatan desk evaluasi dan cukup puas dengan topik-topik penelitian yang diangkat oleh Para Dosen yang terlibat. Dalam melakukan asesmen terhadap peserta desk evaluasi para reviewer menekankan pentingnya novelty atau kebaruan pada topik penelitian yang diangkat, jika sebuah penelitian memiliki novelty maka akan memiliki nilai jual terutama pada saat publikasi bereputasi internasional dan Nasional. Selain itu penggunaan aplikasi digital dalam melakukan sitasi menjadi sangat krusial saat ini, reviewer menyarankan penggunaan mesin digital seperti Mendeley untuk melakukan tinjauan literatur maupun untuk sitasi. Ini memudahkan para peneliti untuk menyusun jurnal ilmah bereputasi nasional dan internasional.</p>', 'Penelitian', 'Mutho', 'Ya', 'desk-dan-evaluasi-proposal-penelitian-dan-pkm-sttpln', '.jpg', 125, 'Mutho', '2020-03-10 10:43:51', '', '2020-03-10 10:43:51'),
(15, 'Panel Surya Untuk Penerangan Umum di Wilayah Mustikajaya Bekasi', 'panel-surya-untuk-penerangan-umum-di-wilayah-mustikajaya-bekasi', '<p>Dalam rangka melaksanakan Tridarma Perguruan Tinggi, Kewajiban dosen disamping mengajar dan penelitian juga dituntut melaksanakan pengabdian pada masyarakat Sekolah Tinggi Teknik PLN melalui LPPM memperoleh Hibah Ristekdikti Pengabdian Pada Masyarakat (PPM) untuk tahun anggaran tahun 2019 dimana salah satunya adalah melaksanakan program PPM “Pemanfaatan Panel Surya Untuk Penerangan Umum di Wilayah Mustikajaya Bekasi Kegiatan ini kolaborasi antara Dosen Teknik Elektro yakni Erlina, ST., MT sebagai Ketua Tim dan Dosen Teknik Sipil yakni Irma Wirantina Kustanrika, ST., MT dan Muhammad Sofyan, ST., MT sebagai anggota tim. Dalam pelaksanaan kegiatan tim juga di bantu oleh beberapa mahasiswa dan tim Laboratorium PLTS STT PLN serta mitra masyarakat wilayah mustikajaya Bekasi</p>\r\n<p>Memasuki era teknologi dan krisis energi sekarang ini penerangan berbasis tenaga surya menjadi salah satu hal yang belum begitu familiar bagi masyarakat khususnya di wilayah yang masih banyak sekali lahan kosong. Letak tata wilayah yang tidak beraturan membuat distrbusi perencanaan suatu wilayah pada sektor penerangan menjadi tidak merata. Masih terdapat beberapa wilayah-wilayah yang tidak tersentuh fasilitas penerangan. Listrik sebagai salah satu alat atau sarana dalam era pembangunan ini adalah suatu hal yang penting dan perlu diperhatikan penyebaran dan perluasan jaringannya. Terutama penggunaan listrik berbasis tenaga surya yang saat ini menjadi solusi alternative di tengah-tengah krisis energi. Sel surya adalah suatu komponen elektronika yang dapat mengubah energi surya menjadi energi listrik dalam bentuk arus searah (DC). Modul surya (fotovoltaic) adalah sejumlah sel surya yang dirangkai secara seri dan paralel, untuk meningkatkan tegangan dan arus yang dihasilkan sehingga cukup untuk pemakaian sistem catu daya beban</p>\r\n<p>Dalam beberapa tahun terkahir ini, lampu penerangan jalan umum, khususnya di lingkungan Perumahan Jalan Mustika Jaya, Bekasi Timur banyak yang padam dan bahkan tidak tersedia. Padahal menjelang Hari raya, biasanya banyak masyarakat yang pulang mudik, sehingga rumah-rumah banyak kosong. Hal ini bisa mengundang kerawanan dan memberi peluang terhadap berbagai tindak kejahatan. Karena kurangnya penerangan pada wilayah tersebut sering terjadi pencurian kendaraan bermotor di malam hari dan perampokan. Beberapa ruas jalan di kawasan Perumahan Jalan Mustika Jaya, Bekasi Timur yang biasanya diterangi lampu-lampu merkuri, jika tiba pada malam hari kondisi jalan menjadi gelap. Maka dari kegiatan PKM ini akan berfokus pada sosialisasi dan instalasi penerangan umum berbasis tenaga surya (Solar Panel). Kelebihan panel surya pada penerangan umum adalah tidak menimbulkan polusi, noise, ataupun bahan beracun, aman dan cukup handal serta dapat dibangun dalam waktu cepat, perawatan minimum, ramah lingkungan, dapat disesuaikan dengan kebutuhan sedangkan kelemahan panel surya pada penerangan umum adalah sumber tenaga yang tidak konsisten dimana matahari tentu tidak bersinar 24 jam dalam sehari sehingga ada beberapa rumah yang lokasinya tertutup oleh pohon atau gedung tinggi juga akan kesulitan mendapat sinar matahari yang maksimal. Dengan adanya kegiatan ini diharapkan dapat mengatasi minimnya penerangan umum dibeberapa wilayah mustikajaya Bekasi sekaligus memberikan penyuluhan kepada masyarakat sekitar tentang pentingnya sumber energi alternative.</p>', 'Pengabdian Masyarakat', 'Mutho', 'Ya', 'pemanfaatan-panel-surya-untuk-penerangan-umum-di-wilayah-mustikajaya-bekasi', '.jpg', 357, 'Mutho', '2020-03-10 10:47:53', 'Mutho', '2020-03-10 10:47:53'),
(16, 'Air Bersih untuk Desa Ciaruteun menggunakan PLTS dari Tim PkM STT PLN', 'air-bersih-untuk-desa-ciaruteun-menggunakan-plts-dari-tim-pkm-stt-pln', '<p>Air bersih merupakan kebutuhan bagi setiap masyarakat. Hampir semua orang membutuhkan air bersih. Terutama untuk kebutuhan MCK, minum, berwudhu dan lain sebagainya. Dengan tersedianya air bersih, maka kebutuhan standar minimal masyarakat terpenuhi. Namun tidak demikian yang terjadi di Desa Ciaruteun Ilir, sebuah desa yang berada di wilayah administratif kecamatan Cibungbulang Bogor Jawa Barat. Desa yang kaya akan sumber daya alam dan lahan perkebunan yang luas serta dikelilingi oleh 3 sungai besar, yaitu Sungai Ciaruteun, Sungai Cianten, dan Sungai Cisadane, masih mengalami kesulitan pasokan air bersih ke rumah-rumah penduduk</p>\r\n<p>Hal tersebut disebabkan oleh minimnya infrastruktur, perekonomian dan pendidikan penduduk Desa Ciaruteun Ilir. Selain itu air di sungai-sungai tersebut tak layak untuk dikonsumsi. Air sungai dikotori oleh sampah. Namun bukan sampah industri, melainkan sampah plastik, dedaunan dan sampah rumah tangga yang dibuang oleh masyarakat sekitar. Untuk pasokan air bersih, bagi masyarakat yang mampu dapat membeli pasokan air besih yang dijual oleh pemerintah dalam. Namun bagi yang tidak mamu, penduduk Desa Ciaruteun Ilir harus berjalan kurang lebih 1 KM dengan medan yang cukup terjal  menuju mata air yang berada di pegunungan</p>\r\n<p>Desa Ciaruteun Ilir ini, khususnya Kampung Poncol juga belum memiliki MCK yang memadai. Sehingga masyarakat masih memanfaatkan sungai sebagai tempat MCK. Namun pada akhir juli tahun 2018 lalu Tim PkM STT-PLN telah melakukan pembangunan MCK, walaupun masih sederhana dan belum optimal. Melihat kendala tersebut Kepala Desa Ciaruteun Ilir dan Yayasan Desa Mentari melaksanakan kerjasama dengan Tim PkM STT-PLN untuk pengembangan potensi desa dan pengembangan sumber daya manusia untuk meningkatkan kesejehteraan warga. Program kerjasama yang dilakukan pada tanggal 27 April hingga 4 Mei 2019, yang bertujuan untuk menyediakan suplai Air bersih dan penyulingan Air bersih dengan memanfaatkan mata air yang ada disekitar Desa tersebut.</p>\r\n<p>Pembangkit listrik tenaga surya (PLTS) merupakan solusi yang mampu membantu kebutuhan air bagi masyarakat di wilayah Desa Ciaruteun Ilir. PLTS akan menjadi sumber energi yang berfungsi untuk memompa air dari sumber mata air. Tentunya air yang diambil adalah air yang telah disuling dan layak konsumsi. “Kontur tanah pada Desa Ciaruteun Ilir tidak memungkinkan untuk menyedot air dari sungai. Maka kami mencoba PLTS dengan mengambil sumber air dari sumur”, ujar Bpk. Abdul Haris, S.Kom, M.Kom, Selaku Ketua Tim PkM STT PLN. Dalam pembangunannya PkM STT-PLN melakukan beberapa tahapan, yaitu, Membangun desain pembangkit yang digunakan sebagai sumber energi pemompa air.</p>\r\n<p>Proses pembuatan desain yaitu dengan memetakan ukuran tandon. Tandon yang digunakan untuk menampung Air berukuran 2000 Liter dengan ketinggian kurang lebih 4 meter dan menggunakan tiang baja. Dengan ukuran tersebut diharapkan cukup kuat untuk menampung debit Air yang dari sumber air. Untuk sumber air yang digunakan adalah menggunakan air dari sumur. Air tersebut akan disedot oleh mesin otomatis yang menggunakan listrik tenaga surya. Listrik tenaga surya tersebut dibuat dari hasil penelitian yang telah dilakukan sebelumnya.</p>\r\n<p>Dari penampung tersebut, air akan di aliri melalui keran-keran yang akan didistribusikan ke masyarakat sebagai air yang layak konsumsi setelah melewati proses pengujian Membangun penampungan air, pembangkit dan instalasi pembangkit, serta pompa air. Setelah selesai, penampungan air tersebut mulai dibangun dengan menggunakan pembangkit yang memanfaatkan pembangkit PLTS ramah lingkungan. Pembangkit ini akan menyatu dengan tower yang dipasang pada penampung yang ditempatkan mesin penyedot kapasitas Panal Surya yang digunakan adalah 300 WP dengan Inverter dengan Kapasitas 1500 watt dan baterai yang dipasang secara seri dengan kapasitas 12 VA yang terintegrasi pada Solar Charge PWM.</p>\r\n<p>3. Menyiapkan proses distribusi ke rumah-rumah warga dengan menggunakan paralon sebagai media distribusi air.</p>\r\n<p>Proses distribusi dan pemanfaatan dalam proses distribusi, akan dilakukan dengan cara mendata jumlah kepala keluarga (KK) di RT 03 Kampung Poncol. Kemudian mengukur jarak kebutuhan selang distribusi. Tiap KK hanya mendapatkan satu jaringan distribusi Air untuk pemanfaatan. Untuk tahap awal ini, pendistribusian air bersih hanya diperuntukan kebutuhan rumah tangga saja dan kebutuhan Air Usaha Lantak Kang Cepy. Selanjutnya proses pendistribusian air bersih akan didesain untuk kebutuhan budi daya ikan lele dengan membangun kolam ikan.</p>\r\n<p>Setelah melaksanakan 3 tahapan diatas, proses akan di evaluasi untuk memantau kekurang-kekurangan yang belum diselesaikan. Kekuranga-kekurang tersebut nantinya akan diperbaiki pada periode selanjutnya. Karena Tim PkM STT-PLN telah melakukan kerjasama dengan Desa Ciaruteun Ilir ini sampai tahun 2020 sebagai desa binaan.</p>\r\n<p>Semua proses pelaksanaan kegiatan pengabdian ini akan disusun dalam bentuk laporan dan dokumentasi digital/video. Dalam proses pengerjaannya, kegiatan ini dibagi tim yang bertanggung jawab dengan melibatkan mahasiswa STT PLN dari jurusan Teknik informatika, elektro dan Teknik sipil yang dikoordinasi oleh Dosen Tim Pengabdian, yaitu Bpk Abdul Haris, S.Kom, M.Kom, Bpk. Hengki Sikumbang, S.E, MMSI  dan Bpk. Indrianto, S.Kom, M.T.</p>\r\n<p>Dari pelaksanaan program kemitraan masyarakat ini, diharapkan penduduk Desa Ciaruteun Ilir dapat menghasilkan sember energi baru untuk memenuhi kebutuhan air bersihnya. Selain itu program kemitraan ini juga bisa berfungsi sebagai media pembelajaran bagi mahasiswa dan media implementasi hasil penelitian pengusul sebelumnya.</p>', 'Pengabdian Masyarakat', 'Mutho', 'Ya', 'air-bersih-untuk-desa-ciaruteun-ilir-dengan-menggunakan-plts-dari-tim-pkm-stt-pln', '.jpg', 173, 'Mutho', '2020-03-10 10:51:51', 'Mutho', '2020-03-10 10:51:51'),
(17, 'Arif Meraih kategori Best Innovation Group dalam Asia Pacific Millenials Conference di Kuala Lumpur', 'arif-meraih-kategori-best-innovation-group-dalam-asia-pacific-millenials-conference-di-kuala-lumpur', '<p xss=removed>Prestasi merupakan hal yang luar bisa dan merupakan suatu kebanggaan dan pencapaian tertinggi diharapkan semua orang, Arif Darmawan salah seorang mahasiswa Jurusan Teknik Informatika yang telah mencapai pada puncak itu, Arif Darmawan telah membawa nama STT-PLN ke kancah internasional di kuala Lumpur Malaysia. Dan telah tergabung Bersama rekan-rekannya dari berbagai perguruan tinggi di Indonesia berhasil menyisihkan peserta dari berbagai negara di dunia seperti.</p>\r\n<p xss=removed>Kongo, Bangladesh, India termasuk negara - negara anggota ASEAN dan tuan Rumah Malaysia. Arif begitu sapaan akrabnya mempersentasikan gagasannya pada acara Asia Pacific Millenials Conference yang diselenggarakan pada tanggal 28 sampai 30 November 2019 di Kuala Lumpur Malaysia dengan Tema</p>\r\n<p>“Alhamdulillah berkat kerjasama tim dan pembagian jobdesk selama mempresentasikan inovasi ini, kita bisa membawa nama Indonesia meraih Kategori Best Innovation Grup di kegiatan Asia Pacific Millennial Conferrence di Kuala Lumpur, Malaysia”. Ujar Arif selepas kembali ke tanah air 1 Desember 2019.</p>', 'Prestasi', 'Mutho', 'Ya', 'arif-meraih-kategori-best-innovation-group-dalam-asia-pacific-millenials-conference-di-kuala-lumpur-malaysia', '.jpg', 145, 'Mutho', '2020-03-10 10:55:19', 'Mutho', '2020-03-10 10:55:19'),
(18, 'Penanandatanganan Kontrak Penelitian dan PkM STT-PLN Tahun 2019', 'penanandatanganan-kontrak-penelitian-dan-pkm-sttpln-tahun-2019', '<p>Sebagai lanjutan rangkaian kegiatan Penelitian dan Pengabdian Masyarakat dalam lingkup internal STT-PLN, LPPM STT-PLN menyelenggarakan penandatanganan kontrak Penelitian dan PkM internal untuk memperkuat komitmen Dosen/Peneliti STT-PLN dalam melaksanakan tugas pokok dan fungsinya. Agenda tersebut dihadiri KLPPM, Indrianto, S.Kom, MT dan hampir seluruh Dosen/Peneliti yang terlibat dalam rangkaian Program penelitian dan PkM mulai dari tahap Submit proposal hingga Desk Evaluasi. Dalam sambutannya, KLPPM STT-PLN menyampaikan terima kasih sebesar-besar kepada rekan rekan Dosen  yang masih menunjukkan semangat tinggi dalam meningkatkan kualitas penelitian dan luaran Penelitian dan PkM STT-PLN. Selain itu, poin poin penting yang tentunya civitas akademik STT-PLN harus pahami yakni peningkatan klaster perguruan tinggi yang dicapai oleh STT-PLN dari klaster binaan ke madya harus selaras dengan kualitas luaran penelitian dan PkM. Dalam kesempatan yang sama pula setiap kepala seksi penelitian dan PkM masing-masing Departemen juga memaparkan jumlah proposal yang di telah validasi dan menyampaikan timeline penelitian dan Pkm yang akan berlangsung kedepannya. Ada 18 proposal Penelitian Unggulan Institusi, 17 skim Penelitian Unggulan Departemen, 24 skim penelitian dosen pemula, dan 33 proposal PkM. Bedasarkan Timeline yang dipaparkan Program berikutnya yang masih menanti para peneliti/Dosen STT-PLN adalah kegiatan Monev antara bulan April-Mei dan persiapan seminar internasional/nasional.</p>', 'Pengabdian Masyarakat', 'Mutho', 'Ya', 'penanandatanganan-kontrak-penelitian-dan-pkm-sttpln-tahun-2019', '.jpeg', 155, 'Mutho', '2020-03-10 11:00:02', 'Mutho', '2020-03-10 11:00:02'),
(25, 'Seminar Nasional Energi Kelistrikan Teknik dan Informatika (SNEKTI) 2020', 'seminar-nasional-energi-kelistrikan-teknik-dan-informatika-snekti-2020', '<p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Teknologi PLN (IT-PLN), memiliki tugas pokok dan fungsi (Tupoksi) melakukan penjaminan mutu untuk pelaksanaan kegiatan penelitian dan pengabdian kepada masyarakat (PPM) yang telah dilakukan oleh dosen/peneliti IT-PLN. Budaya meneliti di lingkungan IT-PLN mengalami peningkatan sangat tinggi, sehingga IT-PLN memiliki kemampuan yang baik dalam melaksanakan kegiatan penelitian yang bermutu.</p>\r\n<p>Dengan tujuan peningkatan mutu dengan melakukan upaya perbaikan yang berkelanjutan,   setelah proses pelaksanaan penelitian dan pelaporan, perlu dilakukan proses evaluasi dan diseminasi hasil Penelitian dan Pengabdian Masyarakat dalam bentuk Seminar Nasional Hasil penelitian dan pengabdian masyarakat di IT-PLN.  </p>\r\n<h4>Mengingat hal tersebut di atas maka LPPM IT-PLN menetapkan tema Seminar Nasional <strong>\"Pemanfaatan Momentum Revolusi Industri 4.0 dalam rangka mempercepat kemandirian Energi Nasional\"</strong></h4>\r\n<p>Pelaksanaan Seminar Nasional Energi Kelistrikan, Teknik dan Informatika 2020 (SNEKTI), merupakan even dalam menghadapi revolusi industri ke-empat (Industri 4.0) dibidang Energi dan Kelistrikan untuk mewujudkan kemandirian dalam Energi Nasional. Momentum proses dan aktivitas secara global telah disadari oleh para akademisi dan peneliti di Indonesia, terutama perkembangan aplikasi melalui rancang bangun dan penelitian yang telah banyak dilakukan dalam konteks bidang energi dan kelistrikan serta teknik yang terkait dengan teknologi informasi. Kondisi ini mulai terbentuk suatu sistem yang menimbulkan konektivitas dan interaksi tanpa batas antara manusia, mesin, dan sumber daya lainnya untuk menciptakan efisiensi dan optimalisasi secara maksimal. Hal ini juga mempengaruhi sektor industri energi dan ketenagalistrikan yang juga mengalami transformasi menuju Electricity 4.0.<br>SNEKTI 2020 akan dilaksanakan pada <strong>Rabu, 24 Juni 2020 bertempat di kampus Institut Teknologi PLN</strong>, Melalui seminar ini akan dihadirkan narasumber dan praktisi yang memiliki kompetensi dalam tema yang diangkat.</p>\r\n<p>Informasi lebih lanjut untuk kegiatan SNEKTI 2020, dapat dilihat di: <a href=\"http://snekti.sttpln.ac.id/\"><strong>http://snekti.sttpln.ac.id/</strong></a></p>\r\n<p>Riki Ruli</p>\r\n<p> </p>\r\n<p> </p>', 'Seminar', 'Riki Ruli', 'Ya', 'seminar-nasional-energi-kelistrikan-teknik-dan-informatika-snekti-2020', '.jpg', 77, 'Mutho', '2020-03-12 11:25:16', 'Mutho', '2020-03-12 00:00:00'),
(27, 'Penelitian dan PkM Desa Ciareuten Ilir', 'penelitian-dan-pkm-desa-ciareuten-ilir', '<p><strong>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Teknologi PLN (IT-PLN),</strong> memiliki tugas pokok dan fungsi (Tupoksi) melakukan penjaminan mutu untuk pelaksanaan kegiatan penelitian dan pengabdian kepada masyarakat yang telah dilakukan oleh dosen/peneliti IT-PLN. Dan salah satu kegiatannya dilakukan di Desa Ciaruteun Ilir, Kecamatan Cibungbulang, Kabupaten Bogor.</p>\r\n<p>Desa Ciaruteun Ilir, Kecamatan Cibungbulang, Kabupaten Bogor terletak di sebelah barat Kabupaten Bogor dengan ketinggian tanah ± 460 m di atas permukaan laut, kondisi saat ini desa tersebut memiliki beberapa kendala yang berhubungan dengan perekonomian, air bersih dan pengembangan promosi terhadap objek wisata daerah dan sejarah yang dimilikinya. Warga berharap dapat bantuan secara keberlanjutan dari pihak-pihak terkait namun sampai saat ini bantuan tersebut belum secara optimal warga peroleh.</p>\r\n<p>Salah satu tim dosen dari prodi Teknik Informatika IT-PLN telah melakukan kunjungan awal ke desa tersebut dalam rangka kegiatan Penelitian dan PkM periode tahun 2019/2020, desa Ciaruteun Ilir ini dipilih oleh tim karena memiliki karakteristik yang sesuai dengan sasaran dan tujuan dari tim, yaitu:</p>\r\n<ol>\r\n<li>Memiliki kendala dalam pemerolehan air layak pakai baik pada saat musim hujan ataupun kemarau</li>\r\n<li>Sebagian dari masyarakat desa tersebut berprofesi sebagai petani yang terkendala oleh serangan hama padi</li>\r\n<li>Desa Ciaruteun Ilirpun memiliki potensi objek wisata budaya dan sejarah yang layak untuk dipromosikan dan dikembangkan berupa situs prasasti Batu Tulis, prasasti Kebon Kopi dan Batu Menhir.</li>\r\n</ol>\r\n<p>Menurut salah satu ketua tim <strong>Hendra Jatnika</strong>, kegiatan ini merupakan implementasi Tri Darma Perguruan Tinggi yaitu penelitian dan PkM serta sebagai salah satu upaya dalam membantu masyarakat Desa Ciaruteun Ilir kabupaten Bogor dari kendala yang dihadapi dengan memanfaatkan Teknologi Informasi.</p>\r\n<p>Adapun sasaran dan tujuan tim adalah sebagai berikut:</p>\r\n<ol>\r\n<li>Membantu masyarakat sekitar dalam mendapatkan informasi kelayakan kadar air yang digunakan sehari-hari melalui alat ukur kwalitas air yang berbasis teknologi informasi.</li>\r\n<li>Membantu masyarakat dalam mengantisipasi serangan hama, khususnya hama penggerek batang padi menggunakan sistem infomasi berbasis web sehingga meningkatkan presentase keberhasilan panen.</li>\r\n<li>Membantu pengelola situs budaya dan sejarah didesa tersebut dalam mempromosikan dan mengembangkan potensi wisata menggunakan perangkat teknologi infomasi.</li>\r\n</ol>\r\n<p>Dari hasil kunjungan awal ini, tim dosen  tersebut telah mendapatkan data-data yang diperlukan untuk tahapan kegiatan penelitian dan PkM selanjutnya. Hasil dari penelitian dan PkM ini di harapkan dapat meningkatkan kualitas hidup masyarakat desa Ciaruteun Ilir pada khususnya, dan pihak-pihak terkait pada umumnya.</p>\r\n<p> </p>', 'Pengabdian Masyarakat', 'Riki Ruli', 'Ya', 'penelitian-dan-pkm-desa-ciareuten-ilir', '.png', 836, 'Mutho', '2020-03-12 14:48:05', 'Mutho', '2020-03-12 00:00:00'),
(28, 'PkM Departemen Mesin. Sosialisasi Mesin Pencacah Sampah Plastik di KRL Berani Asri RW 15', 'pkm-departemen-mesin-sosialisasi-mesin-pencacah-sampah-plastik-di-krl-berani-asri-rw-15', '<p><strong>Bogor, Cileungsi Kidul - 13 Maret 2020, </strong>hari ini KRL Berani Asri RW.15 Cileungsi Kidul menerima bantuan mesin pencacah sampah plastik dari STTPLN Cengkareng Jakarta sebagai program pengabdian masyarakat.</p>\r\n<p>Bantuan mesin pencacah sampah plastik tersebut diserahkan oleh Pimpinan STTPLN dan diterima langsung oleh Bpk.Purlan sebagai Ketua RW.15 sekaligus pembina KRL Berani Asri yg disaksikan oleh Kepala Desa Cileungsi Kidul Bpk. Edy Supriatman SIP, hadir pula dalam acara tersebut Ketua DPRD Komisi IV Bpk. Muad Khalim.</p>\r\n<p>Alhamdulillah, semoga bantuan mesin pencacah sampah plastik tersebut bermanfaat untuk turut andil dalam menjaga lingkungan RW.15 khususnya dan Kab.Bogor pada umumnya, ungkap Pak Purlan saat ditanya warta fkrl.</p>\r\n<p>Disela acara tersebut, Kepala Desa Cileungsi Pak Edy Supriatman SIP dan Ketua DPRD Komisi IV Pak Muad Kholim menyempatkan melakukan pengecekan resapan air di KRL berani asri RW 15 Cileungsi Kidul Bogo.</p>\r\n<p>Sumber : fkrl.web.id</p>', 'Inovasi', 'Riki Ruli', 'Ya', 'pkm-departemen-mesin-sosialisasi-mesin-pencacah-sampah-plastik-di-krl-berani-asri-rw-15', '.png', 459, 'Mutho', '2020-03-16 11:39:26', 'Mutho', '2020-03-16 11:39:26'),
(30, 'Pandemi COVID-19, Kebijakan dan Penanggulangannya di Institut Teknologi PLN', 'pandemi-covid19-kebijakan-dan-penanggulangannya-di-institut-teknologi-pln', '<p><strong>Sinergimas</strong> - Pandemi covid-19 atau lebih sering disebut dengan virus Corona saat ini di Indonesia semakin meluas persebarannya dengan jumlah total pasien positif sebanyak 790 orang yang di umumkan oleh juru bicara pemerintah untuk penanganan covid-19 di conferensi pers di Graha BNPB pada hari rabu [25/03/2020].</p>\r\n<p>Menyikapi wabah covid-19 ini pemerintah mengeluarkan beberapa kebijakan untuk sementara waktu serta memberikan himbauan kepada seluruh masyarakat mengenai penanganan dan pencegahan covid-19 sesuai dengan saran dari Badan Organisasi Kesehatan Dunia atau WHO.</p>\r\n<p>Salah satu kebijakan tersebut ialah dalam hal pendidikan. Pemerintah mengeluarkan kebijakan, untuk menanggulangi dan mencegah penyebaran covid-19 maka segala kegiatan belajar mengajar dilakukan di rumah atau jarak jauh. Hal ini menjadikan sekolah-sekolah dan kampus yang ada di indonesia menjalankan proses belajar mengajar secara daring (Online) atau jarak jauh.</p>\r\n<p>Tak terkecuali kampus Institut Teknologi PLN yang berada di Jl. Lingkar Luar Barat, RT.1/RW.1, Duri Kosambi, Cengkarang, Kota Jakarta Barat, juga menerapkan sistem kuliah daring atau Pendidikan Jarak Jauh. Kebijkan ini dikeluarkan oleh rektor Institut Teknologi PLN Prof. Dr. Ir. Iwa Garniwa Mulyana K, MT. Melalui surat edaran instruksi rektor Institut Teknologi PLN yang awalnya kegiatan pekuliahan secara daring atau pendidikan jarak jauh dimulai dari tanggal 17 Maret sampi dengan 02 April 2020 diperpanjang hingga tanggal 18 April 2020, dikarenakan pandemi covid-19 semakin meluas.</p>\r\n<p>Untuk menanggulangi wabah covid-19 di Institut Teknologi PLN, rektor Institut Teknologi PLN juga mengadakan sosialisasi mengenai covid-19 untuk para dosen, mahasiswa, tenaga kependidikan hingga petugas kebersihan dan keamanan. Selain itu selama proses pembelajaran jarak jauh, juga dilakukan penyemprotan Disinfektan di lingkungan Institu Tenologi PLN.</p>\r\n<p>Dan saat ini pihak kampus Institut Teknologi PLN telah mengeluarkan Protokol Memasuki Lingkungan Kampus Institut Teknologi PLN yang akan diterapkan saat kegiatan belajar mengajar secara langsung dimulai. Dimana para mahasiswa di anjurkan untuk mengisi dan memiliki kartu HAC atau kartu <em>Healt Alert Card </em>dan akan dilakukan <em>screening </em>pengukuran suhu tubuh dan pengecekan lainnya sebelum memasuki lingkungan kampus.</p>\r\n<p> </p>\r\n<p>Penulis : Sri Aulia Khalifah</p>', 'Berita Terkini', 'Haris', 'Ya', 'pandemi-covid19-kebijakan-dan-penanggulagannya-di-institut-teknologi-pln', '.jpg', 19, 'haris', '2020-03-26 17:14:09', 'haris', '2020-03-26 17:14:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `emagazine`
--

CREATE TABLE `emagazine` (
  `id_emag` int(11) NOT NULL,
  `judul_emag` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_link` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `author` char(20) NOT NULL,
  `publish` char(7) NOT NULL,
  `userfile` text NOT NULL,
  `userfile_type` char(10) NOT NULL,
  `userfile_size` int(11) NOT NULL,
  `uploader` char(20) NOT NULL,
  `time_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` char(20) NOT NULL,
  `time_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `emagazine`
--

INSERT INTO `emagazine` (`id_emag`, `judul_emag`, `judul_seo`, `isi_link`, `kategori`, `author`, `publish`, `userfile`, `userfile_type`, `userfile_size`, `uploader`, `time_upload`, `updater`, `time_update`) VALUES
(31, 'Analisa dan Perancangan Sistem Absensi Mahasiswa Berbasis Web', 'analisa-dan-perancangan-sistem-absensi-mahasiswa-berbasis-web', '<p>Silahkan Baca Selengkapnya pada link <a href=\"https://www.flipbookpdf.net/web/site/6eb7ce5644e9b562b9d79f7fc14c22d0e1b49ee7202003.pdf.html\">Klik Disini</a></p>\r\n<p> </p>', 'Penelitian', 'Riki Ruli', 'Ya', 'analisa-dan-perancangan-sistem-absensi-mahasiswa-berbasis-web', '.png', 189, 'superadmin', '2020-03-30 07:36:09', 'superadmin', '2020-03-30 07:36:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `featured`
--

CREATE TABLE `featured` (
  `id_featured` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT 0,
  `judul_featured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `featured`
--

INSERT INTO `featured` (`id_featured`, `no_urut`, `judul_featured`) VALUES
(1, 1, 2),
(2, 2, 9),
(4, 3, 5),
(9, 1, 28),
(10, 2, 25),
(11, 3, 16),
(12, 4, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `judul_kategori` varchar(25) NOT NULL,
  `kategori_seo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `kategori_seo`) VALUES
(4, 'Inovasi', 'inovasi'),
(6, 'Penelitian', 'penelitian'),
(7, 'Prestasi', 'prestasi'),
(8, 'Seminar', 'seminar'),
(9, 'Pengabdian Masyarakat', 'pengabdian-masyarakat'),
(10, 'Berita Terkini', 'berita-terkini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama` char(20) NOT NULL DEFAULT '0',
  `id_berita` int(11) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `time_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `verifikator` char(20) DEFAULT NULL,
  `time_verif` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `id_berita`, `isi_komentar`, `status`, `time_upload`, `verifikator`, `time_verif`) VALUES
(3, 'superadmin', 28, 'Coba gan', 'ya', '2020-04-02 10:33:21', 'superadmin', '2020-04-02 10:36:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_emag`
--

CREATE TABLE `komentar_emag` (
  `id_komentar` int(11) NOT NULL,
  `nama` char(20) NOT NULL DEFAULT '0',
  `id_emag` int(11) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `time_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `verifikator` char(20) DEFAULT NULL,
  `time_verif` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar_emag`
--

INSERT INTO `komentar_emag` (`id_komentar`, `nama`, `id_emag`, `isi_komentar`, `status`, `time_upload`, `verifikator`, `time_verif`) VALUES
(28, 'superadmin', 31, 'Coba gan', 'ya', '2020-04-02 10:33:51', 'superadmin', '2020-04-02 10:34:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(20, '::1', 'superadmin', 1588043981),
(21, '::1', 'superadmin', 1588043987),
(22, '::1', 'superadmin', 1588043996);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `usertype` char(10) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `phone`, `alamat`, `usertype`, `ip_address`, `salt`, `active`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `created_on`) VALUES
(7, 'Superadmin', 'superadmin', '$2y$08$UP4PvjwzqidTh7JI2C69v.vkm4q0WymfWp6f83KVfCAVWr7.RlzP.', 'superadmin@gmail.com', '08461616', 'asdjaslkdjksad', 'superadmin', '127.0.0.1', NULL, 1, NULL, 'LLk7VUJk48qvDBEDS0N7WO42905bc20c8b8a1f0c', '0000-00-00 00:00:00', NULL, '2020-04-02 04:41:32', '2016-10-05 14:09:50'),
(14, 'Abdul Haris', 'haris', '$2y$08$ljMzv3Kq.hxzToppFFSm1uk1OMZ7zesGz6Eb6kkoBazoHK15fPr8q', 'kemasku01@gmail.com', '081931729530', 'Menara PLN, Jln.Lingkar Luar Barat Duri Kosambi\r\nCengkareng', 'superadmin', '140.213.48.220', NULL, 1, NULL, NULL, NULL, NULL, '2020-03-26 16:22:42', '2020-03-12 22:43:36'),
(16, 'muhammad', 'gibran', '$2y$08$wFHkicdogwc6YzOv6dhbsu431Ldx4nvE3.M9fYPY5vAfrSzdoZNeu', 'muhammadgibran74@gmail.com', '081319511901', 'Jalan Haji Junib', '', '125.160.112.58', NULL, 1, NULL, NULL, NULL, NULL, '2020-03-17 15:28:32', '2020-03-13 09:16:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_group`
--

INSERT INTO `users_group` (`id_group`, `name`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'Testa'),
(4, 'User Only');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `emagazine`
--
ALTER TABLE `emagazine`
  ADD PRIMARY KEY (`id_emag`);

--
-- Indeks untuk tabel `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id_featured`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `komentar_emag`
--
ALTER TABLE `komentar_emag`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `emagazine`
--
ALTER TABLE `emagazine`
  MODIFY `id_emag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `featured`
--
ALTER TABLE `featured`
  MODIFY `id_featured` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar_emag`
--
ALTER TABLE `komentar_emag`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
