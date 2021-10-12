<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of all_sales_model
 *
 * @author SHDINESH
 */
class sales_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertToDB($data, $highestRow, $area) {

        try {

            $json_decode = json_decode($data);
            //print_r($json_decode);
            for ($row = 0; $row < $highestRow - 1; $row++) {
                $sales_data = array(
                    "part_no" => $json_decode[$row]->A,
                    "description" => $json_decode[$row]->B,
                    "date_decar" => $json_decode[$row]->C,
                    "date_edit" => $json_decode[$row]->D,
                    "time" => $json_decode[$row]->E,
                    "acc_no" => $json_decode[$row]->F,
                    "customer_name" => $json_decode[$row]->G,
                    "qty" => $json_decode[$row]->H,
                    "cost_price" => $json_decode[$row]->I,
                    "selling_val" => $json_decode[$row]->J,
                    "retail_val" => $json_decode[$row]->K,
                    "invoice" => $json_decode[$row]->L,
                    "wip" => $json_decode[$row]->M,
                    "location" => $json_decode[$row]->N,
                    "in_s" => $json_decode[$row]->O,
                    "de" => $json_decode[$row]->P,
                    "disc" => $json_decode[$row]->Q,
                    "s_e_name" => $json_decode[$row]->R,
                    "s_e_code" => $json_decode[$row]->S,
                    "authorised_by" => $json_decode[$row]->T,
                    "authorised_by_code" => $json_decode[$row]->U,
                    "creating_op" => $json_decode[$row]->V,
                    "creating_op_code" => $json_decode[$row]->W,
                    "vehicle_reg_no" => $json_decode[$row]->X,
                    "area_id" => $area,
                    "status" => 1
                );
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_all_sales', $sales_data);
            }
            $this->db->__endTransaction();
            $this->db->status();
            return $this->db->status();
        } catch (Exception $exc) {
            
        }
    }

    public function getLastSalesDateTime($area) {
        $sql = "select date(date_edit) as max_date, time(time) as max_time from tbl_all_sales  where area_id ='" . $area . "' order by max_date desc, max_time desc limit 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

}
