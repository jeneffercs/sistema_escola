-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.17-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_escola
CREATE DATABASE IF NOT EXISTS `db_escola` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_escola`;

-- Copiando estrutura para tabela db_escola.tb_enderecos
CREATE TABLE IF NOT EXISTS `tb_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cep` char(8) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_escola.tb_enderecos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_enderecos` DISABLE KEYS */;
INSERT INTO `tb_enderecos` (`id`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `complemento`, `id_usuario`) VALUES
	(3, 'Rua Amélia Michelazzo Penha', 'Jardim dos Reis', '213', '13873206', 'São João da Boa Vista', 'SP', '', 4),
	(4, 'Rua Frei Caneca', 'Centro', '159', '13870235', 'São João da Boa Vista', 'SP', '', 5),
	(5, 'Rua Antônio Tavares', 'Vila Carvalho', '256', '13870258', 'São João da Boa Vista', 'SP', '', 6),
	(6, 'Rua Antônio Tavares', 'Vila Carvalho', '123', '13870258', 'São João da Boa Vista', 'SP', '', 7);
/*!40000 ALTER TABLE `tb_enderecos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_escola.tb_tipos
CREATE TABLE IF NOT EXISTS `tb_tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_escola.tb_tipos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipos` DISABLE KEYS */;
INSERT INTO `tb_tipos` (`id`, `tipo`, `ativo`, `data_cadastro`) VALUES
	(1, 'Aluno', b'1', '2022-11-01 21:32:17'),
	(2, 'Professor', b'1', '2022-11-01 21:32:22');
/*!40000 ALTER TABLE `tb_tipos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_escola.tb_usuarios
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` char(11) NOT NULL DEFAULT '',
  `telefone` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(50) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_escola.tb_usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `data_nascimento`, `senha`, `ativo`, `data_cadastro`, `id_tipo`) VALUES
	(4, 'Thiago Silva', 'tmb85@hotmail.com', '15161651651', '19818184845', '1985-12-16', '251930fe2331f88923aa010d84701062783032ff', b'1', '2022-11-03 22:11:07', 2),
	(5, 'Izabel Silva', 'izabel@hotmai.com', '16916516516', '19894949948', '1885-12-25', '3257008154b936013a7dc8e6c04de5ca00dee900', b'1', '2022-11-04 19:36:04', 1),
	(6, 'Eros Eduardo', 'eros@hotmail.com', '19819818919', '19181919818', '2000-12-16', 'd356c6ea9b81127051a06ad39d1ef9a4806e9186', b'1', '2022-11-04 19:37:38', 1),
	(7, 'Angelo', 'angelo@hotmail.com', '69498498498', '19879595957', '1992-04-05', 'dfd8cfa0274653e9baa7d704d4edefb05dcd954c', b'1', '2022-11-07 22:17:09', 1);
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
