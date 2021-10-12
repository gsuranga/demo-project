<?php

/**
 * Description of new_campaign_model
 *
 * @author insaf
 */
class new_campaign_model extends C_Model {

    public $salesofficerid = '';
    public $branchid = '';
    public $ty = '';

    function __construct() {
        parent::__construct();
        $typename = $this->session->userdata('typename');
        $this->ty = $typename;
        if ($typename == 'Sales Officer') {
            $this->salesofficerid = $this->session->userdata('employe_id');

            $this->getbranchId();
        }
        if ($typename == 'APM') {
            $this->salesofficerid = $this->session->userdata('employe_id');

            $this->getbranchId2();
        }
    }

    function getbranchId() {

        $sql = "select branch_id from tbl_sales_officer where sales_officer_id=$this->salesofficerid";
        $d = $this->db->mod_select($sql);
        //print_r($d[0]['']);
        $this->branchid = $d[0]->branch_id;
    }

    function getbranchId2() {

        $sql = "select branch_id from tbl_apm where apm_id=$this->salesofficerid";
        $d = $this->db->mod_select($sql);
        //print_r($d[0]['']);
        $this->branchid = $d[0]->branch_id;
    }

    //-----Get campaign detail for sales officer-------------
    function get_campaign_detail($type_id, $from_date, $to_date) {

        $campaign_type = $type_id;
        $aso = $this->salesofficerid;
        $branch = $this->branchid;
        $append = "";
        $date_range = "AND tbl_campaign.campaign_date BETWEEN '$from_date' AND '$to_date'";
        $type_wise = "";
        if ($this->ty == 'Sales Officer') {

            $type_wise = 'tbl_campaign_sales_officer.id_sales_officer=' . $aso;
        } else if ($this->ty == 'APM') {
            $type_wise = 'tbl_campaign_sales_officer.id_branch=' . $branch;
        } else if ($this->ty == 'Super Admin') {
            $type_wise = 'tbl_campaign_sales_officer.id_branch!=0';
        }
        if ($campaign_type == 1) {
            $append = "ORDER BY tbl_campaign.id_campaing DESC";
        } else if ($campaign_type == 2) {
            $append = " AND (tbl_campaign_sales_officer.pending=0 OR(tbl_campaign_sales_officer.pending=1 AND tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=0  )) AND  tbl_campaign.after_ho_permition=0 AND tbl_campaign.status =1 ORDER BY tbl_campaign.priority ";
        } else if ($campaign_type == 3) {
            $append = "AND tbl_campaign_sales_officer.pending=1 AND tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=1 AND tbl_campaign.after_ho_permition=0 AND tbl_campaign.status=1 ORDER BY tbl_campaign.id_campaing DESC";
        } else if ($campaign_type == 4) {
            $append = "AND tbl_campaign_sales_officer.pending=1 AND tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=1 AND tbl_campaign.after_ho_permition=1 AND tbl_campaign.status=1 ORDER BY tbl_campaign.id_campaing DESC";
        } else if ($campaign_type == 5) {
            // $append = "AND tbl_campaign_sales_officer.pending=1 AND(( tbl_campaign_apm.apm_pending=2 AND tbl_campaign_apm.ho_pending=0 AND tbl_campaign_ho.ho_pending=0 AND tbl_campaign.after_ho_permition=0)OR ( tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=2 AND tbl_campaign.after_ho_permition=0) )AND tbl_campaign.status=1";
            $append = "AND tbl_campaign_sales_officer.pending=1 AND(( tbl_campaign_apm.apm_pending=2 AND tbl_campaign_apm.ho_pending=0 AND tbl_campaign.after_ho_permition=0)OR ( tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=2 AND tbl_campaign.after_ho_permition=0) )AND tbl_campaign.status=1 ORDER BY tbl_campaign.id_campaing DESC";
        } else if ($campaign_type == 6) {
            //$append = "AND tbl_campaign_sales_officer.pending=1 AND(( tbl_campaign_apm.apm_pending=3 AND tbl_campaign_apm.ho_pending=0 AND tbl_campaign_ho.ho_pending=0 AND tbl_campaign.after_ho_permition=0)OR ( tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=3 AND tbl_campaign.after_ho_permition=0) )AND tbl_campaign.status=1";
            $append = "AND tbl_campaign_sales_officer.pending=1 AND(( tbl_campaign_apm.apm_pending=3 AND tbl_campaign_apm.ho_pending=0 AND tbl_campaign.after_ho_permition=0)OR ( tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=3 AND tbl_campaign.after_ho_permition=0) )AND tbl_campaign.status=1 ORDER BY tbl_campaign.id_campaing DESC";
        } else if ($campaign_type == 7) {
            $append = "AND tbl_campaign_sales_officer.pending=1 AND tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=1 AND tbl_campaign.after_ho_permition=3 AND tbl_campaign.status=1 ";
        } else if ($campaign_type == 8) {
            //$append = "AND tbl_campaign_sales_officer.pending=1 AND(( tbl_campaign_apm.apm_pending=2 AND tbl_campaign_apm.ho_pending=0 AND tbl_campaign_ho.ho_pending=0 AND tbl_campaign.after_ho_permition=2)OR ( tbl_campaign_apm.apm_pending=1 AND tbl_campaign_apm.ho_pending=1 AND tbl_campaign_ho.ho_pending=2 AND tbl_campaign.after_ho_permition=2) )AND tbl_campaign.status=1 ORDER BY tbl_campaign.id_campaing DESC";
            $append = "AND tbl_campaign.is_as_new=1 ORDER BY tbl_campaign.id_campaing DESC";
        }


        //  $sql = "SELECT tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.added_date,tbl_campaign.after_ho_permition FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON  tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign LEFT JOIN tbl_campaign_apm tbl_campaign_apm ON tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer LEFT JOIN tbl_campaign_ho tbl_campaign_ho ON tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm where $type_wise.$append";
        // $sql = "SELECT tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.added_date,tbl_campaign.after_ho_permition,tbl_campaign_sales_officer.id_sales_officer AS aso_id,(SELECT sales_officer_name FROM tbl_sales_officer WHERE sales_officer_id=aso_id) AS aso_name FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON  tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign LEFT JOIN tbl_campaign_apm tbl_campaign_apm ON tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer LEFT JOIN tbl_campaign_ho tbl_campaign_ho ON tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm where $type_wise.$append";
        $sql = "SELECT tbl_campaign.id_campaing,tbl_campaign.hold_campaign_no,tbl_campaign.is_as_new,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.added_date,tbl_campaign.after_ho_permition,tbl_campaign_sales_officer.id_sales_officer AS aso_id,tbl_campaign_sales_officer.id_branch AS branch_id_c,(SELECT sales_officer_name FROM tbl_sales_officer WHERE sales_officer_id=aso_id) AS aso_name,(SELECT branch_name FROM tbl_branch WHERE branch_id=branch_id_c ) AS BranchName FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON  tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign LEFT JOIN tbl_campaign_apm tbl_campaign_apm ON tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer LEFT JOIN tbl_campaign_ho tbl_campaign_ho ON tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm where $type_wise $date_range $append";

        return $this->db->mod_select($sql);
    }

