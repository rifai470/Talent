<style>
	.tm {
        position: relative;
        /*width: 150px; height: 20px;*/
        /*color: white;*/
        
        display: block;
        width: 100%;
        height: 2.4rem;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        align-content: center;
    }

    .tm:before {
        position: absolute;
        top: 10px; left: 3px;
        content: attr(data-date);
        display: block;
        color: #495057;
    }

    .tm::-webkit-datetime-edit, .tm::-webkit-inner-spin-button, .tm::-webkit-clear-button {
        display: none;
    }

    .tm::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 10px;
        right: 0;
        color: #495057;
    }
</style>
<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">PASIEN</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
	<div class="form-group">
			<label for="nama_lengkap">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
			<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>"/>
		</div>
	<div class="form-group">
			<label for="ktp">Ktp <?php echo form_error('ktp') ?></label>
			<input type="text" class="form-control" name="ktp" id="ktp" placeholder="Ktp" value="<?php echo $ktp; ?>"/>
		</div>
	<div class="form-group">
			<label for="tgl_lahir">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
			<input type="date" class="tm form-control" name="tgl_lahir" id="tgl_lahir" dateformat="d M y" value="<?php echo $tgl_lahir; ?>" />
		</div>
	<div class="form-group">
			<label for="jenis_kelamin">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
			<?php echo cmb_dinamis('jenis_kelamin', 'tbl_gender', 'nama_gender', 'nama_gender', $jenis_kelamin, 'DESC') ?>
		</div>
	<div class="form-group">
			<label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
			<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>"/>
		</div>
	<div class="form-group">
			<label for="email">Email <?php echo form_error('email') ?></label>
			<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>"/>
		</div>
<!--
	<div class="form-group">
			<label for="no_rekam_medis">No Rekam Medis <?php echo form_error('no_rekam_medis') ?></label>
			<input type="text" class="form-control" name="no_rekam_medis" id="no_rekam_medis" placeholder="No Rekam Medis" value="<?php echo $no_rekam_medis; ?>"/>
		</div>
-->
	<div class="form-group">
			<label for="phone">Phone <?php echo form_error('phone') ?></label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>"/>
		</div>
	<div class="form-group">
			<label for="perusahaan">Perusahaan <?php echo form_error('perusahaan') ?></label>
			<input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>"/>
		</div>
<!--
	  
		<div class="form-group">
			<label for="images">Images <?php echo form_error('images') ?></label>
			<input type="file" class="form-control" name="images" id="images"/>
		</div>
-->
	</div>
			<div class="card-footer">
			<input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" />
			<input type="hidden" name="no_pasien" value="<?php echo $no_pasien; ?>" />
	    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a></div>
	</form>
			</div>
		</div>
	</div>
</div>
</section>
</div>
<!--
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.12.4.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
-->
<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
<script>
    
    $(".tm").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
    }).trigger("change")

</script>