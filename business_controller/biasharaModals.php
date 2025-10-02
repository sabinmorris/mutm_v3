<div class="modal fade" id="addBusiness">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Sajili Biashara Mpya</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addBusinessForm">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="bname">Jina la Biashara
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="bname" id="bname" class="form-control" placeholder="Ingiza Jina la Biashara" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <?php

              // $json = file_get_contents($pubIP . 'selectLittlesourceByInstitute/' . $_SESSION['instituteid']); //receive json from url

              // $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="btype">Aina ya Biashara
                  <span class="text-danger">*</span>
                </label>
                <!-- <select class="form-control" id="btype" name="btype" required="required" style="border: solid 1px green;" onchange="displayPrice()">
                  <option value="" hidden>Chagua aina ya Leseni</option>
                  <?php
                  // foreach ($arr as $key => $value) {
                  //   echo '<option value="' . $value['ltsname'] . '">' . $value['ltsname'] . '-' . number_format($value['ltsprice']) . '</option>';
                  // }
                  ?>
                </select> -->
                <select class="form-control" id="btype" name="btype" required="required" style="border: solid 1px green;">
                  <option value="" hidden>Chagua aina ya Biashara</option>
                  <option value="IMPORTATION">Importation</option>
                  <option value="FIVE STAR HOTEL">Five Star Hotel</option>
                  <option value="FOUR OR TRHEE STAR HOTEL">Four or Three Star Hotel</option>
                  <option value="TWO OR ONE STAR HOTEL">Two or One Star Hotel</option>
                  <option value="HOTEL WITH GRADE A,AA,AAA AND BELOW THE STANDARD">Hotel With Grade A,AA,AAA and Below The Standard</option>
                  <option value="LOCAL BAR">Local Bar</option>
                  <option value="NIGHT CLUB">Night Club</option>
                  <option value="WAREHOUSE">WareHouse</option>
                  <option value="LIQOUR/GROCERY SHOP">Liqour/Grocery Shop</option>
                  <option value="DELIVERY PERMIT">Delivery Permit</option>
                  <option value="SPECIAL OCCASION PERMIT">Special occasion Permit </option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Email
                  <span class="text-danger">*</span>
                </label>
                <!-- style="border: solid 1px green; text-transform:uppercase;" -->
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingiza Email" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="restaurentnumber">Idadi ya Mgahawa/Bar
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="restaurentnumber" name="restaurentnumber" required="required" style="border: solid 1px green;">
                  <option value="" hidden>Chagua Idadi ya Migawaha</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four</option>
                  <option value="5">Five</option>
                </select>
                <!-- <input type="text" name="restaurentnumber" id="restaurentnumber" class="form-control" placeholder="Ingiza Nambari ya Mgahawa" required="required" style="border: solid 1px green;"> -->
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="phonenumber">Nambari ya Simu
                  <span class="text-danger">*</span>
                </label>
                <input type="tel" name="pnumber" id="pnumber" pattern="[1-9]{1}[0-9]{8}" placeholder="eg: 773217012" minlength="9" maxlength="9" class="form-control" placeholder="Ingiza Nambari ya Simu" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectdistrict'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="wilaya">Wilaya
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="distrct" name="distrct" required="required" style="border: solid 1px green;" onchange="showShehia()">
                  <option value="" hidden>Chagua Wilaya</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['did'] . '">' . $value['dname'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group" id="shehiaDiv">
                <label for="sheh">Shehia
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="sheh" name="sheh" required="required" style="border: solid 1px green;">
                  <option value="" hidden>Chagua Shehia</option>
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


<div class="modal fade" id="editBusinessinfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-default">
        <h4 class="modal-title">Badili taarifa za Biashara</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editBiasharaForm" method="POST">
          <input type="hidden" name="busId" id="busId" class="form-control">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="bnamee">Jina la Biashara
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="bnamee" id="bnamee" class="form-control" placeholder="Ingiza Namba ya taasisi" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <?php

              // $json = file_get_contents($pubIP . 'selectLittlesourceByInstitute/' . $_SESSION['instituteid']); //receive json from url

              // $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="instnamei">Aina ya Biashara
                  <span class="text-danger">*</span>
                </label>
                <!-- <select class="form-control" id="btypee" name="btypee" required="required" style="border: solid 1px green;">
                  <option id="btypee1" value="" hidden>Chagua aina ya Biashara</option>
                  <?php
                  // foreach ($arr as $key => $value) {
                  //   echo '<option value="' . $value['ltype'] . '">' . $value['ltype'] . '-' . number_format($value['price']) . '</option>';
                  // }
                  ?>
                </select> -->

                <select class="form-control" id="btypee" name="btypee" required="required" style="border: solid 1px green;">
                  <option value="" id="btypee1" hidden>Chagua aina ya Biashara</option>
                  <option value="IMPORTATION">Importation</option>
                  <option value="FIVE STAR HOTEL">Five Star Hotel</option>
                  <option value="FOUR OR TRHEE STAR HOTEL">Four or Three Star Hotel</option>
                  <option value="TWO OR ONE STAR HOTEL">Two or One Star Hotel</option>
                  <option value="HOTEL WITH GRADE A,AA,AAA AND BELOW THE STANDARD">Hotel With Grade A,AA,AAA and Below The Standard</option>
                  <option value="LOCAL BAR">Local Bar</option>
                  <option value="NIGHT CLUB">Night Club</option>
                  <option value="WAREHOUSE">WareHouse</option>
                  <option value="LIQOUR/GROCERY SHOP">Liqour/Grocery Shop</option>
                  <option value="DELIVERY PERMIT">Delivery Permit</option>
                  <option value="SPECIAL OCCASION PERMIT">Special occasion Permit </option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Email
                  <span class="text-danger">*</span>
                </label>
                <input type="email" name="emaill" id="emaill" class="form-control" placeholder="Ingiza jina la Biashara" required="required" style="border: solid 1px green;">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="restaurentnumber">Idadi ya Mgahawa/Bar
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="restaurentnumberr" name="restaurentnumberr" required="required" style="border: solid 1px green;">
                  <option id="restaurentnumberr1" value="" hidden>Chagua Idadi ya Migawaha</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four</option>
                  <option value="5">Five</option>
                </select>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="phonenumber">Nambari ya Simu
                  <span class="text-danger">*</span>
                </label>
                <input type="text" name="phonenumberr" id="phonenumberr" class="form-control" placeholder="Ingiza Nambari ya Simu" required="required" style="border: solid 1px green;">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php

              $json = file_get_contents($pubIP1 . 'mutm/api/selectdistrict'); //receive json from url

              $arr = json_decode($json, true); //covert json data into array format
              ?>
              <div class="form-group">
                <label for="wilaya">Wilaya
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="distrctt" name="distrctt" style="border: solid 1px green;" onchange="displayShehia()">
                  <option value="" hidden>Chagua Wilaya</option>
                  <?php
                  foreach ($arr as $key => $value) {
                    echo '<option value="' . $value['did'] . '">' . $value['dname'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group" id="shehiaDivision">
                <label for="sheh">Shehia
                  <span class="text-danger">*</span>
                </label>
                <select class="form-control" id="shehh" name="shehh" required="required" style="border: solid 1px green;">
                  <option id="shehhia" value="" hidden>Chagua Shehia</option>
                </select>
              </div>
            </div>
          </div>

          <input type="hidden" name="pubIPu" id="pubIPu" value="<?php echo $jsIPConnect1; ?>">
          <input type="hidden" name="locIPu" id="locIPu" value="<?php echo $locIP1; ?>">

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
        <form id="addAccountNoForm" method="POST">
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
        <form id="addPOSForm" method="POST">
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