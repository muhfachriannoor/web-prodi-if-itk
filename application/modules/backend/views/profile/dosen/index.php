<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dosen dan Tenaga Pendidik
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li class="active">Dosen dan Tenaga Pendidik</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <a href="<?= site_url('backend/profile/dosen/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="15%">Foto</th>
                  <th width="15%">NIP</th>
                  <th>Nama</th>
                  <th width="13%">Jabatan</th>
                  <th width="11%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td align="center">
                    <?php if($tampil->foto_dosen != ''): ?>
                      <img src="<?= base_url('asset/backend/upload/dosen/'.$tampil->foto_dosen);?>" alt="" class="img-responsive" style="width: 250px; height: 150px; object-fit: cover;">
                    <?php else: ?>
                      <img src="<?= base_url('asset/backend/upload/default-user.png');?>" alt="" class="img-rounded" style="width: 100px; height: 150px; object-fit: cover;">
                    <?php endif; ?>
                  </td>
                  <td><?= $tampil->nip_dosen;?></td>
                  <td><?= $tampil->nama_dosen;?></td>
                  <td><?= $tampil->jabatan_dosen;?></td>
                  <td>
                    <?php if($this->session->userdata('akses') != '2' OR $this->session->userdata('email') == $tampil->email_dosen): ?>
                    <a href="<?= site_url('backend/profile/dosen/detail/'.$tampil->idDosen);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/profile/dosen/update/'.$tampil->idDosen);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/profile/dosen/delete/'.$tampil->idDosen);?>" onclick="return confirm('Hapus data ini?')">
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