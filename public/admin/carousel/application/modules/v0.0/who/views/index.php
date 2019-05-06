<div class="main-content">
  <div class="who-top" style="background: url(webassets/img/bg/<?=$data['bg1']->background_image;?>); background-size: <?=$data['bg1']->background_type;?>; background-position: <?=$data['bg1']->background_position;?>;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <h1><?=$data['data']->who_title1;?></h1>
        </div>
        <div class="col-lg-8 col-md-8">
          <?=$data['data']->who_content1;?>
        </div>
      </div>
    </div>
  </div>
  <div class="who-bottom" style="background: url(webassets/img/bg/<?=$data['bg2']->background_image;?>); background-size: <?=$data['bg2']->background_type;?>; background-position: <?=$data['bg2']->background_position;?>;">
    <div class="container">
      <div class="row mb50">
        <div class="col-lg-4 col-md-4">
          <h1><?=$data['data']->who_title2;?></h1>
        </div>
        <div class="col-lg-8 col-md-8">
          <?=$data['data']->who_content2;?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <h1><?=$data['data']->who_title3;?></h1>
        </div>
        <div class="col-lg-8 col-md-8">
          <?=$data['data']->who_content3;?>
        </div>
      </div>
    </div>
  </div>
</div>