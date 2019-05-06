<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class metadata extends MX_Controller {
	function index(){
        $button         = $this->input->post('button');
        if(isset($button)){
            $dataUpdate = array(
                'general_author'            => $this->input->post('general_author'),
                'general_copyright'         => $this->input->post('general_copyright'),
                'general_expires'           => $this->input->post('general_expires'),
                'general_robots'            => $this->input->post('general_robots'),
                'general_googlebot'         => $this->input->post('general_googlebot'),
                'general_googlebot_image'   => $this->input->post('general_googlebot_image'),
                'general_description'       => $this->input->post('general_description'),
                'general_keyword'           => $this->input->post('general_keyword'),
                'gp_name'                   => $this->input->post('gp_name'),
                'gp_image'                  => $this->input->post('gp_image'),
                'gp_description'            => $this->input->post('gp_description'),
                'og_title'                  => $this->input->post('og_title'),
                'og_sitename'               => $this->input->post('og_sitename'),
                'og_url'                    => $this->input->post('og_url'),
                'og_image'                  => $this->input->post('og_image'),
                'og_description'            => $this->input->post('og_description'),
            );
            $update = $this->dynamic_model->update('metadata','metadata_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('metadata/index');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('metadata',0,0,'metadata_id="1"')->result(),
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'metadata',
            'title'         => 'Meta Data',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'Meta Data',
        );
        $this->template->theme_main('metadata/index',$view);
    }
}