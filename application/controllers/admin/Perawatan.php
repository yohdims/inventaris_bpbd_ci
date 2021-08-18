<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {
	var $link='perawatan';
	// var $list= $this->list.'/index';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))){
			redirect('page');
		}
		$this->data['pajak']=$this->M_Barang->getKendaraanPajakHitung($this->session->userdata('tgl_sekarang'),$this->session->userdata('tgl_batas'));
		$this->data['kembali']=$this->M_Peminjaman->getKembaliHitung($this->session->userdata('tgl_sekarang'),$this->session->userdata('tgl_batas'));
	}

	public function index()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Perawatan';
		$this->data['title']='Data Perawatan';
		
		$this->data['perawatan']=$this->M_Perawatan->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}


	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Perawatan';
			$this->data['title']='Tambah Perawatan';
		}else{

			$this->data['judul_tab']='Form Edit Perawatan';
			$this->data['title']='Edit Perawatan';

			$this->data['perawatan']=$this->M_Perawatan->getID($id);

		}
			$this->data['barang']=$this->M_Barang->getAll();
			$this->data['user']=$this->M_User->getAll();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

			$id_perawatan		= $this->input->post('id_perawatan');
			$id_barang			= $this->input->post('id_barang');
			$id_user			= $this->input->post('id_user');
			$tgl_permintaan		= $this->input->post('tgl_permintaan');
			$biaya				= $this->input->post('biaya');
			$jenis_perawatan				= $this->input->post('jenis_perawatan');

		if($id_perawatan==0){	

			$insert = array(
				'id_barang'=>$id_barang,
				'id_user'=>$id_user,
				'tgl_permintaan'=>$tgl_permintaan,
				'biaya'=>$biaya,
				'jenis_perawatan'=>$jenis_perawatan);
			if ($this->M_Perawatan->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{
				$update = array(
				'id_perawatan'=>$id_perawatan,
				'id_barang'=>$id_barang,
				'id_user'=>$id_user,
				'tgl_permintaan'=>$tgl_permintaan,
				'biaya'=>$biaya,
				'jenis_perawatan'=>$jenis_perawatan);
			
			if ($this->M_Perawatan->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{

		$this->M_Perawatan->delete($id);
		redirect('admin/'.$this->link);
	}
}