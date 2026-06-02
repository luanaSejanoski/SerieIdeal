<?php
session_start();
require_once '../config/database.php';
require_once '../helpers/csrf.php';
require_once '../models/serie.php';

validarTokenCSRF();

$erros = [];
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") { //verifica se o usuário enviou o formulário (clicou em enviar)
    $titulo = $_POST["titulo"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $descricaoMenor = $_POST["descricaoMenor"] ?? "";
    $imagem = $_POST["imagem"] ?? "";
    $categoria_id = $_POST["categoria_id"] ?? "";

    if (trim($titulo) === "") $erros[] = "Título obrigatório";
    if (trim($descricao) === "") $erros[] = "Descrição obrigatória";
    if (trim($descricaoMenor) === "") $erros[] = "Descrição menor obrigatória";
    if (trim($imagem) === "") $erros[] = "Imagem obrigatória";
    if (trim($categoria_id) === "")  $erros[] = "Gênero obrigatório";


    if (empty($erros)) {

        try {
            cadastraSerie($pdo, $titulo, $descricao, $descricaoMenor, $imagem, $categoria_id);

            $_SESSION["sucesso"] = "Série cadastrada com sucesso!";

            header("Location: ../views/admin/dashboard.php");
            exit;
        } catch (PDOException) { //Se der erro no banco:

            $_SESSION["erro"] = "Erro ao salvar no banco";

            header("Location: ../views/admin/dashboard.php");
            exit;
        }
    } else { //Se validação falhar: salva erros na sessão e volta pro dashboard

        $_SESSION["erros"] = $erros;

        header("Location: ../views/admin/dashboard.php");
        exit;
    }
}
