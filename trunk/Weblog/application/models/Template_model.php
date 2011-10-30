<?php
class Template_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getGiaodiens()
    {
    	$query = $this->db->get('giaodien');
    	return $query->result_array();
    }
    
    function updateGiaodien($mataikhoan,$magiaodien)
    {
    	$sql = "update canhanhoa set magiaodien=? where mataikhoan=?";
    	return $this->db->query($sql,array($magiaodien,$mataikhoan));
    }
}