<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->data['judul_tab']='Sistem Informasi';
		$this->data['title']='Dashboard';
		$tahun	= $this->input->post('tahun');
		if(!empty($tahun)){
			$this->data['tahun']=$tahun;
			$this->data['peminjaman']=$this->M_Peminjaman->getCount($tahun);
		}else{
			$this->data['tahun']=date('Y');
			$this->data['peminjaman']=$this->M_Peminjaman->getCount(date('Y'));
		}
		$this->data['isi'] = $this->load->view('template/dashboard_kb',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
}