-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2020 às 16:27
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `descricao`) VALUES
(1, 'LANCHES'),
(2, 'PORÇÃO'),
(3, 'BEBIDA'),
(4, 'LANCHE NO PRATO'),
(7, 'PIZZAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome`) VALUES
(1, 1, 'OSVALDO CRUZ '),
(2, 1, 'SALMOURÃO'),
(3, 1, 'LUCÉLIA'),
(4, 1, 'ADAMANTINA'),
(6, 18, 'NOVA AMÉRICA DA COLINA'),
(7, 18, 'NOVA ANDRADINA'),
(8, 8, 'ARIRANHA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `id_pais`, `nome`, `sigla`) VALUES
(1, 1, 'SAO PAULO', 'SP'),
(2, 1, 'ACRE', 'AC'),
(3, 1, 'ALAGOAS', 'AL'),
(4, 1, 'AMAZONAS', 'AM'),
(5, 1, 'AMAPA', 'AP'),
(6, 1, 'BAHIA', 'BA'),
(7, 1, 'CEARA', 'CE'),
(8, 1, 'ESPIRITO SANTO', 'ES'),
(9, 1, 'GOIAS', 'GO'),
(10, 1, 'MARANHAO', 'MA'),
(11, 1, 'MINAS GERAIS', 'MG'),
(12, 1, 'MATO GROSSO DO SUL', 'MS'),
(13, 1, 'MATO GROSSO', 'MT'),
(14, 1, 'PARA', 'PA'),
(15, 1, 'PARAIBA', 'PB'),
(16, 1, 'PERNAMBUCO', 'PE'),
(17, 1, 'PIAUI', 'PI'),
(18, 1, 'PARANA', 'PR'),
(19, 1, 'RIO DE JANEIRO', 'RJ'),
(20, 1, 'RIO GRANDE DO NORTE', 'RN'),
(21, 1, 'RONDONIA', 'RO'),
(22, 1, 'RORAIMA', 'RR'),
(23, 1, 'RIO GRANDE DO SUL', 'RS'),
(24, 1, 'SANTA CATARINA', 'SC'),
(25, 1, 'SERGIPE', 'SE'),
(26, 1, 'TOCANTINS', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id_pais`, `nome`) VALUES
(1, 'BRASIL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(5) NOT NULL,
  `produto` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` decimal(15,2) NOT NULL,
  `foto1` varchar(60) NOT NULL,
  `foto2` varchar(60) NOT NULL,
  `foto3` varchar(60) NOT NULL,
  `cod_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `descricao`, `quantidade`, `preco`, `foto1`, `foto2`, `foto3`, `cod_categoria`) VALUES
(8, 'X - BACON', 'Pão, Bacon, Alface,\r\nTomate, Mussarela, Presunto', 5, '17.50', '3f8bee8bb5ebfc3f0c82c5e1faf6e931.jpeg', '3a858ef71714c133482c1b8aa8ecc49a.jpg', 'a1c97e51d86254d804d118173478f6f6.jpg', 1),
(10, 'COCA - COLA', 'Coca - Cola 2 Litros', 100, '8.00', '38b1555f66e1fdb4009db404090f68af.jpg', '1a32b241859f27bf1eaeb5f657ea8251.jpg', '6fabd3e9bb4b23506d8b0074fa4b4402.jpg', 3),
(12, 'X - BURGUER', 'Pão, Hamburguer, Alface,\r\nTomate, Mussarela, Presunto', 100, '17.50', 'd3894a39b3a77083d6e27204c9e320b4.jpeg', 'aae8cd3a7a482201923e05b45f411a34.jpeg', '8c138284eb5d4d3ac4ee50c2ad71906f.jpeg', 1),
(15, 'X - EGG', 'Pão, Ovo, Alface,\r\nTomate, Mussarela, Presunto', 100, '19.00', '734b7e609312b7a0f7ba0019203302c5.jpg', '012039897da3ba586e5faabf568ef2a3.png', '41d2604ee490bc6991e166095b8b220e.', 1),
(17, 'FANTA LARANJA - 2 LITROS', 'Fanta Laranja - 2 Litros', 100, '7.00', 'f634314fc0e27256c0c8e3fb2678a330.png', '2dc522b39b15213a1a7ddce61ad6ebd0.png', '287b8d2e001acb68f9e33db6b12d2e6f.png', 3),
(19, 'FANTA UVA - 2 LITROS', 'Fanta Uva - 2 Litros', 100, '7.00', '2c013523b583bf6d5a2e18d5ef1f1a2a.jpg', 'bcf78cf1cdcaac5ce200d0a3030ba16d.jpg', '11d8a0b775d0bbf518d42aa701d18fa4.jpg', 3),
(20, 'BATATA FRITA', 'Porção de Batata Frita - 250 Gramas', 100, '12.00', '95be7ca9e81501ed02cec55d89a7f309.png', '440bec8f8fe05434f1d851e5d1b44e1e.png', 'd5248608d44568f478e0944a9980e059.png', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_cliente` int(6) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `endereco` text NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `CEP` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_cliente`, `nome`, `sobrenome`, `email`, `senha`, `adm`, `endereco`, `cidade`, `CEP`) VALUES
(9, 'Administração', 'Empresa', 'adm@email.com', '123', 1, 'Rua Amarilia Costa da Silva, 165', 'OSVALDO CRUZ', '17700000'),
(10, 'Matheus', 'Letra', 'jrtyuw@gmail.com', '123', 0, 'Rua Jorge da Silva Credendio,195', 'OSVALDO CRUZ', '17700000'),
(11, 'Teste', 'Santos', 'leila.apsantos2013@gmail.com', '123', 0, 'Rua Jorge Da Silva Credendio,195', 'OSVALDO CRUZ', '17700000'),
(12, 'MARCOS', 'ANTONIO', 'teste@teste.com', '123', 0, 'Rua José Fernando Costa,436', 'SALMOURÃO', '17720000'),
(13, 'Diego', 'Mascarenhas', 'diego200@email.com', '123', 0, 'Rua 2, 195', 'OSVALDO CRUZ', '17700000'),
(14, 'Cliente', 'Teste', 'teste@email.com', 'teste', 0, 'teste', 'LUCÉLIA', '16600000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(8) NOT NULL,
  `ticket` varchar(15) CHARACTER SET latin1 NOT NULL,
  `id_comprador` int(6) NOT NULL,
  `id_produto` int(5) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `forma` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `ticket`, `id_comprador`, `id_produto`, `quantidade`, `data`, `valor`, `status`, `forma`) VALUES
(55, '5efcc8ba083f4', 10, 19, 1, '2020-07-01', '7.00', 'E', 'D'),
(56, '5f0481e944943', 10, 8, 1, '2020-07-07', '17.50', 'E', 'D'),
(57, '5f048511c9abf', 11, 20, 1, '2020-07-07', '12.00', 'E', 'D'),
(58, '5f0485e9c579f', 11, 10, 1, '2020-07-07', '8.00', 'E', 'D'),
(59, '5f0485e9d930d', 10, 10, 1, '2020-07-07', '8.00', 'E', 'D'),
(60, '5f0485e9d930d', 10, 8, 1, '2020-07-07', '17.50', 'E', 'D'),
(61, '5f9041a086fce', 9, 12, 1, '2020-10-21', '17.50', 'A', 'C'),
(63, '5f90422d3f606', 9, 10, 1, '2020-10-21', '8.00', 'A', 'C'),
(64, '5f90422d3f606', 9, 15, 1, '2020-10-21', '19.00', 'A', 'C'),
(65, '5f90422d3f606', 9, 0, 0, '2020-10-21', '0.00', 'A', 'C'),
(66, '5f90438e7a9d3', 9, 19, 1, '2020-10-21', '7.00', 'A', 'D'),
(67, '5f90438e7a9d3', 9, 0, 0, '2020-10-21', '0.00', 'A', 'D');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`),
  ADD KEY `fk_cidade` (`id_estado`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `fk_estado` (`id_pais`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
