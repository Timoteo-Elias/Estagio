-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10-Set-2024 às 15:08
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa`
--

CREATE TABLE `equipa` (
  `idequipa` int NOT NULL,
  `idgrupo` int NOT NULL,
  `idestagiario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `equipa`
--

INSERT INTO `equipa` (`idequipa`, `idgrupo`, `idestagiario`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagiarios`
--

CREATE TABLE `estagiarios` (
  `id` int NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estagiarios`
--

INSERT INTO `estagiarios` (`id`, `nome`, `bi`, `nascimento`, `sexo`, `telefone`, `email`, `cidade`, `municipio`, `bairro`, `curso`, `nivel`, `datacadastro`) VALUES
(1, 'margarida armando', '84567405LA080', '2004-08-19', 'Femenino', '948480522', 'margarida@gmail.com', 'Luanda', 'Cacuaco', 'belo monte', '', '', '2024-08-15 00:06:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estassociado`
--

CREATE TABLE `estassociado` (
  `id_asosiado` int NOT NULL,
  `id_parceiro` int NOT NULL,
  `id_estagiario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estassociado`
--

INSERT INTO `estassociado` (`id_asosiado`, `id_parceiro`, `id_estagiario`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `idexame` int NOT NULL,
  `sala` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `idinscricao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`idexame`, `sala`, `dia`, `hora`, `idinscricao`) VALUES
(2, 'Sala a', '2024-08-07', '16:27:00', 7),
(3, 'sala de reiniões', '2024-08-31', '10:30:00', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int NOT NULL,
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nome`, `categoria`) VALUES
(1, 'grupo A', 'atendimento ao caixa'),
(2, 'Grupo B', 'Balconistas'),
(3, 'Grupo C', 'Hotelaria e turismo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensino` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instituto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datainscricao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `nome`, `bi`, `nascimento`, `sexo`, `telefone`, `email`, `cidade`, `municipio`, `bairro`, `ensino`, `instituto`, `nivel`, `curso`, `foto`, `datainscricao`) VALUES
(7, 'Paulina Cristiano', '404835808LA047', '2024-08-02', 'Femenino', '924243535', 'paulinatela@gmail.com', 'Luanda', 'Viana', 'Capalanca', 'Superior', 'IDERO', '1º Ano', 'Engenharia Informática', './upload/ad.jpg', '2024-08-23 18:54:32'),
(8, 'Timóteo Armando', '404835808LA044', '2003-02-23', 'Masculino', '931101914', 'atimoteoelias@gmail.com', 'Luanda', 'Cacuaco', 'Capalanca', 'Superior', 'ISIA', '3º ANO', 'Engenharia Informática', './upload/455262926_940421614768869_6258170032899234553_n.jpg', '2024-08-23 18:58:32'),
(9, 'Adriana Afonso', '404835823LA044', '1999-06-10', 'Femenino', '935555500', 'adriana12@gmail.com', 'Luanda', 'Belas', 'Talatona', 'Superior', 'UNIBELAs', '4º ano', 'Engenharia Informática', './upload/Chegou a solução para a elaboração do do teu tcc (15).png', '2024-08-25 22:17:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id`, `nome`, `nif`, `area`, `telefone`, `email`, `cidade`, `municipio`, `bairro`, `foto`) VALUES
(1, 'Instituto Politécnico Privado Alegria Pedro', '12223456', 'Medio', '924243535', 'politecnicoalegriapedro@gmail.com', 'Luanda', 'Belas', 'Benfica/mundial 3 embondeiros', './upload/Imagem do WhatsApp de 2024-05-21 à(s) 09.40.01_e73653d7.jpg'),
(3, 'Instituto Politécnico Privado Sanjukila', '11122223', 'Ensino Medio', '922578485', 'sanjukila20@outlook.com', 'Luanda', 'Viana', 'Zango 3', './upload/baixados.png'),
(4, 'Universidade de Belas', '12222222', 'Ensino Superior', '922578486', 'unibelas@gmail.com', 'Luanda', 'Belas', 'Benfica', './upload/check-in (1).png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `idresultado` int NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idestagiario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `resultado`
--

INSERT INTO `resultado` (`idresultado`, `estado`, `idestagiario`) VALUES
(2, 'Aprovado/a', 7),
(3, 'Aprovado/a', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `selecao`
--

CREATE TABLE `selecao` (
  `id` int NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidato` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `idtarefa` int NOT NULL,
  `titlo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio` date NOT NULL,
  `termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `perfil`, `senha`, `foto`) VALUES
(1, 'Timóteo Armando', 'atimoteoelias@gmail.com', 'Admin', '12345', './upload/baixados.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valontarios`
--

CREATE TABLE `valontarios` (
  `id` int NOT NULL,
  `idestagiario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `equipa`
--
ALTER TABLE `equipa`
  ADD PRIMARY KEY (`idequipa`),
  ADD KEY `idgrupo` (`idgrupo`),
  ADD KEY `idestagiario` (`idestagiario`);

--
-- Índices para tabela `estagiarios`
--
ALTER TABLE `estagiarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estassociado`
--
ALTER TABLE `estassociado`
  ADD PRIMARY KEY (`id_asosiado`),
  ADD KEY `id_parceiro` (`id_parceiro`);

--
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`idexame`),
  ADD KEY `idinscricao` (`idinscricao`);

--
-- Índices para tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`idresultado`),
  ADD KEY `idestagiario` (`idestagiario`);

--
-- Índices para tabela `selecao`
--
ALTER TABLE `selecao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidato` (`candidato`);

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`idtarefa`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `valontarios`
--
ALTER TABLE `valontarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idestagiario` (`idestagiario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipa`
--
ALTER TABLE `equipa`
  MODIFY `idequipa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estagiarios`
--
ALTER TABLE `estagiarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estassociado`
--
ALTER TABLE `estassociado`
  MODIFY `id_asosiado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `idexame` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idresultado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `selecao`
--
ALTER TABLE `selecao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `idtarefa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `valontarios`
--
ALTER TABLE `valontarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipa`
--
ALTER TABLE `equipa`
  ADD CONSTRAINT `equipa_ibfk_1` FOREIGN KEY (`idgrupo`) REFERENCES `grupo` (`idgrupo`),
  ADD CONSTRAINT `equipa_ibfk_2` FOREIGN KEY (`idestagiario`) REFERENCES `estagiarios` (`id`);

--
-- Limitadores para a tabela `estassociado`
--
ALTER TABLE `estassociado`
  ADD CONSTRAINT `estassociado_ibfk_1` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`);

--
-- Limitadores para a tabela `exame`
--
ALTER TABLE `exame`
  ADD CONSTRAINT `exame_ibfk_1` FOREIGN KEY (`idinscricao`) REFERENCES `inscricao` (`id`);

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`idestagiario`) REFERENCES `inscricao` (`id`);

--
-- Limitadores para a tabela `valontarios`
--
ALTER TABLE `valontarios`
  ADD CONSTRAINT `valontarios_ibfk_1` FOREIGN KEY (`idestagiario`) REFERENCES `estagiarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
