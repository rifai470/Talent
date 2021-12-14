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
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">PASIEN</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
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
									<td width="20%">No Pasien</td>
									<td width="2%">:</td>
									<td>
										<?php echo $no_pasien; ?>
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
								<input type="hidden" name="no_pasien" value="<?php echo $no_pasien; ?>"/>
								<input type="hidden" name="hasil_id" value="<?php echo $hasil_id; ?>"/>
								<input type="hidden" name="no_rekam_medis" value="<?php echo $no_rekam_medis; ?>"/>
								<button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('pasien') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
							</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<?php if (!empty($hasil_id)) { ?>
							<h3 class="card-title">UPDATE HASIL SWAB</h3>
							<?php } else { ?>
							<h3 class="card-title">INPUT HASIL SWAB</h3>
							<?php } ?>
						</div>
							<div class="card-body">
								<div class="form-group">
									<label for="jenis_pemeriksaan">Jenis Pemeriksaan <?php echo form_error('jenis_pemeriksaan') ?></label>
									<?php echo cmb_dinamis('jenis_pemeriksaan', 'jenis_pemeriksaan', 'jenis_pemeriksaan', 'id_jenis_pemeriksaan', $id_jenis_pemeriksaan, 'ASC') ?>
								</div>
								<div class="form-group">
									<label for="klinik">RS / Klinik <?php echo form_error('klinik') ?></label>
									<?php echo cmb_dinamis4('id_klinik', 'klinik', 'nama_klinik', 'id_klinik', $id_klinik, 'DESC', '1') ?>
								</div>
								<div class="form-group">
									<label for="suhu">Suhu <?php echo form_error('suhu') ?></label>
									<input type="text" class="form-control" name="suhu" id="suhu" placeholder="Suhu" value="<?php echo $suhu; ?>"/>
								</div>
								<div class="form-group">
									<label for="saturasi">Saturasi <?php echo form_error('saturasi') ?></label>
									<input type="text" class="form-control" name="saturasi" id="saturasi" placeholder="Saturasi" value="<?php echo $saturasi; ?>"/>
								</div>
								<div class="form-group">
									<label for="swab_antigen">Hasil Swab Antigen <?php echo form_error('swab_antigen') ?></label><br>
									<input type="radio" name="swab_antigen" id="swab_antigen" value="Negative" checked>
									<label class="form-check-label" for="swab_antigen"> Negative</label> &nbsp;
									<input type="radio" name="swab_antigen" <?php if($swab_antigen == "POSITIVE") {echo "checked";}?> id="swab_antigen" value="Positive">
  									<label class="form-check-label" for="swab_antigen"> Positive</label>
								</div>
								<div class="form-group">
									<label for="tgl_periksa">Tgl Periksa <?php echo form_error('tgl_periksa') ?></label>
									<?php if (!empty($hasil_id)) { ?>
									<input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" placeholder="Tgl Periksa" value="<?php echo $tgl_periksa ?>"/>
									<?php } else { ?>
									<input type="text" class="form-control" name="tgl_periksa" id="tgl_periksa" placeholder="Tgl Periksa" value="<?php echo date('d-m-Y') ?>" readonly/>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>