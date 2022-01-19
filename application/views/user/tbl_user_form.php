<div class="content-wrapper">
  <section class="content" style="padding-top: 1%">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header" style="background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));">
              <h3 class="card-title">USER LOGIN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <table class='table table-bordered>' <tr>
                <td width='200'>Nama Karyawan </td>
                <td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="nama lengkap" value="<?php echo $nama_lengkap; ?>" /></td>
                </tr>
                <tr>
                  <td width='200'>Role <?php echo form_error('id_user_level') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'ASC') ?>
                  </td>
                </tr>
                <tr>
                  <td width='200'>Username </td>
                    <td><input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo $username; ?>" /></td>
                </tr>
                <tr>
                  <td width='200'>Contact </td>
                    <td><input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak" value="<?php echo $kontak; ?>" /></td>
                </tr>
                <?php
                if ($this->uri->segment(2) == 'create') {
                ?>
                  <tr>
                    <td width='200'>Password <?php echo form_error('password') ?></td>
                    <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
                  </tr>
                <?php
                }
                ?>
                <tr>
                  <td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td>
                  <td><?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>
                    <!--<input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />-->
                  </td>
                </tr>
                <tr>
                  <td width='200'>Perusahaan </td>
                  <td><input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" /></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
                    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                    <a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.10.2.js' ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("button").click(function() {
      $("#container").removeAttr("style");
    });
  });

  $(document).ready(function() {
    $('#id_pasien').change(function() {
      var id = $(this).val();
      $.ajax({
        url: "<?php echo site_url('User/get_email'); ?>",
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].email + '>' + data[i].email + '</option>';
          }
          $('#email').html(html);

        }
      });
      return false;
    });

  });
</script>