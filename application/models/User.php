<?php
class User extends CI_Model {
        
    public function isStaff($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('staff');
        
        if ($query->num_rows() > 0)
        {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
    }
    
    public function updateUserLogin($id, $time, $email, $fname, $lname, $rating)
    {
        $data = array(
        	'email' => $email,
	        'lastLogin' => $time,
	        'fname' => $fname,
	        'lname' => $lname,
	        'rating' => $rating
		);
		
		$this->db->where('id', $id);
		$this->db->update('staff', $data);
    }
    
    public function getInfo($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('staff');
		
		$result = $query->result_array();
		
		return $result['0'];
    }
    
    public function isAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->where('isadmin', '1');
        $query = $this->db->get('staff');
		
		if ($query->num_rows() > 0)
        {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
    }
    
    public function isUnique($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('staff');
		
		if ($query->num_rows() > 0)
        {
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
    }
    
    public function removeStaff($id)
    {
       $this->db->where('id', $id);
	   $this->db->delete('staff'); 
    }
    
    public function getQual($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('staff');
		
		$result = $query->result_array();
		
		return $result['0']['qual'];
    }
        	
}
?>