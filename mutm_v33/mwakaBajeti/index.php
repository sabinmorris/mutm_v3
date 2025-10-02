<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Mwaka wa Bajeti</title>

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
            <h1>Mwaka wa Bajeti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Mwaka wa Bajeti</li>
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
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                    ?>
                    <div class="row">
                      <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addMwakaBajeti">
                          <span class="fa fa-plus"></span>&nbsp;Ongeza Mwaka wa Bajeti
                        </button>
                      </div>
                    </div>
                    <?php
                  }
                ?>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="listTable">
                <?php

                  $json = file_get_contents($pubIP.'selectBudget'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tarehe ya Mwanzo</th>
                    <th>Tarehe ya Mwisho</th>
                    <th>Hali</th>
                    <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        echo '<tr>';
                          echo '<td>'.$num.'</td>';
                          echo '<td>'.$value['startdate'].'</td>';
                          echo '<td>'.$value['enddate'].'</td>';
                          if ($value['budgetstatus'] == 'inactive') {
                            echo '<td class="text-danger">'.$value['budgetstatus'].'</td>';
                          }else{
                            echo '<td>'.$value['budgetstatus'].'</td>';
                          }
                          
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            echo '<td class="text-right">';
                              echo '<div class="btn-group">';

                                echo '<a data-id="'.$value['yearid'].'" data-conf2="'.$value['startdate'].'" data-conf3="'.$value['enddate'].'" href="#eMwakaBajeti" class="btn btn-xs btn-success open-eMwakaBajeti" title="Bonyeza kubadilisha taariza za mwaka wa bajeti"><i class="fas fa-pen-alt"></i>&nbsp;Badili</a>&nbsp;';

                                  ?>
                                  <a class="btn btn-xs btn-danger" onClick="deleteMwakaBajeti('<?php echo $value['yearid']; ?>', '<?php echo $value['startdate']; ?>', '<?php echo $value['enddate']; ?>')" title="Bonyeza kufuta Mwaka wa Bajeti"><i class="fas fa-trash"></i>&nbsp;Futa</a>
                              </div>
                              <?php
                            echo'</td>';
                          }else{
                            echo '<td class="text-right">&nbsp;</td>';
                          }
                          
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Tarehe ya Mwanzo</th>
                    <th>Tarehe ya Mwisho</th>
                    <th>Hali</th>
                    <th>&nbsp;</th>
                  </tfoot>
                </table>
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
  include('mwakaBajetiModals.php');
?>

<script type="text/javascript" src="mwakaBajetiScripts.js"></script>
</body>
</html>
