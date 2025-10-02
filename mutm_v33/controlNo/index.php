<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Namba za Ankara</title>

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
            <h1>Namba za Ankara / Control Numbers</h1>
          </div>

          <div class="col-sm-2 text-right" id="spinnerGrow" style="visibility: hidden;">
            <div class="spinner-grow spinner-grow-sm text-muted"></div>
            <div class="spinner-grow spinner-grow-sm text-dark"></div>
            <div class="spinner-grow spinner-grow-sm text-success"></div>
            <div class="spinner-grow spinner-grow-sm text-danger"></div>
          </div>

          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Namba za Ankara</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#hazijalipiwa" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Hazijalipiwa</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-success" id="custom-content-above-profile-tab" data-toggle="pill" href="#zilizolipiwa" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Zilizolipiwa</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link text-info" id="custom-content-above-messages-tab" data-toggle="pill" href="#zilizohairishwa" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Zilizohairishwa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-danger" id="custom-content-above-messages-tab" data-toggle="pill" href="#zilizopitwa" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Zilizopitwa na muda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" id="custom-content-above-messages-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Zinazosubiri</a>
                  </li>
                </ul>

                <div class="tab-content" id="custom-content-above-tabContent">
                  <!-- start control namba hazijalipiwa -->
                  <div class="tab-pane fade show active" id="hazijalipiwa" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByCnNp" placeholder="Ankara Namba">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byCnNp', 'np')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhoneNp" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byPhoneNp', 'np')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullnameNp" placeholder="Jina la Mkusanyaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byFullnameNp', 'np')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            &nbsp;
                          </div>

                          <div class="col-sm-2 text-right">
                            <div class="input-group input-group-sm">
                              <select class="custom-select form-control-border" id="notPaidCNSearch" name="notPaidCNSearch" style="border-color: red;" onchange="notPaidCNSearch(this.value)">
                                <?php
                                  include('../MySections/searchEntries.php');
                                ?>
                              </select>

                              <span class="input-group-append">
                                <span class="btn btn-flat btn-outline-danger" disabled>
                                  rows
                                </span>
                              </span>

                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="notPaidSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getControllNumberByStatus?pageNumber=1&pageSize=50&status=CREATED'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getControllNumberByUserStatus?pageNumber=1&pageSize=50&status=CREATED&userid='.$_SESSION['userid']); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getControllNumberByInstituteStatus?pageNumber=1&pageSize=50&instid='.$_SESSION['instituteid'].'&status=CREATED'); //receive json from url
                          }

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="cnHazijalipiwa" class="table table-bordered table-striped small">
                          <?php
                            include('cnHazijalipiwa.php');
                          ?>
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- End control namba hazijalipiwa -->
                
                  <!-- start control namba zilizolipiwa -->
                  <div class="tab-pane fade" id="zilizolipiwa" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByCnPa" placeholder="Ankara Namba">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byCnPa', 'pa')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByReceiptPa" placeholder="Risiti ya Malipo">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byReceiptPa', 'pa')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhonePa" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byPhonePa', 'pa')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullnamePa" placeholder="Jina la Mkusanyaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byFullnamePa', 'pa')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-1">
                            &nbsp;
                          </div>

                          <div class="col-sm-2 text-right">
                            <div class="input-group input-group-sm">
                              <select class="custom-select form-control-border" id="paidCNSearch" name="paidCNSearch" style="border-color: red;" onchange="paidCNSearch(this.value)">
                                <?php
                                  include('../MySections/searchEntries.php');
                                ?>
                              </select>

                              <span class="input-group-append">
                                <span class="btn btn-flat btn-outline-danger" disabled>
                                  rows
                                </span>
                              </span>

                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="paidSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getControllNumberByStatus?pageNumber=1&pageSize=50&status=PAID'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getControllNumberByUserStatus?pageNumber=1&pageSize=50&status=PAID&userid='.$_SESSION['userid']); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getControllNumberByInstituteStatus?pageNumber=1&pageSize=50&instid='.$_SESSION['instituteid'].'&status=PAID'); //receive json from url
                          } 

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="cnZilizolipiwa" class="table table-bordered table-striped small">

                          <?php
                            include('cnZilizolipiwa.php');
                          ?>
                          
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- End control namba hazijalipiwa -->

                  <!-- start control namba zilizohairishwa -->
                  <div class="tab-pane fade" id="zilizohairishwa" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByCnCa" placeholder="Ankara Namba">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byCnCa', 'ca')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhoneCa" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byPhoneCa', 'ca')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullnameCa" placeholder="Jina la Mkusanyaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byFullnameCa', 'ca')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            &nbsp;
                          </div>

                          <div class="col-sm-2 text-right">
                            <div class="input-group input-group-sm">
                              <select class="custom-select form-control-border" id="canceledCNSearch" name="canceledCNSearch" style="border-color: red;" onchange="canceledCNSearch(this.value)">
                                <?php
                                  include('../MySections/searchEntries.php');
                                ?>
                              </select>

                              <span class="input-group-append">
                                <span class="btn btn-flat btn-outline-danger" disabled>
                                  rows
                                </span>
                              </span>

                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="canceledSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getControllNumberByStatus?pageNumber=1&pageSize=50&status=CANCELED'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getControllNumberByUserStatus?pageNumber=1&pageSize=50&status=CANCELED&userid='.$_SESSION['userid']); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getControllNumberByInstituteStatus?pageNumber=1&pageSize=50&instid='.$_SESSION['instituteid'].'&status=CANCELED'); //receive json from url
                          }

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="cnZilizohairishwa" class="table table-bordered table-striped small">

                          <?php
                            include('cnZilizohairishwa.php');
                          ?>
                          
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- End control namba hazijalipiwa -->
                   
                  <!-- start control namba zilizopita muda -->
                  <div class="tab-pane fade" id="zilizopitwa" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByCnEx" placeholder="Ankara Namba">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byCnEx', 'ex')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhoneEx" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byPhoneEx', 'ex')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullnameEx" placeholder="Jina la Mkusanyaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byFullnameEx', 'ex')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            &nbsp;
                          </div>

                          <div class="col-sm-2 text-right">
                            <div class="input-group input-group-sm">
                              <select class="custom-select form-control-border" id="expiredCNSearch" name="expiredCNSearch" style="border-color: red;" onchange="expiredCNSearch(this.value)">
                                <?php
                                  include('../MySections/searchEntries.php');
                                ?>
                              </select>

                              <span class="input-group-append">
                                <span class="btn btn-flat btn-outline-danger" disabled>
                                  rows
                                </span>
                              </span>

                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="expiredSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getControllNumberByStatus?pageNumber=1&pageSize=50&status=EXPIRED'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getControllNumberByUserStatus?pageNumber=1&pageSize=50&status=EXPIRED&userid='.$_SESSION['userid']); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getControllNumberByInstituteStatus?pageNumber=1&pageSize=50&instid='.$_SESSION['instituteid'].'&status=EXPIRED'); //receive json from url
                          }

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="cnZilizopitwa" class="table table-bordered table-striped small">

                          <?php
                            include('cnZilizopitwa.php');
                          ?>
                          
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- End control namba hazijalipiwa -->
                  
                  <!-- start control namba zinazosubiri/pending -->
                  <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <div class="row">

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhonePn" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byPhonePn', 'pn')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullnamePn" placeholder="Jina la Mkusanyaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn('byFullnamePn', 'pn')">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            &nbsp;
                          </div>

                          <div class="col-sm-2 text-right">
                            <div class="input-group input-group-sm">
                              <select class="custom-select form-control-border" id="waitingCNSearch" name="waitingCNSearch" style="border-color: red;" onchange="waitingCNSearch(this.value)">
                                <?php
                                  include('../MySections/searchEntries.php');
                                ?>
                              </select>

                              <span class="input-group-append">
                                <span class="btn btn-flat btn-outline-danger" disabled>
                                  rows
                                </span>
                              </span>

                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="pendingSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getPendingControlNumber?pageNumber=1&pageSize=50'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getPendingControlNumberByUser?pageNumber=1&pageSize=50&userid='.$_SESSION['userid']); //receive json from url
                            // $json = file_get_contents($pubIP.'getPendingControlNumber'); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getPendingControlNumberByInstitute?pageNumber=1&pageSize=50&instid='.$_SESSION['instituteid']); //receive json from url
                            // $json = file_get_contents($pubIP.'getPendingControlNumber'); //receive json from url
                          }

                          $arrp = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="pendingTbl" class="table table-bordered table-striped small">

                          <?php
                            include('cnZinazosubiri.php');
                          ?>
                        </table>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- End control namba zinazosubiri/pending -->

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
  include('../controlNojs/controlNojs.php');
  include('controlNoModals.php');
?>

<script type="text/javascript" src="controlNo.js"></script>
<script type="text/javascript" src="malipo.js"></script>
</body>
</html>
