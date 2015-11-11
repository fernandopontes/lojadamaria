-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Nov-2015 às 16:20
-- Versão do servidor: 5.6.27
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojadamaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ldm_produtos`
--

CREATE TABLE `ldm_produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagem_capa` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `data_cad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ldm_produtos`
--

INSERT INTO `ldm_produtos` (`id`, `imagem_capa`, `titulo`, `slug`, `descricao`, `valor`, `situacao`, `data_cad`) VALUES
(1, '9b44c9559c38ee2e688f37c9dc9b32b6.jpg', 'Jarra Transparente Cristal Coroa (1 Litro)', 'jarra-transparente-cristal-coroa-1-litro', 'Glamour define essa jarra! Para servir a todos e trazer elegância à sua mesa. Perfeita para água, sucos e refrigerantes, é feita em vidro na cor topázio e estampada em alto relevo com coroas. Monte seu jogo de taças com a jarra!', '55.16', 'Ativo', '2015-11-11 12:26:47'),
(2, '999c3aad616b35b28307879954aa7a3d.jpg', 'Porta-Moedas Vermelho Batgirl', 'porta-moedas-vermelho-batgirl', 'Esta peça não é só um lugar guardar as suas moedas, mas sim um carinho especial para sua bolsa! Fofo e feito em pvc, este porta-níquel possui um fechinho de metal que garante que as suas moedinhas fiquem bem guardadinhas. Por ter estampa de quadrinhos, este porta-moedas pode ser usada para incentivar a criançada a organizar melhor seu dinheirinho.', '11.92', 'Ativo', '2015-11-11 12:30:17'),
(3, '1bfbaafe8053fdb2904e1991e2005187.jpg', 'Guardanapos de Papel Listras Coloridas 20 Unidades', 'guardanapos-de-papel-listras-coloridas-20-unidades', 'Encantadores e muito úteis, os guardanapos não só podem como devem combinar com sua mesa. Estes lindos Guardanapos Listras Coloridas são de papel e possuem uma estampa diferente e colorida. O pacote contém 20 unidades e cada guardanapo mede 33x33 cm totalmente aberto, com 3 camadas e o papel branqueado sem cloro.', '16.72', 'Ativo', '2015-11-11 12:30:46'),
(5, '255cf171baa76dac90569e3ca9432d8a.jpg', 'Forma para Gelo Vermelha em Silicone Maçazinhas', 'forma-para-gelo-vermelha-em-silicone-macazinhas', 'Quem conhece meus produtos sabe que tenho diveeersas forminhas para gelo/chocolate/biscoitos aqui no site. Diversos formatos divertidos que deixam a hora de cozinhar mais legal e a refeição com uma aparência alegre! Agora tenho essas forminhas em formato de maças, que são suuuper lindas e estilosas. Feitas em silicone, vão tranquilamente ao forno sem prejudicar e danificar a forma! Medidas: 22cm de largura por 12cm de profundidade. Os bolinhos/cubos de gelo saem com aproximadamente 3cm de altura.', '18.35', 'Ativo', '2015-11-11 12:31:56'),
(6, '89e174095a9dfdaffc55cfc92ed13b01.jpg', 'Lanterna Marroquina com Vidro Pequena Preta', 'lanterna-marroquina-com-vidro-pequena-preta', 'Amo Lanternas! Elas completam o ambiente, mesmo quando não o estão iluminando com alguma velinha. Ficam bem no chão, num cantinho como complemento da decoração ou até mesmo penduradas…Já experimentou nas escadas? Ficam lindas também, e nos jardins! Viu quanta ideia? Você já tem motivos para ter a sua! A lanterna marroquina com vidro é o mais novo modelo aqui na lojinha, e trará beleza à sua decoração! Material: Metal e vidro. Medidas: 22cm de altura por 10cm de largura.', '46.32', 'Ativo', '2015-11-11 12:32:58'),
(7, '05f631309010ed9c7859de433219d0cf.jpg', 'Forma para Cupcake com Tampa Rosa', 'forma-para-cupcake-com-tampa-rosa', 'Adoro passar as tardes fazendo e comendo doces. Aliás, quem é que não gosta? Hum... que delícia! Esta linda forminha para Cupcake tem uma tampinha rosa no formato do bolinho que é uma graça. Um detalhe muito legal: ela é especialmente para viagens! Sabe quando bate aquela vontade de comer um docinho durante aquela viagem longa? Agora você pode ter uma forminha especialmente para levar seu cupcake ou docinho para onde você for. Boa viagem, e bom apetite!', '18.32', 'Ativo', '2015-11-11 12:49:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ldm_usuarios`
--

