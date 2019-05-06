<?php
$name         = (isset($data['data'][0]->user_name))? $data['data'][0]->user_name : set_value('user_name');
$email        = (isset($data['data'][0]->user_email))? $data['data'][0]->user_email : set_value('user_email');
$createDate   = (isset($data['data'][0]->user_insertindb))? $data['data'][0]->user_insertindb : set_value('user_insertindb');
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
  <form method="post" action="" enctype="multipart/form-data">
    <div class="col-lg-4">
      <div class="form-group">
        <label>Full Name <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="name" value="<?=$name;?>" required>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Email <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="email" value="<?=$email;?>" required>
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