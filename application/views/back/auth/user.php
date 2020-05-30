<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>User</li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-body table-responsive padding">
        <a href="<?php echo base_url('admin/auth/create_user') ?>">
          <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah User Baru</button>
        </a>

        <h4 align="center"><?php echo $message ?></h4>

        <hr/>
        <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center">No.</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">Username</th>
              <th style="text-align: center">Email</th>
              <th style="text-align: center">Last Login</th>
              <th style="text-align: center">Usertype</th>
              <th style="text-align: center">Status</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($users as $user):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td><?php echo $user->nama ?></td>
              <td style="text-align:center"><?php echo $user->username ?></td>
              <td style="text-align:center"><?php echo $user->email ?></td>
              <td style="text-align:center"><?php echo $user->last_login ?></td>
              <td style="text-align:center"><?php echo $user->usertype ?></td>
              <td style="text-align:center"><?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, 'ACTIVE','title="ACTIVE", class="btn btn-sm btn-primary"', lang('index_active_link')) : anchor("admin/auth/activate/". $user->id, 'INACTIVE','title="INACTIVE", class="btn btn-sm btn-danger"' , lang('index_inactive_link'));?></td>
              <td style="text-align:center">
              <?php 
              echo anchor(site_url('admin/auth/edit_user/'.$user->id),'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-sm btn-warning"'); echo ' ';
              echo anchor(site_url('admin/auth/delete_user/'.$user->id),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-sm btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');  
              ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $("#mytable").dataTable();
  });
</script>

<?php $this->load->view('back/footer'); ?>
