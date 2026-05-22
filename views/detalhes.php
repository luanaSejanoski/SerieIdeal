<?php

session_start();

require_once "../includes/dados.php";
require_once "../includes/funcoes.php";

$series = $series ?? [];

$seriesSessao = $_SESSION["series"] ?? [];
$catalogo = array_merge($series, $seriesSessao);
$tituloRecebido = $_GET["titulo"] ?? "";

$serieEncontrada = null;

foreach($catalogo as $serie){
    if($serie["titulo"] == $tituloRecebido){
        $serieEncontrada = $serie;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css?v=2">
    <title>Detalhes</title>
</head>
<body>
<header>
    <a href="../views/home.php">
    <h1>Serie Ideal</h1>
    </a>
    <nav>
        <a href="../views/home.php">Home</a>
        <a href="../views/cadastro.php">Nova Série</a>
        <a href="../views/login.php">Login</a>
    </nav>
</header>
<main>
<?php
    if($serieEncontrada != null){
    echo '<div class="todasAsSeries">';
    echo '<div class="series">';
    echo '<div class="imgEgenero">';
    echo '<img src="' . $serie["imagem"] . '">';
    echo '<div class= "sobreposicao">';
    echo '<p class="genero">' . $serie["genero"] . '</p>';
    echo '</div>';               
    echo '</div>';            
    echo '<h2>' . $serie["titulo"] . '</h2>';
    echo '<p class="sinopse">' . $serie["descricao"] . '</p>';
    echo '</div>';
    echo '</div>';

        // echo '<div class="todasAsSeries">';
        // echo '<div class="series">';
        // echo '<img src="' . $serieEncontrada["imagem"] . '">';
        // echo '<h2>' . $serieEncontrada["titulo"] . " | " . $serieEncontrada["genero"] . '</h2>';
        // echo "<p>" . $serieEncontrada["descricao"] . "</p>";
        // echo '</div>';
        // echo '</div>';
    }
    else{
        echo "<h2>Série não encontrada!</h2>";
    }
?>
</main>
</body>
</html>