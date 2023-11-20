<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Matkul Kurikulum
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Kurikulum</a></li>
      <li><a href="#"><?= $datanya->nama_detailkurikulum?></a></li>
      <li class="active">Matkul</li>
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
      <form action="<?= site_url('backend/akademik/kurikulum/matkul/up/'.$datanya->idDetailKurikulum);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('kode_matkul') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Kode Mata Kuliah <b><?= strip_tags(form_error('kode_matkul'));?></b></label>
                  <input type="text" name="kode_matkul" class="form-control" required="required" placeholder="Isi Kode Mata Kuliah...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Kode Mata Kuliah</label>
                  <input type="text" name="kode_matkul" class="form-control" required="required" placeholder="Isi Kode Mata Kuliah..." value="<?= set_value('kode_matkul');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('nama_matkul') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Mata Kuliah <b><?= strip_tags(form_error('nama_matkul'));?></b></label>
                  <input type="text" name="nama_matkul" class="form-control" required="required" placeholder="Isi Nama Mata Kuliah...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Mata Kuliah</label>
                  <input type="text" name="nama_matkul" class="form-control" required="required" placeholder="Isi Nama Mata Kuliah..." value="<?= set_value('nama_matkul');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('sks_matkul') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> SKS Mata Kuliah <b><?= strip_tags(form_error('sks_matkul'));?></b></label>
                  <input type="number" name="sks_matkul" class="form-control" required="required" placeholder="Isi Sks Mata Kuliah...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>SKS Mata Kuliah</label>
                  <input type="number" name="sks_matkul" class="form-control" required="required" placeholder="Isi Sks Mata Kuliah..." value="<?= set_value('sks_matkul');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('praktikum_matkul') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Praktikum Mata Kuliah <b><?= strip_tags(form_error('praktikum_matkul'));?></b></label>
                  <div class="form-group">
                    <label>
                      <input type="radio" name="praktikum_matkul" class="minimal" value="0" checked>
                      Tidak Ada
                    </label>
                    <label></label>
                    <label>
                      <input type="radio" name="praktikum_matkul" class="minimal" value="1">
                      Ada
                    </label>
                </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Praktikum Mata Kuliah</label>
                  <div class="form-group">
                    <label>
                      <input type="radio" name="praktikum_matkul" class="minimal" value="0" checked <?= (set_value('praktikum_matkul') == '0') ? 'checked' : '';?>>
                      Tidak Ada
                    </label>
                    <label></label>
                    <label>
                      <input type="radio" name="praktikum_matkul" class="minimal" value="1" <?= (set_value('praktikum_matkul') == '1') ? 'checked' : '';?>>
                      Ada
                    </label>
                </div>
              <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/kurikulum/semester/'.$datanya->idKurikulum);?>';return false;">Batal</button>
        </div>
      </form>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th width="2%">#</th>
              <th width="15%">Kode Mata Kuliah</th>
              <th>Nama Mata Kuliah</th>
              <th width="5%">SKS</th>
              <th width="5%">Praktikum</th>
              <th width="10%">Action</th>
            </tr>
            <?php if($matkul->num_rows() != 0): ?>
            <?php foreach($matkul->result() as $no => $matkulnya): ?>
            <tr>
              <td><?= $no+1;?></td>
              <td><?= $matkulnya->kode_matkul;?></td>
              <td><?= $matkulnya->nama_matkul;?></td>
              <td><?= $matkulnya->sks_matkul;?></td>
              <td><?= ($matkulnya->praktikum_matkul == 1) ? 'Ada' : 'Tidak Ada';?></td>
              <td>
                <a href="<?= site_url('backend/akademik/kurikulum/matkul/delete/'.$matkulnya->idMatkul);?>" onclick="return confirm('Hapus data ini?')">
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