<?php
    // conexion
    require 'conexion/conexion.php';
    require 'funciones/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sobre Nosotros | Mi empresa - Prueba Git</title>
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit.">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!-- INICIO HEADER -->
	<?php include 'include/head.php'; ?>
	<!-- FIN HEADER -->
	<main>
		<section id="info">
			<div class="container">
				<h2 class="titulo animated bounceInLeft">Titulo de la Sección</h2>
				<p class="subtitulo">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</p>

				<div class="col-sm-4 text-center">
					<i class="glyphicon glyphicon-ok"></i>
					<h3>Lorem ipsum dolor sit amet</h3>
				</div>
				<div class="col-sm-4 text-center">
					<i class="glyphicon glyphicon-ok"></i>
					<h3>Lorem ipsum dolor sit amet</h3>
				</div>
				<div class="col-sm-4 text-center">
					<i class="glyphicon glyphicon-ok"></i>
					<h3>Lorem ipsum dolor sit amet</h3>
				</div>

				<div class="col-sm-12 text-center">
					<button type="button" 
							class="btn btn-success" 
							data-toggle="modal" 
							data-target="#modalTeste">
						Politica del Sitio
					</button>
					
					<!-- MODAL -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
					      </div>
					      <div class="modal-body">
					        ...
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</section>

		<section id="empresa">
			<div class="container">
				<div class="col-sm-4">
					<img src="images/empresa.png" alt="Empresa" title="Empresa" width="100%">
				</div>
				<div class="col-sm-8">
					<h2 class="titulo text-left">
						Titulo de la Sección
					</h2>
					<p class="text-justify">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita laborum quia non sint aperiam repudiandae reprehenderit. Ipsum quidem laboriosam ad error. Animi minus necessitatibus voluptas, voluptatibus sunt facilis itaque est!
					</p>
					<p class="text-justify">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates quae aliquam nemo laudantium magni maiores eius, neque quibusdam expedita. Corporis enim aut ducimus magni reprehenderit voluptates molestias dignissimos ex repellat.
					</p>
				</div>
			</div>
		</section>
	</main>
	<!-- INICIO FOOTER -->
	<?php include 'include/foot.php'; ?>
	<!-- FIN FOOTER -->

	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>