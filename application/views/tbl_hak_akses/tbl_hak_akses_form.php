<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">FORM TBL HAK AKSES</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="id_user_level">Id User Level <?php echo form_error('id_user_level') ?></label>
									<?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'ASC') ?>
								</div>
								<div class="form-group">
									<label for="id_menu">Id Menu <?php echo form_error('id_menu') ?></label>
									<?php echo cmb_dinamis('id_menu', 'tbl_menu', 'title', 'id_menu', $id_menu, 'ASC') ?>
								</div>
							</div>
							<div class="card-footer">
								<input type="hidden" name="id" value="<?php echo $id; ?>"/>
								<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('tbl_hak_akses') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>