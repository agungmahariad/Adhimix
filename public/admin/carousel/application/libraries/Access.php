<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access {

    function __construct() {
        $this->CI =& get_instance();
        $this->dynamic_model =& $this->CI->dynamic_model;
    }

    function login($memberEmail, $pass) {
        $data_user = $this->dynamic_model->read('member',1,0,'member_email = "'.$memberEmail.'"')->row();
        if (!empty($data_user)) {
            $cekStatus = $this->dynamic_model->read('member',1,0,'member_email = "'.$userEmail.'" and user_status = "1001"')->row();
            if(!empty($cekStatus)){
                $cekPassword = $this->dynamic_model->read('user',1,0,'user_email = "'.$userEmail.'" and user_status = "1001" and user_password = "'.$pass.'"')->row();
                if(!empty($cekPassword)){
                    $userdata_sess = array(
                        'user_id'           => $data_user->user_id,
                        'user_firstname'    => $data_user->user_firstname,
                        'user_lastname'     => $data_user->user_lastname,
                        'user_level_id'     => $data_user->user_level_id
                    );
                    $this->CI->session->set_userdata('userdata',$userdata_sess);
                    return TRUE;
                } else {
                    $this->CI->session->set_flashdata('error','Password did not match.<br>Use forgot password to recover your password.');
                    return FALSE;
                }
            } else {
                $this->CI->session->set_flashdata('error','Sorry, your account is disabled!');
                return FALSE;
            }
        } else {
            $this->CI->session->set_flashdata('error','Sorry, email not found!');
            return FALSE;
        }
    }

    function logout() {
        $this->CI->session->unset_userdata('userdata');
    }
}
