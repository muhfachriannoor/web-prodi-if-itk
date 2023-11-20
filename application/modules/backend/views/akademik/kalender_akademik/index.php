<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kalender Akademik
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li class="active">Kalender Akademik</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert_kalender') ?>
            <a href="<?= site_url('backend/akademik/kalender_akademik/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="25%">Judul</th>
                  <th width="15%">Dari Tanggal</th>
                  <th width="15%">Sampai Tanggal</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($kalender_akademik->result() as $no => $kalender_akademik): ?>
                <tr>
                  <td><?= $no+1?>.</td>
                  <td><?= $kalender_akademik->judul_kalender;?></td>
                  <td><?= tgl_indo($kalender_akademik->start_kalender);?></td>
                  <td><?= tgl_indo($kalender_akademik->end_kalender);?></td>
                  <td>
                    <a href="<?= site_url('backend/akademik/kalender_akademik/update/'.$kalender_akademik->id_kalender);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/akademik/kalender_akademik/delete/'.$kalender_akademik->id_kalender);?>" onclick="return confirm('Hapus data ini?')">
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

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      File Kalender Akademik
      <!-- <small>advanced tables</small> -->
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <?php 
              $cek = $this->db->get('sm_kalenderakademik_file')->num_rows();
              if($cek == 0):
            ?>
            <a href="<?= site_url('backend/akademik/kalender_akademik_file/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <?php endif; ?>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="15%">Tahun Ajaran</th>
                  <th>Nama File</th>
                  <th width="20%">Tanggal Rilis</th>
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td><?= $no+1?>.</td>
                  <td><?= $tampil->tahunajar_kalender;?></td>
                  <td>
                    <a href="<?= base_url('asset/backend/upload/kalender_akademik_file/'.$tampil->kalender_file);?>" target="_blank">
                      <?= $tampil->kalender_file;?>
                    </a>
                  </td>
                  <td><?= tgl_lengkap($tampil->tglrilis_kalender);?></td>
                  <td>
                    <a href="<?= base_url('asset/backend/upload/kalender_akademik_file/'.$tampil->kalender_file);?>" target="_blank">
                      <button type="button" class="btn btn-info btn-sm" title="Lihat">
                        <span class="fa fa-eye"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/akademik/kalender_akademik_file/update/'.$tampil->id_kalender);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/akademik/kalender_akademik_file/delete/'.$tampil->id_kalender);?>" onclick="return confirm('Hapus data ini?')">
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