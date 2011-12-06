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
    	$sql = "insert into lichsu values (?,sysdate(),1) on duplicate key update luotxem = luotxem + 1";
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
    	$sql = "select t.matag,tentag,mota,(select count(*) from tag_baiviet tb, baiviet b where b.mabaiviet=tb.mabaiviet and b.trangthai!=2 and tb.matag=t.matag) as soluong from tag t where mataikhoan=? order by soluong desc limit 10";
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
    		$sql = "select tenitem,loaiitem,thongtin_ma,thongtin_lk from menu_item where mamenu=?";
    		$items = $this->db->query($sql,array($mamenu))->result_array();
    		$array = array();
    		foreach ($items as $item)
    		{
    			$value = array();
    			$value['tenitem'] = $item['tenitem'];
    			switch ($item['loaiitem'])
    			{
    				case 'lienket': $value['lienket'] = $item['thongtin_lk']; break;
    				case 'trang': $value['lienket'] = base_url().'index.php/blog/'.$username.'/view/'.$item['thongtin_ma']; break;
    				case 'chuyenmuc': $value['lienket'] = base_url().'index.php/blog/'.$username.'/category/'.$item['thongtin_ma']; break;
    			}
    			$array[] = $value;
    		}
    		return $array;
    	}
    	return null;
    }
    
	function getLuotxem($mataikhoan)
    {
    	$sql = "select sum(luotxem) as luotxem from lichsu where mataikhoan=?";
    	$query = $this->db->query($sql,array($mataikhoan));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->luotxem;
    }
    
	function getTongsobai($mataikhoan)
    {
    	$sql = "select count(*) as tongso from baiviet where mataikhoan=? and trangthai!=2";
    	return $this->db->query($sql,array($mataikhoan))->row(0)->tongso;
    }
    
	function getBaiviets($mataikhoan,$offset,$limit)
    {
    	$sql = "select mabaiviet,tuade,noidung,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and trangthai!=2 order by b.ngaydang desc limit ?,?";
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
    
	function getBaivietByMonth($mataikhoan,$year,$month)
    {
    	$result = array();
    	$sql = "select distinct day(ngaydang) as day from baiviet where mataikhoan=? and month(ngaydang)=? and year(ngaydang)=?";
    	$rows = $this->db->query($sql,array($mataikhoan,intval($month),intval($year)))->result_array();
    	$sql = "select tendangnhap from taikhoan where mataikhoan=?";
    	$username = $this->db->query($sql,array($mataikhoan))->row(0)->tendangnhap;
    	foreach ($rows as $row)
    	{
    		$result[$row['day']] = base_url('index.php/blog/'.$username.'/calendar/'.$year.'/'.$month.'/'.$row['day']);
    	}
    	return $result;
    }
    
    function getBaiviet($mataikhoan,$mabaiviet)
    {
    	$sql = "select mabaiviet,tuade,noidung,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,luotlthich,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and mabaiviet=? and trangthai!=2";
    	$query = $this->db->query($sql,array($mataikhoan,$mabaiviet));
    	return $query->num_rows()==0 ? null : $query->row_array(0);
    }
    
    function getBaitruoc($mataikhoan,$date)
    {
    	$sql = "select mabaiviet from baiviet where mataikhoan=? and ngaydang<? and trangthai!=2 limit 1";
    	$query = $this->db->query($sql,array($mataikhoan,$date));
    	return $query->num_rows()==0 ? null : $query->row(0)->mabaiviet;
    }
    
	function getBaisau($mataikhoan,$date)
    {
    	$sql = "select mabaiviet from baiviet where mataikhoan=? and ngaydang>? and trangthai!=2 limit 1";
    	$query = $this->db->query($sql,array($mataikhoan,$date));
    	return $query->num_rows()==0 ? null : $query->row(0)->mabaiviet;
    }
    
    function getNgaydang($mabaiviet)
    {
    	$sql = "select ngaydang from baiviet where mabaiviet=?";
    	$query = $this->db->query($sql,array($mabaiviet));
    	return $query->num_rows()==0 ? null : $query->row(0)->ngaydang;
    }
    
    function getTagByBaiviet($mabaiviet)
    {
    	$sql = "select t.matag,tentag,mota from tag t,tag_baiviet tb where mabaiviet=? and t.matag=tb.matag";
    	return $this->db->query($sql,array($mabaiviet))->result_array();
    }
    
    function getBinhchon($mataikhoan)
    {
    	$sql = "select mabinhchon,cauhoi from binhchon where mataikhoan=? and trangthai!=0 limit 1";
    	$query = $this->db->query($sql,array($mataikhoan));
    	return $query->num_rows()==0 ? null : $query->row_array(0);
    }
    
    function getDapan($mabinhchon)
    {
    	$sql = "select madapan,dapan,soluotchon from dapan where mabinhchon=?";
    	$polls = $this->db->query($sql,array($mabinhchon))->result_array();
    	$result = array();
    	$sql = "select sum(soluotchon) as soluong from dapan where mabinhchon=?";
    	$num_vote = $this->db->query($sql,array($mabinhchon))->row(0)->soluong;
    	foreach ($polls as $poll)
    	{
    		$poll['percentage'] = round($poll['soluotchon']*100/$num_vote,2) ;
    		$result[] = $poll;
    	}
    	return $result;
    }
    
    function updateDapan($mataikhoan,$mabinhchon,$madapan)
    {
    	$sql = "select mabinhchon from binhchon where mabinhchon=? and mataikhoan=?";
    	if ($this->db->query($sql,array($mabinhchon,$mataikhoan))->num_rows()==0)
    	{
    		return 0;
    	}
    	$sql = "update dapan set soluotchon=soluotchon+1 where madapan=?";
    	$this->db->query($sql,array($madapan));
    	return $this->db->affected_rows();
    }
    
    function updateLuotxemBaiviet($mabaiviet)
    {
    	$sql = "update baiviet set luotxem=luotxem+1 where mabaiviet=?";
    	$this->db->query($sql,array($mabaiviet));
    	return $this->db->affected_rows();
    }
    
    function updateLuotthichBaiviet($mataikhoan,$mabaiviet)
    {
    	$sql = "select mabaiviet from baiviet where mataikhoan=? and mabaiviet=?";
    	if ($this->db->query($sql,array($mataikhoan,$mabaiviet))->num_rows()==0)
    	{
    		return 0;
    	}
    	$sql = "update baiviet set luotlthich=luotlthich+1 where mabaiviet=?";
    	$this->db->query($sql,array($mabaiviet));
    	return $this->db->affected_rows();
    }
    
    function getLuotthich($mabaiviet)
    {
    	$sql = "select luotlthich from baiviet where mabaiviet=? limit 1";
    	$query = $this->db->query($sql,array($mabaiviet));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->luotlthich;
    }
    
    function insertBinhluan($mataikhoan,$mabaiviet,$content,$author,$email,$website)
    {
    	$sql = "select mabaiviet from baiviet where mataikhoan=? and mabaiviet=?";
    	if ($this->db->query($sql,array($mataikhoan,$mabaiviet))->num_rows()==0)
    	{
    		return 0;
    	}
    	$sql = "insert into binhluan(mabaiviet,hoten,email,website,ngaydang,noidung) values(?,?,?,?,sysdate(),?)";
    	$this->db->query($sql,array($mabaiviet,$author,$email,$website,$content));
    	return $this->db->affected_rows();
    }
    
	function getBinhluanByBaiviet($mabaiviet)
    {
    	$sql = "select mabinhluan,hoten,email,website,DATE_FORMAT(ngaydang,'%e/%m/%Y') as date,DATE_FORMAT(ngaydang,'%h:%i:%s') as time,noidung from binhluan where mabaiviet=?";
    	return $this->db->query($sql,array($mabaiviet))->result_array();
    }
    
    function getBaivietsByTag($mataikhoan,$tag)
    {
    	$sql = "select b.mabaiviet,tuade,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c,tag t,tag_baiviet tb where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and t.matag=tb.matag and tb.mabaiviet=b.mabaiviet and tentag=? and trangthai!=2 order by b.ngaydang desc";
    	return $this->db->query($sql,array($mataikhoan,$tag))->result_array();
    }
    
	function getBaivietsByCat($mataikhoan,$machuyenmuc)
    {
    	$sql = "select mabaiviet,tuade,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and c.machuyenmuc=? and trangthai!=2 order by b.ngaydang desc";
    	return $this->db->query($sql,array($mataikhoan,$machuyenmuc))->result_array();
    }
    
    function getBaivietsByDate($mataikhoan,$year,$month,$day)
    {
    	$sql = "select mabaiviet,tuade,DATE_FORMAT(ngaydang,'%Y-%m-%e') as ngaydang,b.machuyenmuc,tenchuyenmuc from baiviet b,chuyenmuc c where b.mataikhoan=? and b.machuyenmuc=c.machuyenmuc and YEAR(ngaydang)=? and MONTH(ngaydang)=? and DAY(ngaydang)=? and trangthai!=2 order by b.ngaydang desc";
    	return $this->db->query($sql,array($mataikhoan,$year,$month,$day))->result_array();
    }
    
    function getTrang($mataikhoan,$matrang)
    {
    	$sql = "select tieude,noidung from trang where mataikhoan=? and matrang=? limit 1";
    	$query = $this->db->query($sql,array($mataikhoan,$matrang));
    	return $query->num_rows()==0 ? null : $query->row_array(0);
    }
    
	function getSoketqua($mataikhoan,$keyword)
    {
    	$sql = "select count(*) as soluong from baiviet b, baiviet_fulltext bf where b.mabaiviet = bf.mabaiviet and mataikhoan=? and MATCH(bf.tuade,bf.noidung) AGAINST (? IN BOOLEAN MODE)";
    	$query = $this->db->query($sql,array($mataikhoan,$keyword));
    	return $query->num_rows()==0 ? 0 : $query->row(0)->soluong;
    }
    
    function getKetqua($mataikhoan,$keyword,$offset)
    {
    	$sql = "select bf.mabaiviet,bf.tuade,bf.noidung from baiviet b, baiviet_fulltext bf where b.mabaiviet = bf.mabaiviet and mataikhoan=? and MATCH(bf.tuade,bf.noidung) AGAINST (? IN BOOLEAN MODE) limit ?,10";
    	return $this->db->query($sql,array($mataikhoan,$keyword,$offset))->result_array();
    }
}