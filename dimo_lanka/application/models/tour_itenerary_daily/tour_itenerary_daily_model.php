<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tour_itenerary_daily_model extends C_Model {

    public function __construct() {
        parent::__construct();
}

    public function get_sales_officerId($q, $select) {
      
        $sql = "select sales_officer_name,sales_officer_id from tbl_sales_officer WHERE sales_officer_name like '$q%'";
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

    public function get_tour_itenerary_daily($userId, $select_date) {
      // print_r($userId);
      //        $sql = "select 
//    (tso.sales_officer_name) as nam,
//    (tc.city_name) as town,
//    (tvc.category_name) as category,
//    (tvp.purpose_id_name) as purpose,
//    (tsov.description) as details,
//    (tsov.visit_date) as last_visit_date,
//    tsov.sales_officer_id,
//    tsov.branch_id
//from
//    tbl_sales_officer_visit as tsov
//        inner join
//    tbl_sales_officer as tso ON tsov.sales_officer_id = tso.sales_officer_id
//        inner join
//    tbl_city as tc ON tsov.city_id = tc.city_id
//        inner join
//    tbl_visit_category as tvc ON tsov.visit_category = tvc.visit_category_id
//        inner join
//    tbl_visit_purpose as tvp ON tsov.visit_purpose = tvp.visit_purpose_id
//where
//    tsov.sales_officer_id = {$userId}
//        and tsov.visit_date = '$select_date'";
        
       $sql="select 
    (tso.sales_officer_name) as nam,
    (IFNULL((select city_name from tbl_city where city_id = tsov.city_id),'-')) as town,
    (IFNULL((select category_name from tbl_visit_category where visit_category_id = tsov.visit_category),'-')) as category ,
    (IFNULL((select purpose_id_name from tbl_visit_purpose where visit_purpose_id = tsov.visit_purpose),'-')) as purpose ,
    (tsov.description) as details,
    (tsov.visit_date) as last_visit_date,
    tsov.sales_officer_id,
    tsov.branch_id
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_sales_officer as tso ON tsov.sales_officer_id = tso.sales_officer_id
      
where
    tsov.sales_officer_id = {$userId}
    and 
    tsov.visit_date = '$select_date'
        "; 


        return $this->db->mod_select($sql);
}
    
    public function getmonthlytourPlan1($month,$offcer){
      
   $sql= "SELECT
ttp.date as added_date,ttp.target_collection,ttp.target_sales,
IFNULL(td.delar_name,'-') as delar_name,
ttp.sales_officer_id,ttpd.delar_type,
IFNULL((SELECT city_name from tbl_city WHERE city_id = ttpd.city_id),'-') as city_name
               from tbl_tour_plan ttp 
               
               left OUTER join tbl_tour_plan_detail ttpd on ttpd.tour_plan_id  = ttp.tour_plan_id
               left OUTER join tbl_dealer td on td.delar_id = ttpd.dealer_id
               inner join tbl_sales_officer so on so.sales_officer_id = ttp.sales_officer_id
 
               where ttp.date LIKE '".$month."%' and so.sales_officer_name = '".$offcer."'";
        
         return $this->db->mod_select($sql);
        
}

 public function get_salesOfficerInAPM($q, $select) {
        $userid = $this->session->userdata('employe_id');
        $sql = "tso.sales_officer_name,
tso.sales_officer_id
from
    tbl_apm as ta
        inner join
    tbl_sales_officer as tso ON ta.branch_id =tso.branch_id where ta.apm_id={$userid}";

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
    //draw_actual_date
public function draw_actual_date($id,$idd){
$sql = "SELECT 
tc.city_name
FROM tbl_tour_plan_detail tpd
inner JOIN tbl_tour_plan tp on tpd.tour_plan_id = tp.tour_plan_id
inner JOIN tbl_city tc on tc.city_id = tpd.city_id

WHERE tp.sales_officer_id = '".$id."' 

and tp.date = '".$idd."'   ";
//       $sql =   " SELECT 
//tc.city_name,
//(select city_name from tbl_city where city_id = tsv.city_id) as asa
//
//FROM tbl_tour_plan_detail tpd
//inner JOIN tbl_tour_plan tp on tpd.tour_plan_id = tp.tour_plan_id
//inner JOIN tbl_city tc on tc.city_id = tpd.city_id
//left join tbl_sales_officer_visit tsv on tsv.sales_officer_id = tp.sales_officer_id
//WHERE tp.sales_officer_id = '".$id."' 
//
//and tp.date = '".$idd."' and tsv.visit_date = tp.date   ";
       
       
       return $this->db->mod_select($sql);  
     }
     
     
     public function draw_target_date($id,$idd){
                
$sql="SELECT  
(select city_name from tbl_city where city_id = tsv.city_id) as city_name
FROM 
tbl_sales_officer_visit tsv 
WHERE tsv.sales_officer_id  = '".$id."' 

 and tsv.visit_date ='".$idd."'  ";
         
          return $this->db->mod_select($sql);  
         
         
     }

}
