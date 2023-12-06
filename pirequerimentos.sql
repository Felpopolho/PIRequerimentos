-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2023 às 02:09
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
  `hash` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `idCursos`, `telefone`, `senha`, `status`, `hash`) VALUES
(202013600012, 'Felipe 2', '202013600012@ifba.edu.br', 1, '(22) 22222-2222', '$2y$10$Gp19sujwwB8chfJJRIZ3d.tOAuxZcfaONyD.aXysTZdacrgt/A9Gq', 3, '68c24b57ff1c411f26b0adc168136cf5');

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
(1111111, 'Cássio Noronha', 'cassio.noronha@ifba.edu.br', 1, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(2222222, 'Jorge Dantas', 'jorge.dantas@ifba.edu.br', 2, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(3333333, 'Nadja Nubia', 'nadja.nubia@ifba.edu.br', 3, '$2y$10$Jzd4N733g1owzEATWgiKOuoAx7lMgjdKUr84wJviXFZfpsy4WjR0u'),
(9999999, 'Tigre', 'tigre@tigre.com', 0, '$2y$10$gE/hNDcKUXRVo1ETX0j.9OzBN7Fx.MU9RqjDm4NDKaiPuw/BnZ4Lu');

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
(0, 0, 'CORES'),
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
(99999, '$2y$10$n5OlnutMOnwd3IvPzXe2tuZFswnSzVMN82bHQ2wF3wuhTlxX32I0q');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(4) NOT NULL,
  `id_curso` int(4) NOT NULL,
  `nome_turma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `id_curso`, `nome_turma`) VALUES
(1, 1, 'EI11'),
(2, 1, 'EI12');

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
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `idx_id_curso` (`id_curso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD CONSTRAINT `coord_idx` FOREIGN KEY (`coord`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `idRequerimento_idx` FOREIGN KEY (`idRequerimento`) REFERENCES `requerimentos` (`idRequerimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `requerimentos`
--
ALTER TABLE `requerimentos`
  ADD CONSTRAINT `idAluno_idx` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `idx_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
