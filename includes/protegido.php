<?php 
    session_start();

if(!isset($_SESSION["Logado"]) || $_SESSION["Logado"] != true){
    header("Location: login.php");//redireciona a pagina login
    exit;
}

 $erros = [];
 $sucesso = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){ //verifica se o usuário enviou o formulário (clicou em enviar)
 $titulo = $_POST["titulo"] ?? "";
 $genero = $_POST["genero"] ?? "";
 $descricao = $_POST["descricao"] ?? "";
 $imagem = $_POST["imagem"] ?? "";

 if(trim($titulo) === "")$erros[] = "Título é obrigatório";
  if(trim($genero) === "")  $erros[] = "Gênero é obrigatório";
  if(trim($descricao) === "") $erros[] = "Descrição é obrigatória";
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
    "imagem" => $imagem
    
];
//mostra mensagem de cadastro de série
$_SESSION["sucesso"] = "Série cadastrada!";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;

 }
}
?>


