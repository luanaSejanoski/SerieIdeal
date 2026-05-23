<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css?v=2">
    <title>Login</title>
</head>

<body>
  <?php require_once '../views/navbar.php'; ?>
    <main>
        <?php
        if (isset($_SESSION["erro_login"])) {
            echo "<p style='color:white'>" . $_SESSION["erro_login"] . "</p>";
            unset($_SESSION["erro_login"]); // apaga depois de mostrar
        }
        ?>

        <div class="formulario">
        <form action="../views/login.php" method="POST">
        <br><br><label for="user" style="color: white;">Usuário:</label>
        <input type="text" name="user" id="iuser"><br><br>
        <label for="user" style="color: white;">Senha:</label>
        <input type="password" name="senha" id="isenha"><br><br>

        <button type="submit">Entrar</button>
        </form>
        </div>


    </main>
</body>

</html>