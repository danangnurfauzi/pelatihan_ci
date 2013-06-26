<?php

class Coba extends CI_Controller{

	public function tes(){
		$this->load->view('welcome_message');
	}
	
	public function dashboard(){
		$this->load->view('dashboard');
	}

}

?>