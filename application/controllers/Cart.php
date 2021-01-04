<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		$data['judul']='EJ-Galleria | Transaksi';
		$this->load->view('template_cart', $data, FALSE);
	}
	public function addcart($id_seni)
	{
		$this->load->model('M_utama');
		$detail=$this->M_utama->detail_data_seni($id_seni);
		$data = array(
			'id'      => $detail->id_seni,
			'qty'     => 1,
			'price'   => $detail->harga,
			'name'    => $detail->nama_user,
			'alamat'  => $detail->alamat,
			'seni'    => $detail->nama_seni
		);
		
		$this->cart->insert($data);
		redirect('Utama/jualbeli', 'location');
	}
	public function simpan()
	{
		if($this->input->post('simpan')) {
			$this->load->model('M_cart');
			$id_transaksi=$this->M_cart->simpan_cart();
			if($id_transaksi > 0) {
				$this->cart->destroy();
				$this->session->set_flashdata('pesan', 'Gagal Memproses Transaksi');
				redirect('Car/'.$id_transaksi, 'refresh');
			} else {
				$this->session->set_flashdata('pesan', 'Sukses Memproses Transaksi');
				$this->cart->destroy();
				redirect('Cart', 'refresh');
			}
		}
	}
	public function del($id)
	{
		$data = array(
			'rowid' => $id,
			'qty' => 0
		);
		$this->cart->update($data);
		redirect('Cart','refresh');
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */