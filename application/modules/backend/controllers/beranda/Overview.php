<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends MY_Controller {
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
		$query = $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->get('overview_prodi');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Overview Prodi',
					'datanya' => $query,
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/overview/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Overview Prodi',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/overview/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('jurusan','Nama Jurusan','required');
		$this->form_validation->set_rules('akreditasi','Akreditasi','required');
		$this->form_validation->set_rules('jumlah_mahasiswa','Jumlah Mahasiswa','required');
		$this->form_validation->set_rules('idDosen','Ketua Prodi','required|callback_select_validate');
		$this->form_validation->set_rules('text_overview','Text','required');
		$this->form_validation->set_rules('url_youtube','Link Url Youtube');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_overview']['name']))
		{
			$this->form_validation->set_rules('foto_overview','Foto','required');
		}

		if($this->form_validation->run() != false){
			$jurusan 				= $this->input->post('jurusan');
			$akreditasi 			= $this->input->post('akreditasi');
			$jumlah_mahasiswa 		= $this->input->post('jumlah_mahasiswa');
			$text_overview 			= $this->input->post('text_overview');
			$url 					= $this->input->post('url_youtube');
			$idDosen 				= $this->input->post('idDosen');

			if($url != '') {
				$potong1 = substr($url, 0,17);
				$potong2 = substr($url, 24,5);
				if($potong1 == 'https://youtu.be/') {
					$hasil = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $url);
				}elseif($potong2 == 'watch') {
					$hasil = str_replace('watch?v=', 'embed/', $url);
				}else{
					$hasil = $url;
				}
			}else{
				$hasil = '';
			}

			$data = array(
						'jurusan' => $jurusan,
						'akreditasi' => $akreditasi,
						'jumlah_mahasiswa' => $jumlah_mahasiswa,
						'text_overview' => $text_overview,
						'url_youtube' => $hasil,
						'idDosen' => $idDosen,
					);
			if (!empty($_FILES['foto_overview']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/overview/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 450;
            	$config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_overview')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Overview Prodi',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/overview/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_overview'] = $image['file_name'];
	                $execute = $this->db->insert('overview_prodi',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/overview');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/overview');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/overview/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Overview Prodi',
					'datanya' => $this->db->get_where('overview_prodi',array('id_overview' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/overview/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('overview_prodi', array('id_overview' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('jurusan','Nama Jurusan','required');
		$this->form_validation->set_rules('akreditasi','Akreditasi','required');
		$this->form_validation->set_rules('jumlah_mahasiswa','Jumlah Mahasiswa','required');
		$this->form_validation->set_rules('idDosen','Ketua Prodi','required|callback_select_validate');
		$this->form_validation->set_rules('text_overview','Text','required');
		$this->form_validation->set_rules('url_youtube','Link Url Youtube');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$jurusan 				= $this->input->post('jurusan');
			$akreditasi 			= $this->input->post('akreditasi');
			$jumlah_mahasiswa 		= $this->input->post('jumlah_mahasiswa');
			$text_overview 			= $this->input->post('text_overview');
			$url 					= $this->input->post('url_youtube');
			$idDosen 				= $this->input->post('idDosen');

			if($url != '') {
				$potong1 = substr($url, 0,17);
				$potong2 = substr($url, 24,5);
				if($potong1 == 'https://youtu.be/') {
					$hasil = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $url);
				}elseif($potong2 == 'watch') {
					$hasil = str_replace('watch?v=', 'embed/', $url);
				}else{
					$hasil = $url;
				}
			}else{
				$hasil = '';
			}
			
			$data = array(
						'jurusan' => $jurusan,
						'akreditasi' => $akreditasi,
						'jumlah_mahasiswa' => $jumlah_mahasiswa,
						'text_overview' => $text_overview,
						'url_youtube' => $hasil,
						'idDosen' => $idDosen,
					);

	        if(!empty($_FILES['foto_overview']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/overview/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 450;
            	$config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_overview')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Overview Prodi',
								'datanya' => $this->db->get_where('overview_prodi',array('id_overview' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/overview/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/overview/'.$row_cli->foto_overview);
	                $image    				= $this->upload->data();
	                $data['foto_overview'] 	= $image['file_name'];

					$execute = $this->db->update('overview_prodi',$data,array('id_overview' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/overview');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/overview');
					}
	            }
	        }else{
				$execute = $this->db->update('overview_prodi',$data,array('id_overview' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/overview');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/overview');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Overview Prodi',
					'error' => '',
					'datanya' => $this->db->get_where('overview_prodi',array('id_overview' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/overview/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('overview_prodi', array('id_overview' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/overview/'.$row_cli->foto_overview);
      
        $execute = $this->db->delete('overview_prodi',array('id_overview' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/overview');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/overview');
		}
	}

	public function detail($id)
	{
		$query = $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->where('overview_prodi.id_overview',$id)->get('overview_prodi');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Overview Prodi',
					'datanya' => $query->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/overview/detail');
		$this->load->view('partial/footer');
	}

	function select_validate()
	{
		$idDosen = $this->input->post('idDosen');
		if($idDosen == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Ketua Prodi!');
			return false;
		}else{
			return true;
		}
	}
}
