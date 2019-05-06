<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_information extends MX_Controller {
    function index(){
        $view['data'] = array(
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'system',
            'title'         => 'System Information',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'System Information',
        );
        $this->template->theme_main('system_information/index',$view);
    }
}