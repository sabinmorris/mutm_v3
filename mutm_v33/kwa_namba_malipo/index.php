<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Makusanyo kwa akaunti namba</title>

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
            <h1>Makusanyo kwa Akaunti namba</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Makusanyo kwa Akaunti Namba</li>
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
                            $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                            $arr = json_decode($json, true); //covert json data into array format
                            ?>
                            <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="instituteidmk">Taasisi
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="instituteidmk" name="instituteidmk" required="required" style="border: solid 1px green;" onchange="showAccounts()">
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
                              <div class="form-group" id="accountDivmk">
                                <label for="accid">Akaunti Namba
                                  <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="accid" name="accid" required="required" style="border: solid 1px green;">
                                    <option value="" hidden>chagua akaunti namba</option>
                                </select>
                              </div>
                            </div>
                            
                        <?php
                          }else{
                            //if not wizara
                            include('../Controller/account_controller/selectAccountByInstitute.php'); //query to select accounts no by institute
                            $json = $selectAccountByInstitute; //receive json from url

                            $arr = json_decode($json, true); //covert json data into array format
                          ?>
                            <input type="hidden" name="instituteidmk" id="instituteidmk" value="<?php echo $_SESSION['instituteid']; ?>">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="accid">Akaunti Namba
                                  <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="accid" name="accid" required="required" style="border: solid 1px green;" onchange="getCollectionByAccount()">
                                    <option value="ZOTE">ZOTE</option>
                                    <?php
                                      foreach ($arr as $key => $value) {
                                        echo '<option value="'.$value['accid'].'">'.$value['accnum'].'-'.$value['accname'].'('.$value['bankcode'].')</option>';
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
                            <input type="date" name="startDate" id="startDate" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByAccount()">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo date('Y-m-d') ?>" onchange="getCollectionByAccount()">
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
                      <th class="text-center">Akaunti Namba</th>
                      <th class="text-center">Mlipaji</th>
                      <th class="text-center">Huduma</th>
                      <th class="text-center">Nam. Ankara</th>
                      <th class="text-center">Kumbukumbu</th>
                      <th class="text-center">T. Malipo</th>
                      <th class="text-center">Risiti</th>
                      <th class="text-center">Malipo</th>
                      <th class="text-center">Hali</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                        include('../Controller/account_controller/selectAccount.php'); //query to select all accounts no
                        $json4 = $selectAccount; //receive json from url
                      }else{
                        include('../Controller/account_controller/selectAccountByInstitute.php'); //query to select accounts no by institute
                        $json4 = $selectAccountByInstitute; //receive json from url
                      }

                      $arr4 = json_decode($json4, true); //covert json data into array format

                      $num = 1;
                      foreach ($arr4 as $key => $value) {
                        $accid = $value['accid'];
                        $accnum = $value['accnum'];
                        $bankcode = $value['bankcode'];
                        $accname = $value['accname'];

                        //find amount by collector
                        $json5 = file_get_contents($pubIP.'getcontrollnumberbyaccountno?accnum='.$accnum); //receive json from url

                        $arr5 = json_decode($json5, true); //covert json data into array format

                        $tamount5 = 0;
                        foreach ($arr5 as $key5 => $value5) {
                        if ($value5['totalamount'] > 0) {
                          $controlnumber = $value5['controlnumber'];
                          $fullname = $value5['fullname'];
                          $phonenumber = $value5['phonenumber'];
                          $cstatus = $value5['cstatus'];
                          $referencenumber = $value5['referencenumber'];
                          $tamount5 = $value5['totalamount'];
                          $requestdate = date('d-m-Y', $value5['requestdate']);
                          $duedate = date('d-m-Y', $value5['duedate']);
                          $paiddate = date('d-m-Y', $value5['paiddate']);
                          $receiptnumber = $value5['receiptnumber'];
                          $firstname = $value5['firstname'];
                          $middlename = $value5['middlename'];
                          $lastname = $value5['lastname'];
                          $username = $value5['username'];
                          $servicename = '';
                          $instname = $value5['instname'];
                          $userid = $value5['userid'];

                        }else{
                          $controlnumber = '';
                          $fullname = '';
                          $phonenumber = '';
                          $cstatus = '';
                          $referencenumber = '';
                          $tamount5 = 0;
                          $requestdate = '';
                          $duedate = '';
                          $paiddate = '';
                          $receiptnumber = '';
                          $firstname = '';
                          $middlename = '';
                          $lastname = '';
                          $username = '';
                          $servicename = '';
                          $instname = '';
                          $userid = '';
                        }
                      }
                        // print_r($arr4);
                      if ($tamount5 > 0) {

                        //find servicename by control no.
                        $jsonS = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
                        $arrS = json_decode($jsonS, true); //covert json data into array format

                        $serviceno = 1;
                        foreach ($arrS as $keyS => $valueS) {

                          if ($serviceno <= 1) {
                            $servicename = $servicename . ' ' .$valueS['servicename'];
                          }else{
                            $servicename = $servicename . ', ' .$valueS['servicename'];
                          }

                        }
                        
                        if ($_SESSION['urole'] == 'Mkusanyaji') {
                          if ($userid == $_SESSION['userid']) {
                            // if mkusanyaji
                            echo '<tr>';
                            echo '<td>'.$num.'</td>';
                            if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                              echo '<td>'.$instname.'</td>';
                            }
                            echo '<td class="text-success">'.$accnum.' - ' .$accname.' ('.$bankcode.')</td>';
                            echo '<td>'.$fullname.'</td>';
                            echo '<td>'.$servicename.'</td>';
                            echo '<td>'.$controlnumber.'</td>';
                            echo '<td>'.$referencenumber.'</td>';
                            echo '<td>'.$paiddate.'</td>';
                            echo '<td>'.$receiptnumber.'</td>';
                            echo '<td>'.number_format($tamount5).'</td>';
                            if ($cstatus == 'CREATED') {
                              echo '<td class="text-primary">';
                            }elseif ($cstatus == 'CANCELED') {
                              echo '<td class="text-danger">';
                            }else{
                              echo '<td class="text-success">';
                            }
                              echo $cstatus;
                            echo '</td>';
                          echo '</tr>';
                          $num++;
                          }
                        }else{
                          // if mkusanyaji
                          echo '<tr>';
                          echo '<td>'.$num.'</td>';
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            echo '<td>'.$instname.'</td>';
                          }
                          
                          echo '<td class="text-success">'.$accnum.' - ' .$accname.' ('.$bankcode.')</td>';
                          echo '<td>'.$fullname.'</td>';
                          echo '<td>'.$servicename.'</td>';
                          echo '<td>'.$controlnumber.'</td>';
                          echo '<td>'.$referencenumber.'</td>';
                          echo '<td>'.$paiddate.'</td>';
                          echo '<td>'.$receiptnumber.'</td>';
                          echo '<td>'.number_format($tamount5).'</td>';
                          if ($cstatus == 'CREATED') {
                            echo '<td class="text-primary">';
                          }elseif ($cstatus == 'CANCELED') {
                            echo '<td class="text-danger">';
                          }else{
                            echo '<td class="text-success">';
                          }
                            echo $cstatus;
                          echo '</td>';
                        echo '</tr>';
                        $num++;
                      }

                    }
                        
                  }
                    
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <?php
                        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                          echo '<th>Taasisi</th>';
                        }
                      ?>
                      <th class="text-center">Akaunti Namba</th>
                      <th class="text-center">Mlipaji</th>
                      <th class="text-center">Huduma</th>
                      <th class="text-center">Nam. Ankara</th>
                      <th class="text-center">Kumbukumbu</th>
                      <th class="text-center">T. Malipo</th>
                      <th class="text-center">Risiti</th>
                      <th class="text-center">Malipo</th>
                      <th class="text-center">Hali</th>
                    </tr>
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

<script type="text/javascript" src="kwa_namba_malipo.js"></script>
</body>
</html>
