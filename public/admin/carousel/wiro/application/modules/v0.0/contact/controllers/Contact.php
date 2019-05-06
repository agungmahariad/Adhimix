<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends MX_Controller {
    function index(){
        $button         = $this->input->post('button');
        if(isset($button)){
            $dataUpdate = array(
                'contact_address'       => $this->input->post('contact_address'),
                'contact_phone'         => $this->input->post('contact_phone'),
                'contact_email'         => $this->input->post('contact_email'),
                'contact_instagram'     => $this->input->post('contact_instagram'),
                'contact_youtube'       => $this->input->post('contact_youtube'),
                'contact_maps'          => $this->input->post('contact_maps'),
            );
            $update = $this->dynamic_model->update('contact','contact_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('contact');
        }
        $view['data']   = array(
            'data'          => $this->dynamic_model->read('contact',0,0,'contact_id="1"')->result(),
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'contact',
            'title'         => 'Contact Information',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'Contact Information',
        );
        $this->template->theme_main('contact/index',$view);
    }
}