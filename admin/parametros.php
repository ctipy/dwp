<?php
@session_start();
if(isset($_SESSION['logueado']) AND $_SESSION['logueado']) {} else {
    header('Location: login.php');
    exit;
}

// conexion
require '../conexion/conexion.php';
require 'helpers/helpers.php';

$sql = "SELECT * FROM parametros WHERE id = 1";
$query = $connection->prepare($sql);
$query->execute();
$rows = $query->fetch();

if (isset($_POST['actualizar']))
{
    $name_business = (isset($_POST['name_business'])) ? $_POST['name_business'] : NULL;
    $url = (isset($_POST['url'])) ? $_POST['url'] : NULL;
    $logo = (isset($_POST['logo'])) ? $_POST['logo'] : NULL;
    $favicon = (isset($_POST['favicon'])) ? $_POST['favicon'] : NULL;
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : NULL;
    $whatsapp  = (isset($_POST['whatsapp'])) ? $_POST['whatsapp'] : NULL;
    $email  = (isset($_POST['email'])) ? $_POST['email'] : NULL;
    $facebook  = (isset($_POST['facebook'])) ? $_POST['facebook'] : NULL;
    $twitter  = (isset($_POST['twitter'])) ? $_POST['twitter'] : NULL;
    $instagram  = (isset($_POST['instagram'])) ? $_POST['instagram'] : NULL;
    $youtube  = (isset($_POST['youtube'])) ? $_POST['youtube'] : NULL;
    $address  = (isset($_POST['address'])) ? $_POST['address'] : NULL;
    $working_hours  = (isset($_POST['working_hours'])) ? $_POST['working_hours'] : NULL;
    $plugin_instagram  = (isset($_POST['plugin_instagram'])) ? $_POST['plugin_instagram'] : NULL;
    $plugin_facebook  = (isset($_POST['plugin_facebook'])) ? $_POST['plugin_facebook'] : NULL;
    $analytics  = (isset($_POST['analytics'])) ? $_POST['analytics'] : NULL;
    $theme_colour  = (isset($_POST['theme_colour'])) ? $_POST['theme_colour'] : NULL;

    if ($name_business != NULL)
    {
      $sql = "UPDATE parametros 
              SET `name_business` = '$name_business', 
                  `url` = '$url', 
                  `logo` = '$logo', 
                  `favicon` = '$favicon', 
                  `phone` = '$phone', 
                  `whatsapp` = '$whatsapp', 
                  `email` = '$email', 
                  `facebook` = '$facebook', 
                  `twitter` = '$twitter',
                  `instagram` = '$instagram',
                  `youtube` = '$youtube',
                  `address` = '$address',
                  `working_hours` = '$working_hours',
                  `plugin_instagram` = '$plugin_instagram',
                  `plugin_facebook` = '$plugin_facebook',
                  `analytics` = '$analytics',
                  `theme_colour` = '$theme_colour'
              WHERE id = 1";
      $sql = $connection->prepare($sql);
      try
                {
                    $sql->execute();
                    $mensaje_success = "Registro actualizado";
                    header( "refresh:2;url=parametros.php");
                }
                catch (PDOException $e)
                {
                    $e->getMessage();
                    $mensaje_error = "Error, intente nuevamente!";
                }
    } 
    else {
        $mensaje_error = "Error, todos los campos son obligatorios!";
    }    
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Parametros | Panel de Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
        function subir_logo(input)
        {
            self.name = 'opener';
            remote = open('gestor/img.logo.php?input='+input,'remote', 'align=center,width=600,height=300,resizable=yes,status=yes');
            remote.focus();
        }

        function subir_favicon(input)
        {
            self.name = 'opener';
            remote = open('gestor/img.favicon.php?input='+input,'remote', 'align=center,width=600,height=300,resizable=yes,status=yes');
            remote.focus();
        }
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <?php include 'includes/header.php'; ?>

  <?php include 'includes/sidebar.php'; ?>

  <!-- Content  -->
  <div class="content-wrapper">
    
    <!-- Nav -->
    <section class="content-header">
      <h1>
        Actualizar Parametros
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Actualizar Parametros</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-body">
          <div class="col-sm-12">
                  <div class="row">
                            <?php if(isset($mensaje_success)) { ?>
                                <div class="alert alert-success">
                                    <?php echo $mensaje_success; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                            <?php } ?>

                            <?php if(isset($mensaje_error)) { ?>
                                <div class="alert alert-warning">
                                    <?php echo $mensaje_error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
          <form role="form" method="post" name="form">
            
            <div class="col-sm-12">
              <h3>Datos de la Empresa</h3>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Empresa</label>
                  <input class="form-control" name="name_business" value="<?php echo $rows['name_business'] ?>" placeholder="Empresa" type="text">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Link</label>
                    <input class="form-control" value="<?php echo $rows['url'] ?>" name="url" placeholder="Link" type="text">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Color</label>
                    <input class="form-control" value="<?php echo $rows['theme_colour'] ?>" name="theme_colour" placeholder="Color" type="text">
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Subir Logo</h3>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input class="form-control" name="logo" value="<?php echo $rows['logo'] ?>" placeholder="Subir Imagen" type="text" readonly="true">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input type="button" class="btn btn-danger" value="Subir Logo" onclick="subir_logo('logo')" />
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Subir Favicon</h3>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                    <input class="form-control" name="favicon" value="<?php echo $rows['favicon'] ?>"  placeholder="Subir Imagen" type="text" readonly="true">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input type="button" class="btn btn-danger" value="Subir Imagen" onclick="subir_favicon('favicon')" />
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Contactos y Redes Sociales</h3>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Teléfono</label>
                    <input class="form-control" value="<?php echo $rows['phone'] ?>" name="phone" placeholder="Link" type="text">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Whataspp</label>
                    <input class="form-control" value="<?php echo $rows['whatsapp'] ?>" name="whatsapp" placeholder="Link" type="text">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input class="form-control" value="<?php echo $rows['email'] ?>" name="email" placeholder="Link" type="text">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Facebook</label>
                    <input class="form-control" value="<?php echo $rows['facebook'] ?>" name="facebook" placeholder="Facebook" type="text">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Twitter</label>
                    <input class="form-control" value="<?php echo $rows['twitter'] ?>" name="twitter" placeholder="Twitter" type="text">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Instagram</label>
                    <input class="form-control" value="<?php echo $rows['instagram'] ?>" name="instagram" placeholder="Instagram" type="text">
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Youtube</label>
                    <input class="form-control" value="<?php echo $rows['youtube'] ?>" name="youtube" placeholder="Youtube" type="text">
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Dirección y Horario de Atención</h3>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input class="form-control" value="<?php echo $rows['address'] ?>" name="address" placeholder="Dirección" type="text">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Horarios</label>
                    <input class="form-control" value="<?php echo $rows['working_hours'] ?>" name="working_hours" placeholder="Horarios" type="text">
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Plugings</h3>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Facebook</label>
                    <textarea class="form-control" name="plugin_facebook" cols="30" rows="10"><?php echo $rows['plugin_facebook'] ?></textarea>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Instagram</label>
                    <textarea class="form-control" name="plugin_instagram" cols="30" rows="10"><?php echo $rows['plugin_instagram'] ?></textarea>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Analytics</label>
                    <textarea class="form-control" name="analytics" cols="30" rows="10"><?php echo $rows['analytics'] ?></textarea>
                </div>
            </div>

            <div class="col-sm-12 text-right">
              <div class="form-group">
                <button type="submit" name="actualizar" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

  </div>

  <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>