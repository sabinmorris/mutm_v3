<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Vyanzo Vya Kati</title>

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
            <h1>Vyanzo vya Kati</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
              <li class="breadcrumb-item active">Vyanzo vya Kati</li>
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
                    <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMainSource">
                    <span class="fa fa-plus"></span>&nbsp;Chanzo cha Kati Kipya
                  </button> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                  $json = file_get_contents($pubIP.'selectMiddlesourceByInstitute/1'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Chanzo cha Kati</th>
                    <th>Chanzo Kikuu</th>
                    <th>Zoni</th>
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
                          echo '<td class="text-success">'.$value['mdsname'].'</td>';
                          echo '<td>'.$value['msname'].'</td>';
                          echo '<td>'.$value['zonename'].'</td>';
                          echo '<td>'.$value['mdsstatus'].'</td>';
                          echo '<td class="text-right">';
                          echo '<a data-id="'.$value['mdsid'].'" data-conf2="'.$value['mdsname'].'" data-conf3="'.$value['zonename'].'" href="#addLittleSource" class="btn btn-xs btn-primary open-addLittleSource" title="Bonyeza kuongeza chanzo kidogo"><i class="fas fa-plus-circle"></i>&nbsp;Chanzo Kidogo</a>&nbsp;';
                          echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['mdsname'].'" data-conf3="'.$value['msname'].'" data-conf4="'.$value['zoneid'].'" data-conf5="'.$value['zonename'].'" data-conf6="'.$value['mdsid'].'" href="#editMiddleSource" class="btn btn-xs btn-success open-editMiddleSource" title="Bonyeza kubadilisha taariza za chanzo cha kati">
                            <i class="fas fa-pencil-alt"></i>
                            &nbsp;Badilisha</a>&nbsp;';
                            ?>
                            <a class="btn btn-xs btn-danger" onClick="deleteMiddleSource('<?php echo $value['mdsid']; ?>')" title="Bonyeza kufuta chanzo cha kati"><i class="fas fa-trash"></i>&nbsp;Futa</a>
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
                    <th>Chanzo Kikuu</th>
                    <th>Zoni</th>
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


  <div class="modal fade" id="editMiddleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Badili taarifa za Chanzo cha Kati</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editMiddleSourceForm">
            <input type="hidden" name="msidd" id="msidd" class="form-control">
            <input type="hidden" name="mdsidd" id="mdsidd" class="form-control">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamed">Chanzo Kikuu:</label>
                  <input type="text" name="msnamed" id="msnamed" class="form-control" placeholder="Ingiza Chanzo Kikuu" readonly="readonly" style="border: solid 1px green;">
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
                      <label for="zoneidd">Zoni
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="zoneidd" name="zoneidd" required="required" style="border: solid 1px green;">
                          <option id="zoneidd2" value="">chagua zoni</option>
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
                  <label for="mdsnamed">Chanzo cha Kati:</label>
                  <input type="text" name="mdsnamed" id="mdsnamed" class="form-control" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;">
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

  <div class="modal fade" id="addLittleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ongeza Chanzo Kidogo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addLittleSourceForm">
            <input type="hidden" name="mdsidl" id="mdsidl" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mdsnamel">Chanzo cha Kati:</label>
                  <input type="text" name="mdsnamel" id="mdsnamel" class="form-control" placeholder="Ingiza Chanzo cha Kati" readonly="readonly" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="zonenamel">Zoni:</label>
                  <input type="text" name="zonenamel" id="zonenamel" class="form-control" placeholder="Ingiza Zoni" readonly="readonly" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="ltsname">Chanzo Kidogo:</label>
                  <input type="text" name="ltsname" id="ltsname" class="form-control" placeholder="Ingiza Chanzo Kidogo" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="ltsprice">Bei:</label>
                  <input type="text" name="ltsprice" id="ltsprice" class="form-control" placeholder="Ingiza Bei" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="scondition">Hali ya chanzo
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="scondition" name="scondition" required="required" style="border: solid 1px green;">
                          <option value="">chagua hali ya chanzo</option>
                          <option value="i">Idadi</option>
                          <option value="b">Bila Idadi</option>
                      </select>
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
        //update zone
        var form = document.getElementById('editMiddleSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('msidd').value;
          var mdsid = document.getElementById('mdsidd').value;
          var mdsname = document.getElementById('mdsnamed').value;
          var zoneid = document.getElementById('zoneidd').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"updateMiddlesource/"+mdsid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "msid": msid,
                "mdsname": mdsname,
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


        //call add new Middle Source modal function
        $(document).on("click", ".open-editMiddleSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#msidd").val(msid);

          var mdsname = _self.data('conf2');
          $("#mdsnamed").val(mdsname);

          var msname = _self.data('conf3');
          $("#msnamed").val(msname);

          var zoneid = _self.data('conf4');
          $("#zoneidd2").val(zoneid);

          var zonename = _self.data('conf5');
          document.getElementById('zoneidd2').innerHTML=zonename;

          var mdsidd = _self.data('conf6');
          $("#mdsidd").val(mdsidd);


          $(_self.attr('href')).modal('show');
        });

        //delete MiddleSource function
        function deleteMiddleSource(mdsid) {
          var mdsid = mdsid;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta Chanzo cha kati?");

          if(c){
            fetch(pubIP+"deletetMiddlesource/"+mdsid,{
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


        //call add new Little Sourse modal function
        $(document).on("click", ".open-addLittleSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var mdsid = _self.data('id');
          $("#mdsidl").val(mdsid);

          var mdsname = _self.data('conf2');
          $("#mdsnamel").val(mdsname);

          var zonename = _self.data('conf3');
          $("#zonenamel").val(zonename);


          $(_self.attr('href')).modal('show');
        });


        //add little source
        var form = document.getElementById('addLittleSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var mdsid = document.getElementById('mdsidl').value;
          var ltsname = document.getElementById('ltsname').value;
          var ltsprice = document.getElementById('ltsprice').value;
          var scondition = document.getElementById('scondition').value;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;
          
          fetch(pubIP+"insertLittlesource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "mdsid": mdsid,
                "ltsname": ltsname,
                "ltsprice": ltsprice,
                "scondition": scondition
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
