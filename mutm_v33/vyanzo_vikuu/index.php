<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Vyanzo Vikuu</title>

  <?php
    include('../MySections/HeaderLinks.php');
  ?>
</head>
<body class="hold-transition sidebar-mini" oncontextmenu="return false">
  <div id="loader" class="center"></div>
<div class="wrapper">
  <?php
    include('../MySections/NavBar.php');
    include('../MySections/SideBar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-monospace">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vyanzo Vikuu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Vyanzo Vikuu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-9">
                    <!-- <h3 class="card-title">Vyanzo Vikuu</h3> -->
                    &nbsp;
                  </div>
                  <div class="col-sm-3 text-right">
                    <!-- <button type="button" class="btn btn-sm btn-success swalDefaultSuccess">
                      Launch Success Toast
                    </button> -->
                    <?php
                      if($_SESSION['urole'] == 'Afisa mapato'){
                        ?>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addMainSource">
                          <span class="fab fa-korvue"></span>&nbsp;Chanzo Kikuu Kipya
                        </button>
                        <?php
                      }else{
                        echo '&nbsp;';
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                    $json = file_get_contents($pubIP.'selectMainsourceInfo/'); //receive json from url
                  }else{
                    $json = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                  }

                  $arr = json_decode($json, true); //covert json data into array format

                  include('vyanzoVikuuList.php');

                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include('../MySections/Footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  include('../MySections/FooterLinks.php');
  
  include('vyanzoVikuuModals.php');
?>

 
<script src="vyanzoVikuuScripts.js"></script>

</body>
</html>
