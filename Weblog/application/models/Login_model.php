<?php
class Login_model extends CI_Model {

    function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }
    function verifyUser($u,$pw){
        $this->load->database();
        
		$sql = "select t.mataikhoan, t.tendangnhap, c.tieude from taikhoan t, canhanhoa c where t.mataikhoan = c.mataikhoan and t.tendangnhap=? and t.matkhau=?";
		$query = $this->db->query($sql,array($u,$pw));
		if($query->num_rows()>0){
			$row = $query->row_array();
			$_SESSION['mataikhoan'] = $row['mataikhoan'];
			$_SESSION['tendangnhap'] = $row['tendangnhap'];
			$_SESSION['tieude'] = $row['tieude'];
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
	
	function addCategory($u){
		$this->load->database();
        $sql = "insert into chuyenmuc(mataikhoan, tenchuyenmuc, mota) values(?, 'Không có chuyên mục', 'Không có chuyên mục')";
        $query = $this->db->query($sql,array($u));
	}
	
}
?>