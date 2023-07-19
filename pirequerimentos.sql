-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/07/2023 às 18:19
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pirequerimentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm/cores`
--

CREATE TABLE `adm/cores` (
  `SIAPE` int(7) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `coord` varchar(45) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` bigint(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `turma` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `curso`, `turma`, `telefone`, `senha`) VALUES
(202013600012, 'Felipe Oliveira Tigre', '202013600012@ifba.edu.br', 'ei', 'EI31', '(73) 98202-5151', '$2y$10$c7ASeHl5KcbOjFS2avo8R.aqT8xsfcspM/a9kbJQmM3WYZd16VP/e'),
(202013600013, 'Felipe2', 'felipe2@gmail.com', 'ei', 'EI12', '(99) 99999-9999', '$2y$10$FB5fTPWCkK.EpVp8YtbF9ukLE0PGWWp52WFB89E/v2uR3xSToNpyi'),
(202013600014, 'Felipe 3', 'felipe3@email.com', 'ei', 'EI21', '(00) 00000-0000', '$2y$10$7wfac.wYI/jNN1RyjI//Eu1RvywcC9IuOVCGRoELs.o9eaOTEw6s2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docentesrequerimento`
--

CREATE TABLE `docentesrequerimento` (
  `idRequerimentos` int(4) NOT NULL,
  `prof1` varchar(45) DEFAULT NULL,
  `prof2` varchar(45) DEFAULT NULL,
  `prof3` varchar(45) DEFAULT NULL,
  `prof4` varchar(45) DEFAULT NULL,
  `prof5` varchar(45) DEFAULT NULL,
  `prof6` varchar(45) DEFAULT NULL,
  `prof7` varchar(45) DEFAULT NULL,
  `prof8` varchar(45) DEFAULT NULL,
  `prof9` varchar(45) DEFAULT NULL,
  `prof10` varchar(45) DEFAULT NULL,
  `prof11` varchar(45) DEFAULT NULL,
  `prof12` varchar(45) DEFAULT NULL,
  `prof13` varchar(45) DEFAULT NULL,
  `prof14` varchar(45) DEFAULT NULL,
  `prof15` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `emailsrequerimento`
--

CREATE TABLE `emailsrequerimento` (
  `idRequerimentos` int(4) NOT NULL,
  `emailProf1` varchar(45) DEFAULT NULL,
  `emailProf2` varchar(45) DEFAULT NULL,
  `emailProf3` varchar(45) DEFAULT NULL,
  `emailProf4` varchar(45) DEFAULT NULL,
  `emailProf5` varchar(45) DEFAULT NULL,
  `emailProf6` varchar(45) DEFAULT NULL,
  `emailProf7` varchar(45) DEFAULT NULL,
  `emailProf8` varchar(45) DEFAULT NULL,
  `emailProf9` varchar(45) DEFAULT NULL,
  `emailProf10` varchar(45) DEFAULT NULL,
  `emailProf11` varchar(45) DEFAULT NULL,
  `emailProf12` varchar(45) DEFAULT NULL,
  `emailProf13` varchar(45) DEFAULT NULL,
  `emailProf14` varchar(45) DEFAULT NULL,
  `emailProf15` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `requerimentos`
--

CREATE TABLE `requerimentos` (
  `idRequerimentos` int(4) NOT NULL,
  `objReq` varchar(45) NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `timeReq` datetime DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `anexos` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sisadmin`
--

CREATE TABLE `sisadmin` (
  `idMaster` int(4) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `sisadmin`
--

INSERT INTO `sisadmin` (`idMaster`, `senha`) VALUES
(99999, '$2y$10$FMb74xw/.8g9QajonyqVReBPTbh1S9F9GvZHdyuCfEtRj3qVhgaNu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm/cores`
--
ALTER TABLE `adm/cores`
  ADD PRIMARY KEY (`SIAPE`),
  ADD UNIQUE KEY `SIAPE` (`SIAPE`,`email`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `matricula` (`matricula`,`email`);

--
-- Índices de tabela `docentesrequerimento`
--
ALTER TABLE `docentesrequerimento`
  ADD PRIMARY KEY (`idRequerimentos`),
  ADD UNIQUE KEY `idRequerimentos` (`idRequerimentos`);

--
-- Índices de tabela `emailsrequerimento`
--
ALTER TABLE `emailsrequerimento`
  ADD PRIMARY KEY (`idRequerimentos`),
  ADD UNIQUE KEY `idRequerimentos` (`idRequerimentos`);

--
-- Índices de tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD PRIMARY KEY (`idRequerimentos`),
  ADD UNIQUE KEY `idRequerimentos` (`idRequerimentos`);

--
-- Índices de tabela `sisadmin`
--
ALTER TABLE `sisadmin`
  ADD PRIMARY KEY (`idMaster`),
  ADD UNIQUE KEY `idMaster` (`idMaster`,`senha`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `docentesrequerimento`
--
ALTER TABLE `docentesrequerimento`
  ADD CONSTRAINT `idRequerimentos` FOREIGN KEY (`idRequerimentos`) REFERENCES `requerimentos` (`idRequerimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `emailsrequerimento`
--
ALTER TABLE `emailsrequerimento`
  ADD CONSTRAINT `idRequerimentos0` FOREIGN KEY (`idRequerimentos`) REFERENCES `requerimentos` (`idRequerimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
