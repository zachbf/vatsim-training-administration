<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	
	public $userInfo;
	
	public function __construct()
	{
	    parent::__construct();
	    if (!$this->session->userdata('logged_in')) {
	        redirect('login');
	    }
	    else
	    {
		    $data = array();
			$data['userInfo'] = $this->User->getInfo($this->session->userdata('id'));
			$this->load->vars($data); 
	    }
	}
	
	public function index()
	{
		$data = array(
			'page' => 'students'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('students/main', $data);
		$this->load->view('inc/footer');
	}
}