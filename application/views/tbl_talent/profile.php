<style>
    .table-read {
        border-spacing: 0.5rem;
        border-collapse: collapse;
        width: 100%;
    }

    .table-read td {
        border-bottom: 1px solid #dee2e6;
        padding: 0.5rem;
    }

    .thumbnail-slider {
        width: 100%;
        float: left;
        overflow: hidden;
    }

    .thumbnail-slider .thumbnail-container {
        width: 100%;
        float: left;
        transition: margin 1s ease;
    }

    .thumbnail-slider .item {
        height: 180px;
        width: 270px;
        /* background-color: grey; */
        line-height: 170px;
        text-align: center;
        font-size: 50px;
        color: #ffffff;
        float: left;
        margin-left: 10%;
    }

    .thumbnail-slider .controls {
        width: 100%;
        float: left;
        padding: 15px;
    }

    .thumbnail-slider .controls ul {
        display: block;
        text-align: center;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .thumbnail-slider .controls ul li {
        height: 35px;
        width: 35px;
        border: 1px solid #c3c3c3;
        margin: 4px;
        display: inline-block;
        line-height: 33px;
        cursor: pointer;
    }

    .thumbnail-slider .controls ul li.active {
        background-color: grey;
        color: #ffffff;

    }

    .centered {
        position: absolute;
        cursor: pointer;
        text-align: center;
        /* left: 18%; */
        transform: translate(-162%, 51%);
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="container-fluid">
                <?php if ($this->session->userdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Updated !</h5>
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-default">
                            <div class="card-tools">
                                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fas fa-bars" style="color: black;"></i></a>
                                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                            <li><a href="<?php echo base_url('tbl_talent/ubah_profile'); ?>/<?php echo $this->session->userdata('id_users'); ?>" class="dropdown-item">Ubah Profile</a></li>
                                            <button type="button" class="btn" data-toggle="modal" data-target="#modal-password" style="margin-left: 2%;">Ubah Password</button>
                                            <button type="button" class="btn" data-toggle="modal" data-target="#modal-banner" style="margin-left: 2%;">Ubah Banner</button>
                                        </ul>
                                    </li>
                                    <div class="nav-link" style="padding-top: 1%; padding-left: 83%; position: relative;"><b><button class="btn <?php if ($status == 'active') {
                                                                                                                                                    echo 'btn-success';
                                                                                                                                                } else {
                                                                                                                                                    echo 'btn-danger';
                                                                                                                                                } ?> btn-sm"><?php echo strtoupper($status); ?></b></button< /div>
                                </ul>
                            </div>
                            <div class="row-md-6">
                                <div class="card card-widget widget-user">
                                    <?php if ($banner == NULL || $banner == '') { ?>
                                        <img src="<?php echo base_url('uploads/photo/default_banner.jpg'); ?>" style="width: 735px; height: 200px; object-fit: cover;">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/photo/' . $banner . ''); ?>" style="width: 735px; height: 200px; object-fit: cover;">
                                    <?php } ?>
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="<?php echo base_url('uploads/photo/' . $photo . ''); ?>" style="height:200px; width: 200px; object-fit: cover; ">
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-6">
                                <div class="card-body" style="padding-top: 75px;">
                                    <div class="text-center">
                                        <span style="font-size: 26px;"><?php echo $nama; ?></span><br />
                                        <span><i class="fas fa-map-marker-alt" style="color: grey;"></i> <?php echo $tempat; ?></span><br /><br />
                                        <?php $no = 0;
                                        foreach ($row_tags_by_id as $tags) : $no++; ?>
                                            <button class="btn btn-sm" style="font-size: 12px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px; margin-right: 5px;"><?php echo $tags['tags']; ?></button>
                                        <?php endforeach; ?>
                                        <!-- <span><b>Tarif</b></span><br />
                                        <span>Min. <?php echo str_replace(",", ".", number_format($tarif_minimum)); ?> - Max. <?php echo str_replace(",", ".", number_format($tarif_maximum)); ?></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">PORTOFOLIO / PRESTASI</h3>
                            </div>
                            <div class="col">
                                <div class="row-md-6">
                                    <div class="card-body">
                                        <?php echo $prestasi; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="row">
                                    <h3 class="card-title"><?php echo $kategori; ?></h3>
                                    <div class="col" style="text-align: right;">
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-photo" style="margin-bottom: 10px; padding-bottom: 5px;"><i class="fa fa-edit"> Edit Foto</i></button>
                                    </div>
                                </div>
                                <!-- <h3 class="card-title">
                                    <?php $no = 0;
                                    foreach ($row_tags_by_id as $tags) : $no++; ?>
                                        <button class="btn btn-sm" style="font-size: 12px; background-color: #e6e6e6; border-radius: 15px; padding: 2px 5px 2px 5px; margin-right: 5px;"><?php echo $tags['tags']; ?></button>
                                    <?php endforeach; ?>
                                </h3> -->
                            </div>
                            <div class="col">
                                <div class="row-md-12">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="thumbnail-slider">
                                                <div class="thumbnail-container">
                                                    <?php $no = 0;
                                                    foreach ($row_image as $image) : $no++; ?>
                                                        <div class="item">
                                                            <img src="<?php echo base_url('uploads/photo/' . $image->photo . ''); ?>" style="height:180px; width: auto; max-width: 270px; object-fit: cover;">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                                <!-- controls slides -->
                                                <div class="controls">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row-md-12">
                            <div class="content">
                                <div class="card card-widget widget-user">
                                <div class="card-header">
                                    <h3 class="card-title">SOSIAL MEDIA</h3>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="description-block">
                                                    <a target="_blank" href="http://www.instagram.com/<?php echo $instagram; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-instagram <?php if ($instagram == NULL && $instagram == '') {
                                                                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                                                                } ?>" style="font-size: 12px;"> Instagram</button></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="description-block">
                                                    <a target="_blank" href="http://www.facebook.com/<?php echo $facebook; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-facebook <?php if ($facebook == NULL && $facebook == '') {
                                                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                                                            } ?>" style="font-size: 12px;"> Facebook</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="description-block">
                                                    <a target="_blank" href="http://twitter.com/<?php echo $twitter; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-twitter <?php if ($twitter == NULL && $twitter == '') {
                                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                                    } ?>" style="font-size: 12px;"> Twitter</button></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="description-block">
                                                    <a target="_blank" href="http://tiktok.com/<?php echo $tiktok; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-tiktok<?php if ($tiktok == NULL && $tiktok == '') {
                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                        } ?>" style="font-size: 12px;"><i class="fas fa-globe"></i> Tiktok</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="description-block">
                                                    <a target="_blank" href="http://youtube.com/<?php echo $youtube; ?>" <button type="button" class="btn btn-block btn-outline-dark fab fa-youtube <?php if ($youtube == NULL && $youtube == '') {
                                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                                    } ?>" style="font-size: 12px;"> Youtube</button></a>
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
                        <div class="row-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">BIODATA</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table-read">
                                        <tr>
                                            <td width="130px">Nama Panggilan</td>
                                            <td width="10px">:</td>
                                            <td><?php echo $nama_panggilan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td><?php echo date("d M Y", strtotime($tanggal_lahir)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Usia</td>
                                            <td>:</td>
                                            <td><?php echo $usia; ?> tahun</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?php echo $jenis_kelamin; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hobby</td>
                                            <td>:</td>
                                            <td><?php echo $hobby; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan</td>
                                            <td>:</td>
                                            <td><?php echo $pendidikan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td><?php echo $pekerjaan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa</td>
                                            <td>:</td>
                                            <td><?php echo $bahasa; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tinggi Badan</td>
                                            <td>:</td>
                                            <td><?php echo $tinggi_badan; ?> cm</td>
                                        </tr>
                                        <tr>
                                            <td>Berat Badan</td>
                                            <td>:</td>
                                            <td><?php echo $berat_badan; ?> kg</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
                        <input type="hidden" class="form-control" name="change_password" value="2" />
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-photo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Foto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="notif" style="color: green;"></span>
                <form action="<?php echo base_url("tbl_talent/update_photo"); ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group" id="upload" style="padding-top: 5px; width: 1350px;">
                        <div class="custom-file">
                            <input type="file" class="form-control" name="upload[]" multiple>
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id_users" value="<?php echo $id_users; ?>" />
                                <input type="hidden" class="form-control" name="code_talent" value="<?php echo $code_talent; ?>" />
                                <button type="submit" class="btn btn-primary" style="text-align: right; margin-left: 10px;">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table-read">
                    <tr>
                        <?php $no = 0;
                        foreach ($row_image as $photo) : $no++; ?>
                            <img id="<?php echo $photo->id_photo; ?>" class="card-widget widget-user" src="<?php echo base_url('uploads/photo/' . $photo->photo . ''); ?>" style="height: auto; max-width: 150px; object-fit: cover; padding: 10px 10px 10px 10px; object-fit: cover;">
                            <button id="btn<?php echo $photo->id_photo; ?>" onclick="remove_photo(<?php echo $photo->id_photo; ?>)" class="btn centered btn-xs btn-danger" style="border-radius: 25%;"><i class="fa fa-trash"></i></button>
                        <?php endforeach; ?>

                    </tr>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-banner">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="notif2" style="color: green;"></span>
                <form action="<?php echo base_url("tbl_talent/update_banner"); ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group" id="upload" style="padding-top: 5px; width: 1350px;">
                        <div class="custom-file">
                            <input type="file" class="form-control" name="upload_banner">

                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id_users" value="<?php echo $id_users; ?>" />
                                <input type="hidden" class="form-control" name="code_talent" value="<?php echo $code_talent; ?>" />
                                <input type="hidden" class="form-control" name="banner" value="<?php echo $banner; ?>" />
                                <button type="submit" class="btn btn-primary" style="text-align: right; margin-left: 10px;">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function remove_photo(id) {

        var photo = document.getElementById(id);
        var btn = document.getElementById("btn" + id);
        let text = "Are you sure want to delete this photo ?";
        if (confirm(text) == true) {
            text = " Deleted Success";
            photo.remove();
            btn.remove();
        } else {
            text = "";
        }
        document.getElementById("notif2").innerHTML = text;

        $.ajax({
            url: "<?php echo site_url('tbl_talent/delete_photo/'); ?>" + id,
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

<script>
    function remove_banner(id) {

        var banner = document.getElementById(id);
        var btn = document.getElementById("btn" + id);
        let text = "Are you sure want to delete this banner ?";
        if (confirm(text) == true) {
            text = " Deleted Success";
            banner.remove();
            btn.remove();
        } else {
            text = "";
        }
        document.getElementById("notif").innerHTML = text;

        $.ajax({
            url: "<?php echo site_url('tbl_talent/delete_banner/'); ?>" + id,
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

<script>
    const controls = document.querySelector(".controls");
    const container = document.querySelector(".thumbnail-container");
    const allBox = container.children;
    const containerWidth = container.offsetWidth;
    const margin = 30;
    var items = 0;
    var totalItems = 0;
    var jumpSlideWidth = 0;


    // item setup per slide

    responsive = [{
            breakPoint: {
                width: 0,
                item: 1
            }
        }, //if width greater than 0 (1 item will show) 
        {
            breakPoint: {
                width: 600,
                item: 2
            }
        }, //if width greater than 600 (2  item will show) 
        {
            breakPoint: {
                width: 1000,
                item: 2
            }
        } //if width greater than 1000 (4 item will show) 
    ]

    function load() {
        for (let i = 0; i < responsive.length; i++) {
            if (window.innerWidth > responsive[i].breakPoint.width) {
                items = responsive[i].breakPoint.item
            }
        }
        start();
    }

    function start() {
        var totalItemsWidth = 0
        for (let i = 0; i < allBox.length; i++) {
            // width and margin setup of items
            allBox[i].style.width = (containerWidth / items) - margin + "px";
            allBox[i].style.margin = (margin / 2) + "px";
            totalItemsWidth += containerWidth / items;
            totalItems++;
        }

        // thumbnail-container width set up
        container.style.width = totalItemsWidth + "px";

        // slides controls number set up
        const allSlides = Math.ceil(totalItems / items);
        const ul = document.createElement("ul");
        for (let i = 1; i <= allSlides; i++) {
            const li = document.createElement("li");
            li.id = i;
            li.innerHTML = i;
            li.setAttribute("onclick", "controlSlides(this)");
            ul.appendChild(li);
            if (i == 1) {
                li.className = "active";
            }
        }
        controls.appendChild(ul);
    }

    // when click on numbers slide to next slide
    function controlSlides(ele) {
        // select controls children  'ul' element 
        const ul = controls.children;

        // select ul children 'li' elements;
        const li = ul[0].children


        var active;

        for (let i = 0; i < li.length; i++) {
            if (li[i].className == "active") {
                // find who is now active
                active = i;
                // remove active class from all 'li' elements
                li[i].className = "";
            }
        }
        // add active class to current slide
        ele.className = "active";

        var numb = (ele.id - 1) - active;
        jumpSlideWidth = jumpSlideWidth + (containerWidth * numb);
        container.style.marginLeft = -jumpSlideWidth + "px";
    }

    window.onload = load();
</script>