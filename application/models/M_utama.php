<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_utama extends CI_Model {
	public function cek_user()
	{
		return $this->db->where('username', $this->input->post('user'))
						->where('password', md5($this->input->post('pass')))
						->get('user');
	}
	public function data_user()
	{
		$this->db->select('*');
    	$this->db->from('user'); 
    	$this->db->join('seni', 'seni.id_user=user.id_user');
    	$this->db->where('user.id_user', $this->session->userdata('id_user'));
    	$this->db->order_by('tanggal_buat', 'asc');
    	return $this->db->get()->result(); 
	}
	public function hapusData($id)
    {
        $this->db->delete('transaksi', ['id_transaksi' => $id]);
    }
	public function data_transaksi()
	{
		$this->db->select('*');
    	$this->db->from('user'); 
    	$this->db->join('transaksi', 'transaksi.id_user=user.id_user');
    	$this->db->where('user.id_user', $this->session->userdata('id_user'));
    	$this->db->order_by('id_transaksi', 'asc');
    	return $this->db->get()->result(); 
	}
	public function data_pameran()
	{
		$this->db->select('*');
		$this->db->from('pameran');
		$this->db->order_by('tahun', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function detail_data_pameran($id)
	{
		
		$this->db->select('*');
    	$this->db->from('seni'); 
    	$this->db->join('pameran', 'pameran.id_pameran=seni.id_pameran');
    	$this->db->join('user', 'user.id_user=seni.id_user');
    	$this->db->where('pameran.id_pameran',$id); 
    	return $this->db->get()->row(); 
	}
	public function detail_data($id)
	{
		
		$this->db->select('*');
    	$this->db->from('seni'); 
    	$this->db->join('pameran', 'pameran.id_pameran=seni.id_pameran');
    	$this->db->join('user', 'user.id_user=seni.id_user');
    	$this->db->where('pameran.id_pameran',$id); 
    	return $this->db->get()->result(); 
	}
	public function detail_data_seni($id)
	{
		
		$this->db->select('*');
    	$this->db->from('seni'); 
    	$this->db->join('user', 'user.id_user=seni.id_user');
    	$this->db->where('seni.id_seni',$id); 
    	return $this->db->get()->row(); 
	}
	public function simpan_data($Name, $Address, $Telp, $Username, $Password)
	{
		$Name=$this->input->post('nama');
		$Address=$this->input->post('alamat');
		$Telp=$this->input->post('telp');
		$Username=$this->input->post('user');
		$Password=$this->input->post('pass');
		$data=array(
				'nama_user'=> $Name,
				'alamat'=> $Address,
				'telp'=> $Telp,
				'username'=> $Username,
				'password'=> md5($Password) //membuat pass tak bisa dibaca di database
			);
		return $proses=$this->db->insert('user', $data);
	}
	public function data_seni()
	{
		$this->db->select('*');
    	$this->db->from('seni'); 
    	$this->db->join('user', 'user.id_user=seni.id_user');
    	return $this->db->get()->result();
	}
	public function tambah($nama_foto='')
	{
		$object=array(
		'id_user'		=> $this->session->userdata('id_user'),
		'nama_seni'		=> $this->input->post('nama'),
		'jenis_seni'	=> $this->input->post('jenis'),
		'harga'			=> $this->input->post('harga'),
		'tanggal_buat'	=> date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
		'gambar_seni'=>$nama_foto
		);
		return $this->db->insert('seni', $object);
	}
	public function edit($id)
	{
		$data = array(
				'nama_seni'		=> $this->input->post('nama'),
				'jenis_seni'	=> $this->input->post('jenis'),
				'harga'			=> $this->input->post('harga'),
				'tanggal_buat'	=> date_format(date_create($this->input->post('tanggal')), 'Y-m-d')
			);

		return $this->db->where('id_seni',$id)->update('seni',$data);
	}
	public function edit_foto($id, $nama_foto='')
	{
		$data = array(
				'nama_seni'		=> $this->input->post('nama'),
				'jenis_seni'	=> $this->input->post('jenis'),
				'harga'			=> $this->input->post('harga'),
				'tanggal_buat'	=> date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
				'gambar_seni'	=> $nama_foto
			);

		return $this->db->where('id_seni', $id)->update('seni',$data);
	}
	public function hapus_seni($id='')
	{
		return $this->db->where('id_seni',$id)->delete('seni');
	}
}
/* End of file M_utama */
/* Location: ./application/models/M_utama */