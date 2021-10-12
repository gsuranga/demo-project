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
            "status" => 1
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
                "status" => 1
            );
            $this->db->insertData('tbl_swot_analysis_detail', $marketing_activities);



            $swot_analysis_detail_id = $this->db->insert_id();
            $dealerCount = $data_array['dealer_count' . $j];

            for ($k = 1; $k <= $dealerCount; $k++) {
                $dealer = array(
                    "swot_analysis_detail_id" => $swot_analysis_detail_id,
                    "dealer_id" => $data_array['dealr_id' . $j . '_' . $k],
                    "status" => 1
                );
                $this->db->insertData('tbl_swot_dealers', $dealer);
            }
        }
        
        $this->db->__endTransaction();
        return $this->db->status();
    }

}
