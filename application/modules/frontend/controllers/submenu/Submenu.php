<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index($slug_submenu)
	{
		// $query = $this->db->where('slug_submenu',$slug_submenu)->get('submenu_bantu');
		$query = $this->db->join('menu', 'submenu_bantu.idMenu = menu.idMenu', 'inner')->where('slug_submenu',$slug_submenu)->order_by('submenu_bantu.idBantu','DESC')->get('submenu_bantu')->row();
		$data = array(
					'title' => $query->nameSubMenu,
					'menunya' => $query->nameMenu,
					'sub_menunya' => $query->nameSubMenu,
					'submenu' => $query,
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => $query->nameMenu))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('submenu/index');
		$this->load->view('partial/footer_datatable');

	}
}
