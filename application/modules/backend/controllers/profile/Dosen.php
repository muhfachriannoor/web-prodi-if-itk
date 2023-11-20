<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller {
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
    }

	public function index()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->order_by('idDosen','DESC')->get('sm_dosen'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nip_dosen','NIP Dosen','required');
		$this->form_validation->set_rules('nama_dosen','Nama Dosen','required');
		$this->form_validation->set_rules('jabatan_dosen','Jabatan Dosen','required');
		$this->form_validation->set_rules('email_dosen', 'Email Dosen', 'trim|required|valid_email');
		// $this->form_validation->set_rules('text_dosen','Jabatan Dosen','required');
		// $this->form_validation->set_rules('gschoolar','Google Scholar','required');
		// $this->form_validation->set_rules('linkedin','Linkedln','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_dosen']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_dosen','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nip_dosen 		= $this->input->post('nip_dosen');
			$nama_dosen 	= $this->input->post('nama_dosen');
			$jabatan_dosen 	= $this->input->post('jabatan_dosen');
			$email_dosen 	= $this->input->post('email_dosen');
			$text_dosen 	= $this->input->post('text_dosen');
			$gschoolar 		= $this->input->post('gschoolar');
			$linkedin 		= $this->input->post('linkedin');
			$scopus 		= $this->input->post('scopus');

			$text = trim($nama_dosen);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_dosen 	= $text;

			$data = array(
						'nip_dosen' => $nip_dosen,
						'nama_dosen' => $nama_dosen,
						'jabatan_dosen' => $jabatan_dosen,
						'email_dosen' => $email_dosen,
						'text_dosen' => $text_dosen,
						'gschoolar' => $gschoolar,
						'linkedin' => $linkedin,
						'scopus' => $scopus,
						'slug_dosen' => $slug_dosen,
					);
			if (!empty($_FILES['foto_dosen']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/dosen/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_dosen')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Profile Prodi',
								'sub_menunya' => 'Dosen dan Tenaga Pendidik',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('profile/dosen/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_dosen'] = $image['file_name'];
	                $execute = $this->db->insert('sm_dosen',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/dosen');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/dosen');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_dosen',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/dosen');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/dosen');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/create');
			$this->load->view('partial/footer');
		}
		// $nip = $this->input->post('nip_dosen');
		// $cek = $this->db->get_where('sm_dosen',array('nip_dosen' => $nip))->num_rows();
		// if($cek > 0) {
		// 	$alert =
		// 		'<div class="alert alert-danger alert-dismissible">
		// 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		// 			<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
		// 			Dosen Sudah Terdata!
		// 		</div>';
		// 	$session = $this->session->set_flashdata('alert', $alert);
		// 	redirect('backend/profile/dosen');
		// }else{
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen', array('idDosen' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nip_dosen','NIP Dosen','required');
		$this->form_validation->set_rules('nama_dosen','Nama Dosen','required');
		$this->form_validation->set_rules('jabatan_dosen','Jabatan Dosen','required');
		$this->form_validation->set_rules('email_dosen', 'Email Dosen', 'trim|required|valid_email');
		// $this->form_validation->set_rules('gschoolar','Google Scholar');
		// $this->form_validation->set_rules('linkedin','Linkedln');
		// $this->form_validation->set_rules('scopus','Scopus');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nip_dosen 		= $this->input->post('nip_dosen');
			$nama_dosen 	= $this->input->post('nama_dosen');
			$jabatan_dosen 	= $this->input->post('jabatan_dosen');
			$email_dosen 	= $this->input->post('email_dosen');
			$text_dosen 	= $this->input->post('text_dosen');
			$gschoolar 		= $this->input->post('gschoolar');
			$linkedin 		= $this->input->post('linkedin');
			$scopus 		= $this->input->post('scopus');

			$text = trim($nama_dosen);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_dosen 	= $text;

			$data = array(
						'nip_dosen' => $nip_dosen,
						'nama_dosen' => $nama_dosen,
						'jabatan_dosen' => $jabatan_dosen,
						'email_dosen' => $email_dosen,
						'text_dosen' => $text_dosen,
						'gschoolar' => $gschoolar,
						'linkedin' => $linkedin,
						'scopus' => $scopus,
						'slug_dosen' => $slug_dosen,
					);
	        if(!empty($_FILES['foto_dosen']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/dosen/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_dosen')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Profile Prodi',
								'sub_menunya' => 'Dosen dan Tenaga Pendidik',
								'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('profile/dosen/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_dosen != ''):
	                	unlink('./asset/backend/upload/dosen/'.$row_cli->foto_dosen);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_dosen'] 	= $image['file_name'];
					$execute = $this->db->update('sm_dosen',$data,array('idDosen' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/dosen');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/dosen');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_dosen',$data,array('idDosen' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/dosen');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/dosen');
				}
	        }
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_dosen', array('idDosen' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->foto_dosen != ''):
        	unlink('./asset/backend/upload/dosen/'.$row_cli->foto_dosen);
        endif;
      
        $execute = $this->db->delete('sm_dosen',array('idDosen' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/detail');
		$this->load->view('partial/footer');
	}

	public function pendidikan($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'pendidikan' => $this->db->get_where('sm_dosen_pendidikan',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/pendidikan');
		$this->load->view('partial/footer');
	}

	public function pendidikan_up($id)
	{
		$this->form_validation->set_rules('text_pendidikan','Pendidikan','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$text_pendidikan = $this->input->post('text_pendidikan');
			$data = array(
						'text_pendidikan' => $text_pendidikan,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_pendidikan',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/pendidikan/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/pendidikan/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'pendidikan' => $this->db->get_where('sm_dosen_pendidikan',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/pendidikan');
			$this->load->view('partial/footer');
		}
	}

	public function pendidikan_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_pendidikan', array('idPendidikan' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_pendidikan',array('idPendidikan' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/pendidikan/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/pendidikan/'.$row_cli->idDosen);
		}
	}


	public function keahlian($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'keahlian' => $this->db->get_where('sm_dosen_keahlian',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/keahlian');
		$this->load->view('partial/footer');
	}

	public function keahlian_up($id)
	{
		$this->form_validation->set_rules('nama_keahlian','Nama Keahlian','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_keahlian = $this->input->post('nama_keahlian');
			$data = array(
						'nama_keahlian' => $nama_keahlian,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_keahlian',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/keahlian/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/keahlian/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'keahlian' => $this->db->get_where('sm_dosen_keahlian',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/keahlian');
			$this->load->view('partial/footer');
		}
	}

	public function keahlian_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_keahlian', array('idKeahlian' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_keahlian',array('idKeahlian' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/keahlian/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/keahlian/'.$row_cli->idDosen);
		}
	}

	public function minatpenelitian($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'minatpenelitian' => $this->db->get_where('sm_dosen_minatpenelitian',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/minatpenelitian');
		$this->load->view('partial/footer');
	}

	public function minatpenelitian_up($id)
	{
		$this->form_validation->set_rules('nama_minatpenelitian','Nama Minat Penelitian','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_minatpenelitian = $this->input->post('nama_minatpenelitian');
			$data = array(
						'nama_minat' => $nama_minatpenelitian,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_minatpenelitian',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/minatpenelitian/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/minatpenelitian/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'minatpenelitian' => $this->db->get_where('sm_dosen_minatpenelitian',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/minatpenelitian');
			$this->load->view('partial/footer');
		}
	}

	public function minatpenelitian_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_minatpenelitian', array('idMinat' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_minatpenelitian',array('idMinat' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/minatpenelitian/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/minatpenelitian/'.$row_cli->idDosen);
		}
	}

	public function publikasi($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'publikasi' => $this->db->get_where('sm_dosen_publikasi',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/publikasi');
		$this->load->view('partial/footer');
	}

	public function publikasi_up($id)
	{
		$this->form_validation->set_rules('nama_publikasi','Nama Publikasi','required');
		// $this->form_validation->set_rules('link_publikasi','Link','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_publikasi = $this->input->post('nama_publikasi');
			$link_publikasi = $this->input->post('link_publikasi');
			$data = array(
						'text_publikasi' => $nama_publikasi,
						'link_publikasi' => $link_publikasi,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_publikasi',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/publikasi/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/publikasi/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'publikasi' => $this->db->get_where('sm_dosen_publikasi',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/publikasi');
			$this->load->view('partial/footer');
		}
	}

	public function publikasi_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_publikasi', array('idPublikasi' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_publikasi',array('idPublikasi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/publikasi/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/publikasi/'.$row_cli->idDosen);
		}
	}

	public function penelitian($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'penelitian' => $this->db->get_where('sm_dosen_penelitian',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/penelitian');
		$this->load->view('partial/footer');
	}

	public function penelitian_up($id)
	{
		$this->form_validation->set_rules('nama_penelitian','Nama Penelitian','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_penelitian = $this->input->post('nama_penelitian');
			$data = array(
						'text_penelitian' => $nama_penelitian,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_penelitian',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/penelitian/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/penelitian/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'penelitian' => $this->db->get_where('sm_dosen_penelitian',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/penelitian');
			$this->load->view('partial/footer');
		}
	}

	public function penelitian_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_penelitian', array('idPenelitian' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_penelitian',array('idPenelitian' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/penelitian/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/penelitian/'.$row_cli->idDosen);
		}
	}

	public function pengalaman($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
					'pengalaman' => $this->db->get_where('sm_dosen_pengalaman',array('idDosen' => $id)),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/dosen/pengalaman');
		$this->load->view('partial/footer');
	}

	public function pengalaman_up($id)
	{
		$this->form_validation->set_rules('nama_pengalaman','Nama Pengalaman','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_pengalaman = $this->input->post('nama_pengalaman');
			$data = array(
						'text_pengalaman' => $nama_pengalaman,
						'idDosen' => $id,
					);
			$execute = $this->db->insert('sm_dosen_pengalaman',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/pengalaman/'.$id);
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/dosen/pengalaman/'.$id);
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Dosen dan Tenaga Pendidik',
						'datanya' => $this->db->get_where('sm_dosen',array('idDosen' => $id))->row(),
						'pengalaman' => $this->db->get_where('sm_dosen_pengalaman',array('idDosen' => $id)),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/dosen/pengalaman');
			$this->load->view('partial/footer');
		}
	}

	public function pengalaman_down($id)
	{
		$select_cli = $this->db->get_where('sm_dosen_pengalaman', array('idPengalaman' => $id));
        $row_cli    = $select_cli->row();

		$execute = $this->db->delete('sm_dosen_pengalaman',array('idPengalaman' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/pengalaman/'.$row_cli->idDosen);
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/dosen/pengalaman/'.$row_cli->idDosen);
		}
	}
}
