<div class="main-content main-padding">
  <div class="container-fluid">
    <div class="row mb50">
      <div class="col-lg-12">
        <div class="title">
          <h1><?=$data['title'];?></h1>
          <p><?=$data['text']->configuration_intro_text1;?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php 
      foreach($data['data'] as $view){
      $url = url_title($view->work_title,'-', TRUE);
      ?>
      <div class="col-lg-6 col-md-6 col-sm-6 pd0">
        <div class="box">
          <div class="hover">
            <div>
              <h2><?=$view->work_title;?></h2>
              <a href="<?=base_url();?>work/detail/<?=$view->work_id;?>/<?=$url;?>" class="btn btn-detail no-border">view detail</a>
            </div>
          </div>
          <div class="image">
            <img src="<?=base_url();?>webassets/img/porto/<?=$view->work_image;?>" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>