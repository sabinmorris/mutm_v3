<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Ripoti ya makusanyo kwa mwezi</title>

  <?php
    include('../MySections/HeaderLinks.php');

    //find budget year

    $instituteidch = $_SESSION['instituteid'];
    $startDatech = '';
    $endDatech = '';
    
    $jsonbb = file_get_contents($ipConnect.'/selectBudget'); //receive json from url

    $arrbb = json_decode($jsonbb, true); //covert json data into array format

    foreach ($arrbb as $keybb => $valuebb) {
      $instituteidch = $_SESSION['instituteid'];
      $startDatech = $valuebb['startdate'];
      $endDatech = $valuebb['enddate'];
    }

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
            <h1>Ripoti ya makusanyo kwa mwezi</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Ripoti ya makusanyo</li>
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
              <!-- <div class="card-header">
                gggg
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Ripoti ya Mwezi kwa Chati</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Ripoti ya Mwezi kwa Jadweli</a>
                  </li>
                </ul>

                <div class="tab-content" id="custom-content-above-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <!-- <p class="lead mb-0 text-success" style="margin-bottom: 0px; border-bottom: solid 1px #CBCBCB;">
                      Report ya Makusanyo kwa kila mwezi
                    </p> -->
                     
                     <div class="card">
                      <div class="card-header border-0">
                        <h3 class="card-title text-success font-weight-bolder">
                          Ripoti ya Makusanyo kwa kila mwezi kwa njia ya chati
                        </h3>
                        <form>
                          <div class="row">
                            <?php
                              if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                                //if wizara
                                $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                                $arr = json_decode($json, true); //covert json data into array format
                                ?>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="instituteidch">Taasisi
                                      <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="instituteidch" name="instituteidch" required="required" style="border: solid 1px green;" onchange="getMakusanyoByChati()">
                                        <option value="">chagua taasisi</option>
                                        <?php
                                          foreach ($arr as $key => $value) {
                                            echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                          }
                                        ?>
                                        <option value="ZOTE">ZOTE</option>
                                    </select>
                                  </div>
                                </div>
                              <?php
                              }else{
                                ?>
                                <div class="col-sm-4">&nbsp;</div>
                                <input type="hidden" name="instituteidch" id="instituteidch" value="<?php echo $_SESSION['instituteid']; ?>">
                                <?php
                              }
                            ?>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="startDatech">Tarehe ya Mwanzo:</label>
                                <input type="date" name="startDatech" id="startDatech" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo $startDatech; ?>" onchange="getMakusanyoByChati()">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="endDatech">Tarehe ya Mwisho:</label>
                                <input type="date" name="endDatech" id="endDatech" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo $endDatech; ?>" onchange="getMakusanyoByChati()">
                              </div>
                            </div>
                          </div>
                        </form>
                        <hr/>
                        <!-- <div class="card-tools">
                          <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-print" style="font-size: 1.5em;"></i>
                          </a>
                        </div> -->
                      </div>

                      <div class="card-body table-responsive p-0">

                        <div class="d-flex">
                          <p class="d-flex flex-column font-weight-bolder">
                            <span>Kiasi (TZS)</span>
                          </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative" id="ripotiChati">

                           <div id="sales-chart" style="width: 100%; height: 500px;"></div>

                        </div>

                        <div class="d-flex flex-row justify-content-end font-weight-bolder">
                          <span class="mr-2">
                            <i class="fas fa-square text-default"></i> Miezi
                          </span>

                          <!-- <span>
                            <i class="fas fa-square text-warning"></i> Makadirio
                          </span> -->
                        </div>

                      </div>
                    </div>
                    <!-- /.card -->

                  </div>
                  <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                    <div class="card">
                      <div class="card-header border-0">
                        <h3 class="card-title text-danger font-weight-bolder" style="margin-bottom: 5px;">
                          Ripoti ya Makusanyo kwa kila mwezi kwa njia ya jadweli
                        </h3>
                        <form>
                          <div class="row">
                            <?php
                              if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                                //if wizara
                                $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                                $arr = json_decode($json, true); //covert json data into array format
                                ?>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="instituteidmk">Taasisi
                                      <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="instituteidj" name="instituteidj" required="required" style="border: solid 1px green;" onchange="getMakusanyoByJadweli()">
                                        <option value="">chagua taasisi</option>
                                        <?php
                                          foreach ($arr as $key => $value) {
                                            echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                          }
                                        ?>
                                        <option value="ZOTE">ZOTE</option>
                                    </select>
                                  </div>
                                </div>
                              <?php
                              }else{
                                ?>
                                <div class="col-sm-4">&nbsp;</div>
                                <input type="hidden" name="instituteidj" id="instituteidj" value="<?php echo $_SESSION['instituteid']; ?>">
                                <?php
                              }
                            ?>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="startDatej">Tarehe ya Mwanzo:</label>
                                <input type="date" name="startDatej" id="startDatej" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo $startDatech; ?>" onchange="getMakusanyoByJadweli()">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="endDatej">Tarehe ya Mwisho:</label>
                                <input type="date" name="endDatej" id="endDatej" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo $endDatech; ?>" onchange="getMakusanyoByJadweli()">
                              </div>
                            </div>
                          </div>
                        </form>
                        <hr/>
                        <!-- <div class="card-tools">
                          <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                          </a>
                        </div> -->
                      </div>
                      <div class="card-body table-responsive p-0" id="ripotiJadweli">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Mwezi</th>
                            <th>Kiasi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                            // if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            //   // $json4 = file_get_contents($ipConnect.'/getAllLgaEachMonthsReport/'); //receive json from url
                            //   $json4 = file_get_contents($ipConnect.'/getAllLgaEachMonthsReport?edate='.$endDate.'&sdate='.$startDate.'&userid='.$userid); //receive json from url
                            // }else{
                            //   $json4 = file_get_contents($ipConnect.'/getLgaEachMonthsReport/'.$_SESSION['instituteid']); //receive json from url
                            // }

                            if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                              
                              $json5j = file_get_contents($pubIP.'getAllLgaEachMonthsReport?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url

                            }else{

                              $json5j = file_get_contents($pubIP.'getLgaEachMonthsReport/'.$instituteidch.'?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url

                            }

                            $num5j = 1;
                            $allMonthTotal5j = 0;
                            $eachMonthTotal5j = 0;
                            $arr5j = json_decode($json5j, true); //covert json data into array format
                            foreach ($arr5j as $key5j => $value5j) {
                              $months5j = $value5j['months'];
                              $eachMonthTotal5j = $value5j['totalamount'];

                              echo '<tr>';
                                echo '<td>'.$num5j.'</td>';
                                echo '<td>'.$months5j.'</td>';
                                echo '<td class="text-success">'.number_format($eachMonthTotal5j).'.00</td>';
                              echo '</tr>';
                              $num5j++;
                              $allMonthTotal5j = $allMonthTotal5j + $eachMonthTotal5j;
                            }
                          ?>
                          </tbody>
                          <tfoot>
                            <th>&nbsp;</th>
                            <th>Jumla</th>
                            <?php
                              echo '<th>'.number_format($allMonthTotal5j).'.00</th>';
                            ?>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
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

<script type="text/javascript" src="ripotiMakusanyo.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard3.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  google.charts.load('current',{
    "packages":["corechart"],"callback":drawChart,"language":"sw"
  });
  function drawChart(){
    var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
    w2.draw(new google.visualization.DataTable(
      {cols:[
          {label:"MWEZI",type:"string"},
          {label:"Makusanyo",type:"number"}
        ],

        rows:[

        <?php

          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
            $json5 = file_get_contents($pubIP.'getAllLgaEachMonthsReport?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url
          }else{
            $json5 = file_get_contents($pubIP.'getLgaEachMonthsReport/'.$instituteidch.'?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url
          }
          

          $num = 1;
          $allMonthTotalch = 0;
          $eachMonthTotalch = 0;
          $arr5 = json_decode($json5, true); //covert json data into array format
          foreach ($arr5 as $key5 => $value5) {
            $monthsch = $value5['months'];
            $eachMonthTotalch = $value5['totalamount'];
            $num++;
            $allMonthTotalch = $allMonthTotalch + $eachMonthTotalch;

          ?>

            {c:[{v:"<?= $monthsch ?>"},{v:"<?= $allMonthTotalch ?>"}]},

            <?php
            

            $num++;
          }
        ?>
        ]
      }
    ),
    {});
  };
</script>

</body>
</html>
