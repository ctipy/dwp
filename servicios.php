<?php
    // conexion
    require 'conexion/conexion.php';
    require 'funciones/funciones.php';

    // lista servicios
    $sql_s = "SELECT * FROM servicios WHERE active = 1 AND visible = 1";
    $query_s = $connection->prepare($sql_s);
    $query_s->execute();
    $total_s = $query_s->rowCount();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Servicios | Mi empresa</title>
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