<?php
function gerarTokenCSRF(): string
{
    if (!isset($_SESSION['tokenCsrf'])) {
        $_SESSION['tokenCsrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['tokenCsrf'];
}

function validarTokenCSRF():void
{
    if (
        !isset($_POST['tokenCsrf']) || //verifica se o token foi enviado pelo formulario
        !isset($_SESSION['tokenCsrf']) || //verifica se o token existe na sessão
        !hash_equals( $_SESSION['tokenCsrf'],$_POST['tokenCsrf']) //compara os tokens
    ) {
        die("Token CSRF inválido!");
    }
}
?>