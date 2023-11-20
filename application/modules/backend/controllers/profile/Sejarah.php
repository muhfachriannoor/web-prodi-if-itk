<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends MY_Controller {
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
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Sejarah',
					'datanya' => $this->db->get('sm_sejarah'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/sejarah/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Sejarah',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/sejarah/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('text_sejarah','Text Sejarah','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$text_sejarah = $this->input->post('text_sejarah');
			$data = array(
						'sejarah_text' => $text_sejarah,
					);
			$cek = $this->db->get('sm_sejarah')->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Text Sejarah Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/sejarah');
			}else{
				$execute = $this->db->insert('sm_sejarah',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/sejarah');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Text Sejarah Sudah Ada!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/sejarah');
				}
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Sejarah',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/sejarah/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Sejarah',
					'datanya' => $this->db->get_where('sm_sejarah',array('id_sejarah' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/sejarah/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('text_sejarah','Text Sejarah','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$text_sejarah = $this->input->post('text_sejarah');
			$data = array(
						'sejarah_text' => $text_sejarah,
					);
			$execute = $this->db->update('sm_sejarah',$data,array('id_sejarah' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/sejarah');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/sejarah');
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Sejarah',
						'datanya' => $this->db->get_where('sm_sejarah',array('id_sejarah' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/sejarah/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$execute = $this->db->delete('sm_sejarah',array('id_sejarah' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/sejarah');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/sejarah');
		}
	}
}
