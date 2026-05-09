  <?php 
session_start();

require_once 'includes/dados.php';
require_once 'includes/funcoes.php';

$series = $series ?? [];
$seriesSessao = $_SESSION["series"] ?? [];
$catalogo = array_merge($series, $seriesSessao);

require_once 'includes/filtrar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <title>Serie Ideal</title>
</head>

<body>
  <header>
    <a href="index.php">
      <h1>Serie Ideal</h1>
    </a>
    <nav>
      <a href="includes/cadastrar.php">Nova Série</a>
      <a href="includes/login.php">Login</a>
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
    if ($nome == "" && $genero == "") {
      exibirInformacoes($catalogo);
    } else {
      exibirDetalhes($catalogo);
    }
    ?>
  </main>
</body>

</html>