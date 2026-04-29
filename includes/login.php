<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php">
        <label for="user">Usuário: </label>
        <input type="text" name="user" id="iuser"><br>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="isenha"><br>

        <button type="submit">Entrar</button>
    </form>

    <?php 
        $userDigitado = isset($_GET["user"]) ? $_GET["user"] : "";
        $senhaDigitada = isset($_GET["senha"]) ? $_GET["senha"] : "";

        $user = "adminIdeal";
        $senha = "senhaIdeal";

        $hash = password_hash($senha, PASSWORD_DEFAULT);
    ?>
</body>

</html>