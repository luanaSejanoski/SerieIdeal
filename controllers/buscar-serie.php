<?php
session_start();
require_once '../config/database.php';
require_once '../includes/funcoes.php';

$nome = trim($_GET["nome"] ?? "");
$genero = $_GET["genero"] ?? "";

//faz a busca por nome
if ($nome !== "") { 
        $resultado = buscarPorNome($nome, $pdo);
        if (!empty($resultado)) {
            $_SESSION["resultadoBusca"] = $resultado;
        } else {
            $_SESSION['erroBusca'] = 'Série não encontrada :(';
        }
//faz a busca por genero
} else if($genero !== ""){
        $resultado = buscarPorGenero($genero, $pdo);
        if (!empty($resultado)) {
            $_SESSION["resultadoBusca"] = $resultado;
        } else {
            $_SESSION['erroBusca'] = 'Nenhuma série encontrada para esse gênero :(';
        }
}else{
        $_SESSION["erroBusca"] = "Informe um título!";

}
header("Location: ../views/resultados.php");
exit;
