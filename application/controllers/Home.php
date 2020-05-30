<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		/* memanggil model untuk ditampilkan pada masing2 modul*/
		$this->load->model('Berita_model');
    	$this->load->model('Featured_model');
		$this->load->model('Kategori_model');
		$this->load->model('Emagazine_model');
		// $this->load->model('Emagazine_model');
    	/* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['page'] = 'Home';
		$this->data['title'] = 'Sinergimas';

		/* memanggil function dari masing2 model yang akan digunakan */
		$this->data['post_new_data'] = $this->Berita_model->get_all_new_home();
		$this->data['get_all_komentar_sidebar']    = $this->Berita_model->get_all_komentar_sidebar();
		$this->data['get_all_berita_sidebar'] 	   = $this->Berita_model->get_all_berita_sidebar();
		$this->data['get_all_kategori_sidebar']    = $this->Kategori_model->get_all_kategori_sidebar();
		$this->data['get_all_emagazine_sidebar']   = $this->Emagazine_model->get_all_emagazine_sidebar();
		$this->data['post_featured_data'] = $this->Featured_model->get_all();
		// $this->data['get_all_emagazine_sidebar'] = $this->Emagazine_model->get_all_emagazine_sidebar();
		
		/* memanggil view yang telah disiapkan dan passing data dari model ke view*/
		$this->load->view('front/home/body', $this->data);
	}

}