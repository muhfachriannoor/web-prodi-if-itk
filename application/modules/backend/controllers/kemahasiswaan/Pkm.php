<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkm extends MY_Controller {
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
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'datanya' => $this->db->where('status',1)->order_by('idPKM','DESC')->get('sm_pkm'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/pkm/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/pkm/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_pkm','Nama Program Kreativitas Mahasiswa','required');
		$this->form_validation->set_rules('jenis_pkm','Jenis','required');
		$this->form_validation->set_rules('tahun_pkm','Tahun','required');
		$this->form_validation->set_rules('ketua_pkm','Tahun','required');
		$this->form_validation->set_rules('anggota_pkm','Tahun','required');
		$this->form_validation->set_rules('text_pkm','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_pkm']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_pkm','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_pkm		 = $this->input->post('nama_pkm');

			$text = trim($nama_pkm);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
			
			$slug_pkm 		= $text;
			$jenis_pkm		 = $this->input->post('jenis_pkm');
			$tahun_pkm		 = $this->input->post('tahun_pkm');
			$ketua_pkm		 = $this->input->post('ketua_pkm');
			$anggota_pkm	 = $this->input->post('anggota_pkm');
			$text_pkm 		 = $this->input->post('text_pkm');
			$data = array(
						'nama_pkm' => $nama_pkm,
						'jenis_pkm' => $jenis_pkm,
						'tahun_pkm' => $tahun_pkm,
						'ketua_pkm' => $ketua_pkm,
						'anggota_pkm' => $anggota_pkm,
						'text_pkm' => $text_pkm,
						'slug_pkm' => $slug_pkm,
						'status' => 1,
					);
			if (!empty($_FILES['foto_pkm']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/pkm/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 800;
            	$config['min_height'] = 600;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pkm')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Program Kreativitas Mahasiswa',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/pkm/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_pkm'] = $image['file_name'];
	                $execute = $this->db->insert('sm_pkm',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/pkm');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/pkm');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_pkm',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/pkm');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/pkm');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/pkm/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'datanya' => $this->db->get_where('sm_pkm',array('idPKM' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/pkm/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_pkm', array('idPKM' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_pkm','Nama Program Kreativitas Mahasiswa','required');
		$this->form_validation->set_rules('jenis_pkm','Jenis','required');
		$this->form_validation->set_rules('tahun_pkm','Tahun','required');
		$this->form_validation->set_rules('ketua_pkm','Tahun','required');
		$this->form_validation->set_rules('anggota_pkm','Tahun','required');
		$this->form_validation->set_rules('text_pkm','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$nama_pkm		 = $this->input->post('nama_pkm');

			$text = trim($nama_pkm);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
			
			$slug_pkm 		= $text;
			$jenis_pkm		 = $this->input->post('jenis_pkm');
			$tahun_pkm		 = $this->input->post('tahun_pkm');
			$ketua_pkm		 = $this->input->post('ketua_pkm');
			$anggota_pkm	 = $this->input->post('anggota_pkm');
			$text_pkm 		 = $this->input->post('text_pkm');
			$data = array(
						'nama_pkm' => $nama_pkm,
						'jenis_pkm' => $jenis_pkm,
						'tahun_pkm' => $tahun_pkm,
						'ketua_pkm' => $ketua_pkm,
						'anggota_pkm' => $anggota_pkm,
						'text_pkm' => $text_pkm,
						'slug_pkm' => $slug_pkm,
						'status' => 1,
					);

	        if(!empty($_FILES['foto_pkm']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/pkm/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 350;
            	$config['min_height'] = 350;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pkm')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Program Kreativitas Mahasiswa',
								'datanya' => $this->db->get_where('sm_pkm',array('idPKM' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/pkm/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_pkm != ''):
	                	unlink('./asset/backend/upload/pkm/'.$row_cli->foto_pkm);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_pkm'] 	= $image['file_name'];

					$execute = $this->db->update('sm_pkm',$data,array('idPKM' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/pkm');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/pkm');
					}
	            }
	        }else{
	        	$execute = $this->db->update('sm_pkm',$data,array('idPKM' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/pkm');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/pkm');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'error' => '',
					'datanya' => $this->db->get_where('sm_pkm',array('idPKM' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/pkm/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->update('sm_pkm',array('status' => 0),array('idPKM' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/pkm');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/pkm');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'datanya' => $this->db->get_where('sm_pkm',array('idPKM' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/pkm/detail');
		$this->load->view('partial/footer');
	}
}
