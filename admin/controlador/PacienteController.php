<?php
session_start();
include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Paciente.php";


//Registar paciente
if ($_GET["action"] == "registrar") {
    $db = new ConexionBD();
    $paciente = new Paciente($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores
    $paciente->setPrimerNombre($_POST["primerNombre"]);
    $paciente->setSegundoNombre($_POST["segundoNombre"]);
    $paciente->setApellidoPaterno($_POST["apellidoPaterno"]);
    $paciente->setApellidoMaterno($_POST["apellidoMaterno"]);
    $paciente->setFechaNacimiento($_POST["fechaNacimiento"]);
    $paciente->setGenero($_POST["genero"]);
    $paciente->setTelefono($_POST["telefono"]);
    $paciente->setEmail($_POST["email"]);
    $paciente->setCedula($_POST["cedula"]);
    $paciente->setTipoDocumento($_POST["tipoDocumento"]);

    if(isset($_POST["idUsuario"]) && $_SESSION["rol"] == "paciente"){
        $paciente->setIdUsuario($_POST["idUsuario"]);
    }

    if ($paciente->registrarPaciente()) {

        $_SESSION["idPaciente"] = $paciente->getId();

        if($_SESSION['rol']=='paciente') {
            $_SESSION["message"] = "Se registraron los datos correctamente";
            header("Location: ../views/paciente/misDatos.php");
            exit();
        }

        header("Location: ../views/admin/listarPacientes.php");
        exit();
        
    } else {
        echo "No se pudo registrar";
        exit();
    }
    exit();
}

//Registar paciente
if ($_GET["action"] == "editar") {
    $db = new ConexionBD();
    $paciente = new Paciente($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores
    $paciente->setId($_POST["id"]);
    $paciente->setPrimerNombre($_POST["primerNombre"]);
    $paciente->setSegundoNombre($_POST["segundoNombre"]);
    $paciente->setApellidoPaterno($_POST["apellidoPaterno"]);
    $paciente->setApellidoMaterno($_POST["apellidoMaterno"]);
    $paciente->setFechaNacimiento($_POST["fechaNacimiento"]);
    $paciente->setGenero($_POST["genero"]);
    $paciente->setTelefono($_POST["telefono"]);
    $paciente->setEmail($_POST["email"]);
    $paciente->setCedula($_POST["cedula"]);
    $paciente->setTipoDocumento($_POST["tipoDocumento"]);

    if ($paciente->editarPaciente()) {

        if($_SESSION['rol']=='paciente') {
            $_SESSION["message"] = "Se editaron los datos correctamente";
            header("Location: ../views/paciente/misDatos.php");
            exit();
        }

        header("Location: ../views/admin/listarPacientes.php");

        exit();
    } else {
        echo "No se pudo registrar";
        exit();
    }
}

//eliminar paciente
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $paciente = new Paciente($db->conectar());

    if ($paciente->eliminarPaciente($_GET["id"])) {
        header("Location: ../views/admin/listarPacientes.php");
    } else {
        echo "No se pudo registrar";
    }
}
