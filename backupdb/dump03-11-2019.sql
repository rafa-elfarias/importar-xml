CREATE DATABASE  IF NOT EXISTS `db_care_business` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_care_business`;
-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: db_care_business
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_nfs`
--

DROP TABLE IF EXISTS `tb_nfs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ide_n_nf` varchar(50) DEFAULT NULL, /* Número da NF */
  `ide_dh_emi` datetime NOT NULL, /* Data NF */
  `dest_cnpj` varchar(25) DEFAULT NULL,
  `dest_cpf` varchar(15) DEFAULT NULL,
  `dest_x_nome` varchar(120) DEFAULT NULL,
  `dest_ender_dest_xlgr` varchar(120) DEFAULT NULL,
  `dest_ender_dest_nro` varchar(15) DEFAULT NULL,
  `dest_ender_dest_x_bairro` varchar(50) DEFAULT NULL,
  `dest_ender_dest_c_mun` varchar(15) DEFAULT NULL,
  `dest_ender_dest_x_mun` varchar(50) DEFAULT NULL,
  `dest_ender_dest_uf` varchar(2) DEFAULT NULL,
  `dest_ender_dest_cep` varchar(10) DEFAULT NULL,
  `dest_ender_dest_c_pais` varchar(45) DEFAULT NULL,
  `dest_ind_i_e_dest` varchar(1) DEFAULT NULL,
  `dest_email` varchar(120) DEFAULT NULL,
  `v_pag` decimal(8,2) DEFAULT NULL, /* Valor total da NF */

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;