-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2010 at 01:12 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_data`
--

CREATE TABLE IF NOT EXISTS `blog_data` (
  `usuario` varchar(15) COLLATE latin1_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `dato` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`usuario`,`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `blog_data`
--

INSERT INTO `blog_data` (`usuario`, `fecha`, `dato`) VALUES
('usuario2', '2009-05-17 18:28:17', '1'),
('usuario2', '2009-05-17 18:28:22', '2'),
('usuario2', '2009-05-17 18:28:24', '3'),
('usuario2', '2009-05-17 18:28:25', '4'),
('usuario2', '2009-05-17 18:28:26', '5'),
('usuario2', '2009-05-17 18:28:28', '6'),
('usuario2', '2009-05-17 18:28:29', '7'),
('usuario2', '2009-05-17 18:28:31', '8'),
('usuario2', '2009-05-17 18:28:33', '9'),
('usuario2', '2009-05-17 18:28:37', '10'),
('usuario2', '2009-05-17 18:28:40', '11'),
('usuario2', '2009-05-17 18:28:41', '12'),
('usuario2', '2009-05-17 18:28:43', '13'),
('usuario2', '2009-05-17 18:28:45', '14'),
('usuario2', '2009-05-17 18:28:47', '15'),
('usuario2', '2009-05-17 18:28:49', '16'),
('usuario2', '2009-05-17 18:28:50', '17'),
('usuario2', '2009-05-17 18:28:52', '18'),
('usuario2', '2009-05-17 18:28:55', '19'),
('usuario2', '2009-05-17 18:28:57', '20'),
('usuario2', '2009-05-17 18:28:58', '21'),
('usuario2', '2009-05-17 18:28:59', '22'),
('usuario2', '2009-05-17 18:29:01', '23'),
('usuario2', '2009-05-17 18:29:03', '24'),
('usuario2', '2009-05-17 18:29:05', '25'),
('usuario2', '2009-05-17 18:29:08', '26'),
('usuario2', '2009-05-17 18:29:12', '27'),
('usuario2', '2009-05-17 18:29:13', '28'),
('usuario2', '2009-05-17 18:29:15', '29'),
('usuario2', '2009-05-17 18:29:18', '30'),
('usuario2', '2009-05-17 18:29:21', '31'),
('usuario2', '2009-05-17 18:29:23', '32'),
('usuario2', '2009-05-17 18:29:26', '33'),
('usuario2', '2009-05-17 18:29:28', '34'),
('usuario2', '2009-05-17 18:29:30', '35'),
('usuario2', '2009-05-17 18:29:32', '36'),
('usuario2', '2009-05-17 18:29:34', '37'),
('usuario2', '2009-05-17 18:29:36', '38'),
('usuario2', '2009-05-17 18:29:38', '39'),
('usuario2', '2009-05-17 18:29:41', '40'),
('truenite', '2009-05-17 18:30:01', 'Veamos'),
('truenite', '2009-05-17 18:30:09', 'Hmm'),
('truenite', '2009-05-17 18:30:17', 'Chale'),
('truenite', '2009-05-17 18:30:23', 'HMM'),
('truenite', '2009-05-17 18:31:33', 'Que ondas'),
('truenite', '2009-05-17 18:31:47', 'Tengo weba!!'),
('truenite', '2009-05-17 18:31:55', 'Neeel'),
('pepetrueno', '2009-05-17 18:58:07', 'Checa'),
('pepetrueno', '2009-05-17 19:00:09', 'NOO QUEDAAA'),
('usuario2', '2009-05-17 19:37:01', 'PFFF'),
('ultima', '2009-05-17 20:34:02', 'Nada'),
('kika', '2009-05-18 09:18:48', 'Calificando'),
('truenite', '2010-03-25 04:45:27', 'holas'),
('truenite2', '2010-03-25 04:46:53', 'Nadaa!!'),
('truenite', '2010-10-25 01:03:06', 'asdfasdfa');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE IF NOT EXISTS `followings` (
  `usuario` varchar(15) COLLATE latin1_bin NOT NULL,
  `followin` varchar(15) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`usuario`,`followin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`usuario`, `followin`) VALUES
('kika', 'truenite'),
('pepetrueno', 'usuario2'),
('truenite', 'ultima'),
('truenite', 'usuario2'),
('truenite2', 'truenite'),
('ultima', 'pepetrueno'),
('ultima', 'truenite'),
('usuario2', 'truenite');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `mail`) VALUES
('truenite', '639b3c3dea95556c23d288c6b9ece75c', 'pepetruen0@hotmail.com'),
('usuario2', '639b3c3dea95556c23d288c6b9ece75c', 'bla@ba.com'),
('pepetrueno', '639b3c3dea95556c23d288c6b9ece75c', 'pepetruen0@hotmail.com'),
('ultima', '639b3c3dea95556c23d288c6b9ece75c', 'bla@ba.com'),
('kika', '926e27eecdbc7a18858b3798ba99bddd', 'bla@ba.com'),
('truenite2', '639b3c3dea95556c23d288c6b9ece75c', 'admin@truenite.net');
