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

    <title>CLINICA | USUARIOS</title>

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
        include_once "../../modelos/Usuario.php";

        $db = new ConexionBD();

        $usuarioDAO = new Usuario($db->conectar());

        $usuarios = $usuarioDAO->consultarUsuarios();

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-primary">USUARIOS</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="listarUsuarios.php">USUARIOS</a></li>
                                <li class="breadcrumb-item"><a href="#"></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content container">
                <div class="card">
                    <div class="card-header">
                        <a href="registrarUsuario.php" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> REGISTRAR
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-3" id="tablaUsuarios">
                            <thead class="bg-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>ROL</th>
                                    <th>ACCIONES</ </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario) : ?>
                                    <tr>
                                        <td><?= $usuario['id'] ?></td>
                                        <td><?= $usuario['username'] ?></td>
                                        <td><?= $usuario['rol'] ?></td>
                                        <td>
                                            <a href="editarUsuario.php?id=<?php echo $usuario['id'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="../../controlador/UsuarioController.php?action=eliminar&id=<?php echo $usuario['id'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                                <i class="fa fa-trash"></i>
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
                zeroRecords: "NINGUN USUARIO ENCONTRADO",
                info: "MOSTRANDO DE _START_ A _END_ DE UN TOTAL _TOTAL_ REGISTROS",
                infoEmpty: "NINGUN USUARIO ENCONTRADO",
                infoFiltered: "(FILTRADO DESDE _MAX_ REGISTROS TOTALES)",
                search: "BUSCAR USUARIO",
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
            $('#tablaUsuarios').DataTable(dataTableOptions);
        });
    </script>
</body>

</html>