<?php

header("Access-Control-Allow-Origin: *");

/* CREATED BY DINESH MADUSHANKA */

class item_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function load_e_cat_def($q, $select) {
        $sql = "select e_cat_def_id , e_cat_name from tbl_e_cat_def WHERE e_cat_name LIKE '$q%'";
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

    public function insertNewItem($data_array) {
        if (($data_array['item_part_no']) != null || ($data_array['item_part_no']) != "") {
            $item_data = array(
                "item_part_no" => $data_array['item_part_no'],
                "description" => $data_array['description'],
                "pg_category_from_tml" => $data_array['cmb_pg_category_tml'],
                "pg_category_local" => $data_array['cmb_pg_category_local'],
                "pricing_category" => $data_array['pricing_category'],
                "product_hiracy" => $data_array['product_hierachi'],
                "vehicle_segment" => $data_array['vehicle_segment'],
                "vehicle_model_local" => $data_array['vehicle_model'],
                "aggregate_tml" => $data_array['aggregate_tml'],
                "vehicle_model_tml" => $data_array['vehicle_model_tml'],
                "remark_tml" => $data_array['remarks_tml'],
                "aggregate_e_cat_def" => $data_array['e_cat_def'],
                "other_model" => $data_array['other_model'],
                "other_definition" => $data_array['other_definitions'],
                "product_definition" => $data_array['product_definitions'],
                "selling_price" => $data_array['selling_price'],
                "total_stock_qty" => $data_array['stock_qty'],
                "amd_vsd" => $data_array['amd_vsd'],
                "avg_monthly_demand" => $data_array['avg_monthly_demand'],
                "avg_cost" => $data_array['avg_cost'],
                "vat_percentage" => $data_array['vat_percentage'],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s'),
                "status" => 1
            );

            $this->db->__beginTransaction();
            $this->db->insertData("tbl_item", $item_data);
            $insert_id = $this->db->insert_id();
            echo $insert_id;

            $row_count = $data_array['txt_hidden_row_count'];

            if ($row_count > 0) {
                for ($i = 1; $i < $row_count + 1; $i++) {
                    $alternative_data = array(
                        "item_id" => $insert_id,
                        "alternative_part_desc" => $data_array['txt_desc_' . $i],
                        "alternative_part_no" => $data_array['txt_part_No_' . $i],
                        "added_date" => date("Y-m-d"),
                        "added_time" => date("H:i:s"),
                        "status" => 1
                    );

                    $this->db->insertData("tbl_alternative_part", $alternative_data);
                }
            }

            $this->db->__endTransaction();
            echo $this->db->status();
            return $this->db->status();
        }
    }

    public function viewAllPartNumbers() {
        $sql = "select item_id,item_part_no,description,pg_category_from_tml,pg_category_local,pricing_category,product_hiracy,vehicle_segment,aggregate_tml,aggregate_e_cat_def,total_stock_qty,amd_vsd,avg_monthly_demand,avg_cost,selling_price,vat_percentage from tbl_item where status = 1";
        return $this->db->mod_select($sql);
    }

