<?php
    // conexion
    require 'conexion/conexion.php';
    require 'funciones/funciones.php';


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