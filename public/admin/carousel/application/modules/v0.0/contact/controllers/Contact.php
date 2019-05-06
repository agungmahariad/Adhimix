<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MX_Controller {
    function index(){
    	$button = $this->input->post('button');
    	if(isset($button)){
    		$data = array(
                'inbox_fullname'    => $this->input->post('fullname'),
                'inbox_email'       => $this->input->post('email'),
                'inbox_subject'     => $this->input->post('subject'),
                'inbox_content'   	=> $this->input->post('messages'),
                'inbox_date'        => date("Y-m-d H:i:s"),
                'inbox_status'      => '1002'
            );
            $save = $this->dynamic_model->save('inbox',$data);
            $this->session->set_flashdata('flashSuccess', 'Messages has been sended.');
            redirect('contact');
    	}
        $view['data'] = array(
            'title'    		=> 'Contact',
            'navbar' 		=> 'contact',
            'data'       	=> $this->dynamic_model->read('contact',0,0,'contact_id="1"')->row(),
            'text'       	=> $this->dynamic_model->read('configuration',0,0,'configuration_id="1"')->row(),
            );
        $this->template->theme_main('contact/index',$view);
    }
}