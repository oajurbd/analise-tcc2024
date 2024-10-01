-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/10/2024 às 00:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `judite`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tamanho` enum('PP','P','M','G','GG') NOT NULL,
  `quantidade` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `imagem`, `nome`, `descricao`, `preco`, `tamanho`, `quantidade`, `categoria`) VALUES
(1, 'imagem/fem.png', 'Camiseta As it on earth is in heaven', 'Camiseta estampada, 100% algodão, verde', 60.00, 'M', 50, 'adulto'),
(2, 'imagem/fem (10).png', 'YHWH', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(3, 'imagem/fem (11).png', 'Maranatha \"Come lord Jesus\"', 'Camiseta estampada, 100% algodão, verde', 60.00, 'M', 50, 'adulto'),
(4, 'imagem/fem (12).png', 'YHWH', 'Camiseta estampada, 100% algodão, rosa', 60.00, 'M', 50, 'adulto'),
(5, 'imagem/fem (2).png', 'Camiseta I was lost, but now i found ', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(6, 'imagem/fem (3).png', 'Camiseta ELOHIM', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(7, 'imagem/fem (4).png', 'Camiseta Grow you are planted', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(8, 'imagem/fem (5).png', 'Camiseta Salmos 94:19', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(9, 'imagem/masc (5).png', 'Camiseta GO make disciples', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(10, 'imagem/masc (9).png', 'Camiseta JIREH', 'Camiseta estampada, 100% algodão, preta', 60.00, 'M', 50, 'adulto'),
(11, 'imagem/masc (8).png', 'Camiseta Be the light', 'Camiseta estampada, 100% algodão, marrom', 60.00, 'M', 50, 'adulto'),
(12, 'imagem/masc (7).png', 'Camiseta Spirit Holy', 'Camiseta estampada, 100% algodão, branca', 60.00, 'M', 50, 'adulto'),
(13, 'imagem/9kids.png', 'Camiseta Lucas 10:27', 'Camiseta estampada, 100% algodão, roxa', 60.00, 'M', 50, 'infantil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `cep` bigint(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `cpf`, `cep`, `endereco`, `numero`, `complemento`, `telefone`, `tipo`) VALUES
(1, '', '', '', 0, 0, '', 0, '', '', 0),
(2, 'brenda', 'brenda@gmail.com', '1234', 10409326909, 85805420, 'rua janio quadros', 77, 'casa', '984211151', 0),
(3, '', '', '', 0, 0, '', 0, '', '', 0),
(4, '', 'brenda@gmail.com', 'brenda123', 0, 0, '', 0, '', '', 0),
(5, '', '', '', 0, 0, '', 0, '', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
