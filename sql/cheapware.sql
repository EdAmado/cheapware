-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2023 às 19:04
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cheapware`
--
DROP DATABASE IF EXISTS `cheapware`;
CREATE DATABASE `cheapware` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cheapware`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE IF NOT EXISTS `utilizador` (
  `id_utilizador`INT NOT NULL AUTO_INCREMENT,
  `nomeutilizador` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `contacto` int(9) unique DEFAULT NULL,
  `id_postal` int unique NULL,
  `nif` int(9) unique DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilizador`),
  KEY `FK_utilizador_postal` (`id_postal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postal`
--

CREATE TABLE IF NOT EXISTS `postal` (
  `id_postal` INT NOT NULL AUTO_INCREMENT,
  `codigo` varchar(8) NOT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_postal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE IF NOT EXISTS `tipoproduto` (
  `id_tipoproduto` INT NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
   PRIMARY KEY (`id_tipoproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `id_tipoproduto` INT NOT NULL,
  `nomeproduto` varchar(50) DEFAULT NULL,
  `descricaoproduto` varchar(50) DEFAULT NULL,
  `precounitario` varchar(9) DEFAULT NULL,
  `quantidadestock` int(11) DEFAULT NULL,
  `imgproduto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `FK_produto_tipoproduto` (`id_tipoproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `novidade`
--

CREATE TABLE IF NOT EXISTS `novidade` (
  `id_novidade` INT NOT NULL AUTO_INCREMENT,
  `titulonovidade` varchar(50) DEFAULT NULL,
  `descricaonovidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
   PRIMARY KEY (`id_novidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE IF NOT EXISTS `favorito` (
  `id_utilizador` int NOT NULL,
  `id_produto` int NOT NULL,
  PRIMARY KEY (`id_utilizador`, `id_produto`),
KEY `FK_favorito_utilizador` (`id_utilizador`),
KEY `FK_favorito_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_carrinho` INT NOT NULL AUTO_INCREMENT,
  `id_produto` int NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrinho`),
KEY `FK_carrinho_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` INT NOT NULL AUTO_INCREMENT,
  `id_utilizador` int NOT NULL,
  `id_carrinho` int NOT NULL,
  `datacompra` datetime DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
KEY `FK_compra_utilizador` (`id_utilizador`),
KEY `FK_compra_carrinho` (`id_carrinho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserção dos dados na tabela `postal`
--

INSERT INTO `postal` (codigo,localidade) VALUES 
("1234-123", "Santarem"),
("1124-321", "Leiria"),
("4211-213", "Lisboa"),
("2114-231", "Aveiro");

--
-- Inserção dos dados na tabela `utilizador`
--

INSERT INTO `utilizador` (nomeutilizador, email, password, endereco, contacto, id_postal, nif, cargo) VALUES
("Joao", "joao@example.com", MD5("joao1124"), "Rua Exemplo n1", 910000001, 2, 100000001, "funcionario"),
("Mario", "mario@example.com", MD5("mario1124"), "Rua Exemplo n2", 910000002, 1, 100000002, "cliente"),
("Duarte", "duarte@example.com", MD5("duarte1124"), "Rua Exemplo n3", 910000003, 4, 100000003, "cliente"),
("Rute", "rute@example.com", MD5("rute1124"), "Rua Exemplo n4", 910000004, 3, 100000004, "admin");

--
-- Inserção dos dados na tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (tipo) VALUES
("Processador"),
("Motherboard"),
("Memoria Ram"),
("Armazenamento"),
("Placas graficas"),
("Cooler Processador"),
("Caixa"),
("Fonte de alimentacao"),
("Rato"),
("Teclado"),
("Fones de ouvido"),
("Monitor"),
("Tapete de rato"),
("Computadores");

--
-- Inserção dos dados na tabela `produto`
--

INSERT INTO `produto` (id_tipoproduto, nomeproduto, descricaoproduto, precounitario, quantidadestock, imgproduto) VALUES
(1, "Ryzen 5 5600", "descricao", 149.90, 50, "processador.png"),
(1, "Ryzen 7 5800", "descricao", 250.00, 50, "processador.png"),
(1, "Intel Core i5 12600k", "descricao", 489.90, 50, "processador.png"),
(2, "B550 ", "descricao", 250.00, 50, "motherboards.png"),
(2, "B570", "descricao", 250.00, 50, "motherboards.png"),
(2, "B560", "descricao", 250.00, 50, "motherboards.png"),
(3, "GSKILL 16Gb", "descricao", 250.00, 50, "ram.png"),
(3, "Corsair", "descricao", 250.00, 50, "ram.png"),
(3, "TForce", "descricao", 250.00, 50, "ram.png"),
(4, "Western Digital Black SN770 1Tb", "descricao", 250.00, 50, "armazenamento.png"),
(4, "Kingston 240Gb", "descricao", 250.00, 50, "armazenamento.png"),
(5, "RTX 3060", "descricao", 250.00, 50, "graficas.png"),
(5, "Radeon Rx6600", "descricao", 250.00, 50, "graficas.png"),
(5, "Radeon Rx6600XT", "descricao", 250.00, 50, "graficas.png"),
(6, "Arctic Liquid Freezer II", "descricao", 250.00, 50, "cooler.png"),
(6, "Be Quiet Dark Rock 4", "descricao", 250.00, 50, "cooler.png"),
(7, "NZXT H510 Flow", "descricao", 250.00, 50, "caixa.png"),
(8, "Seasonic 750Watts 80 GOLD+", "descricao", 250.00, 50, "fonte.png"),
(8, "Kolink 700Watts 80 GOLD+", "descricao", 250.00, 50, "fonte.png"),
(9, "Logitech GPRO Superlight", "descricao", 250.00, 50, "mouse.png"),
(9, "Razer Viper Mini", "descricao", 250.00, 50, "mouse.png"),
(10, "Razer BlackWidowv3", "descricao", 250.00, 50, "keyboard.png"),
(10, "Razer Ornata", "descricao", 250.00, 50, "keyboard.png"),
(11, "Logitech GPROX", "descricao", 250.00, 50, "headphone.png"),
(11, "Razer Kraken", "descricao", 250.00, 50, "headphone.png"),
(12, "LG 22mk", "descricao", 250.00, 50, "monitor.png"),
(12, "LG 24mk", "descricao", 250.00, 50, "monitor.png"),
(13, "Xtrfy GP4", "descricao", 250.00, 50, "mousepad.png"),
(13, "Logitech G640", "descricao", 250.00, 50, "mousepad.png"),
(14, "Computador1", "descricao", 250.00, 50, "computadores.png"),
(14, "Computador2", "descricao", 250.00, 50, "computadores.png");

/*
  exemplo original da inserção de dados:
INSERT INTO nome_tabela (campo1,data1,numero1) VALUES 
("blabla", "1970-01-01 00:00:01", 299785213);
*/

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_produto_tipoproduto` FOREIGN KEY (`id_tipoproduto`) REFERENCES `tipoproduto` (`id_tipoproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `FK_favorito_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_favorito_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `FK_carrinho_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `FK_compra_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_compra_carrinho` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`id_carrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `FK_utilizador_postal` FOREIGN KEY (`id_postal`) REFERENCES `postal` (`id_postal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
