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
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">PHOTO   </h3>
						</div>
						<div class="card-body">
						<table class="table-read">
	    <tr>
							<td width="20%">Photo</td>
							<td width="2%">:</td>
							<td><?php echo $photo; ?></td>
						</tr>
	    <tr>
							<td width="20%">Code Talent</td>
							<td width="2%">:</td>
							<td><?php echo $code_talent; ?></td>
						</tr>
	    <tr>
							<td width="20%">SecLogUser</td>
							<td width="2%">:</td>
							<td><?php echo $SecLogUser; ?></td>
						</tr>
	    <tr>
							<td width="20%">SecLogDate</td>
							<td width="2%">:</td>
							<td><?php echo $SecLogDate; ?></td>
						</tr>
	</table>
					</div>
						<div class="card-footer">
							<a href="<?php echo site_url('tbl_photo') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
						</div>
	</div>
        	</div>
		</div>
	</div>
</section>
</div>