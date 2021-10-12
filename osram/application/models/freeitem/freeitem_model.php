<?php

/**
 * Description of freeitem_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class freeitem_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertFreeitem1($datapack) {
        //$date = new DateTime();
//id_assort_free, assort_qty, added_date, added_time, added_timestamp, assort_free_status, assort_free_code
        //id_assort_item, id_assort_free, iditem, added_date, added_time, added_timestamp
        //id_assort_item_issue, id_assort_free, id_item, qty, added_date, added_time, added_timestamp
        $data1 = array(
            "assort_qty" => $datapack['qty1'],
            "assort_free_code" => '1',
            "assort_free_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );


        $this->db->__beginTransaction();
        $this->db->insertData("tbl_assort_free", $data1);
        $id_assort_free = $this->db->insertId();
        $tbl_1_count = $datapack['tbl_1_count'];
        for ($i = 1; $i <= $tbl_1_count; $i++) {
          //  print_r($i);
            $data2 = array(
                "id_assort_free" => $id_assort_free,
                "iditem" => $datapack['item_id1_' . $i],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_assort_item", $data2);
        }

        $tbl_2_count = $datapack['tbl_2_count'];
        for ($x = 1; $x <= $tbl_2_count; $x++) {
            $data3 = array(
                "id_assort_free" => $id_assort_free,
                "id_item" => $datapack['item_id2_' . $x],
                "qty" => $datapack['qty2_' . $x],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_assort_item_issue", $data3);
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateDivisionType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivisionType1($data) {
        $id = $data['division_type_id'];
        $data = array(
            "tbl_division_type_name" => $data['division_type']
        );
        $where = array(
            "id_division_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteDivisionType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDivisionType1($id1) {
        $id = $id1;
        $data1 = array(
            "division_status" => 0
        );
        $where = array(
            "id_division_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division_type", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewFreeItem1() {
        $data = array();
        $query = "SELECT taf.id_assort_free,taf.assort_qty,taf.added_date,taf.added_time,taf.assort_free_code FROM tbl_assort_free taf where taf.assort_free_status=1";
        $AllData = array();
        $tbl_assort_free_data = $this->db->mod_select($query, $data, PDO::FETCH_ASSOC);
        array_push($AllData, $tbl_assort_free_data);
        $item_data_Array = array();
        $tbl_assort_item_data = array();
        foreach ($tbl_assort_free_data as $value1) {
            $data1 = array();
            $idd = $value1['id_assort_free'];
            $query1 = "SELECT t.id_assort_free,t.iditem,(select item_name from tbl_item where id_item=t.iditem ) as item_name FROM tbl_assort_item t where t.id_assort_free=$idd";

            $tbl_assort_item_data = $this->db->mod_select($query1, $data1, PDO::FETCH_ASSOC);
            $item_data_Array[$idd] = $tbl_assort_item_data;

            $data2 = array();
            $query2 = "select tai.id_assort_free,tai.id_item,(select item_name from tbl_item where id_item=tai.id_item ) as item_name,tai.qty
 from tbl_assort_item_issue tai where tai.id_assort_free=$idd";

            $tbl_assort_item_issue_data = $this->db->mod_select($query2, $data2, PDO::FETCH_ASSOC);
            $tbl_assort_item_data[$idd] = $tbl_assort_item_issue_data;
        }
        array_push($AllData, $item_data_Array);
        foreach ($tbl_assort_free_data as $value1) {
            $data2 = array();
            $idd = $value1['id_assort_free'];
            $query2 = "select tai.id_assort_free,tai.id_item,(select item_name from tbl_item where id_item=tai.id_item ) as item_name,tai.qty
 from tbl_assort_item_issue tai where tai.id_assort_free=$idd";

            $tbl_assort_item_issue_data = $this->db->mod_select($query2, $data2, PDO::FETCH_ASSOC);
            $tbl_assort_item_data[$idd] = $tbl_assort_item_issue_data;
        }
        array_push($AllData, $tbl_assort_item_data);


        return $AllData;
    }

    public function getItem1($q, $select) {
        $sql = "SELECT t.id_item,t.item_name FROM tbl_item t WHERE t.item_status=1 AND t.item_name LIKE '$q%' GROUP BY t.id_item";

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
   /**
     * Function deleteEmployee1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteFreeItem1($id1) {
        $id = $id1;
        $data1 = array(
            "assort_free_status" => 0
        );
        $where = array(
            "id_assort_free" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_assort_free", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
}

?>
