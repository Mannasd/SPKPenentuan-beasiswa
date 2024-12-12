/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `umkm2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `umkm2`;

CREATE TABLE IF NOT EXISTS `data_alternatif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_alternatif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `C1` double DEFAULT NULL,
  `C2` double DEFAULT NULL,
  `C3` double DEFAULT NULL,
  `C4` double DEFAULT NULL,
  `C5` double DEFAULT NULL,
  `C6` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `data_alternatif` (`id`, `kode_alternatif`, `nama_alternatif`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`) VALUES
	(3, 'A1', 'Siswa 1', 17, 70, 7, 4, 80, 2000000),
	(4, 'A2', 'Siswa2', 16, 75, 6, 6, 90, 1700000),
	(5, 'A3', 'Siswa 3', 14, 70, 9, 2, 70, 2400000),
	(6, 'A4', 'Siswa 4', 15, 70, 8, 5, 80, 1800000),
	(7, 'A5', 'Siswa 5', 15, 70, 5, 6, 80, 1500000);

CREATE TABLE IF NOT EXISTS `data_bobot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nama_bobot` varchar(50) NOT NULL,
  `nilai_bobot` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `data_bobot` (`id`, `kode_kriteria`, `nama_kriteria`, `nama_bobot`, `nilai_bobot`) VALUES
	(1, 'C1', 'Jenis Usaha', 'Mikro', 30.00),
	(2, 'C1', 'Jenis Usaha', 'Makro', 70.00),
	(3, 'C2', 'Jumlah Pekerja', '<=1', 10.00),
	(4, 'C2', 'Jumlah Pekerja', '2-5', 20.00),
	(5, 'C2', 'Jumlah Pekerja', '5-100', 30.00),
	(6, 'C2', 'Jumlah Pekerja', '>100', 40.00),
	(7, 'C3', 'Modal Usaha', '<=1000000', 10.00),
	(8, 'C3', 'Modal Usaha', '1000001-2000000', 20.00),
	(9, 'C3', 'Modal Usaha', '2000001-3000000', 30.00),
	(10, 'C3', 'Modal Usaha', '>3000000', 40.00);

CREATE TABLE IF NOT EXISTS `data_kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_kriteria` decimal(5,2) NOT NULL,
  `tipe_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `data_kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `nilai_kriteria`, `tipe_kriteria`) VALUES
	(1, 'C1', 'Usia Siswa', 0.23, 'Benefit'),
	(2, 'C2', 'perilaku Siswa', 0.19, 'Benefit'),
	(3, 'C3', 'Jumlah saudara kandung', 0.19, 'Benefit'),
	(4, 'C4', 'Jumlah tanggungan orang tua', 0.14, 'Benefit'),
	(9, 'C5', 'Nilai rata-rata ', 0.14, 'Benefit'),
	(10, 'C6', 'Gaji Orang tua', 0.09, 'Benefit');

CREATE TABLE IF NOT EXISTS `data_umkm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_umkm` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `jalan` varchar(150) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `data_umkm` (`id`, `nama_umkm`, `nama_pimpinan`, `jalan`, `desa`, `kecamatan`, `jenis_usaha`) VALUES
	(2, 'UD. Linggar Jati', 'Muhammad Bahrus Salim', 'JL. Gatot Subroto 45', 'Bukur', 'Purworejo', 'Jual Kayu Bangunan'),
	(3, 'Nanda Motor', 'Rudi Santoso', 'JL. Pattimura', 'Pohjentrek', 'Purworejo', 'Bengkel'),
	(4, 'Zayaka Tailor', 'Maritsa Salim', 'JL. Mawar 78', 'Krapyak', 'Kraton', 'Penjahitan');

CREATE TABLE IF NOT EXISTS `jenis_usaha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_usaha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `jenis_usaha` (`id`, `nama_jenis_usaha`) VALUES
	(24, 'Siswa 1'),
	(25, 'Siswa 2'),
	(26, 'Siswa 3'),
	(27, 'Siswa 4'),
	(28, 'Siswa 5');

CREATE TABLE IF NOT EXISTS `konversi_penilaian` (
  `id_konversi` int NOT NULL AUTO_INCREMENT,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `C1` int DEFAULT NULL,
  `C2` int DEFAULT NULL,
  `C3` int DEFAULT NULL,
  PRIMARY KEY (`id_konversi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `konversi_penilaian` (`id_konversi`, `nama_usaha`, `C1`, `C2`, `C3`) VALUES
	(1, 'Kios Lumintu', 30, 40, 30),
	(2, 'UD.Linggar Jati', 70, 40, 40),
	(3, 'Nanda Motor', 30, 10, 10),
	(4, 'Zakiya Tailor', 30, 10, 30);

CREATE TABLE IF NOT EXISTS `tbl_mahasiswa` (
  `id_mhs` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nim`, `nama`, `jurusan`, `alamat`) VALUES
	(8, '220605110126', 'Andre', 'Teknik Arsitektur', 'Jakarta'),
	(9, '220605110126', 'Andrean', 'Teknik Informatika', 'Bekasi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
