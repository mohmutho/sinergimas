<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Emagazine extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Emagazine_model');
		$this->load->model('Kategori_model');

		$this->data['module'] = 'Emagazine';

		/* cek login */
		if (!$this->ion_auth->logged_in()) {
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		} elseif ($this->ion_auth->is_user()) {
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		}
	}

	public function index()
	{
		$this->data['title'] = "Data Emagazine";

		$this->data['emagazine_data'] = $this->Emagazine_model->get_all();
		$this->load->view('back/emagazine/emagazine_list', $this->data);
	}

	public function create()
	{
		$this->data['title']          = 'Tambah Emagazine Baru';
		$this->data['action']         = site_url('admin/emagazine/create_action');
		$this->data['button_submit']  = 'Submit';
		$this->data['button_reset']   = 'Reset';

		$this->data['id_emag'] = array(
			'name'  => 'id_emag',
			'id'    => 'id_emag',
			'type'  => 'hidden',
		);

		$this->data['judul_emag'] = array(
			'name'  => 'judul_emag',
			'id'    => 'judul_emag',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('judul_emag'),
		);

		$this->data['isi_link'] = array(
			'name'  => 'isi_link',
			'id'    => 'isi_link',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('isi_link'),
		);

		$this->data['kategori'] = array(
			'name'  => 'kategori',
			'id'    => 'kategori',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kategori'),
		);

		$this->data['author'] = array(
			'name'  => 'author',
			'id'    => 'author',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('author'),
		);

		$this->data['publish'] = array(
			'Ya'    => 'Ya',
			'Tidak' => 'Tidak',
		);

		$this->data['publish_css'] = array(
			'name'  => 'publish',
			'id'    => 'publish',
			'type'  => 'text',
			'class' => 'form-control',
		);

		$this->data['get_drop_kategori'] = $this->Kategori_model->get_combo_kategori();

		$this->load->view('back/emagazine/emagazine_add', $this->data);
	}

	public function create_action()
	{
		$this->load->helper('judul_seo_helper');
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			/* Jika file upload tidak kosong*/
			/* 4 adalah menyatakan tidak ada file yang diupload*/
			if ($_FILES['userfile']['error'] <> 4) {
				$nmfile = judul_seo($this->input->post('judul_emag'));

				/* memanggil library upload ci */
				$config['upload_path']      = './assets/images/emag/';
				$config['allowed_types']    = 'jpg|jpeg|png|gif';
				$config['max_size']         = '2048'; // 2 MB
				$config['max_width']        = '2000'; //pixels
				$config['max_height']       = '2000'; //pixels
				$config['file_name']        = $nmfile; //nama yang terupload nantinya

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {   //file gagal diupload -> kembali ke form tambah
					$this->create();
				}
				//file berhasil diupload -> lanjutkan ke query INSERT
				else {
					$userfile = $this->upload->data();
					$thumbnail                = $config['file_name'];
					// library yang disediakan codeigniter
					$config['image_library']  = 'gd2';
					// gambar yang akan dibuat thumbnail
					$config['source_image']   = './assets/images/emag/' . $userfile['file_name'] . '';
					// membuat thumbnail
					$config['create_thumb']   = TRUE;
					// rasio resolusi
					$config['maintain_ratio'] = FALSE;
					// lebar
					$config['width']          = 400;
					// tinggi
					$config['height']         = 200;

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$data = array(
						'judul_emag'  	=> $this->input->post('judul_emag'),
						'judul_seo'     => judul_seo($this->input->post('judul_emag')),
						'isi_link'    => $this->input->post('isi_link'),
						'kategori'      => $this->input->post('kategori'),
						'author'        => $this->input->post('author'),
						'publish'       => $this->input->post('publish'),
						'userfile'      => $nmfile,
						'userfile_type' => $userfile['file_ext'],
						'userfile_size' => $userfile['file_size'],
						'uploader'      => $this->session->userdata('identity')
					);

					// eksekusi query INSERT
					$this->Emagazine_model->insert($data);
					// set pesan data berhasil dibuat
					$this->session->set_flashdata('message', 'Data berhasil dibuat');
					redirect(site_url('admin/emagazine'));
				}
			} else // Jika file upload kosong
			{
				$data = array(
					'judul_emag'  	=> $this->input->post('judul_emag'),
					'judul_seo'     => judul_seo($this->input->post('judul_emag')),
					'isi_link'    => $this->input->post('isi_link'),
					'kategori'      => $this->input->post('kategori'),
					'author'        => $this->input->post('author'),
					'publish'       => $this->input->post('publish'),
					'uploader'      => $this->session->userdata('identity')
				);

				// eksekusi query INSERT
				$this->Emagazine_model->insert($data);
				// set pesan data berhasil dibuat
				$this->session->set_flashdata('message', 'Data berhasil dibuat');
				redirect(site_url('admin/emagazine'));
			}
		}
	}

	public function update($id)
	{
		$row = $this->Emagazine_model->get_by_id($id);
		$this->data['emagazine'] = $this->Emagazine_model->get_by_id($id);

		if ($row) {
			$this->data['title']          = 'Update Emagazine';
			$this->data['action']         = site_url('admin/emagazine/update_action');
			$this->data['button_submit']  = 'Update';
			$this->data['button_reset']   = 'Reset';

			$this->data['id_emag'] = array(
				'name'  => 'id_emag',
				'id'    => 'id_emag',
				'type'  => 'hidden',
			);

			$this->data['judul_emag'] = array(
				'name'  => 'judul_emag',
				'id'    => 'judul_emag',
				'type'  => 'text',
				'class' => 'form-control',
			);

			$this->data['isi_link'] = array(
				'name'  => 'isi_link',
				'id'    => 'isi_link',
				'class' => 'form-control',
			);

			$this->data['kategori_css'] = array(
				'name'  => 'kategori',
				'id'    => 'kategori',
				'class' => 'form-control',
			);

			$this->data['author'] = array(
				'name'  => 'author',
				'id'    => 'author',
				'type'  => 'text',
				'class' => 'form-control',
			);

			$this->data['publish_option'] = array(
				'Ya'    => 'Ya',
				'Tidak' => 'Tidak',
			);

			$this->data['publish_css'] = array(
				'name'  => 'publish',
				'id'    => 'publish',
				'type'  => 'text',
				'class' => 'form-control',
			);

			$this->data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();

			$this->load->view('back/emagazine/emagazine_edit', $this->data);
		} else {
			$this->session->set_flashdata('message', 'Data tidak ditemukan');
			redirect(site_url('admin/emagazine'));
		}
	}

	public function update_action()
	{
		$this->load->helper('judul_seo_helper');
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_emag'));
		} else {
			$nmfile = judul_seo($this->input->post('judul_emag'));
			$id['id_emag'] = $this->input->post('id_emag');

			/* Jika file upload diisi */
			if ($_FILES['userfile']['error'] <> 4) {
				// select column yang akan dihapus (gambar) berdasarkan id
				$this->db->select("userfile, userfile_type");
				$this->db->where($id);
				$query = $this->db->get('emagazine');
				$row = $query->row();

				// menyimpan lokasi gambar dalam variable
				$dir = "assets/images/emag/" . $row->userfile . $row->userfile_type;
				$dir_thumb = "assets/images/emag/" . $row->userfile . '_thumb' . $row->userfile_type;

				// Jika ada foto lama, maka hapus foto kemudian upload yang baru
				if ($dir) {
					$nmfile = judul_seo($this->input->post('judul_emag'));

					// Hapus foto
					unlink($dir);
					unlink($dir_thumb);

					//load uploading file library
					$config['upload_path']      = './assets/images/emag/';
					$config['allowed_types']    = 'jpg|jpeg|png|gif';
					$config['max_size']         = '2048'; // 2 MB
					$config['max_width']        = '2000'; //pixels
					$config['max_height']       = '2000'; //pixels
					$config['file_name']        = $nmfile; //nama yang terupload nantinya

					$this->load->library('upload', $config);

					// Jika file gagal diupload -> kembali ke form update
					if (!$this->upload->do_upload()) {
						$this->update();
					}
					// Jika file berhasil diupload -> lanjutkan ke query INSERT
					else {
						$userfile = $this->upload->data();
						// library yang disediakan codeigniter
						$thumbnail                = $config['file_name'];
						//nama yang terupload nantinya
						$config['image_library']  = 'gd2';
						// gambar yang akan dibuat thumbnail
						$config['source_image']   = './assets/images/emag/' . $userfile['file_name'] . '';
						// membuat thumbnail
						$config['create_thumb']   = TRUE;
						// rasio resolusi
						$config['maintain_ratio'] = FALSE;
						// lebar
						$config['width']          = 400;
						// tinggi
						$config['height']         = 200;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$data = array(
							'judul_emag'  	=> $this->input->post('judul_emag'),
							'judul_seo'     => judul_seo($this->input->post('judul_emag')),
							'isi_link'    	=> $this->input->post('isi_link'),
							'kategori'      => $this->input->post('kategori'),
							'author'        => $this->input->post('author'),
							'publish'       => $this->input->post('publish'),
							'userfile'      => $nmfile,
							'userfile_type' => $userfile['file_ext'],
							'userfile_size' => $userfile['file_size'],
							'time_update'   => date('Y-m-d'),
							'updater'       => $this->session->userdata('identity')
						);

						$this->Emagazine_model->update($this->input->post('id_emag'), $data);
						$this->session->set_flashdata('message', 'Edit Data Berhasil');
						redirect(site_url('admin/emagazine'));
					}
				}
				// Jika tidak ada foto pada record, maka upload foto baru
				else {
					//load uploading file library
					$config['upload_path']      = './assets/images/emag/';
					$config['allowed_types']    = 'jpg|jpeg|png|gif';
					$config['max_size']         = '2048'; // 2 MB
					$config['max_width']        = '2000'; //pixels
					$config['max_height']       = '2000'; //pixels
					$config['file_name']        = $nmfile; //nama yang terupload nantinya

					$this->load->library('upload', $config);

					// Jika file gagal diupload -> kembali ke form update
					if (!$this->upload->do_upload()) {
						$this->update();
					}
					// Jika file berhasil diupload -> lanjutkan ke query INSERT
					else {
						$userfile = $this->upload->data();
						// library yang disediakan codeigniter
						$thumbnail                = $config['file_name'];
						//nama yang terupload nantinya
						$config['image_library']  = 'gd2';
						// gambar yang akan dibuat thumbnail
						$config['source_image']   = './assets/images/emag/' . $userfile['file_name'] . '';
						// membuat thumbnail
						$config['create_thumb']   = TRUE;
						// rasio resolusi
						$config['maintain_ratio'] = FALSE;
						// lebar
						$config['width']          = 400;
						// tinggi
						$config['height']         = 200;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$data = array(
							'judul_emag'  	=> $this->input->post('judul_emag'),
							'judul_seo'     => judul_seo($this->input->post('judul_emag')),
							'isi_link'    	=> $this->input->post('isi_link'),
							'kategori'      => $this->input->post('kategori'),
							'author'        => $this->input->post('author'),
							'publish'       => $this->input->post('publish'),
							'userfile'      => $nmfile,
							'userfile_type' => $userfile['file_ext'],
							'userfile_size' => $userfile['file_size'],
							'time_update'   => date('Y-m-d'),
							'updater'      => $this->session->userdata('identity')
						);

						$this->Emagazine_model->update($this->input->post('id_emag'), $data);
						$this->session->set_flashdata('message', 'Edit Data Berhasil');
						redirect(site_url('admin/emagazine'));
					}
				}
			}
			// Jika file upload kosong
			else {
				$data = array(
					'judul_emag'  	=> $this->input->post('judul_emag'),
					'judul_seo'     => judul_seo($this->input->post('judul_emag')),
					'isi_link'	    => $this->input->post('isi_link'),
					'kategori'      => $this->input->post('kategori'),
					'author'        => $this->input->post('author'),
					'publish'       => $this->input->post('publish'),
					'updater'       => $this->session->userdata('identity')
				);

				$this->Emagazine_model->update($this->input->post('id_emag'), $data);
				$this->session->set_flashdata('message', 'Edit Data Berhasil');
				redirect(site_url('admin/emagazine'));
			}
		}
	}

	public function delete($id)
	{
		$row = $this->Emagazine_model->get_by_id($id);

		$this->db->select("userfile, userfile_type");
		$this->db->where('id_emag', $row->id_emag);
		$query = $this->db->get('emagazine');
		$row2 = $query->row();

		// menyimpan lokasi gambar dalam variable
		$dir = "assets/images/emag/" . $row2->userfile . $row2->userfile_type;
		$dir_thumb = "assets/images/emag/" . $row2->userfile . '_thumb' . $row2->userfile_type;

		// Jika data ditemukan, maka hapus foto dan record nya
		if ($row) {
			// Hapus foto
			unlink($dir);
			unlink($dir_thumb);

			$this->Emagazine_model->delete($id);
			$this->session->set_flashdata('message', 'Data berhasil dihapus');
			redirect(site_url('admin/emagazine'));
		}
		// Jika data tidak ada
		else {
			$this->session->set_flashdata('message', 'Data tidak ditemukan');
			redirect(site_url('admin/emagazine'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('judul_emag', 'Judul Emagazine', 'trim|required');
		$this->form_validation->set_rules('isi_link', 'Isi Link', 'trim|required');

		// set pesan form validasi error
		$this->form_validation->set_message('required', '{field} wajib diisi');

		$this->form_validation->set_rules('id_emag', 'id_emag', 'trim');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
