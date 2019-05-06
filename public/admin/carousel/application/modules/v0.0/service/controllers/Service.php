<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends MX_Controller {
    function index(){
    	$view['data'] = array(
            'title'     => 'Our Service',
            'navbar'    => 'service',
            'data'      => $this->dynamic_model->read('service','','','service_status="1001"','','service_id DESC')->result(),
            'bg'           => $this->dynamic_model->read('background',0,0,'background_id="3"')->row(),
            );
        $this->template->theme_main('service/index',$view);
    }
}