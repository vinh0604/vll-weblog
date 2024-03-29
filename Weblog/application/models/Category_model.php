<?php
	class Category_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function getCategorys($mataikhoan)
		{
			$qr = "	SELECT c.MACHUYENMUC, c.TENCHUYENMUC, COUNT( b.MACHUYENMUC ) as POST 
					FROM chuyenmuc c left join baiviet b on c.MACHUYENMUC = b.MACHUYENMUC
					WHERE c.MATAIKHOAN =?
					GROUP BY (c.MACHUYENMUC)
					ORDER BY c.MACHUYENMUC DESC";	
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
		
		function insertCategory($mataikhoan, $tenchuyenmuc, $mota)
		{
			$qr = "insert into chuyenmuc values(null, ?, ?, ?)";
			return $this->db->query($qr, array($mataikhoan, $tenchuyenmuc, $mota));	
		}
		
		function deleteCategory($mataikhoan, $machuyenmuc)
		{
			$qr = "select machuyenmuc from chuyenmuc where MATAIKHOAN = ? and TENCHUYENMUC  = 'Không có chuyên mục' limit 1";
			$query = $this->db->query($qr,array($mataikhoan));
			$machuyenmucgoc = $query->num_rows()==0 ? 0 : $query->row(0)->machuyenmuc;
			if($machuyenmuc==$machuyenmucgoc || $machuyenmucgoc==0)
			{
				return false;
			}
			$qr = "update baiviet set machuyenmuc=? where machuyenmuc=?";
			$this->db->query($qr, array($machuyenmucgoc, $machuyenmuc));	
			$qr = "delete from chuyenmuc where MATAIKHOAN = ? and MACHUYENMUC  = ?";
			return $this->db->query($qr, array($mataikhoan, $machuyenmuc));	
		}
		
		function editCategory($mataikhoan, $machuyenmuc)
		{
			$qr = "	select MACHUYENMUC,TENCHUYENMUC, MOTA
					from chuyenmuc 
					where MATAIKHOAN = ?
					and MACHUYENMUC = ?";
			return $this->db->query($qr, array($mataikhoan, $machuyenmuc))->result_array();	
		}
		
		function updateCategory($mataikhoan, $machuyenmuc, $tenchuyenmuc, $mota)
		{
			$qr =" update chuyenmuc
					set
						TENCHUYENMUC = ?,
						MOTA = ?
					where MATAIKHOAN = ?
					and MACHUYENMUC = ?";
			return $this->db->query($qr, array($tenchuyenmuc, $mota, $mataikhoan, $machuyenmuc));
		}
	}