<?php if ($this->session->flashdata('flashSuccess')){ ?>
  <div class="alert alert-success fade in" style="text-align: left;">
    <strong><i class="fa fa-check"></i> Success! </strong><?=$this->session->flashdata('flashSuccess') ?>
  </div>
<?php }elseif($this->session->flashdata('flashWarning')){ ?>
  <div class="alert alert-danger fade in" style="text-align: left;">
    <strong><i class="fa fa-warning"></i> Error! </strong><?=$this->session->flashdata('flashWarning') ?>
  </div>
<?php } ?>
<div class="row mb20">
  <div class="col-lg-8"></div>
  <div class="col-lg-4">
    <input type="text" class="form-control" placeholder="Search..">
  </div>
</div>
<table class="table table-bordered table-hover mb0">
  <thead>
    <tr>
      <th>No</th>
      <th>Image</th>
      <th>Page</th>
      <th>Type</th>
      <th>Position</th>
      <th>Repeat</th>
      <th>Created Date</th>
      <th><i aria-hidden="true" class="fa fa-cog"></i></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $number = 0;
    foreach($data['data'] as $view) {
      $number++;
    ?>
    <tr>
      <td align="center"><?=$number;?></td>
      <td align="center"><img src="<?=base_url();?>../webassets/img/bg/<?=$view->background_image;?>" style="height: 70px;"></td>
      <td align="center"><?=$view->background_title;?></td>
      <td align="center"><?=$view->background_type;?></td>
      <td align="center"><?=$view->background_position;?></td>
      <td align="center"><?=$view->background_repeat;?></td>
      <td align="center">
        <?=strftime("%d %B %Y %H:%M", strtotime($view->background_insertindb))?>
      </td>
      <td align="center" width="10%">
        <a href="<?=base_url();?>background/update/<?=$view->background_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="Edit"><i aria-hidden="true" class="fa fa-pencil"></i></a>
        <a href="<?=base_url();?>background/delete/<?=$view->background_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure ?')"><i aria-hidden="true" class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<div class="panel-footer">
  <div class="row">
    <div class="col-md-6">
      &nbsp;<!--<h6>Total Count <span class="label label-info"><?=$data['last'];?></span></h6>-->
    </div>
    <div class="col-md-6">
      
    </div>
  </div>
</div>