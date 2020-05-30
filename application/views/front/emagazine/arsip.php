<?php $this->load->view('front/home/header'); ?>

<?php $this->load->view('front/navbar'); ?>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li class="active">Arsip Emagazine</li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

            <div class="bs-callout bs-callout-primary">
                <h4><i class="fa fa-book"></i> Arsip Emagazine</h4>
            </div>

            <div class="row">
                <?php
                foreach ($arsip as $emagazine_arsip) {
                    $caption = character_limiter($emagazine_arsip->isi_link, 150);
                ?>
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail" style="height: 465px">
                            <?php
                            if (empty($emagazine_arsip->userfile)) {
                                echo "<img src='" . base_url() . "assets/images/no_image_thumb.png' width='400' height='200'>";
                            } else {
                                echo " <img src='" . base_url() . "assets/images/emag/" . $emagazine_arsip->userfile . '_thumb' . $emagazine_arsip->userfile_type . "'> ";
                            }
                            ?>
                            <div align="right">
                                <span class="label label-success"><i class="fa fa-tag"></i> <?php echo $emagazine_arsip->kategori ?></span>
                                <span class="label label-warning"><i class="fa fa-user"></i> <?php echo $emagazine_arsip->author ?></span>
                                <span class="label label-info"><i class="fa fa-clock-o"></i> <?php echo $emagazine_arsip->time_upload ?></span>
                            </div>
                            <div class="caption">
                                <h4><a href="<?php echo base_url("emagazine/read/$emagazine_arsip->judul_seo ") ?>"><?php echo $emagazine_arsip->judul_emag ?></a></h4>
                                <div style="text-align: justify;"><?php echo $caption ?></div>
                            </div>
                            <div style="position: absolute;bottom: 30px;right: 20px;">
                                <a href="<?php echo base_url("emagazine/read/$emagazine_arsip->judul_seo ") ?>">
                                    <button type="button" class="btn-sm btn-primary">
                                        Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div align="center"><?php echo $this->pagination->create_links() ?></div>

            <hr>
        </div>

        <?php $this->load->view('front/sidebar'); ?>

        <?php $this->load->view('front/footer'); ?>