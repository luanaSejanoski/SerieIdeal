    <?php
    session_start();

    require_once '../config/database.php';
    require_once '../helpers/csrf.php';
    require_once '../models/usuario.php';

    validarTokenCSRF();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['user'] ?? "";
        $senha = $_POST['senha'] ?? "";

        $usuarioExiste = login($pdo, $usuario);

        if ($usuarioExiste && password_verify($senha, $usuarioExiste['senha'])) {

            $_SESSION["id"] = $usuarioExiste['id'];
            $_SESSION["usuario"] = $usuarioExiste["username"];
            $_SESSION["Logado"] = true;
            $_SESSION["admin"] = $usuarioExiste["admin"];

            setcookie(
                'ultimoUser', //nome do cookie
                $usuarioExiste["username"], // valor do cookie
                time() + (60 * 60 * 24 * 30), //tempo de expiração do cookie (30 dias)
                "/" //caminho onde o cookie sera utilizado (nesse caso na pasta inteira/raiz)
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