    //----------get_campaing_total_detail-------------------------
    function get_campaing_total_detail($campaign_id) {
        $sql = "SELECT * FROM tbl_campaign where id_campaing=$campaign_id";
        return $this->db->mod_select($sql);
    }

    function get_target_dealer($campaign_id) {
        $sql = "SELECT * FROM  tbl_campaign_dealer tbl_campaign_dealer LEFT JOIN tbl_dealer tbl_dealer ON tbl_campaign_dealer.id_dealer= tbl_dealer.delar_id where tbl_campaign_dealer.id_campaign=$campaign_id";
        return $this->db->mod_select($sql);
    }

    function get_estimatedetail($campaign_id) {
        $sql = "SELECT * FROM `tbl_campaign_estimate` WHERE id_campaign=$campaign_id";
        return $this->db->mod_select($sql);
    }

    //----------------------------get Campaign Status--------------------------------------------
    function get_campaign_status($campaign_id) {
        //$sql = "SELECT tbl_campaign_sales_officer.pending AS apm_seen,tbl_campaign_apm.apm_pending AS amp_approve,tbl_campaign_apm.due_date AS apm_due_date,tbl_campaign_apm.added_date AS Approve_date_apm,tbl_campaign_ho.added_date AS Approve_date_ho,tbl_campaign_ho.due_date AS ho_due_date,tbl_campaign_apm.ho_pending AS ho_seen,tbl_campaign_ho.ho_pending AS ho_approve,tbl_campaign_apm.remark AS apm_remark,tbl_campaign_ho.remark As ho_remark FROM  tbl_campaign_sales_officer tbl_campaign_sales_officer LEFT JOIN tbl_campaign_apm tbl_campaign_apm ON tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer LEFT JOIN tbl_campaign_ho tbl_campaign_ho ON tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm WHERE tbl_campaign_sales_officer.id_campaign=$campaign_id";
        $sql = "SELECT tbl_campaign_sales_officer.id_campaing_sales_officer,tbl_campaign_sales_officer.pending AS apm_seen,tbl_campaign_apm.id_campaign_apm,tbl_campaign_apm.apm_pending AS amp_approve,tbl_campaign_apm.due_date AS apm_due_date,tbl_campaign_apm.added_date AS Approve_date_apm,tbl_campaign_ho.added_date AS Approve_date_ho,tbl_campaign_ho.due_date AS ho_due_date,tbl_campaign_apm.ho_pending AS ho_seen,tbl_campaign_ho.ho_pending AS ho_approve,tbl_campaign_apm.remark AS apm_remark,tbl_campaign_ho.remark As ho_remark FROM  tbl_campaign_sales_officer tbl_campaign_sales_officer LEFT JOIN tbl_campaign_apm tbl_campaign_apm ON tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer LEFT JOIN tbl_campaign_ho tbl_campaign_ho ON tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm WHERE tbl_campaign_sales_officer.id_campaign=$campaign_id
";
        return $this->db->mod_select($sql);
    }

