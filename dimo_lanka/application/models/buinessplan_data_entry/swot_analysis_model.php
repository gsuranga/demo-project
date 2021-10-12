<?php

class swot_analysis_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCampaignType() {
        $sql = "select * from tbl_campaign_type  WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function appendCampaignType() {
        $sql = "select * from tbl_campaign_type  WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function get_dealer($q, $select) {
        $sql = "SELECT tt.delar_name, tt.delar_id, tt.delar_account_no, tty.sales_officer_code
                FROM tbl_dealer tt 
                inner join 
                tbl_sales_officer tty on tt.sales_officer_id = tty.sales_officer_id 
                where tt.status='1' and tt.delar_name like '$q%' limit 10";
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

    public function getArea() {
        $sql = "select * from tbl_area  WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function appendArea() {
        $sql = "select * from tbl_area  WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function insertSwot($data_array) {
        $this->db->__beginTransaction();
        $swot = array(
            "financial_year" => $data_array['year'],
            "type" => $data_array['s_type'],
            "user_id" => $this->session->userdata('id'),
            "description" => $data_array['dscription'],
            "support_needed_ho" => $data_array['support_needed_ho'],
            "support_needed_branch" => $data_array['support_needed_branch'],
            "deadline" => $data_array['deadline'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "status" => 0
        );

        $this->db->insertData('tbl_swot_analysis', $swot);
        
        $swot_analysis_id = $this->db->insert_id();
        $rowCount = $data_array['update_row_count'];

        for ($i = 1; $i <= $rowCount; $i++) {
            $action_steps = array(
                "action_step" => $data_array['action_steps_' . $i . '_'],
                "swot_analysis_id" => $swot_analysis_id
            );
            $this->db->insertData('tbl_swot_action_steps', $action_steps);
        }

        $marketingCount = $data_array['marketing_count'];

        for ($j = 1; $j <= $marketingCount; $j++) {
            $marketing_activities = array(
                "swot_analysis_id" => $swot_analysis_id,
                "campaign_type" => $data_array['cmb_campaign_type' . $j],
                "target_market" => $data_array['target_market' . $j],
                "description" => $data_array['dscriptn' . $j],
                "target_month" => $data_array['target_month' . $j],
                "area_id" => $data_array['cmbArea' . $j],
                "no_of_participants" => $data_array['participants' . $j],
                "total_cost" => $data_array['tot_cost' . $j],
                "events" => $data_array['no_event' . $j],
                "status" => 0
            );
            $this->db->insertData('tbl_swot_analysis_detail', $marketing_activities);



            $swot_analysis_detail_id = $this->db->insert_id();
            $dealerCount = $data_array['dealer_count' . $j];

            for ($k = 1; $k <= $dealerCount; $k++) {
                $dealer = array(
                    "swot_analysis_detail_id" => $swot_analysis_detail_id,
                    "dealer_id" => $data_array['dealr_id' . $j . '_' . $k],
                    "status" => 0
                );
                $this->db->insertData('tbl_swot_dealers', $dealer);
            }
        }
        
        $this->db->__endTransaction();
        return $this->db->status();
    }
    public function savingCrearingCtype($data){
        
     $a = $_POST['nofevents'];
     $b = $_POST['dscription'];
     $c = $_POST['items'];
          $data = array(
                    "description" => $b,
                    "items" => $c,
                    "noEventspMonth" => $a,
                    "status" => 0,
                );
                $this->db->insertData('tbl_campaignadmin', $data);
     
    }
    public function getallCompaignItems() {
        $sql ="SELECT id_item,item,sub_status,costPerItem,status FROM tbl_campaign_items order by id_item  DESC ";
         return $this->db->mod_select($sql);
    }
    public function submititems($da) {
     $a = $_POST['items'];
     $b = $_POST['status'];
     $c = $_POST['sb_Status'];
     $d = $_POST['cost'];
          $data = array(
                    "item" => $a,
                    "status" => $b,
                    "sub_status" => $c,
                    "costPerItem" => $d,
                );

               return  $this->db->insertData('tbl_campaign_items', $data);
    }
    
        public function getallBranches($q, $select) {
        $sql = "SELECT branch_id,branch_name FROM tbl_branch WHERE branch_name like '$q%' limit 10";
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
    public function getallCompaignSummary($branch) {
//        $res = array();
   $sql ="select 
   #tar.description,
   tar.target_month,
   tar.events,
   tar.campaign_type,
   (SELECT description FROM tbl_campaignadmin WHERE compaignID =  tar.description) as description,
   (select type_description from tbl_campaign_type where id_campaing_type = tar.campaign_type) campainType
   ,(select count(description)from tbl_swot_analysis_detail where description= tar.description and target_month = tar.target_month and campaign_type = tar.campaign_type) as descriCounter
   from
   tbl_swot_analysis_detail tar where tar.area_id  =  (select area_id from tbl_branch where branch_id = {$branch}  limit 1) and tar.status = 0 
";   
  return $this->db->mod_select($sql); 
     
    
    }
    
    public function getdescriptions() {
        $sql = "SELECT compaignID,description FROM tbl_campaignadmin";
        return $this->db->mod_select($sql);
    }
    
    public function getallDetail() {
        $sql = "SELECT 
(select type_description from tbl_campaign_type where id_campaing_type = tar.campaign_type) campaign_type,            
tar.target_month,
#tar.description,
(SELECT description FROM tbl_campaignadmin WHERE compaignID =  tar.description) as description,
tar.events,tar.total_cost,
(SELECT t.delar_name from tbl_dealer t where t.delar_id = td.dealer_id) name,
(SELECT tb.branch_name from tbl_branch tb where tb.area_id = tar.area_id LIMIT 1) brach
FROM tbl_swot_analysis_detail tar

inner join tbl_swot_dealers td on td.swot_analysis_detail_id = tar.swot_analysis_detail_id  and tar.status = 0 ";
        return $this->db->mod_select($sql);
    }
    
    

}
