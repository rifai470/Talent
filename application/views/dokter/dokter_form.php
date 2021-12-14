<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">DOKTER</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label for="nama_dokter">Nama Dokter <?php echo form_error('nama_dokter') ?></label>
									<input type="text" class="form-control" name="nama_dokter" id="nama_dokter" placeholder="Nama Dokter" value="<?php echo $nama_dokter; ?>"/>
								</div>
								<div class="form-group">
									<label for="image_ttd">Images Tanda Tangan <?php echo form_error('image_ttd') ?></label>
									<input type="file" class="form-control" name="image_ttd"/>
									<input type="hidden" name="old_image" value="<?php echo $image_ttd; ?>"/>
								</div>
							</div>
							<div class="card-footer">
								<input type="hidden" name="id_dokter" value="<?php echo $id_dokter; ?>"/>
								<button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('dokter') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>