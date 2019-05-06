<div class="main-content main-padding">
  <div class="container">
    <div class="row mb10">
      <div class="col-lg-12 text-center">
        <div class="title">
          <h1><?=$data['data']->work_title;?></h1>
        </div>
      </div>
    </div>
    <div class="row mb10">
      <div class="col-lg-12">
        <div class="video-detail">
          <iframe width="100%" height="420" src="<?=$data['data']->work_video;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="row mb50">
      <div class="col-lg-12">
        <div class="work-detail">
          <div class="row">
            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-6">
              <h2>Category</h2>
              <p><?=$data['data']->work_category_name;?></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
              <h2>Year</h2>
              <p><?=$data['data']->work_year;?></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
              <h2>Client</h2>
              <p><?=$data['data']->work_client;?></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
              <h2>Agency</h2>
              <p><?=$data['data']->work_agency;?></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
              <h2>Director</h2>
              <p><?=$data['data']->work_director;?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb10">
      <div class="col-lg-12">
        <div class="title">
          <h1>Other Work</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="work-related">
          <?php 
          foreach($data['other'] as $view){
          $url = url_title($view->work_title,'-', TRUE);
          ?>
          <div class="item">
            <div class="box-related">
              <div class="hover">
                <div>
                  <h2><?=$view->work_title;?></h2>
                  <a href="<?=base_url();?>work/detail/<?=$view->work_id;?>/<?=$url;?>" class="btn btn-detail-work btn-sm no-border">view detail</a>
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
  </div>
</div>