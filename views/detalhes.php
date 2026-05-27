<?php
session_start();
require_once '../views/navbar.php';
require_once '../config/database.php';
require_once "../includes/funcoes.php";


$tituloRecebido = $_GET["titulo"] ?? "";

$sql = 'SELECT s.*, c.nome AS genero
FROM series s
LEFT JOIN categorias c
ON s.categoria_id = c.id
WHERE titulo = :titulo';

$stmt = $pdo->prepare($sql);

$stmt->execute(
    [
        ':titulo' => $tituloRecebido
    ]
);

$serieEncontrada = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <title>Detalhes</title>
</head>

<body>
    <main>
        <?php
        if ($serieEncontrada != null) {
            exibirDetalhes($serieEncontrada);
        } else {
            echo "<h2>Série não encontrada!</h2>";
        }
        ?>
    </main>
</body>

</html>