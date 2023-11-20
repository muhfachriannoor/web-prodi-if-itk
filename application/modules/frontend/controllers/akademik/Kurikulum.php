<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Kurikulum',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kurikulum',
					'kurikulum' => $this->db->get('sm_kurikulum'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/kurikulum');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}
