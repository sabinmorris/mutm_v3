<div class="modal fade" id="viewLicense">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">View Bill</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="font-weight-bold">
          Jina La Biashara:
          <span class="font-weight-normal text-danger" id="bussname"></span>
        </h6>
        <hr />
        <div id="billInfo">

        </div>

      </div>
      <input type="hidden" name="pubIPu" id="pubIPu" value="<?php echo $jsIPConnect1; ?>">
      <input type="hidden" name="locIPu" id="locIPu" value="<?php echo $locIP1; ?>">
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