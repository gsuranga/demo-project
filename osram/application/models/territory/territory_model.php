<?php

/**
 * Description of territory_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class territory_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertTerritory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertTerritory1($datapack) {
        //$date = new DateTime();

        $parent_territory = $datapack['parent_territory'];
        $result11 = $this->db->mod_select("SELECT territory_hierarchy from tbl_territory where id_territory=$parent_territory");
        $territory_hierarchy = $result11[0]->territory_hierarchy.",".$parent_territory;

        $data1 = array(
            "territory_name" => $datapack['territoryname'],
            "id_parent" => $datapack['parent_territory'],
            "id_territory_type" => $datapack['territory_type'],
            "territory_status" => 1,
            "territory_hierarchy" =>$territory_hierarchy,        
            "added_date" =>date('Y:m:d'),
            "added_time" =>date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_territory", $data1);

        $territoryID = $this->db->insertId();
        $count = $datapack['table_row_count1'];
        for ($i = 1; $i < ($count + 1); $i++) {
            $data2 = array(
                "id_division" => $datapack['division_id' . $i],
                "territory_has_division_status" => 1,
                "id_territory" => $territoryID,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_territory_has_division", $data2);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function getAllTerritory
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllTerritory() {

        $result = $this->db->mod_select("SELECT thd.id_territory_has_division as id_territory_has_division,(select division_name from tbl_division where id_division=thd.id_division) as division_name,thd.id_division as id_division,t.*,tdt.territory_type_name as territory_type_name,(select territory_name from tbl_territory where id_territory=t.id_parent) as parentterritory_name FROM tbl_territory t inner join tbl_territory_type tdt inner join tbl_territory_has_division thd where thd.id_territory=t.id_territory AND t.id_territory_type=tdt.id_territory_type AND t.territory_status=1 GROUP BY t.id_territory;");
        return $result;
    }

    /**
     * Function getTerritoryDetails
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getTerritoryDetails($id) {

        $result = $this->db->mod_select("SELECT t.*,tdt.territory_type_name as territory_type_name,(select territory_name from tbl_territory where id_territory=t.id_parent) as parentterritory_name FROM tbl_territory t inner join tbl_territory_type tdt inner join tbl_territory_has_division thd where thd.id_territory=t.id_territory AND t.id_territory_type=tdt.id_territory_type AND  t.id_territory =$id AND t.territory_status=1 GROUP BY t.id_territory;");
        return $result;
    }

    /**
     * Function getAllTerritoryfromID
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllTerritoryfromID($dataset) {

        $result = $this->db->mod_select("SELECT thd.id_territory_has_division as id_territory_has_division,(select division_name from tbl_division where id_division=thd.id_division) as division_name,thd.id_division as id_division,t.*,tdt.territory_type_name as territory_type_name,(select territory_name from tbl_territory where id_territory=t.id_parent) as parentterritory_name FROM tbl_territory t inner join tbl_territory_type tdt inner join tbl_territory_has_division thd where thd.id_territory=t.id_territory AND t.id_territory_type=tdt.id_territory_type AND t.id_territory=$dataset AND t.territory_status=1 GROUP BY t.id_territory;");
        return $result;
    }

    /**
     * Function getAllDivisionfromDivisionID
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllDivisionfromDivisionID($id) {

        $result = $this->db->mod_select("SELECT ttd.*,t.division_name as division_name,ttd.id_division as id_division,ttd.id_territory as  id_territory FROM tbl_territory_has_division ttd inner join tbl_division t where ttd.id_division=t.id_division and ttd.id_territory_has_division=$id");
        return $result;
    }

    /**
     * Function getAllDivisionfromID
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllDivisionfromID($id) {

        $result = $this->db->mod_select("SELECT tt.id_territory as id_territory, ttd.id_territory_has_division as id_territory_has_division,(select division_name from tbl_division where id_division=ttd.id_division) as division_name FROM tbl_territory tt inner join tbl_territory_has_division ttd where tt.id_territory=ttd.id_territory AND tt.id_territory=$id AND ttd.territory_has_division_status=1");
        return $result;
    }

    /**
     * Function updateTerritory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateTerritory1($data) {
        $territory_id = $data['territory_id'];
        $territory_has_division_id = $data['territory_has_division_id'];
        $division_id = $data['division_id'];
        print_r($division_id);
        $data = array(
            "territory_name" => $data['territoryname'],
            "id_parent" => $data['parent_territory'],
            "id_territory_type" => $data['territory_type']
        );
        $where = array(
            "id_territory" => $territory_id
        );
        $data2 = array(
            "id_division" => $division_id,
            "id_territory" => $territory_id
        );
        $where2 = array(
            "id_territory_has_division" => $territory_has_division_id
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_territory", $data, $where);
        $this->db->update("tbl_territory_has_division", $data2, $where2);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateTerritoryMaping1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateTerritoryMaping1($data) {

        $territory_has_division_id = $data['territory_has_division_id'];
        $division_id = $data['division_id1'];
        $data2 = array(
            "id_division" => $division_id,
        );
        $where2 = array(
            "id_territory_has_division" => $territory_has_division_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_territory_has_division", $data2, $where2);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteTerritory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteTerritory1($id1) {
        $id = $id1;
        $data1 = array(
            "territory_status" => 0
        );
        $where = array(
            "id_territory" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_territory", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteTerritoryMap1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteTerritoryMap1($id1) {
        $id = $id1;
        print_r($id);
        $data1 = array(
            "territory_has_division_status" => 0
        );
        $where = array(
            "id_territory_has_division" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_territory_has_division", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function getParentPositions
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function getParentPositions($idTerritory) {
        $this->db->mod_select("SET @id:=2;");
        $query = $this->db->mod_select("SELECT `territory_name`, `id_territory`, (@id:=`id_parent`) as content_parent FROM ( SELECT `id_territory`, `territory_name`, `id_parent` FROM tbl_territory ORDER BY `id_parent` DESC) AS aux_table WHERE `id_territory` = @id");
        return $query;
    }

    function viewTeryByFilterKey($data) {

        $territory_Type_name = $data['territory_Type_name'];
        $territory_status = $data['status_name'];
        $tery_name = $data['tery_name'];

        $result = $this->db->mod_select("SELECT (select `territory_name` from tbl_territory where `id_territory`=td.`id_parent`) as parentterritory_name,(select territory_type_name from
tbl_territory_type where id_territory_type=td.`id_territory_type`) as territory_type_name,td.* FROM tbl_territory td inner join tbl_territory_type tdt
 where td.`id_territory_type`=tdt.`id_territory_type` AND  td.territory_status='1' AND td.`id_territory_type` LIKE '%$territory_Type_name%' AND td.`territory_status` LIKE '%$territory_status%' AND td.`territory_name` LIKE '%$tery_name%'");
        return $result;
    }

	    function getDivisionNames($q,$select){
        $sql="select division_name,id_division from tbl_division where division_name like '$q%' and division_status = 1";
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
	    public function check_territoryName(){
        $name=$_REQUEST['name'];
        $sql="select 
    tt.territory_name
from
    tbl_territory tt
where
tt.territory_status=1
and tt.territory_name='$name'
";
        return $this->db->mod_select($sql);
    }
	
}

?>
