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
  <div class="col-lg-8">
    <a href="<?=base_url();?>user/add" class="btn btn-default"><i class="fa fa-plus"></i> Add User</a>
  </div>
  <div class="col-lg-4">
    <input type="text" class="form-control" placeholder="Search..">
  </div>
</div>
<table class="table table-bordered table-hover mb0">
  <thead>
    <tr>
      <th>No</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Created Date</th>
      <th>Status</th>
      <th><i aria-hidden="true" class="fa fa-cog"></i></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $number = $data['number'];
    foreach($data['data'] as $view) {
    	$number++;
    ?>
    <tr>
      <td align="center"><?=$number;?></td>
      <td><?=$view->user_name;?></td>
      <td align="center"><?=$view->user_email;?></td>
      <td align="center">
        <?=strftime("%d %B %Y %H:%M", strtotime($view->user_insertindb))?>
      </td>
      <td align="center">
      	<span class="label" style="background:<?=$view->status_management_color;?>;"><?=$view->status_management_name;?></span>
      </td>
      <td align="center" width="10%">
        <a href="<?=base_url();?>user/change_password/<?=$view->user_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="Change Password"><i aria-hidden="true" class="fa fa-lock"></i></a>
        <a href="<?=base_url();?>user/update/<?=$view->user_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="Edit"><i aria-hidden="true" class="fa fa-pencil"></i></a>
        <a href="<?=base_url();?>user/delete/<?=$view->user_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure ?')"><i aria-hidden="true" class="fa fa-trash"></i></a>
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
      <?=$data['pagination'];?>
    </div>
  </div>
</div>