<?php
include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Especialidad.php";

if ($_GET["action"] == "registrar") {
    $db = new ConexionBD();
    $especialidad = new Especialidad($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores del tratamiento
    $especialidad->setNombre($_POST["nombre"]);
    $especialidad->setDescripcion($_POST["descripcion"]);

    if ($especialidad->registrarEspecialidad()) {
        // Redirige a la página de lista de tratamientos después de registrar con éxito
        header("Location: ../views/admin/listarEspecialidades.php");
        exit();
    } else {
        echo "No se pudo registrar la especialidad"; // Puedes personalizar este mensaje de error
        exit();
    }
}

//Editar especialidad
if ($_GET["action"] == "editar") {
    // Validación y saneamiento de datos (ejemplo, ajusta según tus necesidades)
    $idEspecialidad = htmlspecialchars($_POST["id"]);
    $nombreEspecialidad = htmlspecialchars($_POST["nombre"]);
    $descripcionEspecialidad = htmlspecialchars($_POST["descripcion"]);

    // Crear instancia de la conexión y la clase Especialidad
    $db = new ConexionBD();
    $especialidad = new Especialidad($db->conectar());

    // Utilizar los métodos "setters" para establecer los valores
    $especialidad->setId($idEspecialidad);
    $especialidad->setNombre($nombreEspecialidad);
    $especialidad->setDescripcion($descripcionEspecialidad);

    // Editar la especialidad
    if ($especialidad->editarEspecialidad()) {
        header("Location: ../views/admin/listarEspecialidades.php");
        exit(); // Asegura que no haya contenido adicional enviado al navegador antes de la redirección
    } else {
        echo "No se pudo editar la especialidad.";
    }
}

//eliminar especialidad
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $especialidad = new Especialidad($db->conectar());

    if ($especialidad->eliminarEspecialidad($_GET["id"])) {
        header("Location: ../views/admin/listarEspecialidades.php");
        exit();
    } else {
        echo "No se pudo eliminar la especialidad";
        exit();
    }
}
