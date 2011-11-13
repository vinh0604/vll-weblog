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
					WHERE c.MATAIKHOAN =$mataikhoan
					GROUP BY (c.MACHUYENMUC)
					ORDER BY c.MACHUYENMUC DESC";	
			return $this->db->query($qr)->result_array();
		}
		
		function insertCategory($mataikhoan, $tenchuyenmuc, $mota)
		{
			$qr = "insert into chuyenmuc values(null, $mataikhoan, '$tenchuyenmuc', '$mota')";
			return $this->db->query($qr);	
		}
		
		function deleteCategory($mataikhoan, $machuyenmuc)
		{
			$qr = "delete from chuyenmuc where MATAIKHOAN = $mataikhoan and MACHUYENMUC  = $machuyenmuc";
			return $this->db->query($qr);	
		}
		
		function editCategory($mataikhoan, $machuyenmuc)
		{
			$qr = "	select MACHUYENMUC,TENCHUYENMUC, MOTA
					from chuyenmuc 
					where MATAIKHOAN = $mataikhoan
					and MACHUYENMUC = $machuyenmuc";
			return $this->db->query($qr)->result_array();	
		}
		
		function updateCategory($mataikhoan, $machuyenmuc, $tenchuyenmuc, $mota)
		{
			$qr =" update chuyenmuc
					set
						TENCHUYENMUC = '$tenchuyenmuc',
						MOTA = '$mota'
					where MATAIKHOAN = $mataikhoan
					and MACHUYENMUC = $machuyenmuc";
			return $this->db->query($qr);
		}
	}