<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Iresha Lakmali
 */
class login_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLoginDetail($user_name, $password) {
        $column = array('username' => $user_name, 'status' => '1');
        $sql = "select tu.id,tu.username,tu.name,tu.password,tu.typeid,ty.typename from tbl_user tu INNER JOIN tbl_usertype ty ON tu.typeid = ty.typeid where tu.username=:username AND tu.status=:status";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getemployee($id) {
        $column = array('id' => $id);
        $sql = "SELECT employee_id FROM tbl_user WHERE id=" . $id . " and status = 1";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }
    
    public function getsalesoffid($q){
        $sql = "SELECT t.sales_officer_id FROM dimo_lanka_web.tbl_sales_officer t where t.sales_officer_name like '%$q%' and t.status=1 limit 1";
        return $this->db->mod_select($sql);
    }

}
