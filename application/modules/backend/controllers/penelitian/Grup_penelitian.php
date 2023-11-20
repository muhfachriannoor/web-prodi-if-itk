<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup_penelitian extends MY_Controller {
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
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Grup Penelitian',
					'datanya' => $this->db->order_by('idGrupPenelitian','DESC')->get('sm_gruppenelitian'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/grup_penelitian/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Grup Penelitian',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/grup_penelitian/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_grup','Nama Grup','required');
		$this->form_validation->set_rules('deskripsi_grup','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_grup		 = $this->input->post('nama_grup');
			$deskripsi_grup  = $this->input->post('deskripsi_grup');
			$data = array(
						'nama_grup' => $nama_grup,
						'deskripsi_grup' => $deskripsi_grup,
					);
			$execute = $this->db->insert('sm_gruppenelitian',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/penelitian/grup_penelitian/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/penelitian/grup_penelitian/');
			}
		}else{
			$data = array(
						'menunya' => 'Penelitian & Pengabdian',
						'sub_menunya' => 'Grup Penelitian',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/grup_penelitian/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Grup Penelitian',
					'datanya' => $this->db->get_where('sm_gruppenelitian',array('idGrupPenelitian' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/grup_penelitian/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('nama_grup','Nama Grup','required');
		$this->form_validation->set_rules('deskripsi_grup','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$nama_grup		 = $this->input->post('nama_grup');
			$deskripsi_grup  = $this->input->post('deskripsi_grup');
			$data = array(
						'nama_grup' => $nama_grup,
						'deskripsi_grup' => $deskripsi_grup,
					);
			$execute = $this->db->update('sm_gruppenelitian',$data,array('idGrupPenelitian' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/penelitian/grup_penelitian/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/penelitian/grup_penelitian/');
			}
		}else{
			$data = array(
						'menunya' => 'Penelitian & Pengabdian',
						'sub_menunya' => 'Grup Penelitian',
						'datanya' => $this->db->get_where('sm_gruppenelitian',array('idGrupPenelitian' => $id))->row(),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/grup_penelitian/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('sm_gruppenelitian',array('idGrupPenelitian' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/grup_penelitian/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/grup_penelitian/');
		}
	}
}
