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
		
		function updatePassword($mk_cu, $mk_moi, $mk_moi_re, $mataikhoan)
		{
			$sql = "select * from taikhoan where mataikhoan = ? and matkhau = ?";
			if($this->db->query($sql, array($mataikhoan,sha1($mk_cu)))->num_rows() == 0){
				$_SESSION['thongbao'] = "Mật khẩu cũ không đúng!";
			}else{
				if($mk_moi == $mk_moi_re){
					$qr = "	update taikhoan 
							set
							MATKHAU = ?
							where 
							MATAIKHOAN = ?";
					$this->db->query($qr, array(sha1($mk_moi), $mataikhoan));
					//unset($_SESSION['thongbao']);
					$_SESSION['thongbao'] = "Đổi  mật khẩu thành công!";
				}else{
					$_SESSION['thongbao'] = "Mật khẩu mới không trùng lắp!";
				}
			}
			
			
		}
		
		function getSobai($mataikhoan)
		{
			$sql = "select sobai from canhanhoa where mataikhoan=? limit 1";
			$query = $this->db->query($sql,array($mataikhoan));
    		return $query->num_rows()==0 ? 0 : $query->row(0)->sobai;
		}
		
		function updateSobai($mataikhoan,$sobai)
		{
			$sql = "update canhanhoa set sobai=? where mataikhoan=?";
			$this->db->query($sql,array($sobai,$mataikhoan));
    		return $this->db->affected_rows();
		}
	}
		