<?php
function cadastraSerie(PDO $pdo, $titulo, $descricao, $descricaoMenor, $imagem, $categoria_id)
{
    $sql = "INSERT INTO series
            (titulo, descricao, descricaoMenor, imagem, categoria_id)
            VALUES
            (:titulo, :descricao, :descricaoMenor, :imagem, :categoria_id)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':descricaoMenor' => $descricaoMenor,
        ':imagem' => $imagem,
        ':categoria_id' => $categoria_id,
    ]);
}


function deletarSerie(PDO $pdo, $serie)
{
    $sql = "DELETE FROM series WHERE id = :serie";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':serie' => $serie]);
}

function editarSerie(PDO $pdo, $titulo, $descricao, $descricaoMenor, $imagem, $categoria_id, $id)
{
    $sql = "UPDATE series SET
            titulo = :titulo,
            descricao = :descricao,
            descricaoMenor = :descricaoMenor,
            imagem = :imagem,
            categoria_id = :categoria_id
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':descricaoMenor' => $descricaoMenor,
        ':imagem' => $imagem,
        ':categoria_id' => $categoria_id,
        ':id' => $id
    ]);
}


function selecionarTodasAsSeries(PDO $pdo)
{
    $sql = "SELECT s.*, c.nome AS genero 
FROM series s 
LEFT JOIN categorias c 
ON s.categoria_id = c.id";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

function buscarSeriePorId(PDO $pdo, $tituloRecebido)
{
    $sql = 'SELECT s.*, c.nome AS genero
        FROM series s
        LEFT JOIN categorias c
        ON s.categoria_id = c.id
        WHERE s.id = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $tituloRecebido
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarTitulosSeries(PDO $pdo)
{
    $sql = 'SELECT titulo, id FROM series';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarSerieParaEditar(PDO $pdo, int $id)
{
    $sql = 'SELECT * FROM series WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
