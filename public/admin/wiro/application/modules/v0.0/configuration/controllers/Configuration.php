<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends MX_Controller {
	function index(){
		$button           = $this->input->post('button');
        $configWebsite    = $this->input->post('configWebsite');
        $configCopyright  = $this->input->post('configCopyright');
        if(isset($button)){
            $dataUpdate = array(
                'configuration_website_name'    => $configWebsite,
                'configuration_copyright'       => $configCopyright,
            );
            $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('configuration');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('configuration',0,0,'configuration_id="1"')->result(),
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'configuration',
            'title'         => 'General Configuration',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'General Configuration',
        );
        $this->template->theme_main('configuration/index',$view);
    }

    function logo_favicon(){
        $button = $this->input->post('button');
        if(isset($button)){
            $this->load->library('upload');
            //logo first
            $nmfile = "logo1_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './../webassets/img/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '5048'; //maksimum besar file 5M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            if(!empty($_FILES['logo1']['name'])){
                $this->upload->initialize($config);
                $this->upload->do_upload('logo1');
                $gbr1 = $this->upload->data();
                $dataUpdate = array(
                    'configuration_logo1'  => $gbr1['file_name'],
                );
                $dataImage  = $this->dynamic_model->read('configuration',1,0,'configuration_id="1"')->result();
                $img        = (isset($dataImage[0]->configuration_logo1))? $dataImage[0]->configuration_logo1 : set_value('configuration_logo1');
                if($img!==""){
                    unlink('./../webassets/img/'.$img);
                }
                $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            }

            //logo second
            $nmfile2 = "logo2_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config2['upload_path'] = './../webassets/img/'; //path folder
            $config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config2['max_size'] = '5048'; //maksimum besar file 5M
            $config2['file_name'] = $nmfile2; //nama yang terupload nantinya
            if(!empty($_FILES['logo2']['name'])){
                $this->upload->initialize($config2);
                $this->upload->do_upload('logo2');
                $gbr2 = $this->upload->data();
                $dataUpdate = array(
                    'configuration_logo2'  => $gbr2['file_name'],
                );
                $dataImage  = $this->dynamic_model->read('configuration',1,0,'configuration_id="1"')->result();
                $img        = (isset($dataImage[0]->configuration_logo2))? $dataImage[0]->configuration_logo2 : set_value('configuration_logo2');
                if($img!==""){
                    unlink('./../webassets/img/'.$img);
                }
                $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            }

            //logo third
            $nmfile3 = "logo3_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config3['upload_path'] = './../webassets/img/'; //path folder
            $config3['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config3['max_size'] = '5048'; //maksimum besar file 5M
            $config3['file_name'] = $nmfile3; //nama yang terupload nantinya
            if(!empty($_FILES['logo3']['name'])){
                $this->upload->initialize($config3);
                $this->upload->do_upload('logo3');
                $gbr3 = $this->upload->data();
                $dataUpdate = array(
                    'configuration_logo3'  => $gbr3['file_name'],
                );
                $dataImage  = $this->dynamic_model->read('configuration',1,0,'configuration_id="1"')->result();
                $img        = (isset($dataImage[0]->configuration_logo3))? $dataImage[0]->configuration_logo3 : set_value('configuration_logo3');
                if($img!==""){
                    unlink('./../webassets/img/'.$img);
                }
                $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            }

            //favicon
            $nmfile4 = "favicon_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config4['upload_path'] = './../webassets/img/'; //path folder
            $config4['allowed_types'] = 'png|ico'; //type yang dapat diakses bisa anda sesuaikan
            $config4['max_size'] = '5048'; //maksimum besar file 5M
            $config4['file_name'] = $nmfile4; //nama yang terupload nantinya
            if(!empty($_FILES['favicon']['name'])){
                $this->upload->initialize($config4);
                $this->upload->do_upload('favicon');
                $gbr4 = $this->upload->data();
                $dataUpdate = array(
                    'configuration_favicon'  => $gbr4['file_name'],
                );
                $dataImage  = $this->dynamic_model->read('configuration',1,0,'configuration_id="1"')->result();
                $img        = (isset($dataImage[0]->configuration_favicon))? $dataImage[0]->configuration_favicon : set_value('configuration_favicon');
                if($img!==""){
                    unlink('./../webassets/img/'.$img);
                }
                $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            }
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('configuration/logo_favicon');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('configuration',0,0,'configuration_id="1"')->result(),
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'configuration',
            'title'         => 'Logo & Favicon',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'Logo & Favicon',
        );
        $this->template->theme_main('configuration/logo_favicon',$view);
    }

    function text(){
        $button     = $this->input->post('button');
        $text1      = $this->input->post('text1');
        $text2      = $this->input->post('text2');
        if(isset($button)){
            $dataUpdate = array(
                'configuration_intro_text1'    => $text1,
                'configuration_intro_text2'    => $text2,
            );
            $update = $this->dynamic_model->update('configuration','configuration_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('configuration/text');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('configuration',0,0,'configuration_id="1"')->result(),
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'configuration',
            'title'         => 'General Configuration',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'General Configuration',
        );
        $this->template->theme_main('configuration/text',$view);
    }

    function menu(){
        $button     = $this->input->post('button');
        $menu1      = $this->input->post('menu1');
        $menu2      = $this->input->post('menu2');
        $menu3      = $this->input->post('menu3');
        $menu4      = $this->input->post('menu4');
        $menu5      = $this->input->post('menu5');
        if(isset($button)){
            $dataUpdate = array(
                'menu_who'          => $menu1,
                'menu_service'      => $menu2,
                'menu_team'         => $menu3,
                'menu_work'         => $menu4,
                'menu_contact'      => $menu5,
            );
            $update = $this->dynamic_model->update('menu','menu_id="1"',$dataUpdate);
            $this->session->set_flashdata('flashSuccess', 'Your data has been successfully saved.');
            redirect('configuration/menu');
        }
        $view['data'] = array(
            'data'          => $this->dynamic_model->read('menu',0,0,'menu_id="1"')->result(),
            'icon'          => 'cog',
            'open'          => 'setting',
            'navbar'        => 'configuration',
            'title'         => 'Menu',
            'breadcrumb'    => 'Settings',
            'breadcrumb2'   => 'Menu',
        );
        $this->template->theme_main('configuration/menu',$view);
    }
}