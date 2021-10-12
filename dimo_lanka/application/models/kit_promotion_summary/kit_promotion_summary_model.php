
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kit_promotion_summary_model
 * 18-03-2015
 * @author Dilhari
 */
class kit_promotion_summary_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//    public function getKitPromotionDetails($date, $type) {
//      $user = $this->session->userdata('id');
//      echo $sql ="SELECT tt.promotion_name, tt.special_promotion_id, tt.description, tt.end_date, dt.qty_per_month,
//                (select ifnull(sum(dt.reason),0) as qty 
//                from tbl_dealer_purchase_order dt
//                inner join 
//                tbl_user tby on dt.sales_officer_id = tby.employee_id
//                where dt.status = '1' and dt.complete = '3' and dt.special_promotion_id = tt.special_promotion_id and
//                tby.id like '$user%') as qty
//                FROM tbl_special_promotion tt 
//                inner join
//                tbl_special_promotion_detail_target dt on tt.special_promotion_id = dt.special_promotion_id
//                inner join 
//                tbl_user tby on dt.sales_officer_id = tby.employee_id
//                where tt.status='1' and tby.id like '$user%' and tt.promotion_type = '$type' and tt.end_date > '$date'";
//
//        return $this->db->mod_select($sql);
//    }
//    
    //nilusha add
    
    public function getKitPromotionDetails($date, $type) {
        
                $user = $this->session->userdata('id');
                
                $sql ="SELECT tt.promotion_type,tt.promotion_name, tt.special_promotion_id, tt.description, tt.end_date, dt.qty_per_month,
                (select ifnull(sum(dt.reason),0) as qty 
                from tbl_dealer_purchase_order dt
                inner join 
                tbl_user tby on dt.sales_officer_id = tby.employee_id
                where dt.status = '1' and dt.complete = '3' and dt.special_promotion_id = tt.special_promotion_id and
                tby.id like '".$user."%') as qty
                FROM tbl_special_promotion tt 
                inner join
                tbl_special_promotion_detail_target dt on tt.special_promotion_id = dt.special_promotion_id
                inner join 
                tbl_user tby on dt.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%' and tt.promotion_type != 'BID' and tt.end_date > '$date' group by tt.special_promotion_id";

        return $this->db->mod_select($sql);
    }
    
    //end nilusha

    public function getKitName($id) {
        $user = $this->session->userdata('id');
        $sql = "SELECT 
                tt.promotion_name,tt.promotion_type, tt.special_promotion_id, tt.description, tt.starting_date, tt.end_date, dt.qty_per_month, dt.sales_officer_id,
                (select ifnull(sum(dt.reason),0) as qty 
                from tbl_dealer_purchase_order dt
                inner join 
                tbl_user tby on dt.sales_officer_id = tby.employee_id
                where dt.status = '1' and dt.complete = '3' and dt.special_promotion_id = '$id' and
                tby.id like '$user') as qty
                FROM tbl_special_promotion tt 
                inner join
                tbl_special_promotion_detail_target dt on tt.special_promotion_id = dt.special_promotion_id
                inner join 
                tbl_user tby on dt.sales_officer_id = tby.employee_id
                where tt.status='1' and tt.special_promotion_id = '$id' and tby.id like '$user' group BY tt.special_promotion_id";

        return $this->db->mod_select($sql);
    }

    public function getTarget() {
        $q = $_POST['id'];
        $user = $this->session->userdata('id');
        $sql = "SELECT tt.qty_per_month, ty.employee_id
                FROM tbl_special_promotion_detail_target tt 
                inner join 
                tbl_user ty on tt.sales_officer_id = ty.employee_id
                where tt.status='1' and ty.id like '$user%' and tt.special_promotion_id like '$q%' limit 10";

        return $this->db->mod_select($sql);
    }

    public function getActual() {
        $id = $_POST['id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $user = $this->session->userdata('id');

        $sql = "select ifnull(sum(dt.reason),0) as qty 
                from tbl_dealer_purchase_order dt
                inner join 
                tbl_user tby on dt.sales_officer_id = tby.employee_id
                where dt.status = '1' and dt.complete = '3' and special_promotion_id = '$id' and
                tby.id like '$user%' and dt.date between '$start%' and '$end%'";

        print_r($this->db->mod_select($sql));
        return $this->db->mod_select($sql);
    }

    public function getKitDetails() {
        $id = $_POST['id'];
        $user = $this->session->userdata('id');

        $sql = "SELECT distinct tty.item_id, tty.item_part_no, tty.description, tty.vehicle_model_local, tty.selling_price, tt.special_prices, tt.special_discount, tt.per_unit, sp.special_promotion_id
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id               
                inner join
                tbl_special_promotion_detail_target tb on tt.special_promotion_id = tb.special_promotion_id
                inner join 
                tbl_user tby on tb.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%'  and sp.special_promotion_id = '$id'";

        return $this->db->mod_select($sql);
    }

    public function getQty() {
        $id = $_POST['id'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tty.item_id, tty.item_part_no, tty.description, tty.selling_price, tt.special_prices, tt.per_unit
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id
                
                inner join
                tbl_special_promotion_detail_target tb on tt.special_promotion_id = tb.special_promotion_id
                inner join 
                tbl_user tby on tb.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%'  and sp.special_promotion_id = '$id'";

        return $this->db->mod_select($sql);
    }

    public function getDealerName($q, $select) {
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

    public function getDealerDetails() {
        $dealer = $_POST['dealer'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tt.delar_name, tt.delar_account_no, tt.telO
                FROM tbl_dealer tt
                inner join
                tbl_user tty on tt.sales_officer_id = tty.employee_id
                where tt.status='1' and tty.id like '$user%' and delar_name like '$dealer%' limit 10";

        return $this->db->mod_select($sql);
    }

    public function get_vat() {
        $sql = "select amount from tbl_vat where status = '1'";
        return $this->db->mod_select($sql);
    }

// harshan updated =========15-5-24======>>>>>>>>>>>
    public function submitKitPromotionSummary() {
        $form_data = $_POST['data'];
//        print_r($form_data);
        $array_data = $_POST['array'];
        //print_r($array_data);
        $other = $_POST['user'];
        $ype = "";
        $call="";
//       print_r($form_data);
//        print_r($array_data);
//        print_r($other);
        $this->load->model('auto_generate_id/auto_generate_id');
        $lastPurchaseOrderID = $this->getLastPurchaseOrderID();
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("delar_id", $form_data[0]);
        $dealer_id = $dealerDetails[0]->delar_id;
        $dealer_discount = $dealerDetails[0]->discount_percentage;
        $reference_str = $dealerDetails[0]->branch_code . $dealerDetails[0]->sales_officer_code;
        $generateNextID = $this->auto_generate_id->generateID($lastPurchaseOrderID, $reference_str);
        $this->db->__beginTransaction();
      if($form_data[6]== '1'){
        echo  $ype = '0';
         echo $call = '1';
      }  else {
          $type = $form_data[6];
        echo  $call = 0;
      }
        try {
            $order = array(
                "date" => date('Y-m-d'),
                "time" => date('H:i:s'),
                "sales_officer_id" => $other[0],
                "dealer_id" => $form_data[0],
                "amount" => $form_data[1],
                "complete" => $ype,
                "purchase_order_number" => $generateNextID,
                "discount_percentage" => $other[1],
                "current_vat" => $other[2],
                "total_discount" => $form_data[2],
                "without_vat" => $form_data[5],
                "is_sales_officer" => 1,
                "order_type" => $call,
                "special_promotion_id" => $other[3],
                "reason" => $form_data[4],
                "status" => '1'
            );
//            print_r('*********');
//            print_r($order);

            $this->db->insertData("tbl_dealer_purchase_order", $order);

            $po_id = $this->db->insert_id();
            $rows = $form_data[3];
            
            for ($x = 0; $x < $rows; $x++) {
                $detail = array(
                    "purchase_order_id" => $po_id,
                    "item_id" => $array_data[$x][0],
                    "item_qty" => $array_data[$x][1],
                    "unit_price" => $array_data[$x][2],
                    "status" => '1'
                );

                $this->db->insertData('tbl_dealer_purchase_order_detail', $detail);
            }
//            print_r($detail);
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }
       public function getLastPurchaseOrderID() {
        $sql = "select purchase_order_id from tbl_dealer_purchase_order order by 1 desc limit 1";
        $mod_select = $this->db->mod_select($sql);
        if (sizeof($mod_select) == 0) {
            return 1;
        } else {
            return ($mod_select[0]->purchase_order_id ) + 1;
        }
    }

    // chanege end harshan =======>>>>>>>>
}
