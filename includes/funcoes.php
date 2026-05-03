<?php
function exibirInformacoes(array $series)
{
    if (empty($series)) {
        echo "Não encontrado!";
    } else {
        foreach ($series as $serie) {
            echo "<p>" . $serie["titulo"] . "</p>";
            echo "<p>" . $serie["genero"] . "</p>";
            echo "<p>" . $serie["descricao"] . "</p>";
            echo "<p><img src = " . $serie["imagem"] . " width = 130px></img></p><br>";
        }
    }
}


function buscarPorGenero(array $series, string $busca)
{
    $resultado = [];

    foreach ($series as $serie) {
        if (mb_strtolower($busca) == mb_strtolower($serie["genero"])) {
            array_push($resultado, $serie);
        }
    }
    exibirInformacoes($resultado);
}


function buscarPorNome(array $series, string $nome)
{
    $resultado = [];

    foreach ($series as $serie) {
        if (mb_strtolower($nome) == mb_strtolower($serie["titulo"])) {
            $resultado[] = $serie;
        }
    }

    exibirInformacoes($resultado);
}
?>
