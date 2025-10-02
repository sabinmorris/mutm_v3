<div class="modal fade" id="forgetPassword">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Maombi ya neno la siri</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="forgetPasswordForm" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="usernameE">Baruapepe/Jina la mtumiaji&nbsp;<span class="text-danger">*</span>:</label>
                  <input type="email" name="usernameE" id="usernameE" class="form-control" placeholder="Ingiza Baruapepe/Jina la mtumiaji" style="border: solid 1px green" required="required">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPf" id="pubIPf" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPf" id="locIPf" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-info">
              <span class="fas fa-pen-alt"></span>&nbsp;
              Omba neno la siri
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
