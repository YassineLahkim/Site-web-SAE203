-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 juin 2024 à 11:44
-- Version du serveur : 5.7.43
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carluxury`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `Client_id` int(11) NOT NULL,
  `Nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresse` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Téléphone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Client_id`, `Nom`, `Email`, `Adresse`, `Téléphone`, `message`) VALUES
(1, 'Germain', 'valere.ger@gmail.com', '4 rue de la Paix', '06.51.45.78.90', '\"J\'ai loué une superbe voiture chez CarLuxury pour mon anniversaire. Le service était excellent et la voiture était en parfait état. Je recommande vivement!\"'),
(2, 'Martin', 'm.25@gmail.com', '6 rue des Mines', '07.89.80.34.23', '\"Une expérience de location fantastique avec CarLuxury. Le processus de réservation était simple et l\'équipe était très professionnelle. Je reviendrai certainement!\"'),
(3, 'Doe', 'John.doe@yahoo.com', '12 rue des Peupliers', '01.02.03.04.05', 'J\'ai loué une voiture pour un voyage d\'affaires et j\'ai été impressionné par la qualité du service. La voiture était impeccable et le personnel était très serviable. Je recommande CarLuxury à tous ceux qui recherchent une location de voiture de luxe!\"');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

DROP TABLE IF EXISTS `louer`;
CREATE TABLE `louer` (
  `Louer_id` int(11) NOT NULL,
  `Client_id` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `Date_début` date NOT NULL,
  `Date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`Louer_id`, `Client_id`, `voiture_id`, `Date_début`, `Date_fin`) VALUES
(1, 1, 1, '2024-02-06', '2024-02-09'),
(2, 2, 2, '2024-03-07', '2024-03-12'),
(3, 3, 3, '2024-04-10', '2024-04-13'),
(4, 4, 4, '2024-05-01', '2024-05-07'),
(5, 5, 5, '2024-05-03', '2024-05-05'),
(6, 6, 6, '2024-05-08', '2024-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE `voiture` (
  `voiture_id` int(11) NOT NULL,
  `marque` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modèle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `année` int(11) NOT NULL,
  `couleur` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_jour` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`voiture_id`, `marque`, `modèle`, `année`, `couleur`, `prix_jour`, `description`, `image`) VALUES
(1, 'BMW', 'M3 F80', 2016, 'Bleu nuit', 130.00, 'Louez la BMW M3 F80 pour une expérience de conduite ultime alliant puissance, luxe et sophistication. Avec ses 425 chevaux sous le capot et son intérieur raffiné en cuir, cette voiture emblématique offre une sensation de vitesse exaltante et un confort absolu sur la route. Réservez dès maintenant et découvrez le plaisir de conduire une légende de l\'automobile.', '/M3'),
(2, 'Mercedes', 'C63S Amg', 2019, 'Noir', 120.00, 'Explorez l\'excitation de la route avec la Mercedes-AMG C63, une fusion de performance, de luxe et d\'élégance. Dotée d\'un moteur V8 biturbo de 4,0 litres et d\'un intérieur sophistiqué en cuir, cette voiture offre une expérience de conduite incomparable. Réservez dès maintenant pour vivre l\'adrénaline de la puissance associée au prestige de Mercedes-Benz.', '/C63S'),
(3, 'Ferrari', '812 Superfast', 2018, 'rouge', 190.00, 'Plongez dans l\'exclusivité de la route avec la Ferrari 812 Superfast, une icône de puissance et de luxe. Propulsée par un moteur V12 de 6,5 litres, cette voiture emblématique allie performance époustouflante et design saisissant. Réservez dès maintenant pour vivre l\'essence de l\'excellence italienne et dompter les routes avec style.', '/812 Superfast'),
(4, 'Lamborghini', 'Aventador SVJ Roadster', 2019, 'Doré', 210.00, 'Plongez dans le monde de l\'extravagance automobile avec la Lamborghini Aventador SVJ Roadster, une fusion audacieuse de puissance et de design. Dotée d\'un moteur V12 atmosphérique et d\'un style indéniablement agressif, cette voiture incarne le summum du luxe et de la performance. Réservez dès maintenant pour vivre l\'adrénaline pure et l\'exclusivité incomparable de Lamborghini sur la route.', '/SVJ'),
(5, 'McLaren', '720S', 2019, 'Orange', 220.00, 'Découvrez l\'élégance et la performance ultime avec la McLaren 720S, une véritable œuvre d\'art de l\'ingénierie automobile. Équipée d\'un moteur V8 biturbo et d\'une conception aérodynamique de pointe, cette voiture offre une expérience de conduite incomparable. Réservez dès maintenant pour ressentir l\'excitation pure de la vitesse et de la technologie de pointe sur la route.', '/720S'),
(6, 'Mercedes ', 'Amg GT', 2018, 'Jaune', 150.00, 'Découvrez le frisson de la route avec la Mercedes-AMG GT, une combinaison parfaite de performance et de style. Équipée d\'un moteur V8 biturbo et d\'un intérieur luxueux en cuir, cette voiture offre une expérience de conduite inoubliable. Réservez dès maintenant et plongez dans l\'élégance intemporelle et la puissance incomparable de Mercedes-AMG sur la route.', '/AMG GT');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Client_id`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`Louer_id`),
  ADD KEY `Client_id` (`Client_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`voiture_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `Client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `louer`
--
ALTER TABLE `louer`
  MODIFY `Louer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `voiture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
