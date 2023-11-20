<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Alumni
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li class="active">Alumni</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <a href="<?= site_url('backend/kemahasiswaan/alumni/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="15%">Foto</th>
                  <th width="15%">NIM</th>
                  <th>Nama</th>
                  <th width="13%">Tahun Masuk</th>
                  <th width="13%">Tahun Lulus</th>
                  <th width="11%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td align="center">
                    <img src="<?= base_url('asset/backend/upload/alumni/'.$tampil->foto_alumni);?>" alt="" class="img-responsive" style="width: 250px; height: 150px; object-fit: cover;">
                  </td>
                  <td><?= $tampil->nim_alumni;?></td>
                  <td><?= $tampil->nama_alumni;?></td>
                  <td><?= $tampil->tahunmasuk_alumni;?></td>
                  <td><?= $tampil->tahunlulus_alumni;?></td>
                  <td>
                    <a href="<?= site_url('backend/kemahasiswaan/alumni/detail/'.$tampil->nim_alumni);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/kemahasiswaan/alumni/update/'.$tampil->nim_alumni);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/kemahasiswaan/alumni/delete/'.$tampil->nim_alumni);?>" onclick="return confirm('Hapus data ini?')">
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