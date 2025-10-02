<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makusanyo ya Mkusanyaji kwa Zoni</title>

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
            <h1>Makusanyo ya Mkusanyaji kwa Zoni</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makusanyo kwa Inspekta</li>
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
                          if ($_SESSION['insttype'] != 'WIZARA') {
                            $json = file_get_contents($pubIP.'selectUsersByInstitute/'.$_SESSION['instituteid']);//receive json from url

                          $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="userid">Mkusanyaji
                              <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="userid" name="userid" required="required" style="border: solid 1px green;">
                                <option value="" hidden>chagua mkusanyaji</option>
                                <?php
                                  foreach ($arr as $key => $value) {
                                    echo '<option value="'.$value['userid'].'">'.$value['username'].'</option>';
                                  }
                                ?>
                            </select>
                          </div>
                        </div>
                        <?php
                          }else{
                            //if wizara
                            $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                            $arr = json_decode($json, true); //covert json data into array format
                            ?>
                            <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="instituteidmk">Taasisi
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="instituteidmk" name="instituteidmk" required="required" style="border: solid 1px green;" onchange="showUsers()">
                                      <option value="">chagua taasisi</option>
                                      <?php
                                        foreach ($arr as $key => $value) {
                                          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group" id="userDivmk">
                                  <label for="userid">Mkusanyaji
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="userid" name="userid" required="required" style="border: solid 1px green;">
                                      <option value="" hidden>chagua mkusanyaji</option>
                                  </select>
                                </div>
                              </div>
                        <?php
                          }
                        ?>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="msnamee">Tarehe ya Mwanzo:</label>
                            <input type="date" name="msnamee" id="msnamee" class="form-control" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="msnamee">Tarehe ya Mwisho:</label>
                            <input type="date" name="msnamee" id="msnamee" class="form-control" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                  // $json = file_get_contents($ipConnect.'/selectInstitutionInfo'); //receive json from url

                  // $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Jina kamili</th>
                    <th>Zoni</th>
                    <th>Kiasi</th>
                    <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>aaa</td>
                      <td>aaa</td>
                      <td>aaa</td>
                      <td>aaa</td>
                      <td>aaa</td>
                    </tr>
                    <?php
                      // $num = 1;
                      // foreach ($arr as $key => $value) {
                        
                      //   echo '<tr>';
                      //     echo '<td>'.$value['instcode'].'</td>';
                      //     echo '<td>'.$value['instname'].'</td>';
                      //     echo '<td>'.$value['insttype'].'</td>';
                      //     echo '<td>'.$value['regname'].'</td>';
                      //     echo '<td>'.$value['inststatus'].'</td>';
                      //     echo '<td class="text-right">';
                      //     echo '<a data-id="'.$value['instituteid'].'" data-conf2="'.$value['instcode'].'" data-conf3="'.$value['instname'].'" data-conf4="'.$value['insttype'].'" data-conf5="'.$value['regname'].'" data-conf6="'.$value['regid'].'" href="#editInstitutionf" class="btn btn-xs btn-success open-editInstitutionf" title="Bonyeza kubadilisha taariza za taasisi"><i class="fas fa-pencil-alt"></i>&nbsp;Badilisha</a>&nbsp;';
                      //     echo'</td>';
                      //   echo '</tr>';

                      //   $num++;
                      // }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Jina kamili</th>
                    <th>Zoni</th>
                    <th>Kiasi</th>
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
?>
<script type="text/javascript" src="makusanyo_samari.js"></script>

</body>
</html>
