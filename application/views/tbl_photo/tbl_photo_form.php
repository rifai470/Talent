<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">PHOTO   </h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
	  
		<div class="form-group">
			<label for="photo">Photo <?php echo form_error('photo') ?></label>
			<textarea class="form-control" name="photo" id="photo" placeholder="Photo"><?php echo $photo; ?></textarea>
		</div>
	<div class="form-group">
			<label for="id_talent">Code Talent <?php echo form_error('code_talent') ?></label>
			<input type="text" class="form-control" name="id_talent" id="code_talent" placeholder="Code Talent" value="<?php echo $code_talent; ?>"/>
		</div>
	</div>
			<div class="card-footer">
			<input type="hidden" name="id_photo" value="<?php echo $id_photo; ?>" />
	    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_photo') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a></div>
	</form>
			</div>
		</div>
	</div>
</div>
</section>
</div>