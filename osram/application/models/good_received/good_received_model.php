<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of good_received_model
 *
 * @author kanishka
 */
class good_received_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserGoodRecived($diliverynote = '') {
        
        $sql = "SELECT id_dilivery_note,id_products,dilivery_qty FROM tbl_dilivery_note_has_products WHERE id_dilivery_note='$diliverynote'";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        $id_store = "SELECT tbl_store.id_store FROM tbl_store tbl_store
                    INNER JOIN tbl_purchase_order tbl_purchase_order
                    INNER JOIN tbl_dilivery_note tbl_dilivery_note INNER JOIN tbl_employee_has_place tbl_employee_has_place WHERE 
                     tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
                    AND tbl_dilivery_note.id_purchase_order = tbl_purchase_order.id_purchase_order 
                    AND tbl_dilivery_note.id_dilivery_note='$diliverynote' AND tbl_store.store_status='1' AND tbl_store.id_physical_place = tbl_employee_has_place.id_physical_place";
        
        $query_id_store = $this->db->query($id_store);
        $result_store = $query_id_store->result();
        
        if (isset($result_store[0]->id_store)) {
            $this->db->__beginTransaction();
            $temp_id = "GRN00" . $diliverynote;
            $good_recived = array(
                'id_dilivery_note' => $diliverynote,
                'added_date' => date('Y:m:d'),
                'added_time' => date('H:i:s'),
                'good_recived_number' => $temp_id
            );

           $this->db->insert("tbl_good_received", $good_recived);
            $lastRow = $this->getLastRow();
            foreach ($result as $value) {
                $details = array(
                    'id_good_received' => $lastRow,
                    'id_products' => $value->id_products,
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'received_qty' => $value->dilivery_qty
                );

                $tbl_stock = array(
                    'id_store' => $result_store[0]->id_store,
                    'id_products' => $value->id_products,
                    'qty' => $value->dilivery_qty,
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s')
                );

                $this->db->insert("tbl_good_received_products", $details);
                $stockItemQty = $this->getStockItemQty($value->id_products,$result_store[0]->id_store);
                if(count($stockItemQty) > 0){
                    $qty_data = 0;
                        
                    $where = array(
                        'id_stock' => $stockItemQty[0]['id_stock']
                    );
                    
                    $qty_data = ($value->dilivery_qty + $stockItemQty[0]['qty']);
                    
                    $tbl_stockup = array(
                    'id_store' => $result_store[0]->id_store,
                    'id_products' => $value->id_products,
                    'qty' => $qty_data,
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s')
                );
                   
                    $this->db->update('tbl_stock', $tbl_stockup, $where);
                }  else {
                    $this->db->insert("tbl_stock", $tbl_stock);
                }
               
            }
            echo "sucsessfully added";
            $this->db->__endTransaction();
        } else {
            echo "no stock has employee";
        }

