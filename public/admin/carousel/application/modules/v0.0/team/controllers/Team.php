<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Team extends MX_Controller {
    function index(){
    	$view['data'] = array(
            'title'     => 'Our Team',
            'navbar'    => 'team',
            'data'      => $this->dynamic_model->read('team','','','team_status="1001"','','team_id DESC')->result(),
            'bg'           => $this->dynamic_model->read('background',0,0,'background_id="4"')->row(),
            );
        $this->template->theme_main('team/index',$view);
    }
}