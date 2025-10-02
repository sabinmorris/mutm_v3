<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Ukaguzi</title>

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
            <h1>Fomu ya Ukaguzi</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Ukaguzi</li>
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
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="msnamee">Tarehe ya Mwanzo:</label>
                            <input type="date" name="msnamee" id="msnamee" class="form-control" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;">
                          </div>
                        </div>
                        <div class="col-sm-6">
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
                  if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                    $json = file_get_contents($pubIP.'selectLogs?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']); //receive json from url
                  }else{
                      $json = file_get_contents($pubIP.'selectlogsbyinstitutes/'.$_SESSION['instituteid'].'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']); //receive json from url
                  }
                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped small">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Muda</th>
                    <th>Mtumiaji</th>
                    <th>Taasisi</th>
                    <th>Kitendo</th>
                    <th>Kifaa</th>
                    <th>Eneo</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        echo '<tr>';
                          echo '<td>'. $num . '</td>';
                          echo '<td>'.$value['date_time'].'</td>';
                          echo '<td>'.$value['username'].'</td>';
                          echo '<td>'.$value['instname'].'</td>';
                          echo '<td class="text-success">'.$value['eventts'].'</td>';
                          echo '<td>'.$value['device'].'</td>';
                          echo '<td>'.$value['locations'].'</td>';
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Muda</th>
                    <th>Mtumiaji</th>
                    <th>Taasisi</th>
                    <th>Kitendo</th>
                    <th>Kifaa</th>
                    <th>Eneo</th>
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

</body>
</html>
