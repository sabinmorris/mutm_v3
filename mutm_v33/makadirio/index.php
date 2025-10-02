<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makadirio ya mapato</title>

  <?php
    include('../MySections/HeaderLinks.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
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
            <h1>Makadirio ya mapato kwa mwaka</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makadirio ya mapato</li>
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
                  if ($_SESSION['urole'] == 'Afisa mapato') {
                    ?>
                    <div class="row">
                      <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addMakadirio">
                          <span class="fa fa-plus"></span>&nbsp;Ongeza Makadirio ya Mwaka
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
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                    $json = file_get_contents($pubIP.'selectProjection'); //receive json from url
                  }else{
                    $json = file_get_contents($pubIP.'selectProjectionByInstitute/'.$_SESSION['instituteid']); //receive json from url
                  }

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>Taasisi</th>';
                      }
                    ?>
                    <th>Chanzo Kikuu</th>
                    <th>Mwaka wa bajeti</th>
                    <th>Makadirio</th>
                    <th>Mapato</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      $totalcollection = 0;
                      $totalmakadirio = 0;
                      $mapato = 0;
                      foreach ($arr as $key => $value) {
                        //find mapato by vyanzo vikuu
                        $json5 = file_get_contents($pubIP.'getPeriodicCollectionByBudgetYear/'.$value['msid']); //receive json from url

                        $arr5 = json_decode($json5, true); //covert json data into array format

                        $tamount5 = 0;
                        $mapato = 0;
                        foreach ($arr5 as $key5 => $value5) {
                          if ($value5['totalamount'] > 0) {
                            $mapato = $value5['totalamount'];
                          }else{
                            $mapato = 0;
                          }
                        }

                        echo '<tr>';
                          echo '<td>'.$num.'</td>';
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            echo '<td>'.$value['instname'].'</td>';
                          }
                          
                          echo '<td>'.$value['msname'].'</td>';
                          echo '<td>'.date( "d-m-Y", strtotime($value['startdate'])).' - '.date( "d-m-Y", strtotime($value['enddate'])).'</td>';
                          echo '<td class="text-success">'.number_format($value['amount'], 2).' TZS</td>';
                          echo '<td class="text-primary">'.number_format($mapato, 2).' TZS</td>';
                          
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            echo '<td class="text-right">';
                              echo '<div class="btn-group">';

                                echo '<a data-id="'.$value['makadirioid'].'" data-conf2="'.$value['yearid'].'" data-conf3="'.$value['msid'].'" data-conf4="'.$value['amount'].'" data-conf5="'.$value['startdate'].'" data-conf6="'.$value['enddate'].'" data-conf7="'.$value['msname'].'" data-conf8="'.$value['instname'].'" href="#eMakadirio" class="btn btn-xs btn-success open-eMakadirio" title="Bonyeza kubadilisha taariza za makadirio"><i class="fas fa-pen-alt"></i>&nbsp;Badili</a>';

                                  ?>
                              </div>
                              <?php
                            echo'</td>';
                          }
                          
                        echo '</tr>';

                        $num++;
                        $totalcollection = $totalcollection + $mapato;
                        $totalmakadirio = $totalmakadirio + $value['amount'];
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>&nbsp;</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
                    <th>&nbsp;</th>
                    <th>Jumla</th>
                    <th><?php echo number_format($totalmakadirio, 2) . ' TZS'; ?></th>
                    <th><?php echo number_format($totalcollection, 2) . ' TZS'; ?></th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
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
  include('makadirioModals.php');
?>

<script type="text/javascript" src="makadirioScripts.js"></script>
</body>
</html>
