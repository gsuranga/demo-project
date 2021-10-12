<?php

/**
 * Description of Tour_iteneray_model
 *
 * @author Shamil ilyas
 */
class tour_iteneray_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createVisitCategory($data_Array) {

        $data = array(
            'category_name' => $data_Array['categary_name'],
            'category_code' => $data_Array['code'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_visit_category", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllVisitCategory() {
        $sql = "select * from tbl_visit_category WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function updateVisitCategory($dataArray) {

        $where = array(
            'visit_category_id' => $dataArray['categary_Id']
        );

        $data = array(
            'category_name' => $dataArray['categary_name'],
            'category_code' => $dataArray['code'],
        );


        $this->db->__beginTransaction();
        $this->db->update("tbl_visit_category", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deletevisitCategory($id) {
        $where = array(
            'visit_category_id' => $id
        );

        $data = array(
            'status' => 0
        );

        $this->db->__beginTransaction();

        $this->db->update("tbl_visit_category", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createVisitPurpose($data_Array) {

        $data = array(
            'purpose_id_name' => $data_Array['purpose_name'],
            'description' => $data_Array['description'],
            'visit_purpose_code' => $data_Array['purpose_code'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );


        $this->db->__beginTransaction();
        $this->db->insertData("tbl_visit_purpose", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllVisitPurpose() {
        $sql = "select * from tbl_visit_purpose WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function updateVisitPurpose($dataArray) {

        $where = array(
            'visit_purpose_id' => $dataArray['Purpose_Id']
        );

        $data = array(
            'purpose_id_name' => $dataArray['Purpose_name'],
            'description' => $dataArray['Purpose_des'],
            'visit_purpose_code' => $dataArray['purpose_code'],
        );


        $this->db->__beginTransaction();
        $this->db->update("tbl_visit_purpose", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deletevisitPurpose($id) {
        $where = array(
            'visit_purpose_id' => $id
        );

        $data = array(
            'status' => 0
        );

        $this->db->__beginTransaction();

        $this->db->update("tbl_visit_purpose", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllDistrict() {
        $sql = "SELECT district_id,district_name FROM `tbl_district` WHERE status=1";
        return $this->db->mod_select($sql);
    }

    public function viewAllCity($District_id) {
        $sql = "SELECT
                  tbl_district.district_id,tbl_district.district_name,tbl_city.city_id,tbl_city.district_id,tbl_city.city_name	
 
            FROM 
                tbl_city,tbl_district
 
            Where 
                tbl_city.district_id=tbl_district.district_id
                and tbl_city.status=1 
                and tbl_city.district_id= $District_id";
        return $this->db->mod_select($sql);
    }

    public function get_City($q, $select, $District_id) {

        $sql = " SELECT
                  tbl_district.district_id,tbl_district.district_name,tbl_city.city_id,tbl_city.district_id,tbl_city.city_name	
 
            FROM 
                tbl_city,tbl_district
 
            Where 
                tbl_city.district_id=tbl_district.district_id
                and tbl_city.status=1 
                and tbl_city.district_id=$District_id
                and city_name like '$q%'";

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

    public function get_City1($q, $select) {

        $sql = " SELECT * FROM tbl_city Where status=1 and city_name like '$q%'";

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

    public function get_catogory($q, $select) {
        $sql = "SELECT * FROM tbl_visit_category where status=1 and category_name like '$q%'";
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

    public function get_purpose($q, $select) {
        $sql = "SELECT * FROM tbl_visit_purpose where status='1' and purpose_id_name like '$q%'";
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

//    public function get_salesOficerName($q, $select) {
//
//        $sql = "select 
//            tbl_sales_officer.sales_officer_id,tbl_sales_officer.sales_officer_code,tbl_sales_officer.status,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name,
//             tbl_sales_officer.branch_id,tbl_branch.branch_name
//    from
//        tbl_sales_officer,
//        tbl_branch
//    
//    where
//        tbl_sales_officer.branch_id = tbl_branch.branch_id
//         and tbl_sales_officer.status='1' and sales_officer_name  like '$q%'";
//
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    public function get_salesOficeractNumber($q, $select) {

        $sql = "select 
            tbl_sales_officer.sales_officer_id,tbl_sales_officer.status,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name,
             tbl_sales_officer.branch_id,tbl_branch.branch_name
    from
        tbl_sales_officer,
        tbl_branch
    
    where
        tbl_sales_officer.branch_id = tbl_branch.branch_id
         and tbl_sales_officer.status='1' and sales_officer_account_no  like '$q%'";

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

    public function createDailySummary($data_Array) {
        $data = array(
            'sales_officer_id' => $data_Array['sales_oficer_id'],
//            'route' => $data_Array['route'],
            'visit_category' => $data_Array['cmb_visit_categoris'],
            'visit_purpose' => $data_Array['cmb_visit_purposes'],
            'selected_id' => $data_Array['selected_id'],
            'route' => $data_Array['selected_name'],
            'city_id' => $data_Array['city_id'],
            'branch_id' => $data_Array['branchID'],
            'district_id' => $data_Array['cmd_district'],
            'visit_time' => date('H:i:s'),
            'visit_date' => date('Y-m-d'),
            'description' => $data_Array['details'],
            'status' => 1
        );
//
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_sales_officer_visit", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllDailySummary() {
        $append = '';
        $userid = '';
        $user = $this->session->userdata('employe_id');
        if ((isset($_REQUEST['start_date_']) && isset($_REQUEST['end_date_'])) && (($_REQUEST['start_date_'] != null) && $_REQUEST['end_date_'] != null)) {
            $str_date = $_REQUEST['start_date_'];
            $end_date = $_REQUEST['end_date_'];
            $userid = $_REQUEST['sales_oficer_id'];

            $append .= " and tsov.visit_date between '$str_date' and '$end_date'";
        }
        if ((isset($_REQUEST['sales_oficer_id'])) && (($_REQUEST['sales_oficer_id'] != null))) {

            $userid = $_REQUEST['sales_oficer_id'];
        }
//print_r($append);
        //print_r($userid);
        $sql = "select 
    (tso.sales_officer_name) as nam,
    (tc.city_name) as town,
    (tvc.category_name) as category,
    (tvp.purpose_id_name) as purpose,
    (tsov.description) as details,
    (tsov.visit_date) as last_visit_date,
    tsov.sales_officer_id,
    tsov.branch_id,
    (tsov.outlet_name) as outlet_name,
    (td.district_name) as district
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_sales_officer as tso ON tsov.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_city as tc ON tsov.city_id = tc.city_id
        inner join
    tbl_visit_category as tvc ON tsov.visit_category = tvc.visit_category_id
        inner join
    tbl_visit_purpose as tvp ON tsov.visit_purpose = tvp.visit_purpose_id
        inner join
    tbl_district as td ON td.district_id = tsov.district_id
where tsov.sales_officer_id='$user' {$append} order by tsov.visit_date";


        return $this->db->mod_select($sql);
    }

    public function insertTourPlan($dataset) {


        $rowCount = $dataset['updateRowCount'];
        $data_array = array();
        $data1 = array(
            "sales_officer_id" => $dataset['sales_oficer_id'],
            "date" => $dataset['start_date_mr'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "target_collection" => $dataset['targetCol'],
            "target_sales" =>$dataset['targetSales'],
            "status" => '1'
        );
        $this->db->insertData("tbl_tour_plan", $data1);
        $idtourplan = $this->db->insert_id();

        for ($i = 1; $i <= $rowCount; $i++) {

            if (isset($dataset['town_' . $i])) {

                $data2 = array(
                    "tour_plan_id" => $idtourplan,
                    "city_id" => $dataset['town_id_' . $i],
                    "dealer_id" => $dataset['dealer_id_' . $i],
                    "delar_type" => $dataset['type_' . $i],
                    "status" => 1
                );
            }
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_tour_plan_detail", $data2);
            $this->db->__endTransaction();
        }
    }

    public function getAllTour_plan() {
        $USERID = $this->session->userdata('employe_id');
        $append = '';

        if ((isset($_REQUEST['start_date_'])) && (($_REQUEST['start_date_'] != null))) {
            $str_date = $_REQUEST['start_date_'];

            $append .= "and date='$str_date' ";
        }

        $result = $this->db->mod_select($sql = "Select tp.*,tso.sales_officer_name From tbl_tour_plan tp,tbl_sales_officer tso Where tp.status='1' and tso.sales_officer_id=tp.sales_officer_id and tp.sales_officer_id=$USERID {$append} ");


        return $result;
    }

    public function deleteItem($data) {

        $where = array(
            "tour_plan_id" => $data['tour_plan_id'],
        );

        $details = array(
            "status" => '0'
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_tour_plan', $details, $where);
        $this->db->__endTransaction();
    }

//    public function getmonthlytourPlan1($month,$aso){
//     
//        echo $month;
//        echo $aso;
//        
//        $sql= "SELECT ttp.added_date,ttp.target_collection,ttp.target_sales,ttp.sales_officer_id,ttpd.city_id,ttpd.dealer_id,ttpd.delar_type
//
//
//from tbl_tour_plan ttp 
//
//inner join tbl_tour_plan_detail ttpd on ttpd.tour_plan_id  = ttp.tour_plan_id
// 
//where ttp.added_date LIKE '".$month."%' and ttp.sales_officer_id = '".$aso."'";
//        
//         return $this->db->mod_select($sql);
//    }
    

    

    //amends

    public function insertAmendments($dataset) {

        $rowCount = $dataset['updateRowCount'];
        $data_array = array();
        for ($i = 1; $i <= $rowCount; $i++) {


            if (isset($dataset['town_' . $i])) {

                $data1 = array(
                    "tour_plan_id" => $dataset['HDTourID'],
                    "city_id" => $dataset['town_id_' . $i],
                    "dealer_id" => $dataset['dealer_id_' . $i],
                    "amend_reason" => $dataset['reason'],
                    "amend_date" => date('Y:m:d'),
                    "amend_time" => date('H:i:s'),
                    "status" => '1'
                );
            }




            $this->db->__beginTransaction();
            $this->db->insertData("tbl_tour_plan_amendment", $data1);
            $this->db->__endTransaction();
        }
    }

    public function get_DealerNames($q, $select, $Town_id) {

//        $sql = "select * 
//            
//    from
//       tbl_dealer
//    
//    where
//        status='1' and 
//        
//        delar_name  like '$q%'";
        $sql = "
select * from tbl_dealer td
INNER JOIN tbl_city tc ON tc.city_id = td.city_id
    
    where
        td.status='1' and 
        
        td.delar_name  like '$q%'";

        $query = $this->db->query($sql);
        $result = $query->result('array');

        $query = $this->db->query($sql);
        $result = $query->result('array');

        // echo $sql;

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

    public function get_DealerAcco($q, $select, $Town_id) {

        $sql = "
select * from tbl_dealer td
INNER JOIN tbl_city tc ON tc.city_id = td.city_id
    
    where
        td.status='1' and 
        
        td.delar_account_no  like '$q%'";

        $query = $this->db->query($sql);
        $result = $query->result('array');

        // echo $sql;

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

    public function getAllDailySum() {


//        if ((isset($_REQUEST['start_date_'])) && (($_REQUEST['start_date_'] != null))) {
//            $str_date = $_REQUEST['start_date_'];
//            
//            $append .= "and date='$str_date' ";
//        }

        $result = $this->db->mod_select($sql = " select 
            tbl_tour_plan.*,tbl_dealer.delar_id,tbl_dealer.delar_name
                   
                    
                    from
                    tbl_tour_plan,
                    tbl_dealer
                    
                    
                    
                    
                 
                    
                       where
                       tbl_tour_plan.status='1' 
                       and tbl_tour_plan.Target_Dealer=tbl_dealer.delar_id  
                     







                    "
        );


        return $result;
    }

    public function getCountVisitOnly() {

        $result = $this->db->mod_select($sql = "select tbl_sales_officer_daily_visit.purpose_id,tbl_visit_purpose.visit_purpose_id,count(tbl_sales_officer_daily_visit.
purpose_id  ) as pcount,( select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=1)as OrderCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=1)as ReturnCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=1)as OrderCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=3)as collectionCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=1)as ReturnCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount

From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=4)as brandingCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=1)as ReturnCount,

(select count(tbl_sales_officer_daily_visit.
purpose_id  ) as Ordercount

From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=6) as MarketInfoCount,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1
) as CatDealersCNT,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=4
) as catNUMNEWDEALERS ,

(
select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1
) as CatDealersCNT,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=5

)as CATVehicleOwnersCNT,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1
) as CatDealersCNT,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=3) as CATFLETOWNER,

(
select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=6
) as CATNEWCUSCount,

(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=1)as ReturnCount,
(select count(tbl_sales_officer_daily_visit.
visit_category_id  ) as Ordercount
From
tbl_sales_officer_daily_visit,tbl_visit_category
Where
tbl_sales_officer_daily_visit.visit_category_id=tbl_visit_category.visit_category_id and
tbl_sales_officer_daily_visit.visit_category_id=7


) as CATOTHERCount













From
tbl_sales_officer_daily_visit,tbl_visit_purpose

Where
tbl_sales_officer_daily_visit.purpose_id=tbl_visit_purpose.visit_purpose_id and
tbl_sales_officer_daily_visit.purpose_id=5"
        );


        return $result;
    }

    public function get_BranchCode($q, $select) {

        $sql = "select * 
            
    from
       tbl_branch
    
    where
        status='1' and
        
        branch_code  like '$q%'";

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

    public function get_salesOficeCode($q, $select) {

        $sql = "select *
    from
        tbl_sales_officer
        
    
    where
        status='1' and sales_officer_code  like '$q%'";

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

    public function viewAllusername() {
        $userid = $this->session->userdata('employe_id');
        $sql = "SELECT `sales_officer_code` FROM `tbl_sales_officer` WHERE `sales_officer_id`='$userid'";

        return $this->db->mod_select($sql);
    }

    public function setsalesofficer() {

        $emp_id = $this->input->get('emp_idd');

        $sql = "select * from tbl_sales_officer where sales_officer_id=$emp_id";
        return $this->db->mod_select($sql);
    }
    
    //---------------------------------------------------------
  



    public function get_salesOficer_details($q) {

        $sql = "select 
            tbl_sales_officer.sales_officer_id,tbl_sales_officer.sales_officer_code,tbl_sales_officer.status,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name,
             tbl_sales_officer.branch_id,tbl_branch.branch_name
    from
        tbl_sales_officer,
        tbl_branch
    
    where
        tbl_sales_officer.branch_id = tbl_branch.branch_id
         and tbl_sales_officer.status='1' and sales_officer_id  = '$q'";

        $query = $this->db->query($sql);
        $result = $query->result();
        $json_array = array();

        foreach ($result as $row) {



            array_push($json_array, array("acNo" => $row->sales_officer_account_no, "branch" => $row->branch_name, "branchId" => $row->branch_id));
        }

        return $json_array;
    }

    public function get_dealer_detail($q, $catogory_id) {

        $dealer = 1;
        $garag = 2;
        $fleetownr = 3;
        $vihicleownr = 5;
        if ($dealer == $catogory_id) {
            $sql = "select 
    (td.delar_id)as sid, 
    (td.delar_name)as sname
from
    tbl_dealer as td";
        } elseif ($garag == $catogory_id) {
            $sql = "select 
    (tg.garage_id)as sid,
    (tg.garage_name)as sname
from
    tbl_garage as tg";
        } elseif ($fleetownr == $catogory_id) {
            $sql = "select 
    (tc.customer_id)as sid,
    (tc.customer_name)as sname
from
    tbl_customer as tc
where
    tc.customer_type = '3'";
        } elseif ($vihicleownr == $catogory_id) {
            $sql = "select 
    (tv.vehicle_id) as sid, 
(tvm.vehicle_model_name) as sname
from
    tbl_vehicle as tv
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id";
        }
        $query = $this->db->query($sql);
        $result = $query->result();
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = $row->sname;
            $new_row['dealer_id'] = $row->sid;
            array_push($json_array, $new_row);
        }
        return $json_array;
    }

//---------------------------------------Daily Summary (Salesman Tracking)-- Dinesh-----------------------------------

    public function get_salesOficerName($q, $where, $select) {

        $sql = "select 
    so.sales_officer_name,
    so.sales_officer_id,
    so.sales_officer_account_no,
    br.branch_name,
    br.branch_code
from
    tbl_sales_officer so
        inner join
    tbl_branch br ON so.branch_id = br.branch_id
where
    so.status = 1
        and so." . $where . " like '" . $q . "%' limit 10";

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

    public function getAllVisitCategories() {
        $sql = "select visit_category_id,category_name  from tbl_visit_category where status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getAllVisitPurposes() {
        $sql = "select visit_purpose_id, purpose_id_name from tbl_visit_purpose where status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getTourPlanData($officer_id, $date) {
        $sql = "select 
    tp.tour_plan_id,
    group_concat(c.city_name, ' ') as cities,
    group_concat(td.delar_name, ' ') as dealers
from
    tbl_tour_plan_detail tpd
        inner join
    tbl_tour_plan tp ON tpd.tour_plan_id = tp.tour_plan_id
        inner join
    tbl_city c ON tpd.city_id = c.city_id
        inner join
    tbl_dealer td ON tpd.dealer_id = td.delar_id
where
    tp.date = '" . $date . "'
        and tp.sales_officer_id = " . $officer_id . "
        and tp.status = 1";
        return $this->db->mod_select($sql);
    }

    public function getTourPlanAmendments($officer_id, $date) {
        $sql = "select 
    tp.tour_plan_id,
    group_concat(c.city_name, ' ') as cities,
    group_concat(tpa.amend_reason, ' ') as reasons
from
    tbl_tour_plan_amendment tpa
        inner join
    tbl_tour_plan tp ON tpa.tour_plan_id = tp.tour_plan_id
        inner join
    tbl_city c ON tpa.city_id = c.city_id
        inner join
    tbl_dealer td ON tpa.dealer_id = td.delar_id
where
    tp.date = '" . $date . "'
        and tp.sales_officer_id = " . $officer_id . "
        and tp.status = 1";
        return $this->db->mod_select($sql);
    }

    public function getActualLocations($officer_id, $date) {
        $sql = "select 
    group_concat(location_name, ' ') as actuals
from
    tbl_sales_officer_location
where
    user_id = " . $officer_id . " and date = '" . $date . "'";
        return $this->db->mod_select($sql);
    }

    public function getDailyTotalSalesValue($officer_id, $date) {
        $sql = "select 
          round(coalesce(sum(als.selling_val), 0), 2) as total,
          coalesce(sum(als.qty), 0) as no_of_line_items,
          coalesce(count(als.part_no), 0) as no_of_lines
          from
          tbl_all_sales als
          inner join
          tbl_sales_officer so ON lower(trim(als.s_e_code)) = lower(trim(so.sales_officer_code))
          where
          als.qty > 0 and so.sales_officer_id = " . $officer_id . "
          and als.date_edit = '" . $date . "'
          group by so.sales_officer_id";
//        $sql = "select 
//    round(coalesce(sum(distinct po.amount), 0), 2) as total,
//    coalesce(sum(item_qty), 0) as no_of_line_items,
//    coalesce(count(pod.item_id), 0) as no_of_lines
//from
//    tbl_dealer_purchase_order po
//        inner join
//    tbl_dealer_purchase_order_detail pod ON po.purchase_order_id = pod.purchase_order_id
//        inner join
//    tbl_dealer td ON po.dealer_id = td.delar_id
//where
//    po.tour_status = 1
//        and po.date = '" . $date . "'
//        and td.sales_officer_id = " . $officer_id . "
//        and pod.status = 1";
        return $this->db->mod_select($sql);
    }

    public function getDailyBudget($officer_id, $date) {
        $explode = explode("-", $date);
        $year = $explode[0];
        $month = '';
        if (isset($explode[1])) {
            $month = $explode[1];
        }

        $sql = "select 
    round(coalesce((budget_amount / number_of_working_days),
                    0),
            2) as daily_budget
from
    tbl_sales_officer_wise_budget
where
    year = " . $year . " and month = " . $month . "
        and sales_officer_id = " . $officer_id . "
        and status = 1";



        return $this->db->mod_select($sql);
    }

    public function getDailyReturnValue($officer_id, $date) {
        $sql = "select 
    round(coalesce((sum(als.selling_val)), 0), 2) as total_return
from
    tbl_all_sales als
        inner join
    tbl_sales_officer so ON lower(trim(als.s_e_code)) = lower(trim(so.sales_officer_code))
where
    so.sales_officer_id = " . $officer_id . "
        and als.date_edit = '" . $date . "'
        and als.qty < 0
        and als.status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select[0]->total_return;
    }

    public function countCategoryCount($officer_id, $date, $visit_category) {
        $sql = "select 
    coalesce(count(visit_category), 0) as category
from
    tbl_sales_officer_visit
where
    visit_date = '" . $date . "' and status = 1
        and sales_officer_id = " . $officer_id . "
        and visit_category = " . $visit_category;
        return $this->db->mod_select($sql);
    }

    public function countPurposeCount($officer_id, $date, $visit_purpose) {
        $sql = "select 
    coalesce(count(visit_purpose), 0) as purpose
from
    tbl_sales_officer_visit
where
    visit_date = '" . $date . "' and status = 1
        and sales_officer_id = " . $officer_id . "
        and visit_purpose = " . $visit_purpose;
        return $this->db->mod_select($sql);
    }

    public function getOrderDetails($officer_id, $date) {
        $sql = "select 
    concat(po.purchase_order_number,
            ', ',
            td.delar_name,
            ', ',
            'Rs.',
            po.amount) as details
from
    tbl_dealer_purchase_order po
        inner join
    tbl_dealer_purchase_order_detail pod ON po.purchase_order_id = pod.purchase_order_id
        inner join
    tbl_dealer td ON po.dealer_id = td.delar_id
        inner join
    tbl_item it ON pod.item_id = it.item_id
where
    po.tour_status = 1
        and po.date = '" . $date . "'
        and td.sales_officer_id = " . $officer_id . "
        and pod.status = 1
group by po.purchase_order_id";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getPurchaseOrders($officer_id, $date) {
        $sql = "select 
    po.purchase_order_id, po.purchase_order_number
from
    tbl_dealer_purchase_order po
        inner join
    tbl_dealer_purchase_order_detail pod ON po.purchase_order_id = pod.purchase_order_id
        inner join
    tbl_dealer td ON po.dealer_id = td.delar_id
        inner join
    tbl_item it ON pod.item_id = it.item_id
where
    po.tour_status = 1
        and po.date = '" . $date . "'
        and td.sales_officer_id = " . $officer_id . "
        and pod.status = 1
group by po.purchase_order_id";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getAllTourPurchaseOrderDetails($order_id) {
        $sql = "select 
    pod.item_id, it.item_part_no, it.description, pod.item_qty
from
    tbl_dealer_purchase_order po
        inner join
    tbl_dealer_purchase_order_detail pod ON po.purchase_order_id = pod.purchase_order_id
        inner join
    tbl_item it ON pod.item_id = it.item_id
where
    po.tour_status = 1
        and pod.status = 1
        and po.purchase_order_id = " . $order_id;
        return $this->db->mod_select($sql);
    }

//Branding functions...............................//
    public function getDealerBrandingDetails($officer_id, $date) {
        $sql = "select 
    concat('Dealers: ',
            group_concat(concat(td.delar_name,
                        ', ',
                        td.delar_account_no,
                        ', ',
                        bd.description),
                '| ')) as dealer_bradings
from
    tbl_branding_details bd
        inner join
    tbl_dealer td ON bd.selected_id = td.delar_id
where
    bd.added_date = '" . $date . "'
        and bd.sales_officer_id = " . $officer_id . "
        and bd.tour_status = 1
        and bd.status = 1
        and bd.category_id = 1";
        return $this->db->mod_select($sql);
    }

    public function getGarageBrandingDetails(
    $officer_id, $date) {
        $sql = " select
                concat('Garage: ',
                tg.garage_name,
                ', ',
                bd.description) as garage_brandings
                from
                tbl_branding_details bd
                inner join
                tbl_garage tg ON bd.selected_id = tg.garage_id
                where
                bd.added_date = '" . $date . "'
                and bd.sales_officer_id = " . $officer_id . "
                and bd.tour_status = 1
                and bd.status = 1
                and bd.category_id = 2";
        return $this->db->mod_select($sql);
    }

    public function getFleetOwnerBrandings(
    $officer_id, $date) {
        $sql = "select 
    concat('Fleet Owners: ',
            group_concat(concat(tc.customer_name,
                        ', ',
                        tc.cust_account_no,
                        ', ',
                        bd.description),
                '| ')) as fo_brandings
from
    tbl_branding_details bd
        inner join
    tbl_customer tc ON bd.selected_id = tc.customer_id
where
    bd.added_date = '" . $date . "'
        and bd.sales_officer_id = " . $officer_id . "
        and bd.tour_status = 1
        and bd.status = 1
        and bd.category_id = 3";
        return $this->db->mod_select($sql);
    }

    public function getNewDealerBrandings(
    $officer_id, $date) {
        $sql = "select 
    concat('Shops: ',
            group_concat(concat(nrs.shop_name,
                        ', ',
                        nrs.shop_code,
                        ', ',
                        bd.description),
                ' |')) as new_dealer_branding
from
    tbl_branding_details bd
        inner join
    tbl_non_reg_shops nrs ON bd.selected_id = nrs.shop_id
where
    bd.added_date = '" . $date . "'
        and bd.sales_officer_id = " . $officer_id . "
        and bd.tour_status = 1
        and bd.status = 1
        and bd.category_id = 4";
        return $this->db->mod_select($sql);
    }

    public function getVehicleOwnerBrandings(
    $officer_id, $date) {
        $sql = "select 
    concat('Vehicle Owners: ',
            group_concat(concat(tc.customer_name,
                        ', ',
                        'Vehicle Reg No.: ',
                        tv.vehicle_reg_no,
                        ', ',
                        bd.description),
                '| ')) as new_vo_branding
from
    tbl_branding_details bd
        inner join
    tbl_vehicle tv ON bd.selected_id = tv.vehicle_id
        inner join
    tbl_customer tc ON tv.customer_id = tc.customer_id
where
    bd.added_date = '" . $date . "'
        and bd.sales_officer_id = " . $officer_id . "
        and bd.tour_status = 1
        and bd.status = 1
        and bd.category_id = 5";
        return $this->db->mod_select($sql);
    }

//    public function getNewCustomerBrandings(
//    $officer_id, $date) {
//        $sql = " select
//                concat('New Customer: ',
//                tc.customer_name,
//                ', ',
//                tc.cust_account_no,
//                ', ',
//                bd.description) as nc_branding
//                from
//                tbl_branding_details bd
//                inner join
//                tbl_customer tc ON bd.selected_id = tc.customer_id
//                where
//                bd.added_date = '" . $date . "'
//                and bd.sales_officer_id = " . $officer_id . "
//                and bd.tour_status = 1
//                and bd.status = 1
//                and bd.category_id = 6";
//        return $this->db->mod_select($sql);
//    }
    //Market Info functions...............................//
    public function getDealerMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('Dealer: ',
                td.delar_name,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as dealer_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_dealer td ON cp.delar_id = td.delar_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 1
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    public function getGarageMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('Garage: ',
                tg.garage_name,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as garage_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_garage tg ON cp.delar_id = tg.garage_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 2
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    public function getFleetOwnerMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('Fleet Owner: ',
                tc.customer_name,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as fo_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_customer tc ON cp.delar_id = tc.customer_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 3
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    public function getNewShopMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('New Dealer: ',
                td.delar_name,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as nd_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_dealer td ON cp.delar_id = td.delar_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 4
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    public function getVehicleOwnerMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('Vehicle Owner: ',
                tc.customer_name,
                ', ',
                tv.vehicle_reg_no,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as vo_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_vehicle tv ON cp.delar_id = tv.vehicle_id
                inner join
                tbl_customer tc ON tv.customer_id = tc.customer_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 5
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    public function getNewCustomerMarketInfo(
    $officer_id, $date) {
        $sql = " select
                concat('New Customer: ',
                tc.customer_name,
                ', TATA: ',
                it.item_part_no,
                ', Non TATA: ',
                cp.competitor_part_no,
                ', ',
                cp.importer) as nc_info
                from
                tbl_competitor_parts cp
                inner join
                tbl_item it ON cp.item_id = it.item_id
                inner join
                tbl_customer tc ON cp.delar_id = tc.customer_id
                where
                cp.added_date = '" . $date . "'
                and cp.category_id = 6
                and cp.status = 1
                and cp.tour_status = 1
                and cp.sales_officer_id = " . $officer_id;
        return $this->db->mod_select($sql);
    }

    //Category functioins.................................
    public function getDealerVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('Dealers: ',
                concat(td.delar_shop_name,
                ', ',
                td.delar_account_no)) as visit_dealers
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_dealer td ON sov.selected_id = td.delar_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 1";
        return $this->db->mod_select($sql);
    }

    public function getGarageVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('Garages: ',
                concat(tg.garage_name,
                ', ',
                tg.garage_account_no)) visit_garage
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_garage tg ON sov.selected_id = tg.garage_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 2";
        return $this->db->mod_select($sql);
    }

    public function getFleetOwnerVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('Fleet Owners: ',
                concat(tc.customer_name,
                ', ',
                tc.cust_account_no)) visit_fleetowners
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_customer tc ON sov.selected_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 3";
        return $this->db->mod_select($sql);
    }

    public function getNewDealerVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('New Dealers: ',
                concat(td.delar_shop_name,
                ', ',
                td.delar_account_no)) as visit_new_dealers
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_dealer td ON sov.selected_id = td.delar_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 4";
        return $this->db->mod_select($sql);
    }

    public function getVOVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('Vehicle Owners: ',
                concat(tc.customer_name,
                ', ',
                tc.cust_account_no,
                ', ',
                tv.vehicle_reg_no)) as visit_new_vo
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
                inner join
                tbl_customer tc ON tv.customer_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 5";
        return $this->db->mod_select($sql);
    }

    public function getNewCustomerVisitDetails(
    $officer_id, $date) {
        $sql = " select
                group_concat('New Customers: ',
                concat(tc.customer_name,
                ', ',
                tc.cust_account_no)) as visit_new_customers
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_customer tc ON sov.selected_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 6";
        return $this->db->mod_select($sql);
    }

    //Visit Only functions

    public function getVisitOnlyDealers(
    $officer_id, $date) {
        $sql = " select
                concat('Dealers: ',
                group_concat(concat(td.delar_name, ', ', td.delar_account_no))) as visit_only_dealers
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_dealer td ON sov.selected_id = td.delar_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 1
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getVisitOnlyGarages(
    $officer_id, $date) {
        $sql = " select
                concat('Garages: ',
                group_concat(concat(tg.garage_name,
                ', ',
                tg.garage_account_no))) as visit_only_garages
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_garage tg ON sov.selected_id = tg.garage_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 2
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getVisitOnlyFleetOwners(
    $officer_id, $date) {
        $sql = " select
                concat('Fleet Owners: ',
                group_concat(concat(tc.customer_name,
                ', ',
                tc.cust_account_no))) as visit_only_fos
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_customer tc ON sov.selected_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 3
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getVisitOnlyNewDealers(
    $officer_id, $date) {
        $sql = " select
                concat('New Dealers: ',
                group_concat(concat(td.delar_name, ', ', td.delar_account_no))) as visit_only_new_dealers
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_dealer td ON sov.selected_id = td.delar_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = $officer_id
                and sov.visit_category = 4
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getVisitOnlyVOs(
    $officer_id, $date) {
        $sql = " select
                concat('Vehicle Owners: ',
                group_concat(concat(tc.customer_name,
                ', ',
                tc.cust_account_no, ', ', tv.vehicle_reg_no))) as visit_only_vos
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
                inner join
                tbl_customer tc ON tv.customer_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 5
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getVisitOnlyNewCustomers(
    $officer_id, $date) {
        $sql = " select
                concat('New Customers: ',
                group_concat(concat(tc.customer_name,
                ', ',
                tc.cust_account_no))) as visit_only_ncs
                from
                tbl_sales_officer_visit sov
                inner join
                tbl_customer tc ON sov.selected_id = tc.customer_id
                where
                sov.visit_date = '" . $date . "'
                and sov.sales_officer_id = " . $officer_id . "
                and sov.visit_category = 6
                and sov.visit_purpose = 5";
        return $this->db->mod_select($sql);
    }

    public function getDailyCashPayments($officer_id, $date) {
        $sql = "select 
    concat(td.delar_name,
            ': ',
            ', invoice: ',
            ddo.invoice_no,
            ', wip: ',
            ddo.wip_no,
            ', Rs.',
            round(sum(cp.cash_payment), 2)) as cash_payment
from
    tbl_cash_payment cp
        inner join
    tbl_dealer_deliver_order ddo ON cp.deliver_order_id = ddo.deliver_order_id
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
where
    cp.sales_officer_id = " . $officer_id . "
        and cp.added_date = '" . $date . "'
        and cp.tour_status = 1
group by cp.deliver_order_id";
        return $this->db->mod_select($sql);
    }

    public function getDailyChequePayments($officer_id, $date) {
        $sql = "select 
    concat(td.delar_name,
            ': ',
            ', invoice: ',
            ddo.invoice_no,
            ', wip: ',
            ddo.wip_no,
            ', Cheque No: ',
            cqp.cheque_no,
            ', Rs.',
            round(sum(cqp.cheque_payment), 2)) as cheque_payment
from
    tbl_cheque_payment cqp
        inner join
    tbl_dealer_deliver_order ddo ON cqp.deliver_order_id = ddo.deliver_order_id
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
where
    cqp.sales_officer_id = " . $officer_id . "
        and cqp.added_date = '" . $date . "'
        and cqp.tour_status = 1
group by cqp.deliver_order_id";
        return $this->db->mod_select($sql);
    }

    public function getDailyBankDepositPayments($officer_id, $date) {
        $sql = "select 
    concat(td.delar_name,
            ': ',
            ', invoice: ',
            ddo.invoice_no,
            ', wip: ',
            ddo.wip_no,
            ', Bank: ',
            tb.bank_name,
            ', Slip: ',
            bdp.slip_no,
            ', Rs.',
            round(sum(bdp.deposit_payment), 2)) as deposit_payment
from
    tbl_bank_deposit_payment bdp
        inner join
    tbl_dealer_deliver_order ddo ON bdp.deliver_order_id = ddo.deliver_order_id
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
        inner join
    tbl_bank tb ON bdp.bank_id = tb.bank_id
where
    bdp.sales_officer_id = " . $officer_id . "
        and bdp.added_date = '" . $date . "'
        and bdp.tour_status = 1
group by bdp.deliver_order_id";
        return $this->db->mod_select($sql);
    }

//---------------------------------------Daily Summary (Salesman Tracking)-- Dinesh-----------------------------------

    public function getDealerVisitHistory($dealer_id) {
        $sql = "select 
    sov.visit_date,
    so.sales_officer_name,
    vp.purpose_id_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_dealer td ON sov.selected_id = td.delar_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
where
    sov.visit_category = 1
        and sov.status = 1
        and sov.selected_id = " . $dealer_id;
        return $this->db->mod_select($sql);
    }

    public function getGarageVisitHistory($garage_id) {
        $sql = "select 
    sov.visit_date,
    so.sales_officer_name,
    vp.purpose_id_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_garage tg ON sov.selected_id = tg.garage_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
where
    sov.visit_category = 2
        and sov.status = 1
        and sov.selected_id = " . $garage_id;
        return $this->db->mod_select($sql);
    }

    public function getFleetOwnerVisitHistory($fo_id) {
        $sql = "select 
    sov.visit_date,
    so.sales_officer_name,
    vp.purpose_id_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
where
    sov.visit_category = 3
        and sov.status = 1
        and sov.selected_id = " . $fo_id;
        return $this->db->mod_select($sql);
    }

    public function getNewShopVisitHistory($shop_id) {
        $sql = "select 
    sov.visit_date,
    so.sales_officer_name,
    vp.purpose_id_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_non_reg_shops nrs ON sov.selected_id = nrs.shop_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
where
    sov.visit_category = 4
        and sov.status = 1
        and sov.selected_id = " . $shop_id;
        return $this->db->mod_select($sql);
    }

    public function getVehicleOwnerVisitHistory($vehicle_id) {
        $sql = "select 
    sov.visit_date,
    so.sales_officer_name,
    vp.purpose_id_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
where
    sov.visit_category = 5
        and sov.status = 1
        and sov.selected_id = " . $vehicle_id;
        return $this->db->mod_select($sql);
    }

    //-------------------------------------------------sales officer wise history-------------------------
//    public function getDealerWiseHistory($start_date, $end_date, $officer_id) {
//        $sql = "select 
//    sov.sales_officer_visit_id,
//    sov.visit_date,
//    sov.visit_time,
//    sov.route,
//    vc.category_name,
//    vp.purpose_id_name,
//    td.delar_name,
//    sov.description
//from
//    tbl_sales_officer_visit sov
//        inner join
//    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
//        inner join
//    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
//        inner join
//    tbl_dealer td ON sov.selected_id = td.delar_id
//where
//    sov.status = 1
//        and sov.visit_category = 1
//        and sov.sales_officer_id = " . $officer_id . "
//        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
//        return $this->db->mod_select($sql);
//    }

    public function getDealerWiseHistory($start_date, $end_date, $officer_id) {
        $sql = "select 
    sov.sales_officer_visit_id,
    sov.visit_date,
    sov.visit_time,
    sov.route,
    vc.category_name,
    vp.purpose_id_name,
    td.delar_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_dealer td ON sov.selected_id = td.delar_id
where
    sov.status = 1
        and sov.visit_category = 1
        and sov.sales_officer_id = " . $officer_id . "
        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getGarageWiseHistory($start_date, $end_date, $officer_id) {
        $sql = "select 
    sov.sales_officer_visit_id,
    sov.visit_date,
    sov.visit_time,
    sov.route,
    vc.category_name,
    vp.purpose_id_name,
    tg.garage_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_garage tg ON sov.selected_id = tg.garage_id
where
    sov.status = 1
        and sov.visit_category = 2
        and sov.sales_officer_id = " . $officer_id . "
        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getFleetOwnerWiseHistory($start_date, $end_date, $officer_id) {
        $sql = "select 
    sov.sales_officer_visit_id,
    sov.visit_date,
    sov.visit_time,
    sov.route,
    vc.category_name,
    vp.purpose_id_name,
    tv.vehicle_reg_no,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
where
    sov.status = 1
        and sov.visit_category = 3
        and sov.sales_officer_id = " . $officer_id . "
        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getNewShopWiseHistory($start_date, $end_date, $officer_id) {

        $sql = "select 
    sov.sales_officer_visit_id,
    sov.visit_date,
    sov.visit_time,
    sov.route,
    vc.category_name,
    vp.purpose_id_name,
    nrs.shop_name,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_non_reg_shops nrs ON sov.selected_id = nrs.shop_id
where
    sov.status = 1
        and sov.visit_category = 4
        and sov.sales_officer_id = " . $officer_id . "
        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getVehicleOwnerWiseHistory($start_date, $end_date, $officer_id) {
        $sql = "select 
    sov.sales_officer_visit_id,
    sov.visit_date,
    sov.visit_time,
    sov.route,
    vc.category_name,
    vp.purpose_id_name,
    tv.vehicle_reg_no,
    sov.description
from
    tbl_sales_officer_visit sov
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_vehicle tv ON sov.selected_id = tv.vehicle_id
where
    sov.status = 1
        and sov.visit_category = 5
        and sov.sales_officer_id = " . $officer_id . "
        and sov.visit_date between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

}
