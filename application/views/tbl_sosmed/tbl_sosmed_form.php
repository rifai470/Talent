<div class="content-wrapper">
	<section class="content" style="padding-top: 1%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title">SOSMED   </h3>
						</div>
						<form action="<?php echo $action; ?>" method="post">
							<div class="card-body">
	<div class="form-group">
			<label for="sosmed">Sosmed <?php echo form_error('sosmed') ?></label>
			<input type="text" class="form-control" name="sosmed" id="sosmed" placeholder="Sosmed" value="<?php echo $sosmed; ?>"/>
		</div>
	  
		<div class="form-group">
			<label for="url">Url <?php echo form_error('url') ?></label>
			<textarea class="form-control" name="url" id="url" placeholder="Url"><?php echo $url; ?></textarea>
		</div>
	<div class="form-group">
			<label for="id_talent">Id Talent <?php echo form_error('id_talent') ?></label>
			<input type="text" class="form-control" name="id_talent" id="id_talent" placeholder="Id Talent" value="<?php echo $id_talent; ?>"/>
		</div>
	<div class="form-group">
			<label for="SecLogUser">SecLogUser <?php echo form_error('SecLogUser') ?></label>
			<input type="text" class="form-control" name="SecLogUser" id="SecLogUser" placeholder="SecLogUser" value="<?php echo $SecLogUser; ?>"/>
		</div>
	<div class="form-group">
			<label for="SecLogDate">SecLogDate <?php echo form_error('SecLogDate') ?></label>
			<input type="date" class="form-control" name="SecLogDate" id="SecLogDate" placeholder="SecLogDate" value="<?php echo $SecLogDate; ?>" />
		</div>
	</div>
			<div class="card-footer">
			<input type="hidden" name="id_sosmed" value="<?php echo $id_sosmed; ?>" />
	    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_sosmed') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a></div>
	</form>
			</div>
		</div>
	</div>
</div>
</section>
</div>