<!--FREEZE Table -->
<script type="text/javascript" src="<?php echo $System['URL']; ?>public/freezehader/js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/freezehader/css/style.css" />
<script language="javascript" type="text/javascript">

    $j(document).ready(function() {
        $j("#tbl_stock_availability").freezeHeader({'height': '300px'});
    })


</script>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table id="tbl_search_stock_availability" width="60%" align="center">
    <tr>
        <td style="color: #666666">
            Part No.
        </td>
        <td style="color: #666666">
            :
        </td>
        <td>
            <input type="text" name="txt_stock_part_no" id="txt_stock_part_no" onfocus="getAllPartNumbers();" placeholder="Part No.">
        </td>
        <td style="color: #666666">
            Description
        </td>
        <td style="color: #666666">
            :
        </td>
        <td>
            <input type="text" name="txt_stock_part_desc" id="txt_stock_part_desc" onfocus="getAllPartDescriptions();" placeholder="Description">
        </td>
        <td>
            <input type="hidden" name="txt_stock_part_id" id="txt_stock_part_id">
        </td>

    </tr>
    <tr>
        <td style="color: #666666">
            Month From
        </td>
        <td style="color: #666666">
            :
        </td>
        <td>
            <input type="text" name="txt_month_from" id="txt_month_from" placeholder="Month From">
        </td>
        <td style="color: #666666">
            Month To
        </td>
        <td style="color: #666666">
            :
        </td>
        <td>
            <input type="text" name="txt_month_to" id="txt_month_to" placeholder="Month To">
        </td>
        <td>

        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td style="text-align: center;"><input type="button" id="btn_availability_to_excel" name="btn_availability_to_excel" value="To Excel" onclick="reportsToExcel('tbl_stock_availability', 'Parts_movement_at_dealer_<?php echo date('Y-m-d H:i:s') . "_"; ?>' + $j('#txt_stock_part_no').val());"> <input type="button" id="btn_search_availability" name="btn_search_availability" value="Search" onclick="validateSearch();"></td>
    </tr>

</table>
&emsp;
<div style="width: 95%;max-width: 95%">
    <table width="100%" id="tbl_stock_availability" name="tbl_stock_availability"  align="center" class="actual_parts_count" cellpadding="0" cellspacing="0"> 
        <thead>
            <tr>
                <th hidden="hidden" rowspan="2">Dealer ID</td>
                <th rowspan="2" style="background-color: #006cff; color: black;">Dealer</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Account No.</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Sales Officer</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Branch</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Available Qty.</th>
                <th colspan="2" style="background-color: #006cff; color: black;">Movement to Dealer (6 Months)</th>
                <th colspan="2" style="background-color: #006cff; color: black;">Movement to Customer (6 Months)</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Movement for the Period</th>

            </tr>
            <tr>
                <th style="background-color: #999999; color: white;">Qty.</th>
                <th style="background-color: #999999; color: white;">Avg.</th>
                <th style="background-color: #999999; color: white;">Qty.</th>
                <th style="background-color: #999999; color: white;">Avg.</th>

            </tr>
        </thead>
        <tbody id="tbl_stock_availability_body">

        </tbody>
    </table>
</div>