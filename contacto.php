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

	<title>Contacto | Mi Empresa</title>
	<meta name="description" content="Avda. Mariscal López (Super Carretera), Km 4, Piso 3, Oficina 301, N° 140, Edifício Malú, Cd. del Este 7000">
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
		<section id="contacto">
			<div class="container">

	<h2 class="text-center">Formulario de Contacto</h2>
	
	<div class="col-sm-12">
		<h3>Dirección y Contacto</h3>
		<p><i class="fa fa-map-marker"></i> Avda. Mariscal López (Super Carretera), Km 4, Piso 3, Oficina 301, N° 140, Edifício Malú, Cd. del Este 7000</p>
		<p><i class="fa fa-phone"></i> +595 21 3280 940</p>
		<p><b>Horarios de Atención</b> Lunes a Viernes de 09:00hs - 14:00hs</p>
	</div>

                <div class="col-sm-12">
                    <div class="msj-message text-center"></div>
                </div>
	<div class="col-sm-6">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.888895829685!2d-54.64188524941346!3d-25.508751683672394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f685be064445bd%3A0xd012626589955c24!2sCTi+Technology!5e0!3m2!1ses!2spy!4v1523489164852" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

	<div class="col-sm-6">
		<form>
			<input name="name" id="name" class="form-control" type="text" placeholder="Nombre(s)" required="required">

			<input name="lastname" id="lastname" class="form-control" type="text" placeholder="Apellido(s)" required="required">
			
			<input name="email" id="email" class="form-control" type="email" placeholder="Email" required="required">

			<input name="whatsapp" id="whatsapp" class="form-control" type="text" placeholder="Whatsapp" required="required">
			
			<select name="subjet" id="subjet" class="form-control">
				<option value="">Seleccione el asunto</option>
				<option value="1">Consulta</option>
				<option value="2">Queja</option>
				<option value="3">Sugerencia</option>
			</select>

			<textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>

            <button class="btn btn-default btn-message text-right" type="button">Enviar</button>
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
    <script>
        $(".btn-message").click(function() {
            var name = document.getElementById('name').value;
            var lastname = document.getElementById('lastname').value;
            var email = document.getElementById('email').value;
            var whatsapp = document.getElementById('whatsapp').value;
            var subjet = document.getElementById('subjet').value;
            var message = document.getElementById('message').value;

            if(name == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo nombre obligatorio</p>');
                return false;
            }

            else if(lastname == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo apellido obligatorio</p>');
                return false;
            }

            else if(email == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo email obligatorio</p>');
                return false;
            }
            else if(whatsapp == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo whatsapp obligatorio</p>');
                return false;
            }
            else if(subjet == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo asunto obligatorio</p>');
                return false;
            }

            else if(message == "")
            {
                $('.msj-message').html('<p style="color: red;">Campo mensaje obligatorio</p>');
                return false;
            }

            else
            {
                $.ajax({
                    type:'POST',
                    url:'message.php',
                    data:('name='+ name + '&lastname=' + lastname + '&email=' + email + '&whatsapp=' + whatsapp + '&subjet=' + subjet + '&message=' + message),
                    success:function(respuesta){
                        if (respuesta == 1){
                            $('.msj-message').html('<p style="color: green;">E-mail registrado ;)</p>');
                            document.getElementById('name').value = "";
                            document.getElementById('lastname').value = "";
                            document.getElementById('email').value = "";
                            document.getElementById('whatsapp').value = "";
                            document.getElementById('subjet').value = "";
                            document.getElementById('message').value = "";
                        }
                        else {
                            $('.msj-message').html('<p style="color: red;">El e-mail ya fue registrado, Intente con otro.</p>');
                            document.getElementById('name').value = "";
                            document.getElementById('lastname').value = "";
                            document.getElementById('email').value = "";
                            document.getElementById('whatsapp').value = "";
                            document.getElementById('subjet').value = "";
                            document.getElementById('message').value = "";
                        }
                    }
                })
            }
        })
    </script>
</body>
</html>