<?php
class Signup_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    function addAccount($acc, $pw, $ve_pw, $ema, $add, $pho, $nam, $sn){
        $this->load->database();
		
        $sql = "select * from taikhoan where tendangnhap = ?";
        $query = $this->db->query($sql,array($acc));
		if($query->num_rows()>0){
			$_SESSION['alert'] = 'Xin lỗi, đã có người sử dụng tài khoản này!';
		}else{
			if($pw == $ve_pw){
				$sql = "insert into taikhoan(tendangnhap, matkhau, email, ngaysinh, hoten, diachi, luotxem) values(?, ?, ?, ?, ?, ?, 0)";
				$query = $this->db->query($sql,array($acc, sha1($pw), $ema, date($sn), $nam, $add));
				if($this->db->affected_rows() == 1){
					$sql = "insert into canhanhoa(magiaodien, mataikhoan, avatar, tieude, mauchu, sobai, sodong) values(1, (select mataikhoan from taikhoan where tendangnhap = $acc), ?, ?, ?, 0, 0)";
					$this->db->query($sql,array('default.png', 'Blog Title', '6c5c46'));
					$sql = "insert into bangtam(mataikhoan) values(select mataikhoan from taikhoan where tendangnhap = $acc)";
					$this->db->query($sql);
					$sql = "insert into chuyenmuc(mataikhoan, tenchuyenmuc, mota) values((select mataikhoan from taikhoan where tendangnhap = $acc), ?, ?)";
					$this->db->query($sql, array('Không có chuyên mục', 'Không có chuyên mục');
				}
			}else{
				$_SESSION['alert'] = "Mật khẩu phải trùng nhau!";
			}
		}
    }
	
	function checkUser($acc){
		//$this->load->database();
		$sql = "select * from taikhoan where tendangnhap = ?";
        $query = $this->db->query($sql,array($acc));
		if($query->num_rows()>0){
			$thongbao = "Tài khoản đã có người sử dụng";
		}else{
			$thongbao = "Bạn có thể dùng tài khoản này";
		}
		return $thongbao;
	}
	
}
?>