<div class="modal fade" id="addZone">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Sajili zoni mpya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addZoneForm" method="POST">
            <!-- <input type="hidden" name="instituteid" id="instituteid" class="form-control" value="1"> -->
            <div class="row">
              <div class="col-md-12">
                <?php

                  $json = file_get_contents($ipConnect.'/selectInstitutionInfo'); //receive json from url

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                  <div class="form-group">
                      <label for="instituteid">Taasisi
                        <span class="text-danger">*</span>
                      </label>
                      <input type="hidden" class="form-control" id="instituteid" name="instituteid" readonly="readonly" value="<?php echo $_SESSION['instituteid']; ?>" style="border: solid 1px green;">
                      <input type="text" class="form-control" id="instname" name="instname" readonly="readonly" value="<?php echo $_SESSION['instname']; ?>" style="border: solid 1px green;" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="zonename">Zoni
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="zonename" id="zonename" class="form-control" placeholder="Ingiza zoni" required="required" style="border: solid 1px green">
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


  <div class="modal fade" id="editZone">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Badili taarifa ya zoni</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editZoneForm" method="POST">
            <input type="hidden" name="zoneide" id="zoneide" class="form-control">
            <input type="hidden" name="instituteide" id="instituteide" class="form-control">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="zonenamee">Zoni
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="zonenamee" id="zonenamee" class="form-control" placeholder="Ingiza zoni" style="border: solid 1px green" required="required">
                </div>
              </div>
            </div>
            <input type="hidden" name="pubIPe" id="pubIPe" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPe" id="locIPe" value="<?php echo $locIP; ?>">
            <button class="btn btn-success">
              <span class="fas fa-pen-alt"></span>
              Badili
            </button>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          &nbsp;
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->