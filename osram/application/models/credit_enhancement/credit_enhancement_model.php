<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of credit_enhancement_model
 *
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class credit_enhancement_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDistributor($dis_id) {
        $bind = array('dis_id' => $dis_id);
        $query = 'SELECT 
    concat(employee_first_name," ",employee_last_name) as name 
FROM
    tbl_employee te
        inner join
    tbl_user tu ON te.id_employee_registration = tu.id_employee_registration
where
    id_employee_type = 2 and id_user=:dis_id';
        return $result = $this->db->mod_select($query, $bind, PDO::FETCH_ASSOC);
    }
    
    public function getPaymentSummery(){
        $query = 'SELECT * FROM temp_excel_imp1 order by doc_date desc limit 12';
        return $result = $this->db->mod_select($query);
    }

}
