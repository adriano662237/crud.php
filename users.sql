-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31-Maio-2022 às 14:05
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18876700_db_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` date NOT NULL,
  `user_mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_date`, `user_mensagem`, `active`) VALUES
(1, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-17', 'VARMEIRAS', 0),
(2, 'aos-fatec-pweb', 'adriano.662237@gmail.com', '2022-05-10', 'Palmeiras não tem mundial', 0),
(5, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-17', 'ola', 0),
(6, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-17', 'OLA', 0),
(8, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-17', 'sem mudial', 0),
(9, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-17', 'ola', 0),
(10, 'Adriano Oliveira', 'adriano.662237@gmail.com', '2022-05-24', 'allalalla', 0),
(11, 'Alice Hernandes', 'alice@gmail.com', '2022-02-10', 'opaopaoapoa', 0),
(12, 'Alice Hernandes', 'alice@gmail.com', '2022-02-10', 'opaopaoapoa', 0),
(13, 'Alice Hernandes', 'alice@gmail.com', '2022-02-10', 'opaopaoapoa', 0),
(14, 'Alice Hernandes', 'alice@gmail.com', '2022-02-10', 'opaopaoapoa', 0),
(15, 'Alice Hernandes', 'alice@gmail.com', '2022-02-10', 'pão', 0),
(16, 'Alice Hernandes', 'alice@gmail.com', '2022-02-11', 'papai', 0),
(17, 'Luiza Oliveira Hernandes', 'luiza@gmail.com', '2015-08-09', 'Nascimento', 0),
(18, 'Adriano Oliveira', 'luiza@gmail.com', '2022-05-31', 'ola mundo', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
