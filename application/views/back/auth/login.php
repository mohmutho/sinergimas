<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url()?>assets/template/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico" />
  </head>
  <body class="login-page">
    <div class="login-box">
      <div align="center">
        <h1 class="teks"><b>LOGIN</b></h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open("admin/auth/login");?>
          <div class="form-group has-feedback">
            <?php echo form_input(array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username', 'class' => 'form-control')); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?php echo form_password(array('name' => 'password', 'value' => set_value('password'), 'placeholder' => 'Password', 'class' => 'form-control')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <?php echo lang('login_remember_label', 'remember');?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
          <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        <?php echo form_close();?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>assets/template/backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/template/backend/css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/template/backend/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  </body>
</html>