<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	var $link='peminjaman';
	var $link2='pengembalian';
	// var $list= $this->list.'/index';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))){
			redirect('page');
		}
		$this->data['kembali']=$this->M_Peminjaman->getKembaliHitungUser($this->session->userdata('id_user'),$this->session->userdata('tgl_sekarang'),$this->session->userdata('tgl_batas'));
	}

	public function index()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Peminjaman yang Berlangsung';
		$this->data['title']='Data Peminjaman yang Berlangsung';
		$this->data['title2']='akan ada notif 7 hari sebelum pengembalian';
		$this->data['peminjaman']=$this->M_Peminjaman->getKembaliUser($this->session->userdata('id_user'),$this->session->userdata('tgl_sekarang'));
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function ketersediaan()
	{
		$this->data['judul_tab']='Ketersediaan';
		$this->data['title']='Data Ketersediaan Barang';
		// $this->data['title2']='akan ada notif 7 hari sebelum pengembalian';
		$this->data['barang']=$this->M_Barang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/ketersediaan',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function riwayat()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Riwayat Peminjaman';
		$this->data['title']='Data Riwayat Peminjaman';
		$this->data['peminjaman']=$this->M_Peminjaman->getUser($this->session->userdata('id_user'));
		$this->data['isi'] = $this->load->view($this->link.'/riwayat',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Peminjaman';
			$this->data['title']='Tambah Peminjaman';
		}else{

			$this->data['judul_tab']='Form Edit Peminjaman';
			$this->data['title']='Edit Peminjaman';

			$this->data['peminjaman']=$this->M_Peminjaman->getID($id);
			$this->data['detail_pinjam']=$this->M_Detail_Pinjam->getAll($id);

		}
			$this->data['random']=$this->M_Peminjaman->getRandom();
			$this->data['barang']=$this->M_Barang->getBarang();
			$this->data['kendaraan']=$this->M_Barang->getKendaraan();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function set_peminjam(){
		$id_peminjaman		= $this->input->post("id_peminjaman");
		$id_user		= $this->input->post("id_user");
		$tgl_pinjam		= $this->input->post("tgl_pinjam");
		$tgl_kembali		= $this->input->post("tgl_kembali");
		$kode_peminjaman		= $this->input->post("kode_peminjaman");
		// $newdata=array();
		$data_peminjam = array(
	        'id_peminjaman'  => $id_peminjaman,
	        'id_user'  => $id_user,
	        'tgl_pinjam'  => $tgl_pinjam,
	        'kode_peminjaman'  => $kode_peminjaman,
	        'tgl_kembali'     => $tgl_kembali);

		

		$this->session->set_userdata('peminjam',$data_peminjam);
		redirect('kepala_bidang/'.$this->link."/pinjam_barang");
	}
	public function pinjam_barang()
	{

		$detail_pinjam = empty($this->session->userdata('detail_pinjam'))?array():$this->session->userdata('detail_pinjam');
		$this->data['judul_tab']='Peminjaman Barang';
		$this->data['title']='Peminjaman Barang';
		$this->data['barang']=$this->M_Barang->getBarang();
		$this->data['kendaraan']=$this->M_Barang->getKendaraan();
		$this->data['detail_pinjam']=$detail_pinjam;
		$this->data['isi'] = $this->load->view($this->link.'/form_pinjam_barang',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
		// echo "<pre>";
		// print_r($_SESSION['data_peminjam']);
	}
	public function tambah_session()
	{
		$id_barang		= $this->input->post("id_barang");
		$jumlah			= $this->input->post("jumlah");
		$merek=$this->M_Barang->getID($id_barang)->merek;


		$detail_pinjam=$this->session->userdata('detail_pinjam');
		$peminjam=$this->session->userdata('peminjam');

		if(count($this->session->userdata('detail_pinjam'))<1){
			
			$detail_pinjam=array();
				// $detail_pinjam+=array("id_barang" => $id_barang,"jumlah" => $jumlah);
			array_push($detail_pinjam,array(
				"id_barang" => $id_barang,
				"merek" => $merek,
				"jumlah" => $jumlah));
		}else{
			
			$found=in_array($id_barang, array_column($detail_pinjam, 'id_barang'));

			if($found==true){

				$key=array_search($id_barang, array_column($detail_pinjam, 'id_barang'));
				$detail_pinjam[$key]['jumlah']=$jumlah;


			}else{
				array_push($detail_pinjam,array(
				"id_barang" => $id_barang,
				"merek" => $merek,
				"jumlah" => $jumlah));

			}

		}
		
		$this->session->set_userdata('detail_pinjam',$detail_pinjam);

		redirect('kepala_bidang/'.$this->link."/pinjam_barang");
	}
	public function hapus_session($id_barang)
	{
		// $id_barang		= $this->input->post("id_barang");

		$detail_pinjam=$this->session->userdata('detail_pinjam');

		$key=array_search($id_barang, array_column($this->session->userdata('detail_pinjam'), 'id_barang'));
		
		unset($detail_pinjam[$key]);
		$detail_pinjam2=array();
		foreach ($detail_pinjam as $data ) {
			array_push($detail_pinjam2,array(
				"id_barang" => $data["id_barang"],
				"merek" => $data["merek"],
				"jumlah" => $data["jumlah"]));
		}
		// $this->session->remove($detail_pinjam[$key]);
		$this->session->set_userdata('detail_pinjam',$detail_pinjam2);
		// $this->session->unset_userdata('detail_pinjam');
		// print_r($detail_pinjam);
		redirect('kepala_bidang/'.$this->link."/pinjam_barang");
	
	}


	public function input()
	{
			$peminjam=$this->session->userdata('peminjam');
			$detail_pinjam=$this->session->userdata('detail_pinjam');

			$kode_peminjaman		= $peminjam['kode_peminjaman'];
			$id_user		= $peminjam['id_user'];
			$tgl_pinjam		= $peminjam['tgl_pinjam'];
			$id_peminjaman	= $peminjam['id_peminjaman'];
			$tgl_kembali	= $peminjam['tgl_kembali'];
			$id_barang		= $detail_pinjam;

			
		if($id_peminjaman==0){	
			// $this->upload->do_upload('gambar_barang');
			$insert = array(
				'id_user'=>$id_user,
				'kode_peminjaman'=>$kode_peminjaman,
				'tgl_pinjam'=>$tgl_pinjam,
				'status_peminjaman'=>'Belum Diambil',
				'tgl_kembali'=>$tgl_kembali);

			if ($this->M_Peminjaman->insert($insert,$id_barang)) {// success

					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
				}
		}else{
				$update = array(
				'id_user'=>$id_user,
				'kode_peminjaman'=>$kode_peminjaman,
				'tgl_pinjam'=>$tgl_pinjam,
				'status_peminjaman'=>'Belum Diambil',
				'tgl_kembali'=>$tgl_kembali);
			if ($this->M_Peminjaman->update($id_peminjaman,$update,$id_barang)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
				}
		}
		$this->session->unset_userdata('peminjam');
		$this->session->unset_userdata('detail_pinjam');
		
					redirect('kepala_bidang/'.$this->link);
		

	}
	public function hapus($id)
	{
		$this->M_Peminjaman->delete($id);
		redirect('karyawan/'.$this->link);
	}
}