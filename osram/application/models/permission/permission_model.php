<?php

/**
 * Description of outlet
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * @date Oct 14, 2013
 */
class permission_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertPermission
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertPermission($datapack) {

        $data_permission = array(
            "permission_name" => $datapack['permission_name'],
            "id_permission_type" => $datapack['permission_type'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_permission", $data_permission);


        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deletePermission
     *
     * delete Permission
     *
     * @param id of Permission
     * 
     */
    function deletePermission($id) {


        $data = array(
            "permission_status" => 0
        );
        $where = array(
            "id_permission" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_permission", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updatePermission
     *
     * update Permission
     *
     * @param data
     * @return data about Permission
     */
    function updatePermission1($data) {
        $id = $data['id_permission'];
        print_r($id);
        $data = array(
            "id_permission_type" => $data['permission_type'],
            "permission_name" => $data['permission_name']
        );
        $where = array(
            "id_permission" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_permission", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllPemissionType
     *
     * view All Pemission Type Data
     *
     * 
     * @return data about Permission
     */
    function viewAllPemissionType() {
        $query = "SELECT tbl_permission.id_permission,tbl_permission_type.permission_type,tbl_permission.permission_name,
        tbl_permission.added_date,tbl_permission.added_time FROM tbl_permission tbl_permission 
        INNER JOIN tbl_permission_type tbl_permission_type ON tbl_permission.`id_permission_type`=
        tbl_permission_type.`id_permission_type`
        
        WHERE tbl_permission.permission_status=1";

        $result_data = $this->db->query($query);
        $result = $result_data->result();
        return $result;
    }

}

?>
