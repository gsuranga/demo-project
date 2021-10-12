<!--FREEZE Table -->
<script type="text/javascript" src="<?php echo $System['URL']; ?>public/freezehader/js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/freezehader/css/style.css" />
<script language="javascript" type="text/javascript">

    $j(document).ready(function() {
        $j("#tbl_stock_movement").freezeHeader({'height': '300px'});
    })


</script>
<form>
    <table align="center" width="60%">
        <tr>
            <td><label style="color: #454545">Dealer Name:</label></td>
            <td><input  placeholder="Dealer Name" type="text" id="dealername" name="dealername" onfocus="get_Name();"/><input type="hidden" id="dealer_id" name="dealer_id"/> </td> 
            <td> <?php echo form_error('dealername'); ?></td>
            <td><label style="color: #454545">Account Number:</label></td>
            <td><input  placeholder="Acc. No." type="text" id="accno" name="accno" onclick="getAccNo()"/> <input type="hidden" id="acc_no" name="acc_no"> </td> 
            <td>  <?php echo form_error('accno'); ?></td>
        </tr>
        <tr>
            <td><label style="color: #454545">Month From:</label></td>
            <td><input type="text" id="month_from" name="month_from" placeholder="Month From"></td>
            <td></td>
            <td style="color: #454545">Month To:</td>
            <td><input type="text" id="month_to" name="month_to" placeholder="Month to"></td>
            <td></td>

        </tr>
        <tr>

        </tr>
        <tr>
            <td></td>
            <td style="position: relative; left:430px"><input type="button" id="btn_to_excel" name="btn_to_excel" value="To Excel"  onclick="reportsToExcel('tbl_stock_movement', 'Stock_movement_<?php echo date('Y-m-d H:i:s') ?>');"> <input type="button" id="submit_search" name="submit_search" onclick="getDealerStockReport();" value="Search" ></td>

        </tr>
    </table>

</form>
&emsp;
<div id="div_stock_movement" style="width: 97%;max-width: 95%">
    <table width="100%" class="actual_parts_count" cellpadding="0" cellspacing="0" id="tbl_stock_movement" name="tbl_stock_movement" style="border-style: ridge; border-color: #999999">
        <thead >
            <tr>
                <th rowspan="2" style="background-color: #006cff; color: black;">Part Number</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Description</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Last Invoice Date</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Available Qty</th>
                <th colspan="2" style="background-color: #006cff; color: black;">Movement to Dealer (6 Months)</th>
                <th colspan="2" style="background-color: #006cff; color: black;">Movement to Customer (6 Months)</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Turnover (6 Months)</th>
                <th rowspan="2" style="background-color: #006cff; color: black;">Movement for the Period</th>

            </tr>
            <tr>
                <th style="background-color: #999999; color: white;">Qty.</th>
                <th style="background-color: #999999; color: white;">Avg.</th>
                <th style="background-color: #999999; color: white;">Qty.</th>
                <th style="background-color: #999999; color: white;">Avg.</th>


            </tr>
        </thead>
        <tbody id="tbl_stock_movement_body">
        </tbody>

    </table>
</div>
