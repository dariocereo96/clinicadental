<?php

include_once dirname(__DIR__) . "/config/ConexionDB.php";
include_once dirname(__DIR__) . "/modelos/Historial.php";

//Registar historia
if ($_GET["action"] == "registrar") {
    $db = new ConexionBD();
    $historial = new Historial($db->conectar());

    // Configura los atributos de la instancia con los datos del formulario
    $historial->setIdPaciente($_POST["idPaciente"]);
    $historial->setFechaAtencion($_POST["fechaAtencion"]);
    $historial->setIdEspecialidad($_POST["idEspecialidad"]);
    $historial->setDiagnostico($_POST["diagnostico"]);
    $historial->setProcedimiento($_POST["procedimiento"]);
    $historial->setNotas("");

    // Crea un array para almacenar las recetas
    $recetas = [];

    if (count($_POST['nombreMedicamento']) > 0 && count($_POST['indicacionesMedicamento']) > 0) {

        // Itera sobre los datos del formulario
        for ($i = 0; $i < count($_POST['nombreMedicamento']); $i++) {

            // Verifica que haya datos en la posición actual del array
            if (!empty($_POST['nombreMedicamento'][$i]) && !empty($_POST['indicacionesMedicamento'][$i])) {
                $nombreMedicamento = $_POST['nombreMedicamento'][$i];
                $indicacionesMedicamento = $_POST['indicacionesMedicamento'][$i];

                array_push($recetas, [$nombreMedicamento, $indicacionesMedicamento]);
            }
        }
    }

    $historial->setRecetas($recetas);

    if ($historial->registrarHistorial()) {
        // Redirige a la página de lista de tratamientos después de registrar con éxito
        header("Location: ../views/admin/listarHistorias.php?id=" . $historial->getIdPaciente());
    } else {
        echo "No se pudo registrar";
    }
}

//Registar historia
if ($_GET["action"] == "editar") {
    $db = new ConexionBD();
    $historial = new Historial($db->conectar());

    // Configura los atributos de la instancia con los datos del formulario
    $historial->setId($_POST["idHistoria"]);
    $historial->setIdPaciente($_POST["idPaciente"]);
    $historial->setFechaAtencion($_POST["fechaAtencion"]);
    $historial->setIdEspecialidad($_POST["idEspecialidad"]);
    $historial->setDiagnostico($_POST["diagnostico"]);
    $historial->setProcedimiento($_POST["procedimiento"]);
    $historial->setNotas("");

    // Crea un array para almacenar las recetas
    $recetas = [];

    if (count($_POST['nombreMedicamento']) > 0 && count($_POST['indicacionesMedicamento']) > 0) {

        // Itera sobre los datos del formulario
        for ($i = 0; $i < count($_POST['nombreMedicamento']); $i++) {

            // Verifica que haya datos en la posición actual del array
            if (!empty($_POST['nombreMedicamento'][$i]) && !empty($_POST['indicacionesMedicamento'][$i])) {
                $nombreMedicamento = $_POST['nombreMedicamento'][$i];
                $indicacionesMedicamento = $_POST['indicacionesMedicamento'][$i];

                array_push($recetas, [$nombreMedicamento, $indicacionesMedicamento]);
            }
        }
    }

    $historial->setRecetas($recetas);

    if ($historial->editarHistorial()) {
        // Redirige a la página de lista de tratamientos después de registrar con éxito
        header("Location: ../views/admin/listarHistorias.php?id=" . $historial->getIdPaciente());
    } else {
        echo "No se pudo registrar";
    }
}

//eliminar historia
if ($_GET["action"] == "eliminar") {
    $db = new ConexionBD();
    $historialDAO = new Historial($db->conectar());

    $idPaciente = $historialDAO->buscarHistoriaPorId($_GET['id'])['idPaciente'];

    if ($historialDAO->eliminarHistoria($_GET["id"])) {
        header("Location: ../views/admin/listarHistorias.php?id=" . $idPaciente);
    } else {
        echo "No se pudo registrar";
    }
}
