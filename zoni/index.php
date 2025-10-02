<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Zoni</title>

  <?php
    include('../MySections/HeaderLinks.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
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
            <h1>Zoni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Zoni</li>
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
                  <div class="col-sm-10">
                    <!-- <h3 class="card-title">zoni</h3> -->
                  </div>
                  <div class="col-sm-2 text-right">
                    <?php
                      if ($_SESSION['urole'] == 'Afisa mapato') {
                        ?>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addZone">
                          <span class="fas fa-map-marked-alt"></span>&nbsp;add new
                        </button>
                        <?php
                      }else{
                        echo '&nbsp;';
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Msimamizi mkuu') {
                    $json = file_get_contents($ipConnect.'selectZone'); //receive json from url
                  }else{
                    $json = file_get_contents($ipConnect.'selectZoneByInstitute/'.$_SESSION['instituteid']); //receive json from url
                  }
                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Zoni</th>
                    <th>Taasisi</th>
                    <th>Hali</th>
                    <?php
                      if ($_SESSION['urole'] == 'Afisa mapato') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        if ($value['zonestatus'] == 'inactive') {
                          echo '<tr class="text-danger" style ="text-decoration: line-through;">';
                        }else{
                          echo '<tr>';
                        }
                        
                          echo '<td>'.$num.'</td>';
                          echo '<td class="text-success">'.$value['zonename'].'</td>';
                          echo '<td>'.$value['instname'].'</td>';
                          echo '<td>'.$value['zonestatus'].'</td>';
                          if ($_SESSION['urole'] == 'Afisa mapato') {
                            if ($value['zonestatus'] == 'active') {
                              echo '<td class = "text-right">';
                              echo '<a data-id="'.$value['zoneid'].'" data-conf2="'.$value['instituteid'].'" data-conf3="'.$value['zonename'].'"  href="#editZone" class="btn btn-xs btn-success open-editZone" title="Bonyeza kubadilisha taariza za zoni"><i class="fas fa-pen-alt"></i>&nbsp;Badili</a>&nbsp;';
                                ?>
                                <a class="btn btn-xs btn-danger" onClick="deleteZone('<?php echo $value['zoneid']; ?>', '<?php echo $value['zonename']; ?>')" title="Bonyeza kufuta"><i class="fas fa-trash"></i>&nbsp;Futa</a>
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
                    <th>#</th>
                    <th>Zoni</th>
                    <th>Taasisi</th>
                    <th>Hali</th>
                    <?php
                      if ($_SESSION['urole'] == 'Afisa mapato') {
                        echo '<th>&nbsp;</th>';
                      }
                    ?>
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
  include('zoneModals.php');
?>

<script src="zoneScripts.js"></script>
 
</body>
</html>
