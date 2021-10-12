<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Model
 *
 * @author chathun
 */
class C_Model extends CI_Model {

    //put your code here

    /*
     * parameters
     *  table name -: table name
     *  whare -: data from whare
     *  Q -: %like parameter 
     *  select -: array of coloumn names 
     *   Importent :- create select array 
     *   first value auto assing to lable 
     */
    function autoCompleteSingleTable($tableName, $whare, $q, $select) {

        $tableColumnName = implode(',', $select);
        $this->db->select($tableColumnName);
        $this->db->like($whare, $q);
        $query = $this->db->get($tableName);
        $result = $query->result('array');

        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            if (count($select) > 2) {
                $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . ' ' . $row[$select[1]]));
            } else {
                $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            }

            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    /*
     * table -: table name
     * from and to :- between parameters
     * data -: select table data default return all data
     * limit -: data Limit 
     * return Type -: RESULTSET or ROWCOUNT (result count or result )
     * where whare array (Multi dimention array )
     * between :- between coloumn name 
     */

    function fetchFromAnyTable($table = null, $from = null, $to = null, $data = array(), $limit = 10000, $start = 0, $returnType = "RESULTSET", $where = null, $between = null, $orderBy = null) {

        if ($data == null) {
            $data = array("*");
        }
        $tableColumnName = implode(',', $data);
        $query = "";
        $whereString = "";

        $count = 0;
        foreach ($where as $key => $data) {

            if (count($where) > 0) {

                if ($count == 0) {
                    $whereString.="`$key` = '$data' ";
                } else {

                    $whereString.="AND `$key` = '$data'";
                }
            }
            $count++;
        }

        $orderByUnit = '';
        if ($orderBy != null) {
            if (count($orderBy) > 0)
                $orderByUnit = 'ORDER BY';
            foreach ($orderBy as $data) {


                if (count($orderBy) > 0) {

                    if ($count == 0) {
                        $orderByUnit.=" '$data' ";
                    } else {
                        $orderByUnit.="AND '$data'";
                    }
                }
            }
        }

        if ($returnType == "RESULTSET") {
            $query = "
             SELECT $tableColumnName FROM $table
             WHERE  $whereString AND IF((:from !='' AND :to !='' AND :between !=''), :between BETWEEN :from AND :to ,1) $orderByUnit LIMIT %d , %d ";
        } else if ($returnType == "ROWCOUNT") {
            $query = "
             SELECT COUNT('id_employee_type') AS count FROM  $table
             WHERE $whereString 
             AND IF((:from !='' AND :to !='' AND :between !=''), :between BETWEEN :from AND :to ,1)  $orderBy LIMIT %d , %d ";
        }
        // echo $query;
        $sql = sprintf($query, $start, $limit);

        $data = array(
            'between' => $between,
            'from' => $from,
            'to' => $to);

        return $this->db->mod_select($sql, $data, PDO::FETCH_ASSOC);
    }

}
?>
