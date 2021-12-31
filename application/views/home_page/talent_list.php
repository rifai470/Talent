<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> <?php echo $get_kategori->kategori; ?> </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home_page'); ?>">Home</a></li>
          </ol>
        </div>
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
            <div class="card widget-user">
              <img class="card-img-top" src="<?php echo base_url('uploads/photo/' . $row->photo . ''); ?>">
              <div class="card-footer" style="padding-top: 15px;">
                <div class="col">
                  <h3 class="widget-user-username" style="text-align: center;"><b><?php echo $row->nama; ?></b></h3>
                  <h6 class="widget-user-desc" style="text-align: center;"><?php echo $row->tempat; ?></h6>
                </div>
                <h6 class="widget-user-desc" style="text-align: center;"><?php echo $row->pekerjaan; ?></h6>
                <!-- <div class="row">
                  <div class="col-md-6">
                    <div class="description-block">
                      <h3 class="description-header" style="text-align: left;"><?php echo $row->pekerjaan; ?></h3>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="description-block">
                      <h3 class="description-header" style="text-align: right;"><?php echo $row->tarif; ?></h3>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="row"> -->
                <!-- <div class="col-md-6"> -->
                <button type="button" class="btn btn-block btn-outline-dark" data-toggle="modal" data-target="#modal-talent<?php echo $row->id_talent; ?>">Profile</button>
                <!-- </div>
                <div class="col-md-6"> -->
                <button type="button" class="btn btn-block btn-dark">Endorse</button>
                <!-- </div> -->
                <!-- </div> -->
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

<!-- Modal Pop Up Talent -->
<?php $no = 1;
foreach ($get_talent as $row) : $no++; ?>
  <div class="modal fade" id="modal-talent<?php echo $row->id_talent; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h4 class="modal-title">Detail Talent</h4> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <p>One fine body&hellip;</p> -->
          <center><img class="profile-user-img img-fluid img-circle" style="width: 200px;" src="<?php echo base_url('uploads/photo/' . $row->photo . ''); ?>"></center>
          <h3 class="widget-user-username" style="text-align: center;"><b><?php echo $row->nama; ?></b></h3>
          <h6 class="widget-user-desc" style="text-align: center;"><?php echo $row->tempat; ?></h6>
          <h6 class="widget-user-desc" style="text-align: center;"><?php echo $row->pekerjaan; ?></h6>
          <div class="row">
            <div class="col-md-3">
              <div class="description-block">
              <a target="_blank" href="http://<?php echo $row->instagram; ?>"
              <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook" style="font-size: 12px;"> Instagram</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://<?php echo $row->facebook; ?>"
              <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook" style="font-size: 12px;"> Facebook</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
              <a target="_blank" href="http://<?php echo $row->twitter; ?>"
              <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter" style="font-size: 12px;"> Twitter</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
              <a target="_blank" href="http://<?php echo $row->other; ?>"
              <button type="button" class="btn btn-block btn-outline-dark" style="font-size: 12px;"><i class="fas fa-globe"></i>  Other</button></a>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">

        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>