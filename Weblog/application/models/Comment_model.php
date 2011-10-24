<?php
class Comment_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getBinhluan() {
    	//$this->load->database();
    	$sql = "select bl.mabinhluan, bl.noidung, bl.hoten, bv.noidung, DATE_FORMAT(bl.ngaydang,'%e/%m/%Y') as ngaydang ".
    		   "from binhchon bc, baiviet bv ".
    		   "where bc.mabaiviet=bv.mabaiviet ".
    	return $this->db->query($sql)->result_array();
    }
    

    function deleteBinhluan($mabinhluan)
    {
    	$result = $this->db->get_where('binhluan',array("mabinhluan"=>$mabinhluan))->num_rows();
    	if ($result == 0) {
    		return false;
    	}
    	$sql = "delete from binhluan where mabinhluan = ?";
    	$this->db->query($sql,array($mabinhluan));
    	if ($this->db->query($sql,array($mabinhluan))==false)
    	{
    		return false;
    	}
    	return true;
    }
    

}