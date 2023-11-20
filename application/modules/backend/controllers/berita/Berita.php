<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {
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
		$this->load->helper('tanggal_helper');
		$query = $this->db->join('m_berita_kategori', 'm_berita.idKategori = m_berita_kategori.idKategori', 'inner')->order_by('m_berita.idBerita','DESC')->get('m_berita');
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'datanya' => $query,
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		
		$this->form_validation->set_rules('judul_berita','Judul Berita','required');
		$this->form_validation->set_rules('id_kategori','Kategori','required|callback_select_validate');
		$this->form_validation->set_rules('isi_berita','Isi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_berita']['name']))
		{
			$this->form_validation->set_rules('foto_berita','Foto','required');
		}

		if($this->form_validation->run() != false){
			$judul_berita 	= $this->input->post('judul_berita');
			$tanggal_berita = date('Y-m-d H:i:s');
			$isi_berita 	= $this->input->post('isi_berita');

			$text = trim($judul_berita);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_berita 	= $text;
			$id_kategori 	= $this->input->post('id_kategori');
			$video_berita 	= $this->input->post('video_berita');

			if($video_berita != '') {
				$potong1 = substr($video_berita, 0,17);
				$potong2 = substr($video_berita, 24,5);
				if($potong1 == 'https://youtu.be/') {
					$hasil = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $video_berita);
				}elseif($potong2 == 'watch') {
					$hasil = str_replace('watch?v=', 'embed/', $video_berita);
				}else{
					$hasil = $video_berita;
				}
			}else{
				$hasil = '';
			}
			
			$data = array(
						'judul_berita' => $judul_berita,
						'tanggal_berita' => $tanggal_berita,
						'isi_berita' => $isi_berita,
						'slug_berita' => $slug_berita,
						'idKategori' => $id_kategori,
						'video_berita' => $hasil,
					);
			if (!empty($_FILES['foto_berita']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/berita/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_berita')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Berita',
								'sub_menunya' => 'Berita',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('berita/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_berita'] = $image['file_name'];
	                $execute = $this->db->insert('m_berita',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/berita/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/berita/');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('berita/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'datanya' => $this->db->get_where('m_berita',array('idBerita' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('m_berita', array('idBerita' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('judul_berita','Judul Berita','required');
		$this->form_validation->set_rules('id_kategori','Kategori','required|callback_select_validate');
		$this->form_validation->set_rules('isi_berita','Isi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_berita 	= $this->input->post('judul_berita');
			$tanggal_berita = date('Y-m-d H:i:s');
			$isi_berita 	= $this->input->post('isi_berita');

			$text = trim($judul_berita);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_berita 	= $text;
			$id_kategori 	= $this->input->post('id_kategori');
			$video_berita 	= $this->input->post('video_berita');

			if($video_berita != '') {
				$potong1 = substr($video_berita, 0,17);
				$potong2 = substr($video_berita, 24,5);
				if($potong1 == 'https://youtu.be/') {
					$hasil = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $video_berita);
				}elseif($potong2 == 'watch') {
					$hasil = str_replace('watch?v=', 'embed/', $video_berita);
				}else{
					$hasil = $video_berita;
				}
			}else{
				$hasil = '';
			}

			$data = array(
						'judul_berita' => $judul_berita,
						'tanggal_berita' => $tanggal_berita,
						'isi_berita' => $isi_berita,
						'slug_berita' => $slug_berita,
						'idKategori' => $id_kategori,
						'video_berita' => $hasil,
					);

	        if(!empty($_FILES['foto_berita']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/berita/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 450;
            	$config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_berita')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Berita',
								'sub_menunya' => 'Berita',
								'datanya' => $this->db->get_where('m_berita',array('idBerita' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('berita/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/berita/'.$row_cli->foto_berita);
	                $image    				= $this->upload->data();
	                $data['foto_berita'] 	= $image['file_name'];

					$execute = $this->db->update('m_berita',$data,array('idBerita' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/berita/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/berita/');
					}
	            }
	        }else{
				$execute = $this->db->update('m_berita',$data,array('idBerita' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/berita/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/berita/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'error' => '',
					'datanya' => $this->db->get_where('m_berita',array('idBerita' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('berita/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('m_berita', array('idBerita' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/berita/'.$row_cli->foto_berita);
      
        $execute = $this->db->delete('m_berita',array('idBerita' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/berita');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/berita');
		}
	}

	public function detail($id)
	{
		$this->load->helper('tanggal_helper');
		$query = $this->db->join('m_berita_kategori', 'm_berita.idKategori = m_berita_kategori.idKategori', 'inner')->where('m_berita.idBerita',$id)->get('m_berita');
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'datanya' => $query->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/detail');
		$this->load->view('partial/footer');
	}

	function select_validate()
	{
		$id_kategori = $this->input->post('id_kategori');
		if($id_kategori == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Kategori!');
			return false;
		}else{
			return true;
		}
	}
}
