<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {
	function index($offset=NULL){
		//pengaturan pagination
        $limit = 10;
        $totalRows 	= $this->dynamic_model->read('user','','')->num_rows();
        $data 		= $this->dynamic_model->read('user',$limit,$offset,'','','user_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."user/index";
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

        $view['data'] = array(
            'data'          => $data,
            'pagination'    => $this->pagination->create_links(),
            'totalRows'     => $totalRows,
            'number'        => $offset,
            'last'		    => ceil($totalRows / $limit),
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'Users',
            'breadcrumb'    => 'Users',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('user/index',$view);
    }

    function add(){
        $this->userdata     = $this->session->userdata('userdata');
        $name      		    = $this->input->post('name');
        $email              = $this->input->post('email');
        $status             = $this->input->post('status');
        $password        	= $this->input->post('password');
        $password2        	= $this->input->post('password2');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        //validation email
        $cekEmail = $this->dynamic_model->read('user',1,0,'user_email = "'.$email.'"')->num_rows();
        if($cekEmail!=0){
            $this->session->set_flashdata('flashWarning', 'Email address is already registered. Please try another email address.');
            redirect('user/add');
        }
        if($password !== $password2){
            $this->session->set_flashdata('flashWarning', 'The confirmation password is not same');
            redirect('user/add');
        }
        if(isset($button)){
            $dataSimpan = array(
                'user_name'         => $name,
                'user_email'        => $email,
                'user_password'     => md5($password),
                'user_status'       => $status,
                'user_insertindb'   => $date,
            );
            $save = $this->dynamic_model->save('user',$dataSimpan);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('user');
        }
        $view['data'] = array(
            'data'      	=> '',
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'Add User',
            'breadcrumb'    => 'Users',
            'breadcrumb2'   => 'Add User',
        );
        $this->template->theme_main('user/form_user',$view);
    }

    function update($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $name               = $this->input->post('name');
        $email              = $this->input->post('email');
        $status             = $this->input->post('status');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('password2');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        //validation email
        $cekEmail = $this->dynamic_model->read('user',1,0,'user_email = "'.$email.'" and user_id != "'.$id.'"')->num_rows();
        if($cekEmail!=0){
            $this->session->set_flashdata('flashWarning', 'Email address is already registered. Please try another email address.');
            redirect('user/update/'.$id);
        }
        if(isset($button)){
            $dataUpdate = array(
                'user_name'         => $name,
                'user_email'        => $email,
                'user_status'       => $status,
                'user_insertindb'   => $date,
            );
            $update = $this->dynamic_model->update('user','user_id="'.$id.'"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('user');
        }
        $view['data'] = array(
            'data'      	=> $this->dynamic_model->read('user',1,0,'user_id = "'.$id.'"')->result(),
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'Edit User',
            'breadcrumb'    => 'Users',
            'breadcrumb2'   => 'Edit User',
        );
        $this->template->theme_main('user/form_user',$view);
    }

    function delete($id=''){
        $delete = $this->dynamic_model->delete('user','user_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('user');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('user');
        }
    }

    function change_password($id=''){
        $this->userdata     = $this->session->userdata('userdata');
        $button             = $this->input->post('button');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('password2');
        if(isset($button)){
            if($password !== $password2){
                $this->session->set_flashdata('flashWarning', 'The confirmation password is not same');
                redirect('user/change_password/'.$id);
            }
            $dataUpdate = array(
                'user_password'     => md5($password),
                );
            $update = $this->dynamic_model->update('user','user_id="'.$id.'"',$dataUpdate);
            if($update){
                $this->session->set_flashdata('flashSuccess', 'Your password has been successfully saved.');
                redirect('user');
            } else {
                $this->session->set_flashdata('flashWarning', 'A problem has been occurred while changing your password.');
                redirect('user/change_password/'.$id);
            }
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('user',1,0,'user_id = "'.$id.'"')->result(),
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'Change User',
            'breadcrumb'    => 'User',
            'breadcrumb2'   => 'Change Password',
        );
        $this->template->theme_main('user/form_password',$view);
    }
}