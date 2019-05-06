<?php
$type        = (isset($data['data'][0]->background_type))? $data['data'][0]->background_type : set_value('background_type');
$position        = (isset($data['data'][0]->background_position))? $data['data'][0]->background_position : set_value('background_position');
$repeat        = (isset($data['data'][0]->background_repeat))? $data['data'][0]->background_repeat : set_value('background_repeat');
$image        = (isset($data['data'][0]->background_image))? $data['data'][0]->background_image : set_value('background_image');
$patchImage   = base_url()."../webassets/img/bg/".$image;
$date         = (isset($data['data'][0]->background_insertindb))? $data['data'][0]->background_insertindb : set_value('background_insertindb');
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
        <p class="help-block">Maximum file size is 5Mb</p>
        <?php if($image != ''){?>
          <img src="<?=$patchImage;?>" class="img-responsive" style="height: 100px;">
        <?php }else{?>
        <?php } ?>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Setting</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Background Type <span class="form-required">*</span></label>
        <select class="form-control" id="" name="type" oninvalid="" required>
          <option value="cover" <?php if($type=='cover'){ echo 'selected'; } ?>>Cover</option>
          <option value="contain" <?php if($type=='contain'){ echo 'selected'; } ?>>Contain</option>
        </select>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Background Position <span class="form-required">*</span></label>
        <select class="form-control" id="" name="position" oninvalid="" required>
          <option value="top" <?php if($position=='top'){ echo 'selected'; } ?>>Top</option>
          <option value="center" <?php if($position=='center'){ echo 'selected'; } ?>>Center</option>
          <option value="bottom" <?php if($position=='bottom'){ echo 'selected'; } ?>>Bottom</option>
        </select>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label for="">Background Repeat <span class="form-required">*</span></label>
        <select class="form-control" id="" name="repeat" oninvalid="" required>
          <option value="repeat" <?php if($repeat =='repeat'){ echo 'selected'; } ?>>Yes</option>
          <option value="no-repeat" <?php if($repeat =='no-repeat'){ echo 'selected'; } ?>>No</option>
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
        <a href="<?=base_url();?>background/index/" class="btn btn-back mb10">Back</a>
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