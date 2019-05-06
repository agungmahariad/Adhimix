<?php
// $cnf  = $this->dynamic_model->read('configuration',1,0)->row();
$navbar = $data['navbar'];
$open   = $data['open'];
?>
    <nav class="navbar navbar-default" role="navigation">
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          <li class="<?php if($navbar=='dashboard'){ echo 'active'; } ?>"><a href="<?=base_url();?>main"><i class="fa fa-dashboard" aria-hidden="true" <?php if($open=='dashboard'){ echo ''; } ?>></i>&nbsp;&nbsp;Dashboard</a></li>
          <li class="<?php if($navbar=='who'){ echo 'active'; } ?>"><a href="<?=base_url();?>who"><i class="fa fa-suitcase" aria-hidden="true" <?php if($open=='who'){ echo ''; } ?>></i>&nbsp;&nbsp;Who We Are</a></li>
          <li class="<?php if($navbar=='service'){ echo 'active'; } ?>"><a href="<?=base_url();?>service"><i class="fa fa-camera-retro" aria-hidden="true" <?php if($open=='service'){ echo ''; } ?>></i>&nbsp;&nbsp;Service</a></li>
          <li class="<?php if($navbar=='team'){ echo 'active'; } ?>"><a href="<?=base_url();?>team"><i class="fa fa-user" aria-hidden="true" <?php if($open=='team'){ echo ''; } ?>></i>&nbsp;&nbsp;Team</a></li>
          <li class="<?php if($navbar=='user'){ echo 'active'; } ?>"><a href="<?=base_url();?>user"><i class="fa fa-users" aria-hidden="true" <?php if($open=='user'){ echo ''; } ?>></i>&nbsp;&nbsp;Users</a></li>
          <li class="panel panel-default <?php if($open=='portfolio'){ echo 'active'; } ?>" id="dropdown">
            <a data-toggle="collapse" href="#nav1">
              <i class="fa fa-film" aria-hidden="true"></i>&nbsp;&nbsp;Portfolio <span class="caret"></span>
            </a>
            <div id="nav1" class="panel-collapse collapse <?php if($open=='portfolio'){ echo 'in'; } ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class="<?php if($navbar=='item-portfolio'){ echo 'active'; } ?>"><a href="<?=base_url();?>portfolio">Item</a></li>
                  <li class="<?php if($navbar=='category-portfolio'){ echo 'active'; } ?>"><a href="<?=base_url();?>portfolio_category">Category</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="panel panel-default <?php if($open=='module'){ echo 'active'; } ?>" id="dropdown">
            <a data-toggle="collapse" href="#nav2">
              <i class="fa fa-puzzle-piece" aria-hidden="true"></i>&nbsp;&nbsp;Modules <span class="caret"></span>
            </a>
            <div id="nav2" class="panel-collapse collapse <?php if($open=='module'){ echo 'in'; } ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class="<?php if($navbar=='banner'){ echo 'active'; } ?>"><a href="<?=base_url();?>banner">Banner Home</a></li>
                  <li class="<?php if($navbar=='background'){ echo 'active'; } ?>"><a href="<?=base_url();?>background">Background</a></li>
                  <li class="<?php if($navbar=='metadata'){ echo 'active'; } ?>"><a href="<?=base_url();?>metadata">Meta Data</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="panel panel-default <?php if($open=='setting'){ echo 'active'; } ?>" id="dropdown">
            <a data-toggle="collapse" href="#nav3">
              <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Settings <span class="caret"></span>
            </a>
            <div id="nav3" class="panel-collapse collapse <?php if($open=='setting'){ echo 'in'; } ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class="<?php if($navbar=='configuration'){ echo 'active'; } ?>"><a href="<?=base_url();?>configuration">Global Configuration</a></li>
                  <li class="<?php if($navbar=='contact'){ echo 'active'; } ?>"><a href="<?=base_url();?>contact">Contact Information</a></li>
                  <li class="<?php if($navbar=='system'){ echo 'active'; } ?>"><a href="<?=base_url();?>system_information">System Information</a></li>
                </ul>
              </div>
            </div>
          </li>
          <!--<li class="panel panel-default <?php if($open=='report'){ echo 'active'; } ?>" id="dropdown">
            <a data-toggle="collapse" href="#nav4">
              <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;Report <span class="caret"></span>
            </a>
            <div id="nav4" class="panel-collapse collapse <?php if($open=='report'){ echo 'in'; } ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class="<?php if($navbar=='web-report'){ echo 'active'; } ?>"><a href="<?=base_url();?>web_report">Website Visitor</a></li>
                  <li class="<?php if($navbar=='page-report'){ echo 'active'; } ?>"><a href="<?=base_url();?>page_report">Page Visitor</a></li>
                </ul>
              </div>
            </div>
          </li>-->
        </ul>
      </div>
    </nav>