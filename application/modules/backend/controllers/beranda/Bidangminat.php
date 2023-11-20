<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidangminat extends MY_Controller {
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
					'sub_menunya' => 'Bidang Minat',
					'datanya' => $this->db->order_by('idBidangminat','DESC')->get('sm_bidangminat'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/bidangminat/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Bidang Minat',
					'error' => ''
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/bidangminat/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_bidangminat','Nama Bidang Minat','required');
		$this->form_validation->set_rules('text_bidangminat','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_bidangminat']['name']))
		{
			$this->form_validation->set_rules('foto_bidangminat','Foto','required');
		}

		if($this->form_validation->run() != false){
			$nama_bidangminat 	= $this->input->post('nama_bidangminat');
			$text_bidangminat 	= $this->input->post('text_bidangminat');

			$text = trim($nama_bidangminat);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_bidangminat 	= $text;

			$data = array(
						'nama_bidangminat' => $nama_bidangminat,
						'text_bidangminat' => $text_bidangminat,
						'slug_bidangminat' => $slug_bidangminat,
					);
			if (!empty($_FILES['foto_bidangminat']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/bidangminat/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 320;
            	$config['min_height'] = 200;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_bidangminat')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Bidang Minat',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/bidangminat/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_bidangminat'] = $image['file_name'];
	                $execute = $this->db->insert('sm_bidangminat',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/bidangminat');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/bidangminat');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Bidang Minat',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/bidangminat/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Bidang Minat',
					'datanya' => $this->db->get_where('sm_bidangminat',array('idBidangminat' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/bidangminat/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_bidangminat', array('idBidangminat' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_bidangminat','Nama Bidang Minat','required');
		$this->form_validation->set_rules('text_bidangminat','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$nama_bidangminat 	= $this->input->post('nama_bidangminat');
			$text_bidangminat 	= $this->input->post('text_bidangminat');

			$text = trim($nama_bidangminat);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_bidangminat 	= $text;
			
			$data = array(
						'nama_bidangminat' => $nama_bidangminat,
						'text_bidangminat' => $text_bidangminat,
						'slug_bidangminat' => $slug_bidangminat,
					);

	        if(!empty($_FILES['foto_bidangminat']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/bidangminat/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 320;
            	$config['min_height'] = 200;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_bidangminat')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Bidang Minat',
								'datanya' => $this->db->get_where('sm_bidangminat',array('idBidangminat' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/bidangminat/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/bidangminat/'.$row_cli->foto_bidangminat);
	                $image    				= $this->upload->data();
	                $data['foto_bidangminat'] 	= $image['file_name'];

					$execute = $this->db->update('sm_bidangminat',$data,array('idBidangminat' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/bidangminat');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/bidangminat');
					}
	            }
	        }else{
	        	$execute = $this->db->update('sm_bidangminat',$data,array('idBidangminat' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/bidangminat');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/bidangminat');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Bidang Minat',
					'error' => '',
					'datanya' => $this->db->get_where('sm_bidangminat',array('idBidangminat' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/bidangminat/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('sm_bidangminat', array('idBidangminat' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/bidangminat/'.$row_cli->foto_bidangminat);
      
        $execute = $this->db->delete('sm_bidangminat',array('idBidangminat' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/bidangminat');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/bidangminat');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Bidang Minat',
					'datanya' => $this->db->get_where('sm_bidangminat',array('idBidangminat' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/bidangminat/detail');
		$this->load->view('partial/footer');
	}
}
