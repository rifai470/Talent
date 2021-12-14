<?php 
$strArr = explode("_", $table_name);
$string = "<div class=\"content-wrapper\">
	<section class=\"content-header\" style=\"padding: 5px .5rem;\" >
		<div class=\"container-fluid\">
			<?php if (\$this->session->userdata('message')) { ?>
			<div class=\"alert alert-success alert-dismissible\">
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
						<div class=\"card-header\" style=\"background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));\">
							<h3 class=\"card-title\">".strtoupper($strArr[1])."  ".strtoupper($strArr[2])." ".strtoupper($strArr[3])."</h3>
							<div class=\"card-tools\">
								<?php echo anchor(site_url('".$c_url."/create'), '<i class=\"fab fa-wpforms\" aria-hidden=\"true\">
							</i> New', 'class=\"btn btn-danger btn-sm\"'); ?> ";
							
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> Export Ms Excel', 'class=\"btn btn-success btn-sm\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Export Ms Word', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}	
								
$string.="<button class=\"btn btn-tool\" onclick=\"window.location.href='<?php echo site_url();?>/".$c_url."';\"><i class=\"fas fa-redo-alt\"></i></button>";
		/* $string.="<button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\"><i class=\"fas fa-minus\"></i></button>"; */

$string.="</div>";

$string.="</div>
			<div class=\"card-body\">
        		<table class=\"table table-bordered table-striped\" id=\"mytable\">
            		<thead>
                		<tr>
                    		<th width=\"30px\">#</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th width=\"150px\">&nbsp;</th>
                </tr>
            </thead>";

$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "\n\t    
        </table>
        </div>
        		</div>
        	</div>
       	</div>
	</div>
    </section>
</div>
        <script src=\"<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: \"loading...\"
                    },
					\"responsive\": true,
      				\"autoWidth\": false,
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"".$c_url."/json\", \"type\": \"POST\"},
					pageLength: 25,
    				lengthMenu: [25, 50, 100],
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": false
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
                        }
                    ],
                    order: [[1, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>