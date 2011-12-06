<?php
	class Tag_model extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
		}
		
		function getTags($mataikhoan)
		{
			$qr = "	select t.MATAG, t.TENTAG, count(b.MATAG) as POST
					from tag t left join tag_baiviet b on  t.MATAG = b.MATAG
					where t.MATAIKHOAN = ?
					group by(t.MATAG)";	
			return $this->db->query($qr, array($mataikhoan))->result_array();
		}
		
		function insertTag($mataikhoan, $tentag, $mota)
		{
			$qr = "	insert into tag values (null, ?, ?, ?)";
			return $this->db->query($qr, array($mataikhoan, $tentag, $mota));	
		}
		
		function editTag($mataikhoan, $matag)
		{
			$qr = "	select MATAG, TENTAG, MOTA
					from tag
					where MATAIKHOAN = ?
					and MATAG = ?";
			return $this->db->query($qr, array($mataikhoan, $matag))->result_array();	
		}
		
		function updateTag($mataikhoan, $matag, $tentag, $mota)
		{
			$qr = "	update tag
					set
						TENTAG = ?,
						MOTA = ?
					where 
						MATAIKHOAN = ?
					and
						MATAG = ?";
			return $this->db->query($qr, array($tentag, $mota, $mataikhoan, $matag));	
		}
		
		function deleteTag($mataikhoan, $matag)
		{
			$qr = "delete from tag_baiviet where matag=?";
			$this->db->query($qr, array($matag));
			$qr = "delete from tag where MATAIKHOAN = ? and MATAG = ?";
			return $this->db->query($qr, array($mataikhoan, $matag));	
		}
	}