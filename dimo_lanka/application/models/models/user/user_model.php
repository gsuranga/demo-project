<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author Iresha Lakmali
 */
class user_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserType() {
        $sql = "select * from tbl_usertype  WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function insertUser($user_data, $encode) {

        $username = '';
        
        if(isset($user_data['sales_officer_name']) && $user_data['sales_officer_name'] != ''){
            $username = $user_data['sales_officer_name'];
        }  else {
            $username = $user_data['user_name'];
        }
        
        $data = array(
            'name' => $username,
            'typeid' => $user_data['cmb_user_type'],
            'username' => $user_data['user_name'],
            'password' => $encode,
            'employee_id' => $user_data['sales_officer_id'],
            'status' => '1',
            'token_user_id' => NULL,
            'privilage' => '1',
            'date' => date('Y:m:d'),
            'time' => date('H:i:s')
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_user", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function updateUserId($lastRow, $token) {
        $where = array(
            'id' => $lastRow
        );

        $data = array(
            'token_user_id' => $token
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_user", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllUser() {
        $sql = "select * from tbl_user u INNER JOIN tbl_usertype t ON u.typeID=t.typeid where u.status='1'";
        return $this->db->mod_select($sql);
    }

    public function getUserDetail() {
        $query = '';

        if (isset($_POST['key']) && $_POST['key'] != '') {
            $id = $_POST['key'];
            $query = "AND u.id='$id'";
        }

        $sql = "select u.id,u.name,u.username,u.privilage,u.status,t.typename,t.typeid from tbl_user u INNER JOIN tbl_usertype t ON u.typeID=t.typeid where u.status='1' {$query}";
        return $this->db->mod_select($sql);
    }

    public function getUserName($q, $select) {
        $sql = "select u.id,u.name,u.username,u.privilage,u.status,t.typename,t.typeid from tbl_user u INNER JOIN tbl_usertype t ON u.typeID=t.typeid where u.status='1' AND  u.name LIKE '$q%'";
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

    public function getTypes($q, $select) {
        $sql = "SELECT typename,typeid FROM tbl_usertype WHERE typename LIKE '$q%'";
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

    public function getUsersbyTypes($q, $select, $usertype) {
        $sql = '';
        if ($usertype == "APM") {
            $sql = "SELECT (select apm_id) as employee_id,(select apm_name) as name FROM tbl_apm WHERE apm_name LIKE '$q%' AND status=1";
        } elseif ($usertype == "Dealer") {
            $sql = "SELECT (select delar_id) as employee_id,(select delar_name) as name FROM tbl_dealer WHERE delar_name LIKE '$q%' AND status=1";
           // echo $sql;
        } elseif ($usertype == "Sales Officer") {
            $sql = "SELECT (select sales_officer_id) as employee_id,(select sales_officer_name) as name FROM tbl_sales_officer WHERE sales_officer_name LIKE '$q%' AND status=1";
        }

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

    public function updateUser($data) {
        $details = array(
            'typeID' => $data['user_type_id'],
            'username' => $data['user_name'],
            'password' => $this->encrypt->encode($data['confirm_password'])
        );

        $where = array(
            'id' => $data['user_id']
        );
        //print_r($details);
        $this->db->__beginTransaction();
        $this->db->update('tbl_user', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getCurrentPassword($id) {
        $sql = "SELECT password FROM tbl_user WHERE id='$id'";
        return $this->db->mod_select($sql);
    }

    public function deleteUser($id) {
        $details = array("status" => '0');
        $where = array(
            "id" => $id
        );
        //print_r($details, $where);
        $this->db->__beginTransaction();
        $this->db->update('tbl_user', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
