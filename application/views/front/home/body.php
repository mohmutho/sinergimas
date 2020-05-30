<?php $this->load->view('front/home/header'); ?>

<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

			<?php $this->load->view('front/home/featured') ?>

			<?php $this->load->view('front/home/post_new') ?>			
		</div>

		<?php $this->load->view('front/sidebar'); ?>

<?php $this->load->view('front/footer'); ?>