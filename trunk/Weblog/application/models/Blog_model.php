<?php
class Blog_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    
    function getMataikhoan($user)
    {
    	$sql = "select mataikhoan from taikhoan where tendangnhap=?";
    	$query = $this->db->query($sql,array($user));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->mataikhoan;
    }
    
    function updateLuotxem($mataikhoan)
    {
    	$sql = "update taikhoan set luotxem = luotxem + 1 where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan));
    }
    
	function getLienket($mataikhoan)
    {
    	$sql = "select malienket,tenlienket,duongdan from lienket where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->result_array();
    }
    
	function getChuyenmuc($mataikhoan)
    {
    	$sql = "select machuyenmuc,tenchuyenmuc,mota from chuyenmuc where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->result_array();
    }
    
	function getThe($mataikhoan)
    {
    	$sql = "select t.matag,tentag,mota,(select count(*) from tag_baiviet where matag=t.matag) as soluong from tag t where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->result_array();
    }
    
	function getCanhanhoa($mataikhoan)
    {
    	$sql = "select magiaodien,avatar,tieude,mota,mauchu,anhnen,nenheader,sobai,sodong from canhanhoa where mataikhoan=?";
    	return $this->db->query($sql,array($mataikhoan))->row_array(0);
    }
    
	function getMenu($mataikhoan)
    {
    	$sql = "select mamenu from menu where mataikhoan=? and trangthai!=0";
    	$query = $this->db->query($sql,array($mataikhoan));
    	if($query->num_rows()>0)
    	{
    		$sql = "select tendangnhap from taikhoan where mataikhoan=?";
    		$username = $this->db->query($sql,array($mataikhoan))->row(0)->tendangnhap;
    		$mamenu = $query->row(0)->mamenu;
    		$sql = "select tenitem,loaiitem,thongtin_ma,thongtin_lk from menu where mamenu=? and trangthai!=0";
    		$items = $this->db->query($sql,array($mamenu))->result_array();
    		$array = array();
    		foreach ($items as $item)
    		{
    			$value = array();
    			$value['tenitem'] = $item['tenitem'];
    			switch ($item['loaiitem'])
    			{
    				case 'link': $value['lienket'] = $item['thongtin_lk']; break;
    				case 'trang': $value['lienket'] = base_url().'index.php/blog/'.$username.'/view/'.$item['thongtin_ma']; break;
    				case 'chuyenmuc': $value['lienket'] = base_url().'index.php/blog/'.$username.'/category/'.$item['thongtin_lk']; break;
    			}
    			$array[] = $value;
    		}
    		return $array;
    	}
    	return null;
    }
    
	function getLuotxem($mataikhoan)
    {
    	$sql = "select luotxem from taikhoan where mataikhoan=?";
    	$query = $this->db->query($sql,array($mataikhoan));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->luotxem;
    }
    
	function getTongsobai($mataikhoan)
    {
    	$sql = "select count(*) as tongso from baiviet where mataikhoan=? and trangthai!=0";
    	return $this->db->query($sql,array($mataikhoan))->row(0)->tongso;
    }
    
	function getBaiviets($mataikhoan,$offset,$limit)
    {
    	$sql = "select mabaiviet,tuade,noidung,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and trangthai!=0 limit ?,?";
    	return $this->db->query($sql,array($mataikhoan,$offset,$limit))->result_array();
    }
	
    function getBaivietByDay($mataikhoan,$date)
    {
    	$result = array();
    	$sql = "select distinct day(ngaydang) as day from baiviet where mataikhoan=? and month(ngaydang)=? and year(ngaydang)=?";
    	$rows = $this->db->query($sql,array($mataikhoan,$date['mon'],$date['year']))->result_array();
    	$sql = "select tendangnhap from taikhoan where mataikhoan=?";
    	$username = $this->db->query($sql,array($mataikhoan))->row(0)->tendangnhap;
    	foreach ($rows as $row)
    	{
    		$result[$row['day']] = base_url('index.php/blog/'.$username.'/calendar/'.$date['year'].'/'.$date['mon'].'/'.$row['day']);
    	}
    	return $result;
    }
}