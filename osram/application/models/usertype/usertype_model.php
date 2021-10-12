<?php

/**
 * Description of usertype_model
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
class usertype_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertUserType
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function insertUserType($data) {
        $details = array("user_type" => $data['user_type'],
            "user_type_status" => "1",
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insert("tbl_user_type", $details);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function manageUserType
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function manageUserType($data, $type, $table) {
        if ($type == "UPDATE") {
            $details = array("user_type" => $data['manage_usertype']
            );

            $where = array(
                "id_user_type" => $data['hidden_usertype_id']
            );

            $this->db->__beginTransaction();
            $this->db->update($table, $details, $where);
            $this->db->__endTransaction();
            return $this->db->trans_status();
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

 
 function get_user_type($q){
        $user_type=$q['user_type'];
        $sql="select user_type from tbl_user_type where user_type='$user_type' and user_type_status ='1'";
        $result=$this->db->mod_select($sql);
        return $result;
    }
}

?>
