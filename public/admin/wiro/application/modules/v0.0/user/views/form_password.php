  <?php if($this->session->flashdata('flashWarning')){ ?>
    <div class="alert alert-danger fade in" style="text-align: left;">
      <strong><i class="fa fa-warning"></i> Error! </strong><?=$this->session->flashdata('flashWarning') ?>
    </div>
  <?php } ?>
  <div class="row">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="">Password <span class="form-required">*</span></label>
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for="">Confirm Password <span class="form-required">*</span></label>
          <input type="password" class="form-control" name="password2" required>
        </div>
      </div>
      <div class="clr"></div>
      <div class="col-lg-12">
        <div class="form-group">
          <br>
          <a href="<?=base_url();?>user" class="btn btn-back mb10">Back</a>
          <button type="submit" class="btn btn-save mb10" name="button">Save</button>
        </div>
    </form>
  </div>
</div>