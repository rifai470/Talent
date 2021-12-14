<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h3 class="card-title">MANAGE DATA USER LEVEL</h3>
				</div>
			</div>
			<?php if ($this->session->userdata('message')) { ?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
			</div>
			<?php } ?>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-info">
						<div class="card-header">
							<?php echo anchor(site_url('userlevel/create'), '<i class="fab fa-wpforms" aria-hidden="true"></i> Add New', 'class="btn btn-danger btn-sm"'); ?>
							<?php echo anchor(site_url('userlevel/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
							<?php echo anchor(site_url('userlevel/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
							<div class="card-tools">
								<button class="btn btn-tool" onclick="window.location.href='<?php echo site_url();?>/user';"><i class="fas fa-redo-alt"></i></button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped" id="mytable">
								<thead>
									<tr>
										<th width="30px">No</th>
										<th>Nama Level</th>
										<th width="200px">Action</th>
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
			processing: true,
			serverSide: true,
			ajax: {
				"url": "userlevel/json",
				"type": "POST"
			},
			columns: [ {
				"data": "id_user_level",
				"orderable": false
			}, {"data": "nama_level",
                        	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).html("<a href='userlevel/akses/"+oData.id_user_level+"'>"+oData.nama_level+"</a>");
                            }
                        }, {
				"data": "action",
				"orderable": false,
				"className": "text-center"
			} ],
			order: [
				[ 0, 'desc' ]
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