<?php
$cnf  = $this->dynamic_model->read('configuration',1,0)->row();
$ct   = $this->dynamic_model->read('contact',1,0)->row();
?>

<div class="footer">
	<div class="container">
	  <div class="row">
	    <div class="col-lg-1 col-md-1 col-sm-2 hidden-xs">
	      <a href="#"><img src="<?=base_url();?>webassets/img/<?=$cnf->configuration_logo1;?>" class="img-responsive"></a>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
	      <ul>
	        <li><a href="<?=base_url();?>">home</a></li>
          <li><a href="<?=base_url();?>who">who we are</a></li>
          <li><a href="<?=base_url();?>work">our work</a></li>
          <li><a href="<?=base_url();?>contact">contact</a></li>
	      </ul>
	    </div>
	    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 footer-xs">
	      <h1>Find Us</h1>
	      <p><?=$ct->contact_address;?></p>
	      <p><a href="tel:<?=$ct->contact_phone;?>" target="_blank" data-placement="left" data-toggle="tooltip" title="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?=$ct->contact_phone;?></a></p>
	      <p><a href="mailto:<?=$ct->contact_email;?>" target="_blank" data-placement="left" data-toggle="tooltip" title="email"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$ct->contact_email;?></a></p>
	    </div>
	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	      <h1>Follow Us</h1>
	      <p><a href="<?=$ct->contact_youtube;?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> youtube</a></p>
	      <p><a href="<?=$ct->contact_instagram;?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> instagram</a></p>
	    </div>
	  </div>
	</div>
</div>

<div class="copyright">
	<div class="container">
	  <div class="row">
	    <div class="col-lg-12 text-center">
	      <div class="">
	        <p><?=$cnf->configuration_copyright;?></p>
	      </div>
	    </div>
	  </div>
	</div>
</div>