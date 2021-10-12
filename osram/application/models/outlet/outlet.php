<?php

/**
 * Description of outlet
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class outlet extends C_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertOutlet1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertOutlet1($datapack) {
       // $date = new DateTime();

        $data11 = array(
            "outlet_code" => $datapack['outlet_code'],
            "outlet_registration_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );


        $this->db->__beginTransaction();
        $this->db->insertData("tbl_outlet_registration", $data11);
        $id_outlet_registration = $this->db->insertId();
        $data1 = array(
            "id_outlet_registration" => $id_outlet_registration,
            "id_outlet_category" => $datapack['outlet_category_name'],
            "outlet_name" => $datapack['outlet_name'],
            "outlet_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->insertData("tbl_outlet", $data1);
        $outletId = $this->db->insertId();

        $branch_count = $datapack['branch_count'];
        for ($bcount = 1; $bcount < ($branch_count + 1); $bcount++) {
            $type = $datapack['discount_type_' . $bcount];


            $percentage_discount = 0.00;
            $price_discount = 0.00;
            if ($type == '1') {
                $percentage_discount = $datapack['discount_' . $bcount];
            } else if ($type == '2') {
                $price_discount = $datapack['discount_' . $bcount];
            }
            $branch_code = $this->get_Branch_Autogen_ID();
            $data12 = array(
                "branch_code" => $branch_code,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_branch_registration", $data12);
            $id_branch_registration = $this->db->insertId();
            $data3 = array(
                "id_outlet" => $outletId,
                "id_territory" => $datapack['territory_id_' . $bcount],
                "id_branch_registration" => $id_branch_registration,
                "branch_address" => $datapack['outlet_address_' . $bcount],
                "branch_telephone" => $datapack['outlet_tel_' . $bcount],
                "branch_mobile" => $datapack['outlet_mob_' . $bcount],
                "branch_contact_person" => $datapack['outlet_conpersn_' . $bcount],
                "branch_contact_person_designation" => $datapack['outlet_con_persn_designation_' . $bcount],
                "outlet_has_branch_status" => 1,
                "percentage_discount" => $percentage_discount,
                "price_discount" => $price_discount,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_outlet_has_branch", $data3);
            $id_outlet_has_branch = $this->db->insertId();
            $division_count = $datapack['division_count_' . $bcount];
            for ($dcount = 1; $dcount < ($division_count + 1); $dcount++) {
                $data4 = array(
                    "id_outlet_has_branch" => $id_outlet_has_branch,
                    "id_division" => $datapack['division_id_' . $bcount . '_' . $dcount],
                    "branch_has_division_status" => 1,
                    "added_date" => date('Y:m:d'),
                    "added_time" => date('H:i:s')
                );
                $this->db->insertData("tbl_branch_has_division", $data4);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function get_Branch_Autogen_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_Branch_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_outlet_has_branch) As id FROM tbl_outlet_has_branch");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "BR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "BR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "BR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "BR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "BR" . $num_rows;
            }
        }
    }

    /**
     * Function get_Outlet_Autogen_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_Outlet_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_outlet_has_branch) As id FROM tbl_outlet_has_branch");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "BR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "BR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "BR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "BR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "BR" . $num_rows;
            }
        }
    }

    /**
     * Function deleteOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteOutlet($id1) {
        $id = $id1;

        $data = array(
            "outlet_status" => 0
        );
        $where = array(
            "id_outlet" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateOutlet($datapack) {

        $id_outlet = $datapack['id_outlet'];
        //$date = new DateTime();
        $data1 = array(
            "outlet_status" => 0
        );
        $where1 = array(
            "id_outlet" => $id_outlet
        );
        $data2 = array(
            "outlet_has_branch_status" => 0
        );
        $where2 = array(
            "id_outlet" => $id_outlet
        );
        $outlet_has_branch_data = $this->db->mod_select("select * from tbl_outlet_has_branch where id_outlet=$id_outlet");
        $id_outlet2 = $this->db->mod_select("select id_outlet_registration from tbl_outlet where id_outlet=$id_outlet");
        $id_outlet_registration = $id_outlet2[0]->id_outlet_registration;


        $data3 = array(
            "id_outlet_registration" => $id_outlet_registration,
            "id_outlet_category" => $datapack['outlet_category_name'],
            "outlet_name" => $datapack['outlet_name'],
            "outlet_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet", $data1, $where1);
        $this->db->update("tbl_outlet_has_branch", $data2, $where2);
        $this->db->insertData("tbl_outlet", $data3);
        $outletId = $this->db->insertId();

        foreach ($outlet_has_branch_data as $values) {

            $data31 = array(
                "id_outlet" => $outletId,
                "id_territory" => $values->id_territory,
                "id_branch_registration" => $values->id_branch_registration,
                "branch_address" => $values->branch_address,
                "branch_telephone" => $values->branch_telephone,
                "branch_mobile" => $values->branch_mobile,
                "branch_contact_person" => $values->branch_contact_person,
                "branch_contact_person_designation" => $values->branch_contact_person_designation,
                "outlet_has_branch_status" => 1,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_outlet_has_branch", $data31);
            $id_outlet_has_branch = $this->db->insertId();
            $data21 = array(
                "branch_has_division_status" => 0
            );
            $where21 = array(
                "id_outlet_has_branch" => $values->id_outlet_has_branch
            );
            $this->db->update("tbl_branch_has_division", $data21, $where21);
            $branch_has_division_data = $this->db->mod_select("select * from tbl_branch_has_division where id_outlet_has_branch=$values->id_outlet_has_branch");

            foreach ($branch_has_division_data as $values2) {
                print_r($values2->id_division);
                $data32 = array(
                    "id_outlet_has_branch" => $id_outlet_has_branch,
                    "id_division" => $values2->id_division,
                    "branch_has_division_status" => 1,
                    "added_date" => date('Y:m:d'),
                    "added_time" => date('H:i:s')
                );
                $dr = $this->db->insertData("tbl_branch_has_division", $data32);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateBranch1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateBranch1($data) {
        $id_outlet = $data['id_outlet'];
        $id_outlet_has_branch = $data['id_outlet_has_branch'];
        $type = $data['discount_type'];

        $percentage_discount = 0.00;
        $price_discount = 0.00;
        if ($type == '1') {
            $percentage_discount = $data['discount_1'];
        } else if ($type == '2') {
            $price_discount = $data['discount_1'];
        }
        $data = array(
            "id_outlet" => $id_outlet,
            "id_territory" => $data['territory_id_1'],
            "branch_address" => $data['outlet_address_1'],
            "branch_telephone" => $data['outlet_tel_1'],
            "branch_mobile" => $data['outlet_mob_1'],
            "branch_contact_person" => $data['outlet_conpersn_1'],
            "branch_contact_person_designation" => $data['outlet_con_persn_designation_1'],
            "percentage_discount" => $percentage_discount,
            "price_discount" => $price_discount
        );
        $where = array(
            "id_outlet_has_branch" => $id_outlet_has_branch
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet_has_branch", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateDivision1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivision1($data) {
        $id_branch_has_division = $data['id_branch_has_division'];

        $data = array(
            "id_division" => $data['division_id_1_1']
        );
        $where = array(
            "id_branch_has_division" => $id_branch_has_division
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_branch_has_division", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewAllOutlet_Division_Details
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllOutlet_Division_Details($id) {
        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=bhd.id_division) as division_name,bhd.id_branch_has_division as id_branch_has_division,bhd.id_division as id_division,tb.* FROM tbl_outlet_has_branch tb inner join tbl_branch_has_division bhd where bhd.id_outlet_has_branch=tb.id_outlet_has_branch AND tb.id_outlet=$id AND branch_has_division_status=1;");
        return $result;
    }

    /**
     * Function viewAllOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllOutlet() {
        $query = "SELECT otr.outlet_code as outlet_code ,t.*,oc.outlet_category_name as outlet_category_name  FROM  tbl_outlet t inner join tbl_outlet_category oc inner join tbl_outlet_registration otr where otr.id_outlet_registration=t.id_outlet_registration AND t.id_outlet_category=oc.id_outlet_category AND t.outlet_status=1";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Function viewAllOutletDetails
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllOutletDetails($id) {
        $result = $this->db->mod_select("SELECT otr.outlet_code as outlet_code ,t.*,oc.outlet_category_name as outlet_category_name  FROM  tbl_outlet t inner join tbl_outlet_category oc inner join tbl_outlet_registration otr where otr.id_outlet_registration=t.id_outlet_registration AND t.id_outlet_category=oc.id_outlet_category AND t.id_outlet=$id AND  t.outlet_status=1");
        return $result;
    }

    /**
     * Function viewAllOutletFromID1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllOutletFromID1($id) {
        $result = $this->db->mod_select("SELECT tbr.branch_code as branch_code ,(select division_name from tbl_division where id_division=bhd.id_division) as division_name,(select territory_name from tbl_territory where id_territory=ohb.id_territory) as territory_name,ohb.* FROM tbl_outlet_has_branch ohb inner join tbl_branch_has_division bhd inner join tbl_branch_registration tbr where tbr.id_branch_registration=ohb.id_branch_registration AND bhd.id_outlet_has_branch=ohb.id_outlet_has_branch  AND ohb.id_outlet=$id AND ohb.outlet_has_branch_status=1");
        return $result;
    }

    /**
     * Function viewAllBranchFromID1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllBranchFromID1($id) {
        $result = $this->db->mod_select("SELECT bhd.id_division as id_division,(select division_name from tbl_division where id_division=bhd.id_division) as division_name,(select territory_name from tbl_territory where id_territory=ohb.id_territory) as territory_name,ohb.* FROM tbl_outlet_has_branch ohb inner join tbl_branch_has_division bhd where bhd.id_outlet_has_branch=ohb.id_outlet_has_branch  AND ohb.id_outlet_has_branch=$id AND ohb.outlet_has_branch_status=1 Group by id_outlet_has_branch");
        return $result;
    }

    /**
     * Function viewAllDivisionFromID1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllDivisionFromID1($id) {
        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=thd.id_division) as division_name,thd.* FROM tbl_branch_has_division thd where thd.id_outlet_has_branch=$id AND thd.branch_has_division_status=1");
        return $result;
    }

    /**
     * Function viewAllDivisionFromID2
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewAllDivisionFromID2($id) {
        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=thd.id_division) as division_name,thd.* FROM tbl_branch_has_division thd where thd.id_branch_has_division=$id AND thd.branch_has_division_status=1;");
        return $result;
    }

    /**
     * Function viewBranchDetailsFromID1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewBranchDetailsFromID1($id) {
        $result = $this->db->mod_select("SELECT (select outlet_name from tbl_outlet where id_outlet=t.id_outlet) as outlet_name,(select territory_name from tbl_territory where id_territory=t.id_territory) as territory_name,t.* FROM tbl_outlet_has_branch t where t.id_outlet_has_branch=$id AND outlet_has_branch_status=1;");
        return $result;
    }

    /**
     * Function get_outletCategory_From_outlet_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_outletCategory_From_outlet_ID($dataset) {

        $datapack = array(
            'id_outlet' => $dataset,
            'outlet_status' => 0
        );
        $result = $this->db->mod_select("SELECT outlet.*,OutletCat.outlet_category_name as outlet_category_name FROM tbl_outlet outlet inner join tbl_outlet_category OutletCat
            WHERE `id_outlet` =:id_outlet  AND outlet.id_outlet_category=OutletCat.id_outlet_category AND
            outlet_status =:outlet_status", $datapack, PDO::FETCH_ASSOC);
        return $result;
    }

    function viewOutletByFilterKey($data) {

        $outlet_cat_name = $data['outlet_cat_name'];
        $outlet_status = $data['status_name'];
        $outlet_name = $data['outlet_name'];
        $outlet_code = $data['outlet_code'];
        $division_name = $data['division_name'];
        $territory_name = $data['tery_name'];

        $query = "SELECT tbo.outlet_image,tbo.`id_outlet`,tbo.`id_outlet_registration`,tbo.`id_outlet_category`,
tbo.`outlet_name`,tbo.`outlet_status`,tbo.`added_date`,tbo.`added_time`,
tor.`id_outlet_registration`,tor.`outlet_code`,toc.`id_outlet_category`,toc.`outlet_category_name`,tohb.`id_territory`,tbhd.`id_division`,tt.`id_territory`,tt.`territory_name` FROM `tbl_outlet` tbo INNER JOIN `tbl_outlet_category` toc ON tbo.`id_outlet_category` = toc.`id_outlet_category` INNER JOIN `tbl_outlet_registration` tor ON tbo.`id_outlet_registration` = tor.`id_outlet_registration` INNER JOIN `tbl_outlet_has_branch` tohb ON tohb.`id_outlet` = tbo.`id_outlet` INNER JOIN
`tbl_branch_has_division` tbhd ON tohb.`id_outlet_has_branch` = tbhd.`id_outlet_has_branch`
INNER JOIN tbl_territory tt ON tt.`id_territory` = tohb.`id_territory`
WHERE tbo.`id_outlet_category` LIKE '%$outlet_cat_name%' AND tbo.`outlet_name` LIKE '%$outlet_name%' AND tbo.`outlet_status`='1' LIKE '%$outlet_status%' AND tor.`outlet_code` LIKE '%$outlet_code%' AND tt.`territory_name` LIKE '%$territory_name%' AND tbhd.`id_division` LIKE '%$division_name%' GROUP BY tbo.id_outlet ";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }

}

?>
