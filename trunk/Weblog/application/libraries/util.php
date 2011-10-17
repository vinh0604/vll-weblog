<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util {

    public function checkLogin()
    {
		// $CI = & get_instance();
		// $CI->load->view('welcome_message');
		return true;
    }
    public function connect() {
    	$CI = & get_instance();
    	$CI->load->database();
    }
}
