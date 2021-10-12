<?php

class dealer_ranking_sales extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function monthlySales($form_array) {
        $monthlySales = array();
        $year_month = '';
        if (isset($form_array['ranking_month_picker']) && $form_array['ranking_month_picker'] != "") {
            $year_month = $form_array['ranking_month_picker'];

            $data_array = explode("-", $year_month);
            $year = $data_array[0];
            $month = $data_array[1];
            $start_date = $year_month . "-" . 01;
            $end_date = date('t', strtotime($start_date));
            $financial_date_begin = '';
            $financial_date_end = '';
            $financial_month_begin = '';
            $financial_month_end = '';
            $fy = '';
            if ($month >= 04) {
                $financial_date_begin = $year . "-04-01";
                $financial_date_end = $year + 1 . "-03-31";
                $financial_month_begin = $year . "-04";
                $financial_month_end = $year + 1 . "-03";
                $fy = $year . "/" . ($year + 1);
            } else if ($month < 04) {
                $financial_date_begin = $year - 1 . "-04-01";
                $financial_date_end = $year . "-03-31";
                $financial_month_begin = $year - 1 . "-04";
                $financial_month_end = $year . "-03";
                $fy = ($year - 1) . "/" . $year;
            }
            //echo $financial_date_begin . "  " . $financial_date_end;
            $sql = "select 
    td.delar_name,
    td.delar_account_no,
    dis.district_name,
    tso.sales_officer_name,
    tar.area_code,
    round(coalesce((select 
                            sum(mtd.current_selling_price) as monthly_target
                        from
                            tbl_sales_officer_monthly_target somt
                                inner join
                            tbl_monthly_target_detail mtd ON somt.monthly_target_id = mtd.monthly_target_id
                                and somt.status = 1
                                and somt.year = " . $year . "
                                and somt.month = " . $month . "
                                and mtd.status = 1
                        where
                            somt.dealer_id = td.delar_id
                        group by somt.monthly_target_id),
                    0),
            2) target,
    round(coalesce((select 
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '" . $start_date . "' and '" . $end_date . "'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no),
                    0),
            2) as actual,
    round(coalesce((select 
                            (sum(mtd.current_selling_price)) as monthly_target
                        from
                            tbl_sales_officer_monthly_target somt
                                inner join
                            tbl_monthly_target_detail mtd ON somt.monthly_target_id = mtd.monthly_target_id
                                and somt.status = 1
                                and mtd.status = 1
                                and concat(somt.year, '-', somt.month) between '" . $financial_month_begin . "' and '" . $financial_month_end . "'
                        where
                            somt.dealer_id = td.delar_id
                        group by somt.dealer_id),
                    0),
            2) as total_target,
    round(coalesce((select 
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '" . $financial_date_begin . "' and '" . $financial_date_end . "'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no),
                    0),
            2) as commulative_actual,
    round(coalesce((select 
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '" . $financial_date_begin . "' and '" . $financial_date_end . "'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no) / 12,
                    0),
            2) as avg_sales
from
    tbl_dealer td
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_branch tbr ON tso.branch_id = tbr.branch_id
        inner join
    tbl_area tar ON tbr.area_id = tar.area_id
        inner join
    tbl_district dis ON td.district_id = dis.district_id
where
    td.status = 1
    order by commulative_actual desc
"; /* order by commulative_actual desc */
            $monthlySales['ranking_data'] = $this->db->mod_select($sql);
            $monthlySales['fy_data'] = array('fy' => $fy, 'month' => $month);
            return $monthlySales;
        }



//        $mon = $in['month'];r
////        $Year = substr($mon, 0, 4);
////        $startDate = $Year - 1;
////        $startDate = $startDate + "-03-01";
////        $endDate = $Year + "-03-01";
//
//        $Year = substr($mon, 0, 4);
//        $month = substr($mon, 5, 2);
//        $Year1 = $Year;
//
//        if ($month >= 3)
//            $Year ++;
//
//        $startDate = $Year - 1;
//        $startDate = $startDate . "-03-1";
//        $endDate = $Year . "-02-29";
//
//        $sql = "SELECT td.delar_name,td.delar_account_no,dis.district_name,br.branch_name,so.sales_officer_name,ar.area_code,ROUND((SELECT SUM(sl1.selling_val) FROM tbl_all_sales sl1 WHERE date(sl1.date_edit) BETWEEN CONCAT($Year1, '-'," . $month . ", '-01') AND CONCAT($Year1, '-'," . $month . ", '-31')  AND sl1.acc_no = td.delar_account_no GROUP BY sl1.acc_no),2) AS total_sale,ROUND((SELECT SUM(sl1.selling_val) FROM tbl_all_sales sl1 WHERE date(sl1.date_edit)  BETWEEN  '" . $startDate . "'  AND  '" . $endDate . "' AND  sl1.acc_no = td.delar_account_no GROUP BY sl1.acc_no),2)  AS  actual_total,(SELECT ROUND(sum(sl1.selling_val)/12,2) FROM tbl_all_sales sl1 WHERE date(sl1.date_edit)  BETWEEN  '" . $startDate . "'  AND  '" . $endDate . "' AND  sl1.acc_no = td.delar_account_no GROUP BY sl1.acc_no)  AS  avg_annual_sale FROM tbl_dealer td,tbl_district dis,tbl_branch br,tbl_sales_officer so,tbl_area ar,tbl_all_sales sl WHERE td.district_id = dis.district_id AND  td.branch_id = br.branch_id AND  td.sales_officer_id = so.sales_officer_id AND  br.area_id = ar.area_id  AND  sl.acc_no = td.delar_account_no GROUP  BY  sl.acc_no ORDER BY br.branch_name";
//        $result = $this->db->mod_select($sql);
//        return $result;
    }

}
