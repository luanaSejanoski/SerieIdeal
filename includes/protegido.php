<?php 
session_start();
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
 

 //se não tiver erro
 if(empty($erros)){
   if(!isset($_SESSION["series"])){//cria array
    $_SESSION["series"] = [];
}

//salva series
$_SESSION["series"][] = [
    "titulo" => $titulo,
    "genero" => $genero,
    "descricao" => $descricao,
    "descricaoMenor" => $descricaoMenor,
    "imagem" => $imagem
    
];
//mostra mensagem de cadastro de série
$_SESSION["sucesso"] = "Série cadastrada!";
header("Location: ../views/cadastro.php");
exit;

 }
 $_SESSION["erros"] = $erros;
 $_SESSION["dadosFormulario"] = $_POST;

header("Location: ../views/cadastro.php");
exit;
}
?>


