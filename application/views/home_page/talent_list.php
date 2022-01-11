<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<style>
  .mySlides {
    display: none
  }

  .w3-left,
  .w3-right,
  .w3-badge {
    cursor: pointer
  }

  .w3-badge {
    height: 13px;
    width: 13px;
    padding: 0
  }
</style>

<style>
  * {
    box-sizing: border-box
  }

  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Hide the images by default */
  .mySlides {
    display: none;
  }

  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active,
  .dot:hover {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @-webkit-keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }

  @keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }
</style>



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
            <li class="breadcrumb-item"><a href="<?php echo base_url('home_page'); ?>" style="color: black;">Home</a></li>
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
            <div class="card card-widget widget-user">
              <div class="w3-content w3-display-container">
                <img class="card-widget widget-user" src="<?php echo base_url('uploads/photo/' . $row->photo . ''); ?>" style="width: 100%;">
              </div>
              <div class="card-footer" style="padding-top: 15px;">
                <div class="col">
                  <h3 class="widget-user-username" style="text-align: center; padding-bottom: 10px;"><b><?php echo $row->nama; ?></b></h3>
                  <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $row->tempat; ?></h6>
                </div>
                <h6 class="widget-user-desc" style="text-align: center; font-size: 12px;"><?php echo $row->pekerjaan; ?></h6>
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
                <a target="_blank" href="https://api.whatsapp.com/send?phone=6287887448691" <button type="button" class="btn btn-block btn-dark"> Endorse</button></a>
                <!-- <button type="button" class="btn btn-block btn-dark">Endorse</button> -->
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
        <div class="card card-widget widget-user">
          <?php $no = 0;
          foreach ($row_image as $image) : $no++; ?>
            <?php if ($row->code_talent == $image->code_talent) { ?>
              <center><img class="mySlides<?php echo str_replace("-","",$row->code_talent); ?>" style="width: 350px;" src="<?php echo base_url('uploads/photo/' . $image->photo . ''); ?>"></center>
            <?php } ?>
            <!-- sampai sini bener -->
            <?php endforeach; ?>
          <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottom" style="width:100%">
          <?php if ($row_image != NULL) { ?>
              <div class="w3-left w3-hover-text-khaki" onclick="plusDivs<?php echo str_replace('-', '', $row->code_talent); ?>(-1)" style="color: #babda0;">&#10094;</div>
              <div class="w3-right w3-hover-text-khaki" onclick="plusDivs<?php echo str_replace('-', '', $row->code_talent); ?>(1)" style="color: #babda0;">&#10095;</div>
            <?php } ?>      
            <?php $no = 1;
            foreach ($row_image as $image) : $no++; ?>
              <?php if ($row->code_talent == $image->code_talent) { ?>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo $no ?>)"></span>
              <?php } ?>
            <?php endforeach; ?>
          </div>
        </div>

          <h3 class="widget-user-username" style="text-align: center;"><b><?php echo $row->nama; ?></b></h3>
          <h6 class="widget-user-desc" style="text-align: center;"><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $row->tempat; ?></h6>
          <h6 class="widget-user-desc" style="text-align: center"><?php echo $row->pekerjaan; ?></h6>
          <div class="row">
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://<?php echo $row->instagram; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-instagram <?php if ($row->instagram == NULL && $row->instagram == '') {
                                                                                                                                                              echo 'disabled';
                                                                                                                                                            } ?>" style="font-size: 12px;"> Instagram</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://<?php echo $row->facebook; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook <?php if ($row->facebook == NULL && $row->facebook == '') {
                                                                                                                                                              echo 'disabled';
                                                                                                                                                            } ?>" style="font-size: 12px;"> Facebook</button></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="description-block">
                <a target="_blank" href="http://<?php echo $row->twitter; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter <?php if ($row->twitter == NULL && $row->twitter == '') {
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
              <div class="widget-user-desc" style="text-align: left; font-size: 12px;">Bio
                <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->tentang; ?></b>
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
          <hr>
          <div class="widget-user-desc" style="text-align: left; font-size: 12px"><i class="far fa-star"></i> Portfolio
          </div>
          <div class="widget-user-username" style="text-align: left; font-size: 16px;"><b><?php echo $row->prestasi; ?></b>
          </div>
          <hr>
          <a target="_blank" href="https://api.whatsapp.com/send?phone=6287887448691" <button type="button" class="btn btn-block btn-dark"> Endorse</button></a>
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

<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  <?php $no = 1;
  foreach ($get_talent as $row) : $no++; ?>

    function plusDivs<?php echo str_replace("-", "", $row->code_talent); ?>(n) {
      showDivs(slideIndex += n);
    }
  <?php endforeach; ?>

  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {

    <?php $no = 1;
    foreach ($get_talent as $row) : $no++; ?>
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
      }
      x[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " w3-white";
    <?php endforeach; ?>
  }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>