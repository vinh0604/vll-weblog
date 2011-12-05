<?php
class Poll_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getBinhchons($mataikhoan) {
    	//$this->load->database();
    	$sql = "select bc.mabinhchon, cauhoi, DATE_FORMAT(ngaytao,'%e/%m/%Y') as ngaytao, trangthai, sum(soluotchon) as luottraloi ".
    		   "from binhchon bc left join dapan da ".
    		   "on bc.mabinhchon=da.mabinhchon where mataikhoan=$mataikhoan ".
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
    
    function getBinhchon($mabinhchon) 
    {
    	$result = array();
    	$result['mabinhchon'] = $mabinhchon;
    	
    	$poll = $this->db->get_where('binhchon',array("mabinhchon"=>$mabinhchon))->row(0);
    	$result['cauhoi'] = $poll->CAUHOI;
    	$result['trangthai'] = $poll->TRANGTHAI;
    	
    	$answers = $this->db->get_where('dapan',array("mabinhchon"=>$mabinhchon))->result_array();
    	$result['dapans'] = $answers;
    	return $result;
    }
    
    function updateBinhchon($mataikhoan,$mabinhchon,$poll)
    {
    	if($this->checkBinhchon($mataikhoan, $mabinhchon) == 0) 
    	{
    		return false;
    	}
    	$sql = "update binhchon set cauhoi=?, trangthai=? ".
    		   "where mabinhchon=?";
    	if(!$this->db->query($sql,array($poll['cauhoi'],$poll['trangthai'],$mabinhchon)))
    	{
    		return false;
    	}
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
    	$dapanxoa = $poll['dapanxoa'];
    	$sql = "delete from dapan where madapan in $dapanxoa and mabinhchon=?";
    	$this->db->query($sql,array($mabinhchon));
    	return true;
    }
    
    function checkBinhchon($mataikhoan,$mabinhchon)
    {
    	return $this->db->get_where('binhchon',array("mabinhchon"=>$mabinhchon,"mataikhoan"=>$mataikhoan))->num_rows();	
    }
    
    function updateTrangthai($mabinhchon)
    {
    	$sql = "update binhchon set trangthai=0 where mabinhchon != ?";
    	$this->db->query($sql,array($mabinhchon));
    }
}