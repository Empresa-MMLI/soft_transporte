-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/05/2022 às 15:53
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sla_mmli`
--
CREATE DATABASE IF NOT EXISTS `db_sla_mmli` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sla_mmli`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bilhetes`
--

DROP TABLE IF EXISTS `bilhetes`;
CREATE TABLE IF NOT EXISTS `bilhetes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `n_bilhete` varchar(172) DEFAULT NULL,
  `viagem_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `total_passageiro` tinyint(4) NOT NULL,
  `forma_pagto` varchar(30) NOT NULL DEFAULT 'PD',
  `comprovativo_file` varchar(255) DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'0',
  `data_compra` date NOT NULL,
  `created_at` timestamp(1) NOT NULL DEFAULT current_timestamp(1),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `viagem_id` (`viagem_id`,`cliente_id`,`data_compra`),
  UNIQUE KEY `n_bilhete` (`n_bilhete`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `bilhetes`
--

INSERT INTO `bilhetes` (`id`, `n_bilhete`, `viagem_id`, `cliente_id`, `total_passageiro`, `forma_pagto`, `comprovativo_file`, `estado`, `data_compra`, `created_at`, `updated_at`) VALUES
(35, '1234567LA091211', 5, 2, 2, 'ATM', 'Comprovativos/13-May-2022/abast_627e73b279fdd.png', b'1', '2022-05-13', '2022-05-13 14:05:22.0', '2022-05-17 11:57:07'),
(36, '1234567LA0912s', 5, 3, 1, 'REF', 'Comprovativos/16-May-2022/abast_6282190f2a6e0.png', b'1', '2022-05-16', '2022-05-16 08:27:43.0', '2022-05-17 11:57:48'),
(39, '0014567LA0912d', 3, 3, 1, 'ATM', 'Comprovativos/16-May-2022/abast_62821c4a6cee0.jpg', b'1', '2022-05-16', '2022-05-16 08:41:30.0', '2022-05-17 11:46:05'),
(47, '1234567LA0912a', 5, 3, 2, 'PD', NULL, b'1', '2022-05-17', '2022-05-17 10:42:35.0', '2022-05-17 18:09:55'),
(48, '1234567LA0912aaa', 6, 3, 1, 'ATM', 'Comprovativos/19-May-2022/abast_62860dcd9fce6.png', b'1', '2022-05-19', '2022-05-19 08:28:45.0', '2022-05-20 13:07:07'),
(49, 'dfg', 6, 5, 1, 'ATM', 'Comprovativos/19-May-2022/abast_62860dfe17c59.png', b'1', '2022-05-19', '2022-05-19 08:29:34.0', '2022-05-20 13:09:01'),
(57, 'sdf', 5, 3, 2, 'PD', NULL, b'1', '2022-05-18', '2022-05-20 12:22:59.0', '2022-05-20 13:14:36'),
(60, '1234567LA09124SLA202200', 6, 5, 1, 'PD', NULL, b'1', '2022-05-20', '2022-05-20 12:37:43.0', '2022-05-25 09:04:36'),
(61, '1234567LA0912sss', 7, 5, 1, 'ATM', 'Comprovativos/24-May-2022/abast_628cc4c8c6613.png', b'1', '2022-05-20', '2022-05-24 10:43:06.0', '2022-05-24 10:43:45'),
(62, '1234567LA09124SLA', 7, 5, 1, 'ATM', 'Comprovativos/24-May-2022/abast_628ccb39077e7.png', b'1', '2022-05-24', '2022-05-24 11:10:33.0', '2022-05-24 11:15:27'),
(63, NULL, 7, 5, 1, 'REF', NULL, b'0', '2022-05-25', '2022-05-25 06:38:55.0', '2022-05-25 06:38:55'),
(66, '1234567LA0912SLA2022', 5, 3, 2, 'PD', NULL, b'1', '2022-05-24', '2022-05-25 08:07:55.0', '2022-05-25 08:12:57');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `bilhete_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `bilhete_detalhes`;
CREATE TABLE IF NOT EXISTS `bilhete_detalhes` (
`id` bigint(20)
,`n_bilhete` varchar(172)
,`total_passageiro` tinyint(4)
,`forma_pagto` varchar(30)
,`comprovativo_file` varchar(255)
,`estado` bit(1)
,`data_compra` date
,`id_viagem` bigint(20)
,`rota_origem` varchar(255)
,`rota_destino` varchar(255)
,`ponto_e` varchar(150)
,`ponto_d` varchar(150)
,`kilometros` varchar(255)
,`preco` double
,`classe` varchar(255)
,`data_partida` timestamp
,`data_chegada` timestamp
,`id_cliente` bigint(20)
,`cliente` varchar(255)
,`telefone` varchar(255)
,`tipo_doc` varchar(100)
,`n_doc` varchar(150)
,`id_usuario` bigint(20) unsigned
,`created_at` timestamp(1)
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bi_reservados`
--

DROP TABLE IF EXISTS `bi_reservados`;
CREATE TABLE IF NOT EXISTS `bi_reservados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `viagem_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `total_passageiro` tinyint(4) NOT NULL,
  `forma_pagto` varchar(30) NOT NULL DEFAULT 'PD',
  `estado` bit(1) NOT NULL DEFAULT b'0',
  `data_compra` date NOT NULL,
  `created_at` timestamp(1) NOT NULL DEFAULT current_timestamp(1),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `viagem_id` (`viagem_id`,`cliente_id`,`data_compra`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `bi_reservados`
--

INSERT INTO `bi_reservados` (`id`, `viagem_id`, `cliente_id`, `total_passageiro`, `forma_pagto`, `estado`, `data_compra`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 'PD', b'1', '2022-05-24', '2022-05-17 10:31:57.0', '2022-05-25 08:07:55'),
(2, 6, 5, 1, 'PD', b'1', '2022-05-20', '2022-05-20 12:14:12.0', '2022-05-20 12:37:43'),
(3, 7, 5, 1, 'PD', b'1', '2022-05-24', '2022-05-25 07:54:06.0', '2022-05-25 08:04:08');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `bi_reservado_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `bi_reservado_detalhes`;
CREATE TABLE IF NOT EXISTS `bi_reservado_detalhes` (
`id` bigint(20)
,`total_passageiro` tinyint(4)
,`forma_pagto` varchar(30)
,`estado` bit(1)
,`data_compra` date
,`id_viagem` bigint(20)
,`rota_origem` varchar(255)
,`rota_destino` varchar(255)
,`ponto_e` varchar(150)
,`ponto_d` varchar(150)
,`kilometros` varchar(255)
,`preco` double
,`classe` varchar(255)
,`data_partida` timestamp
,`data_chegada` timestamp
,`id_cliente` bigint(20)
,`cliente` varchar(255)
,`telefone` varchar(255)
,`tipo_doc` varchar(100)
,`n_doc` varchar(150)
,`id_usuario` bigint(20) unsigned
,`created_at` timestamp(1)
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `classe` (`classe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `classes`
--

INSERT INTO `classes` (`id`, `classe`, `created_at`, `updated_at`) VALUES
(1, 'SEMI-LEITO', '2022-05-09 12:29:57', '2022-05-09 12:29:57'),
(2, 'ECONóMICA', '2022-05-09 12:32:34', '2022-05-09 12:32:34'),
(3, 'EXECUTIVO', '2022-05-09 12:32:47', '2022-05-09 12:32:47'),
(4, 'CONVENCIONAL', '2022-05-09 12:32:56', '2022-05-09 12:32:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(172) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'example@mmlisolucoes.com',
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_doc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BI',
  `n_doc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_doc` (`tipo_doc`,`n_doc`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `tipo_doc`, `n_doc`, `id_usuario`, `created_at`, `updated_at`) VALUES
(2, 'Jorge Costa', 'josekinanga@mmlisolucoes.com', '932843283', 'PP', '00123456789', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(3, 'José Quinanga', 'developerjose2@gmail.com', '932853283', 'BI', '01234567890', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(4, 'Benilson Garcia', 'josekinanga@mmlisolucoes.com', '922884287', 'BI', '012345678910', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(5, 'Sia Pinto', 'josekinanga@mmlisolucoes.com', '942523364', 'BI', '001234LA012', 7, '2022-05-19 08:09:53', '2022-05-19 08:09:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_sede` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `nif`, `telefone`, `email`, `endereco_sede`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'MMLI', '123213123', '932843283', 'example@dominio.com', 'Luanda-Angola', 6, '2022-05-09 01:17:06', '2022-05-09 01:17:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empresa_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `funcionarios_username_unique` (`username`),
  KEY `funcionarios_empresa_id_foreign` (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marca` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'TOYOTA', '2022-04-21 09:12:52', '2022-04-21 09:14:50'),
(2, 'HONDA', '2022-04-21 09:15:31', '2022-04-21 09:15:31'),
(3, 'NISSAN', '2022-04-21 09:16:21', '2022-04-21 09:16:21'),
(4, 'HYUNDAI', '2022-04-21 09:16:49', '2022-04-21 09:16:49'),
(5, 'RENAULT', '2022-04-21 09:17:32', '2022-04-21 09:17:32'),
(6, 'FORD', '2022-04-21 09:18:41', '2022-04-21 09:18:41'),
(7, 'VOLKSWAGEN', '2022-04-21 09:19:35', '2022-04-21 09:19:35'),
(8, 'FIAT', '2022-04-21 09:21:06', '2022-04-21 09:21:06'),
(10, 'CHEVROLET', '2022-04-21 09:25:52', '2022-04-21 09:25:52'),
(11, 'SCANIA', '2022-04-21 09:33:59', '2022-04-21 09:33:59'),
(12, 'Mercedes-Benz', '2022-04-21 09:34:23', '2022-04-21 09:34:23'),
(13, 'IVECO', '2022-04-21 09:34:41', '2022-04-21 09:34:41'),
(14, 'DAF', '2022-04-21 09:35:56', '2022-04-21 09:35:56'),
(15, 'VOLVO', '2022-04-21 09:36:10', '2022-04-21 09:36:10');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `marca_modelos`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `marca_modelos`;
CREATE TABLE IF NOT EXISTS `marca_modelos` (
`id` bigint(20)
,`marca_id` bigint(20)
,`marca` varchar(255)
,`modelo_id` bigint(20)
,`modelo` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2022_05_07_063552_create_provincias_table', 1),
(3, '2022_05_07_063534_create_pontos_desembarque_table', 2),
(7, '2022_05_07_064334_create_marcas_table', 4),
(8, '2022_05_07_064347_create_modelos_table', 5),
(10, '2022_05_07_144032_create_autocarros_table', 7),
(11, '2022_05_07_064557_create_rotas_table', 8),
(12, '2022_05_07_063504_create_pontos_embarque_table', 9),
(13, '2022_05_07_160955_create_classes_table', 10),
(14, '2022_05_07_063439_create_viagens_table', 11),
(15, '2022_05_07_143558_create_funcionarios_table', 12),
(16, '2022_05_07_170213_create_clientes_table', 13),
(17, '2014_10_12_000000_create_users_table', 14),
(18, '2014_10_12_100000_create_password_resets_table', 14),
(19, '2019_08_19_000000_create_failed_jobs_table', 14),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos`
--

DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modelo` (`modelo`),
  KEY `modelos_marca_id_foreign` (`marca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `marca_id`, `created_at`, `updated_at`) VALUES
(1, 'COROLLA', 1, '2022-04-21 09:12:52', '2022-04-21 09:14:50'),
(2, 'HILUX', 1, '2022-04-21 09:14:18', '2022-04-21 09:14:18'),
(3, 'ETIOS', 1, '2022-04-21 09:14:36', '2022-04-21 09:14:36'),
(4, 'FIT', 2, '2022-04-21 09:15:31', '2022-04-21 09:15:31'),
(5, 'CIVIC', 2, '2022-04-21 09:15:44', '2022-04-21 09:15:44'),
(6, 'HR-V', 2, '2022-04-21 09:15:55', '2022-04-21 09:15:55'),
(7, 'MARCH', 3, '2022-04-21 09:16:21', '2022-04-21 09:16:21'),
(8, 'KICKS', 3, '2022-04-21 09:16:32', '2022-04-21 09:16:32'),
(9, 'HB20', 4, '2022-04-21 09:16:50', '2022-04-21 09:16:50'),
(10, '130', 4, '2022-04-21 09:16:58', '2022-04-21 09:16:58'),
(11, 'TUCSON', 4, '2022-04-21 09:17:07', '2022-04-21 09:17:07'),
(12, 'SANDERO', 5, '2022-04-21 09:17:32', '2022-04-21 09:17:32'),
(13, 'LOGAN', 5, '2022-04-21 09:17:45', '2022-04-21 09:17:45'),
(14, 'CLIO', 5, '2022-04-21 09:17:54', '2022-04-21 09:17:54'),
(15, 'DUSTER', 5, '2022-04-21 09:18:04', '2022-04-21 09:18:04'),
(16, 'KWID', 5, '2022-04-21 09:18:14', '2022-04-21 09:18:14'),
(17, 'CAPTUR', 5, '2022-04-21 09:18:28', '2022-04-21 09:18:28'),
(18, 'FOCUS', 6, '2022-04-21 09:18:41', '2022-04-21 09:18:41'),
(19, 'ECOSPORT', 6, '2022-04-21 09:18:50', '2022-04-21 09:18:50'),
(20, 'FIESTA', 6, '2022-04-21 09:19:03', '2022-04-21 09:19:03'),
(21, 'KA', 6, '2022-04-21 09:19:11', '2022-04-21 09:19:11'),
(22, 'FOX', 7, '2022-04-21 09:19:36', '2022-04-21 09:19:36'),
(23, 'GOL', 7, '2022-04-21 09:19:47', '2022-04-21 09:19:47'),
(24, 'UP', 7, '2022-04-21 09:19:57', '2022-04-21 09:19:57'),
(25, 'SAVEIRO', 7, '2022-04-21 09:20:11', '2022-04-21 09:20:11'),
(26, 'FUSCA', 7, '2022-04-21 09:20:30', '2022-04-21 09:20:30'),
(27, 'VOYAGE', 7, '2022-04-21 09:20:53', '2022-04-21 09:20:53'),
(28, 'PUNTO', 8, '2022-04-21 09:21:06', '2022-04-21 09:21:06'),
(29, 'SIENA', 8, '2022-04-21 09:21:16', '2022-04-21 09:21:16'),
(30, 'UNO', 8, '2022-04-21 09:21:23', '2022-04-21 09:21:23'),
(31, 'PALIO', 8, '2022-04-21 09:21:32', '2022-04-21 09:21:32'),
(32, 'MOBI', 8, '2022-04-21 09:21:39', '2022-04-21 09:21:39'),
(34, 'TORO', 8, '2022-04-21 09:21:46', '2022-04-21 09:21:46'),
(35, 'STRADA', 8, '2022-04-21 09:21:58', '2022-04-21 09:21:58'),
(36, 'IDEA', 8, '2022-04-21 09:22:08', '2022-04-21 09:22:08'),
(37, 'PALIO WEEKEND', 8, '2022-04-21 09:22:23', '2022-04-21 09:22:23'),
(44, 'CLASSIC', 10, '2022-04-21 09:25:52', '2022-04-21 09:25:52'),
(45, 'VECTRA', 10, '2022-04-21 09:26:28', '2022-04-21 09:26:28'),
(46, 'COBALT', 10, '2022-04-21 09:27:14', '2022-04-21 09:27:14'),
(47, 'AGILE', 10, '2022-04-21 09:27:31', '2022-04-21 09:27:31'),
(48, 'f4000', 6, '2022-04-21 09:32:43', '2022-04-21 09:32:43'),
(49, 'CARGO 1119', 6, '2022-04-21 09:33:14', '2022-04-21 09:33:14'),
(50, 'Delivery 11.180', 7, '2022-04-21 09:33:45', '2022-04-21 09:33:45'),
(51, 'R450', 11, '2022-04-21 09:33:59', '2022-04-21 09:33:59'),
(52, 'ATEGO 1719', 12, '2022-04-21 09:34:23', '2022-04-21 09:34:23'),
(53, 'TECTOR 11-90', 13, '2022-04-21 09:34:41', '2022-04-21 09:34:41'),
(54, 'XF105', 14, '2022-04-21 09:35:56', '2022-04-21 09:35:56'),
(55, 'FH540', 15, '2022-04-21 09:36:10', '2022-04-21 09:36:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_desembarque`
--

DROP TABLE IF EXISTS `pontos_desembarque`;
CREATE TABLE IF NOT EXISTS `pontos_desembarque` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ponto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pontos_desembarque_provincia_id_foreign` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `pontos_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `pontos_detalhes`;
CREATE TABLE IF NOT EXISTS `pontos_detalhes` (
`id` bigint(20)
,`ponto` varchar(150)
,`tipo_ponto` varchar(20)
,`provincia_id` bigint(20)
,`created_at` timestamp
,`updated_at` timestamp
,`provincia` varchar(255)
,`pais` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_embarque`
--

DROP TABLE IF EXISTS `pontos_embarque`;
CREATE TABLE IF NOT EXISTS `pontos_embarque` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ponto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pontos_embarque_ponto_unique` (`ponto`),
  KEY `pontos_embarque_provincia_id_foreign` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_e_d`
--

DROP TABLE IF EXISTS `pontos_e_d`;
CREATE TABLE IF NOT EXISTS `pontos_e_d` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ponto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ponto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Embarque',
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pontos_embarque_ponto_unique` (`ponto`),
  KEY `pontos_embarque_provincia_id_foreign` (`provincia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pontos_e_d`
--

INSERT INTO `pontos_e_d` (`id`, `ponto`, `tipo_ponto`, `provincia_id`, `created_at`, `updated_at`) VALUES
(3, 'Luanda - Gamek', 'Embarque', 1, '2022-05-09 08:41:38', '2022-05-09 08:41:38'),
(4, 'Bengo - Paragem dos Rastas', 'Desembarque', 3, '2022-05-09 08:42:04', '2022-05-09 08:42:04'),
(5, 'Cuanza Norte - Gabela', 'Embarque', 7, '2022-05-17 12:21:49', '2022-05-17 12:21:49'),
(6, 'Cuanza Sul - Motoqueiros', 'Desembarque', 6, '2022-05-17 12:22:22', '2022-05-17 12:22:22'),
(7, 'Benguela - Lobito', 'Desembarque', 2, '2022-05-24 10:20:09', '2022-05-24 10:20:09'),
(10, 'Benguela - Catumbela', 'Desembarque', 2, '2022-05-24 10:21:07', '2022-05-24 10:21:07'),
(11, 'Benguela - Cabal', 'Desembarque', 2, '2022-05-24 10:21:34', '2022-05-24 10:21:34'),
(12, 'Luanda - Cacuaco', 'Embarque', 1, '2022-05-24 10:22:50', '2022-05-24 10:22:50'),
(13, 'Luanda - Belas', 'Embarque', 1, '2022-05-24 10:23:03', '2022-05-24 10:23:03'),
(14, 'Cunene - Ondjiva', 'Embarque', 8, '2022-05-24 10:29:05', '2022-05-24 10:29:05'),
(15, 'Cunene - Cuanhama', 'Embarque', 8, '2022-05-24 10:29:21', '2022-05-24 10:29:21'),
(16, 'Huambo - Bailundo', 'Desembarque', 4, '2022-05-24 10:30:00', '2022-05-24 10:30:00'),
(17, 'Huambo - Tchicala', 'Desembarque', 4, '2022-05-24 10:30:16', '2022-05-24 10:30:16'),
(18, 'Huambo - Catchiungo', 'Desembarque', 4, '2022-05-24 10:30:33', '2022-05-24 10:30:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `provincias`
--

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE IF NOT EXISTS `provincias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Angola',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provincia` (`provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Luanda', 'Angola', '2022-05-09 07:48:03', '2022-05-09 07:48:03'),
(2, 'Benguela', 'Angola', '2022-05-09 07:53:25', '2022-05-09 07:53:25'),
(3, 'Bengo', 'Angola', '2022-05-09 07:53:31', '2022-05-09 07:53:31'),
(4, 'Huambo', 'Angola', '2022-05-09 07:53:38', '2022-05-09 07:53:38'),
(5, 'Uíge', 'Angola', '2022-05-09 07:53:46', '2022-05-09 07:53:46'),
(6, 'Cuanza Sul', 'Angola', '2022-05-09 07:54:30', '2022-05-09 07:54:30'),
(7, 'Cuanza Norte', 'Angola', '2022-05-09 07:54:43', '2022-05-09 07:54:43'),
(8, 'Cunene', 'Angola', '2022-05-09 14:18:44', '2022-05-09 14:18:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotas`
--

DROP TABLE IF EXISTS `rotas`;
CREATE TABLE IF NOT EXISTS `rotas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `origem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometros` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `rotas`
--

INSERT INTO `rotas` (`id`, `origem`, `destino`, `kilometros`, `preco`, `created_at`, `updated_at`) VALUES
(1, 'Bengo', 'Luanda', '350', 2500, '2022-05-09 12:06:58', '2022-05-09 12:06:58'),
(2, 'Luanda', 'Uíge', '5000', 16500, '2022-05-09 12:08:31', '2022-05-09 12:08:31'),
(3, 'Cuanza Norte', 'Cuanza Sul', '300', 5000, '2022-05-09 14:17:36', '2022-05-09 14:17:36'),
(4, 'Luanda', 'Benguela', '4500', 17000, '2022-05-24 10:14:33', '2022-05-24 10:14:33'),
(5, 'Cunene', 'Huambo', '5300', 3600, '2022-05-24 10:15:28', '2022-05-24 10:15:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tipo_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_tipo_usuario` (`id_tipo_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `id_tipo_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'MMLI - Team', 'mmligeral@mmlisolucoes.com', NULL, '$2y$10$./TF3NAFUCkpgqbaN22F9OtG67tvaHsWcQqYI204MvOSsQ7WSwJ9.', NULL, '2022-05-08 23:29:39', '2022-05-08 23:29:39'),
(5, 3, 'Jorge Costa', 'geral@mmlisolucoes.com', NULL, '$2y$10$CSLoBvg/dJR4tyqs8yGEc.x72nj5iHZJOAicfLpUtJJjg963yrEL.', NULL, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(6, 2, 'MMLI', 'geral22@mmlisolucoes.com', NULL, '$2y$10$em/NVNCFG5KIBIyek.I7o.HjxlPZ/ZZ8zQ6BQY8HBo7lxymi89A3u', NULL, '2022-05-09 01:17:06', '2022-05-09 01:17:06'),
(7, 3, 'Sia Pinto', 'sia@mmlisolucoes.com', NULL, '$2y$10$./TF3NAFUCkpgqbaN22F9OtG67tvaHsWcQqYI204MvOSsQ7WSwJ9.', NULL, '2022-05-19 08:09:53', '2022-05-24 09:01:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(30) NOT NULL DEFAULT 'cliente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `user_roles`
--

INSERT INTO `user_roles` (`id`, `tipo_usuario`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-05-08 23:28:42', '2022-05-08 23:28:42'),
(2, 'operadora', '2022-05-08 23:28:42', '2022-05-08 23:28:42'),
(3, 'cliente', '2022-05-08 23:28:47', '2022-05-08 23:28:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidade` mediumint(9) NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `modelo_id` bigint(20) NOT NULL,
  `empresa_id` bigint(20) NOT NULL,
  `url_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `autocarros_matricula_unique` (`matricula`),
  KEY `autocarros_empresa_id_foreign` (`empresa_id`),
  KEY `autocarros_marca_id_foreign` (`marca_id`),
  KEY `autocarros_modelo_id_foreign` (`modelo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `matricula`, `capacidade`, `marca_id`, `modelo_id`, `empresa_id`, `url_foto`, `created_at`, `updated_at`) VALUES
(1, 'LD-20-12-UI', 42, 1, 1, 1, NULL, NULL, NULL),
(2, 'LD-12-12-HB', 30, 1, 1, 1, NULL, '2022-05-10 10:12:15', '2022-05-10 10:12:15');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `veiculo_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `veiculo_detalhes`;
CREATE TABLE IF NOT EXISTS `veiculo_detalhes` (
`id` bigint(20)
,`matricula` varchar(255)
,`capacidade` mediumint(9)
,`marca_id` bigint(20)
,`marca` varchar(255)
,`modelo_id` bigint(20)
,`modelo` varchar(255)
,`url_foto` varchar(255)
,`empresa_id` bigint(20)
,`nome` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `viagem_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `viagem_detalhes`;
CREATE TABLE IF NOT EXISTS `viagem_detalhes` (
`id` bigint(20)
,`rota_origem` varchar(255)
,`rota_destino` varchar(255)
,`kilometros` varchar(255)
,`preco` double
,`itinerario` text
,`classe` varchar(255)
,`total_passageiro` smallint(6)
,`ponto_e` varchar(150)
,`ponto_d` varchar(150)
,`matricula` varchar(255)
,`marca` varchar(255)
,`modelo` varchar(255)
,`capacidade` mediumint(9)
,`data_partida` timestamp
,`data_chegada` timestamp
,`tempo` time
,`estado` bit(1)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `viagens`
--

DROP TABLE IF EXISTS `viagens`;
CREATE TABLE IF NOT EXISTS `viagens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `itinerario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_partida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_chegada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `embarque_id` bigint(20) NOT NULL,
  `desembarque_id` bigint(20) NOT NULL,
  `veiculo_id` bigint(20) NOT NULL,
  `rota_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `total_passageiro` smallint(6) NOT NULL DEFAULT 42,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `viagens_embarque_id_foreign` (`embarque_id`),
  KEY `viagens_desembarque_id_foreign` (`desembarque_id`),
  KEY `viagens_autocarro_id_foreign` (`veiculo_id`),
  KEY `viagens_rota_id_foreign` (`rota_id`),
  KEY `viagens_classe_id_foreign` (`classe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `viagens`
--

INSERT INTO `viagens` (`id`, `itinerario`, `data_partida`, `data_chegada`, `embarque_id`, `desembarque_id`, `veiculo_id`, `rota_id`, `classe_id`, `total_passageiro`, `estado`, `created_at`, `updated_at`) VALUES
(3, 'kikolo, cacuaco', '2022-05-17 09:41:30', '2022-05-18 10:00:00', 3, 4, 1, 2, 4, 30, b'1', '2022-05-10 04:20:43', '2022-05-16 08:41:30'),
(5, 'Gabela, Negage, Cuando cubango', '2022-05-17 09:27:43', '2022-05-17 18:00:00', 12, 4, 1, 1, 4, 22, b'1', '2022-05-10 09:26:02', '2022-05-17 10:31:57'),
(6, 'KIbabo, Shoprite', '2022-05-17 13:23:02', '2022-05-17 18:00:00', 5, 4, 2, 3, 2, 3, b'1', '2022-05-17 12:23:02', '2022-05-20 12:14:12'),
(7, 'Cacuaco, Icolo e Bengo, Cabal, Caimbambo, Catumbela, Lobito', '2022-05-24 11:24:35', '2022-05-25 08:00:00', 3, 7, 2, 4, 2, 4, b'1', '2022-05-24 10:24:35', '2022-05-25 07:54:07'),
(8, 'Cacuaco, Icolo e Bengo, Cabal, Caimbambo, Catumbela, Lobito', '2022-05-24 11:25:25', '2022-05-25 14:00:00', 12, 10, 1, 4, 4, 0, b'1', '2022-05-24 10:25:25', '2022-05-24 10:25:25'),
(9, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-24 11:31:40', '2022-05-26 11:31:00', 14, 17, 2, 5, 2, 0, b'1', '2022-05-24 10:31:40', '2022-05-24 10:31:40'),
(10, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-24 11:32:17', '2022-05-26 11:32:00', 15, 16, 2, 5, 1, 0, b'1', '2022-05-24 10:32:17', '2022-05-24 10:32:17'),
(11, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-24 11:33:07', '2022-08-26 04:00:00', 14, 18, 1, 5, 3, 0, b'1', '2022-05-24 10:33:07', '2022-05-24 10:33:07');

-- --------------------------------------------------------

--
-- Estrutura para view `bilhete_detalhes`
--
DROP TABLE IF EXISTS `bilhete_detalhes`;

DROP VIEW IF EXISTS `bilhete_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bilhete_detalhes`  AS SELECT `bilhete`.`id` AS `id`, `bilhete`.`n_bilhete` AS `n_bilhete`, `bilhete`.`total_passageiro` AS `total_passageiro`, `bilhete`.`forma_pagto` AS `forma_pagto`, `bilhete`.`comprovativo_file` AS `comprovativo_file`, `bilhete`.`estado` AS `estado`, `bilhete`.`data_compra` AS `data_compra`, `viagem`.`id` AS `id_viagem`, `viagem`.`rota_origem` AS `rota_origem`, `viagem`.`rota_destino` AS `rota_destino`, `viagem`.`ponto_e` AS `ponto_e`, `viagem`.`ponto_d` AS `ponto_d`, `viagem`.`kilometros` AS `kilometros`, `viagem`.`preco` AS `preco`, `viagem`.`classe` AS `classe`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, `cliente`.`id` AS `id_cliente`, `cliente`.`nome` AS `cliente`, `cliente`.`telefone` AS `telefone`, `cliente`.`tipo_doc` AS `tipo_doc`, `cliente`.`n_doc` AS `n_doc`, `cliente`.`id_usuario` AS `id_usuario`, `bilhete`.`created_at` AS `created_at`, `bilhete`.`updated_at` AS `updated_at` FROM ((`bilhetes` `bilhete` join `viagem_detalhes` `viagem` on(`bilhete`.`viagem_id` = `viagem`.`id`)) join `clientes` `cliente` on(`bilhete`.`cliente_id` = `cliente`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `bi_reservado_detalhes`
--
DROP TABLE IF EXISTS `bi_reservado_detalhes`;

DROP VIEW IF EXISTS `bi_reservado_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bi_reservado_detalhes`  AS SELECT `bilhete`.`id` AS `id`, `bilhete`.`total_passageiro` AS `total_passageiro`, `bilhete`.`forma_pagto` AS `forma_pagto`, `bilhete`.`estado` AS `estado`, `bilhete`.`data_compra` AS `data_compra`, `viagem`.`id` AS `id_viagem`, `viagem`.`rota_origem` AS `rota_origem`, `viagem`.`rota_destino` AS `rota_destino`, `viagem`.`ponto_e` AS `ponto_e`, `viagem`.`ponto_d` AS `ponto_d`, `viagem`.`kilometros` AS `kilometros`, `viagem`.`preco` AS `preco`, `viagem`.`classe` AS `classe`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, `cliente`.`id` AS `id_cliente`, `cliente`.`nome` AS `cliente`, `cliente`.`telefone` AS `telefone`, `cliente`.`tipo_doc` AS `tipo_doc`, `cliente`.`n_doc` AS `n_doc`, `cliente`.`id_usuario` AS `id_usuario`, `bilhete`.`created_at` AS `created_at`, `bilhete`.`updated_at` AS `updated_at` FROM ((`bi_reservados` `bilhete` join `viagem_detalhes` `viagem` on(`bilhete`.`viagem_id` = `viagem`.`id`)) join `clientes` `cliente` on(`bilhete`.`cliente_id` = `cliente`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `marca_modelos`
--
DROP TABLE IF EXISTS `marca_modelos`;

DROP VIEW IF EXISTS `marca_modelos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marca_modelos`  AS SELECT `modelo`.`id` AS `id`, `marcas`.`id` AS `marca_id`, `marcas`.`marca` AS `marca`, `modelo`.`id` AS `modelo_id`, `modelo`.`modelo` AS `modelo` FROM (`marcas` join `modelos` `modelo` on(`marcas`.`id` = `modelo`.`marca_id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `pontos_detalhes`
--
DROP TABLE IF EXISTS `pontos_detalhes`;

DROP VIEW IF EXISTS `pontos_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pontos_detalhes`  AS SELECT `pontos`.`id` AS `id`, `pontos`.`ponto` AS `ponto`, `pontos`.`tipo_ponto` AS `tipo_ponto`, `pontos`.`provincia_id` AS `provincia_id`, `pontos`.`created_at` AS `created_at`, `pontos`.`updated_at` AS `updated_at`, `provincia`.`provincia` AS `provincia`, `provincia`.`pais` AS `pais` FROM (`pontos_e_d` `pontos` join `provincias` `provincia` on(`pontos`.`provincia_id` = `provincia`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `veiculo_detalhes`
--
DROP TABLE IF EXISTS `veiculo_detalhes`;

DROP VIEW IF EXISTS `veiculo_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `veiculo_detalhes`  AS SELECT `frota`.`id` AS `id`, `frota`.`matricula` AS `matricula`, `frota`.`capacidade` AS `capacidade`, `frota`.`marca_id` AS `marca_id`, `marca`.`marca` AS `marca`, `frota`.`modelo_id` AS `modelo_id`, `marca`.`modelo` AS `modelo`, `frota`.`url_foto` AS `url_foto`, `frota`.`empresa_id` AS `empresa_id`, `empresa`.`nome` AS `nome` FROM ((`veiculos` `frota` join `marca_modelos` `marca` on(`frota`.`marca_id` = `marca`.`marca_id` and `frota`.`marca_id` = `marca`.`modelo_id`)) join `empresas` `empresa` on(`frota`.`empresa_id` = `empresa`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `viagem_detalhes`
--
DROP TABLE IF EXISTS `viagem_detalhes`;

DROP VIEW IF EXISTS `viagem_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viagem_detalhes`  AS SELECT `viagem`.`id` AS `id`, `rota`.`origem` AS `rota_origem`, `rota`.`destino` AS `rota_destino`, `rota`.`kilometros` AS `kilometros`, `rota`.`preco` AS `preco`, `viagem`.`itinerario` AS `itinerario`, `classes`.`classe` AS `classe`, `viagem`.`total_passageiro` AS `total_passageiro`, `pontos_e`.`ponto` AS `ponto_e`, `pontos_d`.`ponto` AS `ponto_d`, `veiculo`.`matricula` AS `matricula`, `veiculo`.`marca` AS `marca`, `veiculo`.`modelo` AS `modelo`, `veiculo`.`capacidade` AS `capacidade`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, timediff(`viagem`.`data_chegada`,`viagem`.`data_partida`) AS `tempo`, `viagem`.`estado` AS `estado`, `viagem`.`created_at` AS `created_at`, `viagem`.`updated_at` AS `updated_at` FROM (((((`viagens` `viagem` join `pontos_detalhes` `pontos_e` on(`viagem`.`embarque_id` = `pontos_e`.`id`)) join `pontos_detalhes` `pontos_d` on(`viagem`.`desembarque_id` = `pontos_d`.`id`)) join `veiculo_detalhes` `veiculo` on(`viagem`.`veiculo_id` = `veiculo`.`id`)) join `rotas` `rota` on(`rota`.`id` = `viagem`.`rota_id`)) join `classes` on(`viagem`.`classe_id` = `classes`.`id`))  ;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `bilhetes`
--
ALTER TABLE `bilhetes`
  ADD CONSTRAINT `bilhetes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `bilhetes_ibfk_2` FOREIGN KEY (`viagem_id`) REFERENCES `viagens` (`id`);

--
-- Restrições para tabelas `bi_reservados`
--
ALTER TABLE `bi_reservados`
  ADD CONSTRAINT `bi_reservados_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Restrições para tabelas `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Restrições para tabelas `pontos_desembarque`
--
ALTER TABLE `pontos_desembarque`
  ADD CONSTRAINT `pontos_desembarque_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`);

--
-- Restrições para tabelas `pontos_embarque`
--
ALTER TABLE `pontos_embarque`
  ADD CONSTRAINT `pontos_embarque_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_tipo_user`) REFERENCES `user_roles` (`id`);

--
-- Restrições para tabelas `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `autocarros_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `autocarros_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `autocarros_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`);

--
-- Restrições para tabelas `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_autocarro_id_foreign` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`),
  ADD CONSTRAINT `viagens_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `viagens_desembarque_id_foreign` FOREIGN KEY (`desembarque_id`) REFERENCES `pontos_e_d` (`id`),
  ADD CONSTRAINT `viagens_embarque_id_foreign` FOREIGN KEY (`embarque_id`) REFERENCES `pontos_e_d` (`id`),
  ADD CONSTRAINT `viagens_rota_id_foreign` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
