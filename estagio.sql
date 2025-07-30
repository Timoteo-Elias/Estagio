-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17-Out-2024 às 18:34
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
-- Estrutura da tabela `avaliar`
--

CREATE TABLE `avaliar` (
  `id` int NOT NULL,
  `idestagiario` int NOT NULL,
  `comportamento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participacao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desempenho` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `avaliar`
--

INSERT INTO `avaliar` (`id`, `idestagiario`, `comportamento`, `participacao`, `desempenho`) VALUES
(1, 1, 'Bom', 'Bom', '80%'),
(2, 2, 'Bom', 'Muito Bom', '100%');

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
(1, 'margarida armando', '84567405LA080', '2004-08-19', 'Femenino', '948480522', 'margarida@gmail.com', 'Luanda', 'Cacuaco', 'belo monte', '', '', '2024-08-15 00:06:37'),
(2, 'Timóteo Armando', '044865808LA042', '2009-05-07', 'Masculino', '922578485', 'atimoteoelias@gmail.com', 'Luanda', 'Viana', 'Capalanca', 'Contabilidade e gestão', '11ª classe', '2024-10-15 14:16:03');

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
  `categoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nome`, `categoria`, `area`) VALUES
(1, ' grupo A', ' atendimento ao caixa', ' balcão do bar'),
(2, ' Grupo B', ' Balconistas', ' balcão da loja');

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
(9, 'Adriana Afonso', '404835823LA044', '1999-06-10', 'Femenino', '935555500', 'adriana12@gmail.com', 'Luanda', 'Belas', 'Talatona', 'Superior', 'UNIBELAs', '4º ano', 'Engenharia Informática', './upload/Chegou a solução para a elaboração do do teu tcc (15).png', '2024-08-25 22:17:18'),
(10, 'Adelaide Domingos', '0046734LA047', '1997-02-17', 'Femenino', '937885601', 'adyangela@gmsil.com', 'Luanda', 'Belas', 'benfica', 'Superior', 'Universidade de Belas', '4º ano', 'Engenharia Informática', './upload/461581827_1057850509673914_7699095364703062607_n.jpg', '2024-10-07 06:10:56');

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
(1, 'Instituto Politécnico Privado Alegria Pedro', '232343311', 'Ensino Medio', '924243535', 'politecnicoalegriapedro@gmail.com', 'Luanda', 'Belas', 'Benfica/mundial 3 embondeiros', './upload/Imagem do WhatsApp de 2024-05-21 à(s) 09.40.01_e73653d7.jpg'),
(3, 'Instituto Politécnico Privado Sanjukila', '11122223', 'Ensino Medio', '922578485', 'sanjukila20@outlook.com', 'Luanda', 'Viana', 'Zango 3', './upload/baixados.png'),
(4, 'Universidade de Belas', '212121222', 'Ensino Superior', '922578486', 'unibelas@gmail.com', 'Luanda', 'Belas', 'Benfica', './upload/unnamed.png');

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
(1, 'Timóteo', 'atimoteoelias@gmail.com', 'Admin', '12345', './upload/Logo do centro médico.png'),
(3, 'Paulina Cristiano', 'paulinatela@gmail.com', 'Comum', '1234', './upload/lina.jpg'),
(4, 'Adriana Afonso', 'adriana12@gmail.com', 'Admin', '1234', './upload/baixados.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int NOT NULL,
  `area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalvagas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `area`, `descricao`, `totalvagas`) VALUES
(2, 'Contabilidade', '  necesitamso de pessoas dinámicas', 5),
(3, 'Atendimento ao cliente', 'necesitamso de pessoas dinámicas', 10),
(4, 'Economia', 'criar profissionais qualificados para o mercado', 7),
(5, 'Informática', 'técnico em ti, trabalhondo com o pacote office!', 3),
(6, 'Gestão empresarial', 'gerenciar negocios', 6),
(7, 'Hotelaria e Turismo', 'sem no momento', 4),
(8, 'Informática de gestão', 'depois', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valontarios`
--

CREATE TABLE `valontarios` (
  `id` int NOT NULL,
  `idestagiario` int NOT NULL,
  `instituto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `valontarios`
--

INSERT INTO `valontarios` (`id`, `idestagiario`, `instituto`) VALUES
(1, 1, 'ISIA');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliar`
--
ALTER TABLE `avaliar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idestagiario` (`idestagiario`);

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
  ADD KEY `id_parceiro` (`id_parceiro`),
  ADD KEY `id_estagiario` (`id_estagiario`);

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
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
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
-- AUTO_INCREMENT de tabela `avaliar`
--
ALTER TABLE `avaliar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `equipa`
--
ALTER TABLE `equipa`
  MODIFY `idequipa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estagiarios`
--
ALTER TABLE `estagiarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idgrupo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `valontarios`
--
ALTER TABLE `valontarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliar`
--
ALTER TABLE `avaliar`
  ADD CONSTRAINT `avaliar_ibfk_1` FOREIGN KEY (`idestagiario`) REFERENCES `estagiarios` (`id`);

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
  ADD CONSTRAINT `estassociado_ibfk_1` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`),
  ADD CONSTRAINT `estassociado_ibfk_2` FOREIGN KEY (`id_estagiario`) REFERENCES `estagiarios` (`id`);

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
