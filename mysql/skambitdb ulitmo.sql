-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 03:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skambitdb`
--
CREATE DATABASE IF NOT EXISTS `skambitdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `skambitdb`;

-- --------------------------------------------------------

--
-- Table structure for table `cad_produto`
--

DROP TABLE IF EXISTS `cad_produto`;
CREATE TABLE IF NOT EXISTS `cad_produto` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  PRIMARY KEY (`produto_id`),
  KEY `usuario_id_produto` (`usuario_id`),
  KEY `status_id_produto` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foto_prod`
--

DROP TABLE IF EXISTS `foto_prod`;
CREATE TABLE IF NOT EXISTS `foto_prod` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `data_upload` datetime NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`foto_id`),
  KEY `produto_id_foto` (`produto_id`),
  KEY `status_id_foto_prod` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_cat_prod`
--

DROP TABLE IF EXISTS `ligacao_cat_prod`;
CREATE TABLE IF NOT EXISTS `ligacao_cat_prod` (
  `cat_prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_prod_id`),
  KEY `categoria_id_produto` (`categoria_id`),
  KEY `produto_id_categoria` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_likes`
--

DROP TABLE IF EXISTS `ligacao_likes`;
CREATE TABLE IF NOT EXISTS `ligacao_likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `usuario_id_likes` (`usuario_id`),
  KEY `produto_id_likes` (`produto_id`),
  KEY `status_id_likes` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_matches`
--

DROP TABLE IF EXISTS `ligacao_matches`;
CREATE TABLE IF NOT EXISTS `ligacao_matches` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id_a` int(11) NOT NULL,
  `produto_id_b` int(11) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`match_id`),
  KEY `produto_id_a` (`produto_id_a`),
  KEY `produto_id_b` (`produto_id_b`),
  KEY `status_id_match` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(10) NOT NULL,
  `ultimo_nome` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `avatar` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `login_unique` (`login`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `ultimo_nome` (`ultimo_nome`),
  KEY `status_id_usuarios` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cad_produto`
--
ALTER TABLE `cad_produto`
  ADD CONSTRAINT `fk_status_id_produto` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foto_prod`
--
ALTER TABLE `foto_prod`
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `cad_produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status_id_foto` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ligacao_cat_prod`
--
ALTER TABLE `ligacao_cat_prod`
  ADD CONSTRAINT `fk_categoria_id_lig` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_id_lig` FOREIGN KEY (`produto_id`) REFERENCES `cad_produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ligacao_likes`
--
ALTER TABLE `ligacao_likes`
  ADD CONSTRAINT `fk_produto_id_likes` FOREIGN KEY (`produto_id`) REFERENCES `cad_produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status_id_likes` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_id_likes` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ligacao_matches`
--
ALTER TABLE `ligacao_matches`
  ADD CONSTRAINT `fk_produto_id_a` FOREIGN KEY (`produto_id_a`) REFERENCES `cad_produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_id_b` FOREIGN KEY (`produto_id_b`) REFERENCES `cad_produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status_id_match` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_status_id_usuarios` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
