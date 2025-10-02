<div class="modal fade" id="addshehia">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Sajili Shehia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addShehiaForm">
          <!-- <input type="hidden" name="businessid" id="businessid" class="form-control"> -->
          <div class="row">
            <div class="col-sm-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectdistrict'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="lnumber">Wilaya
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="distrct" name="distrct" style="border: solid 1px green;">
                  <option value="" hidden>Chagua Wilaya</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['did'] . '">' . $value['dname'] . '</option>';
                  }
                  ?>
                </select>
                <!-- <input type="text" name="ltype" id="ltype" class="form-control" placeholder="Ingiza Aina ya Leseni" required="required" style="border: solid 1px green;"> -->
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="restaurentnumber">Shehia
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="shnam" id="shnam" class="form-control" placeholder="Jaza shehia" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>
          <input type="hidden" name="publicIPa" id="publicIPa" value="<?php echo $jsIPConnect1; ?>">
          <input type="hidden" name="localIPa" id="localIPa" value="<?php echo $locIP1; ?>">

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


<div class="modal fade" id="editShehia">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h4 class="modal-title">Badili taarifa za Shehia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editShehiaForm">
          <input type="hidden" name="shehiaId" id="shehiaId" class="form-control">
          <div class="row">
            <div class="col-sm-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectdistrict'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="lnumber">Wilaya
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="distrctt" name="distrctt" style="border: solid 1px green;">
                  <option value="" id="distrctt1" hidden>Chagua Wilaya</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['did'] . '">' . $value['dname'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="shehia">Shehia
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="shnamm" id="shnamm" class="form-control" placeholder="Ingiza shehia" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>
          <input type="hidden" name="pubIPu" id="pubIPu" value="<?php echo $jsIPConnect1; ?>">
          <input type="hidden" name="locIPu" id="locIPu" value="<?php echo $locIP1; ?>">

          <button class="btn btn-info">
            <span class="far fa-save"></span>&nbsp;
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