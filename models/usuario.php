<?php 
function login(PDO $pdo, $usuario){
     $sql = 'SELECT id, username, senha, admin FROM usuarios
        WHERE username = :usuario';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                ':usuario' => $usuario,
            ]
        );

        return $stmt->fetch();
}

function usuarioExistente(PDO $pdo, $usuario){
    $sqlVerifica = 'SELECT id FROM usuarios WHERE username = :usuario';

        $stmtVerifica = $pdo->prepare($sqlVerifica);
        $stmtVerifica->execute(
            [
                ':usuario' => $usuario
            ]
        );

        return $stmtVerifica->fetch();
}

function cadastroUsuario(PDO $pdo, $usuario, $senhaCriptografada){
    $sql = "INSERT INTO usuarios (username, senha) 
                  VALUES
                  (:usuario, :senha);";


            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    ':usuario' =>  $usuario,
                    ':senha' => $senhaCriptografada
                ]
            );
}
?>