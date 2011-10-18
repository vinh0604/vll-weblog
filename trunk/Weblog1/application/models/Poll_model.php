<?php
class Poll_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getBinhchons($mataikhoan) {
    	//$this->load->database();
    	$sql = "select bc.mabinhchon, cauhoi, DATE_FORMAT(ngaytao,'%e/%m/%Y') as ngaytao, trangthai, count(soluotchon) as luottraloi ".
    		   "from binhchon bc, dapan da ".
    		   "where bc.mabinhchon=da.mabinhchon and mataikhoan=$mataikhoan ".
    		   "group by bc.mabinhchon, cauhoi, ngaytao, trangthai";
    	return $this->db->query($sql)->result_array();
    }
}