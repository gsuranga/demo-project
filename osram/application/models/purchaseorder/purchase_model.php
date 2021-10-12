<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of purchase_model
 *
 * @author kanishka
 */
class purchase_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEmployeNames($q, $select) {
        $sql = "SELECT tbl_employee.id_employee,CONCAT(tbl_employee.employee_first_name,' ' ,tbl_employee.employee_last_name) as employee_first_name,
            tbl_employee_has_place.id_employee_has_place FROM tbl_employee tbl_employee
            INNER JOIN tbl_employee_has_place tbl_employee_has_place WHERE 
            tbl_employee.id_employee = tbl_employee_has_place.id_employee AND 
            tbl_employee_has_place.employee_has_place_status='1' AND tbl_employee.employee_first_name LIKE '$q%'";

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

    public function getProducts($q, $select) {
        $sql = "SELECT tbl_products.id_products,tbl_products.product_price,tbl_products.product_cost,tbl_item.item_name,tbl_item.item_account_code
            FROM tbl_products tbl_products INNER JOIN tbl_item tbl_item WHERE tbl_item.id_item = tbl_products.iditem 
            AND tbl_products.product_status='1' AND tbl_item.item_name LIKE '$q%'";

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

    public function insertPurchaseOrder($purchase) {

        $data = array(
            'id_employee_has_place' => $purchase['employee_no'],
            'purchase_order_number' => $purchase['order_no'],
            'purchase_order_date' => date('Y:m:d'),
            'purchase_order_time' => date('H:i:s'),
            'purchase_order_remark' => $purchase['remark'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );

        print_r($data);


        $this->db->__beginTransaction();
        $this->db->insert('tbl_purchase_order', $data);
        $this->db->__endTransaction();

        return $this->db->status();
    }

    public function insertPurchaseOrderHasproducts($dataarray) {
        
        $this->db->__beginTransaction();
        $this->db->insert('tbl_purchase_order_has_products', $dataarray);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function getPurchaseOrderNoData($order_no, $select) {
        $sql = '';
        if (isset($_GET['manage_employee_name_id_hidden']) && $_GET['manage_employee_name_id_hidden'] != '') {
            $manage_employee_name_id = $_GET['manage_employee_name_id_hidden'];
            $sql = "id_employee_has_place ='$manage_employee_name_id' AND";
        }
        //term
        $query = "SELECT purchase_order_number,id_purchase_order FROM tbl_purchase_order WHERE 
            {$sql} purchase_order_number LIKE '%$order_no%'";
        $query_result = $this->db->query($query);
        $result = $query_result->result('array');
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

    public function getPurchaseOrderNo_employes($emp_id, $select) {
        $sql = "SELECT tbl_purchase_order.id_employee_has_place,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place
            INNER JOIN tbl_purchase_order tbl_purchase_order WHERE  
            tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place AND 
            tbl_employee_has_place.id_employee = tbl_employee.id_employee AND tbl_employee.employee_first_name LIKE '$emp_id%' GROUP BY tbl_employee.employee_first_name";

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

    public function viewAllPurchaseOrder($employe_id = '') {
        $persmision = '';
        if($employe_id != ''){
            $persmision = " AND tbl_purchase_order.id_employee_has_place = '$employe_id' ";
        }
        $sql = "";
        if (isset($_POST['manage_employee_name_id']) && $_POST['manage_employee_name_id'] != '') {
            $emp_id = $_POST['manage_employee_name_id'];
            $sql = " AND tbl_purchase_order.id_employee_has_place = '$emp_id' ";
        }

//        if (isset($_POST['manage_employee_name_id']) && $_POST['manage_employee_name_id'] != '' && isset($_POST['manage_podprimary_no']) && $_POST['manage_podprimary_no'] != '') {
//            $emp_id = $_POST['manage_employee_name_id'];
//            $orddr_id = $_POST['manage_podprimary_no'];
//            $sql = " AND tbl_purchase_order.id_employee_has_place = '$emp_id' AND tbl_purchase_order.id_purchase_order = '$orddr_id'";
//        }
        
            if (isset($_POST['manage_podprimary_no']) && $_POST['manage_podprimary_no'] != '') {
            $orddr_id = $_POST['manage_podprimary_no'];
            $sql = " AND tbl_purchase_order.id_purchase_order = '$orddr_id' ";
        }
        
        if (isset($_POST['start_date']) && $_POST['start_date'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '') {
//            $emp_id = $_POST['manage_employee_name_id'];
//            $orddr_id = $_POST['manage_podprimary_no'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $sql = "AND tbl_purchase_order.purchase_order_date BETWEEN '$start_date' AND '$end_date'";
        }
        
        $query = "SELECT tbl_purchase_order.added_time,tbl_dilivery_note.id_dilivery_note ,tbl_purchase_order.purchase_order_number
            ,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name ,tbl_purchase_order.purchase_order_date,tbl_purchase_order.id_purchase_order
            ,tbl_employee_has_place.id_employee_has_place FROM tbl_employee_has_place tbl_employee_has_place
            INNER JOIN tbl_employee tbl_employee INNER JOIN tbl_purchase_order tbl_purchase_order 
            LEFT  JOIN tbl_dilivery_note tbl_dilivery_note ON tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order
            WHERE tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place AND tbl_purchase_order.purchase_order_status ='1'
            AND tbl_employee.id_employee = tbl_employee_has_place.id_employee {$sql} {$persmision} ORDER BY tbl_purchase_order.purchase_order_date desc";

        $query_result = $this->db->query($query);
        $result = $query_result->result();
        return $result;
    }
    
    public function viewPurchaseOrderDetails($primary_token_value){
        $sql  = "SELECT tbl_purchase_order_has_products.idl_purchase_order_has_products,tbl_purchase_order_has_products.item_qty ,tbl_purchase_order.id_employee_has_place,tbl_purchase_order.purchase_order_remark, 
            tbl_employee.employee_first_name,tbl_employee.employee_last_name,tbl_products.product_cost as product_price,tbl_item.item_name
            ,tbl_item.item_alias,tbl_item.item_account_code,tbl_purchase_order_has_products.id_products,tbl_purchase_order.id_purchase_order
            , tbl_purchase_order.purchase_order_number , tbl_purchase_order.purchase_order_date,
	ifnull(( select 
    tsk.qty
from
     tbl_products tp
        inner join
    tbl_stock tsk ON tp.id_products = tsk.id_products
        inner join
    tbl_store tsr ON tsk.id_store = tsr.id_store
       where
    tsk.stock_status = 1
	and tsk.id_products =  tbl_products.id_products
and tsr.id_physical_place= tbl_employee_has_place.id_physical_place
 ),0)as qty 
            FROM tbl_purchase_order tbl_purchase_order INNER JOIN tbl_purchase_order_has_products tbl_purchase_order_has_products 
            INNER JOIN tbl_products tbl_products INNER JOIN tbl_item tbl_item JOIN tbl_employee_has_place tbl_employee_has_place 
            INNER JOIN tbl_employee tbl_employee WHERE tbl_purchase_order.id_purchase_order = tbl_purchase_order_has_products.id_purchase_order 
            AND tbl_purchase_order.id_purchase_order = '$primary_token_value' AND tbl_purchase_order.purchase_order_status='1' 
            AND tbl_purchase_order_has_products.item_status ='1' AND tbl_products.id_products = tbl_purchase_order_has_products.id_products AND tbl_item.id_item = tbl_products.iditem 
            AND tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
            AND tbl_employee.id_employee = tbl_employee_has_place.id_employee";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function deletePurchaseItem($id){
        
        $where = array(
          'idl_purchase_order_has_products' => $id  
        );
        
        $set =  array(
          'item_status' => '0'   
        );
        
        $this->db->update('tbl_purchase_order_has_products', $set, $where);
    }
    
    public function deletePurchase($id){
        
        $where = array(
          'id_purchase_order' => $id  
        );
        
        $set =  array(
          'purchase_order_status' => '0'   
        );
        $this->db->update('tbl_purchase_order', $set, $where);
    }

	public function get_avilableQty(){
        $itemId=$_REQUEST['itemId'];
//       echo '</br>';
        $empId=$_REQUEST['empId'];
        $sql="select 
    tsk.qty
from
     tbl_products tp
        inner join
    tbl_stock tsk ON tp.id_products = tsk.id_products
        inner join
    tbl_store tsr ON tsk.id_store = tsr.id_store
        inner join
    tbl_employee te ON tsr.id_employee_registration = te.id_employee_registration
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
where
    tsk.stock_status = 1
        and ehp.id_employee_has_place = '$empId'
and tp.iditem='$itemId'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	
}

?>
