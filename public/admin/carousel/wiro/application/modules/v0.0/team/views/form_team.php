<?php
$name         = (isset($data['data'][0]->team_name))? $data['data'][0]->team_name : set_value('team_name');
$position     = (isset($data['data'][0]->team_position))? $data['data'][0]->team_position : set_value('team_position');
$email        = (isset($data['data'][0]->team_email))? $data['data'][0]->team_email : set_value('team_email');
$description  = (isset($data['data'][0]->team_description))? $data['data'][0]->team_description : set_value('team_description');
$image        = (isset($data['data'][0]->team_image))? $data['data'][0]->team_image : set_value('team_image');
$patchImage   = base_url()."../webassets/img/team/".$image;
$status       = (isset($data['data'][0]->team_status))? $data['data'][0]->team_status : set_value('team_status');
$date         = (isset($data['data'][0]->team_insertindb))? $data['data'][0]->team_insertindb : set_value('team_insertindb');
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
<div class="alert alert-danger fade in" id="alert" style="display: none;">
  <i class="fa fa-warning"></i> Error! Image is required. Please upload your image.
</div>

<div class="row">
  <form name="myForm" action="" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Image</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Upload Image <span class="form-required">*</span></label>
        <input type="file" class="single-upload" name="image">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="Browse File.." disabled>
          <span class="input-group-btn">
            <button class="browse btn btn-file" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Pick Image</button>
          </span>
        </div>
        <p class="help-block">Actual size is 560 x 560 pixel<br>Maximum file size is 5Mb</p>
        <?php if($image != ''){?>
          <img src="<?=$patchImage;?>" class="img-responsive" style="height: 100px;">
        <?php }else{?>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Information</h2>
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
        <label>Position <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="position" value="<?=$position;?>" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Email <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" oninvalid="" name="email" value="<?=$email;?>" required>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label>Description <span class="form-required">*</span></label>
        <textarea class="editor" rows="4" name="description"><?=$description;?></textarea>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Setting</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Status <span class="form-required">*</span></label>
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
        <p><i><?php if($date=="0000-00-00 00:00:00" or $date==""){ ?>
          -
        <?php }else{ ?>
          <?=strftime("%d %B %Y %H:%M", strtotime($date))?>
        <?php } ?></i></p>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <br>
        <a href="<?=base_url();?>team/index/" class="btn btn-back mb10">Back</a>
        <button type="submit" class="btn btn-save mb10" name="button">Save</button>
      </div>
    </div>
  </form>
</div>
<?php if($image==""){ ?>
  <script type="text/javascript">
    function validateForm() {
      var x = document.forms["myForm"]["image"].value;
      if (x == "") {
        document.getElementById("alert").style.display = "block";
        return false;
      }
    }
  </script>
<?php } ?>