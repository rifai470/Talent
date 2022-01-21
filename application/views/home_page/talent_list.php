<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if($search == '') { ?>
            <h4 class="m-0 text-dark"> <?php echo $kategori; ?> </h4>
          <?php } else { ?>
            <h5 class="m-0 text-dark"> Search '<?php echo $search; ?>' </h5>
          <?php } ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home_page'); ?>" style="color: black;">Home</a></li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Card -->
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <?php $no = 1;
        foreach ($get_talent as $row) : $no++; ?>
          <div class="col-md-3">
            <div class="card card-widget widget-user">
              <div class="w3-content w3-display-container">
                <img class="card-widget widget-user" src="<?php echo base_url('uploads/photo/' . $row->photo . ''); ?>" style="height:180px; width: auto; max-width: 270px; object-fit: cover;">
              </div>
              <div class="card-footer" style="padding-top: 15px;">
                <div class="row">
                  <div class="col">
                    <div class="container" style="height: 100px;">
                      <h3 class="widget-user-username" style="text-align: center; padding-bottom: 10px; max-height: 100px;">
                        <b><?php echo substr("$row->nama", 0, 40); ?></b>
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $row->tempat; ?></h6>
                </div>
                <h6 class="widget-user-desc" style="text-align: center; font-size: 12px;"><?php echo $row->pekerjaan; ?></h6>
                <div class="row">
                  <div class="col-md-12">
                    <div style="text-align: center;">
                      <?php $no = 1;
                      foreach ($get_tags_label as $tags) : $no++; ?>
                        <?php if ($tags->rel_id == $row->id_talent) { ?>
                          <div class="btn btn-xs" style="padding: revert;">
                            <h6 class="widget-user-desc" style="font-size: 10px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px;"><span style="color: black;"><?php echo $tags->tags; ?></span></h6>
                          </div>
                        <?php } ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-block btn-outline-dark" data-toggle="modal" data-target="#modal-talent<?php echo $row->id_talent; ?>">Profile</button>
                <?php ?>
                <button class="btn btn-block btn-dark" onclick="checkLogin(<?php echo $row->id_talent; ?>)"> Endorse</button>
                <?php ?>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- Image -->
          <div class="w3-content w3-display-container slider" id="div<?php echo $row->id_talent; ?>">
            <?php $no = 0;
            foreach ($row_image as $image) : $no++; ?>
              <?php if ($image->code_talent == $row->code_talent) { ?>
                <center><img class="mySlides" src="<?php echo base_url('uploads/photo/' . $image->photo . ''); ?>" style="width: 350px;"></center>
              <?php } ?>
            <?php endforeach; ?>

            <a class="w3-btn-floating w3-display-left" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="w3-btn-floating w3-display-right" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
          <!-- /Image -->

          <!-- Detail -->
          <h3 class="widget-user-username" style="text-align: center;"><b><?php echo $row->nama; ?></b></h3>
          <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $row->tempat; ?></h6>
          <h6 class="widget-user-desc" style="text-align: center"><?php echo $row->pekerjaan; ?></h6>
          <div class="row">
            <div class="col-md-12">
              <div style="text-align: center;">
                <?php $no = 1;
                foreach ($get_tags_label as $tags) : $no++; ?>
                  <?php if ($tags->rel_id == $row->id_talent) { ?>
                    <div class="btn btn-xs" style="padding: revert;">
                      <h6 class="widget-user-desc" style="font-size: 14px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px;"><span style="color: black;"><?php echo $tags->tags; ?></span></h6>
                    </div>
                  <?php } ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://www.instagram.com/<?php echo $row->instagram; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-instagram <?php if ($row->instagram == NULL && $row->instagram == '') {
                                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                                } ?>" style="font-size: 12px;"> Instagram</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://www.facebook.com/<?php echo $row->facebook; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook <?php if ($row->facebook == NULL && $row->facebook == '') {
                                                                                                                                                                              echo 'disabled';
                                                                                                                                                                            } ?>" style="font-size: 12px;"> Facebook</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://twitter.com/<?php echo $row->twitter; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter <?php if ($row->twitter == NULL && $row->twitter == '') {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                      } ?>" style="font-size: 12px;"> Twitter</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://<?php echo $row->other; ?>" <button type="button" class="btn btn-block btn-outline-dark <?php if ($row->other == NULL && $row->other == '') {
                                                                                                                                          echo 'disabled';
                                                                                                                                        } ?>" style="font-size: 12px;"><i class="fas fa-globe"></i> Other</button></a>
              </div>
            </div>
          </div>
          <hr>
          <!-- <div class="widget-user-desc" style="text-align: center">Personal Information
          </div> -->
          <div class="row">
            <div class="col-md-6">
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Name
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->nama; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">City
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->tempat; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Date of birth
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->tanggal_lahir; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Age
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->usia; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Gender
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->jenis_kelamin; ?></b>
                </div>
              </div>


            </div>
            <div class="col-md-6">
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Education
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->pendidikan; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Job
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->pekerjaan; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Language
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->bahasa; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Height
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->tinggi_badan; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Weight
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->berat_badan; ?></b>
                </div>
              </div>
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Hobby
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->hobby; ?></b>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Bio
                <div class="widget-user-username" style="text-align: left; font-size: 16px; word-break: break-all;">
                  <p><b><?php echo $row->tentang; ?></b></p>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget-user-desc" style="text-align: left; font-size: 12px"><i class="far fa-star"></i> Portfolio
          </div>
          <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->prestasi; ?></b>
          </div>
          <hr>
          <a target="_blank" href="https://api.whatsapp.com/send?phone=6287887448691" <button type="button" class="btn btn-block btn-dark"> Endorse</button></a>
          <!-- Detail -->
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

  function checkLogin(id) {
    if (<?php echo $logged; ?> == 1) {
      var loc = window.open('<?php echo base_url('home_page/talent_list_endorse/') ?>' + id + '', '_blank');
      console.log(loc);
    } else {
      var loc = window.location.href = "<?php echo base_url('Auth'); ?>";
      console.log(loc);
    }
  }
</script>