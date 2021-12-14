<?php 
$strArr = explode("_", $table_name);
$string = "<div class=\"content-wrapper\">
	<section class=\"content\" style=\"padding-top: 1%\">
		<div class=\"container-fluid\">
			<div class=\"row\">
				<div class=\"col-md-12\">
					<div class=\"card card-info\">
						<div class=\"card-header\" style=\"background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));\">
							<h3 class=\"card-title\">".strtoupper($strArr[1])."  ".strtoupper($strArr[2])." ".strtoupper($strArr[3])."</h3>
						</div>
						<form action=\"<?php echo \$action; ?>\" method=\"post\">
							<div class=\"card-body\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t  
		<div class=\"form-group\">
			<label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
			<textarea class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
		</div>";
    }elseif($row["data_type"]=='email'){
        $string .= "\n\t<div class=\"form-group\">
			<label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
			<input type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
		</div>";    
    }
    elseif($row["data_type"]=='date'){
        $string .= "\n\t<div class=\"form-group\">
			<label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
			<input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
		</div>";    
        } 
    else
    {
    $string .= "\n\t<div class=\"form-group\">
			<label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
			<input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\"/>
		</div>";
    }
}
$string .= "\n\t</div>
			<div class=\"card-footer\">
			<input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" />";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-info\"><i class=\"fa fa-floppy-o\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-danger\"><i class=\"fa fa-sign-out\"></i> Cancel</a></div>";
$string .= "\n\t</form>
			</div>
		</div>
	</div>
</div>
</section>
</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>