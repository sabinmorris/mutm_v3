<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Watumiaji</title>

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
            <h1>Watumiaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
              <li class="breadcrumb-item active">Watumiaji</li>
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
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUsers">
                    <span class="fa fa-plus"></span>&nbsp;Watumiaji
                  </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                  $json = file_get_contents($pubIP.'selectUsers/1'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fullname</th>
                    <th>Phone No</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = 1;
                      foreach ($arr as $key => $value) {
                        
                        echo '<tr>';
                          echo '<td>'.$value['firstname'] . ' ' . $value['middlename']. ' ' .$value['lastname'] .'</td>';
                          echo '<td>'.$value['phonenumber'].'</td>';
                          echo '<td>'.$value['urole'].'</td>';
                          echo '<td>'.$value['username'].'</td>';
                          echo '<td>'.$value['ustatus'].'</td>';
                          echo '<td class="text-right">';
                          echo '<a data-id="'.$value['userid'].'" data-conf2="'.$value['firstname'].'" data-conf3="'.$value['middlename'].'" data-conf4="'.$value['lastname'].'" data-conf5="'.$value['phonenumber'].'" data-conf6="'.$value['urole'].'"  data-conf7="'.$value['username'].'"  data-conf8="'.$value['ustatus'].'"   href="#editUsers" class="btn btn-xs btn-success open-editUsers" title="Bonyeza kubadilisha taariza za mtumiaji"><i class="fas fa-pencil-alt"></i>&nbsp;Badilisha</a>&nbsp;';
                            ?>
                            <a class="btn btn-xs btn-danger" onClick="deleteUsers('<?php echo $value['userid']; ?>')" title="Bonyeza kufuta taasisi"><i class="fas fa-trash"></i>&nbsp;Futa</a>
                            <?php
                          echo'</td>';
                        echo '</tr>';

                        $num++;
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <th>Fullname</th>
                      <th>Phone No</th>
                    <th>Username</th>
                    <th>User Role</th>
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

  <div class="modal fade" id="addUsers">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingiza Mtumiaji Mpya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addUsersForm">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="firstname">Jina La Kwanza:</label>
                  <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Ingiza jina la mwanzo" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="middlename">Jina la kati:</label>
                  <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="lastname">Jina la Mwisho:</label>
                  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phonenumber">Nambari ya Simu:</label>
                  <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="urole">Jukumu:</label>
                  <input type="text" name="urole" id="urole" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-md-6">
                <?php

                  $json = file_get_contents($pubIP.'selectRegions'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                  <div class="form-group">
                      <label for="regid">Mikoa
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="regid" name="regid" required="required" style="border: solid 1px green;">
                          <option value="" hidden>Chagua Mkoa</option>
                          <?php
                            foreach ($arr as $key => $value) {
                              echo '<option value="'.$value['regionid'].'">'.$value['regname'].'</option>';
                            }
                          ?>
                      </select>
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


  <div class="modal fade" id="editInstitutionf">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Badili taarifa za Taasisi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editInstitutionForm">
            <input type="hidden" name="instituteidi" id="instituteidi" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instcodei">Code:</label>
                  <input type="text" name="instcodei" id="instcodei" class="form-control" placeholder="Ingiza Namba ya taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instnamei">Jina la Taasisi:</label>
                  <input type="text" name="instnamei" id="instnamei" class="form-control" placeholder="Ingiza Jina la Taasisi" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="insttypei">Aina ya Taasisi:</label>
                  <select class="form-control" id="insttypei" name="insttypei" required="required" style="border: solid 1px green;">
                      <option id="insttypei2" value="">Chagua aina ya taasisi</option>
                      <option value="LGA">LGA</option>
                      <option value="IDARA MAALUM">IDARA MAALUM</option>
                      <option value="WAKALA">WAKALA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <?php

                  $json = file_get_contents($pubIP.'selectRegions'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                  <div class="form-group">
                      <label for="regidi">Mikoa
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="regidi" name="regidi" required="required" style="border: solid 1px green;">
                          <option id="regidi2" value="">Chagua Mkoa</option>
                          <?php
                            foreach ($arr as $key => $value) {
                              echo '<option value="'.$value['regionid'].'">'.$value['regname'].'</option>';
                            }
                          ?>
                      </select>
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
        var form = document.getElementById('addInstituteForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var instcode = document.getElementById('instcode').value;
          var instname = document.getElementById('instname').value;
          var insttype = document.getElementById('insttype').value;
          var regid = document.getElementById('regid').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"insertInstitute",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "instcode": instcode,
                "instname": instname,
                "insttype": insttype,
                "regid": regid,
                "inststatus": 'active'
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


        //update intitution
        var form = document.getElementById('editInstitutionForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var instituteid = document.getElementById('instituteidi').value;
          var instcode = document.getElementById('instcodei').value;
          var instname = document.getElementById('instnamei').value;
          var insttype = document.getElementById('insttypei').value;
          var regid = document.getElementById('regidi').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"updateInstitute/"+instituteid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "instcode": instcode,
                "instname": instname,
                "insttype": insttype,
                "regid": regid
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


        //call add new Institution modal function
        $(document).on("click", ".open-editInstitutionf", function (e) {

          e.preventDefault();

          var _self = $(this);

          var instituteid = _self.data('id');
          $("#instituteidi").val(instituteid);

          var instcode = _self.data('conf2');
          $("#instcodei").val(instcode);

          var instname = _self.data('conf3');
          $("#instnamei").val(instname);

          var insttype = _self.data('conf4');
          $("#insttypei2").val(insttype);
          document.getElementById('insttypei2').innerHTML = insttype;

          var regname = _self.data('conf5');

          var regid = _self.data('conf6');
          $("#regidi2").val(regid);
          document.getElementById('regidi2').innerHTML = regname;


          $(_self.attr('href')).modal('show');
        });

        //delete institution function
        function deleteInstitution(instituteid) {
          var instituteid = instituteid;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta Taasisi?");

          if(c){
            fetch(pubIP+"/deleteInstitute/"+instituteid,{
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
