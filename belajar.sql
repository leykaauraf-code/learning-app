-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2025 at 08:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` varchar(255) DEFAULT NULL,
  `pilihan_b` varchar(255) DEFAULT NULL,
  `pilihan_c` varchar(255) DEFAULT NULL,
  `pilihan_d` varchar(255) DEFAULT NULL,
  `jawaban_benar` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `materi_id`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`) VALUES
(1, 1, 'Yang termasuk komponen sistem informasi adalah…', 'Data', 'Teknologi\r\n', 'Prosedur\r\n', 'Semua benar', 'D'),
(2, 1, 'Contoh input dalam sistem informasi adalah…', 'Laporan keuangan\r\n', 'Data pelanggan', 'Analisis penjualan', 'Grafik', 'B'),
(3, 1, 'Sistem informasi akuntansi digunakan untuk…', 'Menganalisis laporan keuangan', 'Mengelola jadwal', 'Mengirim email', 'Mendesain gambar', 'A'),
(4, 1, 'Berikut adalah contoh sistem berbasis web…', 'Excel\r\n\r\n\r\n', 'WhatsApp Web\r\n', 'Notepad', 'WPaint', 'B'),
(5, 1, 'Sistem Informasi adalah…', 'Kumpulan data tanpa proses\r\n', 'Sistem yang mengolah data menjadi informasi\r\n', 'Perangkat keras saja\r\n', 'Jaringan komputer', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul`, `kategori`, `deskripsi`, `isi`, `created_at`) VALUES
(1, 'Pengantar Sistem Informasi', 'Teori', 'Dasar-dasar sistem informasi: definisi, komponen, dan peran dalam organisasi.', '📘 Pengantar Sistem Informasi\r\n1. Apa Itu Sistem Informasi?\r\n\r\nSistem Informasi (SI) adalah kombinasi antara:\r\n\r\nmanusia\r\n\r\nteknologi\r\n\r\nperangkat keras (hardware)\r\n\r\nperangkat lunak (software)\r\n\r\ndata\r\n\r\nprosedur\r\n\r\nyang bekerja bersama untuk mengumpulkan, mengolah, menyimpan, dan mendistribusikan informasi agar membantu pengambilan keputusan.\r\n\r\nContoh sistem informasi:\r\n\r\nSistem absensi sekolah\r\n\r\nAplikasi kasir\r\n\r\nSistem informasi rumah sakit\r\n\r\nAplikasi e-learning\r\n\r\n2. Komponen Sistem Informasi\r\n\r\nSebuah sistem informasi terdiri dari enam komponen utama:\r\n\r\n1️⃣ Hardware\r\n\r\nPerangkat fisik seperti laptop, komputer, printer, server.\r\n\r\n2️⃣ Software\r\n\r\nAplikasi yang digunakan untuk menjalankan tugas tertentu.\r\nContoh: Windows, Microsoft Office, sistem kasir, aplikasi mobile.\r\n\r\n3️⃣ Data\r\n\r\nKumpulan fakta yang belum diolah.\r\nContoh: nama siswa, nilai ujian, stok barang.\r\n\r\n4️⃣ Prosedur\r\n\r\nCara kerja, alur kerja, SOP, langkah-langkah yang harus diikuti.\r\n\r\n5️⃣ People (Manusia)\r\n\r\nUser yang menggunakan sistem: admin, operator, staf, pelanggan.\r\n\r\n6️⃣ Network\r\n\r\nJaringan internet/LAN yang menghubungkan perangkat.\r\n\r\n3. Tujuan Sistem Informasi\r\n\r\nSistem Informasi dibuat untuk:\r\n\r\nMempermudah pekerjaan\r\n\r\nMenyediakan informasi yang cepat dan akurat\r\n\r\nMengurangi kesalahan manusia (human error)\r\n\r\nMeningkatkan efisiensi dan produktivitas\r\n\r\nMendukung pengambilan keputusan\r\n\r\n4. Contoh Penerapan Sistem Informasi\r\n\r\nBerikut contoh penggunaan Sistem Informasi dalam kehidupan sehari-hari:\r\n\r\nPerbankan → Mobile banking, ATM\r\n\r\nKesehatan → Sistem rekam medis elektronik\r\n\r\nPendidikan → E-learning, aplikasi nilai siswa\r\n\r\nBisnis → Sistem kasir, aplikasi inventaris\r\n\r\nPemerintahan → Sistem administrasi kependudukan\r\n\r\n5. Jenis-Jenis Sistem Informasi\r\n1. TPS (Transaction Processing System)\r\n\r\nSistem untuk memproses transaksi rutin.\r\nContoh: kasir, absensi, pembayaran online.\r\n\r\n2. MIS (Management Information System)\r\n\r\nMenampilkan laporan untuk manajer.\r\nContoh: laporan bulanan, grafik penjualan.\r\n\r\n3. DSS (Decision Support System)\r\n\r\nSistem pendukung pengambilan keputusan.\r\nContoh: sistem rekomendasi penjualan.\r\n\r\n4. ERP (Enterprise Resource Planning)\r\n\r\nMenghubungkan seluruh departemen dalam perusahaan.\r\nContoh: SAP, Oracle ERP.\r\n\r\n5. E-commerce System\r\n\r\nAplikasi jual beli online.\r\nContoh: Tokopedia, Shopee.\r\n\r\n6. Manfaat Sistem Informasi\r\n\r\nMempercepat pekerjaan\r\n\r\nMengurangi biaya operasional\r\n\r\nMempermudah komunikasi\r\n\r\nMeningkatkan kualitas layanan\r\n\r\nMenciptakan data yang akurat\r\n\r\n7. Kesimpulan\r\n\r\nSistem Informasi adalah bagian penting dalam organisasi modern.\r\nDengan memahami konsep dasar SI, kita dapat merancang, menggunakan, atau meningkatkan sebuah sistem agar lebih bermanfaat dan efisien.', '2025-11-23 03:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','siswa') DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'admin'),
(2, 'leyka', 'leykaauraf@gmail.com', '$2y$10$W5PVyZbRQoiwiQ7/cWGykOhfezp7Bfx979fvPvfnNdfoBsdZh52e6', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_id` (`materi_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_ibfk_1` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
