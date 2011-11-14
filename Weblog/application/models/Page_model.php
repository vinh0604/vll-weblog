<?php
	class Page_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function getPages($mataikhoan)
		{
			return $this->db->get_where('trang', array('MATAIKHOAN'=>$mataikhoan))->result_array();
		}	
		
		function insertPage($mataikhoan, $tieude, $noidung, $tacgia)
		{
			$qr = "insert into trang values(null, ?, ?, ?, ?)";	
			return $this->db->query($qr, array($mataikhoan, $tieude, $noidung, $tacgia));
		}
		
		function getPage($mataikhoan, $matrang)
		{
			$qr = "select * from trang where MATAIKHOAN=? and MATRANG =?";
			return $this->db->query($qr, array($mataikhoan, $matrang))->result_array();	
		}
		
		function updatePage($mataikhoan, $matrang, $tieude, $noidung, $tacgia)
		{
			$qr = "	update trang
					set
						TIEUDE = ?,
						TACGIA = ?,
						NOIDUNG = ?
					where
						MATAIKHOAN = ?
					and
						MATRANG = ?";
			return $this->db->query($qr, array($tieude, $tacgia, $noidung, $mataikhoan, $matrang));
		}
		
		function deletePage($mataikhoan, $matrang)
		{
			return $this->db->delete('trang', array('MATAIKHOAN' => $mataikhoan, 'MATRANG' => $matrang));
		}
	}