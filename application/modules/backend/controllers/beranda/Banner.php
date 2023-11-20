<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {
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
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'datanya' => $this->db->order_by('id_banner', 'DESC')->get('banner'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/banner/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'error' => ''
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/banner/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_banner','Judul','required');
		$this->form_validation->set_rules('text_banner','Text','required');
		$this->form_validation->set_rules('url','Link Url');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_banner']['name']))
		{
			$this->form_validation->set_rules('foto_banner','Foto','required');
		}

		if($this->form_validation->run() != false){
			$judul_banner 	= $this->input->post('judul_banner');
			$text_banner 	= $this->input->post('text_banner');
			$url 			= $this->input->post('url');
			$data = array(
						'judul_banner' => $judul_banner,
						'text_banner' => $text_banner,
						'url' => $url,
					);
			if (!empty($_FILES['foto_banner']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/banner/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 1280;
            	$config['min_height'] = 720;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_banner')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Banner',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/banner/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_banner'] = $image['file_name'];
	                $execute = $this->db->insert('banner',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/banner');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/banner');
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
			$this->load->view('beranda/banner/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'datanya' => $this->db->get_where('banner',array('id_banner' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/banner/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('banner', array('id_banner' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('judul_banner','Judul','required');
		$this->form_validation->set_rules('text_banner','Text','required');
		$this->form_validation->set_rules('url','Link Url');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_banner 	= $this->input->post('judul_banner');
			$text_banner 	= $this->input->post('text_banner');
			$url 			= $this->input->post('url');
			$data = array(
						'judul_banner' => $judul_banner,
						'text_banner' => $text_banner,
						'url' => $url,
					);

	        if(!empty($_FILES['foto_banner']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/banner/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 1280;
            	$config['min_height'] = 720;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_banner')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Banner',
								'datanya' => $this->db->get_where('banner',array('id_banner' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/banner/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/banner/'.$row_cli->foto_banner);
	                $image    				= $this->upload->data();
	                $data['foto_banner'] 	= $image['file_name'];

					$execute = $this->db->update('banner',$data,array('id_banner' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/banner');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/banner');
					}
	            }
	        }else{
	        	$execute = $this->db->update('banner',$data,array('id_banner' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/banner');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/banner');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'error' => '',
					'datanya' => $this->db->get_where('banner',array('id_banner' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/banner/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('banner', array('id_banner' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/banner/'.$row_cli->foto_banner);
      
        $execute = $this->db->delete('banner',array('id_banner' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/banner');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/banner');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Banner',
					'datanya' => $this->db->get_where('banner',array('id_banner' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/banner/detail');
		$this->load->view('partial/footer');
	}
}
