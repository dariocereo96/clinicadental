<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLINICA | REGISTRO</title>
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
      background-color: rgba(0, 0, 0, 0.5);
      /* Cambia el último valor (0.5) para ajustar la opacidad */
      color: #ffffff;
      /* Color del texto, ajusta según tus necesidades */
    }

    body {
      background-image: url("../imagenes/consultorio.png");
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
  <div class="register-box" style="margin: auto; margin-top: 100px;">
    <div class="card fondo-transparente-negro"">
      <div class="card-body">
        <p class="login-box-msg" style="font-weight: bold;font-size: 18px;">REGISTRAR UN NUEVO USUARIO</p>

        <form action="../../controlador/UsuarioController.php?action=registrar" method="post">
          <input type="hidden" name="rol" value="paciente"/>
          <div class="input-group mb-3">
            <label class="w-100">Usuario</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <label class="w-100">Email</label>
            <input type="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <label class="w-100">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button type=" submit" class="btn btn-primary btn-block">REGISTRAR</button>
            </div>
          </div>

          <div class="mt-2">
            <label>¿Ya estas registrado? <a href="../login/" class="text-center mb-4">Iniciar sesion</a></label>
          </div>
          <!-- /.col -->
      </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../layout/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../layout/dist/js/adminlte.min.js"></script>
</body>

</html>