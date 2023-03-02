-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2022 pada 12.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(50) DEFAULT NULL,
  `safe_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `spesifikasi`, `safe_delete`, `created_at`, `updated_at`, `satuan`) VALUES
(1, 'Bearing g', '6901 zz asb g', 0, '2022-05-31 21:05:28', '2022-05-31 21:05:58', 'kotak k'),
(2, 'Bearing', '6660', 0, '2022-05-31 21:06:30', '2022-05-31 21:06:30', 'Kotak'),
(3, 'Caos', 'ABC', 0, '2022-05-31 21:07:10', '2022-05-31 21:08:02', 'Botol'),
(4, 'p', 'p', 0, '2022-06-07 05:09:56', '2022-06-07 05:09:56', 'p'),
(5, 'ggp', 'pp', 1, '2022-06-14 05:43:00', '2022-06-14 05:44:46', 'gemingpp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_rek` int(11) DEFAULT NULL,
  `faktur` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_faktur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_barang` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selisih_barang` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_barang`, `tanggal`, `no_rek`, `faktur`, `nama_barang`, `satuan`, `volume_faktur`, `jumlah_barang`, `selisih_barang`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-18', NULL, NULL, '', NULL, '97', '90', '9', 1, '2022-05-17 06:00:53', '2022-06-07 04:44:44'),
(6, 2, '2022-05-18', NULL, NULL, '', 'q', '80', '80', '80', 0, '2022-05-18 08:07:55', '2022-05-18 08:36:29'),
(9, 3, '2022-06-01', NULL, NULL, NULL, NULL, '123p', '5', '1', 0, '2022-05-31 22:39:25', '2022-05-31 22:39:25'),
(10, 1, '2022-06-01', NULL, NULL, NULL, NULL, '321', '321', '321', 1, '2022-05-31 23:30:18', '2022-06-01 06:07:57'),
(11, 4, '2022-06-07', NULL, NULL, NULL, NULL, 'jksdk', '6', '9', 1, '2022-06-07 05:55:45', '2022-06-14 05:56:15'),
(12, 4, '2022-06-07', NULL, NULL, NULL, NULL, 'jj', '88', '8', 0, '2022-06-07 05:56:57', '2022-06-07 05:56:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saksi` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yang_menyerahkan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yang_menerima` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerimaan_faktur` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opl_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_menurut_faktur` int(11) DEFAULT NULL,
  `volume_menurut_kenyataan` int(11) DEFAULT NULL,
  `volume_selisih` int(11) DEFAULT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mengetahui` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bon_barang`
--

CREATE TABLE `bon_barang` (
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa_seb_dikeluarkan` int(11) DEFAULT NULL,
  `diminta` int(11) DEFAULT NULL,
  `disetujui` int(11) DEFAULT NULL,
  `dikeluarkan` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_rek` int(11) DEFAULT NULL,
  `obyek` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `devisi`
--

CREATE TABLE `devisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `devisi`
--

