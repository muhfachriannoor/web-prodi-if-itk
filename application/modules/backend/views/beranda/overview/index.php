<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Overview Prodi
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li class="active">Overview Prodi</li>
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
              $cek = $this->db->get('overview_prodi')->num_rows();
              if($cek == 0):
            ?>
            <a href="<?= site_url('backend/beranda/overview/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <?php endif; ?>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="3%">No</th>
                  <th>Jurusan</th>
                  <th width="15%">Text</th>
                  <th width="10%">Akreditasi</th>
                  <th width="20%">Jumlah Mahasiswa</th>
                  <th>Ketua Prodi</th>
                  <th width="11%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td><?= $no+1;?></td>
                  <td><?= $tampil->jurusan;?></td>
                  <td><?= substr($tampil->text_overview, 0,10);?>...</td>
                  <td><?= $tampil->akreditasi;?></td>
                  <td><?= $tampil->jumlah_mahasiswa;?></td>
                  <td><?= $tampil->nama_dosen;?></td>
                  <td>
                    <a href="<?= site_url('backend/beranda/overview/detail/'.$tampil->id_overview);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/beranda/overview/update/'.$tampil->id_overview);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <?php if($datanya->num_rows() != 1): ?>
                    <a href="<?= site_url('backend/beranda/overview/delete/'.$tampil->id_overview);?>" onclick="return confirm('Hapus data ini?')">
                      <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                        <span class="fa fa-trash"></span>
                      </button>
                    </a>
                    <?php endif; ?>
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