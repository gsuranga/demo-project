<?php

class parts_number_wise_report extends CI_Model {

    public function part_no_overall($input) {
        $mon_year = $input;

        $yr = substr($mon_year, 0, 4);
        $mon = substr($mon_year, 5, 2);

        if ($mon == 12) {
            $mon2 = 12;
            $yr2 = $yr - 1;
        } else {
            $mon2 = $mon - 1;
            $yr2 = $yr;
        }

        $item_id_query = "SELECT DISTINCT it.item_part_no AS part, it.item_id AS item,it.selling_price FROM tbl_item it, tbl_sales_officer_monthly_target somt,tbl_monthly_target_detail td WHERE it.item_id = td.item_id AND td.monthly_target_id = somt.monthly_target_id AND somt.year = " . $yr . " AND somt.month = " . $mon;
        $item_id_query2 = "SELECT DISTINCT it.item_part_no AS part, it.item_id AS item FROM tbl_item it, tbl_sales_officer_monthly_target somt,tbl_monthly_target_detail td WHERE it.item_id = td.item_id AND td.monthly_target_id = somt.monthly_target_id AND somt.year = " . $yr2 . " AND somt.month = " . $mon2;

        $result_item = $this->db->mod_select($item_id_query);
        $result_item2 = $this->db->mod_select($item_id_query2);


        $all_area_query = "SELECT area_id,area_name FROM tbl_area";
        $result_area = $this->db->mod_select($all_area_query);

        $all_row_result = array();

        $count_area = count($result_area);
        $count_item = count($result_item);

// 24-03

        $count_item2 = count($result_item2);
        $previous_month = array();

        if ($count_item2 == 0) {

        } else {


            for ($old = 0; $old < $count_item2; $old++) { // for # 1
                $item_id2 = $result_item2[$old]->item;
                $part2 = $result_item2[$old]->part;

                $tot_min2 = 0;
                $tot_act2 = 0;
                $tot_add2 = 0;
                $tot_variance = 0;

                $area_array2 = array();
                $all_area_array2 = array();

                for ($area_old = 0; $area_old < $count_area; $area_old++) {  // for #2 area
                    $area_id2 = $result_area[$area_old]->area_id;
                    $query2 = "SELECT DISTINCT SUM(td.minimum_qty) AS min_order, SUM(td.additional_qty) AS additional, (SELECT   SUM(sal.qty)   FROM  tbl_all_sales sal,  tbl_item it   WHERE  sal.part_no = it.item_part_no AND it.item_id = td.item_id AND year(sal.date_edit) = " . $yr2 . " AND month(sal.date_edit) = " . $mon2 . "  AND sal.area_id = " . $area_id2 . "   GROUP BY sal.part_no) AS actual FROM tbl_monthly_target_detail td WHERE td.item_id = " . $item_id2 . "   AND td.monthly_target_id IN (SELECT   somt.monthly_target_id   FROM  tbl_sales_officer_monthly_target somt,  tbl_sales_officer so,  tbl_branch tb   WHERE  tb.branch_id = so.branch_id AND so.sales_officer_id = somt.sales_officer_id AND tb.area_id = " . $area_id2 . " AND tb.status = 1 AND so.status = 1 AND somt.status = 1 AND somt.year = " . $yr2 . " AND somt.month = " . $mon2 . ") GROUP BY td.item_id ";

                    $result2 = $this->db->mod_select($query2);

                    $min_order2 = 0;
                    $actual2 = 0;
                    $add_order2 = 0;

                    if (count($result2) != 0) {
                        if ($result2[0]->min_order != NULL)
                            $min_order2 = $result2[0]->min_order;
                        if ($result2[0]->actual != NULL)
                            $actual2 = $result2[0]->actual;
                        if ($result2[0]->additional != NULL)
                            $add_order2 = $result2[0]->additional;

                        $variance2 = ($min_order2 + $add_order2) - $actual2;
                        $tot_variance = $tot_variance + $variance2;

                        $area_array2 = array("area_id" => $area_id2, "area_name" => $result_area[$area_old]->area_name, "variance" => $variance2);
                        array_push($all_area_array2, $area_array2);

                        $tot_min2 = $tot_min2 + $min_order2;
                        $tot_act2 = $tot_act2 + $actual2;
                        $tot_add2 = $tot_add2 + $add_order2;
                    }else {

                        $variance2 = 0;
                        // echo '<br>';
                        $area_array2 = array("area_id" => $area_id2, "area_name" => $result_area[$area_old]->area_name, "variance" => $variance2);
                        array_push($all_area_array2, $area_array2);
                    }
                } // for #2 area

                array_push($previous_month, array("item_id" => $item_id2, "part" => $part2, "all_area" => $all_area_array2, "tot_variance" => $tot_variance));
                // print_r($previous_month);
            } // for #1
        }
// 24 -03
        if ($count_item == 0)
            return;
        else {


            for ($i = 0; $i < $count_item; $i++) {
                $item_id = $result_item[$i]->item;
                $sel_price = $result_item[$i]->selling_price;
                $part = $result_item[$i]->part;
                $tot_bbf = 0;

                $tot_min = 0;
                $tot_act = 0;
                $tot_add = 0;
                $tot_target = 0;
                $tot_variance = 0;

                $area_array = array();
                $all_area_array = array();

                for ($area = 0; $area < $count_area; $area++) {
                    $area_id = $result_area[$area]->area_id;
                    $query = "SELECT DISTINCT SUM(td.minimum_qty) AS min_order, SUM(td.additional_qty) AS additional, (SELECT   SUM(sal.qty)   FROM  tbl_all_sales sal,  tbl_item it   WHERE  sal.part_no = it.item_part_no AND it.item_id = td.item_id AND year(sal.date_edit) = " . $yr . " AND month(sal.date_edit) = " . $mon . " AND sal.area_id = " . $area_id . "  GROUP BY sal.part_no) AS actual FROM tbl_monthly_target_detail td WHERE td.item_id = " . $item_id . "   AND td.monthly_target_id IN (SELECT   somt.monthly_target_id   FROM  tbl_sales_officer_monthly_target somt,  tbl_sales_officer so,  tbl_branch tb   WHERE  tb.branch_id = so.branch_id AND so.sales_officer_id = somt.sales_officer_id AND tb.area_id = " . $area_id . " AND tb.status = 1 AND so.status = 1 AND somt.status = 1 AND somt.year = " . $yr . " AND somt.month = " . $mon . ") GROUP BY td.item_id ";

                    $result = $this->db->mod_select($query);

                    $min_order = 0;
                    $actual = 0;
                    $add_order = 0;


                    if (count($result) != 0) {

                        if ($result[0]->min_order != NULL)
                            $min_order = $result[0]->min_order;
                        if ($result[0]->actual != NULL)
                            $actual = $result[0]->actual;
                        if ($result[0]->additional != NULL)
                            $add_order = $result[0]->additional;


                        $bbf = 0;

                        for ($c = 0; $c < count($previous_month); $c++) {

                            if ($previous_month[$c]['item_id'] == $item_id) {
                                $bbf = $previous_month[$c]['all_area'][$area]['variance'];
                                $tot_bbf = $tot_bbf + $bbf;
                            }
                        }


                        $area_array = array("item_id" => $item_id, "part" => $part, "area_id" => $area_id, "area_name" => $result_area[$area]->area_name, "bbf" => $bbf, "min_order" => $min_order, "add_order" => $add_order, "actual" => $actual);
                        array_push($all_area_array, $area_array);

                        $tot_min = $tot_min + $min_order;
                        $tot_act = $tot_act + $actual;
                        $tot_add = $tot_add + $add_order;
                    } else {


                        $bbf = 0;

                        $area_array = array("item_id" => $item_id, "part" => $part, "area_id" => $area_id, "area_name" => $result_area[$area]->area_name, "bbf" => $bbf, "min_order" => $min_order, "add_order" => $add_order, "actual" => $actual);
                        array_push($all_area_array, $area_array);
                    }
                }
                //print_r($all_area_array);

                $tot_target = $tot_min + $tot_add;
                $tot_variance = $tot_target - $tot_act;
                array_push($all_row_result, array("part_no" => $part, "selling_price" => $sel_price, "bbf" => $tot_bbf, "tot_target" => $tot_target, "tot_actual" => $tot_act, "tot_min" => $tot_min, "tot_add" => $tot_add, "variance" => $tot_variance, "reason" => "-", "area_array" => $all_area_array));
            }
            return $all_row_result;
        }
    }

}
