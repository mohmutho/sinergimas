<?php $this->load->view('front/user/header'); ?>

<?php $this->load->view('front/navbar'); ?>

<div class="container">
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">User</a></li>
  <li class="active">Login</li>
</ol>
  <div class="row">
    <div class="col-md-8">
      <div class="bs-callout bs-callout-primary"> <h4><i class="fa fa-pencil"></i> Login</h4> </div>
        <div class="col-md-12">
          <div class="box box-primary">
            <?php echo form_open("user/login", array('class'=> 'form-horizontal'));?>
            <div class="box-body">
              <?php echo $message;?>
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                    <?php echo form_input($username);?>
                  </div>
                </div>     
                <div class="form-group">
                  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <?php echo form_password($password);?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>  
              </fieldset>
            </div>
            <?php echo form_close(); ?>
          </div>
          
        </div>
      <hr>

    </div>

  <?php $this->load->view('front/sidebar'); ?>

<?php $this->load->view('front/footer'); ?>