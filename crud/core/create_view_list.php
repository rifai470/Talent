<?php 

$string = "<div class=\"content-wrapper\">
	<section class=\"content-header\">
		<div class=\"container-fluid\">
			<div class=\"row mb-2\">
				<div class=\"col-sm-6\">
					<h3 class=\"card-title\">MANAGE DATA ".strtoupper(str_replace("_"," ",$table_name))."</h3>
				</div>
			</div>
			<?php if (\$this->session->userdata('message')) { ?>
			<div class=\"alert alert-danger alert-dismissible\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				<h5><i class=\"icon fas fa-check\"></i> Alert!</h5>
				<?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
			</div>
			<?php } ?>
		</div>
	</section>
	<section class=\"content\">
		<div class=\"container-fluid\">
			<div class=\"row\">
				<div class=\"col-12\">
					<div class=\"card card-info\">
						<div class=\"card-header\">
							<?php echo anchor(site_url('".$c_url."/create'), '<i class=\"fab fa-wpforms\" aria-hidden=\"true\">
							</i> Add New', 'class=\"btn btn-danger btn-sm\"'); ?>
							<div class=\"card-tools\">
								<button class=\"btn btn-tool\" onclick=\"window.location.href='<?php echo site_url();?>/".$c_url."';\"><i class=\"fas fa-redo-alt\"></i></button>
								<button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\"><i class=\"fas fa-minus\"></i></button>
							</div>";

if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> Export Ms Excel', 'class=\"btn btn-success btn-sm\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Export Ms Word', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string.="</div>
			<div class=\"card-body\">
				<table id=\"datatable\" class=\"table table-bordered table-striped\">
					<thead>
						<tr>
							<th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>
				</thead>";
$string .= "<tbody>
				<?php foreach ($" . $c_url . "_data as \$$c_url) { ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"10px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>','class=\"btn btn-success btn-sm\"'); "
        . "\n\t\t\t\techo '  '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-edit\" aria-hidden=\"true\"></i>','class=\"btn btn-warning btn-sm\"'); "
        . "\n\t\t\t\techo '  '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>','class=\"btn btn-danger btn-sm\" Delete, 	onclick=\"javascript: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php } ?>
			</tbody>
        </table>";

$string .= "\n\t    </div>
        		</div>
        	</div>
       	</div>
	</div>
    </section>
</div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>