<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_analysis_model
 * 04-04-2015
 * @author Dilhari
 */
class part_analysis_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_dealer_name($q, $select) {

        $user = $this->session->userdata('id');
        $sql = "SELECT tt.delar_name, tt.delar_account_no, tt.delar_id
                FROM tbl_dealer tt
                inner join
                tbl_user tty on tt.sales_officer_id = tty.employee_id
                where tt.status='1' and tty.id like '$user%' and delar_name like '$q%' limit 10";
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

    public function getPartNumber($q, $select, $dlr_id) {

         $sql = "SELECT tt.item_part_no, tt.item_id, tt.description, tt.selling_price,
            (select ifnull(ROUND(sum(dpd.item_qty)/6,2),0) from tbl_dealer_purchase_order dp inner join tbl_dealer_purchase_order_detail dpd on dpd.purchase_order_id=dp.purchase_order_id 
            where dp.complete=1 and dpd.item_id = tt.item_id and dp.date between date_sub(curdate(), interval 6 month) and curdate()and dp.dealer_id='$dlr_id' ) as avg_momnt

 
                FROM tbl_item tt 
                where tt.status='1' and tt.item_part_no like '$q%' limit 10";



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
    
//        public function getpartnum($q, $select) {
//
//         $sql = "SELECT tt.item_id,tt.item_part_no,tt.description, tt.selling_price
//                FROM tbl_item tt 
//                where tt.status='1' and tt.item_part_no like '$q%' limit 10";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//        return $json_array;
//    }
     public function getAllPartNumbers($q, $select) {
        $sql = "select ti.item_id, ti.item_part_no, ti.description,ti.selling_price, ti.model from tbl_item ti where status=1 and ti.item_part_no like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]) . " " . stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    
    
    
    
     public function viewAllPartAnalysis() {
        $sql = "select pa.part_analysis_id, pad.item_part_id,pad.detail_id, it.item_id, it. item_part_no, it. description, it.selling_price, pad.avg_movement_from_dimo_to_dealer, pad.avg_movement_from_dealer_to_customer, pad.reason_price, pad.reason_supply, pad.reason_packaging, pad.reason_awareness, pad.max_price, pad.qty_at_max_price, pad.remarks, pad.status from tbl_part_analysis pa inner join tbl_part_analysis_details pad on pa.part_analysis_id=pad.part_analysis_id inner join tbl_item it on it.item_id=pad.item_part_id where pa.status=1 and pad.status='1'";
        return $this->db->mod_select($sql);
    }

    public function submit_part_analysis() {
        $form_data = $_POST['data'];
//        prisubmit_part_analysisnt_r($form_data);

        $this->db->__beginTransaction();
        try {
            $part_analysis = Array(
                "dealer_id" => $form_data[1]['value'],
                "added_date" => date('Y-m-d'),
                "status" => 1
            );
            $this->db->insert('tbl_part_analysis', $part_analysis);
//        print_r($part_analysis);
            $part_analysis_id = $this->db->insert_id();

            $details = Array(
                "part_analysis_id" => $part_analysis_id,
                "item_part_id" => $form_data[4]['value'],
                "avg_movement_from_dimo_to_dealer" => $form_data[7]['value'],
                "avg_movement_from_dealer_to_customer" => $form_data[8]['value'],
                "reason_price" => $form_data[9]['value'],
                "reason_supply" => $form_data[10]['value'],
                "reason_packaging" => $form_data[11]['value'],
                "reason_awareness" => $form_data[12]['value'],
                "max_price" => $form_data[13]['value'],
                "qty_at_max_price" => $form_data[14]['value'],
                "remarks" => $form_data[15]['value'],
                "status" => 1
            );
//        print_r($details);
            $this->db->insert('tbl_part_analysis_details', $details);

            $row_count = $form_data[16]['value'];
            $value = 17 + 13 * ($row_count - 1);

            for ($x = 17; $x < $value; $x = $x + 13) {
                $details = Array(
                    "part_analysis_id" => $part_analysis_id,
                    "item_part_id" => $form_data[$x + 1]['value'],
                    "avg_movement_from_dimo_to_dealer" => $form_data[$x + 4]['value'],
                    "avg_movement_from_dealer_to_customer" => $form_data[$x + 5]['value'],
                    "reason_price" => $form_data[$x + 6]['value'],
                    "reason_supply" => $form_data[$x + 7]['value'],
                    "reason_packaging" => $form_data[$x + 8]['value'],
                    "reason_awareness" => $form_data[$x + 9]['value'],
                    "max_price" => $form_data[$x + 10]['value'],
                    "qty_at_max_price" => $form_data[$x + 11]['value'],
                    "remarks" => $form_data[$x + 12]['value'],
                    "status" => 1
                );
//            print_r($details);
                $this->db->insert('tbl_part_analysis_details', $details);
            }
            $this->db->commit_db();
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }
    
    
        //add new part
    
public function update($dataArray) {

        $where = array(
            'detail_id' => $dataArray['m_detail_id']
        );
     

        $data = array(
            
            'item_part_id' => $dataArray['itemid'],
            'avg_movement_from_dimo_to_dealer' => $dataArray['daimo_to_dealer'],
            'avg_movement_from_dealer_to_customer' => $dataArray['daealer_to_customer'],
//            'reason_price' => $dataArray['reason_pric'],
//            'reason_supply' => $dataArray['reason_suppl'],
//            'reason_packaging' => $dataArray['reason_packagin'],
//            'reason_awareness' => $dataArray['reason_awarenes'],
            'max_price' => $dataArray['max_price'],
            'qty_at_max_price' => $dataArray['qty_at_max'],
            'remarks' => $dataArray['remark'],
            
           
        );
        
       
     

        $this->db->__beginTransaction();
        $this->db->update("tbl_part_analysis_details", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    //close new part
    public function justcheck() {
        $s = '0';



        if (isset($_POST['dlr_id'])) {
            //  echo   $uid = $_POST['accnt_no'];

            $s = $_POST['dlr_id'];
        }

        return $s;
    }

}
