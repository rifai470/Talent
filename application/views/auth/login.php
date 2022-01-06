<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Talent | Mustika Ratu</title>
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/morris.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/select2/dist/css/select2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <?php if ($this->session->userdata('status_login')) { ?>
    <div class="alert alert-danger alert-dismissible" style="padding-right: 20px;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-times"></i> Alert!</h5>
      <?php echo $this->session->userdata('status_login') <> '' ? $this->session->userdata('status_login') : ''; ?>
    </div>
  <?php } ?>
  <?php if ($this->session->userdata('status_register')) { ?>
    <div class="alert alert-success alert-dismissible" style="padding-right: 20px;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Alert!</h5>
      <?php echo $this->session->userdata('status_register') <> '' ? $this->session->userdata('status_register') : ''; ?>
    </div>
  <?php } ?>
</div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>LOGIN</b></a>
      </div>
      <div class="card-body">
        <?php $attributes = array('class' => 'margin-bottom-0');
        echo form_open('auth/cheklogin', $attributes); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-md" name="username" placeholder="Email" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-md" name="password" placeholder="Password" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <label for="remember">
              <?php echo form_checkbox('remember', TRUE, $remember) ?> Remember Me
            </label>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
        </form>

        </br>
        <p class="mb-0">
          Belum pernah daftar? <a href="<?php echo base_url('auth/register'); ?>" class="text-center">Daftar di sini​</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets\adminlte\plugins\jquery\jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets\adminlte\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets\adminlte\dist\js\adminlte.min.js"></script>
</body>

</html>