<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo.png"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('berita/arsip') ?>"><i class="fa fa-archive"></i> Arsip Berita</a></li>
        <li><a href="<?php echo base_url('emagazine/arsip_emagazine') ?>"><i class="fa fa-book"></i> E-Magazine</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php
          if (isset($_SESSION['username'])) {
            $nama = $this->session->userdata('nama');
            echo '
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Halo, ' . $nama . ' <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <div class="form-group">
                <div class="col-lg-12"><a href="' . base_url('user/logout') . '"><button class="btn btn-primary" type="submit"><i class="fa fa-sign-out"></i> Logout</button></a></div>
              </div>
            </li>
          </ul>';
          } else {
          ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php echo form_open('user/login') ?>
              <li>
                <div class="form-group">
                  <div class="col-lg-12">
                    <?php echo form_input(array('name' => 'username', 'class' => 'form-control', 'placeholder' => 'username')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <?php echo form_password(array('name' => 'password', 'class' => 'form-control', 'placeholder' => 'password')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Login</button></a>
                  </div>
                </div>
              </li>
              <?php echo form_close() ?>
              <li>
                <div class="form-group">
                  <div class="col-lg-12">
                    <a href="<?php echo base_url('user/register') ?>"><button class="btn btn-warning" type="submit"><i class="fa fa-pencil"></i> Register</button></a>
                  </div>
                </div>
              </li>
            </ul><?php } ?>
        </li>
      </ul>

      <?php echo form_open('berita/cari_berita', array('class' => 'navbar-form navbar-right')) ?>
      <div class="input-group">
        <?php echo form_input(array('class'  => 'form-control', 'name'  => 'cari_berita', 'placeholder'  => 'Cari Berita ....')) ?>
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari!</button>
        </span>
      </div><!-- /input-group -->
      <?php echo form_close() ?>
    </div>
  </div>
</nav>