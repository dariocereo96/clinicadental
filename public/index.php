<!DOCTYPE html>
<html>

<head>
	<title>CLINICA | HOME</title>
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
	session_start();
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
								<li><a href="#" style="color: #1C3961;font-size: 15px;">HOME</a></li>
								<li><a href="#nosotros" style="color: #1C3961;font-size: 15px;">NOSOTROS</a></li>
								<li><a href="#servicios" style="color: #1C3961;font-size: 15px;">SERVICIOS</a></li>
								<li><a href="#galeria" style="color: #1C3961;font-size: 15px;">GALERIA</a></li>
								<li><a href="#direccion" style="color: #1C3961;font-size: 15px;">DIRECCION</a></li>
								<li><a href="#citas" style="color: #1C3961;font-size: 15px;">CITAS</a></li>
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

		<div class="banner">
			<div class="owl-four owl-carousel" itemprop="image">
				<img src="images/imagen3.jpg" style="height: 450px!important;" alt="Image of Bannner">
				<img src="images/imagen9.jpeg" style="height: 450px!important;" alt="Image of Bannner">
				<img src="images/imagen5.jpg" style="height: 450px!important;" alt="Image of Bannner">
			</div>
			<div class="container">
			</div>
			<div id="owl-four-nav" class="owl-nav"></div>
		</div>
		<!-- End Banner-->

		<div class="page-heading">
			<div class="container">
				<h2 style="color: #1C3961;">¿Por que elegirnos?</h2>
			</div>
		</div>

		<section id="nosotros">
			<div class="container " style="margin-bottom: 60px;" ;">
				<div style="width: 100%; display: flex;">

					<div style="flex: 1;padding: 12px;">
						<div class="animate__animated animated-element" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);border-radius: 10px;overflow: hidden;">
							<h1 style="background-color: #1C3961;color: #fff;padding: 30px;">1. EQUIPO DENTAL ALTAMENTE
								CAPACITADO</h1>
							<img src="images/equipodental.jpg" alt="equipo dental" style="display: block; width: 100%;height: 200px;" />
							<p style="font-size: 14px!important;padding: 20px;font-weight: bold;color: #000;text-align: center;">
								Nuestro equipo ha obtenido diversas certificaciones y ha sido reconocido
								por su excelencia en el campo dental.</p>
						</div>
					</div>

					<div style="flex: 1;padding: 12px;">
						<div class="animate__animated animated-element" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);border-radius: 10px;overflow: hidden;">
							<h1 style="background-color: #1C3961;color: #fff;padding: 30px;">2. AMPLIA LINEA DE
								SERVICIOS DENTALES</h1>
							<img src="images/tratamientos.jpg" alt="equipo dental" style="display: block; width: 100%;height: 200px;" />
							<p style="font-size: 14px!important;padding: 20px;font-weight: bold;color: #000;text-align: center;">
								Ofrecemos una amplia gama de servicios dentales para mantener tu sonrisa
								saludable a lo largo del tiempo.</p>

						</div>
					</div>

					<div style="flex: 1;padding: 12px;">
						<div class="animate__animated animated-element" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);border-radius: 10px;overflow: hidden;">
							<h1 style="background-color: #1C3961;color: #fff;padding: 30px;">3. INSTALACIONES Y EQUIPOS
								DE TRATAMIENTO
								DENTAL AVANZADO</h1>
							<img src="images/instalaciones.jpg" alt="equipo dental" style="display: block; width: 100%;height: 200px;" />
							<p style="font-size: 14px!important;padding: 20px;font-weight: bold;color: #000;text-align: center;">
								Contamos con equipos y tecnologías de última generación para garantizar
								diagnósticos precisos y tratamientos efectivos. </p>

						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- Por que elegirno End -->

		<div class="page-heading" id="servicios">
			<div class="container">
				<h2 style="color: #1C3961;">NUESTROS SERVICIOS</h2>
			</div>
		</div>

		<div class="learn-courses">
			<div class="container">
				<div class="courses">
					<div class="owl-one owl-carousel">

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image"><img src="images/imagen11.jpeg" alt="courses picture" style="height: 240px;"></div>
							<p class="learn-desining-banner" style="background-color: #1C3961;" itemprop="name">LIMPIEZA
								DENTAL</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p style="color: #000;"> El objetivo principal de la limpieza dental es eliminar la
									acumulación de placa
									dental y sarro
									que se forma en y alrededor de los dientes y las encías.</p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$20</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="citas.php" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image"><img src="images/imagen10.jpeg" alt="courses picture" style="height: 240px;"></div>
							<p href="#" style="background-color: #1C3961;" class="learn-desining-banner" itemprop="name">ORTODONCIA</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p style="color: #000;">El tratamiento ortodóncico busca corregir problemas como dientes
									apiñados, separados, mal alineados o mordida incorrecta.</p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$120</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="citas.php" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image" style="height: 240px;"><img src="images/imagen12.jpeg" alt="courses picture"></div>
							<p href="#" style="background-color: #1C3961;" class="learn-desining-banner" itemprop="name">BLANQUEAMIENTO</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p style="color: #000;">
									El blanqueamiento dental es un procedimiento cosmético dental diseñado para aclarar
									el
									color de los dientes y eliminar las manchas y decoloraciones.</p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$60</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="citas.php" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image" style="height: 240px;"><img src="images/tratamiento-para-caries.jpg" alt="courses picture"></div>
							<p style="background-color: #1C3961;" class="learn-desining-banner" itemprop="name">
								TRATAMIENTO DE CARIES</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p style="color: #000;">La caries se producen cuando las bacterias en la boca producen
									ácidos que
									corroen y desmineralizan el esmalte dental, creando cavidades.</p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$35</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="citas.php" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image" style="height: 240px;"><img src="images/protesis-dentales-3.jpg" alt="courses picture"></div>
							<p style="background-color: #1C3961;" class="learn-desining-banner" itemprop="name">PROTESIS
								DENTALES</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p>Las prótesis dentales permiten reemplazar dientes ausentes y restaurar
									la función masticatoria, la estética facial y la salud oral en general. </p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$180</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="#" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>

						<div class="box-wrap" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image"><img src="images/carillas-dentales.jpg" alt="courses picture" style="height: 240px;"></div>
							<p style="background-color: #1C3961;" class="learn-desining-banner" itemprop="name">CARILLA
								DENTALES</p>
							<div class="box-body" style="border: none;" itemprop="description">
								<p>Las carillas son finas láminas de cerámica o resina compuesta. Se colocan sobre la
									superficie frontal de los dientes para mejorar su apariencia estética.</p>
								<section style="display: flex;">
									<div style="flex: 1;">
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>DURACION:
											</strong>1 HORA</span></p>
										<p style="font-family: Arial, Helvetica, sans-serif;"><strong>PRECIO:
											</strong>$70</p>
									</div>
									<div style="flex: 1; background-color: red;">
										<a href="citas.php" style="display: block;background-color:#1C3961;height: 100%;color: #fff;text-align: center;padding: 12px;font-size: 10px;"><strong>AGENDAR
												CITA</strong></a>
									</div>
								</section>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>

		<!-- Learn courses End -->
		<section class="whyUs-section" id="citas" style="background-color: #1C3961;padding: 0 0 40px 0;margin-bottom: 60px;margin-top: 60px;">
			<div class="container">
				<div class="featured-points">
					<img src="images/perfil.jpg " style="height: 500px;" />
				</div>
				<div class="whyus-wrap" style="text-align: center;">
					<h1 style="margin-top: 8px;">Dra. Cecilia Nieto Campozano</h1>
					<p style="text-align: justify;">Soy Odontóloga Especializada en la Universidad de Guayaquil.
						Experta en preservar y rehabilitar la Salud Dental de los más pequeños del hogar en un ambiente donde
						ellos se sientan Seguros y Cómodos, así con experiencias positivas y ayuda de ustedes,
						los padres, nuestros pequeños pacientes mantendrán la salud bucal adecuada.</p>
					<a href="citas.php" style="background-color: #C13C6F;padding: 30px;color: #fff;font-size: 30px;border-radius: 20px;">Quiero una cita <span style="font-weight: bold;font-size: 20px;">→</span></a>
				</div>
			</div>
		</section>

		<!-- Closed WhyUs section -->
		<section class="page-heading" id="galeria">
			<div class="container">
				<h2 style="color: #1C3961;">GALERIA</h2>
			</div>
		</section>
		<section class="gallery-images-section container" style="padding: 0 0 20px 0;margin-bottom: 60px;" itemprop="image" itemscope itemtype=" http://schema.org/ImageGallery">
			<div class="gallery-img-wrap">
				<a href="images/gallery-img1.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img1.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img2.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img2.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img3.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img4.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img4.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img5.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img5.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img6.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img6.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img7.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img7.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img8.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img8.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img9.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img9.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img10.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img10.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img11.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img11.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img12.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img12.jpg" alt="gallery-images">
				</a>
			</div>
		</section>
		<!-- End of gallery Images -->


		<section class="page-heading">
			<div class="container" id="direccion">
				<h2 style="color: #1C3961;">DIRECCION</h2>
			</div>
		</section>

		<section>
			<div class="container" style="margin-bottom: 60px;">
				<p style="text-align: center;font-size: 20px;"><strong>Calle Rocafuerte y Guayas ( Frente Distrito de Educaion
						), Jipijapa, Ecuador</strong></p>
				<br>
				<div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1021155.1401154497!2d-80.60563518705374!3d-1.2378186260638124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902bbe266110fecb%3A0xe1a9315be795fae4!2sE38!5e0!3m2!1ses-419!2sec!4v1709763747441!5m2!1ses-419!2sec" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
	</script>
</body>

</html>