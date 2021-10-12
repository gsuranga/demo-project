<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permission_type_model
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * @date Oct 14, 2013
 */
class permission_type_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertPermissionType
     *
     * insert Permission Type Data
     *
     * @param datapack and permission type icon id
     * @return data about Permission Type
     */
    function insertPermissionType($datapack, $full_file_name) {

        $data = array(
            "permission_type" => $datapack['permission_type'],
            "permission_type_icon" => $full_file_name,
            "permission_type_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_permission_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deletePermissionType
     *
     * delete Permission Type
     *
     * @param id of Permission Type
     * 
     */
    function deletePermissionType($id) {


        $data = array(
            "permission_type_status" => 0
        );
        $where = array(
            "id_permission_type	" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_permission_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function update updatePermissionType Type
     *
     * update Permission Type
     *
     * @param data and permission type icon
     * @return data about Permission Type
     */
    function updatePermissionType($data, $full_file_name) {

        if ($full_file_name != '') {
            echo 'sdfsf';
            $id = $data['id_permission_type'];

            $data = array(
                "permission_type" => $data['mng_permission_type'],
                "permission_type_icon" => $full_file_name
            );
            $where = array(
                "id_permission_type" => $id
            );
            $this->db->__beginTransaction();
            $this->db->update("tbl_permission_type", $data, $where);
        } else {
            echo 'sdsdsdsddsds';
            $id = $data['id_permission_type'];

            $data = array(
                "permission_type" => $data['mng_permission_type']
            );
            $where = array(
                "id_permission_type" => $id,
                "permission_type_icon" => $_POST['image_token']
            );
            $this->db->__beginTransaction();
            $this->db->update("tbl_permission_type", $data, $where);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
