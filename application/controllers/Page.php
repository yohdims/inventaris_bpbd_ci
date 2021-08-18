<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	var $data;
	function __construct() {
		parent::__construct();

	}
	public function index()
	{
		
		$this->data['judul_tab'] = 'Login';

		$this->load->view('login', $this->data);
	}

	public function login(){
		$username			= $this->input->post('username');
		$password			= $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' => $password
		);
		$user=$this->M_User->login($data);
		if(!empty($user)){
	 		$begin = date('Y-m-d');
          	$end = date('Y-m-d', strtotime('+1 weeks'));
			$data_session = array(
				'id_user' => $user->id_user,
				'username' => $user->username,
				'foto' => $user->foto,
				'divisi' => $user->divisi,
				'nik' => $user->nip,
				'nama_lengkap' => $user->nama_lengkap,
				'hak_akses' => $user->hak_akses,
				'tgl_sekarang' => $begin,
				'tgl_batas' => $end ,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
	 		if($user->hak_akses=="A"){
	 			$hak_akses="admin";
			}elseif($user->hak_akses=="K"){
	 			$hak_akses="karyawan";
			}elseif($user->hak_akses=="KB"){
	 			$hak_akses="kepala_bidang";
			}
				redirect(base_url($hak_akses."/dashboard"));
		}else{
			$this->session->set_flashdata('message', 'Username/Password salah');
			redirect(base_url('page'));
		}
	}
	public function daftar()
	{
		
		$this->data['judul_tab'] = 'Login';

		$this->load->view('daftar', $this->data);
	}
	public function input_daftar()
	{
		

			$id_user				= $this->input->post('id_user');
			$nama_lengkap			= $this->input->post('nama_lengkap');
			$nip					= $this->input->post('nip');
			$username				= $this->input->post('username');
			$hak_akses				= 'K';
			$alamat					= $this->input->post('alamat');
			$no_hp					= $this->input->post('no_hp');
			// $config['file_name']	= $nama_lengkap;

				

			$insert = array(
				'nama_lengkap'=>$nama_lengkap,
				'nip'=>$nip,
				'username'=>$username,
				'password'=>$username,
				'hak_akses'=>$hak_akses,
				'alamat'=>$alamat,
				'no_hp'=>$no_hp);
		if(!empty($this->M_User->cek(array('username'=>$username))) & $id_user==0){
			$this->session->set_flashdata('message', 'Username sudah dipakai');
			redirect(base_url('page/daftar'));
		}else if ($this->M_User->insert($insert)) {// success
			$this->session->set_flashdata('message', 'Berhasil tambah data');
			redirect(base_url('page'));
		}
			
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('page'));
	}
}