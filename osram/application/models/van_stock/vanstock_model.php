<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vanstock_model
 *
 * @author shamil
 */
class vanstock_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

      function insertvanstock($datapack) {
      $status=0;
        $data1 = array(
            "id_van" => $datapack['id_vehicleno'],
            "added_date" => $datapack['order_date'],
            'added_time' => date('H:i:s'),
            "status" => 1
        );

        $this->db->trans_start();
        $this->db->insertData("tbl_van_store", $data1);

        $id_van_Store = $this->db->insert_id();

        $count = $datapack['tbl_count'];
  
        for ($i = 0; $i <=$count;$i++) {
         
            if (isset($datapack['item_name_' . $i])) {

                $data2 = array(
                    "id_van_store" => $id_van_Store,
                    "Id_product" => $datapack['hidn_token_' . $i],
                    "van_stock_qty" => $datapack['supply_qty_' . $i],
                    "added_date" => $datapack['order_date'],
                    'added_time' => date('H:i:s'),
                    "status" => 1
                );
                $this->db->insertData("tbl_van_stock", $data2);

                $this->db->trans_complete();
                $status = $this->db->status();

                if ($status == 1) {                   
                   
                    
                    $emphasPH_ID = $datapack['emphasPH_ID'];
                    $id_product= $datapack['hidn_token_'.$i];
                    $new_qty=$datapack['mnes_qty_'.$i];

                    $sql = "SELECT id_stock,id_products FROM tbl_stock WHERE id_store=(SELECT tbl_store.id_store  FROM tbl_store tbl_store INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place WHERE tbl_store.id_physical_place=(SELECT id_physical_place FROM tbl_employee_has_place WHERE id_employee_has_place='$emphasPH_ID' GROUP BY id_physical_place)  GROUP BY tbl_employee_has_place.id_physical_place) AND id_products='$id_product' LIMIT 1";
                    $result = $this->db->mod_select($sql);
                    
                  
                    
                    $id_stock = $result[0]->id_stock;
                    $id_products = $result[0]->id_products;

                    $where = array(
                        "id_products" => $id_products,
                        "id_stock" => $id_stock
                    );

                   
                    $details = array(
                        "qty" => $new_qty
                    );

                

                    $this->db->__beginTransaction();
                    $this->db->update('tbl_stock', $details, $where);
                    $this->db->__endTransaction();
                }



              
            }
        }
 return $status;

}
    
     function insertvan($datapack) {

 
        $data1 = array(
            "van_number" => $datapack['vehicle_no'],
            "id_employee_has_place" => $datapack['id_emphas'],
            "added_date" =>$datapack['order_date'],
            'added_time' => $datapack['order_time'],
            "status" => 1
        );
        

        $this->db->trans_start();
        $this->db->insertData("tbl_van", $data1);

        $this->db->trans_complete();
        return $this->db->status();
    }

    
    public function getProducts($q, $select) {
       
        $sql = "SELECT tbl_stock.id_products,tbl_item.item_name ,tbl_stock.qty  FROM tbl_stock tbl_stock INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_stock.id_products INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_stock.stock_status='1' AND tbl_item.item_name LIKE '$q%'";

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

    public function getVehicleNO($q, $select) {
        $id_employee = $this->session->userdata('id_employee_has_place');
        //chnge d query
        $sql = "SELECT * FROM tbl_van WHERE id_employee_has_place=$id_employee AND van_number LIKE '$q%'";

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
    
        public function getVehicleNO1($q, $select) {
        $id_employee = $this->session->userdata('id_employee_has_place');
        //chnge d query
        $sql = "SELECT * FROM tbl_van WHERE id_employee_has_place=$id_employee AND van_number LIKE '$q%'";

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


    public function getQty($column) {
        $sql = "SELECT tbl_products.product_price,tbl_stock.id_products,tbl_item.item_name ,tbl_stock.qty  FROM tbl_stock tbl_stock INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_stock.id_products INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_stock.stock_status='1' AND tbl_stock.id_products=:id_products";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getEmployeNames($q, $select) {
        $sql = "SELECT tbl_employee.id_employee,tbl_employee_type.employee_type, CONCAT(tbl_employee.employee_first_name,' ' ,tbl_employee.employee_last_name) as employee_first_name,
            tbl_employee_has_place.id_employee_has_place FROM tbl_employee tbl_employee
            INNER JOIN tbl_employee_has_place tbl_employee_has_place JOIN tbl_employee_type tbl_employee_type on tbl_employee.id_employee_type=tbl_employee_type.id_employee_type
            WHERE 
            tbl_employee.id_employee = tbl_employee_has_place.id_employee AND 
            tbl_employee_has_place.employee_has_place_status='1' 
            AND
            tbl_employee_type.employee_type='Sales Rep'AND tbl_employee.employee_first_name LIKE '$q%'";

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
    
    public function getEmployeNames1($q, $select) {
         $employee_name = $this->session->userdata('id_employee_has_place');
         
        $sql = "SELECT tbl_employee.id_employee,tbl_employee_type.employee_type, CONCAT(tbl_employee.employee_first_name,' ' ,tbl_employee.employee_last_name) as employee_first_name,
            tbl_employee_has_place.id_employee_has_place FROM tbl_employee tbl_employee
            INNER JOIN tbl_employee_has_place tbl_employee_has_place JOIN tbl_employee_type tbl_employee_type on tbl_employee.id_employee_type=tbl_employee_type.id_employee_type
            WHERE 
            tbl_employee.id_employee = tbl_employee_has_place.id_employee AND 
            tbl_employee_has_place.employee_has_place_status='1' 
            AND
            tbl_employee_type.employee_type='Sales Rep' AND tbl_employee.employee_first_name LIKE '$q%'";

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

    public function getAllVanStock() {

        $VanID = $_REQUEST['idvan_store'];

        $result = $this->db->mod_select("select 
    tbl_item.item_name,tbl_products.id_products, tbl_van_stock.id_van_store, tbl_van_stock.id_van_stock,
    tbl_products.product_price,
    tbl_van_stock.van_stock_qty,
	tbl_van_stock.added_date,
	(tbl_van_stock.van_stock_qty*tbl_products.product_price) as price
from
    tbl_van_stock,
    tbl_item,
    tbl_products
where
    tbl_van_stock.Id_product = tbl_products.id_products
        and tbl_products.iditem = tbl_item.id_item and tbl_van_stock.status='1' AND tbl_van_stock.id_van_store=$VanID");


        return $result;
    }

   public function getAllStore() {
        $append = '';
        if (isset($_REQUEST['name_vehicle']) && $_REQUEST['name_vehicle'] != null) {
            $name_vehicle = $_REQUEST['name_vehicle'];
            $append .= "and tv.id_van = '$name_vehicle'";
        }
        if ((isset($_REQUEST['start_date_sr']) && isset($_REQUEST['end_date_sr'])) && (($_REQUEST['start_date_sr'] != null) && $_REQUEST['end_date_sr'] != null)) {
            $str_date = $_REQUEST['start_date_sr'];
            $end_date = $_REQUEST['end_date_sr'];
            $append .= "and tvs.added_date between '$str_date' and '$end_date'";
        }



        $result = $this->db->mod_select($sql = "select tvs.added_date,tvs.added_time,tv.van_number,tvs.id_van_store,tvs.status from tbl_van_store tvs LEFT JOIN tbl_van tv on tvs.id_van=tv.id_van {$sql} WHERE tvs.status='1' {$append}");


        return $result;
    }




public function updateItem($details) {

        $where = array(
            "Id_product" => $details['Id_product'],
            "id_van_store" => $details['id_van_store']
        );


        $details = array(
            "van_stock_qty" => $details['van_stock_qty']
        );
       


        $this->db->__beginTransaction();
        $this->db->update('tbl_van_stock', $details, $where);
        $this->db->__endTransaction();
    }

    public function deleteItem($data) {

        $where = array(
            "Id_product" => $data['Id_product'],
            "id_van_store" => $data['id_van_Store']
        );

        $details = array(
            "status" => '0'
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_van_stock', $details, $where);
        $this->db->__endTransaction();
    }
    
    public function deleteItem1($data) {
        print_r($data);
        $where = array(
            //datbase aft dat function variable
            "id_van_store" => $data['id_van_Store']
        );

        $details = array(
            "status" => '0'
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_van_store', $details, $where);
        $this->db->__endTransaction();
    }

}

?>
