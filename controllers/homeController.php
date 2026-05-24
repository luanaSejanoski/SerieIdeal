 <?php
    require_once '../config/database.php';

    $nome = $_GET['nome'] ?? "";
    $genero = $_GET['genero'] ?? "";

    $sql = "SELECT s.*, c.nome AS genero 
FROM series s 
LEFT JOIN categorias c 
ON s.categoria_id = c.id";

    $stmt = $pdo->query($sql);
    $catalogo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>