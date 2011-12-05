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
			$data = array('visit'=>true,'postread'=>array(),'postlike'=>array());
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
					$this->comment($mataikhoan,$user);
					break;
				case 'like':
					$this->like($mataikhoan);
					break;	
				default:
					show_404();
			}
			return;
		}
		if(count($params)==4 && $params[0]=='calendar')
		{
			$this->calendar($mataikhoan,$params[1],$params[2],$params[3]);
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
			case 'preview':
				$this->preview($mataikhoan,$params[1]);
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
		$tongsobai = $this->Blog_model->getTongsobai($mataikhoan);
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
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$data['post'] = $this->Blog_model->getBaiviet($mataikhoan,$mabaiviet);
		if($data['post']==null)
		{
			show_404();
			return;
		}
		$postread = $this->session->userdata('postread');
		if(!in_array($mabaiviet, $postread))
		{
			$this->Blog_model->updateLuotxemBaiviet($mabaiviet);
			$postread[] = $mabaiviet;
			$this->session->set_userdata('postread',$postread);
		}
		$postlike = $this->session->userdata('postlike');
		if(in_array($mabaiviet, $postlike))
		{
			$data['liked'] = true;
		}
		$date = $this->Blog_model->getNgaydang($mabaiviet);
		$data['posttags'] = $this->Blog_model->getTagByBaiviet($mabaiviet);
		$data['comments'] = $this->Blog_model->getBinhluanByBaiviet($mabaiviet);
		$data['comment'] = $this->load->view('themes/postcomment_view',$data,true);
		$data['prevpost'] = $this->Blog_model->getBaitruoc($mataikhoan,$date);
		$data['nextpost'] = $this->Blog_model->getBaisau($mataikhoan,$date);
		$this->load->view($giaodien.'/blogpost_view',$data);
	}
	public function view($mataikhoan, $matrang)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$data['page'] = $this->Blog_model->getTrang($mataikhoan,$matrang);
		if(!$data['page'])
		{
			show_404();
			return;
		}
		$this->load->view($giaodien.'/page_view',$data);
	}
	public function category($mataikhoan, $machuyenmuc)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$data['posts'] = $this->Blog_model->getBaivietsByCat($mataikhoan,$machuyenmuc);
		$this->load->view($giaodien.'/category_view',$data);
	}
	public function calendar($mataikhoan,$year,$month,$day)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$data['posts'] = $this->Blog_model->getBaivietsByDate($mataikhoan,$year,$month,$day);
		$this->load->view($giaodien.'/category_view',$data);
	}
	public function search($mataikhoan)
	{
		$tag = $this->input->get('tag');
		$keyword = $this->input->get('keyword');
		$keywords = preg_split('/ +/', $keyword);
		if ($tag) 
		{
			$data = $this->loadcomponent($mataikhoan);
			$persona = $data['persona'];
			$magiaodien = $persona['magiaodien'];
			$giaodien = 'themes/'.$magiaodien;
			$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
			$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
			$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
			$data['posts'] = $this->Blog_model->getBaivietsByTag($mataikhoan,$tag);
			$this->load->view($giaodien.'/category_view',$data);
			return;
		}
		if ($keyword)
		{
			$page = $this->input->get('page');
			if($page==''||intval($page)<0) 
			{
				$numpage=0; 
			}
			else 
			{
				$numpage=intval($page);
			}
			$data = $this->loadcomponent($mataikhoan);
			$persona = $data['persona'];
			$magiaodien = $persona['magiaodien'];
			$giaodien = 'themes/'.$magiaodien;
			$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
			$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
			$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
			$data['keyword'] = $keyword;
			$data['keywords'] = $keywords;
			$keyword='+'.$keyword;
			$keyword = preg_replace('/ +/', ' +', $keyword);
			$data['num_result'] = $this->Blog_model->getSoketqua($mataikhoan,$keyword);
			$data['posts'] = $this->Blog_model->getKetqua($mataikhoan,$keyword,$numpage*10);
			if ((($numpage+1)*10)<$data['num_result'])
			{
				$data['prevpage'] = $numpage+1;
			}
			if($numpage>0)
			{
				$data['nextpage'] = $numpage-1;
			}
			$this->load->view($giaodien.'/search_view',$data);
		}
	}
	public function vote($mataikhoan)
	{
		$mabinhchon = $this->input->post('mabinhchon');
		$madapan = $this->input->post('madapan');
		if($this->Blog_model->updateDapan($mataikhoan,$mabinhchon,$madapan))
		{
			$this->session->set_userdata('vote',$mabinhchon);
			$data['answers'] = $this->Blog_model->getDapan($mabinhchon);
			$data['chosen'] = $madapan;
			echo $this->load->view('themes/vote_view',$data);
		}
	}
	public function comment($mataikhoan,$user)
	{
		$mabaiviet = $this->input->post('mabaiviet');
		$content = $this->input->post('editor1');
		$author = $this->input->post('author');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		if ($this->Blog_model->insertBinhluan($mataikhoan,$mabaiviet,$content,$author,$email,$website))
		{
			redirect(base_url('index.php/blog/'.$user.'/post/'.$mabaiviet.'#comment'));
		}
		else 
		{
			show_error('Rất tiếc! Có lỗi đã xảy ra.');
		}
	}
	public function like($mataikhoan)
	{
		$mabaiviet = $this->input->post('mabaiviet');
		if($this->Blog_model->updateLuotthichBaiviet($mataikhoan,$mabaiviet))
		{
			$postlike = $this->session->userdata('postlike');
			$postlike[] = $mabaiviet;
			$this->session->set_userdata('postlike',$postlike);
			$luotthich = $this->Blog_model->getLuotthich($mabaiviet);
			echo "<strong>$luotthich người thích bài viết này!</strong>";
		}
	}
	public function preview($mataikhoan, $magiaodien)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$sodong = intval($persona['sodong']);
		$sobai = intval($persona['sobai']);	
		$tongsobai = $this->Blog_model->getTongsobai($mataikhoan);
		if($sobai<$tongsobai)
		{
			$data['prevpost'] = 1;
		}
		$data['posts'] = $this->Blog_model->getBaiviets($mataikhoan,0,$sobai);
		$this->load->view($giaodien.'/blog_view',$data);
	}
	public function previewpost($mataikhoan)
	{
		$data = $this->loadcomponent($mataikhoan);
		$persona = $data['persona'];
		$magiaodien = $persona['magiaodien'];
		$giaodien = 'themes/'.$magiaodien;
		$data['header'] = $this->load->view($giaodien.'/blogheader_view',$data,true);
		$data['footer'] = $this->load->view($giaodien.'/blogfooter_view',$data,true);
		$data['sidebar'] = $this->load->view($giaodien.'/blogsidebar_view',$data,true);
		$todate = getdate();
		$post['ngaydang'] = $todate['year'].'-'.$todate['mon'].'-'.$todate['day'];
		$post['tuade'] = $this->input->post('title');
		$post['noidung'] = $this->input->post('content');
		$post['machuyenmuc'] = $this->input->post('cat_id');
		$post['tenchuyenmuc'] = $this->input->post('cat_name');		
		$data['post'] = $post;
		$data['posttags'] = $this->input->post('tags');
		$data['comment'] = $this->load->view('themes/postcomment_view',$data,true);
		$this->load->view($giaodien.'/blogpost_view',$data);
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
		$data['poll'] = $this->Blog_model->getBinhchon($mataikhoan);
		if($data['poll']) 
		{
			$data['answers'] = $this->Blog_model->getDapan($data['poll']['mabinhchon']);
		}
		$data['luotxem'] = $this->Blog_model->getLuotxem($mataikhoan);
		$data['vote'] = $this->session->userdata('vote');
		$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url('index.php/calendar/show/'.$mataikhoan)
             );
		$prefs['template'] = '

   				{table_open}<table id="wp-calendar">{/table_open}

   				{heading_row_start}<tr>{/heading_row_start}

   				{heading_previous_cell}<th><a id="prevmon" href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			   	{heading_next_cell}<th><a id="nextmon" href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
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