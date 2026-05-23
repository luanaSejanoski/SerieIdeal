<?php

require_once '../config/database.php';
require_once '../includes/dados.php';
require_once '../includes/funcoes.php';

// $series = $series ?? [];
// $seriesSessao = $_SESSION["series"] ?? [];
// $catalogo = array_merge($series, $seriesSessao);

require_once '../includes/filtrar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css?v=2">
  <title>Serie Ideal</title>
</head>

<body>
  <?php require_once '../views/navbar.php'; ?>
<?php
  if (($nome != "" || $genero != "") && empty($catalogo)) {
      echo "<p class='naoEncontrado'>Série não encontrada!</p>";
  } 
  else if ($nome == "" && $genero == "") {
      exibirInformacoes($catalogo);
  } else {
      exibirDetalhes($catalogo);
  }
  ?>
</body>

</html>