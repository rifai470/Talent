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
									<td width="15%"></td>
									<td width="150px"><img height="150px" width="150px" src="<?php echo base_url('assets/images/logo/'), $image_klinik; ?>" /></td>
									<td colspan="2" style="padding-right: 10%"><p align="center"><h3 style="text-align: center; padding-right: 5%"><b><?php echo $nama_klinik; ?></b></h3><br/><h5 style="text-align: center"><?php echo $alamat_klinik; ?><br/>Telp. : <?php echo $phone; ?>, Telp. : <?php echo $other_phone; ?>, Fax. : <?php echo $fax; ?></h5></p></td>
								</tr>
							</table>
								<hr/>
							<table class="table-read">
								<tr><td colspan="4"><h4 style="text-align: center; padding-left: 20%"><b><u>Surat Keterangan</u></b></h4></td></tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">No Rekam Medis</td>
									<td width="2%">:</td>
									<td>
										<?php echo $no_rekam_medis; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Perihal</td>
									<td width="2%">:</td>
									<td>
										Keterangan Hasil <b><?php echo $jenis_pemeriksaan; ?></b>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%">Bersama ini Menyatakan :</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Nama Lengkap</td>
									<td width="2%">:</td>
									<td>
										<?php echo $nama_lengkap; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">KTP</td>
									<td width="2%">:</td>
									<td>
										<?php if($ktp){ ?>
										<?php echo $ktp; ?>
										<?php } else { ?>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Tanggal Lahir</td>
									<td width="2%">:</td>
									<td>
										<?php echo $tgl_lahir; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Jenis Kelamin</td>
									<td width="2%">:</td>
									<td>
										<?php echo $jenis_kelamin; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Alamat</td>
									<td width="2%">:</td>
									<td>
										<?php echo $alamat; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Perusahaan</td>
									<td width="2%">:</td>
									<td>
										<?php echo $perusahaan; ?>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%">Telah dilakukan Pemeriksaan <b><?php echo $jenis_pemeriksaan; ?></b> dengan hasil sbb :</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Tanggal Periksa</td>
									<td width="2%">:</td>
									<td>
										<?php echo $tgl_periksa; ?>
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Suhu</td>
									<td width="2%">:</td>
									<td>
										<?php echo $suhu; ?> &deg;C
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Saturasi</td>
									<td width="2%">:</td>
									<td>
										<?php echo $saturasi; ?>%
									</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="15%">Hasil Swab Antigen</td>
									<td width="2%">:</td>
									<td>
										<?php echo $swab_antigen; ?>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%">Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya</td>
								</tr>
								<tr><td></td></tr>
								<tr><td></td></tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%"><?php echo $kota; ?>, <?php echo $tgl_periksa; ?></td>
								</tr>
								<tr>
									<td width="15%"></td>
									<?php if($image_ttd){ ?>
									<td><img width="100px" src="<?php echo base_url('assets/images/ttd/'), $image_ttd; ?>" /></td>
									<?php } else { ?>
									<td style="padding-bottom: 80px"></td>
									<?php } ?>
								</tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%">Penanggung jawab Klinik</td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td colspan="3" width="15%"><?php echo $nama_dokter; ?></td>
								</tr>
								
							</table>
						</div>
						<div class="card-footer">
							<a href="<?php echo site_url('hasil_swab') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
							<a href="<?php echo site_url('hasil_swab/pdf/' . $hasil_id . '') ?>" target="parent" class="btn btn-danger">Print</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>