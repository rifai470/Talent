<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
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
                foreach ($get_kategori as $row) : $no++; ?>
                    <div class="col-md-3">
                        <a href="<?php echo site_url('home_page/talent_list/' . $row->id_kategori . ''); ?>">
                            <div class="info-box">
                                <div class="col" style="align-items: center;">
                                    <img class="card-img-top" src="<?php echo base_url('assets/img/' . $row->icon . ''); ?>">
                                    <div class="info-box-content">
                                        <span class="info-box-text" style="text-align: center; color: black;"><b><?php echo $row->kategori; ?></b></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->