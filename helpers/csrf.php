<?php
session_start();
function gerarTokenCSRF(): string
{
    if (!isset($_SESSION['tokenCSFR'])) { //verifica se existe um token na sessão
        $_SESSION['tokenCSRF'] = bin2hex(random_bytes(32)); //cria um token
    }
    return $_SESSION['tokenCSRF'];
}


function validarTokenCSRF(): void 
{//verifica
  if(!isset($_SESSION['tokenCSRF']) || // se o token está salvo na sessão
  !isset($_POST['tokenCSRF']) || // se o formulario enviou o token
  !hash_equals($_SESSION['tokenCSRF'], $_POST['tokenCSRF'])){ //se o token da sessão é o mesmo do formulário
      die('Token CSRF inválido'); //mata a execução
  }
}
