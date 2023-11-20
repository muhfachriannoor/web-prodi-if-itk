<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Galeri
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li class="active">Galeri</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <a href="<?= site_url('backend/beranda/galeri/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="2%">No</th>
                    <th>Foto</th>
                    <th width="12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($datanya->result() as $no => $tampil): ?>
                  <tr>
                    <td><?= $no+1;?></td>
                    <td>
                      <img src="<?= base_url('asset/backend/upload/galeri/'.$tampil->foto_galeri);?>" alt="" class="img-responsive" style="width: 300px; height: 200px; object-fit: cover;">
                    </td>
                    <td>
                      <a href="<?= site_url('backend/beranda/galeri/update/'.$tampil->id_galeri);?>">
                        <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                          <span class="fa fa-edit"></span>
                        </button>
                      </a>
                      <a href="<?= site_url('backend/beranda/galeri/delete/'.$tampil->id_galeri);?>" onclick="return confirm('Hapus data ini?')">
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