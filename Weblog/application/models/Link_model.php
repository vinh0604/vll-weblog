<?php
	class Link_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function getLinks($mataikhoan)
		{
			$qr = "select * from lienket where MATAIKHOAN = $mataikhoan";
			return $this->db->query($qr)->result_array();
		}
		
		function getLink($mataikhoan, $malienket)
		{
			$qr = "select * from lienket where MATAIKHOAN = $mataikhoan and MALIENKET = $malienket";
			return $this->db->query($qr)->result_array();	
		}
		
		function insertLink($mataikhoan, $tenlink, $duongdan)
		{
			$qr = "insert into lienket values(null, ?, ?, ?)";
			return $this->db->query($qr, array($mataikhoan, $duongdan, $tenlink));
		}
		
		function updateLink($mataikhoan, $malienket, $tenlink, $duongdan)
		{
			$qr = "update lienket set TENLIENKET = ?, DUONGDAN = ? where MATAIKHOAN = ? and MALIENKET = ?";
			return $this->db->query($qr, array($tenlink, $duongdan, $mataikhoan, $malienket));
		}
		
		function deleteLink($mataikhoan, $malienkiet)
		{
			$qr = "delete from lienket where MATAIKHOAN = ? and MALIENKET = ?";
			return $this->db->query($qr, array($mataikhoan, $malienkiet));	
		}
			
	}