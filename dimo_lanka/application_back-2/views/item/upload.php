<?php

session_start();
require_once '../library/config.php';
require_once '../library/functions.php';

$current_date = date('Y-m-d');
$current_time = date('g:i A');


$filename = $_FILES['target_file']['Sample.xlsx'];
if ($_FILES['target_file']['Sample.xlsx'] != null) {
    $upload_url = $_FILES['target_file']['Sample.xlsx'];
    if (move_uploaded_file($_FILES['target_file']['tmp_name'], $upload_url)) {
        
    }
}

$page = join("", file("$filename"));
$line = explode("\n", $page);
$max = 0;

//$max=mysql_num_rows($result_ck);
for ($i = 0; $i < count($line); $i++) {
    if ($i != 0) {
        $shop_code = "";
//        /Generate Shop Code/


        $max +=1;
        //echo getRegionID($dis_id)."   |  ".getAreaID($ar_id)."   |  ".getRouteID($r_id)."  |   ".$max."   |  "."<br/>";
        //$shop_code=getRegionID($dis_id).getAreaID($ar_id).getRouteID($r_id).$max;

        $target = explode(',', $line[$i]);
        if (count($target) > 1 && $target[0] != "" && $target[2] != "") {
            /* echo $outlet_name=$target[0]."....";
              echo $tel=$target[1]."....";
              echo $contact_person=$target[2]."....";
              echo $designation=$target[3]."....";- */

            $acc_no = trim($target[0]);
            $cusname = trim($target[1]);



            mysqli_connect('localhost', 'root', 'ijse', 'db_student');
            $query_insert = "INSERT INTO `student` (`NICNO`, `FNAME`, `LNAME`, `DOB`) VALUES ('$acc_no', '$current_date', '$current_time', '$cusname')";
            mysql_query($query_insert) or die("Unable to insert data into the tbl_item" . mysql_error());


            //for($x=4;$x<count($target);$x++){

            /* if($x != (count($target)-1)){
              if($x == 4){
              $address =trim($target[$x]).",";
              }else{
              $address .=trim($target[$x]).",";
              }
              }else{
              if($x == 4){
             * 
             * 

             */
        }
    }
}
?>


