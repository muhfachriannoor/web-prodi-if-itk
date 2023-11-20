<?php ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informatika | <?= $menunya; ?> <?= ($sub_menunya != '') ? '| '.$sub_menunya : '';?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('asset/frontend/img/logo.png');?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>plugins/iCheck/all.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url('asset/backend/');?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Infor</b>matika</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if($this->session->userdata('foto') != ''): ?>
                <img src="<?= base_url('asset/backend/upload/user/'.$this->session->userdata('foto'));?>" class="user-image" alt="User Image">
              <?php else: ?>
                <img src="<?= base_url('asset/backend/upload/default-user.png');?>" class="user-image" alt="User Image">
              <?php endif; ?>
              <span class="hidden-xs"><?= $this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if($this->session->userdata('foto') != ''): ?>
                  <img src="<?= base_url('asset/backend/upload/user/'.$this->session->userdata('foto'));?>" class="img-circle" alt="User Image">
                <?php else: ?>
                  <img src="<?= base_url('asset/backend/upload/default-user.png');?>" class="img-circle" alt="User Image">
                <?php endif; ?>
                <p>
                  <?= $this->session->userdata('nama');?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('backend/user/update/'.$this->session->userdata('idUser'));?>" class="btn btn-default btn-flat">Ubah Data Akun</a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('backend/logout');?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($this->session->userdata('foto') != ''): ?>
            <img src="<?= base_url('asset/backend/upload/user/'.$this->session->userdata('foto'));?>" class="img-circle" alt="User Image">
          <?php else: ?>
            <img src="<?= base_url('asset/backend/upload/default-user.png');?>" class="img-circle" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li class="<?= ('Dashboard' == $menunya) ? 'active' : '';?>"><a href="<?= site_url('backend');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if($this->session->userdata('akses') == '1'): ?>
        <li class="<?= ('Beranda' == $menunya) ? 'active' : '';?> treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Beranda</span>
            <span class="pull-right-container">
              <!-- <span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ('Banner' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/banner');?>"><i class="fa fa-circle-o"></i> Banner</a></li>
            <li class="<?= ('Overview Prodi' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/overview');?>"><i class="fa fa-circle-o"></i> Overview Prodi</a></li>
            <li class="<?= ('Galeri' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/galeri');?>"><i class="fa fa-circle-o"></i> Galeri</a></li>
            <li class="<?= ('Beasiswa' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/beasiswa');?>"><i class="fa fa-circle-o"></i> Beasiswa</a></li>
            <li class="<?= ('FAQ' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/faq');?>"><i class="fa fa-circle-o"></i> FAQ</a></li>
            <li class="<?= ('Testimoni' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/testimoni');?>"><i class="fa fa-circle-o"></i> Testimoni</a></li>
            <li class="<?= ('Bidang Minat' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/bidangminat');?>"><i class="fa fa-circle-o"></i> Bidang Minat</a></li>
            <li class="<?= ('Pengumuman' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/pengumuman');?>"><i class="fa fa-circle-o"></i> Pengumuman</a></li>
            <li class="<?= ('Kegiatan' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/kegiatan');?>"><i class="fa fa-circle-o"></i> Kegiatan</a></li>
            <li class="<?= ('Keketatan' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/beranda/keketatan');?>"><i class="fa fa-circle-o"></i> Keketatan</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <li class="<?= ('Berita' == $menunya) ? 'active' : '';?> treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <!-- <span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ('Kategori Berita' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/berita/kategori_berita');?>"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
            <li class="<?= ('Berita' == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/berita');?>"><i class="fa fa-circle-o"></i> Berita</a></li>
          </ul>
        </li>
        <?php
        	$query = $this->db->get('menu', 20,2);
        	foreach($query->result() as $row):
        		$id_menu 	= $row->idMenu;
            $sub_menu   = $this->db->where('idMenu',$id_menu)->where('status',1)->get('submenu');
            if($this->session->userdata('akses') == 1 OR $row->nameMenu == 'Profile Prodi'):
              if($row->url == '' || $row->url == '#'):
        ?>
        <li class="<?= ($row->nameMenu == $menunya) ? 'active' : '';?> treeview">
          <a href="<?= base_url('backend/'.$row->url);?>">
            <i class="fa fa-archive"></i>
            <span><?= $row->nameMenu;?></span>
          </a>
          <ul class="treeview-menu">
          	<?php foreach($sub_menu->result() as $row2): ?>
              <?php if($this->session->userdata('akses') == '1' OR $row2->nameSubmenu == 'Dosen dan Tenaga Pendidik'): ?>
              <li class="<?= ($row2->nameSubmenu == $sub_menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/'.$row2->url);?>"><i class="fa fa-circle-o"></i> <?= $row2->nameSubmenu;?></a></li>
              <?php endif; ?>
    		    <?php endforeach; ?>
          </ul>
        </li>
    	<?php else: ?>
    		<li class="<?= ($row->nameMenu == $menunya) ? 'active' : '';?>"><a href="<?= base_url('backend/'.$row->url);?>"><i class="fa fa-archive"></i> <span><?= $row->nameMenu;?></span></a></li>
    	<?php
            endif;
    			endif;
    		endforeach; 
    	?>
      <?php if($this->session->userdata('akses') == '1'): ?>
        <li class="<?= ('User' == $menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/user');?>"><i class="fa fa-users"></i> <span>User</span></a></li>
        <li class="<?= ('Sub Menu' == $menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/submenu');?>"><i class="fa fa-archive"></i> <span>Sub Menu</span></a></li>
        <li class="<?= ('Footer' == $menunya) ? 'active' : '';?>"><a href="<?= site_url('backend/footer/prodi');?>"><i class="fa fa-archive"></i> <span>Footer</span></a></li>
      <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>