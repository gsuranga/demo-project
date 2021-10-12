<?php

/**
 * Description of itemdiscount_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class itemdiscount_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertDiscount1($datapack) {
        //$date = new DateTime();
        $type = $datapack['discount_type'];


        $percentage_discount = 0.00;
        $price_discount = 0.00;
        if ($type == '1') {
            $percentage_discount = $datapack['discount'];
        } else if ($type == '2') {
            $price_discount = $datapack['discount'];
        }
        $data = array(
            "id_employee_has_place" => $datapack['id_employee_has_place'],
            "id_item" => $datapack['item_id'],
            "price_discount" => $price_discount,
            "percentage_discount" => $percentage_discount,
            "employee_item_discount_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_employee_item_discount", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getItem1($q, $select) {
        $sql = "SELECT t.id_item,t.item_name FROM tbl_item t WHERE t.item_status=1 AND t.item_name LIKE '$q%' GROUP BY t.id_item";

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

    public function getAllDiscount1() {
        $sql = "SELECT t.id_employee_item_discount,(select employee_first_name from tbl_employee where id_employee=tep.id_employee) as employee_first_name,
(select division_name from tbl_division where id_division=tep.id_division) as division_name,
(select territory_name from tbl_territory where id_territory=tep.id_territory) as territory_name,
(select physical_place_name from tbl_physical_place where id_physical_place=tep.id_physical_place) as physical_place_name,
(select item_name from tbl_item where id_item=t.id_item) as item_name,t.percentage_discount,t.price_discount
 FROM tbl_employee_item_discount t inner join tbl_employee_has_place tep ON t.id_employee_has_place=tep.id_employee_has_place WHERE employee_item_discount_status=1;
 ";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function getAllDiscountById1($id) {
        $sql = "SELECT t.id_employee_item_discount,
(select employee_first_name from tbl_employee where id_employee=tep.id_employee) as employee_first_name,tep.id_employee as id_employee,
(select division_name from tbl_division where id_division=tep.id_division) as division_name,tep.id_division as id_division,
(select territory_name from tbl_territory where id_territory=tep.id_territory) as territory_name,tep.id_territory as id_territory,
(select physical_place_name from tbl_physical_place where id_physical_place=tep.id_physical_place) as physical_place_name,tep.id_physical_place as id_physical_place,
(select item_name from tbl_item where id_item=t.id_item) as item_name,t.percentage_discount,t.price_discount,t.id_item,tep.id_employee_has_place as id_employee_has_place 
FROM tbl_employee_item_discount t
inner join tbl_employee_has_place tep ON t.id_employee_has_place=tep.id_employee_has_place
WHERE employee_item_discount_status=1 AND id_employee_item_discount=$id;
";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    /**
     * Function updateDiscount1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDiscount1($data) {
        $id_employee_item_discount = $data['id_employee_item_discount'];
        $type = $data['discount_type'];

        $percentage_discount = 0.00;
        $price_discount = 0.00;
        if ($type == '1') {
            $percentage_discount = $data['discount'];
        } else if ($type == '2') {
            $price_discount = $data['discount'];
        }

        $data = array(
            "id_employee_has_place" => $data['id_employee_has_place'],
            "id_item" => $data['item_id'],
            "price_discount" => $price_discount,
            "percentage_discount" => $percentage_discount,
        );
        $where = array(
            "id_employee_item_discount" => $id_employee_item_discount
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_item_discount", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
     /**
     * Function deleteDivisionType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDiscount1($id) {
        $data = array(
            "employee_item_discount_status" => 0
        );
        $where = array(
            "id_employee_item_discount" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_item_discount", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    public function getTerritory1($division_id, $id_employee) {
        $sql = "SELECT tmp.id_territory  as id_territory,(select territory_name from tbl_territory where id_territory=tmp.id_territory) as territory_name FROM tbl_employee_has_place tmp inner join tbl_territory tt ON tmp.id_territory=tt.id_territory where tmp.id_division=$division_id AND tmp.id_employee=$id_employee AND tt.territory_status=1 GROUP BY tmp.id_territory";
        $result = $this->db->mod_select($sql);
       
        return $result;
    }
}
?>
