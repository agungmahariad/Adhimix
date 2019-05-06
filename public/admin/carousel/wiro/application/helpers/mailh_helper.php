<?php

function Mailh ($email_to, $email_to_nick, $data_subject, $data_body, $path){
    $ci=& get_instance();
    $config = Array(
        // 'protocol' => 'mail',
        // 'mailpath' => '/usr/sbin/sendmail',
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.googlemail.com',
       'smtp_port' => 465,
       'smtp_user' => 'system.thsw@gmail.com',
       'smtp_pass' => 'thsw2016!',

        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    );
    $ci->load->library('email', $config);
    $ci->email->set_newline("\r\n");
    $ci->email->from('system.thsw@gmail.com', "THSW System");
    $ci->email->to($email_to, $email_to_nick); 
    $ci->email->subject($data_subject);
    $ci->email->message($data_body);
    if (!empty($path)){
        $ci->email->attach($path);
    }
    $ci->email->send();
    return $ci->email->print_debugger();
}