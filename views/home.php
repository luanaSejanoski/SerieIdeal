<?php
session_start();
//apaga valores antes se tiver pra não dar conflito
$nome = "";
$genero = "";
$catalogo = [];

require_once '../controllers/homeController.php';
require_once '../views/navbarHome.php';
require_once '../includes/funcoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <title>Serie Ideal</title>
</head>

<body>

  <?php
  
    exibirInformacoes($catalogo);
   ?>
</body>

</html>