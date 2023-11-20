<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {
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
    }

	public function index()
	{
		$data = array(
					'menunya' => 'Kontak',
					'sub_menunya' => '',
					'datanya' => $this->db->get('m_kontak'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kontak/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Kontak',
					'sub_menunya' => '',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kontak/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telpon','Telpon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('gmap','Link Google Maps','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$email 		= $this->input->post('email');
			$telpon 	= $this->input->post('telpon');
			$alamat 	= $this->input->post('alamat');
			$gmap 		= $this->input->post('gmap');
			$facebook 	= $this->input->post('facebook');
			$twitter 	= $this->input->post('twitter');
			$youtube 	= $this->input->post('youtube');
			$instagram 	= $this->input->post('instagram');
			$data = array(
						'email' => $email,
						'telpon' => $telpon,
						'alamat' => $alamat,
						'gmap' => $gmap,
						'facebook' => $facebook,
						'twitter' => $twitter,
						'youtube' => $youtube,
						'instagram' => $instagram,
					);
			$execute = $this->db->insert('m_kontak',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/kontak/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/kontak/');
			}
		}else{
			$data = array(
						'menunya' => 'Kontak',
						'sub_menunya' => '',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('kontak/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Kontak',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('m_kontak',array('id_kontak' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kontak/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telpon','Telpon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('gmap','Link Google Maps','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$email 		= $this->input->post('email');
			$telpon 	= $this->input->post('telpon');
			$alamat 	= $this->input->post('alamat');
			$gmap 		= $this->input->post('gmap');
			$facebook 	= $this->input->post('facebook');
			$twitter 	= $this->input->post('twitter');
			$youtube 	= $this->input->post('youtube');
			$instagram 	= $this->input->post('instagram');
			$data = array(
						'email' => $email,
						'telpon' => $telpon,
						'alamat' => $alamat,
						'gmap' => $gmap,
						'facebook' => $facebook,
						'twitter' => $twitter,
						'youtube' => $youtube,
						'instagram' => $instagram,
					);
			$execute = $this->db->update('m_kontak',$data,array('id_kontak' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/kontak/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/kontak/');
			}
		}else{
			$data = array(
						'menunya' => 'Kontak',
						'sub_menunya' => '',
						'datanya' => $this->db->get_where('m_kontak',array('id_kontak' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('kontak/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('m_kontak',array('id_kontak' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kontak/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kontak/');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'datanya' => $this->db->get_where('m_kontak',array('id_kontak' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kontak/detail');
		$this->load->view('partial/footer');
	}
}