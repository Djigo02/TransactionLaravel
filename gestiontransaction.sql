-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 mars 2024 à 03:14
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiontransaction`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RIB` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `typecompte` bigint(20) UNSIGNED NOT NULL,
  `typepack` bigint(20) UNSIGNED NOT NULL,
  `idutilisateur` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `RIB`, `solde`, `status`, `typecompte`, `typepack`, `idutilisateur`, `created_at`, `updated_at`) VALUES
(1, 897366, 301000, 1, 2, 1, 1, '2024-03-03 16:38:56', '2024-03-12 01:09:25'),
(2, 620826, 3855000, 1, 1, 2, 1, '2024-03-03 22:30:38', '2024-03-12 00:59:39'),
(3, 114862, 20000, 0, 1, 2, 7, '2024-03-10 15:37:13', '2024-03-12 01:09:34'),
(5, 311953, 500, 1, 2, 1, 7, '2024-03-10 16:21:45', '2024-03-10 16:21:45');

-- --------------------------------------------------------

--
-- Structure de la table `depots`
--

CREATE TABLE `depots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RIB` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `idutilisateur` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depots`
--

INSERT INTO `depots` (`id`, `RIB`, `solde`, `idutilisateur`, `created_at`, `updated_at`) VALUES
(1, 897366, 200000, 4, '2024-03-03 23:49:19', '2024-03-03 23:49:19'),
(2, 620826, 4000, 4, '2024-03-11 13:15:05', '2024-03-11 13:15:05'),
(3, 897366, 1000, 4, '2024-03-11 13:21:21', '2024-03-11 13:21:21');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_02_211039_create_profils_table', 1),
(6, '2024_03_02_211236_create_utilisateurs_table', 1),
(7, '2024_03_03_135054_create_tcomptes_table', 2),
(8, '2024_03_03_135154_create_packs_table', 3),
(9, '2024_03_03_145053_create_comptes_table', 4),
(10, '2024_03_04_004346_create_depots_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

CREATE TABLE `packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(15) NOT NULL,
  `agio` int(11) NOT NULL,
  `plafond` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`id`, `type`, `agio`, `plafond`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 3000, 1000000, NULL, NULL),
(2, 'Premium', 5000, 5000000, NULL, NULL),
(3, 'Gold', 12000, 2147483647, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Client', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Guichetier', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tcomptes`
--

CREATE TABLE `tcomptes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tcomptes`
--

INSERT INTO `tcomptes` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Courant', NULL, NULL),
(2, 'Epargne', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `idProfil` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `telephone`, `email`, `motdepasse`, `idProfil`, `created_at`, `updated_at`) VALUES
(1, 'Djigo', 'MOUHAMAD', '777777777', 'mehmetdjigo@gmail.com', '$2y$12$SFSstguJgQfS3poqpBk8.OgiF7URYcD79cFCs7JvoxKJzc.9X8NrO', 1, '2024-03-02 23:48:40', '2024-03-02 23:48:40'),
(2, 'Ly', 'Abdoulaye', '777789878', 'ably@gmail.com', '$2y$12$6KBf3O/5gZL/plPkzHFoPuM.4l82MO8YprVOT/j9NagByJyRynTIa', 1, '2024-03-03 00:06:18', '2024-03-03 00:06:18'),
(3, 'Diop', 'Moustapha', '77 890 09 87', 'moustapha@gmail.com', '$2y$12$5FIRRshHjDKHdWG03KIfpOnM5rEW7Hwv78S1F1E4G7AqHmii6CbgS', 2, '2024-03-03 22:49:28', '2024-03-03 22:49:28'),
(4, 'Djigo', 'Cheikh', '77 216 91 62', 'cheikh@gmail.com', '$2y$12$vB4xV2/SFE81K3Gx95DaGeDmzVlGlZqhDtSnHsVBUxP0Ekv6QH.2W', 3, '2024-03-03 22:50:34', '2024-03-03 22:50:34'),
(7, 'Wade', 'Gora Dia', '76666673', 'gora@finance.sn', '$2y$12$yYOGluwJq.dL8ireCSytaeXhkvxHP1EQALAx1EHySNT.zaA8xELl.', 1, '2024-03-10 13:58:48', '2024-03-10 13:58:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comptes_rib_unique` (`RIB`),
  ADD KEY `comptes_typecompte_foreign` (`typecompte`),
  ADD KEY `comptes_typepack_foreign` (`typepack`),
  ADD KEY `comptes_idutilisateur_foreign` (`idutilisateur`);

--
-- Index pour la table `depots`
--
ALTER TABLE `depots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depots_idutilisateur_foreign` (`idutilisateur`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tcomptes`
--
ALTER TABLE `tcomptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateurs_idprofil_foreign` (`idProfil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `depots`
--
ALTER TABLE `depots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tcomptes`
--
ALTER TABLE `tcomptes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_idutilisateur_foreign` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `comptes_typecompte_foreign` FOREIGN KEY (`typecompte`) REFERENCES `tcomptes` (`id`),
  ADD CONSTRAINT `comptes_typepack_foreign` FOREIGN KEY (`typepack`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `depots`
--
ALTER TABLE `depots`
  ADD CONSTRAINT `depots_idutilisateur_foreign` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_idprofil_foreign` FOREIGN KEY (`idProfil`) REFERENCES `profils` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
