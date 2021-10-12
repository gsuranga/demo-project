<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--        Checking internet connection and load graf libs-->
<?php
$connected = @fsockopen("www.goole.com", 80);
//website, port  (try 80 or 443)
if ($connected) {
    ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>google.load("visualization", "1", {packages: ["corechart"]});</script>

    <?php
} else {
    
}
?>


<script>
    var user_types = '<?php echo $this->session->userdata('typename'); ?>';
</script>

<table border="0" style="width: 100%">
    <?php
    //echo $this->session->userdata('employe_id');
    if ($this->session->userdata('typename') == 'Super Admin') {
        ?>
<!--                                            <tr>
                                                <td style="color: black">Branch</td>
                                                <td ><select style="color: black;width: 250px" onchange="select_branch_type();" id="branch_combo"><option value="1">All</option ><option value="2">Select One </option></select></td>
                                                <td ><input type="hidden" id="branch_code" style="color: black;width: 250px" placeholder="Select Branch Code" onkeypress="get_branch_code();"></></td>
                                                <td ><input type="hidden" id="branch_name" style="color: black;width: 250px" placeholder="Select Branch" onkeypress="get_branch_name();"></></td>
                                                <td ><input type="hidden" id="branch_id" style="width: 250px" ></></td>
                                            </tr>-->

    <?php } ?>
    <?php if ($this->session->userdata('typename') == 'APM' | $this->session->userdata('typename') == 'Super Admin') { ?>
                                    <!--        <tr>
                                                <td style="color: black">Sales Officer</td>
                                                <td ><select style="color: black;width: 250px" id="get_sales_officer_combo" onchange="select_sales_officer();"><option value="1">All</option><option value="2">Select One </option></select></td>
                                                <td ><input type="hidden" id="sales_officer_code" style="color: black;width: 250px" placeholder="Select Sales Officer Code" onkeypress="get_sales_officer_by_code(1);"></></td>
                                                <td ><input type="hidden" id="sales_officer_name" style="color: black;width: 250px" placeholder="Select Sales Officer" onkeypress="get_sales_officer_by_code(2);"></></td>
                                                <td ><input type="hidden" id="sales_officer_id" style="width: 250px" ></></td>
                                            </tr>-->

    <?php } ?>
    <tr>
        <td>From:</td>
        <td><input type="text" placeholder="From" id="from_date"></></td>
        <td>To:</td>
        <td><input type="text" placeholder="To" id="to_date"></></td>
        <td style="color: black;width:10%;">
            Campaign Type
        </td>
        <td style="width: 250px;">
            <select style="width: 250px;color: black;" onchange="get_select_type();" id="select_type" >
                <option value="0"></option>
                <option value="1">All</option>
                <option value="2">Pending</option>
                <option value="3">Approved</option>
                <option value="4">Finished</option>
                <option value="5">Hold</option>
                <option value="6">Rejected</option>
                <option value="7">Canceled</option>
                <option value="8">As New</option>
            </select>

        </td>
        <td><img width="20" height="20" style="cursor: pointer" src="<?php echo $System['URL']; ?>public/images/refresh.jpg" onclick="get_select_type();" /></td>
        <td align="right">
            <table>
                <tr>

                    <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?>
                        <?php
                        $from_date = date('Y-m-01');
                        $to_date = date('Y-m-31');
                        ?>
                        <td><input type="button" value="set priority" onclick="set_priority();" style="background-color: hsl(195, 100%, 43%) !important;border-color: #00a4db #00a4db hsl(195, 100%, 38%);color:white"></></td>
                        <td><input type="button" value="Reserved for This Month(Hold)" style="background-color: hsl(195, 100%, 43%) !important;border-color:yellow;color:white" onclick="get_campaigns(5, '<?php echo date('Y-m-01'); ?>', '<?php echo date('Y-m-31') ?>');"></></td>


                    <?php } ?>

                    <?php if ($this->session->userdata('typename') == 'APM' | $this->session->userdata('typename') == 'Super Admin') { ?>
                        <td><input type="text" placeholder="ASO" onkeyup="filter_aso_wise();" id="aso_name_field"></></td>
                    <?php } ?>
                    <?php if ($this->session->userdata('typename') == 'Super Admin') { ?>
                        <td><input type="text" placeholder="Branch" id="branch_name_field" onkeyup="filter_branch_wise();"></></td>
                    <?php } ?>
                    <td><input type="button" value="Approved for This Month" style="background-color: hsl(195, 100%, 43%) !important;border-color:green;color:white" onclick="get_campaigns(3, '<?php echo date('Y-m-01'); ?>', '<?php echo date('Y-m-31'); ?>');"></></td>



                </tr>
            </table>
        </td>
    </tr>


</table>
<table style="width: 100%">
    <tr>
        <td>
            <table  class="SytemTable" style="width: 100%; " border="1" >
                <thead>
                    <tr >
                        <td>No</td>
                        <td>Type</td>
                        <td>Date To Be Held</td>
                        <td>Sent Date</td>
                        <td >View</td>
                        <td>ASO</td>
                        <td>Branch</td>
                        <td style="width: 10px">Has Hold Campaign</td>
                        <td style="width: 15px">Hold Campaign No</td>
                    </tr>
                </thead>
                <tbody id="table_body"  style="font-size: 15px;color: black">

                </tbody>

            </table>

        </td>

    </tr>
</table>
<?php // echo $this->session->userdata('typename'); ?>
<input type="hidden" id="user_type_notification" value="<?php echo $this->session->userdata('typename'); ?>"></>



