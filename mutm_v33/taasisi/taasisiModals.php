<div class="modal fade" id="addInstitute">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Sajili Taasisi Mpya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addInstituteForm" method = "POST">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="intergratingcode">Namba ya Kiungo cha Taasisi (SP Code)
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="intergratingcode" id="intergratingcode" class="form-control" placeholder="Ingiza Namba ya Kiungo cha Taasisi" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instcode">Namba ya Usajili wa Taasisi (SubSP/Vote Code)
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instcode" id="instcode" class="form-control" placeholder="Ingiza Namba ya taasisi" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="instname">Jina la Taasisi
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instname" id="instname" class="form-control" placeholder="Ingiza Jina la Taasisi" required="required" style="border: solid 1px green; text-transform:uppercase;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="insttype">Aina ya Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="insttype" name="insttype" required="required" style="border: solid 1px green;">
                      <option value="" hidden>Chagua aina ya taasisi</option>
                      <option value="WIZARA">WIZARA</option>
                      <option value="TAASISI">TAASISI</option>
                      <option value="BARAZA LA MANISPAA">BARAZA LA MANISPAA</option>
                      <option value="BARAZA LA MJI">BARAZA LA MJI</option>
                      <option value="HALMASHAURI">HALMASHAURI</option>
                      <option value="WAKALA">WAKALA</option>
                      <option value="IDARA">IDARA</option>
                      <option value="KITENGO">KITENGO</option>
                      <option value="OFISI">OFISI</option>
                      <option value="NYENGINEZO">NYENGINEZO</option>
                  </select>
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

            <input type="hidden" name="pubIPa" id="pubIPa" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa" id="locIPa" value="<?php echo $locIP; ?>">

            <button class="btn btn-info">
              <span class="far fa-save"></span>&nbsp;
              Sajili
            </button>
          </form>
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
        <div class="modal-header bg-default">
          <h4 class="modal-title">Badili taarifa za Taasisi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editInstitutionForm" method = "POST">
            <input type="hidden" name="instituteidi" id="instituteidi" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="intergratingcodei">Namba ya Kiungo cha Taasisi (SP/Intgr Code)
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="intergratingcodei" id="intergratingcodei" class="form-control" placeholder="Ingiza Namba ya Kiungo cha Taasisi" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instcodei">Namba ya Usajili ya Taasisi (Inst/Vote Code)
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instcodei" id="instcodei" class="form-control" placeholder="Ingiza Namba ya taasisi" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="instnamei">Jina la Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instnamei" id="instnamei" class="form-control" placeholder="Ingiza Jina la Taasisi" required="required" style="border: solid 1px green; text-transform:uppercase;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="insttypei">Aina ya Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="insttypei" name="insttypei" required="required" style="border: solid 1px green;">
                      <option id="insttypei2" value="" hidden>Chagua aina ya taasisi</option>
                      <option value="WIZARA">WIZARA</option>
                      <option value="TAASISI">TAASISI</option>
                      <option value="BARAZA LA MANISPAA">BARAZA LA MANISPAA</option>
                      <option value="BARAZA LA MJI">BARAZA LA MJI</option>
                      <option value="HALMASHAURI">HALMASHAURI</option>
                      <option value="WAKALA">WAKALA</option>
                      <option value="IDARA">IDARA</option>
                      <option value="KITENGO">KITENGO</option>
                      <option value="OFISI">OFISI</option>
                      <option value="NYENGINEZO">NYENGINEZO</option>
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

            <input type="hidden" name="pubIPe" id="pubIPe" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPe" id="locIPe" value="<?php echo $locIP; ?>">

            <button class="btn btn-default">Badili</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


 <div class="modal fade" id="addAccountNo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Sajili akaunti namba ya malipo ya Taasisi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addAccountNoForm" method = "POST">
            <input type="hidden" name="instituteidacc" id="instituteidacc" class="form-control">
            <input type="hidden" name="insertAccount" id="insertAccount" class="form-control">
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instcodeacc">Namba ya Usajili wa Taasisi (SubSP Code)
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instcodeacc" id="instcodeacc" class="form-control" placeholder="Ingiza Namba ya taasisi" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instnameacc">Jina la Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instnameacc" id="instnameacc" class="form-control" placeholder="Ingiza Jina la Taasisi" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="accname">Jina la Akaunti
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="accname" name="accname" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="accnum">Namba ya Malipo
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="accnum" name="accnum" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="bankcode">Jina la Benki
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="bankcode" name="bankcode" required="required" style="border: solid 1px green;">
                    <option value="" hidden>Chagua Benki</option>
                    <option value="PBZ">PBZ</option>
                    <!-- <option value="CRDB">CRDB</option>
                    <option value="NBC">NBC</option>
                    <option value="AMANA BANK">AMANA BANK</option>
                    <option value="AFRICAN BANK">AFRICAN BANK</option>
                    <option value="EXIM BANK">EXIM BANK</option>
                    <option value="APSA BANK">APSA BANK</option>
                    <option value="EQUITY BANK">EQUITY BANK</option> -->
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPac" id="pubIPac" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPac" id="locIPac" value="<?php echo $locIP; ?>">

            <button class="btn btn-success">
              <span class="fas fa-save"></span>&nbsp;Sajili
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="addPOS">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Sajili POS mpya kwa matumizi ya Taasisi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addPOSForm" method = "POST">
            <input type="hidden" name="instituteidps" id="instituteidps" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instcodeps">Namba ya Usajili wa Taasisi (SubSP Code)
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instcodeps" id="instcodeps" class="form-control" placeholder="Ingiza Namba ya taasisi" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instnameps">Jina la Taasisi
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instnameps" id="instnameps" class="form-control" placeholder="Ingiza Jina la Taasisi" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="imeino">POS/IMEI No.
                      <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="imeino" name="imeino" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPap" id="pubIPap" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPap" id="locIPap" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-success">
              <span class="fas fa-save"></span>&nbsp;Sajili
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->