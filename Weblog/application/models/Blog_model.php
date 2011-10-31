<?php
class Blog_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getMataikhoan($user)
    {
    	$sql = "select mataikhoan from taikhoan where tendangnhap=?";
    	$query = $this->db->query($sql,array($user));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->mataikhoan;
    }
    
    function updateLuotxem($mataikhoan)
    {
    	$sql = "update taikhoan set luotxem = luotxem + 1 where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan));
    }
}