<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        if($this->session->userdata('logged') == FALSE)
        {
        	$alert =
				'<div class="notification is-danger">
					Login Dulu!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
            redirect('login');
        }
        if($this->session->userdata('akses') != '1')
        {
        	$alert =
				'<div class="box-header">
			      <div class="alert alert-warning alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
			            Tidak boleh mengakses!
			      </div>
			    </div>';
			$session = $this->session->set_flashdata('alert', $alert);
            redirect('backend');
        }

		$this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$query = $this->db->join('menu', 'submenu_bantu.idMenu = menu.idMenu', 'inner')->order_by('submenu_bantu.idBantu','DESC')->get('submenu_bantu');
		$data = array(
					'menunya' => 'Sub Menu',
					'sub_menunya' => '',
					'datanya' => $query,
				);
		$this->load->view('partial/header', $data);
		$this->load->view('submenu/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Sub Menu',
					'sub_menunya' => '',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('submenu/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('idMenu','Menu','required|callback_select_validate');
		$this->form_validation->set_rules('nameSubMenu','Nama Sub Menu','required');
		$this->form_validation->set_rules('kolom1','Isi Konten','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$idMenu 		= $this->input->post('idMenu');
			$nameSubMenu 	= $this->input->post('nameSubMenu');
			
			$text = trim($nameSubMenu);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '_', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '_', $text);

			$slug_submenu 	= $text;
			$kolom1 		= $this->input->post('kolom1');

			if($idMenu == 3) {
				$url = 'profile/'.$slug_submenu;
			}elseif($idMenu == 4) {
				$url = 'akademik/'.$slug_submenu;
			}elseif($idMenu == 5) {
				$url = 'kemahasiswaan/'.$slug_submenu;
			}elseif($idMenu == 6) {
				$url = 'penelitian/'.$slug_submenu;
			}
			$data = array(
						'idMenu' => $idMenu,
						'nameSubMenu' => $nameSubMenu,
						'slug_submenu' => $slug_submenu,
						'kolom1' => $kolom1,
						'url_bantu' => $url,
					);

			$submenu = 	array(
							'idMenu' => $idMenu,
							'nameSubmenu' => $nameSubMenu,
							'url' => $url,
						);
			$execute = $this->db->insert('submenu_bantu',$data);
			$execute2 = $this->db->insert('submenu',$submenu);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/submenu/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/submenu/');
			}
		}else{
			$data = array(
						'menunya' => 'Sub Menu',
						'sub_menunya' => '',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('submenu/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Sub Menu',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('submenu_bantu',array('idBantu' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('submenu/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$query1 	= $this->db->get_where('submenu_bantu', array('idBantu' => $id));
        $object1    = $query1->row();
        $query2 	= $this->db->get_where('submenu', array('nameSubmenu' => $object1->nameSubMenu));
        $object2    = $query2->row();
     

		$this->form_validation->set_rules('idMenu','Menu','required|callback_select_validate');
		$this->form_validation->set_rules('nameSubMenu','Nama Sub Menu','required');
		$this->form_validation->set_rules('kolom1','Isi Konten','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$idMenu 		= $this->input->post('idMenu');
			$nameSubMenu 	= $this->input->post('nameSubMenu');
			
			$text = trim($nameSubMenu);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '_', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '_', $text);

			$slug_submenu 	= $text;
			$kolom1 		= $this->input->post('kolom1');
			$old_url 		= $this->input->post('old_url');

			if($idMenu == 3) {
				$url = 'profile/'.$slug_submenu;
			}elseif($idMenu == 4) {
				$url = 'akademik/'.$slug_submenu;
			}elseif($idMenu == 5) {
				$url = 'kemahasiswaan/'.$slug_submenu;
			}elseif($idMenu == 6) {
				$url = 'penelitian/'.$slug_submenu;
			}

			$data = array(
						'idMenu' => $idMenu,
						'nameSubMenu' => $nameSubMenu,
						'slug_submenu' => $slug_submenu,
						'kolom1' => $kolom1,
						'url_bantu' => $url,
					);

			$data2 = array(
							'idMenu' => $idMenu,
							'nameSubmenu' => $nameSubMenu,
							'url' => $url,
						);
			$execute = $this->db->update('submenu_bantu',$data,array('idBantu' => $id));
			$execute2 = $this->db->update('submenu',$data2,array('idSubmenu'=> $object2->idSubmenu));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/submenu/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/submenu/');
			}
		}else{
			$data = array(
						'menunya' => 'Sub Menu',
						'sub_menunya' => '',
						'datanya' => $this->db->get_where('submenu_bantu',array('idBantu' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('submenu/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$query1 	= $this->db->get_where('submenu_bantu', array('idBantu' => $id));
        $object1    = $query1->row();
        $query2 	= $this->db->get_where('submenu', array('nameSubmenu' => $object1->nameSubMenu));
        $object2    = $query2->row();
        
        $execute = $this->db->delete('submenu_bantu',array('idBantu' => $id));
        $execute2 = $this->db->delete('submenu',array('idSubmenu' => $object2->idSubmenu));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/submenu/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/submenu/');
		}
	}

	public function detail($id)
	{
		$query = $this->db->join('menu', 'submenu_bantu.idMenu = menu.idMenu', 'inner')->order_by('submenu_bantu.idBantu','DESC')->get('submenu_bantu');
		$data = array(
					'menunya' => 'Sub Menu',
					'sub_menunya' => '',
					'datanya' => $query->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('submenu/detail');
		$this->load->view('partial/footer');
	}

	function select_validate()
	{
		$idMenu = $this->input->post('idMenu');
		if($idMenu == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Menu!');
			return false;
		}else{
			return true;
		}
	}
}
