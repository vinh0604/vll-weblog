<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util {

    public function checkLogin()
    {
    	if(!isset($_SESSION['mataikhoan']))
    	{
    		$CI = & get_instance();
    		$data['error'] = 'Vui lòng đăng nhập để tiếp tục!';
			$CI->load->view('login_view',$data);
			return false;
    	}
		return true;
    }
    public function connect() {
    	$CI = & get_instance();
    	$CI->load->database();
    }
}
