<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 text-monospace" style="background-color: #009688;">
  <!-- Brand Logo -->
  <a href="../dashboard/" class="brand-link">
    <img src="../dist/img/smz_logo.webp" alt="OR-TMSMIM" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-bold text-yellow">OR-TMSMIM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/userimg.webp" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white">
          <?php echo $_SESSION['fullname']; ?>
          <br/>
          <span class="text-dark font-weight-bold">
            <?php echo $_SESSION['urole']; ?>
          </span>
        </a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
          if ($_SESSION['urole'] == 'Msimamizi mkuu') {

            include('../MySections/msimamiziMkuuMenu.php');

          }elseif ($_SESSION['urole'] == 'Muangalizi mkuu') {

            include('../MySections/muangaliziMkuuMenu.php');

          }elseif ($_SESSION['urole'] == 'Msimamizi msaidizi') {

            include('../MySections/msimamiziMsaidiziMenu.php');

          }elseif ($_SESSION['urole'] == 'Muangalizi msaidizi') {

            include('../MySections/muangaliziMsaidiziMenu.php');

          }elseif ($_SESSION['urole'] == 'Afisa mapato') {

            include('../MySections/afisaMapatoMenu.php');

          }elseif ($_SESSION['urole'] == 'Mkusanyaji') {
            include('../MySections/mkusanyajiMenu.php');
          }
        ?>

        <li class="nav-item">
          <a href="#" class="nav-link text-white font-weight-bold">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Matumizi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php
              if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Msimamizi msaidizi') {
            ?>

            <li class="nav-item">
              <a href="../users/" class="nav-link text-yellow font-weight-bold">
                <i class="far fa-circle nav-icon"></i>
                <p>Watumiaji</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../ukaguzi/" class="nav-link text-yellow font-weight-bold">
                <i class="far fa-circle nav-icon"></i>
                <p>Ukaguzi</p>
              </a>
            </li>
            <?php
              }
            ?>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link text-yellow font-weight-bold" data-toggle="modal" data-target="#badiliNenoSiri">
                <i class="far fa-circle nav-icon"></i>
                <p>Neno la siri</p>
              </a>
            </li> -->
          </ul>
        </li>

        <li class="nav-item">
          <a href="../logOut/" class="nav-link text-white font-weight-bold">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Toka
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<?php
  include('../nenoSiri/nenoSiriModal.php');
?>