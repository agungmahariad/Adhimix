<?php
$logo1     = (isset($data['data'][0]->configuration_logo1))? $data['data'][0]->configuration_logo1 : set_value('configuration_logo1');
$logo2     = (isset($data['data'][0]->configuration_logo2))? $data['data'][0]->configuration_logo2 : set_value('configuration_logo2');
$logo3     = (isset($data['data'][0]->configuration_logo3))? $data['data'][0]->configuration_logo3 : set_value('configuration_logo3');
$favicon  = (isset($data['data'][0]->configuration_favicon))? $data['data'][0]->configuration_favicon : set_value('configuration_favicon');
?>

<ul class="nav nav-tabs tab-menu-logo">
  <li role="presentation"><a href="<?=base_url();?>configuration">General</a></li>
  <li role="presentation" class="active"><a href="#">Logo & Favicon</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/text">Intro Text</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/menu">Menu</a></li>
</ul>
<div class="tab-content tab-logo">
  <div class="row">
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
    <form action="" method="post" enctype="multipart/form-data">
      <div class="col-lg-4">
        <div class="form-group">
          <img src="<?=base_url();?>../webassets/img/<?=$logo1;?>" style="height:100px; margin-bottom:10px;"/>
          <br>
          <label>Logo 1</label>
          <input type="file" class="single-upload" name="logo1">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Browse File.." disabled>
            <span class="input-group-btn">
              <button class="browse btn btn-file" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Pick Image</button>
            </span>
          </div>
          <p class="help-block">Maximum file size is 5Mb</p>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-4">
        <div class="form-group">
          <br>
          <img src="<?=base_url();?>../webassets/img/<?=$logo2;?>" style="height:50px; margin-bottom:10px;"/>
          <br>
          <label>Logo 2</label>
          <input type="file" class="single-upload" name="logo2">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Browse File.." disabled>
            <span class="input-group-btn">
              <button class="browse btn btn-file" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Pick Image</button>
            </span>
          </div>
          <p class="help-block">Maximum file size is 5Mb</p>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-4">
        <div class="form-group">
          <br>
          <img src="<?=base_url();?>../webassets/img/<?=$logo3;?>" style="height:50px; margin-bottom:10px;"/>
          <br>
          <label>Logo 3</label>
          <input type="file" class="single-upload" name="logo3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Browse File.." disabled>
            <span class="input-group-btn">
              <button class="browse btn btn-file" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Pick Image</button>
            </span>
          </div>
          <p class="help-block">Maximum file size is 5Mb</p>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-4">
        <div class="form-group">
          <br>
          <img src="<?=base_url();?>../webassets/img/<?=$favicon;?>" style="height:30px; margin-bottom:10px;"/>
          <br>
          <label>Favicon</label>
          <input type="file" class="single-upload" name="favicon">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Browse File.." disabled>
            <span class="input-group-btn">
              <button class="browse btn btn-file" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Pick Image</button>
            </span>
          </div>
          <p class="help-block">Maximum file size is 5Mb</p>
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