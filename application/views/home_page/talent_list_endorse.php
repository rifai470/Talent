<link href="<?php echo base_url() . 'assets/css/w3.css' ?>" rel="stylesheet" />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="col">
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
                <img src="<?php echo base_url('uploads/photo/' . $banner . ''); ?>" style="width: 745px; height: 200px; object-fit: cover;">
                <div class="center">
                  <div class="widget-user-image">
                    <img class="img-circle" style="height:150px; width: 150px; object-fit: cover;" src="<?php echo base_url('uploads/photo/' . $photo . ''); ?>">
                  </div>
                </div>

                <div class="card-footer" style="padding-top: 35px;">
                  <div class="col">
                    <h3 class="widget-user-username" style="text-align: center; padding-bottom: 10px;"><b><?php echo $nama; ?></b></h3>
                    <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $tempat; ?></h6>
                  </div>
                  <h6 class="widget-user-desc" style="text-align: center; font-size: 12px;"><?php echo $pekerjaan; ?></h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div style="text-align: center;">
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

              </div>
              <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
              <div class="content">
                <div class="container">
                  <div class="card card-widget widget-user">
                    <div class="card-body">
                      <div class="widget-user-username" style="padding-bottom: 10px; font-size: 12px;">Tentang <?php echo $nama; ?></div>
                      <div class="widget-user-dsc" style="padding-bottom: 10px; font-size: 10px;"><?php echo $tentang; ?></div>
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
                            <a target="_blank" href="http://<?php echo $instagram; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-instagram <?php if ($instagram == NULL && $instagram == '') {
                                                                                                                                                                      echo 'disabled';
                                                                                                                                                                    } ?>" style="font-size: 12px;"> Instagram</button></a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://<?php echo $facebook; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook <?php if ($facebook == NULL && $facebook == '') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                  } ?>" style="font-size: 12px;"> Facebook</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="description-block">
                            <a target="_blank" href="http://<?php echo $twitter; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter <?php if ($twitter == NULL && $twitter == '') {
                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                } ?>" style="font-size: 12px;"> Twitter</button></a>
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
            <div class="row">
              <div class="col-md-6">
                <div class="card card-widget widget-user">
                  <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="endorse">1. Apa yang ingin dipromosikan? *</label>
                        <label for="endorse" style="color: grey; font-size: 9px;">Sebutkan nama produk / layanan / brand / campaign / event. Maksimal 60 karakter. <br> Contoh: Minuman Wedang Jahe</label>
                        <input type="text" class="form-control" name="endorse" id="endorse" placeholder="endorse" />
                      </div>
                      <div class="form-group">
                        <label for="detail">2. Jelaskan lebih detail *</label>
                        <label for="detail" style="color: grey; font-size: 9px; text-align: justify;">Jelaskan juga mengenai kegunaan / manfaat / keunggulan / keunikan / dll. <br> Contoh: DivaBeau, minuman kecantikan pertama di Indonesia. Mengandung 2000mg kolagen, superfruits dan vitamin E. Dengan kemasan siap minum dan rasa yang enak, DivaBeau merupakan cara nikmat dan praktis untuk mendapatkan kulit yang cantik. Baca info selengkapnya di www.divabeau.com</label>
                        <textarea id="detail" name='detail' style="width: 517px; height: 100px;"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="todolist">3. Apa yang perlu dilakukan <?php echo $nama; ?> *</label>
                        <label for="todolist" style="color: grey; font-size: 9px;">Contoh: Posting 1 foto di IG sedang menggunakan produk, menggunakan hashtag #CantikItuSehat dan mention akun @DivaBeau</label>
                        <textarea id="todolist" name='todolist' style="width: 517px; height: 100px;"></textarea>
                      </div>
                    </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card card-widget widget-user">
                  <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="syarat">4. Syarat dan ketentuan lain (jika ada)</label>
                        <label for="syarat" style="color: grey; font-size: 9px;">Contoh: Postingan wajib di keep minimal 30 hari. Posting harus dilakukan antara tanggal 21 - 28 Agustus</label>
                        <textarea id="syarat" name='syarat' style="width: 517px; height: 100px;"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="budget">5. Berapa budget Anda untuk kerjasama ini? *</label>
                        <label for="budget" style="color: grey; font-size: 9px;">Contoh: 500000</label>
                        <input type="text" class="form-control" name="budget" id="budget" placeholder="budget" />
                      </div>
                      <div class="form-group">
                        <label for="free">6. Produk/layanan yang akan diberikan ke Risma Marisani secara GRATIS untuk dicoba/digunakan? Berapa nilainya?</label>
                        <label for="free" style="color: grey; font-size: 9px;">Contoh: 1 Package Wedang</label>
                        <input type="text" class="form-control" name="free" id="free" placeholder="free" />
                      </div>
                      <div class="form-group">
                        <label for="photo">7. Upload gambar</label>
                        <label for="photo" style="color: grey; font-size: 9px;">Foto produk, poster campaign, dll (max 5MB)</label>
                        <input type="file" class="form-control" name="upload[]" multiple>
                      </div>
                      <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                      <input type="hidden" name="code_talent" value="<?php echo $code_talent; ?>" />
                      <input type="hidden" name="nama" value="<?php echo $nama; ?>" />
                      <!-- input hidden untuk di lempar ke wa -->
                      <button class="btn btn-block btn-dark" type="submit"> Endorse</button>
                    </div>

                </div>
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
    $('#detailx').summernote()
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