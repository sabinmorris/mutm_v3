<div class="modal fade" id="addInvoice">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Sajili Invoice Mpya</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addLicenseForm">
          <!-- <input type="hidden" name="businessid" id="businessid" class="form-control"> -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="sdate">Tarehe ya Mwanzo
                  <span class="text-danger">*</span>
                </label>
                <input type="date" name="sdate" id="sdate" class="form-control" placeholder="Ingiza Tarehe ya Mwanzo" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="edate">Tarehe ya Mwisho
                  <span class="text-danger">*</span>
                </label>
                <input type="date" name="edate" id="edate" class="form-control" placeholder="Ingiza Terehe ya Mwisho" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Maelezo
                  <span class="text-danger">*</span>
                </label>
                <textarea name="description" id="description" class="form-control" placeholder="Ingiza Maelezo" required="required" style="border: solid 1px green;"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="invoicetype">Aina ya Invoice
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="invoicetype" id="invoicetype" class="form-control" placeholder="Ingiza Aina ya Invoice" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="amount">Kiwango
                  <span class="text-danger">*</span>
                </label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Ingiza kiwanga cha Pesa" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-md-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/getAllBusiness?pageNum=1&pageSize=20'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="lnumber">Biashara
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="lnumber" name="lnumber" required="required" style="border: solid 1px green;">
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
        <form id="addLicenseForm">
          <input type="hidden" name="lid" id="lid" class="form-control">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lnumber">Namba ya Leseni
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="lnumberr" id="lnumberr" class="form-control" placeholder="Ingiza Namba ya Leseni" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="licensetype">Aina ya Leseni
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="licensetypee" id="licensetypee" class="form-control" placeholder="Ingiza Namba ya Leseni" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
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
            <div class="col-sm-6">
              <div class="form-group">
                <label for="restaurentnumber">Kiwango
                  <span class="text-danger">*</span>
                </label>
                <input type="number" name="amountt" id="amountt" class="form-control" placeholder="Ingiza kiwanga cha Pesa" required="required" style="border: solid 1px green;">
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