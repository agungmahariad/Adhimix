<?php
$title1      = (isset($data['data'][0]->who_title1))? $data['data'][0]->who_title1 : set_value('who_title1');
$title2      = (isset($data['data'][0]->who_title2))? $data['data'][0]->who_title2 : set_value('who_title2');
$title3      = (isset($data['data'][0]->who_title3))? $data['data'][0]->who_title3 : set_value('who_title3');
$content1      = (isset($data['data'][0]->who_content1))? $data['data'][0]->who_content1 : set_value('who_content1');
$content2      = (isset($data['data'][0]->who_content2))? $data['data'][0]->who_content2 : set_value('who_content2');
$content3      = (isset($data['data'][0]->who_content3))? $data['data'][0]->who_content3 : set_value('who_content3');
$createDate   = (isset($data['data'][0]->who_insertindb))? $data['data'][0]->who_insertindb : set_value('who_insertindb');
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
  <form name="myForm" action="" enctype="multipart/form-data" method="post">
    <div class="col-lg-4">
      <div class="form-group">
        <label>Title 1</label>
        <input type="text" class="form-control" id="" oninvalid="" name="title1" value="<?=$title1;?>">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label>Content 1</label>
        <textarea class="editor" name="content1"><?=$content1;?></textarea>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Title 2</label>
        <input type="text" class="form-control" id="" oninvalid="" name="title2" value="<?=$title2;?>">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label>Content 2</label>
        <textarea class="editor" name="content2"><?=$content2;?></textarea>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <label>Title 3</label>
        <input type="text" class="form-control" id="" oninvalid="" name="title3" value="<?=$title3;?>">
      </div>
    </div>
    <div class="clr"></div>
    <div class="col-lg-12">
      <div class="form-group">
        <label>Content 3</label>
        <textarea class="editor" name="content3"><?=$content3;?></textarea>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="">Updated Date</label>
        <p><i><?=strftime("%d %B %Y %H:%M", strtotime($createDate))?></i></p>
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