<?php
class M_Barang extends CI_Model {
	
	var $table='barang';
	var $pk='id_barang';
	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBarang ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->where('k.fk_jenis',2);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKendaraan ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->where('k.fk_jenis',1);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKendaraanPajak ($tgl_sekarang,$tgl_batas)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->where('tgl_pajak BETWEEN "'. date('Y-m-d', strtotime($tgl_sekarang)). '" and "'. date('Y-m-d', strtotime($tgl_batas)). '"');
		$this->db->where('k.fk_jenis',1);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKendaraanPajakHitung ($tgl_sekarang,$tgl_batas)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->where('tgl_pajak BETWEEN "'. date('Y-m-d', strtotime($tgl_sekarang)). '" and "'. date('Y-m-d', strtotime($tgl_batas)). '"');
		$this->db->where('k.fk_jenis',1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis k','k.id_jenis=barang.id_jenis');
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}
	
	public function insert($data){
		$id = $this->db->insert($this->table, $data);
		//$this->db->insert_id();
		return $id;
	}
	
	public function update($data){
		$this->db->where($this->pk, $data[$this->pk]);
		$id = $this->db->update($this->table, $data);
		return $id;
	}
	public function hapus_file($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$query = $this->db->get();
     	$row = $query->row();

     	unlink("./assets/images/barang/$row->gambar_barang");
	}
	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}