<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_mahasiswa extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
        $this->load->library('pagination');
    }

	public function index()
	{
		$config['base_url'] = site_url('kemahasiswaan/prestasi_mahasiswa/');
        $config['total_rows'] = $this->db->count_all('sm_prestasi');
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['use_page_numbers'] = TRUE;

        if($this->input->get('filter') == '') {
        	$suffix = '';
        }else{
        	$suffix = '?' . http_build_query($_GET, '?', "&");
        }
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

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
 
        $start = $data['page'];
        $limit = 4;
        $offset = $limit * ($start - 1);

        $filter = $this->input->get('filter');
        if($filter == ''):
        	$query = $this->db->order_by('idPrestasi','DESC')->get('sm_prestasi', $limit, $offset);
        else:
        	$query = $this->db->order_by('idPrestasi', $filter)->get('sm_prestasi', $limit, $offset);
        endif;

		$data = array(
					'title' => 'Prestasi Mahasiswa',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'prestasi' => $query,
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
					'pagination' => $this->pagination->create_links(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/prestasi_mahasiswa');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}

	public function filter()
	{
		$config['base_url'] = site_url('kemahasiswaan/prestasi_mahasiswa/');
        $config['total_rows'] = $this->db->count_all('sm_prestasi');
        $config['per_page'] = 4;
        $config['uri_segment'] = 5;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['use_page_numbers'] = TRUE;

        if($this->input->get('filter') == '') {
        	$suffix = '';
        }else{
        	$suffix = '?' . http_build_query($_GET, '?', "&");
        }
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

        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
 
        $start = $data['page'];
        $limit = 4;
        $offset = $limit * ($start - 1);

        $filter = $this->input->get('filter');
        if($filter == ''):
        	$query = $this->db->order_by('idPrestasi','DESC')->get('sm_prestasi', $limit, $offset);
        else:
        	$query = $this->db->order_by('idPrestasi', $filter)->get('sm_prestasi', $limit, $offset);
        endif;

		$data = array(
					'title' => 'Prestasi Mahasiswa',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'prestasi' => $query,
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
					'pagination' => $this->pagination->create_links(),
				);
		$this->load->view('kemahasiswaan/prestasi-data',$data);
	}

	public function detail($slug)
	{
		$data = array(
					'title' => 'Prestasi Mahasiswa',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
					'datanya' => $this->db->get_where('sm_prestasi',array('slug_prestasi' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/detail_prestasi');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}
