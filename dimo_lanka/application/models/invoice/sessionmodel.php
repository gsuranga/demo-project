<?php

class SessionModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSessionDetails($idsession) {
       $query = "SELECT *,concat_ws('',turep.u_first_name,turep.u_middle_name,turep.u_last_name)as repname FROM `session` se
            INNER JOIN `tbl_position` p ON p.`idposition`= se.`idposition_agent`
            INNER JOIN tbl_position tprep on se.idposition_rep=tprep.idposition
            inner join tbl_user turep on tprep.iduser=turep.iduser
            INNER JOIN `tbl_user` u ON u.`iduser`= p.`iduser`
            inner join tbl_vehicle tv on se.id_vehicle=tv.id_vehicle
            LEFT JOIN `tbl_zone` z ON z.`idzone`= se.`s_idzone`
            WHERE se.`idsession` = {$idsession}";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        //print_r($_result);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function getChildRouteDetails($idzone) {
        $query = "select * from tbl_zone tz where tz.idzone_parent='{$idzone}'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        //print_r($_result);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function getSessions($status) {
        $query = "SELECT * FROM `session` se
            INNER JOIN `tbl_position` p ON p.`idposition`= se.`idposition_agent`
            INNER JOIN `tbl_user` u ON u.`iduser`= p.`iduser`
            WHERE se.`s_status` = {$status} AND se.`idposition_rep`='" . Session::get('auth')->idposition . "'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        //print_r($_result);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_Invoices_items($idsession) {
        $query = "SELECT * FROM `session` se
            INNER JOIN `tbl_invoice` i ON i.`idsession`= se.`idsession`
            INNER JOIN `tbl_invoice_has_item` ihi ON ihi.`idinvoice`= i.`idinvoice`
            WHERE se.`idsession` = {$idsession} AND i.`i_status` = '0'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_Invoices_returnitems($idsession) {
        $query = "SELECT * FROM `session` se
            INNER JOIN `tbl_invoice` i ON i.`idsession`= se.`idsession`
            INNER JOIN `tbl_invoice_has_return_item` ihi ON ihi.`tbl_invoice_idinvoice`= i.`idinvoice`
            WHERE se.`idsession` = {$idsession} AND i.`i_status` = '0' ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_Invoices_replaceitems($idsession) {
        $query = "SELECT * FROM `session` se
            INNER JOIN `tbl_invoice` i ON i.`idsession`= se.`idsession`
            INNER JOIN `tbl_invoice_has_replace_item` ihi ON ihi.`idinvoice`= i.`idinvoice`
            WHERE se.`idsession` = {$idsession} AND i.`i_status` = '0' ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_Invoices_emptyitems($idsession) {
        $query = "SELECT * FROM `session` se
            INNER JOIN `tbl_invoice` i ON i.`idsession`= se.`idsession`
            INNER JOIN `tbl_invoice_has_empty_item` ihi ON ihi.`tbl_invoice_idinvoice`= i.`idinvoice`
            WHERE se.`idsession` = {$idsession}";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    //get loading unloading item deatails item name and cat

    function getSesstionLoadedUnloadedItems($idsession) {
        $query = "select 
                *,sum(sst.sst_qty)
             from
                 tbl_session_stock_transfer sst
                     inner join
                 tbl_item it ON sst.iditem = it.iditem
                     inner join
                 tbl_item_category_type ict ON sst.iditemcat = ict.iditem_category_type

             where sst.idsession='$idsession'
             group by sst.iditem,sst.iditemcat";
        return $this->db->select($query);
    }

    // get return items 

    function getSessionReturnItems($idsession) {
        $query = "select 
                    *
                from
                    tbl_invoice_has_return_item ihri
                        inner join
                    tbl_invoice inv ON ihri.tbl_invoice_idinvoice = inv.idinvoice
                inner join tbl_item it on ihri.iditem_returned=it.iditem
                inner join tbl_item_category_type ict on ihri.iditemcat=ict.iditem_category_type
                where
                    inv.idsession = '$idsession'";
        return $this->db->select($query);
    }

    function getSessionReplaceItems($idsession) {
        $query = "select 
                    *
                from
                    tbl_invoice_has_replace_item ihrei
                        inner join
                    tbl_invoice inv ON ihrei.idinvoice = inv.idinvoice
                inner join tbl_item it on ihrei.iditem=it.iditem
                inner join tbl_item_category_type ict on ihrei.iditemcat=ict.iditem_category_type
                where
                    inv.idsession = '$idsession'";
        return $this->db->select($query);
    }

    public function get_session_summary($idsession) {
	
        $query = "select 
                *
            from
                tbl_session_stock_transfer sst
                    inner join
                tbl_item it ON sst.iditem = it.iditem
                    inner join
                tbl_item_category_type ict ON sst.iditemcat = ict.iditem_category_type
            where sst.idsession='$idsession' group by it.iditem,sst.iditemcat,sst.sst_type";
        return $this->db->select($query);
    }

    function getSeesionInvoiceItems($idsession) {
        $query = "select 
                    sum(ihi.ihi_qty)as qty,ihi.iditem,ihi.iditemcat
                from
                    tbl_invoice_has_item ihi
                        inner join
                    tbl_invoice inv ON ihi.idinvoice = inv.idinvoice
                where inv.idsession='$idsession'
                group by ihi.iditem,ihi.iditemcat";
        return $this->db->select($query);
    }

    public function get_free_summary($idsession) {
        $query = "SELECT i.`idinvoice`, SUM(ihfi.`ihfi_qty`) AS f_qty, o.`o_name`, SUM(ihfi.`ihfi_qty`*ihfi.`ihfi_price`) AS f_price  FROM `session` se
                        INNER JOIN `tbl_invoice` i
                        ON i.`idsession`= se.`idsession`
                        INNER JOIN `tbl_invoice_has_free_item` ihfi
                        ON ihfi.`idinvoice`= i.`idinvoice`
                        INNER JOIN `tbl_store` s
                        ON s.`idstore`= i.`idstore`
                        INNER JOIN `tbl_outlet` o
                        ON s.`idoutlet`= o.`idoutlet`
                        WHERE se.`idsession` = '{$idsession}'
                        AND i.`i_status` = '0'
                        GROUP BY i.`idinvoice`
                ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_empty_summary($idsession) {
        $query = "SELECT itm.*, SUM(ihei.`ihei_qty`) AS e_qty, ihei.`ihei_price`, SUM(ihei.`ihei_qty`*ihei.`ihei_price`) AS et_price  FROM `session` se
                        INNER JOIN `tbl_invoice` i
                        ON i.`idsession`= se.`idsession`
                        INNER JOIN `tbl_invoice_has_empty_item` ihei
                        ON ihei.`tbl_invoice_idinvoice`= i.`idinvoice`
                        INNER JOIN `tbl_item` itm
                        ON ihei.`tbl_item_iditem`= itm.`iditem`
                        WHERE se.`idsession` = '{$idsession}'
                        AND i.`i_status` = '0'
                        GROUP BY ihei.`tbl_item_iditem`
                ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_cooler_summary($idsession) {
        $query = "SELECT i.`idinvoice`, SUM(ihi.`ihi_qty`) AS i_qty, o.`o_name`, SUM(ihi.`ihi_qty`*ihi.`ihi_unit_price`) AS i_t_price  FROM `session` se
                        INNER JOIN `tbl_invoice` i
                        ON i.`idsession`= se.`idsession`
                        INNER JOIN `tbl_invoice_has_item` ihi
                        ON ihi.`idinvoice`= i.`idinvoice`
                        INNER JOIN `tbl_store` s
                        ON s.`idstore`= i.`idstore`
                        INNER JOIN `tbl_outlet` o
                        ON s.`idoutlet`= o.`idoutlet`
                        WHERE se.`idsession` = '{$idsession}'
                        AND o.`o_has_cooler` = '1'
                        AND i.`i_status` = '0'
                        GROUP BY o.`idoutlet`
                ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_return_summary($idsession, $smc) {
        $query = "SELECT tmm.`r_qty`, tmm.`sm_qty`, tmm.`sm_up`, itm.* FROM
                        (SELECT item_id, SUM(r_qty) AS r_qty, SUM(sm_qty) AS sm_qty, sm_up FROM (
                               (SELECT ihri.`iditem_returned` AS item_id, SUM(ihri.`ihri_qty`) AS r_qty, '0' AS sm_qty ,ihri.`ihri_price` AS sm_up FROM `session` se
                               INNER JOIN `tbl_invoice` i
                               ON i.`idsession`= se.`idsession`
                               INNER JOIN `tbl_invoice_has_return_item` ihri
                               ON ihri.`tbl_invoice_idinvoice`= i.`idinvoice`
                               INNER JOIN `tbl_store` s
                               ON s.`idstore`= i.`idstore`
                               INNER JOIN `tbl_outlet` o
                               ON s.`idoutlet`= o.`idoutlet`
                               WHERE se.`idsession` = '{$idsession}'
                               AND i.`i_status` = '0'
                               AND o.`idoutlet_category` != '{$smc}'
                               GROUP BY ihri.`iditem_returned` )
                         UNION
                               (SELECT ihri.`iditem_returned` AS item_id, '0' AS r_qty ,SUM(ihri.`ihri_qty`) AS sm_qty ,ihri.`ihri_price` AS sm_up FROM `session` se
                               INNER JOIN `tbl_invoice` i
                               ON i.`idsession`= se.`idsession`
                               INNER JOIN `tbl_invoice_has_return_item` ihri
                               ON ihri.`tbl_invoice_idinvoice`= i.`idinvoice`
                               INNER JOIN `tbl_store` s
                               ON s.`idstore`= i.`idstore`
                               INNER JOIN `tbl_outlet` o
                               ON s.`idoutlet`= o.`idoutlet`
                               WHERE se.`idsession` = '{$idsession}'
                               AND i.`i_status` = '0'
                               AND o.`idoutlet_category` = '{$smc}'
                               GROUP BY ihri.`iditem_returned` )
                               )  tempTable GROUP BY tempTable.item_id) tmm
                 INNER JOIN tbl_item itm
                 ON itm.`iditem`= tmm.`item_id`
                ";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result;
        } else {
            return 0;
        }
    }

    public function get_current_session() {
        $query = "SELECT MAX(idsession) as sess FROM `session` se WHERE se.`idposition_rep`='" . Session::get('auth')->idposition . "'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0) {
            return $_result[0]->sess;
        } else {
            return 0;
        }
    }

    public function confirm_session($data) {

        $idsession = $data['idsession'];

        $userdetails = Session::get('auth');
        $userid = $userdetails->idposition;

        $this->db->insertData('tbl_session_unload', array(
            'idSession' => $idsession,
            'idPosition' => $userid,
            'su_date' => date('Y-m-d'),
            'su_time' => date('H:i:s')
        ));

        $idun = $this->db->insertId();

        $rowcount = $data['itemco'];

        $j = 1;
        for ($i = 0; $i < $rowcount; $i++) {
            if (isset($data['iditem_' . $i]) && isset($data['qty_' . $i])) {
                if ($data['qty_' . $i] > 0) {
                    $this->db->insertData('tbl_session_unload_details', array(
                        'idSession_unload' => $idun,
                        'idItem' => $data['iditem_' . $i],
                        'iditemcat' => $data['iditem_cat_' . $i],
                        'item_qty' => $data['qty_' . $i]
                    ));
                }
            }
        }

        $query = "UPDATE session SET `s_status`='1' WHERE `idsession`= '" . $idsession . "'";
        $this->db->doQuery($query);
        return 1;
    }

    public function get_summary_status($idsession) {
        $query = "SELECT s_status FROM session WHERE `idsession`= '" . $idsession . "'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0)
            return $_result[0]->s_status;
        else
            return 0;
    }
    //nilusha changed
    public function get_summary_status_1($idsession) {
        $query = "SELECT s_status FROM session WHERE `idsession`= '" . $idsession . "'";
        $this->db->doQuery($query);
        $_result = $this->db->__getResult(PDO::FETCH_OBJ);
        if (count($_result) > 0)
            return $_result[0]->s_status;
        else
            return 0;
    }
//end changed
    
    public function get_new_ceylinder($idsession) {
        $refill = $this->getrefillcylinders($idsession);
        $empty = $this->getEmptyCeylinders($idsession);

        $itemscount = 0;
        $invcount = 0;
        $items = array();
        $invoices = array();
        $itemshasqty = array();
        $emptyitemshasqty = array();

        foreach ($refill as $rf) {

            if (!in_array($rf->iditem, $items)) {
                $items[$itemscount] = $rf->iditem;
                $itemscount++;
            }

            if (!in_array($rf->idinvoice, $invoices)) {
                $invoices[$invcount] = $rf->idinvoice;
                $invcount++;
            }

            $itemid = array_search($rf->iditem, $items);
            $invoiceid = array_search($rf->idinvoice, $invoices);

            $itemshasqty[$invoiceid][$itemid] = $rf->ihi_qty;
        }

        foreach ($empty as $em) {

            $itemid = array_search($em->tbl_item_iditem, $items);
            $invoiceid = array_search($em->idinvoice, $invoices);
            $emptyitemshasqty[$invoiceid][$itemid] = $em->ihei_qty;
        }
        ;
        $balqty = array();
        $finalbalar = array();
        $bqty = 0;
        for ($i = 0; $i < count($invoices); $i++) {
            for ($j = 0; $j < count($items); $j++) {
                if (isset($itemshasqty[$i][$j]) && isset($emptyitemshasqty[$i][$j])) {
                    if ($itemshasqty[$i][$j] == $emptyitemshasqty[$i][$j]) {
                        $qty = $itemshasqty[$i][$j];
                        $eqty = $emptyitemshasqty[$i][$j];
                        $balqty[$i][$j] = $qty - $eqty;
                        $bqty+=$balqty[$i][$j];
                        $itemname = $this->getItemNameById($items[$j]);
                    }
                }
            }
        }
//clkanishka@gmail.com
//osramtab3@gmail.com
        return $finalbalar;
//        print_r($balqty);
    }

    public function getrefillcylinders($idsession) {
        $query = "select ihi.idinvoice,ihi.iditem,sum(ihi.ihi_qty)as ihi_qty
                from tbl_invoice_has_item ihi
                inner join tbl_invoice inv on ihi.idinvoice=inv.idinvoice
                inner join session ses on inv.idsession=ses.idsession
                where ses.idsession='$idsession' group by inv.idinvoice,ihi.iditem order by inv.idinvoice,ihi.iditem";

        return $this->db->select($query);
    }

    public function getEmptyCeylinders($idsession) {
        $query = "select 
                    inv.idinvoice,ihei.tbl_item_iditem, sum(ihei.ihei_qty) as ihei_qty
                from
                    tbl_invoice_has_empty_item ihei
                        inner join
                    tbl_invoice inv ON ihei.tbl_invoice_idinvoice = inv.idinvoice
                        inner join
                    session ses ON inv.idsession = ses.idsession
                where
                    ses.idsession ='$idsession'
                group by inv.idinvoice , ihei.tbl_item_iditem
                order by inv.idinvoice , ihei.tbl_item_iditem";

        return $this->db->select($query);
    }

    public function getItemNameById($iditem) {
        $query = "select * from tbl_item where iditem='$iditem'";
        $data = $this->db->select($query);

        return $data;
    }

    function get_ncb($id_session) {
        $query = "SELECT 
    titm.item_name,titm.item_code,tihi.ihi_qty
FROM
    tbl_invoice_has_item tihi
        inner join
    tbl_invoice ti ON ti.idinvoice = tihi.idinvoice
        inner join
    tbl_item titm ON titm.iditem = tihi.iditem
where
    ti.idsession = $id_session and tihi.iditemcat = 4";
        return $this->db->select($query);
    }

    function get_cdl($id_session) {
        $query = "SELECT 
    tpm.idinvoice, tpm.pm_amount,tolt.o_name
FROM
    tbl_payment_method tpm
        inner join
    tbl_invoice ti ON ti.idinvoice = tpm.idinvoice
        inner join
    tbl_store tstr ON ti.idstore = tstr.idstore
        inner join
    tbl_outlet tolt ON tolt.idoutlet = tstr.idoutlet
where
    tpm.idsession = $id_session and idpayment_type = 1";
        return $this->db->select($query);
    }

    function getDiszone($idsession) {
        $query = "select 
                ifnull(tz.idzone_parent,0)as parentzone
             from
                 session ses
                     inner join
                 tbl_position_has_zone phz ON ses.idposition_agent = phz.idposition
                     inner join
                 tbl_zone tz on phz.idzone=tz.idzone where ses.idsession=$idsession";
        return $this->db->select($query);
    }

    // get payments for session summery

   /** function getSessionPayments($idsession) {
        $query = "select 
                inv.idinvoice,ou.o_name,ou.d_code,
                (select 
                        sum(ihi.ihi_qty * ihi.ihi_unit_price)
                    from
                        tbl_invoice_has_item ihi
                    where
                        ihi.idinvoice = inv.idinvoice) as invtot,
                ifnull((select 
                                sum(ihri.ihri_price * ihri.ihri_qty)
                            from
                                tbl_invoice_has_return_item ihri
                            where
                                ihri.tbl_invoice_idinvoice = inv.idinvoice),
                        0) as retamt,
                ifnull((select 
                                sum(ihrei.ihrei_price * ihrei.ihrei_qty)
                            from
                                tbl_invoice_has_replace_item ihrei
                            where
                                ihrei.idinvoice = inv.idinvoice),
                        0) as repamt,
                inv.i_discount,
                ifnull(t.idinvoice, 0) as payidinvoice,
                ifnull(t.paymentamt, 0) as paymentamt,
                ifnull(t.pc_no, 0) as pc_no,
                ifnull(t.idpayment_type, 0) as idpayment_type
            from
                tbl_invoice inv
                    left join
                (select 
                    pm.idinvoice,
                        pm.pm_amount as paymentamt,
                        pc.pc_no,
                        pm.idpayment_type,
                        pm.pm_date
                from
                    tbl_payment_method pm
                right join tbl_payment_cheque pc ON pm.idpayment_cheque = pc.idpayment_cheque
                group by pm.idinvoice) t ON inv.idinvoice = t.idinvoice and t.pm_date=inv.i_date
                    inner join
                tbl_store st ON inv.idstore = st.idstore
                    inner join
                tbl_outlet ou ON st.idoutlet = ou.idoutlet
            where
                inv.idsession = '$idsession'";
        return $this->db->select($query);
    }**/

function getSessionPayments($idsession) {
        $query = "select 
                inv.idinvoice,ou.o_name,ou.d_code,
                (select 
                        sum(ihi.ihi_qty * ihi.ihi_unit_price)
                    from
                        tbl_invoice_has_item ihi
                    where 
                        ihi.idinvoice = inv.idinvoice) as invtot,
                ifnull((select 
                                sum(ihri.ihri_price * ihri.ihri_qty)
                            from
                                tbl_invoice_has_return_item ihri
                            where
                            
                                ihri.tbl_invoice_idinvoice = inv.idinvoice),
                        0) as retamt,
                ifnull((select 
                                sum(ihrei.ihrei_price * ihrei.ihrei_qty)
                            from
                                tbl_invoice_has_replace_item ihrei
                            where
                           
                                ihrei.idinvoice = inv.idinvoice),
                        0) as repamt,
                inv.i_discount,
                ifnull(t.idinvoice, 0) as payidinvoice,
                ifnull(t.paymentamt, 0) as paymentamt,
                ifnull(t.pc_no, 0) as pc_no,
                ifnull(t.idpayment_type, 0) as idpayment_type
            from
                tbl_invoice inv 
                    left join
                (select 
                    pm.idinvoice,
                        pm.pm_amount as paymentamt,
                        pc.pc_no,
                        pm.idpayment_type,
                        pm.pm_date
                from
                    tbl_payment_method pm
                left join tbl_payment_cheque pc ON pm.idpayment_cheque = pc.idpayment_cheque
                
                group by pm.idpayment_method) t ON inv.idinvoice = t.idinvoice and t.pm_date=inv.i_date
                    inner join
                tbl_store st ON inv.idstore = st.idstore
                    inner join
                tbl_outlet ou ON st.idoutlet = ou.idoutlet
            where
            inv.i_status=0  and
                inv.idsession = '$idsession'";
        return $this->db->select($query);
    }

}

?>
