-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 mars 2025 à 15:52
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-commerce2`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `machine_id` int NOT NULL,
  `jeux_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`machine_id`, `jeux_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2024-11-14 08:15:30', '2024-11-14 08:15:30', 0),
(20161031101316, 'AddSecretToUsers', '2024-11-14 08:15:30', '2024-11-14 08:15:30', 0),
(20190208174112, 'AddAdditionalDataToUsers', '2024-11-14 08:15:30', '2024-11-14 08:15:30', 0),
(20210929202041, 'AddLastLoginToUsers', '2024-11-14 08:15:30', '2024-11-14 08:15:30', 0),
(20240328135459, 'CreateFailedPasswordAttempts', '2024-11-14 08:15:30', '2024-11-14 08:15:31', 0),
(20240328215332, 'AddLockoutTimeToUsers', '2024-11-14 08:15:31', '2024-11-14 08:15:31', 0),
(20240801112143, 'ChangeAvatarColumnTypeInSocialAccounts', '2024-11-14 08:15:31', '2024-11-14 08:15:31', 0);

-- --------------------------------------------------------

--
-- Structure de la table `failed_password_attempts`
--

CREATE TABLE `failed_password_attempts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

CREATE TABLE `forfait` (
  `id` int NOT NULL,
  `temps` enum('1h00','1h30','2h00','+2h00') NOT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`id`, `temps`, `prix`) VALUES
(1, '1h00', 10.00),
(2, '1h30', 15.00),
(3, '2h00', 20.00),
(4, '+2h00', 30.00);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forfait_id` int NOT NULL,
  `machine_id` int NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `date`, `forfait_id`, `machine_id`, `user_id`) VALUES
(9, '2024-11-18 15:13:18', 2, 1, 'eb8d3175-8dfe-4135-8bd7-ac2d8710a85a'),
(10, '2024-11-18 15:13:27', 3, 2, 'eba8d30b-8efd-4c9d-a86b-8c5b4e01d922'),
(11, '2024-11-21 07:38:17', 1, 1, 'eb8d3175-8dfe-4135-8bd7-ac2d8710a85a');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `genre` enum('Action','Stratégie') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateSorti` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `genre`, `dateSorti`) VALUES
(1, 'CS-GO', 'Action', '2012-08-02'),
(2, 'StarCraft', 'Stratégie', '2010-07-27');

-- --------------------------------------------------------

--
-- Structure de la table `machine`
--

CREATE TABLE `machine` (
  `id` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `Etat` enum('libre','occupé','maintenance') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `memoire` enum('8Go','16Go','32Go') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `OS` enum('Windows','Mac','Linux') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `processeur` enum('Intel','AMD') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `machine`
--

INSERT INTO `machine` (`id`, `nom`, `Etat`, `memoire`, `OS`, `processeur`) VALUES
(1, 'M1', 'libre', '16Go', 'Windows', 'Intel'),
(2, 'M2', 'occupé', '32Go', 'Mac', 'AMD');

-- --------------------------------------------------------

--
-- Structure de la table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` text,
  `description` text,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text,
  `last_login` datetime DEFAULT NULL,
  `lockout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`, `last_login`, `lockout_time`) VALUES
('089020b0-ffe4-11ef-9d7e-e073e7f2a7bf', 'test4', 'test4@gmail.com', '1234', 'test', '4', NULL, NULL, NULL, '2025-03-13 09:19:41', NULL, NULL, NULL, 1, 0, 'user', '2025-03-13 08:19:40', '2025-03-13 08:19:40', NULL, NULL, NULL),
('7bf7f9b9-9366-4ed0-8410-687d2e4d5782', 'Celeste', 'evo@gmail.com', '$2y$10$cxnIfnf4KXXDp7GxoRESkeep6hj4wtra2g1mGWfPJufdikb1ockMO', 'Celeste', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2024-11-20 07:28:48', '2024-11-20 07:28:48', NULL, NULL, NULL),
('a7e90714-ce9e-4363-9e1f-93f31953f81d', 'test2', 'test2@gmail.com', '$2y$10$dExvfiXL4Zp.4Eo6M0ly9e4NUpwLzkp4ImXAZqKEHHjZyEvlsGcY2', 'test2', 'test2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2024-12-11 07:40:10', '2024-12-11 07:40:10', NULL, NULL, NULL),
('d77956d4-eaa7-47a6-a03c-c23e5c1d5538', 'ap', 'ap@ap.ap', '$2y$10$DifBzOE3djYx8jRW0CCyNeXB3TCzR7JjF5ju7tK7Kbqkm6X5zd95K', 'ap', 'ap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2025-02-24 10:20:02', '2025-02-24 10:20:02', NULL, NULL, NULL),
('dbe4359d-8487-4bb1-bf55-21ddc9940769', 'test4', 'test@gmail.com', '$2y$10$CR5TnuqEUk9rqHMqPqSbUu3XobVquUy.DVICIg41rOIyzTaVcYj3a', 'test', 'test2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2024-12-11 10:53:15', '2024-12-11 10:53:15', NULL, NULL, NULL),
('eb8d3175-8dfe-4135-8bd7-ac2d8710a85a', 'superadmin', 'superadmin@example.com', '$2y$10$7lcy4p6xsVqFnzXV17DzmOs.EJINrZZI3yWZLMryKf7abVAMd8FjC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'superuser', '2024-11-14 08:46:57', '2024-11-14 08:46:57', NULL, '2025-02-24 10:16:46', NULL),
('eba8d30b-8efd-4c9d-a86b-8c5b4e01d922', 'test', 'test@gmail.com', '$2y$10$hklgqJoy3j5x2sj4Rnw2jeIqmpF3dWbR/G81fMLJtl5TOOjAAI.zW', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2024-11-14 09:47:33', '2024-11-14 09:47:33', NULL, '2024-11-20 08:10:04', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD UNIQUE KEY `idMachine` (`machine_id`),
  ADD UNIQUE KEY `idJeux` (`jeux_id`);

--
-- Index pour la table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `failed_password_attempts`
--
ALTER TABLE `failed_password_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `forfait`
--
ALTER TABLE `forfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idForfait` (`forfait_id`),
  ADD KEY `idMachine` (`machine_id`),
  ADD KEY `users_id` (`user_id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forfait`
--
ALTER TABLE `forfait`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `association_ibfk_1` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `association_ibfk_2` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`id`);

--
-- Contraintes pour la table `failed_password_attempts`
--
ALTER TABLE `failed_password_attempts`
  ADD CONSTRAINT `failed_password_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`forfait_id`) REFERENCES `forfait` (`id`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`id`),
  ADD CONSTRAINT `inscriptions_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
