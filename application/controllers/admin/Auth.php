<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		// Load model Ion_auth_model dan buat alias data_user
		$this->load->model('Ion_auth_model');
	}

	public function index(){
		$this->data['title'] = "Dashboard";
		// Cek sudah/ belum
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}
		// Cek superadmin/ bukan
		elseif (!$this->ion_auth->is_superadmin()){
			redirect('admin/dashboard', 'refresh');
		}
		$this->load->view('back/dashboard',$this->data);
	}

	// Proses login
	public function login(){
		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true){
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember)){
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->lang->line('login_successful'));
				redirect('admin/dashboard', 'refresh');
			}
			else{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors(''));
				redirect('admin/auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['username'] = array('name' => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['password'] = array('name' => 'password',
			'id'   => 'password',
			'type' => 'password',
		);

		$this->_render_page('back/auth/login', $this->data);
		}
	}

	// Proses logout
	public function logout(){
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/auth/login', 'refresh');
	}

	public function username_check($str){
		$this->load->model('Ion_auth_model');
		if ($this->ion_auth_model->username_check($str)){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('username_check','Username tidak ditemukan');
			return FALSE;
		}
	}

	// Data user
	public function user(){
		$this->data['title'] = "Data User";

		// Cek sudah/ belum
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}
		// Cek superadmin/ bukan
		elseif (!$this->ion_auth->is_superadmin()){
			redirect('admin/dashboard', 'refresh');
		}
		else{
			// Set pesan flash data error jika ada
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//Tampilkan data user
			$this->data['users'] = $this->ion_auth->users()->result();

			$this->_render_page('back/auth/user', $this->data);
		}
	}

	// Buat user baru
	public function create_user(){
		$this->data['title'] = "Tambah User";

		/* setting bawaan ionauth */
		$tables 					= $this->config->item('tables','ion_auth');
		$identity_column 	= $this->config->item('identity','ion_auth');

		$this->data['identity_column'] = $identity_column;

		// validasi form input
		$this->form_validation->set_rules('nama', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('username', $this->lang->line('create_username_validation_fname_label'), 'required');
		$this->form_validation->set_rules('alamat', $this->lang->line('create_user_validation_lname_label'), 'required');

		if($identity_column!=='username'){
			$this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
		}
		else{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'valid_email|is_unique[' . $tables['users'] . '.email]');
		}

		$this->form_validation->set_rules('alamat', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|numeric');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		$this->form_validation->set_message('required', '{field} mohon diisi');
		$this->form_validation->set_message('valid_email', 'Format email tidak benar');
		$this->form_validation->set_message('numeric', 'No. HP harus angka');
		$this->form_validation->set_message('matches', 'Password baru dan konfirmasi harus sama');
		$this->form_validation->set_message('is_unique', 'Alamat email telah terpakai, ganti dengan yang lain');

		/* jalan form validasi */
		if ($this->form_validation->run() == true){
			$email    = strtolower($this->input->post('email'));
			$identity = ($identity_column==='email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'nama' 				=> $this->input->post('nama'),
				'username'  	=> $this->input->post('username'),
				'alamat'    	=> $this->input->post('alamat'),
				'phone'      	=> $this->input->post('phone'),
				'usertype'    => $this->input->post('usertype'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)){
			// check to see if we are creating the user | redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/auth/user', 'refresh');
		}
		else{
			// display the create user form | set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

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
			$this->data['alamat'] = array(
				'name'  => 'alamat',
				'id'    => 'alamat',
				'type'  => 'text',
				'class'  => 'form-control',
				'cols'  => '2',
				'rows'  => '2',
				'value' => $this->form_validation->set_value('alamat'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'class'  => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'class'  => 'form-control',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['usertype_css'] = array(
				'name'  => 'usertype',
				'id'    => 'usertype',
				'type'  => 'text',
				'class'  => 'form-control',
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

			$this->data['get_all_users_group'] = $this->Ion_auth_model->get_all_users_group();

			$this->_render_page('back/auth/create_user', $this->data);
		}
	}

	// Edit data user
	public function edit_user($id){
		$this->data['title'] = 'Edit Data User';

		// Cek hak akses ubah password user lain (Hanya Superadmin yang dibolehkan)
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_superadmin() && !($this->ion_auth->user()->row()->id == $id))){
			redirect('admin/dashboard', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();

		if($user == FALSE){
			redirect('admin/auth/user', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('nama', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('username', $this->lang->line('edit_user_validation_username_label'), 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('phone', 'No. HP', 'trim|numeric');

		// Validasi form
		$this->form_validation->set_message('required', '{field} mohon diisi');
		$this->form_validation->set_message('numeric', 'No. HP harus angka');
		$this->form_validation->set_message('valid_email', 'Format email salah');
		$this->form_validation->set_message('min_length', 'Password minimal 8 huruf');
		$this->form_validation->set_message('max_length', 'Password maksimal 20 huruf');
		$this->form_validation->set_message('matches', 'Password baru dan konfirmasi harus sama');
		$this->form_validation->set_message('is_unique', 'Email telah terpakai, gunakan yang lain');

		if (isset($_POST) && !empty($_POST)){
			// mengecek validitas request update data
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')){
				show_error($this->lang->line('error_csrf'));
			}

			// update password jika dimasukkan/ diisi
			if ($this->input->post('password')){
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE){
				$data = array(
					'nama' 			=> $this->input->post('nama'),
					'username'  => $this->input->post('username'),
					'email'     => $this->input->post('email'),
					'usertype'  => $this->input->post('usertype'),
					'alamat'  	=> $this->input->post('alamat'),
					'phone'     => $this->input->post('phone'),
				);

				// jika password terisi
				if ($this->input->post('password')){
					$data['password'] = $this->input->post('password');
				}

				// mengecek apakah sedang mengupdate data user
				if($this->ion_auth->update($user->id, $data)){
					// mengarahkan kembali ke halaman admin apabila bukan superadmin
					$this->session->set_flashdata('message', $this->ion_auth->messages() );
					if ($this->ion_auth->is_superadmin()){
						redirect('admin/auth/user', 'refresh');
					}
					else{
						redirect('admin/dashboard', 'refresh');
					}
				}
				else{
					// mengarahkan kembali ke halaman admin apabila bukan superadmin
					$this->session->set_flashdata('message', $this->ion_auth->errors() );
					if ($this->ion_auth->is_superadmin()){
						redirect('auth/user', 'refresh');
					}
					else{
						redirect('admin/dashboard', 'refresh');
					}
				}
			}
		}

		// menampilkan form edit/ update data user
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// mengatur pesan/ flash data eror jika ada
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// melempar data user ke view
		$this->data['user'] = $user;

		$this->data['nama'] = array(
			'name'  => 'nama',
			'id'    => 'nama',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('nama', $user->nama),
		);
		$this->data['username'] = array(
			'name'  => 'username',
			'id'    => 'username',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('username', $user->username),
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('email', $user->email),
		);
		$this->data['alamat'] = array(
			'name'  => 'alamat',
			'id'    => 'alamat',
			'type'  => 'textarea',
			'class'  => 'form-control',
			'rows'  => '2',
			'cols'  => '2',
			'value' => $this->form_validation->set_value('alamat', $user->alamat),
		);
		$this->data['usertype'] = array(
			'name'  => 'usertype',
			'id'    => 'usertype',
			'type'  => 'text',
			'class'  => 'form-control',
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class'  => 'form-control',
			'placeholder'  => 'diisi jika mengubah password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class'  => 'form-control',
			'placeholder'  => 'diisi jika mengubah password'
		);

		$this->data['get_all_users_group'] = $this->Ion_auth_model->get_all_users_group();

		$this->_render_page('back/auth/edit_user', $this->data);
	}

	// Hapus data user
	public function delete_user($id) {
		$row = $this->Ion_auth_model->get_by_id($id);

		if ($row) {
			$this->Ion_auth_model->delete_user($id);
			$this->session->set_flashdata('message', $this->lang->line('delete_successful'));
			redirect(site_url('admin/auth/user'));
		}
			else {
			$this->session->set_flashdata('message', $this->lang->line('delete_unsuccessful'));
			redirect(site_url('admin/auth/user'));
			}
	}

	/* CRUD User Group by Harviacode */

	// Data User Group
	public function users_group(){
		$this->data['title'] = "Data Group";

		// Cek sudah/ belum
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}
		// Cek superadmin/ bukan
		elseif (!$this->ion_auth->is_superadmin()){
			redirect('admin/dashboard', 'refresh');
		}
			else{
				// mengatur pesan flash data eror
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				// menampilkan data users_group melalui model
				$this->data['groups'] = $this->ion_auth->get_all_groups()->result();

				$this->_render_page('back/auth/users_group_list', $this->data);
			}
	}

	// Buat user group baru
	public function create_group(){
		// Cek sudah/ belum
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}
		// Cek superadmin/ bukan
		elseif (!$this->ion_auth->is_superadmin()){
			redirect('admin/dashboard', 'refresh');
		}
		else{
			$this->data = array(
				'name' => set_value('name'),
				'title' => 'Tambah Group'
			);

			$this->load->view('back/auth/create_group', $this->data);
		}
	}

	public function create_group_action(){
		$this->form_validation->set_rules('name', 'Nama', 'required');

		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == FALSE) {
			$this->create_group();
		}
		else {
			$data = array('name' => $this->input->post('name'));

			$this->Ion_auth_model->create_group($data);
			$this->session->set_flashdata('message', 'Data berhasil ditambahkan');
			redirect(site_url('admin/auth/users_group'));
		}
	}

	// Edit data user group
	public function edit_group($id_group){
		$row = $this->Ion_auth_model->get_by_id_group($id_group);

		if ($row) {
			$data = array(
				'id_group' => set_value('id_group', $row->id_group),
				'name' => set_value('name', $row->name),
				'title' => 'Edit Data Group'
			);

			$this->load->view('back/auth/users_group_form', $data);
		}
		else {
			$this->session->set_flashdata('message', 'Data tidak ditemukan');
			redirect(site_url('admin/auth/users_group'));
		}
	}

	public function edit_group_action(){
		/* pengecekan form input */
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->edit_group($this->input->post('id_group'));
		}
		else {
			$data = array('name' => $this->input->post('name'));

			$this->Ion_auth_model->update_group($this->input->post('id_group'), $data);
			$this->session->set_flashdata('message', 'Update data berhasil');
			redirect(site_url('admin/auth/users_group'));
		}
	}

	// Hapus data user group
	public function delete_group($id_group){
		$row = $this->Ion_auth_model->get_by_id_group($id_group);

		if ($row) {
			$this->Ion_auth_model->delete_group($id_group);
			$this->session->set_flashdata('message', 'Hapus data berhasil');
			redirect(site_url('admin/auth/users_group'));
		} else {
			$this->session->set_flashdata('message', 'Data tidak ditemukan');
			redirect(site_url('admin/auth/users_group'));
		}
	}

	// Lupa Password
	public function forgot_password(){
		// setting validation rules by checking whether identity is identity or email
		if($this->config->item('identity', 'ion_auth') != 'email' ){
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_username_label'), 'required');
		}
			else{
				$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
			}


		if ($this->form_validation->run() == false){
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['username_label'] = $this->lang->line('forgot_password_username_label');
			}
				else{
					$this->data['username_label'] = $this->lang->line('forgot_password_email_username_label');
				}

				// set any errors and display the form
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->_render_page('back/auth/forgot_password', $this->data);
		}
			else{
				$identity_column = $this->config->item('identity','ion_auth');
				$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

				if(empty($identity)) {
					if($this->config->item('identity', 'ion_auth') != 'email'){
						$this->ion_auth->set_error('forgot_password_username_not_found');
					}
						else{
							$this->ion_auth->set_error('forgot_password_email_not_found');
						}

					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("admin/auth/forgot_password", 'refresh');
				}

				// run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
				if ($forgotten){
					// if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("admin/auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
					else{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect("admin/auth/forgot_password", 'refresh');
					}
			}
	}

	// Tahap lanjutan dari lupa password -> reset password
	public function reset_password($code = NULL){
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				// display the form

				// set the flash data error message if there is one
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

				// render
				$this->_render_page('back/auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
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
						redirect("admin/auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	// Aktivasi user
	public function activate($id, $code=false){
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_superadmin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', 'Akun berhasil diaktifkan');
			redirect("admin/auth/user", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', 'Akun gagal diaktifkan');
			redirect("admin/auth/forgot_password", 'refresh');
		}
	}

	// Nonaktifkan user
	public function deactivate($id = NULL){
		$id = (int) $id;

		// mengecek usertype user apakah superadmin/ bukan
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_superadmin())
		{
			$this->ion_auth->deactivate($id);
		}

		// mengarahkan ke halaman user/ data user
		$this->session->set_flashdata('message', 'Akun berhasil dinonaktifkan');
		redirect('admin/auth/user', 'refresh');
	}

	public function _get_csrf_nonce(){
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce(){
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

	// sama seperti view
	public function _render_page($view, $data=null, $returnhtml=false){

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

}
