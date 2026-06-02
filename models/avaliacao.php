<?php
function realizaAvaliacao(PDO $pdo, $serieId, $comentario, $usuarioId, $nota)
{
    //criar avaliacao se ainda não existir e se existir, atualiza
    //COALESCE-> usa o valor novo se vier, senão fica o antigo
    $sql = "INSERT INTO avaliacoes (usuario_id, serie_id, nota, comentario) 
        VALUES (:usuario_id, :serie_id, :nota, :comentario)
        ON DUPLICATE KEY UPDATE
         nota = COALESCE(VALUES(nota), nota), 
comentario = COALESCE(VALUES(comentario), comentario)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':usuario_id' => $usuarioId,
        ':serie_id' => $serieId,
        ':nota' => $nota,
        ':comentario' => $comentario
    ]);
}


function selecionaComentarios(PDO $pdo, $serieId){
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

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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