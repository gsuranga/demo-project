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
    public function save_new_csv($data) {
        
        $sql="TRUNCATE TABLE temp_tbl_item";
        $query1 = $this->db->query($sql);
        
       $infile=$data['upload_data']['full_path'];
      
         $date = date('Y-m-d');
         $time = date('H-i-s');
         
         $sql="LOAD DATA INFILE '".$infile."'
                    INTO TABLE temp_tbl_item
                    FIELDS TERMINATED BY ','
                    LINES TERMINATED BY '\r\n'
                    IGNORE 1 LINES
                    (item_part_no,description,total_stock_qty,amd_vsd,avg_monthly_demand,avg_cost,selling_price)
                    SET added_date = '".$date."' ,  added_time = '".$time."' , status = '1'";
        
                    $query1 = $this->db->query($sql);
                    return 1;
     
    }
    
    
    public function save_csv($data){
       // print_r($data);
        $infile=$data['upload_data']['full_path'];
        
        if (($handle = fopen($infile, "r")) !== FALSE) {
        # Set the parent multidimensional array key to 0.
        $nn = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            # Count the total keys in the row.
            $c = count($data);
            # Populate the multidimensional array.
            for ($x=0;$x<$c;$x++)
            {
                $csvarray[$nn][$x] = $data[$x];
            }
            $nn++;
        }
        # Close the File.
        fclose($handle);
    }
   
    $co = 0;
//    $c = 0;
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=updated.csv");
    //$image_path = realpath(APPPATH .'../upload_vsd/').'/updated.csv';
    $fp = fopen('php://output', 'w');
    
foreach ($csvarray as $value) {
 		$value[0];
 		$str = $value[0];
 		if($str[0] == 'T' || $str[0] == 'V'){
//           $c++;        
          
           $list = $value[0];
           $str1 = $value[1];
           $str2 = $value[2];
 	   $str3 = $value[3];
 	   $str4 = $value[4];
 	   $str5 = $value[5];
 	   $str6 = $value[6];
       
$lister = array (
    array($list, $str1,$str2,$str3,$str4,$str5,$str6)
   
);

foreach ($lister as $fields) {
    fputcsv($fp, $fields);
}

 }else
     
{
 $value[0]; 
}
 $co ++;
 
    }
  
  $close=  fclose($fp);
  

//   echo $c;
   

        } 
        
        public function insert_cvs(){
      
         $sql1="SELECT
    tem.item_part_no,
    tem.description,
    tem.total_stock_qty,
    tem.amd_vsd,
    tem.avg_monthly_demand,
    tem.avg_cost,
    tem.selling_price,
    
    IF(tem.item_part_no = ori.item_part_no, 1, 0) AS is_different
    FROM
    temp_tbl_item tem
    LEFT JOIN
    test_tbl_item ori
    ON
    ori.item_part_no = tem.item_part_no"; 
         
      
        $_main_array = $this->db->mod_select($sql1);
        foreach ($_main_array as $_val) {
         if($_val->is_different == '0'){
             $_val->description; 
               $insert_array = array(
                            'item_part_no' => $_val->item_part_no,
                            'description' => $_val->description,
                            'added_date' => date('Y-m-d'),
                            "added_time" => date("H:i:s"),
                            "total_stock_qty" => $_val->total_stock_qty,
                            "amd_vsd" => $_val->amd_vsd,
                            "avg_monthly_demand" => $_val->avg_monthly_demand,
                            "avg_cost" => $_val->avg_cost,
                            "selling_price" => $_val->selling_price,
                            "status" => 1,
                        );

                        $this->db->insertData("test_tbl_item", $insert_array);
         }elseif ($_val->is_different == '1') {
               $set = array(
                            'description' => $_val->description,
                            'added_date' => date('Y-m-d'),
                            "added_time" => date("H:i:s"),
                            "total_stock_qty" => $_val->total_stock_qty,
                            "amd_vsd" => $_val->amd_vsd,
                            "avg_monthly_demand" => $_val->avg_monthly_demand,
                            "avg_cost" => $_val->avg_cost,
                            "selling_price" => $_val->selling_price,
                            "status" => 1,
                        ); 
                $where = array(
           'item_part_no' => $_val->item_part_no,
        );
       // print_r($where);
        $this->db->__beginTransaction();
        $this->db->update("test_tbl_item", $set, $where);
        $this->db->__endTransaction();
            }   
          
        }
//     $sqlnew="select item_part_no,description,added_date,added_time,total_stock_qty,amd_vsd,avg_monthly_demand,avg_cost,selling_price,status from temp_tbl_item";                     
//        $_main_array = $this->db->mod_select($sqlnew);     
//        //print_r($_main_array);
//         $cont = 1;
//         foreach ($_main_array as $_val) {
//         $cont++;
//         $part_no=  $_val->item_part_no;
//         $descrp=  $_val->description;
//         $add_date=  $_val->added_date;
//         $add_time=  $_val->added_time;
//         $tsq=  $_val->total_stock_qty;
//         $amd_vsd =  $_val->amd_vsd;
//         $amd=  $_val->avg_monthly_demand;
//         $avg=  $_val->avg_cost;
//         $sell=  $_val->selling_price;
//         $status=  $_val->status;
//         $set = array(
//            'description' => $descrp,
//            'added_date' => $add_date,
//            'added_time' => $add_time,
//            'total_stock_qty' => $tsq,
//            'amd_vsd' => $amd_vsd,
//            'avg_monthly_demand' => $amd,
//            'avg_cost' => $avg,
//            'selling_price' => $sell,
//            'status' => $status,
//        );
//        $where = array(
//           'item_part_no' => $part_no,
//        );
//       // print_r($where);
//        $this->db->__beginTransaction();
//        $this->db->update("test_tbl_item", $set, $where);
//        $this->db->__endTransaction();
//       // return $this->db->status();
//            } 
//            
//            echo'efe:'.$cont; 
            return 1;      
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
        //print_r($_main_array);
       
        $pa ='';
        foreach ($_main_array AS $_val) {

             $part_num = $_val[0];

            
            if ($part_num[0] == "T" | $part_num[0] == "V") {
               
                 $result1[] = array($part_num,$_val[1],$_val[2],$_val[3],$_val[4],$_val[5],$_val[6]);         
               
               
                  }
           
                      //  echo $c;
       }
        
        foreach ($result1 as $res){
          $part_no =  $res[0];
        
             $sql = "SELECT count(status) As count FROM tbl_item  WHERE item_part_no='$part_no'";

                $count = $this->db->mod_select($sql);
                // print_r($count);
                if (empty($count)) {
                    
                } else {
                    if ($count[0]->count == 1) {

                        $sql2 = "Update tbl_item set total_stock_qty=$res[2],amd_vsd=$res[3],avg_monthly_demand=$res[4],avg_cost=$res[5],selling_price=$res[6] where item_part_no='$part_no'";
                        $this->db->mod_select($sql2);
                    } else {
//
                        $insert_array = array(
                            'item_part_no' => $part_no,
                            'description' => $res[1],
                            'added_date' => date('Y-m-d'),
                            "added_time" => date("H:i:s"),
                            "total_stock_qty" => $res[2],
                            "amd_vsd" => $res[3],
                            "avg_monthly_demand" => $res[4],
                            "avg_cost" => $res[5],
                            "selling_price" => $res[6],
                            "status" => 1,
                        );

                        $this->db->insertData("tbl_item", $insert_array);
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
