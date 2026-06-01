<?php
session_start();

require_once '../config/database.php';
require_once '../helpers/csrf.php';

validarTokenCSRF();

$serie = $_POST["serieRemover"];
if ($serie === null) $erros[] = "Selecione uma série";

if (empty($erros)) {
try{
$sql = "DELETE FROM series WHERE id = :serie";
$stmt = $pdo->prepare($sql);
$stmt->execute([':serie' => $serie]);

 $_SESSION["sucesso"] = "Série deletada com sucesso!";

     header("Location: ../views/admin/dashboard.php");
     exit;
 }catch (PDOException) { //Se der erro no banco:

            $_SESSION["erro"] = "Erro ao deletar do banco";

            header("Location: ../views/admin/dashboard.php");
            exit;
 }
}else{
      $_SESSION["erros"] = $erros;
    header("Location: ../views/admin/dashboard.php");
    exit;
    }
