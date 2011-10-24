<?php
class Logout_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    function logout(){
        $this->load->database();
		$sql = "update taikhoan set lastsid = currentsid and currentsid = NULL where mataikhoan = ?";
		$query = $this->db->query($sql,array($matk));
    }
	
}
?>