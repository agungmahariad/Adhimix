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
    <?=$_navbar;?>
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