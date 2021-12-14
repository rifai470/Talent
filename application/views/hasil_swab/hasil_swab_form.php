<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">HASIL SWAB</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="no_rekam_medis">Pasien <?php echo form_error('no_rekam_medis') ?></label>
									<?php echo cmb_dinamis('no_rekam_medis', 'pasien', 'nama_lengkap', 'no_rekam_medis', $no_rekam_medis, 'DESC') ?>
								</div>
								<div class="form-group">
									<label for="jenis_pemeriksaan">Jenis Pemeriksaan <?php echo form_error('jenis_pemeriksaan') ?></label>
									<?php echo cmb_dinamis('jenis_pemeriksaan', 'jenis_pemeriksaan', 'jenis_pemeriksaan', 'id_jenis_pemeriksaan', $id_jenis_pemeriksaan, 'ASC') ?>
								</div>
								<div class="form-group">
									<label for="klinik">RS / Klinik <?php echo form_error('klinik') ?></label>
									<?php echo cmb_dinamis('id_klinik', 'klinik', 'nama_klinik', 'id_klinik', $id_klinik, 'DESC') ?>
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
									<label for="swab_antigen">Hasil Swab Antigen <?php echo form_error('swab_antigen') ?></label>
									<input type="text" class="form-control" name="swab_antigen" id="swab_antigen" placeholder="Swab Antigen" value="<?php echo $swab_antigen; ?>"/>
								</div>
								<div class="form-group">
									<label for="tgl_periksa">Tgl Periksa <?php echo form_error('tgl_periksa') ?></label>
									<input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" placeholder="Tgl Periksa" value="<?php echo $tgl_periksa; ?>"/>
								</div>
							</div>
							<div class="card-footer">
								<input type="hidden" name="hasil_id" value="<?php echo $hasil_id; ?>"/>
								<button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('hasil_swab') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>