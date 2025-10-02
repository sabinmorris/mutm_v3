<div class="modal fade" id="editPOS">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Badili taarifa za POS</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editPOSForm" method="POST">
            <input type="hidden" name="posid2" id="posid2" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instituteid">Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="instituteid" name="instituteid" required="required" style="border: solid 1px green;" onchange="showAccounts()">
                    <option value="" id="instituteid2" hidden>Chagua taasisi</option>
                    <?php
                      $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                      $arr = json_decode($json, true); //covert json data into array format

                      foreach ($arr as $key => $value) {
                        echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="imeinumber2">IMEI Namba
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="imeinumber2" name="imeinumber2" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

            <button class="btn btn-success">
              <span class="fas fa-pen-alt"></span>&nbsp;
              Badili
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
