-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2023 às 20:01
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `administracao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome_adm` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome_adm`, `email`, `senha`) VALUES
(1, 'adm', 'adm@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curriculo`
--

CREATE TABLE `tb_curriculo` (
  `id_curriculo` int(11) UNSIGNED NOT NULL,
  `usuario_id` int(11) UNSIGNED NOT NULL,
  `contato` int(11) NOT NULL,
  `habilidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_curriculo`
--

INSERT INTO `tb_curriculo` (`id_curriculo`, `usuario_id`, `contato`, `habilidades`) VALUES
(1, 3, 2147483647, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id` int(11) UNSIGNED NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id`, `complemento`, `cep`, `cidade`, `estado`, `bairro`, `numero`) VALUES
(12, '2078245', 'MG', 'Belo Horizonte', 'Goiabas', 'Perto da praça da Juraçara', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exp`
--

CREATE TABLE `tb_exp` (
  `id_exp` int(11) UNSIGNED NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_role` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `start_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_exp`
--

INSERT INTO `tb_exp` (`id_exp`, `business_name`, `business_role`, `start_date`, `start_end`) VALUES
(4, 'TI Brasil', 'Criação de Software', '2021-10-31', '2023-11-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `exp_id` int(11) UNSIGNED NOT NULL,
  `endereco_id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `idade` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `sobre` varchar(255) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_cliente`, `exp_id`, `endereco_id`, `nome`, `email`, `senha`, `idade`, `periodo`, `sobre`, `cargo`) VALUES
(3, 4, 12, 'Pedro', 'pedro@gmail.com', 'hamburguer123', 23, 5, 'Analista de Projetos', 'Analista');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_curriculo`
--
ALTER TABLE `tb_curriculo`
  ADD PRIMARY KEY (`id_curriculo`),
  ADD KEY `fk_curriculo_usuario` (`usuario_id`);

--
-- Índices para tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_exp`
--
ALTER TABLE `tb_exp`
  ADD PRIMARY KEY (`id_exp`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_usuario_endereco` (`endereco_id`),
  ADD KEY `fk_usuario_exp` (`exp_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_curriculo`
--
ALTER TABLE `tb_curriculo`
  MODIFY `id_curriculo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_exp`
--
ALTER TABLE `tb_exp`
  MODIFY `id_exp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_cliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_curriculo`
--
ALTER TABLE `tb_curriculo`
  ADD CONSTRAINT `fk_curriculo_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id_cliente`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_exp` FOREIGN KEY (`exp_id`) REFERENCES `tb_exp` (`id_exp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
