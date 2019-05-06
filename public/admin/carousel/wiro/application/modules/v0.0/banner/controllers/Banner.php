<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends MX_Controller {
    function index($offset=NULL){
        //pengaturan pagination
        $limit = 10;
        $totalRows  = $this->dynamic_model->read('banner','','')->num_rows();
        $data       = $this->dynamic_model->read('banner',$limit,$offset,'','','banner_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."banner/index/";
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
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'banner',
            'title'         => 'Banner',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'Banner',
        );
        $this->template->theme_main('banner/index',$view);
    }

    function add(){
        $this->userdata     = $this->session->userdata('userdata');
        $title              = $this->input->post('title');
        $description        = $this->input->post('description');
        $embed              = $this->input->post('embed');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "banner_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/banner/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if ($this->upload->do_upload('image')){
                    $gbr = $this->upload->data();
                    $dataSimpan = array(
                        'banner_title'         => $title,
                        'banner_description'   => $description,
                        'banner_embed'         => $embed,
                        'banner_image'         => $gbr['file_name'],
                        'banner_status'        => $status,
                        'banner_insertindb'    => $date,
                    );
                    $save = $this->dynamic_model->save('banner',$dataSimpan);
                    if($save){
                        $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                        redirect('banner');
                    } else{
                        $this->session->set_flashdata('flashWarning', 'A problem has been occurred while submitting your data.');
                        redirect('banner/add');
                    }
                } else {
                    $this->session->set_flashdata('flashWarning', 'The image file could not be uploaded. Only files with the following extensions are allowed: gif,jpg,png,jpeg,bmp.');
                    redirect('banner/add');
                }
            }
        }
        $view['data'] = array(
            'data'          => '',
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'banner',
            'title'         => 'Add Banner',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'Add Banner',
        );
        $this->template->theme_main('banner/form_banner',$view);
    }

    function update($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $title              = $this->input->post('title');
        $url                = $this->input->post('url');
        $description        = $this->input->post('description');
        $embed              = $this->input->post('embed');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "banner_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/banner/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            if(!empty($_FILES['image']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $gbr = $this->upload->data();
                $dataUpdate = array(
                    'banner_title'         => $title,
                    'banner_description'   => $description,
                    'banner_embed'         => $embed,
                    'banner_image'         => $gbr['file_name'],
                    'banner_status'        => $status,
                    'banner_insertindb'    => $date,
                );
                $dataImage  = $this->dynamic_model->read('banner',1,0,'banner_id = "'.$id.'"')->result();
                $img        = (isset($dataImage[0]->banner_image))? $dataImage[0]->banner_image : set_value('banner_image');
                if($img!==""){
                    unlink('./../webassets/img/banner/'.$img);
                }
                $update = $this->dynamic_model->update('banner','banner_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('banner/index/');
            } else {
                $dataUpdate = array(
                    'banner_title'         => $title,
                    'banner_description'   => $description,
                    'banner_embed'         => $embed,
                    'banner_status'        => $status,
                    'banner_insertindb'    => $date,
                );
                $update = $this->dynamic_model->update('banner','banner_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('banner/index');
            }
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('banner',1,0,'banner_id = "'.$id.'"')->result(),
            'icon'          => 'puzzle-piece',
            'open'          => 'module',
            'navbar'        => 'banner',
            'title'         => 'Edit Banner',
            'breadcrumb'    => 'Modules',
            'breadcrumb2'   => 'Edit Banner',
        );
        $this->template->theme_main('banner/form_banner',$view);
    }

    function delete($id=''){
        $dataImage  = $this->dynamic_model->read('banner',1,0,'banner_id = "'.$id.'"')->result();
        $img        = (isset($dataImage[0]->banner_image))? $dataImage[0]->banner_image : set_value('banner_image');
        if($img!==""){
            unlink('./../webassets/img/banner/'.$img);
        }
        $delete = $this->dynamic_model->delete('banner','banner_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('banner/index');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('banner/index');
        }
    }
}