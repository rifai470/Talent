<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">FORM USER LEVEL</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">

							<table class='table table-bordered>' <tr>
								<td width='200'>Nama Level
									<?php echo form_error('nama_level') ?>
								</td>
								<td><input type="text" class="form-control" name="nama_level" id="nama_level" placeholder="Nama Level" value="<?php echo $nama_level; ?>"/>
								</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id_user_level" value="<?php echo $id_user_level; ?>"/>
										<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('userlevel') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>