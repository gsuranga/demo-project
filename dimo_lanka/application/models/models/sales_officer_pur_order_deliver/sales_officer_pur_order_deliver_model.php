<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class sales_officer_pur_order_deliver_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    public function getAllDeliverOrder() {
        $sql = "select * from tbl_s_o_purchase_order tsopo Left Join tbl_sales_officer tso on tsopo.sales_officer_id=tso.sales_officer_id join tbl_dealer td on tsopo.delar_id=td.delar_id join tbl_branch tb on td.branch_id=tb.branch_id where tsopo.status='1' and tsopo.accept='0'";
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

    public function viewacceptOrderDetail($id) {

        $sql = "select * from tbl_s_o_purchase_order_detail tsopod left JOIN tbl_item ti on tsopod.item_id=ti.item_id  where s_o_purchase_order_id='$id' and tsopod.status='1'";
        return $this->db->mod_select($sql);
    }

    public function insertSalesOfficerdeliverOrder() {
        // print_r($_REQUEST);
        $i = 0;
        $data1 = array(
            "add_deliver_date" => date('Y:m:d'),
            "add_deliver_time" => date('H:i:s'),
            "s_o_purchase_order_id" => $_REQUEST['orderID'],
            "amount" => $_REQUEST['amount'],
            "total_discount" => $_REQUEST['totDiscount'],
            "status" => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_s_o_deliver_order", $data1);
        $orderDetailID = $this->db->insert_id();

        // print_r($_REQUEST['deliverdetail'][0]['itemID']);

        foreach ($_REQUEST['deliverdetail'] as $value) {
            $data2 = array(
                "s_o_deliver_order_id" => $orderDetailID,
                "item_id" => $_REQUEST['deliverdetail'][$i]['itemID'],
                "qty" => $_REQUEST['deliverdetail'][$i]['qty'],
                "new_qty" => $_REQUEST['deliverdetail'][$i]['new_qty'],
                "unit_price" => $_REQUEST['deliverdetail'][$i]['unitPrice'],
                "discount_type" => $_REQUEST['deliverdetail'][$i]['disType'],
                "discount" => $_REQUEST['deliverdetail'][$i]['discount'],
                "status" => '1'
            );
            $this->db->insertData('tbl_s_o_deliver_order_detail', $data2);
           

//             echo $_REQUEST['deliverdetail'][$i]['itemID']; 
//             echo '/';
//             echo $_REQUEST['deliverdetail'][$i]['unitPrice']; 
//             echo '/';
//             echo $_REQUEST['deliverdetail'][$i]['discount']; 
//             echo '/';
//             echo $_REQUEST['deliverdetail'][$i]['disType']; 
//             echo '/';
//             echo $_REQUEST['deliverdetail'][$i]['qty']; 
//             echo '/';
//             echo $_REQUEST['deliverdetail'][$i]['new_qty']; 
//             echo 'finish';
            $i = $i + 1;
        }
         $update = array(
                "accept" => '1'
            );
            $where = array(
                "s_o_purchase_order_id" => $_REQUEST['orderID']
            );
            $this->db->update("tbl_s_o_purchase_order", $update, $where);

        $this->db->__endTransaction();
    }
     function rejectPurcheOrder($id1) {
        $id = $id1;
        $data1 = array(
            "accept" => 2
        );
        $where = array(
            "s_o_purchase_order_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_s_o_purchase_order", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }


}

?>
