-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/05/2022 às 17:11
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_doc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BI',
  `n_doc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `tipo_doc`, `n_doc`, `id_usuario`, `created_at`, `updated_at`) VALUES
(2, 'Jorge Costa', '932843283', 'PP', '00123456789', 5, '2022-05-09 01:09:23', '2022-05-09 01:09:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_sede` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `nif`, `telefone`, `email`, `endereco_sede`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'MMLI', '123213123', '932843283', 'example@dominio.com', 'Luanda-Angola', 6, '2022-05-09 01:17:06', '2022-05-09 01:17:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empresa_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Nissan', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `modelos` (
  `id` bigint(20) NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `marca_id`, `created_at`, `updated_at`) VALUES
(1, 'Nissan 2022', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
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
-- Estrutura para tabela `pontos_desembarque`
--

CREATE TABLE `pontos_desembarque` (
  `id` bigint(20) NOT NULL,
  `ponto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `pontos_detalhes`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `pontos_detalhes` (
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

CREATE TABLE `pontos_embarque` (
  `id` bigint(20) NOT NULL,
  `ponto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_e_d`
--

CREATE TABLE `pontos_e_d` (
  `id` bigint(20) NOT NULL,
  `ponto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ponto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Embarque',
  `provincia_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `provincias` (
  `id` bigint(20) NOT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Angola',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `rotas` (
  `id` bigint(20) NOT NULL,
  `origem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometros` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `rotas`
--

INSERT INTO `rotas` (`id`, `origem`, `destino`, `kilometros`, `preco`, `created_at`, `updated_at`) VALUES
(1, 'Bengo', 'Luanda', '350', 2500, '2022-05-09 12:06:58', '2022-05-09 12:06:58'),
(2, 'Luanda', 'Uíge', '5000', 16500, '2022-05-09 12:08:31', '2022-05-09 12:08:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL DEFAULT 'cliente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `veiculos` (
  `id` bigint(20) NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidade` mediumint(9) NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `modelo_id` bigint(20) NOT NULL,
  `empresa_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `matricula`, `capacidade`, `marca_id`, `modelo_id`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, 'LD-20-12-UI', 42, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `viagens`
--

CREATE TABLE `viagens` (
  `id` bigint(20) NOT NULL,
  `itnerario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_partida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_chegada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `embarque_id` bigint(20) NOT NULL,
  `desembarque_id` bigint(20) NOT NULL,
  `autocarro_id` bigint(20) NOT NULL,
  `rota_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para view `pontos_detalhes`
--
DROP TABLE IF EXISTS `pontos_detalhes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pontos_detalhes`  AS SELECT `pontos`.`id` AS `id`, `pontos`.`ponto` AS `ponto`, `pontos`.`tipo_ponto` AS `tipo_ponto`, `pontos`.`provincia_id` AS `provincia_id`, `pontos`.`created_at` AS `created_at`, `pontos`.`updated_at` AS `updated_at`, `provincia`.`provincia` AS `provincia`, `provincia`.`pais` AS `pais` FROM (`pontos_e_d` `pontos` join `provincias` `provincia` on(`pontos`.`provincia_id` = `provincia`.`id`))  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `funcionarios_username_unique` (`username`),
  ADD KEY `funcionarios_empresa_id_foreign` (`empresa_id`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelos_marca_id_foreign` (`marca_id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `pontos_desembarque`
--
ALTER TABLE `pontos_desembarque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pontos_desembarque_provincia_id_foreign` (`provincia_id`);

--
-- Índices de tabela `pontos_embarque`
--
ALTER TABLE `pontos_embarque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pontos_embarque_ponto_unique` (`ponto`),
  ADD KEY `pontos_embarque_provincia_id_foreign` (`provincia_id`);

--
-- Índices de tabela `pontos_e_d`
--
ALTER TABLE `pontos_e_d`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pontos_embarque_ponto_unique` (`ponto`),
  ADD KEY `pontos_embarque_provincia_id_foreign` (`provincia_id`);

--
-- Índices de tabela `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rotas`
--
ALTER TABLE `rotas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_tipo_usuario` (`id_tipo_user`);

--
-- Índices de tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autocarros_matricula_unique` (`matricula`),
  ADD KEY `autocarros_empresa_id_foreign` (`empresa_id`),
  ADD KEY `autocarros_marca_id_foreign` (`marca_id`),
  ADD KEY `autocarros_modelo_id_foreign` (`modelo_id`);

--
-- Índices de tabela `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viagens_embarque_id_foreign` (`embarque_id`),
  ADD KEY `viagens_desembarque_id_foreign` (`desembarque_id`),
  ADD KEY `viagens_autocarro_id_foreign` (`autocarro_id`),
  ADD KEY `viagens_rota_id_foreign` (`rota_id`),
  ADD KEY `viagens_classe_id_foreign` (`classe_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pontos_desembarque`
--
ALTER TABLE `pontos_desembarque`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pontos_embarque`
--
ALTER TABLE `pontos_embarque`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pontos_e_d`
--
ALTER TABLE `pontos_e_d`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `rotas`
--
ALTER TABLE `rotas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `viagens`
--
ALTER TABLE `viagens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

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
  ADD CONSTRAINT `viagens_autocarro_id_foreign` FOREIGN KEY (`autocarro_id`) REFERENCES `veiculos` (`id`),
  ADD CONSTRAINT `viagens_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `viagens_desembarque_id_foreign` FOREIGN KEY (`desembarque_id`) REFERENCES `pontos_desembarque` (`id`),
  ADD CONSTRAINT `viagens_embarque_id_foreign` FOREIGN KEY (`embarque_id`) REFERENCES `pontos_embarque` (`id`),
  ADD CONSTRAINT `viagens_rota_id_foreign` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
