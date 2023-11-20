<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akreditasi extends MY_Controller {
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
					'sub_menunya' => 'Akreditasi',
					'datanya' => $this->db->get('sm_akreditasi'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/akreditasi/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Akreditasi',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/akreditasi/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('akreditasi_text','Deksripsi Akreditas','required');
		$this->form_validation->set_message('required', 'Wajib diisi');
		if (empty($_FILES['akreditasi_file']['name']))
		{
			$this->form_validation->set_rules('akreditasi_file','Foto','required');
		}

		if($this->form_validation->run() != false){
			$akreditasi_text	= $this->input->post('akreditasi_text');
			$data = array(
						'akreditasi_text' => $akreditasi_text,
					);
			if (!empty($_FILES['akreditasi_file']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/akreditasi/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('akreditasi_file')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Akreditasi',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('akademik/akreditasi/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image 	= $this->upload->data();
	                $foto 	= $data['akreditasi_file'] = $image['file_name'];
	               	$execute = $this->db->insert('sm_akreditasi',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/akreditasi');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/akreditasi');
					}
	            }
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Akreditasi',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/akreditasi/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Akreditasi',
					'datanya' => $this->db->get_where('sm_akreditasi',array('id_akreditasi' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/akreditasi/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_akreditasi', array('id_akreditasi' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('akreditasi_text','Deksripsi Akreditas','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$akreditasi_text	= $this->input->post('akreditasi_text');
			$data = array(
						'akreditasi_text' => $akreditasi_text,
					);
	        if(!empty($_FILES['akreditasi_file']['name'])) {
		        $config['upload_path'] = './asset/backend/upload/akreditasi/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('akreditasi_file')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Akademik',
								'sub_menunya' => 'Akreditasi',
								'datanya' => $this->db->get_where('sm_akreditasi',array('id_akreditasi' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('akademik/akreditasi/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/akreditasi/'.$row_cli->akreditasi_file);
	                $image    				 = $this->upload->data();
	                $data['akreditasi_file'] = $image['file_name'];

					$execute = $this->db->update('sm_akreditasi',$data,array('id_akreditasi' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/akreditasi');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/akademik/akreditasi');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_akreditasi',$data,array('id_akreditasi' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/akreditasi');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/akademik/akreditasi');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Akreditasi',
						'datanya' => $this->db->get_where('sm_akreditasi',array('id_akreditasi' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/akreditasi/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_akreditasi', array('id_akreditasi' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/akreditasi/'.$row_cli->akreditasi_file);
      
        $execute = $this->db->delete('sm_akreditasi',array('id_akreditasi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/akreditasi');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/akreditasi');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Akreditasi',
					'datanya' => $this->db->get_where('sm_akreditasi',array('id_akreditasi' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/akreditasi/detail');
		$this->load->view('partial/footer');
	}
}
