-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 03:33 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

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

-- --------------------------------------------------------

--
-- Table structure for table `cad_produto`
--

CREATE TABLE `cad_produto` (
  `produto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foto_prod`
--

CREATE TABLE `foto_prod` (
  `foto_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `data_upload` datetime NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_cat_prod`
--

CREATE TABLE `ligacao_cat_prod` (
  `cat_prod_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_likes`
--

CREATE TABLE `ligacao_likes` (
  `like_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ligacao_matches`
--

CREATE TABLE `ligacao_matches` (
  `match_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `match_list` mediumtext,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` tinyint(4) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(0, 'INATIVO'),
(1, 'ATIVO'),
(2, 'DELETADO');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `primeiro_nome` varchar(10) NOT NULL,
  `ultimo_nome` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `avatar` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_id` tinyint(4) NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cad_produto`
--
ALTER TABLE `cad_produto`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `usuario_id_produto` (`usuario_id`),
  ADD KEY `status_id_produto` (`status_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `foto_prod`
--
ALTER TABLE `foto_prod`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `produto_id_foto` (`produto_id`),
  ADD KEY `status_id_foto_prod` (`status_id`);

--
-- Indexes for table `ligacao_cat_prod`
--
ALTER TABLE `ligacao_cat_prod`
  ADD PRIMARY KEY (`cat_prod_id`),
  ADD KEY `categoria_id_produto` (`categoria_id`),
  ADD KEY `produto_id_categoria` (`produto_id`);

--
-- Indexes for table `ligacao_likes`
--
ALTER TABLE `ligacao_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `usuario_id_likes` (`usuario_id`),
  ADD KEY `produto_id_likes` (`produto_id`),
  ADD KEY `status_id_likes` (`status_id`);

--
-- Indexes for table `ligacao_matches`
--
ALTER TABLE `ligacao_matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `status_id_match` (`status_id`),
  ADD KEY `usuario_id` (`usuario_id`) USING BTREE;

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `login_unique` (`login`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `ultimo_nome` (`ultimo_nome`),
  ADD KEY `status_id_usuarios` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_produto`
--
ALTER TABLE `cad_produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_prod`
--
ALTER TABLE `foto_prod`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligacao_cat_prod`
--
ALTER TABLE `ligacao_cat_prod`
  MODIFY `cat_prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligacao_likes`
--
ALTER TABLE `ligacao_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligacao_matches`
--
ALTER TABLE `ligacao_matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_status_id_usuarios` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
