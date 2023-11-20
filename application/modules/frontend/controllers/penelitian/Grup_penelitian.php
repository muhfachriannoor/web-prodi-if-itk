<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup_penelitian extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Grup Penelitian',
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Grup Penelitian',
					'grup_penelitian' => $this->db->get('sm_gruppenelitian'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Penelitian & Pengabdian'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('penelitian/grup_penelitian');
		$this->load->view('partial/footer_datatable');
	}
}
