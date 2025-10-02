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
            <h1>Namba za Ankara zote / All Control Numbers</h1>
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
              <li class="breadcrumb-item active">Namba za Ankara zote</li>
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
                    <a class="nav-link active text-default" id="custom-content-above-home-tab" data-toggle="pill" href="#zote" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Ankara Namba Zote</a>
                  </li>
                </ul>

                <div class="tab-content" id="custom-content-above-tabContent">

                  <div class="tab-pane fade show active" id="zote" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                     <div class="card">
                      <div class="card-header border-0">
                        <!-- <h3 class="card-title text-primary font-weight-bolder">
                          Ankara Namba Zote
                        </h3> -->
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByCn" placeholder="Ankara Namba">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn()">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByReceipt" placeholder="Risiti ya Malipo">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn()">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByPhone" placeholder="Namba ya Simu">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn()">
                                  <span class="fas fa-search"></span>
                                </button>
                              </span>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-border" id="searchByFullname" placeholder="Jina la mlipaji">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-default btn-flat" onclick="searchCn()">
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
                              <select class="custom-select form-control-border" id="allCNSearch" name="allCNSearch" style="border-color: red;" onchange="allCNSearch(this.value)">
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
                        <hr/>
                      </div>
                      <div class="card-body table-responsive p-0" id="allCNSearchDiv">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            $json = file_get_contents($pubIP.'getAllControllNumber?PageNumber=1&PageSize=50'); //receive json from url
                          }elseif($_SESSION['urole'] == 'Mkusanyaji'){
                            $json = file_get_contents($pubIP.'getControllNumberByUser?userid='.$_SESSION['userid']); //receive json from url
                          }else{
                            $json = file_get_contents($pubIP.'getControllNumberByInstitute?instid='.$_SESSION['instituteid']); //receive json from url
                          }

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <table id="cnAll" class="table table-bordered table-striped small">
                          <?php
                            include('cnList.php');
                          ?>
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
  include('controlNoModals.php');
?>

<script type="text/javascript" src="controlNo.js"></script>
</body>
</html>
