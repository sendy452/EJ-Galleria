<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['judul']='EJ-Galleria';
		$data['konten']='beranda';
		$this->load->view('templateadmin', $data);
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
					'id_user' => $data_user->id_user
				);
				
				$this->session->set_userdata( $array );
				redirect('Utama/jualbeli','refresh');
			} else {
				$this->session->set_flashdata('pesan', 'Username dan Pass salah');
			redirect('Utama/login');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Utama/login');
			}
		}		
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */