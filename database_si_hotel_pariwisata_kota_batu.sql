-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 01.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(36) NOT NULL,
  `id_hotel` varchar(36) DEFAULT NULL,
  `id_tempat_wisata` varchar(36) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_hotel`, `id_tempat_wisata`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
('994ff915-ae8a-4e50-8405-032b696132e9', '9944ef9a-d678-45f4-b95d-213c9f9458d9', '994fe204-586a-4891-b0a1-743a3bf49bab', 'Toilet', '1', '2023-06-01 23:33:24', '2023-06-01 23:47:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` varchar(36) NOT NULL,
  `id_jenis_hotel` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `check_in` varchar(20) NOT NULL,
  `check_out` varchar(20) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `id_jenis_hotel`, `nama`, `alamat`, `deskripsi`, `check_in`, `check_out`, `jumlah_kamar`, `foto`, `created_at`, `updated_at`) VALUES
('9944ef9a-d678-45f4-b95d-213c9f9458d9', '7f9f2245-eef9-11ed-962e-e4e7493b7607', 'Grand Mercury IIII', 'Malang', 'Hotel di malang', '09:00', '12:00', 100, 'e4S0BO96EvOp3krQAkqjGFaFz56qmbGarP7ZNpUk.jpg', '2023-05-27 11:52:47', '2023-05-27 12:04:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_hotel`
--

CREATE TABLE `jenis_hotel` (
  `id_jenis_hotel` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_hotel`
--

INSERT INTO `jenis_hotel` (`id_jenis_hotel`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
('7f9f2245-eef9-11ed-962e-e4e7493b7607', 'Resort', 'jenis hotel yang berada jauh di luar pusat pekotaan dan berada di kawasan-kawasan wisata dan juga rekreasi seperti di pantai, pegunungan, tepi danau atau sungai dan sejenisnya.', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tempat_wisata`
--

CREATE TABLE `jenis_tempat_wisata` (
  `id_jenis_wisata` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_tempat_wisata`
--

INSERT INTO `jenis_tempat_wisata` (`id_jenis_wisata`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
('3196530c-eef9-11ed-962e-e4e7493b7607', 'Wisata Bahari', 'berhubungan dengan olahraga yang dilakukan di air, seperti di pantai, danau, teluk', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(36) NOT NULL,
  `id_hotel` varchar(36) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `tipe_kamar`, `nama_kamar`, `harga_kamar`, `jumlah_kamar`, `foto`, `created_at`, `updated_at`) VALUES
('994ec908-4f07-478e-8c2b-d772164a0382', '9944ef9a-d678-45f4-b95d-213c9f9458d9', 'Luxury', 'Luxury LT1', 1000000, 10000, 'ca9HGs6qG67PqYgFSZol3oOa0d3LWqDisZeDwEsi.jpg', '2023-06-01 09:23:12', '2023-06-01 10:55:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_hotel`
--

CREATE TABLE `kriteria_hotel` (
  `id_kriteria_hotel` varchar(36) NOT NULL,
  `id_hotel` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_hotel`
--

INSERT INTO `kriteria_hotel` (`id_kriteria_hotel`, `id_hotel`, `nama`, `nilai`, `deskripsi`, `created_at`, `updated_at`) VALUES
('994eeee6-77b3-423b-99f8-bdff35c3f671', '9944ef9a-d678-45f4-b95d-213c9f9458d9', 'Bersih', '9', 'hotel ini', '2023-06-01 11:09:05', '2023-06-01 11:16:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_tempat_wisata`
--

CREATE TABLE `kriteria_tempat_wisata` (
  `id_kriteria_wisata` varchar(36) NOT NULL,
  `id_tempat_wisata` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek_atraksi`
--

CREATE TABLE `objek_atraksi` (
  `id_objek_atraksi` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tipe_objek` varchar(255) NOT NULL,
  `harga_masuk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `objek_atraksi`
--

INSERT INTO `objek_atraksi` (`id_objek_atraksi`, `nama`, `deskripsi`, `tipe_objek`, `harga_masuk`, `created_at`, `updated_at`) VALUES
('d8854311-eef9-11ed-962e-e4e7493b7607', 'rumah hallowin', 'objek labu yang menakutkan', 'Permainan', 10000, NULL, '2023-06-03 20:29:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `username`, `password`, `role`, `alamat`, `no_telp`, `foto`, `created_at`, `updated_at`) VALUES
('0286116e-e4fb-11ed-ab98-e4e7493b7607', 'Nayla', 'nayla', 'nayla', 'Admin', 'Sumenep', '08652781927', '6M0Pvt61vwBqjiT8mDpmriMdbp0214EQuBfUvLZK.jpg', NULL, '2023-04-27 05:57:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(36) NOT NULL,
  `id_hotel` varchar(36) NOT NULL,
  `id_tempat_wisata` varchar(36) NOT NULL,
  `id_objek_atraksi` varchar(36) NOT NULL,
  `id_pegawai` varchar(36) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `alamat_pengunjung` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_hotel`, `id_tempat_wisata`, `id_objek_atraksi`, `id_pegawai`, `tgl_pemesanan`, `nama_pengunjung`, `alamat_pengunjung`, `no_telp`, `total_transaksi`, `metode_pembayaran`, `catatan`, `created_at`, `updated_at`) VALUES
('9953c34a-f9fa-4266-b9c0-273432b1f503', '9944ef9a-d678-45f4-b95d-213c9f9458d9', '994fe204-586a-4891-b0a1-743a3bf49bab', 'd8854311-eef9-11ed-962e-e4e7493b7607', '0286116e-e4fb-11ed-ab98-e4e7493b7607', '2023-06-29', 'ayla', 'sumenep', '083682638924', 50000, 'Cash', 'untuk pemsanan kamar hotel', '2023-06-03 20:46:18', '2023-06-03 20:46:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` varchar(36) NOT NULL,
  `id_hotel` varchar(36) NOT NULL,
  `id_tempat_wisata` varchar(36) NOT NULL,
  `skor` varchar(20) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_hotel`, `id_tempat_wisata`, `skor`, `komentar`, `tgl_penilaian`, `created_at`, `updated_at`) VALUES
('99500e01-7478-49c3-984b-c3d530f4a1ad', '9944ef9a-d678-45f4-b95d-213c9f9458d9', '994fe204-586a-4891-b0a1-743a3bf49bab', '9', 'Bagus', '2023-06-01', '2023-06-02 00:31:54', '2023-06-02 00:35:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id_tempat_wisata` varchar(36) NOT NULL,
  `id_jenis_wisata` varchar(36) NOT NULL,
  `id_objek_atraksi` varchar(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `jam_tutup` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id_tempat_wisata`, `id_jenis_wisata`, `id_objek_atraksi`, `nama`, `alamat`, `deskripsi`, `jam_buka`, `jam_tutup`, `kapasitas`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
('994fe204-586a-4891-b0a1-743a3bf49bab', '3196530c-eef9-11ed-962e-e4e7493b7607', 'd8854311-eef9-11ed-962e-e4e7493b7607', 'BNS', 'Batu', 'ZOOO', '09:00', '12:00', 100, 100000, 'FJpYZKA8Gbtzg0wzLsou42JKgugnyvhaJuNbs9u8.jpg', '2023-06-01 22:28:54', '2023-06-01 22:28:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_jenis_hotel` (`id_jenis_hotel`);

--
-- Indeks untuk tabel `jenis_hotel`
--
ALTER TABLE `jenis_hotel`
  ADD PRIMARY KEY (`id_jenis_hotel`);

--
-- Indeks untuk tabel `jenis_tempat_wisata`
--
ALTER TABLE `jenis_tempat_wisata`
  ADD PRIMARY KEY (`id_jenis_wisata`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indeks untuk tabel `kriteria_hotel`
--
ALTER TABLE `kriteria_hotel`
  ADD PRIMARY KEY (`id_kriteria_hotel`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indeks untuk tabel `kriteria_tempat_wisata`
--
ALTER TABLE `kriteria_tempat_wisata`
  ADD PRIMARY KEY (`id_kriteria_wisata`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`);

--
-- Indeks untuk tabel `objek_atraksi`
--
ALTER TABLE `objek_atraksi`
  ADD PRIMARY KEY (`id_objek_atraksi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`),
  ADD KEY `id_objek_atraksi` (`id_objek_atraksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`);

--
-- Indeks untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id_tempat_wisata`),
  ADD KEY `id_jenis_wisata` (`id_jenis_wisata`),
  ADD KEY `id_objek_atraksi` (`id_objek_atraksi`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tempat_wisata` (`id_tempat_wisata`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fasilitas_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`id_jenis_hotel`) REFERENCES `jenis_hotel` (`id_jenis_hotel`);

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_hotel`
--
ALTER TABLE `kriteria_hotel`
  ADD CONSTRAINT `kriteria_hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_tempat_wisata`
--
ALTER TABLE `kriteria_tempat_wisata`
  ADD CONSTRAINT `kriteria_tempat_wisata_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tempat_wisata` (`id_tempat_wisata`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_objek_atraksi`) REFERENCES `objek_atraksi` (`id_objek_atraksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD CONSTRAINT `tempat_wisata_ibfk_1` FOREIGN KEY (`id_jenis_wisata`) REFERENCES `jenis_tempat_wisata` (`id_jenis_wisata`),
  ADD CONSTRAINT `tempat_wisata_ibfk_2` FOREIGN KEY (`id_objek_atraksi`) REFERENCES `objek_atraksi` (`id_objek_atraksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
