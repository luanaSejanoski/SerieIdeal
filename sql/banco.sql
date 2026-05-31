-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Maio-2026 às 18:00
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
   CREATE DATABASE IF NOT EXISTS bancoIdeal;
   USE bancoIdeal;

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
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `usuario_id`, `serie_id`, `nota`, `comentario`) VALUES
(1, 1, 3, 5, 'Fico sempre feliz assistindo essa série!'),
(2, 2, 8, 3, 'É um bombom mix de tão romântico!'),
(4, 3, 8, 4, 'Eu abro a porta e puxo a cadeira do jantar\r\nÀ luz de velas pra ela se apaixonar\r\nEu mando flores, chocolates e cartão\r\nO meu problema sempre foi ter grande coração\r\n\r\nEu ligo no outro dia no estilo Don Juan\r\nDormiu bem, meu amor?\r\nÉ domingo de manhã\r\nVamos pegar uma praia\r\nDeu saudade do seu beijo\r\nTrato todas iguais\r\nEsse é meu defeito\r\n\r\nTô namorando todo mundo\r\n99% anjo, perfeito\r\nMas aquele 1% é vagabundo\r\nAquele 1% é vagabundo\r\nSafado e elas gostam\r\n\r\nEu abro a porta e puxo a cadeira do jantar\r\nÀ luz de velas pra ela se apaixonar\r\nEu mando flores, chocolates e cartão\r\nO meu problema sempre foi ter grande coração\r\n\r\nEu ligo no outro dia no estilo Don Juan\r\nDormiu bem, meu amor?\r\nÉ domingo de manhã\r\nVamos pegar uma praia\r\nDeu saudade do seu beijo\r\nTrato todas iguais\r\nEsse é meu defeito\r\n\r\nTô namorando todo mundo\r\n99% anjo, perfeito\r\nMas aquele 1% é vagabundo\r\nAquele 1% é vagabundo\r\nSafado e elas gostam');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(3, 'Ação'),
(7, 'Anime'),
(2, 'Comédia'),
(1, 'Drama'),
(5, 'Ficção Científica'),
(8, 'Mistério'),
(6, 'Romance'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `descricaoMenor` varchar(150) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `titulo`, `descricao`, `descricaoMenor`, `imagem`, `categoria_id`) VALUES
(1, 'Breaking Bad', 'Breaking Bad narra a transformação de Walter White (Bryan Cranston), um professor de química frustrado e diagnosticado com câncer de pulmão inoperável, em um impiedoso produtor de metanfetamina. Para garantir o futuro financeiro de sua família, ele se alia ao ex-aluno Jesse Pinkman (Aaron Paul), mergulhando no perigoso mundo do crime no Novo México.', 'Um professor de química com câncer de pulmão vira um produtor de metanfetamina para garantir o futuro da família.', 'https://wallpapercave.com/wp/wp6892154.jpg', 1),
(2, 'Stranger Things', 'Stranger Things é uma série de suspense e ficção científica da Netflix ambientada nos anos 80, focada no desaparecimento misterioso do garoto Will Byers na pequena cidade de Hawkins. A trama envolve segredos governamentais, experimentos paranormais, uma dimensão sombria conhecida como Mundo Invertido e a aparição de uma menina com poderes telecinéticos, Eleven.', 'Nos anos 80, o sumiço de um garoto revela segredos do governo, uma dimensão sombria e uma menina com superpoderes.', 'https://images.wallpapersden.com/image/download/stranger-things-banner_bGltaG6UmZqaraWkpJRnZWVsrWZmZ24.jpg', 5),
(3, 'The Office', 'The Office (US) é uma aclamada série de comédia no estilo mockumentary (falso documentário) que acompanha o cotidiano caótico, bizarro e hilário dos funcionários da filial de Scranton da empresa de papel Dunder Mifflin. Sob a gerência de Michael Scott (Steve Carell), um chefe imaturo, egocêntrico, mas bem-intencionado, a equipe lida com crises profissionais, romances de escritório e situações constrangedoras', 'Um falso documentário que acompanha o cotidiano caótico, bizarro e hilário dos funcionários de uma empresa de papel.', 'https://images.plex.tv/photo?size=large-1280&url=https:%2F%2Fmetadata-static.plex.tv%2Fa%2Fgracenote%2Faf213dc844a28a14634f5f5b0613cec3.jpg', 2),
(4, 'The Walking Dead', 'The Walking Dead é uma série pós-apocalíptica focada na sobrevivência humana após uma pandemia zumbi. Liderado pelo xerife Rick Grimes, o grupo busca abrigo e recursos, enfrentando não apenas os mortos-vivos, mas outros sobreviventes perigosos, destacando conflitos morais, psicológicos e a desintegração da sociedade.', 'Um grupo de sobreviventes liderado por um xerife luta para resistir a um apocalipse zumbi e às ameaças humanas.', 'https://www.themoviedb.org/t/p/original/eUMwG5vXg4ovEUvXLAFgrr4bQvp.jpg', 4),
(5, 'Game of Thrones', 'Game of Thrones (baseada em As Crônicas de Gelo e Fogo de George R.R. Martin) acompanha casas nobres em Westeros lutando pelo controle do Trono de Ferro. Enquanto traições e guerras políticas ocorrem, uma ameaça sobrenatural, os Caminhantes Brancos, desperta no norte, e Daenerys Targaryen planeja retomar o trono com dragões no continente de Essos.', 'Casas nobres de Westeros lutam pelo Trono de Ferro enquanto uma ameaça sobrenatural desperta no norte.', 'https://i.kym-cdn.com/entries/icons/facebook/000/010/576/got.jpg', 3),
(6, 'Friends', 'Friends é uma sitcom clássica que acompanha a vida de seis amigos — Rachel, Monica, Phoebe, Joey, Chandler e Ross — vivendo em Manhattan, Nova York, durante os anos 90 e início dos anos 2000. A série explora com humor as peripécias da vida adulta, incluindo relacionamentos amorosos, dilemas profissionais, amizade e a busca pela independência.', 'Seis amigos enfrentam com muito humor os dilemas amorosos, profissionais e pessoais da vida adulta em Nova York.', 'https://tse2.mm.bing.net/th/id/OIP.o0Zt3grd0PIwHLKc-eUcnQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 2),
(7, 'Dark', 'Dark é uma série alemã de suspense e ficção científica da Netflix que explora o desaparecimento de crianças na cidade de Winden, revelando segredos obscuros entre quatro famílias. A trama conecta os anos de 1953, 1986 e 2019, focando em viagens no tempo e o trágico ciclo repetitivo a cada 33 anos.', 'O desaparecimento de duas crianças revela um mistério de viagem no tempo que conecta quatro famílias ao longo de gerações.', 'https://images.plex.tv/photo?size=large-1280&url=https:%2F%2Fmetadata-static.plex.tv%2F7%2Fgracenote%2F76d02c3db0298635a9eea48b84bf5577.jpg', 5),
(8, 'Outlander', 'Outlander narra a história de Claire Randall, uma enfermeira de combate de 1945 que é misteriosamente transportada para a Escócia de 1743. Presa no passado, ela se vê dividida entre a lealdade ao seu marido no futuro e a paixão por Jamie Fraser, um jovem guerreiro escocês, enquanto enfrenta intrigas, batalhas e o perigo de um antepassado cruel.', 'Uma enfermeira de 1945 é transportada para a Escócia de 1743 e se divide entre dois amores em tempos diferentes.', 'https://www.showbizjunkies.com/wp-content/uploads/2023/05/outlander-season-7-official-poster.jpg', 6),
(10, 'Jujutsu Kaisen', 'Sofrimento, arrependimento, vergonha: os sentimentos negativos dos humanos tornam-se Maldições, causando terríveis acidentes que podem levar até mesmo à morte. E pra piorar, Maldições só podem ser exorcizadas por outras Maldições. Certo dia, para salvar amigos que estavam sendo atacados por Maldições, Yuji Itadori engole o dedo do Ryomen-Sukuna, absorvendo sua Maldição. Ele então decide se matricular no Colégio Técnico de Feitiçaria de Tóquio, uma organização que combate as Maldições... e assim começa a heróica lenda do garoto que tornou-se uma Maldição para exorcizar uma Maldição.', 'Yuji Itadori entra no mundo das Maldições após engolir um objeto amaldiçoado e passa a combater criaturas sobrenaturais perigosas.', 'https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/019ba07b-75ed-7214-ac7f-1dca8c0cb881/compose?aspectRatio=1.78&format=webp&width=1200', 7),
(14, 'Uma Família da Pesada ', 'A série animada apresenta as aventuras da família Griffin. O ignorante Peter e sua esposa Lois residem em Quahog, em Rhode Island e têm três filhos. Meg, a filha mais velha, é uma pária social, e o adolescente Chris é estranho e sem noção quando se trata do sexo oposto. O mais novo, Stewie, é um bebê gênio decidido a matar sua mãe e destruir o mundo. O cachorro falante, Brian, mantém Stewie sob controle enquanto toma martinis e resolve seus próprios problemas de vida.', 'Uma família completamente caótica vive situações absurdas enquanto tenta sobreviver à própria insanidade diária.', 'https://i.ytimg.com/vi/83_luIWhL2s/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAPSU8_PfGojR8OnSakV9fxXLsa1g', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `senha`, `admin`) VALUES
(1, 'NivaldoBoga', '1234', 0),
(2, 'AyrtonKabare', '5678', 0),
(3, 'WesleySafadão', '$2y$10$ltdIbQopI07nAkCN3DeKTOmRdKsMDvtVOLlq1BPRwNHsT5iTPGVsm', 0),
(4, 'lu', '$2y$10$4gDLlt4szQlRLVyAuCezJO/wlwB1atBwkjSbeHr9s8bYhxkDSVd0u', 0),
(5, 'adminIdeal', '$2y$10$qxzX.Wyx3bh/ZG/iIGxBFuS0kjzCQNSvx3j76JS/j7Y4vuHUyl5qq', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
