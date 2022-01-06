<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">KATEGORI </h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="kategori">Kategori <?php echo form_error('kategori') ?></label>
									<input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
								</div>
									<div class="input-group" id="upload">
											<div class="custom-file">
												<input type="file" class="form-control" name="icon" value="<?php echo $icon; ?>" required>

											</div>
										</div>
								</div>
							</div>
							
							
						
							<div class="card-footer">
								<input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
								<button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('tbl_kategori') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>