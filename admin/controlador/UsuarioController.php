<?php
session_start();
include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Usuario.php";

//Iniciar sesion
if ($_GET["action"] == "login") {

     // Elimina todas las variables de sesión
     $_SESSION = array();

    if (isset($_POST["username"]) && $_POST["username"] != "" && isset($_POST["password"]) && $_POST["password"]) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $db = new ConexionBD();

        $usuarioDAO = new Usuario($db->conectar());

        $usuario = $usuarioDAO->verificarUsuario($username, $password);

        if (!empty($usuario)) {
            $_SESSION["username"] = $usuario['username'];
            $_SESSION["rol"] = $usuario['rol'];
            $_SESSION["idUsuario"] = $usuario['id'];
            $_SESSION["idPaciente"] = $usuario['idPaciente']??-1;
            $_SESSION["idDoctor"] = $usuario['idDoctor']??-1;
            $_SESSION['nombreDoctor'] = $usuario['nombreDoctor']??"";
            $_SESSION['nombrePaciente'] = $usuario['nombrePaciente']??"";

            if($usuario['rol'] =='paciente'){
                if($usuario['idPaciente']>0){
                    header("Location: ../views/paciente");
                }else{
                    header("Location: ../views/paciente/misDatos.php");
                }
                
                exit();
            }

            header("Location: ../views/admin");
            exit();

        } else {
            // Inicio de sesión fallido
            $_SESSION['error'] = 'Credenciales incorrectas';
            header("Location: ../views/login");
            echo "No se pudo iniciar sesion";
            exit();
        }
    } else {
        // Inicio de sesión fallido
        $_SESSION['error'] = 'Credenciales incorrectas';
        header("Location: ../views/login");
        exit();
    }
}

if ($_GET["action"] == "logout") {

    // Elimina todas las variables de sesión
    $_SESSION = array();

    // Invalida la sesión existente
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finalmente, destruye la sesión
    session_destroy();

    // Redirige al usuario a la página de inicio de sesión o a cualquier otra página deseada
    header("Location: ../../public");
    exit();
}

if ($_GET["action"] == "registrar") {
    $db = new ConexionBD();
    $usuarioDAO = new Usuario($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores del tratamiento
    $usuarioDAO->setUsername($_POST["username"]);
    $usuarioDAO->setPassword($_POST["password"]);
    $usuarioDAO->setRol($_POST["rol"]);

    if ($usuarioDAO->registrarUsuario()) {
        // Redirige a la página de lista de tratamientos después de registrar con éxito
        if($usuarioDAO->getRol()=="paciente")
        {
            echo '<script>alert("Usuario registrado, inicie sesion");window.location.href="../views/login"</script>';  
        }
        else
        {
            header("Location: ../views/admin/listarUsuarios.php");
            exit();
        }
       
    } else {
        echo "No se pudo registrar el usuario"; // Puedes personalizar este mensaje de error
        exit();
    }
}

if ($_GET["action"] == "editar") {
    $db = new ConexionBD();
    $usuarioDAO = new Usuario($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores del tratamiento
    $usuarioDAO->setId($_POST["id"]);
    $usuarioDAO->setUsername($_POST["username"]);
    $usuarioDAO->setPassword($_POST["password"]);
    $usuarioDAO->setRol($_POST["rol"]);

    if ($usuarioDAO->editarUsuario()) {
        // Redirige a la página de lista de tratamientos después de registrar con éxito
        header("Location: ../views/admin/listarUsuarios.php");
        exit();
    } else {
        echo "No se pudo registrar el usuario"; // Puedes personalizar este mensaje de error
        exit();
    }
}

//eliminar especialidad
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $usuarioDAO = new Usuario($db->conectar());

    if ($usuarioDAO->eliminarUsuario($_GET["id"])) {
        header("Location: ../views/admin/listarUsuarios.php");
        exit();
    } else {
        echo "No se pudo eliminar el usuario";
        exit();
    }
}
