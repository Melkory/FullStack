-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2023 às 18:06
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
-- Banco de dados: `universo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `galaxia`
--

CREATE TABLE `galaxia` (
  `id_galaxia` int(11) NOT NULL,
  `nome_gal` varchar(100) NOT NULL,
  `qtd_planetas` int(3) NOT NULL,
  `distancia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `galaxia`
--

INSERT INTO `galaxia` (`id_galaxia`, `nome_gal`, `qtd_planetas`, `distancia`) VALUES
(3, 'Lactea', 7, '0.0'),
(4, 'Andrômeda', 15, '2.537.000'),
(5, 'Cartwheel', 35, '12.357.000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planeta`
--

CREATE TABLE `planeta` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `lua` int(2) NOT NULL,
  `massa` varchar(100) NOT NULL,
  `presenca_vida` varchar(100) NOT NULL,
  `id_galaxia` int(11) NOT NULL,
  `gravidade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `planeta`
--

INSERT INTO `planeta` (`id`, `nome`, `lua`, `massa`, `presenca_vida`, `id_galaxia`, `gravidade`) VALUES
(14, 'Terra', 1, '10.5', 'Sim', 3, '9.8'),
(17, 'Marte', 0, '980.1', 'nao', 3, '5.4'),
(20, 'Jupiter', 3, '357.8', 'nao', 3, '15.3'),
(21, 'Urano', 4, '357.8', 'nao', 3, '15.3'),
(22, 'Netuno', 8, '9848914.6', 'sim', 3, '0'),
(23, 'Plutao', 0, '35.7', 'nao', 3, '5.4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `nome_usuario`) VALUES
(4, 'julio', '202cb962ac59075b964b07152d234b70', 'Julio');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `galaxia`
--
ALTER TABLE `galaxia`
  ADD PRIMARY KEY (`id_galaxia`);

--
-- Índices de tabela `planeta`
--
ALTER TABLE `planeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Id_galaxia` (`id_galaxia`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `galaxia`
--
ALTER TABLE `galaxia`
  MODIFY `id_galaxia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `planeta`
--
ALTER TABLE `planeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `planeta`
--
ALTER TABLE `planeta`
  ADD CONSTRAINT `FK_Id_galaxia` FOREIGN KEY (`id_galaxia`) REFERENCES `galaxia` (`id_galaxia`),
  ADD CONSTRAINT `planeta_ibfk_1` FOREIGN KEY (`id_galaxia`) REFERENCES `galaxia` (`id_galaxia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
