<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of s_o_monthly_target_model
 *
 * @author Iresha Lakmali
 */
class s_o_monthly_target_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSalesOfficer($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE sales_officer_name LIKE '$q%'";
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

    public function get_all_branch_name($q, $select) {

        $sql = "select branch_id,branch_name from tbl_branch WHERE branch_name LIKE '$q%'";
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

    public function get_all_area_name($q, $select) {
        $sql = "select area_id,area_name from tbl_area WHERE area_name LIKE '$q%'";
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

    public function getAllDealerName($q, $select, $name = 0) {
        $sql = "select delar_id,delar_name,delar_account_no,discount_percentage from tbl_dealer where sales_officer_id= " . $name . " and delar_name like '" . $q . "%'";
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

    public function getDealerAccNo($q, $select, $name = 0) {
        $sql = "select delar_id, delar_name, delar_account_no, discount_percentage from tbl_dealer where sales_officer_id = " . $name . " and delar_account_no like '" . $q . "%'  limit 10";
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

    public function getAllVehiclePartNo($q, $select) {
        $sql = "select all_sales_id,part_no,description from tbl_all_sales WHERE part_no LIKE '$q%'";
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

    public function getAllVehicleDescription($q, $select) {
        $sql = "select all_sales_id,part_no,description from tbl_all_sales WHERE description LIKE '$q%'";
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

//     public function get_dealer_order_history($delar_account_no) {
//        $sql = "select part_no,description,qty from tbl_all_sales WHERE acc_no='".$delar_account_no."'";
//        echo $sql;
//        $mod_select = $this->db->mod_select($sql);
//        if (count($mod_select) > 0) {
//            return $mod_select;
//        } else {
//            return 0;-
//        }
//        
//    }

    public function get_dealer_order_history() {
        $sql = "select part_no,description,qty from tbl_all_sales WHERE acc_no='831C9902'";
        return $this->db->mod_select($sql);
    }

    public function drawSOMonthlyTargetReport() {
//  $sql = "select d.delar_id,d.delar_account_no,d.delar_name,s.part_no,s.description,s.qty,som.monthly_target_id,m.item_qty,a.item_qty,(a.item_qty+m.item_qty) as total_target,(qty/(a.item_qty+m.item_qty)) as variance  from tbl_dealer d INNER JOIN tbl_all_sales s ON d.delar_id=s.delar_id INNER JOIN tbl_sales_officer_monthly_target som INNER JOIN tbl_monthly_target_minimum m ON som.monthly_target_id=m.monthly_target_id INNER JOIN tbl_monthly_target_additional a ON som.monthly_target_id=a.monthly_target_id LIMIT 20";
        $sql = "select mm.item_qty as minimum_target,i.item_part_no,i.description,d.delar_account_no,d.delar_name,adi.item_qty as aditional_target,(mm.item_qty+adi.item_qty) as total_target from tbl_monthly_target_minimum mm INNER JOIN tbl_item i ON mm.item_id=i.item_id INNER JOIN tbl_dealer d INNER JOIN tbl_sales_officer_monthly_target somt ON somt.dealer_id=d.delar_id INNER JOIN tbl_monthly_target_additional adi  ON adi.item_id=i.item_id LIMIT 10";
        echo $sql;
        return $this->db->mod_select($sql);
    }

    public function drawDelarWiseMonthlyTarget() {
        $sql = "";
        return $this->db->mod_select($sql);
    }

    public function currentStocksAtDealer() {
        $sql = "select tmtd.item_id,tmtd.minimum_qty,tmtd.additional_qty,ti.item_part_no,ti.description from tbl_monthly_target_detail tmtd INNER JOIN tbl_sales_officer_monthly_target tsomt ON tmtd.monthly_target_id=tsomt.monthly_target_id INNER JOIN tbl_item ti ON tmtd.item_id=ti.item_id where tsomt.dealer_id='15'";
        return $this->db->mod_select($sql);
    }

    public function createSalesOfficerMonthlyTarget($dataArray) {
        $target_month = $dataArray['target_month'];
        $sales_officer = $dataArray['sales_officer_id'];
        $dealer = $dataArray['dealer_id'];
        if (!empty($sales_officer) && !empty($dealer) && !empty($target_month)) {
            $this->db->__beginTransaction();
            $date = explode("-", $target_month);
            $year = $date[0];
            $month = $date[1];
            $previousTargets = $this->checkPreviousTargets($sales_officer, $dealer, $year, $month);
            $count = count($previousTargets);
            if ($count == 0) {
                $data = array(
                    'sales_officer_id' => $sales_officer,
                    'dealer_id' => $dealer,
                    'year' => $year,
                    'month' => $month,
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'discount_percentage' => $dataArray['txt_discount'],
                    'status' => 1
                );
                $rows = $dataArray['emp_count'];
                $rows++;

                $this->db->insertData("tbl_sales_officer_monthly_target", $data);
                $insert_id = $this->db->insert_id();

                for ($x = 1; $x < $rows; $x++) {
                    if (isset($dataArray['txt_responsibility_id_' . $x])) {
                        $dataArray1 = array(
                            'monthly_target_id' => $insert_id,
                            'item_id' => $dataArray['txt_responsibility_id_' . $x],
                            'minimum_qty' => $dataArray['txt_quantity_' . $x],
                            'additional_qty' => $dataArray['txt_quantity1_' . $x],
                            'current_selling_price' => $dataArray['txt_selling_price_' . $x],
                            'status' => 1
                        );

                        $this->db->insertData("tbl_monthly_target_detail", $dataArray1);
                    }
                }


                $this->db->__endTransaction();
                return $this->db->status();
            } else {
                return 2;
            }
        }
    }

    public function dealerWiseOrder() {
        $sql = "select
    i.item_part_no,
    i.description,
    m.item_qty as minimum_target,
    a.item_qty as additional_target
from
    tbl_item i
        INNER JOIN
    tbl_monthly_target_minimum m ON i.item_id = m.item_id
        INNER JOIN
    tbl_sales_officer_monthly_target t ON m.monthly_target_id = t.monthly_target_id
        LEFT JOIN 
    tbl_monthly_target_additional a ON a.monthly_target_id = t.monthly_target_id
WHERE
    t.dealer_id = '2' AND t.year = '2014-08'";
        echo $sql;
        return $this->db->mod_select($sql);
    }

    public function searchSalesOfficerMonthlyTarget() {
        $append = '';
        if (isset($_POST['sales_officer_id']) && $_POST['sales_officer_id'] != '') {
            $sales_officer_id = $_POST['sales_officer_id'];
            $append = "d.sales_officer_id='$sales_officer_id'";
        }
// $sql = "select d.delar_account_no,d.delar_name,d.delar_id,s.sales_officer_name from tbl_dealer d INNER JOIN tbl_sales_officer s ON d.sales_officer_id=s.sales_officer_id WHERE d.status='1' AND {$append}";
        $sql = "select d.delar_account_no,d.delar_name,d.delar_id,s.sales_officer_name,count(d.delar_id) from tbl_dealer d INNER JOIN tbl_sales_officer s ON d.sales_officer_id=s.sales_officer_id WHERE d.status='1' AND {$append}";
        return $this->db->mod_select($sql);
    }

    public function currentStockAtDealer($dealer_id, $target_month) {
        $explode = explode("-", $target_month);
        $month = $explode[1];
        $year = $explode[0];
        $target_month_date = $target_month . "-01";
        $year1 = '';
        $year2 = '';
        if ($month < 4) {
            $year1 = $year - 1;
            $year2 = $year;
        } else {
            $year1 = $year;
            $year2 = $year + 1;
        }
        $fy_start = $year1 . "-04-01";
        $fy_end = $year2 . "-03-31";
     echo   $sql = "select distinct
    it.item_id,
    it.selling_price,
    it.item_part_no,
    it.description,
    coalesce((select 
                    sum(tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = it.item_id
                        and somt.dealer_id = td.delar_id
                        and date(concat(year, '-', month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month)),
            0) - coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = it.item_id
                        and td1.delar_id = td.delar_id
                        and als1.date_edit between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month))) as bbf,
    coalesce((select 
                    remaining_qty
                from
                    tbl_dealer_stock tds
                where
                    tds.dealer_id = td.delar_id
                        and tds.part_id = it.item_id),
            0) as current_stock,
    coalesce((select 
                    re_order_qty
                from
                    tbl_dealer_stock tds
                where
                    tds.dealer_id = td.delar_id
                        and tds.part_id = it.item_id),
            0) as re_order_qty,
    round(coalesce((select 
                            sum(als1.qty) / 12
                        from
                            tbl_all_sales als1
                                inner join
                            tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                                and td1.status = 1
                                and als1.status = 1
                                inner join
                            tbl_item it1 ON als1.part_no = it1.item_part_no
                                and it1.status = 1
                        where
                            td1.delar_id = td.delar_id
                                and it1.item_id = it.item_id
                                and als1.date_edit between '" . $fy_start . "' and '" . $fy_end . "'),
                    0),
            2) as movement,
    coalesce((select 
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 1 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 1 month))
                        and tmtd.item_id = it.item_id
                        and somt.dealer_id = td.delar_id),
            0) as month1_target,
    coalesce((select 
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = it.item_id
                        and td1.delar_id = td.delar_id
                        and als1.date_edit between date_sub('" . $target_month_date . "', interval 1 month) and last_day('" . $target_month_date . "' - interval 1 month)),
            0) as month1_actual,
    coalesce((select 
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 2 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 2 month))
                        and tmtd.item_id = it.item_id
                        and somt.dealer_id = td.delar_id),
            0) as month2_target,
    coalesce((select 
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = it.item_id
                        and td1.delar_id = td.delar_id
                        and als1.date_edit between date_sub('" . $target_month_date . "', interval 2 month) and last_day('" . $target_month_date . "' - interval 2 month)),
            0) as month2_actual,
    coalesce((select 
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 3 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 3 month))
                        and tmtd.item_id = it.item_id
                        and somt.dealer_id = td.delar_id),
            0) as month3_target,
    coalesce((select 
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = it.item_id
                        and td1.delar_id = td.delar_id and als1.date_edit between date_sub('" . $target_month_date . "', interval 3 month) and last_day('" . $target_month_date . "' - interval 3 month)),
            0) as month3_actual
from
    tbl_all_sales als
        inner join
    tbl_dealer td ON als.acc_no = td.delar_account_no
        and td.status = 1
        inner join
    tbl_item it ON als.part_no = it.item_part_no
        and it.status = 1
where
    td.delar_id = " . $dealer_id . "
        and als.date_edit between date_sub('" . $target_month_date . "', interval 3 month) and last_day('" . $target_month_date . "' - interval 1 month)
order by bbf desc";
        return $this->db->mod_select($sql);
    }

    public function getCurrentSalesOfficer($emp_id) {
        $sql = "select name from tbl_user where typeid = 3 and employee_id = " . $emp_id . " and status = 1";
        return $this->db->mod_select($sql);
    }

    public function checkPreviousTargets($sales_officer, $dealer, $year, $month) {
        $sql = "select 
    *
from
    tbl_sales_officer_monthly_target somt
where
    somt.dealer_id = " . $dealer . " and somt.month = " . $month . "
        and somt.sales_officer_id = " . $sales_officer . "
        and somt.year = " . $year . "
        and somt.status = 1";
        return $this->db->mod_select($sql);
    }

    public function getFastMovingItemsForArea($dealer_id, $target_month) {
        $cur_date = date_create($target_month . "-01");
        $cur_date1 = date_create($target_month . "-01");
        $cur_date->modify("last day of previous month");
        $cur_date1->modify("first day of previous month");
        $last_date_of_previous_month = $cur_date->format("Y-m-d");
        $first_date_of_previous_month = $cur_date1->format("Y-m-d");
        $date_create = date_create($first_date_of_previous_month);
        date_sub($date_create, date_interval_create_from_date_string("5 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");
        $sql = "select 
    t2.item_id,
    round(t2.selling_price, 2) as selling_price,
    t2.item_part_no,
    t2.description,
    @avg_monthly_movement_in_area:=round(ifnull((select 
                            sum(tals.qty) / 6
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and ti.status = 1
                                and tals.status = 1
                                inner join
                            tbl_dealer td ON tals.acc_no = td.delar_account_no
                                and td.status = 1
                                inner join
                            tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
                                and tso.status = 1
                        where
                            tso.sales_officer_id = ((select 
                                    sales_officer_id
                                from
                                    tbl_dealer
                                where
                                    delar_id = " . $dealer_id . " and status = 1))
                                and ti.item_id = t2.item_id
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
                        group by ti.item_id),
                    0),
            2) as quantity,
    round(t2.selling_price * @avg_monthly_movement_in_area,
            2) as turnover
from
    (select 
        ti.item_id, ti.item_part_no, ti.description
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    inner join tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
    where
        td.delar_id = " . $dealer_id . "
            and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
    group by ti.item_id) t1
        right join
    (select 
        ti.item_id,
            ti.item_part_no,
            ti.description,
            ti.selling_price
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    inner join tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
    where
        tso.sales_officer_id = ((select 
                sales_officer_id
            from
                tbl_dealer
            where
                delar_id = " . $dealer_id . " and status = 1))
            and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
    group by ti.item_id) t2 ON t1.item_id = t2.item_id
where
    t1.item_id is null
order by quantity desc
limit 10";
        return $this->db->mod_select($sql);
    }

}

?>
