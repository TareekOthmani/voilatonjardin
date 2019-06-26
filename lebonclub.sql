-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2019 at 03:11 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.18-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lebonclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `club_type` text CHARACTER SET utf8 NOT NULL,
  `detail` text CHARACTER SET utf8 NOT NULL,
  `effectif` int(11) NOT NULL,
  `monday_friday_open_hour` varchar(10) NOT NULL,
  `saturday_open_hour` varchar(10) NOT NULL,
  `sunday_open_hour` varchar(10) NOT NULL,
  `monday_friday_close_hour` varchar(10) NOT NULL,
  `saturday_close_hour` varchar(10) NOT NULL,
  `sunday_close_hour` varchar(10) NOT NULL,
  `adress` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gallery` (`id`, `name`, `img`, `club_type`, `detail`, `effectif`, `monday_friday_open_hour`, `saturday_open_hour`, `sunday_open_hour`, `monday_friday_close_hour`, `saturday_close_hour`, `sunday_close_hour`, `adress`) VALUES
(1,	'Hannibal kids',	'images/han_kids.jpg',	'Loisirs',	'club d\'enfant \"Hannibal kids\" etait crée depuis 2002, il est connu par son organisation aisni que leur discipline  ',	6,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'monastir,5000'),
(2,	'Tarkiz',	'images/tarkiz.jpg',	'Autres',	'Il s\'agit du premier club interactif interactif pour enfants développé par Mme Khadija Obaidi, titulaire du certificat de propriété intellectuelle en République tunisienne.',	7,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'monastir,5000'),
(3,	'Corniche Club Enfants',	'images/corniche.jpg',	'dessin,loisirs',	'Corniche Club Enfants est un club trés connu par ses differents activités durant toute l\'année ainsi que ses Prix.',	7,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'Avenue de la Corniche, Monastir 5000'),
(4,	'Brico KID',	'images/briko_kid.jpg',	'robotique, peinture, cuisine, couture, théâtre, Diy, médecine, lecture, Art, Cinéma, Radio, start_up, électronique',	'BRICO KID offre plusieurs activités  : bricolage, science, technologie, jardinage, lecture, sortie, journalisme ...\r\nCes activités ont pour objectif de transmettre aux enfants des savoirs, de connaissances, de dialogue, de culture et de traditions....',	10,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'R4 devant Spring Land'),
(5,	'Club d\'enfant',	'images/act1.jpeg',	'',	'Lorem ipsum dolor sit amet, ex mea eius velit consequat',	5,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'stah jabeur monastir'),
(6,	'Club d\'enfant',	'images/act2.jpg',	'',	'Lorem ipsum dolor sit amet, ex mea eius velit consequat',	0,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'stah jabeur monastir'),
(7,	'Club d\'enfant',	'images/act3.jpg',	'',	'Lorem ipsum dolor sit amet, ex mea eius velit consequat',	5,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'\r\n'),
(8,	'Club d\'enfant',	'images/act4.jpg',	'',	'Lorem ipsum dolor sit amet, ex mea eius velit consequat',	5,	'07:30',	'07:30',	'close',	'17:30',	'13:30',	'close',	'');

DROP TABLE IF EXISTS `inscri`;
CREATE TABLE `inscri` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `metadata` json NOT NULL,
  `club_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `inscri` (`id`, `metadata`, `club_id`) VALUES
(1,	'{\"gender\": \"M\", \"number\": \"fzrgte\", \"location\": \"stah jabeur monastir\", \"name_last\": \"fezrget\", \"name_child\": \"fezrge\", \"name_first\": \"czrget\", \"profession\": \"ferziiit\"}',	0),
(2,	'{\"gender\": \"F\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"efrgteh\", \"name_child\": \"fezrge\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	0),
(3,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"efrgteh\", \"name_child\": \"fegrztehyr\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	0),
(4,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"efrgteh\", \"name_child\": \"fegrztehyr\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	0),
(5,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"efrgteh\", \"name_child\": \"fegrztehyr\", \"name_first\": \"czrget\", \"profession\": \"fzrget\"}',	1),
(6,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"efrgteh\", \"name_child\": \"fezrge\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	1),
(7,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"fezrget\", \"name_child\": \"fegrztehyr\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	0),
(8,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"fezrget\", \"name_child\": \"fegrztehyr\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	0),
(10,	'{\"gender\": \"M\", \"number\": \"52962842\", \"location\": \"stah jabeur monastir\", \"name_last\": \"fezrget\", \"name_child\": \"fezrge\", \"name_first\": \"dferzgteh\", \"profession\": \"fzrget\"}',	1);

-- 2019-06-11 21:09:25
