<?php
$cnf  = $this->dynamic_model->read('configuration',1,0)->row();
$menu = $this->dynamic_model->read('menu',1,0)->row();
$navbar = $data['navbar'];
?>

<div id="menu-slide" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
  <a href="<?=base_url();?>who" class="<?=$menu->menu_who;?> <?php if($navbar=='who'){ echo 'active'; } ?>">who we are you</a>
  <a href="<?=base_url();?>service" class="<?=$menu->menu_service;?> <?php if($navbar=='service'){ echo 'active'; } ?>">service</a>
  <a href="<?=base_url();?>team" class="<?=$menu->menu_team;?> <?php if($navbar=='team'){ echo 'active'; } ?>">team</a>
  <a href="<?=base_url();?>work" class="<?=$menu->menu_work;?> <?php if($navbar=='work'){ echo 'active'; } ?>">our work</a>
  <a href="<?=base_url();?>contact" class="<?=$menu->menu_contact;?> <?php if($navbar=='contact'){ echo 'active'; } ?>">contact</a>
</div>

<div class="main-menu-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
        <a href="<?=base_url();?>"><img src="<?=base_url();?>webassets/img/<?=$cnf->configuration_logo3;?>"></a>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
        <div class="nav-slide text-right hidden-lg hidden-md hidden-sm">
          <a href="#" onclick="openNav()" class="btn-slide"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
        <ul class="hidden-xs">
          <li class="<?=$menu->menu_who;?> <?php if($navbar=='who'){ echo 'active'; } ?>"><a href="<?=base_url();?>who">who we are</a></li>
          <li class="<?=$menu->menu_service;?> <?php if($navbar=='service'){ echo 'active'; } ?>"><a href="<?=base_url();?>service">service</a></li>
          <li class="<?=$menu->menu_team;?> <?php if($navbar=='team'){ echo 'active'; } ?>"><a href="<?=base_url();?>team">team</a></li>
          <li class="<?=$menu->menu_work;?> <?php if($navbar=='work'){ echo 'active'; } ?>"><a href="<?=base_url();?>work">our work</a></li>
          <li class="<?=$menu->menu_contact;?> <?php if($navbar=='contact'){ echo 'active'; } ?>"><a href="<?=base_url();?>contact">contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>