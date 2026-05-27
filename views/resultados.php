<?php
session_start();
$nome = "";
$genero = "";
$catalogo = [];

require_once '../views/navbarHome.php';
require_once '../includes/funcoes.php';

$resultado = $_SESSION["resultadoBusca"] ?? [];
$erro = $_SESSION["erroBusca"] ?? "";

unset($_SESSION["resultadoBusca"]);
unset($_SESSION["erroBusca"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css?v=2">
  <title>Serie Ideal</title>
  <style>
    p{
      text-align: center;
    }
  </style>
</head>

<body>
 <?php 
    if (!empty($erro)) {
        echo "<p>$erro</p>";
    } elseif (!empty($resultado)) {
        exibirInformacoes($resultado);
    } else {
        echo "<p>" . $_SESSION["erroBusca"] . "</p>";
    }
 ?>
</body>

</html>