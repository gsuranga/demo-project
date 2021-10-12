<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form id="frm_bid_promotion_summary">
    <table width="50%" class="SytemTable" align="center" cellpadding="10">
        <thead>
        <td>Promotion Name</td>
        <td>Description</td>
        <td></td>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="bidname" id="bidname" onfocus="get_bid_name();" autocomplete="off" placeholder="Select Bid Name"/>
                    <input type="hidden" id="bid_name_id" name="bid_name_id" readonly="true">
                    <input type="hidden" id="strt_date" name="strt_date" readonly="true">
                    <input type="hidden" id="end_dt" name="end_dt" readonly="true"></td>
                <td><input type="text" id="discriptin" name="discriptin" readonly="true"></td>
                <td><input type="button" id="view_bid" name="view_bid" value="View" onclick="get_bid_details();"></td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <table id="tbl_delr" style="visibility: hidden">
        <tr>
            <td width="100px">Dealer</td> 
            <td width="300px"><input type="text" id="delr_name" name="delr_name" onfocus="get_dealer_name();" placeholder="Name"></td>
            <td><input type="text" id="delr_acc_no" name="delr_acc_no" readonly="true" placeholder="Account Number">
                <input type="hidden" id="delr_id" name="delr_id">
                <input type="hidden" id="aso_id" name="aso_id"></td>
        </tr>
    </table>
    <br>
    
    <div id="detail_bid" style="border: solid #206E94 2px; visibility: hidden">

    </div>
    <br>
    <br>

    <table id="tbl_submit_bid" style="visibility: hidden">
        <tr>
            <td style="padding-left: 1100px"><input type="button" value="Submit" id="submit_bid" name="submit_bid" onclick="print_bid_promotion_order();"></td>
        </tr>
    </table>
</form>