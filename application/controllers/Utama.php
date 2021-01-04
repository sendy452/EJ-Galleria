<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utama extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_utama');
	}
	public function index()
	{
		$this->load->model('M_utama');
		$data['tampil_pameran']=$this->M_utama->data_pameran();
		$data['judul']='EJ-Galleria';
		$data['konten']='beranda';
		$this->load->view('template', $data);
	}
	public function detail_pameran($id_pameran) 
	{
		$this->load->model('M_utama');
		$data['tampil_detail']=$this->M_utama->detail_data($id_pameran);
		$data['tampil_detail_pameran']=$this->M_utama->detail_data_pameran($id_pameran);
		$this->load->view('template_pameran', $data);
	}
	public function jualbeli()
	{
		if($this->session->userdata('login')!=TRUE){
			redirect('Utama/login','refresh');
		}
		$data['judul']='EJ-Galleria | Buy Arts';
		$data['konten']='beranda';
		$data['tampil_seni']=$this->M_utama->data_seni();
		$this->load->model('M_utama');
		$this->load->view('template2', $data);
	}
	public function profil()
	{
		if($this->session->userdata('login')!=TRUE){
			redirect('Utama/login','refresh');
		}
		
		$data['judul']='EJ-Galleria | History n Sell';
		$this->load->model('M_utama');
		$data['tampil_history']=$this->M_utama->data_transaksi($this->session->userdata('id_user'));
		$data['tampil_user']=$this->M_utama->data_user($this->session->userdata('id_user'));
		$this->load->view('template3', $data);
	}
	public function tambahseni()
	{
		$config['upload_path'] = './assets/img/portfolio/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 20480;
				
		$this->load->library('upload', $config);
				
		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('alert', 'Gagal Upload Gambar');
			redirect('Utama/profil');
		}else{
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];

			if($this->M_utama->tambah($file_name)){
				$this->session->set_flashdata('alert', 'Sukses Menambah Karya');
				redirect('Utama/profil');
			} else {
				$this->session->set_flashdata('alert', 'Gagal Menambah Karya');
				redirect('Utama/profil');
			}
		}
	}
	public function editseni($id)
	{
		if($this->input->post('submit')){
			if($_FILES['gambar']['name']==""){
				if($this->M_utama->edit($id)){
					$this->session->set_flashdata('notif', 'Sukses Merubah');
					redirect('Utama/profil');
				} else {
					$this->session->set_flashdata('notif', 'Gagal Merubah');
					redirect('Utama/profil');
				}
			} else {
				$config['upload_path'] = './assets/img/portfolio/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 20480;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('notif', 'Gagal Upload Gambar');
					redirect('Utama/profil');
				}
				else{
					$upload_data = $this->upload->data(); 
					$file_name = $upload_data['file_name'];

					if($this->M_utama->edit_foto($id, $file_name)){
						//$error = $this->upload->display_errors();
						//$this->session->set_flashdata('notif', $error);
						$this->session->set_flashdata('notif', 'Sukses Merubah');
						redirect('Utama/profil');
					} else {
						$this->session->set_flashdata('notif', 'Gagal Merubah');
						redirect('Utama/profil');
					}
				}
			}
			
		}
	}
	public function hapusseni($id)
	{
		if($this->M_utama->hapus_seni($id) == TRUE){
			$this->session->set_flashdata('notif', 'Data Karya Seni Berhasil Dihapus');
			redirect('Utama/profil');
		} else {
			$this->session->set_flashdata('notif', 'Data Karya Seni Gagal Dihapus');
			redirect('Utama/profil');
		}
	}
	public function hapus($id)
	{
		$this->M_utama->hapusData($id);
		redirect('Utama/profil','refresh');
	}
	public function login()
	{
		if($this->session->userdata('login')==TRUE){
			redirect('Utama','refresh');
		} else {
			$this->load->view('login');
		}
	}
	public function masuk()
	{
		if($this->input->post('cek')){
			$this->form_validation->set_rules('user', 'Username','trim|required');
			$this->form_validation->set_rules('pass', 'Password','trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('m_utama');
			if($this->m_utama->cek_user()->num_rows()>0) {
				$data_user=$this->m_utama->cek_user()->row();
				$array = array(
					'login' => TRUE,
					'user' => $data_user->username,
					'pass' => $data_user->password,
					'nama' => $data_user->nama_user,
					'alamat' => $data_user->alamat,
					'id_user' => $data_user->id_user
				);
				
				$this->session->set_userdata( $array );
				redirect('Utama/jualbeli','refresh');
			} else {
				$this->session->set_flashdata('pesan', 'Username dan Password Salah');
			redirect('Utama/login');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Utama/login');
			}
				}
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function simpan()
	{
		if($this->input->post('submit')){
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telpon','trim|required');
		$this->form_validation->set_rules('user', 'Username','trim|required');
		$this->form_validation->set_rules('pass', 'Password','trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('m_utama');
			$proses=$this->m_utama->simpan_data($Name, $Address, $Telp, $Username, $Password);
			if ($proses) {
			$this->session->set_flashdata('pesan', 'sukses simpan');
			redirect('Utama/login');
			}else{
				$this->session->set_flashdata('pesan', 'gagal simpan');
				redirect('Utama/register');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Utama/register');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/Utama'));
	}
}
/* End of file Utama.php */
/* Location: ./application/controllers/Utama.php */