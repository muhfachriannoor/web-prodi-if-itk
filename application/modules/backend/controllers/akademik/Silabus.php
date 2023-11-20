<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silabus extends MY_Controller {
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
					'sub_menunya' => 'Silabus',
					'datanya' => $this->db->get('sm_silabus'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/silabus/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Silabus',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/silabus/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('tglrilis_silabus','Hidden','required');
		$this->form_validation->set_message('required', 'Wajib diisi');
		if (empty($_FILES['file_silabus']['name']))
		{
			$this->form_validation->set_rules('file_silabus','Foto','required');
		}

		if($this->form_validation->run() != false){
			$cek = $this->db->get('sm_silabus')->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Silabus Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/silabus');
			}else{
				$tglrilis_silabus = $this->input->post('tglrilis_silabus');
				$data = array(
		                	'tglrilis_silabus' => $tglrilis_silabus,
		                );
				if (!empty($_FILES['file_silabus']['name'])) {
		            $config['upload_path'] = './asset/backend/upload/silabus/';
		            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
		            // $config['min_width'] = 900;
	            	// $config['min_height'] = 540;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);

		            if (!$this->upload->do_upload('file_silabus')) {
		                $error = array('error' => $this->upload->display_errors());
		            	$test = array(
									'menunya' => 'Akademik',
									'sub_menunya' => 'Silabus',
								);
						$this->load->view('partial/header', $test);
						$this->load->view('akademik/silabus/create',$error);
						$this->load->view('partial/footer');
		            }else{
		                $image 	= $this->upload->data();
		                $foto 	= $data['file_silabus'] = $image['file_name'];
		                $ukuran	= $data['ukuran_file'] = $image['file_size'];
		                $execute = $this->db->insert('sm_silabus',$data);
						if($execute == TRUE) {
							$alert =
								'<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil menambahkan data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/akademik/silabus');
						}else{
							$alert =
								'<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
									Silabus Sudah Ada!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/akademik/silabus');
						}
		            }
		        }
		    }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Silabus',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/silabus/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Silabus',
					'datanya' => $this->db->get_where('sm_silabus',array('id_silabus' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/silabus/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_silabus', array('id_silabus' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('tglrilis_silabus','Hidden','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$tglrilis_silabus = $this->input->post('tglrilis_silabus');
			$data = array(
	                	'tglrilis_silabus' => $tglrilis_silabus,
	                );
	        if(!empty($_FILES['file_silabus']['name'])) {
		        $config['upload_path'] = './asset/backend/upload/silabus/';
	            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
	            // $config['min_width'] = 450;
            	// $config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('file_silabus')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Silabus',
								'datanya' => $this->db->get_where('sm_silabus',array('id_silabus' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('akademik/silabus/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/silabus/'.$row_cli->file_silabus);
	                $image    				= $this->upload->data();
	                $data['file_silabus'] 	= $image['file_name'];
		            $data['ukuran_file'] 	= $image['file_size'];

					$execute = $this->db->update('sm_silabus',$data,array('id_silabus' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/silabus');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/silabus');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_silabus',$data,array('id_silabus' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/silabus');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/silabus');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Silabus',
						'datanya' => $this->db->get_where('sm_silabus',array('id_silabus' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/silabus/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_silabus', array('id_silabus' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/silabus/'.$row_cli->file_silabus);
      
        $execute = $this->db->delete('sm_silabus',array('id_silabus' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/silabus');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/silabus');
		}
	}
}
