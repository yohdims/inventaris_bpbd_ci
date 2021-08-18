<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infrastruktur extends CI_Controller {
	var $link='infrastruktur';
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
		$this->data['judul_tab']='Infrastruktur';
		$this->data['title']='Data Infrastruktur';
		$this->data['infrastruktur']=$this->M_Infrastruktur->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Infrastruktur';
			$this->data['title']='Tambah Infrastruktur';
		}else{

			$this->data['judul_tab']='Form Edit Infrastruktur';
			$this->data['title']='Edit Infrastruktur';

			$this->data['infrastruktur']=$this->M_Infrastruktur->getID($id);
			// $id= $this->form_validation->set_value('id');
			// $nama_barang= $this->form_validation->set_value('nama_barang');
		}
			$this->data['jenis']=$this->M_Jenis->getInfrastruktur();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{


		$id_infrastruktur	= $this->input->post('id_infrastruktur');
		$kd_infrastruktur	= $this->input->post('kd_infrastruktur');
		$kontruksi		= $this->input->post('kontruksi');
		$luas	= $this->input->post('luas');
		$id_jenis	= $this->input->post('id_jenis');
		$status		= $this->input->post('status');
		$tahun_pengadaan		= $this->input->post('tahun_pengadaan');
		$dokumen_tanggal		= $this->input->post('dokumen_tanggal');
		$harga		= $this->input->post('harga');
		$asal_usul	= $this->input->post('asal_usul');
		$keterangan	= $this->input->post('keterangan');

			$config['upload_path']          = './assets/images/infrastruktur';
	        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG';
	        $config['max_size']             = '0';
	        $config['max_width']            = '0';
	        $config['max_height']           = '0';
	        $config['file_name']           = $tahun_pengadaan."-".$kontruksi;
			$this->load->library('upload',$config); //call library upload 
        	$this->upload->initialize($config);
			
		if($id_infrastruktur==0){	
			$this->upload->do_upload('gambar_barang');
			$data = array('upload' => $this->upload->data());
			$image= $data['upload']['file_name'];
			$gambar_barang			= $image;
			$insert = array(
				'kd_infrastruktur'=>$kd_infrastruktur,
				'kontruksi'=>$kontruksi,
				'luas'=>$luas,
				'id_jenis'=>$id_jenis,
				'status'=>$status,
				'gambar_barang'=>$gambar_barang,
				'tahun_pengadaan'=>$tahun_pengadaan,
				'dokumen_tanggal'=>$dokumen_tanggal,
				'harga'=>$harga,
				'asal_usul'=>$asal_usul,
				'keterangan'=>$keterangan);
			if ($this->M_Infrastruktur->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{
			
				$update = array(
				'id_infrastruktur'=>$id_infrastruktur,
				'kd_infrastruktur'=>$kd_infrastruktur,
				'kontruksi'=>$kontruksi,
				'luas'=>$luas,
				'id_jenis'=>$id_jenis,
				'status'=>$status,
				'tahun_pengadaan'=>$tahun_pengadaan,
				'dokumen_tanggal'=>$dokumen_tanggal,
				'harga'=>$harga,
				'asal_usul'=>$asal_usul,
				'keterangan'=>$keterangan);
				
				if(!empty($this->upload->do_upload('gambar_barang'))){
					$this->M_Barang->hapus_file($id_barang);

					$data = array('upload' => $this->upload->data());
					$image= $data['upload']['file_name'];
					$gambar_barang			= $image;

					$update+=['gambar_barang'=>$gambar_barang];
				}
			if ($this->M_Infrastruktur->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		// $this->M_Barang->hapus_gambar($id);
		$this->M_Infrastruktur->delete($id);
		redirect('admin/'.$this->link);
	}

}