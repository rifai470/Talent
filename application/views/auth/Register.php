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
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminlte\plugins\fontawesome-free\css\all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminlte\plugins\icheck-bootstrap\icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminlte\dist\css\adminlte.min.css">
  <style>
    form span {
      cursor: pointer;
    }
  </style>
</head>

<body class="hold-transition login-page" style="background-color: white; height: 50vh;">
  <div class="login-box" style="width: 1000px; height: 200px;">
    <!-- /.login-logo -->
    <div class="card" style="border-radius: 25px;">
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">
            <?php
            $status_register = $this->session->userdata('status_register');
            if (empty($status_register)) {
              $message = "";
            } else {
              $message = $status_register;
            }
            ?>
            <p class="login-box-msg" style="color: red;"><?php echo $message; ?></p>
            <?php $attributes = array('class' => 'margin-bottom-0');
            echo form_open('auth/register_action', $attributes); ?>
            <b>Sign Up</b>
            <div class="input-group mb-3" style="padding-top: 10px;">
              <input type="text" class="form-control form-control-md" name="nama_lengkap" placeholder="Nama Lengkap" required />
              <div class="input-group-append">
                <div class="input-group-text" style="width: 45px;">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-md" name="kontak" placeholder="No Whatsapp" required />
              <div class="input-group-append">
                <div class="input-group-text" style="width: 45px;">
                  <span class="fab fa-whatsapp"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-md" name="username" placeholder="Email" required />
              <div class="input-group-append">
                <div class="input-group-text" style="width: 45px;">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control form-control-md" name="password" id="password" placeholder="Password" required />
              <div class="input-group-append">
                <div class="input-group-text" style="width: 45px;">
                  <span class="fas fa-eye-slash" id="togglePassword"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control form-control-md" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
              <div class="input-group-append">
                <div class="input-group-text" style="width: 45px;">
                  <span class="fas fa-eye-slash" id="toggleConfirmPassword"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-1" style="text-align: center;">
              <p id='message'></p>
            </div>

            <div class="row-md-6" style="text-align: center; padding-bottom: 10px;">
              <div class="col">
                <div class="row" style="padding-left: 60px; font-size: small;">
                  <span style="margin-top: 10px;"> What do you want to register as? </span>
                  <div class="col-md-6" style="padding-right:25px;">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="user_level" id="talent" autocomplete="off" value="3" checked> Talent
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="user_level" id="client" autocomplete="off" value="4"> Client
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="row" style="padding-top: 20px;">
                <div class="col">
                  <button type="submit" class="btn btn-primary btn-block btn-dark">Sign Up</button>
                </div>
                <!-- /.col -->
              </div>
              </form>

              </br>
              <p class="mb-0" style="text-align: center; font-size: small;">
                Already have an account? <a href="<?php echo base_url('auth'); ?>" class="text-center">Sign In​</a>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="row">
            <img src="<?php echo base_url(); ?>assets\img\banner_register.png" style="width: 500px;">
          </div>
        </div>
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
    <script>
      $(document).ready(function() {
        $('#password, #confirm_password').on('keyup', function() {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Password Matching').css('color', 'green');
          } else
            $('#message').html('Password Not Matching').css('color', 'red');
        });
      });

      var togglePassword = document.getElementById('togglePassword');
      var toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
      var password = document.getElementById('password');
      var confirm_password = document.getElementById('confirm_password');

      togglePassword.addEventListener('click', function(e) {
        var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        if (type === 'password') {
          this.classList.remove('fa-eye');
          this.classList.add('fa-eye-slash');
        } else {
          this.classList.remove('fa-eye-slash');
          this.classList.add('fa-eye');
        }
      });

      toggleConfirmPassword.addEventListener('click', function(e) {
        var type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
        confirm_password.setAttribute('type', type);
        if (type === 'password') {
          this.classList.remove('fa-eye');
          this.classList.add('fa-eye-slash');
        } else {
          this.classList.remove('fa-eye-slash');
          this.classList.add('fa-eye');
        }
      });
    </script>
</body>

</html>