<?php
	class Menu_model extends CI_Model {
				
		function __construct()
		{
			parent::__construct();
		}
		
		function getListMenu($mataikhoan)
		{
			$sql = "select * from menu where MATAIKHOAN = $mataikhoan";
			return $this->db->query($sql)->result_array();
		}
		
		function getCategorys($mataikhoan)
		{
			$sql = "select * from chuyenmuc where MATAIKHOAN = $mataikhoan";
			return $this->db->query($sql)->result_array();	
		}
		
		function getPages($mataikhoan)
		{
			$sql = "select * from trang where MATAIKHOAN = $mataikhoan";
			return $this->db->query($sql)->result_array();	
		}
		
		function insertMenu($mataikhoan, $tenmenu)
		{
			$qr= "insert into menu values(null,?,?,0)";
			return $this->db->query($qr, array($mataikhoan, $tenmenu));	
		}
		
		function idMenu($mataikhoan)
		{
			$qr="select max(MAMENU) as id
				 from menu
				 where MATAIKHOAN =?";
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
		
		function insertItem($mamenu, $tenitem, $loai, $thongtin_ma, $thongtin)
		{
			$qr = "insert into menu_item values(null, ?, ?, ?, ?, ?)";
			return $this->db->query($qr, array($mamenu, $tenitem, $loai, $thongtin_ma, $thongtin));
		}
		
		function getMenu($mataikhoan, $mamenu)
		{
			$qr = "	select * from menu where MATAIKHOAN = ? and  MAMENU =?";
			return $this->db->query($qr, array($mataikhoan, $mamenu))->result_array();	
		}
		
		function getItems($mamenu)
		{
			$qr = "	select * from menu_item where MAMENU = ?";
			return $this->db->query($qr, array($mamenu))->result_array();	
		}
		
		function updateMenu($mataikhoan, $mamenu, $tenmenu)
		{
			$qr = " UPDATE menu SET tenmenu = ? WHERE mataikhoan =? AND mamenu =?";
			return $this->db->query($qr, array($tenmenu, $mataikhoan, $mamenu));	
		}
		
		function deleteItem($mamenu, $maitem)
		{
			$qr = "delete from menu_item where MAMENU = ? and MAITEM = ?";
			return $this->db->query($qr, array($mamenu, $maitem));	
		}
		
		function deleteMenu($mataikhoan, $mamenu)
		{
			$qr= "delete from menu where MATAIKHOAN = ? and MAMENU =?";
			return $this->db->query($qr, array($mataikhoan, $mamenu));	
		}
		
		function deleteItems($mamenu)
		{
			$qr= "delete from menu_item where MAMENU = ?";
			return $this->db->query($qr, array($mamenu));	
		}
		
		function updateStatus($mataikhoan, $mamenu)
		{
			$qr = "update menu set trangthai = 1 where MATAIKHOAN = ? and MAMENU = ?";
			return $this->db->query($qr, array($mataikhoan, $mamenu));
		}
		
		function updateStatusMenus($mataikhoan)
		{
			$qr = "update menu set trangthai = 0 where MATAIKHOAN = ?";
			return $this->db->query($qr, array($mataikhoan));	
		}
		
	}