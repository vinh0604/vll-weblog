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
    	$result = $this->db->get_where('canhanhoa',array('mataikhoan'=>$mataikhoan))->row(0);
    	return $result->anhnen;
    }
    
    function deleteAnhnen($mataikhoan) 
    {
    	$sql = "update canhanhoa set anhnen = null where mataikhoan=?";
    	return $result = $this->db->query($sql,array($mataikhoan));
    }

    function updateAnhnen($mataikhoan,$link)
    {
    	$sql = "update canhanhoa set anhnen=? where mataikhoan=?";
    	return $result = $this->db->query($sql,array($link,$mataikhoan));
    }
    
    function getAnhnentam($mataikhoan)
    {
    	$this->db->select('anhnen');
    	$result = $this->db->get_where('bangtam',array('mataikhoan'=>$mataikhoan))->row(0);
    	return $result->anhnen;
    }
    
    function updateAnhnentam($mataikhoan,$link)
    {
    	$sql = "update bangtam set anhnen=? where mataikhoan=?";
    	return $result = $this->db->query($sql,array($link,$mataikhoan));
    }
}