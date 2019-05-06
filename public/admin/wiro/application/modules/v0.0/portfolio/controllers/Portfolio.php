<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class portfolio extends MX_Controller {
	function index($offset=NULL){
		//pengaturan pagination
        $limit = 10;
        $totalRows 	= $this->dynamic_model->read('work','','')->num_rows();
        $data 		= $this->dynamic_model->read('work',$limit,$offset,'','','A.work_id DESC')->result();
        //pengaturan pagination
        $config['base_url']         = base_url()."portfolio/index/";
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
            'navbar'        => 'item-portfolio',
            'title'         => 'Item',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Item',
        );
        $this->template->theme_main('portfolio/index',$view);
    }

    function add(){
        $this->userdata     = $this->session->userdata('userdata');
        $title              = $this->input->post('title');
        $category           = $this->input->post('category');
        $year               = $this->input->post('year');
        $client             = $this->input->post('client');
        $director           = $this->input->post('director');
        $agency             = $this->input->post('agency');
        $description        = $this->input->post('description');
        $video              = $this->input->post('video');
        $status             = $this->input->post('status');
        $button             = $this->input->post('button');
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "porto_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/porto/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if ($this->upload->do_upload('image')){
                    $gbr = $this->upload->data();
                    $dataSimpan = array(
                        'work_title'            => $title,
                        'work_category_id'      => $category,
                        'work_year'             => $year,
                        'work_client'           => $client,
                        'work_director'         => $director,
                        'work_agency'           => $agency,
                        'work_description'      => $description,
                        'work_image'            => $gbr['file_name'],
                        'work_video'            => $video,
                        'work_status'           => $status,
                        'work_insertindb'       => $date,
                    );
                    $save = $this->dynamic_model->save('work',$dataSimpan);
                    if($save){
                        $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                        redirect('portfolio');
                    } else {
                        $this->session->set_flashdata('flashWarning', 'A problem has been occurred while submitting your data.');
                        redirect('portfolio/add');
                    }
                } else {
                    $this->session->set_flashdata('flashWarning', 'The image file could not be uploaded. Only files with the following extensions are allowed: gif,jpg,png,jpeg,bmp.');
                    redirect('portfolio/add');
                }
            }
        }
        $view['data'] = array(
            'data'          => '',
            'category'      => $this->dynamic_model->read('work_category','','','work_category_status="1001"')->result(),
            'icon'          => 'film',
            'open'          => 'portfolio',
            'navbar'        => 'item-portfolio',
            'title'         => 'Add Item',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Add Item',
        );
        $this->template->theme_main('portfolio/form_portfolio',$view);
    }

    function update($id=''){
        //post
        $this->userdata     = $this->session->userdata('userdata');
        $button             = $this->input->post('button');
        $title              = $this->input->post('title');
        $industry           = $this->input->post('industry');
        $year               = $this->input->post('year');
        $description        = $this->input->post('description');
        $status             = $this->input->post('status');
        $category           = $this->input->post('category');
        $dataportfolio      = $this->dynamic_model->read('work',1,0,'work_id = "'.$id.'"')->result();
        $date               = date("Y-m-d H:i:s");
        if(isset($button)){
            $this->load->library('upload');
            $nmfile = "porto_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/porto/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            if(!empty($_FILES['image']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $gbr = $this->upload->data();
                $dataUpdate = array(
                    'work_title'         => $title,
                    'work_industry'      => $industry,
                    'work_year'          => $year,
                    'work_description'   => $description,
                    'work_cover'         => $gbr['file_name'],
                    'work_status'        => $status,
                    'work_insertindb'    => $date,
                );
                $dataImage  = $this->dynamic_model->read('work',1,0,'work_id = "'.$id.'"')->result();
                $img        = (isset($dataImage[0]->work_cover))? $dataImage[0]->work_cover : set_value('work_cover');
                if($img!==""){
                    unlink('./../webassets/img/porto/'.$img);
                }
                $update = $this->dynamic_model->update('work','work_id="'.$id.'"',$dataUpdate);
                //delete category
                $delete2    = $this->dynamic_model->delete('work_use','work_id="'.$id.'"');
                //save category
                for($i=0;$i<count($category);$i++){
                    $data3 = array(
                        'work_id'           => $save,
                        'work_category_id'  => $category[$i],
                    );
                    $saveCategory = $this->dynamic_model->save('work_use',$data3);
                }
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('portfolio');
            } else {
                $dataUpdate = array(
                    'work_title'         => $title,
                    'work_industry'      => $industry,
                    'work_year'          => $year,
                    'work_description'   => $description,
                    'work_status'        => $status,
                    'work_insertindb'    => $date,
                );
                $update = $this->dynamic_model->update('work','work_id="'.$id.'"',$dataUpdate);
                $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
                redirect('portfolio/index');
            }
        }
        $view['data'] = array(
            'data'          => $dataportfolio,
            'category'      => $this->dynamic_model->read('work_category','','','work_category_status="1001"')->result(),
            'icon'          => 'film',
            'open'          => 'portfolio',
            'navbar'        => 'item-portfolio',
            'title'         => 'Add Item',
            'breadcrumb'    => 'Portfolio',
            'breadcrumb2'   => 'Add Item',
        );
        $this->template->theme_main('portfolio/form_portfolio',$view);
    }

    function delete($id=''){
        $dataImage  = $this->dynamic_model->read('work',1,0,'work_id = "'.$id.'"')->result();
        $img        = (isset($dataImage[0]->work_cover))? $dataImage[0]->work_cover : set_value('work_cover');
        if($img!==""){
            unlink('./../webassets/img/porto/'.$img);
        }
        $delete2    = $this->dynamic_model->delete('work_use','work_id="'.$id.'"');
        $delete     = $this->dynamic_model->delete('work','work_id="'.$id.'"');
        if($delete){
            $this->session->set_flashdata('flashSuccess', 'Your data was successfully deleted.');
            redirect('portfolio');
        }else{
            $this->session->set_flashdata('flashWarning', 'Cannot delete file. Please try again.');
                redirect('portfolio');
        }
    }
}