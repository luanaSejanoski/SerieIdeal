<?php
session_start();
require_once '../config/database.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $serieId = $_POST["serie_id"];
    $comentario = $_POST["comentario"] ?? null;
    $usuarioId = $_SESSION["id"];
    $nota = $_POST['nota'] ?? null;

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

header("Location: ../views/detalhes.php?id=$serieId");
exit;
}

?>