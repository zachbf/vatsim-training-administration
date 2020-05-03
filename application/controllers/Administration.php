<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {
	
	public $userInfo;
	
	public function __construct()
	{
	    parent::__construct();
	    if (!$this->session->userdata('logged_in')) {
	        redirect('login');
	    }
	    else
	    {
		    if($this->User->isAdmin($this->session->userdata('id')))
		    {
			    $data = array();
				$data['userInfo'] = $this->User->getInfo($this->session->userdata('id'));
				$this->load->vars($data);
			}
			else
			{
				echo '<script>$(document).ready(function(){alert("You are not authorised to view this page.");});</script>';
			}
	    }
	}
	
	public function index()
	{
		$data = array(
			'page' => 'admin'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('inc/footer');
	}
	
	public function staff()
	{
		$data = array(
			'page' => 'admin/staff'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('administration/staff', $data);
		$this->load->view('inc/footer');
	}
	
	public function staffadd()
	{
		if($this->User->isUnique($this->input->post('cid')))
		{
			$data = array(
			'id' => $this->input->post('cid'),
			'isadmin' => $this->input->post('administrator')
			);
			
			if ($this->db->insert('staff', $data))
			{
				redirect('administration/staff');	
			}
		}
		else
		{
			echo '<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css">';
			echo '<script src="http://code.jquery.com/jquery-1.9.0.js"></script>';
			echo '<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>';
			echo '<script type="text/javascript">'; 
			echo 'alert("Error! This user already exists!");'; 
			echo 'window.location.href = "' . base_url() . 'administration/staff";';
			echo '</script>';
		}
	}
	
	public function deletestaff($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('staff'); 
		
		echo '<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css">';
		echo '<script src="http://code.jquery.com/jquery-1.9.0.js"></script>';
		echo '<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>';
		echo '<script type="text/javascript">'; 
		echo 'alert("This staff member has been deleted!");'; 
		echo 'window.location.href = "' . base_url() . 'administration/staff";';
		echo '</script>';
	}
	
	public function units()
	{
		$data = array(
			'page' => 'admin/units'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('administration/units', $data);
		$this->load->view('inc/footer');
	}
	
	public function editunit($id)
	{
		$data = array(
			'page' => 'admin/units'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('administration/editunit', $data);
		$this->load->view('inc/footer');
	}
	
	public function competencies()
	{
		$data = array(
			'page' => 'admin/competencies'
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('administration/competencies', $data);
		$this->load->view('inc/footer');
	}
	
	public function editcompetency($id)
	{
		if($this->input->post()){
			$data = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'criteria' => $this->input->post('criteria')
			);
			
			$this->db->where('id', $id);
			
			if($this->db->update('competency', $data))
			{
				redirect('administration/competencies');
			}
		}
		else
		{
			$compInfo = $this->Database->adminGetCompInfo($id);
			
			$data = array(
				'page' => 'admin/competencies',
				'compInfo' => $compInfo
			);
			
			$this->load->view('inc/header', $data);
			$this->load->view('inc/navigation', $data);
			$this->load->view('administration/editcompetency', $data);
			$this->load->view('inc/footer');
		}
	}
	
	public function unitadd()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'code' => $this->input->post('code'),
			'type' => $this->input->post('type'),
			'rating' => $this->input->post('rating'),
			'active' => $this->input->post('active'),
		);
		
		if ($this->db->insert('units', $data))
		{
			redirect('administration/units');	
		}
	}	

	public function unitcompetencies($id)
	{
		$unitInfo = $this->Database->adminGetUnitInfo($id);
		$compInfo = $this->Database->adminGetUnitComp($id);
		
		$data = array(
			'page' => 'admin/units',
			'unitInfo' => $unitInfo,
			'compInfo' => $compInfo
		);
		
		$this->load->view('inc/header', $data);
		$this->load->view('inc/navigation', $data);
		$this->load->view('administration/unitcomps', $data);
		$this->load->view('inc/footer');
	}
	
	public function competencycreate()
	{
		if($this->input->post()){
			$data = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'criteria' => $this->input->post('criteria')
			);
			
			if($this->db->insert('competency', $data))
			{
				redirect('administration/competencies');
			}
		}
	}
	
	public function unitaddcomp($unitid)
	{
		$data = array(
			'competency' => $this->input->post('comp'),
			'type' => $this->input->post('type'),
			'unit' => $unitid
		);
			
		if($this->db->insert('comp_connect', $data))
		{
			redirect('administration/unitcompetencies/' . $unitid);
		}		
	}
	
	public function unitremovecomp($id, $unitid)
	{
		$this->db->where('con_id', $id);
		
		if($this->db->delete('comp_connect'))
		{
			redirect('administration/unitcompetencies/' . $unitid);
		}
	}
	
	public function deletecompetency($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('competency'))
		{
			redirect('administration/competencies');
		}
	}	
	
}