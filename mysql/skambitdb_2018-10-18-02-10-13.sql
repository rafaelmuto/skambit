-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: skambitdb
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `cad_produto`
--

LOCK TABLES `cad_produto` WRITE;
/*!40000 ALTER TABLE `cad_produto` DISABLE KEYS */;
INSERT INTO `cad_produto` VALUES (1,2,'produto teste','teste do auto date','','2018-10-18 00:11:00',1,1),(2,2,'produto teste','descricao do produto teste, inluido pelo app','','2018-10-18 00:31:18',1,42),(3,2,'produto teste','teste de inclusao de imagem','prod_images/rafaelmuto_20181018083829.jpg','2018-10-18 03:38:29',1,333),(4,2,'fsdab;fk','lsdngkdsbf;','','2018-10-18 08:15:33',1,123143),(5,2,'produto teste','descricao do produto teste, inluido pelo app','prod_images/rafaelmuto_20181018132801.jpg','2018-10-18 08:28:01',1,123);
/*!40000 ALTER TABLE `cad_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `foto_prod`
--

LOCK TABLES `foto_prod` WRITE;
/*!40000 ALTER TABLE `foto_prod` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto_prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ligacao_cat_prod`
--

LOCK TABLES `ligacao_cat_prod` WRITE;
/*!40000 ALTER TABLE `ligacao_cat_prod` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligacao_cat_prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ligacao_likes`
--

LOCK TABLES `ligacao_likes` WRITE;
/*!40000 ALTER TABLE `ligacao_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligacao_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ligacao_matches`
--

LOCK TABLES `ligacao_matches` WRITE;
/*!40000 ALTER TABLE `ligacao_matches` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligacao_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (0,'INATIVO'),(1,'ATIVO'),(2,'DELETADO');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'Rafael','Muto','06429-000','rafaelmuto','$2y$10$FY862djIZRYUX6Jh6SC3wOzK0LQFeyRFeToXy7bcrh9iCqKLft4gu','avatares/20181017044046_rafaelmuto.jpg','r.nagahama@gmail.com','2018-10-18 00:00:00',1,5),(3,'Eumesmo','Ninguemais','01234-000','eumesmo','$2y$10$MobmKrGEWbQbmqupFRnohex/3ckO94.wDJpcqihRzARgr1uz3FySG','avatares/20181017052618_eumesmo.png','eumesmo@qualquerum.ai','2018-10-17 00:00:00',1,5),(4,'Rafael','Shinnok','01234-666','rshinnok','$2y$10$25ZNCdk.NchuQ20Fww2S1eCAWByCD.SS4QXyr7.njuJHCmQcQxkNW','avatares/20181017052816_rshinnok.jpg','rshinnok@mk.game','2018-10-17 00:00:00',1,5);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-18  9:33:13