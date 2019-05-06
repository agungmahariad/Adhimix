<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Who extends MX_Controller {
    function index(){
        $this->userdata     = $this->session->userdata('userdata');
        $title1             = $this->input->post('title1');
        $title2             = $this->input->post('title2');
        $title3             = $this->input->post('title3');
        $content1           = $this->input->post('content1');
        $content2           = $this->input->post('content2');
        $content3           = $this->input->post('content3');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $dataUpdate = array(
                'who_title1'        => $title1,
                'who_title2'        => $title2,
                'who_title3'        => $title3,
                'who_content1'      => $content1,
                'who_content2'      => $content2,
                'who_content3'      => $content3,
                'who_insertindb'    => $date,
            );
            $update = $this->dynamic_model->update('who','who_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('who');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('who',0,0,'who_id="1"')->result(),
            'icon'          => 'suitcase',
            'open'          => 'who',
            'navbar'        => 'who',
            'title'         => 'Who We Are',
            'breadcrumb'    => 'Who We Are',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('who/index',$view);
    }
}