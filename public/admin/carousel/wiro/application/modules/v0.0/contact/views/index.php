<?php
$contact_description  = (isset($data['data'][0]->contact_description))? $data['data'][0]->contact_description : set_value('contact_description');
$contact_address      = (isset($data['data'][0]->contact_address))? $data['data'][0]->contact_address : set_value('contact_address');
$contact_phone        = (isset($data['data'][0]->contact_phone))? $data['data'][0]->contact_phone : set_value('contact_phone');
$contact_email        = (isset($data['data'][0]->contact_email))? $data['data'][0]->contact_email : set_value('contact_email');
$contact_instagram    = (isset($data['data'][0]->contact_instagram))? $data['data'][0]->contact_instagram : set_value('contact_instagram');
$contact_youtube      = (isset($data['data'][0]->contact_youtube))? $data['data'][0]->contact_youtube : set_value('contact_youtube');
$contact_maps         = (isset($data['data'][0]->contact_maps))? $data['data'][0]->contact_maps : set_value('contact_maps');
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
  <form action="" method="post" enctype="multipart/form-data">
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Information</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="contact_phone" value="<?=$contact_phone;?>">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="contact_email" value="<?=$contact_email;?>">
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" rows="4" name="contact_address"><?=$contact_address;?></textarea>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Social Media</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Instagram</label>
        <input type="text" class="form-control" name="contact_instagram" value="<?=$contact_instagram;?>">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Youtube</label>
        <input type="text" class="form-control" name="contact_youtube" value="<?=$contact_youtube;?>">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Maps</h2>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="maps">Embed Your Google Maps</label>
        <textarea class="form-control" rows="4" id="maps" name="contact_maps"><?=$contact_maps;?></textarea>
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