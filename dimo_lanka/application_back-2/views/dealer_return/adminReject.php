<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<center>
    <table>
        <tr>
            <td>Dealer Name:</td>
            <td>
                <input type="text" name="RejectdealerName" id="RejectdealerName" onfocus="reject_dealer_name();" placeholder="Select Dealer Name" autocomplete="off"/>
                <input type="hidden" name="Rejectdealer_id" id="Rejectdealer_id"  autocomplete="off"/>
            </td>
            <td>Account No:.</td>
            <td><input type="text" name="RejectaccountNo" onfocus="dealer_reject_AccountNo();" id="RejectaccountNo" placeholder="Select Account No" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>Date From:</td>
            <td><input type="text" name="staretRjectDate" id="staretRjectDate" placeholder="" autocomplete="off"/></td>
            <td>To:</td>
            <td><input type="text" name="endtRjectDate" id="endtRjectDate" placeholder="" autocomplete="off"/></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="button" style="margin-left: 80px;"  name="search_btn" onclick="veiwAdminRejectedOrder();" id="search_btn" value="Search"/></td>
        </tr>
    </table>
</center>
<table style=" margin-top: 30px; alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_orders">
    <thead >
        <tr>
            <td hidden="hidden">Dealer Return ID</td>
            <td>Dealer Name</td>
            <td>Dealer Account No.</td>
            <td>Sales Officer</td>
            <td>WIP No.</td>
            <td>Invoice No.</td>
            <td>Return Date</td>
            <td>Return Time</td>
            <td>Rejected Date</td>
            <td>Rejected Time</td>
            <td>View Details</td>

        </tr>
    </thead>
    <tbody id="veiwAdminRejectedDetails">

    </tbody>
</table>