<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Keketatan
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li class="active">Keketatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?= $this->session->flashdata('alert') ?>
            <a href="<?= site_url('backend/beranda/keketatan/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Jalur</th>
                  <th>Tahun</th>
                  <th>Kuota</th>
                  <th>Peminat</th>
                  <th>Hasil</th>
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($datanya->result() as $no => $tampil):
                      if($tampil->jalur_keketatan == 'SBMPTN' OR $tampil->jalur_keketatan == 'SNMPTN' OR $tampil->jalur_keketatan == 'Mandiri'):
                        $hasil = ($tampil->kuota_keketatan / $tampil->peminat_keketatan) * 100;
                  ?>
                <tr>
                  <td><?= $no+1;?></td>
                  <td><?= $tampil->jalur_keketatan;?></td>
                  <td><?= $tampil->tahun_keketatan;?></td>
                  <td><?= $tampil->kuota_keketatan;?></td>
                  <td><?= $tampil->peminat_keketatan;?></td>
                  <td>
                    <?= ceil($hasil);?>%
                  </td>
                  <td>
                    <!-- <a href="<?= site_url('backend/beranda/keketatan/detail/'.$tampil->idKeketatan);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a> -->
                    <a href="<?= site_url('backend/beranda/keketatan/update/'.$tampil->idKeketatan);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/beranda/keketatan/delete/'.$tampil->idKeketatan);?>" onclick="return confirm('Hapus data ini?')">
                      <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                        <span class="fa fa-trash"></span>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php endif; endforeach; ?>
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
      UTBK
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
            <a href="<?= site_url('backend/beranda/keketatan/create2');?>"><button class="btn btn-success">Tambah Data</button></a>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="data-table2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No</th>
                  <th>Tahun</th>
                  <th>Nilai</th>
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($datanya->result() as $no => $tampil):
                      if($tampil->jalur_keketatan == 'UTBK'):
                  ?>
                <tr>
                  <td><?= $no+1;?></td>
                  <td><?= $tampil->tahun_keketatan;?></td>
                  <td><?= $tampil->nilai;?></td>
                  <td>
                    <!-- <a href="<?= site_url('backend/beranda/keketatan/detail/'.$tampil->idKeketatan);?>">
                      <button type="button" class="btn btn-info btn-sm" title="Info">
                        <span class="fa fa-info"></span>
                      </button>
                    </a> -->
                    <a href="<?= site_url('backend/beranda/keketatan/update2/'.$tampil->idKeketatan);?>">
                      <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                        <span class="fa fa-edit"></span>
                      </button>
                    </a>
                    <a href="<?= site_url('backend/beranda/keketatan/delete2/'.$tampil->idKeketatan);?>" onclick="return confirm('Hapus data ini?')">
                      <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                        <span class="fa fa-trash"></span>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php endif; endforeach; ?>
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