-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/05/2022 às 14:02
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
-- Estrutura para tabela `autocarros`
--

DROP TABLE IF EXISTS `autocarros`;
CREATE TABLE IF NOT EXISTS `autocarros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidade` mediumint(9) NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `modelo_id` bigint(20) NOT NULL,
  `empresa_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `autocarros_matricula_unique` (`matricula`),
  KEY `autocarros_empresa_id_foreign` (`empresa_id`),
  KEY `autocarros_marca_id_foreign` (`marca_id`),
  KEY `autocarros_modelo_id_foreign` (`modelo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_doc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BI',
  `n_doc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `tipo_doc`, `n_doc`, `id_usuario`, `created_at`, `updated_at`) VALUES
(2, 'Jorge Costa', '932843283', 'PP', '00123456789', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  KEY `modelos_marca_id_foreign` (`marca_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pontos_e_d`
--

INSERT INTO `pontos_e_d` (`id`, `ponto`, `tipo_ponto`, `provincia_id`, `created_at`, `updated_at`) VALUES
(3, 'Luanda - Gamek', 'Embarque', 1, '2022-05-09 08:41:38', '2022-05-09 08:41:38'),
(4, 'Bengo - Paragem dos Rastas', 'Desembarque', 3, '2022-05-09 08:42:04', '2022-05-09 08:42:04');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'Cuanza Norte', 'Angola', '2022-05-09 07:54:43', '2022-05-09 07:54:43');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `id_tipo_usuario` (`id_tipo_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `id_tipo_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'MMLI - Team', 'mmligeral@mmlisolucoes.com', NULL, '$2y$10$./TF3NAFUCkpgqbaN22F9OtG67tvaHsWcQqYI204MvOSsQ7WSwJ9.', NULL, '2022-05-08 23:29:39', '2022-05-08 23:29:39'),
(5, 3, 'Jorge Costa', 'geral@mmlisolucoes.com', NULL, '$2y$10$CSLoBvg/dJR4tyqs8yGEc.x72nj5iHZJOAicfLpUtJJjg963yrEL.', NULL, '2022-05-09 01:09:23', '2022-05-09 01:09:23'),
(6, 2, 'MMLI', 'geral22@mmlisolucoes.com', NULL, '$2y$10$em/NVNCFG5KIBIyek.I7o.HjxlPZ/ZZ8zQ6BQY8HBo7lxymi89A3u', NULL, '2022-05-09 01:17:06', '2022-05-09 01:17:06');

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
-- Estrutura para tabela `viagens`
--

DROP TABLE IF EXISTS `viagens`;
CREATE TABLE IF NOT EXISTS `viagens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `itnerario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_partida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_chegada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `embarque_id` bigint(20) NOT NULL,
  `desembarque_id` bigint(20) NOT NULL,
  `autocarro_id` bigint(20) NOT NULL,
  `rota_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `viagens_embarque_id_foreign` (`embarque_id`),
  KEY `viagens_desembarque_id_foreign` (`desembarque_id`),
  KEY `viagens_autocarro_id_foreign` (`autocarro_id`),
  KEY `viagens_rota_id_foreign` (`rota_id`),
  KEY `viagens_classe_id_foreign` (`classe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para view `pontos_detalhes`
--
DROP TABLE IF EXISTS `pontos_detalhes`;

DROP VIEW IF EXISTS `pontos_detalhes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pontos_detalhes`  AS SELECT `pontos`.`id` AS `id`, `pontos`.`ponto` AS `ponto`, `pontos`.`tipo_ponto` AS `tipo_ponto`, `pontos`.`provincia_id` AS `provincia_id`, `pontos`.`created_at` AS `created_at`, `pontos`.`updated_at` AS `updated_at`, `provincia`.`provincia` AS `provincia`, `provincia`.`pais` AS `pais` FROM (`pontos_e_d` `pontos` join `provincias` `provincia` on(`pontos`.`provincia_id` = `provincia`.`id`))  ;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `autocarros`
--
ALTER TABLE `autocarros`
  ADD CONSTRAINT `autocarros_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `autocarros_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `autocarros_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`);

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
-- Restrições para tabelas `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_autocarro_id_foreign` FOREIGN KEY (`autocarro_id`) REFERENCES `autocarros` (`id`),
  ADD CONSTRAINT `viagens_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `viagens_desembarque_id_foreign` FOREIGN KEY (`desembarque_id`) REFERENCES `pontos_desembarque` (`id`),
  ADD CONSTRAINT `viagens_embarque_id_foreign` FOREIGN KEY (`embarque_id`) REFERENCES `pontos_embarque` (`id`),
  ADD CONSTRAINT `viagens_rota_id_foreign` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
