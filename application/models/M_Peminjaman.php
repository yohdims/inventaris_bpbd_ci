<?php
class M_Peminjaman extends CI_Model {
	
	var $table='peminjaman';
	var $pk='id_peminjaman';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getRandom ()
	{
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$random= substr(str_shuffle($permitted_chars), 0, 10);
		return $random;
	}
	public function getLaporan ($tgl_awal,$tgl_akhir)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->where('tgl_pinjam BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)). '"');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCount ($tahun)
	{
		$hasil=array();
		for($i=1;$i<=12;$i++){
		$this->db->select('COUNT(*) as jumlah, month(tgl_pinjam) as bulan');
		$this->db->from($this->table);
		$this->db->where("month(tgl_pinjam)", $i);
		$this->db->where("year(tgl_pinjam)", $tahun);
		$this->db->group_by("month(tgl_pinjam)");
		$this->db->order_by('bulan', 'ASC');
		$query = $this->db->get();
			if(empty($query->row())){
				array_push($hasil,0);
			}else{
				array_push($hasil,$query->row('jumlah'));
			}
		}	
		return $hasil;
	}
	public function getKembali ($tgl_sekarang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->where('(tgl_kembali >= "'.$tgl_sekarang.'" OR tgl_pinjam >= "'.$tgl_sekarang.'" ) OR status_peminjaman ="Dipinjam" OR status_peminjaman ="Belum Diambil" ' );
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKembaliHitung ($tgl_sekarang,$tgl_batas)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('(tgl_kembali BETWEEN "'. date('Y-m-d', strtotime($tgl_sekarang)). '" and "'. date('Y-m-d', strtotime($tgl_batas)). '")  OR status_peminjaman ="Dipinjam" OR status_peminjaman ="Belum Diambil" ');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}
	public function getBarang ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->join('detail_pinjam d','d.id_peminjaman=peminjaman.id_peminjaman');
		$this->db->where("d.id_barang", $id);
		$this->db->order_by("peminjaman.".$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getUser ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->where("peminjaman.id_user", $id);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKembaliUser ($id,$tgl_sekarang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users u','u.id_user=peminjaman.id_user');
		$this->db->where('(tgl_kembali >= "'.$tgl_sekarang.'" OR tgl_pinjam >= "'.$tgl_sekarang.'")' );
		$this->db->where("peminjaman.id_user", $id);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getKembaliHitungUser ($id,$tgl_sekarang,$tgl_batas)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('tgl_kembali BETWEEN "'. date('Y-m-d', strtotime($tgl_sekarang)). '" and "'. date('Y-m-d', strtotime($tgl_batas)). '"');
		$this->db->where("peminjaman.id_user", $id);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function insert($data,$data_detail){
		$id = $this->db->insert($this->table, $data);
		// $id_peminjaman=$this->db-insert_id();
		$this->db->select_max("id_peminjaman","kode");
		$this->db->from($this->table);
		$query = $this->db->get();
		$id_peminjaman=$query->row("kode");

			foreach ($data_detail as $data_detail) {
				$insert = array(
				'id_peminjaman'=>$id_peminjaman,
				'id_barang'=>$data_detail['id_barang'],
				'jumlah'=>$data_detail['jumlah']);
				$id = $this->db->insert('detail_pinjam', $insert);
			}
		//$this->db->insert_id();
		return $id;
	}
	
	public function update_status($id_peminjaman,$data){
		$this->db->where($this->pk,$id_peminjaman);
		$id = $this->db->update($this->table, $data);

		$this->db->select('*');
		$this->db->from('detail_pinjam');
		$this->db->where($this->pk,$id_peminjaman);
		$query = $this->db->get();
		$data_detail=$query->result_array();
		
		foreach ($data_detail as $data_detail) {
			if($data['status_peminjaman']=="Dipinjam"){
				$query = $this->db->query("UPDATE barang SET stok=stok-".$data_detail['jumlah']." WHERE id_barang=".$data_detail['id_barang']);
			}else if($data['status_peminjaman']=="Selesai"){
				$query = $this->db->query("UPDATE barang SET stok=stok+".$data_detail['jumlah']." WHERE id_barang=".$data_detail['id_barang']);
			}
		}

		return $query;
	}
	public function update($id_peminjaman,$data,$data_detail){
		$this->db->where($this->pk,$id_peminjaman);
		$id = $this->db->update($this->table, $data);

		// $this->M_Detail_Pinjam->delete($data[$this->pk]);
		$this->db->where('id_peminjaman',$id_peminjaman)->delete('detail_pinjam');
		foreach ($data_detail as $data_detail) {
				$insert = array(
				'id_peminjaman'=>$id_peminjaman,
				'id_barang'=>$data_detail['id_barang'],
				'jumlah'=>$data_detail['jumlah']);
				$id = $this->db->insert('detail_pinjam', $insert);
			}
		return $id;
	}

	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}