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
            echo '<a class="verMais" href="../views/detalhes.php?id=' . urlencode($serie["id"]) . '">';
            echo 'Ver mais';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}


function exibirDetalhes(array $serie, $media, $token){

    echo '<div class="todasAsSeries">';
    echo '<div class="seriesDetalhadas" style=" background-image:  linear-gradient(to right, #131013f2 25%,
#2e2c3059 100%), url(' . $serie["imagem"] . ');">';
    echo '<div class="divSerie"><h2>' . $serie["titulo"] . ' | ' . $serie["genero"] . '</h2>';
    echo '<p class="sinopse" style="text-align: left; margin:0; width:100%">' . $serie["descricao"] . '</p>';
    echo '<p>Nota: ⭐' . number_format($media, 1) . '</p>';

    echo '<form class="avaliar" action="../controllers/avaliacoes.php" method="POST">';
    echo '<input type="hidden" name="tokenCsrf" value="' . $token . '">';
    echo '<input type="hidden" name="serie_id" value="' . $serie['id'] . '">';
    echo '<button name="nota" value="1">⭐</button>';
    echo '<button name="nota" value="2">⭐⭐</button>';
    echo '<button name="nota" value="3">⭐⭐⭐</button>';
    echo '<button name="nota" value="4">⭐⭐⭐⭐</button>';
    echo '<button name="nota" value="5">⭐⭐⭐⭐⭐</button>';

    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function exibirComentarios(int $serieId, PDO $pdo)
{
    $sql = 'SELECT  u.username, a.comentario
    FROM usuarios u
    INNER JOIN avaliacoes a
    ON u.id = a.usuario_id
    WHERE serie_id = :id
    AND comentario IS NOT NULL';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            ':id' => $serieId
        ]
    );

    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($comentarios != null) {
        foreach ($comentarios as $comentario) {
            echo '<p><strong style="color:#FDD838;">' . $comentario["username"] . ':</strong> ' . $comentario["comentario"] . '</p> ';
        }
    } else {
        echo '<p style="text-align:center;">Ainda não há comentários para essa série :(</p>';
    }
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

function mediaNotas(int $serieId, PDO $pdo)
{
    $sql = 'SELECT AVG(nota) AS media
    FROM avaliacoes
    WHERE serie_id = :id
    AND nota IS NOT NULL';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            ':id' => $serieId
        ]
    );

    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultados['media'];
}
