-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 11:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuisine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `nom`, `prenom`, `tel`, `email`, `adresse`) VALUES
(5, 'oussama', '123', 'Tarchoune', 'Oussama', '+21625111001', 'Oussama@gmail.com', '45 Rue Ettatawer, Ain El Karma, Governorate Maedenine'),
(6, 'bilel', '123', 'Bellacheb', 'Bilel', '+21625222002', 'Bilel@gmail', '108 Avenue du Golf Arabe, El Marsa,  Governorate Medenine'),
(7, 'yassine', '123', 'yassine', 'yassin', '22514147', 'yassine@gmail.com', 'Djerba houmet souk');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `prix` float NOT NULL,
  `date` date NOT NULL,
  `datelivraison` date NOT NULL,
  `etat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `idclient`, `idproduit`, `prix`, `date`, `datelivraison`, `etat`) VALUES
(2, 6, 2, 1100, '2024-05-31', '2024-06-10', 'validé'),
(3, 6, 1, 3000, '2024-06-01', '2024-06-11', 'annulée'),
(13, 5, 26, 2000, '2024-06-02', '2024-06-12', 'validé'),
(14, 5, 1, 3000, '2024-06-02', '2024-06-12', 'annulée'),
(15, 7, 19, 1600, '2024-06-02', '2024-06-12', 'En attente');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `Desingation` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `Desingation`, `Description`, `prix`, `image`, `deleted`) VALUES
(1, 'Élégance Urbaine', 'Une cuisine contemporaine avec des lignes épurées, des surfaces brillantes en laque blanche et des accents métalliques.', 3000, 'kitchen1.jpg', 0),
(2, 'Chalet Alpin', 'Une cuisine chaleureuse avec des armoires en bois massif, des plans de travail en granit et des détails en fer forgé.', 1300, 'wall-1.png', 0),
(18, 'Loft Urbain', 'Une cuisine au style industriel avec des matériaux bruts comme le béton, l\'acier et le bois recyclé.', 1200, 'cuisine1.webp', 0),
(19, 'Pureté Nordique', 'Une cuisine lumineuse et minimaliste avec des armoires blanches, des plans de travail en bois clair et des touches de bleu pastel. ', 1600, 'pourquoi.png', 0),
(20, 'Charme Provençal', 'Une cuisine ensoleillée avec des armoires en bois peint, des carreaux de céramique colorés et des plans de travail en marbre. ', 1100, 'images.jpg', 0),
(26, 'Nature Harmonieuse', 'Une cuisine lumineuse et minimaliste avec des armoires blanches, des plans de travail en bois clair et des touches de bleu pastel.', 2000, 'ff.jpg', 1),
(31, 'Luxury cuisine', 'entièrement équipée avec appareils en acier inoxydable, plan de travail en quartz, et nombreux rangements. Design élégant avec éclairage LED intégré, îlot central spacieux et finitions de haute qualité. Idéale pour les amateurs de cuisine et les réceptions conviviales.', 1999, '419722652_1130894734883819_7894322228005536367_n.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`idclient`),
  ADD KEY `produit` (`idproduit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `client` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `produit` FOREIGN KEY (`idproduit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
