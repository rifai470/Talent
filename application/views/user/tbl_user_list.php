<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
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
                    <div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
                      <h3 class="card-title">USER ACTIVE</h3>
                      <div class="card-tools">
                      <?php echo anchor(site_url('user/create'), '<i class="far fa-plus-square" aria-hidden="true"></i>
                                    </i> New', 'class="btn btn-danger btn-sm"'); ?>
                         <?php echo anchor(site_url('user/excel'), '<i class="fa fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                        <button class="btn btn-tool" onclick="window.location.href='<?php echo site_url();?>/user';"><i class="fas fa-redo-alt"></i></button>
                      </div>
                    </div>
						
						<div class="card-body">
						<table class="table table-bordered table-striped" id="mytable">
							<thead>
								<tr>
									<th width="30px">No</th>
									<th>Full Name</th>
                                    <th>Username</th>
									<th>Contact</th>
									<th>Company</th>
									<th>Status</th>
									<th width="200px">&nbsp;</th>
								</tr>
							</thead>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-info">
                    <div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
                      <h3 class="card-title">USER NON ACTIVE</h3>
                      <div class="card-tools">
                         <?php echo anchor(site_url('user/excel'), '<i class="fa fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                        <button class="btn btn-tool" onclick="window.location.href='<?php echo site_url();?>/user';"><i class="fas fa-redo-alt"></i></button>
                      </div>
                    </div>
						
						<div class="card-body">
						<table class="table table-bordered table-striped" id="mytable2">
							<thead>
								<tr>
									<th width="30px">No</th>
									<th>Full Name</th>
                                    <th>Username</th>
									<th>Contact</th>
									<th>Company</th>
									<th>Status</th>
									<th width="200px">&nbsp;</th>
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
				"url": "user/json_nonactive",
				"type": "POST"
			},
			pageLength: 10,
    				lengthMenu: [10, 25, 50, 100],
			columns: [ {
				"data": "id_users",
				"orderable": false
			}, {
				"data": "nama_lengkap"
			}, {
				"data": "username"
			}, {
				"data": "kontak"
			}, {
				"data": "perusahaan"
			}, {
				"data": "is_aktif"
			}, {
				"data": "action",
				"orderable": false,
				"className": "text-center"
			} ],
			order: [
				[ 1, 'DSC' ]
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

		var t = $( "#mytable2" ).dataTable( {
			initComplete: function () {
				var api = this.api();
				$( '#mytable2_filter input' )
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
				"url": "user/json_reactive",
				"type": "POST"
			},
			pageLength: 10,
    				lengthMenu: [10, 25, 50, 100],
			columns: [ {
				"data": "id_users",
				"orderable": false
			}, {
				"data": "nama_lengkap"
			}, {
				"data": "username"
			}, {
				"data": "kontak"
			}, {
				"data": "perusahaan"
			}, {
				"data": "is_aktif"
			}, {
				"data": "action",
				"orderable": false,
				"className": "text-center"
			} ],
			order: [
				[ 1, 'DSC' ]
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