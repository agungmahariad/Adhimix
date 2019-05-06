<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio_category extends MX_Controller {
	function index($offset=NULL){
		//pengaturan pagination
        $limit = 10;
        $totalRows 	= $this->dynamic_model->read('work_category','','')->num_rows();
        $data 		= $this->dynamic_model->read('work_category',$limit,$offset,'','','A.work_category_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."work_category/index";
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
            'data'       => $data,
            'pagination' => $this->pagination->create_links(),
            'totalRows'  => $totalRows,
            'number'     => $offset,
            'last'		 => ceil($totalRows / $limit),
            'icon'          => 'film',
            'open'          => 'portfolio',
            'navbar'        => 'category-portfolio',
            'title'         => 'Category',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Category',
        );
        $this->template->theme_main('portfolio_category/index',$view);
    }

    //add
    function add(){
        $this->userdata   = $this->session->userdata('userdata');
        $button           = $this->input->post('button');
        $title            = $this->input->post('title');
        $status           = $this->input->post('status');
        $date             = date("Y-m-d H:i:s");
        if(isset($button)){
            $dataSimpan = array(
                'work_category_name'          => $title,
                'work_category_status'        => $status,
                'work_category_insertindb'    => $date,
            );
            $save = $this->dynamic_model->save('work_category',$dataSimpan);
            if($save){
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('portfolio_category');
            } else {
                $this->session->set_flashdata('flashWarning', 'A problem has been occurred while submitting your data.');
                redirect('portfolio_category/add');
            }
        }
        $view['data'] = array(
            'data'          => '',
            'icon'          => 'film',
            'open'          => 'portfolio',
            'navbar'        => 'category-portfolio',
            'title'         => 'Add Category',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Add Category',
        );
        $this->template->theme_main('portfolio_category/form_portfolio_category',$view);
    }

    function update($id=''){
        $this->userdata   = $this->session->userdata('userdata');
        $button           = $this->input->post('button');
        $title            = $this->input->post('title');
        $status           = $this->input->post('status');
        $date             = date("Y-m-d H:i:s");
        if(isset($button)){
            $dataUpdate = array(
                'work_category_name'          => $title,
                'work_category_status'        => $status,
                'work_category_insertindb'    => $date,
            );
            $update = $this->dynamic_model->update('work_category','work_category_id="'.$id.'"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('portfolio_category/index/');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('work_category',1,0,'work_category_id = "'.$id.'"')->result(),
            'icon'          => 'film',
            'open'          => 'portfolio',
            'navbar'        => 'category-portfolio',
            'title'         => 'Edit Category',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Edit Category',
        );
        $this->template->theme_main('portfolio_category/form_portfolio_category',$view);
    }

    function delete($id=''){
        $delete = $this->dynamic_model->delete('work_category','work_category_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('portfolio_category/index');
        } else {
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('portfolio_category/index');
        }
    }
}