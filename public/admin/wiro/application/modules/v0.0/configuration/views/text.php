<?php
$text1 = (isset($data['data'][0]->configuration_intro_text1))? $data['data'][0]->configuration_intro_text1 : set_value('configuration_intro_text1');
$text2 = (isset($data['data'][0]->configuration_intro_text2))? $data['data'][0]->configuration_intro_text2: set_value('configuration_intro_text2');
?>

<ul class="nav nav-tabs">
  <li role="presentation"><a href="<?=base_url();?>configuration">General</a></li>
  <li role="presentation"><a href="<?=base_url();?>configuration/logo_favicon">Logo & Favicon</a></li>
  <li role="presentation" class="active"><a href="#">Intro Text</a></li>
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
      <div class="col-lg-12">
        <div class="form-group">
          <label>Our Work</label>
          <textarea class="form-control" name="text1" rows="3"><?=$text1;?></textarea>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Contact</label>
          <textarea class="form-control" name="text2" rows="3"><?=$text2;?></textarea>
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