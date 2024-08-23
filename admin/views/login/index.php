<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLINICA | INICIO DE SESION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="../imagenes/favicon-32x32.png">

  <style>
    /* Aplica el fondo transparente negro */
    .fondo-transparente-negro {
      background-color: rgba(0, 0, 0, 0.4);
      /* Cambia el último valor (0.5) para ajustar la opacidad */
      color: #ffffff;
      /* Color del texto, ajusta según tus necesidades */
    }

    body {
      background-image: url("../imagenes/consultorio.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.2);
      /* Cambia el valor alpha para ajustar la opacidad */
    }
  </style>


</head>

<body>
  <div class="login-box" style="margin: auto; margin-top: 80px;">
    <!-- /.login-logo -->
    <div class="card fondo-transparente-negro">
      <div class="card-body">
        <h4 class="text-center" style="font-weight: bold;">INICIO DE SESION</h4>
        <div class="text-center mb-4">
          <img src="../imagenes/logo2.png" style="width: 150px;" />
        </div>
        <?php
        if (isset($_SESSION['error'])) {
          echo '<div class="alert alert-warning">' . $_SESSION['error'] . '</div>';
          unset($_SESSION['error']); // Borra el mensaje después de mostrarlo
        }
        ?>

        <form action="../../controlador/UsuarioController.php?action=login" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Ingrese su usuario" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button class="btn btn-primary w-100 mb-2"><strong>INGRESAR</strong></button>
          <!--<a class="btn btn-danger w-100"><strong style="color:white">REGISTRARSE</strong></a>-->
          <div>
            <label>¿No estas registrado? <a href="../login/register.php" class="text-center">Registrarse</a></label>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../layout/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src=".../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../layout/dist/js/adminlte.min.js"></script>

</body>

</html>