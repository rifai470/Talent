<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <title>Talent | Mustika Ratu</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets\images\favicon.ico\apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets\images\favicon.ico\android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets\images\favicon.ico\favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets\images\favicon.ico\favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets\images\favicon.ico\favicon-16x16.png">

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/plugins/animate/animate.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/css/default/style.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/css/default/style-responsive.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/login/css/default/theme/default.css" rel="stylesheet" id="theme" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url(); ?>assets/login/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->
  <style>
    .bg-danger {
      color: #fff;
      background-color: #f9243f;
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }
  </style>
</head>

<body class="pace-top bg-white">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  <div id="page-container" class="fade">
    <!-- begin login -->

    <div class="login login-with-news-feed">
      <!-- begin news-feed -->
      <div class="news-feed">
        <div class="news-image" style="background-image: url(<?php echo base_url(); ?>assets/login/img/banner_mustika-min.jpg)"></div>
      </div>
      <!-- end news-feed -->
      <!-- begin right-content -->
      <div class="right-content">
        <!-- begin login-header -->
        <div class="login-header">
          <div class="brand"> <img src="<?php echo base_url(); ?>assets\images\Mustika-Ratu-Horizontal.png"> <small> </small> </div>
          <div class="icon"> <i class="fa fa-sign-in"></i> </div>
        </div>
        <!-- end login-header -->
        <!-- begin login-content -->
        <div class="login-content">
          <?php
          $status_login = $this->session->userdata('status_login');
          if (empty($status_login)) {
            $message = "";
          } else {
            $message = $status_login;
          }
          ?>
          <p class="login-box-msg"><?php echo $message; ?></p>
          <?php $attributes = array('class' => 'margin-bottom-0');
          echo form_open('auth/cheklogin', $attributes); ?>
          <div class="form-group m-b-15">
            <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required />
          </div>
          <div class="form-group m-b-15">
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required />
          </div>
          <div class="checkbox m-b-30">
            <label> <?php echo form_checkbox('remember', TRUE, $remember) ?> Remember Me </label>
          </div>
          <div class="login-buttons">
            <button type="submit" class="btn btn-success btn-block btn-lg">Sign in</button>
          </div>
          <div class="m-t-20 m-b-40 p-b-40 text-inverse"> &nbsp;<?php echo $this->session->flashdata("msg"); ?></div>
          <hr />
          <p class="text-center text-grey-darker"> &copy; www.mustika-ratu.co.id </p>
          </form>
        </div>
        <!-- end login-content -->
      </div>
      <!-- end right-container -->
    </div>
    <!-- end login -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url(); ?>assets/login/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/plugins/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/theme/default.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <script>
      $(document).ready(function() {
        App.init();
      });
    </script>
</body>

</html>