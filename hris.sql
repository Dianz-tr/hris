-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2022 pada 11.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_08_04_000004_create_departments_table', 1),
(4, '2022_08_04_000004_create_designations_table', 1),
(5, '2022_08_04_000005_create_employees_table', 1),
(6, '2022_08_04_065900_create_attendances_table', 1),
(7, '2022_08_09_033736_create_events_table', 1),
(8, '2022_08_12_012932_create_categories_table', 1),
(9, '2022_08_16_025953_create_holidays_table', 1),
(10, '2022_08_16_065627_create_clients_table', 1),
(11, '2022_08_18_032408_create_izins_table', 1),
(12, '2022_08_20_154512_create_assets_table', 1),
(13, '2022_08_20_180735_create_revenues_table', 1),
(14, '2022_08_23_022358_create_overtimes_table', 1),
(15, '2022_08_23_035713_create_salaries_table', 1),
(16, '2022_08_23_072100_create_expenses_table', 1),
(17, '2022_08_25_021428_create_projects_table', 1),
(18, '2022_09_08_031438_create_tasks_table', 1),
(19, '2022_09_08_070219_create_taskboards_table', 1),
(20, '2022_09_12_033558_create_goals_table', 1),
(21, '2022_09_12_075002_create_goaltypes_table', 1),
(22, '2022_09_12_090624_create_leave_settings_table', 1),
(23, '2022_09_13_012536_create_trainingtypes_table', 1),
(24, '2022_09_13_021945_create_trainers_table', 1),
(25, '2022_09_13_040616_create_budgets_table', 1),
(26, '2022_09_13_064959_create_experiences_table', 1),
(27, '2022_09_14_010908_create_taxes_table', 1),
(28, '2022_09_14_012922_create_candidates_table', 1),
(29, '2022_09_14_034516_create_policies_table', 1),
(30, '2022_09_14_043406_create_schedulings_table', 1),
(31, '2022_09_14_073130_create_timesheets_table', 1),
(32, '2022_09_14_091221_create_trainings_table', 1),
(33, '2022_09_15_025306_create_payrolltypes_table', 1),
(34, '2022_09_15_040009_create_terminations_table', 1),
(35, '2022_09_15_085218_create_payrolltypeaditions_table', 1),
(36, '2022_09_15_152852_create_payrolltypeovertimes_table', 1),
(37, '2022_09_15_160740_create_payrolltypedeductions_table', 1),
(38, '2022_09_16_010026_create_resignations_table', 1),
(39, '2022_09_16_033215_create_interquests_table', 1),
(40, '2022_09_19_015951_create_tickets_table', 1),
(41, '2022_09_19_032436_create_provident_funds_table', 1),
(42, '2022_09_19_062400_create_performapps_table', 1),
(43, '2022_09_19_080220_create_sales_expenses_table', 1),
(44, '2022_09_20_023630_create_performindis_table', 1),
(45, '2022_09_20_074754_create_project_users_table', 1),
(46, '2022_09_21_023122_create_managejobs_table', 1),
(47, '2022_09_21_045917_create_estimates_table', 1),
(48, '2022_09_22_015037_create_shifts_table', 1),
(49, '2022_09_22_070601_create_leaves_table', 1),
(50, '2022_09_23_024844_create_invoices_table', 1),
(51, '2022_09_23_025251_create_detail_invoices_table', 1),
(52, '2022_09_26_011504_create_promotions_table', 1),
(53, '2022_09_28_063505_create_detail_estimates_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_assets`
--

CREATE TABLE `tbl_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_user` int(10) UNSIGNED DEFAULT NULL,
  `asset_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty_end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_attendances`
--

CREATE TABLE `tbl_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `masuk` time NOT NULL,
  `keluar` time DEFAULT NULL,
  `production` int(11) DEFAULT NULL,
  `note_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Punch In at',
  `note_out` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_attendances`
--

INSERT INTO `tbl_attendances` (`id`, `created_at`, `updated_at`, `user_id`, `name`, `date`, `masuk`, `keluar`, `production`, `note_in`, `note_out`, `status`) VALUES
(1, '2022-09-30 07:02:18', '2022-09-30 07:03:07', 1, 'superadmin', '2022-09-30', '10:02:18', '14:03:07', 4, 'Punch In at', 'Punch Out at', 1),
(2, '2022-09-30 08:32:51', '2022-09-30 08:32:57', 6, 'admin', '2022-09-30', '15:32:51', '15:32:56', 0, 'Punch In at', 'Punch Out at', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_budgets`
--

CREATE TABLE `tbl_budgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `budget_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `revenue_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenue_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overall_revenue` bigint(20) DEFAULT NULL,
  `expense_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overall_expense` bigint(20) DEFAULT NULL,
  `profit` bigint(20) DEFAULT NULL,
  `tax_amount` bigint(20) NOT NULL,
  `budget_amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_budgets`
--

INSERT INTO `tbl_budgets` (`id`, `budget_title`, `budget_type`, `start_date`, `end_date`, `revenue_title`, `revenue_amount`, `overall_revenue`, `expense_title`, `expense_amount`, `overall_expense`, `profit`, `tax_amount`, `budget_amount`, `created_at`, `updated_at`) VALUES
(1, 'Property', 'category', '2022-09-30', '2022-10-21', 'Project', '1000000', 1000000, 'Coding Kids', '500000', 500000, 500000, 100000, 400000, '2022-09-30 01:12:31', '2022-09-30 01:12:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_candidates`
--

CREATE TABLE `tbl_candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_candidates`
--

INSERT INTO `tbl_candidates` (`id`, `fname`, `lname`, `contact`, `email`, `employee_id`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 'Syakira', 'Putri', 976754322896, 'sykli@gmail.com', 'FT-0003', '2022-09-30', '2022-09-30 00:34:53', '2022-09-30 00:34:53'),
(2, 'Vania', 'Putri', 85435678, 'vania@gmail.com', 'FT-0002', '2022-09-30', '2022-09-30 01:48:09', '2022-09-30 01:48:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `sub_category`, `created_at`, `updated_at`) VALUES
(1, 'Hardware', 'Hardware', '2022-09-29 23:28:35', '2022-09-29 23:28:35'),
(2, 'SOFTWARE', 'WEBSITE', '2022-09-30 01:38:53', '2022-09-30 01:38:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `name`, `image`, `id_client`, `email`, `position`, `phone`, `birthday`, `company`, `address`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Mawar', 'uploads/imgClients/1664526920_worker2.jpg', 'CLT-0709211', 'melisa@gmail.com', 'CEO', 98987876876, '1997-01-01', 'Global Company', 'Salatiga', 'Male', '2022-09-30 00:09:21', '2022-09-30 01:35:20'),
(2, 'Rony Putra', 'uploads/imgClients/1664521821_worker3.jfif', 'CLT-0709211', 'rony@gmail.com', 'MANAGER', 767876755678, '1997-02-20', 'SoloTech', 'Solo', 'Male', '2022-09-30 00:10:21', '2022-09-30 00:10:21'),
(3, 'Doni Putra', 'uploads/imgClients/1664521893_worker1.jpg', 'CLT-0709331', 'dono@gmail.com', 'MANAGER', 85428961287, '2022-09-29', 'TechIDN', 'Semarang', 'Male', '2022-09-30 00:11:33', '2022-09-30 00:11:33'),
(4, 'Yawan', 'uploads/imgClients/1664523661_worker3.jfif', 'CLT-0709011', 'yawan@gmail.com', 'CEO', 28737726656, '1998-06-17', 'LocalTech', 'Salatiga', 'Male', '2022-09-30 00:41:01', '2022-09-30 00:41:01'),
(5, 'Fendy', 'uploads/imgClients/1664526886_worker2.jpg', 'CLT-0809461', 'fendy@gmail.co', 'CEO', 956789567, '2022-09-30', 'GlobalCompany', 'Solo', 'Male', '2022-09-30 01:34:46', '2022-09-30 01:34:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Direksi', 'direksi', '2022-09-29 23:41:36', '2022-09-29 23:46:07'),
(2, 'Manager', 'manager', '2022-09-29 23:43:11', '2022-09-29 23:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_designations`
--

CREATE TABLE `tbl_designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_designations`
--

INSERT INTO `tbl_designations` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Direktur Utama', 1, '2022-09-29 23:47:42', '2022-09-29 23:47:42'),
(2, 'Direktur Keuangan', 1, '2022-09-29 23:47:53', '2022-09-29 23:47:53'),
(3, 'Direktur HRD atau Personalia', 1, '2022-09-29 23:48:08', '2022-09-29 23:48:08'),
(4, 'Manager Pemasaran', 2, '2022-09-29 23:48:25', '2022-09-29 23:48:39'),
(5, 'Manager HRD', 2, '2022-09-29 23:49:01', '2022-09-29 23:49:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_estimates`
--

CREATE TABLE `tbl_detail_estimates` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_invoices`
--

CREATE TABLE `tbl_detail_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_detail_invoices`
--

INSERT INTO `tbl_detail_invoices` (`id`, `item`, `description`, `unit_cost`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Komputer', 'Komputer', 700000, 10, 7000000, '2022-09-30 01:01:46', '2022-09-30 01:01:46'),
(2, 'Meja Komputer', 'Meja Komputer', 800000, 30, 24000000, '2022-09-30 01:03:13', '2022-09-30 01:03:13'),
(3, 'Mousepad', 'Mousepad', 50000, 30, 1500000, '2022-09-30 01:03:13', '2022-09-30 01:03:13'),
(4, 'KERTAS', 'KERTAS', 9000, 90, 810000, '2022-09-30 01:38:24', '2022-09-30 01:38:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `f_name`, `l_name`, `email`, `employee_id`, `join`, `phone`, `company`, `designation_id`, `department_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ayu', 'febi', 'employee@app.com', 'FT-0000', '2022-09-30', '085432874201', 'Marketing', 4, 2, NULL, '2022-09-29 23:51:57', '2022-09-29 23:51:57'),
(2, 'yuda', 'satria', 'yudasatria76@gmail.com', 'FT-0001', '2022-09-21', '084582461706', 'Groupon', 1, 1, NULL, '2022-09-29 23:54:27', '2022-09-29 23:54:27'),
(3, 'Vania', 'putri', 'putrimelani76@gmail.com', 'FT-0002', '2022-03-22', '089543298173', 'Technologent', 1, 1, NULL, '2022-09-29 23:56:55', '2022-09-29 23:56:55'),
(4, 'jovanca', 'samuel', 'jovasamu01@gmail.com', 'FT-0003', '2022-05-26', '0873967251673', 'Intellivision', 5, 2, NULL, '2022-09-29 23:58:41', '2022-09-29 23:58:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_estimates`
--

CREATE TABLE `tbl_estimates` (
  `id` int(10) UNSIGNED NOT NULL,
  `estimate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `client_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimate_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `total` bigint(20) DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_estimates`
--

INSERT INTO `tbl_estimates` (`id`, `estimate_id`, `client_id`, `project_id`, `email`, `tax_id`, `client_address`, `billing_address`, `estimate_date`, `expiry_date`, `total`, `tax`, `discount`, `grand_total`, `other_info`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EST-0709381', 1, 1, 'melisa@gmail.com', 1, 'Salatiga', 'Salatiga', '2022-09-30', '2022-10-21', 270000, '20', '10', 291600, 'Property Sekolah', 'Accepted', '2022-09-30 00:56:38', '2022-09-30 00:56:38'),
(3, 'EST-0809491', 3, 1, 'dono@gmail.com', 1, 'Semarang', 'Salatiga', '2022-09-30', '2022-10-21', 20000000, '20', '10', 21600000, 'Lab Komputer', 'Declined', '2022-09-30 01:00:49', '2022-09-30 01:00:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `expense_date` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`id`, `note`, `category_id`, `expense_date`, `amount`, `file`, `created_at`, `updated_at`) VALUES
(1, 'expenses 2012', 1, '2012-01-03', 90000, 'uploads/expenses/1664519359_Screenshot (6).png', '2022-09-29 23:29:19', '2022-09-29 23:29:19'),
(2, 'expenses 2013', 1, '2013-01-03', 800000, 'uploads/expenses/1664519394_Screenshot (7).png', '2022-09-29 23:29:54', '2022-09-29 23:29:54'),
(3, 'expenses 2014', 1, '2014-01-03', 400000, 'uploads/expenses/1664519433_Screenshot (7).png', '2022-09-29 23:30:33', '2022-09-29 23:30:33'),
(4, 'expenses 2015', 1, '2015-01-03', 800000, 'uploads/expenses/1664519462_Screenshot (8).png', '2022-09-29 23:31:02', '2022-09-29 23:31:02'),
(5, 'ERTYUI', 2, '2022-09-30', 90000, 'uploads/expenses/1664527156_worker1.jpg', '2022-09-30 01:39:16', '2022-09-30 01:39:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_experiences`
--

CREATE TABLE `tbl_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `experiance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_experiences`
--

INSERT INTO `tbl_experiences` (`id`, `experiance`, `status`, `created_at`, `updated_at`) VALUES
(1, '1-2', 'Active', '2022-09-30 00:37:29', '2022-09-30 00:37:29'),
(2, '1-4', 'Inactive', '2022-09-30 00:37:37', '2022-09-30 00:37:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_goals`
--

CREATE TABLE `tbl_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_achievement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_goals`
--

INSERT INTO `tbl_goals` (`id`, `goal_type`, `subject`, `target_achievement`, `start_date`, `end_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Menetapkan Terlalu Banyak Tujuan', 'Tujuan', 'Mempunyai Tujuan', '2022-09-30', '2022-09-30', 'Tujuan seumur hidup adalah tujuan yang', 'Active', '2022-09-30 00:24:59', '2022-09-30 00:24:59'),
(2, 'Tujuan Seumur Hidup', 'Hidup', 'Tujuan Hidup', '2022-09-07', '2022-09-09', 'satu tahun hingga seumur hidup untuk dicapai.', 'Active', '2022-09-30 00:25:43', '2022-09-30 00:25:43'),
(3, 'Tujuan Seumur Hidup', 'text', 'Web', '2022-09-30', '2022-09-30', 'text', 'Active', '2022-09-30 01:41:51', '2022-09-30 01:41:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_goaltypes`
--

CREATE TABLE `tbl_goaltypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_goaltypes`
--

INSERT INTO `tbl_goaltypes` (`id`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', 'stepping stone goals', 'Active', '2022-09-30 00:21:21', '2022-09-30 00:21:21'),
(2, 'Menetapkan Terlalu Banyak Tujuan', 'Salah satu kesalahan penetapan tujuan yang paling umum adalah menetapkan terlalu banyak tujuan.', 'Inactive', '2022-09-30 00:23:06', '2022-09-30 00:23:21'),
(3, 'Tujuan Seumur Hidup', 'Tujuan seumur hidup adalah tujuan yang akan memakan waktu mulai dari satu tahun hingga seumur hidup untuk dicapai.', 'Active', '2022-09-30 00:24:11', '2022-09-30 00:24:11'),
(4, 'Node Js', 'text', 'Active', '2022-09-30 01:41:06', '2022-09-30 01:41:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_holidays`
--

CREATE TABLE `tbl_holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holidayDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_holidays`
--

INSERT INTO `tbl_holidays` (`id`, `name`, `holidayDate`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-09-30', '2022-09-30 01:29:54', '2022-09-30 01:29:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_interquests`
--

CREATE TABLE `tbl_interquests` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_interquests`
--

INSERT INTO `tbl_interquests` (`id`, `category`, `department`, `question`, `opa`, `opb`, `opc`, `opd`, `cor_answer`, `exp_answer`, `created_at`, `updated_at`) VALUES
(1, 'Web Designer', 'Direksi', 'There are four different types of goals: stepping stone goals, short term goals, long term goals, and lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.', 'Web Designer', 'Node', 'Web Dev', 'UI', 'D', 'lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.', '2022-09-30 00:37:13', '2022-09-30 00:37:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoices`
--

CREATE TABLE `tbl_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `client_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `total` bigint(20) DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_invoices`
--

INSERT INTO `tbl_invoices` (`id`, `invoice_id`, `client_id`, `project_id`, `email`, `tax_id`, `client_address`, `billing_address`, `invoice_date`, `expiry_date`, `total`, `tax`, `discount`, `grand_total`, `other_info`, `status`, `created_at`, `updated_at`) VALUES
(1, '#INV-0809461', 2, 1, 'rony@gmail.com', 2, 'Solo', 'Semarang', '2022-09-30', '2022-11-18', 7000000, '10', '10', 6930000, 'Komputer', 'Accepted', '2022-09-30 01:01:46', '2022-09-30 01:01:46'),
(3, '#INV-0809241', 2, 1, 'rony@gmail.com', 1, 'Solo', 'SALATIGA', '2022-09-30', '2022-10-21', 810000, '20', '10', 874800, 'FGHJK', 'Declined', '2022-09-30 01:38:24', '2022-09-30 01:38:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_izins`
--

CREATE TABLE `tbl_izins` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendance_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_leaves`
--

CREATE TABLE `tbl_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_leaves`
--

INSERT INTO `tbl_leaves` (`id`, `name`, `leave_type`, `from_date`, `to_date`, `days`, `leave_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Loss of Pay', '2022-09-30', '2022-10-04', '5', NULL, 'Declined', '2022-09-30 01:15:11', '2022-09-30 01:30:26'),
(2, 'superadmin', 'Medical Leave', '2022-09-28', '2022-10-06', '9', 'sakit', 'Approved', '2022-09-30 01:15:39', '2022-09-30 01:16:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_leave_settings`
--

CREATE TABLE `tbl_leave_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carry_f` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_forward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earned_l` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_managejobs`
--

CREATE TABLE `tbl_managejobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_vacancies` int(11) NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `salary_from` int(11) NOT NULL,
  `salary_to` int(11) NOT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_managejobs`
--

INSERT INTO `tbl_managejobs` (`id`, `job_title`, `departmen`, `candidate`, `job_location`, `no_vacancies`, `experience`, `age`, `salary_from`, `salary_to`, `job_type`, `status`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Node Js', 'Direksi', 'Syakira Putri', 'Semarang', 9, '12', 23, 90000, 100000, 'Full Time', 'Open', '2022-09-30', '2022-09-30', 'merupakan jobs dari nodejs', '2022-09-30 00:35:49', '2022-09-30 00:35:49'),
(2, 'Node Js', 'Direksi', 'Syakira Putri', 'Salatiga', 9, '1', 23, 90000, 10000, 'Full Time', 'Open', '2022-09-30', '2022-09-30', 'text', '2022-09-30 01:48:59', '2022-09-30 01:48:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_overtimes`
--

CREATE TABLE `tbl_overtimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ot_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ot_hours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_overtimes`
--

INSERT INTO `tbl_overtimes` (`id`, `employee_id`, `ot_date`, `ot_hours`, `description`, `status`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-09-30', '6', 'produksi', 1, 'admin', '2022-09-30 01:32:40', '2022-09-30 01:32:40'),
(2, 2, '2022-09-30', '6', 'produksi', 1, 'admin', '2022-09-30 01:32:41', '2022-09-30 01:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payrolltypeaditions`
--

CREATE TABLE `tbl_payrolltypeaditions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_payrolltypeaditions`
--

INSERT INTO `tbl_payrolltypeaditions` (`id`, `name`, `category`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Typically', 'Monthly remuneration', '3000000', '2022-09-30 00:42:29', '2022-09-30 00:42:29'),
(2, 'Multi', 'Additional remuneration', '4500000', '2022-09-30 00:43:02', '2022-09-30 00:43:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payrolltypedeductions`
--

CREATE TABLE `tbl_payrolltypedeductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_payrolltypedeductions`
--

INSERT INTO `tbl_payrolltypedeductions` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Sukarela', '200000', '2022-09-30 00:45:30', '2022-09-30 00:45:30'),
(2, 'federal', '350000', '2022-09-30 00:46:00', '2022-09-30 00:46:00'),
(3, 'diambil', '150000', '2022-09-30 00:46:31', '2022-09-30 00:46:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payrolltypeovertimes`
--

CREATE TABLE `tbl_payrolltypeovertimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_payrolltypeovertimes`
--

INSERT INTO `tbl_payrolltypeovertimes` (`id`, `name`, `rate_type`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'Law', 'Daily Rate', '3', '2022-09-30 00:43:41', '2022-09-30 00:43:41'),
(2, 'Tingkat Premi', 'Daily Rate', '4', '2022-09-30 00:44:22', '2022-09-30 00:44:22'),
(3, 'bisnis', 'Daily Rate', '2', '2022-09-30 00:44:53', '2022-09-30 00:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payrolltypes`
--

CREATE TABLE `tbl_payrolltypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_o` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtype_o` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_o` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_performapps`
--

CREATE TABLE `tbl_performapps` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marketing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `efficiency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `integrity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professionalism` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `critical_thingking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conflict_manage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ability_deadline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_performapps`
--

INSERT INTO `tbl_performapps` (`id`, `employee_id`, `date`, `status`, `cust_experience`, `marketing`, `management`, `administration`, `present_skill`, `quality_work`, `efficiency`, `integrity`, `professionalism`, `team_work`, `critical_thingking`, `conflict_manage`, `attendance`, `ability_deadline`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-09-30', 'Active', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2022-09-30 00:19:24', '2022-09-30 00:19:24'),
(3, 3, '2022-09-30', 'Active', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2022-09-30 00:19:32', '2022-09-30 00:19:32'),
(4, 3, '2022-09-30', 'Inactive', 'Intermediate', 'Advanced', 'Beginner', 'None', 'None', 'None', 'None', 'Intermediate', 'Beginner', 'Beginner', 'None', 'None', 'None', 'None', '2022-09-30 01:45:08', '2022-09-30 01:45:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_performindis`
--

CREATE TABLE `tbl_performindis` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `integrity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marketing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professionalism` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `critical_thinking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conflict_management` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `efficiency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abblity_deadline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_performindis`
--

INSERT INTO `tbl_performindis` (`id`, `designation_id`, `added_by`, `cust_experience`, `integrity`, `marketing`, `professionalism`, `management`, `team_work`, `administration`, `critical_thinking`, `present_skill`, `conflict_management`, `quality_work`, `attendance`, `efficiency`, `abblity_deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'superadmin', 'Intermediate', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'Inactive', '2022-09-30 00:19:57', '2022-09-30 00:19:57'),
(2, 1, 'superadmin', 'None', 'Intermediate', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'Active', '2022-09-30 00:20:08', '2022-09-30 01:46:05'),
(3, 3, 'admin', 'Intermediate', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'Active', '2022-09-30 01:45:53', '2022-09-30 01:45:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_policies`
--

CREATE TABLE `tbl_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `pol_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `lead_project` int(10) UNSIGNED DEFAULT NULL,
  `rate` bigint(20) NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `project_name`, `client_id`, `start_date`, `end_date`, `lead_project`, `rate`, `priority`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Website Company', 1, '2022-09-30', '2022-10-14', 1, 80000, 'High', '<p>lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.</p>', 'uploads/projects/1664523488_worker1.jpg', '2022-09-30 00:38:08', '2022-09-30 00:38:08'),
(2, 'Website E-commerce', 2, '2022-10-21', '2022-12-02', 2, 900000, 'High', '<p>lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.</p>', 'uploads/projects/1664523536_worker2.jpg', '2022-09-30 00:38:56', '2022-09-30 00:38:56'),
(3, 'Mobile App', 3, '2022-09-30', '2023-04-14', 3, 1000000, 'High', '<p>lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.lifetime goals. When people talk about “too many goals” they are really only talking about the last two. Long term goals and lifetime goals.</p>', 'uploads/projects/1664523593_worker1.jpg', '2022-09-30 00:39:53', '2022-09-30 00:39:53'),
(4, 'Mobile App', 2, '2022-09-30', '2022-09-30', 3, 8000, 'Medium', '<p>ASDFGHJK</p>', 'uploads/projects/1664526968_worker1.jpg', '2022-09-30 01:36:08', '2022-09-30 01:36:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_project_users`
--

CREATE TABLE `tbl_project_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_project` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_promotions`
--

CREATE TABLE `tbl_promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prom_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prom_designation_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prom_designation_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prom_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_provident_funds`
--

CREATE TABLE `tbl_provident_funds` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_name` int(10) UNSIGNED DEFAULT NULL,
  `provident_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_share_amount` bigint(20) NOT NULL,
  `organization_share_amount` bigint(20) NOT NULL,
  `employee_share` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_share` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_provident_funds`
--

INSERT INTO `tbl_provident_funds` (`id`, `employee_name`, `provident_type`, `employee_share_amount`, `organization_share_amount`, `employee_share`, `organization_share`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fixed Amount', 2000000, 100000, '2000000', '100000', 'Harian', '2022-09-30 01:04:31', '2022-09-30 01:04:46'),
(2, 3, 'Percentage of Basic Salary', 9000, 9000, '7000', '8000', 'ertyuio', '2022-09-30 01:39:59', '2022-09-30 01:39:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_resignations`
--

CREATE TABLE `tbl_resignations` (
  `id` int(10) UNSIGNED NOT NULL,
  `resig_employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_date` date NOT NULL,
  `resig_date` date NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_resignations`
--

INSERT INTO `tbl_resignations` (`id`, `resig_employee`, `not_date`, `resig_date`, `reason`, `created_at`, `updated_at`) VALUES
(1, 'Vania putri', '2022-09-14', '2022-09-30', 'mengundurkan diri dengan alasan kenyamanan', '2022-09-30 00:30:26', '2022-09-30 00:30:26'),
(2, 'Vania putri', '2022-09-30', '2022-09-30', 'text', '2022-09-30 01:43:50', '2022-09-30 01:43:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_revenues`
--

CREATE TABLE `tbl_revenues` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenue_date` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_revenues`
--

INSERT INTO `tbl_revenues` (`id`, `note`, `revenue_date`, `amount`, `category_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'revenues 2012', '2012-01-31', 900000, 1, 'uploads/revenues/1664519495_Screenshot (7).png', '2022-09-29 23:31:35', '2022-09-29 23:31:35'),
(2, 'revenues 2013', '2013-01-31', 800000, 1, 'uploads/revenues/1664519520_Screenshot (2).png', '2022-09-29 23:32:00', '2022-09-29 23:32:00'),
(3, 'revenues 2014', '2014-01-31', 500000, 1, 'uploads/revenues/1664519545_Screenshot (7).png', '2022-09-29 23:32:25', '2022-09-29 23:32:25'),
(4, 'revenues 2015', '2015-01-31', 700000, 1, 'uploads/revenues/1664519571_Screenshot (1).png', '2022-09-29 23:32:51', '2022-09-29 23:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_salaries`
--

CREATE TABLE `tbl_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `for_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_salary` double NOT NULL DEFAULT 0,
  `basic` double NOT NULL DEFAULT 0,
  `da` double NOT NULL DEFAULT 0,
  `hra` double NOT NULL DEFAULT 0,
  `conveyance` double NOT NULL DEFAULT 0,
  `allowance` double NOT NULL DEFAULT 0,
  `medical_allowance` double NOT NULL DEFAULT 0,
  `other_earnings` double NOT NULL DEFAULT 0,
  `tds` double NOT NULL DEFAULT 0,
  `esi` double NOT NULL DEFAULT 0,
  `pf` double NOT NULL DEFAULT 0,
  `leave` double NOT NULL DEFAULT 0,
  `prof_tax` double NOT NULL DEFAULT 0,
  `labour_welfare` double NOT NULL DEFAULT 0,
  `other_deduction` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_salaries`
--

INSERT INTO `tbl_salaries` (`id`, `employee_id`, `for_month`, `id_salary`, `net_salary`, `basic`, `da`, `hra`, `conveyance`, `allowance`, `medical_allowance`, `other_earnings`, `tds`, `esi`, `pf`, `leave`, `prof_tax`, `labour_welfare`, `other_deduction`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2022-08-25', '#0000', 4582000, 5000000, 40000, 5000, 3000, 7000, 50000, 1000, 90000, 70000, 45000, 300000, 10000, 4000, 5000, '2022-09-30 00:48:18', '2022-09-30 00:48:18', NULL),
(2, 3, '2022-09-30', '#0001', 3993000, 4000000, 300000, 40000, 20000, 70000, 42000, 1000, 60000, 200000, 60000, 50000, 20000, 15000, 75000, '2022-09-30 00:49:40', '2022-09-30 00:49:40', NULL),
(3, 4, '2022-09-30', '#0002', 2881000, 3000000, 30000, 75000, 80000, 30000, 21000, 75000, 43000, 55000, 37000, 76000, 82000, 65000, 72000, '2022-09-30 00:51:02', '2022-09-30 00:51:02', NULL),
(4, 3, '2022-07-21', '#0003', 6930000, 7000000, 62000, 84000, 38000, 32000, 62000, 72000, 82000, 82000, 19000, 61000, 71000, 53000, 52000, '2022-09-30 00:53:17', '2022-09-30 00:53:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sales_expenses`
--

CREATE TABLE `tbl_sales_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_by` int(10) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `paid_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_sales_expenses`
--

INSERT INTO `tbl_sales_expenses` (`id`, `item`, `purchase_from`, `purchase_date`, `purchase_by`, `amount`, `paid_by`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Laptop`', 'Semarang', '2022-09-30', 3, 2000000, 'Cash', 'Approved', 'worker1.jpg', '2022-09-30 01:03:50', '2022-09-30 01:03:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_schedulings`
--

CREATE TABLE `tbl_schedulings` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `min_star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `break_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat_every` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_extra_h` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `publis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_schedulings`
--

INSERT INTO `tbl_schedulings` (`id`, `department_id`, `employee_id`, `date`, `shift_id`, `min_star_t`, `star_t`, `max_star_t`, `min_end_t`, `end_t`, `max_end_t`, `break_t`, `repeat_every`, `end_on`, `acc_extra_h`, `publis`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2022-10-06', 1, '14:15', '14:15', '14:15', '14:15', '14:15', '14:15', '50', NULL, NULL, '0', '0', '2022-09-30 00:15:43', '2022-09-30 00:15:43'),
(3, 1, 2, '2022-10-03', 2, '14:16', '14:16', '14:16', '14:16', '14:16', '14:16', '45', NULL, NULL, '0', '0', '2022-09-30 00:16:27', '2022-09-30 00:16:27'),
(4, 1, 2, '2022-10-08', 2, '14:16', '14:16', '14:16', '14:16', '14:16', '14:17', '45', NULL, NULL, '0', '0', '2022-09-30 00:17:10', '2022-09-30 00:17:10'),
(5, 1, 2, '2022-09-30', NULL, '14:17', '14:17', '14:17', '14:17', '14:17', '14:17', '30', NULL, NULL, '0', '0', '2022-09-30 00:17:41', '2022-09-30 00:17:41'),
(7, 2, 4, '2022-10-04', 2, '15:31', '15:31', '15:31', '15:31', '15:31', '15:31', '30', NULL, NULL, '0', '0', '2022-09-30 01:32:08', '2022-09-30 01:32:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shifts`
--

CREATE TABLE `tbl_shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_star_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_end_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `break_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat_every` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_shifts`
--

INSERT INTO `tbl_shifts` (`id`, `name`, `min_star_t`, `star_t`, `max_star_t`, `min_end_t`, `end_t`, `max_end_t`, `break_t`, `repeat_every`, `end_on`, `add_tag`, `add_note`, `created_at`, `updated_at`) VALUES
(1, 'shift pagi', '14:12', '14:12', '14:12', '14:12', '14:12', '14:12', '40', '3', '2022-10-04', NULL, NULL, '2022-09-30 00:13:16', '2022-09-30 00:13:16'),
(2, 'shift sore', '14:13', '14:13', '14:13', '14:13', '14:13', '14:13', '55', '6', '2022-10-06', NULL, NULL, '2022-09-30 00:13:58', '2022-09-30 00:13:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_taskboards`
--

CREATE TABLE `tbl_taskboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_taxes`
--

CREATE TABLE `tbl_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_percentage` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_taxes`
--

INSERT INTO `tbl_taxes` (`id`, `tax_name`, `tax_percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VGT', 20, 'Active', '2022-09-30 00:54:42', '2022-09-30 00:54:42'),
(2, 'TAX', 10, 'Inactive', '2022-09-30 00:54:52', '2022-09-30 00:54:52'),
(3, 'NAN', 15, 'Active', '2022-09-30 00:55:10', '2022-09-30 00:55:10'),
(4, 'Tax', 90, 'Active', '2022-09-30 01:40:18', '2022-09-30 01:40:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_terminations`
--

CREATE TABLE `tbl_terminations` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_date` date NOT NULL,
  `departement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_terminations`
--

INSERT INTO `tbl_terminations` (`id`, `term_employee`, `term_type`, `term_date`, `departement`, `reason`, `not_date`, `created_at`, `updated_at`) VALUES
(1, 'Joko Samuel', 'Misconduct', '2022-09-30', 'Direksi', 'Dikeluarkan dengan alasan ketertib an', '2022-09-30', '2022-09-30 00:31:11', '2022-09-30 00:31:11'),
(2, 'Vania', 'Misconduct', '2022-09-30', 'Direksi', 'text', '2022-09-30', '2022-09-30 01:44:19', '2022-09-30 01:44:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_staff` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_followers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_timesheets`
--

CREATE TABLE `tbl_timesheets` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_timesheets`
--

INSERT INTO `tbl_timesheets` (`id`, `project_id`, `date`, `hours`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-09-30', '30', 'Website E-commerce', '2022-09-30 01:18:06', '2022-09-30 01:18:06'),
(2, 1, '2022-10-03', '6', 'Website Company', '2022-09-30 01:18:40', '2022-09-30 01:18:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trainers`
--

CREATE TABLE `tbl_trainers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_trainers`
--

INSERT INTO `tbl_trainers` (`id`, `fname`, `lname`, `role`, `contact`, `email`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Joko', 'Saputro', 'Web Designer', 8654327985, 'joko@gmail.com', 'saya masih hidup', 'Active', '2022-09-30 00:28:31', '2022-09-30 00:28:31'),
(2, 'Vania', 'azz', 'Web Designer', 84345678, 'Vaniqaq@gmail.com', 'text', 'Active', '2022-09-30 01:43:00', '2022-09-30 01:43:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trainings`
--

CREATE TABLE `tbl_trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` bigint(20) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_trainings`
--

INSERT INTO `tbl_trainings` (`id`, `training_type`, `trainer`, `employee`, `start_date`, `end_date`, `description`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Node', 'Joko Saputro', 'ayu febi', '2022-09-30', '2022-09-30', 'training baru berada yang menjadi trainer Node', 80, 'Active', '2022-09-30 00:29:17', '2022-09-30 00:29:17'),
(2, 'Node Js', 'Joko Saputro', 'Vania putri', '2022-09-30', '2022-09-30', 'text', 80, 'Inactive', '2022-09-30 01:43:26', '2022-09-30 01:43:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trainingtypes`
--

CREATE TABLE `tbl_trainingtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_trainingtypes`
--

INSERT INTO `tbl_trainingtypes` (`id`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Node Js', 'mempunyai basic node js', 'Active', '2022-09-30 00:26:21', '2022-09-30 01:42:24'),
(2, 'Web Developer', 'memiliki kemampuan web developer', 'Inactive', '2022-09-30 00:26:49', '2022-09-30 00:26:49'),
(3, 'UI', 'text', 'Active', '2022-09-30 01:42:12', '2022-09-30 01:42:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'superadmin', 'superadmin@app.com', '$2y$10$jFxJi8JcZMzgwER0YyFk4es5/Gmmg6ZOHXYvgVVsZ7tuWYuTE4nPi', 'Admin', 'DbhGAvXcVLooy0MaWvsRx47qN8vA2IGAPJcLnhw3qOfBxGiHNRdYNRbMXSLI', '2022-09-29 23:25:30', '2022-09-29 23:25:30'),
(2, 1, 'ayu', 'employee@app.com', '$2y$10$FQsk9JaTjGWhzhS4kxC9su9xzgLvxjU8aM52KFBW3EaJcS3cX1m4S', 'Employee', NULL, '2022-09-29 23:59:26', '2022-09-29 23:59:26'),
(3, 2, 'satriaya', 'yudasatria76@gmail.com', '$2y$10$9imK7.ixhuUI0tUyEbdTrO6Vr0RtuyREewrqtHSOk.IeohhH/VU4G', 'Employee', NULL, '2022-09-30 00:00:13', '2022-09-30 00:00:13'),
(4, 3, 'baba', 'putrimelani76@gmail.com', '$2y$10$3b/TvKZ1xXPUwn3ph9C4DuJc3d/s3iaYVSAm/PC8MkDiyxz4koWMC', 'Employee', NULL, '2022-09-30 00:01:18', '2022-09-30 00:01:18'),
(5, 4, 'vanmuel', 'jovasamu01@gmail.com', '$2y$10$YDS5bXpEPJO71ZRHcYT03eCWV3JoPbPeOeoWd9X9xXBv0pFLqLnpO', 'Employee', NULL, '2022-09-30 00:01:52', '2022-09-30 00:01:52'),
(6, 0, 'admin', 'admin@app.com', '$2y$10$0oa/VIo9zy84qwOI.m/VQupr0tD4QeGOtRyb/8j6QRxp8FYObn9Z2', 'Admin', NULL, '2022-09-30 01:28:55', '2022-09-30 01:28:55');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_assets_asset_user_foreign` (`asset_user`);

--
-- Indeks untuk tabel `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_budgets`
--
ALTER TABLE `tbl_budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_clients_email_unique` (`email`);

--
-- Indeks untuk tabel `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_designations`
--
ALTER TABLE `tbl_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_detail_estimates`
--
ALTER TABLE `tbl_detail_estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_detail_invoices`
--
ALTER TABLE `tbl_detail_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_estimates`
--
ALTER TABLE `tbl_estimates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_estimates_client_id_foreign` (`client_id`),
  ADD KEY `tbl_estimates_project_id_foreign` (`project_id`),
  ADD KEY `tbl_estimates_tax_id_foreign` (`tax_id`);

--
-- Indeks untuk tabel `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_expenses_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `tbl_experiences`
--
ALTER TABLE `tbl_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_goals`
--
ALTER TABLE `tbl_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_goaltypes`
--
ALTER TABLE `tbl_goaltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_interquests`
--
ALTER TABLE `tbl_interquests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_invoices_client_id_foreign` (`client_id`),
  ADD KEY `tbl_invoices_project_id_foreign` (`project_id`),
  ADD KEY `tbl_invoices_tax_id_foreign` (`tax_id`);

--
-- Indeks untuk tabel `tbl_izins`
--
ALTER TABLE `tbl_izins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_leave_settings`
--
ALTER TABLE `tbl_leave_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_managejobs`
--
ALTER TABLE `tbl_managejobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_overtimes`
--
ALTER TABLE `tbl_overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payrolltypeaditions`
--
ALTER TABLE `tbl_payrolltypeaditions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payrolltypedeductions`
--
ALTER TABLE `tbl_payrolltypedeductions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payrolltypeovertimes`
--
ALTER TABLE `tbl_payrolltypeovertimes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payrolltypes`
--
ALTER TABLE `tbl_payrolltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_performapps`
--
ALTER TABLE `tbl_performapps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_performindis`
--
ALTER TABLE `tbl_performindis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_policies`
--
ALTER TABLE `tbl_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_projects_client_id_foreign` (`client_id`),
  ADD KEY `tbl_projects_lead_project_foreign` (`lead_project`);

--
-- Indeks untuk tabel `tbl_project_users`
--
ALTER TABLE `tbl_project_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_project_users_id_user_foreign` (`id_user`),
  ADD KEY `tbl_project_users_id_project_foreign` (`id_project`);

--
-- Indeks untuk tabel `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_provident_funds`
--
ALTER TABLE `tbl_provident_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_provident_funds_employee_name_foreign` (`employee_name`);

--
-- Indeks untuk tabel `tbl_resignations`
--
ALTER TABLE `tbl_resignations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_revenues`
--
ALTER TABLE `tbl_revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_revenues_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `tbl_salaries`
--
ALTER TABLE `tbl_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sales_expenses`
--
ALTER TABLE `tbl_sales_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sales_expenses_purchase_by_foreign` (`purchase_by`);

--
-- Indeks untuk tabel `tbl_schedulings`
--
ALTER TABLE `tbl_schedulings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_taskboards`
--
ALTER TABLE `tbl_taskboards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_taxes`
--
ALTER TABLE `tbl_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_terminations`
--
ALTER TABLE `tbl_terminations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_timesheets`
--
ALTER TABLE `tbl_timesheets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_trainings`
--
ALTER TABLE `tbl_trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_trainingtypes`
--
ALTER TABLE `tbl_trainingtypes`
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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_budgets`
--
ALTER TABLE `tbl_budgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_designations`
--
ALTER TABLE `tbl_designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_estimates`
--
ALTER TABLE `tbl_detail_estimates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_invoices`
--
ALTER TABLE `tbl_detail_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_estimates`
--
ALTER TABLE `tbl_estimates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_experiences`
--
ALTER TABLE `tbl_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_goals`
--
ALTER TABLE `tbl_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_goaltypes`
--
ALTER TABLE `tbl_goaltypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_interquests`
--
ALTER TABLE `tbl_interquests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_izins`
--
ALTER TABLE `tbl_izins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_leave_settings`
--
ALTER TABLE `tbl_leave_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_managejobs`
--
ALTER TABLE `tbl_managejobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_overtimes`
--
ALTER TABLE `tbl_overtimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_payrolltypeaditions`
--
ALTER TABLE `tbl_payrolltypeaditions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_payrolltypedeductions`
--
ALTER TABLE `tbl_payrolltypedeductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_payrolltypeovertimes`
--
ALTER TABLE `tbl_payrolltypeovertimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_payrolltypes`
--
ALTER TABLE `tbl_payrolltypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_performapps`
--
ALTER TABLE `tbl_performapps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_performindis`
--
ALTER TABLE `tbl_performindis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_policies`
--
ALTER TABLE `tbl_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_project_users`
--
ALTER TABLE `tbl_project_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_provident_funds`
--
ALTER TABLE `tbl_provident_funds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_resignations`
--
ALTER TABLE `tbl_resignations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_revenues`
--
ALTER TABLE `tbl_revenues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_salaries`
--
ALTER TABLE `tbl_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_sales_expenses`
--
ALTER TABLE `tbl_sales_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_schedulings`
--
ALTER TABLE `tbl_schedulings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_taskboards`
--
ALTER TABLE `tbl_taskboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_taxes`
--
ALTER TABLE `tbl_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_terminations`
--
ALTER TABLE `tbl_terminations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_timesheets`
--
ALTER TABLE `tbl_timesheets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_trainings`
--
ALTER TABLE `tbl_trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_trainingtypes`
--
ALTER TABLE `tbl_trainingtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  ADD CONSTRAINT `tbl_assets_asset_user_foreign` FOREIGN KEY (`asset_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_estimates`
--
ALTER TABLE `tbl_estimates`
  ADD CONSTRAINT `tbl_estimates_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `tbl_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_estimates_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `tbl_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_estimates_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tbl_taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD CONSTRAINT `tbl_expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD CONSTRAINT `tbl_invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `tbl_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_invoices_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `tbl_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_invoices_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tbl_taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `tbl_projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `tbl_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_projects_lead_project_foreign` FOREIGN KEY (`lead_project`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_project_users`
--
ALTER TABLE `tbl_project_users`
  ADD CONSTRAINT `tbl_project_users_id_project_foreign` FOREIGN KEY (`id_project`) REFERENCES `tbl_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_project_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_provident_funds`
--
ALTER TABLE `tbl_provident_funds`
  ADD CONSTRAINT `tbl_provident_funds_employee_name_foreign` FOREIGN KEY (`employee_name`) REFERENCES `tbl_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_revenues`
--
ALTER TABLE `tbl_revenues`
  ADD CONSTRAINT `tbl_revenues_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sales_expenses`
--
ALTER TABLE `tbl_sales_expenses`
  ADD CONSTRAINT `tbl_sales_expenses_purchase_by_foreign` FOREIGN KEY (`purchase_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
