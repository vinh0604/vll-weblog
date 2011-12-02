<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

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
	private $user = '';
	public function _remap($user,$params=array())
	{
		$this->load->library('session');
		$this->load->library('util');
		$this->util->connect();
		$this->load->model('Blog_model');
		$mataikhoan = $this->Blog_model->getMataikhoan($user);
		
		if($mataikhoan==0)
		{
			show_404();
			return;
		}
		$this->user = $user;
		if($this->session->userdata('visit')==false)
		{
			$this->Blog_model->updateLuotxem($mataikhoan);
			$data = array('visit'=>true,'postread'=>array());
			$this->session->set_userdata($data);
		}
		if(count($params)==0)
		{
			$this->page($mataikhoan,0);
			return;
		}
		if(count($params)==1)
		{
			switch ($params[0]) {
				case 'search':
					$this->search($mataikhoan);
					break;
				case 'page':
					$this->page($mataikhoan,0);
					break;
				case 'vote':
					$this->vote($mataikhoan);
					break;
				case 'comment':
					$this->comment($mataikhoan);
					break;
				case 'like':
					$this->like($mataikhoan);
					break;	
				default:
					show_404();
			}
			return;
		}
		switch ($params[0]) {
			case 'post':
				$this->post($mataikhoan,$params[1]);
				break;
			case 'page':
				$this->page($mataikhoan,intval($params[1]));
				break;
			case 'view':
				$this->view($mataikhoan,$params[1]);
				break;
			case 'category':
				$this->category($mataikhoan,$params[1]);
				break;
			default:
				show_404();
		}
	}
	
	public function page($mataikhoan, $page)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$sodong = intval($persona['sodong']);
		$sobai = intval($persona['sobai']);	
		$tongsobai = $this->Blog_model->getTongsobai($magiaodien);
		if($page > 0) 
		{
			$data['nextpost'] = $page - 1;
		}
		if((($page+1) * $sobai)<$tongsobai)
		{
			$data['prevpost'] = $page + 1;
		}
		$data['posts'] = $this->Blog_model->getBaiviets($mataikhoan,$sobai*$page,$sobai);
		$this->load->view($giaodien.'/blog_view',$data);
	}
	
	public function post($mataikhoan, $mabaiviet)
	{
		
	}
	public function view($mataikhoan, $matrang)
	{
		
	}
	public function category($mataikhoan, $machuyenmuc)
	{
		
	}
	public function search($mataikhoan)
	{
		
	}
	public function vote($mataikhoan)
	{
		
	}
	public function comment($mataikhoan)
	{
		
	}
	public function like($mataikhoan)
	{
		
	}
	private function loadcomponent($mataikhoan)
	{
		$data = array();
		$data['blogname'] = $this->user;
		$data['links'] = $this->Blog_model->getLienKet($mataikhoan);
		$data['menu'] = $this->Blog_model->getMenu($mataikhoan);
		$data['persona'] = $this->Blog_model->getCanhanhoa($mataikhoan);
		$data['categories'] = $this->Blog_model->getChuyenmuc($mataikhoan);
		$data['tags'] = $this->Blog_model->getThe($mataikhoan);
		$data['luotxem'] = $this->Blog_model->getLuotxem($mataikhoan);
		$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url('index.php/calendar/show/'.$mataikhoan)
             );
		$prefs['template'] = '

   				{table_open}<table id="wp-calendar">{/table_open}

   				{heading_row_start}<tr>{/heading_row_start}

   				{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			   	{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			   	{heading_row_end}</tr>{/heading_row_end}
			
			   	{week_row_start}<tr>{/week_row_start}
			   	{week_day_cell}<td scope="col">{week_day}</td>{/week_day_cell}
			   	{week_row_end}</tr>{/week_row_end}
			
			   	{cal_row_start}<tr>{/cal_row_start}
			   	{cal_cell_start}{/cal_cell_start}
			
			   	{cal_cell_content}<td><a href="{content}">{day}</a></td>{/cal_cell_content}
			   	{cal_cell_content_today}<td id="today"><a href="{content}">{day}</a></td>{/cal_cell_content_today}
			
			   	{cal_cell_no_content}<td>{day}</td>{/cal_cell_no_content}
			   	{cal_cell_no_content_today}<td id="today">{day}</td>{/cal_cell_no_content_today}
			
			   	{cal_cell_blank}<td class="pad">&nbsp;</td>{/cal_cell_blank}
			
			   	{cal_cell_end}{/cal_cell_end}
			   	{cal_row_end}</tr>{/cal_row_end}
			
			   	{table_close}</table>{/table_close}
			';
		$this->load->library('calendar', $prefs);
		$todate = getdate();
		$postdata = $this->Blog_model->getBaivietByDay($mataikhoan,$todate);
		$data['calendar'] = $this->calendar->generate($todate['year'],$todate['mon'],$postdata);
		return $data;
	}
}