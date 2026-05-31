<?php
session_start();
require_once '../views/navbar.php';
require_once '../config/database.php';
require_once "../includes/funcoes.php";


$tituloRecebido = $_GET["id"] ?? "";
$sql = 'SELECT s.*, c.nome AS genero
        FROM series s
        LEFT JOIN categorias c
        ON s.categoria_id = c.id
        WHERE s.id = :id';

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $tituloRecebido
]);

$serieEncontrada = $stmt->fetch();

$jaAvaliou = false;
//verifica se usuario ja avaliou
if(isset ($_SESSION['id']) && $serieEncontrada){
$jaAvaliou = usuarioAvaliou(
 $_SESSION['id'],
 $serieEncontrada['id'],
 $pdo
);
}

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
        <div>
            <?php
            //verifica se serie foi encontrada
            if ($serieEncontrada != null) {
                $media = mediaNotas($serieEncontrada['id'], $pdo);
                exibirDetalhes($serieEncontrada, $media, $jaAvaliou);
            } else {
                echo "<h2>Série não encontrada!</h2>";
            }
            ?>
        </div>
        <div class="comentarios">
            <div class="listaComentarios">
            <?php
            // echo $serieEncontrada["id"];
           
            exibirComentarios($serieEncontrada["id"], $pdo);//exibe comentario
            $media = mediaNotas($serieEncontrada['id'], $pdo);//pega notas para calcular media
            ?>

            </div>
           <form class="formComentario" action="../controllers/avaliacoes.php" method="POST">

           <input type="hidden" name="serie_id"  value="<?php echo $serieEncontrada['id']; ?>"
    >
            <input type="text" name="comentario" id="icomentario">

            <button type="submit">Publicar</button>

            </form>
        </div>
    </main>
</body>

</html>