<html>
	<head>
<style>
	.table-read {
		width: 90%;
		font-family: 'calibri';
    	font-size:15px;
	}
	
	.table-read td {
/*		border-bottom: 1px solid #dee2e6;*/
		padding: 0.3srem;
	}
	
	.table-read1 {
		border-spacing: 0.5rem;
		border-collapse: collapse;
		width: 100%;
		font-family: 'calibri';
    	font-size:16px;
	}
	
	.table-read1 td {
/*		border-bottom: 1px solid #dee2e6;*/
		padding: 0.5rem;
	}
	
	@page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 5cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 2cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }

</style>
	</head>
	<body>
<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-body">
							<header>
							<table class="table-read1">
								<tr>
									<td width="25%"></td>
									<td width="100px"><img width="100px" src="<?php echo base_url('assets/images/logo/'), $image_klinik; ?>" /></td>
									<td colspan="2" style="padding-right: 10%"><p align="center"><h3 style="text-align: center; padding-right: 5%"><b><?php echo $nama_klinik; ?></b></h3><br/><h5 style="text-align: center"><?php echo $alamat_klinik; ?><br/>Telp. : <?php echo $phone; ?>, Telp. : <?php echo $other_phone; ?>, Fax. : <?php echo $fax; ?></h5></p></td>
								</tr>
							</table>
						</header>
								<hr/>
							<table class="table-read">
								<tr><td colspan="3"><h2 style="text-align: center;"><b><u>Surat Keterangan</u></b></h2></td></tr>
								<tr>
									<td width="150px">No Rekam Medis</td>
									<td width="1px">:</td>
									<td>
										<?php echo $no_rekam_medis; ?>
									</td>
								</tr>
								<tr>
									<td>Perihal</td>
									<td>:</td>
									<td>
										Keterangan Hasil <b><?php echo $jenis_pemeriksaan; ?></b>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td colspan="3">Bersama ini Menyatakan :</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td>Nama Lengkap</td>
									<td>:</td>
									<td>
										<?php echo $nama_lengkap; ?>
									</td>
								</tr>
								<tr>
									<td>KTP</td>
									<td>:</td>
									<td>
										<?php echo $ktp; ?>
									</td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td>
										<?php echo $tgl_lahir; ?>
									</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td>
										<?php echo $jenis_kelamin; ?>
									</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td>
										<?php echo $alamat; ?>
									</td>
								</tr>
								<tr>
									<td>Perusahaan</td>
									<td>:</td>
									<td>
										<?php echo $perusahaan; ?>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td colspan="3">Telah dilakukan Pemeriksaan <b><?php echo $jenis_pemeriksaan; ?></b> dengan hasil sbb :</td>
								</tr>
								<tr>
									<td>Tanggal Periksa</td>
									<td>:</td>
									<td>
										<?php echo $tgl_periksa; ?>
									</td>
								</tr>
								<tr>
									<td>Suhu</td>
									<td>:</td>
									<td>
										<?php echo $suhu; ?> &deg;C
									</td>
								</tr>
								<tr>
									<td>Saturasi</td>
									<td>:</td>
									<td>
										<?php echo $saturasi; ?>%
									</td>
								</tr>
								<tr>
									<td>Hasil Swab Antigen</td>
									<td>:</td>
									<td>
										<?php echo $swab_antigen; ?>
									</td>
								</tr>
								<tr><td></td></tr>
								<tr>
									<td colspan="3">Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya</td>
								</tr>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td colspan="3"><?php echo $kota; ?>, <?php echo $tgl_periksa; ?></td>
								</tr>
								<tr>
									<?php if($image_ttd){ ?>
									<td><img width="100px" src="<?php echo base_url('assets/images/ttd/'), $image_ttd; ?>" /></td>
									<?php } else { ?>
									<td style="padding-bottom: 65px"></td>
									<?php } ?>
								</tr>
								<tr>
									<td colspan="3">Penanggung jawab Klinik<br/><?php echo $nama_dokter; ?></td>
								</tr>
								
							</table>
					<footer>
						<h5 style="text-align: center; padding-left: 130px">In Partnership with Mustika Ratu</h5>
					</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</body>
</html>