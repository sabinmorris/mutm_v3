<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | POS zilizosajiliwa</title>

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
            <h1>POS zilizosajiliwa</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">POS zilizosajiliwa</li>
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
                  <div class="col-sm-12">&nbsp;
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                    $json = file_get_contents($pubIP.'selectPos'); //receive json from url
                  }else{
                    $json = file_get_contents($pubIP.'selectPOSbyInstCode/'.$_SESSION['instcode']); //receive json from url
                  }

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Taasisi</th>
                    <th>Imei Namba</th>
                    <?php
                      if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                        echo '<th>Install_Code</th>';
                      }
                    ?>
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
                        if ($value['pstatus'] == 'inactive') {
                          echo '<tr class="text-danger">';
                        }else{
                          echo '<tr>';
                        }
                          echo '<td>'.$num.'</td>';
                          echo '<td>'.$value['instname'].'</td>';
                          echo '<td class="text-success">'.$value['imeinumber'].'</td>';
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                          echo '<td>'.$value['installcode'].'</td>';
                          }
                          echo '<td>'.$value['pstatus'].'</td>';
                          
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            if ($value['pstatus'] == 'active') {
                              echo '<td class="text-right">';
                                echo '<a data-id="'.$value['posid'].'" data-conf2="'.$value['instname'].'" data-conf3="'.$value['instituteid'].'" data-conf4="'.$value['imeinumber'].'" href="#editPOS" class="btn btn-xs btn-success open-editPOS" title="Bonyeza kubadili taariza za POS"><i class="fas fa-pencil-alt"></i>&nbsp;Badili</a>';
                                ?>
                                  <a class="btn btn-xs btn-danger" onClick="deletePOS('<?php echo $value['posid']; ?>','<?php echo $value['imeinumber']; ?>','<?php echo $value['instname']; ?>')" title="Bonyeza kufuta POS"><i class="fas fa-trash"></i>&nbsp;Futa</a>
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
                      <th>Imei Namba</th>
                      <?php
                        if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                          echo '<th>Install_Code</th>';
                        }
                      ?>
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
  include('posModals.php');
?>
<script type="text/javascript" src="pos.js"></script>
</body>
</html>
