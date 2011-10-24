<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->util->connect();
		$this->load->model('Comment_model');
		//$data['chuyenmucs'] = $this->Comment_model->getChuyenmuc($mataikhoan);
		
		$data['binhluan'] = $this->Comment_model->getBinhluan();
		$this->load->view('comment_view',$data);
		
	}
	
	public function getOneComment($mabl){
		$this->load->model('Comment_model');
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
	
		$data['binhluan_1'] = $this->Comment_model->get1Binhluan($mabl);

		$this->load->view('view_comment_view',$data);
	}
	
	public function deleteComment($mabl){
		$this->load->model('Comment_model');
			
		$this->Comment_model->deleteBinhluan($mabl);
		redirect(base_url()."index.php/comment");
	}
}