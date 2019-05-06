<?php
function pagination_data($url='',$rows=0,$limit=0,$uri=3){
    $ci=& get_instance();
    
    //generate pagination configure
    $config['base_url']     = site_url($url);
    $config['total_rows']   = $rows;
    $config['per_page']     = $limit;
    $config['uri_segment']  = $uri;
    $config['full_tag_open']= '<ul class="pagination" style="margin:0">';
    $config['full_tag_close']= '</ul>';
    $config['first_link']   = '<<';
    $config['last_link']    = '>>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close']= '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close']= '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    if (count($_GET) > 0) {
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
    }
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}