<div class="modal fade" id="editLittleSource">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Badili taarifa za Hali ya Chanzo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editLittleSourceForm">
            <input type="hidden" name="ltsidl" id="ltsidl" class="form-control">
            <div class="row">
              <div class="col-sm-12">
                <?php
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                    $json = file_get_contents($pubIP.'selectAllMiddlesource'); //receive json from url
                  }else{
                    $json = file_get_contents($pubIP.'selectMiddlesourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                  }

                  $arr = json_decode($json, true); //covert json data into array format
                ?>
                <div class="form-group">
                  <label for="mdsidl">Chanzo cha Kati
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="mdsidl" name="mdsidl" required="required" style="border: solid 1px green;">
                    <option value="" id="mdsid2" hidden>Chagua chanzo cha kati</option>
                    <?php
                      foreach ($arr as $key => $value) {
                        echo '<option value="'.$value['mdsid'].'">'.$value['mdsname'].' ('.$value['zonename'].')</option>';
                      }
                      
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="ltsnamel">Hali ya Chanzo
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="ltsnamel" id="ltsnamel" class="form-control" required="required" placeholder="Ingiza Hali ya Chanzo" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="gfscodel">GFS Code
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="gfscodel" id="gfscodel" class="form-control" required="required" minlength="12" maxlength="12" placeholder="Ingiza GFS Code" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="subspcodel">Sub SP Code
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="subspcodel" id="subspcodel" class="form-control" required="required" minlength="4" maxlength="4" placeholder="Ingiza Kiungo cha Taasisi" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="ltspricel">Kiasi
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" name="ltspricel" id="ltspricel" class="form-control" required="required" placeholder="Ingiza Kiasi" style="border: solid 1px green;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="paymenttypell">Aina ya Malipo
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="paymenttypell" name="paymenttypell" required="required" style="border: solid 1px green;">
                    <option value="" id="paymenttype2l" hidden>Chagua aina ya malipo</option>
                    <!-- <option value="FULL">FULL</option> -->
                    <option value="EXACT">EXACT</option>
                    <!-- <option value="PARTIAL">PARTIAL</option>
                    <option value="INFINIT">INFINIT</option> -->
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="sconditionll">Aina Hali ya Chanzo
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="sconditionll" name="sconditionll" required="required" style="border: solid 1px green;">
                      <option value="" id="scondition2l" hidden>Chagua aina hali ya chanzo</option>
                      <option value="I">Idadi</option>
                      <option value="B">Bila Idadi</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">
            
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