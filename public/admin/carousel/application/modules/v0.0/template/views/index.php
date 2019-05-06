<?php
$cnf  = $this->dynamic_model->read('configuration',1,0)->row();
$menu = $this->dynamic_model->read('menu',1,0)->row();
$ct   = $this->dynamic_model->read('contact',1,0)->row();
$meta = $this->dynamic_model->read('metadata',1,0)->row();
$navbar = $data['navbar'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$cnf->configuration_website_name;?></title>

    <!-- Meta Data General -->
    <meta name="author" content="<?=$meta->general_author;?>"/>
    <meta name="description" content="<?=$meta->general_description;?>">
    <meta name="keywords" content="<?=$meta->general_keyword;?>">
    <meta name="copyright" content="<?=$meta->general_copyright;?>"/>
    <meta name="expires" content="never"/>
    <meta name="robots" content="<?=$meta->general_robots;?>"> 
    <meta name="googlebot" content="<?=$meta->general_googlebot;?>"/>
    <meta name="Googlebot-Image" content="<?=$meta->general_googlebot_image;?>"/>

    <!-- Meta Data Google+ -->
    <meta itemprop="name" content="<?=$meta->gp_name;?>">
    <meta itemprop="description" content="<?=$meta->gp_description;?>">
    <meta itemprop="image" content="<?=$meta->gp_image;?>">

    <!-- Meta Data Open Graph -->
    <meta property="og:title" content="<?=$meta->og_title;?>" />
    <meta property="og:description" content="<?=$meta->og_description;?>" />
    <meta property="og:site_name" content="<?=$meta->og_sitename;?>" />
    <meta property="og:url" content="<?=$meta->og_url;?>" />
    <meta property="og:image" content="<?=$meta->og_image;?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>webassets/img/<?=$cnf->configuration_favicon;?>">

    <!-- Bootstrap -->
    <link href="<?=base_url();?>webassets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="<?=base_url();?>webassets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>webassets/css/responsive.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?=base_url();?>webassets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Font Custom -->
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet"> 
    <!--<link href="css/font-custom.css" rel="stylesheet">-->

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>webassets/js/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>webassets/js/slick/slick-theme.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div id="menu-slide" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
      <a href="<?=base_url();?>who" class="<?=$menu->menu_who;?> <?php if($navbar=='who'){ echo 'active'; } ?>">who we are</a>
      <a href="<?=base_url();?>service" class="<?=$menu->menu_service;?> <?php if($navbar=='service'){ echo 'active'; } ?>">service</a>
      <a href="<?=base_url();?>team" class="<?=$menu->menu_team;?> <?php if($navbar=='team'){ echo 'active'; } ?>">team</a>
      <a href="<?=base_url();?>work" class="<?=$menu->menu_work;?> <?php if($navbar=='work'){ echo 'active'; } ?>">our work</a>
      <a href="<?=base_url();?>contact" class="<?=$menu->menu_contact;?> <?php if($navbar=='contact'){ echo 'active'; } ?>">contact</a>
    </div>

    <div class="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-2 col-sm-2 col-xs-4">
            <a href="<?=base_url();?>"><img src="<?=base_url();?>webassets/img/<?=$cnf->configuration_logo2;?>"></a>
          </div>
          <div class="col-lg-9 col-md-10 col-sm-10 col-xs-8">
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

    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
            <a href="<?=base_url();?>"><img src="<?=base_url();?>webassets/img/<?=$cnf->configuration_logo1;?>" class="img-responsive"></a>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
            <div class="nav-slide text-right hidden-lg hidden-md hidden-sm">
              <a href="#" onclick="openNav()" class="btn-slide"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
            </div>
            <ul class="main-menu hidden-xs">
              <li class="<?=$menu->menu_who;?> <?php if($navbar=='who'){ echo 'active'; } ?>"><a href="<?=base_url();?>who">who we are</a></li>
              <li class="<?=$menu->menu_service;?> <?php if($navbar=='service'){ echo 'active'; } ?>"><a href="<?=base_url();?>service">service</a></li>
              <li class="<?=$menu->menu_team;?> <?php if($navbar=='team'){ echo 'active'; } ?>"><a href="<?=base_url();?>team">team</a></li>
              <li class="<?=$menu->menu_work;?> <?php if($navbar=='work'){ echo 'active'; } ?>"><a href="<?=base_url();?>work">our work</a></li>
              <li class="<?=$menu->menu_contact;?> <?php if($navbar=='contact'){ echo 'active'; } ?>"><a href="<?=base_url();?>contact">contact</a></li>
            </ul>
          </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
    
    <?=$_content;?>
    <?=$_footer;?>



    <a href="#" class="back-to-top"><span id="toTopHover" style="opacity: 1;"> </span></a>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>webassets/js/bootstrap.min.js"></script>

    <!-- Slick Banner -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>webassets/js/slick/slick.min.js"></script>

    <!-- Own Js -->
    <script type="text/javascript" src="<?=base_url();?>webassets/js/own.js"></script>
  </body>
</html>