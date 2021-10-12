<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class webservicemodel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $password = $_REQUEST['password'];
        $sql = "SELECT 
    u_first_name,
    u_postal_address,
    tp.idposition
FROM
    tbl_user tu
        inner join
    tbl_position tp ON tu.iduser = tp.iduser
        inner join
    session ON session.idposition_rep = tp.idposition
where
    u_status = 0 and idposition_category = 4
        and session.s_date = curdate() and s_status = 0 
and binary u_login_name = '{$_REQUEST['username']}'
        and binary u_current_password = '{$password}'";
        return $this->db->select($sql);
    }

    public function get_max_session_id() {
        $sql = "SELECT 
    max(idsession) as session_id
FROM
    session
where
    idposition_rep = {$GLOBALS['position_id']} and s_status = 0
        and session.s_date = curdate()";
        $result = $this->db->select($sql);
        return $result[0]->session_id;
    }

    public function userExist() {
        $sql = "SELECT 1 FROM tbl_user where u_login_name = '{$_REQUEST['username']}' limit 1";
        return $this->db->select($sql);
    }

    /*
     * print bill details
     *
     */

    public function getMainDetails() {
        $sql = "select 
                ses.idsession,
                concat_ws(' ',
                        tuag.u_first_name,
                        tuag.u_middle_name,
                        tuag.u_last_name) as agent,
                tuag.u_postal_address as address,
                (select 
                        cn.cn_number
                    from
                        tbl_contact_number cn
                    where
                        cn.iduser = tuag.iduser
                    order by cn.idcontact_number
                    limit 1) as contact_no,tv.vehicle_no
            from
                session ses
                    inner join
                tbl_position tpag ON ses.idposition_agent = tpag.idposition
                    inner join
                tbl_user tuag ON tpag.iduser = tuag.iduser
                    inner join
                tbl_vehicle tv ON ses.id_vehicle = tv.id_vehicle
            where ses.idsession='{$GLOBALS['session_id']}'";
        return $this->db->select($sql);
    }

    public function getAgentName($position) {
        $sql = "SELECT 
    concat(tu.u_title,' ',tu.u_first_name,' ',tu.u_middle_name,' ',tu.u_last_name) as name
FROM
    tbl_position tp
        inner join
    tbl_user tu ON tu.iduser=tp.iduser
where
    tp.idposition = {$position}";
        $agent = $this->db->select($sql);
        return $agent[0]->name;
    }

    public function get_invoice_total() {
        $sql = "SELECT 
    sum(ihi_qty * ihi_unit_price) as inv_tot
FROM
    tbl_invoice ti
        inner join
    tbl_invoice_has_item tihi ON ti.idinvoice = tihi.idinvoice
where
    ti.idsession = {$GLOBALS['session_id']} and i_status = 0";
        $result = $this->db->select($sql);
        return empty($result[0]->inv_tot) ? 0 : $result[0]->inv_tot;
    }

    public function get_cash_amount() {
        $sql = "SELECT 
    sum(tpm.pm_amount) as cash_amount
FROM
    tbl_payment_method tpm
where
    tpm.idpayment_type = 1
        and tpm.idsession = {$GLOBALS['session_id']}
        and tpm.pm_status = 0";
        $result = $this->db->select($sql);
        return empty($result[0]->cash_amount) ? 0 : $result[0]->cash_amount;
    }

    public function get_cheque_total() {
        $sql = "SELECT 
    sum(tpm.pm_amount) as cheque_amount
FROM
    tbl_payment_method tpm
where
    tpm.idpayment_type = 2
        and tpm.idsession = {$GLOBALS['session_id']}
        and tpm.pm_status = 0";
        $result = $this->db->select($sql);
        return empty($result[0]->cheque_amount) ? 0 : $result[0]->cheque_amount;
    }

    public function getProductCats() {
        return $this->db->select('SELECT iditem_category_type,ict_name FROM tbl_item_category_type');
    }

    public function getProducts() {
        $sql = 'SELECT 
    iditem, item_name, item_photo
FROM
    tbl_item';
        return $this->db->select($sql);
    }

    public function getOutCats() {
        return $this->db->select('SELECT idoutlet_category,oc_name FROM tbl_outlet_category');
    }

    public function getItem_cat_Rel() {
        return $this->db->select("SELECT iditemhascat,iditem,iditemcat FROM tbl_item_has_categoy where status=0");
    }

    public function getPrice() {
        $msi = $_POST['session_id'];
        //$this->get_max_session_id();
//     $query = "SELECT 
//    iditem_price,
//    iditem_has_cat,
//    idoutlet_category as idoutlet_category,
//    tihc.iditem,
//    if(tihc.iditemcat != 2,
//        ip_price,
//        ip_price - ifnull((select 
//                        ip_price
//                    from
//                        tbl_item_price rtip
//                            inner join
//                        (select 
//                            max(iditem_price) as maxip, idoutlet_category, dtihc.iditem
//                        from
//                            tbl_item_price dtip
//                        inner join tbl_item_has_categoy dtihc ON dtip.iditem_has_cat = dtihc.iditemhascat
//                        where
//                            idzone = (select 
//                                    tz3.idzone
//                                from
//                                    session ses
//                                inner join tbl_zone tz ON ses.s_idzone = tz.idzone
//                                inner join tbl_zone tz1 ON tz.idzone_parent = tz1.idzone
//                                inner join tbl_zone tz2 ON tz1.idzone_parent = tz2.idzone
//                                inner join tbl_zone tz3 ON tz2.idzone_parent = tz3.idzone
//                                where
//                                    ses.idsession = $msi)
//                                and dtihc.iditemcat = 3
//                        group by iditem_has_cat , idoutlet_category , idzone) as maxp ON maxp.maxip = rtip.iditem_price
//                    where
//                        maxp.idoutlet_category = tip.idoutlet_category
//                            and maxp.iditem = tihc.iditem),
//                0)) as ip_price
//FROM
//    tbl_item_price tip
//        inner join
//    (SELECT 
//        idzone_parent
//    FROM
//        session
//    inner join tbl_position_has_zone tphz ON session.idposition_agent = tphz.idposition
//    inner join tbl_zone ON tbl_zone.idzone = tphz.idzone
//    where
//        idposition_rep = {$GLOBALS['position_id']}
//    order by idsession desc
//    limit 1) as tmp ON tmp.idzone_parent = tip.idzone
//        inner join
//    (select 
//        max(iditem_price) as maxip
//    from
//        tbl_item_price
//    group by iditem_has_cat , idoutlet_category , idzone) as maxp ON maxp.maxip = tip.iditem_price
//        inner join
//    tbl_item_has_categoy tihc ON tihc.iditemhascat = tip.iditem_has_cat";


        /**       $query="SELECT 
          iditem_price,
          iditem_has_cat,
          idoutlet_category as idoutlet_category,
          tihc.iditem,
          tihc.iditem,
          tihc.iditemcat,
          ip_price
          FROM
          tbl_item_price tip
          inner join
          (SELECT
          idzone_parent
          FROM
          session
          inner join tbl_position_has_zone tphz ON session.idposition_agent = tphz.idposition
          inner join tbl_zone ON tbl_zone.idzone = tphz.idzone
          where
          idposition_rep ={$GLOBALS['position_id']}
          order by idsession desc
          limit 1) as tmp ON tmp.idzone_parent = tip.idzone
          inner join
          (select
          max(iditem_price) as maxip
          from
          tbl_item_price
          group by iditem_has_cat , idoutlet_category , idzone) as maxp ON maxp.maxip = tip.iditem_price
          inner join
          tbl_item_has_categoy tihc ON tihc.iditemhascat = tip.iditem_has_cat";
         * */
        $query = "SELECT 
    iditem_price,
    iditem_has_cat,
    idoutlet_category as idoutlet_category,
    tihc.iditem,
    tihc.iditem,
    tihc.iditemcat,
    if(tihc.iditemcat != '4',
        ip_price,
        ((select 
                ifnull(ip.ip_price, 0)
            from
                tbl_item_price ip
                    inner join
                tbl_item_has_categoy ihc ON ip.iditem_has_cat = ihc.iditemhascat
            where
                ip.idoutlet_category = tip.idoutlet_category
                    and ihc.iditem = tihc.iditem
                    and ip.idzone = tip.idzone
                    and ihc.iditemcat = 2
					and ip.iddistributor = posn.idposition
                    and ip.iditem_price in (select 
                        max(iditem_price) as maxip
                    from
                        tbl_item_price
                    group by iditem_has_cat , idoutlet_category , idzone, iddistributor))) + (select 
                ifnull(ip.ip_price, 0)
            from
                tbl_item_price ip
                    inner join
                tbl_item_has_categoy ihc ON ip.iditem_has_cat = ihc.iditemhascat
            where
                ip.idoutlet_category = tip.idoutlet_category
                    and ihc.iditem = tihc.iditem
                    and ip.idzone = tip.idzone
                    and ihc.iditemcat = 3
                    and ip.iditem_price in (select 
                        max(iditem_price) as maxip
                    from
                        tbl_item_price
                    group by iditem_has_cat , idoutlet_category , idzone, iddistributor))) as ip_price
FROM
    tbl_item_price tip
        inner join
    (SELECT 
        idzone_parent
    FROM
        session
    inner join tbl_position_has_zone tphz ON session.idposition_agent = tphz.idposition
    inner join tbl_zone ON tbl_zone.idzone = tphz.idzone
    where
        idposition_rep = {$GLOBALS['position_id']}
    order by idsession desc
    limit 1) as tmp ON tmp.idzone_parent = tip.idzone
	inner join
    (select 
        p.idposition
    from
        tbl_position p
    inner join tbl_position p1 ON p.idposition = p1.idposition_parent
    where
        p1.idposition = {$GLOBALS['position_id']}) as posn ON tip.iddistributor = posn.idposition
        inner join
    (select 
        max(iditem_price) as maxip
    from
        tbl_item_price
    group by iditem_has_cat , idoutlet_category , idzone, iddistributor) as maxp ON maxp.maxip = tip.iditem_price
        inner join
    tbl_item_has_categoy tihc ON tihc.iditemhascat = tip.iditem_has_cat";
        return $this->db->select($query);
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
    1000000 as credit_limit,
    ifnull(credit_amount, 0) credit_amount,
    ifnull(buffer_limit, 0) buffer_limit,
    lat,
    lng,
    tolt.dealr_search_term
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
    tphz.idposition = {$GLOBALS['position_id']} and o_active = 1";
        return $this->db->select($sql);
    }

    public function getRoute() {
        $sql = "SELECT 
    tz.idzone as areaId, tz.z_name as area
FROM
    tbl_position_has_zone tphz
        inner join
    tbl_zone tz ON tphz.idzone = tz.idzone_parent
where idzone_type=5 and 
    tphz.idposition = {$GLOBALS['position_id']}";
        return $this->db->select($sql);
    }

    public function getBanks() {
        return $this->db->select("SELECT 
    idbank_branch, b_name, b_code, bb_name, bb_code
FROM
    tbl_bank
        inner join
    tbl_bank_branch ON tbl_bank.idbank = tbl_bank_branch.idbank");
    }

    public function set_unproductive_outlet($jsn, $id) {
        $data = array('id_outlet' => $jsn->outlet_id, 'id_session' => $id, 'latitude' => $jsn->latitude, 'longitude' => $jsn->longitude, 'date' => $jsn->date, 'url' => date('Y') . '/' . date('m') . '/' . date('d') . '/' . $_FILES['photo']['name']);
        return $this->db->insertData('unproductive_outlet', $data);
    }

    public function set_customer($fargs) {
        $this->db->__beginTransaction();
        /**
         * olt add
         */
        $olt = array('o_name' => $fargs['companyname'], 'o_person_name' => $fargs['contactperson'], 'o_address' => $fargs['address'], 'o_mobile' => $fargs['tel'], 'idoutlet_category' => $fargs['outlet_cat_id'], 'o_has_cooler' => 0, 'o_free' => 0, 'o_discount' => 1, 'o_contact' => '', 'o_photograph_url' => '', 'o_status' => 2);
        $this->db->insertData('tbl_outlet', $olt);
        $outletid = $this->db->insertId();
        /**
         * olt discount
         */
        $this->db->insertData('tbl_outlet_discount', array('od_rate' => 0, 'idoutlet' => $outletid));
        /**
         * olt store
         */
        $this->db->insertData('tbl_store', array('idoutlet' => $outletid, 'idzone' => $fargs['routeid']));
        /**
         * olt temp
         */
        $temp = array('temp_od_date' => date('Y-m-d'), 'temp_od_time' => date('H:i:s'), 'id_outlet' => $outletid, 'id_position' => $GLOBALS['position_id'], 'id_zone' => $fargs['routeid'], 'temp_od_status' => 0);
        $this->db->insertData('tbl_outlet_temp_details', $temp);
        return $this->db->__endTransaction();
    }

    public function insert_order($jsonString) {
        $this->db->__beginTransaction();
        $msi = $_POST['session_id'];
        //$this->get_max_session_id();
        /**
         * insert cur_stock
         */
        $date = new DateTime($jsonString['INVOICE']['timestamp']);

        /**
         * insert invoice
         */
        $this->db->insertData('tbl_invoice', array('i_date' => $date->format('Y-m-d'), 'i_time' => $date->format('H:i:s'), 'idstore' => $jsonString['INVOICE']['out_id'], 'idsession' => $msi, 'i_code' => 0));
        $inv_id = $this->db->insertId();
        /**
         * insert stock
         */
        $this->db->insertData('tbl_stock_count', array('sc_date' => $date->format('Y-m-d'), 'sc_time' => $date->format('H:i:s'), 'idsession' => $msi, 'id_store' => $jsonString['INVOICE']['out_id']));
        $stock_id = $this->db->insertId();
        $stock_itms = array();
        foreach ($jsonString['cur_stock'] as $value) {
            //Empty
            $stock_itms[] = array('iditemhascat' => "SELECT `iditemhascat` FROM `tbl_item_has_categoy` WHERE `iditem`={$value['Item_id']} and `iditemcat`=3", 'schi_qty' => $value['Empty_qty'], 'idstock_count' => $stock_id, 'id_item' => $value['Item_id'], 'iditemcat' => 3);
            //Fill
            $stock_itms[] = array('iditemhascat' => "SELECT `iditemhascat` FROM `tbl_item_has_categoy` WHERE `iditem`={$value['Item_id']} and `iditemcat`=2", 'schi_qty' => $value['Filled_qty'], 'idstock_count' => $stock_id, 'id_item' => $value['Item_id'], 'iditemcat' => 2);
        }
        $this->db->insertPacket('tbl_stock_count_has_item', $stock_itms);
        /**
         * insert return
         */
        $ret = array();
        foreach ($jsonString['dam_stock'] as $value) {
            $ret[] = array('tbl_invoice_idinvoice' => $inv_id, 'iditem_returned' => $value['item_id'], 'ihri_qty' => 0, 'ihri_price' => 0, 'ihri_isreturned' => '', 'iditemcat' => 6, 'cap' => $value['cap_avail'] == 'YES' ? 1 : 0, 'seal' => $value['seal_avail'] == 'YES' ? 1 : 0, 'weight' => $value['cur_weight'], 'remarks' => $value['remarks']);
        }
        if (!empty($ret)) {
            $this->db->insertPacket('tbl_invoice_has_return_item', $ret);
        }
        /**
         * insert new
         */
        $new = array();
        $empty = array();
        foreach ($jsonString['REFILL'] as $value) {
            $new[] = array('idinvoice' => $inv_id, 'iditem' => $value['item_id'], 'ihi_qty' => $value['qty'], 'ihi_unit_price' => $value['price'], 'iditemcat' => $value['cat_id']);
            // invoice empty
//            $empty[] = array('tbl_invoice_idinvoice' => $inv_id, 'tbl_item_iditem' => $value['item_id'], 'ihei_qty' => $value['qty'], 'ihei_price' => 0//$priceCal($value['item_id'], 3)
//            );
        }
        if (isset($jsonString['ACCESSORIES'])) {
            foreach ($jsonString['ACCESSORIES'] as $value) {
                $new[] = array('idinvoice' => $inv_id, 'iditem' => $value['item_id'], 'ihi_qty' => $value['qty'], 'ihi_unit_price' => $value['price'], 'iditemcat' => $value['cat_id']);
                // invoice empty
//            $empty[] = array('tbl_invoice_idinvoice' => $inv_id, 'tbl_item_iditem' => $value['item_id'], 'ihei_qty' => $value['qty'], 'ihei_price' => 0//$priceCal($value['item_id'], 3)
//            );
            }
        }
        if (isset($jsonString['EMPTY'])) {
            foreach ($jsonString['EMPTY'] as $value) {

                $new[] = array('idinvoice' => $inv_id, 'iditem' => $value['item_id'], 'ihi_qty' => $value['qty'], 'ihi_unit_price' => $value['price'], 'iditemcat' => $value['cat_id']);
            }
        }
        /**
         * insert empty
         */
        if (!empty($empty)) {
            $this->db->insertPacket('tbl_invoice_has_empty_item', $empty);
        }
        if (isset($jsonString['NEW'])) {
            foreach ($jsonString['NEW'] as $value) {
                $new[] = array('idinvoice' => $inv_id, 'iditem' => $value['item_id'], 'ihi_qty' => $value['qty'], 'ihi_unit_price' => $value['price'], 'iditemcat' => $value['cat_id']);
            }
        }
        if (!empty($new)) {
            $this->db->insertPacket('tbl_invoice_has_item', $new);
        }

        /**
         * insert gps
         */
        $this->db->insertData('gpsinfo', array('idinvoice' => $inv_id, 'lat' => $jsonString['INVOICE']['latitude'], 'lon' => $jsonString['INVOICE']['longitude'], 'btrlevel' => $jsonString['INVOICE']['bat_level'], 'synctimestamp' => $jsonString['INVOICE']['timestamp']));
        /**
         * payment
         */
        $pm = $jsonString['Payment'];
        $Pdata = array('idsession' => $msi, 'idinvoice' => $inv_id, 'pm_date' => $date->format('Y-m-d'), 'pm_time' => $date->format('H:i:s'), 'pm_status' => 0);
        foreach ($pm as $p) {
            $data = $Pdata;
            switch ($p['type']) {
                case 'cash' :
                    $data['pm_amount'] = $p['cash_amount'];
                    $data['idpayment_type'] = 1;
                    $this->db->insertData('tbl_payment_method', $data);
                    break;
                case 'cheque' :
                    $this->db->insertData('tbl_payment_cheque', array('pc_date' => $p['cheque_date'], 'pc_no' => $p['cheque_no'], 'pc_amount' => $p['cheque_amount'], 'idbank_branch' => $p['banck_branch_id']));
                    $data['pm_amount'] = $p['paying_amount'];
                    $data['idpayment_type'] = 2;
                    $data['idpayment_cheque'] = $this->db->insertId();
                    $this->db->insertData('tbl_payment_method', $data);
                    break;
            }
        }
        /*
         * is a preorder
         */
        $pre_order = $jsonString['INVOICE'];
        if ($pre_order['isaPreOrder'] == 1) {
            $current_date = date("Y-m-d");
            $this->db->update('tbl_sales_order', array('inv_status' => 1), array('idstore' => $pre_order['out_id'], 'deliver_date' => $current_date));
        }
        /*
         * is a trust
         */
        foreach ($jsonString['Trust'] as $value) {
            $this->db->update('tbl_trust', array('deliver_status' => 1), array('idtrust' => $value['trust_id']));
        }
        /*
         * is a damage
         */
        foreach ($jsonString['Damaged_replacement'] as $value) {
            $this->db->update('tbl_invoice_has_return_item', array('deliver_status' => 1), array('idihri' => $value['damaged_id']));
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getTrustnDamage() {
        $msi = $_POST['session_id'];
        //$this->get_max_session_id();
        return $this->db->select("SELECT 
    ti.idinvoice,
    ti.idstore,
    ti.i_code,
    tihi.iditem,
    tihi.ihi_qty,
    tihi.iditemcat
FROM
    tbl_invoice ti
        inner join
    tbl_invoice_has_item tihi ON tihi.idinvoice = ti.idinvoice
where
    ti.i_code = 'trust' and ti.idsession = $msi 
union all SELECT 
    ti.idinvoice,
    ti.idstore,
    ti.i_code,
    tihi.iditem,
    tihi.ihi_qty,
    tihi.iditemcat
FROM
    tbl_invoice ti
        inner join
    tbl_invoice_has_item tihi ON tihi.idinvoice = ti.idinvoice
where
    ti.i_code = 'damage'
        and ti.idsession = $msi");
    }

    /* public function getStock() {
      $msi = $_POST['session_id'];
      //$this->get_max_session_id();
      $query = "select
      tem.iditem,tem.chec as iditemcat,sum(tem.sst_qty )as sst_qty
      from
      ( SELECT
      iditem, IF(iditemcat in(2,4,5,6),2,iditemcat)as chec,iditemcat, sst_qty
      from
      tbl_session_stock_transfer tsst
      where
      tsst.sst_status = 'load'
      and tsst.idsession = $msi group by tsst.id_sess_stock_transf )tem
      group by tem.iditem,tem.chec";
      return $this->db->select($query);
      }
     */

    public function getStock() {
        $msi = $_POST['session_id'];
        //$this->get_max_session_id();
        $query = "select 
temp.iditem,
            temp.iditemcat,
            (temp.sst_qty-
			ifnull(invi.ihi_qty,0))sst_qty,
	temp.sst_qty as opening
from
    (select 
        tem.iditem,
            tem.chec as iditemcat,
            sum(tem.sst_qty) as sst_qty
    from
        (SELECT 
        iditem,
            IF(iditemcat in (2 , 4, 5, 6), 2, iditemcat) as chec,
            iditemcat,
            sst_qty
    from
        tbl_session_stock_transfer tsst
    where
        tsst.sst_status = 'load'
            and tsst.idsession = $msi
    group by tsst.id_sess_stock_transf) tem
    group by tem.iditem , tem.chec) as temp
        left join
    (select 
        sum(ihi.ihi_qty)as ihi_qty,ihi.iditem , ihi.iditemcat
    from
        tbl_invoice ti
    inner join tbl_invoice_has_item ihi ON ti.idinvoice = ihi.idinvoice
    where
        ti.idsession = $msi
    group by ihi.iditem , ihi.iditemcat) as invi ON temp.iditem = invi.iditem
        and temp.iditemcat = invi.iditemcat
       

";
        return $this->db->select($query);
    }

    public function get_last3Bills() {
        $result = array('result' => 1);
        $data = array();
        $olts = "SELECT 
    tstor.idstore
FROM
    tbl_zone tz
        inner join
    tbl_position_has_zone tphz ON tphz.idzone = tz.idzone_parent
        inner join
    tbl_store tstor ON tstor.idzone = tz.idzone
where
    tphz.idposition = {$GLOBALS['position_id']}";
        $olt_result = $this->db->select($olts);
        foreach ($olt_result as $olt) {
            $inv_query = "SELECT 
    ti.idinvoice,
    ti.i_date,
    ti.i_time,
    (sum(tihi.ihi_qty * tihi.ihi_unit_price) * (100 - ti.i_discount)) / 100 as amount
FROM
    tbl_invoice ti
        inner join
    tbl_invoice_has_item tihi ON ti.idinvoice = tihi.idinvoice
where
    ti.i_status = 0 and ti.idstore = {$olt->idstore}
group by ti.idinvoice
order by DATE_FORMAT(concat(ti.i_date, ' ', ti.i_time),
        '%Y-%m-%d %H:%i:%s') desc limit 3";
            $inv_result = $this->db->select($inv_query);
            foreach ($inv_result as $inv) {
                $inv_d = "SELECT 
    idpayment_type, sum(tpm.pm_amount) as amount
FROM
    tbl_payment_method tpm
where
    tpm.idinvoice = {$inv->idinvoice}";
                $res_inv = $this->db->select($inv_d);
                if ($res_inv[0]->amount) {
                    if ($inv->amount > $res_inv[0]->amount) {
                        $invoice = array();
                        $invoice['id'] = $inv->idinvoice;
                        $invoice['date'] = $inv->i_date . ' ' . $inv->i_time;
                        $invoice['amount'] = $inv->amount;
                        $invoice['idstore'] = $olt->idstore;
                        $invoice['paid'] = $res_inv[0]->amount;
                        $data[] = $invoice;
                    }
                }
            }
        }
        $result['data'] = $data;
        return $result;
    }

    public function setMyPosition() {
        $jsn = json_decode($_POST['jsonString']);
        $lo = $jsn->location_data;
        foreach ($lo as $j) {
            $this->db->insertData('repGeoPosition', array('idposition' => $GLOBALS['position_id'], 'lat' => $j->gps_latitude, 'lon' => $j->gps_longitude, 'btrlevel' => $j->battry_level, 'synctimestamp' => $j->timestamp));
        }
        return $this->db->status();
    }

    public function setStockUnloadConfirm() {
        $mxsid = $_POST['session_id'];
        //$this->get_max_session_id();
        $this->db->__beginTransaction();
        //        $data = json_decode($_POST['data']);
        //        $und = array();
        //        foreach ($data as $d) {
        //            $und[] = array(
        //                'idsession' => $mxsid,
        //                'iditem' => $d->itemId,
        //                'sst_qty' => $d->qty,
        //                'sst_price' => $d->price,
        //                'sst_type' => 'unload'
        //            );
        //        }
        //        $this->db->insertPacket('tbl_session_stock_transfer', $und);
        $this->db->update('session', array('s_status' => 1), array('idsession' => $mxsid));
        $this->db->__endTransaction();
        return $this->db->status() ? array('result' => 1) : array('result' => 0);
    }

    public function setStockLoadConfirm() {
        $mxsid = $_POST['session_id'];
        //$this->get_max_session_id();
        $this->db->update('session', array('s_load_stock_confirm' => 1), array('idsession' => $mxsid));
        return $this->db->status() ? array('result' => 1) : array('result' => 0);
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
        $this->db->doQuery($sql);
    }

    public function checkSession() {
        $sql = "SELECT 
    1
FROM
    session
where
    idsession = {$_POST['session_id']} and s_status = 0 and s_date = curdate()";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return ($sth->rowCount() > 0) ? TRUE : FALSE;
    }

    public function getPriceByOutlet() {
        $sql = "SELECT 
    tohp.idoutlet_price,
    tohp.iditemhascat,
    tohp.idoutlet,
    tohp.price
FROM
    (SELECT STRAIGHT_JOIN
        max(tohpp.idoutlet_price) as 'idoutlet_price'
    FROM
        tbl_position_has_zone tphz
    inner join tbl_zone tz ON tphz.idzone = tz.idzone_parent
    inner join tbl_store ts ON ts.idzone = tz.idzone
    inner join tbl_outlet tolt ON ts.idoutlet = tolt.idoutlet
    inner join tbl_outlet_has_price tohpp ON tolt.idoutlet = tohpp.idoutlet
    where
        tohpp.ohp_status = 0
            and tphz.idposition = {$GLOBALS['position_id']}
            and tolt.o_active = 1
    group by tohpp.idoutlet , tohpp.iditemhascat) tmp
        STRAIGHT_JOIN
    tbl_outlet_has_price tohp ON tmp.idoutlet_price = tohp.idoutlet_price";
        return $this->db->select($sql);
    }

    function makeOutStandingPayment() {
        $this->db->__beginTransaction();
        $json = json_encode($_POST['Payment']);
        foreach ($json as $j) {
            $date = new DateTime($j->timestamp);
            $data = array(
                'idsession' => $_POST['session_id'],
                'idinvoice' => $j->idinvoice,
                'pm_date' => $date->format('Y-m-d'),
                'pm_time' => $date->format('H:i:s'),
                'pm_status' => 0
            );
            switch ($j->type) {
                case 'cash' :
                    $data['pm_amount'] = $j->cash_amount;
                    $data['idpayment_type'] = 1;
                    $this->db->insertData('tbl_payment_method', $data);
                    break;
                case 'cheque' :
                    $this->db->insertData('tbl_payment_cheque', array(
                        'pc_date' => $j->cheque_date,
                        'pc_no' => $j->cheque_no,
                        'pc_amount' => $j->cheque_amount,
                        'idbank_branch' => $j->banck_branch_id
                            )
                    );
                    $data['pm_amount'] = $j->paying_amount;
                    $data['idpayment_type'] = 2;
                    $data['idpayment_cheque'] = $this->db->insertId();
                    $this->db->insertData('tbl_payment_method', $data);
                    break;
            }
        }
        $this->db->__endTransaction();
        return $this->db->status() ? 1 : 0;
    }

    public function insert_pre_order($jsonString, $position) {
        $pre_order = $jsonString->preOder;
        $pre_order_item = $jsonString->pre_order_item;
        $timestamp = new DateTime($pre_order->timestamp);
        $date = $timestamp->format('Y-m-d');
        $time = $timestamp->format('H:i:s');
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_sales_order', array('id_position' => $position, 'idstore' => $pre_order->out_id, 'sales_order_status' => 0, 'deliver_date' => $pre_order->deliver_date, 'added_date' => $date, 'added_time' => $time));
        $sales_id = $this->db->insertId();

        $new = array();
        foreach ($pre_order_item as $value) {
            $new[] = array('idsales_order' => $sales_id, 'id_item' => $value->item_id, 'iditemcat' => $value->item_cat_id, 'qty' => $value->qty, 'status' => 0, 'added_date' => $date);
        }
        $this->db->insertPacket('tbl_sales_order_has_item', $new);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function load_store($id_out) {
        $sql = "select 
    ts.idstore
from
    tbl_outlet tu
        inner join
    tbl_store ts on tu.idoutlet=ts.idoutlet
where 
tu.idoutlet=$id_out";
        $res = $this->db->select($sql);
        return $res[0]->idstore;
    }

    public function insert_end_day_status($jsonString, $position, $session_id) {
        $this->db->__beginTransaction();
        $this->db->insertData('tbl_session_unload', array('idSession' => $session_id, 'idPosition' => $position, 'su_date' => date("Y-m-d"), 'su_time' => date('G:i:s'), 'su_status' => 0));
        $unload_id = $this->db->insertId();
        $new = array();
        foreach ($jsonString->lorry_stock as $value) {
            $new[] = array('idSession_unload' => $unload_id, 'idItem' => $value->item_id, 'item_qty' => $value->available_qty, 'iditemcat' => $value->item_cat_id);
        }
        $this->db->insertPacket('tbl_session_unload_details', $new);
        $this->db->update('session', array('s_status' => 1, 's_unload_stock_confirm' => 1), array('idsession' => $session_id));

        $und = array();
        foreach ($jsonString->lorry_stock as $value1) {
            $und[] = array(
                'idsession' => $session_id,
                'iditem' => $value1->item_id,
                'sst_qty' => $value1->available_qty,
                'sst_price' => 0,
                'sst_type' => 'unload',
                'iditemcat' => $value1->item_cat_id
            );
        }
        $this->db->insertPacket('tbl_session_stock_transfer', $und);
        $sql = "select 
                        se.idissuenote
                    from
                        session se
                    where
                    se.idsession='$session_id'";
        $result = $this->db->select($sql);
        $this->db->update('tbl_issue_note', array(
            "status" => 1
                ), array(
            "idissue_note" => $result[0]->idissuenote
        ));
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getDailyDeliveries() {
        $sql = "select 
			so.id_sales_order, so.idstore
			from
			tbl_sales_order so 
			inner join
			tbl_sales_order_has_item soi ON so.id_sales_order = soi.idsales_order
			where
			so.sales_order_status = 0
			and so.deliver_status=1
			and so.deliver_date = (select CURDATE())
			and so.id_position = {$GLOBALS['position_id']}";
        return $this->db->select($sql);
    }

    public function getDailyDeliverie_items() {
        $sql = "select 
    so.id_sales_order,
soi.id_item,
soi.iditemcat,
soi.qty
from

    tbl_sales_order so 
        inner join
    tbl_sales_order_has_item soi ON so.id_sales_order = soi.idsales_order
where
    so.sales_order_status = 0
        and so.deliver_date = (select CURDATE())
		and so.deliver_status=1
        and so.id_position = {$GLOBALS['position_id']}
and soi.status=0
";
        return $this->db->select($sql);
    }

    public function Insert_Payment($jsonString, $session_id) {

        $this->db->__beginTransaction();
        $p_method = array();
        $p_cheque = array();
        $cheque_id = '';
        foreach ($jsonString as $value) {
            $payent_type = $value->type;
            if ($payent_type == "cash") {
                $this->db->insertData('tbl_payment_method', array('pm_amount' => $value->cash_amount, 'idpayment_type' => 1, 'idsession' => $session_id, 'idinvoice' => $value->idinvoice, 'idpayment_cheque' => '', 'pm_date' => date("Y-m-d"), 'pm_time' => date('G:i:s'), 'pm_status' => 0));
            } elseif ($payent_type == "cheque") {
                $this->db->insertData('tbl_payment_cheque', array('pc_date' => $value->cheque_date, 'pc_no' => $value->cheque_no, 'pc_diposit' => 0, 'pc_realized' => 0, 'pc_return' => 0, 'pc_amount' => $value->cheque_amount, 'idbank_branch' => $value->banck_branch_id));
                $cheque_id = $this->db->insertId();
                $this->db->insertData('tbl_payment_method', array('pm_amount' => $value->cheque_amount, 'idpayment_type' => 2, 'idsession' => $session_id, 'idinvoice' => $value->idinvoice, 'idpayment_cheque' => $cheque_id, 'pm_date' => date("Y-m-d"), 'pm_time' => date('G:i:s'), 'pm_status' => 0));
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function check_incomplete_route() {
        $sql = "select 
    count(1)as count
from
    session se
where
    se.s_status = 0
        and se.idposition_rep = {$GLOBALS['position_id']}";
        return $this->db->select($sql);
    }

    public function get_trust_details($store_id) {
        $sql = "select 

thi.iditem,
thi.qty
from
    tbl_trust_has_item thi
        inner join
    tbl_trust tt ON thi.idtrust = tt.idtrust
        inner join
    tbl_issue_note_has_trust iht ON tt.idtrust = iht.idtrust
        inner join
    session se ON iht.idissuenote = se.idissuenote
where
tt.idstore=$store_id
    and tt.status=0
and tt.issue_status=1
and tt.deliver_status=0
order by tt.idstore";
        return $this->db->select($sql);
    }

    public function get_trust($session_id) {
        $sql = "select 
se.idsession,
se.s_date ,
tt.trust_date,
tt.idstore,
iht.idissuenote_trust,
tt.idtrust
from

    tbl_trust tt 
        inner join
    tbl_issue_note_has_trust iht ON tt.idtrust = iht.idtrust
        inner join
    session se ON iht.idissuenote = se.idissuenote
where
se.idsession=$session_id
and tt.status=0
and tt.issue_status=1
and tt.deliver_status=0
group by tt.idstore
order by tt.idstore";
        return $this->db->select($sql);
    }

    public function get_damage($session_id) {
        $sql = "select 
    inv.idinvoice,
    se.s_date,
    inv.idstore,
    ihrn.iditem_returned,
    ihrn.iditemcat,
    ihrn.serial_no,
    ihrn.idihri
from
    tbl_invoice inv
        inner join
    tbl_invoice_has_return_item ihrn ON inv.idinvoice = ihrn.tbl_invoice_idinvoice
        inner join
    tbl_issue_note_has_return ihr ON ihrn.idihri = ihr.idreturn
        inner join
    session se ON ihr.idissuenote = se.idissuenote
where
    se.idsession = $session_id
        	and ihrn.issue_status=1
	and ihrn.deliver_status=0
"
        ;
        return $this->db->select($sql);
    }

    public function Insert_notification($request_pack, $session_id) {
        $pos_id = $GLOBALS['position_id'];
        $this->db->__beginTransaction();
        $sql = "select 
    tp.idposition
from
    tbl_position tp
        inner join
    tbl_position tp1 ON tp.idposition = tp1.idposition_parent
where
tp1.idposition=$pos_id";
        $dis = $this->db->select($sql);
        foreach ($request_pack as $value) {
            $type = explode(" ", $value->request);
            if ($type[0] == "a") {
                $this->db->insertData('tbl_notification', array('added_date' => date("Y-m-d"), 'added_time' => date("G:i:s"), 'idposition_sender' => $pos_id, 'idposition_rec' => $dis[0]->idposition, 'idnotification_type' => '2', 'status' => 0, 'code' => 0));
            } else if ($type[0] == "b") {
                $this->db->insertData('tbl_notification', array('added_date' => date("Y-m-d"), 'added_time' => date("G:i:s"), 'idposition_sender' => $pos_id, 'idposition_rec' => $dis[0]->idposition, 'idnotification_type' => '1', 'status' => 0, 'code' => 0));
            } elseif ($type[0] == "c") {
                $this->db->insertData('tbl_notification', array('added_date' => date("Y-m-d"), 'added_time' => date("G:i:s"), 'idposition_sender' => $pos_id, 'idposition_rec' => $dis[0]->idposition, 'idnotification_type' => '3', 'status' => 0, 'code' => 0));
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function notification_responce() {
        $pos_id = $GLOBALS['position_id'];
        $sql = "select 
    tn.code as value
from
    tbl_notification tn
where
tn.status=1
and tn.code !=0
and tn.idposition_sender=$pos_id
 order by tn.idnotification desc
limit 1";
        return $this->db->select($sql);
    }

    public function get_invoices($id) {
        $sql = "select 
    concat(inv.i_date, ' ', inv.i_time) as timestamp,
    inv.idinvoice,
    inv.idstore,
    inv.i_discount,
    sum(ihi.ihi_qty * ihi.ihi_unit_price) as total,
    ifnull((select 
            sum( pm.pm_amount )
        from
            tbl_payment_method pm
		where
pm.pm_status=0
and pm.idinvoice=inv.idinvoice
),0)as paid_val
from
    tbl_invoice inv
        inner join
    tbl_invoice_has_item ihi ON inv.idinvoice = ihi.idinvoice
where
    inv.idsession = $id and inv.i_status = 0
group by inv.idinvoice ";
        return $this->db->select($sql);
    }

    public function update_version($version) {
        $return = array();
        $sql = "select 
    apk.url,apk.version
from
    tbl_apk_update apk
order by apk.up_id desc
limit 1";
        $result = $this->db->select($sql);
        $new = $result[0]->version;
        if (intval($version) < intval($new)) {
            $return['result'] = "true";
            $return['url'] = $result[0]->url;
        } else {
            $return['result'] = "false";
        }
        return $return;
    }

    public function asm_login() {
        $password = $_REQUEST['password'];
        $sql = "SELECT 
    u_first_name,
    u_postal_address,
    tp.idposition
FROM
    tbl_user tu
        inner join
    tbl_position tp ON tu.iduser = tp.iduser
where
    u_status = 0 and idposition_category = 3
and binary u_login_name = '{$_REQUEST['username']}'
        and binary u_current_password = '{$password}'";
        return $this->db->select($sql);
    }

    public function get_dsrs() {
        $sql = "SELECT 
    concat(u_first_name,' ',u_middle_name,' ',u_last_name) as name,idposition as position_id
FROM
    tbl_position
        inner join
    tbl_user ON tbl_position.iduser = tbl_user.iduser
where
    tbl_position.idposition_category = 4 and tbl_user.u_status=0 and tbl_position.p_status=0 and tbl_position.idposition_parent  in (select am.dis_idposition
            
        from
            tbl_assign_managers am
        where
            am.active_status = 0
                and am.manager_idposition = '{$_REQUEST['position_id']}')";

        return $this->db->select($sql);
    }

    public function get_asm_routes() {
        $sql = "SELECT areaId,area,tbl_asm_reps.position_id FROM (SELECT 
    tz.idzone as areaId, tz.z_name as area,tphz.idposition as position_id
FROM
    tbl_position_has_zone tphz
        inner join
    tbl_zone tz ON tphz.idzone = tz.idzone_parent
where idzone_type=5) AS tbl_routes INNER JOIN (SELECT 
    concat(u_first_name,' ',u_middle_name,' ',u_last_name) as name,idposition as position_id
FROM
    tbl_position
        inner join
    tbl_user ON tbl_position.iduser = tbl_user.iduser
where
    tbl_position.idposition_category = 4 and tbl_user.u_status=0 and tbl_position.p_status=0 and tbl_position.idposition_parent  in (select am.dis_idposition
            
        from
            tbl_assign_managers am
        where
            am.active_status = 0
                and am.manager_idposition = '{$_REQUEST['position_id']}') ) AS tbl_asm_reps 
                
                ON tbl_routes.position_id=tbl_asm_reps.position_id";
        return $this->db->select($sql);
    }

    public function get_asm_dealers() {

        $sql = "SELECT outlet,outletId,routeId,o_address,outlet_category,o_address
    o_person_name,
    o_contact,
    o_mobile,
    trust_cylinder,
    credit_period,
    credit_limit,
    credit_amount,
    buffer_limit,
    lat,
    lng,
    search_term,
     tbl_asm_reps.position_id FROM (SELECT 
    ts.idstore as outletId,
    o_name as outlet,
    ts.idzone as routeId,
    tolt.idoutlet_category as outlet_category,
    o_address,
    o_name as o_person_name,
    0 as o_contact,
    ifnull(o_mobile, 0) as o_mobile,
    trust_cylinder,
    credit_period,
    1000000 as credit_limit,
    ifnull(credit_amount, 0) credit_amount,
    ifnull(buffer_limit, 0) buffer_limit,
    lat,
    lng,
    tolt.dealr_search_term as search_term,
    tphz.idposition as position_id
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
     o_active = 1 ) AS tbl_dealer INNER JOIN (SELECT 
    concat(u_first_name,' ',u_middle_name,' ',u_last_name) as name,idposition as position_id
FROM
    tbl_position
        inner join
    tbl_user ON tbl_position.iduser = tbl_user.iduser
where
    tbl_position.idposition_category = 4 and tbl_user.u_status=0 and tbl_position.p_status=0 and tbl_position.idposition_parent  in (select am.dis_idposition
            
        from
            tbl_assign_managers am
        where
            am.active_status = 0
                and am.manager_idposition = '{$_REQUEST['position_id']}') ) AS tbl_asm_reps 
                
                ON tbl_dealer.position_id=tbl_asm_reps.position_id";
        return $this->db->select($sql);
    }

    public function getoutletforasm() {
        return $this->db->select("SELECT tp.idposition,
tz.z_name,tz.idzone as areaId, tu.u_first_name, tu.iduser,concat(tu.u_title ,' ', tu.u_first_name,' ',tu.u_middle_name,' ' ,tu.u_last_name) as dis
FROM
tbl_user tu
INNER JOIN
tbl_position tp ON tu.iduser = tp.iduser
INNER JOIN
tbl_position_has_zone rphz ON tp.idposition = rphz.idposition
INNER JOIN
tbl_zone tz ON rphz.idzone = tz.idzone
WHERE
tu.u_status = 0 AND tz.active_status = 0
AND tp.p_status = 0
AND tp.idposition_category = 3
AND tz.idzone_type = 5 
AND rphz.idposition={$GLOBALS['position_id']}
 ");
    }

    public function getasmout($areaId) {
        return $this->db->select("SELECT * FROM tbl_store ts
inner join 
tbl_outlet too on
too.idoutlet=ts.idoutlet
inner join tbl_zone tz on
tz.idzone=ts.idzone
where tz.idzone={$areaId}");
    }

    public function getDistributors() {


        $sql = "select tam.dis_idposition,"
                . "(select iduser from tbl_position where idposition = tam.dis_idposition) as user_id,"
                . "(select tu.u_first_name from tbl_user tu where tu.iduser=user_id ) as u_first_name "
                . "from tbl_assign_managers tam where tam.manager_idposition='{$_REQUEST['position_id']}'  GROUP BY tam.dis_idposition ORDER BY tam.as_id ASC ";


        return $this->db->select($sql);
    }

    public function get_itinerary() {
        $sql = "SELECT tp.added_date as date,"
                . "tp.idzone as route,"
                . "tp.work_program as work_programme,"
                . "tz.z_name as route_details,"
                . "tp.calls,"
                . "tp.mileage,tp.night_out "
                . " FROM tbl_itenary_plan tp inner join tbl_zone tz on "
                . "tz.idzone=tp.idzone inner join tbl_store ts on ts.idstore=tp.idstore "
                . "where tp.idposition='{$_REQUEST['position_id']}' ";
        return $this->db->select($sql);
    }

    public function insert_distributor_stock_count($jsonString) {
        $this->db->insertData('tbl_distributor_stock_count', array('stock_id' => 0, 'dis_position_id' => $jsonString['distributor_id'], 'timestamp' => $jsonString['time']));
        $inv_id = $this->db->insertId();



        foreach ($jsonString['stock_values'] as $value) {
            $stock_itms[] = array('item_id' => $value['item_id'], 'stock_id' => $inv_id, 'empty_qty' => $value['empty_qty'], 'filled_qty' => $value['filled_qty']);
        }
        $this->db->insertPacket('tbl_distributor_stock_count_item', $stock_itms);
    }

    public function insert_dealer_visit($jsonString) {
        $this->db->insertData('tbl_asm_dealer_visit', array('timestamp' => $jsonString['dealer_visit']['timestamp'],
            'bat_level' => $jsonString['dealer_visit']['bat_level'],
            'dealer_board' => $jsonString['dealer_visit']['dealer_board'],
            'cylinder_display' => $jsonString['dealer_visit']['cylinder_display'],
            'position_id' => $_POST['position_id'],
            'end_time' => $jsonString['dealer_visit']['end_time'],
            'start_time' => $jsonString['dealer_visit']['start_time'],
            'remarks' => $jsonString['dealer_visit']['remarks'],
            'longitude' => $jsonString['dealer_visit']['longitude'],
            'latitude' => $jsonString['dealer_visit']['latitude'],
            'out_id' => $jsonString['dealer_visit']['out_id']
        ));

        $visit_id = $this->db->insertId();

        foreach ($jsonString['dealer_visit_stock'] as $value) {
            $stock_itms[] = array('tbl_asm_dealer_visit_id' => $visit_id,
                'item_id' => $value['Item_id'],
                'empty_qty' => $value['Empty_qty'],
                'filled_qty' => $value['Filled_qty']);
        }
        $this->db->insertPacket('tbl_asm_dealer_stock_count', $stock_itms);
    }

    /*     * `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `bat_level` int(11) NOT NULL DEFAULT '0',
      `dealer_board` int(11) NOT NULL DEFAULT '-1',
      `cylinder_display` int(11) NOT NULL DEFAULT '-1',
      `position_id` int(11) NOT NULL,
      `end_time` time DEFAULT NULL,
      `start_time` time DEFAULT NULL,
      `remarks` varchar(300) NOT NULL,
      `longitude` float NOT NULL,
      `latitude` float NOT NULL,
      `out_id` int(11) NOT NULL*

     *   "timestamp": "2015-07-1507: 45: 35",
      "bat_level": "61",
      "dealer_board": "2",
      "end_time": "07: 45: 35",
      "start_time": "",
      "remarks": "hooo",
      "longitude": "79.887277",
      "out_id": "3002",
      "latitude": "6.9129061",
      "cylinder_display": "1"
     * 
     * 
     *      */
}
