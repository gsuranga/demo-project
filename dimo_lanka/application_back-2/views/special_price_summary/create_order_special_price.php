<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form id="frm_sp_summary">
    <table width="80%" class="SytemTable" align="center" cellpadding="10">
        <thead>
        <td>Promotion Name</td>
        <td>Description</td>
        <td width="15%">Target</td>
        <td width="15%">Actual</td>
        <td width="15%">Balance</td>
        <td></td>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="sp_name" id="sp_name" onfocus="get_promotion_name();" autocomplete="off" placeholder="Select Promotion Name"/>
                    <input type="hidden" id="sp_name_id" name="sp_name_id" readonly="true"></td>
                <td><input type="text" id="descrption" name="descrption" readonly="true"></td>
                <td><input type="text" style="text-align: right" id="targt" name="targt" readonly="true"></td>
                <td><input type="text" style="text-align: right" id="actul" name="actul" readonly="true"></td>
                <td><input type="text" style="text-align: right" id="balnce" name="balnce" readonly="true"></td>
                <td><input type="button" id="view_sp" name="view_sp" value="View" onclick="get_promotion_details();"></td>
            </tr>
        </tbody>
    </table>
    <br>

    <table id="tbl_dealr" style="visibility: hidden">
        <tr>
            <td width="100px">Dealer</td>
            <td width="300px"><input type="text" id="dealr_name" name="dealr_name" onfocus="get_dealer_name();" placeholder="Name"></td>
            <td><input type="text" id="dealr_acc_no" name="dealr_acc_no" readonly="true" placeholder="Account Number">
                <input type="hidden" id="dealr_id" name="dealr_id"></td>
        </tr>
    </table>
    <br>
    
    <div id="sp_detail" style="border: solid #206E94 2px; visibility: hidden">

    </div>
    <br>
    <br>

    <table id="tbl_submit_sp" style="visibility: hidden">
        <tr>
            <td style="padding-left: 1100px"><input type="button" value="Add To Order" id="submit_sp" name="submit_kit" onclick="submit_sp_promotion_order();"></td>
        </tr>
    </table>
    
    <div id="print_sp" style="visibility: hidden">
        
    </div>
</form>