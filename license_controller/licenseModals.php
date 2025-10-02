<div class="modal fade" id="addlicense">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Sajili Leseni Mpya</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addLicenseForm">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="licensetype">Kategoria
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="category" name="category" required="required" style="border: solid 1px green;">
                  <option value="" hidden>Chagua Kategoaria</option>
                  <option value="PRINCIPAL">Principal</option>
                  <option value="SUBSIDIARY">Subsidiary</option>
                  <option value="NONE">None</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/getAllBusiness?pageNum=1&pageSize=20'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="bname">Biashara
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="bname" name="bname" required="required" style="border: solid 1px green;">
                  <option value="" hidden>Chagua Biashara</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['bussid'] . '">' . $value['bname'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectlicensetype'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="category">Aina ya Leseni
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="ltid" name="ltid" required="required" style="border: solid 1px green;" onchange="displayPrice()">
                  <option value="" hidden>Chagua aina ya Leseni</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['ltid'] . '">' . $value['ltype'] . '-' . number_format($value['price']) . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="kiwangoDiv">
                <label for="amount">Kiwango
                  <span class="text-danger">*</span>
                </label>
                <input type="hidden" name="ltype" id="ltype" class="form-control" placeholder="Ingiza kiwanga cha Pesa" required="required" style="border: solid 1px green;">
                <input type="text" name="amount" id="amount" class="form-control" placeholder="Ingiza kiwanga cha Pesa" required="required" style="border: solid 1px green;">
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


<div class="modal fade" id="editLicense">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h4 class="modal-title">Badili taarifa za Leseni</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editLicenseForm">
          <input type="hidden" name="lid" id="lid" class="form-control">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lnumber">Namba ya Leseni
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="lnumberr" id="lnumberr" class="form-control" readonly required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="categoryDiv">
                <label for="category">Kategoria
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="categoryy" name="categoryy" required="required" style="border: solid 1px green;">
                  <option value="" id="categoryy1" hidden>Chagua Kategoaria</option>
                  <option value="PRINCIPAL">Principal</option>
                  <option value="SUBSIDIARY">Subsidiary</option>
                  <option value="NONE">None</option>
                </select>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/getAllBusiness?pageNum=1&pageSize=20'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="bname">Biashara
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="bnamee" name="bnamee" required="required" style="border: solid 1px green;">
                  <option id="bssname" value="" hidden>Chagua Biashara</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['bussid'] . '">' . $value['bname'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-sm-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectlicensetype'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="licensetype">Aina ya Leseni
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="licensetypee" name="licensetypee" required="required" style="border: solid 1px green;" onchange="showPrice()">
                <option value="" id="licensetypee1" hidden>Chagua aina ya Leseni</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['ltid'] . '">' . $value['ltype'] . '-' . number_format($value['price']) . '</option>';
                  }
                  ?>  
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="priceDiv">
                <label for="restaurentnumber">Kiwango
                  <span class="text-danger">*</span>
                </label>
                
                <input type="number" name="amountt" id="amountt" class="form-control" placeholder="Ingiza kiwanga cha Pesa" required="required" style="border: solid 1px green;">
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

