<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends MY_Controller {
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
					'sub_menunya' => 'Kurikulum',
					'datanya' => $this->db->get('sm_kurikulum'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kurikulum/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kurikulum',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kurikulum/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('jenis_kurikulum','Jenis Kurikulum','required|callback_select_validate');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$jenis_kurikulum = $this->input->post('jenis_kurikulum');
			$cek = $this->db->get_where('sm_kurikulum',array('jenis_kurikulum' => $jenis_kurikulum))->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Jenis Kurikulum Sudah Terdata!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum');
			}else{
				$data = array(
							'jenis_kurikulum' => $jenis_kurikulum,
						);
				$execute = $this->db->insert('sm_kurikulum',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/kurikulum');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/kurikulum');
				}
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kurikulum',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kurikulum/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kurikulum',
					'datanya' => $this->db->get_where('sm_kurikulum',array('idKurikulum' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kurikulum/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('jenis_kurikulum','Jenis Kurikulum','required|callback_select_validate');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$jenis_kurikulum = $this->input->post('jenis_kurikulum');
			$data = array(
							'jenis_kurikulum' => $jenis_kurikulum,
						);
			$execute = $this->db->update('sm_kurikulum',$data,array('idKurikulum' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum');
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kurikulum',
						'datanya' => $this->db->get_where('sm_kurikulum',array('idKurikulum' => $id))->row(),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kurikulum/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('sm_kurikulum',array('idKurikulum' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum');
		}
	}

	public function semester($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kurikulum',
					'datanya' => $this->db->get_where('sm_kurikulum',array('idKurikulum' => $id))->row(),
					'semester' => $this->db->get_where('sm_kurikulum_detail',array('idKurikulum' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kurikulum/semester');
		$this->load->view('partial/footer');
	}

	public function semester_up($id)
	{
		$this->form_validation->set_rules('semester','Semester Atau Bidang Keminatan','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$semester = $this->input->post('semester');
			$data = array(
						'nama_detailkurikulum' => $semester,
						'idKurikulum' => $id,
					);
			$execute = $this->db->insert('sm_kurikulum_detail',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum/semester/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum/semester/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kurikulum',
						'datanya' => $this->db->get_where('sm_kurikulum',array('idKurikulum' => $id))->row(),
						'semester' => $this->db->get_where('sm_kurikulum_detail',array('idKurikulum' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kurikulum/semester');
			$this->load->view('partial/footer');
		}
	}

	public function semester_down($id)
	{
		$select_cli = $this->db->get_where('sm_kurikulum_detail', array('idDetailKurikulum' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_kurikulum_detail',array('idDetailKurikulum' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum/semester/'.$row_cli->idKurikulum);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum/semester/'.$row_cli->idKurikulum);
		}
	}

	public function matkul($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kurikulum',
					'datanya' => $this->db->get_where('sm_kurikulum_detail',array('idDetailKurikulum' => $id))->row(),
					'matkul' => $this->db->get_where('sm_kurikulum_matkul',array('idDetailKurikulum' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kurikulum/matkul');
		$this->load->view('partial/footer');
	}

	public function matkul_up($id)
	{
		$this->form_validation->set_rules('kode_matkul','Kode Mata Kuliah','required');
		$this->form_validation->set_rules('nama_matkul','Nama Mata Kuliah','required');
		$this->form_validation->set_rules('sks_matkul','SKS Mata Kuliah','required');
		$this->form_validation->set_rules('praktikum_matkul','Pratikum Mata Kuliah','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$kode_matkul 		= $this->input->post('kode_matkul');
			$nama_matkul 		= $this->input->post('nama_matkul');
			$sks_matkul 		= $this->input->post('sks_matkul');
			$praktikum_matkul 	= $this->input->post('praktikum_matkul');
			$data = array(
						'kode_matkul' => $kode_matkul,
						'nama_matkul' => $nama_matkul,
						'sks_matkul' => $sks_matkul,
						'praktikum_matkul' => $praktikum_matkul,
						'idDetailKurikulum' => $id,
					);
			$execute = $this->db->insert('sm_kurikulum_matkul',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum/matkul/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kurikulum/matkul/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kurikulum',
						'datanya' => $this->db->get_where('sm_kurikulum_detail',array('idDetailKurikulum' => $id))->row(),
						'matkul' => $this->db->get_where('sm_kurikulum_matkul',array('idDetailKurikulum' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kurikulum/matkul');
			$this->load->view('partial/footer');
		}
	}

	public function matkul_down($id)
	{
		$select_cli = $this->db->get_where('sm_kurikulum_matkul', array('idMatkul' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_kurikulum_matkul',array('idMatkul' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum/matkul/'.$row_cli->idDetailKurikulum);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kurikulum/matkul/'.$row_cli->idDetailKurikulum);
		}
	}

	function select_validate()
	{
		$jenis_kurikulum = $this->input->post('jenis_kurikulum');
		if($jenis_kurikulum == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Jenis Kurikulum!');
			return false;
		}else{
			return true;
		}
	}
}
