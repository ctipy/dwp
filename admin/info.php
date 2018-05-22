<?php
@session_start();
if(isset($_SESSION['logueado']) AND $_SESSION['logueado']) {} else {
    header('Location: login.php');
    exit;
}
// conexion
require '../conexion/conexion.php';
$sql = "SELECT * FROM info WHERE active = 1";
$query = $connection->prepare($sql);
$query->execute();
$total = $query->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Info | Panel de Administración</title>
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
                Info
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Info</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="info.add.php">
                                <button class="btn btn-primary"><i class="fa fa-plus"></i>
                                    <b>Nuevo</b>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Icono</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="text-center">Visible</th>
                            <th class="text-center">
                                <i class="fa fa-cog"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($rows = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td class="text-center">
                                    <i class="fa <?php echo $rows['icon']; ?>"></i>
                                </td>
                                <td><?php echo $rows['name']; ?></td>
                                <td>
                                    <?php echo $rows['description']; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($rows['visible'] == 1) { ?>
                                        <i class="fa fa-circle text-success"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-circle text-red"></i>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="info.edit.php?id=<?php echo $rows['id']; ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <a href="info.delete.php?id=<?php echo $rows['id']; ?>">
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
