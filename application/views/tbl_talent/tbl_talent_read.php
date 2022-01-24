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
				<!-- Card Talent -->
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">TALENT </h3>
						</div>
						<div class="card-body">
							<table class="table-read">
								<tr>
									<td width="20%">Nama</td>
									<td width="2%">:</td>
									<td><?php echo $nama; ?></td>
								</tr>
								<tr>
									<td width="20%">Nama Panggilan</td>
									<td width="2%">:</td>
									<td><?php echo $nama_panggilan; ?></td>
								</tr>
								<tr>
									<td width="20%">Tempat</td>
									<td width="2%">:</td>
									<td><?php echo $tempat; ?></td>
								</tr>
								<tr>
									<td width="20%">Tanggal Lahir</td>
									<td width="2%">:</td>
									<td><?php echo $tanggal_lahir; ?></td>
								</tr>
								<tr>
									<td width="20%">Usia</td>
									<td width="2%">:</td>
									<td><?php echo $usia; ?></td>
								</tr>
								<tr>
									<td width="20%">Jenis Kelamin</td>
									<td width="2%">:</td>
									<td><?php echo $jenis_kelamin; ?></td>
								</tr>
								<tr>
									<td width="20%">Hobby</td>
									<td width="2%">:</td>
									<td><?php echo $hobby; ?></td>
								</tr>
								<tr>
									<td width="20%">Pendidikan</td>
									<td width="2%">:</td>
									<td><?php echo $pendidikan; ?></td>
								</tr>
								<tr>
									<td width="20%">Pekerjaan</td>
									<td width="2%">:</td>
									<td><?php echo $pekerjaan; ?></td>
								</tr>
								<tr>
									<td width="20%">Bahasa</td>
									<td width="2%">:</td>
									<td><?php echo $bahasa; ?></td>
								</tr>
								<tr>
									<td width="20%">Tinggi Badan</td>
									<td width="2%">:</td>
									<td><?php echo $tinggi_badan; ?></td>
								</tr>
								<tr>
									<td width="20%">Berat Badan</td>
									<td width="2%">:</td>
									<td><?php echo $berat_badan; ?></td>
								</tr>
								<tr>
									<td width="20%">Kategori</td>
									<td width="2%">:</td>
									<td><?php echo $id_kategori; ?></td>
								</tr>
								<tr>
									<td width="20%">Tentang</td>
									<td width="2%">:</td>
									<td ><?php echo $tentang; ?></td>
								</tr>
								<tr>
									<td width="20%">Tarif Min.</td>
									<td width="2%">:</td>
									<td><?php echo $tarif_minimum; ?></td>
								</tr>
								<tr>
									<td width="20%">Tarif Max.</td>
									<td width="2%">:</td>
									<td><?php echo $tarif_maximum; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
		
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
								<h3 class="card-title">PHOTO </h3>
							</div>
							<div class="card-body">
								<table class="table-read">
									<tr>
									<?php $no = 0;
									foreach ($row_photo as $photo) : $no++; ?>
									<img class="card-widget widget-user" src="<?php echo base_url('uploads/photo/' . $photo->photo . ''); ?>" style="height:180px; width: auto; max-width: 270px; object-fit: cover; padding-right: 10px;">
									<?php endforeach; ?>
									</tr>
								</table>
							</div>
						</div>
						<div class="card card-info">
							<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
								<h3 class="card-title">SOSIAL MEDIA </h3>
							</div>
							<div class="card-body">
								<table class="table-read">
									<tr>
										<td width="150px">Instagram</td>
										<td width="10px">:</td>
										<td><a href="https://<?php echo $instagram; ?>"></a><?php echo $instagram; ?></td>
									</tr>
									<tr>
										<td>Facebook</td>
										<td>:</td>
										<td><a href="https://<?php echo $instagram; ?>"></a><?php echo $facebook; ?></td>
									</tr>
									<tr>
										<td>Twitter</td>
										<td>:</td>
										<td><a href="https://<?php echo $instagram; ?>"></a><?php echo $twitter; ?></td>
									</tr>
									<tr>
										<td>Other</td>
										<td>:</td>
										<td><a href="https://<?php echo $instagram; ?>"></a><?php echo $other; ?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card card-info">
							<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
								<h3 class="card-title">PORTOFOLIO </h3>
							</div>
							<div class="card-body">
								<table class="table-read">
								<?php echo $prestasi; ?>
								</table>
							</div>
						</div>
						<div class="card card-info">
							<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
								<h3 class="card-title">TAGS </h3>
							</div>
							<div class="card-body">
								<table class="table-read">
									<tr>
									<?php $no = 0;
									foreach ($row_tags_by_id as $tags) : $no++; ?> 
									<button class="btn btn-sm" style="font-size: 14px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px; margin-right: 5px;"><?php echo $tags['tags']; ?></button> 
									<?php endforeach; ?>
									</tr>
								</table>
							</div>
						</div>
						<div class="card-footer">
						<div class="float-right d-none d-sm-block">
							<a href="<?php echo site_url('tbl_talent_verify') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
						</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>