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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Zoni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
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
                    <h3 class="card-title">zoni</h3>
                  </div>
                  <div class="col-sm-2 text-right">
                    <!-- <button type="button" class="btn btn-sm btn-success swalDefaultSuccess">
                      Launch Success Toast
                    </button> -->
                &nbsp;
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addZone">
                    <span class="fa fa-plus"></span>&nbsp;add new
                  </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                  $json = file_get_contents($pubIP.'selectZoneByInstitute/1'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Zoni</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        echo '<tr>';
                          echo '<td>'.$num.'</td>';
                          echo '<td>'.$value['zonename'].'</td>';
                          echo '<td>'.$value['zonestatus'].'</td>';
                          echo '<td>';
                          echo '<a data-id="'.$value['zoneid'].'" data-conf2="'.$value['instituteid'].'" data-conf3="'.$value['zonename'].'"  href="#editZone" class="btn btn-xs btn-success open-editZone" title="Bonyeza kubadilisha taariza za zoni"><i class="fas fa-pencil-alt"></i>&nbsp;Badilisha</a>';
                          echo'</td>';
                          echo '<td>';
                            ?>
                            <a class="btn btn-xs btn-danger" onClick="deleteZone('<?php echo $value['zoneid']; ?>')" title="Bonyeza kufuta"><i class="fas fa-trash"></i>&nbsp;Futa</a>
                            <?php
                          echo'</td>';
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Zoni</th>
                    <th>Status</th>
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

  <div class="modal fade" id="addZone">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingiza zoni mpya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addZoneForm">
            <input type="hidden" name="instituteid" id="instituteid" class="form-control" value="1">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="zonename">Zoni:</label>
                  <input type="text" name="zonename" id="zonename" class="form-control" placeholder="Ingiza zoni">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

            <button class="btn btn-primary">
              <span class="far far-save"></span>&nbsp;
              Hifadhi
            </button>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Funga</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade" id="editZone">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Badili taarifa za zoni</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editZoneForm">
            <input type="hidden" name="zoneide" id="zoneide" class="form-control">
            <input type="hidden" name="instituteide" id="instituteide" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="zonenamee">Zoni:</label>
                  <input type="text" name="zonenamee" id="zonenamee" class="form-control" placeholder="Ingiza zoni">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

            <button class="btn btn-primary">Badili</button>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


      <script>
        var form = document.getElementById('addZoneForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var instituteid = document.getElementById('instituteid').value;
          var zonename = document.getElementById('zonename').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"insetZone",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "zonename": zonename,
                "instituteid": instituteid
            }),
            headers:{
              "Content-Type":"application/json;charset= UTF-8"
            }
          }).then(function(response){
            return response.json();
          }).then(function(data){
            console.log(data); //for testing only
          })


        })


        //update zone
        var form = document.getElementById('editZoneForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var zoneid = document.getElementById('zoneide').value;
          var instituteid = document.getElementById('instituteide').value;
          var zonename = document.getElementById('zonenamee').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"updateZone/"+zoneid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "instituteid": instituteid,
                "zonename": zonename
            }),
            headers:{
              "Content-Type":"application/json;charset= UTF-8"
            }
          }).then(function(response){
            return response.json();
          }).then(function(data){
            console.log(data); //for testing only
          })

        })


        //call add new zone modal function
        $(document).on("click", ".open-editZone", function (e) {

          e.preventDefault();

          var _self = $(this);

          var zoneid = _self.data('id');
          $("#zoneide").val(zoneid);

          var instituteid = _self.data('conf2');
          $("#instituteide").val(instituteid);

          var zonename = _self.data('conf3');
          $("#zonenamee").val(zonename);


          $(_self.attr('href')).modal('show');
        });

        //delete zone function
        function deleteZone(zoneid) {
          var zoneid = zoneid;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta zoni?");

          if(c){
            fetch(pubIP+"deleteZone/"+zoneid,{
              method:'PUT',
              body:JSON.stringify({
              "status": 'inactive'
              }),
              headers:{
              "Content-Type":"application/json;charset= UTF-8"
              }
              }).then(function(response){
              return response.json();
              }).then(function(data){
              console.log(data);
              })

          }else{
            //if not comfirm
          }
        }

</script> 
</body>
</html>
