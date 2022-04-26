-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Nov-2016 às 03:53
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamados`
--
CREATE DATABASE IF NOT EXISTS `chamados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chamados`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `CAT_ID` int(6) NOT NULL,
  `CAT_NOME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`CAT_ID`, `CAT_NOME`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Defeito'),
(4, 'Solicitacao'),
(7, 'Internet');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `CHA_ID` int(6) NOT NULL,
  `CAT_ID` int(6) NOT NULL,
  `CHA_ASSUNTO` varchar(60) NOT NULL,
  `CHA_DESCRICAO` varchar(5000) NOT NULL,
  `CHA_STATUS` int(1) NOT NULL,
  `CHA_SOLICITANTE` varchar(20) NOT NULL,
  `CHA_RESPONSAVEL` varchar(20) NOT NULL,
  `CHA_DT_ABERTURA` date DEFAULT NULL,
  `CHA_DT_SOLUCAO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`CHA_ID`, `CAT_ID`, `CHA_ASSUNTO`, `CHA_DESCRICAO`, `CHA_STATUS`, `CHA_SOLICITANTE`, `CHA_RESPONSAVEL`, `CHA_DT_ABERTURA`, `CHA_DT_SOLUCAO`) VALUES
(23, 3, 'Problemas ao Concatenar', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Marina de Oliveira em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nBom dia,\r\n\r\nEstou com problemas no Excel ao tentar concatenar um arquivo!\r\n\r\nAtt,\r\nMarina', 1, 'marina', 'T.I.', '2016-11-16', '0000-00-00'),
(24, 1, 'Problema com o ERP', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Marina de Oliveira em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nThiago,\r\n\r\nErro de Java!\r\n\r\nAtt,\r\nMarina\n\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Thiago Oliveira Teberga em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nMarina, boa tarde!\r\n\r\nQual erro o sistema estÃ¡ apresentando?\r\n\r\nAtt,\r\nThiago Teberga\r\n\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Marina de Oliveira em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nBom dia,\r\n\r\nO ERP vem apresentando erro de conexÃ£o com frequencia!\r\n\r\nAtt,\r\nMarina', 3, 'marina', 'tteberga', '2016-11-16', '0000-00-00'),
(25, 2, 'Troca de Mouse', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Thiago Oliveira Teberga em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nMarina, boa tarde!\r\n\r\nO mouse jÃ¡ foi comprado e trocado, estou encerrando o chamado!\r\n\r\nAtt,\r\nThiago Teberga\n\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Marina de Oliveira em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nBom dia,\r\n\r\nMeu mouse estÃ¡ travando e o led estÃ¡ deligando, poderia trocar o mesmo?\r\n\r\nAtt,\r\nMarina', 0, 'marina', 'tteberga', '2016-11-16', '2016-11-16'),
(26, 2, 'Troca de Computador', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Thiago Oliveira Teberga em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nJÃ©ssica,\r\n\r\nFizemos a solcitaÃ§Ã£o de compra do mesmo, em breve o computador estarÃ¡ disponÃ­vel.\r\n\r\nAtt,\r\nThiago Teberga\n\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Jessica Reis em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nBom dia, \r\n\r\nMeu computador estÃ¡ muito lento, e por ser antigo, solicito a troca!\r\n\r\nAtt,\r\nJÃ©ssica Reis', 0, 'jreis', 'tteberga', '2016-11-16', '2016-11-16'),
(27, 4, 'InstalaÃ§Ã£o do Office', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Jessica Reis em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nBom dia,\r\n\r\nSolicito a instalaÃ§Ã£o do Pacote Office atualizado!\r\n\r\nAtt,\r\nJÃ©ssica Reis', 1, 'jreis', 'T.I.', '2016-11-16', '0000-00-00'),
(28, 3, 'Monitor Piscando', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Thiago Oliveira Teberga em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nJessica,\r\n\r\nPor favor, verifique se o cabo de energia estÃ¡ bem encaixado!\r\n\r\nAtt,\r\nThiago Teberga\n\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Jessica Reis em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nBoa tarde,\r\n\r\nMeu monitor estÃ¡ piscando com muita frequencia!\r\n\r\nAtt,\r\nJÃ©ssica Reis', 2, 'jreis', 'tteberga', '2016-11-16', '0000-00-00'),
(29, 4, 'Criar UsuÃ¡rio no ASTRO', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Adriano SilvÃ©rio de Oliveira em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nBoa noite,\r\n\r\nSolicito criaÃ§Ã£o de usuÃ¡rio no sistema Astro!\r\n\r\nAtt,\r\nAdriano SilvÃ©rio', 1, 'adriano', 'T.I.', '2016-11-16', '0000-00-00'),
(30, 4, 'InstalaÃ§Ã£o do Astro', '\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nEnviado por: Thiago Oliveira Teberga em 16/11/2016\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \nAdriano, bom dia!\r\n\r\nConforme solicitado, o sistema foi instalado na sua mÃ¡quina essa manhÃ£!\r\nCaso haja algum problema, entre em contato!\r\n\r\nAtt,\r\nThiago Teberga\n\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nEnviado por: Adriano SilvÃ©rio de Oliveira em 16/11/2016\r\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \r\nBom dia,\r\n\r\nPreciso que o sistema seja instalado na minha mÃ¡quina!\r\n\r\nAtt,\r\nAdriano', 0, 'adriano', 'tteberga', '2016-11-16', '2016-11-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `STA_ID` int(6) NOT NULL,
  `STA_NOME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`STA_ID`, `STA_NOME`) VALUES
(0, 'Encerrado'),
(1, 'Aberto'),
(2, 'Pendente Cliente'),
(3, 'Pendente Suporte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `USU_LOGIN` varchar(20) NOT NULL,
  `USU_SENHA` varchar(20) NOT NULL,
  `USU_NOME` varchar(80) NOT NULL,
  `USU_ACESSO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`USU_LOGIN`, `USU_SENHA`, `USU_NOME`, `USU_ACESSO`) VALUES
('admin', 'admin', 'Administrador', 1),
('adriano', 'adriano', 'Adriano SilvÃ©rio de Oliveira', 2),
('jreis', 'jreis', 'Jessica Reis', 2),
('marina', 'marina', 'Marina de Oliveira', 2),
('tati', 'tati', 'Tatiane Tolentino', 1),
('tteberga', 'tteberga', 'Thiago Oliveira Teberga', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`CHA_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USU_LOGIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CAT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `chamado`
--
ALTER TABLE `chamado`
  MODIFY `CHA_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
