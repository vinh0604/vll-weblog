<?php
class Logout_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    function logout($matk){
        $this->load->database();
		$sql = "update taikhoan set lastsid = currentsid, currentsid = NULL where mataikhoan = $matk";
		$query = $this->db->query($sql);
    }
	
}
?>