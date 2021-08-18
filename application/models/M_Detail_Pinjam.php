<?php
class M_Detail_Pinjam extends CI_Model {
	
	var $table='detail_pinjam';
	var $pk='id_detail_pinjam';

	public function getAll ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_peminjaman', $id);
		$this->db->join('barang b','b.id_barang=detail_pinjam.id_barang');
		// $this->db->join('jenis j','b.id_jenis=j.id_jenis');
		$this->db->order_by($this->pk, 'DESC');
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

	public function delete($id){
		$id = $this->db->where("id_peminjaman",$id)->delete($this->table);
		return $id;
	}
}