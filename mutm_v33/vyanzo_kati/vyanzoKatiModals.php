 <div class="modal fade" id="editMiddleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Badili taarifa za Chanzo cha Kati</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editMiddleSourceForm" method="POST">
            <input type="hidden" name="msidd" id="msidd" class="form-control">
            <input type="hidden" name="mdsidd" id="mdsidd" class="form-control">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="msnamed">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="msnamed" id="msnamed" class="form-control" placeholder="Ingiza Chanzo Kikuu" readonly="readonly" required="required" style="border: solid 1px green;">
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
                      <label for="zoneidd">Zoni
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="zoneidd" name="zoneidd" required="required" style="border: solid 1px green;">
                          <option id="zoneidd2ll" value="">chagua zoni</option>
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
                  <label for="mdsnamed">Chanzo cha Kati
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="mdsnamed" id="mdsnamed" class="form-control" required="required" placeholder="Ingiza Chanzo Kikuu" style="border: solid 1px green;">
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

  <div class="modal fade" id="addLittleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Ongeza Hali ya Chanzo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addLittleSourceForm" method="POST">
            <input type="hidden" name="mdsidl" id="mdsidl" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mdsnamel">Chanzo cha Kati
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="mdsnamel" id="mdsnamel" class="form-control" placeholder="Ingiza Chanzo cha Kati" readonly="readonly" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="zonenamel">Zoni
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="zonenamel" id="zonenamel" class="form-control" placeholder="Ingiza Zoni" readonly="readonly" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="ltsname">Hali ya Chanzo
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="ltsname" id="ltsname" class="form-control" required="required" placeholder="Ingiza Hali ya Chanzo" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="gfscode">GFS Code
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="gfscode" id="gfscode" class="form-control" required="required" minlength="12" maxlength="12" placeholder="Ingiza GFS Code" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="sbspcode">Sub SP Code
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="sbspcode" id="sbspcode" class="form-control" required="required" value="1002" readonly="readonly" placeholder="Ingiza Kiungo cha Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="ltspricek">Kiasi
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" name="ltspricek" id="ltspricek" class="form-control" required="required" placeholder="Ingiza Kiasi" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="paymenttype">Aina ya Malipo
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="paymenttype" name="paymenttype" required="required" style="border: solid 1px green;">
                          <option value="" hidden>Chagua aina ya malipo</option>
                          <!-- <option value="FULL">FULL</option> -->
                          <option value="EXACT">EXACT</option>
                          <!-- <option value="PARTIAL">PARTIAL</option>
                          <option value="INFINIT">INFINIT</option> -->
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="scondition">Aina ya Hali ya Chanzo
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-control" id="scondition" name="scondition" required="required" style="border: solid 1px green;">
                          <option value="" hidden>Chagua aina hali ya chanzo</option>
                          <option value="I">Idadi</option>
                          <option value="B">Bila Idadi</option>
                      </select>
                  </div>
              </div>
            </div>

            <input type="hidden" name="pubIPa" id="pubIPa" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa" id="locIPa" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-info">
              <span class="fas fa-save">&nbsp;Hifadhi</span>
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->