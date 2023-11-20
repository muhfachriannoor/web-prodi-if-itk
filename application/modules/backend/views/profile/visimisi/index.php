<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Visi, Misi, Tujuan, dan Moto
      <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li class="active">Visi, Misi, Tujuan, dan Moto</li>
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
              $cek = $this->db->get('sm_visimisitujuanmotto')->num_rows();
              if($cek == 0):
            ?>
            <a href="<?= site_url('backend/profile/visimisi/create');?>"><button class="btn btn-success">Tambah Data</button></a>
            <?php endif; ?>
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th width="2%">No</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Tujuan</th>
                <th>Motto</th>
                <th width="10%">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($datanya->result() as $no => $tampil): ?>
              <tr>
                <td><?= $no+1?>.</td>
                <td><?= strip_tags(substr($tampil->visi_text, 0,50));?></td>
                <td><?= strip_tags(substr($tampil->misi_text, 0,50));?></td>
                <td><?= strip_tags(substr($tampil->tujuan_text, 0,50));?></td>
                <td><?= strip_tags(substr($tampil->motto_text, 0,50));?></td>
                <td>
                  <a href="<?= site_url('backend/profile/visimisi/update/'.$tampil->id_visimisi);?>">
                    <button type="button" class="btn btn-warning btn-sm" title="Ubah">
                      <span class="fa fa-edit"></span>
                    </button>
                  </a>
                  <a href="<?= site_url('backend/profile/visimisi/delete/'.$tampil->id_visimisi);?>" onclick="return confirm('Hapus data ini?')">
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