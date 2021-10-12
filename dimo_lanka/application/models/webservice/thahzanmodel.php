<?php
/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 * Tuesday, September 23 2014 16:25:00
 */
class thahzanmodel extends Model {

	function __construct() {
		parent::__construct();
	}

	public function login() {
		$password = Hash::create($_REQUEST['password']);
		$sql = "SELECT
    tp.idposition
FROM
    tbl_user tu
        inner join
    tbl_position tp ON tu.iduser = tp.iduser
where
    u_status = 0 and binary u_login_name = '{$_REQUEST['username']}'
        and binary u_current_password = '{$password}'";
		return $this -> db -> select($sql);
	}

	public function getOutlets() {
		$sql = "SELECT 
    ts.idstore as outletId,
    o_name as outlet,
    ts.idzone as routeId,
    tolt.idoutlet_category,
    o_address,
    o_name as o_person_name,
    0 as o_contact,
    ifnull(o_mobile, 0) as o_mobile,
    trust_cylinder,
    credit_period,
    ifnull(credit_limit, 0) credit_limit,
    ifnull(credit_amount, 0) credit_amount,
    ifnull(buffer_limit, 0) buffer_limit,lat,lng
FROM
    tbl_outlet tolt
        inner join
    tbl_outlet_category toc ON tolt.idoutlet_category = toc.idoutlet_category
        inner join
    tbl_store ts ON ts.idoutlet = tolt.idoutlet
        inner join
    tbl_zone tz ON tz.idzone = ts.idzone
        inner join
    tbl_position_has_zone tphz ON tphz.idzone = tz.idzone_parent
        left join
    tbl_credit_limit tcl ON tolt.idoutlet = tcl.idoutlet
where
    tphz.idposition = {$_POST['position_id']} and o_active = 1";
		return $this -> db -> select($sql);
	}

	public function getRoute() {
		$sql = "SELECT 
    tz.idzone as areaId, tz.z_name as area
FROM
    tbl_position_has_zone tphz
        inner join
    tbl_zone tz ON tphz.idzone = tz.idzone_parent
where idzone_type=5 and 
    tphz.idposition = {$_POST['position_id']}";
		return $this -> db -> select($sql);
	}

	public function outletCapture($dealer) {
		$sql = "UPDATE tbl_outlet 
SET 
    o_photograph_url = '{$dealer->filename}',
    o_address = '{$dealer->dealer_address}',
    o_contact = '{$dealer->dealer_contact}',
    lat = '{$dealer->lat}',
    lng = '{$dealer->lon}'
WHERE
    idoutlet = (SELECT 
            idoutlet
        FROM
            tbl_store
        WHERE
            idstore = {$dealer->dealer_id}) limit 1";
		$this -> db -> doQuery($sql);
	}

}
