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
     <!-- Asegúrate de incluir el enlace a Google Material Icons en tu documento -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                                   <a href="#servicios" class="nav-link text-light"><span><i class="fas fa-tooth mr-1"></i> Servicios</span></a>
                              </li>
                              <li class="nav-item">
                                   <a href="#galeria" class="nav-link text-light"><span><i class="fas fa-images mr-1"></i> Galeria</span></a>
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
                         <div class="carousel-item active" style="height: 400px; position: relative;">
                              <img src="views/imagenes/imagen3.jpg" class="d-block w-100 h-100" alt="Imagen 1" style="opacity: 0.8;">
                              <div style="background: rgba(0, 0, 0, 0.1); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                         </div>
                         <div class="carousel-item" style="height: 400px" ;>
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
               <div class="container">
                    <p class="text-center p-4 mt-4" style="font-size: 30px;color: #1E76C1;"><strong> ¿Por qué elegirnos?</strong></p>
                    <div class="row">
                         <div class="col-4">
                              <div class="shadow" style="padding:50px">
                                   <p class="text-center" style="font-size: 20px;color: #1E76C1;"><i class="fas fa-users fa-3x"></i></p>
                                   <p class="text-center"><strong>EQUIPO DENTAL ALTAMENTE CAPACITADO</strong></p>
                              </div>
                         </div>
                         <div class="col-4">
                              <div class="shadow" style="padding:50px">
                                   <p class="text-center" style="font-size: 20px;color: #1E76C1;"><i class="fas fa-tooth fa-3x"></i></p>
                                   <p class="text-center"><strong>AMPLIA LINEA DE SERVICIOS DENTALES</strong></p>
                              </div>
                         </div>
                         <div class="col-4">
                              <div class="shadow" style="padding:50px">
                                   <p class="text-center" style="font-size: 20px;color: #1E76C1;"><i class="fas fa-bed fa-3x"></i></p>
                                   <p class="text-center"><strong>INSTALACIONES Y EQUIPOS DE TRAMIENTO DENTAL AVANZADO</strong></p>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.Nuestros servicios -->

               <!-- Especialidades -->
               <div class="container" id="servicios">
                    <p class="text-center p-4 mt-4" style="font-size: 30px;color: #1E76C1;"><strong> Nuestros Servicios</strong></p>
                    <div class="row">
                         <div class="col-4">
                              <div class="shadow p-0">
                                   <div class="">
                                        <img src="views/imagenes/imagen10.jpeg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                                   </div>
                                   <div class="p-4">
                                        <p class="text-center" style="font-size: 20px;"><strong>Ortodoncia</strong></p>
                                        <p class="text-center">La ortodoncia puede corregir la mordida y restablecer el equilibrio de sus dientes</p>
                                   </div>
                              </div>
                         </div>
                         <div class="col-4">
                              <div class="shadow p-0">
                                   <div class="">
                                        <img src="views/imagenes/imagen12.jpeg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                                   </div>
                                   <div class="p-4">
                                        <p class="text-center" style="font-size: 20px;"><strong>Blanqueamiento Dental</strong></p>
                                        <p class="text-center">El procedimiento de blanqueamiento dental con láser nos permite blanquear sus dientes.</p>
                                   </div>
                              </div>
                         </div>
                         <div class="col-4">
                              <div class="shadow p-0">
                                   <div class="">
                                        <img src="views/imagenes/imagen13.jpeg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                                   </div>
                                   <div class="p-4">
                                        <p class="text-center" style="font-size: 20px;"><strong>Diseño de Sonrisas</strong></p>
                                        <p class="text-center">La odontología cosmética es hacer que tus dientes y tu sonrisa sean hermosos.</p>
                                   </div>
                              </div>
                         </div>
                         <div class="col-4 mt-4">
                              <div class="shadow p-0">
                                   <div class="">
                                        <img src="views/imagenes/imagen11.jpeg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                                   </div>
                                   <div class="p-4">
                                        <p class="text-center" style="font-size: 20px;"><strong>Peridoncia</strong></p>
                                        <p class="text-center">Trata las enfermedades de las encías y del hueso que sostiene los dientes</p>
                                   </div>
                              </div>
                         </div>
                         <div class="col-4 mt-4">
                              <div class="shadow p-0">
                                   <div class="">
                                        <img src="views/imagenes/imagen14.jpeg" class="d-block w-100" style="height: 230px;" alt="Imagen 3">
                                   </div>
                                   <div class="p-4">
                                        <p class="text-center" style="font-size: 20px;"><strong>Implantes Dentales</strong></p>
                                        <p class="text-center">Reemplaza el diente faltante, o dañado, con un diente artificial</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.Especialidades -->

               <!-- Galeria -->
               <div class="container" id="galeria">
                    <p class="text-center p-4 mt-4" style="font-size: 30px;color: #1E76C1;"><strong> Galeria</strong></p>
                    <div class="row">
                         <div class="col-4 shadow p-2">
                              <div class="embed-responsive embed-responsive-16by9" style="height: 100%;">
                                   <iframe class="embed-responsive-item" src="views/imagenes/video1.mp4" autoplay="false" muted></iframe>
                              </div>
                         </div>
                         <div class="col-4 shadow p-2" style="height: 332px;">
                              <img src="views/imagenes/imagen4.jpg" class="d-block w-100 h-100"/>
                         </div>
                         <div class="col-4 shadow p-2" style="height: 332px;">
                              <img src="views/imagenes/imagen7.jpeg" class="d-block w-100 h-100"/>
                         </div>
                         <div class="col-4 shadow p-2" style="height: 332px;">
                              <img src="views/imagenes/imagen8.jpeg" class="d-block w-100 h-100"/>
                         </div>
                         <div class="col-4 shadow p-2">
                              <div class="embed-responsive embed-responsive-16by9" style="height: 100%;">
                                   <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/flr8vDQ9Wuc"></iframe>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- /. Galeria -->

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
                    interval: 2000
               });
          });
     </script>
</body>

</html>