    public function updateItem($dataArray) {

        $where = array(
            'item_id' => $dataArray['item_id']
        );


        $data = array(
            "item_part_no" => $dataArray['update_item_part_no'],
            "description" => $dataArray['update_description'],
            "pg_category_from_tml" => $dataArray['cmb_pg_category_tml'],
            "pg_category_local" => $dataArray['cmb_pg_category_local'],
            "pricing_category" => $dataArray['update_pricing_category'],
            "product_hiracy" => $dataArray['update_product_hierachi'],
            "vehicle_segment" => $dataArray['update_vehicle_segment'],
            "vehicle_model_local" => $dataArray['update_vehicle_model'],
            "aggregate_tml" => $dataArray['update_vehicle_model_tml'],
            "vehicle_model_tml" => $dataArray['update_vehicle_model_tml'],
            "remark_tml" => $dataArray['update_remarks_tml'],
            "aggregate_e_cat_def" => $dataArray['update_e_cat_def'],
            "other_model" => $dataArray['update_other_model'],
            "other_definition" => $dataArray['update_other_definitions'],
            "product_definition" => $dataArray['update_product_definitions']
        );
//print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_item", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deleteItem($dataArray) {
        $where = array(
            'item_id' => $dataArray['item_id']
        );

        $delete = array(
            'status' => '0'
        );
        print_r($where);
        $this->db->__beginTransaction();
        $this->db->update("tbl_item", $delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getPartProfile($part_id) {
        $sql = "select * from tbl_item where item_id = '" . $part_id['token_item_id'] . "'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getAlternativeParts($part_id) {
        $sql = "select * from tbl_alternative_part where item_id='" . $part_id['token_item_id'] . "'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function upload_vsd($_main_array) {
        //echo 'kkkkkkkkkkk';
        foreach ($_main_array AS $_val) {

            $part_num = $_val[0];
            $part_numb = str_replace(" ", "", $part_num);

            //$part_no = $_val[0];
            $part_no = $part_numb;
            $description = $_val[1];
            $tot_stock_qty = $_val[2];
            $amd_vsd = $_val[3];
            $avg_monthly_demands = $_val[4];
            $average_cost = $_val[5];
            //$selling_price = $_val[6] + ($_val[6] * $set / 100);
            $selling_price = $_val[6];
            $d = date('Y-m-d');
            $t = date("H:i:s");
            if ($part_no[0] == "T" | $part_no[0] == "V") {
                // echo $part_no;
                $sql = "SELECT count(status) As count FROM tbl_item WHERE item_part_no='$part_no'";

                $count = $this->db->mod_select($sql);
                // print_r($count);
                if (empty($count)) {
                    
                } else {
                    if ($count[0]->count == 1) {

                        $sql2 = "Update tbl_item set total_stock_qty=$tot_stock_qty,amd_vsd=$amd_vsd,avg_monthly_demand=$avg_monthly_demands,avg_cost=$average_cost,selling_price=$selling_price where item_part_no='$part_no'";
                        $this->db->mod_select($sql2);
                    } else {

                        $insert_array = array(
                            'item_part_no' => $part_no,
                            'description' => $description,
                            'added_date' => date('Y-m-d'),
                            "added_time" => date("H:i:s"),
                            "total_stock_qty" => $tot_stock_qty,
                            "amd_vsd" => $amd_vsd,
                            "avg_monthly_demand" => $avg_monthly_demands,
                            "avg_cost" => $average_cost,
                            "selling_price" => $selling_price,
                            "status" => 1,
                        );

                        $this->db->insertData("tbl_item", $insert_array);
                    }
                }
            }
        }
        return 1;
    }

//--------------------------------------------------------Part No & Desc-----------------------------------------------------//
    public function getAllPartNumbers($q, $select) {
        $sql = "select * from tbl_item where status=1 and item_part_no like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]) . " " . stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAllPartDescription($q, $select) {
        $sql = "select * from tbl_item where status=1 and description like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]) . "    " . stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    //---------------------Upload Categary----------------By Insaf Zakariya--------------
    public function upload_categories($type, $main_array) {
        $categorie = '';

        if ($type == 1) {
            $categorie = 'pg_category_from_tml';
        } else if ($type == 2) {
            $categorie = 'pg_category_local';
        } else if ($type == 3) {
            $categorie = 'pricing_category';
        } else if ($type == 4) {
            $categorie = 'product_hiracy';
        } else if ($type == 5) {
            $categorie = 'vehicle_segment';
        } else if ($type == 6) {
            $categorie = 'aggregate_tml';
        } else if ($type == 7) {
            $categorie = 'aggregate_e_cat_def';
        } else if ($type == 8) {
            $categorie = 'total_stock_qty';
        } else if ($type == 9) {
            $categorie = 'amd_vsd';
        } else if ($type == 10) {
            $categorie = 'avg_monthly_demand';
        } else if ($type == 11) {
            $categorie = 'avg_cost';
        } else if ($type == 12) {
            $categorie = 'selling_price';
        } else if ($type == 13) {
            $categorie = 'vat_percentage';
        }

        $mainarray = array();
        foreach ($main_array as $val) {
            $subarry = array(
                'item_part_no' => $val[0],
                $categorie => $val[1]
            );
            array_push($mainarray, $subarry);
        }
        //  print_r($mainarray);
        $this->db->update_batch('tbl_item', $mainarray, 'item_part_no');
    }

}

?>
