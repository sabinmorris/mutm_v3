<div class="modal fade" id="editAccountNo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Badili taarifa za namba ya akaunti</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editAccountNoForm" method="POST">
            <input type="hidden" name="accidAcc" id="accidAcc" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">

            <input type="hidden" name="updateAccount" id="updateAccount" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="instituteidAcc">Taasisi
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="instituteidAcc" name="instituteidAcc" required="required" style="border: solid 1px green;">
                      <option value="" id="instituteidAcc2" hidden>chagua taasisi</option>
                      <?php
                        foreach ($arr as $key => $value) {
                          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="accnameAcc">Jina la Akaunti
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="accnameAcc" name="accnameAcc" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="accnumAcc">Namba ya Akaunti
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="accnumAcc" name="accnumAcc" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="bankcodeAcc">Jina la Benki
                      <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="bankcodeAcc" name="bankcodeAcc" required="required" style="border: solid 1px green;">
                    <option value="" hidden id="bankcodeAcc2">Chagua Benki</option>
                    <option value="PBZ">PBZ</option>
                    <option value="CRDB">CRDB</option>
                    <option value="NBC">NBC</option>
                    <option value="AMANA BANK">AMANA BANK</option>
                    <option value="AFRICAN BANK">AFRICAN BANK</option>
                    <option value="EXIM BANK">EXIM BANK</option>
                    <option value="APSA BANK">APSA BANK</option>
                    <option value="EQUITY BANK">EQUITY BANK</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPcc" id="pubIPcc" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPcc" id="locIPcc" value="<?php echo $locIP; ?>">
            
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
