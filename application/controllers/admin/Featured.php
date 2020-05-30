<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Featured extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Berita_model');
    $this->load->model('Featured_model');

    $this->data['module'] = 'Featured';    

    /* cek login */
    if (!$this->ion_auth->logged_in()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
    elseif($this->ion_auth->is_user()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
  }

  public function index()
  {
    $this->data['title'] = "Data Featured";

    // tampilkan data
    $this->data['featured_data'] = $this->Featured_model->get_all();
    $this->load->view('back/featured/featured_list', $this->data);
  }

  public function create() 
  {
    $this->data['title']          = 'Tambah Featured Baru';
    $this->data['action']         = site_url('admin/featured/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_featured'] = array(
      'name'  => 'id_featured',
      'id'    => 'id_featured',
      'type'  => 'hidden',
    );

    $this->data['no_urut'] = array(
      'name'  => 'no_urut',
      'id'    => 'no_urut',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('no_urut'),
    );

    $this->data['judul_featured'] = array(
      'name'  => 'judul_featured',
      'id'    => 'judul_featured',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_featured'),
    );   

    $this->data['get_combo_berita'] = $this->Berita_model->get_combo_berita(); 
    
    $this->load->view('back/featured/featured_add', $this->data);
  }
  
  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) 
    {
      $this->create();
    } 
      else 
      {
        $data = array(
          'no_urut'         => $this->input->post('no_urut'),
          'judul_featured'  => $this->input->post('judul_featured')
        );

        // eksekusi query INSERT
        $this->Featured_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/featured'));
      }  
  }
  
  public function update($id) 
  {
    $row = $this->Featured_model->get_by_id($id);
    $this->data['featured'] = $this->Featured_model->get_by_id($id);

    if ($row) 
    {
      $this->data['title']          = 'Update Featured';
      $this->data['action']         = site_url('admin/featured/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_featured'] = array(
        'name'  => 'id_featured',
        'id'    => 'id_featured',
        'type'  => 'hidden',
      );

      $this->data['no_urut'] = array(
        'name'  => 'no_urut',
        'id'    => 'no_urut',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['judul_featured_css'] = array(
        'name'  => 'judul_featured',
        'id'    => 'judul_featured',
        'class' => 'form-control',
      );

      $this->data['get_combo_berita'] = $this->Berita_model->get_combo_berita(); 

      $this->load->view('back/featured/featured_edit', $this->data);
    } 
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/featured'));
      }
  }
  
  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) 
    {
      $this->update($this->input->post('id_featured'));
    } 
      else 
      {
        $data = array(
          'no_urut'         => $this->input->post('no_urut'),
          'judul_featured'  => $this->input->post('judul_featured')
        );

        $this->Featured_model->update($this->input->post('id_featured'), $data);
        $this->session->set_flashdata('message', 'Edit Data Berhasil');
        redirect(site_url('admin/featured'));
      }
  }
  
  public function delete($id) 
  {
    $row = $this->Featured_model->get_by_id($id);
    
    if ($row) 
    {
      $this->Featured_model->delete($id);
      $this->session->set_flashdata('message', 'Data berhasil dihapus');
      redirect(site_url('admin/featured'));
    } 
      // Jika data tidak ada
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/featured'));
      }
  }

  public function _rules() 
  {
    $this->form_validation->set_rules('no_urut', 'No. Urut', 'trim|required');
    
    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_featured', 'id_featured', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

}

/* End of file Featured.php */
/* Location: ./application/controllers/Featured.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */