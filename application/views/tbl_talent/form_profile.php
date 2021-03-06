    <style>
        .centered {
            position: absolute;
            cursor: pointer;
            text-align: center;
            /* left: 18%; */
            transform: translate(-162%, 51%);
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="row">
                            <!-- Card Telent -->
                            <div class="col-md-6">
                                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama * <?php echo form_error('nama') ?></label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_panggilan">Nama Panggilan *<?php echo form_error('nama_panggilan') ?></label>
                                            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $nama_panggilan; ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat">Domisili *<?php echo form_error('tempat') ?></label>
                                            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Domisili" value="<?php echo $tempat; ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir *<?php echo form_error('tanggal_lahir') ?></label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="usia">Usia *<?php echo form_error('usia') ?></label>
                                            <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia" value="<?php echo $usia; ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin *<?php echo form_error('jenis_kelamin') ?></label>
                                            <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option></option>
                                                <option value="Pria" <?php if ($jenis_kelamin == 'Pria') {
                                                                            echo 'selected';
                                                                        } ?>>Pria</option>
                                                <option value="Wanita" <?php if ($jenis_kelamin == 'Wanita') {
                                                                            echo 'selected';
                                                                        } ?>>Wanita</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hobby">Hobby <?php echo form_error('hobby') ?></label>
                                            <textarea class="form-control" name="hobby" id="hobby" rows="5" placeholder="Hobby"><?php echo $hobby; ?></textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan *<?php echo form_error('pendidikan') ?></label>
                                        <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
                                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="bahasa">Bahasa <?php echo form_error('bahasa') ?></label>
                                        <input type="text" class="form-control" name="bahasa" id="bahasa" placeholder="Bahasa" value="<?php echo $bahasa; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi_badan">Tinggi Badan *<?php echo form_error('tinggi_badan') ?></label>
                                        <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="berat_badan">Berat Badan *<?php echo form_error('berat_badan') ?></label>
                                        <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori *<?php echo form_error('id_kategori') ?></label>
                                        <select class="form-control select2" id="id_kategori" name="id_kategori" required>
                                            <option></option>
                                            <?php $no = 0;
                                            foreach ($row_kategori as $row) : $no++; ?>
                                                <option value="<?php echo $row->id_kategori; ?>" <?php if ($row->id_kategori == $id_kategori) {
                                                                                                        echo 'selected';
                                                                                                    }  ?>><?php echo $row->kategori; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tarif">Rate *<?php echo form_error('tarif') ?></label>
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 1%; padding-left: 5%;">Min.</div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="tarif_minimum" id="tarif_minimum" placeholder="Rate Min." value="<?php echo $tarif_minimum; ?>" required />
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 1%;">
                                            <div class="col-md-2" style="margin-top: 1%; padding-left: 5%;">Max.</div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="tarif_maximum" id="tarif_maximum" placeholder="Rate Max." value="<?php echo $tarif_maximum; ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="rides">Rides<?php echo form_error('rides') ?></label>
                                            <textarea class="form-control" name="rides" id="rides" rows="5" placeholder="Rides"><?php echo $rides; ?></textarea>
                                        </div>
                                    <!-- <div class="form-group">
                                        <label for="tentang">Tentang <?php echo form_error('tentang') ?></label>
                                        <textarea class="form-control" name="tentang" id="tentang" placeholder="Tentang"><?php echo $tentang; ?></textarea>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Skill *</h3>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <input type="text" name="tags" id="tags" class="form-control" placeholder="skill" value="<?php $no = 0;
                                                                                                                                foreach ($row_tags_by_id as $tags) : $no++; ?> <?php echo $tags['tags']; ?>, <?php endforeach; ?>" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Card Tag Media -->
                        <div class="col-md-6">
                            <!-- Card Sosial Media -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">SOSIAL MEDIA</h3>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control" placeholder="Username Instagram" value="<?php echo $instagram; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                        </div>
                                        <input type="text" name="facebook" class="form-control" placeholder="Username Facebook" value="<?php echo $facebook; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter-square"></i></span>
                                        </div>
                                        <input type="text" name="twitter" class="form-control" placeholder="Username Twitter" value="<?php echo $twitter; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-tiktok-square"></i></span>
                                        </div>
                                        <input type="text" name="tiktok" class="form-control" placeholder="Username tiktok" value="<?php echo $tiktok; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube-square"></i></span>
                                        </div>
                                        <input type="text" name="youtube" class="form-control" placeholder="Username youtube" value="<?php echo $youtube; ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-plus-square"></i></span>
                                        </div>
                                        <input type="text" name="other" class="form-control" placeholder="URL Other" value="<?php echo $other; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Button Save -->
                        </div>
                        <!-- Card Photo -->
                        <div class="col-md-6">
                            <div class="row-md-6">
                            <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                PORTOFOLIO / PRESTASI
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="prestasi" name='prestasi'><?php echo $prestasi; ?></textarea>
                                        </div>
                                    </div>
                                <!-- Card Prestation -->
                                <div class="row">
                                    <div class="float-left d-none d-sm-block" style="margin-left: 400px;">
                                        <input type="hidden" name="id_talent" value="<?php echo $id_talent; ?>" />
                                        <input type="hidden" name="code_talent" value="<?php echo $code_talent; ?>" />
                                        <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />
                                        <?php if ($update == 1) { ?>
                                            <a href="<?php echo site_url('tbl_talent/profile_talent') ?>/<?php echo $this->session->userdata('id_users'); ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="card-footer">
                    <div class="float-right d-none d-sm-block">
                        <input type="hidden" name="id_talent" value="<?php echo $id_talent; ?>" />
                        <input type="hidden" name="code_talent" value="<?php echo $code_talent; ?>" />
                        <a href="<?php echo site_url('tbl_talent') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancel</a>
                        <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                    </div>
                </div> -->
    </div>
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- untuk multi prestasi -->
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.10.2.js' ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url() . 'assets/adminlte/plugins/summernote/summernote-bs4.min.js' ?>"></script>
    <!-- Tagify -->
    <script src="<?php echo base_url() . 'assets/tagify/dist/tagify.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/tagify/dist/jQuery.tagify.min.js' ?>"></script>
    <!-- Taginput -->
    <script src="<?php echo base_url() . 'assets/tags/dist/bootstrap-tagsinput.js' ?>"></script>

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#prestasi').append("<div id='row" + i + "' class='input-group' style='padding-top: 15px'><div class='input-group-prepend'><span class='input-group-text'><i class='fas fa-trophy'></i></span></div><input type='text' name='prestasi[]' class='form-control name_list'><div class='input-group-append'><div id='" + i + "' class='input-group-text btn_remove' style='background-color: red; color: white;'><i class='fas fa-minus'></i></div></div></div>");
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>

    <script>
        $(function() {
            // Summernote
            $('#prestasi').summernote()
        })
    </script>

    <script>
        $(function() {

            var input = document.querySelector('input[name=tags]'),
                // init Tagify script on the above inputs
                tagify = new Tagify(input, {
                    whitelist: [<?php $no = 0;
                                foreach ($row_tags as $tags) : $no++; ?> "<?php echo $tags['tags']; ?>", <?php endforeach; ?>],
                });

            var value = tagify.value;
            var tagArray = [];
            for (var i = 0; i < value.length; i++) {
                tagArray = value[i]['value'];
            }
            // console.log('value: ', value);
            // console.log('tag array: ', tagArray);

            // Chainable event listeners
            tagify.on('add', onAddTag)
                .on('remove', onRemoveTag)
                .on('input', onInput)
                .on('edit', onTagEdit)
                .on('invalid', onInvalidTag)
                .on('click', onTagClick)
                .on('dropdown:show', onDropdownShow)
                .on('dropdown:hide', onDropdownHide);

            // tag added callback
            function onAddTag(e) {
                var add = input.value;
                var add1 = e;
                console.log("input: ", add);
                console.log("input1: ", add1);
                console.log("onAddTag: ", e.detail);
                console.log("original input value: ", input.value)
                tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
            }

            // tag remvoed callback
            function onRemoveTag(e) {
                console.log(e.detail);
                console.log("tagify instance value:", tagify.value)
            }

            // on character(s) added/removed (user is typing/deleting)
            function onInput(e) {
                console.log(e.detail);
                console.log("onInput: ", e.detail);
            }

            function onTagEdit(e) {
                console.log("onTagEdit: ", e.detail);
            }

            // invalid tag added callback
            function onInvalidTag(e) {
                console.log("onInvalidTag: ", e.detail);
            }

            // invalid tag added callback
            function onTagClick(e) {
                console.log(e.detail);
                console.log("onTagClick: ", e.detail);
            }

            function onDropdownShow(e) {
                console.log("onDropdownShow: ", e.detail)
            }

            function onDropdownHide(e) {
                console.log("onDropdownHide: ", e.detail)
            }
        })
    </script>