<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Serie Ideal</title>
</head>
<body>
  <header>
    <a href="index.php">
    <h1>Serie Ideal</h1>
    </a>
    <nav>
      <a href="cadastrar.php">Nova Série</a>
      <a href="login.php">Login</a>
    </nav>
  </header>
  <main>
    <div class="buscar">
    <form action="index.php" method="get">
      <input type="text" name="nome" id="inome" placeholder="Buscar por uma série">
      <button>Buscar</button>

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
    </form>
    </div>
  <?php 
  session_start();
  require_once 'dados.php';
  require_once 'funcoes.php';

  $series = $series ?? [];
  $seriesSessao = $_SESSION["series"] ?? [];
  $catalogo = array_merge($series, $seriesSessao);


  $nome = isset($_GET["nome"]) ? trim($_GET["nome"]) : "";
  $genero = isset($_GET["genero"]) ? $_GET["genero"] : "";

  //exibe as series na tela inicial sem a descrição!
  if($genero == "" && $nome == ""){
    exibirInformacoes($catalogo);
  }
  //chamar funcao de busca por nome
  //+ exibe todas as informações das series
  if($nome !== ""){
    $catalogo = buscarPorNome($catalogo, $nome);
    exibirDetalhes($catalogo);
}
if($genero !== ""){
    $catalogo = buscarPorGenero($catalogo, $genero);
    exibirDetalhes($catalogo);
}
  ?>
  </main>
</body>
</html>