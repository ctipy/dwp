<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($_SESSION['image'] != NULL) { ?>
            <img src="../images/usuarios/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">
          <?php } else { ?>
            <img src="../images/usuarios/avatar.png" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['id'] .' - '. $_SESSION['usuario']; ?></p>
        </div>
      </div>
     
      <!-- sidebar-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tablas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="staff.php"><i class="fa fa-circle-o"></i> Staff</a></li>
            <li><a href="slides.php"><i class="fa fa-circle-o"></i> Slides</a></li>
            <li><a href="servicios.php"><i class="fa fa-circle-o"></i> Servicios</a></li>
            <li><a href="clientes.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li><a href="info.php"><i class="fa fa-circle-o"></i> Info</a></li>
            <li><a href="cms.php"><i class="fa fa-circle-o"></i> Contenido</a></li>
            <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
          </ul>
        </li>
        <li>
            <a href="newsletters.php">
                <i class="fa fa-user"></i> <span>Newsletters</span>
            </a>
        </li>
          <li>
              <a href="mensajes.php">
                  <i class="fa fa-envelope"></i> <span>Mensajes</span>
              </a>
          </li>
          <li>
          <a href="parametros.php">
            <i class="fa fa-cogs"></i> <span>Configuraciones</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">nuevo</small>
            </span>
          </a>
        </li>      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>