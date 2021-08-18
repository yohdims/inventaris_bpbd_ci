<?php
class M_Jenis extends CI_Model {
	
	var $table='jenis';
	var $pk='id_jenis';
	var $fk='fk_jenis';

	public function getKendaraan ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->fk, 1);
		$this->db->order_by('id_jenis', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBarang ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->fk, 2);
		$this->db->order_by('id_jenis', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getInfrastruktur ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->fk, 3);
		$this->db->order_by('id_jenis', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getLvl($level)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('level',$level);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		if ($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
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
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}