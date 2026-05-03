 <?php 
       session_start();

        if (isset($_SESSION["Logado"]) && $_SESSION["Logado"] === true) {
         header("Location: protegido.php");
        exit;
}

        $userDigitado = isset($_POST["user"]) ? $_POST["user"] : "";
        $senhaDigitada = isset($_POST["senha"]) ? $_POST["senha"] : "";

        $user = "adminIdeal";
        $senha = "senhaIdeal";

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $erro = "";

        if($_SERVER["REQUEST_METHOD"] === "POST"){

        if($userDigitado === $user && password_verify($senhaDigitada, $hash)){

        $_SESSION["Logado"] = true;
        $_SESSION["usuario"] = $userDigitado;

        header("Location: cadastrar.php");
        exit;
        }
         else {
            $_SESSION["erro_login"] = "Usuário ou senha incorretos!";
        header("Location: login.php");
        exit;

        }
        
        }
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
   <?php
if (isset($_SESSION["erro_login"])) {
    echo "<p style='color:red'>" . $_SESSION["erro_login"] . "</p>";
    unset($_SESSION["erro_login"]); // apaga depois de mostrar
}
?>

    <form action="login.php" method="POST">
        <label for="user">Usuário: </label>
        <input type="text" name="user" id="iuser"><br>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="isenha"><br><br>

        <button type="submit">Entrar</button>
    </form>

    
   
</body>

</html>