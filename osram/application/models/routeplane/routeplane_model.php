<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of routeplane_model
 *
 * @author Thisaru
 */
class routeplane_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRepNamemodel($q, $column) {

        $sql = "select concat(employee_first_name,' ',employee_last_name) as user_username,id_employee  from tbl_employee where id_employee_type=3 and concat(employee_first_name,' ',employee_last_name) LIKE '%$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$column[0]]));
            foreach ($column as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getDayAndMonth($num) {
        $sql = "";
    }

    public function getTerritory($name) {
        $sql = "SELECT 
                    territory_name, temp.id_territory
                FROM
                    tbl_territory tttt,
                    (select 
                        tt.id_territory
                    from
                        tbl_territory tt
                    left join tbl_employee_has_place tehp ON tt.id_territory = tehp.id_territory
                    inner join tbl_employee te ON tehp.id_employee = te.id_employee
                    inner join tbl_user tu ON te.id_employee_registration = tu.id_employee_registration
                    where
                        tt.id_territory_type = 4
                            and tu.user_username = '$name') as temp
                where
                    tttt.id_parent = temp.id_territory
                        and territory_status = 1";
        return $query = $this->db->mod_select($sql);
    }

    public function get_place_Id($id) {
        $sql = "SELECT 
                    id_employee_has_place
                FROM
                    tbl_employee_has_place tehp,
                    (select 
                        id_employee
                    from
                        tbl_user tu
                    inner join tbl_employee_registration ter ON tu.id_employee_registration = ter.id_employee_registration
                    inner join tbl_employee te ON ter.id_employee_registration = te.id_employee_registration
                    where
                        tu.id_user = '$id') temp
                where
                    temp.id_employee = tehp.id_employee";
        return $query = $this->db->mod_select($sql);
    }

    public function insertToAddRoutePlan($id_employee_has_place, $year, $month, $territoryName) {
        $data1 = array(
            "employee_has_place_id" => $id_employee_has_place,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_route_plan", $data1);
        $id_route_plan = $this->db->insertId();

        unset($territoryName[0]);
        foreach ($territoryName as $x => $x_value) {
            $date = new DateTime($year . "-" . $month . "-" . $x);
            $dateFormated = $date->format('Y-m-d');
            $sql = "select id_territory from tbl_territory where territory_name='$x_value'";
            $query = $this->db->mod_select($sql);
            $territory_id = $query[0]->id_territory;

            $data = array(
                "tbl_route_plan_id" => $id_route_plan,
                "terratory_id" => $territory_id,
                "target_st_date" => $dateFormated,
                "adde_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_route_plan_terratory", $data);
        }
        $this->db->__endTransaction();
    }

    public function getTerritoryDet($name, $year, $month) {
       $date = $year.'-'.$month;
       $sql = "select 
                    terratory_id,
                    tt.territory_name,
                    tbl_route_plan_id,
                    target_st_date,
                    tbl_route_plan_ter_id
                FROM
                    tbl_route_plan_terratory trpt
                        left join
                    tbl_route_plan trp ON trpt.tbl_route_plan_id = trp.id_route_plan
                        inner join
                    tbl_territory tt ON trpt.terratory_id = tt.id_territory
                        inner join
                    tbl_employee_has_place tehp ON trp.employee_has_place_id = tehp.id_employee_has_place
                        inner join
                    tbl_employee te ON tehp.id_employee = te.id_employee
                        inner join
                    tbl_employee_registration ter ON te.id_employee_registration = ter.id_employee_registration
                        inner join
                    tbl_user tu ON ter.id_employee_registration = tu.id_employee_registration
                where
                    target_st_date like '%$date%'
                        and tu.user_username = '$name'
                        and tu.user_status = '1'
                        and trpt.status = '1'
                order by target_st_date asc";
        return $this->db->mod_select($sql);
    }

    public function getTerritoryDetCount($name, $year, $month) {
        echo $date = $year.'-'.$month;
        $sql = "select 
                    count(terratory_id) as count
                FROM
                    tbl_route_plan_terratory trpt
                        left join
                    tbl_route_plan trp ON trpt.tbl_route_plan_id = trp.id_route_plan
                        inner join
                    tbl_territory tt ON trpt.terratory_id = tt.id_territory
                        inner join
                    tbl_employee_has_place tehp ON trp.employee_has_place_id = tehp.id_employee_has_place
                        inner join
                    tbl_employee te ON tehp.id_employee = te.id_employee
                        inner join
                    tbl_employee_registration ter ON te.id_employee_registration = ter.id_employee_registration
                        inner join
                    tbl_user tu ON ter.id_employee_registration = tu.id_employee_registration
                where
                    target_st_date like '%$date%'
                        and tu.user_username = '$name'
                        and tu.user_status = '1'
                        and trpt.status = '1'
                order by target_st_date asc";
        return $this->db->mod_select($sql);
    }

}
