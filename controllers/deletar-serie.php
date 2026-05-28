<?php
session_start();

require_once '../config/database.php';

$serie = $_GET["serieRemover"];

$sql = "DELETE FROM series WHERE id = :serie";
$stmt = $pdo->prepare($sql);
$stmt->execute([':serie' => $serie]);

header("Location: ../views/admin/dashboard.php");
exit;
?>
