<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Akaunti namba zilizosajiliwa</title>

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
            <h1>Akaunti namba zilizosajiliwa</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
              <li class="breadcrumb-item active">Akaunti namba zilizosajiliwa</li>
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
                    &nbsp;
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  if ($_SESSION['insttype'] != 'WIZARA') {

                    $json = file_get_contents($ipConnect.'account/selectAccountByInstitute/'.$_SESSION['instituteid']); //receive json from url
                    
                  }else{
                    $json = file_get_contents($ipConnect.'account/selectAccount'); //receive json from url
                    //include('../Controller/account_controller/selectAccount.php'); //query to select all accounts no
                    //$json = $selectAccount; //receive json from url
                  }

                    $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Taasisi</th>
                    <th>Jina la akaunti</th>
                    <th>Akaunti namba</th>
                    <th>Benki</th>
                    <th>Hali</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        // echo '<tr>';
                        if ($value['accstatus'] == 'inactive') {
                          echo '<tr class="text-danger" style ="text-decoration: line-through;">';
                        }else{
                          echo '<tr>';
                        }
                          echo '<td>'.$num.'</td>';
                          echo '<td>'.$value['instname'].'</td>';
                          echo '<td>'.$value['accname'].'</td>';
                          echo '<td class="text-success">'.$value['accnum'].'</td>';
                          echo '<td>'.$value['bankcode'].'</td>';
                          echo '<td>'.$value['accstatus'].'</td>';
                          
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            if ($value['accstatus'] == 'active') {
                              echo '<td class="text-right">';

                                include('../Controller/account_controller/updateAccount.php'); //query to update account no
                                include('../Controller/account_controller/deleteAccount.php'); //query to delete account no

                                echo '<a data-id="'.$value['accid'].'" data-conf2="'.$value['instname'].'" data-conf3="'.$value['accname'].'" data-conf4="'.$value['accnum'].'" data-conf5="'.$value['bankcode'].'" data-conf6="'.$value['instituteid'].'" data-conf7="'.$updateAccount.'" href="#editAccountNo" class="btn btn-xs btn-success open-editAccountNo" title="Bonyeza kubadili taariza za akaunti namba"><i class="fas fa-pencil-alt"></i>&nbsp;Badili</a>';
                                ?>
                                  <a class="btn btn-xs btn-danger" onClick="deleteAccountNo('<?php echo $deleteAccount; ?>')" title="Bonyeza kufuta"><i class="fas fa-trash"></i>&nbsp;Futa</a>
                                <?php
                                echo'</td>';
                            }else{
                              echo '<td class = "text-right">&nbsp;</td>';
                            }
                            
                          }
                          
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Taasisi</th>
                      <th>Jina la akaunti</th>
                      <th>Akaunti namba</th>
                      <th>Benki</th>
                      <th>Hali</th>
                      <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
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
  include('accountNoModals.php');
?>
<script type="text/javascript" src="accountNo.js"></script>
</body>
</html>
