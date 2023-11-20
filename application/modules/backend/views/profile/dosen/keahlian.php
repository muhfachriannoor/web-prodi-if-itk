<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Dosen dan Tenaga Pendidik
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Dosen dan Tenaga Pendidik</a></li>
      <li><a href="#">Info Dosen dan Tenaga Pendidik</a></li>
      <li class="active">Keahlian</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <?= $this->session->flashdata('alert') ?>
        <h3 class="box-title">Form Tambah</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <form action="<?= site_url('backend/profile/dosen/keahlian/up/'.$datanya->idDosen);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('nama_keahlian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Keahlian <b><?= strip_tags(form_error('nama_keahlian'));?></b></label>
                  <input type="text" name="nama_keahlian" class="form-control" required="required" placeholder="Isi Nama Keahlian...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Keahlian</label>
                  <input type="text" name="nama_keahlian" class="form-control" required="required" placeholder="Isi Nama Keahlian..." value="<?= set_value('nama_keahlian');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/dosen/detail/'.$datanya->idDosen);?>';return false;">Batal</button>
        </div>
      </form>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th width="2%">#</th>
              <th>Nama Keahlian</th>
              <th width="10%">Action</th>
            </tr>
            <?php if($keahlian->num_rows() != 0): ?>
            <?php foreach($keahlian->result() as $no => $keahliannya): ?>
            <tr>
              <td><?= $no+1;?></td>
              <td><?= $keahliannya->nama_keahlian;?></td>
              <td>
                <a href="<?= site_url('backend/profile/dosen/keahlian/delete/'.$keahliannya->idKeahlian);?>" onclick="return confirm('Hapus data ini?')">
                  <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                    <span class="fa fa-trash"></span>
                  </button>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
              <tr class="odd">
                <td align="center" valign="top" colspan="3">Tidak ada Data!</td>
              </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>