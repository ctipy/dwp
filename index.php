<?php 

	// conexion
	require 'conexion/conexion.php';
	require 'funciones/funciones.php';
	// lista slides
	$sql = "SELECT * FROM slides WHERE active = 1 and visible = 1 LIMIT 2";
	$query = $connection->prepare($sql);
	$query->execute();
	$total = $query->rowCount();

    // lista info
    $sql_i = "SELECT * FROM info WHERE active = 1 AND visible = 1 LIMIT 3";
    $query_i = $connection->prepare($sql_i);
    $query_i->execute();
    $total_i = $query_i->rowCount();

    // lista servicios
    $sql_s = "SELECT * FROM servicios WHERE active = 1 AND visible = 1 LIMIT 3";
    $query_s = $connection->prepare($sql_s);
    $query_s->execute();
    $total_s = $query_s->rowCount();

	// lista equipo
	$sql_e = "SELECT * FROM equipo WHERE active = 1 AND visible = 1";
	$query_e = $connection->prepare($sql_e);
	$query_e->execute();
	$total_e = $query_e->rowCount();

    // lista clientes
    $sql_c = "SELECT * FROM clientes WHERE destacado = 1 AND active = 1 AND visible = 1";
    $query_c = $connection->prepare($sql_c);
    $query_c->execute();
    $total_c = $query_c->rowCount();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Desarrollo Web Profesional - Prueba GIT</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="owl/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="owl/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/animate.css">

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

        <?php if($total > 0) { ?>
		<section id="slide">
			<div class="container-fluid">
				<div class="row">
					<div class="owl-carousel owl-theme">
					<?php while ($rows = $query->fetch()) { ?>
				        <div class="item">
				            <img src="images/slides/<?php echo $rows['image'] ?>" alt="<?php echo $rows['name']; ?>" title="<?php echo $rows['name']; ?>" class="hidden-xs">
				            <img src="images/slides/mobile/<?php echo $rows['image_mobile'] ?>" alt="<?php echo $rows['name']; ?>" title="<?php echo $rows['name']; ?>" class="hidden-lg hidden-md hidden-sm">
				        </div>
				    <?php } ?>
			        </div>
				</div>
			</div>
		</section>
        <?php } ?>

        <?php if($total_i > 0) { ?>
		<section id="info">
			<div class="container">
				<h2 class="titulo animated bounceInLeft">Titulo de la Sección</h2>
				<p class="subtitulo">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</p>

                <?php while ($rows_i = $query_i->fetch()) { ?>
				<div class="col-sm-4 text-center">
					<i class="<?php echo $rows['icon']; ?>"></i>
					<h3><?php echo $rows_i['name']; ?></h3>
				</div>
                <?php } ?>

			</div>
		</section>
        <?php } ?>

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

        <?php if($total_s > 0) { ?>
		<section id="servicios">
			<div class="container">
				<h2 class="titulo">Titulo de la Sección</h2>
				<p class="subtitulo">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</p>

				<div class="row">
                    <?php while ($rows_s = $query_s->fetch()) { ?>
						<div class="col-sm-4">
							<div class="servicios-box">
								<img src="images/servicios/<?php echo $rows_s['image']; ?>" alt="<?php echo $rows_s['name']; ?>" title="<?php echo $rows_s['name']; ?>">
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</section>
        <?php } ?>

        <?php if($total_e > 0) { ?>
		<section id="equipo">
			<div class="container">
				<h2 class="titulo">Titulo de la Sección</h2>
				<p class="subtitulo">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</p>
                <?php while ($rows_e= $query_e->fetch()) { ?>
				<div class="col-sm-3 text-center">
					<div class="box">
						<i class="glyphicon glyphicon-user"></i>
						<h3><?php echo $rows_e['name']; ?></h3>
					</div>
				</div>
                <?php } ?>
			</div>
		</section>
        <?php } ?>

        <?php if($total_c > 0) { ?>
		<section id="clientes">
			<div class="container">
				<div class="row">
                    <?php while ($rows_c = $query_c->fetch()) { ?>
					<div class="col-sm-3">
						<div class="box-clientes">
                            <a href="<?php echo $rows_c['url']; ?>" target="<?php echo $rows_c['target']; ?>">
							    <img src="images/clientes/<?php echo $rows_c['image']; ?>" alt="<?php echo $rows_c['name']; ?>" title="<?php echo $rows_c['name']; ?>">
                            </a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
        <?php } ?>

        <div class="msj-newsletter text-center"></div>
		<section id="newsletter">
			<div class="container">
				<div class="row">
					<form>
						<div class="col-sm-6 col-sm-offset-3">
							<input type="text" name="email" id="email_newsletter" class="form-control" placeholder="E-mail">
						</div>
						<div class="col-sm-3">
							<button class="btn btn-default" type="button" onclick="javascript:newsletter();">Enviar</button>
						</div>
					</form>
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
    <script src="owl/owl.carousel.min.js"></script>
    <script>
    	$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                items: 1,
                margin: 10,
                autoplay: true,
                autoplayHoverPause:true
              });
         })

        function newsletter()
        {
            var email = document.getElementById('email_newsletter').value;

            if(email == "")
            {
                $('.msj-newsletter').html('<p style="color: red;">Ingrese el E-mail!</p>');
                document.getElementById('email_newsletter').value = ""
                document.getElementById('email_newsletter').focus();
                return false;
            }

            else
            {
                $.ajax({
                    type:'POST',
                    url:'newsletter.php',
                    data:('email=' + email),
                    success:function(respuesta){
                        if (respuesta == 1){
                            $('.msj-newsletter').html('<p style="color: green;">E-mail registrado ;)</p>');
                            document.getElementById('email_newsletter').value = "";
                        }
                        else {
                            $('.msj-newsletter').html('<p style="color: red;">El e-mail ya fue registrado, Intente con otro.</p>');
                            document.getElementById('email_newsletter').value = "";
                        }
                    }
                })
            }
        }
    </script>
</body>
</html>