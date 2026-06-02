 <?php
    require_once '../config/database.php';
    require_once '../models/serie.php';

    $nome = $_GET['nome'] ?? "";
    $genero = $_GET['genero'] ?? "";

   $catalogo = selecionarTodasAsSeries($pdo);
    ?>