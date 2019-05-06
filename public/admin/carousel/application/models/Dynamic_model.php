<?php
class Dynamic_model extends CI_Model {

    function read($table='',$limit=0,$offset=0,$where='',$select='',$order_by='',$is_count=false,$is_join=true) {
        if(empty($table)) return 'Missing table parameter!';
        if(!empty($select)) $query = $this->db->select($select);
        if($is_join==true){
            if($table=='work'){
                $query = $this->db->join('work_category C','C.work_category_id = A.work_category_id','left');
            //} else if($table=='news'){
            //    $query = $this->db->join('news_category B','B.news_category_id = A.news_category_id','left');
            //} else if($table=='comment'){
            //    $query = $this->db->join('payment_gateway B','B.payment_gateway_id = A.payment_method_id','left');
            //    $query = $this->db->join('product_item C','C.product_id = A.product_id','left');
            //    $query = $this->db->join('product_duration D','D.product_duration_id = C.product_duration_id','left');
            //    $query = $this->db->join('customer E','E.customer_id = C.host_id','left');
            //} else if($table=='publications'){
            //    $query = $this->db->join('publications_category B','B.publications_category_id = A.publications_category_id','left');
            //} else if($table=='product_item'){
            //    $query = $this->db->join('status_management B','B.status_management_id = A.product_status','left');
            //    $query = $this->db->join('product_duration C','C.product_duration_id = A.product_duration_id','left');
            //    $query = $this->db->join('product_destination D','D.product_destination_id = A.product_destination_id','left');
            //    $query = $this->db->join('customer E','E.customer_id = A.host_id','left');
            //    $query = $this->db->join('product_metadata F','F.product_id = A.product_id','left');
            }
        }
        if($limit==0 && $offset!=0) $query = $this->db->limit('18446744073709551615',$offset);
        elseif($limit!=0) $query = $this->db->limit($limit,$offset);

        if(!empty($where)) $query = $this->db->where($where);
        if(!empty($order_by)) $query = $this->db->order_by($order_by);

        if($is_count==true) $query = $this->db->count_all_results($table.' as A');
        else $query = $this->db->get($table.' as A');

        return $query;
    }

    function orderBy($table, $field, $order_by){
        $this->db->order_by($field,$order_by);
        return $this->db->get($table);
    }
    function groupBy($table, $field){
        $this->db->group_by($field);
        return $this->db->get($table);
    }

    function throws($table='',$keyField='',$valueField='',$where=''){
        if(empty($table)) return 'Missing table parameter!';
        if(empty($keyField)) return 'Missing keyField parameter!';
        if(empty($valueField)) return 'Missing valueField parameter!';
        if(!empty($where)) $query = $this->db->where($where);
        $query = $this->db->get($table)->result();

        $data = new stdClass;
        if(!empty($query)){ foreach($query as $row){
            $field = $row->$keyField;
            $data->$field = $row->$valueField;
        }}
        return $data;
    }

    function save($table='', $data='') {
        if(empty($table)) return 'Missing table parameter!';
        $duplicate_data = array();
        foreach($data AS $key => $value) $duplicate_data[] = sprintf("%s='%s'", $key, $value);
        $sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
        $this->db->query($sql);
        return $this->db->insert_id();
        // $this->db->insert($table, $data);
        // return $this->db->insert_id();
    }

    function auto_save($ntable='', $type='', $by='') {
        if(empty($ntable)) return 'Missing table parameter!';
        foreach ($this->db->list_fields('sys_'.$ntable) as $field){
            if($type=='POST') $data[$field] = $this->input->post($field);
            elseif($type=='GET') $data[$field] = $this->input->get($field);
        }
        if(!empty($by)){
            $data[$ntable.'_updated_by']    = $by;
            $data[$ntable.'_updated_date']  = date('Y-m-d H:i:s');
            $data[$ntable.'_created_by']    = $by;
            $data[$ntable.'_created_date']  = date('Y-m-d H:i:s');
        }
        $this->db->insert('sys_'.$ntable, $data);
        return $this->db->insert_id();
    }

    // function updateOnDuplicate($table, $data ) {
    //     if (empty($table) || empty($data)) return false;
    //     $duplicate_data = array();
    //     foreach($data AS $key => $value) $duplicate_data[] = sprintf("%s='%s'", $key, $value);
    //     $sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
    //     $this->db->query($sql);
    //     return $this->db->insert_id();
    // }

    function select_save($ntable='', $type='', $is_select='', $parser='', $by='') {
        if(empty($ntable)) return 'Missing table parameter!';
        foreach ($this->db->list_fields('sys_'.$ntable) as $field){
            if($is_select==FALSE){ $exec = TRUE;
                if(!empty($parser)) foreach($parser as $parse) if($field==$parse) $exec = FALSE;
            } elseif($is_select==TRUE){ $exec = FALSE;
                if(!empty($parser)) foreach($parser as $parse) if($field==$parse) $exec = TRUE;
            }

            if($exec==TRUE && $type=='POST') $data[$field] = $this->input->post($field);
            elseif($exec==TRUE && $type=='GET') $data[$field] = $this->input->get($field);
        }
        if(!empty($by)){
            $data[$ntable.'_updated_by']    = $by;
            $data[$ntable.'_updated_date']  = date('Y-m-d H:i:s');
            $data[$ntable.'_created_by']    = $by;
            $data[$ntable.'_created_date']  = date('Y-m-d H:i:s');
        }
        $this->db->insert('sys_'.$ntable, $data);
        return $this->db->insert_id();
    }
    
    function update($table='', $where='', $data='') {
        if(empty($table)) return 'Missing table parameter!';
        return $this->db->where($where)->update($table, $data);
    }

    function auto_update($ntable='', $type='', $where='', $by='') {
        if(empty($ntable)) return 'Missing table parameter!';
        foreach ($this->db->list_fields('sys_'.$ntable) as $field){
            if($type=='POST') $data[$field] = $this->input->post($field);
            elseif($type=='GET') $data[$field] = $this->input->get($field);
        }
        if(!empty($by)){
            $data[$ntable.'_updated_by']    = $by;
            $data[$ntable.'_updated_date']  = date('Y-m-d H:i:s');
        }
        return $this->db->where($where)->update('sys_'.$ntable, $data);
    }

    function select_update($ntable='', $type='', $where='', $is_select='', $parser='', $by=''){
        if(empty($ntable)) return 'Missing table parameter!';
        foreach ($this->db->list_fields('sys_'.$ntable) as $field){
            if($is_select==FALSE){ $exec = TRUE;
                if(!empty($parser)) foreach($parser as $parse) if($field==$parse) $exec = FALSE;
            } elseif($is_select==TRUE) { $exec = FALSE;
                if(!empty($parser)) foreach($parser as $parse) if($field==$parse) $exec = TRUE;
            }

            if($exec==TRUE && $type=='POST') $data[$field] = $this->input->post($field);
            elseif($exec==TRUE && $type=='GET') $data[$field] = $this->input->get($field);
        }
        if(!empty($by)){
            $data[$ntable.'_updated_by'] = $by;
            $data[$ntable.'_updated_date'] = date('Y-m-d H:i:s');
        }
        return $this->db->where($where)->update('sys_'.$ntable, $data);
    }
    
    function delete($table, $where) {
        if(empty($table)) return 'Missing table parameter!';
        return $this->db->where($where)->delete($table);
    }
}