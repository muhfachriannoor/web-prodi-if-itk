<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Program Kreativitas Mahasiswa
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Program Kreativitas Mahasiswa</a></li>
      <li class="active">Ubah Program Kreativitas Mahasiswa</li>
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
      <form action="<?= site_url('backend/kemahasiswaan/pkm/update/down/'.$datanya->idPKM);?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
            <?= $error; ?>
          </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('nama_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Program <b><?= strip_tags(form_error('nama_pkm'));?></b></label>
                  <input type="text" name="nama_pkm" class="form-control" required="required" placeholder="Isi Nama Program...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Program</label>
                  <input type="text" name="nama_pkm" class="form-control" required="required" placeholder="Isi Nama Program..." value="<?= $datanya->nama_pkm;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('jenis_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jenis <b><?= strip_tags(form_error('jenis_pkm'));?></b></label>
                  <input type="text" name="jenis_pkm" class="form-control" required="required" placeholder="Isi Jenis...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" name="jenis_pkm" class="form-control" required="required" placeholder="Isi Jenis..." value="<?= $datanya->jenis_pkm;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('tahun_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun <b><?= strip_tags(form_error('tahun_pkm'));?></b></label>
                  <input type="number" name="tahun_pkm" class="form-control" required="required" placeholder="20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="number" name="tahun_pkm" class="form-control" required="required" placeholder="20xx" value="<?= $datanya->tahun_pkm;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('ketua_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Ketua <b><?= strip_tags(form_error('ketua_pkm'));?></b></label>
                  <input type="text" name="ketua_pkm" class="form-control" required="required" placeholder="Isi Ketua...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Ketua</label>
                  <input type="text" name="ketua_pkm" class="form-control" required="required" placeholder="Isi Ketua..." value="<?= $datanya->ketua_pkm;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 800 x 600</code> <b><?= strip_tags(form_error('foto_pkm'));?></b></label>
                  <input type="file" name="foto_pkm" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 800 x 600</code></label>
                  <input type="file" name="foto_pkm" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('anggota_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Anggota <code>*(NIM) NAMA</code> <b><?= strip_tags(form_error('anggota_pkm'));?></b></label>
                  <textarea id="editor1" name="anggota_pkm" rows="10" cols="80" required="required" placeholder="Isi Anggota...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Anggota <code>*(NIM) NAMA</code></label>
                  <textarea id="editor1" name="anggota_pkm" rows="10" cols="80" required="required" placeholder="Isi Anggota....">
                    <?= $datanya->anggota_pkm;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_pkm') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Deskripsi <b><?= strip_tags(form_error('text_pkm'));?></b></label>
                  <textarea id="editor2" name="text_pkm" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea id="editor2" name="text_pkm" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= $datanya->text_pkm;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/pkm');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>