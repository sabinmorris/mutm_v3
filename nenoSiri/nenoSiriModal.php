<div class="modal fade" id="badiliNenoSiri">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Fomu ya Kubadili neno la siri</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>
              <span id="nenoSiriAlert" class="font-weight-bold">
                  Badili Neno lako la Siri 
              </span>                      
          </div>

          <form id="nenoSiriForm">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="usernameE">Baruapepe/Jina la mtumiaji&nbsp;<span class="text-danger">*</span>:</label>
                  <input type="email" name="usernameE" id="usernameE" class="form-control" placeholder="Ingiza Baruapepe/Jina la mtumiaji" style="border: solid 1px green" required="required">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIP" id="pubIP" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIP" id="locIP" value="<?php echo $locIP; ?>">
            
            <button class="btn btn-info">
              <span class="fas fa-pen-alt"></span>&nbsp;
              Badili neno la siri
            </button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
