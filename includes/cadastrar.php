 <?php 
 session_start();
 require_once 'dados.php';

if(!isset($_SESSION["Logado"]) || $_SESSION["Logado"] != true){
    header("Location: login.php");
    exit;
}
 
 $erros = $_SESSION["erros"] ?? [];
 unset($_SESSION["erros"]);

 $sucesso = $_SESSION["sucesso"] ?? "";
 unset($_SESSION["sucesso"]);

    $series = $series ?? [];//verifica se séries existe
    $seriesSessao = $_SESSION["series"] ?? [];//verifica se a sessão séries existe
    $catalogo = array_merge($series, $seriesSessao);//junto os arrays
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Série</title>
</head>
<body>
     <h2>Bem vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2>

    <h1>Cadastrar Série</h1>
    <form action="protegido.php" method="POST">
    <input type="text" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo htmlspecialchars($titulo ?? ''); ?>"><br>
    <input type="text" name="genero" id="genero" placeholder="Gênero" value="<?php echo htmlspecialchars($genero ?? ''); ?>"><br>
    <textarea name="descricao" id="descricao" placeholder="Descrição"><?php echo htmlspecialchars($descricao ?? ''); ?></textarea><br>
    <input type="text" name="imagem" id="imagem" placeholder="URL da imagem" value="<?php echo htmlspecialchars($imagem ?? ''); ?>"><br><br>
    <button type="submit">Cadastrar</button><br><br>
</form> 
<?php 
 //mostra erro
    foreach($erros as $erro) echo htmlspecialchars($erro) . "<br>";
    //mostra sucesso
    if ($sucesso) echo htmlspecialchars($sucesso);

?>
</body>
</html>