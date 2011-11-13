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
	
    function getPost($mataikhoan) {
    	$this->load->database();
    	$sql = "SELECT bv.mabaiviet, bv.tuade AS tuade, bv.noidung AS noidung, cm.tenchuyenmuc AS chuyenmuc, DATE_FORMAT( bv.ngaydang, '%e/%m/%Y' ) AS ngaydang
				FROM baiviet bv, chuyenmuc cm
				WHERE bv.machuyenmuc = cm.machuyenmuc
				AND bv.mataikhoan = $mataikhoan";
    	return $this->db->query($sql)->result_array();
    }
	
	function getPostByTag($mataikhoan){
		$sql = "SELECT bv.mabaiviet
				FROM baiviet bv
				WHERE bv.mataikhoan = $mataikhoan";
    	$mabv = $this->db->query($sql)->result_array();
		
		foreach($mabv as $mabv):
			$sql = "select t.tentag from tag t, tag_baiviet tb, baiviet bv where t.matag = tb.matag and bv.mabaiviet = tb.mabaiviet and bv.mabaiviet = $mabv[mabaiviet]";
			$tag = $this->db->query($sql)->result_array();
			$chuoi_tag = "";
			foreach($tag as $the):
				$chuoi_tag .= ", ".$the['tentag'];
			endforeach;
			
			$chuoi_tag = substr($chuoi_tag,1);
			$chuoi_tag_bv[$mabv['mabaiviet']] = $chuoi_tag;
		endforeach;
		
		return $chuoi_tag_bv;
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
	
	function deleteBaiviet($mabaiviet)
    {
		$this->load->database();
		$sql = "delete from binhluan where mabaiviet = ?";
    	$this->db->query($sql,array($mabaiviet));
		$sql = "delete from tag_baiviet where mabaiviet = ?";
		$this->db->query($sql,array($mabaiviet));
    	$sql = "delete from baiviet where mabaiviet = ?";
    	if ($this->db->query($sql,array($mabaiviet))==false)
    	{
    		return false;
    	}
    	return true;
    }
}