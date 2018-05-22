<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Clientes | Mi Empresa</title>
	<meta name="description" content="Estas empresas confían en nuestro trabajo.">
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
		<section id="clientes">
			<div class="container">
				<h2 class="titulo">Lista de Clientes</h2>
				<p class="subtitulo">
					Estas empresas confían en nuestro trabajo.
				</p>
				<div class="row">
					<?php for ($i=1; $i < 5; $i++) { ?>
					<div class="col-sm-3">
						<div class="box-clientes">
							<img src="images/clientes/<?php echo $i; ?>.png" alt="">
						</div>
					</div>
					<?php } ?>
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