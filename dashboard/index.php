<!DOCTYPE html>
<html lang="en"> 
  <!-- (oncontextmenu="return false") used for stoping inspect element from the page -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <title>MUTM | Ubao</title>

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
            <h1>Ubao</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                  <a href="#">Nyumbani</a>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        //container for wizara
        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
          ?>
        <div class="container-fluid">

          <!-- tables data -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-primary">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya leo</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Taasisi</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $json4 = file_get_contents($pubIP.'getTodayDashboradWizarani/'); //receive json from url

                        $arr4 = json_decode($json4, true); //covert json data into array format

                        $num = 1;
                        $todayTotal = 0;
                        foreach ($arr4 as $key => $value) {
                          $instname = $value['instname'];
                          $totalamount = $value['totalamount'];
                          if ($totalamount >= 1) {
                            echo '<tr>';
                              echo '<td>'.$num.'</td>';
                              
                              echo '<td>'.$instname.'</td>';
                                
                              echo '<td class="text-success">'.number_format($totalamount, 2).'</td>';
                              
                            echo '</tr>';
                            $num++;
                            $todayTotal = $todayTotal + $totalamount;
                          }
                          
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px blue;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th class="text-center">'.number_format($todayTotal, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-warning">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwezi</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Taasisi</th>
                        <th>Kiasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $json4 = file_get_contents($pubIP.'getMonthDashboradWizarani/'); //receive json from url

                        $arr4 = json_decode($json4, true); //covert json data into array format

                        $num = 1;
                        $monthlyTotal = 0;
                        foreach ($arr4 as $key => $value) {

                          $instname = $value['instname'];
                          $totalamount = $value['totalamount'];

                          if ($totalamount >= 1) {
                            echo '<tr>';
                              echo '<td>'.$num.'</td>';
                              
                              echo '<td>'.$instname.'</td>';
                                
                              echo '<td class="text-success">'.number_format($totalamount, 2).'</td>';
                              
                            echo '</tr>';
                            $num++;
                            $monthlyTotal = $monthlyTotal + $totalamount;
                          }
                          
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th class="text-center">'.number_format($monthlyTotal, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-success">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwaka</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Taasisi</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $jsonChart = file_get_contents($pubIP.'getYearDashboradWizarani/'); //receive json from url

                        $arrChart = json_decode($jsonChart, true); //covert json data into array format

                        $num = 1;
                        $yearlyTotal = 0;
                        foreach ($arrChart as $key => $value) {
                          $instname = $value['instname'];
                          $totalamount = $value['totalamount'];

                          if ($totalamount >= 1) {
                            echo '<tr>';
                              echo '<td>'.$num.'</td>';
                              
                              echo '<td>'.$instname.'</td>';
                                
                              echo '<td class="text-success">'.number_format($totalamount, 2).'</td>';
                              
                            echo '</tr>';
                            $num++;
                            $yearlyTotal = $yearlyTotal + $totalamount;
                          }
   
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px green;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th class="text-center">'.number_format($yearlyTotal, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- tables data end -->

          <!-- data by graph -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title font-weight-bolder text-danger">Makusanyo <span class="text-primary">vs</span> Makadirio</h3>
                    <a href="../makadirio/">Fungua Ripoti</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span>Kiasi (TZS)</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative">

                     <div id="sales-chart" style="width: 100%; height: 500px;"></div>

                  </div>

                  <div class="d-flex flex-row justify-content-end font-weight-bolder">
                    <span class="mr-2">
                      <i class="fas fa-square text-default"></i> Taasisi
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- data by graph ends -->
        </div>
        <?php
      }else{
        //select zone collection for LGA
        $json4 = file_get_contents($pubIP.'selectZoneByInstitute/'.$_SESSION['instituteid']); //receive json from url
        $arr4 = json_decode($json4, true); //covert json data into array format

        //select main source collection for LGA
        $json3 = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
        $arr3 = json_decode($json3, true); //covert json data into array format
      ?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->  

        <!-- tables data -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-primary">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya leo (Zoni)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Zoni</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $num = 1;
                        $todayTotal = 0;
                        $totalamount = 0;
                        foreach ($arr4 as $key => $value) {
                          $zoneid = $value['zoneid'];
                          $zonename = $value['zonename'];

                            $jsonz = file_get_contents($pubIP.'getDashboarCollectionByZone/'.$zoneid);
                            //receive json from url
                            $arrz = json_decode($jsonz, true); //covert json data into array format
                            $totalamountz = 0;
                            foreach ($arrz as $key => $valuez) {
                              $totalamountz = $valuez['totalamount'];
                            }
                            
                            if ($totalamountz >= 1) {
                              echo '<tr>';
                                echo '<td>'.$num.'</td>';
                                
                                echo '<td>'.$zonename.'</td>';
                                echo '<td class="text-success">'.number_format($totalamountz, 2).'</td>';
                              
                              echo '</tr>';
                              $num++;
                              $todayTotal = $todayTotal + $totalamountz;
                            }

                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px blue;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th>'.number_format($todayTotal, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-success">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwezi (Zoni)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Zoni</th>
                        <th>Kiasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $num = 1;
                        $monthlyTotal = 0;
                        // $totalamount = 0;
                        foreach ($arr4 as $key => $value) {
                          $zoneid = $value['zoneid'];
                          $zonename = $value['zonename'];

                          $jsonzm = file_get_contents($pubIP.'getMonthDashboarCollectionByZone/'.$zoneid);
                          //receive json from url
                          $arrzm = json_decode($jsonzm, true); //covert json data into array format
                          $totalamountzm = 0;
                          foreach ($arrzm as $key => $valuezm) {
                            $totalamountzm = $valuezm['totalamount'];
                          }

                          if ($totalamountzm >= 1) {
                            echo '<tr>';
                              echo '<td>'.$num.'</td>';
                              
                              echo '<td>'.$zonename.'</td>';
                              echo '<td class="text-success">'.number_format($totalamountzm, 2).'</td>';
                          
                            echo '</tr>';
                            $num++;
                            $monthlyTotal = $monthlyTotal + $totalamountzm;
                          }
                                      
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th class="text-center">'.number_format($monthlyTotal, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-primary">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwaka (Zoni)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Zoni</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php

                        $num = 1;
                        $yearlyTotal = 0;
                        $totalamounty = 0;
                        foreach ($arr4 as $key => $value) {
                          $zoneid = $value['zoneid'];
                          $zonename = $value['zonename'];

                            $jsony = file_get_contents($pubIP.'getYearDashboarCollectionByZone/'.$zoneid);
                            //receive json from url
                            $arry = json_decode($jsony, true); //covert json data into array format
                            $totalamounty = 0;
                            foreach ($arry as $key => $valuey) {
                              $totalamounty = $valuey['totalamount'];
                            }

                            if ($totalamounty >= 1) {
                              echo '<tr>';
                                echo '<td>'.$num.'</td>';
                                
                                echo '<td>'.$zonename.'</td>';
                                echo '<td class="text-success">'.number_format($totalamounty, 2).'</td>';
                              
                              echo '</tr>';
                              $num++;
                              $yearlyTotal = $yearlyTotal + $totalamounty;
                            }
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px blue;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th>'.number_format($yearlyTotal, 2).' TZS</th>';
                        // echo '<th>0.00 TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- tables data end -->

          <hr/>

        <!-- tables data -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-danger">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya leo (Vyanzo vikuu)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Chanzo Kikuu</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $num = 1;
                        $todayTotalml = 0;
                        $totalamountml = 0;
                        foreach ($arr3 as $key => $value) {
                          $msid = $value['msid'];
                          $msname = $value['msname'];
                            $jsonml = file_get_contents($pubIP.'getDashboarCollectionByVyanzo/'.$msid);
                            //receive json from url
                            $arrml = json_decode($jsonml, true); //covert json data into array format
                            $totalamountml = 0;
                            foreach ($arrml as $key => $valueml) {
                              $totalamountml = $valueml['totalamount'];
                            }

                            if ($totalamountml != 0) {
	                        	echo '<tr>';
		                            echo '<td>'.$num.'</td>';
		                            
		                            echo '<td>'.$msname.'</td>';
		         
		                            echo '<td class="text-success">'.number_format($totalamountml, 2).'</td>';
		                            
		                        echo '</tr>';
		                        $num++;
		                        $todayTotalml = $todayTotalml + $totalamountml;
	                        }
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px red;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th>'.number_format($todayTotalml, 2).' TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-success">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwezi (Vyanzo vikuu)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Chanzo Kikuu</th>
                        <th>Kiasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $num = 1;
                        $monthlyTotalmm = 0;
                        $totalamountmm = 0;
                        foreach ($arr3 as $key => $value) {
                          $msid = $value['msid'];
                          $msname = $value['msname'];

                            $jsonmm = file_get_contents($pubIP.'getMonthDashboarCollectionByVyanzo/'.$msid);
                            //receive json from url
                            $arrmm = json_decode($jsonmm, true); //covert json data into array format
                            $totalamountmm = 0;
                            foreach ($arrmm as $key => $valuemm) {
                              $totalamountmm = $valuemm['totalamount'];
                            }

                          	if ($totalamountmm != 0) {
	                        	echo '<tr>';
		                            echo '<td>'.$num.'</td>';
		                            
		                            echo '<td>'.$msname.'</td>';
			                        echo '<td class="text-success">'.number_format($totalamountmm, 2).'</td>';
	                            
	                          	echo '</tr>';
	                          	$num++;
	                          	$monthlyTotalmm = $monthlyTotalmm + $totalamountmm;
	                        }
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th>'.number_format($monthlyTotalmm, 2).' TZS</th>';
                        // echo '<th>.00</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card">
                <div class="card-header border-0 bg-danger">
                  <h3 class="card-title font-weight-bolder">Makusanyo ya mwaka (Vyanzo vikuu)</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle small">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Chanzo Kikuu</th>
                      <th>Kiasi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        
                        $num = 1;
                        $yearlyTotalmy = 0;
                        $totalamountmy = 0;
                        foreach ($arr3 as $key => $value) {
                          $msid = $value['msid'];
                          $msname = $value['msname'];

                            $jsonmy = file_get_contents($pubIP.'/getYearDashboarCollectionByVyanzo/'.$msid);
                            //receive json from url
                            $arrmy = json_decode($jsonmy, true); //covert json data into array format
                            $totalamountmy = 0;
                            foreach ($arrmy as $key => $valuemy) {
                              $totalamountmy = $valuemy['totalamount'];
                            }

                          	if ($totalamountmy != 0) {
	                        	  echo '<tr>';
		                            echo '<td>'.$num.'</td>';
		                            
		                            echo '<td>'.$msname.'</td>';
			                        echo '<td class="text-success">'.number_format($totalamountmy, 2).'</td>';
	                            
	                          	echo '</tr>';
	                          	$num++;
	                          	$yearlyTotalmy = $yearlyTotalmy + $totalamountmy;
	                        }
                        }
                      ?>
                    </tbody>
                    <tfoot style="border-top: solid 3px red;">
                      <tr>
                        <th colspan="2" class="text-right">Jumla</th>
                        <?php
                          echo '<th>'.number_format($yearlyTotalmy, 2).' TZS</th>';
                        // echo '<th>0.00 TZS</th>';
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- tables data end -->

          <hr/>

        <div class="row">
          <div class="col-lg-12">
            
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title font-weight-bolder">
                    <span class="text-primary">
                      Makusanyo
                    </span>
                      vs 
                    <span class="text-danger">
                      Makadirio
                    </span>

                  </h3>

                  <a href="../makadirio/">Fungua Ripoti</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column font-weight-bolder">
                    <span>Kiasi (TZS)</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative">
                    <div id="sales-chart" style="width: 100%; height: 500px;"></div>
                </div>

                <div class="d-flex flex-row justify-content-end font-weight-bolder">
                  <span class="mr-2">
                    <i class="fas fa-square text-default"></i> Vyanzo Vikuu
                  </span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>

      </div>
      <!-- /.container-fluid -->
      <?php
        }
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include('../MySections/Footer.php');
  ?>

</div>
<!-- ./wrapper -->
<?php
  include('../MySections/FooterLinks.php');
?>


<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard3.js"></script> -->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script src="../dist/js/loader.js"></script>
<?php
  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
    ?>
    <!-- <script src="dashboardAdmin.js"></script> -->
    <script>
      google.charts.load('current',{
        "packages":["corechart"],"callback":drawChart,"language":"sw"
      });
      function drawChart(){
        var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
        w2.draw(new google.visualization.DataTable(
          {cols:[
              {label:"LGA",type:"string"},
              {label:"Makusanyo",type:"number"},
              {label:"Makadirio",type:"number"}
            ],

            rows:[

            <?php
              $yearlyTotal = 0;
              $num = 0;
              // $mksm = 6000000;
              $jsonChart2 = file_get_contents($pubIP.'getYearDashboradWizarani/'); //receive json from url
              $arrChart2 = json_decode($jsonChart2, true); //covert json data into array format
              foreach ($arrChart2 as $key => $value) {
                $instname = $value['instname'];
                $instid = $value['instituteid'];
                $mksm = $value['totalamount']; //makusanyo

                //find projections by institute(makadirio)
                $jsonm = file_get_contents($pubIP.'selectAllProjectionByInstitute/'.$instid);

                if($jsonm != '[null]'){
                  $mkdm = $jsonm;
                }else{
                  $mkdm = 0;
                }

                // $mksm = $mksm * 2;

              ?>

                {c:[{v:"<?= $instname ?>"},{v:"<?= $mksm ?>"},{v:"<?= $mkdm ?>"}]},

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
  <?php
  }else{
    ?>
    <script>
      google.charts.load('current',{
        "packages":["corechart"],"callback":drawChart,"language":"sw"
      });
      function drawChart(){
        var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
        w2.draw(new google.visualization.DataTable(
          {cols:[
              {label:"LGA ",type:"string"},
              {label:"Makusanyo",type:"number"},
              {label:"Makadirio",type:"number"}
            ],

            rows:[

            <?php
              //select main source collection for LGA
              $num = 0;
                $jsong = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                $arrg = json_decode($jsong, true); //covert json data into array format

                foreach ($arrg as $key => $valueg) {
                  $msidg = $valueg['msid'];
                  $msnameg = $valueg['msname'];


                  //find makusanyo by main source
                  $mks = 0;
                  $jsongg = file_get_contents($pubIP.'getYearDashboarCollectionByVyanzo/'.$msidg); //receive json from url
                  $arrgg = json_decode($jsongg, true); //covert json data into array format
                  foreach ($arrgg as $key => $valuegg) {
                    $mks = $valuegg['totalamount'];
                  }

                  //find projection by main source
                  $mkdggg = 0;
                  // $jsonggg = file_get_contents($ipConnect.'/selectProjectionByMainsource/'.$msidg); //receive json from url
                  // $arrggg = json_decode($jsonggg, true); //covert json data into array format
                  // foreach ($arrggg as $key => $valueggg) {
                  //   $mkd = $valueggg['amount'];

                  // }

                  //find projections by institute
                  $jsonggg = file_get_contents($pubIP.'selectProjectionByMainsource/'.$msidg);

                  if($jsonggg != '[null]'){
                    $mkdggg = $jsonggg;
                  }else{
                    $mkdmggg = 0;
                  }

                ?>

                  {c:[{v:"<?= $msnameg ?>"},{v:"<?= $mks ?>"},{v:"<?= $mkdggg ?>"}]},

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
    <?php

    
  }
?>

</body>
</html>
