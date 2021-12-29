<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1>
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
                    <?php $no=1;
                     foreach ($get_kategori as $row) : $no++; ?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="<?php echo site_url('home_page/talent_list/'.$row->id_kategori.''); ?>">
                            <div class="info-box bg-gradient-info">
                                <span class="info-box-icon">
                                <?php echo $row->icon; ?>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo $row->kategori; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->