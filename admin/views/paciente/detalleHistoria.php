<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:../login");
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

    <title>CLINICA | HISTORIA DETALLE</title>

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
        include_once "../../modelos/Especialidad.php";
        include_once "../../modelos/Paciente.php";
        include_once "../../modelos/Historial.php";
        include_once "../../modelos/Receta.php";

        $db = new ConexionBD();

        $historiaDAO = new Historial($db->conectar());
        $especialidadDAO = new Especialidad($db->conectar());
        $pacienteDAO = new Paciente($db->conectar());
        $recetaDAO = new Receta($db->conectar());

        $especialidades = $especialidadDAO->consultarEspecialidades();

        $historia = $historiaDAO->buscarHistoriaPorId($_GET["id"]);

        $paciente = $pacienteDAO->buscarPacienteId($historia["idPaciente"]);

        $recetas = $recetaDAO->consultarRecetaPorIdHistoria($_GET["id"]);
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- Vacio -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="misHistorias.php">HISTORIA CLINICA</a></li>
                                <li class="breadcrumb-item"><a href="#">DETALLE</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <input type="hidden" value="<?php echo $paciente['id']; ?>" name="idPaciente" />
                <input type="hidden" value="<?php echo $historia['id']; ?>" name="idHistoria" />

                <div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="card-title"><i class="fas fa-user mr-2"></i>DATOS DEL PACIENTE</h1>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-4">
                            <label for="cedula" class="text-primary">CEDULA</label>
                            <input type="text" value="<?php echo $paciente['cedula']; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="primerNombre" class="text-primary">APELLIDOS</label>
                            <input type="text" value="<?php echo $paciente['apellidoPaterno'] . " " . $paciente['apellidoMaterno']; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="primerNombre" class="text-primary">NOMBRES</label>
                            <input type="text" value="<?php echo $paciente['primerNombre'] . " " . $paciente['segundoNombre']; ?>" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="card-title"><i class="fas fa-calendar-check mr-2"></i>DATOS DE ATENCION</h1>
                    </div>

                    <div class="card-body row">
                        <div class="form-group col-6">
                            <label for="fechaAtencion" class="text-primary">Fecha de Atención:</label>
                            <input type="text" class="form-control" name="fechaAtencion" value="<?php echo date('Y-m-d', strtotime($historia['fechaAtencion'])); ?>" id="fechaAtencion" disabled>
                        </div>

                        <div class="form-group col-6">
                            <label for="idEspecialidad" class="text-primary">Especialidad:</label>
                            <select class="form-control" name="idEspecialidad" id="idEspecialidad" disabled>
                                <?php foreach ($especialidades as $especialidad) : ?>
                                    <option value="<?php echo $especialidad['id']; ?>" <?php echo ($especialidad['id'] == $historia['idEspecialidad']) ? 'selected' : ''; ?>>
                                        <?php echo $especialidad['nombre']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="diagnostico" class="text-primary">Diagnóstico:</label>
                            <textarea class="form-control" name="diagnostico" id="diagnostico" rows="4" disabled><?php echo $historia['diagnostico']; ?></textarea>
                        </div>

                        <div class="form-group col-6">
                            <label for="procedimiento" class="text-primary">Procedimiento:</label>
                            <textarea class="form-control" name="procedimiento" id="procedimiento" rows="4" disabled> <?php echo trim($historia['procedimiento']); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="card-title"><i class="fas fa-prescription-bottle-alt mr-2"></i>RECETA MEDICA</h1>
                    </div>

                    <div class="card-body">
                        <div id="medicamentoContainer" class="row col-12">
                            <?php if (count($recetas) > 0) : ?>
                                <?php foreach ($recetas as $receta) : ?>

                                    <div class="row col-12 medicamento">
                                        <div class="form-group col-4">
                                            <label for="nombreMedicamento" class="text-primary">Nombre del medicamento:</label>
                                            <input type="text" class="form-control" name="nombreMedicamento[]" disabled value="<?php echo $receta['nombreMedicamento']; ?>">
                                        </div>

                                        <div class="form-group col-8">
                                            <label for="indicacionesMedicamento" class="text-primary">Indicaciones:</label>
                                            <input type="text" class="form-control" name="indicacionesMedicamento[]" disabled value="<?php echo $receta['indicacionesMedicamento']; ?>">
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="row col-12 medicamento">
                                    <div class="form-group col-4">
                                        <label for="nombreMedicamento" class="text-primary">Nombre del medicamento:</label>
                                        <input type="text" class="form-control" name="nombreMedicamento[]">
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="indicacionesMedicamento" class="text-primary">Indicaciones:</label>
                                        <input type="text" class="form-control" name="indicacionesMedicamento[]">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <a href="misHistorias.php?id=<?php echo $paciente['id']; ?>" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>REGRESAR</a>
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

</body>

</html>