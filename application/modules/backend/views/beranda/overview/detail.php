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
      <li class="active">Info Dosen dan Tenaga Pendidik</li>
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
          <div class="col-md-4">
            <img src="<?= base_url('asset/backend/upload/overview/'.$datanya->foto_overview);?>" alt="" class="img-rounded" style="width: 250px; height: 300px; object-fit: cover;">
          </div>
          <div class="col-md-8">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="30%">Nama Jurusan</td>
                  <td><b><?= $datanya->jurusan;?></b></td>
                </tr>
                <tr>
                  <td width="30%">Akreditasi</td>
                  <td><b><?= $datanya->akreditasi;?></b></td>
                </tr>
                <tr>
                  <td width="30%">Jumlah Mahasiswa</td>
                  <td><b><?= $datanya->jumlah_mahasiswa;?></b></td>
                </tr>
                <tr>
                  <td width="30%">Ketua Prodi</td>
                  <td><b><?= $datanya->nama_dosen;?></b></td>
                </tr>
                <tr>
                  <td width="30%">Text</td>
                  <td><b><?= $datanya->text_overview;?></b></td>
                </tr>
                <tr>
                  <td width="30%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/overview');?>';return false;">Kembali</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php if($datanya->url_youtube != ''): ?>
          <br>
          <div class="row">
            <div class="col-md-12 text-center">
              <iframe src="<?= $datanya->url_youtube;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%; height: 480px;"></iframe>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>