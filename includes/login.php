<?php
session_start();

if (isset($_SESSION["Logado"]) && $_SESSION["Logado"] === true) {
    echo "<p>Você já está logado!</p>";
    header("Location: ../views/cadastro.php");
    exit;
}

$userDigitado = isset($_POST["user"]) ? $_POST["user"] : "";
$senhaDigitada = isset($_POST["senha"]) ? $_POST["senha"] : "";

$user = "adminIdeal";
$senha = "senhaIdeal";

$hash = password_hash($senha, PASSWORD_DEFAULT);

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($userDigitado === $user && password_verify($senhaDigitada, $hash)) {

        $_SESSION["Logado"] = true;
        $_SESSION["usuario"] = $userDigitado;

        header("Location: ../views/cadastro.php");
        exit;
    } else {
        $_SESSION["erro_login"] = "Usuário ou senha incorretos!";
        header("Location: ../views/login.php");
        exit;
    }
}
?>