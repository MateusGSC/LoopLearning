-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2018 às 16:24
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `looplearning`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(128) NOT NULL DEFAULT '',
  `situacao` enum('ATIVO','INATIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`, `situacao`) VALUES
(1, 'Mateus Cassandri', 'mateus_gustavo5@hotmail.com', '$2y$10$A4nMJw/gaGfehcccputBZej7O02vbAfHfLg/gtKVwzbYr5Ks7QFPa', 'ATIVO'),
(2, 'Mateus Gustavo', 'mateusgsc5@gmail.com', '$2y$10$A4nMJw/gaGfehcccputBZej7O02vbAfHfLg/gtKVwzbYr5Ks7QFPa', 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(128) NOT NULL DEFAULT '',
  `situacao` enum('ATIVO','INATIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `senha`, `situacao`) VALUES
(1, 'Kauê Lima Silva', 'kaue@outlook.com', '$2y$10$1hf1w2RicocKcgyBocLUp.nsmqly0FPTeNNS7.YSQkghqvlyn3aZO', 'ATIVO'),
(2, 'Luís Barros Santos', 'luis@gmail.com', '$2y$10$1hf1w2RicocKcgyBocLUp.nsmqly0FPTeNNS7.YSQkghqvlyn3aZO', 'ATIVO'),
(3, 'Clara Ribeiro Carvalho', 'clara@gmail.com', '$2y$10$1hf1w2RicocKcgyBocLUp.nsmqly0FPTeNNS7.YSQkghqvlyn3aZO', 'INATIVO'),
(4, 'Miguel Souza Alves', 'miguel@hotmail.com', '$2y$10$1hf1w2RicocKcgyBocLUp.nsmqly0FPTeNNS7.YSQkghqvlyn3aZO', 'ATIVO'),
(5, 'Carla Melo Martins', 'carla@uol.com.br', '$2y$10$1hf1w2RicocKcgyBocLUp.nsmqly0FPTeNNS7.YSQkghqvlyn3aZO', 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`id`, `nome`, `url`, `id_modulo`, `id_curso`) VALUES
(1, 'Aula 1', 'www.youtube.com.br/js', 1, 5),
(2, 'Aula 1', 'www.youtube.com.br/laravel', 2, 9),
(3, 'Aula 2', 'www.youtube.com.br/laravel', 2, 9),
(4, 'Aula 3', 'www.youtube.com.br/laravel', 2, 9),
(5, 'Aula 1', 'www.youtube.com.br/laravel', 3, 9),
(6, 'Aula 2', 'www.youtube.com.br/laravel', 3, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(37) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `imagem`, `descricao`) VALUES
(5, 'JavaScript', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.'),
(6, 'NodeJS', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.'),
(7, 'PHP', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.'),
(8, 'GitHub', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.'),
(9, 'Laravel + VueJS', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_visualizacao`
--

CREATE TABLE `historico_visualizacao` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE `instrutor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `biografia` text,
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(128) NOT NULL DEFAULT '',
  `situacao` enum('ATIVO','INATIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id`, `nome`, `biografia`, `email`, `senha`, `situacao`) VALUES
(1, 'Isabella Costa Almeida', 'Professora de Cobol', 'isabella@gmail.com', '$2y$10$ROHaU1HaG4izmBX6ctkKTOxtYTSOF/oqsQ5Tkqgigig.HaOeELnSy', 'ATIVO'),
(2, 'Alex Goncalves Azevedo', 'Professor de PHP', 'alex@hotmail.com', '$2y$10$Ju7tcLgr9gHl1.4ZvA/YbOvb.64gT2.iVJbKIPq216YPTJsca0LCi', 'ATIVO'),
(3, 'Melissa Cavalcanti Alves', 'Professora de Front-End', 'melissa@gmail.com', '$2y$10$7RAr6eTzz8878/dMssoMEeMJKNh5LPb3UlWZF5ROKdKy2vvD8OUdm', 'INATIVO'),
(4, 'Antônio Martins Costa', 'Professor Back-End', 'antonio@hotmail.com', '$2y$10$6hnlMMgwPTvA5aqF1QkRB.IZcLJnw0Yc.jGNnO1bI2QrK9PNEYQmC', 'ATIVO'),
(5, 'Lucas Cardoso Rocha', 'Professor de HTML5 e CSS3', 'lucas@gmail.com', '$2y$10$72afWXqOZhgs.ozNgGQIDOqhN.3y.BkDzkI2BjQBzKntP1sSS.Agq', 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor_curso`
--

CREATE TABLE `instrutor_curso` (
  `id` int(11) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id`, `nome`, `id_curso`) VALUES
(1, 'Começando com JavaScript', 5),
(2, 'Introdução', 9),
(3, 'Configurando Ambiente', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `historico_visualizacao`
--
ALTER TABLE `historico_visualizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indexes for table `instrutor`
--
ALTER TABLE `instrutor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `instrutor_curso`
--
ALTER TABLE `instrutor_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instrutor` (`id_instrutor`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aluno_curso`
--
ALTER TABLE `aluno_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `historico_visualizacao`
--
ALTER TABLE `historico_visualizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrutor`
--
ALTER TABLE `instrutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instrutor_curso`
--
ALTER TABLE `instrutor_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD CONSTRAINT `aluno_curso_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `aluno_curso_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`),
  ADD CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `historico_visualizacao`
--
ALTER TABLE `historico_visualizacao`
  ADD CONSTRAINT `historico_visualizacao_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `historico_visualizacao_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id`);

--
-- Limitadores para a tabela `instrutor_curso`
--
ALTER TABLE `instrutor_curso`
  ADD CONSTRAINT `instrutor_curso_ibfk_1` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id`),
  ADD CONSTRAINT `instrutor_curso_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
