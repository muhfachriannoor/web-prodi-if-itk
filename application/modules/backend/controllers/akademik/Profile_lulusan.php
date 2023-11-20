<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_lulusan extends MY_Controller {
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
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
					'datanya' => $this->db->get('sm_profillulusan'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/profile_lulusan/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/profile_lulusan/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_profil','Nama Profil','required');
		$this->form_validation->set_rules('capaian','Capaian Pembelajaran','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_profil	= $this->input->post('nama_profil');
			$capaian 		= $this->input->post('capaian');
			$data = array(
						'profil' => $nama_profil,
						'capaian' => $capaian,
					);
			$execute = $this->db->insert('sm_profillulusan',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/profile_lulusan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/profile_lulusan');
			}   
		}else{
			$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/profile_lulusan/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
					'datanya' => $this->db->get_where('sm_profillulusan',array('idProfillulusan' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/profile_lulusan/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('nama_profil','Nama Profil','required');
		$this->form_validation->set_rules('capaian','Capaian Pembelajaran','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$nama_profil	= $this->input->post('nama_profil');
			$capaian 		= $this->input->post('capaian');
			$data = array(
						'profil' => $nama_profil,
						'capaian' => $capaian,
					);
			$execute = $this->db->update('sm_profillulusan',$data,array('idProfillulusan' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/profile_lulusan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/profile_lulusan');
			}
		}else{
			$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
					'datanya' => $this->db->get_where('sm_profillulusan',array('idProfillulusan' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/profile_lulusan/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('sm_profillulusan',array('idProfillulusan' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/profile_lulusan');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/profile_lulusan');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Profile Lulusan',
					'datanya' => $this->db->get_where('sm_profillulusan',array('idProfillulusan' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/profile_lulusan/detail');
		$this->load->view('partial/footer');
	}
}
