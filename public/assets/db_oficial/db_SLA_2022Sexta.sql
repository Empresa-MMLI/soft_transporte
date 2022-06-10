-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/06/2022 às 16:33
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
-- Estrutura para tabela `aluguer`
--

DROP TABLE IF EXISTS `aluguer`;
CREATE TABLE IF NOT EXISTS `aluguer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint(20) NOT NULL,
  `total_pago` decimal(10,2) NOT NULL,
  `forma_pagto` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ATM',
  `estado` bit(1) NOT NULL DEFAULT b'0',
  `data_entrega` date NOT NULL,
  `data_prev_devolucao` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluguer_pedido_id_foreign` (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `forma_pagto` varchar(10) NOT NULL DEFAULT 'ATM',
  `comprovativo_file` varchar(255) DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'0',
  `data_compra` date NOT NULL,
  `created_at` timestamp(1) NOT NULL DEFAULT current_timestamp(1),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `viagem_id` (`viagem_id`,`cliente_id`,`data_compra`),
  UNIQUE KEY `n_bilhete` (`n_bilhete`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `bilhetes`
--

INSERT INTO `bilhetes` (`id`, `n_bilhete`, `viagem_id`, `cliente_id`, `total_passageiro`, `forma_pagto`, `comprovativo_file`, `estado`, `data_compra`, `created_at`, `updated_at`) VALUES
(35, '1234567LA091211', 5, 2, 2, 'ATM', 'Comprovativos/13-May-2022/abast_627e73b279fdd.png', b'1', '2022-05-13', '2022-05-13 14:05:22.0', '2022-05-17 11:57:07'),
(36, '1234567LA0912s', 5, 3, 1, 'REF', 'Comprovativos/16-May-2022/abast_6282190f2a6e0.png', b'1', '2022-05-16', '2022-05-16 08:27:43.0', '2022-05-17 11:57:48'),
(39, '0014567LA0912d', 3, 3, 1, 'ATM', 'Comprovativos/16-May-2022/abast_62821c4a6cee0.jpg', b'1', '2022-05-16', '2022-05-16 08:41:30.0', '2022-05-17 11:46:05'),
(48, '1234567LA0912aaa', 6, 3, 1, 'ATM', 'Comprovativos/19-May-2022/abast_62860dcd9fce6.png', b'1', '2022-05-19', '2022-05-19 08:28:45.0', '2022-05-20 13:07:07'),
(49, 'dfg', 6, 5, 1, 'ATM', 'Comprovativos/19-May-2022/abast_62860dfe17c59.png', b'1', '2022-05-19', '2022-05-19 08:29:34.0', '2022-05-20 13:09:01'),
(57, 'sdf', 5, 3, 2, 'PD', NULL, b'1', '2022-05-18', '2022-05-20 12:22:59.0', '2022-05-20 13:14:36'),
(60, '1234567LA09124SLA202200', 6, 5, 1, 'PD', NULL, b'1', '2022-05-18', '2022-05-20 12:37:43.0', '2022-05-25 09:04:36'),
(61, '1234567LA0912sss', 7, 5, 1, 'ATM', 'Comprovativos/24-May-2022/abast_628cc4c8c6613.png', b'1', '2022-05-10', '2022-05-24 10:43:06.0', '2022-05-24 10:43:45'),
(62, '1234567LA09124SLA', 7, 5, 1, 'ATM', 'Comprovativos/24-May-2022/abast_628ccb39077e7.png', b'1', '2022-05-24', '2022-05-24 11:10:33.0', '2022-05-24 11:15:27'),
(63, '1234567LA091212312323123SDFSD', 7, 5, 1, 'REF', NULL, b'1', '2022-05-25', '2022-05-25 06:38:55.0', '2022-05-31 12:11:56'),
(66, '1234567LA0912SLA2022', 5, 3, 2, 'PD', NULL, b'1', '2022-05-24', '2022-05-25 08:07:55.0', '2022-05-25 08:12:57'),
(67, '1234567LA0912123123SLA2022', 9, 3, 1, 'ATM', 'Comprovativos/26-May-2022/abast_628f8fe08065b.png', b'1', '2022-05-26', '2022-05-26 13:34:08.0', '2022-05-26 13:36:39'),
(68, 'ADRDRFTG5868788989', 10, 5, 1, 'ATM', 'Comprovativos/29-May-2022/abast_629385323455d.png', b'1', '2022-05-27', '2022-05-29 13:37:38.0', '2022-05-29 13:43:34'),
(69, 'DFTGHJMKM,K,L3545', 10, 5, 1, 'ATM', 'Comprovativos/29-May-2022/abast_6293900c22724.png', b'1', '2022-05-29', '2022-05-29 14:23:56.0', '2022-05-29 14:28:30'),
(70, '1234567LA0912sdfs', 7, 5, 1, 'PD', NULL, b'1', '2022-05-31', '2022-05-31 10:11:48.0', '2022-05-31 10:11:48'),
(71, '1234567LA0912123123ds', 5, 3, 2, 'PD', NULL, b'1', '2022-05-28', '2022-05-31 10:19:51.0', '2022-05-31 10:19:51'),
(84, '1234567LA0912ASDF', 7, 5, 1, 'PD', NULL, b'1', '2022-05-30', '2022-05-31 11:04:51.0', '2022-05-31 11:04:51'),
(88, '1234567LA0912aaasdf', 7, 5, 1, 'PD', NULL, b'1', '2022-05-20', '2022-05-31 11:11:46.0', '2022-05-31 11:11:46'),
(89, '1234567LA091211sssss', 6, 5, 1, 'PD', NULL, b'1', '2022-05-29', '2022-05-31 11:13:32.0', '2022-05-31 13:36:50'),
(90, '1234567LA0912123123SDFS', 6, 5, 1, 'PD', NULL, b'0', '2022-06-02', '2022-05-31 11:34:50.0', '2022-05-31 13:14:27'),
(91, '1234567LA0912123123sdf', 5, 3, 2, 'PD', NULL, b'0', '2022-06-01', '2022-05-31 11:52:24.0', '2022-05-31 13:30:24'),
(93, '1234567LA0912123123sdf888', 7, 5, 1, 'PD', NULL, b'1', '2022-06-01', '2022-05-31 12:02:56.0', '2022-05-31 13:35:05'),
(94, NULL, 12, 5, 5, 'REF', NULL, b'0', '2022-06-06', '2022-06-06 09:13:16.0', '2022-06-06 09:13:16');

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
,`forma_pagto` varchar(10)
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
,`email` varchar(172)
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `bi_reservados`
--

INSERT INTO `bi_reservados` (`id`, `viagem_id`, `cliente_id`, `total_passageiro`, `forma_pagto`, `estado`, `data_compra`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 'PD', b'1', '2022-06-01', '2022-05-17 10:31:57.0', '2022-05-31 11:52:24'),
(2, 6, 5, 1, 'PD', b'1', '2022-06-02', '2022-05-20 12:14:12.0', '2022-05-31 11:34:50'),
(3, 7, 5, 1, 'PD', b'1', '2022-06-01', '2022-05-25 07:54:06.0', '2022-05-31 12:02:56'),
(4, 10, 5, 1, 'PD', b'0', '2022-06-02', '2022-06-02 13:22:59.0', '2022-06-02 13:22:59'),
(5, 10, 3, 1, 'PD', b'0', '2022-06-02', '2022-06-03 07:32:07.0', '2022-06-03 07:32:07'),
(7, 10, 3, 1, 'PD', b'0', '2022-06-03', '2022-06-03 09:34:04.0', '2022-06-03 09:34:04');

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
,`email` varchar(172)
,`telefone` varchar(255)
,`tipo_doc` varchar(100)
,`n_doc` varchar(150)
,`id_usuario` bigint(20) unsigned
,`created_at` timestamp(1)
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carros_alugados`
--

DROP TABLE IF EXISTS `carros_alugados`;
CREATE TABLE IF NOT EXISTS `carros_alugados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veiculos_id` bigint(20) NOT NULL,
  `aluguer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carros_alugados_matricula_unique` (`matricula`),
  KEY `carros_alugados_veiculos_id_foreign` (`veiculos_id`),
  KEY `carros_alugados_aluguer_id_foreign` (`aluguer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `endereco_fisico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `endereco_fisico`, `tipo_doc`, `n_doc`, `id_usuario`, `created_at`, `updated_at`) VALUES
(2, 'Jorge Costa', 'josekinanga@mmlisolucoes.com', '932843283', '0', 'PP', '00123456789', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(3, 'José Quinanga', 'developerjose2@gmail.com', '932853283', '0', 'BI', '01234567890', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(4, 'Benilson Garcia', 'josekinanga@mmlisolucoes.com', '922884287', '0', 'BI', '012345678910', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(5, 'Sia Pinto', 'josekinanga@mmlisolucoes.com', '932853283', '0', 'BI', '001234LA012', 7, '2022-05-19 08:09:53', '2022-05-19 08:09:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `nif`, `telefone`, `email`, `endereco_sede`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'MMLI-Soluções, Prestação de Serviços', '123213123', '932853283', 'josekinanga@mmlisolucoes.com', 'Luanda-Angola', 1, '2022-05-09 01:17:06', '2022-05-09 01:17:06'),
(2, 'SLA - Agência de Turismo & Prestação de Serviços', '999999999', '932853283', 'mmligeral@mmlisolucoes.com', 'Luanda-Angola', 2, '2022-05-09 01:17:06', '2022-05-09 01:17:06');

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
-- Estrutura para tabela `fluidos`
--

DROP TABLE IF EXISTS `fluidos`;
CREATE TABLE IF NOT EXISTS `fluidos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fluido` varchar(30) NOT NULL DEFAULT 'Gasolina',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `fluidos`
--

INSERT INTO `fluidos` (`id`, `fluido`, `created_at`, `updated_at`) VALUES
(1, 'Gasolina', '2022-06-06 11:56:40', '2022-06-06 11:56:40'),
(2, 'Gasóleo', '2022-06-06 11:56:40', '2022-06-06 11:56:40'),
(3, 'Gás', '2022-06-06 11:58:33', '2022-06-06 11:58:33'),
(4, 'Diesel', '2022-06-06 11:58:33', '2022-06-06 11:58:33'),
(5, 'Híbrido', '2022-06-06 11:58:56', '2022-06-06 11:58:56'),
(6, 'Eléctrico', '2022-06-06 11:58:56', '2022-06-06 11:58:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto_veiculos`
--

DROP TABLE IF EXISTS `foto_veiculos`;
CREATE TABLE IF NOT EXISTS `foto_veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veiculo_id` bigint(20) NOT NULL,
  `tem_foto` bit(1) NOT NULL DEFAULT b'0',
  `foto_url` varchar(255) NOT NULL DEFAULT 'resources/sem_foto.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `veiculo_id` (`veiculo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `foto_veiculos`
--

INSERT INTO `foto_veiculos` (`id`, `veiculo_id`, `tem_foto`, `foto_url`, `created_at`, `updated_at`) VALUES
(8, 7, b'1', 'Veiculos/10-Jun-2022/sla_car_100622090162a3086757239.png', '2022-06-10 08:01:27', '2022-06-10 08:01:27'),
(9, 8, b'1', 'Veiculos/10-Jun-2022/sla_car_100622090362a308f792bb5.png', '2022-06-10 08:03:51', '2022-06-10 08:03:51'),
(10, 9, b'1', 'Veiculos/10-Jun-2022/sla_car_100622091262a30aee538e9.png', '2022-06-10 08:12:14', '2022-06-10 08:12:14'),
(11, 10, b'1', 'Veiculos/10-Jun-2022/sla_car_100622091462a30b5b04783.png', '2022-06-10 08:14:03', '2022-06-10 08:14:03'),
(12, 11, b'1', 'Veiculos/10-Jun-2022/sla_car_100622091562a30b96ef722.png', '2022-06-10 08:15:02', '2022-06-10 08:15:02'),
(14, 13, b'1', 'Veiculos/10-Jun-2022/sla_car_100622091862a30c632f63a.png', '2022-06-10 08:18:27', '2022-06-10 08:18:27'),
(15, 14, b'1', 'Veiculos/10-Jun-2022/sla_car_100622091962a30c9f860f0.png', '2022-06-10 08:19:27', '2022-06-10 08:19:27'),
(16, 15, b'1', 'Veiculos/10-Jun-2022/sla_car_100622092162a30d1d47ea1.png', '2022-06-10 08:21:33', '2022-06-10 08:21:33');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `foto_veiculo_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `foto_veiculo_detalhes`;
CREATE TABLE IF NOT EXISTS `foto_veiculo_detalhes` (
`id` bigint(20)
,`marca_id` bigint(20)
,`marca` varchar(255)
,`modelo_id` bigint(20)
,`modelo` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`veiculo_id` bigint(20)
,`tem_foto` bit(1)
,`foto_url` varchar(255)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 'VOLVO', '2022-04-21 09:36:10', '2022-04-21 09:36:10'),
(17, 'MITSUBISHI', '2022-06-06 07:07:29', '2022-06-06 07:07:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(21, '2022_05_31_112602_create_pedidos_table', 15),
(22, '2022_05_31_112711_create_aluguer_table', 16),
(23, '2022_05_31_112632_create_pagamento_table', 17),
(24, '2022_05_31_121158_create_carros_alugados_table', 18),
(25, '2022_05_31_123145_create_precos_carros__table', 19);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(55, 'FH540', 15, '2022-04-21 09:36:10', '2022-04-21 09:36:10'),
(57, 'L200', 17, '2022-06-06 07:08:20', '2022-06-06 07:08:20'),
(58, 'PAJERO FULL', 17, '2022-06-06 07:09:19', '2022-06-06 07:09:19'),
(59, 'PAJERO SPORT', 17, '2022-06-06 07:09:33', '2022-06-06 07:09:33'),
(60, 'L200 OUTDOOR', 17, '2022-06-06 07:09:45', '2022-06-06 07:09:45'),
(61, 'ECLIPSE CROSS', 17, '2022-06-06 07:09:58', '2022-06-06 07:09:58'),
(62, 'OUTLANDER', 17, '2022-06-06 07:10:13', '2022-06-06 07:10:13'),
(63, 'ASX', 17, '2022-06-06 07:10:41', '2022-06-06 07:10:41'),
(64, 'PRADO', 1, '2022-06-06 07:11:59', '2022-06-06 07:11:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id` bigint(20) NOT NULL,
  `aluguer_id` bigint(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `forma_pagto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `pagamento_aluguer_id_foreign` (`aluguer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `veiculo_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `qtd_carros` tinyint(4) NOT NULL DEFAULT 1,
  `total_dias` tinyint(4) NOT NULL DEFAULT 1,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `veiculo_id` (`veiculo_id`,`cliente_id`,`qtd_carros`,`data_inicio`,`data_fim`),
  KEY `pedidos_cliente_id_foreign` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `veiculo_id`, `cliente_id`, `qtd_carros`, `total_dias`, `data_inicio`, `data_fim`, `created_at`, `updated_at`) VALUES
(1, 11, 3, 1, 1, '2022-06-10', '2022-06-11', '2022-06-10 11:59:31', '2022-06-10 11:59:31'),
(2, 15, 5, 1, 1, '2022-06-10', '2022-06-11', '2022-06-10 12:41:47', '2022-06-10 12:41:47'),
(5, 10, 5, 1, 1, '2022-06-10', '2022-06-11', '2022-06-10 12:45:03', '2022-06-10 12:45:03'),
(6, 10, 3, 2, 1, '2022-06-10', '2022-06-11', '2022-06-10 13:08:57', '2022-06-10 13:08:57'),
(7, 10, 3, 4, 1, '2022-06-10', '2022-06-11', '2022-06-10 13:11:10', '2022-06-10 13:11:10'),
(8, 10, 3, 1, 1, '2022-06-10', '2022-06-11', '2022-06-10 13:14:14', '2022-06-10 13:14:14');

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
(1, 1, 'MMLI Soluções & Prestação de Serviços', 'mmligeral@mmlisolucoes.com', NULL, '$2y$10$./TF3NAFUCkpgqbaN22F9OtG67tvaHsWcQqYI204MvOSsQ7WSwJ9.', NULL, '2022-05-08 23:29:39', '2022-05-08 23:29:39'),
(2, 2, 'SLA - Agência de Turismo & Prestação de Serviços', 'mmligeral@mmlisolucoes.com', NULL, '$2y$10$./TF3NAFUCkpgqbaN22F9OtG67tvaHsWcQqYI204MvOSsQ7WSwJ9.', NULL, '2022-06-06 10:38:09', '2022-06-06 10:38:09'),
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
  `marca_id` bigint(20) NOT NULL,
  `modelo_id` bigint(20) NOT NULL,
  `n_assentos` int(11) NOT NULL,
  `transmissao` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Automático',
  `fluido_id` tinyint(4) NOT NULL,
  `ano` int(4) DEFAULT 2022,
  `km` int(11) NOT NULL DEFAULT 10,
  `litros` tinyint(4) NOT NULL DEFAULT 3,
  `preco_aluguer` decimal(10,2) NOT NULL DEFAULT 15000.00,
  `tempo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Diário',
  `empresa_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autocarros_empresa_id_foreign` (`empresa_id`),
  KEY `autocarros_marca_id_foreign` (`marca_id`),
  KEY `autocarros_modelo_id_foreign` (`modelo_id`),
  KEY `fluido` (`fluido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `marca_id`, `modelo_id`, `n_assentos`, `transmissao`, `fluido_id`, `ano`, `km`, `litros`, `preco_aluguer`, `tempo`, `empresa_id`, `created_at`, `updated_at`) VALUES
(7, 8, 28, 5, 'Automático', 2, 2001, 5, 4, '17500.00', 'Diário', 2, '2022-06-10 08:01:27', '2022-06-10 08:01:27'),
(8, 1, 3, 5, 'Manual', 1, 2015, 3, 4, '20000.00', 'Diário', 2, '2022-06-10 08:03:51', '2022-06-10 08:03:51'),
(9, 4, 11, 5, 'Automático', 2, 2017, 100, 30, '23000.00', 'Diário', 2, '2022-06-10 08:12:14', '2022-06-10 08:12:14'),
(10, 8, 29, 11, 'Automático', 2, 2015, 136, 36, '50400.00', 'Diário', 2, '2022-06-10 08:14:02', '2022-06-10 08:14:02'),
(11, 1, 3, 51, 'Automático', 1, 2021, 50, 36, '5500.00', 'Diário', 2, '2022-06-10 08:15:02', '2022-06-10 08:15:02'),
(13, 1, 64, 5, 'Automático', 1, 2009, 1, 36, '59550.00', 'Diário', 2, '2022-06-10 08:18:27', '2022-06-10 08:18:27'),
(14, 1, 2, 5, 'Manual', 2, 2022, 10, 36, '33000.00', 'Diário', 2, '2022-06-10 08:19:27', '2022-06-10 08:19:27'),
(15, 4, 9, 20, 'Automático', 1, 2017, 1, 24, '70000.00', 'Diário', 2, '2022-06-10 08:21:33', '2022-06-10 08:21:33');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `veiculo_detalhes`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `veiculo_detalhes`;
CREATE TABLE IF NOT EXISTS `veiculo_detalhes` (
`id` bigint(20)
,`n_assentos` int(11)
,`marca_id` bigint(20)
,`marca` varchar(255)
,`modelo_id` bigint(20)
,`modelo` varchar(255)
,`transmissao` varchar(30)
,`fluido_id` tinyint(4)
,`fluido` varchar(30)
,`km` int(11)
,`litros` tinyint(4)
,`ano` int(4)
,`preco_aluguer` decimal(10,2)
,`tempo` varchar(30)
,`empresa_id` bigint(20)
,`nome_empresa` varchar(255)
,`nif_empresa` varchar(255)
,`telef_empresa` varchar(255)
,`email_empresa` varchar(255)
,`endereco_empresa` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
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
,`ref_autocarro` varchar(30)
,`capacidade` tinyint(4)
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
  `ref_autocarro` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'TCUL 2022',
  `capacidade` tinyint(4) NOT NULL DEFAULT 55,
  `rota_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `total_passageiro` smallint(6) NOT NULL DEFAULT 42,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `viagens_embarque_id_foreign` (`embarque_id`),
  KEY `viagens_desembarque_id_foreign` (`desembarque_id`),
  KEY `viagens_rota_id_foreign` (`rota_id`),
  KEY `viagens_classe_id_foreign` (`classe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `viagens`
--

INSERT INTO `viagens` (`id`, `itinerario`, `data_partida`, `data_chegada`, `embarque_id`, `desembarque_id`, `ref_autocarro`, `capacidade`, `rota_id`, `classe_id`, `total_passageiro`, `estado`, `created_at`, `updated_at`) VALUES
(3, 'kikolo, cacuaco', '2022-05-29 09:41:30', '2022-05-30 10:00:00', 3, 4, 'TCUL 2022', 30, 2, 4, 30, b'1', '2022-05-10 04:20:43', '2022-05-16 08:41:30'),
(5, 'Gabela, Negage, Cuando cubango', '2022-05-29 09:27:43', '2022-05-30 18:00:00', 12, 4, 'TCUL 2022', 30, 1, 4, 22, b'1', '2022-05-10 09:26:02', '2022-05-17 10:31:57'),
(6, 'KIbabo, Shoprite', '2022-05-29 13:27:43', '2022-05-31 18:00:00', 5, 4, 'TCUL 2022', 30, 3, 2, 3, b'1', '2022-05-17 12:23:02', '2022-05-20 12:14:12'),
(7, 'Cacuaco, Icolo e Bengo, Cabal, Caimbambo, Catumbela, Lobito', '2022-05-28 23:00:00', '2022-05-31 08:00:00', 3, 7, 'TCUL 2022', 30, 4, 2, 4, b'1', '2022-05-24 10:24:35', '2022-05-25 07:54:07'),
(8, 'Cacuaco, Icolo e Bengo, Cabal, Caimbambo, Catumbela, Lobito', '2022-05-29 11:25:25', '2022-05-30 14:00:00', 12, 10, 'TCUL 2022', 30, 4, 4, 0, b'1', '2022-05-24 10:25:25', '2022-05-24 10:25:25'),
(9, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-29 11:31:40', '2022-05-31 17:31:00', 14, 17, 'TCUL 2022', 30, 5, 2, 1, b'1', '2022-05-24 10:31:40', '2022-05-26 13:34:08'),
(10, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-26 11:32:17', '2022-05-31 19:32:00', 15, 16, 'TCUL 2022', 30, 5, 1, 5, b'1', '2022-05-24 10:32:17', '2022-06-03 09:34:11'),
(11, 'Ondjiva, Cuanhama, Bailundo, Tchicala, Catchiungo', '2022-05-29 11:33:07', '2022-05-30 04:00:00', 16, 18, 'TCUL 2022', 30, 5, 3, 0, b'1', '2022-05-24 10:33:07', '2022-05-24 10:33:07'),
(12, 'Viana, Gamek', '2022-06-06 10:11:37', '2022-06-06 14:00:00', 3, 4, 'TCUL 56', 30, 1, 4, 5, b'1', '2022-06-06 09:11:37', '2022-06-06 09:13:23');

-- --------------------------------------------------------

--
-- Estrutura para view `bilhete_detalhes`
--
DROP TABLE IF EXISTS `bilhete_detalhes`;

DROP VIEW IF EXISTS `bilhete_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bilhete_detalhes`  AS SELECT `bilhete`.`id` AS `id`, `bilhete`.`n_bilhete` AS `n_bilhete`, `bilhete`.`total_passageiro` AS `total_passageiro`, `bilhete`.`forma_pagto` AS `forma_pagto`, `bilhete`.`comprovativo_file` AS `comprovativo_file`, `bilhete`.`estado` AS `estado`, `bilhete`.`data_compra` AS `data_compra`, `viagem`.`id` AS `id_viagem`, `viagem`.`rota_origem` AS `rota_origem`, `viagem`.`rota_destino` AS `rota_destino`, `viagem`.`ponto_e` AS `ponto_e`, `viagem`.`ponto_d` AS `ponto_d`, `viagem`.`kilometros` AS `kilometros`, `viagem`.`preco` AS `preco`, `viagem`.`classe` AS `classe`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, `cliente`.`id` AS `id_cliente`, `cliente`.`nome` AS `cliente`, `cliente`.`telefone` AS `telefone`, `cliente`.`email` AS `email`, `cliente`.`tipo_doc` AS `tipo_doc`, `cliente`.`n_doc` AS `n_doc`, `cliente`.`id_usuario` AS `id_usuario`, `bilhete`.`created_at` AS `created_at`, `bilhete`.`updated_at` AS `updated_at` FROM ((`bilhetes` `bilhete` join `viagem_detalhes` `viagem` on(`bilhete`.`viagem_id` = `viagem`.`id`)) join `clientes` `cliente` on(`bilhete`.`cliente_id` = `cliente`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `bi_reservado_detalhes`
--
DROP TABLE IF EXISTS `bi_reservado_detalhes`;

DROP VIEW IF EXISTS `bi_reservado_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bi_reservado_detalhes`  AS SELECT `bilhete`.`id` AS `id`, `bilhete`.`total_passageiro` AS `total_passageiro`, `bilhete`.`forma_pagto` AS `forma_pagto`, `bilhete`.`estado` AS `estado`, `bilhete`.`data_compra` AS `data_compra`, `viagem`.`id` AS `id_viagem`, `viagem`.`rota_origem` AS `rota_origem`, `viagem`.`rota_destino` AS `rota_destino`, `viagem`.`ponto_e` AS `ponto_e`, `viagem`.`ponto_d` AS `ponto_d`, `viagem`.`kilometros` AS `kilometros`, `viagem`.`preco` AS `preco`, `viagem`.`classe` AS `classe`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, `cliente`.`id` AS `id_cliente`, `cliente`.`nome` AS `cliente`, `cliente`.`email` AS `email`, `cliente`.`telefone` AS `telefone`, `cliente`.`tipo_doc` AS `tipo_doc`, `cliente`.`n_doc` AS `n_doc`, `cliente`.`id_usuario` AS `id_usuario`, `bilhete`.`created_at` AS `created_at`, `bilhete`.`updated_at` AS `updated_at` FROM ((`bi_reservados` `bilhete` join `viagem_detalhes` `viagem` on(`bilhete`.`viagem_id` = `viagem`.`id`)) join `clientes` `cliente` on(`bilhete`.`cliente_id` = `cliente`.`id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `foto_veiculo_detalhes`
--
DROP TABLE IF EXISTS `foto_veiculo_detalhes`;

DROP VIEW IF EXISTS `foto_veiculo_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `foto_veiculo_detalhes`  AS SELECT `veiculo`.`id` AS `id`, `veiculo`.`marca_id` AS `marca_id`, `veiculo`.`marca` AS `marca`, `veiculo`.`modelo_id` AS `modelo_id`, `veiculo`.`modelo` AS `modelo`, `veiculo`.`created_at` AS `created_at`, `veiculo`.`updated_at` AS `updated_at`, `foto`.`veiculo_id` AS `veiculo_id`, `foto`.`tem_foto` AS `tem_foto`, `foto`.`foto_url` AS `foto_url` FROM (`foto_veiculos` `foto` join `veiculo_detalhes` `veiculo` on(`veiculo`.`id` = `foto`.`veiculo_id`))  ;

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `veiculo_detalhes`  AS SELECT `frota`.`id` AS `id`, `frota`.`n_assentos` AS `n_assentos`, `frota`.`marca_id` AS `marca_id`, `marca`.`marca` AS `marca`, `frota`.`modelo_id` AS `modelo_id`, `marca`.`modelo` AS `modelo`, `frota`.`transmissao` AS `transmissao`, `frota`.`fluido_id` AS `fluido_id`, `fluido`.`fluido` AS `fluido`, `frota`.`km` AS `km`, `frota`.`litros` AS `litros`, `frota`.`ano` AS `ano`, `frota`.`preco_aluguer` AS `preco_aluguer`, `frota`.`tempo` AS `tempo`, `frota`.`empresa_id` AS `empresa_id`, `empresa`.`nome` AS `nome_empresa`, `empresa`.`nif` AS `nif_empresa`, `empresa`.`telefone` AS `telef_empresa`, `empresa`.`email` AS `email_empresa`, `empresa`.`endereco_sede` AS `endereco_empresa`, `frota`.`created_at` AS `created_at`, `frota`.`updated_at` AS `updated_at` FROM (((`veiculos` `frota` join `marca_modelos` `marca` on(`frota`.`marca_id` = `marca`.`marca_id` and `frota`.`modelo_id` = `marca`.`modelo_id`)) join `empresas` `empresa` on(`frota`.`empresa_id` = `empresa`.`id`)) join `fluidos` `fluido` on(`fluido`.`id` = `frota`.`fluido_id`))  ;

-- --------------------------------------------------------

--
-- Estrutura para view `viagem_detalhes`
--
DROP TABLE IF EXISTS `viagem_detalhes`;

DROP VIEW IF EXISTS `viagem_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viagem_detalhes`  AS SELECT `viagem`.`id` AS `id`, `rota`.`origem` AS `rota_origem`, `rota`.`destino` AS `rota_destino`, `rota`.`kilometros` AS `kilometros`, `rota`.`preco` AS `preco`, `viagem`.`itinerario` AS `itinerario`, `classes`.`classe` AS `classe`, `viagem`.`total_passageiro` AS `total_passageiro`, `pontos_e`.`ponto` AS `ponto_e`, `pontos_d`.`ponto` AS `ponto_d`, `viagem`.`ref_autocarro` AS `ref_autocarro`, `viagem`.`capacidade` AS `capacidade`, `viagem`.`data_partida` AS `data_partida`, `viagem`.`data_chegada` AS `data_chegada`, timediff(`viagem`.`data_chegada`,`viagem`.`data_partida`) AS `tempo`, `viagem`.`estado` AS `estado`, `viagem`.`created_at` AS `created_at`, `viagem`.`updated_at` AS `updated_at` FROM ((((`viagens` `viagem` join `pontos_detalhes` `pontos_e` on(`viagem`.`embarque_id` = `pontos_e`.`id`)) join `pontos_detalhes` `pontos_d` on(`viagem`.`desembarque_id` = `pontos_d`.`id`)) join `rotas` `rota` on(`rota`.`id` = `viagem`.`rota_id`)) join `classes` on(`viagem`.`classe_id` = `classes`.`id`))  ;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluguer`
--
ALTER TABLE `aluguer`
  ADD CONSTRAINT `aluguer_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

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
-- Restrições para tabelas `carros_alugados`
--
ALTER TABLE `carros_alugados`
  ADD CONSTRAINT `carros_alugados_aluguer_id_foreign` FOREIGN KEY (`aluguer_id`) REFERENCES `aluguer` (`id`),
  ADD CONSTRAINT `carros_alugados_veiculos_id_foreign` FOREIGN KEY (`veiculos_id`) REFERENCES `veiculos` (`id`);

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
-- Restrições para tabelas `foto_veiculos`
--
ALTER TABLE `foto_veiculos`
  ADD CONSTRAINT `foto_veiculos_ibfk_1` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`);

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
-- Restrições para tabelas `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_aluguer_id_foreign` FOREIGN KEY (`aluguer_id`) REFERENCES `aluguer` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_veiculo_id_foreign` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`);

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
  ADD CONSTRAINT `autocarros_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`),
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`fluido_id`) REFERENCES `fluidos` (`id`);

--
-- Restrições para tabelas `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `viagens_desembarque_id_foreign` FOREIGN KEY (`desembarque_id`) REFERENCES `pontos_e_d` (`id`),
  ADD CONSTRAINT `viagens_embarque_id_foreign` FOREIGN KEY (`embarque_id`) REFERENCES `pontos_e_d` (`id`),
  ADD CONSTRAINT `viagens_rota_id_foreign` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
