-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql857.umbler.com
-- Generation Time: 11-Out-2017 às 17:42
-- Versão do servidor: 5.6.34-log
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_resgate`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_prioridades`
--

CREATE TABLE IF NOT EXISTS `lista_prioridades` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `lista_prioridades`
--

INSERT INTO `lista_prioridades` (`id`, `nome`, `ordem`) VALUES
(1, 'Material escolar', 1),
(2, 'Alimentos nÃ£o prerecÃ­veis', 2),
(3, 'Tratamento oftalmolÃ³gico', 3),
(4, 'Medicamentos', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_ajuda`
--

CREATE TABLE IF NOT EXISTS `tipos_ajuda` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(144) DEFAULT NULL,
  `info_adicional` varchar(144) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos_ajuda`
--

INSERT INTO `tipos_ajuda` (`id`, `nome`, `descricao`, `info_adicional`) VALUES
(1, 'Seja um voluntÃ¡rio', 'VocÃª pode ajudar participando das aÃ§Ãµes ou auxiliando com sua expertise! Entre em contato.', 'Instagram: @projeto_resgate\nE-mail: projetoresgatefloripa@gmail.com'),
(2, 'Doar para campanha', '', ''),
(3, 'Ajuda financeira', 'Para ajudar financeiramente, vocÃª pode fazer depÃ³sito na conta do Projeto:', 'Banco do Brasil\nAgÃªncia: xxxx-x\nConta Corrente: xxxxx-x\nCNPJ:\nFavorecido: '),
(4, 'Sua empresa quer ajudar?', 'Entre em contato e identifique-se como empresa para conversarmos.', 'Instagram: @projeto_resgate\r\nE-mail: projetoresgatefloripa@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', '581484c7fefcc0da32f1c888402e728a23be2cea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lista_prioridades`
--
ALTER TABLE `lista_prioridades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos_ajuda`
--
ALTER TABLE `tipos_ajuda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lista_prioridades`
--
ALTER TABLE `lista_prioridades`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipos_ajuda`
--
ALTER TABLE `tipos_ajuda`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
