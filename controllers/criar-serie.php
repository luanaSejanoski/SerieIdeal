<?php 
session_start();
require_once '../config/database.php';

// if(!isset($_SESSION["Logado"]) || $_SESSION["Logado"] != true){
//     header("Location: ../login.php");//redireciona a pagina login
//     exit;
// }

 $erros = [];
 $sucesso = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){ //verifica se o usuário enviou o formulário (clicou em enviar)
 $titulo = $_POST["titulo"] ?? "";
 $descricao = $_POST["descricao"] ?? "";
 $descricaoMenor = $_POST["descricaoMenor"] ?? "";
 $imagem = $_POST["imagem"] ?? "";
 $categoria_id = $_POST["categoria_id"] ?? "";

if(trim($titulo) === "")$erros[] = "Título é obrigatório";
if(trim($descricao) === "") $erros[] = "Descrição é obrigatória";
if(trim($descricaoMenor) === "") $erros[] = "Descrição menor é obrigatória";
if(trim($imagem) === "") $erros[] = "Imagem é obrigatória";
if(trim($categoria_id) === "")  $erros[] = "Gênero é obrigatório";


if(empty($erros)){

        try {
            $sql = "INSERT INTO series
            (titulo, descricao, descricaoMenor, imagem, categoria_id)
            VALUES
            (:titulo, :descricao, :descricaoMenor, :imagem, :categoria_id)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':titulo' => $titulo,
                ':descricao' => $descricao,
                ':descricaoMenor' => $descricaoMenor,
                ':imagem' => $imagem,
                ':categoria_id' => $categoria_id,
            ]);

            $_SESSION["sucesso"] = "Série cadastrada com sucesso!";

            header("Location: ../views/admin/dashboard.php");
            exit;

        } catch(PDOException){//Se der erro no banco:

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
?>