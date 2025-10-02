<div class="modal fade" id="addMakadirio">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Fomu ya makadirio ya mwaka kwa chanzo kikuu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addMakadirioForm" method = "POST">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="msid">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="msid" name="msid" required="required" style="border: solid 1px green;">
                    <option hidden="">Chagua chanzo kikuu</option>
                    <?php
                    foreach ($arr as $key => $value) {
                      echo '<option value="'.$value['msid'].'">'.$value['msname'].'</option>';
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectBudget/'); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="yearid">Mwaka wa bajeti
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="yearid" name="yearid" required="required" style="border: solid 1px green;">
                    <option hidden>Chagua Mwaka wa bajeti</option>
                    <?php
                    foreach ($arr as $key => $value) {
                      if ($value['budgetstatus'] == 'active') {
                        echo '<option value="'.$value['yearid'].'">'.$value['startdate'].' / ' .$value['enddate'].'</option>';
                      }
                      
                    }
                  ?>
                </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="amount">Makadirio
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" class="form-control" id="amount" name="amount" required="required" style="border: solid 1px green;" min="10000">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPa" id="pubIPa" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa" id="locIPa" value="<?php echo $locIP; ?>">

            <button class="btn btn-info">
              <span class="fas fa-save"></span>&nbsp;
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


  <div class="modal fade" id="eMakadirio">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Badili taarifa za makadirio ya mwaka kwa chanzo kikuu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="eMakadirioForm" method="POST">
            <input type="hidden" name="makadirioidm" id="makadirioidm" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="instnamem">Taasisi
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" name="instnamem" id="instnamem" class="form-control" placeholder="Ingiza taasisi" style="border: solid 1px green" required="required" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="amountm">Makadirio
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" name="amountm" id="amountm" class="form-control" placeholder="Ingiza makadirio" style="border: solid 1px green" required="required" min="10000">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="msidm">Chanzo Kikuu
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="msidm" name="msidm" required="required" style="border: solid 1px green;">
                    <option id="msidm2" hidden>Chagua chanzo kikuu</option>
                    <?php
                    foreach ($arr as $key => $value) {
                      echo '<option value="'.$value['msid'].'">'.$value['msname'].'</option>';
                    }
                  ?>
                </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <?php
                    $json = file_get_contents($pubIP.'selectBudget/'); //receive json from url
                    $arr = json_decode($json, true); //covert json data into array format
                  ?>
                  <label for="yearidm">Mwaka wa bajeti
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="yearidm" name="yearidm" required="required" style="border: solid 1px green;">
                    <option id="yearidm2" hidden>Chagua Mwaka wa bajeti</option>
                    <?php
                    foreach ($arr as $key => $value) {
                      if ($value['budgetstatus'] == 'active') {
                        echo '<option value="'.$value['yearid'].'">'.$value['startdate'].' / ' .$value['enddate'].'</option>';
                      }
                      
                    }
                  ?>
                </select>
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
