<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<div class="content-wrapper">
	<section class="content-header" style="padding: 5px .5rem;">
		<div class="container-fluid">
			<?php if ($this->session->userdata('message')) { ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
			</div>
			<?php } ?>
			<?php if ($this->session->userdata('error')) { ?>
				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
			<?php } ?>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-info">
						<div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
							<h3 class="card-title"> PASIEN</h3>
							<div class="card-tools">
								<?php echo anchor(site_url('pasien/create'), '<i class="fab fa-wpforms" aria-hidden="true">
							</i> New', 'class="btn btn-danger btn-sm"'); ?>
								<?php echo anchor(site_url('pasien/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
								<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import-pasien"><i class="fa fa-upload" aria-hidden="true"></i> Import Data Excel</button>
								<a href="<?php echo base_url('/assets/templates/Template Upload Pasien.xlsx') ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Download Templates</a>
								<button class="btn btn-tool" onclick="window.location.href='<?php echo site_url();?>/pasien';"><i class="fas fa-redo-alt"></i></button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped" id="mytable">
								<thead>
									<tr>
										<th width="30px">#</th>
										<th>Perusahaan</th>
										<th>Nama</th>
										<th>No Pasien</th>
										<th>Jenis Kelamin</th>
										<th>Hasil Swab</th>
										<!--		    <th>Images</th>-->
										<th width="150px">&nbsp;</th>
									</tr>
								</thead>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
$data[ 'judul' ] = 'Pasien';
$data[ 'url' ] = 'Pasien/import';
echo show_my_modal( 'pasien/import', 'import-pasien', $data );
?>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
	$( document ).ready( function () {
		$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ) {
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
				"iTotalPages": Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
			};
		};

		var t = $( "#mytable" ).dataTable( {
			initComplete: function () {
				var api = this.api();
				$( '#mytable_filter input' )
					.off( '.DT' )
					.on( 'keyup.DT', function ( e ) {
						if ( e.keyCode == 13 ) {
							api.search( this.value ).draw();
						}
					} );
			},
			oLanguage: {
				sProcessing: "loading..."
			},
			"responsive": true,
			"autoWidth": false,
			processing: true,
			serverSide: true,
			ajax: {
				"url": "pasien/json",
				"type": "POST"
			},
			pageLength: 25,
			lengthMenu: [ 25, 50, 100 ],
			columns: [ {
				"data": "id_pasien",
				"orderable": false
			}, {
				"data": "perusahaan"
			}, {
				"data": "nama_lengkap"
			}, {
				"data": "no_pasien"
			}, {
				"data": "jenis_kelamin"
			}, {
				"data": "hasil",
				render: function ( data ) {
					if ( data != 0 ) {
						return '<div class="btn btn-success btn-sm">Hasil Swab : '+data+'</div>'
					} else {
						return '<div class="btn btn-success btn-sm">Hasil Swab : 0</div>'
					}
				}
			}, {
				"data": "action",
				"orderable": false,
				"className": "text-center"
			} ],
			order: [
				[ 1, 'asc' ]
			],
			rowCallback: function ( row, data, iDisplayIndex ) {
				var info = this.fnPagingInfo();
				var page = info.iPage;
				var length = info.iLength;
				var index = page * length + ( iDisplayIndex + 1 );
				$( 'td:eq(0)', row ).html( index );
			}
		} );
	} );
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>