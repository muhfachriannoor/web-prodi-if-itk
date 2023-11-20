<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silabus extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$data = array(
					'title' => 'Silabus',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Silabus',
					'silabus' => $this->db->get('sm_silabus')->row(),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/silabus');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}
