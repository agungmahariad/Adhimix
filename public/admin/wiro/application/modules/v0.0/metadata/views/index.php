<?php
$general_author     = (isset($data['data'][0]->general_author))? $data['data'][0]->general_author : set_value('general_author');
$general_copyright  = (isset($data['data'][0]->general_copyright))? $data['data'][0]->general_copyright : set_value('general_copyright');
$general_expires     = (isset($data['data'][0]->general_expires))? $data['data'][0]->general_expires : set_value('general_expires');
$general_robots      = (isset($data['data'][0]->general_robots))? $data['data'][0]->general_robots : set_value('general_robots');
$general_googlebot   = (isset($data['data'][0]->general_googlebot))? $data['data'][0]->general_googlebot : set_value('general_googlebot');
$general_googlebot_image = (isset($data['data'][0]->general_googlebot_image))? $data['data'][0]->general_googlebot_image : set_value('general_googlebot_image');
$general_description = (isset($data['data'][0]->general_description))? $data['data'][0]->general_description : set_value('general_description');
$general_keyword     = (isset($data['data'][0]->general_keyword))? $data['data'][0]->general_keyword : set_value('general_keyword');
$gp_name            = (isset($data['data'][0]->gp_name))? $data['data'][0]->gp_name : set_value('gp_name');
$gp_image           = (isset($data['data'][0]->gp_image))? $data['data'][0]->gp_image : set_value('gp_image');
$gp_description     = (isset($data['data'][0]->gp_description))? $data['data'][0]->gp_description : set_value('gp_description');
$og_title           = (isset($data['data'][0]->og_title))? $data['data'][0]->og_title : set_value('og_title');
$og_sitename        = (isset($data['data'][0]->og_sitename))? $data['data'][0]->og_sitename : set_value('og_sitename');
$og_url             = (isset($data['data'][0]->og_url))? $data['data'][0]->og_url : set_value('og_url');
$og_image           = (isset($data['data'][0]->og_image))? $data['data'][0]->og_image : set_value('og_image');
$og_description     = (isset($data['data'][0]->og_description))? $data['data'][0]->og_description : set_value('og_description');
?>

<?php if ($this->session->flashdata('flashSuccess')){ ?>
  <div class="alert alert-success fade in" style="text-align: left;">
    <strong><i class="fa fa-check"></i> Success! </strong><?=$this->session->flashdata('flashSuccess') ?>
  </div>
<?php }elseif($this->session->flashdata('flashWarning')){ ?>
  <div class="alert alert-danger fade in" style="text-align: left;">
    <strong><i class="fa fa-warning"></i> Error! </strong><?=$this->session->flashdata('flashWarning') ?>
  </div>
<?php } ?>
<div class="row">
  <form name="myForm" action="" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
    <div class="col-lg-12">
      <div class="form-group">
        <h2>General</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="general_author" value="<?=$general_author;?>" id="author">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="copyright">Copyright</label>
        <input type="text" class="form-control" name="general_copyright" value="<?=$general_copyright;?>" id="copyright">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="expires">Expires</label>
        <input type="text" class="form-control" name="general_expires" value="<?=$general_expires;?>" id="expires">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="robots">Robots</label>
        <input type="text" class="form-control" name="general_robots" value="<?=$general_robots;?>" id="robots">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="googlebot">Googlebot</label>
        <input type="text" class="form-control" name="general_googlebot" value="<?=$general_googlebot;?>" id="googlebot">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="googlebotimage">Googlebot-Image</label>
        <input type="text" class="form-control" name="general_googlebot_image" value="<?=$general_googlebot_image;?>" id="googlebotimage">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="4" id="description" name="general_description"><?=$general_description;?></textarea>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <textarea class="form-control" rows="4" id="keyword" name="general_keyword"><?=$general_keyword;?></textarea>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Google Plus</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="gp_name" value="<?=$gp_name;?>" id="name">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" name="gp_image" value="<?=$gp_image;?>" id="image">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="4" id="description" name="gp_description"><?=$gp_description;?></textarea>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Open Graph</h2>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label for="title">OG Title</label>
        <input type="text" class="form-control" name="og_title" value="<?=$og_title;?>" id="title">
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label for="sitename">OG Site Name</label>
        <input type="text" class="form-control" id="sitename" name="og_sitename" value="<?=$og_sitename;?>">
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label for="url">OG URL</label>
        <input type="text" class="form-control" id="url" name="og_url" value="<?=$og_url;?>">
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label for="ogimage">OG Image</label>
        <input type="text" class="form-control" id="ogimage" name="og_image" value="<?=$og_image;?>">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="address">Description</label>
        <textarea class="form-control" rows="4" id="address" name="og_description"><?=$og_description;?></textarea>
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