<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends MY_Controller {
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
					'sub_menunya' => 'Laboratorium',
					'datanya' => $this->db->order_by('id_laboratorium','DESC')->get('sm_laboratorium'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/laboratorium/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Laboratorium',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/laboratorium/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_laboratorium','Nama Laboratorium','required');
		$this->form_validation->set_rules('deskripsi_laboratorium','Deksripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_laboratorium']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_laboratorium','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_laboratorium		 = $this->input->post('nama_laboratorium');
			$deskripsi_laboratorium = $this->input->post('deskripsi_laboratorium');
			$data = array(
						'nama_laboratorium' => $nama_laboratorium,
						'laboratorium_text' => $deskripsi_laboratorium,
					);
			if (!empty($_FILES['foto_laboratorium']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/laboratorium/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_laboratorium')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Laboratorium',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('akademik/laboratorium/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['laboratorium_file'] = $image['file_name'];
	                $execute = $this->db->insert('sm_laboratorium',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/laboratorium');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/laboratorium');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_laboratorium',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/laboratorium');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/laboratorium');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Laboratorium',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/laboratorium/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Laboratorium',
					'datanya' => $this->db->get_where('sm_laboratorium',array('id_laboratorium' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/laboratorium/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_laboratorium', array('id_laboratorium' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_laboratorium','Nama Laboratorium','required');
		$this->form_validation->set_rules('deskripsi_laboratorium','Deksripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_laboratorium		 = $this->input->post('nama_laboratorium');
			$deskripsi_laboratorium = $this->input->post('deskripsi_laboratorium');
			$data = array(
						'nama_laboratorium' => $nama_laboratorium,
						'laboratorium_text' => $deskripsi_laboratorium,
					);

	        if(!empty($_FILES['foto_laboratorium']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/laboratorium/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_laboratorium')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$data = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Laboratorium',
								'datanya' => $this->db->get_where('sm_laboratorium',array('id_laboratorium' => $id))->row(),
								'error' => '',
							);
					$this->load->view('partial/header', $data);
					$this->load->view('akademik/laboratorium/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->laboratorium_file != ''):
	                	unlink('./asset/backend/upload/laboratorium/'.$row_cli->laboratorium_file);
	                endif;
	                $image    				= $this->upload->data();
	                $data['laboratorium_file'] 	= $image['file_name'];

					$execute = $this->db->update('sm_laboratorium',$data,array('id_laboratorium' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/laboratorium');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/laboratorium');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_laboratorium',$data,array('id_laboratorium' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/laboratorium');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/laboratorium');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Laboratorium',
						'datanya' => $this->db->get_where('sm_laboratorium',array('id_laboratorium' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/laboratorium/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_laboratorium', array('id_laboratorium' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/laboratorium/'.$row_cli->laboratorium_file);
      
        $execute = $this->db->delete('sm_laboratorium',array('id_laboratorium' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/laboratorium');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/laboratorium');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Laboratorium',
					'datanya' => $this->db->get_where('sm_laboratorium',array('id_laboratorium' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/laboratorium/detail');
		$this->load->view('partial/footer');
	}
}
