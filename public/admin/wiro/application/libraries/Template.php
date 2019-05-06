<?php

class Template {
    protected $_ci;
    function __construct() {
        $this->_ci = &get_instance();
    }
    function theme_main($template, $data=null) {
        $data['_navbar']        = $this->_ci->load->view('template/navbar', $data, TRUE);
        $data['_content']       = $this->_ci->load->view($template, $data, TRUE);
        $this->_ci->load->view('template/index.php', $data);
    }
}
