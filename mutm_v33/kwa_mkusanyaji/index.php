<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makusanyo kwa Wakusanyaji</title>

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
            <h1>Makusanyo kwa Wakusanyaji</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makusanyo kwa Wakusanyaji</li>
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
                            <input type="hidden" name="instituteidmk" id="instituteidmk" class="form-control" value="<?php echo $_SESSION['instituteid']; ?>">
                            <div class="col-sm-3">
                              <div class="form-group" id="userDivmk">
                                <label for="userid">Mkusanyaji
                                  <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="useridn" name="useridn" required="required" style="border: solid 1px green;">
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

                              // http://102.223.7.135:8881/selectUsersByInstitute/1625557050398?email=whiteali90%40gmail.com&token=%242a%2410%24if%2FlkEPWX.vnEZu3QxQf7eYYacqXm.8UZbG3JDZ8Gf6s1F.afI6Jq
                            }
                            

                            $arr = json_decode($json, true); //covert json data into array format
                          ?>
                          <input type="hidden" name="instituteidmk" id="instituteidmk" value="<?php echo $_SESSION['instituteid']; ?>">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="userid">Mkusanyaji
                                <span class="text-danger">*</span>
                              </label>
                              <select class="form-control select2" id="useridn" name="useridn" required="required" style="border: solid 1px green;" onchange="getCollectionByCollector()">
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
                            <input type="date" name="startDaten" id="startDaten" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByCollector()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDaten" id="endDaten" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByCollector()">
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
                      <th>Jina kamili</th>
                      <th>Zoni</th>
                      <th>Chanzo</th>
                      <th>Hali ya chanzo</th>
                      <th>Mlipaji</th>
                      <th>Kiasi</th>
                      <th>Risiti</th>
                      <th>Tarehe</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($_SESSION['urole'] == 'Mkusanyaji') {
                        $json4 = file_get_contents($pubIP.'getPosCollectionByUser/'.$_SESSION['userid']); //receive json from url
                      }elseif($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu'){
                        $json4 = file_get_contents($pubIP.'getAllPosCollection/'); //receive json from url
                      }else{
                        $json4 = file_get_contents($pubIP.'getPosCollectionByInstitute/'.$_SESSION['instituteid']); //receive json from url
                      }

                      $arr4 = json_decode($json4, true); //covert json data into array format

                      $num = 1;
                      $totalcollection = 0;
                      $tamount = 0;
                      foreach ($arr4 as $key => $value4) {
                          if ($value4['amount'] > 0) {
                            $checkdatetime = $value4['checkdatetime'];
                            $csid = $value4['csid'];
                            $firstname = $value4['firstname'];
                            $middlename = $value4['middlename'];
                            $lastname = $value4['lastname'];
                            $ltsname = $value4['ltsname'];
                            $msname = $value4['msname'];
                            $payer = $value4['payer'];
                            $quantity = $value4['quantity'];
                            $receiptno = $value4['receiptno'];
                            $zonename = $value4['zonename'];
                            $tamount = $value4['amount'];
                          }else{
                            $checkdatetime = '';
                            $csid = '';
                            $firstname = '';
                            $middlename = '';
                            $lastname = '';
                            $ltsname = '';
                            $msname = '';
                            $payer = '';
                            $quantity = '';
                            $receiptno = '';
                            $zonename = '';
                            $tamount = 0;
                          }

                          echo '<tr>';
                            echo '<td>'.$num.'</td>';
                            echo '<td>'.$firstname.' ' .$middlename.' '.$lastname.'</td>';
                            echo '<td>'.$zonename.'</td>';
                            echo '<td>'.$msname.'</td>';
                            echo '<td>'.$ltsname.'</td>';
                            echo '<td>'.$payer.'</td>';
                            echo '<td class="text-success">'.number_format($tamount).'.00</td>';
                            echo '<td>'.$receiptno.'</td>';
                            echo '<td>'.$checkdatetime.'</td>';
                          echo '</tr>';
                          $num++;
                          $totalcollection = $totalcollection + $tamount;
                        
                    }
                    
                    ?>
                  </tbody>
                  <tfoot>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Jumla</th>
                    <th><?php echo number_format($totalcollection). '.00'; ?></th>
                    <th>&nbsp;</th>
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

<script type="text/javascript" src="kwa_mkusanyaji.js"></script>
</body>
</html>
