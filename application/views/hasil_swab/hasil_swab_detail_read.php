<style>
	.table-read {
		border-spacing: 0.5rem;
		border-collapse: collapse;
		width: 90%;
	}
	
	.table-read td {
/*		border-bottom: 1px solid #dee2e6;*/
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
							<h3 class="card-title">HASIL SWAB</h3>
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
									<td width="20%">Jenis Kelamin</td>
									<td width="2%">:</td>
									<td>
										<?php echo $jenis_kelamin; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Tanggal Lahir</td>
									<td width="2%">:</td>
									<td>
										<?php echo $tgl_lahir; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Jenis Pemeriksaan</td>
									<td width="2%">:</td>
									<td>
										<?php echo $jenis_pemeriksaan; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">No Rekam Medis</td>
									<td width="2%">:</td>
									<td>
										<?php echo $no_rekam_medis; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Suhu</td>
									<td width="2%">:</td>
									<td>
										<?php echo $suhu; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Saturasi</td>
									<td width="2%">:</td>
									<td>
										<?php echo $saturasi; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Hasil Swab</td>
									<td width="2%">:</td>
									<td>
										<?php echo $swab_antigen; ?>
									</td>
								</tr>
								<tr>
									<td width="20%">Tanggal Periksa</td>
									<td width="2%">:</td>
									<td>
										<?php echo $tgl_periksa; ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="card-footer">
							<a href="<?php echo site_url('hasil_swab_detail') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
							<a href="<?php echo site_url('hasil_swab_detail/pdf/' . $hasil_id . '') ?>" target="parent" class="btn btn-danger">Print</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>