<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Vyanzo Vya Kati</title>

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
            <h1>Vyanzo vya Kati</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Vyanzo vya Kati</li>
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
                    <form id="">
                      <div class="row">
                        
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            //if wizara
                            $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                            $arr = json_decode($json, true); //covert json data into array format
                            ?>

                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="instituteidmd">Taasisi
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="instituteidmd" name="instituteidmd" required="required" style="border: solid 1px green;" onchange="showMainsource()">
                                      <option value="" hidden>chagua taasisi</option>
                                      <?php
                                        foreach ($arr as $key => $value) {
                                          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                        }
                                      ?>
                                      <option value="z">ZOTE</option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="form-group" id="mainsourceDivmd">
                                <label for="msid">Vyanzo Vikuu
                                  <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="msid" name="msid" required="required" style="border: solid 1px green;">
                                  <option value="" hidden>chagua Chanzo kikuu</option>
                                </select>
                              </div>
                            </div>
                            
                            <?php
                          }else{

                            $json = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                            $arr = json_decode($json, true); //covert json data into array format

                            ?>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="msid">Vyanzo Vikuu
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="msid" name="msid" required="required" style="border: solid 1px green;" onchange="showChanzoKidogo()">
                                      <option id="zoneidd2" value="" hidden>chagua Chanzo kikuu</option>
                                      <?php
                                        foreach ($arr as $key => $value) {
                                          echo '<option value="'.$value['msid'].'">'.$value['msname'].'</option>';
                                        }
                                      ?>
                                      <option value="z">VYOTE</option>
                                  </select>

                              </div>
                            </div>

                            <?php

                          }
 
                          ?> 
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="tblFilter">
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                    $json = file_get_contents($pubIP.'selectAllMiddlesource/'); //receive json from url
                  }else{
                    $json = file_get_contents($pubIP.'selectMiddlesourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                  }

                  $arr = json_decode($json, true); //covert json data into array format

                  include('haliKatiList.php');
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
   include('vyanzoKatiModals.php');
?>
<script type="text/javascript" src="vyanzoKatiScripts.js"></script>>



</body>
</html>
