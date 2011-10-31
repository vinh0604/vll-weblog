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
			return false;
		}else{
			if($pw == $ve_pw){
				$sql = "insert into taikhoan(tendangnhap, matkhau, email, ngaysinh, hoten, diachi, luotxem) values(?, ?, ?, str_to_date(?,'%d/%m/%YY'), ?, ?, 0)";
				$query = $this->db->query($sql,array($acc, sha1($pw), $ema, $sn, $nam, $add));
				$sql = "select mataikhoan from taikhoan where tendangnhap = ?";
				$query = $this->db->query($sql,array($acc));
				$mataikhoan = $query->row(0)->mataikhoan;
				$sql = "insert into canhanhoa(magiaodien, mataikhoan, avatar, tieude, mota, mauchu, sobai, sodong) values(1, ?, ?, ?, ?, ?, 10, -1)";
				$this->db->query($sql,array($mataikhoan, 'default.png', 'Blog Title', 'Just Another Blog', '6c5c46'));
				$sql = "insert into bangtam(mataikhoan, luunhap, tuade, tuade_trang, noidung_trang) values(?,'','','','')";
				$this->db->query($sql, array($mataikhoan));
				$sql = "insert into chuyenmuc(mataikhoan, tenchuyenmuc, mota) values(?, ?, ?)";
				$this->db->query($sql, array($mataikhoan,'Không có chuyên mục', 'Không có chuyên mục'));
				return true;
			}else{
				$_SESSION['alert'] = "Mật khẩu phải trùng nhau!";
				return false;
			}
		}
    }
	
	function checkUser($acc){
		$this->load->database();
		$sql = "select * from taikhoan where tendangnhap = ?";
		$query = $this->db->query($sql,array($acc));
		if($query->num_rows()>0){
			$thongbao = "<span style='color:red'><img src='".base_url()."images/cross_x.png'>&nbsp;Tài khoản đã có người sử dụng</span>";
		}else{
			$thongbao = "<span style='color:green'><img src='".base_url()."images/check.png'>&nbsp;Bạn có thể dùng tài khoản này<span>";
		}
		return $thongbao;
	}
	
}
?>