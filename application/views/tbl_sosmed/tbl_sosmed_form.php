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
			<label for="instagram">Instagram <?php echo form_error('instagram') ?></label>
			<input type="text" class="form-control" name="instagram" id="instagram" placeholder="instagram" value="<?php echo $instagram; ?>"/>
		</div>
	  
		<div class="form-group">
			<label for="facebook">Facebook <?php echo form_error('facebook') ?></label>
			<input type="text" class="form-control" name="facebook" id="facebook" placeholder="facebook" value="<?php echo $facebook; ?>"/>
		</div>
		<div class="form-group">
			<label for="twitter">Twitter <?php echo form_error('twitter') ?></label>
			<input type="text" class="form-control" name="twitter" id="twitter" placeholder="twitter" value="<?php echo $twitter; ?>"/>
		</div>

		<div class="form-group">
			<label for="tiktok">Tiktok <?php echo form_error('tiktok') ?></label>
			<input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="tiktok" value="<?php echo $tiktok; ?>"/>
		</div>
		<div class="form-group">
			<label for="youtube">Youtube <?php echo form_error('youtube') ?></label>
			<input type="text" class="form-control" name="youtube" id="youtube" placeholder="youtube" value="<?php echo $youtube; ?>"/>
		</div>
	  
		<div class="form-group">
			<label for="other">other <?php echo form_error('other') ?></label>
			<input type="text" class="form-control" name="other" id="other" placeholder="other" value="<?php echo $other; ?>"/>
		</div>

	<div class="form-group">
			<label for="code_talent">Code Talent <?php echo form_error('code_talent') ?></label>
			<input type="text" class="form-control" name="code_talent" id="code_talent" placeholder="Id Talent" value="<?php echo $code_talent; ?>"/>
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