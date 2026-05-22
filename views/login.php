<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css?v=2">
    <title>Login</title>
</head>

<body>
    <header>
        <a href="../views/home.php">
            <h1>Serie Ideal</h1>
        </a>
        <nav>
            <a href="../views/home.php">Home</a>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_SESSION["erro_login"])) {
            echo "<p style='color:white'>" . $_SESSION["erro_login"] . "</p>";
            unset($_SESSION["erro_login"]); // apaga depois de mostrar
        }
        ?>

        <form action="login.php" method="POST">
        <br><br><label for="user" style="color: white;">Usuário:</label>
        <input type="text" name="user" id="iuser"><br><br>
        <label for="user" style="color: white;">Senha:</label>
        <input type="password" name="senha" id="isenha"><br><br>

        <button type="submit">Entrar</button>
        </form>


    </main>
</body>

</html>