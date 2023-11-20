<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Profile Lulusan
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Profile Lulusan</a></li>
      <li class="active">Ubah Profile Lulusan</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Ubah</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <form action="<?= site_url('backend/akademik/profile_lulusan/update/down/'.$datanya->idProfillulusan);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('nama_profil') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Profil <b><?= strip_tags(form_error('nama_profil'));?></b></label>
                  <input type="text" name="nama_profil" class="form-control" required="required" placeholder="Isi Nama Profil...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Profil</label>
                  <input type="text" name="nama_profil" class="form-control" required="required" placeholder="Isi Nama Profil..." value="<?= $datanya->profil;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('capaian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Capaian Pembelajaran <b><?= strip_tags(form_error('capaian'));?></b></label>
                  <textarea id="editor1" name="capaian" rows="10" cols="80" required="required" placeholder="Isi Capaian Pembelajaran...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Capaian Pembelajaran</label>
                  <textarea id="editor1" name="capaian" rows="10" cols="80" required="required" placeholder="Isi Capaian Pembelajaran....">
                    <?= $datanya->capaian;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/profile_lulusan');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>