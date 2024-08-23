<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:../login");
    exit();
}

if ($_SESSION["idPaciente"] < 0) {
    header("Location:misDatos.php");
    exit();
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

    <title>CLINICA | HISTORIAL CLINICO</title>

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
                <a href="" class="navbar-brand">
                    <img src="../imagenes/logo2.png" alt="AdminLTE Logo" class="img-circle bg-white" width="40px">
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../paciente/" class="nav-link text-light"><span><i class="fas fa-home mr-1"></i> Home</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="misDatos.php" class="nav-link text-light"><span><i class="fas fa-user-injured mr-1"></i> Informacion</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="misCitas.php" class="nav-link text-light"><span><i class="far fa-calendar mr-1"></i> Citas</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="misHistorias.php" class="nav-link text-light"><span><i class="fas fa-book-medical mr-1"></i> Historias</span></a>
                        </li>
                    </ul>
                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light"><?= strtoupper($_SESSION['nombrePaciente']) ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-power-off text-light"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header"><strong><?php echo $_SESSION['rol'] ?></strong></span>
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
        include_once "../../modelos/Historial.php";

        $db = new ConexionBD();

        $pacienteDAO = null;
        $historialDAO = null;

        $pacienteHistoria = null;
        $historiales = [];

        $pacienteDAO = new Paciente($db->conectar());
        $historialDAO = new Historial($db->conectar());
        $pacienteHistoria = $pacienteDAO->buscarPacienteId($_SESSION['idPaciente']);

        if (!empty($pacienteHistoria)) {
            $historiales = $historialDAO->buscarHistoriaPorIdPaciente($pacienteHistoria['id']);
        }


        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $pacienteDAO = new Paciente($db->conectar());
            $historialDAO = new Historial($db->conectar());
            $pacienteHistoria = $pacienteDAO->buscarPacienteId($_GET['id']);

            if (!empty($pacienteHistoria)) {
                $historiales = $historialDAO->buscarHistoriaPorIdPaciente($pacienteHistoria['id']);
            }
        }
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-2">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!--VACIO -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../paciente/">HOME</a></li>
                                <li class="breadcrumb-item"><a href="#">HISTORIAL CLINICO</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">MI HISTORIAL DE ATENCIONES</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-12 mt-2 mb-3 text-primary">DATOS DEL PACIENTE</label>
                            <div class="form-group col-3">
                                <label for="cedula" class="text-primary">CEDULA</label>
                                <input type="text" value="<?php echo isset($pacienteHistoria['cedula']) ?  $pacienteHistoria['cedula'] : ''; ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label for="primerNombre" class="text-primary">APELLIDOS</label>
                                <input type="text" value="<?php echo isset($pacienteHistoria['apellidoPaterno']) ?  $pacienteHistoria['apellidoPaterno'] . " " . $pacienteHistoria['apellidoMaterno']  : ''; ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label for="primerNombre" class="text-primary">NOMBRES</label>
                                <input type="text" value="<?php echo isset($pacienteHistoria['primerNombre']) ?  $pacienteHistoria['primerNombre'] . " " . $pacienteHistoria['segundoNombre']  : ''; ?>" class="form-control" disabled>
                            </div>

                            <div class="col-12 mt-4">
                                <table class="table table-striped mt-3" id="tablaHistorias">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Fecha Atencion</th>
                                            <th>Especialidad</th>
                                            <th>Diagnostico</th>
                                            <th>Procedimiento</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($historiales)) {
                                            echo '<tr><td colspan="5">No se encontraron registros</td></tr>';
                                        }
                                        ?>

                                        <?php foreach ($historiales as $historial) : ?>
                                            <tr>
                                                <td><?= strftime('%A, %d de %B de %Y', strtotime($historial['fechaAtencion'])); ?></td>
                                                <td><?= $historial['especialidadNombre'] ?></td>
                                                <td><?= $historial['diagnostico'] ?></td>
                                                <td><?= $historial['procedimiento'] ?></td>
                                                <td>
                                                    <a href="detalleHistoria.php?id=<?php echo $historial['id']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detalles">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    <script src="../layout/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../layout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../layout/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../layout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../layout/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../layout/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../layout/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

    <script>
        const dataTableOptions = {
            pageLength: 5,
            language: {
                lengthMenu: "MOSTRAR _MENU_",
                zeroRecords: "NINGUNA CITA ENCONTRADA",
                info: "MOSTRANDO DE _START_ A _END_ DE UN TOTAL _TOTAL_ REGISTROS",
                infoEmpty: "NINGUNA CITA ENCONTRADA",
                infoFiltered: "(FILTRADO DESDE _MAX_ REGISTROS TOTALES)",
                search: "BUSCAR DATOS DE HISTORIA",
                loadingRecords: "CARGANDO...",
                paginate: {
                    first: "PRIMERO",
                    last: "ULTIMO",
                    next: "SIGUIENTE",
                    previous: "ANTERIOR"
                }
            }
        }

        $(document).ready(function() {
            $('#tablaHistorias').DataTable(dataTableOptions);
        });
    </script>

</body>

</html>