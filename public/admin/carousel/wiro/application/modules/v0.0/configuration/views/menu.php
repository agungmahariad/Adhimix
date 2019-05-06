<?php
$menu1 = (isset($data['data'][0]->menu_who))? $data['data'][0]->menu_who : set_value('menu_who');
$menu2 = (isset($data['data'][0]->menu_service))? $data['data'][0]->menu_service: set_value('menu_service');
$menu3 = (isset($data['data'][0]->menu_team))? $data['data'][0]->menu_team: set_value('menu_team');
$menu4 = (isset($data['data'][0]->menu_work))? $data['data'][0]->menu_work: set_value('menu_work');
$menu5 = (isset($data['data'][0]->menu_contact))? $data['data'][0]->menu_contact: set_value('menu_contact');
?>

<ul class="nav nav-tabs">
  <li role="presentation"><a href="<?=base_url();?>configuration">General</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/logo_favicon">Logo & Favicon</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/text"">Intro Text</a></li>
  <li role="presentation" class="active"><a href="#">Menu</a></li>
</ul>
<div class="tab-content">
  <div class="row">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="col-lg-12">
        <?php if ($this->session->flashdata('flashSuccess')){ ?>
          <div class="alert alert-success fade in" style="text-align: left;">
            <strong><i class="fa fa-check"></i> Success! </strong><?=$this->session->flashdata('flashSuccess') ?>
          </div>
        <?php }elseif($this->session->flashdata('flashWarning')){ ?>
          <div class="alert alert-danger fade in" style="text-align: left;">
            <strong><i class="fa fa-warning"></i> Error! </strong><?=$this->session->flashdata('flashWarning') ?>
          </div>
        <?php } ?>
        <div class="alert alert-danger fade in" id="alert" style="display: none;">
          <i class="fa fa-warning"></i> Error! Image is required. Please upload your image.
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Who We Are</label>
          <select class="form-control" id="" name="menu1" oninvalid="" required>
            <option value="visible-menu" <?php if($menu1=='visible-menu'){ echo 'selected'; } ?>>Visible</option>
            <option value="hidden-menu" <?php if($menu1=='hidden-menu'){ echo 'selected'; } ?>>Hidden</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Service</label>
          <select class="form-control" id="" name="menu2" oninvalid="" required>
            <option value="visible-menu" <?php if($menu2=='visible-menu'){ echo 'selected'; } ?>>Visible</option>
            <option value="hidden-menu" <?php if($menu2=='hidden-menu'){ echo 'selected'; } ?>>Hidden</option>
          </select>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Team</label>
          <select class="form-control" id="" name="menu3" oninvalid="" required>
            <option value="visible-menu" <?php if($menu3=='visible-menu'){ echo 'selected'; } ?>>Visible</option>
            <option value="hidden-menu" <?php if($menu3=='hidden-menu'){ echo 'selected'; } ?>>Hidden</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Our Work</label>
          <select class="form-control" id="" name="menu4" oninvalid="" required>
            <option value="visible-menu" <?php if($menu4=='visible-menu'){ echo 'selected'; } ?>>Visible</option>
            <option value="hidden-menu" <?php if($menu4=='hidden-menu'){ echo 'selected'; } ?>>Hidden</option>
          </select>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Contact</label>
          <select class="form-control" id="" name="menu5" oninvalid="" required>
            <option value="visible-menu" <?php if($menu5=='visible-menu'){ echo 'selected'; } ?>>Visible</option>
            <option value="hidden-menu" <?php if($menu5=='hidden-menu'){ echo 'selected'; } ?>>Hidden</option>
          </select>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <br>
          <button type="submit" class="btn btn-save mb10" name="button">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>