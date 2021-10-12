<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class apk_view_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function setSession() {
        $query = "SELECT 
    *
FROM
    tbl_user tu
        inner join
    tbl_employee te ON tu.id_employee_registration = te.id_employee_registration
        inner join
    tbl_employee_has_place tehp ON tehp.id_employee = te.id_employee
        inner join
    tbl_user_type tut ON tut.id_user_type = tu.id_user_type
where
    user_token = '{$_REQUEST['token']}'";
        $result = $this->db->simple_query($query);
        foreach ($result as $value) {
            $userSessionData = array('id_user' => $value['id_user'], 'id_employee' => $value['id_employee'], 'employee_first_name' => $value['employee_first_name'], 'employee_last_name' => $value['employee_last_name'], 'id_user_type' => $value['id_user_type'], 'user_username' => $value['user_username'], 'user_token' => $value['user_token'], 'id_user_type' => $value['id_user_type'], 'user_type' => $value['user_type'], 'id_employee_registration' => $value['id_employee_registration'], 'id_physical_place' => $value['id_physical_place'], 'id_employee_has_place' => $value['id_employee_has_place'], 'logged_in' => TRUE);
            $this->session->set_userdata($userSessionData);
            $this->session->userdata('validated');
        }
        $this->session->set_userdata($result);
    }

    public function getOutletCats() {
        return $this->db->mod_select('SELECT id_outlet_category,outlet_category_name FROM tbl_outlet_category where outlet_category_status=1');
    }

    public function getOutletInfo() {
        return $this->db->mod_select("SELECT 
    o.id_outlet,
    o.outlet_name,
    o.id_outlet_category,
    b.branch_address,
    toc.outlet_category_name
FROM
    tbl_outlet o
        inner join
    tbl_outlet_has_branch b ON b.id_outlet = o.id_outlet
        and o.outlet_status = 1
        and b.outlet_has_branch_status = 1
        inner join
    tbl_outlet_category toc ON toc.id_outlet_category = o.id_outlet_category
where
    o.id_outlet = {$_REQUEST['id_olt']}");
    }

    public function update_olt() {
        $update = $this->db->update('tbl_outlet', array('id_outlet_category' => $_POST['newCat']), array('id_outlet' => $_POST['id_olt']));
    }

}
