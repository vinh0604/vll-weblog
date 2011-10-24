<?php
class Login_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    function verifyUser($u,$pw){
        $this->load->database();
        $sql = "select currentsid from taikhoan where tendangnhap=? and matkhau=? and currentsid is not NULL";
        $query = $this->db->query($sql,array($u,$pw));
		if($query->num_rows()>0){
			$_SESSION['error'] = 'Xin lỗi, có người đang sử dụng tài khoản của bạn!';
		}else{
			$sql = "select mataikhoan, tendangnhap from taikhoan where tendangnhap=? and matkhau=? and currentsid is NULL";
			$query = $this->db->query($sql,array($u,$pw));
			if($query->num_rows()>0){
				$row = $query->row_array();
				$_SESSION['mataikhoan'] = $row['mataikhoan'];
				$_SESSION['tendangnhap'] = $row['tendangnhap'];
				$sql = "update taikhoan set currentsid = ? where mataikhoan = ?";
				$query = $this->db->query($sql,array(session_id(),$row['mataikhoan']));
				$sql_1 = "select tieude from canhanhoa where mataikhoan=?";
				$query_1 = $this->db->query($sql_1,array($row['mataikhoan']));
				$row_1 = $query_1->row_array();
				$_SESSION['blogtitle'] = $row_1['tieude'];
			}else{
				$_SESSION['error'] = 'Xin lỗi, bạn đã nhập sai user hoặc password!';
			}
		}
    }
	
}
?>