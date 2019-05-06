<?php
$id   				= (isset($data['data'][0]->work_id))? $data['data'][0]->work_id : set_value('work_id');
$title        = (isset($data['data'][0]->work_title))? $data['data'][0]->work_title : set_value('work_title');
$category   	= (isset($data['data'][0]->work_category_id))? $data['data'][0]->work_category_id : set_value('work_category_id');
$year         = (isset($data['data'][0]->work_year))? $data['data'][0]->work_year : set_value('work_year');
$client       = (isset($data['data'][0]->work_client))? $data['data'][0]->work_client : set_value('work_client');
$director     = (isset($data['data'][0]->work_director))? $data['data'][0]->work_director : set_value('work_director');
$agency       = (isset($data['data'][0]->work_agency))? $data['data'][0]->work_agency : set_value('work_agency');
$description  = (isset($data['data'][0]->work_description))? $data['data'][0]->work_description : set_value('work_description');
$image        = (isset($data['data'][0]->work_image))? $data['data'][0]->work_image : set_value('work_image');
$patchImage   = base_url()."../webassets/img/porto/".$image;
$video        = (isset($data['data'][0]->work_video))? $data['data'][0]->work_video : set_value('work_video');
$status       = (isset($data['data'][0]->work_status))? $data['data'][0]->work_status : set_value('work_status');
$date         = (isset($data['data'][0]->work_insertindb))? $data['data'][0]->work_insertindb : set_value('work_insertindb');
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
        <p class="help-block">Actual size is 1500 x 844 pixel<br>Maximum file size is 5Mb</p>
        <?php if($image != ''){?>
          <img src="<?=$patchImage;?>" class="img-responsive" style="height: 100px;">
        <?php }else{?>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Video</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Embed Video From Youtube <span class="form-required">*</span></label>
        <textarea class="form-control" rows="4" name="video" required><?=$video;?></textarea>
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Information</h2>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Title <span class="form-required">*</span></label>
        <input type="text" class="form-control" id="" name="title" value="<?=$title;?>" oninvalid="" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Category <span class="form-required">*</span></label>
        <select class="form-control" id="" oninvalid="" name="category" required>
          <option value=""> - </option>
          <?php foreach($data['category'] as $cat){ ?>
            <option value="<?=$cat->work_category_id;?>" <?php if($cat->work_category_id == $category){ echo 'selected'; } ?>><?=$cat->work_category_name;?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Year <span class="form-required">*</span></label>
        <input type="text" class="form-control" id=""  name="year" value="<?=$year;?>" oninvalid="" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Client <span class="form-required">*</span></label>
        <input type="text" class="form-control" id=""  name="client" value="<?=$client;?>" oninvalid="" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Director <span class="form-required">*</span></label>
        <input type="text" class="form-control" id=""  name="director" value="<?=$director;?>" oninvalid="" required>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Agency <span class="form-required">*</span></label>
        <input type="text" class="form-control" id=""  name="agency" value="<?=$agency;?>" oninvalid="" required>
      </div>
    </div>
  	<div class="col-lg-12">
      <div class="form-group">
        <label>Description</label>
        <textarea class="editor" name="description" required><?=$description;?></textarea>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <h2>Setting & Information</h2>
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
        <a href="<?=base_url();?>portfolio" class="btn btn-back mb10">Back</a>
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