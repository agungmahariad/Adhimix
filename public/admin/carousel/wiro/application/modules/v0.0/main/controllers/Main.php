<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller {
    function index(){
    	$session      = $this->session->userdata('userdata');
  		$userName     = $session['user_name'];
        $view['data'] = array(
            'icon'          => 'dashboard',
            'open'          => 'dashboard',
            'navbar'        => 'dashboard',
            'title'         => 'Dashboard',
            'breadcrumb'    => '',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('main/main',$view);
    }
}