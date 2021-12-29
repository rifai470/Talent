<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> <?php echo $get_kategori->kategori; ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home_page'); ?>">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <?php $no = 1;
        foreach ($get_talent as $row) : $no++; ?>
          <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="card widget-user">
              <!-- <div class="widget-user-header bg-info">
                </div> -->
                <img class="card-img-top" src="<?php echo base_url('uploads/photo/' . $row->photo . ''); ?>">
              
              <div class="card-footer" style="height: 300px;">
                <div class="col">
                  <h3 class="widget-user-username" style="text-align: center;" ><b><?php echo $row->nama; ?></b></h3>
                  <h6 class="widget-user-desc" style="text-align: center;"><?php echo $row->tempat; ?></h6>
                </div>
                <h6 class="widget-user-desc" style="text-align: left;"><?php echo $row->tarif; ?></h6>
               
              </div>
              
            </div>
            <!-- /.widget-user -->
          </div>
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->