<?php
session_start();
require_once '../config/database.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $serieId = $_POST["serie_id"];
    $comentario = $_POST["comentario"] ?? null;
    $usuarioId = $_SESSION["id"];
    $nota = $_POST['nota'] ?? null;

    // comentario
if (!empty(trim($comentario))) {

    $sql = "INSERT INTO avaliacoes
            (usuario_id, serie_id, comentario)
            VALUES
            (:usuario_id, :serie_id, :comentario)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':usuario_id' => $usuarioId,
        ':serie_id' => $serieId,
        ':comentario' => $comentario
    ]);
 header("Location: ../views/detalhes.php?id=$serieId");
    exit;
}

}
$sql = "SELECT id
        FROM avaliacoes
        WHERE usuario_id = :usuario_id
        AND serie_id = :serie_id
        AND nota IS NOT NULL";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
        ':usuario_id' => $usuarioId,
        ':serie_id' => $serieId
]);


$avaliacaoExistente = $stmt->fetch();

//se ja existe só retorna para a pagina
if ($avaliacaoExistente) {
    header("Location: ../views/detalhes.php?id=$serieId");
    exit;

//senão insere avaliacao
} else {
   $sql = "INSERT INTO avaliacoes (usuario_id, serie_id, nota, comentario) 
                  VALUES
                  (:usuario_id, :serie_id, :nota, :comentario)";


            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    ':usuario_id' =>  $usuarioId,
                    ':serie_id' => $serieId,
                    ':comentario' => $comentario,
                    ':nota' => $nota
                ]
            );
}
        header("Location: ../views/detalhes.php?id=$serieId");

?>