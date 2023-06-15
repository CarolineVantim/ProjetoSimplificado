-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetosimplificado`
--

-- --------------------------------------------------------

--
-- Table structure for table `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `data_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_finish` datetime DEFAULT NULL,
  `usuarioId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarefas`
--

INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `data_insert`, `data_finish`, `usuarioId`) VALUES
(1, 'Atividade do Nilton', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker', '2023-06-10 03:00:00', '2023-06-15 00:00:00', 1),
(2, 'Atividade do Ana Celia', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.', '2023-06-10 03:00:00', '2023-06-15 00:00:00', 1),
(9, 'Orlando', 'Fazer um sistema em django de tarefas', '2023-06-15 15:39:12', '2023-06-12 00:00:00', 1);

--
-- Triggers `tarefas`
--
DELIMITER $$
CREATE TRIGGER `trigger_criar_tarefa` BEFORE INSERT ON `tarefas` FOR EACH ROW BEGIN
      IF NEW.usuarioId IS NULL THEN
          SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'É necessário inserir um usuário.';
      END IF;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `data_inser` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `data_inser`) VALUES
(1, 'Caroline Vantim', '0000-00-00 00:00:00'),
(2, 'Fernando', '2023-06-13 03:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
