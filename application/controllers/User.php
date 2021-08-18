<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		
		$this->data['judul_tab'] = 'Login';

		$this->load->view('login', $this->data);
	}
}