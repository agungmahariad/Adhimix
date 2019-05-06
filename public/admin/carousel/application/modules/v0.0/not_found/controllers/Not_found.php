<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Not_found extends MX_Controller {
    function index(){
        $view['data'] = array(
            'title'    		=> '404 Not Found',
            'navbar' 		=> '404 not found',
        );
        $this->template->theme_main('not_found/index',$view);
    }
}