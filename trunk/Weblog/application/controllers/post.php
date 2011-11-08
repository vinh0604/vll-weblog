<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

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
		$this->load->model('Post_model');
		$data['chuyenmuc'] = $this->Post_model->getChuyenmuc($mataikhoan);
		$this->load->view('managepost_view',$data);
	}
	
	public function viewPost(){
		$mataikhoan = 1;
		$bai = $_POST['bai'];
		$muc = $_POST['muc'];
		$this->load->model('Post_model');
		
		echo $this->Post_model->getPost($bai, $muc, $mataikhoan);
		//$this->load->view('post_view',$data);
	}
	
	public function addPost()
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
		$this->load->model('Post_model');
		$data['chuyenmuc'] = $this->Post_model->getChuyenmuc($mataikhoan);
		$this->load->view('addpost_view',$data);
		
		if($this->input->post(dang_bai)){
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->addNewPost($mataikhoan,$title,$content,$category,$tag);
		}
		
		if($this->input->post(luu_nhap)){
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->addDraft($mataikhoan,$title,$content,$category,$tag);
		}
	}
	
	public function autoSave()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		$dulieu = $_POST['dulieu'];

		$this->util->connect();
		$this->output->enable_profiler(TRUE);
		$this->load->model('Post_model');
		$this->Post_model->autoSave($dulieu,$mataikhoan);

	}
	
	
	public function addquickPost()
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
		//$this->load->model('Poll_model');
		//$data['polls'] = $this->Poll_model->getBinhchons($mataikhoan);
		$this->load->view('addquickpost_view',$data);
	}
	
	public function editPost()
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
		//$this->load->model('Poll_model');
		//$data['polls'] = $this->Poll_model->getBinhchons($mataikhoan);
		$this->load->view('editpost_view',$data);
	}
	
	
}