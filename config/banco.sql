-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19-Maio-2026 às 23:41
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoIdeal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL CHECK (`nota` >= 1 and `nota` <= 5),
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `avaliacoes`:
--   `usuario_id`
--       `usuarios` -> `id`
--   `serie_id`
--       `series` -> `id`
--

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `usuario_id`, `serie_id`, `nota`, `comentario`) VALUES
(1, 1, 3, 5, 'Fico sempre feliz assistindo essa série!'),
(2, 2, 8, 3, 'É um bombom mix de tão romântico!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `categorias`:
--

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(3, 'Ação'),
(7, 'Anime'),
(2, 'Comédia'),
(1, 'Drama'),
(5, 'Ficção Científica'),
(6, 'Romance'),
(8, 'Suspense'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `series`:
--   `categoria_id`
--       `categorias` -> `id`
--

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `titulo`, `descricao`, `imagem`, `categoria_id`) VALUES
(1, 'Breaking Bad', 'Breaking Bad narra a transformação de Walter White (Bryan Cranston), um professor de química frustrado e diagnosticado com câncer de pulmão inoperável, em um impiedoso produtor de metanfetamina. Para garantir o futuro financeiro de sua família, ele se alia ao ex-aluno Jesse Pinkman (Aaron Paul), mergulhando no perigoso mundo do crime no Novo México.', 'https://wallpapercave.com/wp/wp6892154.jpg', 1),
(2, 'Stranger Things', 'Stranger Things é uma série de suspense e ficção científica da Netflix ambientada nos anos 80, focada no desaparecimento misterioso do garoto Will Byers na pequena cidade de Hawkins. A trama envolve segredos governamentais, experimentos paranormais, uma dimensão sombria conhecida como Mundo Invertido e a aparição de uma menina com poderes telecinéticos, Eleven.', 'https://images.wallpapersden.com/image/download/stranger-things-banner_bGltaG6UmZqaraWkpJRnZWVsrWZmZ24.jpg', 5),
(3, 'The Office', 'The Office (US) é uma aclamada série de comédia no estilo mockumentary (falso documentário) que acompanha o cotidiano caótico, bizarro e hilário dos funcionários da filial de Scranton da empresa de papel Dunder Mifflin. Sob a gerência de Michael Scott (Steve Carell), um chefe imaturo, egocêntrico, mas bem-intencionado, a equipe lida com crises profissionais, romances de escritório e situações constrangedoras', 'https://images.plex.tv/photo?size=large-1280&url=https:%2F%2Fmetadata-static.plex.tv%2Fa%2Fgracenote%2Faf213dc844a28a14634f5f5b0613cec3.jpg', 2),
(4, 'The Walking Dead', 'The Walking Dead é uma série pós-apocalíptica focada na sobrevivência humana após uma pandemia zumbi. Liderado pelo xerife Rick Grimes, o grupo busca abrigo e recursos, enfrentando não apenas os mortos-vivos, mas outros sobreviventes perigosos, destacando conflitos morais, psicológicos e a desintegração da sociedade.', 'https://www.themoviedb.org/t/p/original/eUMwG5vXg4ovEUvXLAFgrr4bQvp.jpg', 4),
(5, 'Game of Thrones', 'Game of Thrones (baseada em As Crônicas de Gelo e Fogo de George R.R. Martin) acompanha casas nobres em Westeros lutando pelo controle do Trono de Ferro. Enquanto traições e guerras políticas ocorrem, uma ameaça sobrenatural, os Caminhantes Brancos, desperta no norte, e Daenerys Targaryen planeja retomar o trono com dragões no continente de Essos.', 'https://i.kym-cdn.com/entries/icons/facebook/000/010/576/got.jpg', 3),
(6, 'Friends', 'Friends é uma sitcom clássica que acompanha a vida de seis amigos — Rachel, Monica, Phoebe, Joey, Chandler e Ross — vivendo em Manhattan, Nova York, durante os anos 90 e início dos anos 2000. A série explora com humor as peripécias da vida adulta, incluindo relacionamentos amorosos, dilemas profissionais, amizade e a busca pela independência.', 'https://tse2.mm.bing.net/th/id/OIP.o0Zt3grd0PIwHLKc-eUcnQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 2),
(7, 'Dark', 'Dark é uma série alemã de suspense e ficção científica da Netflix que explora o desaparecimento de crianças na cidade de Winden, revelando segredos obscuros entre quatro famílias. A trama conecta os anos de 1953, 1986 e 2019, focando em viagens no tempo e o trágico ciclo repetitivo a cada 33 anos.', 'https://images.plex.tv/photo?size=large-1280&url=https:%2F%2Fmetadata-static.plex.tv%2F7%2Fgracenote%2F76d02c3db0298635a9eea48b84bf5577.jpg', 5),
(8, 'Outlander', 'Outlander narra a história de Claire Randall, uma enfermeira de combate de 1945 que é misteriosamente transportada para a Escócia de 1743. Presa no passado, ela se vê dividida entre a lealdade ao seu marido no futuro e a paixão por Jamie Fraser, um jovem guerreiro escocês, enquanto enfrenta intrigas, batalhas e o perigo de um antepassado cruel.', 'https://www.showbizjunkies.com/wp-content/uploads/2023/05/outlander-season-7-official-poster.jpg', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `usuarios`:
--

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `senha`) VALUES
(1, 'NivaldoBoga', '1234'),
(2, 'AyrtonKabare', '5678');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);

--
-- Limitadores para a tabela `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
