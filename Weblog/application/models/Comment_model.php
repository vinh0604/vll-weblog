<?php
class Comment_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
	function getChuyenmuc($mataikhoan) {
    	//$this->load->database();
    	$sql = "select machuyenmuc, tenchuyenmuc from chuyenmuc where mataikhoan = $mataikhoan";
    	return $this->db->query($sql)->result_array();
    }
	
    function getBinhluan($mataikhoan) {
    	//$this->load->database();
    	$sql = "select bl.mabinhluan as mabl, ExtractValue(bl.noidung, '//div[1]|//text()[1]|//p[1]') AS noidung, bl.hoten as hoten, bv.tuade as tuade, DATE_FORMAT(bl.ngaydang,'%Y-%m-%d') as ngaydang ".
    		   "from binhluan bl, baiviet bv ".
    		   "where bl.mabaiviet=bv.mabaiviet and bv.mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->result_array();
    }
	
	function get1Binhluan($mabl) {
    	$this->load->database();
    	$sql = "select noidung from binhluan where mabinhluan = $mabl";
    	return $this->db->query($sql)->result_array();
    }
    

    function deleteBinhluan($mabinhluan)
    {
		$this->load->database();
    	$sql = "delete from binhluan where mabinhluan = $mabinhluan";
    	return $this->db->query($sql);
    }
    
}