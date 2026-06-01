<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';

validarTokenCSRF();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['username'] ?? "");
    $senha = trim($_POST['senha'] ?? "");

    if (empty($usuario) || empty($senha)) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
    } else {
        $sqlVerifica = 'SELECT id FROM usuarios WHERE username = :usuario';

        $stmtVerifica = $pdo->prepare($sqlVerifica);
        $stmtVerifica->execute(
            [
                ':usuario' => $usuario
            ]
        );

        $usuarioExiste = $stmtVerifica->fetch();

        if ($usuarioExiste) {
            $_SESSION['mensagem'] = "Esse nome de usuário já existe!";
        } else {

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (username, senha) 
                  VALUES
                  (:usuario, :senha);";


            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    ':usuario' =>  $usuario,
                    ':senha' => $senhaCriptografada
                ]
            );

            $_SESSION['mensagem'] = "Conta cadastrada!";
        }
    }

    header("Location: ../views/cadastro.php");
    exit;
}
