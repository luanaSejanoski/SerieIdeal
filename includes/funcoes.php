<?php
require_once '../config/database.php';
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

function buscarPorGenero(int $genero, PDO $pdo) : array
{
    $sql = 'SELECT s.*, c.nome AS genero
    FROM series s
    LEFT JOIN categorias c
    ON s.categoria_id = c.id
    WHERE s.categoria_id = :genero';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            ':genero' => $genero
        ]
        );

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}


function buscarPorNome(string $nome, PDO $pdo): array
{
    $sql = 'SELECT s.*, c.nome AS genero
FROM series s
LEFT JOIN categorias c
ON s.categoria_id = c.id
WHERE s.titulo LIKE :titulo';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            ':titulo' => "%$nome%"
        ]
    );

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
