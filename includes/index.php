<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- USA ESSE CÓDIGO se quiser AQUI PRA BUSCAR PELO NOME E GENERO, FRANÇA -->
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

  <?php 
  session_start();
  require_once 'dados.php';
  require_once 'funcoes.php';

  $series = $series ?? [];
  $seriesSessao = $_SESSION["series"] ?? [];
  $catalogo = array_merge($series, $seriesSessao);


  $nome = isset($_GET["nome"]) ? trim($_GET["nome"]) : "";
  $genero = isset($_GET["genero"]) ? $_GET["genero"] : "";

  //chamar funcao de busca por nome

  if ($genero !== "") {
    buscarPorGenero($catalogo, $genero);
  }
  
  ?>
</body>
</html>