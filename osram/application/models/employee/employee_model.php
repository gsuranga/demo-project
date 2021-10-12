<?php

/**
 * Description of employee_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class employee_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertEmployee($dataset) {
        $employeeID='';
        $empRegID='';
       // $date = new DateTime();
        $employee_registration = $this->get_Autogen_ID();
        $data1 = array(
            "employee_registration" => $employee_registration,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );


        $this->db->__beginTransaction();

        $this->db->insertData("tbl_employee_registration", $data1);
        $empRegID = $this->db->insertId();
        $data2 = array(
            "id_employee_type" => $dataset['employee_type'],
            "id_employee_registration" => $empRegID,
            "employee_first_name" => $dataset['firstname'],
            "employee_last_name" => $dataset['lastname'],
            "employee_nic" => $dataset['nic'],
            "employee_address" => $dataset['address'],
            "employee_mobile" => $dataset['mobile'],
            "employee_telephone" => $dataset['telno'],
            "employee_email" => $dataset['email'],
            "employee_gender" => $dataset['gender'],
            "employee_status" => 1,
            "employee_added_date" => date('Y:m:d'),
            "employee_added_time" => date('H:i:s')
        );
        $this->db->insertData("tbl_employee", $data2);
        $employeeID = $this->db->insertId();
        $this->db->__endTransaction();
        return $employeeID;
    }

    /**
     * Function get_Autogen_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_employee_registration) As id FROM tbl_employee_registration");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "CL0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "CL000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "CL00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "CL0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "CL" . $num_rows;
            }
        }
    }

    /**
     * Function employeeAssign1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function employeeAssign1($dataset) {
      //  $date = new DateTime();
        $this->db->__beginTransaction();

        $employeeID = $dataset['employee_id'];
        $count = $dataset['table_row_count1'];

        for ($i = 1; $i < ($count + 1); $i++) {

            $data2 = array(
                "id_physical_place" => $dataset['physicalplace_id_' . $i],
                "id_territory" => $dataset['territory_id_' . $i],
                "id_division" => $dataset['division_id_' . $i],
                "discount" => $dataset['discount' . $i],
                "id_employee" => $employeeID,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_employee_has_place", $data2);
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function getEmployeeFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getEmployeeFromID($dataset) {

        $datapack = array(
            'id_employee' => $dataset,
            'employee_status' => 1
        );
        $result = $this->db->mod_select("SELECT te.*,tey.employee_type as employee_type FROM tbl_employee te inner join tbl_employee_type tey
            WHERE `id_employee` =:id_employee  AND te.id_employee_type=tey.id_employee_type AND
            employee_status =:employee_status", $datapack, PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function getAllEmployeeMaping
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getAllEmployeeMaping($id) {

        $result = $this->db->mod_select("SELECT tep.discount as discount,tep.id_employee as id_employee,tep.id_employee_has_place as id_employee_has_place,(select division_name from tbl_division where id_division=tep.id_division ) as division_name,(select territory_name from tbl_territory where id_territory=tep.id_territory) as territory_name,(select physical_place_name from tbl_physical_place where id_physical_place=tep.id_physical_place) as physical_place_name,tm.id_employee as id_employee FROM tbl_employee tm inner join tbl_employee_has_place tep where tm.id_employee=tep.id_employee AND tm.id_employee=$id AND tep.employee_has_place_status=1");
        return $result;
    }

    /**
     * Function getAllEmployeeMapingFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getAllEmployeeMapingFromID($id) {

        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=tmp.id_division) as division_name,(select territory_name from tbl_territory where id_territory=tmp.id_territory) as territory_name,(select physical_place_name from tbl_physical_place where id_physical_place=tmp.id_physical_place) as physical_place_name,tmp.* FROM tbl_employee_has_place tmp inner join tbl_employee t where tmp.id_employee=t.id_employee AND tmp.id_employee_has_place=$id AND tmp.employee_has_place_status=1");
        return $result;
    }

    /**
     * Function updateEmployee1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployee1($data) {
        $employee_id = $data['employee_id'];
        
        $tbl_employee_has_place_data = $this->db->mod_select("select * from tbl_employee_has_place where id_employee='$employee_id'");
        $tbl_employee = $this->db->mod_select("select id_employee_registration from tbl_employee where id_employee='$employee_id'");
        $registationID = $tbl_employee[0]->id_employee_registration;
        
//        if ($tbl_employee_has_place_data != null) {
//            $data_tbl_employee_update = array(
//                "employee_status" => 0,
//            );
//            $where = array(
//                "id_employee" => $employee_id
//            );
//            $data_tbl_employee_has_place = array(
//                "employee_has_place_status" => 0,
//            );
//            $where2 = array(
//                "id_employee" => $employee_id
//            );
//
//           // $date = new DateTime();
//            $this->db->__beginTransaction();
//            $this->db->update("tbl_employee", $data_tbl_employee_update, $where);
//            $this->db->update("tbl_employee_has_place", $data_tbl_employee_has_place, $where2);
//            $data_tbl_employee = array(
//                "id_employee_type" => $data['employee_type'],
//                "id_employee_registration" => $registationID,
//                "employee_first_name" => $data['firstname'],
//                "employee_last_name" => $data['lastname'],
//                "employee_nic" => $data['nic'],
//                "employee_address" => $data['address'],
//                "employee_mobile" => $data['mobile'],
//                "employee_telephone" => $data['telno'],
//                "employee_email" => $data['email'],
//                "employee_gender" => $data['gender'],
//                "employee_status" => 1,
//                "employee_added_date" => date('Y:m:d'),
//                "employee_added_time" => date('H:i:s')
//            );
//            
//            $this->db->insertData("tbl_employee", $data_tbl_employee);
//            $employeeID2 = $this->db->insertId();
//            foreach ($tbl_employee_has_place_data as $dataset) {
//                $id_physical_place = $dataset->id_physical_place;
//                $id_territory = $dataset->id_territory;
//                $id_division = $dataset->id_division;
//                $data2 = array(
//                    "id_physical_place" => $id_physical_place,
//                    "id_territory" => $id_territory,
//                    "id_division" => $id_division,
//                    "id_employee" => $employeeID2,
//                    "employee_has_place_status" => 1,
//                    "added_date" => date('Y:m:d'),
//                    "added_time" => date('H:i:s')
//                );
//                $this->db->insertData("tbl_employee_has_place", $data2);
//                $this->db->__endTransaction();
//            }
//        }  else {
            $where = array(
                "id_employee" => $employee_id
            );
            
            $data_tbl_employee = array(
                "id_employee_type" => $data['employee_type'],
                "id_employee_registration" => $registationID,
                "employee_first_name" => $data['firstname'],
                "employee_last_name" => $data['lastname'],
                "employee_nic" => $data['nic'],
                "employee_address" => $data['address'],
                "employee_mobile" => $data['mobile'],
                "employee_telephone" => $data['telno'],
                "employee_email" => $data['email'],
                "employee_gender" => $data['gender'],
                "employee_status" => 1,
                "employee_added_date" => date('Y:m:d'),
                "employee_added_time" => date('H:i:s')
            );
            $this->db->update("tbl_employee", $data_tbl_employee, $where);
//        }
        return $this->db->status();
    }
    
    
    
    public function getEmp($employee_id){
        $sql = "select * from tbl_employee where id_employee='$employee_id'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    /**
     * Function deleteEmployee1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployee1($id1) {
        $id = $id1;
        $data1 = array(
            "employee_status" => 0
        );
        $where = array(
            "id_employee" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteEmployeeMap1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployeeMap1($id1) {
        $id = $id1;
        $data1 = array(
            "employee_has_place_status" => 0
        );
        $where = array(
            "id_employee_has_place" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_has_place", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateEmployeeMap1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployeeMap1($data) {
        $id_employee_has_place = $data['id_employee_has_place'];
        $id_employee = $data['id_employee'];
        $division_id1 = $data['division_id1'];
        $territory_id1 = $data['territory_id1'];
        $physicalplace_id1 = $data['physicalplace_id1'];
        $discount= $data['discount'];

        $data = array(
            "id_employee" => $id_employee,
            "id_division" => $division_id1,
            "id_physical_place" => $physicalplace_id1,
            "id_territory" => $territory_id1,
            "discount" => $discount
        );
        $where = array(
            "id_employee_has_place" => $id_employee_has_place
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_employee_has_place", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

        function viewEmployeeByFilterKey($data) {
        //print_r($data);
//        $emp_name = $data['emp_name'];
//        $emp_id=$data['id_empl'];
        $nic = $data['nic'];
        $mobile = $data['mobile'];
        $tel = $data['tel'];
        $email = $data['email'];
        $status_name = $data['status_name'];
        $gender = $data['gender'];
        $employee_type = $data['employee_type'];
        //$emp_id="";
        $set_id="";

        if (isset($data['employee_type']) && $data['employee_type'] != "") {

            if ($data['employee_type'] != "All") {
                $apped = "AND `id_employee_type` LIKE '%$employee_type%'";
            }else{
                $apped = "";  
            }
        }
        
         if (isset($_POST['id_empl']) && $_POST['id_empl'] != '') {

            $emp_id = $data['id_empl'];
            $set_id = "and tbl_employee.id_employee = '$emp_id'";
           
        }

//        print_r($apped);

      $query = "SELECT `id_employee`,`id_employee_registration`,`id_employee_type`,
`employee_first_name`,`employee_last_name`,`employee_nic`,`employee_address`,
`employee_mobile`,`employee_telephone`,`employee_email`,`employee_gender`,`employee_status`,`employee_added_date`,`employee_added_time` 
FROM `tbl_employee` WHERE `employee_nic` LIKE '%$nic%' AND `employee_mobile` LIKE '%$mobile%' AND `employee_telephone` LIKE '%$tel%' 
AND `employee_email` LIKE '%$email%' AND `employee_gender` LIKE '$gender%' AND `employee_status` LIKE '%$status_name%' {$apped}{$set_id}";

        //echo $query;
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function getTerritoryDetails
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getEmployeeDetails($id) {

        $result = $this->db->mod_select("SELECT (select employee_type from tbl_employee_type where id_employee_type=tm.id_employee_type) as employee_type,tm.* FROM tbl_employee tm where id_employee=$id AND employee_status=1;");
        return $result;
    }

}

?>
