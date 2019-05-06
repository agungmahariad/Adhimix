<div class="main-content">
  <div class="team" style="background: url(webassets/img/bg/<?=$data['bg']->background_image;?>); background-size: <?=$data['bg']->background_type;?>; background-position: <?=$data['bg']->background_position;?>;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <h1>our team</h1>
        </div>
        <div class="col-lg-8 col-md-8">
          <div class="row">
            <?php foreach($data['data'] as $view){ ?>
            <div class="col-lg-5 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
              <img src="<?=base_url();?>webassets/img/team/<?=$view->team_image;?>" class="img-responsive">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
              <h2><?=$view->team_name;?></h2>
              <p><i class="fa fa-suitcase" aria-hidden="true"></i> <?=$view->team_position;?></p>
              <p class="mb10"><a href="mailto:<?=$view->team_email;?>"><i class="fa fa-envelope" aria-hidden="true"></i>  <?=$view->team_email;?></a></p>
              <?=$view->team_description;?>
            </div>
            <div class="clr mb30"></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>