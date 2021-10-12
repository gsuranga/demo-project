<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class message_model extends C_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertMessage
     *
     * insert Data
     *
     * @param datapack
     * @return data about message
     */
    function insertMessage($datapack) {

        // print_r($datapack);
        $data = array();
        if ($datapack['employee_first_name'] != 0) {
            $data['id_employee_registration'] = $datapack['employee_first_name'];
        }
        if ($datapack['division_name'] != 0) {
            $data['id_division'] = $datapack['division_name'];
        }
        if ($datapack['territory_name'] != 0) {
            $data['id_territory'] = $datapack['territory_name'];
        }
        $data['message'] = $datapack['message'];
        $data['added_date'] = date('Y:m:d');
        $data['added_time'] = date('H:i:s');

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_message", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllMessage
     *
     * view All Message details
     *
     * 
     * @return data about message
     */
    function viewAllMessage() {
        $query = "SELECT 
        tbl_message.id_message,
        emp.id_employee_registration,
        emp.employee_first_name,
        tbl_division.id_division,
        tbl_division.division_name,
        tbl_territory.id_territory,
        tbl_territory.territory_name,
        tbl_message.message,
        tbl_message.added_date,
        tbl_message.added_time
        FROM tbl_message  
        LEFT JOIN (SELECT `id_employee`,`id_employee_registration`,`employee_first_name` FROM tbl_employee WHERE `employee_status`=1 ORDER BY `id_employee` DESC) emp ON emp.`id_employee_registration`= tbl_message.`id_employee_registration`
        LEFT JOIN tbl_division ON tbl_division.`id_division`=
        tbl_message.`id_division`
        LEFT JOIN tbl_territory ON tbl_territory.`id_territory`=
        tbl_message.`id_territory` 
        WHERE tbl_message.message_status=1 GROUP BY tbl_message.id_message";

        $result_data = $this->db->query($query);
        $result = $result_data->result();
        return $result;
        //print_r($result_data);
    }

    /**
     * Function deleteMessage
     *
     * delete Message details
     *
     * @param id of the message
     * 
     */
    function deleteMessage($id) {


        $data = array(
            "message_status" => 0
        );
        $where = array(
            "id_message" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_message", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateMessage
     *
     * update Message
     *
     * @param data
     * @return data about message
     */
    function updateMessage($data) {
        $id = $data['id_message'];
        $data = array(
            "id_division" => $data['division_name'],
            "id_territory" => $data['territory_name'],
            "id_employee_registration" => $data['id_employee_registration'],
            "message" => $data['message']
        );
        $where = array(
            "id_message" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_message", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function messageByID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function messageByID($id) {

        $result = $this->db->mod_select("select tm.id_employee_registration as id_employee_registration,(select employee_first_name from tbl_employee where id_employee_registration=tm.id_employee_registration AND employee_status=1) as employee_first_name,(select division_name from tbl_division where id_division=tm.id_division) as division_name,(select territory_name from tbl_territory where id_territory=tm.id_territory) as territory_name,tm.* from tbl_message tm where tm.id_message=$id AND tm.message_status=1;");
        return $result;
    }

}

?>
