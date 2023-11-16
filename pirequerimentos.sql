-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2023 às 12:35
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` bigint(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `idCursos` int(4) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 3,
  `codigo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `idCursos`, `telefone`, `senha`, `status`, `codigo`) VALUES
(202013600012, 'Felipe 2', '202013600012@ifba.edu.br', 1, '(22) 22222-2222', '$2y$10$L67aHGcEVsCsskj1gFjh/OXG/1Wi6SAATN95aeYBS2jPBcMOVjX6K', 1, '504078'),
(202013600013, 'Felipe 3', '202013600013@ifba.edu.br', 2, '(22) 22222-2', '$2y$10$8BdxwLhzaobk.lWqndRrIuKC2p88Lnn8zMTTf7H/vrkecGHigQFWm', 2, '950793'),
(202013600060, 'Julia Raquel', '202013600060@ifba.edu.br', 1, '(22) 22222-2', '$2y$10$2T4p97q54Cp3hddhEhN4BunnR8S2WBvL2oywwMpu70t9SA.ZmRevK', 1, '201910');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenacao`
--

CREATE TABLE `coordenacao` (
  `SIAPE` int(7) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `coord` int(4) DEFAULT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `coordenacao`
--

INSERT INTO `coordenacao` (`SIAPE`, `nome`, `email`, `coord`, `senha`) VALUES
(111111, 'Cássio Noronha', 'cassio.noronha@ifba.edu.br', 1, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(222222, 'Jorge Dantas', 'jorge.dantas@ifba.edu.br', 2, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(3333333, 'Nadja Nubiaa', 'nadja.nubia@ifba.edu.br', 3, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(4) NOT NULL,
  `coordenador` int(7) NOT NULL,
  `nomeCurso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `coordenador`, `nomeCurso`) VALUES
(1, 111111, 'Informática'),
(2, 222222, 'Edificações'),
(3, 3333333, 'Meio Ambiente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docentes`
--

CREATE TABLE `docentes` (
  `idRequerimento` int(4) NOT NULL,
  `nomeDocente` varchar(45) DEFAULT NULL,
  `emailDocente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerimentos`
--

CREATE TABLE `requerimentos` (
  `idRequerimentos` int(4) NOT NULL,
  `idAluno` bigint(12) DEFAULT NULL,
  `idCurso` int(4) NOT NULL,
  `objReq` varchar(45) NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `anexos` varchar(600) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `registroEnviado` datetime DEFAULT NULL,
  `registroProtocolado` datetime DEFAULT NULL,
  `registroDeferido` datetime DEFAULT NULL,
  `registroConcluido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `requerimentos`
--

INSERT INTO `requerimentos` (`idRequerimentos`, `idAluno`, `idCurso`, `objReq`, `dataInicio`, `dataFim`, `obs`, `anexos`, `status`, `registroEnviado`, `registroProtocolado`, `registroDeferido`, `registroConcluido`) VALUES
(1, 202013600012, 1, '2', '2023-01-01', '2023-01-01', 'teste teste ', '\'C:/xampp/htdocs/PIRequerimentos/anexos/202013600012_2023_11_01_03_22_32.pdf\'', '1', '2023-11-01 03:22:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisadmin`
--

CREATE TABLE `sisadmin` (
  `idMaster` int(4) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `sisadmin`
--

INSERT INTO `sisadmin` (`idMaster`, `senha`) VALUES
(99999, '$2y$10$bn1ZzOJIkg2e/bhnvZMRZ.hLKNeKQagcat45Ru7iS5Rgj/39lB/xu');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `matricula` (`matricula`,`email`),
  ADD KEY `idCurso_idx` (`idCursos`);

--
-- Índices para tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD PRIMARY KEY (`SIAPE`),
  ADD UNIQUE KEY `SIAPE` (`SIAPE`,`email`),
  ADD KEY `coord_idx_idx` (`coord`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `coordenador_idx_idx` (`coordenador`);

--
-- Índices para tabela `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idRequerimento`);

--
-- Índices para tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD PRIMARY KEY (`idRequerimentos`),
  ADD UNIQUE KEY `idRequerimentos` (`idRequerimentos`),
  ADD KEY `idAluno_idx` (`idAluno`);

--
-- Índices para tabela `sisadmin`
--
ALTER TABLE `sisadmin`
  ADD PRIMARY KEY (`idMaster`),
  ADD UNIQUE KEY `idMaster` (`idMaster`,`senha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  MODIFY `idRequerimentos` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD CONSTRAINT `coord_idx` FOREIGN KEY (`coord`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `coordenador_idx` FOREIGN KEY (`coordenador`) REFERENCES `coordenacao` (`SIAPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `idRequerimentos_idx` FOREIGN KEY (`idRequerimento`) REFERENCES `requerimentos` (`idRequerimentos`);

--
-- Limitadores para a tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD CONSTRAINT `idAluno_idx` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
