<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diliverynote_model
 *
 * @author kanishka
 */
class diliverynote_erp_model extends C_Model {

    private $orderIds = array();
    private $lastOrderId = 0;

    public function __construct() {
        parent::__construct();
    }

    public function readArrayToInsertDiliveryNote($diliverynote) {
        //print_r($diliverynote);
        foreach ($diliverynote as $value) {
            //echo $value[1];
            if (in_array($value[1], $this->orderIds)) {

                if ($this->lastOrderId != 0) {
                    $this->inserDiliveryNoteDetails($this->lastOrderId, $value[7], $value[9], $value[2]);
                }
            } else {
                $this->inserDiliveryNote($value[1], $value[2], $value[5], $value[0], $value[7], $value[9]);
            }
        }
    }

    public function inserDiliveryNote($poid = '', $date = '', $division = '', $category = '', $itemCode = '', $qty = '') {
        //echo $poid." : ".$date." : ".$division." : ".$category." : ".$itemCode." : ".$qty."</br>";
        if ($poid != null) {
            $sql = "SELECT id_purchase_order,id_products,item_qty FROM tbl_purchase_order_has_products WHERE id_purchase_order='$poid'";

            $query = $this->db->query($sql);
            $result = $query->result();
            $this->db->__beginTransaction();
            $temp_id = "DN00" . $poid;
            $dilivery_note = array(
                'id_purchase_order' => $poid,
                'added_date' => $date,
                'added_time' => date('H:i:s'),
                'dilivery_note_number' => $temp_id,
                'category' => $category,
                'division' => $division,
            );
             print_r($dilivery_note);
            $this->db->insert("tbl_dilivery_note", $dilivery_note);
            array_push($this->orderIds, $poid);

            $lastRow = $this->getLastRow();
            ;
            $this->lastOrderId = $this->getLastRow();


            if ($itemCode != null) {
                $query = "select tbl_products.id_products
from tbl_item,tbl_products
 where tbl_item.id_item = tbl_products.iditem
and
tbl_item.item_account_code = '$itemCode';";


                // echo $query;
                $queryTwo = $this->db->query($query);
                $result2 = $queryTwo->result();
                // print_r($result2);
                $id_product = $result2[0]->id_products;
                //echo $id_product;


                $deliverQty = 0;
                if ($qty < 0) {
                    $deliverQty = $qty * -1;
                } else {
                    $deliverQty = $qty;
                }

                $details = array(
                    'id_products' => $id_product,
                    'id_dilivery_note' => $lastRow,
                    'added_date' => $date,
                    'added_time' => date('H:i:s'),
                    'dilivery_qty' => $deliverQty,
                );
                $this->db->insert("tbl_dilivery_note_has_products", $details);


                $this->db->__endTransaction();
                return $this->db->status();
            }
        }
    }

