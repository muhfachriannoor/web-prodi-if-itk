<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Kontak',
					'menunya' => 'Kontak',
					'sub_menunya' => '',
					'kontak' => $this->db->get('m_kontak')->row(),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kontak'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kontak/index');
		$this->load->view('partial/footer_datatable');
	}
}
