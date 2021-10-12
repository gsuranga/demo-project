<?php

/**
 *
 * @author SHdinesh Madushanka
 */
class auto_generate_id extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function generateNextID($prefix, $table) {
        $id = $this->getId($table);
        $index = 0;
        $intValue = 0;
        for ($i = sizeof($id) - 1; $i > 0; $i--) {

            $intValue = substr($id, $i - 1);

            if (!is_int($intValue)) {
                $index = $i + 1;
                break;
            }
        }
        $stringValue = substr($id, $index);
        $generatedID = "";
        if (strlen($stringValue) == 1) {
            $generatedID = $prefix . "00000" . $stringValue;
        } else if (strlen($stringValue) == 2) {
            $generatedID = $prefix . "0000" . $stringValue;
        } else if (strlen($stringValue) == 3) {
            $generatedID = $prefix . "000" . $stringValue;
        } else if (strlen($stringValue) == 4) {
            $generatedID = $prefix . "00" . $stringValue;
        } else if (strlen($stringValue) == 5) {
            $generatedID = $prefix . "0" . $stringValue;
        } else {
            $generatedID = $prefix . $stringValue;
        }
        return $generatedID;
    }

    public function getId($table) {
        //connection = DBConnection.getConnection();
        $sql = "SELECT * FROM " . $table . " ORDER BY 3 DESC LIMIT 1";
        $mod_select = $this->db->mod_select($sql);
        $purchase_order_number = $mod_select[0]->purchase_order_number;
        return $purchase_order_number;
//        ResultSet resultSet = DBHandler.getData(SQL);
//        resultSet.next();
//        String id = null;
//        id = resultSet.getString(1);
//        return id;
    }

    public function generateNextDBIDOnEmptyResultSet($prefix) {
        $newID = $prefix + "000001";
        return $newID;
    }

}

?>