    public function inserDiliveryNoteDetails($lastOrderId, $itemCode, $qty, $date) {
        echo $lastOrderId;

        if ($itemCode != null) {
            $query = "select tbl_products.id_products
from tbl_item,tbl_products
 where tbl_item.id_item = tbl_products.iditem
and
tbl_item.item_account_code = '$itemCode';";


            // echo $query;
            $queryTwo = $this->db->query($query);
            $result2 = $queryTwo->result();
            // print_r($result2);
            $id_product = $result2[0]->id_products;
            //echo $id_product;


            $deliverQty = 0;
            if ($qty < 0) {
                $deliverQty = $qty * -1;
            } else {
                $deliverQty = $qty;
            }

            $details = array(
                'id_products' => $id_product,
                'id_dilivery_note' => $lastOrderId,
                'added_date' => $date,
                'added_time' => date('H:i:s'),
                'dilivery_qty' => $deliverQty,
            );
            print_r($details);
            $this->db->insert("tbl_dilivery_note_has_products", $details);


            $this->db->__endTransaction();
            return $this->db->status();
        }

        $this->lastOrderId = null;
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function viewAllDeliveryNottes($id_physical_pla) {
        $id_physical_place = '';
        if ($id_physical_pla != '') {
            $id_physical_place = "AND tbl_employee_has_place.id_employee_has_place='$id_physical_pla'";
        }
        $filter_orderid = '';
        $filter_name = '';
        $filter_date = '';

        if (isset($_POST['manage_podprimary_no']) && $_POST['manage_podprimary_no'] != '') {
            $id = $_POST['manage_podprimary_no'];
            $filter_orderid = "AND tbl_dilivery_note.id_dilivery_note='$id'";
        }

        if (isset($_POST['manage_employee_name_id']) && $_POST['manage_employee_name_id'] != '') {
            $id = $_POST['manage_employee_name_id'];
            $filter_name = "AND tbl_employee_has_place.id_employee_has_place='$id'";
        }

        if (isset($_POST['manage_podprimary_no']) && $_POST['manage_podprimary_no'] != '' && isset($_POST['manage_employee_name_id']) && $_POST['manage_employee_name_id'] != '') {
            $order_id = $_POST['manage_podprimary_no'];
            $filter_orderid = "AND tbl_dilivery_note.id_dilivery_note='$order_id'";
            $id = $_POST['manage_employee_name_id'];
            $filter_name = "AND tbl_employee_has_place.id_employee_has_place='$id'";
        }

        if (isset($_POST['start_date']) && $_POST['start_date'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '') {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $filter_date = "AND tbl_dilivery_note.added_date BETWEEN '$start_date' AND '$end_date'";
        }

        $sql = "SELECT tbl_dilivery_note.added_time,tbl_dilivery_note.dilivery_note_number,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name,tbl_employee_has_place.id_employee_has_place
            ,tbl_purchase_order.purchase_order_number,tbl_purchase_order.added_date
            , tbl_good_received.id_good_received ,tbl_dilivery_note.id_dilivery_note 
            FROM tbl_dilivery_note tbl_dilivery_note LEFT JOIN tbl_good_received tbl_good_received 
            ON tbl_good_received.id_dilivery_note = tbl_dilivery_note.id_dilivery_note 
            INNER JOIN tbl_purchase_order tbl_purchase_order INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            INNER JOIN tbl_employee tbl_employee WHERE tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order 
            AND tbl_purchase_order.purchase_order_status='1' AND tbl_dilivery_note.dilivery_note_status='1'
            AND tbl_employee_has_place.id_employee_has_place = tbl_purchase_order.id_employee_has_place 
            AND tbl_employee.id_employee = tbl_employee_has_place.id_employee {$filter_orderid} {$filter_name} {$filter_date} {$id_physical_place}";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getPurcahseOrders($q, $select) {
        /* $sql = "SELECT tbl_purchase_order.purchase_order_number,tbl_dilivery_note.id_dilivery_note 
          FROM tbl_purchase_order tbl_purchase_order INNER JOIN tbl_dilivery_note tbl_dilivery_note
          WHERE tbl_dilivery_note.id_purchase_order = tbl_purchase_order.id_purchase_order
          AND tbl_purchase_order.purchase_order_number LIKE '%$q%'"; */
        $sql = "SELECT dilivery_note_number,id_dilivery_note FROM tbl_dilivery_note WHERE dilivery_note_status='1' AND dilivery_note_number LIKE '%$q%'";
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

    public function getEmployesByDiliverNote($q, $select) {
        $sql = "SELECT CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as fullname,tbl_employee_has_place.id_employee_has_place FROM tbl_dilivery_note tbl_dilivery_note 
            INNER JOIN tbl_purchase_order tbl_purchase_order INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            INNER JOIN tbl_employee tbl_employee WHERE tbl_dilivery_note.id_purchase_order = tbl_purchase_order.id_purchase_order 
            AND tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place  
            AND tbl_employee_has_place.id_employee = tbl_employee.id_employee AND tbl_employee.employee_first_name LIKE '%$q%' GROUP BY tbl_employee.employee_first_name";
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

    public function getDiliverDetails($id) {
        $sql = "SELECT tbl_dilivery_note.dilivery_note_number,tbl_products.product_price,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as fullname,tbl_employee_has_place.id_employee_has_place
            ,tbl_purchase_order.purchase_order_number,tbl_dilivery_note_has_products.added_date
            ,tbl_dilivery_note_has_products.id_dilivery_note_has_products
            ,tbl_dilivery_note_has_products.dilivery_qty,tbl_products.id_products
            ,tbl_item.item_name,tbl_dilivery_note_has_products.id_dilivery_note
            FROM tbl_dilivery_note_has_products tbl_dilivery_note_has_products
            INNER JOIN tbl_dilivery_note tbl_dilivery_note INNER JOIN tbl_purchase_order tbl_purchase_order
            INNER JOIN tbl_employee_has_place tbl_employee_has_place INNER JOIN tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item INNER JOIN tbl_employee tbl_employee  
            WHERE tbl_dilivery_note_has_products.id_dilivery_note = tbl_dilivery_note.id_dilivery_note 
            AND  tbl_dilivery_note_has_products.id_dilivery_note ='$id' 
            AND tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order 
            AND tbl_employee_has_place.id_employee_has_place = tbl_purchase_order.id_employee_has_place 
            AND tbl_dilivery_note_has_products.id_products = tbl_products.id_products 
            AND tbl_item.id_item = tbl_products.iditem AND tbl_dilivery_note_has_products.dilivery_note_status='1' 
            AND tbl_employee.id_employee = tbl_employee_has_place.id_employee";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function deleteDilverNote($id) {

        $where = array(
            'id_dilivery_note' => $id
        );

        $set = array(
            'dilivery_note_status' => '0'
        );
        print_r($where);
        
        $this->db->update('tbl_dilivery_note', $set, $where);
    }
    
   

}

?>
