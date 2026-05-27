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
    echo '<div class="seriesDetalhadas" style=" background-image:  linear-gradient(to right, #131013f2 25%,
#2e2c3059 100%), url(' . $serie["imagem"] . ');">';
    echo '<div class="divSerie""><h2>' . $serie["titulo"] .' | ' . $serie["genero"] . '</h2>';
    echo '<p class="sinopse" style="text-align: left; margin:0; width:100%">' . $serie["descricao"] . '</p>';
    echo '<p>Nota: ⭐0.0</p></div>';
    echo '</div>';
    echo '</div>';
}

function buscarPorGenero(int $genero, PDO $pdo): array
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
