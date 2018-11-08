-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 04:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinterest`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `nama_board` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `board_image`
--

CREATE TABLE `board_image` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `board_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `deskripsi`, `nama`, `url`, `website`, `date`, `user_id`, `kategori_id`) VALUES
(49, 'Suasana Kota', 'City', 'https://i.pinimg.com/564x/c2/a9/d1/c2a9d17650e559d17be80158f40edd9a.jpg', 'https://id.pinterest.com/pin/532409987177101112/', '2018-11-01 21:27:37', 1, 4),
(50, 'Beruang Kota', 'Beruang', 'https://i.pinimg.com/564x/f2/e5/35/f2e5351649ffce34f75a7854ee8517b2.jpg', NULL, '2018-11-01 21:27:37', 1, 4),
(51, '', 'Naga', 'https://i.pinimg.com/236x/97/ad/4b/97ad4b37398cd123b53ee04becf9bd65.jpg', NULL, '2018-11-01 21:27:37', 1, 3),
(52, 'Topeng Sketboard', 'Sketboard', 'https://i.pinimg.com/564x/41/04/6b/41046bfc979db7038cd9163bb4fae35d.jpg', 'https://id.pinterest.com/pin/561050066076065550/', '2018-11-01 21:27:37', 1, 3),
(53, 'Topeng Anime', 'Topeng', 'https://i.pinimg.com/564x/2f/91/91/2f91910dd1bab0cb481df2c552215444.jpg', NULL, '2018-11-01 21:27:37', 1, 3),
(54, 'Samurai Pedang', 'Samurai', 'https://i.pinimg.com/564x/fd/83/ab/fd83ab287eec37ff83472d829763056b.jpg', 'https://id.pinterest.com/pin/465559680225034392/', '2018-11-01 21:27:37', 1, 1),
(55, '', 'Image Name', 'https://i.pinimg.com/564x/51/18/26/51182648b9f91c439d0e98fc62efef57.jpg', 'https://id.pinterest.com/pin/317363104990707807/', '2018-11-01 21:27:37', 1, 5),
(56, 'Kota Macan', 'Macan', 'https://i.pinimg.com/564x/02/25/90/02259002e6931b86a76fcc5ccb1067d9.jpg', NULL, '2018-11-01 21:27:37', 1, 4),
(57, 'Test Image', 'Name Image', 'https://i.pinimg.com/236x/21/9a/8d/219a8dbb729615340e14b2ab3b8b7309.jpg', NULL, '2018-11-01 21:27:37', 1, 4),
(58, 'Topeng Makan Mie', 'Mie Japan', 'https://i.pinimg.com/564x/e2/eb/01/e2eb0176193f425bdb6d1e140604a0fc.jpg', NULL, '2018-11-01 21:27:37', 1, 4),
(59, 'Fight', 'Tokyo Fight', 'https://i.pinimg.com/564x/d8/9b/c1/d89bc1f59e417df6eae8ea6f6ed36991.jpg', NULL, '2018-11-01 21:27:37', 1, 4),
(60, '', 'Lion', 'https://i.pinimg.com/564x/ef/30/a8/ef30a85139f1c7c4d74cc3b97c1b1080.jpg', 'https://id.pinterest.com/pin/851180398298021526/', '2018-11-01 21:27:37', 1, 5),
(61, 'Kingkong Samurai', 'Kingkong', 'https://i.pinimg.com/564x/b9/64/cc/b964cc17ae784c7e3ac127d555f72a03.jpg', NULL, '2018-11-01 21:27:37', 1, 1),
(62, 'Bone Samurai', 'Samurai', 'https://i.pinimg.com/564x/c0/87/37/c08737829cc06d8069e705acc8980823.jpg', NULL, '2018-11-01 21:27:37', 1, 1),
(63, 'Devil Samurai', 'Devile', 'https://i.pinimg.com/564x/f3/55/13/f35513422e2be6c583f00683be3feb6e.jpg', NULL, '2018-11-01 21:27:37', 1, 1),
(64, 'asdasdasdasdasd', 'Anime', 'https://i.pinimg.com/564x/6c/6d/d1/6c6dd189d46ef61a61707fc4638c6c8f.jpg', 'https://id.pinterest.com/pin/640355640737049419/?lp=true', '2018-11-02 02:45:14', 1, 2),
(65, 'adasdasdasd', 'wqtertert', 'assets/upload/4k-wallpapers-phone-Is-4K-Wallpaper.jpg', 'https://id.pinterest.com/pin/493425702905555235/', '2018-11-02 02:51:16', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Samurai'),
(2, 'Pedang'),
(3, 'Anime'),
(4, 'Jepang'),
(5, 'Logo');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `komentar` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `date`, `komentar`, `user_id`, `image_id`) VALUES
(1, '2018-11-02 01:17:12', 'test', 1, 54),
(3, '2018-11-02 08:11:41', 'test', 1, 63),
(4, '2018-11-02 08:41:52', 'lalalalal', 1, 63),
(5, '2018-11-02 08:44:32', 'ehem', 1, 63);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `isi_report` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `image_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `reportcol` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `foto`, `status`, `date`) VALUES
(1, 'Bima Ahida', 'lul', '2c0b3d4664350f2ff5a2ac539aeacf0e', 'lul@gmail.com', 'https://i.pinimg.com/564x/ab/94/a1/ab94a143397d6e6cddec9105020b9e6d.jpg', 1, '2018-11-01 20:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_kategori`
--

CREATE TABLE `user_kategori` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_board_user1_idx` (`user_id`);

--
-- Indexes for table `board_image`
--
ALTER TABLE `board_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_board_image_board1_idx` (`board_id`),
  ADD KEY `fk_board_image_image1_idx` (`image_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_user_idx` (`user_id`),
  ADD KEY `fk_image_kategori1_idx` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_komentar_user1_idx` (`user_id`),
  ADD KEY `fk_komentar_image1_idx` (`image_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_report_image1_idx` (`image_id`),
  ADD KEY `fk_report_user1_idx` (`user_id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_kategori`
--
ALTER TABLE `user_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_kategori_user1_idx` (`user_id`),
  ADD KEY `fk_user_kategori_kategori1_idx` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board_image`
--
ALTER TABLE `board_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_kategori`
--
ALTER TABLE `user_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `fk_board_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `board_image`
--
ALTER TABLE `board_image`
  ADD CONSTRAINT `fk_board_image_board1` FOREIGN KEY (`board_id`) REFERENCES `board` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_board_image_image1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_image_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_image1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_report_image1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_report_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_kategori`
--
ALTER TABLE `user_kategori`
  ADD CONSTRAINT `fk_user_kategori_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_kategori_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
