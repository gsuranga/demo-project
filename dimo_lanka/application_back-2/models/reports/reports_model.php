<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reports_model
 *
 * @author Iresha Lakmali
 */
class reports_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * 
     * knet
     */

    public function getTrackingDetails() {
        $sql = "SELECT * FROM `tbl_gps` WHERE 1";
        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['lat'] = $row['lat'];
            $subJson['longi'] = $row['lon'];
            $subJson['bat'] = $row['battery'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];

            array_push($json_array['locations'], $subJson);
        }

        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    /*
     * 
     */

    public function getAllTotalCost($config, $page) {
        $sql = "select part_no,description,qty,cost_prie,(cost_prie*qty) as total from tbl_sales_items LIMIT $page,$config";
        return $this->db->mod_select($sql);
    }

    public function record_count() {
        $this->db->from('tbl_sales_items');
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function getAllSalesValue($config, $page) {
        $sql = "select part_no,description,qty,sell_val,if(sell_val>0,(sell_val*qty),(sell_val*qty*-1)) as total from tbl_sales_items LIMIT $page,$config";
        return $this->db->mod_select($sql);
    }

    public function salesReport() {
        $sql = "select p.description,p.pricing_cat,p.pg_cat,s.part_no from tbl_partnumbers p INNER JOIN tbl_sales_items s ON p.part_no=s.part_no";
        return $this->db->mod_select($sql);
    }

    public function grossProfitMargin() {
        $sql = "select acc_no,cus_name,part_no,description,(sell_val)-(cost_prie) as average  from tbl_sales_items GROUP BY  acc_no";
        return $this->db->mod_select($sql);
    }

    public function salesManLocationCount() {
        $sql = "select se,se_name ,location  ,count(location) as Visit_Count from tbl_sales_items group by se ,location";
        return $this->db->mod_select($sql);
    }

    /* DLR NEW : DINESH */

    /* ----------------------------------------DLR Report-------------------------------------------- */

    public function generateDLR_Report($data_array) {
        $extra_data = array();
        if (array_filter($data_array)) {
            $extra_data['form_data'] = $data_array;
            $area = $data_array['select_dlr_area'];
            $start_date = $data_array['dlr_start_date'];
            $end_date = $data_array['dlr_end_date'];
            if ($area == 1) {
                $extra_data['vsd_pdi'] = $this->getVSD_PDI($start_date, $end_date);
                $extra_data['weli_c'] = $this->getCounterSales(15, $start_date, $end_date);
                $extra_data['vsd_returns'] = $this->getVSD_Returns($start_date, $end_date);
                $extra_data['stock_adj'] = $this->getSalesByDECode("J", $start_date, $end_date);
                $extra_data['kandy_d_sales'] = $this->getSalesByDECode("M", $start_date, $end_date);
                $extra_data['matara_d_sales'] = $this->getSalesByDECode("N", $start_date, $end_date);
                $extra_data['colombo_d_sales'] = $this->getSalesByDECode("O", $start_date, $end_date);
                $extra_data['kurunegala_d_sales'] = $this->getSalesByDECode("P", $start_date, $end_date);
                $extra_data['jaffna_d_sales'] = $this->getSalesByDECode("Q", $start_date, $end_date);
                $extra_data['apura_d_sales'] = $this->getSalesByDECode("R", $start_date, $end_date);
                $extra_data['ampara_d_sales'] = $this->getSalesByDECode("S", $start_date, $end_date);
                $extra_data['kuruwita_d_sales'] = $this->getSalesByDECode("U", $start_date, $end_date);
            } else if ($area == 2) {
                $extra_data['balagolla_c'] = $this->getCounterSales(1, $start_date, $end_date);
                $extra_data['kandy_c'] = $this->getCounterSales(2, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(1, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(1, $start_date, $end_date, 1);
                $extra_data['kandy_field'] = $this->getFieldSales(2, $start_date, $end_date);
            } else if ($area == 3) {
                $extra_data['matara_c'] = $this->getCounterSales(3, $start_date, $end_date);
                $extra_data['ambalan_c'] = $this->getCounterSales(4, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(2, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(2, $start_date, $end_date, 1);
                $extra_data['matara_field'] = $this->getFieldSales(3, $start_date, $end_date);
            } else if ($area == 4) {
                $extra_data['colombo_c'] = $this->getCounterSales(5, $start_date, $end_date);
                $extra_data['siyabal_c'] = $this->getCounterSales(6, $start_date, $end_date);
                $extra_data['yakkala_c'] = $this->getCounterSales(7, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(3, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(4, $start_date, $end_date, 1);
                $extra_data['colombo_field'] = $this->getFieldSales(4, $start_date, $end_date);
                $extra_data['colombo_unit'] = $this->getColomboUnitRepais($start_date, $end_date);
                $extra_data['colombo_ins'] = $this->getColomboInstitutionalSales($start_date, $end_date);
            } else if ($area == 5) {
                $extra_data['kuruwita_c'] = $this->getCounterSales(8, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(4, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(4, $start_date, $end_date, 1);
                $extra_data['kuruwita_field'] = $this->getFieldSales(5, $start_date, $end_date);
            } else if ($area == 6) {
                $extra_data['kurunegala_c'] = $this->getCounterSales(9, $start_date, $end_date);
                $extra_data['puttalam_c'] = $this->getCounterSales(10, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(5, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(5, $start_date, $end_date, 1);
                $extra_data['kurunegala_field'] = $this->getFieldSales(6, $start_date, $end_date);
            } else if ($area == 7) {
                $extra_data['jaffna_c'] = $this->getCounterSales(11, $start_date, $end_date);
                $extra_data['vavuniya_c'] = $this->getCounterSales(12, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(6, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(6, $start_date, $end_date, 1);
                $extra_data['jaffna_field'] = $this->getFieldSales(7, $start_date, $end_date);
            } else if ($area == 8) {
                $extra_data['apura_c'] = $this->getCounterSales(13, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(7, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(7, $start_date, $end_date, 1);
                $extra_data['apura_field'] = $this->getFieldSales(8, $start_date, $end_date);
            } else if ($area == 9) {
                $extra_data['trinco_c'] = $this->getCounterSales(14, $start_date, $end_date);
                $extra_data['ws_tata'] = $this->getWorkshopSales(8, $start_date, $end_date, 0);
                $extra_data['ws_non_tata'] = $this->getWorkshopSales(8, $start_date, $end_date, 1);
                $extra_data['trinco_field'] = $this->getFieldSales(9, $start_date, $end_date);
            } else if ($area == 10) {
                $extra_data['ampara_field'] = $this->getFieldSales(10, $start_date, $end_date);
            }
        }
        return $extra_data;
    }

    public function getCounterSales($counter, $start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
        inner join
    tbl_counter tco ON ar.area_id = tco.area_id
        and als.de = tco.identifier
        and tco.counter_id = " . $counter . "
where
     als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getWorkshopSales($ws, $start_date, $end_date, $tata) {
        $append = "";
        switch ($tata) {
            case 0: $append = "and (als.part_no like 'T%' or als.part_no like 'V%')";
                break;

            case 1 : $append = "and (als.part_no not like 'T%' and als.part_no not like 'V%')";
                break;
        }
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
        inner join
    tbl_workshop tw ON ar.area_id = tw.area_id
        and tw.status = 1
        and tw.workshop_id = " . $ws . "
        and als.de = tw.identifier
where
    als.date_edit between '" . $start_date . "' and '" . $end_date . "'" . $append;
        return $this->db->mod_select($sql);
    }

    public function getFieldSales($area_id, $start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
        inner join
    tbl_sales_officer tso ON als.s_e_code = tso.sales_officer_code
        and tso.status = 1
where
    tso.sales_type_id = 1 and ar.area_id = " . $area_id . "
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getColomboUnitRepais($start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
where
    ar.area_id = 4 and als.de = 'Z'
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getColomboInstitutionalSales($start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
        inner join
    tbl_sales_officer tso ON als.s_e_code = tso.sales_officer_code
        and tso.status = 1
where
    tso.sales_type_id = 5 and ar.area_id = 4
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getVSD_PDI($start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
where
    ar.area_id = 1 and als.de = 'I'
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getVSD_Returns($start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
where
    ar.area_id = 1 and als.de = 'L'
        and als.qty < 0
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    public function getSalesByDECode($de_code, $start_date, $end_date) {
        $sql = "select 
    als.part_no,
    als.description,
    als.date_edit,
    als.time,
    als.acc_no,
    als.customer_name,
    als.qty,
    als.selling_val,
    als.invoice,
    als.wip,
    als.location,
    als.in_s,
    als.de,
    als.disc,
    als.s_e_name,
    als.authorised_by,
    als.vehicle_reg_no
from
    tbl_all_sales als
        inner join
    tbl_area ar ON als.area_id = ar.area_id
        and als.status = 1
        and ar.status = 1
where
    ar.area_id = 1 and als.de = '" . $de_code . "'
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'";
        return $this->db->mod_select($sql);
    }

    /* DLR NEW : DINESH */
    /*
      public function ip1Report() {
      $append = "";
      if ((isset($_REQUEST['start_date_name']) && isset($_REQUEST['end_date_name'])) && ($_REQUEST['start_date_name'] != null && $_REQUEST['end_date_name'] != null)) {
      $std = $_REQUEST['start_date_name'];
      $sen = $_REQUEST['end_date_name'];
      $append.="where date_edit between '$std' and '$sen'";
      }


      $sql = "SELECT
      tas.acc_no,
      tas.part_no,
      tas.date_edit,
      tas.customer_name,
      sum(tas.qty) as qty,
      sum(tas.selling_val) as selling_val,
      tas.invoice,
      tas.wip,
      tas.location,
      tas.in_s,
      tas.de,
      tas.disc,
      tas.name_op,
      tas.vehicle_reg_no,
      tad.def,
      tas.s_e_name,
      tad.def_id
      FROM
      tbl_all_sales tas
      left join
      tbl_acc_def tad ON tas.acc_no = tad.acc_no {$append}
      group by tas.all_sales_id
      order by tad.def";

      return $this->db->mod_select($sql);
      }

      public function sample_ip1Report() {
      $append = "";
      if ((isset($_REQUEST['start_date_name']) && isset($_REQUEST['end_date_name'])) && ($_REQUEST['start_date_name'] != null && $_REQUEST['end_date_name'] != null)) {
      $std = $_REQUEST['start_date_name'];
      $sen = $_REQUEST['end_date_name'];
      $append.="and date_edit between '$std' and '$sen'";
      }


      $sql = "select * from tbl_all_sales tas inner join tbl_area_codes tac on tas.de = tac.symbol where tas.part_no not like 'zq%' {$append} order by tas.de asc";

      return $this->db->mod_select($sql);
      }

      public function sample_ip1Report_zq() {
      $append = "";
      if ((isset($_REQUEST['start_date_name']) && isset($_REQUEST['end_date_name'])) && ($_REQUEST['start_date_name'] != null && $_REQUEST['end_date_name'] != null)) {
      $std = $_REQUEST['start_date_name'];
      $sen = $_REQUEST['end_date_name'];
      $append.="and date_edit between '$std' and '$sen'";
      }


      $sql = "select * from tbl_all_sales tas inner join tbl_area_codes tac on tas.de = tac.symbol where tas.part_no  like 'zq%' {$append} order by tas.de asc";

      return $this->db->mod_select($sql);
      }

      public function finalIp1ReportTata($id) {
      $append = "";
      if ((isset($_REQUEST['start_date_id']) && $_REQUEST['start_date_id'] != null) && (isset($_REQUEST['end_date_id']) && $_REQUEST['end_date_id'] != null)) {
      $start = $_REQUEST['start_date_id'];
      $end = $_REQUEST['end_date_id'];
      $append = "and tas.date_edit between '$start' and '$end'";
      }
      $sql = "
      select
      tso.sales_officer_name,
      tas.de,
      concat(tb.branch_name,' ',tdc.sales_type) as type_name,
      tas.authorised_by,
      tas.acc_no,
      tas.wip,
      tas.vehicle_reg_no,
      tas.selling_val,
      tas.s_e_code,
      tas.retail_val,
      tas.qty,
      tas.part_no,
      tas.creating_op,
      tas.invoice,
      tas.date_edit,
      tas.customer_name,
      tas.location,
      tas.in_s,
      tas.disc,
      tas.area_id
      from
      tbl_all_sales tas
      inner join
      tbl_sales_officer tso ON tas.s_e_code = tso.sales_officer_code
      inner join
      tbl_sales_type tst ON tso.sales_type_id = tst.sales_type_id
      inner join
      tbl_branch tb ON tso.branch_id = tb.branch_id
      inner join
      tbl_de_codes tdc on tdc.symbol = tas.de
      where
      tas.part_no not like 'z%'
      and tas.area_id = '$id' {$append}
      order by tas.de , tst.sales_type_id

      ";

      return $this->db->mod_select($sql);
      }

      public function finalIp1ReportNonTata($id) {
      $append = "";
      if ((isset($_REQUEST['start_date_id']) && $_REQUEST['start_date_id'] != null) && (isset($_REQUEST['end_date_id']) && $_REQUEST['end_date_id'] != null)) {
      $start = $_REQUEST['start_date_id'];
      $end = $_REQUEST['end_date_id'];
      $append = "and tas.date_edit between '$start' and '$end'";
      }
      $sql = "
      select
      tso.sales_officer_name,
      tas.de,
      concat(tb.branch_name,' ',tdc.sales_type) as type_name,
      tas.authorised_by,
      tas.acc_no,
      tas.wip,
      tas.vehicle_reg_no,
      tas.selling_val,
      tas.s_e_code,
      tas.retail_val,
      tas.qty,
      tas.part_no,
      tas.creating_op,
      tas.invoice,
      tas.date_edit,
      tas.customer_name,
      tas.location,
      tas.in_s,
      tas.disc,
      tas.area_id
      from
      tbl_all_sales tas
      inner join
      tbl_sales_officer tso ON tas.s_e_code = tso.sales_officer_code
      inner join
      tbl_sales_type tst ON tso.sales_type_id = tst.sales_type_id
      inner join
      tbl_branch tb ON tso.branch_id = tb.branch_id
      inner join
      tbl_de_codes tdc on tdc.symbol = tas.de
      where  tas.area_id = '$id' and tas.part_no not like 't%' {$append}
      order by tas.de , tst.sales_type_id
      ";

      return $this->db->mod_select($sql);
      }

      public function finalIp1ReportVSD($id) {
      $append = "";
      if ((isset($_REQUEST['start_date_id']) && $_REQUEST['start_date_id'] != null) && (isset($_REQUEST['end_date_id']) && $_REQUEST['end_date_id'] != null)) {
      $start = $_REQUEST['start_date_id'];
      $end = $_REQUEST['end_date_id'];
      $append = "and tas.date_edit between '$start' and '$end'";
      }
      $sql = "
      select
      tso.sales_officer_name,
      tas.de,
      tdc.sales_type as type_name,
      tas.authorised_by,
      tas.acc_no,
      tas.wip,
      tas.vehicle_reg_no,
      tas.selling_val,
      tas.s_e_code,
      tas.retail_val,
      tas.qty,
      tas.part_no,
      tas.creating_op,
      tas.invoice,
      tas.date_edit,
      tas.customer_name,
      tas.location,
      tas.in_s,
      tas.disc,
      tas.area_id
      from
      tbl_all_sales tas
      inner join
      tbl_sales_officer tso ON tas.s_e_code = tso.sales_officer_code
      inner join
      tbl_sales_type tst ON tso.sales_type_id = tst.sales_type_id
      inner join
      tbl_branch tb ON tso.branch_id = tb.branch_id
      inner join
      tbl_de_codes tdc on tdc.symbol = tas.de
      where  tas.area_id = '$id' {$append}
      order by tas.de , tst.sales_type_id
      ";

      return $this->db->mod_select($sql);
      }

      public function finalIp1ReportVSDNotLikeL($id) {
      $append = "";
      if ((isset($_REQUEST['start_date_id']) && $_REQUEST['start_date_id'] != null) && (isset($_REQUEST['end_date_id']) && $_REQUEST['end_date_id'] != null)) {
      $start = $_REQUEST['start_date_id'];
      $end = $_REQUEST['end_date_id'];
      $append = "and tas.date_edit between '$start' and '$end'";
      }
      $sql = "
      select
      tso.sales_officer_name,
      tas.de,
      tdc.sales_type as type_name,
      tas.authorised_by,
      tas.acc_no,
      tas.wip,
      tas.vehicle_reg_no,
      tas.selling_val,
      tas.s_e_code,
      tas.retail_val,
      tas.qty,
      tas.part_no,
      tas.creating_op,
      tas.invoice,
      tas.date_edit,
      tas.customer_name,
      tas.location,
      tas.in_s,
      tas.disc,
      tas.area_id
      from
      tbl_all_sales tas
      inner join
      tbl_sales_officer tso ON tas.s_e_code = tso.sales_officer_code
      inner join
      tbl_sales_type tst ON tso.sales_type_id = tst.sales_type_id
      inner join
      tbl_branch tb ON tso.branch_id = tb.branch_id
      inner join
      tbl_de_codes tdc on tdc.symbol = tas.de
      where  tas.area_id = '$id' and tas.de not like 'L%' {$append}
      order by tas.de , tst.sales_type_id
      ";

      return $this->db->mod_select($sql);
      }
     */

    //-----------------------------Campaign Report------------------------
    public function getAllCampaignTypes() {
        $sql = "SELECT * From tbl_campaign_type where status=1";
        return $this->db->mod_select($sql);
    }

    public function getAllSalesOfficer() {
        $sql = "SELECT sales_officer_id	,sales_officer_name From tbl_sales_officer where status=1";
        return $this->db->mod_select($sql);
    }

    public function getTotalCampaign($campaigntypes, $salesofficer) {
        $sql = "SELECT count(tbl_campaign_sales_officer.status) from tbl_campaign tbl_campaign JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign.campaign_type='$campaigntypes' AND tbl_campaign_sales_officer.id_sales_officer='$salesofficer'";
        return $this->db->mod_select($sql);
    }

    public function getTotalCampaignforother($campaigntypes, $salesofficer) {

        $sql = "SELECT count(tbl_campaign_sales_officer.status) from tbl_campaign tbl_campaign JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign.campaign_type not IN($campaigntypes) AND tbl_campaign_sales_officer.id_sales_officer='$salesofficer'";
        return $c = $this->db->mod_select($sql);
    }

    public function getTotalCompletedCampaign($campaigntypes, $salesofficer) {
        $sql = "SELECT count(tbl_campaign.status) from tbl_campaign tbl_campaign JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign.campaign_type='$campaigntypes' AND tbl_campaign_sales_officer.id_sales_officer='$salesofficer' and tbl_campaign.after_ho_permition=1";
        return $this->db->mod_select($sql);
    }

    public function getTotalCompletedCampaignforother($campaigntypes, $salesofficer) {
        $sql = "SELECT count(tbl_campaign.status) from tbl_campaign tbl_campaign JOIN tbl_campaign_sales_officer tbl_campaign_sales_officer ON tbl_campaign.id_campaing=tbl_campaign_sales_officer.id_campaign where tbl_campaign.campaign_type not IN($campaigntypes) AND tbl_campaign_sales_officer.id_sales_officer='$salesofficer' and tbl_campaign.after_ho_permition=1";
        return $this->db->mod_select($sql);
    }

    public function get_aso_for_st($id) {
        $sql = "SELECT 
    concat('row_',tbl_sales_officer.sales_officer_id) AS soid
FROM
    tbl_sales_officer
        RIGHT JOIN
    tbl_sales_type ON tbl_sales_officer.sales_type_id = tbl_sales_type.sales_type_id
WHERE
    tbl_sales_type.`sales_type_id` = $id ";
        return $this->db->mod_select($sql);
    }

    public function get_sales_type() {
        $sql = "SELECT `sales_type_id`,`sales_type_name` FROM `tbl_sales_type` WHERE `status`=1";
        return $this->db->mod_select($sql);
    }

    public function getSalesOfficerSales() {
        $sql = "select 
    temp.selling_val,
    temp.date_edit,
    temp.sales_officer_name,
	
    (select 
            sum(tas.selling_val) as month_val
        from
            tbl_all_sales tas
        where
            tas.s_e_code = temp.s_e_code
                and date(tas.date_edit) between '2014-02-01' and '2014-02-28') as month_val,
    (select 
            sum(tas.selling_val) as annual_val
        from
            tbl_all_sales tas
        where
            tas.s_e_code = temp.s_e_code
                and date(tas.date_edit) between '2014-02-01' and '2015-02-01') as annual_val
from
    (select 
        sum(tas.selling_val) as selling_val,
            tas.date_edit,
            tso.sales_officer_name,
            tas.s_e_code
    from
        tbl_all_sales tas
    inner join tbl_sales_officer tso ON tso.sales_officer_code = tas.s_e_code
    where
        date(tas.date_edit) = '2014-02-13'
    group by date(tas.date_edit) , tas.s_e_code) temp
order by  temp.sales_officer_name";
        return $c = $this->db->mod_select($sql);
    }

    public function getSalesOfficerBudgets() {
        $sql = "select 
    ar.area_name,
    br.branch_name,
    als.s_e_name,
    so.sales_type_id,
    
    @budget_amount:=(select 
            budget_amount / number_of_working_days
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = 2014
                and month = 2) as budget,
    @monthly_budget_amount:=(select 
            round(budget_amount, 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = 2014
                and month = 2
        group by so.sales_officer_id) as monthly_budget,
    @yearly_budget_amount:=(select 
            round(sum(budget_amount), 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = 2014
        group by so.sales_officer_id) as yearly_budget
from
    tbl_all_sales as als
        inner join
    tbl_sales_officer as so ON als.s_e_code = so.sales_officer_code
        inner join
    tbl_branch as br ON so.branch_id = br.branch_id
        inner join
    tbl_area as ar ON br.area_id = ar.area_id
        inner join
    tbl_sales_officer_wise_budget as sob ON so.sales_officer_id = sob.sales_officer_id
where
    als.date_edit = '2014-02-13'
group by date(als.date_edit),als.s_e_code
order by so.sales_officer_name";
        return $c = $this->db->mod_select($sql);
    }

//-----------------------------------------------------------------------------------

    public function get_area() {
        $sql = "select area_id,area_name,area_code from tbl_area where status = 1 ";
        return $this->db->mod_select($sql);
    }

    public function get_field_sales() {
        $sql = "select 
    tso.sales_officer_name,td.delar_shop_name,tb.branch_name,month(tas.date_edit) as month,
	sum(tas.cost_price) as selling_val,
	tas.acc_no,
	(select sum(tmta.item_qty*ti.selling_price)+sum(tmtm.item_qty*ti.selling_price)) as target
	
from
    
    tbl_sales_officer tso
		left join
	tbl_dealer td on tso.sales_officer_id = td.sales_officer_id
		left join
	tbl_branch tb on td.branch_id = tb.branch_id
		left join
	tbl_all_sales tas on tso.sales_officer_code = tas.s_e_code
		inner join
	tbl_district tdis on tdis.district_id = td.district_id
		left join
	tbl_sales_officer_monthly_target tsomt on tso.sales_officer_id = tsomt.sales_officer_id and tsomt.dealer_id = td.delar_id
		left join
	tbl_monthly_target_additional tmta on tsomt.monthly_target_id = tmta.monthly_target_id
		left join
	tbl_monthly_target_minimum tmtm on 	tsomt.monthly_target_id = tmtm.monthly_target_id
		inner join
	tbl_item ti on ti.item_id = tmta.item_id and ti.item_id = tmtm.item_id
 where td.sales_officer_id = '30'
group by td.delar_id,month(tas.date_edit)
      ";
        return $this->db->mod_select($sql);
    }

    /* -----...---------------....--------------------........----sales reports---------......-------------------------.....---------------------- */

    public function getDailySalesSummary($data_array, $sales_type_id) {
        $date = isset($data_array['daily_summary_date']) ? $data_array['daily_summary_date'] : '';
        $query_part = '';
        $full_query = '';
        if (isset($date)) {
            $explode = explode('-', $date);
            $current_year = $explode[0];
            $current_month = isset($explode[1]) ? $explode[1] : '';
            $first_date_of_month = $current_year . "-" . $current_month . "-" . "01";

            if ($current_month == 12) {
                $last_date_of_month = ($current_year + 1) . "-" . "01" . "-" . "01";
            } else {
                $last_date_of_month = $current_year . "-0" . ($current_month + 1) . "-" . "01";
            }

            if ($current_month == 01 || $current_month == 02) {
                $first_date_of_year = ($current_year - 1) . "-" . "04" . "-" . "01";
                $last_date_of_year = $current_year . "-" . "03" . "-" . "01";
            } else {
                $first_date_of_year = $current_year . "-" . "04" . "-" . "01";
                $last_date_of_year = ($current_year + 1) . "-" . "03" . "-" . "01";
            }
            $sql = "select 
    so.sales_officer_code,
    so.sales_officer_name,
    so.sales_type_id,
    br.branch_name,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = so.sales_officer_code
                and date_edit = '" . $date . "'
        group by so.sales_officer_code) as daily_selling,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = so.sales_officer_code
                and date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'
        group by so.sales_officer_code) as monthly_selling,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = so.sales_officer_code
                and date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'
        group by so.sales_officer_code) as yearly_selling,
    (select 
            round((budget_amount / number_of_working_days),
                        2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = " . $current_year . "
                and month = " . $current_month . ") as daily_budget,
    (select 
            round(budget_amount, 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = " . $current_year . "
                and month = " . $current_month . ") as monthly_budget,
    (select 
            round(sum(budget_amount), 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and (year = " . ($current_year - 1) . " or year = " . $current_year . ")) as yearly_budget
from
    tbl_sales_officer as so
        left join
    tbl_all_sales as als ON so.sales_officer_code = als.s_e_code
        inner join
    tbl_branch as br ON so.branch_id = br.branch_id
where 
    ";
            if ($sales_type_id == 1) {
                $query_part = "so.sales_type_id = 1 and so.status = 1 group by so.sales_officer_name order by br.branch_name";
                $full_query = $sql . $query_part;
            } elseif ($sales_type_id == 2) {
                $query_part = "so.sales_type_id = 2 and (als.de = 'A' or als.de = 'C' or als.de = 'E' or als.de = 'L') group by so.sales_officer_name order by br.branch_name";
                $full_query = $sql . $query_part;
            } elseif ($sales_type_id == 5) {
                $query_part = "so.sales_type_id = 5 and als.area_id=4 and so.status=1 group by so.sales_officer_name order by br.branch_name";
                $full_query = $sql . $query_part;
            } elseif ($sales_type_id == 3) {
                $query_part = " als.de = 'B' and so.status = 1 group by so.sales_officer_name order by br.branch_name";
                $full_query = $sql . $query_part;
            }
        }
        $mod_select = $this->db->mod_select($full_query);
        return $mod_select;
    }

    public function getInstitutionalDailySummary($data_array) {
        $date = isset($data_array['daily_summary_date']) ? $data_array['daily_summary_date'] : '';

        if (isset($date)) {
            $explode = explode('-', $date);
            $current_year = $explode[0];
            $current_month = isset($explode[1]) ? $explode[1] : '';
            $first_date_of_month = $current_year . "-" . $current_month . "-" . "01";

            if ($current_month == 12) {
                $last_date_of_month = ($current_year + 1) . "-" . "01" . "-" . "01";
            } else {
                $last_date_of_month = $current_year . "-0" . ($current_month + 1) . "-" . "01";
            }

            if ($current_month == 01 || $current_month == 02) {
                $first_date_of_year = ($current_year - 1) . "-" . "04" . "-" . "01";
                $last_date_of_year = $current_year . "-" . "03" . "-" . "01";
            } else {
                $first_date_of_year = $current_year . "-" . "04" . "-" . "01";
                $last_date_of_year = ($current_year + 1) . "-" . "03" . "-" . "01";
            }
            $sql = "select 
    als.s_e_code,
    als.s_e_name,
    so.sales_type_id,
    br.branch_name,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = als.s_e_code
                and date_edit = '" . $date . "'
        group by als.s_e_code) as daily_selling,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = als.s_e_code
                and date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'
        group by als.s_e_code) as monthly_selling,
    (select 
            round(sum(selling_val), 2)
        from
            tbl_all_sales
        where
            s_e_code = als.s_e_code
                and date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'
        group by als.s_e_code) as yearly_selling,
    (select 
            round((budget_amount / number_of_working_days),
                        2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = " . $current_year . "
                and month = " . $current_month . ") as daily_budget,
    (select 
            round(budget_amount, 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and year = " . $current_year . "
                and month = " . $current_month . ") as monthly_budget,
    (select 
            round(sum(budget_amount), 2)
        from
            tbl_sales_officer_wise_budget
        where
            sales_officer_id = so.sales_officer_id
                and (year = " . $current_year . " or year = " . ($current_year - 1) . ")) as yearly_budget
from
    tbl_all_sales as als
        right join
    tbl_sales_officer as so ON als.s_e_code = so.sales_officer_code
        inner join
    tbl_branch as br ON so.branch_id = br.branch_id
where
    so.sales_type_id = 5 and als.area_id = 4
group by als.s_e_code
order by so.sales_type_id";
            $mod_select = $this->db->mod_select($sql);
            return $mod_select;
        }
    }

    public function getWorkshopSalesDailySummary($data_array) {
        $date = isset($data_array['daily_summary_date']) ? $data_array['daily_summary_date'] : '';
        $query_part = '';
        $full_query = '';
        if (isset($date)) {
            $explode = explode('-', $date);
            $current_year = $explode[0];
            $current_month = isset($explode[1]) ? $explode[1] : '';
            $first_date_of_month = $current_year . "-" . $current_month . "-" . "01";

            if ($current_month == 12) {
                $last_date_of_month = ($current_year + 1) . "-" . "01" . "-" . "01";
            } else {
                $last_date_of_month = $current_year . "-0" . ($current_month + 1) . "-" . "01";
            }

            if ($current_month == 01 || $current_month == 02) {
                $first_date_of_year = ($current_year - 1) . "-" . "04" . "-" . "01";
                $last_date_of_year = $current_year . "-" . "03" . "-" . "01";
            } else {
                $first_date_of_year = $current_year . "-" . "04" . "-" . "01";
                $last_date_of_year = ($current_year + 1) . "-" . "03" . "-" . "01";
            }



            $sql = "SELECT 
    ar.area_name,
    wk.workshop_name,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no like 'TE%'
                and date_edit = '" . $date . "')
        group by wk.workshop_name) as normal_tata_daily,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no like 'TE%'
                and (date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'))
        group by wk.workshop_name) as normal_tata_commulative,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no like 'TE%'
                and (date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'))
        group by wk.workshop_name) as normal_tata_overall,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no not like 'TE%'
                and date_edit = '" . $date . "')
        group by wk.workshop_name) as normal_non_tata_daily,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no not like 'TE%'
                and (date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'))
        group by wk.workshop_name) as normal_non_tata_commulative,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no not like '000W%'
                and part_no not like 'TE%'
                and (date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'))
        group by wk.workshop_name) as normal_non_tata_overall,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no like 'TE%'
                and date_edit = '" . $date . "')
        group by wk.workshop_name) as warrenty_tata_daily,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no like 'TE%'
                and (date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'))
        group by wk.workshop_name) as warrenty_tata_commulative,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no like 'TE%'
                and (date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'))
        group by wk.workshop_name) as warrenty_tata_overall,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no not like 'TE%'
                and date_edit = '" . $date . "')
        group by wk.workshop_name) as warrenty_non_tata_daily,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no not like 'TE%'
                and (date(date_edit) between '" . $first_date_of_month . "' and '" . $date . "'))
        group by wk.workshop_name) as warrenty_non_tata_commulative,
    (select 
            round(sum(selling_val), 2) as total
        from
            tbl_all_sales
        where
            (area_id = ar.area_id
                and de = wk.identifier
                and status = 1
                and acc_no like '000W%'
                and part_no not like 'TE%'
                and (date(date_edit) between '" . $first_date_of_year . "' and '" . $last_date_of_year . "'))
        group by wk.workshop_name) as warrenty_non_tata_overall
from
    tbl_workshop wk
        inner join
    tbl_area ar ON wk.area_id = ar.area_id
        left join
    tbl_all_sales als ON ar.area_id = als.area_id
    where
    wk.status = 1
group by wk.workshop_name
order by ar.area_name
";
            return $this->db->mod_select($sql);
        }

        /* --------------------------------------------sales reports-------------------------------------------------------- */
    }

    //-------------------------------------------field_sales_summary----------------------

    public function viewrDealerSalesReport() {

//        $append="";
//        if ((isset($_REQUEST['startDate_id']) && $_REQUEST['startDate_id']!=null) && (isset($_REQUEST['endDate_id']) && $_REQUEST['endDate_id']!=null) ) {
//        $start_date=$_REQUEST['start_date_name'];
//        list($SD,$SM,$SD)=  explode('-', $start_date);
//        print_r($SD);
//        $end_date = $_REQUEST['end_date_name'];
//        list($EY,$EM,$ED)=  explode('-', $start_date);
//        print_r($EM);
//       $append="and tas.date_edit between '$start_date' and '$end_date'";
//      
//    
//       }
        $append = "";
        $append1 = "";
        if ((isset($_REQUEST['start_date_name']) && $_REQUEST['start_date_name'] != null) && (isset($_REQUEST['end_date_name']) && $_REQUEST['end_date_name'] != null)) {
            $start_date = $_REQUEST['start_date_name'];
            list($sy, $sm, $sd) = explode('-', $start_date);
            //print_r($start_date);
            $end_date = $_REQUEST['end_date_name'];
            list($ey, $em, $ed) = explode('-', $end_date);
            $append1 = "and year = '$sy'and month = $em";
            $append = "and tas.date_edit between '$start_date' and '$end_date'";
        }

        $sql = "select 
    tbd.delar_name,
    tbd.delar_account_no,
    tbd.delar_id,
    so.sales_officer_name,
    so.sales_officer_id,
    tas.date_edit,
    sum(tas.selling_val) as actual,
    tas.acc_no,
    tb.branch_name,

    @monthly_target:=(select 
            monthly_target_id
        from
            tbl_sales_officer_monthly_target
        where
            dealer_id = tbd.delar_id
               {$append1}) as Monthly_Targot,
    ((select 
            sum(i.selling_price * mat.item_qty) as tot
        from
            tbl_monthly_target_additional as mat
                inner join
            tbl_item as i ON mat.item_id = i.item_id
        where
            monthly_target_id = @monthly_target
        group by mat.monthly_target_id) + (select 
            sum(it.selling_price * mtm.item_qty) as tot
        from
            tbl_monthly_target_minimum as mtm
                inner join
            tbl_item as it ON mtm.item_id = it.item_id
        where
            monthly_target_id = @monthly_target
        group by mtm.monthly_target_id)) as total_Target
from
    tbl_sales_officer so
        right join
    tbl_dealer tbd ON so.sales_officer_id = tbd.sales_officer_id
        inner join
    tbl_all_sales as tas ON tas.acc_no = tbd.delar_account_no
        inner join
    tbl_branch as tb ON so.branch_id = tb.branch_id
where
    so.sales_type_id = 1
        {$append}
group by tbd.delar_account_no";

        //echo $sql;
        return $this->db->mod_select($sql);
    }

    //---------------------------------Campaign--------------------------------------------------
    function getfinishedcampaignforcreatechart() {
        $sql = "select tbl_campaign.id_campaing,tbl_campaign.campaign_type,tbl_after_campaign.actual_cost,tbl_after_campaign.added_date AS finished_date,
            tbl_after_campaign.so_comment,tbl_after_campaign.apm_comment,tbl_after_campaign.ho_comment,tbl_after_campaign.areas_to_improve ,
            (select id_sales_officer from tbl_campaign_sales_officer where id_campaign=tbl_campaign.id_campaing) As Sales_officer_id ,
            (select sales_officer_account_no from tbl_sales_officer where sales_officer_id=(select id_sales_officer from tbl_campaign_sales_officer
            where id_campaign=tbl_campaign.id_campaing) ) As Account_NO,(select sales_officer_name from tbl_sales_officer where 
            sales_officer_id=(select id_sales_officer from tbl_campaign_sales_officer where id_campaign=tbl_campaign.id_campaing) ) AS Name 
            from tbl_campaign  tbl_campaign INNER JOIN tbl_after_campaign tbl_after_campaign on tbl_campaign.id_campaing=tbl_after_campaign.id_campaign
            where tbl_campaign.after_ho_permition=1 order by tbl_after_campaign.added_date DESC ";
        return $this->db->mod_select($sql);
    }

//-------------------------------------------------------------------------------------------------------------
    function atTheTimePromotion($cid, $finisheddate, $number) {

        $newdate = strtotime($number . 'month', strtotime($finisheddate));
        $newdate = date('Y-m-j', $newdate);
        // echo $newdate;

        $sql = "SELECT sum(unit_price * qty) as amount,(select sum(increase_to) from tbl_campaign_dealer where id_campaign=$cid) As Total_target from tbl_dealer_sales ds where ds.sold_date between '$newdate' and '$finisheddate' and ds.id_dealer in (select id_dealer from tbl_campaign_dealer where id_campaign=$cid)";
        return $this->db->mod_select($sql);
    }

    function monthlyTheTimePromotion($cid, $finisheddate, $number) {
//        $sdate = strtotime($finisheddate);
//        $sdate->modify('+1 day');
//        echo $sdate->format('m-d-Y');

        $date = strtotime("+" . '1' . " days", strtotime($finisheddate));
        $stdate = date("Y-m-d", $date);


        $newdate = strtotime($number . 'month', strtotime($finisheddate));
        $newdate = date('Y-m-j', $newdate);

        $sql = "SELECT sum(unit_price * qty) as amount from tbl_dealer_sales ds where ds.sold_date between '$stdate' and '$newdate'  and ds.id_dealer in (select id_dealer from tbl_campaign_dealer where id_campaign=$cid)";
        return $this->db->mod_select($sql);
    }

    //-------------------New Profitability Insert-------------:Insaf Zakariya-----------------------
    function profit_insert_to_db($sales_id, $year) {

        $profit_detail = $_REQUEST;
//    print_r($profit_detail);
        $BudgectArray = Array();
        $AcctualArray = Array();
        //-----------Budget Array
        $BmonthlyTurnOver = Array();
        $BmonthlyCostofSales = Array();
        $BmonthlyAllocations = Array();
        $BmonthlyIOU = Array();
        $BmonthlyMeals = Array();
        $BmonthlyLodging = Array();
        $BmonthlyFuel = Array();
        $BmonthlyTraveling = Array();
        $BmonthlyStationary = Array();
        $BmonthlyTelephone = Array();
        $BmonthlyTravelRentel = Array();
        $BmonthlyOther = Array();
        //------------Actual Array
        //$AmonthlyTurnOver = Array();
        //$AmonthlyCostofSales = Array();
        $AmonthlyAllocations = Array();
        $AmonthlyIOU = Array();
        $AmonthlyMeals = Array();
        $AmonthlyLodging = Array();
        $AmonthlyFuel = Array();
        $AmonthlyTraveling = Array();
        $AmonthlyStationary = Array();
        $AmonthlyTelephone = Array();
        $AmonthlyTravelRentel = Array();
        $AmonthlyOther = Array();

        for ($i = 1; $i < 13; $i++) {
            /// print_r($profit_detail['B_' . $i . '_allocation']);
            // print_r($profit_detail['A_' . $i . '_allocation']);
            //echo  $profit_detail['B_'.$i.'_turn_over'];
            //---------------Budget
            array_push($BmonthlyTurnOver, $profit_detail['B_' . $i . '_turn_over']);
            array_push($BmonthlyCostofSales, $profit_detail['B_' . $i . '_cost_of_sales']);
            array_push($BmonthlyAllocations, $profit_detail['B_' . $i . '_allocation']);
            array_push($BmonthlyIOU, $profit_detail['B_' . $i . '_iou']);
            array_push($BmonthlyMeals, $profit_detail['B_' . $i . '_meals']);
            array_push($BmonthlyLodging, $profit_detail['B_' . $i . '_lodging']);
            array_push($BmonthlyFuel, $profit_detail['B_' . $i . '_fuel']);
            array_push($BmonthlyTraveling, $profit_detail['B_' . $i . '_traveling']);
            array_push($BmonthlyStationary, $profit_detail['B_' . $i . '_stationary']);
            array_push($BmonthlyTelephone, $profit_detail['B_' . $i . '_tel']);
            array_push($BmonthlyTravelRentel, $profit_detail['B_' . $i . '_vehiclerental']);
            array_push($BmonthlyOther, $profit_detail['B_' . $i . '_other']);
            //----------------Actual
            //array_push($AmonthlyTurnOver, $profit_detail['A_' . $i . '_turn_over']);
            //array_push($AmonthlyCostofSales, $profit_detail['A_' . $i . '_cost_of_sales']);
            array_push($AmonthlyAllocations, $profit_detail['A_' . $i . '_allocation']);
            array_push($AmonthlyIOU, $profit_detail['A_' . $i . '_iou']);
            array_push($AmonthlyMeals, $profit_detail['A_' . $i . '_meals']);
            array_push($AmonthlyLodging, $profit_detail['A_' . $i . '_lodging']);
            array_push($AmonthlyFuel, $profit_detail['A_' . $i . '_fuel']);
            array_push($AmonthlyTraveling, $profit_detail['A_' . $i . '_traveling']);
            array_push($AmonthlyStationary, $profit_detail['A_' . $i . '_stationary']);
            array_push($AmonthlyTelephone, $profit_detail['A_' . $i . '_tel']);
            array_push($AmonthlyTravelRentel, $profit_detail['A_' . $i . '_vehiclerental']);
            array_push($AmonthlyOther, $profit_detail['A_' . $i . '_other']);
        }
        array_push($BudgectArray, $BmonthlyTurnOver, $BmonthlyCostofSales, $BmonthlyAllocations, $BmonthlyIOU, $BmonthlyMeals, $BmonthlyLodging, $BmonthlyFuel, $BmonthlyTraveling, $BmonthlyStationary, $BmonthlyTelephone, $BmonthlyTravelRentel, $BmonthlyOther);
        array_push($AcctualArray, $AmonthlyAllocations, $AmonthlyIOU, $AmonthlyMeals, $AmonthlyLodging, $AmonthlyFuel, $AmonthlyTraveling, $AmonthlyStationary, $AmonthlyTelephone, $AmonthlyTravelRentel, $AmonthlyOther);
        // print_r($BudgectArray[2]);
        // print_r($AcctualArray[0]);
        //------------------------------------Insert To DB-----------------------------
        for ($month = 0; $month < 12; $month++) {
            $budgectdata = Array(
                "turn_over" => $BudgectArray[0][$month],
                "cost_of_sales" => $BudgectArray[1][$month],
                "allocation" => $BudgectArray[2][$month],
                "iou" => $BudgectArray[3][$month],
                "meals" => $BudgectArray[4][$month],
                "lodging" => $BudgectArray[5][$month],
                "fuel" => $BudgectArray[6][$month],
                "traveling" => $BudgectArray[7][$month],
                "stationary" => $BudgectArray[8][$month],
                "telephone" => $BudgectArray[9][$month],
                "vehicle_rentel" => $BudgectArray[10][$month],
                "other" => $BudgectArray[11][$month],
                "month" => $month + 1,
                "year" => $year,
                "type" => 1,
                "sales_officer_id" => $sales_id
            );
            $acctualdata = Array(
                "allocation" => $AcctualArray[0][$month],
                "iou" => $AcctualArray[1][$month],
                "meals" => $AcctualArray[2][$month],
                "lodging" => $AcctualArray[3][$month],
                "fuel" => $AcctualArray[4][$month],
                "traveling" => $AcctualArray[5][$month],
                "stationary" => $AcctualArray[6][$month],
                "telephone" => $AcctualArray[7][$month],
                "vehicle_rentel" => $AcctualArray[8][$month],
                "other" => $AcctualArray[9][$month],
                "month" => $month + 1,
                "year" => $year,
                "type" => 2,
                "sales_officer_id" => $sales_id
            );
            $dbMonth = $month + 1;

            //-----------------------------------Budgect Query-----------------------------------------
            $types1 = 1;
            $sql = "select count(status) As Counts from tbl_sales_man_wise_profitability where sales_officer_id=$sales_id AND year=$year AND month=$dbMonth AND type=$types1";
            $result = $this->db->mod_select($sql);
            //print_r($result);
            // echo $result[0]->Counts;

            if ($result[0]->Counts > 0) {

                // print_r($result);

                $budgectwhere = Array(
                    "month" => $month + 1,
                    "year" => $year,
                    "type" => 1,
                    "sales_officer_id" => $sales_id
                );

                $updateBudgect = Array(
                    "turn_over" => $BudgectArray[0][$month],
                    "cost_of_sales" => $BudgectArray[1][$month],
                    "allocation" => $BudgectArray[2][$month],
                    "iou" => $BudgectArray[3][$month],
                    "meals" => $BudgectArray[4][$month],
                    "lodging" => $BudgectArray[5][$month],
                    "fuel" => $BudgectArray[6][$month],
                    "traveling" => $BudgectArray[7][$month],
                    "stationary" => $BudgectArray[8][$month],
                    "telephone" => $BudgectArray[9][$month],
                    "vehicle_rentel" => $BudgectArray[10][$month],
                    "other" => $BudgectArray[11][$month],
                );
                $this->db->update("tbl_sales_man_wise_profitability", $updateBudgect, $budgectwhere);
            } else {
                //echo 'hhy';
                $this->db->insertData('tbl_sales_man_wise_profitability', $budgectdata);
            }
            //------------------------------Actual Query------------------------------
            $types2 = 2;
            $sql2 = "select count(status) As Counts from tbl_sales_man_wise_profitability where sales_officer_id=$sales_id AND year=$year AND month=$dbMonth AND type=$types2";
            $result2 = $this->db->mod_select($sql2);

            if ($result2[0]->Counts > 0) {
                // print_r($result);

                $acctualwhere = Array(
                    "month" => $month + 1,
                    "year" => $year,
                    "type" => 2,
                    "sales_officer_id" => $sales_id
                );

                $updateacctual = Array(
                    "allocation" => $AcctualArray[0][$month],
                    "iou" => $AcctualArray[1][$month],
                    "meals" => $AcctualArray[2][$month],
                    "lodging" => $AcctualArray[3][$month],
                    "fuel" => $AcctualArray[4][$month],
                    "traveling" => $AcctualArray[5][$month],
                    "stationary" => $AcctualArray[6][$month],
                    "telephone" => $AcctualArray[7][$month],
                    "vehicle_rentel" => $AcctualArray[8][$month],
                    "other" => $AcctualArray[9][$month],
                );
                $this->db->update("tbl_sales_man_wise_profitability", $updateacctual, $acctualwhere);
            } else {

                $this->db->insertData('tbl_sales_man_wise_profitability', $acctualdata);
            }
        }
    }

    function getdataforfilltable($dalesOfficerID, $year) {
        $sql = "select * from tbl_sales_man_wise_profitability where sales_officer_id=$dalesOfficerID and year=$year ";
        return $this->db->mod_select($sql);
        //print_r($result);
    }

    function getSales($year, $sales_code) {
        $begiyear = $year . '-01-01';
        $endyear = $year . '-12-31';

        //$sql="select sum(cost_price*qty)  AS Cost_of_sale,sum(selling_val*qty) As Turn_over,date_edit,concat(year(month(date_edit))) as month  from tbl_all_sales where s_e_code ='$sales_code' and date_edit between '$begiyear' and  '$endyear' group by month";
        $sql = "select sum(cost_price*qty)  AS Cost_of_sale,sum(selling_val*qty) As Turn_over, concat(year(date_edit),'-',month(date_edit)) as dat from tbl_all_sales where s_e_code ='$sales_code' and  date_edit between '$begiyear' and  '$endyear' group by dat";
        return $this->db->mod_select($sql);
    }

    public function getSalesOfficerForSummery() {
        $sql = "SELECT sales_officer_id,sales_officer_name,sales_officer_code from tbl_sales_officer where status=1";
        return $this->db->mod_select($sql);
    }

    public function getBudgectTurnOver($year, $soid) {
        $sql = "select sum(turn_over) AS turn_over,month from tbl_sales_man_wise_profitability where year=$year and sales_officer_id=$soid and type=1 and status=1 GROUP BY month";
        return $this->db->mod_select($sql);
    }

    public function getIOU($year, $soid) {
        $sql = "Select sum(iou+meals+lodging+fuel+traveling+stationary+telephone+other) AS IOU,month,type from tbl_sales_man_wise_profitability where year=$year and sales_officer_id=$soid and status=1 GROUP BY month,type";
        return $this->db->mod_select($sql);
    }

    //---------------------------get sales_type-------------
    public function get_sales_officer_type() {
        $sql = "SELECT * FROM tbl_sales_type where status=1";
        return $this->db->mod_select($sql);
    }

    //-------------------------get sales officer Detail----------------------------
    public function get_emp_name($sales_id) {
        $sql = "SELECT sales_officer_name,sales_officer_account_no,sales_officer_code FROM tbl_sales_officer where sales_officer_id=$sales_id";
        return $this->db->mod_select($sql);
    }

    //------------------get sales officer by type----------
    public function get_sales_officer_by_type($type) {
        $sql = "SELECT * From tbl_sales_officer where sales_type_id=$type and status=1";
        return $this->db->mod_select($sql);
    }

//    ---------------------------Dealers Sales Report --------------------------------
    public function get_Name($q, $select, $officer_id) {
        if ($officer_id == 0) {
            $append = "limit 10";
        } else {
            $append = "and sales_officer_id = " . $officer_id . " limit 10";
        }
        $sql = "SELECT * FROM tbl_dealer where status=1 and delar_name like '" . $q . "%' " . $append;
        //echo $sql;
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

    public function getAccNo($q, $select, $officer_id) {
        if ($officer_id == 0) {
            $append = "limit 10";
        } else {
            $append = "and sales_officer_id = " . $officer_id . " limit 10";
        }
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_account_no like '$q%'" . $append;
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

    public function getDealerSales($data1) {
        $delar_id = $data1['dealer_name'];
        $start_date = $data1['start_date_name'];
        $end_date = $data1['end_date_name'];
        $append = "'$start_date' and '$end_date'";

        $sql = "select 
    it.item_part_no,
    it.description,
    ds.qty,
    ds.unit_price,
    ds.sold_date,
    ds.discount
from
    tbl_dealer_sales ds
        inner join
    tbl_item it ON ds.id_item = it.item_id
        inner join
    tbl_dealer td ON ds.id_dealer = td.delar_id
where
    ds.status = 1 and ds.id_dealer = " . $delar_id . "
        and ds.sold_date between '" . $start_date . "' and '" . $end_date . "'";

        return $this->db->mod_select($sql);
    }

//    -----------------------------------Dealers Sales Report : ---------------------------------
//-----------------------------------------Line Item wise target/Sales Officer wise / Format1/ ::DINESH-----------------------


    public function getAllSalesOfficers() {
        $sql = "select * from tbl_sales_officer where status = 1";
        return $this->db->mod_select($sql);
    }

    public function calculateNumberofLineItems($officer_id, $start_date, $end_date) {
        $sql = "select 
    round(coalesce(sum(als.qty), 0), 2) as total_qty
from
    tbl_all_sales als
        inner join
    tbl_sales_officer so ON trim(lower(als.s_e_code)) = trim(lower(so.sales_officer_code))
where
    so.sales_officer_id = " . $officer_id . " and so.status = 1
        and als.date_edit between '" . $start_date . "' and '" . $end_date . "'
        and als.qty > 0";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select[0]->total_qty;
    }

    //-------------------------------------------SALES MAN WISE RETURN REPORT - OVERALL Iresha------------------------

    public function getAllDealerName($q, $select) {
        $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE delar_name LIKE '$q%'";
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

    public function salesManWiseReturnOverall($dataArray) {
        $extraData = '';
        $sales_officer_id = 0;
        $year = 0;
        $st_date = 0;
        $end_date = 0;
        $form_data = array();
        if (count($dataArray) > 0) {
            $sales_officer_id = $dataArray['txt_sales_officer_id'];
            $year = $dataArray['year_picker'];
            $st_date = $year . "-04-01";
            $end_date = ($year + 1) . "-03-31";
        }

        $sql = "select distinct
    als.part_no,
    als.description,
    coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-04-01' and '" . $year . "-04-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as apr_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-05-01' and '" . $year . "-05-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as may_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-06-01' and '" . $year . "-06-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as jun_ret_hash,        
    coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-07-01' and '" . $year . "-07-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as jul_ret,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-08-01' and '" . $year . "-08-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as aug_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-09-01' and '" . $year . "-09-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as sep_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-10-01' and '" . $year . "-10-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as oct_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-11-01' and '" . $year . "-11-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as nov_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . $year . "-12-01' and '" . $year . "-12-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as dec_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . ($year + 1) . "-01-01' and '" . ($year + 1) . "-01-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as jan_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . ($year + 1) . "-02-01' and '" . ($year + 1) . "-02-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as feb_ret_hash,
            coalesce((select 
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                    tso1.sales_officer_id = tso.sales_officer_id
                        and als1.date_edit between '" . ($year + 1) . "-03-01' and '" . ($year + 1) . "-03-30'
                        and it1.item_id = it.item_id
                        and als1.qty < 0),
            0) as mar_ret_hash
from
    tbl_all_sales als
        inner join
    tbl_sales_officer tso ON als.s_e_code = tso.sales_officer_code
        and tso.status = 1
        and als.status = 1
        inner join
    tbl_item it ON als.part_no = it.item_part_no
        and it.status = 1
where
    als.date_edit between '" . $st_date . "' and '" . $end_date . "'
        and tso.sales_officer_id = '" . $sales_officer_id . "'
        and als.status = 1
        and als.qty < 0
group by als.part_no
order by als.date_edit";
        //  echo $sql;

        return $this->db->mod_select($sql);
    }

    public function getReturnHashQuantity($sales_officer_id, $start_date, $end_date) {
        $sql = "select 
                    coalesce(sum(als1.qty),0)as ret_hash_qty
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                tso1.sales_officer_id='" . $sales_officer_id . "'
                        
                        and als1.date_edit between '" . $start_date . "' and '" . $end_date . "'
                      
                        and als1.qty < 0
             ";

        $mod_select_h = $this->db->mod_select($sql);
        //     echo $sql;
        if (count($mod_select_h) > 0) {
            return $mod_select_h[0]->ret_hash_qty;
        }
        return 0;
    }

    public function getReturnIndividualLine($sales_officer_id, $start_date, $end_date) {
        $sql = "select 
                    count(als1.qty) as ret_hash_qty_count
                from
                    tbl_all_sales als1
                        inner join
                    tbl_sales_officer tso1 ON als1.s_e_code = tso1.sales_officer_code
                        and tso1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                tso1.sales_officer_id='" . $sales_officer_id . "'
                        
                        and als1.date_edit between '" . $start_date . "' and '" . $end_date . "'
                      
                        and als1.qty < 0
             ";
        $mod_select_i = $this->db->mod_select($sql);
        // echo $sql;
        return $mod_select_i[0]->ret_hash_qty_count;
    }

    public function getCurrentSalesOfficer($sales_officer_id) {
        $sql = "select tu.name,tso.sales_officer_account_no,tu.employee_id from tbl_user tu INNER JOIN tbl_sales_officer tso ON tso.sales_officer_id=tu.employee_id where tu.typeid = 3 and tu.employee_id = '" . $sales_officer_id . "' and tu.status = 1 ";
        return $this->db->mod_select($sql);
    }

    public function getAllSalesOfficerName1($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name,sales_officer_account_no from tbl_sales_officer WHERE sales_officer_name LIKE '$q%'";
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

    public function get_all_sales_officer_name_acnt_no($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name,sales_officer_account_no from tbl_sales_officer WHERE sales_officer_account_no LIKE '$q%'";
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

//-------------------------------------------SALES MAN WISE RETURN REPORT - OVERALL Iresha------------------------
    //--------------------------------------------DEALER WISE RETURN REPORT - Iresha--------------------------------------------  
    public function dealerWiseReturn($dataArray) {

        $extraData = '';
        $dealer_id = 0;
        $year = 0;
        $st_date = 0;
        $end_date = 0;
        $form_data = array();
        if (count($dataArray) > 0) {
            $dealer_id = $dataArray['txt_dealer_id'];
            $year = $dataArray['year_picker'];
            $st_date = $year . "-04-01";
            $end_date = ($year + 1) . "-03-31";
        }

        $sql = "select distinct
als.part_no,
als.description,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-04-01' and '" . $year . "-04-30'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as apr_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-05-01' and '" . $year . "-05-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as may_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-06-01' and '" . $year . "-06-30'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as jun_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-07-01' and '" . $year . "-07-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as jul_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-08-01' and '" . $year . "-08-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as aug_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-09-01' and '" . $year . "-09-30'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as sep_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-10-01' and '" . $year . "-10-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as oct_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-11-01' and '" . $year . "-11-30'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as nov_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . $year . "-12-01' and '" . $year . "-12-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as dec_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . ($year + 1) . "-01-01' and '" . ($year + 1) . "-01-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as jan_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . ($year + 1) . "-02-01' and '" . ($year + 1) . "-02-29'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as feb_ret_hash,
coalesce((select 
sum(als1.qty)
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
and als1.date_edit between '" . ($year + 1) . "-03-01' and '" . ($year + 1) . "-03-31'
and it1.item_id = it.item_id
and als1.qty < 0),
0) as mar_ret_hash
from
tbl_all_sales als
inner join
tbl_dealer td ON als.acc_no = td.delar_account_no
and als.status = 1
inner join
tbl_item it ON als.part_no = it.item_part_no
and it.status = 1
where
als.date_edit between '" . $st_date . "' and '" . $end_date . "'
and td.delar_id = '" . $dealer_id . "'
and als.status = 1
and als.qty < 0
group by als.part_no
order by als.date_edit

 ";
        // echo $sql;
        return $this->db->mod_select($sql);
    }

    public function getAllDealerAcntNo($q, $select) {
        $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE delar_account_no LIKE '$q%'";
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

    public function getCurrentDealer($dealer_id) {
        $sql = "select tu.name,td.delar_name,td.delar_account_no,tu.employee_id from tbl_user tu INNER JOIN tbl_dealer td ON td.delar_id=tu.employee_id where tu.typeid = 4 and tu.employee_id = '" . $dealer_id . "' and tu.status = 1 ";
        return $this->db->mod_select($sql);
    }

    public function getReturnDealerHashQuantity($dealer_id, $start_date, $end_date) {
        $sql = "select 
                    coalesce(sum(als1.qty),0)as ret_hash_qty
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
                td1.delar_id='" . $dealer_id . "'
                        
                        and als1.date_edit between '" . $start_date . "' and  '" . $end_date . "'
                      
                        and als1.qty < 0
             ";

        $mod_select_h = $this->db->mod_select($sql);
        //  echo $sql;
        if (count($mod_select_h) > 0) {
            return $mod_select_h[0]->ret_hash_qty;
        }
        return 0;
    }

    public function getDealerReturnIndividualLine($dealer_id, $start_date, $end_date) {
        $sql = "select 
                    count(als1.qty) as ret_hash_qty_count
                from
                    tbl_all_sales als1
                        inner join
                    tbl_dealer td1 ON als1.acc_no  = td1.delar_account_no
                        and td1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                where
                td1.delar_id='" . $dealer_id . "'
                        
                        and als1.date_edit between  '" . $start_date . "' and  '" . $end_date . "'
                      
                        and als1.qty < 0
             ";
        $mod_select_i = $this->db->mod_select($sql);
        //   echo $sql;
        return $mod_select_i[0]->ret_hash_qty_count;
    }

    //--------------------------------------------DEALER WISE RETURN REPORT - Iresha--------------------------------------------    

    /* -------------------------------------- Sales Officer Monthly Target Dealer wise------------------------------------------------ */

    public function getAllReportData($dealer_id, $target_month) {
        $explode = explode("-", $target_month);
        $month = $explode[1];
        $year = $explode[0];
        $target_month_start_date = $target_month . "-01";
        $target_month_end_date = $target_month . "-31";
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
        $sql = "select 
    a1.item_id,
    ti.item_part_no,
    ti.description,
    ifnull((select 
                    sum(tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)),
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
                    it1.item_id = a1.item_id
                        and td1.delar_id = " . $dealer_id . "
                        and als1.date_edit between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)),
            0) as bbf,
    @total_actual:=ifnull((select 
                    sum(qty) as total_actual
                from
                    tbl_all_sales tals1
                        inner join
                    tbl_item ti1 ON tals1.part_no = ti1.item_part_no
                        and tals1.status = 1
                        and ti1.status = 1
                        inner join
                    tbl_dealer td1 ON tals1.acc_no = td1.delar_account_no
                        and td1.status = 1
                where
                    tals1.date_edit between '" . $target_month_start_date . "' and '" . $target_month_end_date . "'
                        and td1.delar_id = " . $dealer_id . "
                        and ti1.item_id = a1.item_id),
            0) as total_actual,
    @tot_minimum_qty:=ifnull((select 
                    tmtd.minimum_qty
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) = '" . $target_month_start_date . "'),
            0) as tot_minimum_qty,
    @tot_additional_qty:=ifnull((select 
                    tmtd.additional_qty
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) = '" . $target_month_start_date . "'),
            0) as tot_additional_qty,
    @total_target:=(@tot_additional_qty + @tot_minimum_qty) as total_target,
    (@total_target - @total_actual) as variance
from
    ((select 
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target tsomt
    inner join tbl_monthly_target_detail tmtd ON tsomt.monthly_target_id
        and tmtd.monthly_target_id
        and tsomt.status = 1
        and tmtd.status = 1
    where
        tsomt.dealer_id = " . $dealer_id . "
            and concat(tsomt.year, '-0', tsomt.month, '-01') = '" . $target_month_start_date . "') union (select distinct
        ti.item_id
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    where
        td.delar_id = " . $dealer_id . "
            and tals.date_edit between '" . $target_month_start_date . "' and '" . $target_month_end_date . "'
    group by ti.item_id) union (select distinct
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target somt
    inner join tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
        and somt.status = 1
        and tmtd.status = 1
    where
        somt.dealer_id = " . $dealer_id . "
            and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)
            and (tmtd.minimum_qty + tmtd.additional_qty) - (ifnull((select 
                sum(tals.qty)
            from
                tbl_all_sales tals
            inner join tbl_item ti ON tals.part_no = ti.item_part_no
                and ti.status = 1
                and tals.status = 1
            inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
                and td.status = 1
            where
                ti.item_id = tmtd.item_id
                    and td.delar_id = somt.dealer_id
                    and tals.date_edit between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)
            group by ti.item_id), 0)) > 0)) as a1
        inner join
    tbl_item ti ON a1.item_id = ti.item_id
order by bbf desc
";
        return $this->db->mod_select($sql);
    }

    /* -------------------------------------- Sales Officer Monthly Target Dealer wise------------------------------------------------ */

    public function getSalesmanWiseData($so_id, $target_month) {
        $explode = explode("-", $target_month);
        $month = $explode[1];
        $year = $explode[0];
        $target_month_start_date = $target_month . "-01";
        $target_month_end_date = $target_month . "-31";
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
        $sql = "select 
    a1.item_id,
    ti.item_part_no,
    ti.description,
    ifnull((select 
                    sum(tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                        inner join
                    tbl_sales_officer tso ON somt.sales_officer_id = tso.sales_officer_id
                where
                    tmtd.item_id = a1.item_id
                        and somt.sales_officer_id = " . $so_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)),
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
                        inner join
                    tbl_sales_officer tso ON td1.sales_officer_id = tso.sales_officer_id
                where
                    it1.item_id = a1.item_id
                        and tso.sales_officer_id = " . $so_id . "
                        and als1.date_edit between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)),
            0) as bbf,
    @total_actual:=ifnull((select 
                    sum(qty) as total_actual
                from
                    tbl_all_sales tals1
                        inner join
                    tbl_item ti1 ON tals1.part_no = ti1.item_part_no
                        and tals1.status = 1
                        and ti1.status = 1
                        inner join
                    tbl_dealer td1 ON tals1.acc_no = td1.delar_account_no
                        and td1.status = 1
                        inner join
                    tbl_sales_officer tso ON td1.sales_officer_id = tso.sales_officer_id
                where
                    tals1.date_edit between '" . $target_month_start_date . "' and '" . $target_month_end_date . "'
                        and tso.sales_officer_id = " . $so_id . "
                        and ti1.item_id = a1.item_id),
            0) as total_actual,
    @tot_minimum_qty:=ifnull((select 
                    sum(tmtd.minimum_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.sales_officer_id = " . $so_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) = '" . $target_month_start_date . "'),
            0) as tot_minimum_qty,
    @tot_additional_qty:=ifnull((select 
                    sum(tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.sales_officer_id = " . $so_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) = '" . $target_month_start_date . "'),
            0) as tot_additional_qty,
    @total_target:=(@tot_additional_qty + @tot_minimum_qty) as total_target,
    (@total_target - @total_actual) as variance
from
    ((select 
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target tsomt
    inner join tbl_monthly_target_detail tmtd ON tsomt.monthly_target_id
        and tmtd.monthly_target_id
        and tsomt.status = 1
        and tmtd.status = 1
    where
        tsomt.sales_officer_id = " . $so_id . "
            and concat(tsomt.year, '-0', tsomt.month, '-01') = '" . $target_month_start_date . "') union (select distinct
        ti.item_id
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    inner join tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
    where
        tso.sales_officer_id = " . $so_id . "
            and tals.date_edit between '" . $target_month_start_date . "' and '" . $target_month_end_date . "'
    group by ti.item_id) union (select distinct
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target somt
    inner join tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
        and somt.status = 1
        and tmtd.status = 1
    where
        somt.sales_officer_id = " . $so_id . "
            and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)
    group by tmtd.item_id
    having (sum(tmtd.minimum_qty + tmtd.additional_qty) - (ifnull((select 
            sum(tals.qty)
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
            ti.item_id = tmtd.item_id
                and tso.sales_officer_id = " . $so_id . "
                and tals.date_edit between '" . $fy_start . "' and last_day('" . $target_month_start_date . "' - interval 1 month)
        group by ti.item_id), 0))) > 0)) as a1
        inner join
    tbl_item ti ON a1.item_id = ti.item_id
order by bbf desc
";
        return $this->db->mod_select($sql);
    }

    public function getSalesOfficerName($q, $select, $officer_id) {
        $sql = "SELECT * FROM tbl_dealer where status=1 and sales_officer_id = " . $officer_id . " and delar_name like '" . $q . "%' limit 10";
        echo $sql;
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

}

?>
