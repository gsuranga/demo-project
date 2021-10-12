<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form id="frm_bid" name="frm_bid">
    <table align="center" width="70%">
        <thead>
        <td width="15%"></td>
        <td width="20%"></td>
        <td width="20%"></td>
        </thead>
        <tr>
            <td>Name Of the Promotion :</td>
            <td><input type="text" id="bid_name" name="bid_name"></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><textarea id="descrptn" name="descrptn" rows="4" cols="35"></textarea></td>
        </tr>
<!--        <tr>
            <td>Remarks :</td>
            <td><textarea id="remarks" name="remarks" rows="4" cols="35"></textarea></td>
        </tr>-->
        <tr>
            <td>Duration :</td>
            <td><input type="text" id="date_starting" name="date_starting" placeholder="From" autocomplete="off" readonly="true"></td>
            <td><input type="text" id="date_ending" name="date_ending" placeholder="To" autocomplete="off" readonly="true"></td>
        </tr>
    </table>
    <br>
    
    <table id="tbl_bid" width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead>
        <td></td>
        <td width="180px">Part number</td>
        <td width="250px">Description</td>
        <!--<td width="200px">Remarks</td>-->
        <td>Current SP (With VAT)</td>
        <td>Special Price</td>
        <td>Minimum Quantity</td> 
        <td></td>
        </thead>
        <tbody>
            <tr id="1">
                <td><input type="button" name="ad_rw_1" id="ad_rw_1" value="+" onclick="add_row(this.id, 1);"></td>
                <td><input type="text" name="part_nmber_1" id="part_nmber_1" onfocus="get_part_number(1);" autocomplete="off" placeholder="Select Part Number"/>
                    <input type="hidden" name="part_no_id_1" id="part_no_id_1"></td>
                <td><input type="text" name="dscrption_1" id="dscrption_1" readonly="true"></td>
                <!--<td><input type="text" name="remark_1" id="remark_1" readonly="true"></td>-->
                <td><input type="text" style="text-align: right" name="current_sp_1" id="current_sp_1" readonly="true"></td>
                <td><input type="text" style="text-align: right" id="special_price_1" name="special_price_1"></td>
                <td><input type="text" style="text-align: right" id="minimum_qty_1" name="minimum_qty_1"></td>
                <td><input type="hidden" id="count_row" name="count_row" value="1"></td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <table width="100%">
        <thead>
        <td width="80%"></td>
        <td width="10%"></td>
        <td width="10%"></td>
        </thead>
        <tr>
            <td></td>
            <td><input type="button" id="bid_submit" name="bid_submit" onclick="submit_bid_promotion();" value="Submit"></td>
            <td><input type="reset" id="bid_reset" name="bid_reset" value="Reset"></td>
        </tr> 
    </table>
</form>
