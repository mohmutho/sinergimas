<div class="col-md-4">
	<div class="bs-callout bs-callout-primary">
		<h4><i class="fa fa-search"></i> Find Us On</h4>
	</div>
	<div class="input-group">
		<button type="button" class="btn btn-default"><i class="fa fa-facebook"></i></button>&nbsp
		<button type="button" class="btn btn-default"><i class="fa fa-instagram"></i></button>&nbsp
		<button type="button" class="btn btn-default"><i class="fa fa-twitter"></i></button>&nbsp
		<button type="button" class="btn btn-default"><i class="fa fa-google-plus"></i></button>&nbsp
		<button type="button" class="btn btn-default"><i class="fa fa-youtube-play"></i></button>&nbsp
	</div>

	<br>

	<div class="bs-callout bs-callout-primary">
		<h4><i class="fa fa-newspaper-o"></i> Berita Terbaru</h4>
	</div>
	<ul class="list-group">
		<?php
		foreach ($get_all_berita_sidebar as $berita_sidebar) {
		?>
			<li class="list-group-item">
				<span class="badge">NEW</span>
				<?php echo anchor('berita/read/' . $berita_sidebar->judul_seo . '', '' . $berita_sidebar->judul_berita . '') ?>
			</li>
		<?php } ?>
	</ul>

	<div class="bs-callout bs-callout-primary">
		<h4><i class="fa fa-comments"></i> Komentar Terbaru</h4>
	</div>
	<ul class="list-group">
		<?php
		foreach ($get_all_komentar_sidebar as $komentar_sidebar) {
		?>
			<li class="list-group-item">
				<span class="badge">NEW</span>
				<?php
				echo ' "<b> ' . $komentar_sidebar->isi_komentar . ' </b> " oleh ' . $komentar_sidebar->nama . ' <br> ';
				echo "pada ";
				echo anchor('berita/read/' . $komentar_sidebar->judul_seo . '', '' . $komentar_sidebar->judul_berita . '');
				echo ", $komentar_sidebar->time_upload";
				?>
			</li>
		<?php } ?>
	</ul>

	<div class="bs-callout bs-callout-primary">
		<h4><i class="fa fa-tags"></i> Kategori</h4>
	</div>
	<ul class="list-group">
		<?php
		foreach ($get_all_kategori_sidebar as $kategori_sidebar) {
		?>
			<li class="list-group-item">
				<span class="badge"></span>
				<i class="fa fa-tag"></i> <?php echo anchor('berita/kategori/' . $kategori_sidebar->kategori_seo . '', '' . $kategori_sidebar->judul_kategori . '') ?>
			</li>
		<?php } ?>
	</ul>

	<div class="bs-callout bs-callout-primary">
		<h4><i class="fa fa-book"></i> Emagazine Terbaru</h4>
	</div>
	<ul class="list-group">
		<?php
		foreach ($get_all_emagazine_sidebar as $emagazine_sidebar) {
		?>
			<li class="list-group-item">
				<span class="badge">NEW</span>
				<?php echo anchor('emagazine/read/' . $emagazine_sidebar->judul_seo . '', '' . $emagazine_sidebar->judul_emag . '') ?>
			</li>
		<?php } ?>
	</ul>

</div>