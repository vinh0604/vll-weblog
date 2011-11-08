<?php
class Post_model extends CI_Model {

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
	
    function getPost($bai, $muc, $mataikhoan) {
    	$this->load->database();
    	$sql = "select bv.tuade as tuade, bv.noidung as noidung, cm.tenchuyenmuc as chuyenmuc, t.tentag as the, DATE_FORMAT(bv.ngaydang,'%e/%m/%Y') as ngaydang from baiviet bv, chuyenmuc cm, tag t, tag_baiviet tb where bv.machuyenmuc = cm.machuyenmuc and bv.mabaiviet = tb.mabaiviet and tb.matag = t.matag and bv.mataikhoan = $mataikhoan";
    	return $this->db->query($sql)->result_array();
    }
	
	function autoSave($dulieu,$mataikhoan){

		$sql = "update bangtam set NOIDUNG_TRANG = ? where  MATAIKHOAN = ?";
		$this->db->query($sql, array($dulieu,$mataikhoan));
	}
	
	function addNewPost($mataikhoan,$title,$content,$category,$tag){
		$this->load->database();
		
		$tag_items = explode(",",$tag);
		$sql = "insert into baiviet(mataikhoan, machuyenmuc, tuade, noidung, ngaydang, trangthai, luotlthich, luotxem) values(?, ?, ?, ?, NOW(), 1, 0, 0)";
		$this->db->query($sql, array($mataikhoan,$category,$title,$content));
		
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag";
				$matag = $this->db->query($sql)->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet";
				$mabv = $this->db->query($sql)->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));
			}
		}
				
	}
	
	function addDraft($mataikhoan,$title,$content,$category,$tag){
		$this->load->database();
		
		$tag_items = explode(",",$tag);
		$sql = "insert into baiviet(mataikhoan, machuyenmuc, tuade, noidung, ngaydang, trangthai, luotlthich, luotxem) values(?, ?, ?, ?, NOW(), 2, 0, 0)";
		$this->db->query($sql, array($mataikhoan,$category,$title,$content));
		
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag";
				$matag = $this->db->query($sql)->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet";
				$mabv = $this->db->query($sql)->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));
			}
		}
				
	}
}