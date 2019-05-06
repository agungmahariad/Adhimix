<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class team extends MX_Controller {
    function index($offset=NULL){
        //pengaturan pagination
        $limit = 10;
        $totalRows  = $this->dynamic_model->read('team','','')->num_rows();
        $data       = $this->dynamic_model->read('team',$limit,$offset,'','','team_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."team/index/";
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
            'icon'          => 'user',
            'open'          => 'team',
            'navbar'        => 'team',
            'title'         => 'Team',
            'breadcrumb'    => 'Team',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('team/index',$view);
    }

    function add(){
        $this->userdata     = $this->session->userdata('userdata');
        $name               = $this->input->post('name');
        $position           = $this->input->post('position');
        $email              = $this->input->post('email');
        $description        = $this->input->post('description');
        $button             = $this->input->post('button');
        $status             = $this->input->post('status');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "team_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/team/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if ($this->upload->do_upload('image')){
                    $gbr = $this->upload->data();
                    $dataSimpan = array(
                        'team_name'          => $name,
                        'team_position'      => $position,
                        'team_email'         => $email,
                        'team_description'   => $description,
                        'team_image'         => $gbr['file_name'],
                        'team_status'        => $status,
                        'team_insertindb'    => $date,
                    );
                    $save = $this->dynamic_model->save('team',$dataSimpan);
                    if($save){
                        $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                        redirect('team');
                    } else{
                        $this->session->set_flashdata('flashWarning', 'A problem has been occurred while submitting your data.');
                        redirect('team/add');
                    }
                } else {
                    $this->session->set_flashdata('flashWarning', 'The image file could not be uploaded. Only files with the following extensions are allowed: gif,jpg,png,jpeg,bmp.');
                    redirect('team/add');
                }
            }
        }
        $view['data'] = array(
            'data'          => '',
            'icon'          => 'user',
            'open'          => 'team',
            'navbar'        => 'team',
            'title'         => 'Add Team',
            'breadcrumb'    => 'Team',
            'breadcrumb2'   => 'Add Team',
        );
        $this->template->theme_main('team/form_team',$view);
    }

    function update($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $name               = $this->input->post('name');
        $position           = $this->input->post('position');
        $email              = $this->input->post('email');
        $description        = $this->input->post('description');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "team_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/team/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
            if(!empty($_FILES['image']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $gbr = $this->upload->data();
                $dataUpdate = array(
                    'team_name'          => $name,
                    'team_position'      => $position,
                    'team_email'         => $email,
                    'team_description'   => $description,
                    'team_image'         => $gbr['file_name'],
                    'team_status'        => $status,
                    'team_insertindb'    => $date,
                );
                $dataImage  = $this->dynamic_model->read('team',1,0,'team_id = "'.$id.'"')->result();
                $img        = (isset($dataImage[0]->team_image))? $dataImage[0]->team_image : set_value('team_image');
                if($img!==""){
                    unlink('./../webassets/img/team/'.$img);
                }
                $update = $this->dynamic_model->update('team','team_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('team/index/');
            } else {
                $dataUpdate = array(
                    'team_name'          => $name,
                    'team_position'      => $position,
                    'team_email'         => $email,
                    'team_description'   => $description,
                    'team_status'        => $status,
                    'team_insertindb'    => $date,
                );
                $update = $this->dynamic_model->update('team','team_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('team/index');
            }
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('team',1,0,'team_id = "'.$id.'"')->result(),
            'icon'          => 'user',
            'open'          => 'team',
            'navbar'        => 'team',
            'title'         => 'Edit teams',
            'breadcrumb'    => 'Team',
            'breadcrumb2'   => 'Edit teams',
        );
        $this->template->theme_main('team/form_team',$view);
    }

    function delete($id=''){
        $dataImage  = $this->dynamic_model->read('team',1,0,'team_id = "'.$id.'"')->result();
        $img        = (isset($dataImage[0]->team_image))? $dataImage[0]->team_image : set_value('team_image');
        if($img!==""){
            unlink('./../webassets/img/team/'.$img);
        }
        $delete = $this->dynamic_model->delete('team','team_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('team/index');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('team/index');
        }
    }
}