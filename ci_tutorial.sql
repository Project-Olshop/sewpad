-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2018 pada 14.44
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tutorial`
--

INSERT INTO `kategori_tutorial` (`idKat`, `kategori`, `deskripsi`) VALUES
(1, 'Pakaian Kerja', 'Pakaian kerja pada umumnya sama yaitu harus rapi dengan warna yang tidak begitu menarik perhatian. Biasanya berupa setelan dengan blazer kemeja dan bawahan rok atau celana berbahan licin.'),
(2, 'Pakaian Pesta', 'Pakaian pesta walaupun tidak setiap hari kita memakainya, tetapi wajib kita mempunyai satu baju jenis ini untuk dipakai dihari penting kalian.'),
(3, 'Pakaian Anak', 'Pakaian sesuai untuk anak - anak, dan ukurannya di sesuaikan dengan usia anak tersebut.'),
(4, 'Pakaian Muslim', 'Pakaian khusus untuk muslim, bila wanita ada kewajiban atau syarat tertentu dalam desainnya, yaitu harus menutup aurat.'),
(5, 'Pakaian Sehari - hari', 'Pakaian yang dipakai dalam kegiatan keseharian, yang pakaiannya bersifat santai dan nyaman untuk dipakai.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `step`
--

CREATE TABLE `step` (
  `idStep` int(11) UNSIGNED NOT NULL,
  `tutorial_id` int(11) UNSIGNED NOT NULL,
  `step1` varchar(1000) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `step2` varchar(1000) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `step3` varchar(1000) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `step4` varchar(1000) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutorial`
--

CREATE TABLE `tutorial` (
  `idTutorial` int(11) UNSIGNED NOT NULL,
  `nama_tutorial` varchar(50) NOT NULL,
  `kat_id` int(11) UNSIGNED NOT NULL,
  `foto_tutorial` varchar(100) NOT NULL,
  `idUser` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tutorial`
--

INSERT INTO `tutorial` (`idTutorial`, `nama_tutorial`, `kat_id`, `foto_tutorial`, `idUser`) VALUES
(1, 'Baju ', 5, '77c3bfaf356c1839b145ed2fce30c348.jpg', 2);

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
(14, 'Member', 'aa08769cdcb26674c6706093503ff0a3', 'member@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Member', 'hellokitty1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_tutorial`
--
ALTER TABLE `kategori_tutorial`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`idStep`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`idTutorial`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `kat_id` (`kat_id`);

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
  MODIFY `idKat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `idStep` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `idTutorial` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
