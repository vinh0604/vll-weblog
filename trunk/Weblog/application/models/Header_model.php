<?php
class Avatar_model extends CI_Model {

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
}