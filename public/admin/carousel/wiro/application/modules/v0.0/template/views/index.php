<?php
/*$route = $this->router->method;*/
$user_id      = $this->session->userdata('userdata')['user_id'];
$accountName  = $this->session->userdata('userdata')['user_name'];
$countInbox   = $this->dynamic_model->read('inbox',0,0,'inbox_status="1002"')->num_rows();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CONTENT MANAGEMENT SYSTEM</title>

    <meta name="robots" content="nofollow, noindex"> 
    <meta name="googlebot" content="nofollow, noindex"/>
    <meta name="Googlebot-Image" content="nofollow, noindex"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>webassets/img/favico.png" />

    <!-- Bootstrap -->
    <link href="<?=base_url();?>webassets/css/bootstrap/bootstrap.css" rel="stylesheet" />

    <!-- Bootstrap Color Picker -->
    <link href="<?=base_url();?>webassets/css/bootstrap/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Bootstrap Datetime Picker -->
    <link href="<?=base_url();?>webassets/css/bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- Font Awesome -->
    <link href="<?=base_url();?>webassets/css/font/font-awesome.min.css" rel="stylesheet" />

    <!-- Style -->
    <link href="<?=base_url();?>webassets/css/style.css" rel="stylesheet" />
    <link href="<?=base_url();?>webassets/css/responsive.css" rel="stylesheet" />
  </head>

  <body>
	  <div class="header">
	    <nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
	          <i class="fa fa-list" aria-hidden="true"></i> MENU
	          </button>
	          <button type="button" class="navbar-toggle collapsed hidden-sm hidden-xs" data-toggle="collapse" data-target="#nav-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?=base_url();?>main"><img src="<?=base_url();?>webassets/img/logo.png"></a>
	        </div>

	        <div class="collapse navbar-collapse hidden-sm hidden-xs" id="nav-collapse">
	          <!--<form class="navbar-form navbar-left" method="GET" role="search">
	            <div class="form-group">
	              <input type="text" name="q" class="form-control" placeholder="Search">
	            </div>
	            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
	          </form>-->
	          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?=base_url();?>inbox"><span class="label" style="background:#CB2028;"><?=$countInbox;?></span> <i class="fa fa-envelope" aria-hidden="true"></i> Inbox</a></li>
	            <li><a href="http://pdai.or.id/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Visit Site</a></li>
	            <li class="dropdown ">
	            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Welcome, <?=$accountName;?><span class="caret"></span></a>
	              <ul class="dropdown-menu" role="menu">
	                <li><a href="<?=base_url();?>profile/index"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
	                <li><a href="<?=base_url();?>profile/change_password"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
	                <li><a href="<?=base_url();?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
	              </ul>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	  </div>

    <div class="wrapper">
	    <div class="container-fluid">
	      <div class="row">
	      	<div class="col-lg-2">
            <div class="side-menu">
              <?=$_navbar;?>
            </div>
	        </div>
	        <div class="col-md-10">
	        	<div class="main-content">
		        	<div class="breadcrumb-page">
		        		<ol class="breadcrumb">
                    <li><a href="<?=base_url();?>main">Dashboard</a></li>
                  <?php if(!empty($data['breadcrumb'])){ ?>
                    <li><a href="#"><?=$data['breadcrumb'];?></a></li>
                  <?php } ?>
                  <?php if(!empty($data['breadcrumb2'])){ ?>
                    <li><a href="#"><?=$data['breadcrumb2'];?></a></li>
                  <?php } ?>
								</ol>
		        	</div>
		          <div class="panel panel-primary">
		            <div class="panel-heading">
		              <h1><i class="fa fa-<?=$data['icon'];?>" aria-hidden="true"></i>&nbsp;&nbsp;<?=$data['title'];?></h1>
		              <!--<div class="pull-right action-buttons">
		                <div class="btn-group pull-right">
		                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
		                      <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
		                  </button>
		                  <ul class="dropdown-menu slidedown">
		                      <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
		                      <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
		                      <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
		                  </ul>
		                </div>
		              </div>-->
		            </div>
		            <div class="panel-body">
                  <?=$_content;?>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
      </div>
    </div>

    <div class="footer">
      <p>Copyright &copy;2018 Carousel - All Rights Reserved</p>
    </div>


    <a href="#" class="back-to-top"><span id="toTopHover" style="opacity: 1;"></span></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="<?=base_url();?>webassets/js/jquery.min.1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>webassets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Bootstrap Color Picker -->
    <script src="<?=base_url();?>webassets/js/bootstrap/bootstrap-colorpicker.js"></script>
    <script type="text/javascript">
      $(function() {
        $('.color-picker').colorpicker();
      });
    </script>

    <!-- Bootstrap Datetime Picker -->
    <script type="text/javascript" src="<?=base_url();?>webassets/js/bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">
      $('.form-time').datetimepicker({
        format: 'hh:ii',
        startView: 1,
        minView: 0,
      });
      $('.form-date').datetimepicker({
        format: 'yyyy-mm-dd',
        startView: 2,
        minView: 2,
        weekStart: 1,
        autoclose: 1,
        todayBtn:  1,
        todayHighlight: 1
      });
      $('.form-date-time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        startView: 2,
        weekStart: 1,
        autoclose: 1,
        todayBtn:  1,
        todayHighlight: 1
      });
      $('.form-date-birth').datetimepicker({
        format: 'yyyy-mm-dd',
        startView: 4,
        minView: 2,
        weekStart: 1,
        autoclose: 1
      });
    </script>

    <!-- CK Editor -->
    <!--<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>-->
    <script src="http://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

    <!-- Own Js -->
    <script type="text/javascript" src="<?=base_url();?>webassets/js/own.js"></script>
  </body>
</html>