        return $this->db->status();
    }    
    public function getStockItemQty($id_products,$id_store) {
        $coulmn = array('id_products' => $id_products , 'id_store' => $id_store);
        $sql = "SELECT id_stock,qty FROM tbl_stock WHERE id_products=:id_products AND id_store=:id_store";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function getGoodRecived($id_physical_place = '') {
        $id_physical_pla = '';
        $query_append = '';
     
        $log_type=$this->session->userdata('user_type');
        $id_physical_place=$this->session->userdata('id_physical_place');
		$id_employeeHas = $this->session->userdata('id_employee_has_place');
        if($log_type==Distributor){
        if($id_physical_place != ''){
            $id_physical_pla = "AND tbl_employee_has_place.id_physical_place='$id_physical_place'";
        }
        }
		        if ($log_type == "Regional Manager" || $log_type == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
                $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        if (isset($_POST['manage_employee_name_id']) && $_POST['manage_employee_name_id'] != '') {
            $id = $_POST['manage_employee_name_id'];
            $query_append = "AND tbl_employee_has_place.id_employee_has_place='$id'";
        }
        
        if (isset($_POST['grn_no_hidden_token']) && $_POST['grn_no_hidden_token'] != '') {
            $id = $_POST['grn_no_hidden_token'];
            $query_append = "AND tbl_good_received.id_good_received='$id'";
        }

        if (isset($_POST['start_grn']) && $_POST['start_grn'] != '' && isset($_POST['end_grn']) && $_POST['end_grn'] != '') {

            $start_date = $_POST['start_grn'];
            $end_date = $_POST['end_grn'];
            $query_append = "AND tbl_good_received.added_date BETWEEN '$start_date' AND '$end_date'";
        }

            $sql = "SELECT tbl_good_received.added_time,tbl_good_received.id_good_received,tbl_employee_has_place.id_employee_has_place
            ,tbl_good_received.good_recived_number,tbl_good_received.added_date
            ,tbl_good_received.id_dilivery_note,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name,tbl_employee.employee_last_name
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            INNER JOIN tbl_purchase_order tbl_purchase_order INNER JOIN tbl_dilivery_note tbl_dilivery_note 
            INNER JOIN tbl_good_received tbl_good_received 
            WHERE tbl_employee.id_employee = tbl_employee_has_place.id_employee 
            AND tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
            AND tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order 
            AND tbl_good_received.id_dilivery_note= tbl_dilivery_note.id_dilivery_note AND tbl_good_received.good_received_status='1' {$query_append} {$id_physical_pla}";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function viewGoodRecivedDetail($id) {
        $sql = "SELECT tbl_good_received.added_date,tbl_good_received.good_recived_number
            ,tbl_good_received_products.received_qty,tbl_item.item_name 
            , tbl_products.product_cost as product_price FROM tbl_item tbl_item 
            INNER JOIN tbl_products tbl_products INNER JOIN tbl_good_received_products tbl_good_received_products 
            INNER JOIN tbl_good_received tbl_good_received
            WHERE tbl_products.iditem = tbl_item.id_item 
            AND tbl_good_received_products.id_products = tbl_products.id_products 
            AND tbl_good_received_products.id_good_received='$id' 
                AND tbl_good_received.id_good_received = tbl_good_received_products.id_good_received";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getEmployeeNamesByGood($id, $select) {
        $sql = "SELECT tbl_employee_has_place.id_employee_has_place
            ,CONCAT (tbl_employee.employee_first_name,' ' ,tbl_employee.employee_last_name) as fullname 
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            INNER JOIN tbl_purchase_order tbl_purchase_order INNER JOIN tbl_dilivery_note tbl_dilivery_note 
            INNER JOIN tbl_good_received tbl_good_received 
            WHERE tbl_employee.id_employee = tbl_employee_has_place.id_employee 
            AND tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
            AND tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order 
            AND tbl_good_received.id_dilivery_note= tbl_dilivery_note.id_dilivery_note 
            AND tbl_good_received.good_received_status='1' 
            AND tbl_employee.employee_first_name  LIKE '%$id%' GROUP BY tbl_employee.employee_first_name";

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

    public function getGrnByGood($id, $select) {
        $log_type=$this->session->userdata('user_type');
        $id_physical_place=$this->session->userdata('id_physical_place');
		 $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if($log_type==Distributor){
      
            $id_physical_pla = "AND tbl_employee_has_place.id_physical_place='$id_physical_place'";
       
        }
    if ($log_type == "Regional Manager" || $log_type == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
                $append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }    
		
		
        $sql = "SELECT 

    tbl_good_received.id_good_received,

    tbl_good_received.good_recived_number
    
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place
        INNER JOIN
    tbl_purchase_order tbl_purchase_order
        INNER JOIN
    tbl_dilivery_note tbl_dilivery_note
        INNER JOIN
    tbl_good_received tbl_good_received
WHERE
    tbl_employee.id_employee = tbl_employee_has_place.id_employee
        AND tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        AND tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order
        AND tbl_good_received.id_dilivery_note = tbl_dilivery_note.id_dilivery_note
		and tbl_good_received.good_recived_number like '%$id%'
        AND tbl_good_received.good_received_status = '1' {$append} {$id_physical_pla}" ;

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

    public function deleteGRN($id) {

        $where = array(
            'id_good_received' => $id
        );

        $set = array(
            'good_received_status' => '0'
        );
        //print_r($where);
        $this->db->update('tbl_good_received', $set, $where);
    }

}

?>
