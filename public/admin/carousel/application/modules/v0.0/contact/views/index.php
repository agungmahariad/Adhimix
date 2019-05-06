<div class="main-content main-padding">
  <div class="container">
    <div class="row mb50">
      <div class="col-lg-12">
        <div class="title">
          <h1>Contact</h1>
          <p><?=$data['text']->configuration_intro_text2;?></p>
        </div>
      </div>
    </div>
    <div class="row mb50">
      <div class="col-lg-6 col-md-6">
        <div class="contact mb20">
          <h2>Address</h2>
          <p><?=$data['data']->contact_address;?></p>
        </div>
        <div class="contact mb20">
          <h2>Phone</h2>
          <p><a href="tel:<?=$data['data']->contact_phone;?>" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i> <?=$data['data']->contact_phone;?></a></p>
        </div>
        <div class="contact mb20">
          <h2>Email</h2>
          <p><a href="mailto:<?=$data['data']->contact_email;?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$data['data']->contact_email;?></a></p>
        </div>
        <div class="contact mb20">
          <h2>Follow Us</h2>
          <p><a href="<?=$data['data']->contact_youtube;?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> youtube</a></p>
          <p><a href="<?=$data['data']->contact_instagram;?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> instagram</a></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="contact">
          <?php if ($this->session->flashdata('flashSuccess')){ ?>
            <div class="alert alert-success fade in" style="text-align: left;">
              <strong>Success! </strong><?=$this->session->flashdata('flashSuccess') ?>
            </div>
          <?php }elseif($this->session->flashdata('flashWarning')){ ?>
            <div class="alert alert-warning fade in" style="text-align: left;">
              <strong>Warning! </strong><?=$this->session->flashdata('flashWarning') ?>
            </div>
          <?php } ?>
          <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control no-border" placeholder="Full Name" name="fullname" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control no-border" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control no-border" placeholder="Subject" name="subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control no-border" placeholder="Messages" rows="4" name="messages" required></textarea>
            </div>
            <div class="form-group">
              <br>
              <button type="submit" class="btn btn-default no-border" name="button">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 pd0">
        <div class="maps">
          <iframe src="<?=$data['data']->contact_maps;?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>