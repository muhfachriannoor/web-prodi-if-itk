<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_pengabdian extends MY_Controller {
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
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'datanya' => $this->db->where('status',1)->order_by('id_pengabdian','DESC')->get('sm_hasilpengabdian'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_pengabdian/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_pengabdian/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_pengabdian','Judul Pengabdian','required');
		$this->form_validation->set_rules('tahun_pengabdian','Tahun','required');
		$this->form_validation->set_rules('sumberdana_pengabdian','Sumber Dana','required');
		$this->form_validation->set_rules('text_pengabdian','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_pengabdian']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_pengabdian','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$judul_pengabdian 		= $this->input->post('judul_pengabdian');

			$text = trim($judul_pengabdian);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_pengabdian	 	= $text;
			$tahun_pengabdian 		= $this->input->post('tahun_pengabdian');
			$sumberdana_pengabdian 	= $this->input->post('sumberdana_pengabdian');
			$text_pengabdian 		= $this->input->post('text_pengabdian');
			$data = array(
						'judul_pengabdian' => $judul_pengabdian,
						'tahun_pengabdian' => $tahun_pengabdian,
						'sumberdana_pengabdian' => $sumberdana_pengabdian,
						'text_pengabdian' => $text_pengabdian,
						'slug_pengabdian' => $slug_pengabdian,
						'status' => 1,
					);
			if (!empty($_FILES['foto_pengabdian']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/hasil_pengabdian/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pengabdian')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Penelitian & Pengabdian',
								'sub_menunya' => 'Hasil Pengabdian',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('penelitian/hasil_pengabdian/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_pengabdian'] = $image['file_name'];
	                $execute = $this->db->insert('sm_hasilpengabdian',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_pengabdian/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_pengabdian/');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_hasilpengabdian',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_pengabdian/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_pengabdian/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/hasil_pengabdian/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'datanya' => $this->db->get_where('sm_hasilpengabdian',array('id_pengabdian' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_pengabdian/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_hasilpengabdian', array('id_pengabdian' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('judul_pengabdian','Judul Pengabdian','required');
		$this->form_validation->set_rules('tahun_pengabdian','Tahun','required');
		$this->form_validation->set_rules('sumberdana_pengabdian','Sumber Dana','required');
		$this->form_validation->set_rules('text_pengabdian','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_pengabdian 		= $this->input->post('judul_pengabdian');

			$text = trim($judul_pengabdian);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_pengabdian	 	= $text;
			$tahun_pengabdian 		= $this->input->post('tahun_pengabdian');
			$sumberdana_pengabdian 	= $this->input->post('sumberdana_pengabdian');
			$text_pengabdian 		= $this->input->post('text_pengabdian');
			$data = array(
						'judul_pengabdian' => $judul_pengabdian,
						'tahun_pengabdian' => $tahun_pengabdian,
						'sumberdana_pengabdian' => $sumberdana_pengabdian,
						'text_pengabdian' => $text_pengabdian,
						'slug_pengabdian' => $slug_pengabdian,
						'status' => 1,
					);

	        if(!empty($_FILES['foto_pengabdian']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/hasil_pengabdian/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pengabdian')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Penelitian & Pengabdian',
								'sub_menunya' => 'Hasil Pengabdian',
								'datanya' => $this->db->get_where('sm_hasilpengabdian',array('id_pengabdian' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('penelitian/hasil_pengabdian/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_pengabdian != ''):
	                	unlink('./asset/backend/upload/hasil_pengabdian/'.$row_cli->foto_pengabdian);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_pengabdian'] 	= $image['file_name'];

					$execute = $this->db->update('sm_hasilpengabdian',$data,array('id_pengabdian' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_pengabdian/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_pengabdian/');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_hasilpengabdian',$data,array('id_pengabdian' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_pengabdian/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_pengabdian/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'datanya' => $this->db->get_where('sm_hasilpengabdian',array('id_pengabdian' => $id))->row(),
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/hasil_pengabdian/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->update('sm_hasilpengabdian',array('status' => 0),array('id_pengabdian' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/hasil_pengabdian/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/hasil_pengabdian/');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'datanya' => $this->db->get_where('sm_hasilpengabdian',array('id_pengabdian' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_pengabdian/detail');
		$this->load->view('partial/footer');
	}
}
