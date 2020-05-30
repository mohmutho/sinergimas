<div class="slider-wrap">      
  <div id="slider" class="owl-carousel">
    <?php
    foreach ($post_featured_data as $post_featured)
    {
    ?>
    <div class="item">
      <a href="<?php echo base_url("berita/read/$post_featured->judul_seo ") ?>">
        <img style="height:400px" src="assets/images/berita/<?php echo $post_featured->userfile.$post_featured->userfile_type ?>" alt="<?php echo $post_featured->judul_berita ?>" title="<?php echo $post_featured->judul_berita ?>">
        <span class="caption-slider"><?php echo $post_featured->judul_berita ?></span>
      </a>
    </div>
    <?php } ?>
  </div>  
</div>

<hr>