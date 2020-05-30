<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Cuci</li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div id="infoMessage"></div>
      <?php echo form_open("admin/auth/create_user");?>
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <?php echo $message;?>
              <div class="row">
                <div class="col-xs-6"><label>Nama</label>
                  <?php echo form_input($nama);?>
                </div>
                <div class="col-xs-6"><label>Username</label>
                  <?php echo form_input($username);?>
                </div>
              </div><br>
              <div class="row">
                <div class="col-xs-6"><label>Email</label>
                  <?php echo form_input($email);?>
                </div>
                <div class="col-xs-6"><label>No. HP</label>
                  <?php echo form_input($phone);?>
                </div>
              </div><br>
              <div class="form-group"><label>Alamat</label>
                <?php echo form_textarea($alamat);?>
              </div>
              <div class="form-group"><label>Tipe user</label>
                <?php echo form_dropdown('usertype', $get_all_users_group, '', $usertype_css); ?>
              </div>
              <div class="row">
                <div class="col-xs-6"><label>Password</label>
                  <?php echo form_input($password);?>
                </div>
                <div class="col-xs-6"><label>Konfirmasi Password</label>
                  <?php echo form_input($password_confirm);?>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
              <button type="reset" name="reset" class="btn btn-danger">Reset</button>
            </div>
          </div><!-- /.box -->
          <!-- left column -->
        </div>
      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<?php $this->load->view('back/footer'); ?>
