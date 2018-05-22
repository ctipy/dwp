<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CT</b>i</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> CTi</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if($_SESSION['image'] != NULL) { ?>
                  <img src="../images/usuarios/<?php echo $_SESSION['image']; ?>" class="user-image" alt="User Image">
              <?php } else { ?>
                  <img src="../images/usuarios/avatar.png" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $_SESSION['id'].' - '.$_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if($_SESSION['image'] != NULL) { ?>
                  <img src="../images/usuarios/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">
                <?php } else { ?>
                  <img src="../images/usuarios/avatar.png" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  <?php echo $_SESSION['email']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>