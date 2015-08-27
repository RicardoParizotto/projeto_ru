-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2015 at 06:48 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controle_ru`
--

-- --------------------------------------------------------

--
-- Table structure for table `Avaliacao`
--

CREATE TABLE IF NOT EXISTS `Avaliacao` (
  `_id` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `nota` tinyint(1) NOT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Cardapio`
--

CREATE TABLE IF NOT EXISTS `Cardapio` (
  `_id` int(11) NOT NULL,
  `Descricao` text NOT NULL,
  `Data` date NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `img_url` text,
  `nota_p` int(11) NOT NULL DEFAULT '0',
  `nota_n` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cardapio`
--

INSERT INTO `Cardapio` (`_id`, `Descricao`, `Data`, `Nome`, `img_url`, `nota_p`, `nota_n`) VALUES
(2, 'ajldkfasjldkas jaskd ask djaskjd haskjd haksjd haksjd haskj haskjd haksj d', '2015-08-08', 'comidinha', 'http://cdn.meninasjogos.com.br/media/70/5f/pequeno-almoco-com-estilo.jpg', 5, 0),
(3, 'ALKJSFDJKASKJDASd JALKSÇ AJSLD JSdLÇASDKJAÇSKD JAÇLS jLSÇKJFçlkASJDkçlASJd çkasJdçalksjdçlakSjdaçSLD', '2015-08-24', 'bosta a milanesa', 'http://cdn.meninasjogos.com.br/media/70/5f/pequeno-almoco-com-estilo.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`_id`, `email`, `senha`) VALUES
(2, 'teste@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Avaliacao`
--
ALTER TABLE `Avaliacao`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `Avaliacao_fk0` (`id_cardapio`);

--
-- Indexes for table `Cardapio`
--
ALTER TABLE `Cardapio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Avaliacao`
--
ALTER TABLE `Avaliacao`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Cardapio`
--
ALTER TABLE `Cardapio`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Avaliacao`
--
ALTER TABLE `Avaliacao`
  ADD CONSTRAINT `Avaliacao_fk0` FOREIGN KEY (`id_cardapio`) REFERENCES `Cardapio` (`_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
