<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productsmodel_model
 *
 * @author Kanchu
 */
class productsmodel_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function productsmodel(){
        parent::Model();
    }
    
    function getProduct($id){
        $data=array();
        $where=array('prod_id'=> $id);
        $query=$this->db->get_where('products',$where,1);
            
       //     if($query->num_rows() > 0){
                $data = $query->row_array();
         //   }
        $query->free_result();
        return $data;
        
    }
    
    
    function getAllProducts(){
        $data= array();
        $query=  $this->db->get('products');
            if($query->num_rows()>0){
                foreach ($query->result_array() as $row){
                    $data[]=$row;
                }
            }
        $query->free_result();
        return $data;
    }
    //put your code here
}
