<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Berita
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Berita</a></li>
      <li><a href="#">Berita</a></li>
      <li class="active">Info Berita</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Info</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-5">
            <img src="<?= base_url('asset/backend/upload/berita/'.$datanya->foto_berita);?>" alt="" class="img-rounded" style="width: 100%; height: 500px; object-fit: cover;">
          </div>
          <div class="col-md-7">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td width="20%">Judul Berita</td>
                    <td><b><?= $datanya->judul_berita;?></b></td>
                  </tr>
                  <tr>
                    <td width="20%">Tanggal</td>
                    <td><b><?= tgl_lengkap($datanya->tanggal_berita);?></b></td>
                  </tr>
                  <tr>
                    <td width="20%">Kategori</td>
                    <td><b><?= $datanya->nama_kategori;?></b></td>
                  </tr>
                  <tr>
                    <td width="20%">Isi</td>
                    <td><b><?= strip_tags($datanya->isi_berita);?></b></td>
                  </tr>
                  <tr>
                    <td width="20%">
                      <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/berita');?>';return false;">Kembali</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php if($datanya->video_berita != ''): ?>
          <br>
          <div class="row">
            <div class="col-md-12 text-center">
              <iframe src="<?= $datanya->video_berita;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%; height: 480px;"></iframe>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>