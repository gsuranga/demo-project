<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author chathun
 */
class Login_model extends C_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    /**
     * Function get_User_From_User_Name
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_User_From_User_Name($userName, $status = 1) {
        $datapack = array(
            'user_username' => $userName,
            'employee_status' => $status,
            'user_status' => $status);
        $result = $this->db->mod_select("SELECT * FROM tbl_user tbl_user 
            INNER JOIN tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type INNER JOIN tbl_employee tbe  ON tbl_user.id_employee_registration=tbe.id_employee_registration INNER JOIN tbl_employee_has_place tbemplce ON tbemplce.id_employee = tbe.id_employee  
            WHERE `user_username` =:user_username  AND 
            `user_status` =:user_status AND tbe.`employee_status`=:employee_status", $datapack, PDO::FETCH_ASSOC);
        
        
        if(count($result) == 0){
            return $superAdmin = $this->getSuperAdmin($datapack);
        }  else {
            return $result;
        }
        
    }
    
    public function getSuperAdmin($datapack){
        $result = $this->db->mod_select("SELECT * FROM tbl_user_type 
            INNER JOIN tbl_user ON tbl_user_type.id_user_type = tbl_user.id_user_type 
            INNER JOIN tbl_employee ON tbl_employee.id_employee_registration = tbl_user.id_employee_registration 
            WHERE tbl_user.user_username=:user_username AND tbl_user.user_status=:user_status AND tbl_employee.employee_status=:employee_status", $datapack, PDO::FETCH_ASSOC);
        
        return $result;
    }
    
   

}

?>
