<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class areasalestour_model extends C_Model {

    public $salesofficerid = '';

    public function __construct() {
        parent::__construct();
        $typename = $this->session->userdata('typename');
        if ($typename == 'Sales Officer' | $typename == 'APM') {
            $this->salesofficerid = $this->session->userdata('employe_id');
        }
        $this->session->userdata('employe_id');
    }

    public function insertAreaSalesTour($file_array_as) {
        
       
        $vahicle_no = $_REQUEST['vehicle_no'];
        $iou_taken_date = $_REQUEST['iou_taken_date'];
        $iou_amount = $_REQUEST['iou_amount'];
        $due_date = $_REQUEST['due_date'];
        $tour_areas = $_REQUEST['tour_areas'];
        $insert_array_mo = array(
            'month' => date('Y-m'),
            'vehicle_no' => $vahicle_no,
            'iou_amount' => $iou_amount,
            'iou_taken_date' => $iou_taken_date,
            'due_date' => $due_date,
            'tour_areas' => $tour_areas,
            'sales_officer_id'=>$this->salesofficerid
        );
        if($_REQUEST['insert_or_no']==1){
              $this->db->insertData('tbl_expenses_main', $insert_array_mo);
        }
      
      
       // print_r($insert_array);
        
          $expenses_type = $_REQUEST['expensestype'];
          $row_count = $_REQUEST['rowcountIntable2'];




          for ($i = 1; $i <= $row_count; $i++) {
          if (isset($_REQUEST['date_pic_' . $i])) {


          $date = $_REQUEST['date_pic_' . $i];
          $inv_no = $_REQUEST['invoice_no_' . $i];
          $bill_amount = $_REQUEST['bill_amount_' . $i];
          $narration = $_REQUEST['Narration_' . $i];
          $description;
          $km_record;
          $km_record2;
          $get_meal_type;
          $sales_officer = $this->salesofficerid;
          $image_p=$file_array_as[$i];


          if (isset($_REQUEST['beginning_' . $i])) {
          $km_record = $_REQUEST['beginning_' . $i];
          } else {
          $km_record = 0;
          }

          if (isset($_REQUEST['end_' . $i])) {
          $km_record2 = $_REQUEST['end_' . $i];
          } else {
          $km_record2 = 0;
          }

          if (isset($_REQUEST['description_' . $i])) {
          $description = $_REQUEST['description_' . $i];
          } else {
          $description = '';
          }

          if (isset($_REQUEST['get_meal_type_' . $i])) {
          $get_meal_type = $_REQUEST['get_meal_type_' . $i];
          } else {
          $get_meal_type = '';
          }

          $detail = Array(
          "date" => date('Y-m-d'),
          "time" => date('H:i:s'),
          "expenses_date" => $date,
          "expenses" => $expenses_type,
          "inv_no" => $inv_no,
          "bill_amount" => $bill_amount,
          "narration" => $narration,
          "km_record" => $km_record,
          "km_record2" => $km_record2,
          "description" => $description,
          "meal_type" => $get_meal_type,
          "sales_officer_id" => $sales_officer,
          "image"=>$image_p
          );
       
          $thisdate = explode("-", $date);
          $year = $thisdate[0];
          $month = intval($thisdate[1]);
          print_r($detail);

          $this->db->insertData('tbl_sales_tour_expenses', $detail);
          //-------------Insert To Profitability-----------------------------
          $types1 = 2;
          $sql = "select count(status) As Counts from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=$types1";
          $result = $this->db->mod_select($sql);
          //print_r($result);
          // echo $result[0]->Counts;

          if (($result[0]->Counts) > 0) {

          // print_r($result);

          $budgectwhere = Array(
          "month" => $month,
          "year" => $year,
          "type" => 2,
          "sales_officer_id" => $sales_officer
          );
          $updateBudgect;
          if ($expenses_type === 'Meal - Sales Tour') {
          $sql2 = "select meals  from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "meals" => $result2[0]->meals + $bill_amount
          );
          } else if ($expenses_type === 'Accommodation -Sales Tour') {
          $sql2 = "select lodging  from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "lodging" => $result2[0]->lodging + $bill_amount
          );
          } else if ($expenses_type === 'Fuel Expenses') {
          $sql2 = "select fuel  from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "fuel" => $result2[0]->fuel + $bill_amount
          );
          } else if ($expenses_type === 'Delivery Charges') {
          $sql2 = "select telephone  from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "telephone" => $result2[0]->telephone + $bill_amount
          );
          } else if ($expenses_type === 'Travelling Expenses') {
          $sql2 = "select traveling  from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "traveling" => $result2[0]->traveling + $bill_amount
          );
          } else if ($expenses_type === 'Stationeries') {
          $sql2 = "select stationary from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "stationary" => $result2[0]->stationary + $bill_amount
          );
          } else if ($expenses_type === 'Fuel for stock Vehicles') {
          $sql2 = "select iou from tbl_sales_man_wise_profitability where sales_officer_id=$sales_officer AND year=$year AND month=$month AND type=2";
          $result2 = $this->db->mod_select($sql2);

          $updateBudgect = Array(
          "iou" => $result2[0]->iou + $bill_amount
          );
          }
          // print_r($updateBudgect);

          $this->db->update("tbl_sales_man_wise_profitability", $updateBudgect, $budgectwhere);
          } else {
          $subtypeforexpences;
          if ($expenses_type === 'Meal - Sales Tour') {
          $subtypeforexpences = 'meals';
          } else if ($expenses_type === 'Accommodation -Sales Tour') {
          $subtypeforexpences = 'lodging';
          } else if ($expenses_type === 'Fuel Expenses') {
          $subtypeforexpences = 'fuel';
          } else if ($expenses_type === 'Delivery Charges') {
          $subtypeforexpences = 'telephone';
          } else if ($expenses_type === 'Travelling Expenses') {
          $subtypeforexpences = 'traveling';
          } else if ($expenses_type === 'Stationeries') {
          $subtypeforexpences = 'stationary';
          } else if ($expenses_type === 'Fuel for stock Vehicles') {
          $subtypeforexpences = 'iou';
          }
          $insertArray = Array(
          "$subtypeforexpences" => $bill_amount,
          "month" => $month,
          "year" => $year,
          "type" => 2,
          "sales_officer_id" => $sales_officer
          );

           $this->db->insertData('tbl_sales_man_wise_profitability', $insertArray);
          }
          }
          } 
    }

    public function getSummeryForSalesTourExpenses($sales_id, $first_date, $second_date) {
        $sql = "Select * from tbl_sales_tour_expenses where sales_officer_id=$sales_id AND expenses_date Between '$first_date' AND '$second_date' AND status=1";
        return $this->db->mod_select($sql);
    }

    function get_sales_officer_detail($emp_id) {

        $sql = "SELECT * FROM tbl_sales_officer where status=1 AND sales_officer_id=$emp_id";
        $detail = $this->db->mod_select($sql);
        return $detail;
    }

     public function get_is_exit_this_month(){
         $month=date('Y-m');
         $sql="SELECT * FROM `tbl_expenses_main` WHERE `month`='$month'";
         $res=$this->db->mod_select($sql);
         return $res;
    }
    public function get_expenses_main_detail($month,$aso){
         $sql="SELECT * FROM `tbl_expenses_main` WHERE `month`='$month' and sales_officer_id=$aso ";
         $res=$this->db->mod_select($sql);
        
         return $res;
    }

}
