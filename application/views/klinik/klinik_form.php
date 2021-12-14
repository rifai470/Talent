<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">KLINIK</h3>
						</div>
						<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
							<div class="card-body">
	<div class="form-group">
			<label for="nama_klinik">Nama Klinik <?php echo form_error('nama_klinik') ?></label>
			<input type="text" class="form-control" name="nama_klinik" id="nama_klinik" placeholder="Nama Klinik" value="<?php echo $nama_klinik; ?>"/>
		</div>
	<div class="form-group">
			<label for="alamat_klinik">Alamat Klinik <?php echo form_error('alamat_klinik') ?></label>
			<textarea class="form-control" name="alamat_klinik" id="alamat_klinik" placeholder="Alamat Klinik"><?php echo $alamat_klinik; ?></textarea>
		</div>
	<div class="form-group">
			<label for="kota">Kota <?php echo form_error('kota') ?></label>
			<?php echo cmb_dinamis('kota', 'kota', 'nama_kota', 'nama_kota', $kota, 'ASC') ?>
		</div>
	<div class="form-group">
			<label for="provinsi">Provinsi <?php echo form_error('provinsi') ?></label>
			<select id="provinsi" name="provinsi" class="form-control select2">
			</select>
		</div>
	<div class="form-group">
			<label for="phone">Phone <?php echo form_error('phone') ?></label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>"/>
		</div>
	<div class="form-group">
			<label for="other_phone">Other Phone <?php echo form_error('other_phone') ?></label>
			<input type="text" class="form-control" name="other_phone" id="other_phone" placeholder="Other Phone" value="<?php echo $other_phone; ?>"/>
		</div>
	<div class="form-group">
			<label for="fax">Fax <?php echo form_error('fax') ?></label>
			<input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" value="<?php echo $fax; ?>"/>
		</div>
	<div class="form-group">
			<label for="id_dokter">Dokter <?php echo form_error('id_dokter') ?></label>
			<?php echo cmb_dinamis('id_dokter', 'dokter', 'nama_dokter', 'id_dokter', $id_dokter, 'ASC') ?>
		</div>
	<div class="form-group">
			<label for="image_klinik">Logo Klinik <?php echo form_error('image_klinik') ?></label>
			<input type="file" class="form-control" name="image_klinik" />
		</div>
	</div>
			<div class="card-footer">
			<input type="hidden" name="id_klinik" value="<?php echo $id_klinik; ?>" />
	    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('klinik') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a></div>
	</form>
			</div>
		</div>
	</div>
</div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.10.2.js' ?>"></script>
<script type="text/javascript">
$( document ).ready( function () {
		$( '#kota' ).change( function () {
			var id = $( this ).val();
			$.ajax( {
				url: "<?php echo site_url('klinik/get_provinsi'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function ( data ) {
					var html = '';
					var i;
					for ( i = 0; i < data.length; i++ ) {
						html += '<option value="' + data[i].nama_provinsi + '">' + data[i].nama_provinsi + '</option>';
					}
					$( '#provinsi' ).html( html );

				}
			} );
			return false;
		} );
	});
</script>