<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makusanyo kwa Zoni</title>

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
          <div class="col-sm-8">
            <h1>Makusanyo kwa Zoni</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makusanyo kwa Zoni</li>
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
                  <div class="col-sm-12">
                    <form id="editMainSourceForm">
                      <input type="hidden" name="mside" id="mside" class="form-control">
                      <input type="hidden" name="instituteide" id="instituteide" class="form-control">

                      <div class="row">
                        
                          <?php
                            if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                              //if wizara
                              $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                              $arr = json_decode($json, true); //covert json data into array format
                              ?>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="instituteidkz">Taasisi
                                      <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="instituteidkz" name="instituteidkz" required="required" style="border: solid 1px green;" onchange="showZoni()">
                                        <option value="" hidden>chagua taasisi</option>
                                        <?php
                                          foreach ($arr as $key => $value) {
                                            echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                              </div>

                              <div class="col-sm-3">
                                <div class="form-group" id="zoniDivkz">
                                    <label for="zoneidd">Zoni
                                      <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="zoneidd" name="zoneidd" required="required" style="border: solid 1px green;">
                                        <option value="" hidden>chagua zoni</option>
                                    </select>
                                </div>
                              </div>
                              <?php
                            }else{
                              //if not wizara
                              $json = file_get_contents($pubIP.'selectZoneByInstitute/'.$_SESSION['instituteid']); //receive json from url
                              $arr = json_decode($json, true); //covert json data into array format
                              ?>
                              <input type="hidden" name="instituteidkz" id="instituteidkz" class="form-control" value="<?php echo $_SESSION['instituteid']; ?>">
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="zoneidd">Zoni
                                      <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="zoneidd" name="zoneidd" required="required" style="border: solid 1px green;" onchange="getCollectionByZone()">
                                        <option value="" hidden>Chagua zoni</option>
                                        <?php
                                          foreach ($arr as $key => $value) {
                                            echo '<option value="'.$value['zoneid'].'">'.$value['zonename'].'</option>';
                                          }
                                        ?>
                                        <option value="ZOTE">ZOTE</option>
                                    </select>
                                </div>
                              </div>
                              <?php
                            }
                          ?>
                          
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="startDate">Tarehe ya Mwanzo:</label>
                            <input type="date" name="startDate" id="startDate" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByZone()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByZone()">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="uu">
                <?php

                  // $json = file_get_contents($ipConnect.'/selectInstitutionInfo'); //receive json from url

                  // $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                        echo '<th>Taasisi</th>';
                      }
                    ?>
                    <th>Zoni</th>
                    <th>Kiasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                        $json4 = file_get_contents($pubIP.'selectZone/'); //receive json from url
                      }else{
                        $json4 = file_get_contents($pubIP.'selectZoneByInstitute/'.$_SESSION['instituteid']); //receive json from url
                      }

                      $arr4 = json_decode($json4, true); //covert json data into array format

                      $num = 1;
                      $yearlyTotalmy = 0;
                      $totalamountmy = 0;
                      foreach ($arr4 as $key => $value) {
                        $instname = $value['instname'];
                        $zonename = $value['zonename'];
                        $zoneid = $value['zoneid'];

                        // //find amount by vyanzo
                        // $json5 = file_get_contents($ipConnect.'/getDashboarCollectionByZone/'.$zoneid); //receive json from url

                        // $arr5 = json_decode($json5, true); //covert json data into array format

                        // $tamount5 = 0;
                        // foreach ($arr5 as $key5 => $value5) {
                        //   if ($value5['totalamount'] > 0) {
                        //     $tamount5 = $value5['totalamount'];
                        //   }else{
                        //     $tamount5 = 0;
                        //   }
                        // }

                        $jsonmy = file_get_contents($pubIP.'getYearDashboarCollectionByZone/'.$zoneid);
                        //receive json from url
                        $arrmy = json_decode($jsonmy, true); //covert json data into array format
                        $totalamountmy = 0;
                        foreach ($arrmy as $key => $valuemy) {
                          $totalamountmy = $valuemy['totalamount'];
                        }


                        // print_r($arr4);
                        echo '<tr>';
                          echo '<td>'.$num.'</td>';

                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            echo '<td>'.$instname.'</td>';
                          }

                          echo '<td>'.$zonename.'</td>';
                            
                          echo '<td class="text-success">'.number_format($totalamountmy).'.00</td>';
                          
                        echo '</tr>';
                        $num++;
                        $yearlyTotalmy = $yearlyTotalmy + $totalamountmy;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>&nbsp;</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
                    <th>Jumla</th>
                    <?php
                      echo '<th>'.number_format($yearlyTotalmy).'.00</th>';
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
?>
<script type="text/javascript" src="kwa_zoni.js"></script>
</body>
</html>