INSERT INTO `devisi` (`id`, `nama`, `keterangan`) VALUES
(1, 'Pengadaan', ''),
(2, 'Keamanan', ''),
(3, 'Kesehatan', ''),
(4, 'Kantor', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_barang`
--

CREATE TABLE `master_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifikasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo_akhir` int(11) DEFAULT NULL,
  `no_rak` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faktur` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safe_delete` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_barang`
--

INSERT INTO `master_barang` (`id`, `id_barang`, `nama_barang`, `spesifikasi`, `satuan`, `saldo_akhir`, `no_rak`, `keterangan`, `faktur`, `safe_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'helm', 'p', 'p', 200, 'ppp', 'pp', '123', 0, '2022-05-23 07:05:32', '2022-06-07 04:51:35'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '97', 1, '2022-06-07 04:34:57', '2022-06-07 04:34:57'),
(5, 1, NULL, NULL, NULL, 100, 'pppp', 'p', '97', 1, '2022-06-07 04:44:44', '2022-06-07 04:51:35'),
(6, 4, NULL, NULL, NULL, 6, 'a', 'a', 'jksdk', 0, '2022-06-14 05:56:15', '2022-06-14 05:56:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_14_052822_create_user_table', 1),
(6, '2022_02_14_053336_create_master_barang_table', 1),
(7, '2022_02_14_053406_create_barang_masuk_table', 1),
(8, '2022_02_14_053444_create_berita_acara_table', 1),
(9, '2022_02_14_053525_create_bon_barang_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `diterima_dari` int(11) NOT NULL,
  `no_bon_barang` int(11) NOT NULL,
  `opl_no` varchar(255) NOT NULL,
  `diperiksa_oleh` int(11) NOT NULL,
  `disaksikan_oleh` varchar(255) NOT NULL,
  `diterima_oleh` int(11) NOT NULL,
  `diketahui_oleh` int(11) NOT NULL,
  `dibukukan_oleh` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id`, `id_bagian`, `nomor`, `tanggal`, `diterima_dari`, `no_bon_barang`, `opl_no`, `diperiksa_oleh`, `disaksikan_oleh`, `diterima_oleh`, `diketahui_oleh`, `dibukukan_oleh`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'IGG-RETURN-001-VII-2022', '2022-07-07', 1, 2, '1234', 1, '2w3e4r', 1, 1, 1, 0, '2022-07-07 00:38:24', '2022-07-13 01:59:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bon_barang`
--

CREATE TABLE `t_bon_barang` (
  `id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_bon_barang`
--

INSERT INTO `t_bon_barang` (`id`, `id_bagian`, `nomor`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 3, 'IGG-BON-002-VI-2022', 1, '2022-06-16', '2022-06-27 22:55:58', '2022-07-13 02:48:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_master_barang`
--

CREATE TABLE `t_master_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(225) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `rak` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `safe_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_master_barang`
--

INSERT INTO `t_master_barang` (`id`, `kode_barang`, `nama`, `satuan`, `ukuran`, `rak`, `tanggal`, `jumlah`, `safe_delete`, `created_at`, `updated_at`) VALUES
(1, '0013', 'Bearing g', 'PCS', 'KG', 'r-12', '2022-06-24', '323', 1, '2022-06-22 04:42:25', '2022-06-22 04:59:45'),
(2, 'SDF', 'asfd', 'BAL', 'LITER', 'dsf', '2022-07-08', '3242', 1, '2022-06-22 04:58:47', '2022-06-22 04:59:28'),
(3, 'asdf', 'asdf', 'PCS', 'KG', 'asfd', '2022-06-17', '234', 1, '2022-06-22 04:59:38', '2022-06-22 04:59:42'),
(4, 'h12', 'gg', 'PCS', 'KG', 'r-12', '2022-06-30', '5', 0, '2022-06-30 02:47:09', '2022-07-13 02:48:25'),
(5, 'sf4', 'wp', 'PACK', 'PETI', 'r-10', '2022-06-30', '10', 0, '2022-06-30 02:47:34', '2022-06-30 02:47:42'),
(6, '123', '123', 'PCS', 'KG', '123', '2022-07-14', '12', 0, '2022-07-14 04:55:32', '2022-07-14 04:59:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `devisi` varchar(255) DEFAULT NULL,
  `safe_delete` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pegawai`
--

INSERT INTO `t_pegawai` (`id`, `nama`, `jabatan`, `devisi`, `safe_delete`, `created_at`, `updated_at`) VALUES
(1, 'nama asdf', 'jabatan asfd', 'devisi asdf', 0, NULL, '2022-06-22 00:17:50'),
(2, 'namaasv', 'jabatanasdv', 'devisi', 0, '2022-06-22 00:10:34', '2022-06-22 05:44:39'),
(3, 'p', 'p', 'p', 0, '2022-06-22 00:11:17', '2022-06-22 00:11:20'),
(4, 'asdf', 'asdf', NULL, 0, '2022-06-22 05:44:32', '2022-06-22 05:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rincian_barang_masuk`
--

CREATE TABLE `t_rincian_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `vol_menurut_faktur` int(11) NOT NULL,
  `vol_menurut_kenyataan` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_rincian_barang_masuk`
--

INSERT INTO `t_rincian_barang_masuk` (`id`, `id_barang_masuk`, `id_barang`, `vol_menurut_faktur`, `vol_menurut_kenyataan`, `selisih`, `saldo_awal`, `saldo_akhir`, `harga_satuan`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 2, 5, 3, 3, 3, 10, 13, '3', 3, '3', '2022-07-14 04:06:12', '2022-07-14 04:06:12'),
(4, 2, 5, 3, 3, 3, 10, 13, '3', 3, '3', '2022-07-14 04:43:48', '2022-07-14 04:43:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rincian_bon_barang`
--

CREATE TABLE `t_rincian_bon_barang` (
  `id` int(11) NOT NULL,
  `id_bon_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `diminta` int(11) NOT NULL,
  `disetujui` int(11) NOT NULL,
  `dikeluarkan` int(11) NOT NULL,
  `harga_satuan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_rincian_bon_barang`
--

INSERT INTO `t_rincian_bon_barang` (`id`, `id_bon_barang`, `id_barang`, `saldo_awal`, `diminta`, `disetujui`, `dikeluarkan`, `harga_satuan`, `jumlah`, `no_rekening`, `obyek`, `created_at`, `updated_at`) VALUES
(4, 2, 4, 5, 2, 2, 2, '2', 2, '2', '2', '2022-07-05 08:12:13', '2022-07-05 08:12:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_bon_barang`
--
ALTER TABLE `t_bon_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_master_barang`
--
ALTER TABLE `t_master_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_rincian_barang_masuk`
--
ALTER TABLE `t_rincian_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_rincian_bon_barang`
--
ALTER TABLE `t_rincian_bon_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `devisi`
--
ALTER TABLE `devisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_bon_barang`
--
ALTER TABLE `t_bon_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_master_barang`
--
ALTER TABLE `t_master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_rincian_barang_masuk`
--
ALTER TABLE `t_rincian_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_rincian_bon_barang`
--
ALTER TABLE `t_rincian_bon_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
