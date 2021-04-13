-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Abr-2021 às 17:24
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idrug`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id`, `nome`) VALUES
(1, 'Pendente'),
(2, 'Acesso aos dados da farmacia'),
(3, 'Acesso aos produtos'),
(4, 'Acesso aos pedidos'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Relaxante Muscular'),
(2, 'Anticoagulante'),
(3, 'anti-hipertensivo'),
(4, 'Analgésico'),
(5, 'Antidiabético'),
(6, 'Suplemento de vitamina'),
(7, 'Anti-inflamatório'),
(8, 'Ansiolitíco'),
(9, 'Produto de Higiene'),
(10, 'Perfumes'),
(11, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `nome` varchar(150) NOT NULL,
  `sobre` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` char(10) DEFAULT NULL,
  `celular` char(11) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `cnpj` char(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`nome`, `sobre`, `endereco`, `telefone`, `celular`, `email`, `logo`, `cnpj`) VALUES
('Farmacia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Rua Marcos Savaris 30 Monte Verde Morro da Fumaça Santa Catarina', '34349999', '48988046155', 'farmacia@gmail.com', '../../assets/imagens/geral/logo.png', '99999999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `pedido` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_pago_unitario` int(11) NOT NULL,
  `receita` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` int(11) NOT NULL,
  `tabela` varchar(30) NOT NULL,
  `tipo` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `updatedAt`, `updatedBy`, `tabela`, `tipo`) VALUES
(1, '2021-04-09 21:45:29', 1, 'farmacia e modos_pagamento', 'update'),
(2, '2021-04-09 21:50:33', 1, 'farmacia e modos_pagamento', 'update'),
(3, '2021-04-11 23:48:06', 1, 'produto', 'insert'),
(4, '2021-04-11 23:48:25', 1, 'produto', 'insert'),
(5, '2021-04-11 23:51:39', 1, 'produto', 'update'),
(6, '2021-04-12 00:47:53', 1, 'usuario_gerenciamento', 'update'),
(7, '2021-04-13 15:18:50', 1, 'usuario_gerenciamento', 'update'),
(8, '2021-04-13 15:19:07', 1, 'usuario_gerenciamento', 'update'),
(9, '2021-04-13 15:24:55', 1, 'usuario_gerenciamento', 'update'),
(10, '2021-04-13 15:25:08', 1, 'usuario_gerenciamento', 'update'),
(11, '2021-04-13 15:26:47', 1, 'usuario_gerenciamento', 'update');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modos_pagamento`
--

CREATE TABLE `modos_pagamento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modos_pagamento`
--

INSERT INTO `modos_pagamento` (`id`, `tipo`, `status`, `foto`) VALUES
(1, 'Cartão Visa', 1, '../../assets/imagens/geral/visa.png'),
(2, 'Cartão Mastercard', 1, '../../assets/imagens/geral/mastercard.png'),
(3, 'Cartão Boleto', 1, '../../assets/imagens/geral/barcode.png'),
(4, 'Cartão Dinheiro', 1, '../../assets/imagens/geral/money.png'),
(5, 'Cartão Paypal', 1, '../../assets/imagens/geral/paypal.png'),
(6, 'Pix', 1, '../../assets/imagens/geral/pix.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `modo_pagamento` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `receita` tinyint(1) NOT NULL,
  `volume` int(11) NOT NULL,
  `unidade` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `categoria`, `preco`, `receita`, `volume`, `unidade`, `estoque`, `foto`) VALUES
(1, 'Teste 1', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 4, 5, '../../assets/imagens/geral/produtos.png'),
(7, 'Teste atualizado', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 4, 5, '../../assets/imagens/geral/produtos.png'),
(4, 'Teste', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 1, 5, '../../assets/imagens/geral/produtos.png'),
(5, 'Teste', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 1, 5, '../../assets/imagens/geral/produtos.png'),
(6, 'Teste', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 1, 5, '../../assets/imagens/geral/produtos.png'),
(8, 'Teste', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '16.25', 0, 25, 4, 5, '../../assets/imagens/geral/produtos.png'),
(9, 'Teste xd', 'testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, '12.00', 0, 25, 4, 5, '../../assets/imagens/geral/produtos.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome`) VALUES
(1, 'Comprimidos'),
(2, 'Mg'),
(3, 'G'),
(4, 'Ml'),
(5, 'Gotas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `telefone` char(10) DEFAULT NULL,
  `celular` char(11) DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_gerenciamento`
--

CREATE TABLE `usuario_gerenciamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `acesso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_gerenciamento`
--

INSERT INTO `usuario_gerenciamento` (`id`, `nome`, `usuario`, `senha`, `foto`, `acesso`) VALUES
(2, 'admin1256', 'teste', '123456', '../../assets/imagens/geral/user.png', 5),
(5, 'a', 'gggggggggggggggggggggggg', '123456', '../../assets/imagens/geral/user.png', 3),
(4, 'hgghgh', 'testegdfhfgfgfg', '123456', '../../assets/imagens/geral/user.png', 3),
(6, 'b', 'teste2', '123456', '../../assets/imagens/geral/user.png', 1),
(7, 'd', 'teste1', '123456', '../../assets/imagens/geral/user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto` (`produto`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `produto` (`produto`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `modos_pagamento`
--
ALTER TABLE `modos_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `modo_pagamento` (`modo_pagamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `unidade` (`unidade`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_gerenciamento`
--
ALTER TABLE `usuario_gerenciamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acesso` (`acesso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `modos_pagamento`
--
ALTER TABLE `modos_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario_gerenciamento`
--
ALTER TABLE `usuario_gerenciamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
