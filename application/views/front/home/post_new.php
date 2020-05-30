<div class="bs-callout bs-callout-primary"> <h4><i class="fa fa-newspaper-o"></i> Berita Terbaru</h4> </div>

<div class="row">
  <?php
  foreach ($post_new_data as $post_new)
  {
    $caption = character_limiter($post_new->isi_berita,150);
  ?>
  <div class="col-sm-6 col-md-6">
    <div class="thumbnail" style="height: 465px">
      <?php 
      if(empty($post_new->userfile)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='400' height='200'>";}  
      else { echo " <img src='".base_url()."assets/images/berita/".$post_new->userfile.'_thumb'.$post_new->userfile_type."'> ";}
      ?>
      <div align="right">
        <span class="label label-success"><i class="fa fa-tag"></i> <?php echo $post_new->kategori ?></span>
        <span class="label label-warning"><i class="fa fa-user"></i> <?php echo $post_new->author ?></span>
        <span class="label label-info"><i class="fa fa-clock-o"></i> <?php echo $post_new->time_upload ?></span>
      </div>
      <div class="caption">
        <h4><a href="<?php echo base_url("berita/read/$post_new->judul_seo ") ?>"><?php echo $post_new->judul_berita ?></a></h4>
        <div style="text-align: justify;"><?php echo $caption ?></div>
      </div>
      <div style="position: absolute;bottom: 30px;right: 20px;">
        <a href="<?php echo base_url("berita/read/$post_new->judul_seo ") ?>">
          <button type="button" class="btn-sm btn-primary">
            Selengkapnya <i class="fa fa-arrow-circle-right"></i>
          </button>
        </a>
      </div>
    </div>
  </div>
  <?php } ?>

</div>