<?php 
$host = "localhost";
$banco = "bancoIdeal";
$usuario = "root";
$senha = "";

try{
 $pdo = new PDO(
    "mysql:host=$host;port=3306;dbname=$banco;charset=utf8", 
 $usuario,
 $senha
);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){ //se der erro relacionado ao banco de dados
    // echo "Erro ao conectar o banco de dados!";
    echo $e->getMessage();
}
 ?>