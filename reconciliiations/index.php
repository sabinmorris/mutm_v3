<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Reconciliation</title>

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
            <h1>Bills Reconciliation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
              <li class="breadcrumb-item active">Bills Reconciliation</li>
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
                    <form id="">
                      <div class="row">
                        <?php
                          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                            //if wizara
                            $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                            $arr = json_decode($json, true); //covert json data into array format
                            ?>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="instituteidms">Taasisi
                                    <span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control" id="instituteidms" name="instituteidms" required="required" onchange="getReconciliationByDate()" style="border: solid 1px green;">
                                      <option value="">chagua taasisi</option>
                                      <?php
                                        foreach ($arr as $key => $value) {
                                          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                        }

                                      ?>
                                      <option value="ZOTE">ZOTE</option>
                                  </select>
                              </div>
                            </div>
                            
                        <?php
                          }else{
                            //if not wizara
                            ?>
                            <input type="hidden" name="instituteidms" id="instituteidms" value="<?php echo $_SESSION['instituteid']; ?>">
                            <?php
                          }
                        ?>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="startDate">Tarehe ya Mwanzo:</label>
                            <input type="date" name="startDate" id="startDate" class="form-control" placeholder="tarehe ya mwanzo" style="border: solid 1px green;" value="<?php echo date('Y-m-d')?>" onchange="getReconciliationByDate()">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="endDate">Tarehe ya Mwisho:</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" placeholder="Tarehe ya mwisho" style="border: solid 1px green;" value="<?php echo date('Y-m-d')?>" onchange="getReconciliationByDate()">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-sm-2 text-right">
                    <?php
                      if ($_SESSION['urole'] == 'Afisa mapato') {
                        ?>
                        <button type="button" data-toggle="modal" data-target="#requestReconciliation" class="btn btn-sm btn-primary">
                          <span class="fas fa-retweet"></span>&nbsp;Request Reconciliation
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
              <div class="card-body" id="reconc">
                <?php
                	$startDate = date('Y-d-m');
                	$endDate = date('Y-d-m');
                	$instituteidch = $_SESSION['instituteid'];

	                if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Msimamizi mkuu') {
	                    
	                    $json = file_get_contents($pubIP.'getReconcilliation'); //receive json from url

	                }else{

	                    $json = file_get_contents($pubIP.'getreconcilliationByInstitute?edate='.$endDate.'&instid='.$instituteidch.'&sdate='.$startDate); //receive json from url

	                }
	                $arr = json_decode($json, true); //covert json data into array format
	            ?>
	            <h5 class="text-primary">
	            	Reconciliation from 
	            	<span class="text-danger">
	            		<?php echo $startDate; ?>
	            	</span>
	            	to 
	            	<span class="text-danger">
		            	<?php echo $endDate; ?>
		            </span>
	            </h5>
                <table id="example1" class="table table-bordered table-striped small">
                  <?php
                    include('reconciliationList.php');
                  ?>
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
  include('reconcModals.php');
?>

<script src="reconcScripts.js"></script>
 
</body>
</html>
