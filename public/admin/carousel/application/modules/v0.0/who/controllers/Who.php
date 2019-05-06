<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Who extends MX_Controller {
    function index(){
    	$view['data'] = array(
            'title'    		=> 'Who We Are',
            'navbar' 		=> 'who',
            'data'       	=> $this->dynamic_model->read('who',0,0,'who_id="1"')->row(),
            'bg1'           => $this->dynamic_model->read('background',0,0,'background_id="1"')->row(),
            'bg2'           => $this->dynamic_model->read('background',0,0,'background_id="2"')->row(),
            );
        $this->template->theme_main('who/index',$view);
    }
}