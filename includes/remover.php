<?php
session_start();

require_once '../config/database.php';
include_once '../includes/cadastrar.php';

if (isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];
    try {
        $sql = "DELETE FROM series WHERE titulo = :titulo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $titulo]);
    } catch(PDOException $e) {
        //tratar erros de foreign key aqui se necessário
    }
    // foreach ($_SESSION["series"] as $indice => $serie) {
    //     if ($serie["titulo"] == $titulo) {
    //         unset($_SESSION["series"][$indice]);
    //     }

    //     $_SESSION["series"] = array_values($_SESSION["series"]); //reorganiza os indices do array
    // }
}
header("Location: ../views/home.php");
exit;
?>
</body>

</html>