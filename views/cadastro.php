<?php 
session_start();
require_once '../views/navbar.php';

$mensagem = "";

if (isset($_SESSION["mensagem"])) {
    $mensagem = $_SESSION["mensagem"];
    unset($_SESSION['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css?">
  <title>Cadastrar-se</title>
</head>

<body>
    <div class="formulario">
      <form action="../controllers/cadastro.php" method="POST">
        <br><br><label style="color: white;" for="username">Usuário:</label>
        <input type="text" name="username" id="iuser"><br><br>
        <label style="color: white" for="senha">Senha:</label>
        <input type="password" name="senha" id="isenha"><br><br>
        <button type="submit">Criar conta</button>
        <p style="text-align: center;"><?php echo $mensagem ?? ""; ?></p>
      </form>
    </div>

</body>

</html>