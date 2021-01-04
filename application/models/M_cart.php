<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

	public function simpan_cart()
	{
	$object=array(
		'grandtotal'=>$this->input->post('grand_total'),
		'id_user'=>$this->session->userdata('id_user'),
		'alamat'=>$this->input->post('alamat'),
		'pengiriman'=>$this->input->post('kirim'),
		'total'=>$this->input->post('qty')
		);

		$this->db->insert('transaksi', $object);
		
	}
	public function getnota($id)
	{
		return $this->db->where('id_transaksi', $id)
						->get('transaksi')->row();
	}

}

/* End of file M_cart.php */
/* Location: ./application/models/M_cart.php */