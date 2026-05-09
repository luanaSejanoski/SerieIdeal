<?php
/** @var array $catalogo */

$nome = isset($_GET["nome"]) ? trim($_GET["nome"]) : "";
$genero = isset($_GET["genero"]) ? $_GET["genero"] : "";

if($nome !== ""){
    $catalogo = buscarPorNome($catalogo, $nome);
}

if($genero !== ""){
    $catalogo = buscarPorGenero($catalogo, $genero);
}
?>