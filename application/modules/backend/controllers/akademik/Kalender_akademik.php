<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender_akademik extends MY_Controller {
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
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'datanya' => $this->db->get('sm_kalenderakademik_file'),
					'kalender_akademik' => $this->db->get('sm_kalenderakademik'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kalender_akademik/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kalender_akademik/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_kalender','Judul','required');
		$this->form_validation->set_rules('start_kalender','Dari Tanggal','required');
		$this->form_validation->set_rules('end_kalender','Sampai Tanggal','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_kalender = $this->input->post('judul_kalender');
			$start_kalender = $this->input->post('start_kalender');
			$end_kalender = $this->input->post('end_kalender');
			$data = array(
						'judul_kalender' => $judul_kalender,
						'start_kalender' => $start_kalender,
						'end_kalender' => $end_kalender,
					);
			$execute = $this->db->insert('sm_kalenderakademik',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert_kalender', $alert);
				redirect('backend/akademik/kalender_akademik');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Kalender Akademik Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert_kalender', $alert);
				redirect('backend/akademik/kalender_akademik');
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kalender Akademik',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kalender_akademik/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'datanya' => $this->db->get_where('sm_kalenderakademik',array('id_kalender' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kalender_akademik/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('judul_kalender','Judul','required');
		$this->form_validation->set_rules('start_kalender','Dari Tanggal','required');
		$this->form_validation->set_rules('end_kalender','Sampai Tanggal','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_kalender = $this->input->post('judul_kalender');
			$start_kalender = $this->input->post('start_kalender');
			$end_kalender = $this->input->post('end_kalender');
			$data = array(
						'judul_kalender' => $judul_kalender,
						'start_kalender' => $start_kalender,
						'end_kalender' => $end_kalender,
					);
	        $execute = $this->db->update('sm_kalenderakademik',$data,array('id_kalender' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert_kalender', $alert);
				redirect('backend/akademik/kalender_akademik');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert_kalender', $alert);
				redirect('backend/akademik/kalender_akademik');
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kalender Akademik',
						'datanya' => $this->db->get_where('sm_kalenderakademik',array('id_kalender' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kalender_akademik/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{ 
        $execute = $this->db->delete('sm_kalenderakademik',array('id_kalender' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert_kalender', $alert);
			redirect('backend/akademik/kalender_akademik');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert_kalender', $alert);
			redirect('backend/akademik/kalender_akademik');
		}
	}

	public function create_file()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kalender_akademik/create_file');
		$this->load->view('partial/footer');
	}

	public function up_file()
	{
		$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
		$this->form_validation->set_message('required', 'Wajib diisi');
		if (empty($_FILES['file_kalender']['name']))
		{
			$this->form_validation->set_rules('file_kalender','Foto','required');
		}

		if($this->form_validation->run() != false){
			$cek = $this->db->get('sm_kalenderakademik_file')->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Kalender Akademik Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/kalender_akademik');
			}else{
				$tahun_ajaran = $this->input->post('tahun_ajaran');
				$data = array(
							'tahunajar_kalender' => $tahun_ajaran,
							'tglrilis_kalender' => date('Y-m-d H:i:s'),
						);
				if (!empty($_FILES['file_kalender']['name'])) {
		            $config['upload_path'] = './asset/backend/upload/kalender_akademik/';
		            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
		            // $config['min_width'] = 900;
	            	// $config['min_height'] = 540;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);

		            if (!$this->upload->do_upload('file_kalender')) {
		                $error = array('error' => $this->upload->display_errors());
		            	$test = array(
									'menunya' => 'Akademik',
									'sub_menunya' => 'Kalender Akademik',
								);
						$this->load->view('partial/header', $test);
						$this->load->view('akademik/kalender_akademik/create',$error);
						$this->load->view('partial/footer');
		            }else{
		                $image 	= $this->upload->data();
		                $foto 	= $data['kalender_file'] = $image['file_name'];
		                $ukuran	= $data['ukuran_file'] = $image['file_size'];
		               	$execute = $this->db->insert('sm_kalenderakademik_file',$data);
						if($execute == TRUE) {
							$alert =
								'<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil menambahkan data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/akademik/kalender_akademik');
						}else{
							$alert =
								'<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
									Kalender Akademik Sudah Ada!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/akademik/kalender_akademik');
						}
		            }
		        }
		    }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kalender Akademik',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kalender_akademik/create_file');
			$this->load->view('partial/footer');
		}
	}

	public function update_file($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Kalender Akademik',
					'datanya' => $this->db->get_where('sm_kalenderakademik_file',array('id_kalender' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/kalender_akademik/update_file');
		$this->load->view('partial/footer');
	}

	public function down_file($id)
	{
		$select_cli = $this->db->get_where('sm_kalenderakademik_file', array('id_kalender' => $id));
        $row_cli    = $select_cli->row();

		$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$data = array(
						'tahunajar_kalender' => $tahun_ajaran,
						'tglrilis_kalender' => date('Y-m-d H:i:s'),
					);
	        if(!empty($_FILES['file_kalender']['name'])) {
		        $config['upload_path'] = './asset/backend/upload/kalender_akademik/';
	            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
	            // $config['min_width'] = 450;
            	// $config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('file_kalender')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Kalender Akademik',
								'datanya' => $this->db->get_where('sm_kalenderakademik_file',array('id_kalender' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('akademik/kalender_akademik/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/kalender_akademik/'.$row_cli->kalender_file);
	                $image    				= $this->upload->data();
	                $data['kalender_file'] 	= $image['file_name'];
		            $data['ukuran_file'] 	= $image['file_size'];

					$execute = $this->db->update('sm_kalenderakademik_file',$data,array('id_kalender' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/kalender_akademik');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/kalender_akademik');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_kalenderakademik_file',$data,array('id_kalender' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/kalender_akademik');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/kalender_akademik');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Kalender Akademik',
						'datanya' => $this->db->get_where('sm_kalenderakademik_file',array('id_kalender' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/kalender_akademik/update_file');
			$this->load->view('partial/footer');
		}
	}

	public function delete_file($id)
	{
		$select_cli = $this->db->get_where('sm_kalenderakademik_file', array('id_kalender' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/kalender_akademik/'.$row_cli->kalender_file);
      
        $execute = $this->db->delete('sm_kalenderakademik_file',array('id_kalender' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kalender_akademik');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/kalender_akademik');
		}
	}
}
