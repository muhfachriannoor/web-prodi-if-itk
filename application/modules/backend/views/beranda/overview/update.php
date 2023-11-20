<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Overview Prodi
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Overview Prodi</a></li>
      <li class="active">Ubah Overview Prodi</li>
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
      <form action="<?= site_url('backend/beranda/overview/update/down/'.$datanya->id_overview);?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('jurusan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Jurusan <b><?= strip_tags(form_error('jurusan'));?></b></label>
                  <input type="text" name="jurusan" class="form-control" required="required" placeholder="Isi Nama Jurusan..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Jurusan</label>
                  <input type="text" name="jurusan" class="form-control" required="required" placeholder="Isi Nama Jurusan..." value="<?= $datanya->jurusan;;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('akreditasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Akreditasi <b><?= strip_tags(form_error('akreditasi'));?></b></label>
                  <input type="text" name="akreditasi" class="form-control" required="required" placeholder="Isi Akreditasi..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Akreditasi</label>
                  <input type="text" name="akreditasi" class="form-control" required="required" placeholder="Isi Akreditasi..." value="<?= $datanya->akreditasi;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('jumlah_mahasiswa') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jumlah Mahasiswa <b><?= strip_tags(form_error('jumlah_mahasiswa'));?></b></label>
                  <input type="text" name="jumlah_mahasiswa" class="form-control" required="required" placeholder="Isi Jumlah Mahasiswa..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jumlah Mahasiswa</label>
                  <input type="number" name="jumlah_mahasiswa" class="form-control" required="required" placeholder="Isi Jumlah Mahasiswa..." value="<?= $datanya->jumlah_mahasiswa;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Link Url Youtube</label>
                <input type="text" name="url_youtube" class="form-control" placeholder="https://www.youtube.com/embed/ZpHg0ABxm3s" value="<?= $datanya->url_youtube;?>">
              </div>
            </div>
            <div class="col-md-4">
              <?php if(form_error('idDosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Ketua Prodi <b><?= strip_tags(form_error('idDosen'));?></b></label>
                  <select name="idDosen" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH KETUA PRODI --</option>
                    <?php
                      $dosen = $this->db->get('sm_dosen');
                      foreach($dosen->result() as $no => $dosen):
                    ?>
                    <option value="<?= $dosen->idDosen;?>" <?= (set_value('idDosen') == $dosen->idDosen) ? 'selected="selected"' : '';?>><?= $dosen->nama_dosen;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Ketua Prodi</label>
                  <select name="idDosen" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH KETUA PRODI --</option>
                  <?php
                    $dosen = $this->db->get('sm_dosen');
                    foreach($dosen->result() as $no => $dosen):
                  ?>
                  <option value="<?= $dosen->idDosen;?>" <?= ($datanya->idDosen == $dosen->idDosen) ? 'selected="selected"' : '';?>><?= $dosen->nama_dosen;?></option>
                  <?php endforeach; ?>
                </select>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if($error == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 450 x 450</code> <?= strip_tags(form_error('foto_overview'));?></label>
                  <input type="file" name="foto_overview" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 450 x 450</code></label>
                  <input type="file" name="foto_overview" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_overview') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_overview'));?></b></label>
                  <textarea name="text_overview" class="form-control" required="required" placeholder="Isi Text..." rows="5"></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea name="text_overview" class="form-control" required="required" placeholder="Isi Text..." rows="5"><?= $datanya->text_overview;?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/overview');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>