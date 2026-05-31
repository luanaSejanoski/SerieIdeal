    <?php
    session_start();
    require_once '../config/database.php';
    require_once '../helpers/csrf.php';

    validarTokenCSRF();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['user'] ?? "";

        $senha = $_POST['senha'] ?? "";

        $sql = 'SELECT id, username, senha, admin FROM usuarios
        WHERE username = :usuario';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                ':usuario' => $usuario,
            ]
        );

        $usuarioExiste = $stmt->fetch();

        if ($usuarioExiste && password_verify($senha, $usuarioExiste['senha'])) {

            $_SESSION["id"] = $usuarioExiste['id'];
            $_SESSION["usuario"] = $usuarioExiste["username"];
            $_SESSION["Logado"] = true;
            $_SESSION["admin"] = $usuarioExiste["admin"];

            setcookie(
                "ultimoUsuario", //nome do cookie
                $usuarioExiste["username"], // valor que seŕa armazenado no cookie
                time() + (60 * 60 * 24 * 30), //tempo de expiração (30 dias)
                "/" //caminho onde o cookie vai ser utilizado (nesse caso, na pasta inteira (raiz))
            );


            header("Location: ../views/admin/dashboard.php");
            exit;
        } else {
            $_SESSION["erro_login"] = "Usuário ou senha inválidos";
            header("Location: ../views/login.php");
            exit;
        }
    }


    ?>