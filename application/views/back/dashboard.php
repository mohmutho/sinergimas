<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <div class="box-body">
    <div class="callout callout-success "><i class='fa fa-bullhorn'></i> Selamat Datang <b><?php echo $this->session->userdata('nama') ?></b>
    </div>
  </div>

  <section class='content'>
    <div class='row'>
      <div class='col-lg-6 col-xs-6'>
        <div class='small-box bg-yellow'>
          <div class='inner'>
            <h3> <?php echo $total_berita ?> </h3>
            <p>Berita</p>
          </div>
          <div class='icon'><i class='fa fa-newspaper-o'></i></div>
          <a href='<?php echo base_url('admin/berita') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-yellow'>
          <div class='inner'>
            <h3> <?php echo $total_komen ?> </h3>
            <p>Total Komentar</p>
          </div>
          <div class='icon'><i class='fa fa-comments'></i></div>
          <a href='<?php echo base_url('admin/komentar') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-yellow'>
          <div class='inner'>
            <h3> <?php echo $total_komen_pending ?> </h3>
            <p>Komentar Baru</p>
          </div>
          <div class='icon'><i class='fa fa-comment'></i></div>
          <a href='<?php echo base_url('admin/komentar/pending') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-blue'>
          <div class='inner'>
            <h3> <?php echo $total_kategori ?> </h3>
            <p>Kategori</p>
          </div>
          <div class='icon'><i class='fa fa-tags'></i></div>
          <a href='<?php echo base_url('admin/kategori') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-gray'>
          <div class='inner'>
            <h3> <?php echo $total_user ?> </h3>
            <p>User</p>
          </div>
          <div class='icon'><i class='fa fa-user'></i></div>
          <a href='<?php echo base_url('admin/auth/user') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-6 col-xs-6'>
        <div class='small-box bg-green'>
          <div class='inner'>
            <h3> <?php echo $total_emagazine ?> </h3>
            <p>Emagazine</p>
          </div>
          <div class='icon'><i class='fa fa-book'></i></div>
          <a href='<?php echo base_url('admin/emagazine') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-green'>
          <div class='inner'>
            <h3> <?php echo $total_komen_emag ?> </h3>
            <p>Total Komentar Emagazine</p>
          </div>
          <div class='icon'><i class='fa fa-comments'></i></div>
          <a href='<?php echo base_url('admin/komentar_emag') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-green'>
          <div class='inner'>
            <h3> <?php echo $total_komen_emag_pending ?> </h3>
            <p>Komentar Baru Emagazine</p>
          </div>
          <div class='icon'><i class='fa fa-comment'></i></div>
          <a href='<?php echo base_url('admin/komentar_emag/pending') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
        <div class='small-box bg-red'>
          <div class='inner'>
            <h3> <?php echo $total_featured ?> </h3>
            <p>Featured</p>
          </div>
          <div class='icon'><i class='fa fa-credit-card'></i></div>
          <a href='<?php echo base_url('admin/featured') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('back/footer'); ?>