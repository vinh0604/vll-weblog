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
	
	function getOneChuyenmuc($bai_sua) {
    	//$this->load->database();
    	$sql = "select cm.machuyenmuc, cm.tenchuyenmuc from chuyenmuc cm, baiviet bv where cm.machuyenmuc = bv.machuyenmuc and bv.mabaiviet = $bai_sua";
    	return $this->db->query($sql)->result_array();
    }
	
	function getBaiTam($mataikhhoan){
		$sql = "select tuade, luunhap from bangtam where mataikhoan = $mataikhhoan"	;
		return $this->db->query($sql)->result_array();
	}
	
    function getPost($mataikhoan) {
    	$this->load->database();
    	$sql = "SELECT bv.mabaiviet, bv.tuade AS tuade, bv.noidung AS noidung, cm.tenchuyenmuc AS chuyenmuc, DATE_FORMAT( bv.ngaydang, '%Y-%m-%d' ) AS ngaydang
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
	
	function getPost_ajax($mataikhoan,$bai) {
    	if($bai == "1"){
			$dk = "and bv.trangthai = 1";
		}elseif($bai == "2"){
			$dk = "and bv.trangthai = 2";
		}else{
			$dk = "";	
		}
		$this->load->database();
    	$sql = "SELECT bv.mabaiviet, bv.tuade AS tuade, bv.noidung AS noidung, cm.tenchuyenmuc AS chuyenmuc, DATE_FORMAT( bv.ngaydang, '%e/%m/%Y' ) AS ngaydang
				FROM baiviet bv, chuyenmuc cm
				WHERE bv.machuyenmuc = cm.machuyenmuc
				AND bv.mataikhoan = $mataikhoan $dk";
    	return $this->db->query($sql)->result_array();
    }
	
	function getPostByTag_ajax($mataikhoan,$bai){
		if($bai == "1"){
			$dk = "and bv.trangthai = 1";
		}elseif($bai == "2"){
			$dk = "and bv.trangthai = 2";
		}else{
			$dk = "";	
		}
		$sql = "SELECT bv.mabaiviet
				FROM baiviet bv
				WHERE bv.mataikhoan = $mataikhoan $dk";
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
	
	function getOnePost($mataikhoan,$bai_sua) {
    	$this->load->database();
    	$sql = "SELECT bv.mabaiviet, bv.tuade AS tuade, bv.noidung AS noidung, cm.tenchuyenmuc AS chuyenmuc, DATE_FORMAT( bv.ngaydang, '%e/%m/%Y' ) AS ngaydang
				FROM baiviet bv, chuyenmuc cm
				WHERE bv.machuyenmuc = cm.machuyenmuc
				AND bv.mataikhoan = $mataikhoan
				AND bv.mabaiviet = $bai_sua";
    	return $this->db->query($sql)->result_array();
    }
	
	
	function getOnePostByTag($mataikhoan,$bai_sua){
		$sql = "SELECT bv.mabaiviet
				FROM baiviet bv
				WHERE bv.mataikhoan = $mataikhoan
				AND bv.mabaiviet = $bai_sua";
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
	
	

	function autoSave($tuade,$dulieu,$mataikhoan){
		
		$sql = "update bangtam set TUADE = ?, LUUNHAP = ? where  MATAIKHOAN = ?";
		$this->db->query($sql, array($tuade,$dulieu,$mataikhoan));
		
	}
	
	function addNewPost($mataikhoan,$title,$content,$category,$tag){
		$this->load->database();
		
		$tag_items = explode(",",$tag);
		$sql = "insert into baiviet(mataikhoan, machuyenmuc, tuade, noidung, ngaydang, trangthai, luotlthich, luotxem) values(?, ?, ?, ?, NOW(), 1, 0, 0)";
		$this->db->query($sql, array($mataikhoan,$category,$title,$content));
		
		$sql = "select max(mabaiviet) as mabv from baiviet where mataikhoan = ?";
		$mabv_moi = $this->db->query($sql, array($mataikhoan))->row(0)->mabv;
		
		$sql = "insert into baiviet_fulltext values(?, ?, ?)";
		$this->db->query($sql, array($mabv_moi,$title,$content));
		
		$sql = "update bangtam set luunhap = '', tuade = '' where mataikhoan = $mataikhoan";
		$this->db->query($sql);
		
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag  where mataikhoan = ?";
				$matag = $this->db->query($sql, array($mataikhoan))->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet  where mataikhoan = ?";
				$mabv = $this->db->query($sql, array($mataikhoan))->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));
				
			}else{
				$sql = "select matag from tag where tentag = ? and mataikhoan = ?";
				$matag = $this->db->query($sql,array($tag_items[$i],$mataikhoan))->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet  where mataikhoan = ?";
				$mabv = $this->db->query($sql, array($mataikhoan))->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));	
			}
		}
				
	}
	
	function editPost($mataikhoan,$bai_sua,$title,$content,$category,$tag){
		$this->load->database();
		
		
		$tag_items = explode(",",$tag);
		$sql = "update baiviet set machuyenmuc = ?, tuade = ?, noidung = ?, ngaydang= NOW(), trangthai = 1 where mabaiviet = ?";
		$this->db->query($sql, array($category,$title,$content,$bai_sua));
		
		$sql = "insert into baiviet_fulltext values(?,?,?) on duplicate key update tuade = ?, noidung = ?";
		$this->db->query($sql, array($bai_sua,$title,$content,$title,$content));
		
		$sql = "delete from tag_baiviet where mabaiviet = ?";
		$this->db->query($sql, array($bai_sua));
				
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag where mataikhoan = ?";
				$matag = $this->db->query($sql, array($mataikhoan))->row(0)->matag;
					
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($bai_sua,$matag));
				
			}else{
				
				$sql = "select matag from tag where tentag = ? and mataikhoan = ?";
				$matag = $this->db->query($sql,array($tag_items[$i], $mataikhoan))->row(0)->matag;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($bai_sua,$matag));	
			}
		}
	}
	
	function addDraft($mataikhoan,$title,$content,$category,$tag){
		$this->load->database();
		
		$tag_items = explode(",",$tag);
		$sql = "insert into baiviet(mataikhoan, machuyenmuc, tuade, noidung, ngaydang, trangthai, luotlthich, luotxem) values(?, ?, ?, ?, NOW(), 2, 0, 0)";
		$this->db->query($sql, array($mataikhoan,$category,$title,$content));
		
		$sql = "update bangtam set luunhap = '', tuade = '' where mataikhoan = $mataikhoan";
		$this->db->query($sql);
		
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag where mataikhoan = ?";
				$matag = $this->db->query($sql, array($mataikhoan))->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet where mataikhoan = ?";
				$mabv = $this->db->query($sql, array($mataikhoan))->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));
			}else{
				$sql = "select matag from tag where tentag = ? and mataikhoan = ?";
				$matag = $this->db->query($sql,array($tag_items[$i], $mataikhoan))->row(0)->matag;
				
				$sql = "select max(mabaiviet) as mabv from baiviet where mataikhoan = ?";
				$mabv = $this->db->query($sql, array($mataikhoan))->row(0)->mabv;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($mabv,$matag));	
			}
		}
				
	}
	
	function toDraft($mataikhoan,$bai_sua,$title,$content,$category,$tag){
		$this->load->database();
		
		
		$tag_items = explode(",",$tag);
		$sql = "update baiviet set machuyenmuc = ?, tuade = ?, noidung = ?, ngaydang= NOW(), trangthai = 2 where mabaiviet = ?";
		$this->db->query($sql, array($category,$title,$content,$bai_sua));
		
		$sql = "delete from tag_baiviet where mabaiviet = ?";
		$this->db->query($sql, array($bai_sua));
		
		$sql = "delete from baiviet_fulltext where mabaiviet = ?";
		$this->db->query($sql, array($bai_sua));
				
		for($i = 0;$i < count($tag_items); $i++){
			$tag_items[$i] = trim($tag_items[$i]);
			$sql = "select * from tag where mataikhoan = ? and tentag = ?";
			if($this->db->query($sql, array($mataikhoan,$tag_items[$i]))->num_rows() == 0){
				$sql = "insert into tag(mataikhoan, tentag) values(?,?)";
				$this->db->query($sql, array($mataikhoan,$tag_items[$i]));
				
				$sql = "select max(matag) as matag from tag where mataikhoan = ?";
				$matag = $this->db->query($sql, array($mataikhoan))->row(0)->matag;
					
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($bai_sua,$matag));
				
			}else{
				
				$sql = "select matag from tag where tentag = ? and mataikhoan = ?";
				$matag = $this->db->query($sql,array($tag_items[$i], $mataikhoan))->row(0)->matag;
				
				$sql = "insert into tag_baiviet(mabaiviet, matag) values(?,?)";
				$this->db->query($sql, array($bai_sua,$matag));	
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