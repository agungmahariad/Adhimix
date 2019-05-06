<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
    public function index() {
        $this->userdata = $this->session->userdata('userdata');
        if ($this->userdata){
            redirect('main');
        } else {
            $this->access->logout();
            $this->login();
        }
    }

    public function login() {
        if (!isset($_POST['login'])) {
            if ($this->session->flashdata('page')){
                $this->session->set_flashdata('page',$this->session->flashdata('page'));
            }
            $this->load->view('login/index');
        } else {
            if ($this->session->flashdata('page')){
                $page = $this->session->flashdata('page');
            } else {
                $page = 'main';
            }
            if($this->check_login()) {
                redirect($page);
            } else {
            if ($this->session->flashdata('page')){
                $this->session->set_flashdata('page',$page);
            }
            $email      = $this->input->post('username', TRUE);
            $password   = $this->input->post('password', TRUE);
            if(empty($email)){
                $this->session->set_flashdata('error','Sorry ! Email can not be empty.');
                redirect('login');
            }else
            if(empty($password)){
                $this->session->set_flashdata('error','Sorry ! Password can not be empty.');
                redirect('login');
            }else{
                $this->session->set_flashdata('error','Sorry ! Your email and password did not match');
                redirect('login');
            }
            $this->load->view('login/index');
            }
        }
    }

    public function logout() {
        $this->access->logout();
        redirect('');
    }
    
    public function check_login() {
       $email      = $this->input->post('username', TRUE);
       $password   = md5($this->input->post('password', TRUE));

        $login = $this->access->login($email, $password);
        if ($login) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}