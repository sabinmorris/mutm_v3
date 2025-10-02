<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Vyanzo Vikuu</title>

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
            <h1>Vyanzo Vikuu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
              <li class="breadcrumb-item active">Vyanzo Vikuu</li>
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
                    <!-- <h3 class="card-title">Vyanzo Vikuu</h3> -->
                    &nbsp;
                  </div>
                  <div class="col-sm-2 text-right">
                    <!-- <button type="button" class="btn btn-sm btn-success swalDefaultSuccess">
                      Launch Success Toast
                    </button> -->
                &nbsp;
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMainSource">
                    <span class="fa fa-plus"></span>&nbsp;Chanzo Kikuu Kipya
                  </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                  $json = file_get_contents($pubIP.'selectMainsourceByInstitute/1'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Chanzo Kikuu</th>
                    <th>Hali</th>
                    <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        echo '<tr>';
                          echo '<td>'.$num.'</td>';
                          echo '<td>'.$value['msname'].'</td>';
                          echo '<td>'.$value['msstatus'].'</td>';
                          echo '<td class="text-right">';
                          echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['msname'].'" href="#addMiddleSource" class="btn btn-xs btn-primary open-addMiddleSource" title="Bonyeza kuongeza chanzo cha kati"><i class="fas fa-plus-circle"></i>&nbsp;Chanzo cha Kati</a>&nbsp;';
                          echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['instituteid'].'" data-conf3="'.$value['msname'].'"  href="#editMainSource" class="btn btn-xs btn-success open-editMainSource" title="Bonyeza kubadilisha taariza za chanzo kikuu"><i class="fas fa-pencil-alt"></i>&nbsp;Badilisha</a>&nbsp;';
                            ?>
                            <a class="btn btn-xs btn-danger" onClick="deleteMainSource('<?php echo $value['msid']; ?>')" title="Bonyeza kufuta chanzo kikuu"><i class="fas fa-trash"></i>&nbsp;Futa</a>
                            <?php
                          echo'</td>';
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Chanzo Kikuu</th>
                    <th>Status</th>
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

  <div class="modal fade" id="addMainSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingiza chanzo kikuu kipya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addMainSourceForm">
            <input type="hidden" name="instituteid" id="instituteid" class="form-control" value="1">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msname">Chanzo Kikuu:</label>
                  <input type="text" name="msname" id="msname" class="form-control" placeholder="Ingiza chanzo kikuu">
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


  <div class="modal fade" id="editMainSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Badili taarifa za Chanzo Kikuu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editMainSourceForm">
            <input type="hidden" name="mside" id="mside" class="form-control">
            <input type="hidden" name="instituteide" id="instituteide" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamee">Chanzo Kikuu:</label>
                  <input type="text" name="msnamee" id="msnamee" class="form-control" placeholder="Ingiza Chanzo Kikuu">
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


  <div class="modal fade" id="addMiddleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ongeza Chanzo cha Kati</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addMiddleSourceForm">
            <input type="hidden" name="msidm" id="msidm" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamem">Chanzo Kikuu:</label>
                  <input type="text" name="msnamem" id="msnamem" class="form-control" placeholder="Ingiza Chanzo Kikuu" readonly="readonly" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php

                  $json = file_get_contents($pubIP.'selectZoneByInstitute/1'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                  <div class="form-group">
                      <label for="zoneid">Zoni
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="zoneid" name="zoneid" required="required" style="border: solid 1px green;">
                          <option value="">chagua zoni</option>
                          <?php
                            foreach ($arr as $key => $value) {
                              echo '<option value="'.$value['zoneid'].'">'.$value['zonename'].'</option>';
                            }
                          ?>
                      </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="mdsname">Chanzo cha Kati:</label>
                  <input type="text" name="mdsname" id="mdsname" class="form-control" placeholder="Ingiza Chanzo cha Kati" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

            <button class="btn btn-primary">
              <span class="fas fa-plus-circle">&nbsp;Ongeza</span>
            </button>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Futa</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


      <script>
        var form = document.getElementById('addMainSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var instituteid = document.getElementById('instituteid').value;
          var msname = document.getElementById('msname').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"insertMainsource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "msname": msname,
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
        var form = document.getElementById('editMainSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('mside').value;
          var instituteid = document.getElementById('instituteide').value;
          var msname = document.getElementById('msnamee').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"updateMainsource/"+msid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "instituteid": instituteid,
                "msname": msname
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


        //call add new Main Sourse modal function
        $(document).on("click", ".open-editMainSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#mside").val(msid);

          var instituteid = _self.data('conf2');
          $("#instituteide").val(instituteid);

          var msname = _self.data('conf3');
          $("#msnamee").val(msname);


          $(_self.attr('href')).modal('show');
        });

        //delete MainSource function
        function deleteMainSource(msid) {
          var msid = msid;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta Chanzo Kikuu?");

          if(c){
            fetch(pubIP+"deleteMainsource/"+msid,{
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


        //call add new Middle Sourse modal function
        $(document).on("click", ".open-addMiddleSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#msidm").val(msid);

          var msname = _self.data('conf2');
          $("#msnamem").val(msname);


          $(_self.attr('href')).modal('show');
        });

        //add middle source
        var form = document.getElementById('addMiddleSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('msidm').value;
          var mdsname = document.getElementById('mdsname').value;
          var zoneid = document.getElementById('zoneid').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"insertMiddlesource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "mdsname": mdsname,
                "msid": msid,
                "zoneid": zoneid
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

</script> 
</body>
</html>
