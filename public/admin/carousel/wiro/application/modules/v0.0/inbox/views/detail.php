<?php
$fullName   = (isset($data['data'][0]->inbox_fullname))? $data['data'][0]->inbox_fullname : set_value('inbox_fullname');
$email      = (isset($data['data'][0]->inbox_email))? $data['data'][0]->inbox_email : set_value('inbox_email');
$subject    = (isset($data['data'][0]->inbox_subject))? $data['data'][0]->inbox_subject : set_value('inbox_subject');
$content    = (isset($data['data'][0]->inbox_content))? $data['data'][0]->inbox_content : set_value('inbox_content');
$createDate = (isset($data['data'][0]->inbox_date))? $data['data'][0]->inbox_date : set_value('inbox_date');
$updateDate = (isset($data['data'][0]->inbox_read_date))? $data['data'][0]->inbox_read_date : set_value('inbox_read_date');
?>
		            <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <h2>Detail of Message</h2>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="pd-left10">Fullname</label>
                        <p class="pd-left10"><?=$fullName;?></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="pd-left10">Email</label>
                        <p class="pd-left10"><?=$email;?></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="pd-left10">Subject</label>
                        <p class="pd-left10"><?=$subject;?></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="pd-left10">Message</label>
                        <p class="pd-left10"><?=$content;?></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <h2>Information</h2>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="pd-left10">Created Date</label>
                        <p class="pd-left10"><i><?=strftime("%d %B %Y %H:%M", strtotime($createDate))?></i></p>
                      </div>
                    </div>
                    <div class="clr"></div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="pd-left10">Read Date</label>
                        <p class="pd-left10"><i><?=strftime("%d %B %Y %H:%M", strtotime($updateDate))?></i></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <br>
                        <a href="<?=base_url();?>inbox" class="btn btn-back mb10">Back</a>
                      </div>
                    </div>
                  </div>