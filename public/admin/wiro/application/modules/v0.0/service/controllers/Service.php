<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service extends MX_Controller {
    function index($offset=NULL){
        //pengaturan pagination
        $limit = 10;
        $totalRows  = $this->dynamic_model->read('service','','')->num_rows();
        $data       = $this->dynamic_model->read('service',$limit,$offset,'','','service_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."service/index/";
        $config['total_rows']       = $totalRows;
        $config['per_page']         = $limit;
        $config['full_tag_open']    = "<ul class='pagination pagination-sm pull-right'>";
        $config['full_tag_close']   ="</ul>";
        $config['num_tag_open']     = "<li>";
        $config['num_tag_close']    = "</li>";
        $config['cur_tag_open']     = "<li class='disabled active'><a href='#'>";
        $config['cur_tag_close']    = "</a></li>";
        $config['next_link']        = '»';
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        $config['prev_link']        = '«';
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";
        $this->pagination->initialize($config);

        $view['data']   = array(
            'data'          => $data,
            'pagination'    => $this->pagination->create_links(),
            'totalRows'     => $totalRows,
            'number'        => $offset,
            'last'          => ceil($totalRows / $limit),
            'icon'          => 'camera-retro',
            'open'          => 'service',
            'navbar'        => 'service',
            'title'         => 'Services',
            'breadcrumb'    => 'Services',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('service/index',$view);
    }

    function add(){
        $this->userdata     = $this->session->userdata('userdata');
        $title              = $this->input->post('title');
        $description        = $this->input->post('description');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "service_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/service/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if ($this->upload->do_upload('image')){
                    $gbr = $this->upload->data();
                    $dataSimpan = array(
                        'service_title'         => $title,
                        'service_description'   => $description,
                        'service_image'         => $gbr['file_name'],
                        'service_status'        => $status,
                        'service_insertindb'    => $date,
                    );
                    $save = $this->dynamic_model->save('service',$dataSimpan);
                    if($save){
                        $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                        redirect('service');
                    } else{
                        $this->session->set_flashdata('flashWarning', 'A problem has been occurred while submitting your data.');
                        redirect('service/add');
                    }
                } else {
                    $this->session->set_flashdata('flashWarning', 'The image file could not be uploaded. Only files with the following extensions are allowed: gif,jpg,png,jpeg,bmp.');
                    redirect('service/add');
                }
            }
        }
        $view['data'] = array(
            'data'          => '',
            'icon'          => 'camera-retro',
            'open'          => 'service',
            'navbar'        => 'service',
            'title'         => 'Add Services',
            'breadcrumb'    => 'Services',
            'breadcrumb2'   => 'Add Services',
        );
        $this->template->theme_main('service/form_service',$view);
    }

    function update($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $title              = $this->input->post('title');
        $description        = $this->input->post('description');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "service_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/service/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            if(!empty($_FILES['image']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $gbr = $this->upload->data();
                $dataUpdate = array(
                    'service_title'         => $title,
                    'service_description'   => $description,
                    'service_image'         => $gbr['file_name'],
                    'service_status'        => $status,
                    'service_insertindb'    => $date,
                );
                $dataImage  = $this->dynamic_model->read('service',1,0,'service_id = "'.$id.'"')->result();
                $img        = (isset($dataImage[0]->service_image))? $dataImage[0]->service_image : set_value('service_image');
                if($img!==""){
                    unlink('./../webassets/img/service/'.$img);
                }
                $update = $this->dynamic_model->update('service','service_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('service/index/');
            } else {
                $dataUpdate = array(
                    'service_title'         => $title,
                    'service_description'   => $description,
                    'service_status'        => $status,
                    'service_insertindb'    => $date,
                );
                $update = $this->dynamic_model->update('service','service_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('service/index');
            }
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('service',1,0,'service_id = "'.$id.'"')->result(),
            'icon'          => 'camera-retro',
            'open'          => 'service',
            'navbar'        => 'service',
            'title'         => 'Edit Services',
            'breadcrumb'    => 'Services',
            'breadcrumb2'   => 'Edit Services',
        );
        $this->template->theme_main('service/form_service',$view);
    }

    function delete($id=''){
        $dataImage  = $this->dynamic_model->read('service',1,0,'service_id = "'.$id.'"')->result();
        $img        = (isset($dataImage[0]->service_image))? $dataImage[0]->service_image : set_value('service_image');
        if($img!==""){
            unlink('./../webassets/img/service/'.$img);
        }
        $delete = $this->dynamic_model->delete('service','service_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('service/index');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('service/index');
        }
    }
}