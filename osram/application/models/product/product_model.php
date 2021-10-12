<?php

/**
 * Description of product_model
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class product_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertProduct
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertProduct($dataset) {
      
        
        $data_insert = array(
            'expiry_date' => $dataset['expdate'],
            'id_batch' => $dataset['batchnoh'],
            'iditem' => $dataset['itemnoh'],
            'product_price' => $dataset['price'],
            "product_cost" => $dataset['cost'],
            'product_status' => '1',
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
       
       
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_products", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    

    /**
     * Function deleteProduct
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteProduct($id) {
        $data_delete = array(
            "product_status" => 0
        );
        $where = array(
            "id_products" => $id
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_products", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllProduct
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function viewAllProduct() {

        $query = "select tbl_products.*,tbl_batch.batch_no as batch ,tbl_products.id_products as id,tbl_item.item_name as item ,
                tbl_products.product_price as price,tbl_products.expiry_date as exp
                from tbl_products  inner join tbl_batch
                on tbl_batch.id_batch = tbl_products.id_batch
                inner join tbl_item 
                on tbl_item.id_item = tbl_products.iditem WHERE tbl_products.product_status='1' ";
        $query_result = $this->db->query($query);
        $result = $query_result->result();
        return $result;
    }

    /**
     * Function updateProduct
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateProduct($dataset) {
        $id = $dataset['productid'];
        $data = array(
            "id_batch" => $dataset['batchnoh2'],
            "iditem" => $dataset['itemnoh2'],
            "product_price" => $dataset['price'],
            "product_cost" => $dataset['cost'],
            "expiry_date" => $dataset['exp_date']
        );
        $where = array(
            "id_products" => $id
        );
        
       
      $this->db->__beginTransaction();
        $this->db->update("tbl_products", $data, $where);
      $this->db->__endTransaction();
       return $this->db->status();
  }
  
   public function get_batchno($q, $select){
      $sql = "select batch_no,id_batch from tbl_batch where batch_status=1 and batch_no LIKE '$q%'";
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

 /*
 *function get_iditem
 *add product validation
 **/
  public function get_iditem($q){
      
      $iditem=$q['iditem'];
        
      $sql = "select iditem from tbl_products where product_status='1' and iditem = '$iditem'";
//        echo $_REQUEST['item_no'];
        $result = $this->db->mod_select($sql);

        return $result;
  }

}

?>
