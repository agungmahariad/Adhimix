<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {
    function index(){
        $this->userdata     = $this->session->userdata('userdata');
        $user               = $this->userdata['user_id'];
        $name               = $this->input->post('name');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('password2');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        //validation email
        $cekEmail = $this->dynamic_model->read('user',1,0,'user_email = "'.$email.'" and user_id != "'.$user.'"')->num_rows();
        if($cekEmail!=0){
            $this->session->set_flashdata('flashWarning', 'Email address is already registered. Please try another email address.');
            redirect('profile');
        }
        if(isset($button)){
            $dataUpdate = array(
                'user_name'         => $name,
                'user_email'        => $email,
                'user_insertindb'   => $date,
            );
            $update = $this->dynamic_model->update('user','user_id="'.$user.'"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('profile');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('user',1,0,'user_id = "'.$user.'"')->result(),
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'My Profile',
            'breadcrumb'    => 'Users',
            'breadcrumb2'   => 'My Profile',
        );
        $this->template->theme_main('profile/index',$view);
    }

    function change_password(){
        $this->userdata     = $this->session->userdata('userdata');
        $user               = $this->userdata['user_id'];
        $date               = date("Y-m-d H:i:s");
        $button             = $this->input->post('button');
        $oldpassword        = $this->input->post('oldpassword');
        $password           = $this->input->post('password');
        $password2          = $this->input->post('password2');
        if(isset($button)){
            $cekPassword = $this->dynamic_model->read('user',1,0,'user_password = "'.md5($oldpassword).'" and user_id="'.$user.'"')->num_rows();
            if($cekPassword==0){
                $this->session->set_flashdata('flashWarning', 'Your current password is incorrect. Be sure you are using the password for your account.');
                redirect('profile/change_password');
            }
            if($password !== $password2){
                $this->session->set_flashdata('flashWarning', 'The confirmation password is incorrect');
                redirect('profile/change_password');
            }
            $dataUpdate = array(
                'user_password'     => md5($password),
            );
            $update = $this->dynamic_model->update('user','user_id="'.$user.'"',$dataUpdate);
            if($update){
                $this->session->set_flashdata('flashSuccess', 'Your password has been successfully saved.');
                redirect('profile/change_password');
            } else {
                $this->session->set_flashdata('flashWarning', 'A problem has been occurred while changing your password.');
                redirect('profile/change_password');
            }
        }
        $view['data'] = array(
            'icon'          => 'users',
            'open'          => 'user',
            'navbar'        => 'user',
            'title'         => 'Change Password',
            'breadcrumb'    => 'Users',
            'breadcrumb2'   => 'Change Password',
        );
        $this->template->theme_main('profile/change_password',$view);
    }
}