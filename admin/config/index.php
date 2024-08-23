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
     <title>CLINICA | HOME</title>
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="views/layout/plugins/fontawesome-free/css/all.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="views/layout/dist/css/adminlte.min.css">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <!-- Favicon -->
     <link rel="icon" type="image/png" sizes="32x32" href="views/imagenes/favicon-32x32.png">

     <style>

     </style>
</head>

<body class="layout-top-nav" style="height: auto;">
     <div class="wrapper">

          <!-- Navigation -->
          <nav class="main-header navbar navbar-expand-md navbar-light navbar-primary">
               <div class="container">
                    <a href="" class="navbar-brand">
                         <img src="views/imagenes/logo2.png" alt="AdminLTE Logo" class="img-circle bg-white" width="40px">
                    </a>
                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                         <ul class="navbar-nav">
                              <li class="nav-item">
                                   <a href="" class="nav-link text-light"><span><i class="fas fa-home mr-1"></i> Home</span></a>
                              </li>
                              <li class="nav-item">
                                   <a href="#servicios" class="nav-link text-light"><span><i class="fas fa-stethoscope mr-1"></i> Servicios</span></a>
                              </li>
                              <li class="nav-item">
                                   <a href="#especialidades" class="nav-link text-light"><span><i class="fas fa-spa mr-1"></i> Especialidades</span></a>
                              </li>
                         </ul>
                    </div>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                         <a href="views/login/" class="btn btn-success mr-2">INICIAR SESION</a>
                         <a href="views/login/register.php" class="btn btn-danger">REGISTRARSE</a>
                    </ul>
               </div>
          </nav>
          <!-- End of Navigation -->

          <!-- Content -->
          <div class="content-wrapper" style="background-color: #fff;">

               <!-- Banner Content -->
               <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                         <div class="carousel-item active" style="height: 400px;">
                              <img src="views/imagenes/imagen3.jpg" class="d-block w-100 h-100" alt="Imagen 1">
                         </div>
                         <div class="carousel-item" style="height: 400px";>
                              <img src="views/imagenes/imagen4.jpg" class="d-block w-100 h-100" alt="Imagen 2">
                         </div>
                         <div class="carousel-item" style="height: 400px;">
                              <img src="views/imagenes/imagen5.jpg" class="d-block w-100 h-100" alt="Imagen 3">
                         </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="sr-only">Siguiente</span>
                    </a>
               </div>
               <!-- /.Banner Content -->

               <!-- Nuestros servicios -->
               <div class="container" id="servicios">
                    <p class="text-primary text-center p-4 mt-4" style="font-size: 30px;"><strong> NUESTROS SERVICIOS</strong></p>
                    <div class="row">
                         <div class="col-md-4">
                              <div class="service">
                                   <p class="text-primary text-center"><i class="fas fa-stethoscope fa-3x"></i></p>
                                   <h4 class="text-primary text-center">CONSULTA MEDICA</h4>
                                   <p>Realizamos evaluaciones médicas completas para el aseguraramiento de tu bienestar.</p>
                              </div>
                         </div>
                         <div class="col-md-4">
                              <div class="service">
                                   <p class="text-primary text-center"><i class="fas fa-flask fa-3x"></i></p>
                                   <h4 class="text-primary text-center">ANALISIS DE LABORATORIO</h4>
                                   <p>Ofrecemos servicios de análisis de laboratorio para un diagnóstico preciso.</p>
                              </div>
                         </div>
                         <div class="col-md-4">
                              <div class="service">
                                   <p class="text-primary text-center"><i class="fas fa-x-ray fa-3x"></i></p>
                                   <h4 class="text-primary text-center">RADIOLOGIA</h4>
                                   <p>Contamos con equipos modernos de radiología para imágenes diagnósticas.</p>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.Nuestros servicios -->

               <!-- Especialidades -->
               <div class="container" id="especialidades">
                    <p class="text-primary text-center p-4 mt-4" style="font-size: 30px;"><strong> ESPECIALIDADES</strong></p>
                    <div class="row">
                         <div class="col-4">
                              <img src="views/imagenes/imagen2.jpg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                              <h1 class="text-primary py-2" style="font-size: 20px;">MEDICINA GENERAL</h1>
                              <p>La Medicina General es una especialidad médica que se centra en el cuidado integral y la gestión de la salud de los pacientes. Los médicos generales,
                                   son conocidos como médicos de atención primaria o
                                   médicos de familia
                              </p>
                              <p><strong>Leer mas</strong></p>
                         </div>
                         <div class="col-4">
                              <img src="views/imagenes/imagen1.jpg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                              <h1 class="text-primary py-2" style="font-size: 20px;">CARDIOLOGIA</h1>
                              <p>La Cardiología es una rama de la medicina que se especializa en el estudio de enfermedades del corazón y del sistema cardiovascular. Los médicos especializados en cardiología,
                                   llamados cardiólogos, están entrenados para manejar una amplia variedad de trastornos cardíacos.</p>
                              <p><strong>Leer mas</strong></p>
                         </div>
                         <div class="col-4">
                              <img src="views/imagenes/imagen6.jpg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                              <h1 class="text-primary py-2" style="font-size: 20px;">GINECOLOGIA</h1>
                              <p>
                                   La Ginecología es la rama de la medicina que se especializa en la salud del sistema reproductor femenino. Los médicos especializados en
                                   ginecología,llamados ginecólogos, brindan atención médica a
                                   mujeres de todas las edades, desde la adolescencia hasta la postmenopausia.</p>
                              <p><strong>Leer mas</strong></p>
                         </div>
                    </div>
               </div>
               <!-- /.Especialidades -->

          </div>
          <!-- End of Content -->

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
     <script src="views/layout/plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap 4 -->
     <script src="views/layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- AdminLTE App -->
     <script src="views/layout/dist/js/adminlte.min.js"></script>

     <script>
          $(document).ready(function() {
               $('.carousel').carousel({
                    interval: 3000
               });
          });
     </script>
</body>

</html>