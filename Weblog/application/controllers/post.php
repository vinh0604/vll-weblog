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
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
				
		$this->util->connect();
		$this->load->model('Post_model');
		//$data['chuyenmuc'] = $this->Post_model->getChuyenmuc($mataikhoan);

		$data['baiviet'] = $this->Post_model->getPost($mataikhoan);
		$data['tag'] = $this->Post_model->getPostByTag($mataikhoan);
		$this->load->view('managepost_view',$data);
		
	}
	
	public function post_ajax()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);

		$bai = $_POST['bai'];
		
		$this->util->connect();
		$this->load->model('Post_model');
		$data['baiviet'] = $this->Post_model->getPost_ajax($mataikhoan,$bai);
		$data['tag'] = $this->Post_model->getPostByTag_ajax($mataikhoan,$bai);
		
		$this->load->view("post_ajax",$data);
	}
		
	public function addPost()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->util->connect();
		$this->load->model('Post_model');
		$data['chuyenmuc'] = $this->Post_model->getChuyenmuc($mataikhoan);
		$data['bv_tam'] = $this->Post_model->getBaiTam($mataikhoan);
		$this->load->view('addpost_view',$data);
		
		if($this->input->post(dang_bai) && $this->input->post(editor1)!=""){
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->addNewPost($mataikhoan,$title,$content,$category,$tag);
			redirect(base_url()."index.php/post");
		}
		
		if($this->input->post(luu_nhap) && $this->input->post(editor1)!=""){
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->addDraft($mataikhoan,$title,$content,$category,$tag);
			redirect(base_url()."index.php/post");
		}
		
	}
	
	public function deletePost($mabv){
		$this->load->model('Post_model');
			
		if($this->Post_model->deleteBaiviet($mabv) == false){
			show_error("Rất tiếc! Có lỗi đã xảy ra!");
		}else{
			redirect(base_url()."index.php/post");
		}
	}
	
	public function autoSave()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];

		$this->util->connect();
		//$dulieu = $_POST['dulieu'];
		//$this->output->enable_profiler(TRUE);
		//$this->load->model('Post_model');
		//echo $this->Post_model->autoSave($dulieu,$mataikhoan);
		if($this->input->post('data')){
			$title = $this->input->post('title');
			$content = $this->input->post('data');
			$this->load->model('Post_model');
			$this->Post_model->autoSave($title,$content,$mataikhoan);
		}

	}
	
	
	public function addquickPost()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->util->connect();
		$this->load->view('addquickpost_view',$data);
	}
	
	public function editPost($bai_sua)
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->util->connect();
		$this->load->model('Post_model');
		$data['chuyenmuc'] = $this->Post_model->getChuyenmuc($mataikhoan);
		$data['chuyenmuc_bv'] = $this->Post_model->getOneChuyenmuc($bai_sua);
		$data['baiviet'] = $this->Post_model->getOnePost($mataikhoan,$bai_sua);
		$data['tag'] = $this->Post_model->getOnePostByTag($mataikhoan,$bai_sua);
		$this->load->view('editpost_view',$data);
		
		
	}
	
	public function doEdit($bai_sua){
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		$this->util->connect();
		$this->load->model('Post_model');
		
		if($this->input->post(sua_bai) && $this->input->post(editor1)!=""){
			
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->editPost($mataikhoan,$bai_sua,$title,$content,$category,$tag);
			redirect(base_url()."index.php/post");
		}
		
		if($this->input->post(luu_nhap) && $this->input->post(editor1)!=""){
			$title = $this->input->post(title);
			$content = $this->input->post(editor1);
			$category = $this->input->post(category);
			$tag = $this->input->post(tag);
			
			$this->Post_model->toDraft($mataikhoan,$bai_sua,$title,$content,$category,$tag);
			redirect(base_url()."index.php/post");
		}
	}
}
