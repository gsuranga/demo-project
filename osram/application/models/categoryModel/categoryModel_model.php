<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoryModel_model
 *
 * @author Kanchu
 */
class categoryModel_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    function categoryModel(){
        parent::Model();
        
    }
    
    public function getCategory($id) {
       // echo $id;
        $data=array();
        $where=array('cat_id'=>$id);
        $query=$this->db->get_where('categories',$where,1);
       if($query->num_rows()>0){
            $data=$query->row_array();
            
        }
        $query->free_result();
        return $data;
        
    }
    function getAllCategories() {
        $data = array();
        $query= $this->db->get('categories');
        
        //if($query->num_raws() > 0){
            foreach($query->result_array() as $row){
                $data[]= $row;      
                }
        //}
        $query->free_result();
        return $data;
        
    }
    
    //put your code here
}
