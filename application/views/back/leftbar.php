<!-- Kolom Sebelah Kiri -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"><img src="<?php echo base_url() ?>assets/images/admin.png" class="img-circle" alt="User Image" /></div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?></p>
        <p>( <?php echo $this->session->userdata('usertype'); ?> )</p>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <li class="treeview">
        <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-newspaper-o'></i><span> Berita </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/berita/create') ?>'><i class='fa fa-circle-o'></i> Tambah Berita </a></li>
          <li><a href='<?php echo base_url('admin/berita') ?>'><i class='fa fa-circle-o'></i> Data Berita </a></li>
        </ul>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-book'></i><span> Emagazine </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/emagazine/create') ?>'><i class='fa fa-circle-o'></i> Tambah Emagazine </a></li>
          <li><a href='<?php echo base_url('admin/emagazine') ?>'><i class='fa fa-circle-o'></i> Data Emagazine </a></li>
        </ul>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-credit-card'></i><span> Featured </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/featured/create') ?>'><i class='fa fa-circle-o'></i> Tambah Featured </a></li>
          <li><a href='<?php echo base_url('admin/featured') ?>'><i class='fa fa-circle-o'></i> Data Featured </a></li>
        </ul>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-tags'></i><span> Kategori </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/kategori/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kategori </a></li>
          <li><a href='<?php echo base_url('admin/kategori') ?>'><i class='fa fa-circle-o'></i> Data Kategori </a></li>
        </ul>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-comments'></i><span> Komentar </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/komentar/pending') ?>'><i class='fa fa-circle-o'></i> Komentar Pending </a></li>
          <li><a href='<?php echo base_url('admin/komentar') ?>'><i class='fa fa-circle-o'></i> Data Komentar </a></li>
        </ul>
      </li>
      <li class='treeview'>
        <a href='#'><i class='fa fa-comments'></i><span> Komentar Emagazine </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/komentar_emag/pending') ?>'><i class='fa fa-circle-o'></i> Komentar Pending </a></li>
          <li><a href='<?php echo base_url('admin/komentar_emag') ?>'><i class='fa fa-circle-o'></i> Data Komentar </a></li>
        </ul>
      </li>
      <li class="header">SETTING</li>
      <li class='treeview'>
        <a href='<?php $user_id = $this->session->userdata('user_id');
                  echo base_url('admin/auth/edit_user/' . $user_id . '') ?>'>
          <i class='fa fa-edit'></i><span> Edit Profil </span>
        </a>
      </li>

      <?php if ($this->ion_auth->is_superadmin()) : ?>
        <li class='treeview'>
          <a href='#'><i class='fa fa-user'></i><span> User </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_user'><i class='fa fa-circle-o'></i> Tambah User</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/user'><i class='fa fa-circle-o'></i> Data User</a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-users'></i><span> Group </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_group'><i class='fa fa-circle-o'></i> Tambah Group</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/users_group'><i class='fa fa-circle-o'></i> Data Group</a></li>
          </ul>
        </li>
      <?php endif ?>
      <li> <a href='<?php echo base_url() ?>admin/auth/logout'> <i class="fa fa-sign-out"></i> <span>Logout</span> </a> </li>
    </ul>

  </section>
</aside>