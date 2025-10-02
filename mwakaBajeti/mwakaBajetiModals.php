<div class="modal fade" id="addMwakaBajeti">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Ingiza mwaka mpya wa bajeti</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addMwakaBajetiForm" method = "POST">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="startdate">Tarehe ya Mwanzo
                    <span class="text-danger">*</span>
                  </label>
                  <input type="date" name="startdate" id="startdate" class="form-control" placeholder="Ingiza tarehe ya mwanzo" required="required" style="border: solid 1px green;">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="enddate">Tarehe ya Mwisho
                    <span class="text-danger">*</span>
                  </label>
                  <input type="date" name="enddate" id="enddate" class="form-control" placeholder="Ingiza tarehe ya mwisho" required="required" style="border: solid 1px green;">
                </div>
              </div>
            </div>

            <input type="hidden" name="pubIPa" id="pubIPa" value="<?php echo $jsIPConnect; ?>">
            <input type="hidden" name="locIPa" id="locIPa" value="<?php echo $locIP; ?>">

            <button class="btn btn-info">
              <span class="far far-save"></span>&nbsp;
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


  <div class="modal fade" id="eMwakaBajeti">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Badili taarifa za mwaka wa bajeti</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="eMwakaBajetiForm" method="POST">
            <input type="hidden" name="yearidb" id="yearidb" class="form-control">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="startdateb">Tarehe ya Mwanzo
                    <span class="text-danger">*</span>
                  </label>
                  <input type="date" name="startdateb" id="startdateb" class="form-control" placeholder="Ingiza tarehe ya mwanzo" style="border: solid 1px green" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="enddateb">Tarehe ya Mwisho
                    <span class="text-danger">*</span>
                  </label>
                  <input type="date" name="enddateb" id="enddateb" class="form-control" placeholder="Ingiza tarehe ya mwisho" style="border: solid 1px green" required="required">
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
