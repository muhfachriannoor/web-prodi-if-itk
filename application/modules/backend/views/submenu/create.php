<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Sub Menu
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Sub Menu</a></li>
      <li class="active">Tambah Sub Menu</li>
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
      <form action="<?= site_url('backend/submenu/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('idMenu') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Menu <b><?= strip_tags(form_error('idMenu'));?></b></label>
                  <select name="idMenu" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH MENU --</option>
                    <?php
                      $menu = $this->db->where('url','#')->get('menu');
                      foreach($menu->result() as $no => $menu):
                    ?>
                    <?php if($menu->nameMenu != 'Beranda'): ?>
                    <option value="<?= $menu->idMenu;?>"><?= $menu->nameMenu;?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Menu</label>
                  <select name="idMenu" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH MENU --</option>
                    <?php
                      $menu = $this->db->where('url','#')->get('menu');
                      foreach($menu->result() as $no => $menu):
                    ?>
                    <?php if($menu->nameMenu != 'Beranda'): ?>
                    <option value="<?= $menu->idMenu;?>" <?= (set_value('idMenu') == $menu->idMenu) ? 'selected="selected"' : '';?>><?= $menu->nameMenu;?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    
                  </select>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('nameSubMenu') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Sub Menu <b><?= strip_tags(form_error('nameSubMenu'));?></b></label>
                  <input type="text" name="nameSubMenu" class="form-control" required="required" placeholder="Isi Nama Sub Menu...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Sub Menu</label>
                  <input type="text" name="nameSubMenu" class="form-control" required="required" placeholder="Isi Nama Sub Menu..." value="<?= set_value('nameSubMenu')?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('kolom1') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Isi Konten <b><?= strip_tags(form_error('kolom1'));?></b></label>
                  <textarea id="editor1" name="kolom1" rows="20" cols="100" required="required" placeholder="Isi Kontent...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Isi Konten</label>
                  <textarea id="editor1" name="kolom1" rows="20" cols="100" required="required" placeholder="Isi Kontent...."><?= set_value('kolom1');?></textarea>
                  
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/submenu');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>