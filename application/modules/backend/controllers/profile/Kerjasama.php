<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends MY_Controller {
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
					'sub_menunya' => 'Kerjasama',
					'datanya' => $this->db->order_by('idKerjasama','DESC')->get('sm_kerjasama'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/kerjasama/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Kerjasama',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/kerjasama/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_kerjasama','Nama Kerjasama','required');
		$this->form_validation->set_rules('deskripsi_kerjasama','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_kerjasama']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_kerjasama','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_kerjasama		 = $this->input->post('nama_kerjasama');
			$deskripsi_kerjasama = $this->input->post('deskripsi_kerjasama');
			$data = array(
						'nama_kerjasama' => $nama_kerjasama,
						'deskripsi_kerjasama' => $deskripsi_kerjasama,
					);
			if (!empty($_FILES['foto_kerjasama']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/kerjasama/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_kerjasama')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Profile Prodi',
								'sub_menunya' => 'Kerjasama',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('profile/kerjasama/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['file_kerjasama'] = $image['file_name'];
	                $execute = $this->db->insert('sm_kerjasama',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/kerjasama');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/kerjasama');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_kerjasama',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/kerjasama');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/kerjasama');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Kerjasama',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/kerjasama/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Kerjasama',
					'datanya' => $this->db->get_where('sm_kerjasama',array('idKerjasama' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/kerjasama/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_kerjasama', array('idKerjasama' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_kerjasama','Nama Kerjasama','required');
		$this->form_validation->set_rules('deskripsi_kerjasama','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_kerjasama		 = $this->input->post('nama_kerjasama');
			$deskripsi_kerjasama = $this->input->post('deskripsi_kerjasama');
			$data = array(
						'nama_kerjasama' => $nama_kerjasama,
						'deskripsi_kerjasama' => $deskripsi_kerjasama,
					);
	        if(!empty($_FILES['foto_kerjasama']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/kerjasama/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_kerjasama')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Profile Prodi',
								'sub_menunya' => 'Kerjasama',
								'datanya' => $this->db->get_where('sm_kerjasama',array('idKerjasama' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('profile/kerjasama/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->file_kerjasama != ''):
	                	unlink('./asset/backend/upload/kerjasama/'.$row_cli->file_kerjasama);
	                endif;
	                $image    				= $this->upload->data();
	                $data['file_kerjasama'] 	= $image['file_name'];
					$execute = $this->db->update('sm_kerjasama',$data,array('idKerjasama' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/kerjasama');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/kerjasama');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_kerjasama',$data,array('idKerjasama' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/kerjasama');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/kerjasama');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Kerjasama',
						'datanya' => $this->db->get_where('sm_kerjasama',array('idKerjasama' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/kerjasama/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_kerjasama', array('idKerjasama' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->file_kerjasama != ''):
        	unlink('./asset/backend/upload/kerjasama/'.$row_cli->file_kerjasama);
        endif;
      
        $execute = $this->db->delete('sm_kerjasama',array('idKerjasama' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/kerjasama');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/kerjasama');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Kerjasama',
					'datanya' => $this->db->get_where('sm_kerjasama',array('idKerjasama' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/kerjasama/detail');
		$this->load->view('partial/footer');
	}
}
