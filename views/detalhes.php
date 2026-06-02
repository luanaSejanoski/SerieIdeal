<?php
session_start();
require_once '../views/navbar.php';
require_once '../config/database.php';
require_once "../includes/funcoes.php";
require_once '../helpers/csrf.php';
require_once '../models/avaliacao.php';
require_once '../models/serie.php';

$token = gerarTokenCSRF();

$tituloRecebido = $_GET["id"] ?? "";
$serieEncontrada = buscarSeriePorId($pdo, $tituloRecebido);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <title>Detalhes</title>
</head>

<body>
    <main class="mainDetalhes">
        <div class="divCard">
            <?php
            //verifica se serie foi encontrada
            if ($serieEncontrada != null) {
                $media = mediaNotas($serieEncontrada['id'], $pdo);
                exibirDetalhes($serieEncontrada, $media, $token);
            } else {
                echo "<h2>Série não encontrada!</h2>";
            }
            ?>
        </div>
        <div class="comentarios">
            <div class="listaComentarios">
                <?php
                exibirComentarios($serieEncontrada["id"], $pdo); //exibe comentario
                $media = mediaNotas($serieEncontrada['id'], $pdo); //pega notas para calcular media
                ?>

            </div>
            <form class="formComentario" action="../controllers/avaliacoes.php" method="POST">
                <input type="hidden" name="tokenCsrf" value="<?php echo $token; ?>">
                <input type="hidden" name="serie_id" value="<?php echo $serieEncontrada['id']; ?>">
                <input type="text" name="comentario" id="icomentario">

                <button type="submit">Publicar</button>

            </form>
        </div>
    </main>
</body>

</html>