<?php
// function exibirInformacoes(array $series)
// {
//     if (empty($series)) {
//         echo "Não encontrado!";
//     } else {
//         foreach ($series as $serie) {
//             echo "<p>" . $serie["titulo"] . "</p>";
//             echo "<p>" . $serie["genero"] . "</p>";
//             echo "<p>" . $serie["descricao"] . "</p>";
//             echo "<p><img src = " . $serie["imagem"] . " width = 130px></img></p><br>";
//         }
//     }
// }
function exibirInformacoes(array $series)
{
    if (empty($series)) {
        echo "<p>Série não encontrada!</p>";
    } 
    else {
        echo '<div class="todasAsSeries">';

        foreach ($series as $serie) {
            echo '<div class="series">';
            echo '<img src="' . $serie["imagem"] . '">';
            echo '<h2>' . $serie["titulo"] . " | " . $serie["genero"] . '</h2>';
            echo '<a class="verMais" href="detalhes.php?titulo=' . urlencode($serie["titulo"]) . '">';
            echo 'Ver mais';
            echo '</a>';
            echo '</div>';
        }
        echo '</div>';
    }
}

function exibirDetalhes(array $series)
{
        echo '<div class="todasAsSeries">';

        foreach ($series as $serie) {
            echo '<div class="series">';
            echo '<img src="' . $serie["imagem"] . '">';
            echo '<h2>' . $serie["titulo"] . " | " . $serie["genero"] . '</h2>';
            echo "<p>" . $serie["descricao"] . "</p>";
            echo '</div>';
        }
        echo '</div>';
    }

function buscarPorGenero(array $series, string $busca)
{
    $resultado = [];

    foreach ($series as $serie) {
        if (mb_strtolower($busca) == mb_strtolower($serie["genero"])) //converte tudo pra minusculo
        {
            array_push($resultado, $serie);
        }
    }
    return $resultado;
}

//busca por nome aqui
function buscarPorNome(array $series, string $busca)
{
    $resultado = [];
    $encontrado = false;

    foreach($series as $serie){
        if(mb_strtolower($busca) == mb_strtolower($serie["titulo"])){
            array_push($resultado, $serie);
            $encontrado = true;
        }
    }
    if(!$encontrado){
        echo "<p>Série não encontrada!</p>";
    }
    return $resultado;
}
?>
