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
  <section class='content'>
    <div class='row'>    
      <?php echo form_open($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div> 
        <!-- kolom kiri -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group"><label>No. Urut</label>
                <?php echo form_input($no_urut,$featured->no_urut);?>
              </div>
              <div class="form-group"><label>Pilih Berita</label>
                <?php echo form_dropdown('',$get_combo_berita,$featured->judul_featured,$judul_featured_css);?>
              </div>
            </div>
            <?php echo form_input($id_featured,$featured->id_featured);?>
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
              <button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
            </div>
          </div>
        </div>
        
      <?php echo form_close(); ?>
    </div>
  </section>
</div>