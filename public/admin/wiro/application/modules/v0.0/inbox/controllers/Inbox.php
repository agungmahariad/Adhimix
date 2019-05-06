<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends MX_Controller {
	function index($offset=NULL){
        $view['data']   = array(
            'data'          => $this->dynamic_model->read('inbox','','','','','inbox_id DESC')->result(),
            'icon'          => 'envelope',
            'open'          => 'dashboard',
            'navbar'        => 'dashboard',
            'title'         => 'Inbox',
            'breadcrumb'    => 'Inbox',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('inbox/index',$view);
    }

    //add
    function detail($id=''){
        $data   = $this->dynamic_model->read('inbox','','','inbox_id="'.$id.'"')->result();
        $status = (isset($data->inbox_status))? $data->inbox_status : set_value('inbox_status');
        if($status!='1003'){
            $dataUpdate = array(
                'inbox_status'      => '1003',
                'inbox_read_date'   => date('Y-m-d H:i:s'),
            );
            $update = $this->dynamic_model->update('inbox','inbox_id="'.$id.'"',$dataUpdate);
        }
        $view['data'] = array(
            'data'          => $data,
            'icon'          => 'envelope',
            'open'          => 'dashboard',
            'navbar'        => 'dashboard',
            'title'         => 'Inbox Detail',
            'breadcrumb'    => 'Inbox Detail',
            'breadcrumb2'   => '',
        );
        $this->template->theme_main('inbox/detail',$view);
    }
}