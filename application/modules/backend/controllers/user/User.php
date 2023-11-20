<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
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
        $this->load->model('m_user');
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
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

		$data = array(
					'menunya' => 'User',
					'sub_menunya' => '',
					'datanya' => $this->db->order_by('idUser','DESC')->get('user'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('user/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
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

		$data = array(
					'menunya' => 'User',
					'sub_menunya' => '',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('user/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
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

		$this->form_validation->set_rules('nama_user','Nama Lengkap','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('akses','Level Akun','required|callback_select_validate');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_user']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_user','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$username = $this->input->post('username');
			$cek = $this->db->get_where('user',array('username' => $username))->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Username Sudah Terdata!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/user');
			}else{
				$nama_user 	= $this->input->post('nama_user');
				$username 	= $this->input->post('username');
				$password 	= $this->input->post('password');
				$email 		= $this->input->post('email');
				$akses 		= $this->input->post('akses');
				$data = array(
							'nama_user' => $nama_user,
							'username' => $username,
							'password' => $this->m_user->hash($password),
							'email' => $email,
							'akses' => $akses,
						);
				if (!empty($_FILES['foto_user']['name'])) {
		            $config['upload_path'] = './asset/backend/upload/user/';
		            $config['allowed_types'] = 'jpg|png|jpeg|';
		            $config['min_width'] = 300;
	            	$config['min_height'] = 300;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);

		            if (!$this->upload->do_upload('foto_user')) {
		                $error = array('error' => $this->upload->display_errors());
		            	$data = array(
									'menunya' => 'User',
									'sub_menunya' => '',
									'error' => '',
								);
						$this->load->view('partial/header', $data);
						$this->load->view('user/create',$error);
						$this->load->view('partial/footer');
		            }else{
		                $image = $this->upload->data();
		                $foto = $data['foto_user'] = $image['file_name'];
		                $execute = $this->db->insert('user',$data);
						if($execute == TRUE) {
							$alert =
								'<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil menambahkan data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/user');
						}else{
							$alert =
								'<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
									Gagal Menambahkan Data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/user');
						}
		            }
		        }else{
		        	$execute = $this->db->insert('user',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/user');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/user');
					}
		        }
		    }
		}else{
			$data = array(
						'menunya' => 'User',
						'sub_menunya' => '',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('user/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'User',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('user',array('idUser' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('user/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('user', array('idUser' => $id));
        $row_cli    = $select_cli->row();

		$this->form_validation->set_rules('nama_user','Nama Lengkap','required');
		$this->form_validation->set_rules('username','Username','required');
		// $this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_rules('akses','Level Akun','required|callback_select_validate');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_user 		= $this->input->post('nama_user');
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
			$old_password 	= $this->input->post('old_password');
			$email 			= $this->input->post('email');
			$akses 			= $this->input->post('akses');
			$old_akses 		= $this->input->post('old_akses');
			$data = array(
						'nama_user' => $nama_user,
						'username' => $username,
						'password' => ($password == '') ? $old_password : $this->m_user->hash($password),
						'email' => $email,
						'akses' => ($akses == '') ? $old_akses : $akses,
					);
	        if(!empty($_FILES['foto_user']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/user/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_user')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$data = array(
								'menunya' => 'User',
								'sub_menunya' => '',
								'datanya' => $this->db->get_where('user',array('idUser' => $id))->row(),
								'error' => '',
							);
					$this->load->view('partial/header', $data);
					$this->load->view('user/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_user != ''):
	                	unlink('./asset/backend/upload/user/'.$row_cli->foto_user);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_user'] 		= $image['file_name'];
	                if($this->session->userdata('idUser') == $row_cli->idUser):
						$this->session->unset_userdata('foto');
						$session = array(
									'nama' => $nama_user,
									'foto' => $image['file_name'],
								);
           				$this->session->set_userdata($session);
	                endif;
					$execute = $this->db->update('user',$data,array('idUser' => $id));
					if($execute == TRUE) {
						if($this->session->userdata('akses') == '2') {
							$alert =
								'<div class="box-header">
							      <div class="alert alert-success alert-dismissible">
							            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-check"></i> Sukses!</h4>
										Berhasil mengubah data!
							      </div>
							    </div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/');
						}else{
							$alert =
								'<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil mengubah data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/user');
						}
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/user');
					}
	            }
	        }else{
				$execute = $this->db->update('user',$data,array('idUser' => $id));
				if($execute == TRUE) {
					if($this->session->userdata('akses') == '2') {
						$alert =
							'<div class="box-header">
						      <div class="alert alert-success alert-dismissible">
						            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil mengubah data!
						      </div>
						    </div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/');
					}else{
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/user');
					}
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/user');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'User',
						'sub_menunya' => '',
						'datanya' => $this->db->get_where('user',array('idUser' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('user/update');
			$this->load->view('partial/footer');
		}        
	}

	public function delete($id)
	{
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

		$select_cli = $this->db->get_where('user', array('idUser' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/user/'.$row_cli->foto_user);
      
        $execute = $this->db->delete('user',array('idUser' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/user');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/user');
		}
	}

	public function detail($id)
	{
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

		$data = array(
					'menunya' => 'User',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('user',array('idUser' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('user/detail');
		$this->load->view('partial/footer');
	}

	function select_validate()
	{
		$akses = $this->input->post('akses');
		if($akses == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Level Akun!');
			return false;
		}else{
			return true;
		}
	}
}
