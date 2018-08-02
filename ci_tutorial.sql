-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Agu 2018 pada 15.45
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_tutorial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tutorial`
--

CREATE TABLE `kategori_tutorial` (
  `idKat` int(11) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tutorial`
--

INSERT INTO `kategori_tutorial` (`idKat`, `kategori`, `deskripsi`) VALUES
(1, 'Pakaian Kerja', 'Pakaian kerja pada umumnya sama yaitu harus rapi dengan warna yang tidak begitu menarik perhatian. Biasanya berupa setelan dengan blazer kemeja dan bawahan rok atau celana berbahan licin.'),
(2, 'Pakaian Pesta', 'Pakaian pesta walaupun tidak setiap hari kita memakainya, tetapi wajib kita mempunyai satu baju jenis ini untuk dipakai dihari penting kalian.'),
(3, 'Pakaian Anak', 'Pakaian sesuai untuk anak - anak, dan ukurannya di sesuaikan dengan usia anak tersebut.'),
(4, 'Pakaian Muslim', 'Pakaian khusus untuk muslim, bila wanita ada kewajiban atau syarat tertentu dalam desainnya, yaitu harus menutup aurat.'),
(5, 'Pakaian Sehari - hari', 'Pakaian yang dipakai dalam kegiatan keseharian, yang pakaiannya bersifat santai dan nyaman untuk dipakai.'),
(6, 'Pakaian Perkawinan', '...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `idKomentar` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `tutorial_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `step`
--

CREATE TABLE `step` (
  `idStep` int(11) UNSIGNED NOT NULL,
  `tutorial_id` int(11) UNSIGNED NOT NULL,
  `step` varchar(1000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `step`
--

INSERT INTO `step` (`idStep`, `tutorial_id`, `step`, `photo`) VALUES
(1, 6, 'Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_0111.png'),
(4, 6, 'Test', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_0111.png'),
(47, 13, 'Pertama buatlah pola dasar rok sesuai ukuran (lain kali akan kita bahas). Bagi yang belum tahu polanya bisa jiplak rok yang sudah ada ya.. \r\nPasang diatas kain, jangan lupa beri kampuh ya.\r\n', 'span2.jpg'),
(6, 7, 'Langkah 1: Jahit Kain', 'Library_0132.png'),
(7, 8, 'Langkah 1', 'mikrotik_hotspot_-_status_-_Mozilla_Firefox_004.png'),
(8, 8, 'mbhbhkhb', 'blazerbirumuda_2016_edited_0099.jpg'),
(9, 9, 'nbvhfgug', '1470447037-hannah-law1.jpg'),
(18, 11, 'Langkah 1 : \r\nSiapkan alat dan bahan, potong kain sesuai dengan pola.', '1Potongan-Korset-Bagian-Depan-Gaun-Pesta-Anak2.jpg'),
(19, 11, 'Langkah 2 : \r\n\r\nMenjahit korset bagian depan.', '2Detail-Hasil-jadi-Korset-Bagian-Depan-untuk-Gaun-Pesta-Anak2.jpg'),
(20, 11, 'Langkah 3 : \r\n\r\nMenjahit korset bagian belakang.', '3Tampak-bagian-belakang-untuk-korset-gaun-pesta-anak.jpg'),
(21, 11, 'Langkah 4 : \r\n\r\nMembuat lubang kancing pada korset bagian belakang.', '4Siapkan-Korset-bagian-belakang-untuk-Pola-Gaun-Pesta-Anak.jpg'),
(22, 11, 'Langkah 5 : \r\n\r\nMenggabungkan korset bagian depan dan belakang kita akan menjahit nya melalui bagian bahu.', '5Jahit-bagian-bahu-untuk-satukan-Korset-bagian-depan-dan-belakang-untuk-Pola-Gaun-Pesta-Anak.jpg'),
(23, 11, 'Langkah 6 : \r\n\r\nSiapkan bagian bawah dari gaun pesta anak.', '6jahit-korset-bagian-depan-dengan-bawahan-gaun-pesta-anak.jpg'),
(24, 11, 'Langkah 7 : \r\n\r\nMenggabungkan korset dan bawahan bagian depan.', '7Penampakan-cara-menjahit-korset-bagian-depan-dengan-bawahan-gaun-pesta-anak.jpg'),
(25, 11, 'Langkah 8 : \r\n\r\nMenggabungkan korset dan bawahan bagian belakang.', '8Hasil-jahitan-korset-dan-bagian-bawahan-gaun-pesta-anak.jpg'),
(26, 11, 'Langkah 9 : \r\n\r\nMembuat lengan gaun pesta anak.', '9Lipatan-bawah-untuk-ujung-lengan-Gaun-pesta-anak.jpg'),
(27, 11, 'Langkah 10 : \r\n\r\nMembuat lipatan ujung lengan gaun pesta anak.', '10Menjahit-bagian-sisi-kanan-dan-kiri-lengan-Gaun-pesta-anak.jpg'),
(28, 11, 'Langkah 11 : \r\nMenjahit lipatan pada lengan gaun.', '11Cara-pasang-lengan-ke-badan-Gaun-pesta-anak.jpg'),
(29, 11, 'Langkah 12 : \r\n\r\nMenjahit sisi kanan dan kiri lengan untuk gaun pesta anak.\r\n', '12Hasil-jadi-gaun-pesta-anak-dengan-lengan.jpg'),
(30, 12, 'Pertama, siapkan kain sepanjang 2 meter. Lebarnya disesuaikan dengan tinggi badan kita, diukur dari bawah dada hingga bawah mata kaki. Kalau saya, tinggi badan 158cm, lebar kainnya 1 meter. Sisihkan dulu.', 'gamis2.jpg'),
(31, 12, 'Untuk bagian lengan, pipihkan bagian lengan, lalu tempel pada koran dan gambar sesuai bentuknya.\r\nUntuk bagian dada dan punggung, lipat baju menjadi dua lalu tempel dan gambar di koran.\r\n\r\nLebihkan masing-masing sisinya sebanyak 1cm. Khusus untuk atasan bagian dada, lebihkan 1cm bagian dadanya karena akan dipasang resleting jepang, biar busui friendly gitu ceritanya.\r\n\r\nNext, dari gambar pola yang sudah kita dapat, tinggal tempel pada kain yang sudah dilipat. Ingat ya, kainnya dilipat dulu. Pasangi jarum pentul pada seluruh tepinya, lalu gunting sesuai pola.\r\n\r\n', 'gamis3.jpg'),
(32, 12, 'Dan, inilah hasilnya. Kain bagian dada itu langsung saya gunting di tengah untuk dipasang resleting jepang.', 'gamis4.jpg'),
(33, 12, 'Lalu pasang resleting jepangnya. Sudah tahu caranya kan? Pakai sepatu khusus resleting jepang ya, biar hasilnya bagus.', 'gamis5.jpg'),
(34, 12, 'Setelah terpasang, berikutnya jahit bagian pundaknya.', 'gamis6.jpg'),
(36, 12, 'Siapkan kain panjang dengan lebar kira-kira 4cm untuk rompok leher. Pasang kain rompok baik menghadap kain utama buruk. Jahit tepinya kira-kira 0,5cm. Setelah itu kain rompok dibawa ke depan, dilipat dan dijahit.', 'gamis7.jpg'),
(37, 12, 'Selanjutnya pasang bagian lengan. Luruskan kain lengan dan kain badan. Bagian kain baik saling berhadapan, beri jarum pentul agat tidak bergeser, dan jahit.', 'gamis9.jpg'),
(38, 12, 'Hasilnya seperti ini.', 'gamis10.jpg'),
(39, 12, 'Jahit juga bagian bawah lengan sampai bawah ketiak.', 'gamis111.jpg'),
(40, 12, 'Dan, taraaaa.. bagian atas sudah selesai.', 'gamis12.jpg'),
(41, 12, 'Sekarang bagian roknya. Kain sepanjang 2 meter tadi dijahit sehingga membentuk seperti sarung.', 'gamis13.jpg'),
(42, 12, 'Pasang pada bagian atas, kain baik saling berhadapan. Beri jarum pentul supaya tidak bergeser. Saya menandai ada 4 bagian rok yang saya pasang duluan, yaitu bagian tengah depan, dua bagian samping, dan tengah belakang.', 'gamis14.jpg'),
(43, 12, 'Kemudian sisa kain yang belum dipasang jarum pentul dibuat lipitan seperti ini. Lalu tinggal dijahit.', 'gamis16.jpg'),
(44, 12, 'Dan hasilnya seperti ini.', 'gamis19.jpg'),
(45, 12, 'Next, supaya bajunya tidak ombor-ombor (kelihatan kebesaran) saya pasang elastis di bagian punggungnya.', 'gamis20.jpg'),
(46, 12, 'Langkah terakhir, lipat bagian ujung lengan dan dipasang elastis ke dalamnya. Juga lipat bawah rok supaya rapi.', 'gamis21.jpg'),
(48, 13, 'Beberapa orang menjahit dulu baru mengobrasnya tapi aku mengobrasnya dulu terutama untuk kain yang mudah berserabut seperti ini. \r\nJahit semua kupnatnya terlebih dahulu.\r\nLakukan juga pada furingnya. Bentuk luar/outer dan furing/innernya sama ya.\r\n', 'span3.jpg'),
(49, 13, 'Pasang resletingnya. Oops step memasang resletingnya lupa difoto.', 'span4.jpg'),
(50, 13, 'Satukan furing dengan outernya dengan . Aku menyatukannya dengan bagian buruk dengan bagian buruk. Kainnya berserabut ya karena bagian pinggang nanti akan tertutup jadi tidak perlu diobras.', 'span5.jpg'),
(51, 13, 'Rekatkan Staplek M33 ke bagian pinggang rok dengan cara disetrika. Hasilnya tampak seperti gambar ya.. Kemudian pasang pinggangnya kebadan rok yang sudah dipasang furing tadi.\r\nlagi, jangan lupa kampuhnya\r\n', 'span6.jpg'),
(52, 13, 'Lipat keluar, jahit ujung tali pinggang seperti gambar.', 'span7.jpg'),
(53, 13, 'Lipat ujungnya lalu balik dengan rapi.', 'span8.jpg'),
(54, 13, 'Masukkan sisa kain kedalam seperti contoh. Sematkan jarum pentul agar tidak lari.', 'span9.jpg'),
(55, 13, 'Kita akan menjahit dari bagian luar , tepat ditanda panah pada gambar.', 'span10.jpg'),
(56, 13, 'Setelah pinggang terpasang dengan rapi , pasang tutup kait dengan jahit tangan. Isi sampai cukup penuh supaya kuat ya.', 'span11.jpg'),
(57, 13, 'Terakhir kelim bagian bawahnya. Lihat karena aku kesulitan melangkah kalau pakai rok span jadi aku beri belahan roknya.', 'span12.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutorial`
--

CREATE TABLE `tutorial` (
  `idTutorial` int(11) UNSIGNED NOT NULL,
  `nama_tutorial` varchar(50) NOT NULL,
  `kat_id` int(11) UNSIGNED NOT NULL,
  `photo_hasil` varchar(100) NOT NULL,
  `idUser` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tutorial`
--

INSERT INTO `tutorial` (`idTutorial`, `nama_tutorial`, `kat_id`, `photo_hasil`, `idUser`) VALUES
(16, 'Gamis', 4, 'gamis17.jpg', 2),
(15, 'Pembuatan Jogger Pants', 3, 'Image_2018-08-01_at_13_37_591.jpg', 14),
(13, 'Rok Span', 1, 'span1.jpg', 2),
(7, 'Pembuatan Aplikasi Berbasis Web', 4, 'JTI_Polinema_–_Jurusan_Teknologi_Informasi_Polinema_-_Mozilla_Firefox_008.png', 16),
(8, 'Cara Menjahit Celana Jogger Anak', 3, '0e97a259b8b551302c239b9ca66e92ba.jpg', 2),
(10, 'brokat', 2, 'be28103d5751b22df6ba9427bed0eab3--muslim-dress-hijab-dress2.jpg', 2),
(11, 'Gaun Anak', 3, 'Detail-Jadi-Gaun-pesta-anak.jpg', 3),
(12, 'Gamis', 4, 'gamis15.jpg', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `active`, `company`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator@gmail.com', NULL, NULL, NULL, 'lI8tCNgWs6T2khN3Fdw7Ke', 1531109934, 1, 'Admin', 'images_(1).png'),
(2, 'hidayati', 'bbec43a407433a97c17e647e0f82f6e8', 'hidayatimazmi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', '34090d8c1a7202be779af5daaf0c7410.jpg'),
(3, 'triska', 'ce61649168c4550c2f7acab92354dc6e', 'triskaintania8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', '1x.png'),
(4, 'reza', '5f4dcc3b5aa765d61d8327deb882cf99', 'reza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png'),
(12, 'ariana', 'af5d97f43ff2fb264b7d18042a5c6112', 'ariana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'img.png'),
(13, 'amanda', '6209804952225ab3d14348307b5a4a27', 'amanda@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'images-9.jpg'),
(14, 'kirana', '658dfb2e6ee50764cb656837f180e5c4', 'member@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'images.png'),
(15, 'fuad', 'd0b0caa56fee5e734ca286516b5885dc', 'fuad@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_010.png'),
(18, 'dianasari', '3a23bb515e06d0e944ff916e79a7775c', 'diana@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'client_pink.png'),
(17, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921', 'hadi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png'),
(19, 'ninda', '70090d3b9c2cc498a35a8a93c2a5b4b1', 'ninda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', '77c3bfaf356c1839b145ed2fce30c3481.jpg'),
(20, 'amanda12', 'a384b6463fc216a5f8ecb6670f86456a', 'amanda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png'),
(21, 'larasati', 'cc5a9fb4b1b93629e9aa413b8bf00fe9', 'larasati@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'download_(1).png'),
(22, 'kharis', '25d55ad283aa400af464c76d713c07ad', 'kharisramdani23@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_tutorial`
--
ALTER TABLE `kategori_tutorial`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`idStep`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`idTutorial`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_tutorial`
--
ALTER TABLE `kategori_tutorial`
  MODIFY `idKat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `idStep` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `idTutorial` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
