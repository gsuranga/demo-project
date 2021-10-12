<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_model
 *
 * @author kanishka
 */
class stock_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewStockDetails($data_array = '' , $id_physical_place = '') {
        
        $sql_query = '';
        $id_physical_place1 = '';
        
        if($id_physical_place != ''){
            
            $id_physical_place1 .= "AND tbl_store.id_physical_place ='$id_physical_place'";
        }
        
       /* if (isset($data_array['employee_id'])) {
            $user_id = $data_array['employee_id'];
            $sql_query .= "AND tbl_store.id_physical_place ='$user_id'";
        }*/

         if (isset($data_array['employee_id']) && $data_array['store_name'] !=null) {
             $store_name = $data_array['store_name'];
             $user_id = '';
             if($id_physical_place != ''){
                 $user_id = $id_physical_place;
             }  else {
                 $user_id = $data_array['employee_id'];
             }
            
            
            $sql_query .= "AND tbl_store.id_physical_place ='$user_id' AND tbl_store.id_store='$store_name'";
        }
        
        
         if (isset($data_array['itemidForStock']) && $data_array['itemidForStock']!=null ) {
             $itemidForStock = $data_array['itemidForStock'];
             
             $sql_query .= "AND tbl_item.id_item ='$itemidForStock' ";
        }
         if (isset($data_array['itemidcode']) && $data_array['itemidcode']!=null ) {
             $itemidcode = $data_array['itemidcode'];
           $sql_query .= "AND tbl_item.id_item ='$itemidcode' ";
        }
       
        $sql = "SELECT tbl_item.item_account_code,tbl_stock.id_stock,tbl_products.product_price,tbl_products.product_cost,tbl_employee.employee_first_name,tbl_stock.qty,tbl_item.item_name,tbl_store.store_code
            ,tbl_store.store_name ,tbl_store.id_store FROM tbl_store tbl_store 
            INNER JOIN tbl_stock tbl_stock INNER JOIN tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item INNER JOIN tbl_employee tbl_employee WHERE tbl_stock.id_store = tbl_store.id_store 
            AND tbl_store.store_status ='1' AND tbl_products.iditem = tbl_item.id_item 
            AND tbl_stock.id_products = tbl_products.id_products 
            AND tbl_employee.id_employee_registration = tbl_store.id_employee_registration AND tbl_employee.employee_status='1' {$sql_query} {$id_physical_place1} GROUP BY tbl_stock.id_stock";
        
        //echo "query".$sql;
        $result = $this->db->mod_select($sql);
        /*foreach ($result as $value){
            echo "</br>".$value->id_stock;
        }*/
        return $result;
    }

    /*
     * do not remove this funtion
     *
      public function getstoreNames($q,$select){
      $sql = "SELECT id_store,store_name FROM tbl_store WHERE status='1' AND  store_name LIKE '%$q%'";
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
      } */

    public function getEmployeNamesbyStores($q, $select) {
                $sql = "SELECT 
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) AS user_name,
    tbl_employee_has_place.id_employee_has_place,
    tbl_store.id_physical_place
FROM
    tbl_store tbl_store
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place
        INNER JOIN
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_registration tbl_employee_registration
        INNER JOIN
    tbl_user tbl_user
        INNER JOIN
    tbl_user_type tbl_user_type
WHERE
    tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place
        AND tbl_employee_registration.id_employee_registration = tbl_user.id_employee_registration
        AND tbl_employee.id_employee = tbl_employee_has_place.id_employee
        AND tbl_employee.id_employee_type = 2
        AND tbl_employee_has_place.employee_has_place_status = '1'
        AND tbl_store.store_status = '1'
        AND tbl_employee.employee_first_name LIKE '$q%'
GROUP BY tbl_employee.employee_first_name";
       
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

    public function getstoreNames($reg_id) {
        $sql = "SELECT id_store,store_name FROM tbl_store WHERE id_physical_place='$reg_id' AND store_status='1'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function saveQty($data) {
        $details = array("qty" => $data['qty_ch']
        );

        $where = array(
            "id_stock" => $data['token_stock_id']
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_stock', $details, $where);
        
        $this->db->__endTransaction();
    }
    
    public function getItemNames($q, $select , $pysical_place){
        
        
       $sql="SELECT tbl_item.item_name,tbl_item.id_item FROM tbl_store tbl_store 
            INNER JOIN tbl_stock tbl_stock INNER JOIN tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item INNER JOIN tbl_employee tbl_employee WHERE tbl_stock.id_store = tbl_store.id_store 
            AND tbl_store.store_status ='1' AND tbl_products.iditem = tbl_item.id_item 
            AND tbl_stock.id_products = tbl_products.id_products 
            AND tbl_employee.id_employee_registration = tbl_store.id_employee_registration AND tbl_employee.employee_status='1' 
and tbl_item.item_name like '$q%' GROUP BY tbl_stock.id_products";
       
      
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
     
      public function getItemCode($q, $select){
       $sql="SELECT tbl_item.item_account_code,tbl_item.id_item FROM tbl_store tbl_store 
            INNER JOIN tbl_stock tbl_stock INNER JOIN tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item INNER JOIN tbl_employee tbl_employee WHERE tbl_stock.id_store = tbl_store.id_store 
            AND tbl_store.store_status ='1' AND tbl_products.iditem = tbl_item.id_item 
            AND tbl_stock.id_products = tbl_products.id_products 
            AND tbl_employee.id_employee_registration = tbl_store.id_employee_registration AND tbl_employee.employee_status='1' 
and tbl_item.item_account_code like '%$q%' GROUP BY tbl_stock.id_products";
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
     
     
     
      public function viewAllStockDetails() {
        
      
        $sql = "SELECT tbl_products.*,tbl_item.*  FROM tbl_products,tbl_item WHERE tbl_products.iditem=tbl_item.id_item and tbl_products.product_status=1";
        
        //echo "query".$sql;
        $result = $this->db->mod_select($sql);
        /*foreach ($result as $value){
            echo "</br>".$value->id_stock;
        }*/
        return $result;
    }

 
}

?>
