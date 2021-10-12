<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of speciol_pramotion_model
 *
 * @author Shamil
 */
class speciol_pramotion_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_product($q, $select) {
        $sql = "SELECT * FROM tbl_item where status='1' and item_part_no like '$q%' limit 10";
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

    public function getDes($q, $select) {
        $sql = "SELECT * FROM tbl_item where status='1' and description like '$q%' limit 10";
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

    public function insertSpeciolPramotion($dataset) {


        $rowCount = $dataset['updateRowCount'];


        $data1 = array(
            "description" => $dataset['description'],
            "starting_date" => $dataset['start_date_mr'],
            "end_date" => $dataset['end_date_mr'],
            "added_date" => date('Y:m:d'),
            "status" => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_special_promotion", $data1);


        $sql = "select max(special_promotion_id) as special_promotion_id from tbl_special_promotion where status='1'";
        $maxid = $this->db->insert_id();



        for ($i = 1; $i <= $rowCount; $i++) {
            $dtype = '';

            if (isset($dataset['item_name_' . $i])) {

                if ($dataset['combo_id_' . $i] == "Default") {
                    $dtype = 0;
                } else {
                    $dtype = 1;
                }

                $data2 = array(
                    "special_promotion_id" => $maxid,
                    "item_id" => $dataset['item_id2_' . $i],
                    "discount" => $dataset['discount_' . $i],
                    "discount_type" => $dtype,
                    "status" => '1'
                );


                $this->db->insertData('tbl_special_promotion_detail', $data2);
            }
        }
        $this->db->__endTransaction();
    }

    public function insertSpeciolPramotionUpdate($dataset,$Insetdet) {
       
        $rowCount = $dataset['updateRowCount'];

      
            $dtype = '';

               if ($Insetdet['discountType'] == "Default") {
                    $dtype = 0;
                } else {
                    $dtype = 1;
                }

                $data1 = array(
                    "special_promotion_id" => $Insetdet['SpeciolProID'],
                    "item_id" => $Insetdet['itemID'],
                    "discount" => $Insetdet['discount'],
                    "discount_type" => $dtype,
                    "status" => '1'
                );


                $this->db->insertData('tbl_special_promotion_detail', $data1);
                 $this->db->__endTransaction();
            }
        
       
    

   
    public function getAllSpeciolPramotion() {
        $ID = $_REQUEST['id_SP_'];

        $result = $this->db->mod_select("select 
   tbl_special_promotion.added_date,tbl_special_promotion.special_promotion_id	,tbl_special_promotion_detail.item_id,tbl_special_promotion_detail.detail_id,tbl_special_promotion_detail.special_promotion_id,tbl_special_promotion_detail.discount,tbl_special_promotion_detail.status,tbl_special_promotion_detail.discount_type,
 tbl_item.item_id, tbl_item.item_part_no, tbl_item.description,tbl_item.selling_price
	
from
    tbl_special_promotion,
    tbl_special_promotion_detail,
    tbl_item
    
    where
    tbl_item.item_id = tbl_special_promotion_detail.item_id
     and tbl_special_promotion.special_promotion_id = tbl_special_promotion_detail.special_promotion_id and tbl_special_promotion_detail.status='1'  AND tbl_special_promotion_detail.special_promotion_id=$ID
  
");


        return $result;
    }

    public function getAllSpeciolPramotionMain() {

        $result = $this->db->mod_select($sql = "Select * From tbl_special_promotion Where status='1'");


        return $result;
    }

    public function updateItem($details) {
        if ($details['discount_type'] == "Default") {
            $dtype = 0;
        } else {
            $dtype = 1;
        }

        $where = array(
            "special_promotion_id" => $details['special_promotion_id']
        );


        $details = array(
            "discount" => $details['discount'],
            "discount_type" => $dtype
        );



        $this->db->__beginTransaction();
        $this->db->update('tbl_special_promotion_detail', $details, $where);
        $this->db->__endTransaction();
    }

    public function updateItem1($dataset,$det) {
       
        
         $rowCount = $dataset['updateRowCount'];
         
          for ($i = 0; $i <= $rowCount; $i++) {
        if ($det['discountType'] == "Default") {
            $dtype = 0;
        } else {
            $dtype = 1;
        }
       

        $where = array(
            "detail_id" => $det['DetailID'],
           "special_promotion_id" => $det['SpeciolProID'],
            
        );


        $details = array(
            
            "item_id" => $det['itemID'],
            "discount" => $det['discount'],
            "discount_type" => $dtype,
             "status" => '1'
        );
          



        $this->db->__beginTransaction();
        $this->db->update('tbl_special_promotion_detail', $details, $where);
          }
        $this->db->__endTransaction();
    }

    public function deleteItem($data) {

        $where = array(
            "item_id" => $data['item_id'],
            "special_promotion_id" => $data['special_promotion_id']
        );

        $details = array(
            "status" => '0'
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_special_promotion_detail', $details, $where);
        $this->db->__endTransaction();
    }

    public function deleteItem1($data) {

        $where = array(
            "special_promotion_id" => $data['special_promotion_id']
        );

        $details = array(
            "status" => '0'
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_special_promotion', $details, $where);
        $this->db->__endTransaction();
    }

}
