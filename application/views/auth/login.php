<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

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
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminlte\plugins\fontawesome-free\css\all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminlte\dist\css\adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?php echo base_url(); ?>" class="navbar-brand">
          <img src="<?php echo base_url(); ?>assets/images/mustika_ratu_icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">TALENT</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul>

          <!-- SEARCH FORM -->
          <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div> -->

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">Login / Register</button>
            </li>
          </ul>
        </div>
    </nav>
    <!-- /.navbar -->

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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Top Navigation</li>
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>

                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>

                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>

              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>

                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- modal-content -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets\adminlte\plugins\jquery\jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets\adminlte\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets\adminlte\dist\js\adminlte.min.js"></script>
</body>

</html>