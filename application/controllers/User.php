<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* mengatur pesan error */
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		/*memanggil bahasa/ language bawaan ion_auth*/
		$this->lang->load('auth');

		/* memanggil model untuk ditampilkan pada masing2 modul*/
		$this->load->model('Ion_auth_model');
		$this->load->model('Berita_model');
    $this->load->model('Featured_model');
	$this->load->model('Kategori_model');
	// $this->load->model('Emagazine_model');

    /* memanggil function dari masing2 model yang akan digunakan */
		$this->data['get_all_berita_sidebar']   = $this->Berita_model->get_all_berita_sidebar();
    $this->data['get_all_kategori_sidebar'] = $this->Kategori_model->get_all_kategori_sidebar();
	$this->data['get_all_komentar_sidebar'] = $this->Berita_model->get_all_komentar_sidebar();
		// $this->data['get_all_emagazine_sidebar'] = $this->Emagazine_model->get_all_emagazine_sidebar();
	}

	public function register()
	{
		/* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['page'] = "Register/ Login";
		$this->data['title'] = "Portal Berita CI";
		
		// setting bawaan ionauth
		$tables 					= $this->config->item('tables','ion_auth');
		$identity_column 	= $this->config->item('identity','ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validasi form input
		$this->form_validation->set_rules('nama', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('username', $this->lang->line('create_username_validation_fname_label'), 'required');

		/* pengecekan username harus diisi dan unique/ tidak sama dengan yang ada di db */
		if($identity_column!=='username')
		{
			$this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
		}
			else
			{
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[' . $tables['users'] . '.username]');
			}

		/* set_rule validasi form input */
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		/* set_message pada validasi form input */
		$this->form_validation->set_message('required', '{field} mohon diisi');
		$this->form_validation->set_message('valid_email', 'Format email tidak benar');
		$this->form_validation->set_message('matches', 'Password baru dan konfirmasi harus sama');
		$this->form_validation->set_message('is_unique', 'Username telah terpakai, ganti dengan yang lain');

		/* pengecekan validasi input */
		if ($this->form_validation->run() == true)
		{
			$email    = strtolower($this->input->post('email'));
			$identity = ($identity_column==='email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			/* menyimpan data tambahan dalam array */
			$additional_data = array(
				'nama' 				=> $this->input->post('nama'),
				'username'  	=> $this->input->post('username'),
				'usertype'  	=> 'user'
			);
		}

		/* pengecekan validasi input */
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// pengecekan keaslian dalam membuat user baru
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Registrasi akun Anda berhasil, sekarang Anda telah dapat login</b></div>');

			redirect('/', 'refresh');
		}
			else
			{
				/* menampilkan form tambah user | set pesan eror jika ada */
				$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

				/* menyiapkan data dalam format array */
				$this->data['nama'] = array(
					'name'  => 'nama',
					'id'    => 'nama',
					'type'  => 'text',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('nama'),
				);
				$this->data['username'] = array(
					'name'  => 'username',
					'id'    => 'username',
					'type'  => 'text',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('username'),
				);
				$this->data['email'] = array(
					'name'  => 'email',
					'id'    => 'email',
					'type'  => 'text',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('email'),
				);
				$this->data['password'] = array(
					'name'  => 'password',
					'id'    => 'password',
					'type'  => 'password',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('password'),
				);
				$this->data['password_confirm'] = array(
					'name'  => 'password_confirm',
					'id'    => 'password_confirm',
					'type'  => 'password',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('password_confirm'),
				);

				$this->_render_page('front/user/body', $this->data);
			}
	}

	public function login()
	{
		/* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['page'] 	= "Login";
		$this->data['title'] 	= "Portal Berita CI";

		/* validasi form input */
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		$this->form_validation->set_message('required', '{field} mohon diisi');

		/* pengecekan validasi form */
		if ($this->form_validation->run() == true)
		{
			/* cek login */
			if ($this->ion_auth->login_front($this->input->post('username'), $this->input->post('password')))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>Login berhasil</b></div>');
				
				redirect('/', 'refresh');
			}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors(''));
					redirect('user/login', 'refresh');
				}
		}
			else
			{
				/* set pesan error flash data */
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				/* menyiapkan data dalam format array */
				$this->data['username'] = array(
					'name' => 'username',
					'id'    => 'username',
					'type'  => 'text',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('username'),
				);
				$this->data['password'] = array(
					'name' => 'password',
					'id'   => 'inputPassword',
					'type' => 'password',
					'class'  => 'form-control'
				);

				$this->_render_page('front/user/body_login', $this->data);
			}
	}

	public function username_check($str)
	{
		$this->load->model('ion_auth_model');
		if ($this->ion_auth_model->username_check($str))
		{
			return TRUE;
		}
			else
			{
				$this->form_validation->set_message('username_check','Username tidak ditemukan');
				return FALSE;
			}
	}

	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('/', 'refresh');
	}

	// Lupa Password
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is identity or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_username_label'), 'required');
		}
			else
			{
				$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
			}

		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' )
			{
				$this->data['username_label'] = $this->lang->line('forgot_password_username_label');
			}
				else
				{
					$this->data['username_label'] = $this->lang->line('forgot_password_email_username_label');
				}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot_password', $this->data);
		}
			else
			{
				$identity_column = $this->config->item('identity','ion_auth');
				$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

				if(empty($identity)) 
				{
					if($this->config->item('identity', 'ion_auth') != 'email')
					{
						$this->ion_auth->set_error('forgot_password_username_not_found');
					}
						else
						{
							$this->ion_auth->set_error('forgot_password_email_not_found');
						}

					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}

				// run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
				if ($forgotten)
				{
					// if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect("auth/forgot_password", 'refresh');
					}
			}
	}

	// Tahap lanjutan dari lupa password -> reset password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			/* jika data benar */
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				$this->_render_page('auth/reset_password', $this->data);
			}
				else
				{
					// cek keaslian request/ pemanggilan data
					if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
					{
						// something fishy might be up
						$this->ion_auth->clear_forgotten_password_code($code);
						show_error($this->lang->line('error_csrf'));
					}
						else
						{
							// finally change the password
							$username = $user->{$this->config->item('identity', 'ion_auth')};
							$change = $this->ion_auth->reset_password($username, $this->input->post('new'));

							if ($change)
							{
								// if the password was successfully changed
								$this->session->set_flashdata('message', $this->ion_auth->messages());
								redirect("auth/login", 'refresh');
							}
							else
							{
								$this->session->set_flashdata('message', $this->ion_auth->errors());
								redirect('auth/reset_password/' . $code, 'refresh');
							}
						}
				}
			}
				else
				{
					// jika kode invalid/ tidak terdaftar
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}
	}

	// Aktivasi user
	public function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		elseif ($this->ion_auth->is_superadmin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			$this->session->set_flashdata('message', 'Akun berhasil diaktifkan');
			redirect("admin/auth/user", 'refresh');
		}
			else
			{
				$this->session->set_flashdata('message', 'Akun gagal diaktifkan');
				redirect("admin/auth/forgot_password", 'refresh');
			}
	}

	// Nonaktifkan user
	public function deactivate($id = NULL){
		$id = (int) $id;

		if ($this->ion_auth->logged_in() && $this->ion_auth->is_superadmin())
		{
			$this->ion_auth->deactivate($id);
		}

		$this->session->set_flashdata('message', 'Akun berhasil dinonaktifkan');
		redirect('admin/auth/user', 'refresh');
	}

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
		$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			else
			{
				return FALSE;
			}
	}

	/* sama seperti $this->load->view */
	public function _render_page($view, $data=null, $returnhtml=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;
	}
}
