<link href="<?php echo base_url() . 'assets/css/w3.css' ?>" rel="stylesheet" />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="col" style="background-color: white;">
    <!-- /.content-header -->
    <!-- Card -->
    <!-- Main content -->
    <div class="col">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-widget widget-user">
                <!-- untuk foto banner -->
                <?php if ($banner == '' || $banner == NULL) { ?>
                  <img src="<?php echo base_url('uploads/photo/default_banner.jpg'); ?>" style="width: 745px; height: 200px; object-fit: cover;">
                <?php } else { ?>
                  <img src="<?php echo base_url('uploads/photo/' . $banner . ''); ?>" style="width: 745px; height: 200px; object-fit: cover;">
                <?php } ?>
                <div class="center">
                  <div class="widget-user-image">
                    <img class="img-circle" style="height:150px; width: 150px; object-fit: cover;" src="<?php echo base_url('uploads/photo/' . $photo . ''); ?>">
                  </div>
                </div>

                <div class="card-footer" style="padding-top: 35px; background-color: white;">
                  <div class="col">
                    <h3 class="widget-user-username" style="text-align: center; padding-bottom: 10px;"><b><?php echo $nama; ?></b></h3>
                    <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $tempat; ?></h6>
                  </div>
                  <h6 class="widget-user-desc" style="text-align: center; font-size: 12px;"><?php echo $kategori; ?></h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div style="text-align: center;">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
              <div class="content">
                <div class="container">
                  <div class="card card-widget widget-user">
                    <div class="card-body">
                      <div class="widget-user-username" style="padding-bottom: 10px; font-size: 12px;">Skill <?php echo $nama; ?></div>
                      <?php $no = 1;
                      foreach ($get_tags_label as $tags) : $no++; ?>
                        <?php if ($tags->rel_id == $id_talent) { ?>
                          <div class="btn btn-xs" style="padding: revert;">
                            <h6 class="widget-user-desc" style="font-size: 10px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px;"><span style="color: black;"><?php echo $tags->tags; ?></span></h6>
                          </div>
                        <?php } ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content">
                <div class="container">
                  <div class="card card-widget widget-user">
                    <div class="card-body">
                      <div class="widget-user-username" style="padding-bottom: 10px; font-size: 12px;">Sosial Media</div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://instagram.com/<?php echo $instagram; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-instagram <?php if ($instagram == NULL && $instagram == '') {
                                                                                                                                                                      echo 'disabled';
                                                                                                                                                                    } ?>" style="font-size: 12px;"> Instagram</button></a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://facebook.com/<?php echo $facebook; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook <?php if ($facebook == NULL && $facebook == '') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                  } ?>" style="font-size: 12px;"> Facebook</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://twitter.com/<?php echo $twitter; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter <?php if ($twitter == NULL && $twitter == '') {
                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                } ?>" style="font-size: 12px;"> Twitter</button></a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://tiktok.com/<?php echo $tiktok; ?>" <button type="button" class="btn btn-block btn-outline-dark <?php if ($tiktok == NULL && $tiktok == '') {
                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                } ?>" style="font-size: 12px;"> Tiktok</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://youtube.com/<?php echo $youtube; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-youtube <?php if ($youtube == NULL && $youtube == '') {
                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                } ?>" style="font-size: 12px;"> Youtube</button></a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://<?php echo $other; ?>" <button type="button" class="btn btn-block btn-outline-dark <?php if ($other == NULL && $other == '') {
                                                                                                                                                  echo 'disabled';
                                                                                                                                                } ?>" style="font-size: 12px;"><i class="fas fa-globe"></i> Other</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
    </div>

    <!-- /.content endorse -->
    <form action="<?php echo base_url("Tbl_talent/create_endorse"); ?>" method="post" enctype="multipart/form-data">
      <div class="row-md-6">
        <div class="content">
          <div class="container">
            <div class="card card-widget widget-user">
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="endorse">1. Apa yang ingin dipromosikan? *</label>
                    <label for="endorse" style="color: grey; font-size: 9px;">Sebutkan nama produk / layanan / brand / campaign / event. Maksimal 60 karakter. Contoh: Minuman Wedang Jahe</label>
                    <input type="text" class="form-control" name="endorse" id="endorse" placeholder="endorse" required />
                  </div>
                  <div class="form-group">
                    <label for="sow">2. Scope Of Work (SOW) *</label>
                    <label for="sow" style="color: grey; font-size: 9px;">Contoh: Posting 1 foto di IG sedang menggunakan produk, menggunakan hashtag #ZaitunSeries dan mention akun @mustikaratuind</label>
                    <textarea id="sow" name='sow' required ></textarea>
                  </div>
                    <div class="form-group">
                      <label for="jadwal">3. Jadwal Endorse *</label>
                      <label for="jadwal" style="color: grey; font-size: 9px;">Contoh: 28 Januari 2021</label>
                      <input type="date" class="form-control" name="jadwal" id="jadwal" placeholder="Tangggal Endorse" required />
                    </div>
                    <div class="form-group">
                      <label for="budget">4. Berapa budget Anda untuk kerjasama ini? *</label>
                      <label for="budget" style="color: grey; font-size: 9px;">Contoh: 500000</label>
                      <input type="text" class="form-control" name="budget" id="budget" placeholder="budget" required />
                    </div>
                    <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                    <input type="hidden" name="code_talent" value="<?php echo $code_talent; ?>" />
                    <input type="hidden" name="nama" value="<?php echo $nama; ?>" />
                    <!-- input hidden untuk di lempar ke wa -->
                    <button class="btn btn-block btn-dark" type="submit"> Endorse</button>
                  </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
      </div>
    </form>
  </div>

</div>
<!-- /.content -->
<!-- /.content-wrapper -->


<!-- /.content-header -->
<!-- Card -->
<!-- Main content -->




<script src="<?php echo base_url() . 'assets/js/jquery-2.1.1.min.js' ?>"></script>
<script>
  var sliderObjects = [];
  createSliderObjects();

  function plusDivs(obj, n) {
    var parentDiv = $(obj).parent();
    var matchedDiv;
    $.each(sliderObjects, function(i, item) {
      if ($(parentDiv[0]).attr('id') == $(item).attr('id')) {
        matchedDiv = item;
        return false;
      }
    });
    matchedDiv.slideIndex = matchedDiv.slideIndex + n;
    showDivs(matchedDiv, matchedDiv.slideIndex);
  }

  function createSliderObjects() {
    var sliderDivs = $('.slider');
    $.each(sliderDivs, function(i, item) {
      var obj = {};
      obj.id = $(item).attr('id');
      obj.divContent = item;
      obj.slideIndex = 1;
      obj.slideContents = $(item).find('.mySlides');
      showDivs(obj, 1);
      sliderObjects.push(obj);
    });
  }

  function showDivs(divObject, n) {
    debugger;
    var i;
    if (n > divObject.slideContents.length) {
      divObject.slideIndex = 1
    }
    if (n < 1) {
      divObject.slideIndex = divObject.slideContents.length
    }
    for (i = 0; i < divObject.slideContents.length; i++) {
      divObject.slideContents[i].style.display = "none";
    }
    divObject.slideContents[divObject.slideIndex - 1].style.display = "block";
  }
</script>

<!-- untuk textarea -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.10.2.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/adminlte/plugins/summernote/summernote-bs4.min.js' ?>"></script>
<script>
  $(function() {
    // Summernote
    $('#sow').summernote()
  })
</script>
<script>
  $(function() {
    // Summernote
    $('#todolistx').summernote()
  })
</script>
<script>
  $(function() {
    // Summernote
    $('#syaratx').summernote()
  })
</script>