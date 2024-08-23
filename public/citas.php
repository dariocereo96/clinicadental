<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>CLINICA | CITAS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css" />
	<link rel="stylesheet" type="text/css" href="inner-page-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
</head>

<?php
include_once "../admin/config/ConexionDB.php";
include_once "../admin/modelos/Especialidad.php";
include_once "../admin/modelos/Doctor.php";

$db = new ConexionBD();

$especialidadDAO = new Especialidad($db->conectar());
$especialidades = $especialidadDAO->consultarEspecialidades();

$doctorDAO = new Doctor($db->conectar());
$doctores = $doctorDAO->consultarDoctores();
?>

<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">

		<header class="site-header">
			<div class="top-header">
				<div class="container">
					<div class="top-header-left">

						<div class="top-header-block">
							<a href="tel:+593986062471" itemprop="telephone"><i class="fas fa-phone"></i> +593 98 606
								2471</a>
						</div>
					</div>
					<div class="top-header-right">
						<div class="social-block">
							<ul class="social-list">
								<li><a href="https://api.whatsapp.com/send?phone=593986062471"><i class="fab fa-viber"></i></a></li>
								<li><a href="https://www.facebook.com/CNDental.Ec"><i class="fab fa-facebook-square"></i></a></li>
								<li><a href=""><i class="fab fa-twitter"></i></a></li>
							</ul>
						</div>
					    <?php if (!isset($_SESSION['username'])) { ?>
							<div class="login-block">
								<a href="../admin/views/login/">LOGIN /</a>
								<a href="../admin/views/login/register.php">REGISTRO</a>
							</div>
						<?php } else { ?>
						    <div class="login-block">
								<a href="../admin/views/admin/">ADMINISTRACION /</a>
								<a href="../admin/controlador/UsuarioController.php?action=logout">LOGOUT</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- Top header Close -->
			<div class="main-header">
				<div class="container">
					<div class="logo-wrap" itemprop="logo">
						<img src="images/logo2.png" width="60px" alt="Logo Image">
						<!-- <h1>Education</h1> -->
					</div>
					<div class="nav-wrap">
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="/" style="color: #1C3961;font-size: 15px;">HOME</a></li>
								<li><a href="/#nosotros" style="color: #1C3961;font-size: 15px;">NOSOTROS</a></li>
								<li><a href="/#servicios" style="color: #1C3961;font-size: 15px;">SERVICIOS</a></li>
								<li><a href="/#galeria" style="color: #1C3961;font-size: 15px;">GALERIA</a></li>
								<li><a href="/#direccion" style="color: #1C3961;font-size: 15px;">DIRECCION</a></li>
								<li><a href="/citas.php" style="color: #1C3961;font-size: 15px;">CITAS</a></li>
							</ul>
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Close -->

		<div class="container">
			<?php if (isset($_SESSION['message'])) { ?>
				<div style="display: flex;background-color: #1C3961;" id="message">
					<p style="width: 95%;padding: 10px;color: #fff;"><strong><?php echo $_SESSION['message'];
																				unset($_SESSION['message'])  ?></strong></p>
					<a onclick="alert('hola')" style="cursor: pointer;width: 5%;display: block;background-color: transparent;padding: 3px;font-size: 20px;color: #fff;">X</a>
				</div>
			<?php
			}
			?>

		</div>

		<section class="contact-page-section">
			<div class="container">
				<div class="people-info-wrap" style="width: 100%;">
					<h2 style="color: #1C3961;margin-left: 10px;margin-bottom: 10px;">AGENDAMIENTO DE CITA</h2>
					<form action="../admin/controlador/CitaController.php?action=registrarcita" method="post">
						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">CEDULA</h3>
								<input type="text" name="cedula" style="width: 100%;" class="input-" required />
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">NOMBRES</h3>
								<input type="text" name="nombre" style="width: 100%;" class="input-" required />
							</div>
						</div>

						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">APELLIDOS</h3>
								<input type="text" name="apellido" style="width: 100%;" class="input-" required />
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">GENERO</h3>
								<select name="genero" class="input-" style="width: 100%;padding: 16px;">
									<option value="masculino">MASCULINO</option>
									<option value="masculino">FEMENINO</option>
									<option value="otro">OTRO</option>
								</select>
							</div>
						</div>

						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">FECHA NACIMIENTO</h3>
								<input type="date" name="fechaNacimiento" style="width: 100%;" class="input-" required />
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">TELEFONO</h3>
								<input type="text" name="telefono" style="width: 100%;" class="input-" required />
							</div>
						</div>

						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">CORREO</h3>
								<input type="text" name="correo" style="width: 100%;" class="input-" required />
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">TRATAMIENTO</h3>
								<select name="idEspecialidad" id="idEspecialidad" class="input-" style="width: 100%;padding: 16px;">
									<?php foreach ($especialidades as $especialidad) : ?>
										<option value=" <?php echo $especialidad['id']; ?>"><?php echo $especialidad['nombre']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">DOCTOR</h3>
								<select name="idDoctor" id="idDoctor" class="input-" style="width: 100%;padding: 16px;">
									<?php foreach ($doctores as $doctor) : ?>
										<?php $nombreDoctor = $doctor['primerNombre'] . " " . $doctor['segundoNombre'] . " " . $doctor['apellidoPaterno'] . " " . $doctor['apellidoMaterno']?>
										<option value="<?php echo $doctor['id']; ?>"><?php echo $nombreDoctor; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

						</div>

						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">FECHA CITA</h3>
								<input type="date" id="fechaCita" name="fechaCita" style="width: 100%;" class="input-" required />
							</div>

							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<h3 style="color: #1C3961;margin-bottom: 5px;">HORA CITA</h3>
								<select class="input-" id="horaCita" name="horaCita" style="width: 100%;padding: 17px;">
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
						</div>

						<div style="display: flex; flex-wrap: wrap;">
							<div style="flex: 1; width: 50%; box-sizing: border-box;padding: 10px;">
								<input type="submit" value="REGISTRAR CITA" style="font-weight: bold;background-color: #1C3961;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>


		<footer class="page-footer" style="background-color: #1C3961;" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter">

			<!-- End of box-Wrap -->
			<div class="footer-second-section" style="padding: 20px 0px 0 0">
				<div class="container">
					<hr class="footer-line">
					<ul class="social-list">
						<li><a href=""><i class="fab fa-facebook-square"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-skype"></i></a></li>
						<li><a href=""><i class="fab fa-youtube"></i></a></li>
						<li><a href=""><i class="fab fa-instagram"></i></a></li>
					</ul>
					<hr class="footer-line">
				</div>
			</div>
			<div class="footer-last-section">
				<div class="container">
					<p>Copyright 2024 &copy; clinicadentalecuador.000webhostapp.com <span>
				</div>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="js/jquery.rateyo.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

	<script>
		const elementos = document.querySelectorAll('.animated-element');

		elementos.forEach((elemento) => {
			elemento.addEventListener('mouseenter', () => {
				elemento.classList.add('animate__pulse');
			});

			elemento.addEventListener('mouseleave', () => {
				elemento.classList.remove('animate__pulse');
			});
		});

		function ocultarDIV() {
			const divMessage = document.getElementById("message");
			divMessage.style.display = "none";
		}
	</script>
</body>

</html>