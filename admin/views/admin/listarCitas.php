<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:../login");
} else {
    if ($_SESSION['rol'] == 'paciente') {
        header("Location:../paciente");
    }
}

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8', 'esp');


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>CLINICA | CITAS</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../imagenes/favicon-32x32.png">

    <style>
        body {
            margin-top: 68px;
            background-color: #F4F6F9;
        }
    </style>

</head>

<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">

        <!-- Navigation -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-primary fixed-top">
            <div class="container">
                <a href="../../../public/" class="navbar-brand">
                    <img src="../imagenes/logo2.png" alt="AdminLTE Logo" class="img-circle bg-white" width="40px">
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="../../../public/" class="nav-link text-light"><span><i class="fas fa-home mr-1"></i> Home</span></a>
                        </li>

                        <?php if ($_SESSION['rol'] != 'doctor') { ?>
                            <li class="nav-item">
                                <a href="listarPacientes.php" class="nav-link text-light"><span><i class="fas fa-user-injured mr-1"></i> Pacientes</span></a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a href="listarCitas.php" class="nav-link text-light"><span><i class="far fa-calendar mr-1"></i> Citas</span></a>
                        </li>

                        <?php if ($_SESSION['rol'] == 'administrador' || $_SESSION['rol'] == 'doctor') { ?>
                            <li class="nav-item">
                                <a href="listarHistorias.php" class="nav-link text-light"><span><i class="fas fa-book-medical mr-1"></i> Historias</span></a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php if ($_SESSION['rol'] == 'administrador') { ?>
                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-light">
                                    <span><i class="fas fa-wrench mr-1"></i> Mantenimiento</span>
                                </a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                                    <li><a href="listarDoctores.php" class="dropdown-item"><i class="fas fa-user-md mr-2"></i><span>Doctores</span></a></li>
                                    <li><a href="listarEspecialidades.php" class="dropdown-item"><i class="fas fa-stethoscope mr-2"></i><span>Especialidades</span></a></li>
                                    <li><a href="listarUsuarios.php" class="dropdown-item"><i class="fas fa-users mr-2"></i><span>Usuarios</span></a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>

                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-power-off text-light"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header"><strong><?php echo $_SESSION['username'] ?></strong></span>
                            <div class="dropdown-divider"></div>
                            <a href="../../controlador/UsuarioController.php?action=logout" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Cerrar sesion</span>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- End of Navigation -->
        <?php
        include_once "../../config/ConexionDB.php";
        include_once "../../modelos/Paciente.php";
        include_once "../../modelos/Cita.php";
        include_once "../../modelos/Doctor.php";
        include_once "../../modelos/Especialidad.php";

        $db = new ConexionBD();

        $pacienteDAO = null;
        $citaDAO = null;

        $pacienteCita = null;
        $citas = [];

        $doctoresDAO = new Doctor($db->conectar());
        $doctores = $doctoresDAO->consultarDoctores();

        $especialidadDAO = new Especialidad($db->conectar());
        $especialidades = $especialidadDAO->consultarEspecialidades();


        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cedula'])) {

            $pacienteDAO = new Paciente($db->conectar());
            $citaDAO = new Cita($db->conectar());

            $pacienteCita = $pacienteDAO->buscarPacienteCedula($_POST['cedula']);

            if (!empty($pacienteCita)) {
                $citas = $citaDAO->buscarCitaPorIdPaciente($pacienteCita['id']);
            }
        }


        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {

            $pacienteDAO = new Paciente($db->conectar());
            $citaDAO = new Cita($db->conectar());
            $pacienteCita = $pacienteDAO->buscarPacienteId($_GET['id']);

            if (!empty($pacienteCita)) {
                $citas = $citaDAO->buscarCitaPorIdPaciente($pacienteCita['id']);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action'])) {
            $citaDAO = new Cita($db->conectar());
            $citas = $citaDAO->buscarCitaPorAprobar();
        }


        if ($_SESSION['idDoctor'] > 0) {
            $citaDAO = new Cita($db->conectar());
            $citas = $citaDAO->buscarCitaDelDoctor($_SESSION['idDoctor']);
        }

        if ($_SESSION['idPaciente'] > 0) {
            $citaDAO = new Cita($db->conectar());
            $citas = $citaDAO->buscarCitaPorIdPaciente($_SESSION['idPaciente']);
        }

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <h1 class="m-0 text-primary"><?= ($_SESSION['rol'] == 'doctor') ? 'CITAS AGENDADA PARA EL DR.  ' . strtoupper($_SESSION['nombreDoctor']) : 'CITAS' ?></h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="listarCitas.php">CITAS</a></li>
                                <li class="breadcrumb-item"><a href="#"></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="../../views/admin/listarCitas.php">
                            <div class="row">
                                <?php if ($_SESSION['rol'] != "doctor") { ?>
                                    <label for="cedula" class="col-12 text-primary">CEDULA DEL PACIENTE:</label>
                                    <div class="form-group col-6">
                                        <input type="text" name="cedula" id="cedula" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <button type="submit" class="btn btn-primary mr-2"> <i class="fas fa-search mr-2"></i> BUSCAR CITAS</button>
                                        <a href="listarCitas.php?action=buscartodo" class="btn btn-warning mr-2"> <i class="fas fa-search mr-2"></i> VER TODAS LAS CITAS</a>
                                    </div>
                                    <label class="col-12 mt-2 mb-3 text-primary">DATOS DEL PACIENTE:</label>
                                    <div class="form-group col-3">
                                        <label for="cedula" class="text-primary">CEDULA</label>
                                        <input type="text" value="<?php echo isset($pacienteCita['cedula']) ?  $pacienteCita['cedula'] : ''; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="primerNombre" class="text-primary">APELLIDOS</label>
                                        <input type="text" value="<?php echo isset($pacienteCita['apellidoPaterno']) ?  $pacienteCita['apellidoPaterno'] . " " . $pacienteCita['apellidoMaterno']  : ''; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="primerNombre" class="text-primary">NOMBRES</label>
                                        <input type="text" value="<?php echo isset($pacienteCita['primerNombre']) ?  $pacienteCita['primerNombre'] . " " . $pacienteCita['segundoNombre']  : ''; ?>" class="form-control" disabled>
                                    </div>
                                <?php } ?>

                                <?php

                                if (!empty($pacienteCita) && $_SESSION['rol'] != 'doctor') {
                                ?>
                                    <div class="form-group col-3">
                                        <!-- Botón para abrir el modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarCita" style="margin-top: 32px;">
                                            <i class="fas fa-plus mr-2"></i>NUEVA CITA
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- Modal para registrar la cita -->
                                <div class="modal fade" id="modalRegistrarCita" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCitaLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="modalRegistrarCitaLabel"><i class="fas fa-calendar-plus mr-2"></i>REGISTRAR CITA</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Contenido del formulario para registrar la cita -->
                                                <form>
                                                    <!-- Agrega aquí los campos del formulario -->
                                                    <input type="hidden" id="idPaciente" name="idPaciente" value="<?php echo $pacienteCita['id']; ?>">
                                                    <input type="hidden" id="idCita" name="idCita" value="0">
                                                    <div class="form-group">
                                                        <label for="nombrePaciente" class="text-primary">Nombre del paciente</label>
                                                        <input type="text" class="form-control" id="nombrePaciente" name="nombrePaciente" readonly value="<?= (isset($pacienteCita['nombrePaciente'])) ? $pacienteCita['nombrePaciente'] : ''; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fechaCita" class="text-primary">Fecha de la cita</label>
                                                        <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" id="fechaCita" name="fechaCita">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="horaCita" class="text-primary">Hora de la cita</label>
                                                        <select class="form-control" id="horaCita" name="horaCita">
                                                            <?php
                                                            // Generar opciones de horas agrupadas en rangos
                                                            $horas = range(8, 17);
                                                            foreach ($horas as $hora) {
                                                                $horaInicio = sprintf("%02d:00", $hora);
                                                                $horaFin = sprintf("%02d:00", $hora + 1); // Sumar 1 hora para obtener la hora de fin
                                                                echo "<option value=\"$horaInicio-$horaFin\">$horaInicio - $horaFin</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="idDoctor" class="text-primary">Seleccionar doctor</label>
                                                        <select class="form-control" id="idDoctor" name="idDoctor">
                                                            <?php foreach ($doctores as $doctor) : ?>
                                                                <?php $nombreDoctor = $doctor['primerNombre'] . " " . $doctor['segundoNombre'] . " " . $doctor['apellidoPaterno'] . " " . $doctor['apellidoMaterno']; ?>
                                                                <option value="<?php echo $doctor['id']; ?>"><?php echo $nombreDoctor; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="idEspecialidad" class="text-primary">Tratamiento:</label>
                                                        <select class="form-control" name="idEspecialidad" id="idEspecialidad" required>
                                                            <?php foreach ($especialidades as $especialidad) : ?>
                                                                <option value="<?php echo $especialidad['id']; ?>"><?php echo $especialidad['nombre']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="motivoCita" class="text-primary">Motivo de la cita</label>
                                                        <textarea class="form-control" id="motivoCita" name="motivoCita" rows="3" placeholder="Ingrese el motivo de la cita"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="guardarCita()"><i class="fas fa-save mr-2"></i>REGISTRAR</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i>CERRAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <table class="table table-striped mt-3" id="tablaCitas">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th style="width: 120px;">FECHA CITA</th>
                                                <th>HORA</th>
                                                <th>PACIENTE</th>
                                                <th>CEDULA</th>
                                                <th>MOTIVO CITA</th>
                                                <th>DOCTOR</th>
                                                <th>TRATAMIENTO</th>
                                                <th>ESTADO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($citas)) {
                                                echo '<tr><td colspan="8">No se encontraron registros</td></tr>';
                                            }

                                            ?>

                                            <?php foreach ($citas as $cita) : ?>
                                                <tr>
                                                    <td><?= strftime('%A, %d de %B de %Y', strtotime($cita['fechaCita'])); ?></td>
                                                    <td><?= date("H:i A", strtotime($cita['horaInicio'])) . ' - ' . date("H:i A", strtotime($cita['horaFin'])) ?></td>
                                                    <td><?= $cita['paciente'] ?></td>
                                                    <td><?= $cita['cedula'] ?></td>
                                                    <td><?= $cita['motivoCita'] ?></td>
                                                    <td><?= $cita['doctor'] ?></td>
                                                    <td><?= $cita['nombreEspecialidad'] ?></td>
                                                    <td>

                                                        <?php if ($cita['estadoCita'] == 1) { ?>
                                                            <span style="font-size: 14px;padding: 8px;border-radius: 20px;color: #28a745;">APROBADA</span>
                                                        <?php } ?>

                                                        <?php if ($cita['estadoCita'] == 0) { ?>
                                                            <span style="font-size: 14px;padding: 8px;border-radius: 20px;color: #F7BB07;">ESPERANDO APROBACION</span>
                                                        <?php } ?>

                                                        <?php if ($cita['estadoCita'] == 3) { ?>
                                                            <span style="font-size: 14px;padding: 8px;border-radius: 20px;color: red;">RECHAZADA</span>
                                                        <?php } ?>


                                                    </td>

                                                    <td>
                                                        <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aprobar cita" onclick="marcarComoRealizada(<?php echo $cita['idCita']; ?>)" <?php echo ($cita['estadoCita'] == 0) ? '' : 'disabled'; ?>>
                                                            <i class="fa fa-check"></i> <!-- Ícono de marca como realizada -->
                                                        </button>

                                                        <?php if ($cita['estadoCita'] == 0) { ?>
                                                            <a class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Rechazar cita" onclick="rechazarCita(<?php echo $cita['idCita']; ?>)">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } ?>

                                                        <?php if ($cita['estadoCita'] == 0) { ?>
                                                            <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editarCita('<?php echo $cita['idCita']; ?>')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        <?php } ?>

                                                        <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminarCita(<?php echo $cita['idCita']; ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="main-footer bg-primary mt-4">
            <div class="container">
                <p class="text-center p-0 m-0"><strong> Copyright © 2024-2025 | Todos los derechos reservados</strong></p>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>

    <script>
        let editar = false;

        //  Acciones al abrir el formulario
        $('#modalRegistrarCita').on('show.bs.modal', function() {

            if (!editar) {
                $('#modalRegistrarCitaLabel').text("REGISTRAR CITA");
                $('#modalRegistrarCita #fechaCita').val(new Date().toISOString().split('T')[0]);
                $('#horaCita').val($('#horaCita option:first').val());
                $('#idDoctor').val($('#idDoctor option:first').val());
                $('#modalRegistrarCita #motivoCita').val('');
            }
        });

        // Acciones al cerrar el formulario
        $('#modalRegistrarCita').on('hidden.bs.modal', function() {
            editar = false;
        });

        // Guardar cita
        function guardarCita() {

            // Obtener los valores de los campos del formulario
            let idCita = document.getElementById('idCita').value;
            let idPaciente = document.getElementById('idPaciente').value;
            let nombrePaciente = document.getElementById('nombrePaciente').value;
            let fechaCita = document.getElementById('fechaCita').value;
            let horaCita = document.getElementById('horaCita').value;
            let idDoctor = document.getElementById('idDoctor').value;
            let motivoCita = document.getElementById('motivoCita').value;
            let idEspecialidad = document.getElementById('idEspecialidad').value;

            // Crear un objeto con los datos
            let formData = {
                idCita,
                idPaciente,
                nombrePaciente,
                fechaCita,
                horaCita,
                idDoctor,
                motivoCita,
                idEspecialidad,
            };

            let ruta = "";

            if (!editar) {
                ruta = "../../controlador/CitaController.php?action=registrar";
            } else {
                ruta = "../../controlador/CitaController.php?action=editar";
            }



            // Serializar el objeto en formato de cadena (si es necesario)
            $.ajax({
                type: "POST",
                url: ruta, // Reemplaza con la ruta correcta
                data: formData,
                success: function(response) {
                    console.log(response);
                    window.location.href = 'listarCitas.php?id=' + formData.idPaciente;
                },
                error: function(error) {
                    // Maneja el error si es necesario
                    console.error(error);
                    alert("No se pudo registrar la cita");

                    // Cierra el modal
                    $("#modalRegistrarCita").modal('hide');
                }
            });

        }

        //Editar cita
        function editarCita(idCita) {
            editar = true;
            $('#modalRegistrarCitaLabel').text("EDITAR CITA");

            $.ajax({
                type: "GET",
                url: "../../controlador/CitaController.php?action=buscar&id=" + idCita, // Reemplaza con la ruta correcta
                data: [],
                success: function(response) {

                    let cita = JSON.parse(response);

                    console.log(cita);

                    $("#modalRegistrarCita #idPaciente").val(cita.idPaciente);
                    $("#modalRegistrarCita #nombrePaciente").val(cita.paciente);
                    $('#modalRegistrarCita #fechaCita').val(cita.fechaCita);
                    $('#modalRegistrarCita #motivoCita').val(cita.motivoCita);
                    $('#modalRegistrarCita #idDoctor').val(cita.idDoctor);
                    $('#modalRegistrarCita #idCita').val(cita.idCita);
                    $('#modalRegistrarCita #idEspecialidad').val(cita.idEspecialidad);

                    // Unir la horaInicio y horaFin en un formato de rango
                    let horaRango = cita.horaInicio.substring(0, 5) + "-" + cita.horaFin.substring(0, 5);
                    $('#modalRegistrarCita #horaCita').val(horaRango);

                    // Abre el modal
                    $("#modalRegistrarCita").modal('show');

                },
                error: function(error) {
                    // Maneja el error si es necesario
                    console.error(error);
                    alert("No se pudo encontrar la cita");

                    // Cierra el modal
                    $("#modalRegistrarCita").modal('hide');
                }
            });

        }

        // Eliminar cita
        function eliminarCita(idCita) {

            // Muestra una ventana de confirmación
            let confirmacion = confirm('¿Estás seguro de que deseas eliminar esta cita?');

            if (confirmacion) {
                $.ajax({
                    type: "POST",
                    url: "../../controlador/CitaController.php?action=eliminar", // Reemplaza con la ruta correcta
                    data: {
                        idCita
                    },
                    success: function(response) {
                        window.location.href = 'listarCitas.php?<?php echo isset($pacienteCita['id']) ? 'id=' . $pacienteCita['id'] : 'action=buscartodo'; ?>'
                    },
                    error: function(error) {
                        // Maneja el error si es necesario
                        console.error(error);
                        alert("No se pudo eliminar la cita");
                    }
                });

            }

        }

        //Marcar como realizada la cita
        function marcarComoRealizada(idCita) {
            // Muestra una ventana de confirmación
            let confirmacion = confirm('¿Desea aprobar la cita?');

            if (confirmacion) {
                $.ajax({
                    type: "POST",
                    url: "../../controlador/CitaController.php?action=marcar", // Reemplaza con la ruta correcta
                    data: {
                        idCita
                    },
                    success: function(response) {
                        console.log(response)
                        window.location.href = 'listarCitas.php?<?php echo isset($pacienteCita['id']) ? 'id=' . $pacienteCita['id'] : 'action=buscartodo'; ?>'
                    },
                    error: function(error) {
                        // Maneja el error si es necesario
                        console.error(error);
                        alert("No se pudo marcar la cita");
                    }
                });

            }
        }



        //Marcar como realizada la cita
        function rechazarCita(idCita) {
            // Muestra una ventana de confirmación
            let confirmacion = confirm('¿Desea rechazar la cita?');

            if (confirmacion) {
                $.ajax({
                    type: "POST",
                    url: "../../controlador/CitaController.php?action=rechazar", // Reemplaza con la ruta correcta
                    data: {
                        idCita
                    },
                    success: function(response) {
                        console.log(response)
                        window.location.href = 'listarCitas.php?<?php echo isset($pacienteCita['id']) ? 'id=' . $pacienteCita['id'] : 'action=buscartodo'; ?>'
                    },
                    error: function(error) {
                        // Maneja el error si es necesario
                        console.error(error);
                        alert("No se pudo marcar la cita");
                    }
                });

            }
        }
    </script>
</body>

</html>