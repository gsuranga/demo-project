<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of excelReader
 *
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class excelreader_model extends C_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    public function insertToDB($data) {
        $query = 'INSERT INTO temp_excel_imp1 (`' . implode('`,`', array_keys($data[0])) . '`) VALUES ';
        // $pack = array_fill(0, count($data), "(?,?,?,?,?,?,?,?)");
        $pack = array();
        foreach ($data as $value) {
            $valLine = "('" . $value['Doc date'] . "','" . $value['Source'] . "','" . $value['Account'] . "','" . $value['Type'] . "','" . $value['Reference'] . "','" . $value['Narrative'] . "'," . $value['Debit'] . "," . $value['Credit'] . ")";
            array_push($pack, $valLine);
        }
        $query .= implode(",", $pack);
        // print_r($query);
        return $this->db->query($query);
    }

}
