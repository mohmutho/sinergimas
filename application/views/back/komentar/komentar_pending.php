<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-body table-responsive padding">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">Isi Komentar</th>
              <th style="text-align: center">Berita</th>
              <th style="text-align: center">Upload</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($komentar_pending_data as $komentar_pending) : ?>
              <tr>
                <td style="text-align:left"><?php echo $komentar_pending->nama ?></td>
                <td style="text-align:left"><?php echo $komentar_pending->isi_komentar ?></td>
                <td style="text-align:left"><?php echo $komentar_pending->judul_berita ?></td>
                <td style="text-align:center"><?php echo $komentar_pending->time_upload ?></td>
                <td style="text-align:center">
                  <?php
                  echo anchor(site_url('admin/komentar/terima/' . $komentar_pending->id_komentar), '<i class="glyphicon glyphicon-ok"></i>', 'title="Terima", class="btn btn-sm btn-warning"');
                  echo ' ';
                  echo anchor(site_url('admin/komentar/tolak/' . $komentar_pending->id_komentar), '<i class="glyphicon glyphicon-remove"></i>', 'title="Tolak", class="btn btn-sm btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
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
  function confirmDialog() {
    return confirm('Apakah anda yakin?')
  }
  $('#datatable').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "lengthMenu": [
      [10, 25, 50, 100, 500, 1000, -1],
      [10, 25, 50, 100, 500, 1000, "Semua"]
    ]
  });
</script>

<?php $this->load->view('back/footer'); ?>