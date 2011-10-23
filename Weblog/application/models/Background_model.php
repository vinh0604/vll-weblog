<?php
class Background_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getAnhnen($mataikhoan) 
    {
    	$this->db->select('anhnen');
    	$result = $query = $this->db->get_where('canhanhoa',array('mataikhoan'=>$mataikhoan))->row(0);
    	return $result->anhnen;
    }
    
    function deleteAnhnen($mataikhoan) 
    {
    	
    } 
}