<?php

function selecionaCategorias(PDO $pdo)
{

    $sql = "SELECT * FROM categorias";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>