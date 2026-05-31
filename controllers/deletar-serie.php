<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';

validarTokenCSRF();

$serie = $_POST["serieRemover"];

$sql = "DELETE FROM series WHERE id = :serie";
$stmt = $pdo->prepare($sql);
$stmt->execute([':serie' => $serie]);

header("Location: ../views/admin/dashboard.php");
exit;
?>
