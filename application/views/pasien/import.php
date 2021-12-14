<div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Data <?php echo @$judul; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url($url); ?>" enctype="multipart/form-data">
				<div class="input-group form-group">
				  <span class="input-group-addon" id="sizing-addon2">
					<i class="fa fa-file-excel-o"></i>
				  </span>
				  <input type="file" class="form-control" name="excel" aria-describedby="sizing-addon2">
				</div>
				<div class="form-group">
				  <div class="col-md-12">
					  <button type="submit" class="form-control btn btn-success"> <i class="fa fa-check"></i> Import Data</button>
				  </div>
				</div>
			  </form>
            </div>
          </div>