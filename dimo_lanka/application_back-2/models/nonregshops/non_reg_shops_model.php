<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of non_reg_shops_model
 *
 * @author Iresha Lakmali
 */
class non_reg_shops_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
      public function get_all_branch_name($q, $select) {
        $sql = "select branch_id,branch_name,branch_account_no from tbl_branch WHERE status='1' AND branch_name LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    
    public function get_all_sales_officer($q, $select){
         $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE status='1' AND sales_officer_name LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    
    public function get_all_city($q, $select){
          $sql = "select city_id,city_name from tbl_city WHERE status='1' AND city_name LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

        public function viewAllNonRegShops(){
            $sql = "select 
    tnrs.shop_id,
    tnrs.shop_code,
    tnrs.shop_name,
    tnrs.shop_address,
    tnrs.contact_no,
    tnrs.remarks,
    tnrs.preference,
    tb.branch_name,
    tu.name,
    tc.city_name,
    tnrs.city_id,
    tnrs.branch_id,
    tnrs.sales_officer_id
from
    tbl_non_reg_shops tnrs
        INNER JOIN
    tbl_branch tb ON tnrs.branch_id = tb.branch_id
        INNER JOIN
    tbl_user tu ON tnrs.sales_officer_id = tu.id
        INNER JOIN
    tbl_city tc ON tnrs.city_id = tc.city_id
where
    tnrs.status = 1";
        return $this->db->mod_select($sql);
    }
    
    public function createNonRegShops($data_Array){
      
        $data = array(
           
            'shop_name' => $data_Array['txt_shop_name'], 
            'shop_address' => $data_Array['txt_shop_address'], 
            'contact_no' => $data_Array['txt_contact_no'], 
            'remarks' => $data_Array['txt_remark'], 
            'city_id' => $data_Array['txt_city_id'],
            'branch_id' => $data_Array['txt_branch_id'],
            'sales_officer_id' => $data_Array['sales_officer_id'],
            'preference' => $data_Array['cmb_prefer_tata'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_non_reg_shops", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function removeNonRegShops($dataArray){
          $where = array(
            'shop_id' => $dataArray['token_shop_id']
        );
        print_r($where);
        $data = array(
            'status' => 0
        );
        print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_non_reg_shops", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function updateNonRegShops($dataArray){
        
        $where = array(
            'shop_id' => $dataArray['txt_shop_id']
        );
        print_r($where);

        $data = array(
           
            'shop_name' => $dataArray['txt_shop_name'], 
            'shop_address' => $dataArray['txt_shop_address'], 
            'contact_no' => $dataArray['txt_m_contact_no'], 
            'remarks' => $dataArray['txt_m_remark'], 
            'city_id' => $dataArray['txt_city_id'],
            'branch_id' => $dataArray['txt_branch_id'],
            'sales_officer_id' => $dataArray['txt_sales_officer_id']
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_non_reg_shops", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
   
}

?>
