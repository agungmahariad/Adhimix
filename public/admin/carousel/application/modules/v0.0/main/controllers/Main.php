<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller {
    function index(){
        $view['data'] = array(
            'title'    		=> 'home',
            'navbar'    	=> 'home',
            'banner'   		=> $this->dynamic_model->read('banner',0,0,'banner_status="1001"','','banner_id DESC')->result(),
            'work'          => $this->dynamic_model->read('work',6,0,'work_status="1001"','','work_id DESC')->result(),
        );
        $this->template->theme_home('main/index',$view);
    }
}