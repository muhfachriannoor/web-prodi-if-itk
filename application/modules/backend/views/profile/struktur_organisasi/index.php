<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Struktur Organisasi
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li class="active">Struktur Organisasi</li>
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
              $cek = $this->db->get('sm_strukturorganisasi')->num_rows();
              if($cek == 0):
            ?>
            <a href="<?= site_url('backend/profile/struktur_organisasi/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <?php endif; ?>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th width="2%">No</th>
                <th>Foto</th>
                <th width="10%">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($datanya->result() as $no => $tampil): ?>
              <tr>
                <td><?= $no+1?>.</td>
                <td align="center">
                  <img src="<?= base_url('asset/backend/upload/struktur_organisasi/'.$tampil->struktur_file);?>" alt="" class="img-responsive" style="width: 500px; height: 200px; object-fit: cover;">
                </td>
                <td>
                  <a href="<?= site_url('backend/profile/struktur_organisasi/update/'.$tampil->id_strukturorganisasi);?>">
                    <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                      <span class="fa fa-edit"></span>
                    </button>
                  </a>
                  <a href="<?= site_url('backend/profile/struktur_organisasi/delete/'.$tampil->id_strukturorganisasi);?>" onclick="return confirm('Hapus data ini?')">
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