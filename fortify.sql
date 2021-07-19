-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Jun-2021 às 05:10
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fortify`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `academys`
--

DROP TABLE IF EXISTS `academys`;
CREATE TABLE IF NOT EXISTS `academys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_empresa` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_responsavel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_responsavel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_responsavel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_academia` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_academia` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_academia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagamento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_academia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_mensal_academia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_diario_academia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avaliacoes` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrelas` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrelas_gerais` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `academys`
--

INSERT INTO `academys` (`id`, `nome_empresa`, `email_empresa`, `nome_responsavel`, `email_responsavel`, `senha_responsavel`, `cep`, `estado`, `cidade`, `endereco`, `numero`, `bairro`, `nome_academia`, `descricao_academia`, `site_academia`, `estado_academia`, `cidade_academia`, `endereco_academia`, `dias_academia`, `horario_academia`, `pagamento`, `logo_academia`, `preco_mensal_academia`, `preco_diario_academia`, `avaliacoes`, `estrelas`, `estrelas_gerais`) VALUES
(19, 'Fitness Club', 'fitnessclub31_@gmail.com', 'SÃ©rgio Junior', 'serginhojr21@gmail.com', 'MTIzNDU2', '62870-000', 'CE', 'Pacajus', 'Rua Chico', '314', 'Cruz das Cruzes', 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', 'Nenhum', 'CE', 'Pacajus', 'Rua dos Tais, NÂ° 14', 'Segunda a Sexta', '07:00 as 20:00', 'Dinheiro e  cartÃ£o', '60d50b1ebcbd6.jpg', '70', '2.8', '6', '22', '3.6666666666667'),
(20, 'Ride Center', 'ridecenter13@gmail.com', 'Luiz Silva', 'luizsilvinha@gmail.com', 'MTIzNDU2', '62870-000', 'CE', 'Pacajus', 'Rua Chico Lira', '134', 'Rua 33', 'Ride', 'A melhor academia da regiÃ£o! Com as mais novas tecnologias e tÃ©cnicas que irÃ£o potencializar a sua rotina de treinos.', 'Nenhum', 'CE', 'Pacajus', 'Rua Tal, NÂ° 33', 'Segunda a Sexta', '07:00 as 20:00', 'Dinheiro e  cartÃ£o', '60d51a734e2e0.png', '70', '2.8', '2', '8', '4'),
(17, 'Tauros Fitness', 'taurosfit123@gmail.com', 'Geraldo Pereira', 'geraldo@gmail.com', 'MTIzNDU2', '62870-000', 'AC', 'Pacajus', 'Rua dos Pimbas', '224', 'Cruz das Mortas', 'Tauros', 'A melhor academia da regiÃ£o! Junte-se a nÃ³s e garanta o mÃ¡ximo do seu potencial com um custo-benefÃ­cio nunca antes visto!', '', 'AC', 'Pacajus', 'Rua dos Amigos, NÂ° 12', 'Segunda a SÃ¡bado', '07:00 as 20:00', 'Dinheiro e cartÃ£o', '60d8f3fe1960b.jpg', '70', '2.8', '1', '4', '4'),
(18, 'OpÃ§Ã£oFit', 'opcaofit312@gmail.com', 'Ramon Silva', 'ramonzin131@gmail.com', 'MTIzNDU2', '62870-000', 'CE', 'Pacajus', 'Rua dos PÃ£es', '141', 'Cruz das Alminhas', 'OpÃ§Ã£oFit', 'A melhor academia que vocÃª pode ver! Venha treinar com a gente.', 'Nenhum', 'CE', 'Pacajus', 'Rua dos Tais, NÂ° 13', 'Segunda a Sabado', '07:00 as 20:00', 'CartÃ£o', '60d50a2e3f27d.jpg', '60', '2.4', '1', '4', '4'),
(21, 'High Power', 'highhpower1@gmail.com', 'PlÃ­nio Ferreira', 'plinio12_fer@gmail.com', 'MTIzNDU2', '06803-440', 'CE', 'Fortaleza', 'Rua Belo', '129', 'Belo Mar', 'Crossfit - High Power ', 'Procurando uma academia profissional, responsÃ¡vel e preocupada com seus resultados? EntÃ£o vocÃª acabou de encontrar! Com a High Power, nÃ³s oferecemos os melhores serviÃ§os e equipamentos do mercado, com personal trainers focados a todo tempo em criar um ambiente perfeito para a sua evoluÃ§Ã£o!', 'Nenhum', 'CE', 'Fortaleza', 'Rua das Aves, NÂ° 33', 'Domingo a Domingo', '07:00 as 20:00', 'Dinheiro,  cartÃ£o e Pix', '60d53cf518431.jpg', '90', '3.6', '1', '5', '5'),
(22, 'HardCore Fitness', 'hardcorefit@gmail.com', 'Silva Cunha', 'cunhasilva134@gmail.com', 'MTIzNDU2', '61940-000', 'CE', 'Maranguape', 'Rua da Chica', '87', 'Monte Super', 'HardCore Fitness', 'O cenÃ¡rio perfeito pra que vocÃª saia do Ã³cio e melhore ao mÃ¡ximo sua saÃºde e sua condiÃ§Ã£o fÃ­sica! Junte-se a nÃ³s e prossiga com sua evoluÃ§Ã£o.', 'https://pt-br.facebook.com/academiahardcore.ft/', 'CE', 'Maranguape', 'Rua da Chica, NÂ° 87', 'Segunda, Quarta, Sexta e Domingo', '07:00 as 20:00', 'Dinheiro e Pix', '60d60c7b2d759.png', '50', '2', '0', '0', '0'),
(26, 'Corpus Diem', 'corpusdiem1939@gmail.com', 'Carlos Alberto', 'carlin123@gmail.com', 'MTIzNDU2', '60010-010', 'AC', 'Fortaleza', 'Rua Chico', '145', 'Tubiri', 'Corpus Diem', 'Aproveite seu corpo! Venha fazer parte dessa familia, e mude seus hÃ¡bitos.\r\nMusculaÃ§Ã£o, Fortalecimento, Condicionamento FÃ­sico, Barra OlÃ­mpica e Anilhas Emborrachadas.', 'https://pt-br.facebook.com/SuaAcademiaCorpusDiem/', 'AC', 'Fortaleza', 'Rua dos Lindos', 'Segunda a SÃ¡bado', '06:00 as 21:00 na semana, 14:00 as 20:00 no sÃ¡bado', 'Dinheiro e cartÃ£o', '60d91c497a6a7.png', '75', '3', '0', '0', '0'),
(24, 'Power Gym', 'powergym133@gmail.com', 'Paulo Silva', 'paulosilva@gmail.com', 'MTIzNDU2', '56324-490', 'CE', 'Fortaleza', 'Rua dos Lindos', '44', 'Tubiri', 'Power Gym', 'Com tecnologias de ponta e profissionais qualificados para lhe oferecer o melhor desempenho possÃ­vel, a Power Gym estÃ¡ no mercado hÃ¡ mais de 8 anos e em todo esse tempo continuou disposta a fazer da sua rotina de treinos uma atividade eficiente e que valha a pena.', '', 'CE', 'Fortaleza', 'Rua dos Circos, NÂ° 134', 'Segunda a SÃ¡bado', '06:00 as 21:00', 'Dinheiro, cartÃ£o e Pix', '60d687448447b.jpg', '60', '2.4', '0', '0', '0'),
(25, 'Fitness Center', 'fitcenter@gmail.com', 'Carlos Eduardo', 'carlosdudu13@gmail.com', 'MTIzNDU2', '60010-010', 'CE', 'Fortaleza', 'Rua dos Feios', '254', 'Alidiota', 'Gym Fitness Center', 'Com os nossos serviÃ§os, vocÃª pode desfrutar das melhores ferramentas e tÃ©cnicas utilizadas no mercado para aperfeiÃ§oar seu desempenho em todos os sentidos. Precisa de um treinamento intensivo? Ou sÃ³ de um perÃ­odo de atividades fÃ­sicas para realÃ§ar sua saÃºde? Em qualquer um dos casos, estamos aqui!', 'https://www.facebook.com/fitnesscenterfortal/?rf=901581679866055', 'CE', 'Fortaleza', 'Rua dos Lindos, NÂ° 33', 'Segunda a SÃ¡bado', '06:00 as 21:00', 'CartÃ£o e dinheiro', '60d689381f718.jpg', '55', '2.2', '1', '2', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanasc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_marcada` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_academy` int(11) NOT NULL,
  `nome_academy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_academy` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_academy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_academy` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `requests`
--

INSERT INTO `requests` (`id`, `nome`, `email`, `cpf`, `sexo`, `datanasc`, `data_marcada`, `preco`, `foto`, `id_user`, `id_academy`, `nome_academy`, `descricao_academy`, `logo`, `estado_academy`, `cidade_academy`) VALUES
(51, 'Hebert Alexandrino', 'hebert@gmail.com', '482.085.927-94', 'Outro', '05/02/2002', '29/06/2021', '2,80', '60d63889d0383.jpg', 60, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus'),
(46, 'SÃ©rgio Gabriel', 'sergio@gmail.com', '313.151.551-41', 'Masculino', '01/01/2002', '30/06/2021', '2,80', '60d663c2cdcc6.jpg', 58, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus'),
(47, 'Elton Ferreira', 'elton@gmail.com', '141.894.981-74', 'Masculino', '04/07/2021', '29/06/2021', '2,80', '60d638374762c.jpg', 59, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus'),
(48, 'Rodrigo Alves', 'rodrigo@gmail.com', '148.109.841-71', 'Masculino', '01/01/1954', '29/06/2021', '2,80', '60d6390e0114f.jpg', 63, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus'),
(49, 'Jeferson Pinheiro', 'jeferson@gmail.com', '138.107.489-16', 'Masculino', '01/01/2003', '30/06/2021', '2,80', '60d638e0cf536.jpg', 62, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus'),
(52, 'Ãtalo Antoni', 'italo@gmail.com', '490.284.825-27', 'Masculino', '07/03/2001', '29/06/2021', '2,80', '60d638baa2902.jpeg', 61, 19, 'Fitness Club', 'A melhor academia que vocÃª pode encontrar! Venha conosco.', '60d50b1ebcbd6.jpg', 'CE', 'Pacajus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanasc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `nome`, `email`, `senha`, `cpf`, `datanasc`, `sexo`, `foto`) VALUES
(58, '@serginho', 'SÃ©rgio Gabriel', 'sergio@gmail.com', 'MTIzNDU2', '313.151.551-41', '01/01/2002', 'Masculino', '60d663c2cdcc6.jpg'),
(59, '@eltin', 'Elton Ferreira', 'elton@gmail.com', 'MTIzNDU2', '141.894.981-74', '04/07/2021', 'Masculino', '60d638374762c.jpg'),
(60, '@hebert', 'Hebert Alexandrino', 'hebert@gmail.com', 'MTIzNDU2', '482.085.927-94', '05/02/2002', 'Outro', '60d63889d0383.jpg'),
(61, '@italozin', 'Ãtalo Antoni', 'italo@gmail.com', 'MTIzNDU2', '490.284.825-27', '07/03/2001', 'Masculino', '60d638baa2902.jpeg'),
(62, '@jefin', 'Jeferson Pinheiro', 'jeferson@gmail.com', 'MTIzNDU2', '138.107.489-16', '01/01/2003', 'Masculino', '60d638e0cf536.jpg'),
(63, '@rodriguin', 'Rodrigo Alves', 'rodrigo@gmail.com', 'MTIzNDU2', '148.109.841-71', '01/01/1954', 'Masculino', '60d6390e0114f.jpg'),
(64, '@amandis', 'Amanda Kelly', 'amanda@gmail.com', 'MTIzNDU2', '371.987.146-81', '01/01/2003', 'Feminino', '60d639aa18708.jpg'),
(65, '@bielzindemel', 'Anthony Gabriel', 'anthony@gmail.com', 'MTIzNDU2', '418.749.817-49', '01/01/2003', 'Masculino', '60d639f552947.jpg'),
(66, '@crese', 'Crisley Lins', 'crisley@gmail.com', 'MTIzNDU2', '138.184.017-49', '01/01/2003', 'Masculino', '60d63a33839ec.jpg'),
(67, '@kayo', 'Kayo de Almeida', 'kayo@gmail.com', 'MTIzNDU2', '491.891.758-91', '01/01/2002', 'Masculino', '60d63a5c05e19.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
