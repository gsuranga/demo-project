<?php

/**
 * Description of user_model
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
class user_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertUser
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function insertUser($data_array) {
        $this->load->library('encrypt');
        $details = array(
            "id_employee_registration" => $data_array['employee_id'],
            "id_user_type" => $data_array['user_type_id'],
            "user_username" => $data_array['username'],
            "user_password" => $this->encrypt->encode($data_array['confirm_user_password']),
            "user_token" => '',
            "user_active" => "1",
            "user_status" => "1",
            "user_added_date" => date('Y:m:d'),
            "user_added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insert("tbl_user", $details);
        $lastRow = $this->getLastRow();
        $set = array(
            'user_token' => md5($lastRow)
        );
        
        $where = array(
            'id_user' => $lastRow
        );
        
        $this->db->update('tbl_user', $set, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function create_token
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function create_token($username, $password) {
        $token = md5(date('H:i:s') . date('Y:m:d') . rand(0, 100000) . $username . $password);
        return $token;
    }

    /**
     * Function viewAllUsers
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function viewAllUsers($id = '') {
        $query = '';
        if ($id != '') {
            
            $query = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) AS fullname
                , tbl_user.user_username ,tbl_user.id_employee_registration, 
            tbl_user_type.user_type FROM tbl_employee tbl_employee INNER JOIN tbl_user tbl_user
            NATURAL JOIN tbl_user_type tbl_user_type WHERE tbl_user.user_status='1' 
            AND tbl_user.user_active='1' AND tbl_employee.id_employee_registration = tbl_user.id_employee_registration
            AND tbl_user.id_user='$id'";
        } else {
            
            $query = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) AS fullname, tbl_user.user_username ,tbl_user.id_employee_registration, 
            tbl_user_type.user_type FROM tbl_employee tbl_employee INNER JOIN tbl_user tbl_user
            NATURAL JOIN tbl_user_type tbl_user_type WHERE tbl_user.user_status='1' 
            AND tbl_user.user_active='1' AND tbl_employee.id_employee_registration = tbl_user.id_employee_registration";
        }

        $excute = $this->db->query($query);
        $result = $excute->result();
        return $result;
    }

    /**
     * Function viewAllUsersDetails
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function viewAllUsersDetails() {
        $query = "SELECT tbl_employee.employee_first_name,tbl_employee.employee_last_name, tbl_user.user_username,tbl_user.id_employee_registration, 
            tbl_user.user_active , tbl_user.id_user, tbl_user_type.user_type FROM 
            tbl_employee tbl_employee INNER JOIN tbl_user tbl_user
            INNER JOIN tbl_user_type tbl_user_type WHERE tbl_user.user_status='1' 
            AND tbl_user.id_employee_registration = tbl_employee.id_employee_registration 
            AND tbl_user_type.id_user_type = tbl_user.id_user_type";
            
        $excute = $this->db->query($query);
        $result = $excute->result();
        return $result;
    }

    /**
     * Function manageUser
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function manageUser($data, $type, $table) {
        $this->load->library('encrypt');
        if ($type == "UPDATE") {
            $details = array("id_user_type" => $data['manage_user_type_id'],
                "user_username" => $data['manage_username'],
                "user_password" => $this->encrypt->encode($data['manage_confirm_user_password'])
            );

            $where = array(
                "id_user" => $data['manage_user_type_idd']
            );

            $this->db->__beginTransaction();
            $this->db->update($table, $details, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        } else {

            $details = array("user_type_status" => "0"
            );

            $where = array(
                "id_user_type" => $data
            );

            $this->db->__beginTransaction();
            $this->db->update($table, $details, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    /**
     * Function changeUserStatus
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function changeUserStatus($data, $table_name) {
        $status = '';

        if ($data['type'] == "Disable") {
            $status = "0";
        } else {
            $status = "1";
        }

        $details = array("user_active" => $status);

        $where = array(
            "id_user" => $data['id']
        );

        $this->db->__beginTransaction();
        $this->db->update($table_name, $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteUser
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function deleteUser($data, $table_name) {
        $details = array("user_status" => '0');
        $where = array(
            "id_user" => $data['id']
        );

        $this->db->__beginTransaction();
        $this->db->update($table_name, $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function changeUserPassword
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function changeUserPassword($type = 'GETPASSWORD', $user_id = '') {
        $this->load->library('encrypt');
        if ($type == 'GETPASSWORD') {
            $query = "SELECT user_password FROM tbl_user WHERE id_user=$user_id";
            $query_result = $this->db->query($query);
            $result = $query_result->result();
            $user_password = '';
            foreach ($result as $value) {
                $user_password = $value->user_password;
            }
            return $user_password;
        } else {

            $details = array("user_password" => $this->encrypt->encode($this->input->post('confirm_password')));
            $where = array(
                "id_user" => $user_id
            );
            // print_r($details);
            $this->db->__beginTransaction();
            $this->db->update('tbl_user', $details, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }
    
    public function checkUserisValidByToken($token){
        $column = array('utoken'=>$token);
        $sql = "SELECT user_token FROM `tbl_user` WHERE user_token=:utoken LIMIT 1" ;
           $result  = $this->db->mod_select($sql,$column, $fetchMode = PDO::FETCH_ASSOC);
        
        if(count($result)>0){
            return TRUE;
        }  else {
            return FALSE;    
        }
               
   }
   
   public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

 public function check_employee_registration($q) {

      
       if(isset ($q['id_employee_registration'])&& $q['id_employee_registration'] != ""){
           $emp_id=$q['id_employee_registration'];
           $cname="id_employee_registration";
           $append="and id_employee_registration='$emp_id'";
       }
       if(isset ($q['user_username'])&& $q['user_username'] != ""){
           $user_username=$q['user_username'];
           $cname="user_username";
           $append="and user_username='$user_username'";
       }
        
       $sql = "select {$cname} from tbl_user where user_status='1' {$append}";
//        echo $_REQUEST['item_no'];
        $result = $this->db->mod_select($sql);

        return $result;
    }
    function getEmployeNames($q,$select){
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
