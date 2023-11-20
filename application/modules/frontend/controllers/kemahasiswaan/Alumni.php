<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->library('pagination');
    }

	public function index()
	{
        $filter = $this->input->get('filter');
        
        if($filter == ''):
            $limit  = 3;
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $start  = $page;
            $offset = $limit * ($start - 1);

            $total_rows = $this->db->where('status',1)->from('sm_alumni')->count_all_results();
            $query      = $this->db->where('status',1)->order_by('nim_alumni','DESC')->get('sm_alumni', $limit, $offset);
            $suffix     = '';
            $angkatan   = $this->db->where('status',1)->from('sm_alumni')->count_all_results();
            $uri_segment = 3;
        else:
            $limit  = 3;
            $page   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $start  = $page;
            $offset = $limit * ($start - 1);

            $total_rows = $this->db->where('status',1)->where('tahunmasuk_alumni',$this->input->get('filter'))->from('sm_alumni')->count_all_results();
            $query      = $this->db->where('status',1)->where('tahunmasuk_alumni',$filter)->order_by('nim_alumni','DESC')->get('sm_alumni', $limit, $offset);
            $suffix     = '?' . http_build_query($_GET, '?', "&");
            $angkatan   = $this->db->where('status',1)->where('tahunmasuk_alumni',$filter)->from('sm_alumni')->count_all_results();
            $uri_segment = 3;
        endif;

        $config['base_url'] = site_url('kemahasiswaan/alumni/');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 3;
        $config['uri_segment'] = $uri_segment;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['use_page_numbers'] = TRUE;
        $config['suffix'] = $suffix;
 
        $config['first_url']        = $config['base_url'].$config['suffix'];
        $config['next_link']        = 'Next Page';
        $config['prev_link']        = 'Previous';
        $config['full_tag_open']    = '<nav class="pagination" role="navigation" aria-label="pagination"><ul class="pagination-list">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="pagination-link">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li><a class="pagination-link is-current" aria-current="page">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="pagination-link"><span>';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="pagination-link">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="pagination-link"><span>';
        $config['first_tagl_close'] = '</span></li>';
        $this->pagination->initialize($config);

        $data = array(
                    'title' => 'Alumni',
                    'menunya' => 'Kemahasiswaan',
                    'sub_menunya' => 'Alumni',
                    'jumlah_alumni' => $this->db->where('status',1)->from('sm_alumni')->count_all_results(),
                    'jumlah_angkatan' => $angkatan,
                    'tahun_masuk' => $this->db->group_by('tahunmasuk_alumni')->get('sm_alumni'),
                    'alumni' => $query,
                    'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
                    'pagination' => $this->pagination->create_links(),
                );
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/alumni');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}

	public function filter()
	{
		$filter = $this->input->get('filter');
		$page 	= ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        $start	= $page;
        $limit 	= 3;
        $offset = $limit * ($start - 1);

		if($filter == ''):
			$total_rows = $this->db->where('status',1)->from('sm_alumni')->count_all_results();
        	$query 		= $this->db->where('status',1)->order_by('nim_alumni','DESC')->get('sm_alumni', $limit, $offset);
        	$suffix 	= '';
        	$angkatan 	= $this->db->where('status',1)->from('sm_alumni')->count_all_results();
        else:
        	$total_rows = $this->db->where('status',1)->where('tahunmasuk_alumni',$this->input->get('filter'))->from('sm_alumni')->count_all_results();
        	$query 		= $this->db->where('status',1)->where('tahunmasuk_alumni',$filter)->order_by('nim_alumni','DESC')->get('sm_alumni', $limit, $offset);
        	$suffix 	= '?' . http_build_query($_GET, '?', "&");
        	$angkatan 	= $this->db->where('status',1)->where('tahunmasuk_alumni',$filter)->from('sm_alumni')->count_all_results();
        endif;

		$config['base_url'] = site_url('kemahasiswaan/alumni/');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 3;
        $config['uri_segment'] = 5;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['use_page_numbers'] = TRUE;
        $config['suffix'] = $suffix;
 
      	$config['first_url'] 		= $config['base_url'].$config['suffix'];
        $config['next_link']        = 'Next Page';
        $config['prev_link']        = 'Previous';
        $config['full_tag_open']    = '<nav class="pagination" role="navigation" aria-label="pagination"><ul class="pagination-list">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="pagination-link">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li><a class="pagination-link is-current" aria-current="page">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="pagination-link"><span>';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="pagination-link">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="pagination-link"><span>';
        $config['first_tagl_close'] = '</span></li>';
        $this->pagination->initialize($config);

		$data = array(
					'title' => 'Alumni',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'jumlah_alumni' => $this->db->where('status',1)->from('sm_alumni')->count_all_results(),
					'jumlah_angkatan' => $angkatan,
					'tahun_masuk' => $this->db->group_by('tahunmasuk_alumni')->get('sm_alumni'),
					'alumni' => $query,
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
					'pagination' => $this->pagination->create_links(),
				);
		$this->load->view('kemahasiswaan/alumni-data',$data);
	}
}
