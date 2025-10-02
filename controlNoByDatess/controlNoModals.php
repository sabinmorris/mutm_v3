<div class="modal fade" id="infoCn">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Huduma zilizoombwa kulipiwa kupitia namba ya ankara</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="font-weight-bold">
            Namba ya ankara: 
            <span class="font-weight-normal text-danger" id="cnNo"></span>
          </h6>
          <hr/>
          <div id = "cnDetail">

            <!-- Service will be displayed here -->
            
          </div>
        </div>

        <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
        <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
            close
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


<div class="modal fade" id="infoCnP">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <form id="PendingCN" method = "POST">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Huduma zilizoombwa kulipiwa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="font-weight-bold">
            Taarifa za Maombi: 
            <span class="font-weight-normal text-danger" id="cnNo"></span>
          </h6>
          <hr/>
          
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="fullnameP">Jina la Mteja
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="fullnameP" id="fullnameP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phonenumberP">Simu
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="phonenumberP" id="phonenumberP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="requestdateP">Tarehe ya Kuomba
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="requestdateP" id="requestdateP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="totalamountP">Kiasi cha Malipo
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="totalamountP" id="totalamountP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="useridP">Mkusanyaji
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="useridP" id="useridP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cstatusP">Hali ya Maombi
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="cstatusP" id="cstatusP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="referencenumberP">Kumbukumbu
                    <span class="text-danger"></span>
                  </label>
                  <input type="text" name="referencenumberP" id="referencenumberP" class="form-control" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="controlnumber_request_payloadP">Request Payload
                    <span class="text-danger"></span>
                  </label>
                  <!-- <div id="tt" style="border: solid 1px green;">&nbsp;</div> -->
                  <textarea name="controlnumber_request_payloadP" id="controlnumber_request_payloadP" class="form-control" required="required" rows="8" style="border: solid 1px green;" readonly="readonly"></textarea>
                </div>
              </div>
            </div>
          
        </div>

        <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
        <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

        <div class="modal-footer text-left">
          <div class="row">
            <div class="col-sm-6 text-left">
              <button type="button" class="btn btn-success btn-md">
                Resend
              </button>
            </div>
          </div>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


<div class="modal fade" id="cancelCn">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-gray">
          <h4 class="modal-title">Hairisha namba ya ankara</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="cancelCnForm">
            <input type="hidden" name="requestdateC" id="requestdateC" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">

            <input type="hidden" name="instcodeC" id="instcodeC" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="controlnumberC">Namba ya Ankara:</label>
                  <input type="text" name="controlnumberC" id="controlnumberC" class="form-control" placeholder="" required="required" style="border: solid 1px green;" readonly="readonly">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="referencenumberC">Namba ya Kumbukumbu:</label>
                  <input type="text" name="referencenumberC" id="referencenumberC" class="form-control" placeholder="" style="border: solid 1px green;" required="required" readonly="readonly">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="cancelationReason">Sababu ya Kuhairisha:</label>
                  <textarea rows="5" id="cancelationReason" name="cancelationReason" class="form-control" required="required" style="border: solid 2px red;"></textarea>
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $pubIP; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-warning">
              <span class="fas fa-window-close"></span>&nbsp;
              Hairisha
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
