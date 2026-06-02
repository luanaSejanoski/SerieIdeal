<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';
require_once '../models/usuario.php';

validarTokenCSRF();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['username'] ?? "");
    $senha = trim($_POST['senha'] ?? "");

    if (empty($usuario) || empty($senha)) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
    } else {
        $usuarioExiste = usuarioExistente($pdo, $usuario);

        if ($usuarioExiste) {
            $_SESSION['mensagem'] = "Esse nome de usuário já existe!";
        } else {

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            cadastroUsuario($pdo, $usuario, $senhaCriptografada);

            $_SESSION['mensagem'] = "Conta cadastrada!";
            header("Location: ../views/login.php");
            exit;
        }
    }

    header("Location: ../views/cadastro.php");
    exit;
}
