<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class sales_officer_pur_order_model extends C_Model {

    public function getOutlet($q, $select) {
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_shop_name like '$q%'";
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

    public function get_product($q, $select) {
        $sql = "SELECT * FROM tbl_item where status='1' and item_part_no like '$q%'";
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

    public function getSalesOfficer($q, $select) {
        $sql = "SELECT * FROM tbl_sales_officer where sales_officer_account_no like '$q%'";
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

    public function insertSalesOfficerPurchaseOrder($dataset) {


        $rowCount = $dataset['updateRowCount'];

        $data1 = array(
            "date" => date('Y:m:d'),
            "time" => date('H:i:s'),
            "sales_officer_id" => $dataset['salesOfficerID'],
            "dealer_id" => $dataset['outletID'],
            "amount" => $dataset['total_amount'],
            "total_discount" => $dataset['total_discount'],
            "complete" => '3',
            "status" => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_dealer_purchase_order", $data1);
        //  $sql = "select max(s_o_purchase_order_id) as s_o_purchase_order_id from tbl_s_o_purchase_order where status='1'";
       $maxid = $this->db->insert_id();
        ;
//        echo $maxid;
        for ($i = 1; $i <= $rowCount; $i++) {
            $dtype = '';
            echo '1';
            if (isset($dataset['item_name_' . $i])) {
                echo '2';
                if ($dataset['combo_id_' . $i] == "Default") {
                    $dtype = 0;
                } else {
                    $dtype = 1;
                }

                $data2 = array(
                    "purchase_order_id" => $maxid,
                    "item_id" => $dataset['item_id2_' . $i],
                    "item_qty" => $dataset['item_qty_' . $i],
                    "unit_price" => $dataset['item_price_' . $i],
                    "discount" => $dataset['discount_' . $i],
                    "discount_type" => $dtype,
                    "status" => '1'
                );
                print_r($data2);

                $this->db->insertData('tbl_dealer_purchase_order_detail', $data2);
            }
        }
        $this->db->__endTransaction();
    }

    public function getSalesOfficerByName($q, $select) {
        $sql = "SELECT * FROM tbl_sales_officer where sales_officer_name like '$q%'";
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

    public function viewacceptOrderDetail($id) {

        $sql = "select * from tbl_dealer_purchase_order_detail tsopod left JOIN tbl_item ti on tsopod.item_id=ti.item_id  where tsopod.purchase_order_id='$id' and tsopod.status='1'";
        return $this->db->mod_select($sql);
    }

    public function viewPendingOrder($id) {

        $sql = "select * from tbl_dealer_purchase_order tsop Left Join tbl_dealer td on tsop.dealer_id=td.delar_id  inner join tbl_branch  tb on td.branch_id =tb.branch_id where tsop.status='1' AND tsop. sales_officer_id='$id' and tsop.complete='0'";
        //echo $sql;
        return $this->db->mod_select($sql);
    }

    public function viewacceptOrder($id) {
        // $deliverQuery="SELECT amount As deliverAmount from tbl_s_o_deliver_order where s_o_purchase_order_id='$id'";
        // $sql = "select * from tbl_s_o_purchase_order tsop Left Join dealer td on tsop.delar_id=td.delar_id  inner join tbl_branch  tb on td.branch_id =tb.branch_id where tsop.status='1' AND tsop. sales_officer_id='$id' and tsop.accept='1'";
//        $sql = "select tsop.purchase_order_id,td.delar_shop_name,td.delar_account_no,tsop.date,tsop.time,tsop.total_discount,tsop.amount,tb.branch_account_no,tsodo.total_amount As deliverAmount,tsodo.total_discount As deliverDiscount,tsodo.accepted_date,tsodo.accepted_time from tbl_dealer_purchase_order tsop Left Join tbl_dealer td on tsop.dealer_id=td.delar_id  inner join tbl_branch  tb on td.branch_id =tb.branch_id join tbl_dealer_deliver_order tsodo on tsop.purchase_order_id =tsodo.purchase_order_id where tsop.status='1' AND tsop. sales_officer_id='$id' and tsop.complete='1'";
        $sql="select * from tbl_dealer_purchase_order tsop Left Join tbl_dealer td on tsop.dealer_id=td.delar_id  inner join tbl_branch  tb on td.branch_id =tb.branch_id where tsop.status='1' AND tsop. sales_officer_id='$id' and tsop.complete='1'";
        return $this->db->mod_select($sql);
    }

    function removePurcheOrder($id1) {
        $id = $id1;
        $data1 = array(
            "status" => 0
        );
        $where = array(
            "s_o_purchase_order_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_s_o_purchase_order", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function rejectPurcheOrder($id1) {
        $id = $id1;
        $data1 = array(
            "complete" => 2
        );
        $where = array(
            "s_o_purchase_order_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_s_o_purchase_order", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewrejectOrder($id) {
        $sql = "select * from tbl_s_o_purchase_order tsop Left Join tbl_dealer td on tsop.delar_id=td.delar_id  inner join tbl_branch  tb on td.branch_id =tb.branch_id where tsop.status='1' AND tsop. sales_officer_id='$id' and tsop.complete='2'";
        return $this->db->mod_select($sql);
    }

    public function viewgetUpdateOrder($id) {
        $sql = "select * from tbl_s_o_purchase_order tsop Left Join tbl_sales_officer tso on tsop.sales_officer_id=tso.sales_officer_id left join  tbl_dealer td on tsop.delar_id=td.delar_id  where tsop.status='1' and tsop.s_o_purchase_order_id=$id";
        return $this->db->mod_select($sql);
    }

    public function viewgetUpdateOrderDetail($id) {
        $sql = "select * from tbl_s_o_purchase_order_detail where status='1' and s_o_purchase_order_id=$id";
        return $this->db->mod_select($sql);
    }

    public function updateSalesOfficerPurchaseOrder($dataset) {
        // print_r($dataset);
        $d1 = $dataset['sopoid'];
        $rowCount = $dataset['updateRowCount'];
        $update = array(
            "status" => '0'
        );
        $where = array(
            "s_o_purchase_order_id" => $d1
        );
        //  echo $dataset['updateRowCount'];

        $this->db->__beginTransaction();
        $this->db->update("tbl_s_o_purchase_order_detail", $update, $where);

        //$rowCount++;
        for ($i = 1; $i <= $rowCount; $i++) {

            if (isset($dataset['item_name_' . $i])) {
                // echo $i;
                //echo 'right';
                $dtype = '';
                if ($dataset['combo_id_' . $i] == "Default") {
                    $dtype = 0;
                } else {
                    $dtype = 1;
                }

                $data2 = array(
                    "s_o_purchase_order_id" => $d1,
                    "item_id" => $dataset['item_id2_' . $i],
                    "qty" => $dataset['item_qty_' . $i],
                    "unit_price" => $dataset['item_price_' . $i],
                    "discount" => $dataset['discount_' . $i],
                    "discount_type" => $dtype,
                    "status" => '1'
                );



                $this->db->insertData('tbl_s_o_purchase_order_detail', $data2);
            } else {
                
            }
        }
        $id = $d1;
        $data1d = array(
            "complete" => 3,
            "amount"=>$_REQUEST['total_amount1'],
            "total_discount"=>$_REQUEST['total_discount']
        );
        $whered = array(
            "s_o_purchase_order_id" => $id
        );
        $this->db->update("tbl_s_o_purchase_order", $data1d, $whered);
        $this->db->__endTransaction();
        echo 'Succesfully added ';
    }

    public function viewDeliverOrderDetail($id) {
        $did = "select deliver_order_id from tbl_dealer_deliver_order where purchase_order_id='$id'";
        $mod_select = $this->db->mod_select($did);
       // echo $mod_select ;
        $deliverID = $mod_select[0]->deliver_order_id;
        $sql = "select * from tbl_delar_deliver_order_detail tsodod left JOIN tbl_item ti on tsodod.part_id=ti.item_id  where tsodod.deliver_order_id='$deliverID' and tsodod.status='1'";
        return $this->db->mod_select($sql);
    }
    public function setsalesofficer(){
       
       $emp_id= $this->input->get('emp_idd');
       
       $sql="select * from tbl_sales_officer where sales_officer_id=$emp_id";
       return $this->db->mod_select($sql);
    }

}

?>
 