    //-------------------------Auto Complete-----------------------//

    public function get_branch_code($q, $select) {
        $sql = "SELECT branch_code,branch_name,branch_id FROM tbl_branch where branch_code like '$q%' limit 12";
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

    public function get_branch_name($q, $select) {
        $sql = "SELECT branch_name,branch_code,branch_id FROM tbl_branch where branch_name like '$q%' limit 12";
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

    public function aso_finished_campaign($image) {
        $update_array = array(
            'after_ho_permition' => 1
        );
        $where_array = array(
            'id_campaing' => $_REQUEST['campaign_id_main']
        );

        $insert_array = array(
            'id_campaign' => $_REQUEST['campaign_id_main'],
            'actual_cost' => $_REQUEST['actual_amount_complete_campaign'],
            'so_comment' => $_REQUEST['comment_complete_campaign'],
            'areas_to_improve' => $_REQUEST['areas_to_improve_complete_campaign'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H:i:s'),
            'status' => 1,
            'images' => $image
        );
        print_r($insert_array);
        $this->db->update("tbl_campaign", $update_array, $where_array);
        $this->db->insert('tbl_after_campaign', $insert_array);
    }

    function set_campaign_comment($type, $comment, $id_campaign) {
        $update_array_apm = array(
            'apm_comment' => $comment,
            'apm_seen' => 1
        );

        $update_array_ho = array(
            'ho_comment' => $comment,
            'ho_seen' => 1
        );
        $where = array(
            'id_campaign' => $id_campaign
        );


        if ($type == '1') {
            $this->db->update('tbl_after_campaign', $update_array_apm, $where);
        } else {
            $this->db->update('tbl_after_campaign', $update_array_ho, $where);
        }
    }

    //get After Campaign Detail-------------------------------
    function get_after_campaign_detail($id_campaign) {
        $sql = "SELECT * FROM tbl_after_campaign Where id_campaign=$id_campaign Limit 1";
        return $this->db->mod_select($sql);
    }

    function get_is_commented_finished_campaign($campaign_id, $user_type) {
        
    }

    function get_all_detail_from_hold_campaign($id_campaign) {
        $sql = "SELECT * FROM tbl_campaign Where id_campaing=$id_campaign And status=1";
        return $this->db->mod_select($sql);
    }

    function get_all_campaign_types() {
        $sql = "SELECT * FROM  tbl_campaign_type WHERE status=1";
        return $this->db->mod_select($sql);
    }

    function get_all_target_dealers($campaign_id) {
        $sql = "SELECT `id_dealer` AS DEALER,(Select delar_name FROM tbl_dealer WHERE delar_id=DEALER)As dealer_name,(Select delar_account_no FROM tbl_dealer WHERE delar_id=DEALER) AS account_no,ifnull((SELECT round(sum(tbl_dealer_sales.unit_price*tbl_dealer_sales.qty)/3,2) FROM tbl_dealer_sales Where id_dealer=DEALER AND sold_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() ),0) AS amountt FROM `tbl_campaign_dealer` Where `id_campaign`=$campaign_id And`status`=1";
        return $this->db->mod_select($sql);
    }

    public function get_new_dealer($q, $select) {
        $sql = "SELECT delar_id AS DEALER ,delar_name,delar_account_no,ifnull((SELECT round(sum(tbl_dealer_sales.unit_price*tbl_dealer_sales.qty)/3,2) FROM tbl_dealer_sales Where id_dealer=DEALER AND sold_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() ),0) AS amountt FROM tbl_dealer WHERE sales_officer_id=12 AND delar_name like '$q%' limit 12";
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

    public function get_new_dealer_account_nu($q, $select) {
        $sql = "SELECT delar_id AS DEALER ,delar_name,delar_account_no,ifnull((SELECT round(sum(tbl_dealer_sales.unit_price*tbl_dealer_sales.qty)/3,2) FROM tbl_dealer_sales Where id_dealer=DEALER AND sold_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() ),0) AS amountt FROM tbl_dealer WHERE sales_officer_id=12 AND delar_account_no like '$q%' limit 12";
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

    public function get_all_campaign_estimate($campaign_id) {
        $sql = "SELECT * FROM `tbl_campaign_estimate` WHERE `id_campaign`=$campaign_id";
        return $this->db->mod_select($sql);
    }

    public function insert_as_new_campaign($campaign_array, $file_name) {

        $campaign_table_array = array(
            'campaign_type' => $campaign_array['as_new_campaign_type'],
            'campaign_date' => $campaign_array['as_new_campaign_date'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H:i:s'),
            'objective' => $campaign_array['as_new_campaign_objective'],
            'material_required_from_ho' => $campaign_array['as_new_campaign_mrfho'],
            'other_requirement_from_branch' => $campaign_array['as_new_campaign_orfb'],
            'location' => $campaign_array['as_new_campaign_location'],
            'invitees' => $campaign_array['as_new_campaign_invitees'],
            'dimoinvitees' => $campaign_array['as_new_campaign_dimo_employee'],
            'quotation_file_name' => $file_name,
            'status' => 1,
            'budget' => 0.00,
            'priority' => 0,
            'after_ho_permition' => 0,
            'is_as_new' => 1,
            'hold_campaign_no' => $campaign_array['holded_campaign_id']
        );
        $this->db->insert('tbl_campaign', $campaign_table_array);
        $lastcampaignId = $this->db->insert_id();
        //---------------------Insert Target Dealers----------------------------------------
        for ($i = 1; $i <= $campaign_array['row_count_as_new']; $i++) {
            if (isset($campaign_array['dealer_id_row_' . $i])) {
                $dealerId = $campaign_array['dealer_id_row_' . $i];
                $to = $campaign_array['current_to_' . $i];
                $eia_ = $campaign_array['after_3_month_' . $i];

                $dealerdetail = array(
                    "id_campaign" => $lastcampaignId,
                    "id_dealer" => $dealerId,
                    "current_to" => $to,
                    "increase_to" => $eia_
                );
                $this->db->insertData('tbl_campaign_dealer', $dealerdetail);
            } else {
                
            }
        }
        //------------Insert Estimate Detail----------------------
        for ($row = 1; $row <= $campaign_array['estmate_row_count_as_new']; $row++) {
            if (isset($campaign_array['est_description_' . $row])) {
                $description = $campaign_array['est_description_' . $row];
                $cost_per_unit = $campaign_array['est_unit_price_' . $row];
                $qty = $campaign_array['esti_qty_' . $row];
                $setimateDetail = array(
                    "id_campaign" => $lastcampaignId,
                    "description" => $description,
                    "per_unit" => $cost_per_unit,
                    "qty" => $qty
                );
                $this->db->insertData('tbl_campaign_estimate', $setimateDetail);
            }
        }
        //--------------Sales Officer detail------------------------------------
        $salesofficerdetail = array(
            "id_campaign" => $lastcampaignId,
            "id_sales_officer" => $this->salesofficerid,
            "id_branch" => $this->branchid,
        );
        $this->db->insertData('tbl_campaign_sales_officer', $salesofficerdetail);
        //--------------------hold seen ------------------------
        $senn_array = array(
            'seen_hold_camp' => 1
        );
        $where_arr = array(
            'id_campaing' => $campaign_array['holded_campaign_id']
        );
        $this->db->update('tbl_campaign', $senn_array, $where_arr);
    }

    public function approve_prosscess($user, $type, $forign_key, $approve_comment, $hold_date, $forign_key_2) {
        if ($user == 1) {
            //-----------------tbl_campaign_sales_officer Update--------
            $sales_officer_campaing_update = array('pending' => 1);
            $sales_officer_campaing_where = array('id_campaing_sales_officer' => $forign_key);
            $this->db->update('tbl_campaign_sales_officer', $sales_officer_campaing_update, $sales_officer_campaing_where);
            //--------------tbl_campaign_apm Insert---------------------
            $myarray = array();
            if ($type == 1 || $type == 3) {
                $campaign_apm = array(
                    'id_campaing_sales_officer' => $forign_key,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'remark' => $approve_comment,
                    'apm_pending' => $type,
                    'ho_pending' => 0,
                    'status' => 1,
                );
                $myarray = $campaign_apm;
            } elseif ($type == 2) {
                $campaign_apm2 = array(
                    'id_campaing_sales_officer' => $forign_key,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'remark' => $approve_comment,
                    'due_date' => $hold_date,
                    'apm_pending' => $type,
                    'ho_pending' => 0,
                    'status' => 1,
                );
                $myarray = $campaign_apm2;
            }
            $this->db->insertData('tbl_campaign_apm', $myarray);
        } elseif ($user == 2) {
            //-----tbl_campaign_apm Update--------------------
            $apm_campaing_update = array('ho_pending' => 1);
            $apm_campaing_where = array('id_campaing_sales_officer' => $forign_key);
            $this->db->update('tbl_campaign_apm', $apm_campaing_update, $apm_campaing_where);
            //-----tbl_campaign_ho Insert----------------
            $myarray = array();
            if ($type == 1 || $type == 3) {
                $campaign_ho = array(
                    'id_campaign_apm' => $forign_key_2,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'remark' => $approve_comment,
                    'ho_pending' => $type,
                    'status' => 1,
                );
                $myarray = $campaign_ho;
            } elseif ($type == 2) {
                $campaign_ho2 = array(
                    'id_campaign_apm' => $forign_key_2,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'remark' => $approve_comment,
                    'due_date' => $hold_date,
                    'ho_pending' => $type,
                    'status' => 1,
                );
                $myarray = $campaign_ho2;
            }
            $this->db->insertData('tbl_campaign_ho', $myarray);
        }
    }

    function get_campaign_detail_for_chart($campaign_id) {
        //$sql = "SELECT id_campaign AS campaign_id,id_dealer AS dealer_id,(SELECT added_date FROM tbl_after_campaign WHERE id_campaign=campaign_id )As completed_date,@1month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 31)   ),0)) AS actual_amount_1,@2month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 62)   ),0) )AS actual_amount_2,@3month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 93)   ),0)) AS actual_amount_3,(SELECT sum(increase_to) FROM tbl_campaign_dealer WHERE id_campaign=campaign_id  AND status=1) AS target FROM tbl_campaign_dealer WHERE id_campaign=$campaign_id ";
        // $sql="SELECT id_campaign AS campaign_id,id_dealer AS dealer_id,(SELECT added_date FROM tbl_after_campaign WHERE id_campaign=campaign_id )As completed_date,@ontimecam:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, -31)   ),0)) AS atpromotion,@1month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 31)   ),0)) AS actual_amount_1,@2month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 62)   ),0) )AS actual_amount_2,@3month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 93)   ),0)) AS actual_amount_3,(SELECT sum(increase_to) FROM tbl_campaign_dealer WHERE id_campaign=campaign_id  AND status=1) AS target FROM tbl_campaign_dealer WHERE id_campaign=$campaign_id ";
        $sql = "SELECT id_campaign AS campaign_id,id_dealer AS dealer_id,(SELECT added_date FROM tbl_after_campaign WHERE id_campaign=campaign_id )As completed_date,@ontimecam:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN ADDDATE(completed_date, -31) AND completed_date ),0)) AS atpromotion,@1month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN completed_date AND  ADDDATE(completed_date, 31)   ),0)) AS actual_amount_1,@2month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN  ADDDATE(completed_date, 31) AND  ADDDATE(completed_date, 62)   ),0) )AS actual_amount_2,@3month:=(ifnull((SELECT sum(qty*unit_price) FROM tbl_dealer_sales WHERE id_dealer=dealer_id AND status=1 AND sold_date BETWEEN ADDDATE(completed_date, 62) AND  ADDDATE(completed_date, 93)   ),0)) AS actual_amount_3,(SELECT sum(increase_to) FROM tbl_campaign_dealer WHERE id_campaign=campaign_id  AND status=1) AS target FROM tbl_campaign_dealer WHERE id_campaign=$campaign_id";
        return $this->db->mod_select($sql);
    }

    function insert_create_campaign($campaign_array, $file_name) {
        $campaign_table_array = array(
            'campaign_type' => $campaign_array['create_campaign_type'],
            'campaign_date' => $campaign_array['create_campaign_date'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H:i:s'),
            'objective' => $campaign_array['create_campaign_objective'],
            'material_required_from_ho' => $campaign_array['create_campaign_mrfho'],
            'other_requirement_from_branch' => $campaign_array['create_campaign_orfb'],
            'location' => $campaign_array['create_campaign_location'],
            'invitees' => $campaign_array['create_campaign_invitees'],
            'dimoinvitees' => $campaign_array['create_campaign_dimo_employee'],
            'quotation_file_name' => $file_name,
            'status' => 1,
            'budget' => 0.00,
            'priority' => 0,
            'after_ho_permition' => 0,
            'is_as_new' => 0,
            'hold_campaign_no' => 0,
        );
        $this->db->trans_begin();
        $this->db->insert('tbl_campaign', $campaign_table_array);
        $lastcampaignId = $this->db->insert_id();

        //---------------------Insert Target Dealers----------------------------------------
        for ($i = 1; $i <= $campaign_array['row_count_create']; $i++) {
            if (isset($campaign_array['create_dealer_id_row_' . $i])) {
                $dealerId = $campaign_array['create_dealer_id_row_' . $i];
                $to = $campaign_array['create_current_to_' . $i];
                $eia_ = $campaign_array['create_after_3_month_' . $i];

                $dealerdetail = array(
                    "id_campaign" => $lastcampaignId,
                    "id_dealer" => $dealerId,
                    "current_to" => $to,
                    "increase_to" => $eia_
                );
                $this->db->insertData('tbl_campaign_dealer', $dealerdetail);
            } else {
                
            }
        }
        //------------Insert Estimate Detail----------------------
        for ($row = 1; $row <= $campaign_array['estmate_row_count_create']; $row++) {
            if (isset($campaign_array['create_est_description_' . $row])) {
                $description = $campaign_array['create_est_description_' . $row];
                $cost_per_unit = $campaign_array['create_est_unit_price_' . $row];
                $qty = $campaign_array['create_esti_qty_' . $row];
                $setimateDetail = array(
                    "id_campaign" => $lastcampaignId,
                    "description" => $description,
                    "per_unit" => $cost_per_unit,
                    "qty" => $qty
                );
                $this->db->insertData('tbl_campaign_estimate', $setimateDetail);
            }
        }
        //--------------Sales Officer detail------------------------------------
        $salesofficerdetail = array(
            "id_campaign" => $lastcampaignId,
            "id_sales_officer" => $this->salesofficerid,
            "id_branch" => $this->branchid,
        );
        $this->db->insertData('tbl_campaign_sales_officer', $salesofficerdetail);
    }

    function cancel_campaign($campaign_id_cancel, $reason) {
        $update_array = array(
            'after_ho_permition' => 3,
            'cancel_reason' => $reason,
            'seen_hold_camp' => 1
        );
        $where_array = array(
            'id_campaing' => $campaign_id_cancel
        );
        $this->db->update('tbl_campaign', $update_array, $where_array);
    }

    //--------------------Priority-------------------------------
    function get_campaign_for_set_pririty() {
        $sql = "SELECT tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.budget,tbl_campaign.added_date FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer on tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign_sales_officer.id_sales_officer=$this->salesofficerid and tbl_campaign_sales_officer.pending =0 ORDER BY tbl_campaign.priority";
        return $this->db->mod_select($sql);
    }

    public function setPriority() {

        $k = 0;
        foreach ($_REQUEST['deliverdetail'] as $value) {
            $data1 = array(
                "priority" => $_REQUEST['deliverdetail'][$k]['piaroty']
            );
            $where = array(
                "id_campaing" => $_REQUEST['deliverdetail'][$k]['campaignid']
            );
            $this->db->__beginTransaction();
            $this->db->update("tbl_campaign", $data1, $where);
            $this->db->__endTransaction();
            $k++;
        }
    }

    function get_ASO_detail($cid) {
        $sql = "SELECT sales_officer_name,id_branch AS BRANCHID,(SELECT branch_name FROM tbl_branch where branch_id=BRANCHID) AS branch_name FROM `tbl_sales_officer` LEFT JOIN tbl_campaign_sales_officer ON tbl_sales_officer.`sales_officer_id`=tbl_campaign_sales_officer.id_sales_officer WHERE tbl_campaign_sales_officer.id_campaign=$cid";
        return $this->db->mod_select($sql);
    }

    function get_branches() {
        $sql = "SELECT branch_name,branch_id,branch_code FROM tbl_branch WHERE status=1";
        return $this->db->mod_select($sql);
    }

    function get_3_month_($id) {
        $sql = "SELECT * FROM `tbl_after_3_month` WHERE `campaign_id`=$id";
        return $this->db->mod_select($sql);
    }

    function set_3_month_comment($campaign_id, $comment) {
        $types = $this->session->userdata('typename');
        $user_type = 0;
        if ($types == 'Sales Officer') {
            $user_type = 1;
        } elseif ($types == 'APM') {
            $user_type = 2;
        } elseif ($types == 'Super Admin') {
            $user_type = 3;
        }
        $insert_array = array(
            'campaign_id' => $campaign_id,
            'comment' => $comment,
            'type_id' => $user_type
        );
        $this->db->insertData('tbl_after_3_month', $insert_array);
    }

}
