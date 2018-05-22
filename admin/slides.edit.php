<?php
@session_start();
if(isset($_SESSION['logueado']) AND $_SESSION['logueado']) {} else {
    header('Location: login.php');
    exit;
}
// conexion
require '../conexion/conexion.php';
require 'helpers/helpers.php';
if (isset($_GET['id']))
{
    $id = $_GET['id'];
} else {
    header('Location: slides.php');
    exit;
}

$sql = "SELECT * FROM slides WHERE id = " . $id;
$query = $connection->prepare($sql);
$query->execute();
$rows = $query->fetch();

if (isset($_POST['actualizar']))
{
    $name = (isset($_POST['name'])) ? $_POST['name'] : NULL;
    $target = (isset($_POST['target'])) ? $_POST['target'] : NULL;
    $url = (isset($_POST['url'])) ? $_POST['url'] : NULL;
    $image = (isset($_POST['image'])) ? $_POST['image'] : NULL;
    $image_mobile = (isset($_POST['image_mobile'])) ? $_POST['image_mobile'] : NULL;
    $active = 1;
    $visible = (isset($_POST['visible'])) ? $_POST['visible'] : NULL;
    $user_id = $_SESSION['id'];
    $updated_at = date('Y-m-d H:i:s');

    if ($name != NULL AND $target != NULL AND $url != NULL AND $image != NULL AND $image_mobile != NULL) 
    {
      $sql = "UPDATE slides SET `name` = '$name', `target` = '$target', `image` = '$image', `image_mobile` = '$image_mobile', `active` = '$active', `visible` = '$visible', `user_id` = '$user_id', `updated_at` = '$updated_at' WHERE id = " . $id;
      $sql = $connection->prepare($sql);
      try
                {
                    $sql->execute();
                    $mensaje_success = "Registro actualizado";
                    header('Location: slides.php');
                    exit;
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
  <title>Slides | Panel de Administración</title>
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
        function subir_imagen(input)
        {
            self.name = 'opener';
            var name = document.getElementsByName("name")[0].value;
            remote = open('gestor/img.slides.php?name='+name+'&input='+input,'remote', 'align=center,width=600,height=300,resizable=yes,status=yes');
            remote.focus();
        }

        function subir_imagen_mobile(input)
        {
            self.name = 'opener';
            var name = document.getElementsByName("name")[0].value;
            remote = open('gestor/img.slides.m.php?name='+name+'&input='+input,'remote', 'align=center,width=600,height=300,resizable=yes,status=yes');
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
        Actualizar Slides
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="slides.php">Slides</a></li>
        <li class="active">Actualizar Slides</li>
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
              <h3>Datos</h3>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input class="form-control" name="name" value="<?php echo $rows['name'] ?>" placeholder="name" type="text">
                </div>
           </div>

           <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Abrir</label>
                    <select name="target" class="form-control" id="">
                      <?php if($rows['target'] == '_blank') { ?>
                        <option value="_blank">Otra Página</option>
                        <option value="_self">Misma Página</option>
                      <?php } else { ?>
                        <option value="_self">Misma Página</option>
                        <option value="_blank">Otra Página</option>
                      <?php } ?>
                      
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Visible</label>
                    <select name="visible" class="form-control" id="">
                      <?php if($rows['visible'] == 1) { ?>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                      <?php } else { ?>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Link</label>
                    <input class="form-control" value="<?php echo $rows['url'] ?>" name="url" placeholder="Link" type="text">
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Subir Imagen</h3>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input class="form-control" name="image" value="<?php echo $rows['image'] ?>" placeholder="Subir Imagen" type="text" readonly="true">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input type="button" class="btn btn-danger" value="Subir Imagen" onclick="subir_imagen('image')" />
                </div>
            </div>

            <div class="col-sm-12">
              <h3>Subir Imagen Mobile</h3>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                    <input class="form-control" name="image_mobile" value="<?php echo $rows['image_mobile'] ?>"  placeholder="Subir Imagen" type="text" readonly="true">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <input type="button" class="btn btn-danger" value="Subir Imagen" onclick="subir_imagen_mobile('image_mobile')" />
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
