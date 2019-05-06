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
    <div class="login-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-lg-offset-4">
            <div class="login-area login-top">
              <center><img src="<?=base_url();?>webassets/img/logo-login.png" class="img-responsive"></center>
              <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-warning fade in mt20 mb0" style="text-align: left;">
                <strong>Warning! </strong><?=$this->session->flashdata('error') ?>
              </div>
              <?php endif ?>
            </div>
          </div>
          <div class="clr"></div>
          <div class="col-lg-4 col-lg-offset-4">
            <div class="login-area login-bottom">
              <form action="" method="post">
                <input type="text" placeholder="Email" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <input type="submit" value="Sign In" class="btn btn-default btn-sm" name="login" />
                <br><br>
                <!--<p><a href="<?=base_url();?>login/forgot_password">Forgot Password</a></p>-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <a href="#" class="back-to-top"><span id="toTopHover" style="opacity: 1;"></span></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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