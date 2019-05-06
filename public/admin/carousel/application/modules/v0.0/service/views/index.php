<div class="main-content">
  <div class="service" style="background: url(webassets/img/bg/<?=$data['bg']->background_image;?>); background-size: <?=$data['bg']->background_type;?>; background-position: <?=$data['bg']->background_position;?>;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <h1>our service</h1>
        </div>
        <div class="col-lg-8 col-md-8">
          <div class="row">
            <?php foreach($data['data'] as $view){ ?>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <center><img src="<?=base_url();?>webassets/img/service/<?=$view->service_image;?>" class="img-responsive"></center>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
              <h2><?=$view->service_title;?></h2>
              <p><?=$view->service_description;?></p>
            </div>
            <div class="clr mb30"></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>