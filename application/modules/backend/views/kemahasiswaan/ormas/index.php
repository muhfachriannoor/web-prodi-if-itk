<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Organisasi Kemahasiswaan
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li class="active">Organisasi Kemahasiswaan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <a href="<?= site_url('backend/kemahasiswaan/ormawa/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th width="15%">Nama Organisasi Kemahasiswaan</th>
                  <th width="13%">Deskripsi</th>
                  <th width="5%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($datanya->result() as $no => $tampil): ?>
                <tr>
                  <td><?= $no+1;?></td>
                  <td><?= $tampil->nama_ormas;?></td>
                  <td><?= strip_tags(substr($tampil->deskripsi_ormas, 0,50));?></td>
                  <td>
                    <a href="<?= site_url('backend/kemahasiswaan/ormawa/detail/'.$tampil->idOrmas);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/kemahasiswaan/ormawa/update/'.$tampil->idOrmas);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/kemahasiswaan/ormawa/delete/'.$tampil->idOrmas);?>" onclick="return confirm('Hapus data ini?')">
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