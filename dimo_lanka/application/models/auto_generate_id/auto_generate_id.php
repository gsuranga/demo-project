<?php

/**
 *
 * @author SHdinesh Madushanka
 */
class auto_generate_id extends C_Model {

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
        $stringValue = substr($id, $index - 1);
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

        $sql = "SELECT * FROM " . $table . " ORDER BY purchase_order_number DESC LIMIT 1";
        $mod_select = $this->db->mod_select($sql);
        $purchase_order_number = $mod_select[0]->purchase_order_number;
        return $purchase_order_number;
    }

    public function generateNextDBIDOnEmptyResultSet($prefix) {
        $newID = $prefix . "000001";
        return $newID;
    }

    public function generateID($id, $prefix) {
        $purchase_order_id = "";
        $value = '';
        $id_length = strlen($id);
        if ($id_length < 5) {
            $zero_fill = 5 - $id_length;
            for ($i = 0; $i < $zero_fill; $i++) {
                $value = "0" . $value;
            }
            $purchase_order_id = $prefix . $value . $id;
            return $purchase_order_id;
        } else {
            $purchase_order_id = $prefix . $id;
            return $purchase_order_id;
        }
    }

}

?>