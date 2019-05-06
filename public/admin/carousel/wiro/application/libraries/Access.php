<?php
/*
 * Document     : access.php
 * Path         : /application/libraries/
 * Create on    : Feb 6, 2017 14:32:03
 * Author
 *    Name      : Aan Setiawan
 *    Email     : aansetiawan915@gmail.com
 * Description  :
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access {

    function __construct() {
        $this->CI =& get_instance();
        $this->dynamic_model =& $this->CI->dynamic_model;
    }

    function login($userEmail, $pass) {
        $data_user = $this->dynamic_model->read('user',1,0,'user_email = "'.$userEmail.'"')->row();
        if (!empty($data_user)) {
            $cekStatus = $this->dynamic_model->read('user',1,0,'user_email = "'.$userEmail.'" and user_status = "1001"')->row();
            if(!empty($cekStatus)){
                $cekPassword = $this->dynamic_model->read('user',1,0,'user_email = "'.$userEmail.'" and user_status = "1001" and user_password = "'.$pass.'"')->row();
                if(!empty($cekPassword)){
                    $userdata_sess = array(
                        'user_id'           => $data_user->user_id,
                        'user_name'         => $data_user->user_name,
                        //'user_level_id'     => $data_user->user_level_id
                    );
                    $this->CI->session->set_userdata('userdata',$userdata_sess);
                    /*$logData = array(
                        'user_id'          => $data_user->user_id,
                        'login_date'       => date("Y-m-d H:i:s"),
                        'login_status'     => '1004',
                    );
                    $saveLog = $this->dynamic_model->save('log_login',$logData);*/
                    return TRUE;
                } else {
                    $this->CI->session->set_flashdata('error','Password did not match.<br>Use forgot password to recover your password.');
                    return FALSE;
                }
            } else {
                $this->CI->session->set_flashdata('error','Sorry, your account is dasabled!');
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
