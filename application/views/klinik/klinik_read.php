<style>
	.table-read {
		border-spacing: 0.5rem;
		border-collapse: collapse;
		width: 100%;
	}
	
	.table-read td {
		border-bottom: 1px solid #dee2e6;
		padding: 0.5rem;
	}

</style>
<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">KLINIK</h3>
						</div>
						<div class="card-body">
							<table class="table-read">
								<tr>
									<td width="20%">Nama Klinik</td>
									<td width="2%">:</td>
									<td>
										<?php echo $nama_klinik; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Alamat Klinik</td>
									<td width="2%">:</td>
									<td>
										<?php echo $alamat_klinik; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Phone</td>
									<td width="2%">:</td>
									<td>
										<?php echo $phone; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Other Phone</td>
									<td width="2%">:</td>
									<td>
										<?php echo $other_phone; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Fax</td>
									<td width="2%">:</td>
									<td>
										<?php echo $fax; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Dokter</td>
									<td width="2%">:</td>
									<td>
										<?php echo $nama_dokter; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Image Klinik</td>
									<td width="2%"></td>
									<td>
										<img width="100px" src="<?php echo base_url('assets/images/logo/'), $image_klinik; ?>" />
									</td>
								</tr>
							</table>
						</div>
						<div class="card-footer">
							<a href="<?php echo site_url('klinik') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>