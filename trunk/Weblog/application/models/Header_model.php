<?php
class Header_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getCanhanhoa($mataikhoan)
    {
    	$sql = "select tieude,mota,nenheader,mauchu 
    			from canhanhoa where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->row_array(0);
    }
    
    function deleteNenheader($mataikhoan)
    {
    	$sql = "update canhanhoa set nenheader=null where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan));
    }
    
	function updateCanhanhoa($mataikhoan,$persona)
    {
    	$sql = "update canhanhoa set tieude=?,mota=?,mauchu=? where mataikhoan=?";
    	return $this->db->query($sql,array($persona['tieude'],$persona['mota'],$persona['mauchu'],$mataikhoan));
    }
}