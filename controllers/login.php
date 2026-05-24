    <?php
    require_once '../config/database.php';

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['user'] ?? "";
        $senha = $_POST['senha'] ?? "";

        $sql = 'SELECT username, senha FROM usuarios
        WHERE username = :usuario';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                ':usuario' => $usuario,
            ]
        );

        $usuarioExiste = $stmt->fetch();


        if ($usuarioExiste && password_verify($senha, $usuarioExiste['senha'])) {

            $_SESSION["usuario"] = $usuario;
            $_SESSION["Logado"] = true;

            header("Location: ../views/home.php");
            exit;
        } else {
            $_SESSION["erro_login"] = "Usuário ou senha inválidos";
            header("Location: ../views/login.php");
            exit;
        }
    }


    ?>