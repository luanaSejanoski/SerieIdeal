<?php 
$host = "localhost";
$banco = "bancoideal";
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
    echo "Erro ao conectar o banco de dados!";
}

$sql = "SELECT * FROM series";
$stmt = $pdo -> query($sql);

$series = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($series);

foreach($series as $serie){
 echo $serie["titulo"] . "<br>";
}
?>