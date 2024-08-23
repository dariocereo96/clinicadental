<?php
session_start();

include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Cita.php";

//Registar cita;
if ($_GET['action'] == "registrar") {

    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    //Configura los atributos de la instancia con los datos del formulario
    $cita->setIdPaciente($_POST['idPaciente']);
    $cita->setIdDoctor($_POST['idDoctor']);
    $cita->setFechaCita($_POST['fechaCita']);
    $cita->setIdEspecialidad($_POST['idEspecialidad']);

    // Dividir el valor en horaInicio y horaFin
    $horaCita = $_POST['horaCita'];
    list($horaInicio, $horaFin) = explode('-', $horaCita);

    $cita->setHoraInicio($horaInicio);
    $cita->setHoraFin($horaFin);
    $cita->setMotivoCita($_POST['motivoCita']);

    if ($cita->registrarCita()) {
        $response = array(
            'success' => true,
            'message' => 'Registro exitoso'
        );

        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'No se pudo registrar'
        );
        echo json_encode($response);
    }

    exit();
}

//Registar cita;
if ($_GET['action'] == "editar") {

    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    //Configura los atributos de la instancia con los datos del formulario
    $cita->setIdPaciente($_POST['idPaciente']);
    $cita->setIdDoctor($_POST['idDoctor']);
    $cita->setFechaCita($_POST['fechaCita']);
    $cita->setIdCita($_POST['idCita']);
    $cita->setIdEspecialidad($_POST['idEspecialidad']);

    // Dividir el valor en horaInicio y horaFin
    $horaCita = $_POST['horaCita'];
    list($horaInicio, $horaFin) = explode('-', $horaCita);

    $cita->setHoraInicio($horaInicio);
    $cita->setHoraFin($horaFin);
    $cita->setMotivoCita($_POST['motivoCita']);

    echo var_dump($cita);

    if ($cita->editarCita()) {
        $response = array(
            'success' => true,
            'message' => 'Edicion exitosa'
        );

        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'No se pudo editar el registro'
        );
        echo json_encode($response);
    }

    exit();
}

//eliminar cita
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    if ($cita->eliminarCita($_POST["idCita"])) {
        $response = array(
            'success' => true,
            'message' => 'Se elimino la cita'
        );

        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'No se pudo eliminar la cita'
        );

        echo json_encode($response);
    }

    exit();
}

//buscar cita por id
if ($_GET["action"] == "buscar") {

    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    $array = $cita->buscarCitaId($_GET['id']);

    echo json_encode($array);

    exit();
}

//Marcar cita como realizada
if ($_GET["action"] == "marcar") {

    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    if ($cita->marcarCitaRealizada($_POST['idCita'])) {
        $response = array(
            'success' => true,
            'message' => 'Se marco la cita correctamente'
        );

        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'No se pudo marcar la cita correctamente'
        );

        echo json_encode($response);
    }


    exit();
}

//Marcar cita como realizada
if ($_GET["action"] == "rechazar") {

    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    if ($cita->rechazarCitaRealizada($_POST['idCita'])) {
        $response = array(
            'success' => true,
            'message' => 'Se rechazo la cita correctamente'
        );

        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'No se pudo rechazar la cita correctamente'
        );

        echo json_encode($response);
    }


    exit();
}


if ($_GET["action"] == "registrarcita") {
    $db = new ConexionBD();
    $cita = new Cita($db->conectar());

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $idEspecialidad = $_POST['idEspecialidad'];
    $fechaCita = $_POST['fechaCita'];
    $horaCita = $_POST['horaCita'];
    $idDoctor = $_POST['idDoctor'];
    $motivoCita = "ATENCION ODONTOLOGICA";

    if ($cita->registrarPacienteCita(
        $cedula,
        $nombre,
        $apellido,
        $genero,
        $fechaNacimiento,
        $telefono,
        $correo,
        $idEspecialidad,
        $fechaCita,
        $horaCita,
        $idDoctor,
        $motivoCita
    )) {
        $_SESSION['message'] = "SE REGISTRO SU CITA CORRECTAMENTE, TE ESPERAMOS";
        header("location:../../public/citas.php");
    } else {
        $_SESSION['message'] = "NO SE PUDO REGISTRAR TU CITA";
    }

    exit();
}
