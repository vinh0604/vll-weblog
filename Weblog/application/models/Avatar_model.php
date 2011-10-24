<?php
class Avatar_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
	function getAvatar($mataikhoan) 
    {
    	$this->db->select('avatar');
    	$result = $this->db->get_where('canhanhoa',array('mataikhoan'=>$mataikhoan))->row(0);
    	return $result->avatar;
    }
    
    function deleteAvatar($mataikhoan) 
    {
    	$sql = "update canhanhoa set avatar = 'default.png' where mataikhoan=?";
    	return $result = $this->db->query($sql,array($mataikhoan));
    }

    function updateAvatar($mataikhoan,$link)
    {
    	$sql = "update canhanhoa set avatar=? where mataikhoan=?";
    	return $result = $this->db->query($sql,array($link,$mataikhoan));
    }
    
    function getAvatartam($mataikhoan)
    {
    	$this->db->select('avatar');
    	$result = $this->db->get_where('bangtam',array('mataikhoan'=>$mataikhoan))->row(0);
    	return $result->avatar;
    }
    
    function updateAvatartam($mataikhoan,$link)
    {
    	$sql = "update bangtam set avatar=? where mataikhoan=?";
    	return $result = $this->db->query($sql,array($link,$mataikhoan));
    }
}