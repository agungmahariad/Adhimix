<?php
$name   	    = (isset($data['data'][0]->user_name))? $data['data'][0]->user_name : set_value('user_name');
$email  		  = (isset($data['data'][0]->user_email))? $data['data'][0]->user_email : set_value('user_email');
$status       = (isset($data['data'][0]->user_status))? $data['data'][0]->user_status : set_value('user_status');
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
  <form name="myForm" action="" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Personal Information</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Full Name <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="name" value="<?=$name;?>" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Email <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="email" value="<?=$email;?>" required>
      </div>
    </div>
    <?php if($name==""){ ?>
      <div class="col-lg-12">
        <div class="form-group">
          <h2>Security Password</h2>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Password <span class="form-required">*</span></label>
          <input type="password" class="form-control" name="password" id="" oninvalid="" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Confirm Password <span class="form-required">*</span></label>
          <input type="password" class="form-control" name="password2" id="" oninvalid="" required>
        </div>
      </div>
    <?php } ?>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Setting & Information</h2>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Status <span class="form-required">*</span></label>
        <select class="form-control" id="" name="status" oninvalid="" required>
          <option value="1001" <?php if($status=='1001'){ echo 'selected'; } ?>>Enabled</option>
          <option value="1000" <?php if($status=='1000'){ echo 'selected'; } ?>>Disabled</option>
        </select>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Created Date</label>
        <p><i><?php if($createDate=="0000-00-00 00:00:00" or $createDate==""){ ?>
          -
        <?php }else{ ?>
          <?=strftime("%d %B %Y %H:%M", strtotime($createDate))?>
        <?php } ?></i></p>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <br>
        <a href="<?=base_url();?>user" class="btn btn-back mb10">Back</a>
        <button type="submit" class="btn btn-save mb10" name="button">Save</button>
      </div>
    </div>
  </form>
</div>