<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index(){
	$this->load->model('Berita_model');
    $this->load->model('Kategori_model');
    $this->load->model('Komentar_model');
    $this->load->model('Featured_model');
    $this->load->model('Ion_auth_model');
	$this->load->model('Emagazine_model');
	$this->load->model('Komentar_emag_model');

    /* cek status login */
		if (!$this->ion_auth->logged_in()){
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		}
		elseif($this->ion_auth->is_user()){
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		}
		else{
			$this->data = array(
	      'title' 						=> 'Dashboard',
	      'button' 						=> 'Tambah',
		    'total_berita' 				=> $this->Berita_model->total_rows(),
		    'total_user' 				=> $this->Ion_auth_model->total_rows(),
			'total_komen' 				=> $this->Komentar_model->get_total_row_kategori(),
			'total_komen_emag'			=> $this->Komentar_emag_model->get_total_row_kategori(),
		    'total_komen_pending' 		=> $this->Komentar_model->get_total_row_kategori_pending(),
			'total_komen_emag'			=> $this->Komentar_emag_model->get_total_row_kategori(),
			'total_komen_emag_pending'	=> $this->Komentar_emag_model->get_total_row_kategori_pending(),
			'total_featured' 			=> $this->Featured_model->total_rows(),
			'total_kategori' 			=> $this->Kategori_model->total_rows(),
			'total_emagazine'			=> $this->Emagazine_model->total_rows()
			);

			$this->load->view('back/dashboard',$this->data);
		}
	}
	
}
