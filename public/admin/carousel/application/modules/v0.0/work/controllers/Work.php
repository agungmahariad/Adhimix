<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class static_page extends MX_Controller {
    function index($offset=NULL){
    	//pengaturan pagination
        $limit = 9;
        $totalRows 	= $this->dynamic_model->read('static_page','','','static_page_status="1001"')->num_rows();
        $data 		= $this->dynamic_model->read('static_page',$limit,$offset,'static_page_status="1001"','','static_page_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."static_page/index";
        $config['total_rows']       = $totalRows;
        $config['per_page']         = $limit;
        $config['full_tag_open']    = "<ul class='pagination'>";
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
            'title'    		=> 'Static Page',
            'navbar' 		=> 'static_page',
            'data'       	=> $data,
            'pagination' 	=> $this->pagination->create_links(),
            'totalRows'  	=> $totalRows,
            'number'     	=> $offset,
            'last'		 	=> ceil($totalRows / $limit),
        );
        $this->template->theme_main('static_page/index',$view);
    }

    function detail($id=''){
        $view['data'] = array(
            'title'    		=> 'our static_page',
            'navbar' 		=> 'static_page',
            'data'       	=> $this->dynamic_model->read('static_page',0,0,'static_page_status="1001" and static_page_id="'.$id.'"','','static_page_id DESC')->row(),
        );
        $this->template->theme_main('static_page/detail',$view);
    }
}