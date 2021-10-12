<?php

/**
 * Description of production_model
 *
 * @author Ishaka & Achala
 * @contact -: isherandi9@gmail.com & acharajakaruna@gmail.com
 * 
 */
class production_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertProduction
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertProduction1($datapack) {
        
        
       // $date = new DateTime();
        $data1 = array(
            "id_batch" => $datapack['batch_no'],
            "id_division" => $datapack['division_name'],
            "production_date" => $datapack['date'],
            "production_time" => $datapack['time'],
            "production_code" => $datapack['production_no'],
            "production_remark" => $datapack['remark'],
            "production_status" => 1,
            "id_employee" => $datapack['employee_id'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
       
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_production", $data1);
        $lastInsertId = $this->db->insertId();
        $count = $datapack['id_hidden_row'];
        for ($x = 1; $x <= $count; $x++) {
            $data_pro_has_product = array(
                "id_production" => $lastInsertId,
                "product_qty" => $datapack["qty_" . $x],
                "product_price" => $datapack["up_" . $x],
                "product_cost" => $datapack["uc_" . $x],
                "product_exripe_date" => $datapack["exp_" . $x],
                "id_item" => $datapack["item_id_" . $x]
            );

            $this->db->insertData("tbl_production_has_products", $data_pro_has_product);
        }
        for ($x = 1; $x <= $count; $x++) {
            $data_product = array(
                "id_batch" => $datapack['batch_no'],
                "iditem" => $datapack["item_id_" . $x],
                "expiry_date" => $datapack["exp_" . $x],
                "product_price" => $datapack["up_" . $x],
                "product_cost" => $datapack["uc_" . $x],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_products", $data_product);
            $lastInsertIdProduct = $this->db->insertId();
            $data_stock = array(
                "id_store" => $datapack['store_name'],
                "id_products" => $lastInsertIdProduct,
                "qty" => $datapack["qty_" . $x],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
           
            $this->db->insertData("tbl_stock", $data_stock);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteProductionView1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteProductionView1($id1) {
        $id = $id1;

        $data = array(
            "production_status" => 0
        );
        $where = array(
            "id_production" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_production", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateOutlet
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateOutlet($data) {
        $id = $data['id_outlet'];
        $data = array(
            "id_outlet_category" => $data['outlet_category_name'],
            "outlet_name" => $data['outlet_name'],
            "outlet_code" => $data['outlet_code'],
            "outlet_address" => $data['outlet_address'],
            "outlet_telephone" => $data['outlet_telephone'],
            "outlet_mobile" => $data['outlet_mobile'],
            "outlet_contact_person" => $data['outlet_contact_person'],
            "outlet_contact_person_designation" => $data['outlet_contact_person_designation']
        );
        $where = array(
            "id_outlet" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllOutletCategory
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function viewAllOutletCategory() {
        $query = "SELECT tbl_outlet.id_outlet,tbl_outlet_category.outlet_category_name,tbl_outlet.outlet_name,
        tbl_outlet.outlet_code,tbl_outlet.outlet_address,tbl_outlet.outlet_mobile,
        tbl_outlet.outlet_telephone,tbl_outlet.outlet_contact_person,tbl_outlet.outlet_contact_person_designation,tbl_outlet.added_date,tbl_outlet.added_time FROM tbl_outlet tbl_outlet 
        INNER JOIN tbl_outlet_category tbl_outlet_category ON tbl_outlet.`id_outlet_category`=
        tbl_outlet_category.`id_outlet_category`
        
        WHERE tbl_outlet.outlet_status=0";

        $result_data = $this->db->query($query);
        $result = $result_data->result();
        return $result;
    }

    /**
     * Function viewAllProduction
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function viewAllProduction($batchid = null, $df = null) {

        $query = "SELECT tbl_production.production_code,
tbl_production.id_production,
tbl_production.production_date,
tbl_division.division_name,
tbl_batch.batch_no
FROM tbl_production INNER JOIN tbl_division ON tbl_division.id_division=tbl_production.id_division 
INNER JOIN tbl_batch ON tbl_batch.id_batch=tbl_production.id_batch WHERE tbl_production.id_batch Like '%$batchid%' 
AND tbl_production.id_division Like '%$df%'  AND tbl_production.production_status=1";



        $result = $this->db->mod_select($query);
        return $result;
    }

    /**
     * Function insertPermission
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateProduction($data) {
        $production_id = $data['production_id'];
        $data = array(
            "id_division" => $data['id_division'],
            "production_code" => $data['production_code'],
            "id_batch" => $data['id_batch']
        );
        $where = array(
            "id_production" => $production_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_production", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function insertPermission
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function viewAllItem($id) {

        $result = $this->db->mod_select("SELECT (select tbl_item_category_name from tbl_item_category where id_item_category=i.id_item_category) as tbl_item_category_name,i.item_no as item_no,i.item_account_code as item_account_code,i.item_name as item_name,i.item_alias as item_alias,i.added_date as added_date,php.*, i.item_status FROM tbl_production_has_products php inner join tbl_item i where i.id_item=php.id_item AND php.id_production=$id AND item_status=1");
        return $result;
    }

    /**
     * Function insertPermission
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function viewProductionDetails($id) {
        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=tp.id_division) as division_name,(select batch_no from tbl_batch where id_batch=tp.id_batch) as batch_no,tp.*, tp.production_status, tp.production_status, tp.production_status FROM tbl_production tp where production_status=1 AND tp.id_production=$id");
        return $result;
    }

    /**
     * Function insertPermission
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function viewProductionDetailsByID($id) {

        $result = $this->db->mod_select("SELECT (select employee_first_name from tbl_employee where id_employee=tp.id_employee) as employee_first_name,(select division_name from tbl_division where id_division=tp.id_division) as division_name,(select batch_no from tbl_batch where id_batch=tp.id_batch) as batch_no,tp.*, tp.production_status FROM tbl_production tp where production_status=1 AND tp.id_production=$id;");
        return $result;
    }

    ////////////get employee name for production registration////////////////
    
    
    function getEmployeNames($q, $column){
        
        $sql="select concat(employee_first_name,' ',employee_last_name) as employee_first_name ,id_employee from tbl_employee where employee_first_name like '$q%' ";
        $query = $this->db->query($sql);
         $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$column[0]]));
            foreach ($column as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
        
    }
    
    
    
    
}







?>
