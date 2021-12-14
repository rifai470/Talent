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
							<h3 class="card-title">PASIEN </h3>
						</div>
						<div class="card-body">
							<table class="table-read">
								<tr>
									<td width="20%">Nama Lengkap</td>
									<td width="2%">:</td>
									<td>
										<?php echo $nama_lengkap; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Ktp</td>
									<td width="2%">:</td>
									<td>
										<?php echo $ktp; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Tgl Lahir</td>
									<td width="2%">:</td>
									<td>
										<?php echo $tgl_lahir; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Jenis Kelamin</td>
									<td width="2%">:</td>
									<td>
										<?php echo $jenis_kelamin; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Alamat</td>
									<td width="2%">:</td>
									<td>
										<?php echo $alamat; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Email</td>
									<td width="2%">:</td>
									<td>
										<?php echo $email; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">No Rekam Medis</td>
									<td width="2%">:</td>
									<td>
										<?php echo $no_pasien; ?>
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
									<td width="20%">Perusahaan</td>
									<td width="2%">:</td>
									<td>
										<?php echo $perusahaan; ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="card-footer">
							<a href="<?php echo site_url('pasien') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>