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
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Old Password <span class="form-required">*</span></label>
        <input type="password" class="form-control" name="oldpassword" required>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Password <span class="form-required">*</span></label>
        <input type="password" class="form-control" name="password" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Confirm Password <span class="form-required">*</span></label>
        <input type="password" class="form-control" name="password2" required>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <br>
        <button type="submit" class="btn btn-save mb10" name="button">Change Password</button>
      </div>
    </div>
  </form>
</div>