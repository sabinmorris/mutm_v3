<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makusanyo kwa namba ya ankara</title>

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
            <h1>Makusanyo kwa Wakusanyaji kupitia namba za ankara</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makusanyo kwa Wakusanyaji - Ankara Namba</li>
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
                            <!-- <input type="text" name="instituteidmk" id="instituteidmk" class="form-control" value="<?php echo $_SESSION['instituteid']; ?>"> -->
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
                          }else{
                            if ($_SESSION['urole'] == 'Mkusanyaji') {
                              $json = file_get_contents($pubIP.'selectUsersById/'.$_SESSION['userid'].'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']);//receive json from url
                            }else{
                              $json = file_get_contents($pubIP.'selectUsersByInstitute/'.$_SESSION['instituteid'].'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']);//receive json from url
                            }
                            

                            $arr = json_decode($json, true); //covert json data into array format
                          ?>
                          <input type="hidden" name="instituteidmk" id="instituteidmk" value="<?php echo $_SESSION['instituteid']; ?>">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="userid">Mkusanyaji
                                <span class="text-danger">*</span>
                              </label>
                              <select class="form-control select2" id="userid" name="userid" required="required" style="border: solid 1px green;" onchange="getCollectionByCollector()">
                                <option value="">Chagua Mkusanyaji</option>
                                <?php
                                  foreach ($arr as $key => $value) {
                                    if ($value['urole'] == 'Mkusanyaji' || $value['urole'] == 'Afisa mapato') {
                                      echo '<option value="'.$value['userid'].'">'.$value['firstname'].' '.$value['middlename'].' '. $value['lastname'].' - '.$value['username'].'</option>';
                                    }
                                    
                                  }

                                  if ($_SESSION['urole'] != 'Mkusanyaji') {
                                    echo '<option value="WOTE">WOTE</option>';
                                  }
                                ?>
                                
                              </select>
                            </div>
                          </div>
                        <?php
                          }
                        ?>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="startDate">Tarehe ya Mwanzo:</label>
                            <input type="date" name="startDate" id="startDate" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" onchange="getCollectionByCollector()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" onchange="getCollectionByCollector()">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="uuu">
                <?php

                  // $json = file_get_contents($ipConnect.'/selectInstitutionInfo'); //receive json from url

                  // $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center">Mkusanyaji2</th>
                      <th class="text-center">Mlipaji</th>
                      <th class="text-center">Ankara Nam.</th>
                      <th class="text-center">T. Kuomba</th>
                      <th class="text-center">T. Kumaliza</th>
                      <th class="text-center">T. Malipo</th>
                      <th class="text-center">Kumbukumbu</th>
                      <th class="text-center">Risiti</th>
                      <th class="text-center">Malipo</th>
                      <th class="text-center">Hali</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($_SESSION['urole'] == 'Mkusanyaji') {
                        $json5 = file_get_contents($pubIP.'getControllNumberByUser?userid='.$_SESSION['userid']); //receive json from url
                      }elseif($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu'){
                        $json5 = file_get_contents($pubIP.'getAllControllNumber/'); //receive json from url
                      }else{
                        // $json5 = file_get_contents($ipConnect.'/getControllNumberByInstitute?instid'.$_SESSION['instituteid']); //receive json from url
                        $json5 = file_get_contents($pubIP.'getControllNumberByInstitute?instid='.$_SESSION['instituteid']);
                      }

                      $arr5 = json_decode($json5, true); //covert json data into array format

                      $num = 1;
                      foreach ($arr5 as $key5 => $value5) {
                        $controlnumber = $value5['controlnumber'];
                        $fullname = $value5['fullname'];
                        $phonenumber = $value5['phonenumber'];
                        $cstatus = $value5['cstatus'];
                        $referencenumber = $value5['referencenumber'];
                        $tamount5 = number_format($value5['totalamount']);
                        $requestdate = $value5['requestdate'];
                        $duedate = $value5['duedate'];
                        $paiddate = $value5['paiddate'];
                        $receiptnumber = $value5['receiptnumber'];
                        $firstname = $value5['firstname'];
                        $middlename = $value5['middlename'];
                        $lastname = $value5['lastname'];
                        $username = $value5['username'];
                        $servicename = $value5['servicename'];
                        $instname = $value5['instname'];
                        $username = $value5['username'];

                        if($controlnumber != null){
                          echo '<tr>';
                            echo '<td>'.$num.'</td>';
                            echo '<td>'.$firstname.' ' .$middlename.' '.$lastname.'</td>';
                            echo '<td>'.$fullname.'</td>';
                            echo '<td class="text-success">'.$controlnumber.'</td>';
                            echo '<td>'.$requestdate.'</td>';
                            echo '<td>'.$duedate.'</td>';
                            echo '<td>'.$paiddate.'</td>';
                            echo '<td>'.$referencenumber.'</td>';
                            
                            echo '<td>'.$receiptnumber.'</td>';
                            echo '<td class="text-success">'.$tamount5.'.00</td>';
                            if ($cstatus == 'CREATED') {
                              echo '<td class="text-primary">';
                            }elseif ($cstatus == 'CANCELED') {
                              echo '<td class="text-danger">';
                            }else{
                              echo '<td class="text-success">';
                            }
                              echo $cstatus;
                            echo '</td>';
                            echo '<td class = "text-right">';
                              if ($cstatus == 'CREATED') {
                                      ?>
                                <div class="btn-group">

                                  <?php
                                     echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';
                
                                     echo '<a href="../controlNo/previewReceipts.php?controlnumber='.$controlnumber.'&refn='.$referencenumber.'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Risiti</a>';

                                    if($_SESSION['urole'] == 'Afisa mapato'){
                                      echo '<a data-id="'.$controlnumber.'" data-conf2="'.$requestdate.'" data-conf3="'.$referencenumber.'" data-conf4="'.$_SESSION['instcode'].'" href="#cancelCn" class="btn btn-warning btn-xs open-cancelCn" title="Bonyeza kuhairisha namba ya ankara"><i class="fas fa-window-close"></i>Hairi</a>';
                                    }

                                    }elseif($cstatus == 'PAID'){
                                      echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';

                                      echo '<a href="../controlNo/previewReceipts.php?controlnumber='.$controlnumber.'&refn='.$referencenumber.'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Risiti</a>';
                                    }else {
                                      echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';
                                    }
                                  ?>
                                </div>
                              <?php
                            echo '</td>';
                          echo '</tr>';
                          $num++;
                        }
                          
                    }
                    
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th class="text-center">Mkusanyaji</th>
                    <th class="text-center">Mlipaji</th>
                    <th class="text-center">Ankara Nam.</th>
                    <th class="text-center">T. Kuomba</th>
                    <th class="text-center">T. Kumaliza</th>
                    <th class="text-center">T. Malipo</th>
                    <th class="text-center">Kumbukumbu</th>
                    <th class="text-center">Risiti</th>
                    <th class="text-center">Malipo</th>
                    <th class="text-center">Hali</th>
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
  include('controlNoModals.php');
?>

<script type="text/javascript" src="kwa_mkusanyaji_cn.js"></script>
<!-- <script type="text/javascript" src="../controlNo/controlNo.js"></script> -->
</body>
</html>
