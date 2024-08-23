<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:../login");
} else {
    if ($_SESSION['rol'] == 'paciente') {
        header("Location:../paciente");
    }
}
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

    <title>CLINICA | EDITAR HISTORIA</title>

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
                                <li class="breadcrumb-item"><a href="listarHistorias.php">HISTORIA CLINICA</a></li>
                                <li class="breadcrumb-item"><a href="#">EDITAR</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <form method="post" action="../../controlador/HistoriaController.php?action=editar">
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
                                <input type="date" class="form-control" name="fechaAtencion" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d', strtotime($historia['fechaAtencion'])); ?>" id="fechaAtencion" required>
                            </div>

                            <div class="form-group col-6">
                                <label for="idEspecialidad" class="text-primary">Especialidad:</label>
                                <select class="form-control" name="idEspecialidad" id="idEspecialidad" required>
                                    <?php foreach ($especialidades as $especialidad) : ?>
                                        <option value="<?php echo $especialidad['id']; ?>" <?php echo ($especialidad['id'] == $historia['idEspecialidad']) ? 'selected' : ''; ?>>
                                            <?php echo $especialidad['nombre']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="diagnostico" class="text-primary">Diagnóstico:</label>
                                <textarea class="form-control" name="diagnostico" id="diagnostico" rows="4" required><?php echo $historia['diagnostico']; ?></textarea>
                            </div>

                            <div class="form-group col-6">
                                <label for="procedimiento" class="text-primary">Procedimiento:</label>
                                <textarea class="form-control" name="procedimiento" id="procedimiento" rows="4" required> <?php echo trim($historia['procedimiento']); ?></textarea>
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
                                            <div class="form-group col-3">
                                                <label for="nombreMedicamento" class="text-primary">Nombre del medicamento:</label>
                                                <input type="text" class="form-control" name="nombreMedicamento[]" value="<?php echo $receta['nombreMedicamento']; ?>">
                                            </div>

                                            <div class="form-group col-7">
                                                <label for="indicacionesMedicamento" class="text-primary">Indicaciones:</label>
                                                <input type="text" class="form-control" name="indicacionesMedicamento[]" value="<?php echo $receta['indicacionesMedicamento']; ?>">
                                            </div>

                                            <div class="form-group col-2" style="margin-top: 32px;">
                                                <button type="button" class="btn btn-primary agregar-medicamento" onclick="agregarMedicamento()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger eliminar-medicamento" onclick="eliminarMedicamento(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="row col-12 medicamento">
                                        <div class="form-group col-3">
                                            <label for="nombreMedicamento" class="text-primary">Nombre del medicamento:</label>
                                            <input type="text" class="form-control" name="nombreMedicamento[]">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="indicacionesMedicamento" class="text-primary">Indicaciones:</label>
                                            <input type="text" class="form-control" name="indicacionesMedicamento[]">
                                        </div>

                                        <div class="form-group col-2" style="margin-top: 32px;">
                                            <button type="button" class="btn btn-primary agregar-medicamento" onclick="agregarMedicamento()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger eliminar-medicamento" onclick="eliminarMedicamento(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save mr-2"></i>REGISTRAR</button>
                        <a href="../admin/listarHistorias.php?id=<?php echo $paciente['id']; ?>" class="btn btn-danger"><i class="fas fa-arrow-left mr-2"></i>CANCELAR</a>
                    </div>
                </form>
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
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../layout/dist/js/adminlte.min.js"></script>

    <script>
        function agregarMedicamento() {
            var medicamentoContainer = document.getElementById('medicamentoContainer');
            var nuevaFila = document.querySelector('.medicamento').cloneNode(true);
            nuevaFila.querySelectorAll('input').forEach(function(input) {
                input.value = ''; // Limpiar valores de los inputs
            });
            medicamentoContainer.appendChild(nuevaFila);
        }

        function eliminarMedicamento(button) {
            var medicamentoContainer = document.getElementById('medicamentoContainer');
            var fila = button.closest('.medicamento');
            if (medicamentoContainer.children.length > 1) {
                medicamentoContainer.removeChild(fila);
            } else {
                alert("Debe haber al menos un medicamento en la receta.");
            }
        }
    </script>
</body>

</html>