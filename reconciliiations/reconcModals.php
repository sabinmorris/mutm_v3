<div class="modal fade" id="requestReconciliation">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Request Bills Reconciliation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="requestReconciliationForm" method="POST">
            <!-- <input type="hidden" name="instituteid" id="instituteid" class="form-control" value="1"> -->
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="tnxDt">Choose Date
                        <span class="text-danger">*</span>
                      </label>
                      <input type="date" class="form-control" id="tnxDt" name="tnxDt" style="border: solid 1px green;" required="required">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">

            <button class="btn btn-info">
              <span class="far fa-save"></span>&nbsp;
              Request
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->