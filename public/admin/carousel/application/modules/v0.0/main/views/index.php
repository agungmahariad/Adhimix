<div class="home-banner-image">
  <?php
  $number = 0;
  foreach($data['banner'] as $view){
    $number++;
  ?>
  <div class="item">
    <div class="banner-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1><?=$view->banner_title;?></h1>
            <h2><?=$view->banner_description;?></h2>
            <?php if($view->banner_embed != ''){?>
            <a href="#" class="btn btn-play btn-lg" data-toggle="modal" data-target="#pop-banner1"><i class="fa fa-play" aria-hidden="true"></i></a>
            <?php }else{?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <img src="<?=base_url();?>webassets/img/banner/<?=$view->banner_image;?>">
  </div>
  <?php } ?>
</div>

<div class="recent-work">
  <div class="container-fluid">
    <div class="row mb50">
      <div class="col-lg-12">
        <div class="title text-center">
          <h1>recent work</h1>
          <p>lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $number = 0;
      foreach($data['work'] as $view){
        $number++;
      ?>
      <div class="col-lg-6 col-md-6 col-sm-6 pd0">
        <div class="box">
          <div class="hover">
            <div>
              <h2><?=$view->work_title;?></h2>
              <a href="#" class="btn btn-play btn-lg" data-toggle="modal" data-target="#pop<?=$number;?>"><i class="fa fa-play" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="image">
            <img src="<?=base_url();?>webassets/img/porto/<?=$view->work_image;?>" class="img-responsive">
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="popup">
  <?php
  $number = 0;
  foreach($data['work'] as $view){
    $number++;
  ?>
  <div class="modal fade" id="pop<?=$number;?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a href="#" class="close" data-dismiss="modal">
            <i class="fa fa-close" aria-hidden="true"></i>
          </a>
          <h1><?=$view->work_title;?></h1>
        </div>
        <div class="modal-body">
          <div class="box-video">
            <iframe width="100%" height="500" src="<?=$view->work_video;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

<div class="popup">
  <?php
  $number = 0;
  foreach($data['banner'] as $view){
    $number++;
  ?>
  <div class="modal fade" id="pop-banner<?=$number;?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a href="#" class="close" data-dismiss="modal">
            <i class="fa fa-close" aria-hidden="true"></i>
          </a>
          <h1><?=$view->banner_title;?></h1>
        </div>
        <div class="modal-body">
          <div class="box-video">
            <iframe width="100%" height="500" src="<?=$view->banner_embed;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>