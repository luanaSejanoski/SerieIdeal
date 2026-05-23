<?php 
session_start();
require_once '../config/database.php';

if(!isset($_SESSION["Logado"]) || $_SESSION["Logado"] != true){
    header("Location: ../views/login.php");//redireciona a pagina login
    exit;
}

 $erros = [];
 $sucesso = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){ //verifica se o usuário enviou o formulário (clicou em enviar)
 $titulo = $_POST["titulo"] ?? "";
 $genero = $_POST["genero"] ?? "";
 $descricao = $_POST["descricao"] ?? "";
 $descricaoMenor = $_POST["descricaoMenor"] ?? "";
 $imagem = $_POST["imagem"] ?? "";

if(trim($titulo) === "")$erros[] = "Título é obrigatório";
if(trim($genero) === "")  $erros[] = "Gênero é obrigatório";
if(trim($descricao) === "") $erros[] = "Descrição é obrigatória";
if(trim($descricaoMenor) === "") $erros[] = "Descrição menor é obrigatória";
if(trim($imagem) === "") $erros[] = "Imagem é obrigatória";
 
//testar dps se funciona bem ou se tem outra forma de fazer tmj//
if(empty($erros)){
        //mapeamento dos gêneros para os IDs cadastrados no banco.sql
        $categoriasIds = [
            "Drama" => 1,
            "Comédia" => 2,
            "Ação" => 3,
            "Terror" => 4,
            "Ficção Científica" => 5,
            "Romance" => 6,
            "Anime" => 7,
            "Suspense" => 8
        ];

        $categoria_id = $categoriasIds[$genero] ?? null;

        try {
            $sql = "INSERT INTO series (titulo, descricao, descricaoMenor, imagem, categoria_id) 
                    VALUES (:titulo, :descricao, :descricaoMenor, :imagem, :categoria_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $titulo,
                ':descricao' => $descricao,
                ':descricaoMenor' => $descricaoMenor,
                ':imagem' => $imagem,
                ':categoria_id' => $categoria_id
            ]);

            $_SESSION["sucesso"] = "Série cadastrada com sucesso!";
            header("Location: ../views/cadastro.php");
            exit;
        } catch(PDOException $e) {
            $erros[] = "Erro ao salvar no banco de dados: " . $e->getMessage();
        }
    }
 //se não tiver erro
//  if(empty($erros)){
//    if(!isset($_SESSION["series"])){//cria array
//     $_SESSION["series"] = [];
// }

// //salva series
// $_SESSION["series"][] = [
//     "titulo" => $titulo,
//     "genero" => $genero,
//     "descricao" => $descricao,
//     "descricaoMenor" => $descricaoMenor,
//     "imagem" => $imagem
    
// ];
// //mostra mensagem de cadastro de série
// $_SESSION["sucesso"] = "Série cadastrada!";
// header("Location: ../views/cadastro.php");
// exit;


 $_SESSION["erros"] = $erros;
 $_SESSION["dadosFormulario"] = $_POST;

header("Location: ../views/cadastro.php");
exit;
}
?>


