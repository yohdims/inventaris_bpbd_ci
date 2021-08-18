<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
	var $link='jenis';
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
		$this->data['judul_tab']='Jenis';
		$this->data['title']='Data Jenis';
		$this->data['kendaraan']=$this->M_Jenis->getKendaraan();
		$this->data['barang']=$this->M_Jenis->getBarang();
		$this->data['infrastruktur']=$this->M_Jenis->getInfrastruktur();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Jenis';
			$this->data['title']='Tambah Jenis';
			$this->data['level']=$this->M_Jenis->getLvl(1);
		}else{

			$this->data['judul_tab']='Form Edit Jenis';
			$this->data['title']='Edit Jenis';

			$this->data['level']=$this->M_Jenis->getLvl(1);
			$this->data['jenis']=$this->M_Jenis->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{

			$id_jenis			= $this->input->post('id_jenis');
			$fk_jenis			= $this->input->post('fk_jenis');
			$nama			= $this->input->post('nama');
		if($id_jenis==0){	
			$insert = array(
				'fk_jenis'=>$fk_jenis,
				'nama'=>$nama);
			if ($this->M_Jenis->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{
				$update = array(
				'id_jenis'=>$id_jenis,
				'fk_jenis'=>$fk_jenis,
				'nama'=>$nama);			
			if ($this->M_Jenis->update($update)) {// success
				$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
				redirect('admin/'.$this->link);
			}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Jenis->delete($id);
		redirect('admin/'.$this->link);
	}
}