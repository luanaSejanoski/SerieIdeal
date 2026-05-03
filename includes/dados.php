<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serie Ideal</title>
</head>

<body>
<!-- PEGA ESSE CÓDIGO AQUI PRA BUSCAR PELO NOME E GENERO, FRANÇA (colocar no index.php) -->
  <!-- <form action="dados.php" method="get">
    <input type="text" name="nome" id="inome" placeholder="Buscar por uma série">
    <button>Buscar</button>
  </form>


  <form action="dados.php" method="get">
    <select name="genero" id="igenero">
      <option value="" disabled selected>Gênero</option>
      <option value="Drama">Drama</option>
      <option value="Comédia">Comédia</option>
      <option value="Ação">Ação</option>
      <option value="Terror">Terror</option>
      <option value="Ficção Científica">Ficção Científica</option>
      <option value="Romance">Romance</option>
    </select>
    <button>Selecionar</button>
  </form> -->

  <?php
  require_once 'funcoes.php';
  require_once 'protegido.php';

  $generos = ["Drama", "Comédia", "Ação", "Terror", "Ficção Científica", "Romance"];
  $series = [
    [
      "titulo" => "Breaking Bad",
      "genero" => "Drama",
      "descricao" => "Um professor de química começa a produzir drogas para sustentar a família.",
      "imagem" => "https://image.tmdb.org/t/p/w500/ggFHVNu6YYI5L9pCfOacjizRGt.jpg"
    ],
    [
      "titulo" => "Stranger Things",
      "genero" => "Ficção Científica",
      "descricao" => "Um grupo de crianças enfrenta fenômenos sobrenaturais em uma pequena cidade.",
      "imagem" => "https://image.tmdb.org/t/p/w500/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg"
    ],
    [
      "titulo" => "The Office",
      "genero" => "Comédia",
      "descricao" => "O cotidiano de funcionários de um escritório com situações absurdas.",
      "imagem" => "https://www.themoviedb.org/t/p/w600_and_h900_face/e7BoS8uUnew9ioS6reqtK9matqy.jpg"
    ],
    [
      "titulo" => "The Walking Dead",
      "genero" => "Terror",
      "descricao" => "Sobreviventes enfrentam um mundo dominado por zumbis.",
      "imagem" => "https://www.themoviedb.org/t/p/w600_and_h900_face/9lb02gTh4LLB17yAEXFd4C3R4JP.jpg"
    ],
    [
      "titulo" => "Game of Thrones",
      "genero" => "Ação",
      "descricao" => "Famílias nobres disputam o controle de um reino cheio de intrigas.",
      "imagem" => "https://image.tmdb.org/t/p/w500/u3bZgnGQ9T01sWNhyveQz0wH0Hl.jpg"
    ],
    [
      "titulo" => "Friends",
      "genero" => "Comédia",
      "descricao" => "Seis amigos vivem situações engraçadas e emocionantes em Nova York.",
      "imagem" => "https://image.tmdb.org/t/p/w500/f496cm9enuEsZkSPzCwnTESEK5s.jpg"
    ],
    [
      "titulo" => "Dark",
      "genero" => "Ficção Científica",
      "descricao" => "Mistérios envolvendo viagens no tempo e segredos familiares.",
      "imagem" => "https://www.themoviedb.org/t/p/w600_and_h900_face/apbrbWs8M9lyOpJYU5WXrpFbk1Z.jpg"
    ],
    [
      "titulo" => "Outlander",
      "genero" => "Romance",
      "descricao" => "Uma enfermeira viaja no tempo e vive um romance intenso no passado.",
      "imagem" => "https://www.themoviedb.org/t/p/w600_and_h900_face/bxBmfyzK0ARF9hqf2pbFWsddH14.jpg"
    ]
  ];

  $series = $series ?? [];
  $seriesSessao = $_SESSION["series"] ?? [];
  $catalogo = array_merge($series, $seriesSessao);


  $nome = isset($_GET["nome"]) ? trim($_GET["nome"]) : "";
  $genero = isset($_GET["genero"]) ? $_GET["genero"] : "";

  if ($nome !== "") {
    buscarPorNome($catalogo, $nome);
  }

  if ($genero !== "") {
    buscarPorGenero($catalogo, $genero);
  }
  ?>
  
</body>

</html>