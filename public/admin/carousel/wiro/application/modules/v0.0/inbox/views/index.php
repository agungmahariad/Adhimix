
              <table class="table table-bordered table-hover mb0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th><i aria-hidden="true" class="fa fa-cog"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $number = 0;
                      foreach($data['data'] as $view){
                        $number++;
                        $content = substr($view->inbox_content,0,30);
                      ?>
                      <tr>
                        <td align="center"><?=$number;?></td>
                        <td><?=$view->inbox_fullname;?></td>
                        <td align="center"><?=$view->inbox_email;?></td>
                        <td align="center"><?=$view->inbox_subject;?></td>
                        <td><?=$content;?></td>
                        <td align="center"><?=strftime("%d %B %Y %H:%M", strtotime($view->inbox_date))?></td>
                        <td align="center"><span class="label" style="background:<?=$view->status_management_color;?>;"><?=$view->status_management_name;?></span></td>
                        <td align="center" width="7%">
                          <a href="<?=base_url();?>inbox/detail/<?=$view->inbox_id;?>" class="btn btn-xs btn-setting" data-toggle="tooltip" title="View"><i aria-hidden="true" class="fa fa-eye"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>