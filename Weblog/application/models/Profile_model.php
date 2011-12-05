<?php
	class Profile_model extends CI_Model {
				
		function __construct()
		{
			parent::__construct();
		}
		
		function getAccount($mataikhoan)
		{
			$qr = "select * from taikhoan where MATAIKHOAN = ?";
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
		
		function updateAccount($hoten, $diachi, $email, $sodienthoai, $mataikhoan)
		{
			$qr = "	update taikhoan 
					set
						HOTEN = ?,
						DIACHI = ?,
						EMAIL = ?,
						SODIENTHOAI = ?
					where 
						MATAIKHOAN = ?";
			$this->db->query($qr, array($hoten, $diachi, $email, $sodienthoai, $mataikhoan));
		}
	}
		