CREATE TABLE `ldm_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `data_login` datetime DEFAULT NULL,
  `data_cad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ldm_usuarios_sessions`
--

CREATE TABLE `ldm_usuarios_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ldm_usuarios_sessions`
--

INSERT INTO `ldm_usuarios_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('e1d7e02e3c005f68b1e4c9ec813f46e4b738b00b', '127.0.0.1', 1447248634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373234383334303b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('38b411c8fb080bf9f970d786863d9d164fb71353', '127.0.0.1', 1447248866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373234383634313b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('a9bbf725ddca56591e6302ca0564aa9643b9ddac', '127.0.0.1', 1447249443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373234393334343b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('afc644e6cb208be57183ae7e7ee7f1ce273ebc88', '127.0.0.1', 1447250195, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373234393839353b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('b792a5ff277e1277bb8f4f26007bf4745cef3caf', '127.0.0.1', 1447250384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235303139373b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('95bf610705d6676924614c65bfa3600106a02fdb', '127.0.0.1', 1447250639, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235303631303b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('74bf1c8504046de86207229c57664bfdce33f005', '127.0.0.1', 1447251297, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235303939373b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('8571346d6682c5129009898eada85fb2175d8680', '127.0.0.1', 1447251466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235313239383b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('8137ef0be8316219fcf582bebe0f8aadcf65df1b', '127.0.0.1', 1447251745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235313630333b7573756172696f5f69647c733a313a2231223b7573756172696f5f6e6f6d657c733a31353a224665726e616e646f20506f6e746573223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('c3e03cba2b431ed81f9f9f3fb2e20272bf2852ff', '127.0.0.1', 1447253000, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235323939393b),
('8eac384286f87f5e065a851b43255c03f366c11a', '127.0.0.1', 1447254364, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235343237333b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('81f5234715f321391f44ee5bbbc3216f4d160b5a', '127.0.0.1', 1447255057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235343937343b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('57c565bd51dd65e926055ecf8729f937c92e76e4', '127.0.0.1', 1447255417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235353239343b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('a9a44418ad55843cf654288f6c3f4b7c96ee7af0', '127.0.0.1', 1447255891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235353630373b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('ce999fed94caeb5503770464fcb5616e144bbf91', '127.0.0.1', 1447255979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235353931363b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('361182b55e9ef66c65fba3de03d6f5fbeb558dc5', '127.0.0.1', 1447256679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235363338313b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('229f2fa83818a7f1c1b2c43d948d56f0ea002637', '127.0.0.1', 1447256983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235363638343b7573756172696f5f69647c733a313a2233223b7573756172696f5f6e6f6d657c733a31373a224665726e616e646f20506f6e7465732032223b7573756172696f5f656d61696c7c733a353a22417469766f223b7573756172696f5f617574656e74696361646f7c623a313b),
('d122f2dc65b1c6e9444853be837ebfe1e0efebdb', '127.0.0.1', 1447257041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235363938373b),
('21785121d6afa11d433932cecd40e40cd0f6de57', '127.0.0.1', 1447257695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235373436343b),
('3d64eaeade36f2b54b2651e3055f8536e46919cf', '127.0.0.1', 1447257840, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235373833383b),
('669c74433e63dc664e70a3e6b1d0c7771d633548', '127.0.0.1', 1447258467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235383137343b),
('65d06d29d45d81e8b7986be529a78fc62b812f04', '127.0.0.1', 1447258540, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373235383437353b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ldm_produtos`
--
ALTER TABLE `ldm_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldm_usuarios`
--
ALTER TABLE `ldm_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldm_usuarios_sessions`
--
ALTER TABLE `ldm_usuarios_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ldm_produtos`
--
ALTER TABLE `ldm_produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ldm_usuarios`
--
ALTER TABLE `ldm_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
