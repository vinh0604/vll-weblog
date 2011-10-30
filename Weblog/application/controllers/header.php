<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends CI_Controller {

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
		$this->load->model('Header_model');
		$persona = $this->Header_model->getCanhanhoa($mataikhoan);
		$data = array_merge($data,$persona);
		$this->load->view('header_view',$data);
	}
	
	public function removeimage()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$this->util->connect();
		$this->load->model('Header_model');
		if($this->Header_model->deleteNenheader($mataikhoan)==false)
		{
			show_error('Rất tiếc! Có lỗi đã xảy ra!');
		}
		else 
		{
			redirect(base_url('index.php/header'));
		}
	}
	
	public function upload()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$config['upload_path'] = './images/temporary';
		$config['allowed_types'] = 'gif|jpg|png|jpge';
		$config['max_size']	= '1024';
		$config['overwrite']  = TRUE;
		$config['file_name'] = 'nenheader'.$mataikhoan;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('imagefile'))
		{
			show_error($this->upload->display_errors());
		}
		else
		{
			$data = $this->upload->data();
			$this->util->connect();
			$this->load->model('Header_model');
			if($this->Header_model->updateNenheadertam($mataikhoan,$data['file_name'])==false)
			{
				show_error('Rất tiếc! Có lỗi xảy ra!');
				return;
			}
			$data['bar'] = $this->load->view('bar_view',null,true);
			$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
			
			$this->load->view('headercrop_view',$data);
		}
	}
	
	public function submit()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$persona['tieude'] = $this->input->post('tieude');
		$persona['mota'] = $this->input->post('mota');
		if($this->input->post('mauchu'))
		{
			$persona['mauchu'] = $this->input->post('mauchu');
		}
		else {
			$persona['mauchu']='000000';
		}
		$this->util->connect();
		$this->load->model('Header_model');
		if($this->Header_model->updateCanhanhoa($mataikhoan,$persona)==false)
		{
			show_error('Rất tiếc! Có lỗi đã xảy ra!');
		}
		else 
		{
			redirect(base_url('index.php/header'));
		}
	}
	
	public function crop()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$this->util->connect();
		$this->load->model('Header_model');
		$nenheader = $this->Header_model->getNenheadertam($mataikhoan);
		$config['image_library'] = 'gd2';
        $config['source_image'] = './images/temporary/'.$nenheader;
        $config['new_image'] = './images/header';
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'width';
		$config['width'] = 980;
		$config['height'] = 980;
		$this->load->library('image_lib', $config); 
		if (!$this->image_lib->resize())
		{
	    	show_error($this->image_lib->display_errors());
	    	return;
		}
		
		$this->image_lib->clear();
		$config['image_library'] = 'gd2';
        $config['source_image'] = './images/header/'.$nenheader;
        $config['new_image'] = './images/header';
        $config['maintain_ratio'] = FALSE;
        $config['x_axis'] = $this->input->post('x1');
        $config['y_axis'] = $this->input->post('y1');
        $config['width'] = intval($this->input->post('x2')) - intval($this->input->post('x1'));
        $config['height'] = intval($this->input->post('y2')) - intval($this->input->post('y1'));
        $this->image_lib->initialize($config);
		if (!$this->image_lib->crop())
		{
	    	show_error($this->image_lib->display_errors());
	    	return;
		}
		if($this->Header_model->updateNenheader($mataikhoan,$nenheader)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
			return;
		}
		redirect(base_url('index.php/header'));
	}
}