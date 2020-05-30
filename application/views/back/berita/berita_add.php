<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li class="active"><?php echo $title ?></li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <?php echo form_open_multipart($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group"><label>Judul Berita</label>
                <?php echo form_input($judul_berita);?>
              </div>
              <div class="form-group"><label>Isi Berita</label>
                <?php echo form_textarea($isi_berita);?>
              </div>
            </div>
          </div>
        </div>

        <!-- kolom kanan -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div class="row">
                <div class="col-xs-4"><label>Author</label>
                  <?php echo form_input($author);?>
                </div>
                <div class="col-xs-4"><label>Kategori</label>
                  <?php echo form_dropdown('', $get_drop_kategori, '', $kategori); ?>
                </div>
                <div class="col-xs-4"><label>Status Publish</label>
                  <?php echo form_dropdown('', $publish, '', $publish_css); ?>
                </div>
              </div><br>
              <div class="form-group"><label>Gambar</label>
                <input type="file" class="form-control" name="userfile" id="userfile" onchange="tampilkanPreview(this,'preview')"/>
                <br><p><b>Preview Gambar</b><br>
                <img id="preview" src="" alt="" width="350px"/>
              </div>
            </div>
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

<script type="text/javascript">
function tampilkanPreview(userfile,idpreview)
{ //membuat objek gambar
  var gb = userfile.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    { //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/') ?>tinymce/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: "textarea",

  // ===========================================
  // INCLUDE THE PLUGIN
  // ===========================================

  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],

  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================

  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

  // ===========================================
  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
  // ===========================================

  relative_urls: false
});

</script>
  <!-- /TinyMCE -->

<?php $this->load->view('back/footer'); ?>
