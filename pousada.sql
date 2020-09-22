-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2020 às 21:09
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pousada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `documento`, `nascimento`, `cidade`, `estado`) VALUES
(12, 'g', '535', '2020-09-03', 'Heliodora', 'MG'),
(13, 'f', '23', '2020-09-09', 'Heliodora', 'MG'),
(14, 'g', '535', '2020-09-01', 'Heliodora', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `id` int(11) NOT NULL,
  `numPorta` varchar(20) NOT NULL,
  `tipoQuarto` varchar(20) NOT NULL,
  `valorDiaria` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reg_datahora` datetime NOT NULL,
  `alt_datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id`, `numPorta`, `tipoQuarto`, `valorDiaria`, `status`, `reg_datahora`, `alt_datahora`) VALUES
(85, '445', 'simples', 32, 'livre', '2020-09-21 12:20:13', '2020-09-21 17:37:35'),
(93, '22', 'simples', 135, 'livre', '2020-09-21 18:32:23', '2020-09-21 18:32:57'),
(94, '1', 'duplo', 12, 'livre', '2020-09-22 14:50:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `valorReserva` int(11) NOT NULL,
  `statusReserva` varchar(20) NOT NULL,
  `dataHoraStatus` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `id_quarto`, `id_cliente`, `dataEntrada`, `dataSaida`, `valorReserva`, `statusReserva`, `dataHoraStatus`) VALUES
(11, 85, 12, '2020-09-09', '2020-09-25', 512, 'reservado', '2020-09-21 23:30:00'),
(12, 93, 12, '2020-09-01', '2020-09-25', 3240, 'reservado', '2020-09-22 20:53:00'),
(13, 85, 12, '2020-09-02', '2020-09-23', 672, 'reservado', '2020-09-22 20:52:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
