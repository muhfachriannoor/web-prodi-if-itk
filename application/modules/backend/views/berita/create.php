<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Berita
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Berita</a></li>
      <li><a href="#">Berita</a></li>
      <li class="active">Tambah Berita</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <form action="<?= site_url('backend/berita/create/up');?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
            <?= $error; ?>
          </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <?php if(form_error('judul_berita') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul Berita <b><?= strip_tags(form_error('judul_berita'));?></b></label>
                  <input type="text" name="judul_berita" class="form-control" required="required" placeholder="Isi Judul Berita...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul Berita</label>
                  <input type="text" name="judul_berita" class="form-control" required="required" placeholder="Isi Judul Berita..." value="<?= set_value('judul_berita');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('id_kategori') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Kategori <b><?= strip_tags(form_error('id_kategori'));?></b></label>
                  <select name="id_kategori" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH KATEGORI --</option>
                    <?php
                      $kategori = $this->db->get('m_berita_kategori');
                      foreach($kategori->result() as $no => $kategori):
                    ?>
                    <option value="<?= $kategori->idKategori;?>"><?= $kategori->nama_kategori;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH KATEGORI --</option>
                    <?php
                      $kategori = $this->db->get('m_berita_kategori');
                      foreach($kategori->result() as $no => $kategori):
                    ?>
                    <option value="<?= $kategori->idKategori;?>" <?= (set_value('id_kategori') == $kategori->idKategori) ? 'selected="selected"' : '';?>><?= $kategori->nama_kategori;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Link Url Youtube</label>
                <input type="text" name="video_berita" class="form-control" placeholder="https://www.youtube.com/embed/ZpHg0ABxm3s" value="<?= set_value('video_berita');?>">
              </div>
            </div>
            <div class="col-md-3">
              <?php if($error == TRUE OR form_error('foto_berita') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 900 x 540</code> <b><?= strip_tags(form_error('foto_berita'));?></b></label>
                  <input type="file" name="foto_berita" class="form-control" required="required">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 900 x 540</code></label>
                  <input type="file" name="foto_berita" class="form-control" required="required">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('isi_berita') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Isi <b><?= strip_tags(form_error('isi_berita'));?></b></label>
                  <textarea id="editor1" name="isi_berita" rows="10" cols="80" required="required" placeholder="Isi Berita...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Isi</label>
                  <textarea id="editor1" name="isi_berita" rows="10" cols="80" required="required" placeholder="Isi Berita....">
                    <?= set_value('isi_berita');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/berita');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>