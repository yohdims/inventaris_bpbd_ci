<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	var $link='user';
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
		$this->data['judul_tab']='User';
		$this->data['title']='Data User';
		$this->data['user']=$this->M_User->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah User';
			$this->data['title']='Tambah User';
		}else{

			$this->data['judul_tab']='Form Edit User';
			$this->data['title']='Edit User';

			$this->data['user']=$this->M_User->getID($id);
			// $id= $this->form_validation->set_value('id');
			// $nama_lengkap= $this->form_validation->set_value('nama_lengkap');
		}
			$this->data['jenis']=$this->M_Jenis->getBarang();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function input()
	{
		

			$id_user				= $this->input->post('id_user');
			$nama_lengkap			= $this->input->post('nama_lengkap');
			$nip					= $this->input->post('nip');
			$username				= $this->input->post('username');
			$hak_akses				= $this->input->post('hak_akses');
			$alamat					= $this->input->post('alamat');
			$divisi					= $this->input->post('divisi');
			// $foto					= $this->input->post('foto');
			$no_hp					= $this->input->post('no_hp');
			// $config['file_name']	= $nama_lengkap;

			$config['upload_path']          = './assets/images/user';
	        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG';
	        $config['max_size']             = '0';
	        $config['max_width']            = '0';
	        $config['max_height']           = '0';
	        $config['file_name']           = $hak_akses."-".$username;
			$this->load->library('upload',$config); //call library upload 
        	$this->upload->initialize($config);
			
		if(!empty($this->M_User->cek(array('username'=>$username))) & $id_user==0){
			$this->session->set_flashdata('message', 'Username sudah dipakai');
			redirect('admin/user/form/0');
		}else if($id_user==0){	
			$this->upload->do_upload('foto');
			$data = array('upload' => $this->upload->data());
			$image= $data['upload']['file_name'];
			$foto			= $image;

			$insert = array(
				'nama_lengkap'=>$nama_lengkap,
				'nip'=>$nip,
				'username'=>$username,
				'password'=>$username,
				'hak_akses'=>$hak_akses,
				'alamat'=>$alamat,
				'foto'=>$foto,
				'divisi'=>$divisi,
				'no_hp'=>$no_hp);
			if ($this->M_User->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{
			
				$update = array(
				'id_user'=>$id_user,
				'nama_lengkap'=>$nama_lengkap,
				'nip'=>$nip,
				'username'=>$username,
				'hak_akses'=>$hak_akses,
				'alamat'=>$alamat,
				'divisi'=>$divisi,
				'no_hp'=>$no_hp);
				if(!empty($this->upload->do_upload('foto'))){
					$this->M_User->hapus_file($id_user);

					$data = array('upload' => $this->upload->data());
					$image= $data['upload']['file_name'];
					$foto			= $image;

					$update+=['foto'=>$foto];
				}
			if ($this->M_User->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		// $this->M_User->hapus_gambar($id);
		$this->M_User->delete($id);
		redirect('admin/'.$this->link);
	}
}	