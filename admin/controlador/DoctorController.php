<?php

include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Doctor.php";
include_once dirname(__DIR__) . "/modelos/Usuario.php";


//Registar paciente
if ($_GET["action"] == "registrar") {
    $db = new ConexionBD();
    $doctor = new Doctor($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores
    $doctor->setPrimerNombre($_POST["primerNombre"]);
    $doctor->setSegundoNombre($_POST["segundoNombre"]);
    $doctor->setApellidoPaterno($_POST["apellidoPaterno"]);
    $doctor->setApellidoMaterno($_POST["apellidoMaterno"]);
    $doctor->setFechaNacimiento($_POST["fechaNacimiento"]);
    $doctor->setGenero($_POST["genero"]);
    $doctor->setTelefono($_POST["telefono"]);
    $doctor->setEmail($_POST["email"]);
    $doctor->setCedula($_POST["cedula"]);
    $doctor->setIdEspecialidad($_POST["idEspecialidad"]);
    $doctor->setTipoDocumento($_POST["tipoDocumento"]);

    if ($doctor->registrarDoctor()) {

        $usuarioDAO = new Usuario($db->conectar());

        // Utilizar los métodos "setters" para establecer los valores del usuario
        $usuarioDAO->setUsername($_POST["username"]);
        $usuarioDAO->setPassword($_POST["password"]);
        $usuarioDAO->setRol("doctor");

        if ($usuarioDAO->registrarUsuario()) {
            $doctor->agregarUsuario($usuarioDAO->getId());
        } else {
            echo "No entro a a agregar usuario";
        }

        header("Location: ../views/admin/listarDoctores.php");
    } else {
        echo "No se pudo registrar";
    }
}

//Editar paciente
if ($_GET["action"] == "editar") {
    $db = new ConexionBD();
    $doctor = new Doctor($db->conectar());
    $usuario = new Doctor($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores
    $doctor->setId($_POST["id"]);
    $doctor->setPrimerNombre($_POST["primerNombre"]);
    $doctor->setSegundoNombre($_POST["segundoNombre"]);
    $doctor->setApellidoPaterno($_POST["apellidoPaterno"]);
    $doctor->setApellidoMaterno($_POST["apellidoMaterno"]);
    $doctor->setFechaNacimiento($_POST["fechaNacimiento"]);
    $doctor->setGenero($_POST["genero"]);
    $doctor->setTelefono($_POST["telefono"]);
    $doctor->setEmail($_POST["email"]);
    $doctor->setCedula($_POST["cedula"]);
    $doctor->setIdEspecialidad($_POST["idEspecialidad"]);
    $doctor->setTipoDocumento($_POST["tipoDocumento"]);

    if ($doctor->editarDoctor()) {

        header("Location: ../views/admin/listarDoctores.php");
    } else {
        echo "No se pudo registrar";
    }
}

//eliminar paciente
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $doctor = new Doctor($db->conectar());

    if ($doctor->eliminarDoctor($_GET["id"])) {
        header("Location: ../views/admin/listarDoctores.php");
    } else {
        echo "No se pudo registrar";
    }
}
