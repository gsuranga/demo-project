<?php

/**
 * Description of employee_type_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class employee_type_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertEmployeeType($datapack) {
        //$date = new DateTime();

        $data = array(
            "employee_type" => "$datapack",
            "employee_type_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_employee_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateEmployeeType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployeeType1($data) {
        $id = $data['employee_type_id'];
        $data = array(
            "employee_type" => $data['employee_type1']
        );
        $where = array(
            "id_employee_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteEmployeeType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployeeType1($id1) {
        $id = $id1;
        $data1 = array(
            "employee_type_status" => 0
        );
        $where = array(
            "id_employee_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_type", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewEmployeeTypeByFilterKey($data) {
        $emptype = $data['emptype'];
        $Emp_type_status = $data['status_name'];
        $query = "SELECT `id_employee_type`,`employee_type`,`employee_type_status`,`added_date`,`added_time` FROM `tbl_employee_type` WHERE `employee_type` LIKE '%$emptype%' AND `employee_type_status` LIKE '%$Emp_type_status%' ";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }

 
function get_employee_type($q){
        $get_employee_type=$q['employee_type'];
        $sql="select employee_type from tbl_employee_type where employee_type='$get_employee_type' and employee_type_status='1'";
        $result=$this->db->mod_select($sql);
        return $result;
    } }

?>
