<?php
class M_Kendaraan extends CI_Model {

	var $table='kendaraan';
	var $pk='id';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
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
	public function hapus_gambar($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$query = $this->db->get();
     	$row = $query->row();

     	unlink("./assets/images/kendaraan/$row->gambar_kendaraan");
	}
	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}