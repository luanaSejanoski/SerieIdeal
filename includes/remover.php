<?php
session_start();

include_once 'includes/cadastrar.php';

if (isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];

    foreach ($_SESSION["series"] as $indice => $serie) {
        if ($serie["titulo"] == $titulo) {
            unset($_SESSION["series"][$indice]);
        }

        $_SESSION["series"] = array_values($_SESSION["series"]); //reorganiza os indices do array
    }
}
header("Location: ../index.php");
exit;
?>
</body>

</html>