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

    <title>CLINICA | EDITAR PACIENTE</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../imagenes/favicon-32x32.png">
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

        $db = new ConexionBD();
        $pacienteDAO = new Paciente($db->conectar());

        $paciente = $pacienteDAO->buscarPacienteId($_GET["id"]);


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
                                <li class="breadcrumb-item"><a href="listarPacientes.php">PACIENTES</a></li>
                                <li class="breadcrumb-item"><a href="#">EDITAR</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title"><i class="fas fa-pencil-alt mr-2"></i>EDITAR PACIENTE</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="../../controlador/PacienteController.php?action=editar">
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
                                <div class="form-group col-4">
                                    <label for="tipoDocumento" class="text-primary">Tipo de Documento:</label>
                                    <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                        <option value="cedula" <?php if ($paciente['tipoDocumento'] === 'cedula') echo 'selected'; ?>>Cedula</option>
                                        <option value="pasaporte" <?php if ($paciente['tipoDocumento'] === 'pasaporte') echo 'selected'; ?>>Pasaporte</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="cedula" class="text-primary">N° Documento:</label>
                                    <input type="text" id="cedula" name="cedula" value="<?php echo $paciente['cedula'] ?>" class="form-control" oninput="validarDocumento(event)" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="primerNombre" class="text-primary">Primer Nombre:</label>
                                    <input type="text" id="primerNombre" value="<?php echo $paciente['primerNombre'] ?>" name="primerNombre" oninput="validarLetras(event)" class="form-control" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="segundoNombre" class="text-primary">Segundo Nombre:</label>
                                    <input type="text" id="segundoNombre" value="<?php echo $paciente['segundoNombre'] ?>" name="segundoNombre" oninput="validarLetras(event)" class="form-control" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="apellidoPaterno" class="text-primary">Apellido Paterno:</label>
                                    <input type="text" id="apellidoPaterno" value="<?php echo $paciente['apellidoPaterno'] ?>" name="apellidoPaterno" oninput="validarLetras(event)" class="form-control" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="apellidoMaterno" class="text-primary">Apellido Materno:</label>
                                    <input type="text" id="apellidoMaterno" value="<?php echo $paciente['apellidoMaterno'] ?>" name="apellidoMaterno" oninput="validarLetras(event)" class="form-control" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="fechaNacimiento" class="text-primary">Fecha de Nacimiento:</label>
                                    <input type="date" id="fechaNacimiento" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $paciente["fechaNacimiento"]; ?>" name="fechaNacimiento" class="form-control" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="genero" class="text-primary">Género:</label>
                                    <select id="genero" name="genero" class="form-control" required>
                                        <option value="masculino" <?php if ($paciente['genero'] === 'masculino') echo 'selected'; ?>>Masculino</option>
                                        <option value="femenino" <?php if ($paciente['genero'] === 'femenino') echo 'selected'; ?>>Femenino</option>
                                        <option value="otro" <?php if ($paciente['genero'] === 'otro') echo 'selected'; ?>>Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="telefono" class="text-primary">Teléfono:</label>
                                    <input type="tel" id="telefono" value="<?php echo $paciente["telefono"]; ?>" name="telefono" oninput="validarNumeros(event)" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="email" class="text-primary">Correo Electrónico:</label>
                                    <input type="email" id="email" value="<?php echo $paciente["email"]; ?>" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save mr-2"></i>REGISTRAR</button>
                                <a href="../admin/listarPacientes.php" class="btn btn-danger"><i class="fas fa-arrow-left mr-2"></i>CANCELAR</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.content-header -->

        </div>

        <!-- Footer-->
        <footer class="main-footer bg-primary mt-4">
            <div class="container">
                <p class="text-center p-0 m-0"><strong> Copyright © 2024-2025 | Todos los derechos reservados</strong></p>
            </div>
        </footer>
        <!-- End of Footer -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="../layout/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../layout/dist/js/adminlte.min.js"></script>

        <script>
            function validarNumeros(event) {
                // Obtener el valor actual del input
                let valorInput = event.target.value;

                // Reemplazar cualquier caracter no numérico por una cadena vacía
                let soloNumeros = valorInput.replace(/[^0-9]/g, '');

                // Actualizar el valor del input con solo números
                event.target.value = soloNumeros;
            }

            function validarDocumento(event) {
                let soloNumeros;

                // Obtener el valor actual del input
                let valorInput = event.target.value;

                // Obtener el tipo de documento
                let tipoDocumento = $("#tipoDocumento").val();

                if (tipoDocumento == 'cedula') {
                    // Reemplazar cualquier caracter no numérico por una cadena vacía
                    soloNumeros = valorInput.replace(/[^0-9]/g, '');

                    // Limitar la longitud a 10 caracteres
                    soloNumeros = soloNumeros.slice(0, 10);
                } else {
                    // Reemplazar cualquier caracter no alfanumerico por una cadena vacía
                    soloNumeros = valorInput.replace(/[^a-zA-Z0-9]/g, '');
                }

                // Actualizar el valor del input 
                event.target.value = soloNumeros;
            }

            function validarLetras(event) {
                // Obtener el valor actual del input
                let valorInput = event.target.value;

                // Reemplazar cualquier caracter no alfabético por una cadena vacía
                let soloLetras = valorInput.replace(/[^a-zA-Z]/g, '');

                // Actualizar el valor del input con solo letras
                event.target.value = soloLetras;
            }
        </script>
</body>

</html>