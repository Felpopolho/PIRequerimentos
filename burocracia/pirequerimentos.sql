-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2023 às 22:10
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
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` bigint(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `idCursos` int(4) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `idCursos`, `telefone`, `senha`) VALUES
(202013600011, 'Felipe 1', '202013600011@ifba.edu.br', 1, '(11) 11111-1111', '$2y$10$OU422A.ysq7RuBts3bdGiOIIvmLq94U.5U0m0gLp5.Wimb2Iuo9fS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `coordenacao`
--

CREATE TABLE `coordenacao` (
  `SIAPE` int(7) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `coord` int(4) DEFAULT NULL,
  `senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `coordenacao`
--

INSERT INTO `coordenacao` (`SIAPE`, `nome`, `email`, `coord`, `senha`) VALUES
(111111, 'Cássio Noronha', 'cassio.noronha@ifba.edu.br', 1, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(222222, 'Jorge Dantas', 'jorge.dantas@ifba.edu.br', 2, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(3333333, 'Nadja Nubia', 'nadja.nubia@ifba.edu.br', 3, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(4) NOT NULL,
  `coordenador` int(7) NOT NULL,
  `nomeCurso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `coordenador`, `nomeCurso`) VALUES
(1, 111111, 'Informática'),
(2, 222222, 'Edificações'),
(3, 3333333, 'Meio Ambiente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docentes`
--

CREATE TABLE `docentes` (
  `idRequerimento` int(4) NOT NULL,
  `nomeDocente` varchar(45) DEFAULT NULL,
  `emailDocente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `requerimentos`
--

CREATE TABLE `requerimentos` (
  `idRequerimentos` int(4) NOT NULL,
  `idAluno` bigint(12) DEFAULT NULL,
  `idCurso` int(4) NOT NULL,
  `objReq` varchar(45) NOT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `dataFim` datetime DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `anexos` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `registroEnviado` datetime DEFAULT NULL,
  `registroProtocolado` datetime DEFAULT NULL,
  `registroDeferido` datetime DEFAULT NULL,
  `registroConcluido` datetime DEFAULT NULL
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
(99999, '$2y$10$n5OlnutMOnwd3IvPzXe2tuZFswnSzVMN82bHQ2wF3wuhTlxX32I0q');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `matricula` (`matricula`,`email`),
  ADD KEY `idCurso_idx` (`idCursos`);

--
-- Índices de tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD PRIMARY KEY (`SIAPE`),
  ADD UNIQUE KEY `SIAPE` (`SIAPE`,`email`),
  ADD KEY `coord_idx_idx` (`coord`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `coordenador_idx_idx` (`coordenador`);

--
-- Índices de tabela `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idRequerimento`);

--
-- Índices de tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD PRIMARY KEY (`idRequerimentos`),
  ADD UNIQUE KEY `idRequerimentos` (`idRequerimentos`),
  ADD KEY `idAluno_idx` (`idAluno`);

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
-- Restrições para tabelas `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD CONSTRAINT `coord_idx` FOREIGN KEY (`coord`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `coordenador_idx` FOREIGN KEY (`coordenador`) REFERENCES `coordenacao` (`SIAPE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `idRequerimento_idx` FOREIGN KEY (`idRequerimento`) REFERENCES `requerimentos` (`idRequerimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD CONSTRAINT `idAluno_idx` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
