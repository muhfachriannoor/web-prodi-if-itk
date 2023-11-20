<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_lulusan extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Profile Lulusan',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
					'profile_lulusan' => $this->db->get('sm_profillulusan'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/profile_lulusan');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}
