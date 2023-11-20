<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Silabus
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li class="active">Silabus</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <?php 
              $cek = $this->db->get('sm_silabus')->num_rows();
              if($cek == 0):
            ?>
            <a href="<?= site_url('backend/akademik/silabus/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <?php endif; ?>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Nama File</th>
                  <th width="20%">Tanggal Rilis</th>
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td><?= $no+1?>.</td>
                  <td>
                    <a href="<?= base_url('asset/backend/upload/silabus/'.$tampil->file_silabus);?>" target="_blank">
                      <?= $tampil->file_silabus;?>
                    </a>
                  </td>
                  <td><?= tgl_lengkap($tampil->tglrilis_silabus);?></td>
                  <td>
                    <a href="<?= base_url('asset/backend/upload/silabus/'.$tampil->file_silabus);?>" target="_blank">
                      <button type="button" class="btn btn-info btn-sm" title="Lihat">
                        <span class="fa fa-eye"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/akademik/silabus/update/'.$tampil->id_silabus);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/akademik/silabus/delete/'.$tampil->id_silabus);?>" onclick="return confirm('Hapus data ini?')">
                      <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                        <span class="fa fa-trash"></span>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>