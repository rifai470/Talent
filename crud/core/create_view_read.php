<?php 
$strArr = explode("_", $table_name);
$string = "<style>
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
<div class=\"content-wrapper\">
	<section class=\"content\" style=\"padding-top: 1%\">
		<div class=\"container-fluid\">
			<div class=\"row\">
				<div class=\"col-md-12\">
					<div class=\"card card-info\">
						<div class=\"card-header\">
							<h3 class=\"card-title\">".strtoupper($strArr[1])."  ".strtoupper($strArr[2])." ".strtoupper($strArr[3])."</h3>
						</div>
						<div class=\"card-body\">
						<table class=\"table-read\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr>
							<td width=\"20%\">".label($row["column_name"])."</td>
							<td width=\"2%\">:</td>
							<td><?php echo $".$row["column_name"]."; ?></td>
						</tr>";
}
$string .= "\n\t</table>
					</div>
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