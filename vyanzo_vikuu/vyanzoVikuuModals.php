 <div class="modal fade" id="addMainSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Ingiza chanzo kikuu kipya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addMainSourceForm" method="POST">
            <input type="hidden" name="instituteid" id="instituteid" class="form-control" value="<?php echo $_SESSION['instituteid']; ?>">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msname">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="msname" id="msname" class="form-control" placeholder="Ingiza chanzo kikuu" style="border: solid 1px green;" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'account/selectAccountByInstitute/'.$_SESSION['instituteid']); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="accid">Namba ya akaunti
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="accid" name="accid" required="required" style="border: solid 1px green;">
                      <option value="" hidden>chagua namba ya akaunti</option>
                      <?php
                        foreach ($arr as $key => $value) {
                          echo '<option value="'.$value['accid'].'">'.$value['accnum']. ' - '.$value['accname'].'</option>';
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>
            
            <input type="hidden" name="pubIPa" id="pubIPa" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa" id="locIPa" value="<?php echo $locIP; ?>">

            <button class="btn btn-info">
              <span class="far fa-save"></span>&nbsp;
              Hifadhi
            </button>
          </form>
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
        <div class="modal-header bg-success">
          <h4 class="modal-title">Badili taarifa za Chanzo Kikuu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editMainSourceForm" method="POST">
            <input type="hidden" name="mside" id="mside" class="form-control">
            <input type="hidden" name="instituteide" id="instituteide" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamee">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="msnamee" id="msnamee" class="form-control" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;" required="required">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectAccountByInstitute/'.$_SESSION['instituteid']); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="accide">Namba ya akaunti
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="accide" name="accide" required="required" style="border: solid 1px green;">
                      <option value="" id="accide2" hidden>chagua namba ya akaunti</option>
                      <?php
                        foreach ($arr as $key => $value) {
                          echo '<option value="'.$value['accid'].'">'.$value['accnum']. ' - '.$value['accname'].'</option>';
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPe" id="pubIPe" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPe" id="locIPe" value="<?php echo $locIP; ?>">

            <button class="btn btn-success">
              <span class="fas fa-pen-alt"></span>&nbsp;Badili
            </button>
          </form>
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
          <form id="addMiddleSourceForm" method="POST">
            <input type="hidden" name="msidm" id="msidm" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamem">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="msnamem" id="msnamem" class="form-control" placeholder="Ingiza Chanzo Kikuu" readonly="readonly" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php
                  $json = file_get_contents($pubIP.'selectZoneByInstitute/'.$_SESSION['instituteid']); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                  <div class="form-group">
                      <label for="zoneid">Zoni
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="zoneid" name="zoneid" required="required" style="border: solid 1px green;">
                          <option value="" hidden>chagua zoni</option>
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
                  <label for="mdsname">Chanzo cha Kati
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="mdsname" id="mdsname" class="form-control" required="required" placeholder="Ingiza Chanzo cha Kati" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPa2" id="pubIPa2" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa2" id="locIPa2" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-primary">
              <span class="fas fa-plus-circle">&nbsp;Ongeza</span>
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->