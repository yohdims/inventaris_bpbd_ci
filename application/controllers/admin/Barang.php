<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	var $link='barang';
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
		$this->data['judul_tab']='Barang';
		$this->data['title']='Data Barang';
		$this->data['barang']=$this->M_Barang->getBarang();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function riwayat($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Barang';
		$this->data['title']='Riwayat Barang';
		$this->data['barang']=$this->M_Peminjaman->getBarang($id);
		$this->data['isi'] = $this->load->view($this->link.'/riwayat',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Barang';
			$this->data['title']='Tambah Barang';
		}else{

			$this->data['judul_tab']='Form Edit Barang';
			$this->data['title']='Edit Barang';

			$this->data['barang']=$this->M_Barang->getID($id);
			// $id= $this->form_validation->set_value('id');
			// $nama_barang= $this->form_validation->set_value('nama_barang');
		}
			$this->data['jenis']=$this->M_Jenis->getBarang();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			

		$id_barang	= $this->input->post('id_barang');
		$merek		= $this->input->post('merek');
		$kondisi	= $this->input->post('kondisi');
		$id_jenis	= $this->input->post('id_jenis');
		$status		= $this->input->post('status');
		$keterangan	= $this->input->post('keterangan');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');
		$tahun_pengadaan		= $this->input->post('tahun_pengadaan');
		$asal_usul	= $this->input->post('asal_usul');
			
			$config['upload_path']          = './assets/images/barang';
	        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG';
	        $config['max_size']             = '0';
	        $config['max_width']            = '0';
	        $config['max_height']           = '0';
	        $config['file_name']           = $tahun_pengadaan."-".$merek;
			$this->load->library('upload',$config); //call library upload 
        	$this->upload->initialize($config);
			
		if($id_barang==0){	
			$this->upload->do_upload('gambar_barang');
			$data = array('upload' => $this->upload->data());
			$image= $data['upload']['file_name'];
			$gambar_barang			= $image;
			$insert = array(
				'merek'=>$merek,
				'kondisi'=>$kondisi,
				'id_jenis'=>$id_jenis,
				'status'=>$status,
				'keterangan'=>$keterangan,
				'gambar_barang'=>$gambar_barang,
				'harga'=>$harga,
				'stok'=>$stok,
				'tahun_pengadaan'=>$tahun_pengadaan,
				'asal_usul'=>$asal_usul);
			if ($this->M_Barang->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{
			// if(! $this->upload->do_upload('gambar_barang')){	
				$update = array(
				'id_barang'=>$id_barang,
				'merek'=>$merek,
				'kondisi'=>$kondisi,
				'id_jenis'=>$id_jenis,
				'status'=>$status,
				'keterangan'=>$keterangan,
				'harga'=>$harga,
				'stok'=>$stok,
				'tahun_pengadaan'=>$tahun_pengadaan,
				'asal_usul'=>$asal_usul);
				
				if(!empty($this->upload->do_upload('gambar_barang'))){
					$this->M_Barang->hapus_file($id_barang);

					$data = array('upload' => $this->upload->data());
					$image= $data['upload']['file_name'];
					$gambar_barang			= $image;

					$update+=['gambar_barang'=>$gambar_barang];
				}
			if ($this->M_Barang->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Barang->hapus_file($id);
		$this->M_Barang->delete($id);
		redirect('admin/'.$this->link);
	}

}