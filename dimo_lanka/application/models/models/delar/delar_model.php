<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delar_model
 *
 * @author shamil ilyas
 */
class delar_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllDealer() {
        //$sql = "select td.delar_id,td.delar_name,td.dealer_contact_no,td.telP,td.telO,td.mobileP,td.mobileO,td.emailP,td.emailO,td.delar_address,td.delar_account_no,td.delar_code,td.delar_shop_name,tso.sales_officer_id,tso.sales_officer_name,tb.branch_id,tb.branch_name  from tbl_dealer td INNER JOIN tbl_sales_officer tso ON td.sales_officer_id=tso.sales_officer_id INNER JOIN tbl_branch tb ON td.branch_id=tb.branch_id WHERE td.status='1' and td.so_update_status=1";
        $sql = "select 
    td.delar_id,
    td.delar_name,
    td.telP,
    td.telO,
    td.mobileP,
    td.mobileO,
    td.emailP,
    td.emailO,
	td.discount_percentage,
    td.delar_address,
    td.delar_account_no,
    td.delar_code,
    td.delar_shop_name,
    tso.sales_officer_id,
    tso.sales_officer_name,
    tb.branch_id,
    tb.branch_name,
    td.latitude,
    td.longitude
from
    tbl_dealer td
        INNER JOIN
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        INNER JOIN
    tbl_branch tb ON td.branch_id = tb.branch_id
WHERE
    td.status = '1'";
        return $this->db->mod_select($sql);
    }

    public function view_dealer_sales_officer_wise() {
        $id = $this->session->userdata('employe_id');
        $sql = "select 
    td.delar_id,
    td.delar_name,
    td.telP,
    td.telO,
    td.mobileP,
    td.mobileO,
    td.emailP,
    td.emailO,
    td.delar_address,
    td.delar_account_no,
    td.delar_code,
    td.delar_shop_name,
    tso.sales_officer_id,
    tso.sales_officer_name,
    tb.branch_id,
    tb.branch_name,
    td.latitude,
    td.longitude
from
    tbl_dealer td
        INNER JOIN
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        INNER JOIN
    tbl_branch tb ON td.branch_id = tb.branch_id
WHERE
    td.status = '1'
        and td.so_update_status = 1 and td.sales_officer_id=$id";
        return $this->db->mod_select($sql);
    }

    public function viewAllDealerforsalesoficer() {
        $id = $this->session->userdata('employe_id');
        //$sql = "select td.delar_id,td.delar_name,td.dealer_contact_no,td.delar_address,td.delar_account_no,td.delar_code,td.delar_shop_name,tso.sales_officer_id,tso.sales_officer_name,tb.branch_id,tb.branch_name from tbl_dealer td INNER JOIN tbl_sales_officer tso ON td.sales_officer_id=tso.sales_officer_id INNER JOIN tbl_branch tb ON td.branch_id=tb.branch_id WHERE td.status='1' and td.so_update_status=0";
        $sql = "select 
    td.delar_id,
    td.delar_name,
    td.delar_address,
    td.delar_account_no,
    td.delar_code,
    td.delar_shop_name,
    tso.sales_officer_id,
    tso.sales_officer_name,
    tb.branch_id,
    tb.branch_name
from
    tbl_dealer td
        INNER JOIN
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        INNER JOIN
    tbl_branch tb ON td.branch_id = tb.branch_id
WHERE
    td.status = '1'
        and td.so_update_status = 0 and td.sales_officer_id=$id";
        return $this->db->mod_select($sql);
    }

    public function getSalesOfficer($q, $select, $brID) {

        $sql = "select 
    tso.sales_officer_name, tso.sales_officer_id
from
    tbl_branch as tb
        inner join
    tbl_sales_officer as tso ON tb.branch_id = tso.branch_id
where
    tb.branch_id = '$brID' and tso.status = 1 and tso.sales_officer_name LIKE '" . $q . "%' ";


//        $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE sales_officer_name LIKE '" . $q . "%' ";
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

    public function getAllBranch($q, $select, $Emp_id) {
        $sql = "select branch_id,branch_name,branch_code from tbl_branch WHERE branch_name LIKE '" . $q . "%'";

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

    public function createDelarnew($data_Array, $yes, $no) {

        $where = array(
            'delar_id' => $data_Array['delar_id']
        );

//        echo "ybbhy";
        $data = array(
            // 'delar_code' => $data_Array['dealer_code'],
            'delar_name' => $data_Array['delar_name'],
            // 'delar_account_no' => $data_Array['delar_account_no'],
            //  'delar_shop_name' => $data_Array['delar_shop_name'],
            // 'sales_officer_id' => $data_Array['sales_officer_id'],
            //'branch_id' => $data_Array['branch_id'],
            'delar_address' => $data_Array['address'],
            'telP' => $data_Array['telp'],
            'mobileP' => $data_Array['mobilep'],
            'emailP' => $data_Array['emailp'],
            'dob' => $data_Array['dob'],
            'religion' => $data_Array['cmb_religion_type'],
            'business_type' => $data_Array['cmb_business_type'],
            'nic_no' => $data_Array['nic'],
            'passport_no' => $data_Array['passport'],
            'business_started_date' => $data_Array['date_of_the_start'],
            'period_with_dimo' => $data_Array['periods'],
            'manager_name' => $data_Array['mgr_name'],
            'business_address' => $data_Array['address_mgr'],
            'male_staff' => $data_Array['staff_male'],
            'female_staff' => $data_Array['staff_female'],
            'fax_no' => $data_Array['fax'],
            'computer_status' => $yes . $no,
            'telO' => $data_Array['contact_land'],
            'mobileO' => $data_Array['contact_mobile'],
            'emailO' => $data_Array['email'],
            'status' => 1,
            'so_update_status' => 1
        );
//        print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createDelar($data_Array) {
        $data = array(
            'delar_code' => $data_Array['dealer_code'],
            'delar_name' => $data_Array['delar_name'],
            'dealer_type' => $data_Array['type'],
            'discount_percentage' => $data_Array['Cedit_limit'],
            'delar_account_no' => $data_Array['delar_account_no'],
            'delar_shop_name' => $data_Array['delar_shop_name'],
            'sales_officer_id' => $data_Array['sales_officer_id'],
            'branch_id' => $data_Array['branch_id'],
            'longitude' => $data_Array['long'],
            'latitude' => $data_Array['lat'],
            'status' => 1,
            'so_update_status' => 0
        );
        // print_r($data);
        $query = $this->db->get_where('tbl_dealer', array('delar_account_no' => $data_Array['delar_account_no'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_dealer", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function updateDealer($data_Array) {
        print_r($data_Array);
        $where = array(
            'delar_id' => $data_Array['m_delar_id']
        );


        $data = array(
            'delar_code' => $data_Array['dealer_code'],
            'delar_name' => $data_Array['m_delar_name'],
            'dealer_type' => $data_Array['type'],
            'delar_account_no' => $data_Array['m_delar_account_no'],
            'discount_percentage' => $data_Array['Cedit_limit'],
            'delar_shop_name' => $data_Array['m_delar_shop_name'],
            'sales_officer_id' => $data_Array['sales_officer_id'],
            'branch_id' => $data_Array['branch_id'],
            'longitude' => $data_Array['longs'],
            'latitude' => $data_Array['lats']
        );

        // print_r($where);
        //print_r($data);
        $query = $this->db->get_where('tbl_dealer', array('delar_code' => $data_Array['dealer_code'], 'delar_name' => $data_Array['m_delar_name'], 'delar_account_no' => $data_Array['m_delar_account_no'], 'delar_shop_name' => $data_Array['m_delar_shop_name'], 'sales_officer_id' => $data_Array['sales_officer_id'], 'longitude' => $data_Array['longs'], 'latitude' => $data_Array['lats'], 'discount_percentage' => $data_Array['Cedit_limit']));

        if ($query->num_rows() > 0) {

            return false;
        } else {

            $this->db->__beginTransaction();
            $this->db->update("tbl_dealer", $data, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function deleteDealer($id) {
        $where = array(
            'delar_id' => $id
        );

        $data = array(
            'status' => 0
        );

        $this->db->__beginTransaction();

        $this->db->update("tbl_dealer", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getDealerDetails($search_key, $key_value) {
        $sql = "select 
    *, br.branch_code, upper(so.sales_officer_code) as sales_officer_code
from
    tbl_dealer td
        inner join
    tbl_branch br ON td.branch_id = br.branch_id
inner join tbl_sales_officer so on td.sales_officer_id = so.sales_officer_id
where
    td." . $search_key . " = '" . $key_value . "'
        and td.status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getmoredetails($pur_id) {
        $sql = "SELECT * FROM `tbl_dealer` WHERE `delar_id`='$pur_id'";
        return $this->db->mod_select($sql);
    }

    public function updateDealermoreinfo($dataArray) {
        $where = array(
            'delar_id' => $dataArray['delerid']
        );


        $data = array(
            'delar_address' => $dataArray['address'],
            'telP' => $dataArray['ptel'],
            'telO' => $dataArray['otel'],
            'dealer_type' => $dataArray['type'],
            'mobileP' => $dataArray['pmobile'],
            'mobileO' => $dataArray['omobile'],
            'emailP' => $dataArray['pemail'],
            'emailO' => $dataArray['oemail'],
            'so_update_status' => 1
        );



        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getAllBranchcodes($q, $select) {
        $sql = "select branch_id,branch_code,branch_name from tbl_branch WHERE branch_code LIKE '" . $q . "%'";

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

    public function getdistrict() {
        $sql = "select district_id,district_name from tbl_district where status='1'";
        $resultSet = $this->db->mod_select($sql);
        return $resultSet;
    }

}

?>
