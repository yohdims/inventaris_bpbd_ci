<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
		$this->data['pajak']=$this->M_Barang->getKendaraanPajakHitung($this->session->userdata('tgl_sekarang'),$this->session->userdata('tgl_batas'));
		$this->data['kembali']=$this->M_Peminjaman->getKembaliHitungUser($this->session->userdata('id_user'),$this->session->userdata('tgl_sekarang'),$this->session->userdata('tgl_batas'));
	}

	public function peminjaman()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');

		$this->data['tgl_awal']=$tgl_awal;
		$this->data['tgl_akhir']=$tgl_akhir;

		$this->data['judul_tab']='Peminjaman';
		$this->data['title']='Data Peminjaman';
		if(empty($tgl_awal)){	
			$this->data['peminjaman']=$this->M_Peminjaman->getAll();
		}else{
			$this->data['peminjaman']=$this->M_Peminjaman->getLaporan($tgl_awal,$tgl_akhir);
		}
		$this->data['isi'] = $this->load->view('laporan/peminjaman',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function cetak()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$laporan	= $this->input->post('laporan');

		$this->data['tgl_awal']=$tgl_awal;
		$this->data['tgl_akhir']=$tgl_akhir;
		if($laporan=="kendaraan"){
			$this->data['judul_tab']='Kendaraan';
			$this->data['title']='Data Kendaraan';
			$this->data['kendaraan']=$this->M_Barang->getKendaraan();
			$this->data['isi'] = $this->load->view('laporan/print_kendaraan',$this->data,TRUE);
		}elseif($laporan=="barang"){
			$this->data['judul_tab']='Barang';
			$this->data['title']='Data Barang';
			$this->data['barang']=$this->M_Barang->getBarang();
			$this->data['isi'] = $this->load->view('laporan/print_barang',$this->data,TRUE);
		}elseif($laporan=="infrastruktur"){
			$this->data['judul_tab']='Barang';
			$this->data['title']='Data Barang';
			$this->data['infrastruktur']=$this->M_Infrastruktur->getAll();
			$this->data['isi'] = $this->load->view('laporan/print_infrastruktur',$this->data,TRUE);
		}else{
			$this->data['judul_tab']='Peminjaman';
			$this->data['title']='Data Peminjaman';
			if(empty($tgl_awal)){	
				$this->data['peminjaman']=$this->M_Peminjaman->getAll();
			}else{
				$this->data['peminjaman']=$this->M_Peminjaman->getLaporan($tgl_awal,$tgl_akhir);
			}
			$this->data['isi'] = $this->load->view('laporan/print_peminjaman',$this->data,TRUE);

		}
		
		$this->load->view('template/v_layout_laporan',$this->data);
	}
	public function barang()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Barang';
		$this->data['title']='Data Barang';
		$this->data['barang']=$this->M_Barang->getBarang();
		$this->data['isi'] = $this->load->view('laporan/barang',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function kendaraan()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Kendaraan';
		$this->data['title']='Data Kendaraan';
		$this->data['kendaraan']=$this->M_Barang->getKendaraan();
		$this->data['isi'] = $this->load->view('laporan/kendaraan',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function infrastruktur()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Infrastruktur';
		$this->data['title']='Data Infrastruktur';
		$this->data['infrastruktur']=$this->M_Infrastruktur->getAll();
		$this->data['isi'] = $this->load->view('laporan/infrastruktur',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

}