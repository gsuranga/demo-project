<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class campaign_model extends C_Model {

    public $salesofficerid = '';
    public $branchid = '';

    function __construct() {
        parent::__construct();
        $typename = $this->session->userdata('typename');

        if ($typename == 'Sales Officer') {
            $this->salesofficerid = $this->session->userdata('employe_id');

            $this->getbranchId();
        }
        if ($typename == 'APM') {
            $this->salesofficerid = $this->session->userdata('employe_id');

            $this->getbranchId2();
        }

        //echo $this->salesofficerid;
        //echo $this->branchid;
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

    //public $branchid = 1;
//    private function getBranchID(){
//        $sql="select branch_id from tbl_sales_officer where sales_officer_id=$this->salesofficerid";
//        echo  $this->db->mod_select($sql);
//        
//    }

    public function getDealer($q, $select) {

        // $currentdate= date("Y-m-d");
        // $before3month = date("Y-m-d",strtotime("-3 Months"));
        $sql = "SELECT delar_account_no,delar_id,delar_name FROM tbl_dealer where status='1' and delar_account_no like '$q%' limit 12";
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

    public function getDealer_name($q, $select) {

        // $currentdate= date("Y-m-d");
        // $before3month = date("Y-m-d",strtotime("-3 Months"));
        $sql = "SELECT delar_name,delar_account_no,delar_id FROM tbl_dealer where status='1' and delar_name like '$q%'limit 12";
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

    /////////sales officer insert campaign to database///////////////
    function insertcampaigntodatabase($data, $name, $campaigntype) {
        //echo $_REQUEST['estimate_row_count'];
        /// print_r($data);
        $quotation_file_name = $name;
        $rowcount = $data['dealercount'];
        $campaigndate = $data['campaign_date'];
        $objective = $data['objective'];
        $location = $data['location_field'];
        $invitees = $data['invitees'];
        $dimo_employeel = $data['dimo_employee'];
        $material = $data['material'];
        $other_requirement = $data['other_requirement'];
        $budgect = $data['budget'];
        $piorety = "SELECT max(tbl_campaign.priority) As maxp FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer on tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign_sales_officer.id_sales_officer=$this->salesofficerid and tbl_campaign_sales_officer.pending =0 ORDER BY tbl_campaign.priority";
        $this->db->__beginTransaction();
        $maxpiorety = $this->db->mod_select($piorety);
        $max;
        foreach ($maxpiorety As $value) {
            $max = $value->maxp;
        }
        $campaigndetail = array(
            "campaign_type" => $campaigntype,
            "campaign_date" => $campaigndate,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "objective" => $objective,
            "location" => $location,
            "invitees" => $invitees,
            "dimo_employees" => $dimo_employeel,
            "material_required_from_ho" => $material,
            "other_requirement_from_branch" => $other_requirement,
            "budget" => $budgect,
            "quotation_file_name" => $quotation_file_name,
            "priority" => $max + 1
        );


        $this->db->insertData('tbl_campaign', $campaigndetail);
        $lastcampaignId = $this->db->insert_id();

        for ($i = 1; $i <= $rowcount; $i++) {
            if (isset($data['dealar_id_' . $i])) {
                $dealerId = $data['dealar_id_' . $i];
                $to = $data['to_' . $i];
                $eia_ = $data['eia_' . $i];

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
        for ($row = 1; $row <= $_REQUEST['estimate_row_count']; $row++) {
            if (isset($_REQUEST['description_memo_' . $row])) {
                $description = $_REQUEST['description_memo_' . $row];
                $cost_per_unit = $_REQUEST['estamate_cost_memo_' . $row];
                $qty = $_REQUEST['qty_memo_' . $row];
                $setimateDetail = array(
                    "id_campaign" => $lastcampaignId,
                    "description" => $description,
                    "estimated_cost_per_unit" => $cost_per_unit,
                    "quantity" => $qty
                );
                $this->db->insertData('tbl_campaign_estimate', $setimateDetail);
            }
        }
        //--------------------------------------------------------
        $salesofficerdetail = array(
            "id_campaign" => $lastcampaignId,
            "id_sales_officer" => $this->salesofficerid,
            "id_branch" => $this->branchid,
        );
        $this->db->insertData('tbl_campaign_sales_officer', $salesofficerdetail);
        $this->db->__endTransaction();
        return $this->db->status();

        //  print_r($data);
        // print_r($name);
        // print_r($campaigntype);
    }

    //--------------------------------As New-----------------------------
    function insertAsnew($name) {
        //print_r($_REQUEST);
        $this->db->__beginTransaction();

        $piorety = "SELECT max(tbl_campaign.priority) As maxp FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer on tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign_sales_officer.id_sales_officer=$this->salesofficerid and tbl_campaign_sales_officer.pending =0 ORDER BY tbl_campaign.priority";
        $maxpiorety = $this->db->mod_select($piorety);
        $max;
        foreach ($maxpiorety As $value) {
            $max = $value->maxp;
        }

        $campaigndetail = array(
            "campaign_type" => $_REQUEST['campaigntype'],
            "campaign_date" => $_REQUEST['datefield'],
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "objective" => $_REQUEST['campaign_objective'],
            "material_required_from_ho" => $_REQUEST['material'],
            "other_requirement_from_branch" => $_REQUEST['otherrequerment'],
            "budget" => $_REQUEST['budject'],
            "quotation_file_name" => $name,
            "priority" => $max + 1,
            "has_hold_campaign" => 1
        );
        //print_r($campaigndetail);

        $this->db->insertData('tbl_campaign', $campaigndetail);
        $lastcampaignId = $this->db->insert_id();

        for ($i = 0; $i < $_REQUEST['rowcount']; $i++) {
            $dealerId = $_REQUEST['dealerId_' . $i];
            $to = $_REQUEST['newto_' . $i];
            $eia_ = $_REQUEST['newincr_' . $i];
            $oldto = $_REQUEST['dealerto_' . $i];
            $oldeia_ = $_REQUEST['dealerincreace_' . $i];


            $dealerdetail = array(
                "id_campaign" => $lastcampaignId,
                "id_dealer" => $dealerId,
                "current_to" => str_replace(',', '', $to),
                "increase_to" => str_replace(',', '', $eia_)
            );
            $this->db->insertData('tbl_campaign_dealer', $dealerdetail);

            $olddeatil = array(
                "id_campaign" => $lastcampaignId,
                "id_dealer" => $dealerId,
                "current_t_o" => str_replace(',', '', $oldto),
                "increase_to" => str_replace(',', '', $oldeia_)
            );
            // print_r($olddeatil);
            $this->db->insertData('tbl_hold_campaign_dealer', $olddeatil);
        }
        //print_r($dealerdetail);
        $salesofficerdetail = array(
            "id_campaign" => $lastcampaignId,
            "id_sales_officer" => $this->salesofficerid,
            "id_branch" => $this->branchid,
        );
        $this->db->insertData('tbl_campaign_sales_officer', $salesofficerdetail);
        //  print_r($_REQUEST);

        $holddetails = array(
            "id_campaign" => $lastcampaignId,
            "apm_approve" => $_REQUEST['apmpr'],
            "ho_approve" => $_REQUEST['hopr'],
            "hold_date" => $_REQUEST['duedate'],
            "hold_campaign_id" => $_REQUEST['campaignid']
        );
        $this->db->insertData('tbl_hold_campaign', $holddetails);
        // print_r($holddetails);
        $this->db->__endTransaction();
        echo $this->db->status();


        $this->db->__endTransaction();
    }

//------------------------------------------------------------------
    function getAllPendingCampaign() {
        $sql = "Select tbl_campaign_sales_officer.id_campaign,tbl_campaign_sales_officer.id_campaing_sales_officer,tbl_campaign.campaign_type,tbl_campaign.added_date,tbl_campaign.campaign_date,tbl_campaign. budget,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name	 
            from tbl_campaign_sales_officer tbl_campaign_sales_officer Left Join tbl_sales_officer tbl_sales_officer on tbl_campaign_sales_officer.id_sales_officer=tbl_sales_officer.sales_officer_id Join tbl_campaign tbl_campaign on tbl_campaign_sales_officer.id_campaign=tbl_campaign.id_campaing
            where tbl_campaign_sales_officer.id_branch=$this->branchid and tbl_campaign_sales_officer.pending=0 ORDER BY tbl_campaign.priority";
        return $this->db->mod_select($sql);
    }

    //-------------------get Campaign for HO------------------------------
    function getAllPendingCampaignforHo() {
        $sql = "select  tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.budget,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name,tbl_branch.branch_account_no,tbl_campaign.added_date As sent_date,tbl_campaign_apm.added_date As apm_approved_date,tbl_campaign_apm.id_campaign_apm As apmCampaignId
            from tbl_campaign_apm tbl_campaign_apm left 
            Join tbl_campaign_sales_officer tbl_campaign_sales_officer on 
            tbl_campaign_apm.id_campaing_sales_officer=tbl_campaign_sales_officer.id_campaing_sales_officer join  tbl_campaign tbl_campaign on tbl_campaign_sales_officer.id_campaign=tbl_campaign.id_campaing join tbl_sales_officer tbl_sales_officer on tbl_campaign_sales_officer.id_sales_officer=tbl_sales_officer.sales_officer_id join tbl_branch tbl_branch on tbl_sales_officer.branch_id=tbl_branch.branch_id where tbl_campaign_apm.apm_pending =1 and tbl_campaign_apm.ho_pending=0";
        return $this->db->mod_select($sql);
    }

//----------------------------------------------------------------------------------------------------
//    public function getcampaigndetailforapm($id) {
////        $sql = "select tbl_campaign_dealer.id_dealer,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.objective,tbl_campaign.material_required_from_ho,tbl_campaign.other_requirement_from_branch,tbl_campaign.quotation_file_name,tbl_campaign.budget 
////            from tbl_campaign tbl_campaign Left join tbl_campaign_dealer tbl_campaign_dealer on tbl_campaign.id_campaing=tbl_campaign_dealer.id_campaign where tbl_campaign.id_campaing=" . $id;
//        $sql = "select tbl_campaign.id_campaing,tbl_dealer.delar_id,tbl_dealer.delar_account_no,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.objective,tbl_campaign.material_required_from_ho,tbl_campaign.other_requirement_from_branch,tbl_campaign.quotation_file_name,tbl_campaign.budget,tbl_campaign_dealer.id_dealer,tbl_campaign_dealer.current_to,tbl_campaign_dealer.increase_to
//            from tbl_campaign tbl_campaign Left join tbl_campaign_dealer tbl_campaign_dealer on tbl_campaign.id_campaing=tbl_campaign_dealer.id_campaign Join tbl_dealer on tbl_campaign_dealer.id_dealer=tbl_dealer.delar_id where tbl_campaign.id_campaing=" . $id;
//        return $this->db->mod_select($sql);
//    }
     public function getcampaigndetailforapm($id) {
//        $sql = "select tbl_campaign_dealer.id_dealer,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.objective,tbl_campaign.material_required_from_ho,tbl_campaign.other_requirement_from_branch,tbl_campaign.quotation_file_name,tbl_campaign.budget 
//            from tbl_campaign tbl_campaign Left join tbl_campaign_dealer tbl_campaign_dealer on tbl_campaign.id_campaing=tbl_campaign_dealer.id_campaign where tbl_campaign.id_campaing=" . $id;
        $sql = "select tbl_campaign.id_campaing,tbl_dealer.delar_id,tbl_dealer.delar_name,tbl_dealer.delar_account_no,tbl_campaign.campaign_type,tbl_campaign.location,tbl_campaign.invitees,tbl_campaign.dimo_employees,tbl_campaign.campaign_date,tbl_campaign.objective,tbl_campaign.material_required_from_ho,tbl_campaign.other_requirement_from_branch,tbl_campaign.quotation_file_name,tbl_campaign.budget,tbl_campaign_dealer.id_dealer,tbl_campaign_dealer.current_to,tbl_campaign_dealer.increase_to
            from tbl_campaign tbl_campaign Left join tbl_campaign_dealer tbl_campaign_dealer on tbl_campaign.id_campaing=tbl_campaign_dealer.id_campaign Join tbl_dealer on tbl_campaign_dealer.id_dealer=tbl_dealer.delar_id where tbl_campaign.id_campaing=" . $id;
        return $this->db->mod_select($sql);
    }

    //------------------insert New Campaign Type--------------------------------------------
    public function insertcampaigntypetodatabase() {
        $newcampaigntype = array(
            "type_description" => $_REQUEST['new_campaign_type']
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_type', $newcampaigntype);
        $this->db->__endTransaction();
    }

    public function getAllCampaignType() {
        $sql = "select * from tbl_campaign_type where status =1";
        return $this->db->mod_select($sql);
    }

    public function deletecampaign($id) {

        $update = array(
            "status" => '0'
        );
        $where = array(
            "id_campaing_type" => $id
        );

        $this->db->__beginTransaction();
        $update0 = $this->db->update("tbl_campaign_type", $update, $where);
        echo $update0;
        $this->db->__endTransaction();
    }

//----------------------APM Accepting Campaign---------------------------------------
    public function apmAcceptingCampaign($salesId, $remark) {
        $apmAcceptcampaignDetail = array(
            "id_campaing_sales_officer" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "apm_pending" => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_apm', $apmAcceptcampaignDetail);

        $update = array(
            "pending" => '1'
        );
        $where = array(
            "id_campaing_sales_officer" => $salesId
        );

        $this->db->update("tbl_campaign_sales_officer", $update, $where);





        $this->db->__endTransaction();
    }

    public function hoAcceptingCampaign($salesId, $remark) {
        $hoAcceptcampaignDetail = array(
            "id_campaign_apm" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "ho_pending" => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_ho', $hoAcceptcampaignDetail);

        $update = array(
            "ho_pending " => '1'
        );
        $where = array(
            "id_campaign_apm" => $salesId
        );

        $this->db->update("tbl_campaign_apm", $update, $where);





        $this->db->__endTransaction();
    }

    public function apmholdcampaign($salesId, $remark, $due_date) {
        $apmAcceptcampaignDetail = array(
            "id_campaing_sales_officer" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "apm_pending" => 2,
            "due_date" => $due_date
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_apm', $apmAcceptcampaignDetail);

        $update = array(
            "pending" => '1'
        );
        $where = array(
            "id_campaing_sales_officer" => $salesId
        );

        $this->db->update("tbl_campaign_sales_officer", $update, $where);





        $this->db->__endTransaction();
    }

    public function hoholdcampaign($salesId, $remark, $due_date) {

        $hoAcceptcampaignDetail = array(
            "id_campaign_apm" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "ho_pending" => 2,
            "due_date" => $due_date
        );
        print_r($hoAcceptcampaignDetail);
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_ho', $hoAcceptcampaignDetail);

        $update = array(
            "ho_pending " => '1'
        );
        $where = array(
            "id_campaign_apm " => $salesId
        );

        $this->db->update("tbl_campaign_apm", $update, $where);





        $this->db->__endTransaction();
    }

    public function apmrejectcampaign($salesId, $remark, $due_date) {
        $apmAcceptcampaignDetail = array(
            "id_campaing_sales_officer" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "apm_pending" => 3,
            "due_date" => $due_date
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_apm', $apmAcceptcampaignDetail);

        $update = array(
            "pending" => '1'
        );
        $where = array(
            "id_campaing_sales_officer" => $salesId
        );

        $this->db->update("tbl_campaign_sales_officer", $update, $where);





        $this->db->__endTransaction();
    }

    public function horejectcampaign($salesId, $remark, $due_date) {
        $apmAcceptcampaignDetail = array(
            "id_campaign_apm" => $salesId,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "remark" => $remark,
            "ho_pending" => 3,
            "due_date" => $due_date
        );
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_campaign_ho', $apmAcceptcampaignDetail);

        $update = array(
            "ho_pending" => '1'
        );
        $where = array(
            "id_campaign_apm" => $salesId
        );

        $this->db->update("tbl_campaign_apm", $update, $where);





        $this->db->__endTransaction();
    }

    //-------------------------Notification--------------------------
    public function getNotification() {
        $sql = "select tbl_campaign.id_campaing,tbl_campaign.campaign_date,tbl_campaign_apm.apm_pending,tbl_campaign_apm.added_date As Apm_added_date,tbl_campaign_apm.due_date as APM_DUE_DATE,
            tbl_campaign_apm.remark As APM_REMARK,tbl_campaign_ho.ho_pending ,tbl_campaign_ho.added_date AS HO_added_date,tbl_campaign_ho.remark AS HO_REMARK,tbl_campaign_ho.due_date AS HO_DUE_DATE,tbl_campaign_sales_officer.id_campaing_sales_officer from tbl_campaign_sales_officer tbl_campaign_sales_officer 
            Left Join tbl_campaign_apm tbl_campaign_apm on tbl_campaign_sales_officer.id_campaing_sales_officer=tbl_campaign_apm.id_campaing_sales_officer left join tbl_campaign_ho tbl_campaign_ho on tbl_campaign_apm.id_campaign_apm=tbl_campaign_ho.id_campaign_apm Left Join tbl_campaign tbl_campaign on tbl_campaign_sales_officer.id_campaign=tbl_campaign.id_campaing where 
            tbl_campaign_sales_officer.pending =1 and tbl_campaign_sales_officer.id_sales_officer=$this->salesofficerid and tbl_campaign.after_ho_permition=0";

        return $this->db->mod_select($sql);
    }

    //--------------Priority-----------------------------------
    public function getPriority() {
        $sql = "SELECT tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_campaign.campaign_date,tbl_campaign.budget,tbl_campaign.added_date FROM  tbl_campaign tbl_campaign LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer on tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign_sales_officer.id_sales_officer=$this->salesofficerid and tbl_campaign_sales_officer.pending =0 ORDER BY tbl_campaign.priority";
        return $this->db->mod_select($sql);
    }

    public function setPriority() {
        //print_r($_REQUEST);
        $k = 0;
        foreach ($_REQUEST['deliverdetail'] as $value) {
            $data1 = array(
                "priority" => $_REQUEST['deliverdetail'][$k]['piaroty']
            );
            $where = array(
                "id_campaing" => $_REQUEST['deliverdetail'][$k]['campaignid']
            );
            $this->db->__beginTransaction();
//            print_r($where);
//            print_r($data1);
            $this->db->update("tbl_campaign", $data1, $where);
            $this->db->__endTransaction();
            $k++;
        }
    }

    function insertaftercampaign($detail) {
        $id = $detail[0];
        $accualcost = $detail[1];
        $comment = $detail[2];
        $areaimprove = $detail[3];
        $name = $detail[4];
        $campaigndetail = array(
            "id_campaign" => $id,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "actual_cost" => $accualcost,
            "so_comment" => $comment,
            "areas_to_improve" => $areaimprove,
            "images" => $name
        );
        //  print_r($campaigndetail);
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_after_campaign', $campaigndetail);
        $update = array(
            "after_ho_permition" => 1
        );
        $where = array(
            "id_campaing" => $id
        );

        $this->db->update("tbl_campaign", $update, $where);
        $this->db->__endTransaction();
    }

    function getholddetails($cid) {
        $this->db->__beginTransaction();
        $sql = "select * from tbl_hold_campaign where id_campaign=$cid";
        return $cs = $this->db->mod_select($sql);
    }

    function checkholdcampaigndealer($campaignid, $dealerid) {
        //echo $campaignid;

        $sql = "select * from tbl_hold_campaign_dealer where id_campaign=$campaignid and id_dealer=$dealerid";

        $cs = $this->db->mod_select($sql);
        //print_r($cs);
        $cnt = count($cs);
        if ($cnt > 0) {
            return $cs;
        }
//         if (mysql_num_rows($sql) == 0) {
//            echo '0';
//
//            //results are empty, do something here 
//        } else {
//            echo '1';
//        }
    }

    function getTO() {
        $currentdate = date("Y-m-d");
        $before3month = date("Y-m-d", strtotime("-3 Months"));

        $dealerID = $_REQUEST['dealerid'];
        $this->db->__beginTransaction();
        $sql = "select sum(qty*unit_price/3) As T_O from tbl_dealer_sales  where id_dealer=$dealerID and sold_date between '$before3month' and '$currentdate' and status='1'";
        return $cs = $this->db->mod_select($sql);
    }

    function getTOforAsnew($dto) {
        $currentdate = date("Y-m-d");
        $before3month = date("Y-m-d", strtotime("-3 Months"));

        $dealerID = $dto;
        $this->db->__beginTransaction();
        $sql = "select sum(qty*unit_price/3) As T_O from tbl_dealer_sales  where id_dealer=$dealerID and sold_date between '$before3month' and '$currentdate' and status='1'";
        return $cs = $this->db->mod_select($sql);
    }

    function hl($d) {
        echo $d;
    }

    //FInish Campaign for APM----------------
    function getAllFinishedCampaign() {
        $sql = "Select tbl_campaign_sales_officer.id_campaign,tbl_campaign_sales_officer.id_campaing_sales_officer,tbl_campaign.campaign_type,tbl_campaign.added_date,tbl_campaign.campaign_date,tbl_campaign. budget,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name	 
            from tbl_campaign_sales_officer tbl_campaign_sales_officer Left Join tbl_sales_officer tbl_sales_officer on tbl_campaign_sales_officer.id_sales_officer=tbl_sales_officer.sales_officer_id Join tbl_campaign tbl_campaign on tbl_campaign_sales_officer.id_campaign=tbl_campaign.id_campaing
            where tbl_campaign_sales_officer.id_branch=$this->branchid and tbl_campaign_sales_officer.pending=0 ORDER BY tbl_campaign.priority";
        return $this->db->mod_select($sql);
    }

    function apmgetaftercampaigndetail() {
        $sql = "select tbl_campaign.id_campaing,tbl_after_campaign.added_date AS sent_date,tbl_sales_officer.sales_officer_name,tbl_sales_officer.sales_officer_account_no ,tbl_after_campaign.actual_cost ,tbl_after_campaign.images,tbl_after_campaign.areas_to_improve,tbl_after_campaign.so_comment,tbl_after_campaign.apm_comment,tbl_after_campaign.ho_comment 

                from tbl_after_campaign LEFT JOIN tbl_campaign tbl_campaign ON tbl_after_campaign.id_campaign=tbl_campaign.id_campaing LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_after_campaign.id_campaign=tbl_campaign_sales_officer.id_campaign LEFT JOIN tbl_sales_officer tbl_sales_officer ON tbl_campaign_sales_officer.id_sales_officer=tbl_sales_officer.sales_officer_id where tbl_campaign_sales_officer.id_branch=$this->branchid AND tbl_campaign.after_ho_permition=1 And tbl_after_campaign.apm_seen=0";
        return $this->db->mod_select($sql);
    }

    function hogetaftercampaigndetail() {
        $sql = "select tbl_campaign.id_campaing,tbl_after_campaign.added_date AS sent_date,tbl_sales_officer.sales_officer_name,tbl_sales_officer.sales_officer_account_no ,tbl_after_campaign.actual_cost ,tbl_after_campaign.images,tbl_after_campaign.areas_to_improve,tbl_after_campaign.so_comment,tbl_after_campaign.apm_comment,tbl_after_campaign.ho_comment 

                from tbl_after_campaign LEFT JOIN tbl_campaign tbl_campaign ON tbl_after_campaign.id_campaign=tbl_campaign.id_campaing LEFT JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_after_campaign.id_campaign=tbl_campaign_sales_officer.id_campaign LEFT JOIN tbl_sales_officer tbl_sales_officer ON tbl_campaign_sales_officer.id_sales_officer=tbl_sales_officer.sales_officer_id where tbl_campaign.after_ho_permition=1 And tbl_after_campaign.apm_seen=1 and tbl_after_campaign.ho_seen=0";
        return $this->db->mod_select($sql);
    }

    function apmsetcompletedforfinishedcampaign($camid, $apmcomment) {
        $update = array(
            "apm_comment" => $apmcomment,
            "apm_seen" => 1
        );
        $where = array(
            "id_campaign" => $camid
        );

        $this->db->update("tbl_after_campaign", $update, $where);
    }

    function hosetcompletedforfinishedcampaign($camid, $apmcomment) {
        $update = array(
            "ho_comment" => $apmcomment,
            "ho_seen" => 1
        );
        $where = array(
            "id_campaign" => $camid
        );

        $this->db->update("tbl_after_campaign", $update, $where);
    }

    function getsalesOfficerN($userdata) {
        $sql = "select sales_officer_name from tbl_sales_officer where sales_officer_id=$userdata and status=1";
        $na = $this->db->mod_select($sql);
        echo $na[0]->sales_officer_name;
    }

    function getpersondetail($id) {
        $sql = "SELECt  tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.sales_officer_name,tbl_sales_type.sales_type_name  FROM tbl_sales_officer tbl_sales_officer LEFT JOIN tbl_sales_type tbl_sales_type ON tbl_sales_officer.sales_type_id=tbl_sales_type.sales_type_id where tbl_sales_officer.sales_officer_id=$id";
        return $this->db->mod_select($sql);
    }
    //--------------get Estimate--------------
    function getestimatedescription($camp_id){
        
        $sql="Select * from tbl_campaign_estimate where id_campaign=$camp_id";
        return $this->db->mod_select($sql);
        //echo $camp_id;
    }

}

?>
