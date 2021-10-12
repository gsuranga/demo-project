<?php

/**
 * Description of item_model
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
class item_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertItem($data_array) {
        $detail = array(
            "id_item_category" => $data_array['id_item_category'],
            "item_brand_id" => $data_array['reg_brand_id'],
            "item_no" => $data_array['reg_item_no'],
            "item_account_code" => $data_array['reg_item_account_code'],
            "item_name" => $data_array['reg_item_name'],
            "item_status" => "1",
            "item_alias" => $data_array['reg_item_alias'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insert("tbl_item", $detail);
        $this->db->__endTransaction();

        return $this->db->status();
    }

    /**
     * Function insertItemMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertItemMap($data_array) {

        $this->db->__beginTransaction();
        $this->db->insert("tbl_item_map", $data_array);
        $this->db->__endTransaction();

        return $this->db->status();
    }

    /**
     * Function autoCompleteItemsMange
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function autoCompleteItemsMange($sql) {
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Function getLastRow
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    /**
     * Function viewAllItems
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function viewAllItems() {
    if(isset ($_REQUEST['reg_brand_name'])&& $_REQUEST['reg_brand_name'] != "" && $_REQUEST['reg_brand_name'] !="Select Brand"){
     $item_brand=$_REQUEST['reg_brand_name'];
//     $no="item_alias";
     $append .="and tbl_item_category.id_brand='$item_brand'";
 }
    if(isset ($_REQUEST['category_list'])&& $_REQUEST['category_list'] != "" && $_REQUEST['category_list'] != "Select Item Category" ){
     $category_list=$_REQUEST['category_list'];
//     $no="item_alias";
     $append .="and tbl_item_category.id_item_category='$category_list'";
 }
    if(isset ($_REQUEST['hiddn_item_id'])&& $_REQUEST['hiddn_item_id'] != "" ){
     $hiddn_item_id=$_REQUEST['hiddn_item_id'];
//     $no="item_alias";
     $append .="and tbl_item.id_item='$hiddn_item_id'";
 }
        $sql="SELECT 
    tbl_item_map.id_item_map,
    tbl_item_map.id_division,
    tbl_division.division_name,
    tbl_item.id_item,
    tbl_item.id_item_category,
    tbl_item.item_no,
    tbl_item.item_account_code,
    tbl_item.item_name,
    tbl_item.item_alias,
    tbl_item_category.id_item_category,
    tbl_item_category.tbl_item_category_name
FROM
    tbl_item tbl_item
        INNER JOIN
    tbl_item_category tbl_item_category
        INNER JOIN
    tbl_division tbl_division
        INNER JOIN
    tbl_item_map tbl_item_map
WHERE
    tbl_item.id_item_category = tbl_item_category.id_item_category
        AND tbl_item.item_status = '1'
        AND tbl_division.id_division = tbl_item_map.id_division
        AND tbl_item_map.id_item = tbl_item.id_item {$append}";
        
        //item id , category
//        $type = $_POST['hiddn_token_type'];
//        if ($type == "item") {
//            // echo "item".$item_id;
//            $sql = "SELECT tbl_item_map.id_item_map,tbl_item_map.id_division ,
//                tbl_division.division_name,tbl_item.id_item, tbl_item.id_item_category, tbl_item.item_no,
//            tbl_item.item_account_code, tbl_item.item_name, tbl_item.item_alias ,
//            tbl_item_category.id_item_category , tbl_item_category.tbl_item_category_name
//            FROM tbl_item tbl_item 
//            INNER JOIN tbl_item_category tbl_item_category INNER JOIN tbl_division 
//            tbl_division INNER JOIN  tbl_item_map tbl_item_map
//            WHERE tbl_item.id_item_category = tbl_item_category.id_item_category 
//            AND tbl_item.item_status='1' AND  tbl_item.id_item ='$item_id' AND 
//                tbl_division.id_division = tbl_item_map.id_division AND tbl_item_map.id_item = tbl_item.id_item";
//        }
//        if ($type == "category") {
//            //  echo "category".$category;
//            $sql = "SELECT tbl_item_map.id_item_map,tbl_item_map.id_division ,
//                tbl_division.division_name,tbl_item.id_item, tbl_item.id_item_category, tbl_item.item_no,
//            tbl_item.item_account_code, tbl_item.item_name, tbl_item.item_alias ,
//            tbl_item_category.id_item_category , tbl_item_category.tbl_item_category_name
//            FROM tbl_item tbl_item 
//            INNER JOIN tbl_item_category tbl_item_category INNER JOIN tbl_division 
//            tbl_division INNER JOIN  tbl_item_map tbl_item_map
//            WHERE tbl_item.id_item_category = tbl_item_category.id_item_category 
//            AND tbl_item.item_status='1' AND  tbl_item.id_item_category ='$category' 
//                AND tbl_division.id_division = tbl_item_map.id_division AND tbl_item_map.id_item = tbl_item.id_item";
//        }
//
//        if ($type == "all") {
//            // echo "all";
//           echo $sql = "SELECT tbl_item_map.id_item_map,tbl_item_map.id_division ,
//                tbl_division.division_name,tbl_item.id_item, tbl_item.id_item_category, tbl_item.item_no,
//            tbl_item.item_account_code, tbl_item.item_name, tbl_item.item_alias ,
//            tbl_item_category.id_item_category , tbl_item_category.tbl_item_category_name
//            FROM tbl_item tbl_item 
//            INNER JOIN tbl_item_category tbl_item_category INNER JOIN tbl_division 
//            tbl_division INNER JOIN  tbl_item_map tbl_item_map
//            WHERE tbl_item.id_item_category = tbl_item_category.id_item_category 
//            AND tbl_item.item_status='1' AND tbl_division.id_division = 
//            tbl_item_map.id_division AND tbl_item_map.id_item = tbl_item.id_item";
//        }

        
        $mod_select = $this->db->mod_select($sql);
        
        return $mod_select;
    }

    /**
     * Function viewAllItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function viewAllItem() {

        $sql = "SELECT tbl_item.id_item, tbl_item.id_item_category, tbl_item.item_no,
            tbl_item.item_account_code, tbl_item.item_name, tbl_item.item_alias ,
            tbl_item_category.id_item_category , tbl_item_category.tbl_item_category_name
            FROM tbl_item tbl_item 
            INNER JOIN tbl_item_category tbl_item_category 
            WHERE tbl_item.id_item_category = tbl_item_category.id_item_category 
            AND tbl_item.item_status='1'";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Function getCategoryList
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getCategoryList() {
        //$aa=$_REQUEST['brandid'];
//        if ($type == 'item') {
//            $sql = "SELECT id_item_category , tbl_item_category_name FROM tbl_item_category where tbl_item_category_status=1 and id_brand=1 GROUP BY tbl_item_category_name ";
//        } else {
//            $sql = "SELECT tbl_item_category.id_item_category,tbl_item_category.tbl_item_category_name 
//                FROM tbl_item_category tbl_item_category INNER JOIN tbl_item tbl_item WHERE 
//                tbl_item.id_item_category = tbl_item_category.id_item_category and tbl_item_category.tbl_item_category_status=1 and  tbl_item_category.id_brand=1  GROUP BY tbl_item.id_item_category";
//        }
        if ($_POST['brandid'] !=null) {
        $brandid=$_POST['brandid'];
        $sql="SELECT 
    id_item_category, tbl_item_category_name
FROM
    tbl_item_category
where
    tbl_item_category_status = 1
and tbl_item_category.id_brand= '$brandid'
GROUP BY tbl_item_category_name";
        }  else {
           $sql="SELECT 
    id_item_category, tbl_item_category_name
FROM
    tbl_item_category
where
    tbl_item_category_status = 1

GROUP BY tbl_item_category_name"; 
        }
        
        
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Function updateItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateItem($details) {
        $where = array(
            "id_item" => $details['id_item']
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_item', $details, $where);
        $this->db->__endTransaction();
    }

    /**
     * Function updateItemMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateItemMap($details) {
        $where = array(
            "id_item_map" => $details['id_item_map']
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_item_map', $details, $where);
        $this->db->__endTransaction();
    }

    /**
     * Function deleteItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteItem($data, $item_map_decode) {
        $details = array("item_status" => "0"
        );

        $details_map = array("item_map_satatus" => "0"
        );

        $where = array(
            "id_item" => $data['id_item']
        );

        $where_map = array(
            "id_item_map" => $item_map_decode['id_item_map']
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_item', $details, $where);
        $this->db->update('tbl_item_map', $details_map, $where_map);
        $this->db->__endTransaction();
    }

public function getItem_no($q) {
        // $item_no = "";
//        $_REQUEST['item_no'] = $item_no;
//        if (isset($_REQUEST['item_no']) && $_REQUEST['item_no'] != "") {
//            $_REQUEST['item_no'] = $item_no;
//        }

      
       $item_name=$q['item_name'];
       if (isset($q['item_no']) && $q['item_no'] != "") {
           $item_no=$q['item_no'];
           $no="item_no";
           $append="and item_no='$item_no'";           
       }
       if (isset($q['item_name']) && $q['item_name'] != "") {
           $item_no=$q['item_name'];
           $no="item_name";
           $append="and item_name='$item_no'";           
       }
       
       if(isset ($q['item_account_code'])&& $q['item_account_code'] != ""){
           $item_no=$q['item_account_code'];
           $no="item_account_code";
           $append="and item_account_code='$item_no'";
       }
       if(isset ($q['item_alias'])&& $q['item_alias'] != ""){
           $item_no=$q['item_alias'];
           $no="item_alias";
           $append="and item_alias='$item_no'";
       }
        
       $sql = "select {$no} from tbl_item where item_status='1' {$append}";
//        echo $_REQUEST['item_no'];
        $result = $this->db->mod_select($sql);

        return $result;
    }
	
	
	function getAllBrand(){
        $sql="select item_brand_id,brand_name from tbl_item_brand where brand_staus = '1'";
        $result=  $this->db->mod_select($sql);
        return $result;
    }
    
    
function getbrand_names($q, $select){
    $sql="select brand_name,item_brand_id from tbl_item_brand where brand_staus = '1' and brand_name like '%$q%'";
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
