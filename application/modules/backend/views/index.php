<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>
    <?= $this->session->flashdata('alert');?>
     <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $banner;?></h3>
              <p>Banner</p>
            </div>
            <div class="icon">
              <i class="ion ion-images"></i>
            </div>
            <a href="<?= site_url('backend/beranda/banner');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?= $galeri;?></h3>
              <p>Galeri</p>
            </div>
            <div class="icon">
              <i class="ion ion-images"></i>
            </div>
            <a href="<?= site_url('backend/beranda/galeri');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $beasiswa;?></h3>
              <p>Beasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= site_url('backend/beranda/beasiswa');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $bidangminat;?></h3>
              <p>Bidang Minat</p>
            </div>
            <div class="icon">
              <i class="fa fa-institution"></i>
            </div>
            <a href="<?= site_url('backend/beranda/bidangminat');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $pengumuman;?></h3>
              <p>Pengumuman</p>
            </div>
            <div class="icon">
              <i class="fa fa-bullhorn"></i>
            </div>
            <a href="<?= site_url('backend/beranda/pengumuman');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?= $kegiatan;?></h3>
              <p>Kegiatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="<?= site_url('backend/beranda/kegiatan');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $berita;?></h3>
              <p>Berita</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="<?= site_url('backend/berita');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $dosen;?><h3>
              <p>Dosen dan Tenaga Pendidik</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
            <a href="<?= site_url('backend/profile/dosen');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-lime">
            <div class="inner">
              <h3><?= $laboratorium?></h3>
              <p>Laboratorium</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="<?= site_url('backend/akademik/laboratorium');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-fuchsia">
            <div class="inner">
              <h3><?= $profilelulusan?></h3>
              <p>Profile Lulusan</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= site_url('backend/akademik/profile_lulusan');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3><?= $ormas;?></h3>
              <p>Organisasi Kemahasiswaan</p>
            </div>
            <div class="icon">
              <i class="fa fa-sitemap"></i>
            </div>
            <a href="<?= site_url('backend/kemahasiswaan/ormawa');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-navy">
            <div class="inner">
              <h3><?= $prestasi;?></h3>
              <p>Prestasi Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-trophy"></i>
            </div>
            <a href="<?= site_url('backend/kemahasiswaan/prestasi_mahasiswa');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $alumni;?></h3>
              <p>Alumni</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= site_url('backend/kemahasiswaan/alumni');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $hasilpenelitian;?></h3>
              <p>Hasil Penelitian</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="<?= site_url('backend/penelitian/hasil_penelitian');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $hasilpengabdian;?></h3>
              <p>Hasil Pengabdian</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="<?= site_url('backend/penelitian/hasil_pengabdian');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $user;?></h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= site_url('backend/user');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
</div>