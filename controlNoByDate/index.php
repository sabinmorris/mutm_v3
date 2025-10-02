<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Ankara namba kwa tarehe</title>

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
                                    <select class="form-control" id="instituteidkz" name="instituteidkz" required="required" style="border: solid 1px green;" onchange="getCollectionByCn()">
                                        <option value="" hidden>chagua taasisi</option>
                                        <?php
                                          foreach ($arr as $key => $value) {
                                            echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                          }
                                        ?>
                                        <!-- <option value="ZOTE">ZOTE</option> -->
                                    </select>
                                </div>
                              </div>
                              <?php
                            }else{
                              //if not wizara
                              ?>
                              <input type="hidden" name="instituteidkz" id="instituteidkz" class="form-control" value="<?php echo $_SESSION['instituteid']; ?>">
                              <?php
                            }
                          ?>
                          
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="startDate">Tarehe ya Mwanzo:</label>
                            <input type="date" name="startDate" id="startDate" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByCn()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByCn()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="pageSize">Idadi ya Rikodi:</label>
                            <input type="number" name="pageSize" id="pageSize" class="form-control" placeholder="Idadi ya Rikodi" style="border: solid 1px green;" min="10" value="50" onchange="getCollectionByCn()">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="uu">
                <table id="cnByDate" class="table table-bordered table-striped small">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Ankara Nam.</th>
                      <th class="text-center">Mlipaji</th>
                      <th class="text-center">Simu</th>
                      <th class="text-center">T. Kuomba</th>
                      <th class="text-center">T. Kumaliza</th>
                      <th class="text-center">TrxCode</th>
                      <th class="text-center">Kumbukumbu</th>
                      <th class="text-center">Malipo</th>
                      <th class="text-center">Mkusanyaji</th>
                      <th class="text-center">Hali</th>
                      <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
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
  include('controlNoModals.php');
?>
<script type="text/javascript" src="cnByDate.js"></script>
</body>
</html>
