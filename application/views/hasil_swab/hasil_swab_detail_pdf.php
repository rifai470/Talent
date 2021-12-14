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
									<td width="180px"></td>
									<td width="180px"></td>
									<td colspan="2" style="padding-left: 25%; padding-top: 5%"><p align="center"><h3 style="text-align: center; padding-right: 5%"><b>HASIL SWAB DETAIL</b></h3></p></td>
								</tr>
							</table>
						</header>
							<table class="table-read">
								<tr>
									<td width="130px">Nama Lengkap</td>
									<td width="2px">:</td>
									<td>
										<?php echo $nama_lengkap; ?>
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
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td>
										<?php echo $tgl_lahir; ?>
									</td>
								</tr>
								<tr>
									<td>Jenis Pemeriksaan</td>
									<td>:</td>
									<td>
										<?php echo $jenis_pemeriksaan; ?>
									</td>
								</tr>
								<tr>
									<td>No Rekam Medis</td>
									<td>:</td>
									<td>
										<?php echo $no_rekam_medis; ?>
									</td>
								</tr>
								<tr>
									<td>Suhu</td>
									<td>:</td>
									<td>
										<?php echo $suhu; ?>
									</td>
								</tr>
								<tr>
									<td>Saturasi</td>
									<td>:</td>
									<td>
										<?php echo $saturasi; ?>
									</td>
								</tr>
								<tr>
									<td>Hasil Swab</td>
									<td>:</td>
									<td>
										<?php echo $swab_antigen; ?>
									</td>
								</tr>
								<tr>
									<td>Tanggal Periksa</td>
									<td>:</td>
									<td>
										<?php echo $tgl_periksa; ?>
									</td>
								</tr>
							</table>
					<footer>
						<p><h5 style="text-align: center; padding-left: 130px; vertical-align: top">In Partnership with &nbsp;<img width="130px" src="<?php echo base_url('assets/images/Mustika-Ratu-Horizontal.png') ?>" /></h5></
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