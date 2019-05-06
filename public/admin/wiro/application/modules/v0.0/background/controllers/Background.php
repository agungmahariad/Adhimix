<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class background extends MX_Controller {
    function index($offset=NULL){
        $view['data']   = array(
            'data'          => $this->dynamic_model->read('background','','','','','background_id DESC')->result(),
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'background',
            'title'         => 'background',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'background',
        );
        $this->template->theme_main('background/index',$view);
    }

    function update($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $type               = $this->input->post('type');
        $position           = $this->input->post('position');
        $repeat             = $this->input->post('repeat');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "background_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/bg/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            if(!empty($_FILES['image']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $gbr = $this->upload->data();
                $dataUpdate = array(
                    'background_type'           => $type,
                    'background_position'       => $position,
                    'background_repeat'         => $repeat,
                    'background_image'          => $gbr['file_name'],
                    'background_insertindb'     => $date,
                );
                $dataImage  = $this->dynamic_model->read('background',1,0,'background_id = "'.$id.'"')->result();
                $img        = (isset($dataImage[0]->background_image))? $dataImage[0]->background_image : set_value('background_image');
                if($img!==""){
                    unlink('./../webassets/img/bg/'.$img);
                }
                $update = $this->dynamic_model->update('background','background_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('background/index/');
            } else {
                $dataUpdate = array(
                    'background_type'           => $type,
                    'background_position'       => $position,
                    'background_repeat'         => $repeat,
                    'background_insertindb'     => $date,
                );
                $update = $this->dynamic_model->update('background','background_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('background/index');
            }
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('background',1,0,'background_id = "'.$id.'"')->result(),
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'background',
            'title'         => 'Edit background',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'Edit background',
        );
        $this->template->theme_main('background/form_background',$view);
    }

    function delete($id=''){
        $dataImage  = $this->dynamic_model->read('background',1,0,'background_id = "'.$id.'"')->result();
        $img        = (isset($dataImage[0]->background_image))? $dataImage[0]->background_image : set_value('background_image');
        if($img!==""){
            unlink('./../webassets/img/bg/'.$img);
        }
        $delete = $this->dynamic_model->delete('background','background_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('background/index');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('background/index');
        }
    }
}