<?php
$configWebsite = (isset($data['data'][0]->configuration_website_name))? $data['data'][0]->configuration_website_name : set_value('configuration_website_name');
$configCopyright = (isset($data['data'][0]->configuration_copyright))? $data['data'][0]->configuration_copyright: set_value('configuration_copyright');
?>

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">General</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/logo_favicon">Logo & Favicon</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/text">Intro Text</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/menu">Menu</a></li>
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
      <div class="col-lg-4">
        <div class="form-group">
          <label>Website Name</label>
          <input type="text" class="form-control" name="configWebsite" value="<?=$configWebsite;?>">
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Footer Copyright</label>
          <input type="text" class="form-control" name="configCopyright" value="<?=$configCopyright;?>">
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