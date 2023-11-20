<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender_akademik extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$data = array(
					'title' => 'Kalender Akademik',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'kalender_akademik_file' => $this->db->get('sm_kalenderakademik_file')->row(),
					'kalender_akademik' => $this->db->get('sm_kalenderakademik'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/kalender_akademik');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}
