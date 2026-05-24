<?php

function exibirInformacoes(array $series)
{
    if (empty($series)) {
        echo "<p>Série não encontrada!</p>";
    } else {
        echo '<div class="todasAsSeries">';

        foreach ($series as $serie) {
            echo '<div class="series">';
            echo '<div class="imgEgenero">';
            echo '<img src="' . $serie["imagem"] . '">';
            echo '<div class= "sobreposicao">';
            echo '<p class="genero">' . $serie["genero"] . '</p>';
            echo '</div>';               
            echo '</div>';            
            echo '<h2>' . $serie["titulo"] . '</h2>';
            echo '<p class="sinopseCurta">' . $serie["descricaoMenor"] . '</p>';
            echo '<div class="botaoVerMais">';
            echo '<a class="verMais" href="../views/detalhes.php?titulo=' . urlencode($serie["titulo"]) . '">';
            echo 'Ver mais';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}

function exibirDetalhes(array $serie)
{
    echo '<div class="todasAsSeries">';
            echo '<div class="series" style ="width:500px;">';
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
    //         echo '<div class="series">';
    //         echo '<div class="imgEgenero">';
    //         echo '<img src="' . $serie["imagem"] . '">';
    //         echo '<div class= "sobreposicao">';
    //         echo '<p class="genero">' . $serie["genero"] . '</p>';
    //         echo '</div>';               
    //         echo '</div>';            
    //         echo '<h2>' . $serie["titulo"] . '</h2>';
    //         echo '<p class="sinopse">' . $serie["descricao"] . '</p>';
    //         echo '</div>';
    // echo '</div>';
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

    foreach ($series as $serie) {
        if (mb_strtolower($busca) == mb_strtolower($serie["titulo"])) {
            array_push($resultado, $serie);
        }
    }
    return $resultado;
}
