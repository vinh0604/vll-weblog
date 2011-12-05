<?php
	class Statis_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function getCountPost($mataikhoan)
		{
			$qr = "	SELECT COUNT( MABAIVIET ) AS TONGSOBAI
					FROM baiviet
					WHERE MATAIKHOAN =?
					AND TRANGTHAI = 1";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSOBAI'];
			endforeach;	
			
		}
		
		function getCountPage($mataikhoan)
		{
			$qr = "	SELECT COUNT( MATRANG ) AS TONGSOTRANG
					FROM trang
					WHERE MATAIKHOAN =?";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSOTRANG'];
			endforeach;	
			
		}
		
		function getCountCategory($mataikhoan)
		{
			$qr = "	SELECT COUNT( MACHUYENMUC ) AS TONGSOCHUYENMUC
					FROM chuyenmuc
					WHERE MATAIKHOAN =?";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSOCHUYENMUC'];
			endforeach;	
			
		}
		
		function getCountTag($mataikhoan)
		{
			$qr = "	SELECT COUNT( MATAG ) AS TONGSOTHE
					FROM tag
					WHERE MATAIKHOAN =?";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSOTHE'];
			endforeach;	
			
		}
		
		function getCountComment($mataikhoan)
		{
			$qr = "	SELECT COUNT( MABINHLUAN ) as TONGSOBL
					FROM binhluan, baiviet
					WHERE binhluan.MABAIVIET = baiviet.MABAIVIET
					AND MATAIKHOAN =?";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSOBL'];
			endforeach;		
		}
		
		function getCountDraft($mataikhoan)
		{
			$qr = "	SELECT COUNT( MABAIVIET ) AS TONGSONHAP
					FROM baiviet
					WHERE MATAIKHOAN =?
					AND TRANGTHAI = 0";
			foreach ($this->db->query($qr, array($mataikhoan))->result_array() as $kq):
				return	$kq['TONGSONHAP'];
			endforeach;		
		}
		
		function getListCategory($mataikhoan)
		{
			$qr = "	Select * from chuyenmuc where MATAIKHOAN = ?";
			return $this->db->query($qr, array($mataikhoan))->result_array();	
		}
		
		function insertPost($mataikhoan, $tieude, $chuyenmuc, $noidung)
		{
			$qr = "insert into baiviet values(null, ?, ?, ?, ?, current_date, 1, 0, 0)";	
			return $this->db->query($qr, array($mataikhoan, $chuyenmuc, $tieude, $noidung));
		}
		
		function insertPostDraft($mataikhoan, $tieude, $chuyenmuc, $noidung)
		{
			$qr = "insert into baiviet values(null, ?, ?, ?, ?, current_date, 2, 0, 0)";	
			return $this->db->query($qr, array($mataikhoan, $chuyenmuc, $tieude, $noidung));
		}
		
		function getListPostDraft($mataikhoan)
		{
			$qr = '	SELECT mabaiviet, tuade, CONCAT( CONCAT( CONCAT( CONCAT( CONCAT(  "Ngày",  " ", DAY( ngaydang ) ) ,  " ",  "Tháng" ) ,  " ", MONTH( ngaydang ) ) ,  " ",  "Năm" ) ,  " ", YEAR( ngaydang ) ) AS ngay, noidung
					FROM baiviet
					WHERE mataikhoan =? and trangthai = 2
					ORDER BY ngaydang DESC 
					LIMIT 0 , 5 ';	
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
		
		function getListComment($mataikhoan)
		{
			$qr = "	SELECT b.mabaiviet, b.tuade, l.hoten, l.noidung, day(l.ngaydang) as ngay, month(l.ngaydang) as thang, year(l.ngaydang) as nam
					FROM baiviet b, binhluan l
					WHERE b.mabaiviet = l.mabaiviet
					and MATAIKHOAN = ?
					ORDER BY l.ngaydang DESC 
					LIMIT 0 , 10";	
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
	}