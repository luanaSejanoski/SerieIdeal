<?php 
session_start();


require_once '../views/navbar.php';
require_once '../helpers/csrf.php';

$token = gerarTokenCSRF();

//verifica se usuario já tem sessão iniciada
if (isset($_SESSION["Logado"]) && $_SESSION["Logado"] === true) {
    header("Location: ../views/home.php"); //redireciona a pagina home
    exit;
}

if (isset($_SESSION['erro_login'])) {
    $mensagem = $_SESSION["erro_login"];
    unset($_SESSION["erro_login"]); // apaga depois de mostrar
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css?">
    <title>Login</title>
</head>

<body>
        <div class ="formulario">
            <h1 style="text-align:center; color:white">Entrar</h1>
            <form action="../controllers/login.php" method="POST">
                <input type="hidden" name="tokenCsrf" value="<?php echo $token; ?>">
                <br><br><label style="color: white;" for="user">Usuário:</label>
                <input type="text" name="user" id="iuser" value="<?php echo htmlspecialchars($_COOKIE["ultimoUser"] ?? ""); ?>"><br><br>
                <label style="color: white" for="senha">Senha:</label>
                <input type="password" name="senha" id="isenha"><br><br>

                <button type="submit">Entrar</button>

                <p style="text-align: center;"><?php echo $mensagem ?? "";?></p>
            </form>
        </div>
        <div style="text-align:center; margin-top:30px;">
            <a style="color: #751238ff; font-weight: bold;" href="cadastro.php">
                Não possui uma conta?
            </a>
        </div>
</body>

</html>