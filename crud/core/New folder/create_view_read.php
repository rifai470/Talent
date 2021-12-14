<?php 

$string = "<div class=\"content-wrapper\">
	<section class=\"content\" style=\"padding-top: 1%\">
		<div class=\"container-fluid\">
			<div class=\"row\">
				<div class=\"col-md-12\">
					<div class=\"card card-info\">
						<div class=\"card-header\">
							<h3 class=\"card-title\">READ ".strtoupper(str_replace("_"," ",$table_name))."</h3>
						</div>
						<div class=\"card-body\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <div class=\"form-group\">
							<label for=\"".label($row["column_name"])."\">".label($row["column_name"])."</label>
							<input type=\"text\" class=\"form-control\" id=\"".$row["column_name"]."\" value=\"<?php echo $".$row["column_name"]."; ?>\" readonly/>
						</div>";
}
$string .= "\n\t    </div>
						<div class=\"card-footer\">
							<a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-info\"><i class=\"fa fa-sign-out\"></i> Back</a>
						</div>";
$string .= "\n\t</div>
        	</div>
		</div>
	</div>
</section>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>