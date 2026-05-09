<?php

session_start();

require_once "dados.php";
require_once "funcoes.php";

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
    <link rel="stylesheet" href="style.css">
    <title>Detalhes</title>
</head>
<body>
<header>
    <a href="index.php">
    <h1>Serie Ideal</h1>
    </a>
    <nav>
        <a href="index.php">Home</a>
        <a href="cadastrar.php">Nova Série</a>
        <a href="login.php">Login</a>
    </nav>
</header>
<main>
<?php
    if($serieEncontrada != null){
        echo '<div class="todasAsSeries">';
        echo '<div class="series">';
        echo '<img src="' . $serieEncontrada["imagem"] . '">';
        echo '<h2>' . $serieEncontrada["titulo"] . " | " . $serieEncontrada["genero"] . '</h2>';
        echo "<p>" . $serieEncontrada["descricao"] . "</p>";
        echo '</div>';
        echo '</div>';
    }
    else{
        echo "<h2>Série não encontrada!</h2>";
    }
?>
</main>
</body>
</html>