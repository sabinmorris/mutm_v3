<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Leseni</title>

  <?php

  include('../MySections/HeaderLinks.php');
  if ($_SESSION['urole'] != 'Mwenyekiti bodi' && $_SESSION['urole'] != 'Afisa mapato') {
    // header('Location: ../?msg=sessionErr');
    // exit;
    session_destroy();
    header('Location: ../login/');
    exit;
  }
  ?>
</head>
<!-- (oncontextmenu="return false")for stoping inspect element -->

<body class="hold-transition sidebar-mini">
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
              <h1>Leseni za Biashara</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
                <li class="breadcrumb-item active">Leseni</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <?php
                  if ($_SESSION['urole'] == 'Afisa mapato') {
                    // if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Afisa mapato' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                  ?>
                    <div class="row">
                      <div class="col-sm-12 text-right">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                            ?>
                            <a class="btn btn-primary" target="_blank" href="printLicense-edit.php">Print license</a>
                            <?php
                          }
                        ?>
                        <a href="../invoice/" class="btn btn-sm btn-success" title="View invoice">
                          <span class="fa fa-eye"></span>&nbsp;Invoice
                        </a>
                        &nbsp;
                        <!-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addlicense">
                          <span class="fa fa-plus"></span>&nbsp;Leseni ya Biashara
                        </button> -->
                      </div>
                    </div>
                  <?php
                  }
                  ?>

                </div>
                <!-- /.card-header -->
                <div class="card-body" id="listTable">
                  <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">

                    <li class="nav-item">
                      <a class="nav-link text-warning active" id="custom-content-above-home-tab" data-toggle="pill" href="#hazijahakikiwa" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Hazijahakikiwa</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-success" id="custom-content-above-profile-tab" data-toggle="pill" href="#zilizohakikiwa" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Zilizohakikiwa</a>
                    </li>
                    
                  </ul>
                  
                  <div class="tab-content" id="custom-content-above-tabContent">
                    <!-- start license hazijahakikiwa -->
                    <div class="tab-pane fade show active" id="hazijahakikiwa" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    
                    <div class="card-body table-responsive p-0" id="notPaidSearchDiv">
                        <?php

                        $json = file_get_contents($pubIP1 . 'mutm/api/getLicenseByStatus/false?pageNum=1&pageSize=200');
                        $arr = json_decode($json, true); //covert json data into array format

                        include('licenseList.php');
                        ?>

                      </div>
                    </div>
                    <!-- End License hazijahakikiwa -->

                    <!-- start license zilizohakikiwa -->
                    <div class="tab-pane fade" id="zilizohakikiwa" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                      <div class="card-body table-responsive p-0" id="zilizohakikiwaDiv">
                        <?php

                        $json = file_get_contents($pubIP1 . 'mutm/api/getLicenseByStatus/true?pageNum=1&pageSize=300');
                        $arr = json_decode($json, true); //covert json data into array format

                        include('approvedLicense.php');
                        ?>

                      </div>
                    </div>
                    <!-- End License zilizohakikiwa -->
                  </div>
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
  include('licenseModals.php');

  ?>
  <script type="text/javascript" src="licenseScripts.js"></script>
</body>

</html>