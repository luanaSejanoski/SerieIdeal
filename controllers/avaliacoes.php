<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';
require_once '../models/avaliacao.php';

validarTokenCSRF();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $serieId = $_POST["serie_id"];
    $comentario = $_POST["comentario"] ?? null;
    $usuarioId = $_SESSION["id"];
    $nota = $_POST['nota'] ?? null;

    realizaAvaliacao($pdo, $serieId, $comentario, $usuarioId, $nota);

    header("Location: ../views/detalhes.php?id=$serieId");
    exit;
}
