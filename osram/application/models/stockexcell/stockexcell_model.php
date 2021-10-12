<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stockexcell_model
 *
 * @author Lucky212
 */
class stockexcell_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function updateExportExcel($data, $highestRow) {
        try {
            $json_decode = json_decode($data);
            for ($row = 1; $row < $highestRow; $row++) {
                $details = array(
                    "item_name" => $json_decode[$row]->B,
                    "item_no" => $json_decode[$row]->C,
                    "item_account_code" => $json_decode[$row]->D,
                    "item_alias" => $json_decode[$row]->E
                );
                
               
                
                $where = array(
                    "id_item" => $json_decode[$row]->A
                );
                $this->db->update('tbl_item', $details, $where);
            }
            $this->db->status();
            return $this->db->status();
        } catch (Exception $exc) {

        }
    }
    
    
     public function updateExportExcelStock($data, $highestRow) {
        $emphspls =$this->session->userdata('id_employee_has_place'); 
        
        
        $sql = "SELECT ts.id_store,te.id_employee_registration,te.id_employee,temp.id_employee_has_place FROM tbl_store ts, tbl_employee te,tbl_employee_has_place temp where ts.id_employee_registration=te.id_employee_registration AND te.id_employee=temp.id_employee AND temp.id_employee_has_place='$emphspls'";
         $result = $this->db->mod_select($sql);
          $id_store = $result[0]->id_store;
          
          
        try {
          
            $json_decode = json_decode($data);
            for ($row = 1; $row < $highestRow; $row++) {
                $details = array(
                    "id_store" =>$id_store,
                    "id_products" => $json_decode[$row]->A,
                    "stock_status" =>1,
                    "added_date" =>date('Y-m-d'),
                    "added_time" =>date('H:i:s'),
                    "qty" => $json_decode[$row]->D,
                    
                );
                
                if($json_decode[$row]->D!=0){
                    $this->db->insertData('tbl_stock', $details);
                }
                
                            
               
             
            }
            $this->db->status();
            return $this->db->status();
        } catch (Exception $exc) {

        }
    }


}

?>
