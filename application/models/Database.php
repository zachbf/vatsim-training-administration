<?php
class Database extends CI_Model {
	
	public function formatType($type)
    {
	    if($type == '1')
	    {
		    $result = 'Mentoring';
	    }
	    else if($type == '2')
	    {
		    $result = "Assessment/Check";
	    }
	    
	    return $result;
    }

    public function adminGetStaff()
    {
        $query = $this->db->get('staff');
		
		$result = $query->result_array();
				
		return $result;
    }
    
    public function adminGetUnits()
    {
        $query = $this->db->get('units');
		
		$result = $query->result_array();
				
		return $result;
    }
    
    public function adminGetCompetencies()
    {
        $query = $this->db->get('competency');
		
		$result = $query->result_array();
				
		return $result;
    }
    
    public function adminGetUnitInfo($id)
    {
	    $this->db->where('id', $id);
        $query = $this->db->get('units');
		
		$result = $query->result_array();
				
		return $result['0'];
    }
    
    public function adminGetCompInfo($id)
    {
	    $this->db->where('id', $id);
        $query = $this->db->get('competency');
		
		$result = $query->result_array();
				
		return $result['0'];
    }
    
    public function adminGetUnitComp($id)
    {
	    $this->db->select('*');
		$this->db->from('comp_connect');
		$this->db->where('unit', $id);
		$this->db->join('competency', 'competency.id = comp_connect.competency', 'left');
	    $query = $this->db->get();
	    
		$result = $query->result_array();
				
		return $result;
    }
    
    public function adminCompHasUnits($id)
    {
        $this->db->where('competency', $id);
        $query = $this->db->get('comp_connect');
        
        if ($query->num_rows() > 0)
        {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
    }

}