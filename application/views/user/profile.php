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
          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul> -->

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
            <?php if ($this->session->userdata('logged')) { ?>
              <li class="nav-item">
              <a href="<?php echo base_url('user/profile'); ?>/<?php echo $this->session->userdata('id_users'); ?>" class="nav-link">Profile</a>
              </li>
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?php echo $this->session->userdata('nama_lengkap'); ?></a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">Logout</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('auth'); ?>" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('auth/register'); ?>" class="nav-link">Daftar</a>
              </li>
            <?php } ?>
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
              <h1 class="m-0 text-dark"> Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('home_page'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Profile</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
              <?php if ($this->session->userdata('message')) { ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('message_r')) { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php echo $this->session->userdata('message_r') <> '' ? $this->session->userdata('message_r') : ''; ?>
                </div>
              <?php } ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">Nama Lengkap</h5>
                  <p class="card-text">
                  <h5><b><?php echo $nama_lengkap; ?></b></h5>
                  </p>
                  <hr />
                  <h5 class="card-title">Email</h5>
                  <p class="card-text">
                  <h5><b><?php echo $username; ?></b></h5>
                  </p>
                  <hr />
                  <h5 class="card-title">No Whatsapp</h5>
                  <p class="card-text">
                  <h5><b><?php echo $kontak; ?></b></h5>
                  </p>
                  <hr />
                  <h5 class="card-title">Perusahaan</h5>
                  <p class="card-text">
                  <h5><b><?php if ($perusahaan == NULL) {
                            echo "optional";
                          } else {
                            echo $perusahaan;
                          }; ?></b></h5>
                  </p>
                  <hr />
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-profile">
                    Ubah Profile
                  </button>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-password">
                    Ubah Password
                  </button>
                </div>
              </div><!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="modal-profile">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Profile</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo base_url('user/change_profile'); ?>" enctype="multipart/form-data">
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-md" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" required />
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-md" name="username" placeholder="Email" value="<?php echo $username; ?>" required disabled/>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-md" name="kontak" placeholder="No Whatsapp" value="<?php echo $kontak; ?>" required />
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-md" name="perusahaan" placeholder="Perusahaan (Optional)" value="<?php echo $perusahaan; ?>" />
              </div>
              <div class="input-group mb-3">
                <input type="hidden" class="form-control" name="id_users" value="<?php echo $id_users; ?>" />
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-password">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo base_url('user/change_password'); ?>" enctype="multipart/form-data">
              <div class="input-group mb-3">
                <input type="password" class="form-control form-control-md" name="password" placeholder="Current Password" value="" required />
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control form-control-md" name="new_password" placeholder="New Password" value="" required />
              </div>
              <div class="input-group mb-3">
                <input type="hidden" class="form-control" name="id_users" value="<?php echo $id_users; ?>" />
                <input type="hidden" class="form-control" name="change_password" value="1" />
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">

      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021 <a href="https://www.mustika-ratu.co.id">www.mustika-ratu.co.id</a>.</strong> All rights reserved.
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