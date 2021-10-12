<?php

/**
 * Description of store_model
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class store_model extends C_Model {

    function __construct() {

        parent::__construct();
    }

    /**
     * Function insertStore
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertStore($dataset) {
        
        $data_insert = array(
            'store_code' => $dataset['storecode'],
            'store_name' => $dataset['storename'],
            'id_employee_registration' => $dataset['empno'],
            'id_physical_place' => $dataset['physical_place_name'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'store_status' => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_store", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteStore1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteStore1($id) {

        $data_delete = array(
            "store_status" => 0
        );
        $where = array(
            "id_store" => $id
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_store", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllStore
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
       function viewAllStore() {
        $query = "select 
            concat(tbl_employee.employee_first_name,
                        ' ',
                       tbl_employee.employee_last_name) as employee_first_name,
                       tbl_employee.id_employee_registration,
                                tbl_store.id_store,
				tbl_store.store_code, 
				tbl_store.store_name
		
        from
            tbl_employee
		inner join tbl_store on tbl_employee.id_employee_registration=tbl_store.id_employee_registration
        where  tbl_employee.id_employee_registration=tbl_store.id_employee_registration and tbl_store.store_status=1";
        $query_result = $this->db->query($query);
        $result = $query_result->result();
        return $result;
    }

    /**
     * Function updateStore
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
        function updateStore($dataset) {

        $id = $dataset['sid'];
        $data_set = array(
            "store_code" => $dataset['scode'],
            "store_name" => $dataset['sname'],
            "id_employee_registration" => $dataset['empno2']
        );
        $where = array(
            "id_store" => $id
        );
        $this->db->__beginTransaction();
        $ckeck = $this->db->update("tbl_store", $data_set, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
	
	    function getEmployeNamesbyStores($q,$select){
        $sql="select id_employee,concat(employee_first_name,' ', employee_last_name) as employee_first_name,id_employee_registration  from tbl_employee where employee_status='1' and employee_first_name like '$q%'";
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

}

?>
