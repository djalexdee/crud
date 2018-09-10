-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Set-2018 às 21:54
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `investimentos_tipo`
--

CREATE TABLE `investimentos_tipo` (
  `investimento_id` int(11) NOT NULL,
  `investimento_nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `investimento_rentabilidade` double NOT NULL,
  `investimento_taxa` double NOT NULL,
  `investimento_periodo` double NOT NULL,
  `investimento_data` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `investimentos_tipo`
--

INSERT INTO `investimentos_tipo` (`investimento_id`, `investimento_nome`, `investimento_rentabilidade`, `investimento_taxa`, `investimento_periodo`, `investimento_data`) VALUES
(1, 'Investimento 1', 10, 3, 30, '0000-00-00'),
(6, 'Investimento 2', 10, 5, 20, '0000-00-00'),
(7, 'Investimento 3', 10, 5, 25, '0000-00-00'),
(8, 'Investimento 4', 10, 5, 15, '0000-00-00'),
(10, 'Investimento 5', 25, 5, 10, '0000-00-00'),
(11, 'Investimento 6', 74, 4, 12, '0000-00-00'),
(12, 'Investimento 7', 14, 1, 45, '06/09/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `investimento_simulacao`
--

CREATE TABLE `investimento_simulacao` (
  `simulacao_id` int(11) NOT NULL,
  `simulacao_investimento_id` int(11) NOT NULL,
  `simulacao_valor` double NOT NULL,
  `simulacao_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `investimento_simulacao`
--

INSERT INTO `investimento_simulacao` (`simulacao_id`, `simulacao_investimento_id`, `simulacao_valor`, `simulacao_data`) VALUES
(4, 1, 1000, '2018-09-06'),
(5, 1, 1000, '2018-09-05'),
(8, 10, 500, '2018-09-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investimentos_tipo`
--
ALTER TABLE `investimentos_tipo`
  ADD PRIMARY KEY (`investimento_id`);

--
-- Indexes for table `investimento_simulacao`
--
ALTER TABLE `investimento_simulacao`
  ADD PRIMARY KEY (`simulacao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investimentos_tipo`
--
ALTER TABLE `investimentos_tipo`
  MODIFY `investimento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `investimento_simulacao`
--
ALTER TABLE `investimento_simulacao`
  MODIFY `simulacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
