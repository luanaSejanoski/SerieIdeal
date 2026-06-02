<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';
require_once '../models/serie.php';

validarTokenCSRF();

$erros = [];
$sucesso = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") { //verifica se o usuário enviou o formulário (clicou em enviar)
    $id = $_POST["id"] ?? null;
    $titulo = $_POST["titulo"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $descricaoMenor = $_POST["descricaoMenor"] ?? "";
    $imagem = $_POST["imagem"] ?? "";
    $categoria_id = $_POST["categoria_id"] ?? "";

if (empty($id)) {
    $erros[] = "Selecione uma série";
}

    if (empty($erros)) {

        try {
            editarSerie($pdo, $titulo, $descricao, $descricaoMenor, $imagem, $categoria_id, $id );

            $_SESSION["sucesso"] = "Série editada com sucesso!";

            header("Location: ../views/admin/dashboard.php");
            exit;
        } catch (PDOException) { //Se der erro no banco:

            $_SESSION["erros"] = "Erro ao salvar no banco";

            header("Location: ../views/admin/dashboard.php");
            exit;
        }
    } else { //Se validação falhar: salva erros na sessão e volta pro dashboard

        $_SESSION["erros"] = $erros;

        header("Location: ../views/admin/dashboard.php");
        exit;
    }
}
