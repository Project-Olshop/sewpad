-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Jul 2018 pada 22.58
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tutorial`
--

CREATE TABLE `kategori_tutorial` (
  `idKat` int(11) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `step`
--

CREATE TABLE `step` (
  `idStep` int(11) UNSIGNED NOT NULL,
  `tutorial_id` int(11) UNSIGNED NOT NULL,
  `step` varchar(1000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `step`
--

INSERT INTO `step` (`idStep`, `tutorial_id`, `step`, `photo`) VALUES
(1, 6, 'Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_0111.png'),
(4, 6, 'Test', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_0111.png'),
(5, 5, 'Test', 'Politeknik_Negeri_Malang_-_Mozilla_Firefox_0061.png'),
(6, 7, 'Langkah 1: Jahit Kain', 'Library_0132.png'),
(7, 8, 'Langkah 1', 'mikrotik_hotspot_-_status_-_Mozilla_Firefox_004.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tutorial`
--

INSERT INTO `tutorial` (`idTutorial`, `nama_tutorial`, `kat_id`, `photo_hasil`, `idUser`) VALUES
(5, 'Pembuatan Website 2', 1, 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_011.png', 15),
(6, 'Pembuatan Mobile App', 1, 'Library_0131.png', 15),
(7, 'Pembuatan Aplikasi Berbasis Web', 4, 'JTI_Polinema_–_Jurusan_Teknologi_Informasi_Polinema_-_Mozilla_Firefox_008.png', 16),
(8, 'Pembuatan Kemeja Black Panther', 4, 'a7@A7:_~_007.png', 16);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `active`, `company`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator@gmail.com', NULL, NULL, NULL, 'lI8tCNgWs6T2khN3Fdw7Ke', 1531109934, 1, 'Admin', 'images_(1).png'),
(2, 'hidayati', 'c8970964d563f68224c7e854b278bb43', 'hidayatimazmi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', '77c3bfaf356c1839b145ed2fce30c348.jpg'),
(3, 'triska', '5f4dcc3b5aa765d61d8327deb882cf99', 'triskaintania8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', '1x2.png'),
(4, 'reza', '5f4dcc3b5aa765d61d8327deb882cf99', 'reza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png'),
(12, 'Ariana', 'af5d97f43ff2fb264b7d18042a5c6112', 'ariana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'img.png'),
(13, 'Amanda Virla', '6209804952225ab3d14348307b5a4a27', 'amanda@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'images-9.jpg'),
(14, 'Member', 'aa08769cdcb26674c6706093503ff0a3', 'member@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'hellokitty1.jpg'),
(15, 'fuad', '535232c8611cb52b7f23db3e5ce3c246', 'fuad@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'root@fumukaba-HP-Pavilion-g4-Notebook-PC_-home-fumukaba-Documents-Growth-Ionic-ionic-server_010.png'),
(16, 'fumukaba', '535232c8611cb52b7f23db3e5ce3c246', 'fumukaba@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png'),
(17, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921', 'hadi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'default.png');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tutorial`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tutorial` (
`idTutorial` int(11) unsigned
,`nama_tutorial` varchar(50)
,`kategori` varchar(255)
,`photo_hasil` varchar(100)
,`username` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tutorial`
--
DROP TABLE IF EXISTS `v_tutorial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tutorial`  AS  select `t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username` from ((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`) where ((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori_tutorial`
--
ALTER TABLE `kategori_tutorial`
  ADD PRIMARY KEY (`idKat`);

--
-- Indeks untuk tabel `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`idStep`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indeks untuk tabel `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`idTutorial`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `kat_id` (`kat_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_tutorial`
--
ALTER TABLE `kategori_tutorial`
  MODIFY `idKat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `step`
--
ALTER TABLE `step`
  MODIFY `idStep` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `idTutorial` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `step_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`idTutorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorial_ibfk_2` FOREIGN KEY (`kat_id`) REFERENCES `kategori_tutorial` (`idKat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
