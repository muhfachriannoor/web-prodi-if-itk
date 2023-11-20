<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Laboratorium',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Laboratorium',
					'laboratorium' => $this->db->get('sm_laboratorium'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/laboratorium');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}
