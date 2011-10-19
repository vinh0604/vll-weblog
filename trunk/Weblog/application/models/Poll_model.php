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
    
    function addBinhchon($mataikhoan,$poll){
    	$sql = "insert into binhchon(mataikhoan,cauhoi,ngaytao,trangthai) ".
    		   "values(?,?,sysdate(),?)";
    	if(!$this->db->query($sql,array($mataikhoan,$poll['cauhoi'],$poll['trangthai'])))
    	{
    		return false;
    	}
    	$sql = "select max(mabinhchon) as mabinhchon from binhchon where mataikhoan=?";
    	$result = $this->db->query($sql,array($mataikhoan))->row(0);
    	$mabinhchon = $result->mabinhchon;
    	if($poll['trangthai']==1) 
    	{
    		$this->updateTrangthai($mabinhchon);
    	}
    	foreach($poll['dapans'] as $dapan) 
    	{
    		$sql = "insert into dapan(mabinhchon,dapan,soluotchon) ".
    			   "values(?,?,0)";
    		$this->db->query($sql,array($mabinhchon,$dapan));
    	}
    	return true;
    }
    
    function deleteBinhchon($mataikhoan,$mabinhchon)
    {
    	$result = $this->db->get_where('binhchon',array("mabinhchon"=>$mabinhchon,"mataikhoan"=>$mataikhoan))->num_rows();
    	if ($result == 0) {
    		return false;
    	}
    	$sql = "delete from dapan where mabinhchon = ?";
    	$this->db->query($sql,array($mabinhchon));
    	$sql = "delete from binhchon where mabinhchon = ?";
    	if ($this->db->query($sql,array($mabinhchon))==false)
    	{
    		return false;
    	}
    	return true;
    }
    
    function updateTrangthai($mabinhchon)
    {
    	$sql = "update binhchon set trangthai=0 where mabinhchon != ?";
    	$this->db->query($sql,array($mabinhchon));
    }
}